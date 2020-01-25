<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(1);
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
			if ($this->input->post('jenis_laporanwarga') == "" ){
				$this->load->view('laporan/warga/laporanwarga',$data);
			}else{
				$tes = "pdf".$this->input->post('jenis_laporanwarga');
				$this->$tes();
			}
            
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
			if ($this->input->post('dtm_from') !== ""){
				$dtmfromawal = explode("/",$this->input->post('dtm_from'));
				$dtmfromtgl = $dtmfromawal[0];
				$dtmfrombln = $dtmfromawal[1];
				$dtmfromthn = $dtmfromawal[2];
				$dtmfromformat = $dtmfromthn."-".$dtmfrombln."-".$dtmfromtgl;
			}else{
				$dtmfromformat = "";
			}
			
			if ($this->input->post('dtm_to') !== ""){
				$dtmtoawal = explode("/",$this->input->post('dtm_to'));
				$dtmtotgl = $dtmtoawal[0];
				$dtmtobln = $dtmtoawal[1];
				$dtmtothn = $dtmtoawal[2];
				$dtmtoformat = $dtmtothn."-".$dtmtobln."-".$dtmtotgl;
			}else{
				$dtmtoformat = "";
			}
		 
			$data = array(
				'dtm_from' =>$dtmfromformat,
				'dtm_to' =>$dtmtoformat
			);
			$data['data1']=$this->Modul_laporan->get_pdflaporankepalakeluarga($data);
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
		// 	$dtmfromawal = explode("/",$this->input->post('dtm_from'));
		//   $dtmfromtgl = $dtmfromawal[0];
		//   $dtmfrombln = $dtmfromawal[1];
		//   $dtmfromthn = $dtmfromawal[2];
		//   $dtmfromformat = $dtmfromthn."-".$dtmfrombln."-".$dtmfromtgl;

		//   $dtmtoawal = explode("/",$this->input->post('dtm_to'));
		//   $dtmtotgl = $dtmtoawal[0];
		//   $dtmtobln = $dtmtoawal[1];
		//   $dtmtothn = $dtmtoawal[2];
		//   $dtmtoformat = $dtmtothn."-".$dtmtobln."-".$dtmtotgl;
		if ($this->input->post('dtm_from') !== ""){
			$dtmfromawal = explode("/",$this->input->post('dtm_from'));
			$dtmfromtgl = $dtmfromawal[0];
			$dtmfrombln = $dtmfromawal[1];
			$dtmfromthn = $dtmfromawal[2];
			$dtmfromformat = $dtmfromthn."-".$dtmfrombln."-".$dtmfromtgl;
		}else{
			$dtmfromformat = "";
		}
		
		if ($this->input->post('dtm_to') !== ""){
			$dtmtoawal = explode("/",$this->input->post('dtm_to'));
			$dtmtotgl = $dtmtoawal[0];
			$dtmtobln = $dtmtoawal[1];
			$dtmtothn = $dtmtoawal[2];
			$dtmtoformat = $dtmtothn."-".$dtmtobln."-".$dtmtotgl;
		}else{
			$dtmtoformat = "";
		}
			$data = array(
				'dtm_from' =>$dtmfromformat,
				'dtm_to' =>$dtmtoformat
			);
			$data['data1']=$this->Modul_laporan->get_pdflaporanallwarga($data);
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
			$dtmfromawal = explode("/",$this->input->post('dtm_from'));
		  $dtmfromtgl = $dtmfromawal[0];
		  $dtmfrombln = $dtmfromawal[1];
		  $dtmfromthn = $dtmfromawal[2];
		  $dtmfromformat = $dtmfromthn."-".$dtmfrombln."-".$dtmfromtgl;

		  $dtmtoawal = explode("/",$this->input->post('dtm_to'));
		  $dtmtotgl = $dtmtoawal[0];
		  $dtmtobln = $dtmtoawal[1];
		  $dtmtothn = $dtmtoawal[2];
		  $dtmtoformat = $dtmtothn."-".$dtmtobln."-".$dtmtotgl;
			$data = array(
				'dtm_from' =>$dtmfromformat,
				'dtm_to' =>$dtmtoformat
			);
			$data['data1']=$this->Modul_laporan->get_pdflaporanpindahwarga($data);
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
			$dtmfromawal = explode("/",$this->input->post('dtm_from'));
		  $dtmfromtgl = $dtmfromawal[0];
		  $dtmfrombln = $dtmfromawal[1];
		  $dtmfromthn = $dtmfromawal[2];
		  $dtmfromformat = $dtmfromthn."-".$dtmfrombln."-".$dtmfromtgl;

		  $dtmtoawal = explode("/",$this->input->post('dtm_to'));
		  $dtmtotgl = $dtmtoawal[0];
		  $dtmtobln = $dtmtoawal[1];
		  $dtmtothn = $dtmtoawal[2];
		  $dtmtoformat = $dtmtothn."-".$dtmtobln."-".$dtmtotgl;
			$data = array(
				'dtm_from' =>$dtmfromformat,
				'dtm_to' =>$dtmtoformat
			);
			$data['data1']=$this->Modul_laporan->get_pdflaporanmeninggalwarga($data);
			// print_r($this->Modul_laporan->get_pdflaporanmeninggalwarga());die;
			$this->load->view('laporan/warga/pdfmeninggalwarga',$data);
        }

	}
	public function surat()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
			$generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
			$data['datakepalakeluarga']=$this->Modul_warga->viewkepalakeluarga();
			if ($this->input->post('jenis_laporansurat') == "" ){
				$this->load->view('laporan/surat/laporansurat',$data);
			}else{
				$tes = "pdf".$this->input->post('jenis_laporansurat');
				$this->$tes();
			}
            
		}
		// $this->load->view('setup/data/listdatasurat');
		
	}
	public function pdfsuratpengantardomisili()
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
			
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$dtmfromawal = explode("/",$this->input->post('dtm_from'));
		  $dtmfromtgl = $dtmfromawal[0];
		  $dtmfrombln = $dtmfromawal[1];
		  $dtmfromthn = $dtmfromawal[2];
		  $dtmfromformat = $dtmfromthn."-".$dtmfrombln."-".$dtmfromtgl;

		  $dtmtoawal = explode("/",$this->input->post('dtm_to'));
		  $dtmtotgl = $dtmtoawal[0];
		  $dtmtobln = $dtmtoawal[1];
		  $dtmtothn = $dtmtoawal[2];
		  $dtmtoformat = $dtmtothn."-".$dtmtobln."-".$dtmtotgl;
			$data = array(
				'dtm_from' =>$dtmfromformat,
				'dtm_to' =>$dtmtoformat
			);
			$data['data1']=$this->Modul_laporan->get_pdflaporanketdomisili($data);

			// print_r($data);die;
			$this->load->view('laporan/surat/pdfsuratpengantardomisili',$data);
        }

	}
	public function pdfsuratpengantar()
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$dtmfromawal = explode("/",$this->input->post('dtm_from'));
		  $dtmfromtgl = $dtmfromawal[0];
		  $dtmfrombln = $dtmfromawal[1];
		  $dtmfromthn = $dtmfromawal[2];
		  $dtmfromformat = $dtmfromthn."-".$dtmfrombln."-".$dtmfromtgl;

		  $dtmtoawal = explode("/",$this->input->post('dtm_to'));
		  $dtmtotgl = $dtmtoawal[0];
		  $dtmtobln = $dtmtoawal[1];
		  $dtmtothn = $dtmtoawal[2];
		  $dtmtoformat = $dtmtothn."-".$dtmtobln."-".$dtmtotgl;
			$data = array(
				'dtm_from' =>$dtmfromformat,
				'dtm_to' =>$dtmtoformat
			);
			$data['data1']=$this->Modul_laporan->get_pdflaporansuratpengantar($data);
			// print_r($this->Modul_laporan->get_pdflaporansuratpengantar());die;
			$this->load->view('laporan/surat/pdfsuratpengantar',$data);
        }

	}
	
	public function pdfsuratkuasa()
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$dtmfromawal = explode("/",$this->input->post('dtm_from'));
		  $dtmfromtgl = $dtmfromawal[0];
		  $dtmfrombln = $dtmfromawal[1];
		  $dtmfromthn = $dtmfromawal[2];
		  $dtmfromformat = $dtmfromthn."-".$dtmfrombln."-".$dtmfromtgl;

		  $dtmtoawal = explode("/",$this->input->post('dtm_to'));
		  $dtmtotgl = $dtmtoawal[0];
		  $dtmtobln = $dtmtoawal[1];
		  $dtmtothn = $dtmtoawal[2];
		  $dtmtoformat = $dtmtothn."-".$dtmtobln."-".$dtmtotgl;
			$data = array(
				'dtm_from' =>$dtmfromformat,
				'dtm_to' =>$dtmtoformat
			);
			$data['data1']=$this->Modul_laporan->get_pdflaporansuratkuasa($data);
			// print_r($this->Modul_laporan->get_pdflaporansuratkuasa());die;
			$this->load->view('laporan/surat/pdfsuratkuasa',$data);
        }

	}
	public function pdfsuratkematian()
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$dtmfromawal = explode("/",$this->input->post('dtm_from'));
		  $dtmfromtgl = $dtmfromawal[0];
		  $dtmfrombln = $dtmfromawal[1];
		  $dtmfromthn = $dtmfromawal[2];
		  $dtmfromformat = $dtmfromthn."-".$dtmfrombln."-".$dtmfromtgl;

		  $dtmtoawal = explode("/",$this->input->post('dtm_to'));
		  $dtmtotgl = $dtmtoawal[0];
		  $dtmtobln = $dtmtoawal[1];
		  $dtmtothn = $dtmtoawal[2];
		  $dtmtoformat = $dtmtothn."-".$dtmtobln."-".$dtmtotgl;
			$data = array(
				'dtm_from' =>$dtmfromformat,
				'dtm_to' =>$dtmtoformat
			);
			$data['data1']=$this->Modul_laporan->get_pdflaporansuratkematian($data);
			// print_r($this->Modul_laporan->get_pdflaporansuratkematian());die;
			$this->load->view('laporan/surat/pdfsuratkematian',$data);
        }

	}
	public function pdfsuratizinmenikah()
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$dtmfromawal = explode("/",$this->input->post('dtm_from'));
		  $dtmfromtgl = $dtmfromawal[0];
		  $dtmfrombln = $dtmfromawal[1];
		  $dtmfromthn = $dtmfromawal[2];
		  $dtmfromformat = $dtmfromthn."-".$dtmfrombln."-".$dtmfromtgl;

		  $dtmtoawal = explode("/",$this->input->post('dtm_to'));
		  $dtmtotgl = $dtmtoawal[0];
		  $dtmtobln = $dtmtoawal[1];
		  $dtmtothn = $dtmtoawal[2];
		  $dtmtoformat = $dtmtothn."-".$dtmtobln."-".$dtmtotgl;
			$data = array(
				'dtm_from' =>$dtmfromformat,
				'dtm_to' =>$dtmtoformat
			);
			$data['data1']=$this->Modul_laporan->get_pdflaporanizinmenikah($data);
			// print_r($data);die;
			$this->load->view('laporan/surat/pdfsuratizinmenikah',$data);
			// echo 
        }

	}
	public function keuangan()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
			$generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
			$data['datakepalakeluarga']=$this->Modul_warga->viewkepalakeluarga();
			if ($this->input->post('jenis_laporankeuangan') == "" ){
				$this->load->view('laporan/keuangan/laporankeuangan',$data);
			}else{
				$tes = "pdflaporankeuangan";
				$this->$tes($this->input->post('jenis_laporankeuangan'));
			}
            
		}
		// $this->load->view('setup/data/listdatasurat');
		
	}
	public function pdflaporankeuangan($id)
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
		// 	$dtmfromawal = explode("/",$this->input->post('dtm_from'));
		//   $dtmfromtgl = $dtmfromawal[0];
		//   $dtmfrombln = $dtmfromawal[1];
		//   $dtmfromthn = $dtmfromawal[2];
		//   $dtmfromformat = $dtmfromthn."-".$dtmfrombln."-".$dtmfromtgl;

		//   $dtmtoawal = explode("/",$this->input->post('dtm_to'));
		//   $dtmtotgl = $dtmtoawal[0];
		//   $dtmtobln = $dtmtoawal[1];
		//   $dtmtothn = $dtmtoawal[2];
		//   $dtmtoformat = $dtmtothn."-".$dtmtobln."-".$dtmtotgl;
			$data = array(
				'digitbulan' => $id
			);
			
			$data['data1']=$this->Modul_laporan->get_pdflaporankeuangan($data);
			// $data['data2']=$this->Modul_laporan->get_totalsaldo();
			
			$this->load->view('laporan/keuangan/pdflaporankeuangan',$data);
        }

	}
	
}

# nama file home.php
# folder apllication/controller/