<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PC_Controller extends CI_Controller{
  function render($content, $data = NULL){
    $config_pagination['full_tag_open'] = '<ul class="paginator">';
    $config_pagination['full_tag_close'] = '</ul>';
    $config_pagination['attributes'] = ['class' => 'page-link'];
    $config_pagination["first_link"] = false;
    $config_pagination["last_link"] = false;
    $config_pagination['first_tag_open'] = '<li class="paginator__item">';
    $config_pagination['first_tag_close'] = '</li>';
    $config_pagination['prev_link'] = '<i class="icon ion-ios-arrow-back"></i>';
    $config_pagination['prev_tag_open'] = '<li class="paginator__item paginator__item--prev">';
    $config_pagination['prev_tag_close'] = '</li>';
    $config_pagination['next_link'] = '<i class="icon ion-ios-arrow-forward"></i>';
    $config_pagination['next_tag_open'] = '<li class="paginator__item paginator__item--next">';
    $config_pagination['next_tag_close'] = '</li>';
    $config_pagination['last_tag_open'] = '<li class="paginator__item">';
    $config_pagination['last_tag_close'] = '</li>';
    $config_pagination['cur_tag_open'] = '<li class="paginator__item paginator__item--active"><a href="#" class="page-link">';
    $config_pagination['cur_tag_close'] = '</a></li>';
    $config_pagination['num_tag_open'] = '<li class="paginator__item">';
    $config_pagination['num_tag_close'] = '</li>';
    $config_pagination['num_links'] = 2;
    // $config_pagination['display_pages'] = false;
    $this->pagination->initialize($config_pagination);
    // Templating
    $data['header'] = $this->load->view('template/header', $data, TRUE);
    $data['topbar'] = $this->load->view('template/topbar', $data, TRUE);
    $data['content'] = $this->load->view($content, $data, TRUE);
    $data['footer'] = $this->load->view('template/footer', $data, TRUE);
    $this->load->view('template/index', $data);
  }
}

class PC_Error extends CI_Controller{

  function render($content, $data = NULL){
    $data['header'] = $this->load->view('p_template/error/header', $data, TRUE);
    $data['footer'] = $this->load->view('p_template/error/footer', $data, TRUE);
    $data['content'] = $this->load->view($content, $data, TRUE);

    $this->load->view('p_template/error/index', $data);
  }

}
