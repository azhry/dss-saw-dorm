<?php 

class Home extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->module = 'home';
	}

	public function index()
	{
		$this->load->model('ruko_m');
		$this->data['ruko']		= $this->ruko_m->get_by_order('id_ruko', 'DESC');
		$this->data['title']	= 'Home';
		$this->data['content']	= 'home';
		$this->template($this->data, $this->module);	
	}

	public function detail_ruko()
	{
		$this->data['id_ruko']	= $this->uri->segment(3);
		$this->check_allowance(!isset($this->data['id_ruko']));

		$this->load->model('ruko_m');
		$this->data['ruko']			= $this->ruko_m->get_row(['id_ruko' => $this->data['id_ruko']]);
		$this->check_allowance(!isset($this->data['ruko']), ['Data ruko tidak ditemukan', 'danger']);

		$this->data['upload_dir'] 			= FCPATH . 'assets/foto/ruko-' . $this->data['ruko']->id_ruko;
		$this->data['files']				= array_values(array_diff(scandir($this->data['upload_dir']), ['.', '..']));
		$this->data['upload_path'] 			= base_url('assets/foto/ruko-' . $this->data['ruko']->id_ruko);
		$this->data['akses_menuju_lokasi']	= json_decode($this->data['ruko']->akses_menuju_lokasi);
		$this->data['pusat_keramaian']		= json_decode($this->data['ruko']->pusat_keramaian);
		$this->data['title']				= 'Detail Informasi Ruko';
		$this->data['content']				= 'detail_ruko';
		$this->template($this->data, $this->module);
	}

	public function cari()
	{
		$this->load->library('Topsis/topsis');
		$this->load->model('ruko_m');
		
		$this->data['criteria']	= $this->topsis->criteria;
		$this->data['config']	= $this->data['criteria']->get_config();
		$this->data['ruko']		= json_decode(json_encode($this->ruko_m->get()), true);
		
		$matrix = $this->topsis->fit($this->data['ruko'], ['ruko', 'id_ruko', 'id_pengguna', 'latitude', 'longitude']);
		$weight = $this->topsis->weight();
		$distance = $this->topsis->solution_distance();
		$rank = $this->topsis->rank();
		$this->data['ruko']		= $rank;

		$this->data['title']	= 'Cari Ruko';
		$this->data['content']	= 'cari';
		$this->template($this->data, $this->module);
	}

	public function rank()
	{
		if ($this->POST('cari'))
		{
			$this->load->model('ruko_m');
			$cond = '';
			
			if (!empty($this->POST('biaya_sewa')))
			{
				$biaya_sewa = $this->POST('biaya_sewa');
				switch ($biaya_sewa)
				{
					case 1:
						$cond .= 'biaya_sewa > 187400000 ';
						break;
					case 2:
						$cond .= '(biaya_sewa >= 149300000 AND biaya_sewa <= 187300000) ';
						break;
					case 3:
						$cond .= '(biaya_sewa >= 111200000 AND biaya_sewa <= 149200000) ';
						break;
					case 4:
						$cond .= '(biaya_sewa >= 73100000 AND biaya_sewa <= 111100000) ';
						break;
					case 5:
						$cond .= 'biaya_sewa <= 7300000 ';
						break;
				}
			}

			if (!empty($this->POST('luas_bangunan')))
			{
				if (strlen($cond) > 0)
				{
					$cond .= 'AND ';
				}

				$luas_bangunan = $this->POST('luas_bangunan');
				switch ($luas_bangunan)
				{
					case 5:
						$cond .= 'luas_bangunan > 108 ';
						break;
					case 1:
						$cond .= '(luas_bangunan >= 93 AND luas_bangunan <= 107) ';
						break;
					case 3:
						$cond .= '(luas_bangunan >= 63 AND luas_bangunan <= 77) ';
						break;
					case 4:
						$cond .= '(luas_bangunan >= 78 AND luas_bangunan <= 92) ';
						break;
					case 2:
						$cond .= 'luas_bangunan <= 62 ';
						break;
				}
			}

			$len_akses = count($this->POST('akses_menuju_lokasi'));
			if ($len_akses > 0)
			{
				if (strlen($cond) > 0)
				{
					$cond .= 'AND ';
				}

				$i = 0;
				$cond .= '(';
				foreach ($this->POST('akses_menuju_lokasi') as $akses)
				{
					$cond .= 'akses_menuju_lokasi LIKE "%' . $akses . '%"';
					if ($i++ < $len_akses - 1)
					{
						$cond .= ' AND ';
					}
				}
				$cond .= ') ';
			}

			$len_pusat_keramaian = count($this->POST('pusat_keramaian'));
			if ($len_pusat_keramaian > 0)
			{
				if (strlen($cond) > 0)
				{
					$cond .= 'AND ';
				}

				$i = 0;
				$cond .= '(';
				foreach ($this->POST('pusat_keramaian') as $keramaian)
				{
					$cond .= 'pusat_keramaian LIKE "%' . $keramaian . '%"';
					if ($i++ < $len_pusat_keramaian - 1)
					{
						$cond .= ' AND ';
					}
				}
				$cond .= ') ';
			}

			if (!empty($this->POST('zona_parkir')))
			{
				if (strlen($cond) > 0)
				{
					$cond .= 'AND ';
				}
				
				$zona_parkir = $this->POST('zona_parkir');
				switch ($zona_parkir)
				{
					case 4:
						$cond .= 'zona_parkir > 10.8 ';
						break;
					case 1:
						$cond .= '(zona_parkir >= 9.1 AND zona_parkir <= 10.7) ';
						break;
					case 3:
						$cond .= '(zona_parkir >= 7.4 AND zona_parkir <= 9) ';
						break;
					case 5:
						$cond .= '(zona_parkir >= 5.7 AND zona_parkir <= 7.3) ';
						break;
					case 2:
						$cond .= 'zona_parkir <= 5.6 ';
						break;
				}
			}

			if (!empty($this->POST('jumlah_pesaing_serupa')))
			{
				if (strlen($cond) > 0)
				{
					$cond .= 'AND ';
				}
				
				$jumlah_pesaing_serupa = $this->POST('jumlah_pesaing_serupa');
				switch ($jumlah_pesaing_serupa)
				{
					case 3:
						$cond .= 'jumlah_pesaing_serupa > 6 ';
						break;
					case 1:
						$cond .= '(jumlah_pesaing_serupa >= 5 AND jumlah_pesaing_serupa <= 6) ';
						break;
					case 2:
						$cond .= '(jumlah_pesaing_serupa >= 3 AND jumlah_pesaing_serupa <= 4) ';
						break;
					case 5:
						$cond .= '(jumlah_pesaing_serupa >= 1 AND jumlah_pesaing_serupa <= 2) ';
						break;
					case 4:
						$cond .= 'jumlah_pesaing_serupa <= 0 ';
						break;
				}
			}

			$tingkat_konsumtif_masyarakat = $this->POST('tingkat_konsumtif_masyarakat');
			if (!empty($tingkat_konsumtif_masyarakat))
			{
				if (strlen($cond) > 0)
				{
					$cond .= 'AND ';
				}
				
				$cond .= 'tingkat_konsumtif_masyarakat = "' . $tingkat_konsumtif_masyarakat . '" ';
			}

			$lingkungan_lokasi_ruko = $this->POST('lingkungan_lokasi_ruko');
			if (!empty($lingkungan_lokasi_ruko))
			{
				if (strlen($cond) > 0)
				{
					$cond .= 'AND ';
				}
				
				$cond .= 'lingkungan_lokasi_ruko = "' . $lingkungan_lokasi_ruko . '" ';
			}

			$this->data['ruko']	= $this->ruko_m->get($cond);

			$this->load->library('Topsis/topsis');
			$this->topsis->fit($this->data['ruko'], ['ruko', 'id_ruko', 'id_pengguna', 'latitude', 'longitude']);
			$this->topsis->weight();
			$this->topsis->solution_distance();
			$rank = $this->topsis->rank();
			$rank = array_map(function($row) {
				$row = (array)$row;
				$path = 'assets/foto/ruko-' . $row['id_ruko'];
				$foto = scandir(FCPATH . $path);
				$foto = array_values(array_diff($foto, ['.', '..']));
				$row['foto'] = isset($foto[0]) ? base_url($path . '/' . $foto[0]) : 'http://placehold.it/313x313';
				$row['biaya_sewa'] = 'Rp. ' . number_format($row['biaya_sewa'], 2, ',', '.');
				return $row;
			}, $rank);
			echo json_encode($rank);
		}
	}
}