<?php 
/**
*
* @package    Saw
* @author     Azhary Arliansyah
* @version    1.0
*/

require_once(__DIR__ . '/Criteria.php');

class Saw
{
	public function __construct()
	{
		$this->criteria = new Criteria();
	}

	public function fit($data, $exclude_key = [])
	{
		$this->data = $data;
		$this->result = $this->criteria->fit($data, $exclude_key);
		var_dump($this->result);
	}
}