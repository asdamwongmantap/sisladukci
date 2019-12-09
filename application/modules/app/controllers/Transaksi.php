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
		// $this->load->model('Modul_warga');
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
				// $this->Modul_surat->get_insertketdomisilidetail($datadetail);
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
	

	
	
	
	// end added
	
}

# nama file home.php
# folder apllication/controller/