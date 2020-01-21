<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// error_reporting(0);
class Transaksi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->helper(array('url','form')); //load helper url 
        $this->load->library('form_validation'); //load form validation
        $this->load->model('Modul_transaksi');
		$this->load->model('Modul_setting');
		$this->load->model('Modul_warga');
    }
	
	public function listtransaksi()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
            $data['datatransaksi']=$this->Modul_transaksi->viewtransaksi();
            $this->load->view('transaksi/listdatatransaksi',$data);
		}
		// $this->load->view('setup/data/listdatakategori');
		// print_r($this->session->userdata('fullname'));die;
	}
	public function addtransaksi()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['saldo']=$this->Modul_transaksi->getsaldo();
			// print_r($this->Modul_transaksi->getsaldo());die();
            $this->load->view('transaksi/addtransaksi',$data);
        }

	}
	public function savetransaksi()
	{
		$this->form_validation->set_rules('no_transaksi','No. Transaksi','required');
		// $this->form_validation->set_rules('wrg_nik','NIK','required');
		$tgl_transaksiawal = explode("/",$this->input->post('tgl_transaksi'));
		  $tgl_transaksitgl = $tgl_transaksiawal[0];
		  $tgl_transaksibln = $tgl_transaksiawal[1];
		  $tgl_transaksithn = $tgl_transaksiawal[2];
		  $tgl_transaksiformat = $tgl_transaksithn."-".$tgl_transaksibln."-".$tgl_transaksitgl;
		if ($this->input->post('jenis_transaksi') == "Debit"){
			$saldoakhir = intval($this->input->post('saldo_terakhir')) + intval($this->input->post('saldo_debit'));
		}else {
			$saldoakhir = intval($this->input->post('saldo_terakhir')) - intval($this->input->post('saldo_kredit'));
		}
		$data = array(
				  'no_transaksi' =>$this->input->post('no_transaksi'),
				//   'tgl_transaksi' =>$tgl_transaksiformat,
				 'jenis_transaksi' =>$this->input->post('jenis_transaksi'),
				 'ket_transaksi' =>$this->input->post('ket_transaksi'),
				 'saldo_debit' =>$this->input->post('saldo_debit'),
				 'saldo_kredit' =>$this->input->post('saldo_kredit'),
				 'saldo_akhir' => $saldoakhir
				  );
		
        // print_r($data);die;
		if($this->form_validation->run()!=FALSE){
                //pesan yang muncul jika berhasil diupload pada session flashdata
				$this->Modul_transaksi->get_inserttransaksi($data); //akses model untuk menyimpan ke database
				// $this->Modul_surat->get_insertketdomisilidetail($datadetail);
                echo "berhasil";
			}else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                echo "error";
            }       
            // print_r($this->Modul_jenisrek->get_insertjnsrek($data));die;  
	}
	public function listiuranbln()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
            $data['dataiuran']=$this->Modul_transaksi->viewiuran();
            $this->load->view('transaksi/iuranbulanan/listdataiuran',$data);
		}
		// $this->load->view('setup/data/listdatakategori');
		// print_r($this->session->userdata('fullname'));die;
	}
	public function bayariuran($id)
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
			$generalcode = "SETTING_DASHBOARD";
			$nik = $id;
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['saldonik']=$this->Modul_transaksi->getsaldonik($nik)[0]->saldo_akhir;
			$data['nourutiuran']=$this->Modul_transaksi->getnourutiuran()[0]->no_transaksi;
			$datanik = array(
				'wrg_nik' =>$nik
			 );
	
		   $ceknik = $this->Modul_warga->cek_nik($datanik);
		   $hasilnik = $ceknik->result();
		   $data['hasilnik']=$hasilnik;
			// print_r($this->Modul_transaksi->getsaldonik($nik)[0]->saldo_akhir);die();
            $this->load->view('transaksi/iuranbulanan/bayariuran',$data);
        }

	}
	public function saveiuran()
	{
		$this->form_validation->set_rules('no_transaksi','No. Transaksi','required');
		// $this->form_validation->set_rules('wrg_nik','NIK','required');
		$tgl_transaksiawal = explode("/",$this->input->post('tgl_transaksi'));
		  $tgl_transaksitgl = $tgl_transaksiawal[0];
		  $tgl_transaksibln = $tgl_transaksiawal[1];
		  $tgl_transaksithn = $tgl_transaksiawal[2];
		  $tgl_transaksiformat = $tgl_transaksithn."-".$tgl_transaksibln."-".$tgl_transaksitgl;
		if ($this->input->post('jenis_transaksi') == "Debit"){
			$saldoakhir = intval($this->input->post('saldo_terakhir')) + intval($this->input->post('saldo_debit'));
		}else {
			$saldoakhir = intval($this->input->post('saldo_terakhir')) - intval($this->input->post('saldo_kredit'));
		}
		if (intval($this->input->post('no_transaksi')) >= 1 && intval($this->input->post('no_transaksi')) < 10){
			$nourutiuran = "00";
		}else if (intval($this->input->post('no_transaksi')) >= 10 && intval($this->input->post('no_transaksi')) <= 99){
			$nourutiuran = "0";
		}else {
			$nourutiuran = "";
		}
		$dataheader = array(
				  'no_transaksi' =>"IUBLN".$nourutiuran.$this->input->post('no_transaksi'),
				  'tgl_transaksi' =>$tgl_transaksiformat,
				 'jenis_transaksi' =>$this->input->post('jenis_transaksi'),
				 'ket_transaksi' =>$this->input->post('ket_transaksi'),
				 'wrg_nik' =>$this->input->post('wrg_nik'),
				 'saldo_akhir' => $saldoakhir
				  );
		$datadetail = array(
				'no_transaksi' =>"IUBLN".$nourutiuran.$this->input->post('no_transaksi'),
				'saldo_debit' =>$this->input->post('saldo_debit'),
				'saldo_kredit' =>"0"
				
		);
		
        // print_r($data);die;
		if($this->form_validation->run()!=FALSE){
                //pesan yang muncul jika berhasil diupload pada session flashdata
				$this->Modul_transaksi->get_inserttransaksiheader($dataheader); 
				$this->Modul_transaksi->get_inserttransaksidetail($datadetail); 
				$nohp = $this->input->post('wrg_nohp');
				$message = "Pembayaran_iuran_warga_telah_diterima,Terimakasih_sudah_melakukan_pembayaran_iuran_warga";
				
				$url = file_get_contents('https://sms.smartme.co.id');
				
				$response = json_decode($url);
                echo "berhasil";
			}else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                echo "error";
            }       
            // print_r($this->Modul_jenisrek->get_insertjnsrek($data));die;  
	}
	public function detailiuran($id)
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
			$data['dataeditiuran']=$this->Modul_transaksi->get_editiuran($id);
			// print_r($this->Modul_transaksi->viewiurandetail($id));die;
			$data['dataiuran']=$this->Modul_transaksi->viewiurandetail($id);
			$this->load->view('transaksi/iuranbulanan/detailiuran',$data);
        }

	}
	// added 20191211 by asdam
	public function listsumbangan()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
			$data['datasumbangan']=$this->Modul_transaksi->viewsumbangan();
			// print_r($this->Modul_transaksi->viewsumbangan());die;
            $this->load->view('transaksi/sumbangan/listdatasumbangan',$data);
		}
		// $this->load->view('setup/data/listdatakategori');
		// print_r($this->session->userdata('fullname'));die;
	}
	public function bayarsumbangan($id)
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
			$generalcode = "SETTING_DASHBOARD";
			$nik = $id;
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['saldonik']=$this->Modul_transaksi->getsaldo()[0]->totalsaldodebit;
			$data['nourutsumbangan']=$this->Modul_transaksi->getnourutsumbangan()[0]->no_transaksi;
			// print_r($this->Modul_transaksi->getsaldo()[0]);die();
            $this->load->view('transaksi/sumbangan/bayarsumbangan',$data);
        }

	}
	public function savesumbangan()
	{
		$this->form_validation->set_rules('no_transaksi','No. Transaksi','required');
		// $this->form_validation->set_rules('wrg_nik','NIK','required');
		$tgl_transaksiawal = explode("/",$this->input->post('tgl_transaksi'));
		  $tgl_transaksitgl = $tgl_transaksiawal[0];
		  $tgl_transaksibln = $tgl_transaksiawal[1];
		  $tgl_transaksithn = $tgl_transaksiawal[2];
		  $tgl_transaksiformat = $tgl_transaksithn."-".$tgl_transaksibln."-".$tgl_transaksitgl;
		if ($this->input->post('jenis_transaksi') == "Debit"){
			$saldoakhir = intval($this->input->post('saldo_terakhir')) + intval($this->input->post('saldo_debit'));
		}else {
			$saldoakhir = intval($this->input->post('saldo_terakhir')) - intval($this->input->post('saldo_kredit'));
		}
		if (intval($this->input->post('no_transaksi')) >= 1 && intval($this->input->post('no_transaksi')) < 10){
			$nourutsumbangan = "00";
		}else if (intval($this->input->post('no_transaksi')) >= 10 && intval($this->input->post('no_transaksi')) <= 99){
			$nourutsumbangan = "0";
		}else {
			$nourutsumbangan = "";
		}
		$dataheader = array(
				  'no_transaksi' =>"SMBGN".$nourutsumbangan.$this->input->post('no_transaksi'),
				  'tgl_transaksi' =>$tgl_transaksiformat,
				 'jenis_transaksi' =>$this->input->post('jenis_transaksi'),
				 'ket_transaksi' =>$this->input->post('ket_transaksi'),
				 'donatur_nama' =>$this->input->post('donatur_nama'),
				 'saldo_akhir' => $saldoakhir
				  );
		$datadetail = array(
				'no_transaksi' =>"SMBGN".$nourutsumbangan.$this->input->post('no_transaksi'),
				'saldo_debit' =>$this->input->post('saldo_debit'),
				'saldo_kredit' =>"0"
				
		);
		
        // print_r($data);die;
		if($this->form_validation->run()!=FALSE){
                //pesan yang muncul jika berhasil diupload pada session flashdata
				$this->Modul_transaksi->get_inserttransaksiheader($dataheader); 
				$this->Modul_transaksi->get_inserttransaksidetail($datadetail); 
				// $this->Modul_surat->get_insertketdomisilidetail($datadetail);
                echo "berhasil";
			}else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                echo "error";
            }       
            // print_r($this->Modul_jenisrek->get_insertjnsrek($data));die;  
	}
	public function detailsumbangan($id)
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
			$data['dataeditsumbangan']=$this->Modul_transaksi->get_editsumbangan($id);
			// print_r($this->Modul_transaksi->viewsumbangandetail($id));die;
			$data['datasumbangan']=$this->Modul_transaksi->viewsumbangandetail($id);
			$this->load->view('transaksi/sumbangan/detailsumbangan',$data);
        }

	}
	// added 20191212 by asdam
	public function listpengeluaran()
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
			$data['datapengeluaran']=$this->Modul_transaksi->viewpengeluaran();
			// print_r($this->Modul_transaksi->viewpengeluaran());die;
            $this->load->view('transaksi/pengeluaran/listdatapengeluaran',$data);
		}
		// $this->load->view('setup/data/listdatakategori');
		// print_r($this->session->userdata('fullname'));die;
	}
	public function addpengeluaran($id)
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
			$generalcode = "SETTING_DASHBOARD";
			$nik = $id;
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['saldonik']=$this->Modul_transaksi->getsaldo()[0]->totalsaldodebit;
			$data['nourutpengeluaran']=$this->Modul_transaksi->getnourutpengeluaran()[0]->no_transaksi;
			// print_r($this->Modul_transaksi->getsaldo()[0]);die();
            $this->load->view('transaksi/pengeluaran/addpengeluaran',$data);
        }

	}
	public function savepengeluaran()
	{
		$this->form_validation->set_rules('no_transaksi','No. Transaksi','required');
		// $this->form_validation->set_rules('wrg_nik','NIK','required');
		$tgl_transaksiawal = explode("/",$this->input->post('tgl_transaksi'));
		  $tgl_transaksitgl = $tgl_transaksiawal[0];
		  $tgl_transaksibln = $tgl_transaksiawal[1];
		  $tgl_transaksithn = $tgl_transaksiawal[2];
		  $tgl_transaksiformat = $tgl_transaksithn."-".$tgl_transaksibln."-".$tgl_transaksitgl;
		if ($this->input->post('jenis_transaksi') == "Debit"){
			$saldoakhir = intval($this->input->post('saldo_terakhir')) + intval($this->input->post('saldo_debit'));
		}else {
			$saldoakhir = intval($this->input->post('saldo_terakhir')) - intval($this->input->post('saldo_kredit'));
		}
		if (intval($this->input->post('no_transaksi')) >= 1 && intval($this->input->post('no_transaksi')) < 10){
			$nourutpengeluaran = "00";
		}else if (intval($this->input->post('no_transaksi')) >= 10 && intval($this->input->post('no_transaksi')) <= 99){
			$nourutpengeluaran = "0";
		}else {
			$nourutpengeluaran = "";
		}
		$dataheader = array(
				  'no_transaksi' =>"DNKLR".$nourutpengeluaran.$this->input->post('no_transaksi'),
				  'tgl_transaksi' =>$tgl_transaksiformat,
				 'jenis_transaksi' =>$this->input->post('jenis_transaksi'),
				 'ket_transaksi' =>$this->input->post('ket_transaksi'),
				 'saldo_akhir' => $saldoakhir
				  );
		$datadetail = array(
				'no_transaksi' =>"DNKLR".$nourutpengeluaran.$this->input->post('no_transaksi'),
				'item_transaksi' =>$this->input->post('item_transaksi'),
				'saldo_kredit' =>$this->input->post('saldo_kredit'),
				'saldo_debit' =>"0"
				
		);
		
        // print_r($data);die;
		if($this->form_validation->run()!=FALSE){
                //pesan yang muncul jika berhasil diupload pada session flashdata
				$this->Modul_transaksi->get_inserttransaksiheader($dataheader); 
				$this->Modul_transaksi->get_inserttransaksidetail($datadetail); 
				// $this->Modul_surat->get_insertketdomisilidetail($datadetail);
                echo "berhasil";
			}else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                echo "error";
            }       
            // print_r($this->Modul_jenisrek->get_insertjnsrek($data));die;  
	}
	public function detailpengeluaran($id)
	{
		
		if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
            $generalcode = "SETTING_DASHBOARD";
			$data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['namakry'] = $this->session->userdata('fullname');
			$data['dataeditpengeluaran']=$this->Modul_transaksi->get_editpengeluaran($id);
			// print_r($this->Modul_transaksi->viewpengeluarandetail($id));die;
			$data['datapengeluaran']=$this->Modul_transaksi->viewpengeluarandetail($id);
			$this->load->view('transaksi/pengeluaran/detailpengeluaran',$data);
        }

	}
	public function addiuran($id)
	{
        if (!$this->session->userdata('username')){
			redirect(base_url());
        }else{
			$generalcode = "SETTING_DASHBOARD";
			$nik = $id;
		    $data['setting'] = $this->Modul_setting->get_listgeneralsetting($generalcode); //untuk general setting
			$data['saldonik']=$this->Modul_transaksi->getsaldo()[0]->totalsaldodebit;
			$data['nourutiuran']=$this->Modul_transaksi->getnourutiuran()[0]->no_transaksi;
			// print_r($this->Modul_warga->get_noktptes($_GET['term']));die();
			
            $this->load->view('transaksi/iuranbulanan/addiuran',$data);
        }

	}
	public function get_autocomplete(){
        if (isset($_GET['term'])) {
			// $wrgnik = $this->uri->segment(4);
            $result = $this->Modul_warga->get_noktptes($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->wrg_nama;
                echo json_encode($arr_result);
			}
			// echo $_GET['term'];
        }
    }

	
	
	
	// end added
	
}

# nama file home.php
# folder apllication/controller/