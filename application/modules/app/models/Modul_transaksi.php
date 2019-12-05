<?php 
	Class Modul_transaksi extends CI_Model {
		
	var $tbl_transaksi='tbl_transaksi';
	
	Function viewtransaksi()
	{
		// $this->db->where('kat_id',"KK"); 
		$query=$this->db->get('tbl_transaksi');
		if ($query->num_rows()>0)
	{
		return $query->result();
	}
		else
	{
		return array();
	}
	}
	public function get_inserttransaksi($data){
		// $this->load->database();
       $this->db->insert($this->tbl_transaksi, $data);
       return TRUE;
	}
	Function getsaldo()
	{
		// $this->db->where('kat_id',"KK"); 
		$query=$this->db->get('view_totalsaldo');
		return $query->result();
	}
	
	
	
}