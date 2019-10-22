<?php 
	Class Modul_kelurahan extends CI_Model {
		
	var $tbl_kelurahan='tbl_kelurahan';
	
	Function viewkelurahan()
	{
		$this->db->where('is_active',"1"); 
		$query=$this->db->get('tbl_kelurahan');
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
	public function get_insertkelurahan($data){
		// $this->load->database();
       $this->db->insert($this->tbl_kelurahan, $data);
       return TRUE;
    }
	public function get_editkelurahan($id)
	{
		 $this->db->where('kel_id',$id); 
         $query = $this->db->get('tbl_kelurahan'); 
                if ($query->num_rows()>0)
	{
		return $query->result();
	}
		else
	{
		return null;
	} 
	}
	public function moduleditkelurahan($data) { 
		
		$id = $this->input->post('kel_id'); 
		
		$this->db->where('kel_id',$id); 
        $this->db->update('tbl_kelurahan',$data); 
	}
	public function hapus_kelurahan($data){ 
			
		$id = $data['kel_id']; 
		
		$this->db->where('kel_id',$id); 
        $this->db->update('tbl_kelurahan',$data); 

		}
	
	
}