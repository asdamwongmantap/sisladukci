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
		$this->load->model('Modul_warga');
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
			$id = preg_replace("/-/", '/', $id);
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
			$id = preg_replace("/-/", '/', $id);
			$data['data1']=$this->Modul_surat->get_pdfkuasa($id);
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
			$id = preg_replace("/-/", '/', $id);
			$data['data1']=$this->Modul_surat->get_pdfizinmenikah($id);
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
			$id = preg_replace("/-/", '/', $id);
			$data['data1']=$this->Modul_surat->get_pdfsuratpengantar($id);
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
			$id = preg_replace("/-/", '/', $id);
			$data['data1']=$this->Modul_surat->get_pdfsuratkematian($id);
			$this->load->view('berkas/surat/kematian/pdfsuratkematian',$data);
        }

	}
	public function addketdomisili()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
            // $data['data']=$this->Modul_surat->viewjenisrek();
            $this->load->view('berkas/surat/ketdomisili/addketdomisili',$data);
        }

	}
	public function saveketdomisili(){
		$this->form_validation->set_rules('no_surat','No. Surat','required');
		$this->form_validation->set_rules('wrg_nik','NIK','required');
		$tgl_suratawal = explode("/",$this->input->post('tgl_surat'));
		  $tgl_surattgl = $tgl_suratawal[0];
		  $tgl_suratbln = $tgl_suratawal[1];
		  $tgl_suratthn = $tgl_suratawal[2];
		  $tgl_suratformat = $tgl_suratthn."-".$tgl_suratbln."-".$tgl_surattgl;
		$dataheader = array(
				  'no_surat' =>$this->input->post('no_surat'),
				  'tgl_surat' =>$tgl_suratformat,
				 'kat_id' =>'3',
				 'nik_pemohon' =>$this->input->post('wrg_nik'),
				 'tujuan' =>$this->input->post('tujuan')
				  );
		$datadetail = array(
				'no_surat' =>$this->input->post('no_surat'),
				'nama_pihak2' =>$this->input->post('wrg_namapemilik')
				
		);
        // print_r($data);die;
		if($this->form_validation->run()!=FALSE){
                //pesan yang muncul jika berhasil diupload pada session flashdata
				$this->Modul_surat->get_insertketdomisiliheader($dataheader); //akses model untuk menyimpan ke database
				$this->Modul_surat->get_insertketdomisilidetail($datadetail);
                echo "berhasil";
			}else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                echo "error";
            }       
            // print_r($this->Modul_jenisrek->get_insertjnsrek($data));die;  
	}
	public function addsuratkuasa()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
            // $data['data']=$this->Modul_surat->viewjenisrek();
            $this->load->view('berkas/surat/kuasa/addkuasa',$data);
        }

	}
	public function savekuasa(){
		$this->form_validation->set_rules('no_surat','No. Surat','required');
		$this->form_validation->set_rules('wrg_nik','NIK','required');
		$tgl_suratawal = explode("/",$this->input->post('tgl_surat'));
		  $tgl_surattgl = $tgl_suratawal[0];
		  $tgl_suratbln = $tgl_suratawal[1];
		  $tgl_suratthn = $tgl_suratawal[2];
		  $tgl_suratformat = $tgl_suratthn."-".$tgl_suratbln."-".$tgl_surattgl;

		  $tgllahir_pihak2awal = explode("/",$this->input->post('tgllahir_pihak2'));
		  $tgllahir_pihak2tgl = $tgllahir_pihak2awal[0];
		  $tgllahir_pihak2bln = $tgllahir_pihak2awal[1];
		  $tgllahir_pihak2thn = $tgllahir_pihak2awal[2];
		  $tgllahir_pihak2format = $tgllahir_pihak2thn."-".$tgllahir_pihak2bln."-".$tgllahir_pihak2tgl;
		$dataheader = array(
				  'no_surat' =>$this->input->post('no_surat'),
				  'tgl_surat' =>$tgl_suratformat,
				 'kat_id' =>'1',
				 'nik_pemohon' =>$this->input->post('wrg_nik'),
				 'tujuan' =>$this->input->post('tujuan')
				  );
		$datadetail = array(
				'no_surat' =>$this->input->post('no_surat'),
				'nama_pihak2' =>$this->input->post('wrg_namapihak2'),
				'tmpatlahir_pihak2' =>$this->input->post('tmpatlahir_pihak2'),
				'tgllahir_pihak2' =>$tgllahir_pihak2format,
				'pekerjaan_pihak2' =>$this->input->post('pekerjaan_pihak2'),
				'alamat_pihak2' =>$this->input->post('alamat_pihak2')
				
		);
        // print_r($data);die;
		if($this->form_validation->run()!=FALSE){
                //pesan yang muncul jika berhasil diupload pada session flashdata
				$this->Modul_surat->get_insertketdomisiliheader($dataheader); //akses model untuk menyimpan ke database
				$this->Modul_surat->get_insertketdomisilidetail($datadetail);
                echo "berhasil";
			}else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                echo "error";
            }       
            // print_r($this->Modul_jenisrek->get_insertjnsrek($data));die;  
	}
	public function addizinmenikah()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
            // $data['data']=$this->Modul_surat->viewjenisrek();
            $this->load->view('berkas/surat/izinmenikah/addizinmenikah',$data);
        }

	}
	public function saveizinmenikah(){
		$this->form_validation->set_rules('no_surat','No. Surat','required');
		$this->form_validation->set_rules('wrg_nik','NIK','required');
		$tgl_suratawal = explode("/",$this->input->post('tgl_surat'));
		  $tgl_surattgl = $tgl_suratawal[0];
		  $tgl_suratbln = $tgl_suratawal[1];
		  $tgl_suratthn = $tgl_suratawal[2];
		  $tgl_suratformat = $tgl_suratthn."-".$tgl_suratbln."-".$tgl_surattgl;

		  $tgllahir_pihak2awal = explode("/",$this->input->post('tgllahir_pihak2'));
		  $tgllahir_pihak2tgl = $tgllahir_pihak2awal[0];
		  $tgllahir_pihak2bln = $tgllahir_pihak2awal[1];
		  $tgllahir_pihak2thn = $tgllahir_pihak2awal[2];
		  $tgllahir_pihak2format = $tgllahir_pihak2thn."-".$tgllahir_pihak2bln."-".$tgllahir_pihak2tgl;

		  $tgllahir_pihak3awal = explode("/",$this->input->post('tgllahir_pihak3'));
		  $tgllahir_pihak3tgl = $tgllahir_pihak3awal[0];
		  $tgllahir_pihak3bln = $tgllahir_pihak3awal[1];
		  $tgllahir_pihak3thn = $tgllahir_pihak3awal[2];
		  $tgllahir_pihak3format = $tgllahir_pihak3thn."-".$tgllahir_pihak3bln."-".$tgllahir_pihak3tgl;
		$dataheader = array(
				  'no_surat' =>$this->input->post('no_surat'),
				  'tgl_surat' =>$tgl_suratformat,
				 'kat_id' =>'2',
				 'nik_pemohon' =>$this->input->post('wrg_nik'),
				 'tujuan' =>$this->input->post('tujuan')
				  );
		$datadetail = array(
				'no_surat' =>$this->input->post('no_surat'),
				'nama_pihak2' =>$this->input->post('wrg_namapihak2'),
				'tmpatlahir_pihak2' =>$this->input->post('tmpatlahir_pihak2'),
				'tgllahir_pihak2' =>$tgllahir_pihak2format,
				'pekerjaan_pihak2' =>$this->input->post('pekerjaan_pihak2'),
				'alamat_pihak2' =>$this->input->post('alamat_pihak2'),
				'nama_pihak3' =>$this->input->post('wrg_namapihak3'),
				'tmpatlahir_pihak3' =>$this->input->post('tmpatlahir_pihak3'),
				'tgllahir_pihak3' =>$tgllahir_pihak3format,
				
		);
        // print_r($data);die;
		if($this->form_validation->run()!=FALSE){
                //pesan yang muncul jika berhasil diupload pada session flashdata
				$this->Modul_surat->get_insertketdomisiliheader($dataheader); //akses model untuk menyimpan ke database
				$this->Modul_surat->get_insertketdomisilidetail($datadetail);
                echo "berhasil";
			}else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                echo "error";
            }       
            // print_r($this->Modul_jenisrek->get_insertjnsrek($data));die;  
	}
	public function addpengantar()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
            // $data['data']=$this->Modul_surat->viewjenisrek();
            $this->load->view('berkas/surat/pengantar/addpengantar',$data);
        }

	}
	public function savepengantar(){
		$this->form_validation->set_rules('no_surat','No. Surat','required');
		$this->form_validation->set_rules('wrg_nik','NIK','required');
		$tgl_suratawal = explode("/",$this->input->post('tgl_surat'));
		  $tgl_surattgl = $tgl_suratawal[0];
		  $tgl_suratbln = $tgl_suratawal[1];
		  $tgl_suratthn = $tgl_suratawal[2];
		  $tgl_suratformat = $tgl_suratthn."-".$tgl_suratbln."-".$tgl_surattgl;
		$dataheader = array(
				  'no_surat' =>$this->input->post('no_surat'),
				  'tgl_surat' =>$tgl_suratformat,
				 'kat_id' =>'5',
				 'nik_pemohon' =>$this->input->post('wrg_nik'),
				 'tujuan' =>$this->input->post('tujuan')
				  );
		$datadetail = array(
				'no_surat' =>$this->input->post('no_surat')
				
		);
        // print_r($data);die;
		if($this->form_validation->run()!=FALSE){
                //pesan yang muncul jika berhasil diupload pada session flashdata
				$this->Modul_surat->get_insertketdomisiliheader($dataheader); //akses model untuk menyimpan ke database
				$this->Modul_surat->get_insertketdomisilidetail($datadetail);
                echo "berhasil";
			}else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                echo "error";
            }       
            // print_r($this->Modul_jenisrek->get_insertjnsrek($data));die;  
	}
	public function addsuratkematian()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
            // $data['data']=$this->Modul_surat->viewjenisrek();
            $this->load->view('berkas/surat/kematian/addsuratkematian',$data);
        }

	}
	public function savesuratkematian(){
		$this->form_validation->set_rules('no_surat','No. Surat','required');
		$this->form_validation->set_rules('wrg_nik','NIK','required');
		$tgl_suratawal = explode("/",$this->input->post('tgl_surat'));
		  $tgl_surattgl = $tgl_suratawal[0];
		  $tgl_suratbln = $tgl_suratawal[1];
		  $tgl_suratthn = $tgl_suratawal[2];
		  $tgl_suratformat = $tgl_suratthn."-".$tgl_suratbln."-".$tgl_surattgl;

		  $wrg_tglmeninggalawal = explode("/",$this->input->post('wrg_tglmeninggal'));
		  $wrg_tglmeninggaltgl = $wrg_tglmeninggalawal[0];
		  $wrg_tglmeninggalbln = $wrg_tglmeninggalawal[1];
		  $wrg_tglmeninggalthn = $wrg_tglmeninggalawal[2];
		  $wrg_tglmeninggalformat = $wrg_tglmeninggalthn."-".$wrg_tglmeninggalbln."-".$wrg_tglmeninggaltgl;
		$dataheader = array(
				  'no_surat' =>$this->input->post('no_surat'),
				  'tgl_surat' =>$tgl_suratformat,
				 'kat_id' =>'4',
				 'nik_pemohon' =>$this->input->post('wrg_nik'),
				 'tujuan' =>$this->input->post('tujuan')
				  );
		$datadetail = array(
				'no_surat' =>$this->input->post('no_surat'),
				'wrg_harimeninggal' =>$this->input->post('wrg_harimeninggal'),
				'wrg_tglmeninggal' =>$wrg_tglmeninggalformat
								
		);
		$datameninggal = array(
			'wrgmeninggal_nik' =>$this->input->post('wrg_nik'),
			'wrgmeninggal_tgl' =>$wrg_tglmeninggalformat,
			'wrgmeninggal_tempat' =>$this->input->post('wrgmeninggal_tempat'),
			'wrgmeninggal_sebab' =>$this->input->post('wrgmeninggal_sebab')
			);
  $data = array(
		  'wrg_nik' =>$this->input->post('wrg_nik'),
		  'is_active' =>"0"
  );
        // print_r($data);die;
		if($this->form_validation->run()!=FALSE){
                //pesan yang muncul jika berhasil diupload pada session flashdata
				$this->Modul_surat->get_insertketdomisiliheader($dataheader); //akses model untuk menyimpan ke database
				$this->Modul_surat->get_insertketdomisilidetail($datadetail);
				$this->Modul_warga->get_insertmeninggalwarga($datameninggal); //akses model untuk menyimpan ke database
					$this->Modul_warga->moduleditwarga($data);
                echo "berhasil";
			}else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                echo "error";
            }       
            // print_r($this->Modul_jenisrek->get_insertjnsrek($data));die;  
	}
	// end added
	
}

# nama file home.php
# folder apllication/controller/