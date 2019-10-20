<?php 
	Class Modul_warga extends CI_Model {
		
	var $tbl_warga='tbl_warga';
	
	Function viewwarga()
	{
		// $this->load->database();
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
	// Function moduleditjnsrek() { 
		
	// 	$id = $this->input->post('kd_jenisakun'); 
	// 	$data = array(
	// 			  'kd_jenisakun' =>$this->input->post('kd_jenisakun'),
	// 			  'desc_jenisakun' =>$this->input->post('desc_jenisakun')
	// 			  );
	// 	$this->db->where('kd_jenisakun',$id); 
    //     $this->db->update('tbl_jenisakun',$data); 
	// }
	// public function hapus_jnsrek($id){ 
			
	// 		$this->db->where('kd_jenisakun',$id);
	// 		$query = $this->db->get('tbl_jenisakun');
	// 		$row = $query->row();
	// 		$this->db->delete('tbl_jenisakun', array('kd_jenisakun' => $id));

	// 	}
	
	
}