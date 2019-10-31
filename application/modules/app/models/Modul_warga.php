<?php 
	Class Modul_warga extends CI_Model {
		
	var $tbl_warga='tbl_warga';
	
	public function viewwarga($nokk)
	{
		$this->db->where('is_active',"1"); 
		$this->db->where('wrg_nokk',$nokk); 
		$query=$this->db->get('tbl_warga');
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
       $this->db->insert($this->tbl_warga, $data);
       return TRUE;
    }
	public function get_editwarga($id)
	{
		 $this->db->where('wrg_nik',$id); 
         $query = $this->db->get('tbl_warga'); 
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
        $this->db->update('tbl_warga',$data); 
	}
	public function hapus_warga($data){ 
			
		$id = $data['wrg_nik']; 
		
		$this->db->where('wrg_nik',$id); 
        $this->db->update('tbl_warga',$data); 

		}
		// added 20191031 by asdam
		public function viewkepalakeluarga()
	{
		$this->db->where('is_active',"1"); 
		$this->db->where('wrg_statushubungan',"Kepala Keluarga"); 
		$query=$this->db->get('tbl_warga');
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
		$query=$this->db->get('tbl_warga');
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
	
	
}