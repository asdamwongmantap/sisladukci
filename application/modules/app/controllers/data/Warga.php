<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// error_reporting(1);
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
			$data['namakry'] = $this->session->userdata('fullname');
			$data['dataeditwarga']=$this->Modul_warga->get_editwarga($id);
			// print_r($this->Modul_warga->get_editjnsrek($id));die;
            $this->load->view('setup/data/warga/editwarga',$data);
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
	
	// added 20191029 by asdam
	public function listkepalakeluarga()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
            $data['datakepalakeluarga']=$this->Modul_warga->viewkepalakeluarga();
            $this->load->view('setup/data/warga/listdatakepalakeluarga',$data);
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
	public function addkepalakeluarga()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
            // $data['data']=$this->Modul_warga->viewjenisrek();
            $this->load->view('setup/data/warga/addkepalakeluarga',$data);
        }

	}
	public function savekepalakeluarga(){
		$this->form_validation->set_rules('wrg_nokk','No. KK','required');
		
		$data = array(
				  'wrg_nokk' =>$this->input->post('wrg_nokk'),
				  'wrg_alamat' =>$this->input->post('wrg_alamat'),
				  'is_active' =>"1"
				  );
		$datadetail = array(
				'wrg_nik' =>$this->input->post('wrg_nik'),
				'wrg_nokk' =>$this->input->post('wrg_nokk'),
				'wrg_alamat' =>$this->input->post('wrg_alamat'),
				'wrg_statushubungan' =>"Kepala Keluarga",
				'is_active' =>"0"
		);
        // print_r($data);die;
		if($this->form_validation->run()!=FALSE){
                //pesan yang muncul jika berhasil diupload pada session flashdata
				$this->Modul_warga->get_insertkepalakeluarga($data,$datadetail);
				// $this->Modul_warga->get_insertkepalakeluargadetail($datadetail); //akses model untuk menyimpan ke database
                echo "berhasil";
			}else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                echo "error";
            }       
            // print_r($this->Modul_jenisrek->get_insertjnsrek($data));die;  
	}
	public function editkepalakeluarga($id)
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
			$data['dataeditkepalakeluarga']=$this->Modul_warga->get_editkepalakeluarga($id);
			// print_r($this->Modul_warga->get_editjnsrek($id));die;
            $this->load->view('setup/data/warga/editkepalakeluarga',$data);
        }

	}
	public function saveeditkepalakeluarga(){
		$this->form_validation->set_rules('wrg_nokk','No. KK','required');
		
		$data = array(
				  'wrg_nokk' =>$this->input->post('wrg_nokk'),
				  'wrg_alamat' =>$this->input->post('wrg_alamat'),
				  'is_active' =>"1"
				  );
		$datadetail = array(
				'wrg_nik' =>$this->input->post('wrg_nik'),
				'wrg_nokk' =>$this->input->post('wrg_nokk'),
				'wrg_alamat' =>$this->input->post('wrg_alamat'),
				'wrg_statushubungan' =>"Kepala Keluarga",
				'is_active' =>"1"
		);
        // print_r($data);die;
		if($this->form_validation->run()!=FALSE){
                //pesan yang muncul jika berhasil diupload pada session flashdata
				$this->Modul_warga->moduleditkepalakeluarga($data,$datadetail);
				// $this->Modul_warga->get_insertkepalakeluargadetail($datadetail); //akses model untuk menyimpan ke database
                echo "berhasil";
			}else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                echo "error";
            }       
            // print_r($this->Modul_jenisrek->get_insertjnsrek($data));die;  
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
	public function adddetailkeluarga()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
            // $data['data']=$this->Modul_warga->viewjenisrek();
            $this->load->view('setup/data/warga/adddetailkeluarga',$data);
        }

	}
	public function get_noktp()
    {
		$wrgnik = $this->input->get_post("wrgnik");
		$searchby = $this->input->get_post("searchby");
		if ($searchby == "noktp"){
			$datanik = array(
				'wrg_nik' => $wrgnik
			);
			// echo $this->Modul_warga->get_noktpmod($datanik);
		}else {
			$datanik = array(
				'wrg_nokk' => $wrgnik
			);
			// echo $this->Modul_warga->get_noktpmod($datanik);
		}
		echo $this->Modul_warga->get_noktpmod($datanik);
	
	}
	public function savedetailkeluarga(){
		$this->form_validation->set_rules('wrg_nik','NIK','required');
		$this->form_validation->set_rules('wrg_nama','Nama','required');
		
		
  $datanik = array(
			 'wrg_nik' =>$this->input->post('wrg_nik')
		  );
		$hasilnik = $this->Modul_warga->cek_nik($datanik);
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
			'wrg_nohp' =>$this->input->post('wrg_nohp'),
			'wrg_nokk' =>$this->input->post('wrg_nokk'),
			'is_active' =>"1"
			);
		if($this->form_validation->run()!=FALSE){
			if ($hasilnik->num_rows() > 0) {
				// if ($hasilnik->result()[0]->wrg_nokk != $this->input->post('wrg_nokk')){
				// }
				$this->Modul_warga->moduleditwarga($data); //akses model untuk menyimpan ke database
                echo "berhasil";
			}else{
				$this->Modul_warga->get_insertwarga($data); //akses model untuk menyimpan ke database
				echo "berhasil";
				// echo e;
			}
        }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                echo "error";
				// echo e;
			}       
            // print_r($this->Modul_jenisrek->get_insertjnsrek($data));die;  
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
	public function editdetailkeluarga($id)
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
			$data['dataeditwarga']=$this->Modul_warga->get_editwarga($id);
			// print_r($this->Modul_warga->get_editjnsrek($id));die;
            $this->load->view('setup/data/warga/editdetailkeluarga',$data);
        }

	}
	public function saveeditdetailkeluarga() { 
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
			$datanik = array(
				'wrg_nik' =>$this->input->post('wrg_nik')
			 );
		   $hasilnik = $this->Modul_warga->cek_nik($datanik);	
		if($this->form_validation->run()!=FALSE){
			if ($hasilnik->num_rows() > 0) {
				echo "duplicate";
			}else {
				$this->Modul_warga->moduleditwarga($data); 
             	echo "berhasil";
			}
            
			}else{
				echo "error";
			}
		}
		public function addpindahwarga()
		{
			if (!$this->session->userdata('username')){
				redirect(base_url());
			}else{
				$generalcode = "SETTING_DASHBOARD";
				$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
				$data['namakry'] = $this->session->userdata('fullname');
				// $data['data']=$this->Modul_warga->viewjenisrek();
				$this->load->view('setup/data/warga/addpindahwarga',$data);
			}
	
		}
		public function savepindahwarga(){
			$this->form_validation->set_rules('wrg_nama','NAMA','required');
			if ($this->input->post('wrg_nik') != ""){
				$wrgnik = $this->input->post('wrg_nik');
			}else {
				$wrgnik = $this->input->post('wrg_nokk');
			}
			$data = array(
					  'wrgpindah_nik' =>$wrgnik,
					  'wrgpindah_tgl' =>$this->input->post('wrgpindah_tgl'),
					  'wrgpindah_alamat' =>$this->input->post('wrgpindah_tujuan'),
					  'is_active' =>"1",
					  'wrgpindah_alasan' =>$this->input->post('wrgpindah_alasan')
					  );
			// print_r($data);die;
			if($this->form_validation->run()!=FALSE){
					//pesan yang muncul jika berhasil diupload pada session flashdata
					$this->Modul_warga->get_insertpindahwarga($data); //akses model untuk menyimpan ke database
					echo "berhasil";
				}else{
					//pesan yang muncul jika terdapat error dimasukkan pada session flashdata
					echo "error";
				}       
				// print_r($this->Modul_jenisrek->get_insertjnsrek($data));die;  
		}
	
}

# nama file home.php
# folder apllication/controller/