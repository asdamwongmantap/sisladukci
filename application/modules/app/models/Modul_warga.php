<?php 
	Class Modul_warga extends CI_Model {
		
	var $tbl_warga='tbl_warga';
	
	Function viewwarga()
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
	// Function viewposisi()
	// {
	// 	// $this->load->database();
	// 	$query=$this->db->get('tbl_posisi');
	// 	if ($query->num_rows()>0)
	// {
	// 	return $query->result();
	// }
	// 	else
	// {
	// 	return array();
	// }
	// }
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
	
	
}