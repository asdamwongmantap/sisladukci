<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// error_reporting(0);
class Warga extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->helper(array('url','form')); //load helper url 
        $this->load->library('form_validation'); //load form validation
        $this->load->model('Modul_warga');
        $this->load->model('Modul_setting');
    }
	
	public function listwarga()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
            $data['datawarga']=$this->Modul_warga->viewwarga();
            $this->load->view('setup/data/warga/listdatawarga',$data);
		}
		// $this->load->view('setup/data/listdatawarga');
		
	}
	public function add_warga()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
            // $data['data']=$this->Modul_warga->viewjenisrek();
            $this->load->view('setup/data/warga/addwarga',$data);
        }

	}
	public function savewarga(){
		$this->form_validation->set_rules('wrg_nik','NIK','required');
		$this->form_validation->set_rules('wrg_nama','Nama','required');
		$data = array(
				  'wrg_nik' =>$this->input->post('wrg_nik'),
				  'wrg_nama' =>$this->input->post('wrg_nama'),
				  'wrg_tmpatlahir' =>$this->input->post('wrg_tmpatlahir'),
				  'wrg_tgllahir' =>$this->input->post('wrg_tgllahir'),
				  'wrg_kwarganegaraan' =>$this->input->post('wrg_kwarganegaraan'),
				  'wrg_jeniskel' =>$this->input->post('wrg_jeniskel'),
				  'wrg_alamat' =>$this->input->post('wrg_alamat'),
				  'wrg_pekerjaan' =>$this->input->post('wrg_pekerjaan'),
				  'wrg_agama' =>$this->input->post('wrg_agama'),
				  'wrg_pendidikan' =>$this->input->post('wrg_pendidikan'),
				  'wrg_statuskawin' =>$this->input->post('wrg_statuskawin'),
				  'is_active' =>"1"
                  );
        // print_r($data);die;
		if($this->form_validation->run()!=FALSE){
                //pesan yang muncul jika berhasil diupload pada session flashdata
				$this->Modul_warga->get_insertwarga($data); //akses model untuk menyimpan ke database
                echo "berhasil";
			}else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                echo "error";
            }       
            // print_r($this->Modul_jenisrek->get_insertjnsrek($data));die;  
    }
	public function editwarga($id)
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['dataeditwarga']=$this->Modul_warga->get_editwarga($id);
			// print_r($this->Modul_warga->get_editjnsrek($id));die;
            $this->load->view('setup/data/warga/editwarga',$data);
        }

	}
	public function saveeditwarga() { 
		$this->form_validation->set_rules('wrg_nik','NIK','required');
		$this->form_validation->set_rules('wrg_nama','Nama','required');
		$data = array(
			'wrg_nik' =>$this->input->post('wrg_nik'),
			'wrg_nama' =>$this->input->post('wrg_nama'),
			'wrg_tmpatlahir' =>$this->input->post('wrg_tmpatlahir'),
			'wrg_tgllahir' =>$this->input->post('wrg_tgllahir'),
			'wrg_kwarganegaraan' =>$this->input->post('wrg_kwarganegaraan'),
			'wrg_jeniskel' =>$this->input->post('wrg_jeniskel'),
			'wrg_alamat' =>$this->input->post('wrg_alamat'),
			'wrg_pekerjaan' =>$this->input->post('wrg_pekerjaan'),
			'wrg_agama' =>$this->input->post('wrg_agama'),
			'wrg_pendidikan' =>$this->input->post('wrg_pendidikan'),
			'wrg_statuskawin' =>$this->input->post('wrg_statuskawin'),
			'is_active' =>"1"
			);
		if($this->form_validation->run()!=FALSE){
            $this->Modul_warga->moduleditwarga($data); 
             echo "berhasil";
			}else{
				echo "error";
			}
        }
	public function hapuswarga($id)
	{
		// $id = $this->input->get('wrg_nik');
	    $data = array(
			'wrg_nik' => $id,
			'is_active' =>"0"
			);
		$this->Modul_warga->hapus_warga($data); 
			echo "berhasil";
			
	}
	public function detailwarga($id)
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['dataeditwarga']=$this->Modul_warga->get_editwarga($id);
			// print_r($this->Modul_warga->get_editjnsrek($id));die;
            $this->load->view('setup/data/warga/detailwarga',$data);
        }

	}
	
}

# nama file home.php
# folder apllication/controller/