<?php 
	Class Modul_petugas extends CI_Model {
		
	var $tbl_petugas='tbl_petugas';
	
	Function viewpetugas()
	{
		$this->db->where('is_active',"1"); 
		$query=$this->db->get('tbl_petugas');
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
	public function get_insertpetugas($data){
		// $this->load->database();
       $this->db->insert($this->tbl_petugas, $data);
       return TRUE;
    }
	public function get_editpetugas($id)
	{
		 $this->db->where('ptg_nip',$id); 
         $query = $this->db->get('tbl_petugas'); 
                if ($query->num_rows()>0)
	{
		return $query->result();
	}
		else
	{
		return null;
	} 
	}
	public function moduleditpetugas($data) { 
		
		$id = $this->input->post('ptg_nip'); 
		
		$this->db->where('ptg_nip',$id); 
        $this->db->update('tbl_petugas',$data); 
	}
	public function hapus_petugas($data){ 
			
		$id = $data['ptg_nip']; 
		
		$this->db->where('ptg_nip',$id); 
        $this->db->update('tbl_petugas',$data); 

		}
	
	
}