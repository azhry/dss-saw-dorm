<?php 

class Kost_m extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']	= 'kost';
		$this->data['primary_key']	= 'id_kost';
	}

	public function get_kost_row($cond)
	{
		$this->db->select('*')
			->from($this->data['table_name'])
			->join('pengguna', $this->data['table_name'] . '.id_pengguna = pengguna.id_pengguna')
			->where($cond);

		$query = $this->db->get();
		return $query->row();
	}
}