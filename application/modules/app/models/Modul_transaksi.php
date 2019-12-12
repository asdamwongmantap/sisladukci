<?php 
	Class Modul_transaksi extends CI_Model {
		
	var $tbl_transaksi='tbl_transaksi';
	var $tbl_transaksiheader='tbl_trxheader';
	var $tbl_transaksidetail='tbl_trxdetail';
	
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
		$query=$this->db->get('view_totalsaldodebit');
		return $query->result();
	}
	Function viewiuran()
	{
		// $this->db->where('kat_id',"KK"); 
		$query=$this->db->get('view_iuranbulanan');
		if ($query->num_rows()>0)
	{
		return $query->result();
	}
		else
	{
		return array();
	}
	}
	Function getsaldonik($nik)
	{
		$this->db->where('wrg_nik',$nik); 
		$query=$this->db->get('view_totalsaldoiuran');
		return $query->result();
	}
	public function get_inserttransaksiheader($dataheader){
		// $this->load->database();
       $this->db->insert($this->tbl_transaksiheader, $dataheader);
       return TRUE;
	}
	public function get_inserttransaksidetail($datadetail){
		// $this->load->database();
       $this->db->insert($this->tbl_transaksidetail, $datadetail);
       return TRUE;
	}
	Function getnourutiuran()
	{
		$this->db->order_by('no_transaksi', 'DESC');
		$this->db->like('no_transaksi', 'IUBLN', 'both'); 
		$query=$this->db->get('tbl_trxheader');
		return $query->result();
	}
	public function get_editiuran($id)
	{
		 $this->db->where('wrg_nik',$id); 
         $query = $this->db->get('view_iuranbulanan'); 
                if ($query->num_rows()>0)
	{
		return $query->result();
	}
		else
	{
		return null;
	} 
	}
	Function viewiurandetail($id)
	{
		$this->db->where('wrg_nik',$id); 
		$query=$this->db->get('view_iuranbulanandetail');
		if ($query->num_rows()>0)
	{
		return $query->result();
	}
		else
	{
		return array();
	}
	}
	Function viewsumbangan()
	{
		// $this->db->where('kat_id',"KK"); 
		$query=$this->db->get('view_sumbangan');
		if ($query->num_rows()>0)
	{
		return $query->result();
	}
		else
	{
		return array();
	}
	}
	Function getnourutsumbangan()
	{
		$this->db->order_by('no_transaksi', 'DESC');
		$this->db->like('no_transaksi', 'SMBGN', 'both'); 
		$query=$this->db->get('tbl_trxheader');
		return $query->result();
	}
	Function viewpengeluaran()
	{
		// $this->db->where('kat_id',"KK"); 
		$query=$this->db->get('view_pengeluaran');
		if ($query->num_rows()>0)
	{
		return $query->result();
	}
		else
	{
		return array();
	}
	}
	Function getnourutpengeluaran()
	{
		$this->db->order_by('no_transaksi', 'DESC');
		$this->db->like('no_transaksi', 'DNKLR', 'both'); 
		$query=$this->db->get('tbl_trxheader');
		return $query->result();
	}
	Function getsaldototal()
	{
		// $this->db->where('kat_id',"KK"); 
		$query=$this->db->get('view_totalsaldo');
		return $query->result();
	}
	
	
	
}