<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// error_reporting(1);
class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->helper(array('url','form')); //load helper url 
        $this->load->library('form_validation'); //load form validation
        $this->load->model('Modul_warga');
		$this->load->model('Modul_setting');
		$this->load->model('Modul_surat');
		$this->load->model('Modul_laporan');
    }
	
	
	
	// added 20191029 by asdam
	public function warga()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
            $data['datakepalakeluarga']=$this->Modul_warga->viewkepalakeluarga();
            $this->load->view('laporan/warga/laporanwarga',$data);
		}
		// $this->load->view('setup/data/listdatawarga');
		
	}
	public function listallwarga($id)
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
			$nokk = $this->uri->segment(5);
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
			// print_r($nokk);die;
            $data['dataallwarga']=$this->Modul_warga->viewallwarga();
            $this->load->view('setup/data/warga/listdataallwarga',$data);
		}
		// $this->load->view('setup/data/listdatawarga');
		
	}
	public function listpindahwarga()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
			// $nokk = $this->uri->segment(5);
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
			// print_r($nokk);die;
            $data['datapindahwarga']=$this->Modul_warga->viewpindahwarga();
            $this->load->view('setup/data/warga/listdatapindahwarga',$data);
		}
		// $this->load->view('setup/data/listdatawarga');
		
	}
	
	public function listdetailkeluarga($id)
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
			$nokk = $this->uri->segment(5);
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
			// print_r($nokk);die;
            $data['datawarga']=$this->Modul_warga->viewwarga($nokk);
            $this->load->view('setup/data/warga/listdatadetailkeluarga',$data);
		}
		// $this->load->view('setup/data/listdatawarga');
		
	}
	
	public function detailkeluarga($id)
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
			$data['dataeditwarga']=$this->Modul_warga->get_editwarga($id);
			// print_r($this->Modul_warga->get_editjnsrek($id));die;
            $this->load->view('setup/data/warga/detailkeluarga',$data);
        }

	}
	public function listmeninggalwarga()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
			// $nokk = $this->uri->segment(5);
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
			// print_r($nokk);die;
            $data['datameninggalwarga']=$this->Modul_warga->viewmeninggalwarga();
            $this->load->view('setup/data/warga/listdatameninggalwarga',$data);
		}
		// $this->load->view('setup/data/listdatawarga');
		
	}
	public function pdfkepalakeluarga()
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			// $id = preg_replace("/-/", '/', $id);
			$data['data1']=$this->Modul_laporan->get_pdflaporankepalakeluarga();
			// print_r($this->Modul_laporan->get_pdflaporankepalakeluarga());die;
			$this->load->view('laporan/warga/pdfkepalakeluarga',$data);
        }

	}
	public function pdfallwarga()
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			// $id = preg_replace("/-/", '/', $id);
			$data['data1']=$this->Modul_laporan->get_pdflaporanallwarga();
			// print_r($this->Modul_laporan->get_pdflaporanallwarga());die;
			$this->load->view('laporan/warga/pdfallwarga',$data);
        }

	}
	
	public function pdfpindahwarga()
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			// $id = preg_replace("/-/", '/', $id);
			$data['data1']=$this->Modul_laporan->get_pdflaporanpindahwarga();
			// print_r($this->Modul_laporan->get_pdflaporanpindahwarga());die;
			$this->load->view('laporan/warga/pdfpindahwarga',$data);
        }

	}
	public function pdfmeninggalwarga()
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			// $id = preg_replace("/-/", '/', $id);
			$data['data1']=$this->Modul_laporan->get_pdflaporanmeninggalwarga();
			// print_r($this->Modul_laporan->get_pdflaporanmeninggalwarga());die;
			$this->load->view('laporan/warga/pdfmeninggalwarga',$data);
        }

	}
	
}

# nama file home.php
# folder apllication/controller/