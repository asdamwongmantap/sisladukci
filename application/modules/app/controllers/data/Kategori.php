<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// error_reporting(0);
class Kategori extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->helper(array('url','form')); //load helper url 
        $this->load->library('form_validation'); //load form validation
        $this->load->model('Modul_kategori');
        $this->load->model('Modul_setting');
    }
	
	public function listkategori()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
            $data['datakategori']=$this->Modul_kategori->viewkategori();
            $this->load->view('setup/data/kategori/listdatakategori',$data);
		}
		// $this->load->view('setup/data/listdatakategori');
		
	}
	public function add_kategori()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
            // $data['data']=$this->Modul_kategori->viewjenisrek();
            $this->load->view('setup/data/kategori/addkategori',$data);
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
				$this->Modul_kategori->get_insertkategori($data); //akses model untuk menyimpan ke database
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
			$data['dataeditkategori']=$this->Modul_kategori->get_editkategori($id);
			// print_r($this->Modul_kategori->get_editjnsrek($id));die;
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
            $this->Modul_kategori->moduleditkategori($data); 
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
		$this->Modul_kategori->hapus_kategori($data); 
			echo "berhasil";
			
	}
	public function detailkategori($id)
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['dataeditkategori']=$this->Modul_kategori->get_editkategori($id);
			// print_r($this->Modul_kategori->get_editjnsrek($id));die;
            $this->load->view('setup/data/kategori/detailkategori',$data);
        }

	}
	
}

# nama file home.php
# folder apllication/controller/