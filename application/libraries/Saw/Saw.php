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
	private $criteria;
	private $data;
	private $result;

	public function set_criteria_type($type)
	{
		$this->criteria = new Criteria();
		$this->criteria->set_type($type);
		$config = $this->criteria->get_config();
		$this->weights = [];
		foreach ($config as $key => $value)
		{
			$this->weights[$key] = $value['weight'];
		}
	}

	public function set_config($config)
	{
		$this->criteria = new Criteria();
		$this->criteria->set_config($config);
		foreach ($this->criteria->config as $key => $value)
		{
			$this->weights[$key] = $value['weight'];
		}
	}

	public function get_config()
	{
		return $this->criteria->config;
	}

	public function fit($data, $exclude_key = [])
	{
		$this->data = $data;
		$this->result = $this->criteria->fit($data, $exclude_key);
	}

	public function normalize()
	{
		$this->normalized_result = [];
		if (count($this->result) > 0);
		{
			$normalizer = [];
			$type = $this->criteria->type;
			$keys = array_keys($this->result[0]);
			foreach ($keys as $key)
			{
				$values = array_column($this->result, $key);
				$normalizer[$key] = count($values) > 1 ? ($type[$key] === 'cost' ? max($values) : min($values)) : $values[0];
			}

			foreach ($this->result as $row)
			{
				$result_row = [];
				foreach ($row as $key => $value)
				{
					switch ($type[$key])
					{
						case 'benefit':
							$result_row[$key] = $normalizer[$key] == 0 ? 0 : ($value / $normalizer[$key]);
							break;

						case 'cost':
							$result_row[$key] = $value == 0 ? 0 : ($normalizer[$key] / $value);
							break;
					}
				}
				$this->normalized_result []= $result_row;				
			}
		}

		return $this->normalized_result;
	}

	public function result()
	{
		$this->weighted_result = array_map(function($row) {
			$total = 0;
			foreach ($row as $key => $value)
			{
				$row[$key] = $this->weights[$key] * $value;
				$total += $row[$key];
			}
			$row['total'] = $total;
			return $row;
		}, $this->normalized_result);
		return $this->weighted_result;
	}

	public function rank($order = 'desc')
	{
		$result = $this->result();
		$data = $this->data;
		for ($i = 0; $i < count($data); $i++)
		{
			$data[$i]->total = $result[$i]['total'];
		}
		array_multisort(array_column($result, 'total'), $order == 'desc' ? SORT_DESC : SORT_ASC, $data);
		return $data;
	}
}