<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('html_remover')) {
  function html_remover($inp=null) {
    foreach ($inp as $key => $value) {
      $inp[$key] =anti_injection($value);
    }
    return $inp;
  }
}
if(!function_exists('isUrlExist')) {
  function isUrlExist($url){
    $ch = curl_init($url);    
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($code == 200){
      $status = true;
    }else{
      $status = false;
    }
    curl_close($ch);

    return $status;
  }
}

if(!function_exists('toDate')) {
  function toDate($date)
  {
    if ($date == '' || $date == null) {
      return '';
    }else{
      $raw = explode("-", $date);
      return $raw[2].'-'.$raw[1].'-'.$raw[0];
    }
  }
}

if(!function_exists('dateSys2dateId')) {
  function dateSys2dateId($date)
  {
    if($date == '' || $date == null){
      return '';
    }else{
      $raw = explode("-", $date);
      return $raw[2].'-'.$raw[1].'-'.$raw[0];
    }
  }
}

if(!function_exists('dateDiff')) {
  function dateDiff($date_1 , $date_2 , $differenceFormat = '%a' ){
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);

    $interval = date_diff($datetime1, $datetime2);

    return $interval->format($differenceFormat);
  }
}

if(!function_exists('monthName')) {
  function monthName($m,$lg = 'id'){
    $m = intval($m)-1;
    $data['id'] = array(
      'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    if ($m<0 || $m>12) {
      return '';
    }else {
      return $data[$lg][$m];
    }
  }
}

if(!function_exists('listMonthId')) {
  function listMonthId(){
    $data = array(
      '01' => 'Januari',
      '02' => 'Februari',
      '03' => 'Maret',
      '04' => 'April',
      '05' => 'Mei',
      '06' => 'Juni',
      '07' => 'Juli',
      '08' => 'Agustus',
      '09' => 'September',
      '10' => 'Oktober',
      '11' => 'November',
      '12' => 'Desember',
    );
    return $data;
  }
}

if(!function_exists('dateId')) {
  function convertDateId($tgl='') {
    if($tgl != '') {
      $tanggal = substr($tgl, 8, 2);
      $jam = substr($tgl, 11, 8);
      $bulan = monthName(substr($tgl, 5, 2));
      $tahun = substr($tgl, 0, 4);
      if($jam != '') {
        return $tanggal . ' ' . $bulan . ' ' . $tahun . ' ' . $jam;
      } else {
        return $tanggal . ' ' . $bulan . ' ' . $tahun;
      }    
    }    
  }
}

if(!function_exists('dateId')) {
  function date_gabung($tgl='') {
    if($tgl != '') {
      $tanggal = substr($tgl, 8, 2);
      $jam = substr($tgl, 11, 8);
      $bulan = monthName(substr($tgl, 5, 2));
      $tahun = substr($tgl, 0, 4);
      return $tanggal . ' ' . $bulan . ' ' . $tahun;    
    }    
  }
}

if(!function_exists('dateCard')) {
  function dateCard($tgl='') {
    if($tgl != '') {
      $tanggal = substr($tgl, 8, 2);
      $jam = substr($tgl, 11, 8);
      $bulan = monthName(substr($tgl, 5, 2));
      $tahun = substr($tgl, 0, 4);
      return $tanggal . ' ' . $bulan;    
    }    
  }
}

if (!function_exists('timeElapsed')) {
  function timeElapsed($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
      'y' => 'tahun',
      'm' => 'bulan',
      'w' => 'minggu',
      'd' => 'hari',
      'h' => 'jam',
      'i' => 'menit',
      's' => 'detik',
    );
    foreach ($string as $k => &$v) {
      if ($diff->$k) {
        $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
      } else {
        unset($string[$k]);
      }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' yg lalu' : 'baru saja';
  }
}

if (!function_exists('wordLimiter')){
  function wordLimiter($str, $limit = 3, $end_char = '&#8230;'){
    if (trim($str) === ''){
      return $str;
    }

    preg_match('/^\s*+(?:\S++\s*+){1,'.(int) $limit.'}/', $str, $matches);

    if (strlen($str) === strlen($matches[0])){
      $end_char = '';
    }

    return rtrim($matches[0]).$end_char;
  }
}

if (!function_exists('numId')){
  function numId($v){
    $res = str_replace('.', '', $v);
    $res = str_replace(',', '.', $res);
    return $res;
  }
}

if (!function_exists('numSys')){
  function numSys($v)
  {
    if(is_numeric($v)){
      $res = number_format($v, 0, ",", ".");
      return $res;
    }else{
      return $v;
    }
  }
}

if(!function_exists('createLog')) {
  function createLog($access = 1, $module = "")
  {
    $CI = get_instance();

    $acc = $CI->db->where('id', $access)->get('_access')->row_array();

    if ($CI->agent->is_browser()){
      $agent = $CI->agent->browser().' '.$CI->agent->version();
    }elseif ($CI->agent->is_robot()){
      $agent = $CI->agent->robot();
    }elseif ($CI->agent->is_mobile()){
      $agent = $CI->agent->mobile();
    }else{
      $agent = 'Unidentified';
    }

    $data = array(
      'user_id' => @$CI->session->userdata('user_id'),
      'session_id' => @$CI->session->session_id,
      'fullname' => @$CI->session->userdata('fullname'),
      'access' => @$acc['access'],
      'ip_address' => @$CI->input->ip_address(),
      'user_agent' => @$agent,
      'platform' => @$CI->agent->platform(),
      'module' => @$module,
      'url' => @current_url(),
      'description' => @$acc['description'],
      'created' => @date('Y-m-d H:i:s')
    );

    $file = APPPATH.'logs/access-'.date('Y-m-d').'.json';
    $log = json_decode(read_file($file));
    if ($log === null) {$log = array();};
    array_push($log,$data);
    write_file($file, json_encode($log), 'w+');
  }
}

if(!function_exists('getCookieMenu')) {
  function getCookieMenu($controller)
  {
    $CI = get_instance();
    if (is_null(get_cookie($controller))) {
      $val = array(
        'search' => null,
        'per_page' => null,
        'cur_page' => null,
        'total_rows' => null,
        'order' => null
      );
      $cookie = array(
        'name'   => $controller,
        'value'  => json_encode($val),
        'expire' => '300'
      );
      $CI->input->set_cookie($cookie);
      return $val;
    }else{
      return json_decode(get_cookie($controller),TRUE);
    }
  }
}

if(!function_exists('setCookieMenu')) {
  function setCookieMenu($controller, $cookie_val)
  {
    $CI = get_instance();
    $cookie = array(
      'name'   => $controller,
      'value'  => json_encode($cookie_val),
      'expire' => '300'
    );
    $CI->input->set_cookie($cookie);
  }
}

if(!function_exists('setPagination')) {
  function setPagination($controller, $data, $link=NULL)
  {
    $CI = get_instance();
    $config['per_page'] = $data['per_page'];
    if ($link==NULL) {
      $config['base_url'] = site_url().'/'.$controller;
    }else{
      $config['base_url'] = site_url().'/'.$controller.'/'.$link;
    }
    $config['total_rows'] = $data['total_rows'];
    $CI->pagination->initialize($config);
  }
}

if(!function_exists('paginationInfo')) {
  function paginationInfo($list_rows, $data)
  {
    $str = "Menampilkan ";
    if ($list_rows == 0) {
      $str .= '0 sampai 0 dari 0 data.';
    }else{
      if ($list_rows > 0) {
       $str .= ($data['cur_page']+1);
     }else{
       $str .= ($data['cur_page']);
     }
     $str .= " sampai ".($data['cur_page']+$list_rows)." dari ".$data['total_rows']." data.";
   }
   return $str;
 }
}

if (!function_exists('getParameter')){
  function getParameter($parameter)
  {
    $CI = get_instance();
    $CI->load->model('_parameter/m_parameter');
    $parameter = $CI->m_parameter->by_field('parameter', $parameter);
    if ($parameter == null) {
      return '<<parameter not found!>>';
    }
    return $parameter['value'];
  }
}

if (!function_exists('excelStyle')) {
  function excelStyle()
  {
    $data = array();
      //align center
    $data['align_center'] = array(
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
      )
    );
      //align left
    $data['align_left'] = array(
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
      )
    );
      //align right
    $data['align_right'] = array(
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
      )
    );
      //font bold
    $data['font_bold'] = array(
      'font' => array(
        'bold'  => 'bold'
      )
    );
      //font underline
    $data['font_underline'] = array(
      'font' => array(
        'underline'  => 'underline'
      )
    );
      //font size 12
    $data['font_size_12'] = array(
      'font' => array(
        'size'  => 12
      )
    );
      //wrap text
    $data['wrap_text'] = array(
      'alignment' => array(
        'wrap' => 'wrap',
      )
    );
    $data['bg_yellow'] = array(
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => 'FFFF00')
      )
    );
    $data['font_red'] = array(
      'font'  => array(
        'color' => array('rgb' => 'FF0000'),
      )
    );
      //create border
    $data['styleArray'] = array(
      'borders' => array(
        'allborders' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
          'color' => array('rgb' => '111111'),
        ),
      ),
      'font' => array(
        'size'  => 11,
        'name'  => 'Calibri'
      ),
    );

    return $data;
  }

}

if (!function_exists('getCountDay')){
  function getCountDay($month='', $year='')
  {
    if ($month !='' && $year !='') {
      $count_date = cal_days_in_month(CAL_GREGORIAN,$month,$year);
    }else{
      $count_date = cal_days_in_month(CAL_GREGORIAN,01,2020);
    }

    return $count_date;
  }
}

if(!function_exists('countAge')) {
  function countAge($tanggal_lahir) {
    list($year,$month,$day) = explode("-",$tanggal_lahir);
    $year_diff  = date("Y") - $year;
    $month_diff = date("m") - $month;
    $day_diff   = date("d") - $day;
    if ($month_diff < 0) $year_diff--;
    elseif (($month_diff==0) && ($day_diff < 0)) $year_diff--;
    return $year_diff;
  }
}

if (!function_exists('webservice')){
  function webservice($port,$url,$parameter){
    $curl = curl_init();
    set_time_limit(0);
    curl_setopt_array($curl, array(
      CURLOPT_PORT => $port,
      CURLOPT_URL => "http://".$url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $parameter,
      CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "content-type: application/x-www-form-urlencoded"
      ),
    )
  );
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
      $response = ("Error #:" . $err);
    }else{
      $response;
    }

    return $response;
  }
}

if (!function_exists('anti_injection')){
  function anti_injection($str=null) {
    $str = strip_tags($str);
    $str = str_replace('"', "-", $str);
    $str = str_replace("'", '-', $str);
    $str = str_replace("`", '-', $str);
    $str = str_replace("?", '-', $str);
    $str = str_replace("/", '-', $str);
    $str = str_replace(",", '-', $str);
    $str = str_replace("&", '-', $str);
    $str = str_replace('“', '-', $str);
    $str = str_replace('”', '-', $str);
    $str = str_replace('(', '-', $str);
    $str = str_replace(')', '-', $str);
    $str = str_replace('{', '-', $str);
    $str = str_replace('}', '-', $str);
    $str = str_replace(':', '-', $str);
    $str = str_replace(';', '-', $str);
    $str = str_replace('<', '-', $str);
    $str = str_replace('>', '-', $str);
    $str = str_replace('[', '-', $str);
    $str = str_replace(']', '-', $str);
    $str = str_replace('%', '-', $str);
    $str = str_replace('$', '-', $str);
    $str = str_replace('!', '-', $str);
    $str = str_replace('`', '-', $str);
    $str = str_replace('~', '-', $str);
    $str = str_replace('=', '-', $str);
    $str = str_replace('script', '', $str);
    $str = htmlentities($str);
    return $str;
  }
}


if (!function_exists('Wa')){
  function Wa($nohp) {
    $nohp = str_replace(" ","",$nohp);
    $nohp = str_replace("(","",$nohp);
    $nohp = str_replace(")","",$nohp);
    $nohp = str_replace(".","",$nohp);
    if(!preg_match('/[^+0-9]/',trim($nohp))){
      if(substr(trim($nohp), 0, 3)=='+62'){
        $hp = '62'.substr(trim($nohp), 3);
      }elseif(substr(trim($nohp), 0, 1)=='0'){
        $hp = '62'.substr(trim($nohp), 1);
      }elseif(substr(trim($nohp), 0, 2)=='62'){
        $hp = trim($nohp);
      }else{
        $hp = trim($nohp);
      }
    }
    return $hp;
  }
}

if (!function_exists('Tlp')){
  function Tlp($nohp) {
    $nohp = str_replace(" ","",$nohp);
    $nohp = str_replace("(","",$nohp);
    $nohp = str_replace(")","",$nohp);
    $nohp = str_replace(".","",$nohp);
    if(!preg_match('/[^+0-9]/',trim($nohp))){
      if(substr(trim($nohp), 0, 3)=='+62'){
        $hp = trim($nohp);
      }elseif(substr(trim($nohp), 0, 1)=='0'){
        $hp = '+62'.substr(trim($nohp), 1);
      }elseif(substr(trim($nohp), 0, 2)=='62'){
        $hp = '+62'.substr(trim($nohp), 2);
      }else{
        $hp = trim($nohp);
      }
    }
    return $hp;
  }
}

if (!function_exists('get_detail')){
  function get_detail($str=null) {
    $str = str_replace('https://api.gdriveplayer.us/v2/series/imdb/', '', $str);
    return $str;
  }
}