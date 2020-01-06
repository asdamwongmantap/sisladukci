<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// error_reporting(1);
class Sms extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->helper(array('url','form')); //load helper url 
        $this->load->library('form_validation'); //load form validation
        $this->load->model('Modul_warga');
        $this->load->model('Modul_setting');
    }
	
	
	
	
	public function smsblast()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
			
            $this->load->view('sms/smsblast',$data);
        }

	}
	public function sendsms(){
		// Account details
	
	// // Message details
	$datawarga = $this->Modul_warga->viewallwarga();
	// print_r($datawarga);
	foreach ($datawarga as $value){
		$nohp1 = substr_replace($value->wrg_nohp,'62',0,1);
		// $nohp .= $value->wrg_nohp.",";
		$nohp .= $nohp1.",";
		
	}
	$numbers = explode(',', $nohp);

	$numbers1 = implode(',',  array_filter($numbers));
 
	// load library
	$this->load->library('nexmo');
	// set response format: xml or json, default json
	$this->nexmo->set_format('json');
	
	// **********************************Text Message*************************************
	$from = 'Wong Mantap';
	// $to = $nohp;
	$to = $numbers[0];
	$message = array(
		'text' => $this->input->post('smskonten'),
	);
	// $message = $this->input->post('smskonten');
	$response = $this->nexmo->send_message($from, $to, $message);
	if ($response['messages'][0]['status'] == 0){
		echo "berhasil";
	}else{
		echo "gagal";
	}
	// echo $response;
	// $this->nexmo->d_print($response['messages'][0]['status']);
	// echo "<h3>Response Code: ".$this->nexmo->get_http_status()."</h3>";

	}
	// public function sendsms(){
	// 	// Account details
	// // $apiKey = urlencode('ab57e25f');
	
	// // // Message details
	// $datawarga = $this->Modul_warga->viewallwarga();
	// // // print_r($datawarga);
	// foreach ($datawarga as $value){
	// 	$this->sendsmsnumber($value->wrg_nohp);
	// 	// sleep(3);
		
	// }
	
	// }
	
	
}

# nama file home.php
# folder apllication/controller/