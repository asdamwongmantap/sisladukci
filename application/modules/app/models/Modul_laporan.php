<?php 
	Class Modul_laporan extends CI_Model {
		
	var $tbl_suratheader='tbl_suratheader';
	var $tbl_suratdetail='tbl_suratdetail';
	
	public function get_pdflaporankepalakeluarga($data)
	{
			$this->db->where('is_active = 1 AND dtm_crt BETWEEN "'.$data['dtm_from'].'" AND "'.$data['dtm_to'].'"'); 
			$query = $this->db->get('view_kepalakeluarga');
	return $query->result(); 
	}
	public function get_pdflaporanallwarga($data)
	{
			$this->db->where('is_active = 1 AND dtm_crt BETWEEN "'.$data['dtm_from'].'" AND "'.$data['dtm_to'].'"'); 
			$query = $this->db->get('view_allwarga');
	return $query->result(); 
	}
	public function get_pdflaporanpindahwarga($data)
	{
			$this->db->where('dtm_crt BETWEEN "'.$data['dtm_from'].'" AND "'.$data['dtm_to'].'"'); 
			$query = $this->db->get('view_wargapindah');
	return $query->result(); 
	}
	public function get_pdflaporanmeninggalwarga($data)
	{
			$this->db->where('dtm_crt BETWEEN "'.$data['dtm_from'].'" AND "'.$data['dtm_to'].'"'); 
			$query = $this->db->get('view_wargameninggal');
	return $query->result(); 
	}

	public function get_pdflaporanketdomisili($data)
	{
		// $this->db->where('tgl_surat <=',$data['dtm_to']); 
		// $this->db->where('tgl_surat >=',$data['dtm_from']); 
			$this->db->where('tgl_surat BETWEEN "'.$data['dtm_from'].'" AND "'.$data['dtm_to'].'"'); 
			$query = $this->db->get('view_ketdomisili');
	return $query->result(); 
	}
	public function get_pdflaporansuratpengantar($data)
	{
			// $this->db->where('no_surat',$id); 
			$this->db->where('tgl_surat BETWEEN "'.$data['dtm_from'].'" AND "'.$data['dtm_to'].'"'); 
			$query = $this->db->get('view_pengantar');
	return $query->result(); 
	}
	public function get_pdflaporansuratkuasa($data)
	{
			// $this->db->where('no_surat',$id); 
			$this->db->where('tgl_surat BETWEEN "'.$data['dtm_from'].'" AND "'.$data['dtm_to'].'"'); 
			$query = $this->db->get('view_suratkuasa');
	return $query->result(); 
	}
	public function get_pdflaporanizinmenikah($data)
	{
			// $this->db->where('no_surat',$id); 
			$this->db->where('tgl_surat BETWEEN "'.$data['dtm_from'].'" AND "'.$data['dtm_to'].'"'); 
			$query = $this->db->get('view_izinmenikah');
	return $query->result(); 
	}
	public function get_pdflaporansuratkematian($data)
	{
			// $this->db->where('no_surat',$id); 
			$this->db->where('tgl_surat BETWEEN "'.$data['dtm_from'].'" AND "'.$data['dtm_to'].'"'); 
			$query = $this->db->get('view_ketkematian');
	return $query->result(); 
	}
	public function get_pdflaporankeuangan($data)
	{
		$this->db->where('digitbulan ="'.$data['digitbulan'].'" AND tgl_transaksi BETWEEN "'.$data['dtm_from'].'" AND "'.$data['dtm_to'].'"'); 
			// $this->db->where('digitbulan',$data['dtm_from']); 
			
			$query = $this->db->get('view_transaksiperbulan');
	return $query->result(); 
	}
	
	
}