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

	public function get_range()
	{
		$min_values = $this->get_min_values();
		$max_values = $this->get_max_values();

		$min_harga_sewa = $min_values->harga_sewa;
		$max_harga_sewa = $max_values->harga_sewa;
		$min_luas_kamar = $min_values->luas_kamar;
		$max_luas_kamar = $max_values->luas_kamar;
		$min_lokasi 	= $min_values->lokasi;
		$max_lokasi 	= $max_values->lokasi;

		return [
			'harga_sewa'	=> $this->calculate_range($min_harga_sewa, $max_harga_sewa, 5),
			'luas_kamar'	=> $this->calculate_range($min_luas_kamar, $max_luas_kamar, 5),
			'lokasi'		=> $this->calculate_range($min_lokasi, $max_lokasi, 5)
		];
	}

	private function calculate_range($min, $max, $n)
	{
		$range = ($max - $min) / $n;
		$range_set = [];
		for ($i = 0; $i < $n; $i++)
		{
			if ($i > 0) $min += 0.1;

			$range_set []= [
				'min'	=> $min,
				'max'	=> $min + $range
			];

			$min += $range;
		}

		return $range_set;
	}

	public function get_min_values()
	{
		$this->db->select([
			'MIN(harga_sewa) AS harga_sewa',
			'MIN(luas_kamar) AS luas_kamar',
			'MIN(jumlah_kamar) AS jumlah_kamar',
			'MIN(lokasi) AS lokasi'
		])->from($this->data['table_name'])
		  ->where(['status' => 'Verified']);

		$query = $this->db->get();
		return $query->row();
	}

	public function get_max_values()
	{
		$this->db->select([
			'MAX(harga_sewa) AS harga_sewa',
			'MAX(luas_kamar) AS luas_kamar',
			'MAX(jumlah_kamar) AS jumlah_kamar',
			'MAX(lokasi) AS lokasi'
		])->from($this->data['table_name']);

		$query = $this->db->get();
		return $query->row();
	}
}