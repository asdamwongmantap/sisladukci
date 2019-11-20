<?php 
	Class Modul_warga extends CI_Model {
		
		var $tbl_kkheader='tbl_kkheader';
	var $tbl_kkdetail='tbl_kkdetail';
	var $tbl_wargapindah='tbl_wargapindah';
	
	public function viewwarga($nokk)
	{
		$this->db->where('is_active',"1"); 
		$this->db->where('wrg_nokk',$nokk); 
		$query=$this->db->get('view_detailkeluarga');
		if ($query->num_rows()>0)
	{
		return $query->result();
	}
		else
	{
		return array();
	}
	}
	public function get_insertwarga($data){
		// $this->load->database();
       $this->db->insert($this->tbl_kkdetail, $data);
       return TRUE;
    }
	public function get_editwarga($id)
	{
		 $this->db->where('wrg_nik',$id); 
         $query = $this->db->get('tbl_kkdetail'); 
                if ($query->num_rows()>0)
	{
		return $query->result();
	}
		else
	{
		return null;
	} 
	}
	public function moduleditwarga($data) { 
		
		$id = $this->input->post('wrg_nik'); 
		
		$this->db->where('wrg_nik',$id); 
        $this->db->update('tbl_kkdetail',$data); 
	}
	public function hapus_warga($data){ 
			
		$id = $data['wrg_nik']; 
		
		$this->db->where('wrg_nik',$id); 
        $this->db->update('tbl_kkdetail',$data); 

		}
		// added 20191031 by asdam
		public function viewkepalakeluarga()
	{
		$this->db->where('is_active',"1"); 
		$this->db->where('wrg_statushubungan',"Kepala Keluarga"); 
		$query=$this->db->get('view_kepalakeluarga');
		
		if ($query->num_rows()>0)
	{
		return $query->result();
	}
		else
	{
		return array();
	}
	}
	public function viewallwarga()
	{
		$this->db->where('is_active',"1"); 
		$query=$this->db->get('tbl_kkdetail');
		if ($query->num_rows()>0)
	{
		return $query->result();
	}
		else
	{
		return array();
	}
	}
	public function viewpindahwarga()
	{
		$this->db->where('is_active',"1"); 
		$query=$this->db->get('view_wargapindah');
		if ($query->num_rows()>0)
	{
		return $query->result();
	}
		else
	{
		return array();
	}
	}
	public function get_insertkepalakeluarga($data,$datadetail){
		// $this->load->database();
	   $this->db->insert($this->tbl_kkheader, $data);
	   $this->db->insert($this->tbl_kkdetail, $datadetail);
       return TRUE;
	}
	public function get_editkepalakeluarga($id)
	{
		 $this->db->where('wrg_nokk',$id); 
         $query = $this->db->get('view_kepalakeluarga'); 
    	if ($query->num_rows()>0)
	{
		return $query->result();
	}
		else
	{
		return null;
	} 
	}
	public function moduleditkepalakeluarga($data,$datadetail) { 
		
		$id = $this->input->post('wrg_nokk'); 
		
		$this->db->where('wrg_nokk',$id); 
		$this->db->update('tbl_kkheader',$data); 

		$this->db->where('wrg_nokk',$id); 
        $this->db->update('tbl_kkdetail',$datadetail); 
	}
	public function get_noktpmod($datanik) { 
	
		$query = $this->db->get_where('tbl_kkdetail', $datanik);
		echo json_encode($query->result());
		// return $query->result();
	}
	public function cek_nik($datanik) { 
	
		$query = $this->db->get_where('tbl_kkdetail', $datanik);
		return $query;
	}
	public function get_insertpindahwarga($data){
		// $this->load->database();
       $this->db->insert($this->tbl_wargapindah, $data);
       return TRUE;
	}
	public function hitungwarga() { 
	
		$query = $this->db->get('tbl_kkdetail');
		return $query;
	}
	
	
}