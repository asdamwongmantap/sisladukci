<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// error_reporting(0);
class Petugas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->helper(array('url','form')); //load helper url 
        $this->load->library('form_validation'); //load form validation
        $this->load->model('Modul_petugas');
        $this->load->model('Modul_setting');
    }
	
	public function listpetugas()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
            $data['datapetugas']=$this->Modul_petugas->viewpetugas();
            $this->load->view('setup/data/petugas/listdatapetugas',$data);
		}
		// $this->load->view('setup/data/listdatapetugas');
		
	}
	public function add_petugas()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
            // $data['data']=$this->Modul_petugas->viewjenisrek();
            $this->load->view('setup/data/petugas/addpetugas',$data);
        }

	}
	public function savepetugas(){
		$this->form_validation->set_rules('ptg_nip','NIP','required');
		$this->form_validation->set_rules('ptg_nama','Nama','required');
		$data = array(
				  'ptg_nip' =>$this->input->post('ptg_nip'),
				  'ptg_nama' =>$this->input->post('ptg_nama'),
				 'ptg_alamat' =>$this->input->post('ptg_alamat'),
				  'ptg_email' =>$this->input->post('ptg_email'),
				  'ptg_nohp' =>$this->input->post('ptg_nohp'),
				  'ptg_posisi' =>$this->input->post('ptg_posisi'),
				  'ptg_username' =>$this->input->post('ptg_username'),
				  'ptg_password' =>md5($this->input->post('ptg_password')),
				  'ptg_usergroupid' =>$this->input->post('ptg_usergroupid'),
				  'is_active' =>"1"
                  );
        // print_r($data);die;
		if($this->form_validation->run()!=FALSE){
                //pesan yang muncul jika berhasil diupload pada session flashdata
				$this->Modul_petugas->get_insertpetugas($data); //akses model untuk menyimpan ke database
                echo "berhasil";
			}else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                echo "error";
            }       
            // print_r($this->Modul_jenisrek->get_insertjnsrek($data));die;  
    }
	public function editpetugas($id)
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['dataeditpetugas']=$this->Modul_petugas->get_editpetugas($id);
			// print_r($this->Modul_petugas->get_editjnsrek($id));die;
            $this->load->view('setup/data/petugas/editpetugas',$data);
        }

	}
	public function saveeditpetugas() { 
		$this->form_validation->set_rules('ptg_nip','NIP','required');
		$this->form_validation->set_rules('ptg_nama','Nama','required');
		$data = array(
				  'ptg_nip' =>$this->input->post('ptg_nip'),
				  'ptg_nama' =>$this->input->post('ptg_nama'),
				 'ptg_alamat' =>$this->input->post('ptg_alamat'),
				  'ptg_email' =>$this->input->post('ptg_email'),
				  'ptg_nohp' =>$this->input->post('ptg_nohp'),
				  'ptg_posisi' =>$this->input->post('ptg_posisi'),
				  'ptg_username' =>$this->input->post('ptg_username'),
				  'ptg_password' => md5($this->input->post('ptg_password')),
				  'ptg_usergroupid' =>$this->input->post('ptg_usergroupid'),
				  'is_active' =>"1"
                  );
		if($this->form_validation->run()!=FALSE){
            $this->Modul_petugas->moduleditpetugas($data); 
             echo "berhasil";
			}else{
				echo "error";
			}
        }
	public function hapuspetugas($id)
	{
		// $id = $this->input->get('wrg_nik');
	    $data = array(
			'ptg_nip' => $id,
			'is_active' =>"0"
			);
		$this->Modul_petugas->hapus_petugas($data); 
			echo "berhasil";
			
	}
	public function detailpetugas($id)
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['dataeditpetugas']=$this->Modul_petugas->get_editpetugas($id);
			// print_r($this->Modul_petugas->get_editjnsrek($id));die;
            $this->load->view('setup/data/petugas/detailpetugas',$data);
        }

	}
	
}

# nama file home.php
# folder apllication/controller/