<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// error_reporting(0);
class Surat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->helper(array('url','form')); //load helper url 
        $this->load->library('form_validation'); //load form validation
        $this->load->model('Modul_surat');
        $this->load->model('Modul_setting');
    }
	
	public function listketdomisili()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
            $data['dataketdomisili']=$this->Modul_surat->viewketdomisili();
            $this->load->view('berkas/surat/ketdomisili/listdataketdomisili',$data);
		}
		// $this->load->view('setup/data/listdatakategori');
		// print_r($this->session->userdata('fullname'));die;
	}
	public function add_mohonkk()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
            // $data['data']=$this->Modul_surat->viewjenisrek();
            $this->load->view('berkas/surat/addmohonkk',$data);
        }

	}
	public function savekategori(){
		$this->form_validation->set_rules('kat_id','ID','required');
		$this->form_validation->set_rules('kat_nama','Nama','required');
		$data = array(
				  'kat_id' =>$this->input->post('kat_id'),
				  'kat_nama' =>$this->input->post('kat_nama'),
				 'kat_desc' =>$this->input->post('kat_desc'),
				  'is_active' =>"1"
                  );
        // print_r($data);die;
		if($this->form_validation->run()!=FALSE){
                //pesan yang muncul jika berhasil diupload pada session flashdata
				$this->Modul_surat->get_insertkategori($data); //akses model untuk menyimpan ke database
                echo "berhasil";
			}else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                echo "error";
            }       
            // print_r($this->Modul_jenisrek->get_insertjnsrek($data));die;  
    }
	public function editkategori($id)
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['dataeditkategori']=$this->Modul_surat->get_editkategori($id);
			// print_r($this->Modul_surat->get_editjnsrek($id));die;
            $this->load->view('setup/data/kategori/editkategori',$data);
        }

	}
	public function saveeditkategori() { 
		$this->form_validation->set_rules('kat_id','ID','required');
		$this->form_validation->set_rules('kat_nama','Nama','required');
		$data = array(
				  'kat_id' =>$this->input->post('kat_id'),
				  'kat_nama' =>$this->input->post('kat_nama'),
				 'kat_desc' =>$this->input->post('kat_desc'),
				  'is_active' =>"1"
                  );
		if($this->form_validation->run()!=FALSE){
            $this->Modul_surat->moduleditkategori($data); 
             echo "berhasil";
			}else{
				echo "error";
			}
        }
	public function hapuskategori($id)
	{
		// $id = $this->input->get('wrg_nik');
	    $data = array(
			'kat_id' => $id,
			'is_active' =>"0"
			);
		$this->Modul_surat->hapus_kategori($data); 
			echo "berhasil";
			
	}
	public function detailkategori($id)
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['dataeditkategori']=$this->Modul_surat->get_editkategori($id);
			// print_r($this->Modul_kategori->get_editjnsrek($id));die;
            $this->load->view('setup/data/kategori/detailkategori',$data);
        }

	}
	// added 20191129 by asdam
	public function pdfketdomisili($id)
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['data1']=$this->Modul_surat->get_pdfketdomisili($id);
			// print_r($this->Modul_surat->get_pdfketdomisili($id));die;
            $this->load->view('berkas/surat/ketdomisili/pdfketdomisili',$data);
        }

	}
	public function listkuasa()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
            $data['datakuasa']=$this->Modul_surat->viewkuasa();
            $this->load->view('berkas/surat/kuasa/listdatakuasa',$data);
		}
		// $this->load->view('setup/data/listdatakategori');
		// print_r($this->session->userdata('fullname'));die;
	}
	public function pdfkuasa($id)
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['data1']=$this->Modul_surat->get_pdfkuasa($id);
			// print_r($this->Modul_surat->get_pdfkuasa($id));die;
            $this->load->view('berkas/surat/kuasa/pdfkuasa',$data);
        }

	}
	public function listizinmenikah()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
            $data['dataizinmenikah']=$this->Modul_surat->viewizinmenikah();
            $this->load->view('berkas/surat/izinmenikah/listdataizinmenikah',$data);
		}
		// $this->load->view('setup/data/listdatakategori');
		// print_r($this->session->userdata('fullname'));die;
	}
	public function pdfizinmenikah($id)
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['data1']=$this->Modul_surat->get_pdfizinmenikah($id);
			// print_r($this->Modul_surat->get_pdfizinmenikah($id));die;
            $this->load->view('berkas/surat/izinmenikah/pdfizinmenikah',$data);
        }

	}
	public function listsuratpengantar()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
            $data['datasuratpengantar']=$this->Modul_surat->viewsuratpengantar();
            $this->load->view('berkas/surat/pengantar/listdatasuratpengantar',$data);
		}
		// $this->load->view('setup/data/listdatakategori');
		// print_r($this->session->userdata('fullname'));die;
	}
	public function pdfsuratpengantar($id)
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['data1']=$this->Modul_surat->get_pdfsuratpengantar($id);
			// print_r($this->Modul_surat->get_pdfsuratpengantar($id));die;
            $this->load->view('berkas/surat/pengantar/pdfsuratpengantar',$data);
        }

	}
	public function listsuratkematian()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
            $data['datasuratkematian']=$this->Modul_surat->viewsuratkematian();
            $this->load->view('berkas/surat/kematian/listdatasuratkematian',$data);
		}
		// $this->load->view('setup/data/listdatakategori');
		// print_r($this->session->userdata('fullname'));die;
	}
	public function pdfsuratkematian($id)
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['data1']=$this->Modul_surat->get_pdfsuratkematian($id);
			// print_r($this->Modul_surat->get_pdfsuratkematian($id));die;
            $this->load->view('berkas/surat/kematian/pdfsuratkematian',$data);
        }

	}
	// end added
	
}

# nama file home.php
# folder apllication/controller/