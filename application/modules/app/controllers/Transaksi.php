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
	public function savetransaksi(){
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

	
	
	
	// end added
	
}

# nama file home.php
# folder apllication/controller/