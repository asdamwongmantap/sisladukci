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
	
	$datawarga = $this->Modul_warga->viewallwarga();
	// print_r($datawarga);
	
	foreach ($datawarga as $value){
		$nohp1 = substr_replace($value->wrg_nohp,'62',0,1);
		// $nohp .= $value->wrg_nohp.",";
		$nohp .= $nohp1.",";
		$message = preg_replace('/\s+/', '_', $this->input->post('smskonten'));
		
		$url = file_get_contents('https://sms.smartme.co.id');
		
		$response = json_decode($url);
		
	}
	
	if (array($response->status)[0] == "SUCCESS"){
			echo "berhasil";
		}else {
			echo "gagal karena".$response->message."";
		}
	
	}
	
}

# nama file home.php
# folder apllication/controller/