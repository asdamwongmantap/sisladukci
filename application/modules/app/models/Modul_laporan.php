<?php 
	Class Modul_laporan extends CI_Model {
		
	var $tbl_suratheader='tbl_suratheader';
	var $tbl_suratdetail='tbl_suratdetail';
	
	public function get_pdflaporankepalakeluarga()
	{
			// $this->db->where('no_surat',$id); 
			$query = $this->db->get('view_kepalakeluarga');
	return $query->result(); 
	}
	public function get_pdflaporanallwarga()
	{
			// $this->db->where('no_surat',$id); 
			$query = $this->db->get('view_allwarga');
	return $query->result(); 
	}
	public function get_pdflaporanpindahwarga()
	{
			// $this->db->where('no_surat',$id); 
			$query = $this->db->get('view_wargapindah');
	return $query->result(); 
	}
	public function get_pdflaporanmeninggalwarga()
	{
			// $this->db->where('no_surat',$id); 
			$query = $this->db->get('view_wargameninggal');
	return $query->result(); 
	}

	public function get_pdflaporanketdomisili()
	{
			// $this->db->where('no_surat',$id); 
			$query = $this->db->get('view_ketdomisili');
	return $query->result(); 
	}
	public function get_pdflaporansuratpengantar()
	{
			// $this->db->where('no_surat',$id); 
			$query = $this->db->get('view_pengantar');
	return $query->result(); 
	}
	public function get_pdflaporansuratkuasa()
	{
			// $this->db->where('no_surat',$id); 
			$query = $this->db->get('view_suratkuasa');
	return $query->result(); 
	}
	public function get_pdflaporanizinmenikah()
	{
			// $this->db->where('no_surat',$id); 
			$query = $this->db->get('view_izinmenikah');
	return $query->result(); 
	}
	public function get_pdflaporansuratkematian()
	{
			// $this->db->where('no_surat',$id); 
			$query = $this->db->get('view_ketkematian');
	return $query->result(); 
	}
	public function get_pdflaporankeuangan($id)
	{
			$this->db->where('digitbulan',$id); 
			$query = $this->db->get('view_transaksiperbulan');
	return $query->result(); 
	}
	
	
}