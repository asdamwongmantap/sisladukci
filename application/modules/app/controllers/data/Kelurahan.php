<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// error_reporting(0);
class Kelurahan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->helper(array('url','form')); //load helper url 
        $this->load->library('form_validation'); //load form validation
        $this->load->model('Modul_kelurahan');
        $this->load->model('Modul_setting');
    }
	
	public function listkelurahan()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
            $data['datakelurahan']=$this->Modul_kelurahan->viewkelurahan();
            $this->load->view('setup/data/kelurahan/listdatakelurahan',$data);
		}
		// $this->load->view('setup/data/listdatakelurahan');
		
	}
	public function add_kelurahan()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
            // $data['data']=$this->Modul_kelurahan->viewjenisrek();
            $this->load->view('setup/data/kelurahan/addkelurahan',$data);
        }

	}
	public function savekelurahan(){
		$this->form_validation->set_rules('kel_id','ID','required');
		$this->form_validation->set_rules('kel_nama','Nama','required');
		$data = array(
				  'kel_id' =>$this->input->post('kel_id'),
				  'kel_nama' =>$this->input->post('kel_nama'),
				 'kel_alamat' =>$this->input->post('kel_alamat'),
				  'is_active' =>"1"
                  );
        // print_r($data);die;
		if($this->form_validation->run()!=FALSE){
                //pesan yang muncul jika berhasil diupload pada session flashdata
				$this->Modul_kelurahan->get_insertkelurahan($data); //akses model untuk menyimpan ke database
                echo "berhasil";
			}else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                echo "error";
            }       
            // print_r($this->Modul_jenisrek->get_insertjnsrek($data));die;  
    }
	public function editkelurahan($id)
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
			$data['dataeditkelurahan']=$this->Modul_kelurahan->get_editkelurahan($id);
			// print_r($this->Modul_kelurahan->get_editjnsrek($id));die;
            $this->load->view('setup/data/kelurahan/editkelurahan',$data);
        }

	}
	public function saveeditkelurahan() { 
		$this->form_validation->set_rules('kel_id','ID','required');
		$this->form_validation->set_rules('kel_nama','Nama','required');
		$data = array(
				  'kel_id' =>$this->input->post('kel_id'),
				  'kel_nama' =>$this->input->post('kel_nama'),
				 'kel_alamat' =>$this->input->post('kel_alamat'),
				  'is_active' =>"1"
                  );
		if($this->form_validation->run()!=FALSE){
            $this->Modul_kelurahan->moduleditkelurahan($data); 
             echo "berhasil";
			}else{
				echo "error";
			}
        }
	public function hapuskelurahan($id)
	{
		// $id = $this->input->get('wrg_nik');
	    $data = array(
			'kel_id' => $id,
			'is_active' =>"0"
			);
		$this->Modul_kelurahan->hapus_kelurahan($data); 
			echo "berhasil";
			
	}
	public function detailkelurahan($id)
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
			$data['dataeditkelurahan']=$this->Modul_kelurahan->get_editkelurahan($id);
			// print_r($this->Modul_kelurahan->get_editjnsrek($id));die;
            $this->load->view('setup/data/kelurahan/detailkelurahan',$data);
        }

	}
	
}

# nama file home.php
# folder apllication/controller/