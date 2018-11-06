<?php 

class Kost_m extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']	= 'kost';
		$this->data['primary_key']	= 'id_kost';
	}
}