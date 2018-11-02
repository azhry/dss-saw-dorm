<?php 

class Ruko_m extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']	= 'ruko';
		$this->data['primary_key']	= 'id_ruko';
	}
}