<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anime extends PC_Controller {

	function __construct() {
		parent::__construct();
		$this->API="https://api.gdriveplayer.us/v1/anime";
		$this->controller="anime";
		$this->load->library('curl');
		$this->cookie = getCookieMenu($this->controller);
		if ($this->cookie['cur_page'] == null) 1;
		if ($this->cookie['per_page'] == null) $this->cookie['per_page'] = 1;
	}
	public function index($p = 0)
	{
		$this->cookie['cur_page'] = $this->uri->segment(2, 1);
		$this->cookie['total_rows'] = 10;
		$page = $p+1;
		$data['main'] = json_decode($this->curl->simple_get($this->API.'/newest?limit=18&page='.$page), TRUE);
		$data['pagination_info'] = paginationInfo(count($data['main']), $this->cookie);
    //set pagination
		setPagination($this->controller, $this->cookie);
		// echo json_encode($data['main']); die();
		$this->render("contain/series/home", $data);
	}

	public function detail($id = NULL, $eps = 1)
	{
		if ($id == NULL) {redirect(base_url("error-404"));}
		$data['eps'] = $eps;
		$data['type'] = "anime_indo";
		$data['main'] = json_decode($this->curl->simple_get('https://api.gdriveplayer.us/v1/anime/id/'.$id), TRUE);
		// var_dump($data['main']); die();
		if (@$data['main']['status'] == "error") {redirect(base_url("error-404"));}
		$this->render("contain/series/detail_movie", $data);
	}

	public function genre($g=NULL, $p=0)
	{
		if ($g == NULL) {redirect(base_url("error-404"));}
		$this->cookie['cur_page'] = $this->uri->segment(4, 1);
		$this->cookie['total_rows'] = 5;
		$page = $p+1;
		$data['main'] = json_decode($this->curl->simple_get($this->API.'/search?limit=18&genre='.$g.'&page='.$page), TRUE);
		$data['pagination_info'] = paginationInfo(count($data['main']), $this->cookie);
    //set pagination
		setPagination($this->controller, $this->cookie, 'genre/'.$g);
		// echo json_encode($data['main']); die();
		$this->render("contain/series/home", $data);
	}
	public function search()
	{
		$data['search'] = $this->input->get('search',TRUE);
		$data['main'] = json_decode($this->curl->simple_get($this->API.'/search?limit=18&title='.$this->create_url($data['search'])), TRUE);
		$this->render("contain/series/search", $data);
	}

	private function create_url($str=null) {
    $str = strip_tags($str);
    $str = str_replace(' ', '+', $str);
    $str = htmlentities($str);
    return $str;
  }
}