<?php 
	Class Modul_surat extends CI_Model {
		
	var $tbl_surat='tbl_surat';
	
	Function viewketdomisili()
	{
		// $this->db->where('kat_id',"KK"); 
		$query=$this->db->get('view_ketdomisili');
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
	public function get_insertkategori($data){
		// $this->load->database();
       $this->db->insert($this->tbl_kategori, $data);
       return TRUE;
    }
	public function get_editkategori($id)
	{
		 $this->db->where('kat_id',$id); 
         $query = $this->db->get('tbl_kategori'); 
                if ($query->num_rows()>0)
	{
		return $query->result();
	}
		else
	{
		return null;
	} 
	}
	public function moduleditkategori($data) { 
		
		$id = $this->input->post('kat_id'); 
		
		$this->db->where('kat_id',$id); 
        $this->db->update('tbl_kategori',$data); 
	}
	public function hapus_kategori($data){ 
			
		$id = $data['kat_id']; 
		
		$this->db->where('kat_id',$id); 
        $this->db->update('tbl_kategori',$data); 

		}
	public function get_pdfketdomisili($id)
	{
			$this->db->where('no_surat',$id); 
			$query = $this->db->get('tbl_suratheader'); 
				if ($query->num_rows()>0)
	{
		return $query->result();
	}
		else
	{
		return null;
	} 
	}
	
	
}