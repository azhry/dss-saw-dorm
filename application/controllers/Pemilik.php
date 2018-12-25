<?php 

class Pemilik extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->module = 'pemilik';


		$this->data['id_pengguna'] 	= $this->session->userdata('id_pengguna');
		$this->data['username'] 	= $this->session->userdata('username');
	    $this->data['id_role']		= $this->session->userdata('id_role');
		if (!isset($this->data['id_pengguna'], $this->data['username'], $this->data['id_role']))
		{
			$this->flashmsg('Anda harus login terlebih dahulu', 'danger');
			redirect('login');
		}

		if ($this->data['id_role'] != 1)
		{
			$this->session->sess_destroy();
			$this->flashmsg('Anda harus login sebagai pemilik kost untuk mengakses halaman tersebut', 'danger');
			redirect('login');
		}
	}

	public function documentation()
	{
		redirect('assets/metronic/templates/admin4_material_design/');
	}

	public function index()
	{
		$this->load->model('kost_m');
		$this->data['kost']		= $this->kost_m->get(['id_pengguna' => $this->data['id_pengguna']]);
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}

	public function daftar_kost()
	{
		$this->load->model('kost_m');
		if ($this->POST('delete'))
		{
			$this->kost_m->delete($this->POST('id_kost'));
			$assets_url = FCPATH . 'assets/';
			$this->remove_directory($assets_url . 'foto/kost-' . $this->POST('id_kost'));
			exit;
		}

		$this->data['kost']		= $this->kost_m->get_by_order('id_kost', 'DESC', ['id_pengguna' => $this->data['id_pengguna']]);
		$this->data['title']	= 'Daftar Kost';
		$this->data['content']	= 'daftar_kost';
		$this->template($this->data, $this->module);
	}

	public function detail_kost()
	{
		$this->data['id_kost']	= $this->uri->segment(3);
		$this->check_allowance(!isset($this->data['id_kost']));

		$this->load->model('kost_m');
		$this->data['kost']			= $this->kost_m->get_kost_row(['id_kost' => $this->data['id_kost']]);
		$this->check_allowance(!isset($this->data['kost']), ['Data kost tidak ditemukan', 'danger']);

		$this->data['upload_dir'] 			= FCPATH . 'assets/foto/kost-' . $this->data['kost']->id_kost;
		$this->data['files']                = [];
        if (file_exists($this->data['upload_dir']))
        {
            $this->data['files'] = array_values(array_diff(scandir($this->data['upload_dir']), ['.', '..']));
        }
		$this->data['upload_path'] 			= base_url('assets/foto/kost-' . $this->data['kost']->id_kost);	

		$this->data['title']				= 'Detail Informasi Kost';
		$this->data['content']				= 'detail_kost';
		$this->template($this->data, $this->module);
	}

	public function tambah_kost()
	{
		$this->load->library('Saw/saw');
		$this->load->model('kriteria_m');
		$kriteria = $this->kriteria_m->get();
		$config = [];
		foreach ($kriteria as $row)
		{
			$details = json_decode($row->details, true);

			if ($row->type == 'range')
			{
				$max = PHP_INT_MIN;
				$min = PHP_INT_MAX;
				$max_idx = -1;
				$min_idx = -1;
				for ($i = 0; $i < count($details); $i++)
				{
					if ($details[$i]['max'] > $max)
					{
						$max = $details[$i]['max'];
						$max_idx = $i;
					}

					if ($details[$i]['min'] > $min)
					{
						$min = $details[$i]['min'];
						$min_idx = $i;
					}
				}
				$details[$max_idx]['max'] = null;
				$details[$min_idx]['min'] = null;
			}
			else if ($row->type == 'criteria')
			{
				$details = json_decode($row->details, true);
				$this->data['fasilitas']	= $details;
			}

			$config[$row->key] = [
				'key'		=> $row->key,
				'weight'	=> $row->weight,
				'label'		=> $row->label,
				'type'		=> $row->type,
				'values'	=> $details
			];
		}

		$this->saw->set_config($config);
		// $this->data['fasilitas']	= $this->saw->get_config();

		if ($this->POST('submit'))
		{
			$this->load->model('kost_m');
			$assets_url = FCPATH . 'assets/';
			$uploaded_files = $this->POST('uploaded_files');

			$this->data['kost'] = [
				'id_pengguna'	=> $this->data['id_pengguna'],
				'kost'			=> $this->POST('kost'),
				'harga_sewa'	=> $this->POST('harga_sewa'),
				'luas_kamar'	=> $this->POST('luas_kamar'),
				'fasilitas'		=> [],
				'lokasi'		=> $this->POST('lokasi'),
				'latitude'		=> $this->POST('latitude'),
				'longitude'		=> $this->POST('longitude'),
				'tipe'			=> $this->POST('tipe'),
				'jumlah_kamar'	=> $this->POST('jumlah_kamar')
			];
			
			foreach ($this->data['fasilitas'] as $key => $value)
			{
				$i = 0;
				$fasilitas = [];
				foreach ($value['values'] as $k => $v)
				{
					if (isset($_POST[$k]) && !empty($_POST[$k]))
					{
						$kk = $this->POST($k);
						$fasilitas[$k] = $kk == 'dll' ? $this->POST('free_text_' . $k) : $kk;
						$i++;
					}
				}

				if ($i > 0)
				{
					$this->data['kost']['fasilitas'][$key] = $fasilitas;
				}
			}

			$this->data['kost']['fasilitas'] = json_encode($this->data['kost']['fasilitas']);
			$this->kost_m->insert($this->data['kost']);

			$uploaded_dir = $assets_url . 'foto/kost-' . $this->db->insert_id();
			mkdir($uploaded_dir);
			foreach ($uploaded_files as $file)
			{
				rename($assets_url . 'temp_files/' . $file, $uploaded_dir . '/' . $file);
			}
			$this->remove_directory($assets_url . 'temp_files/thumbnail');
			$this->remove_directory($assets_url . 'temp_files');

			$this->flashmsg('Data kost berhasil disimpan');
			redirect('pemilik/tambah-kost');
		}

		$this->data['title']		= 'Form Penambahan Kost Baru';
		$this->data['content']		= 'form_tambah_kost';
		$this->template($this->data, $this->module);
	}

	public function edit_kost()
	{
		$this->data['id_kost']	= $this->uri->segment(3);
		$this->check_allowance(!isset($this->data['id_kost']));

		$this->load->model('kost_m');
		$this->data['kost']			= $this->kost_m->get_kost_row(['id_kost' => $this->data['id_kost']]);
		$this->check_allowance(!isset($this->data['kost']), ['Data kost tidak ditemukan', 'danger']);

		if ($this->POST('submit'))
		{
			$assets_url = FCPATH . 'assets/';
			$uploaded_files = $this->POST('new_uploaded_files');

			$this->load->model('kriteria_m');
			$kriteria = $this->kriteria_m->get();
			$config = [];
			foreach ($kriteria as $row)
			{
				$details = json_decode($row->details, true);

				if ($row->type == 'range')
				{
					$max = PHP_INT_MIN;
					$min = PHP_INT_MAX;
					$max_idx = -1;
					$min_idx = -1;
					for ($i = 0; $i < count($details); $i++)
					{
						if ($details[$i]['max'] > $max)
						{
							$max = $details[$i]['max'];
							$max_idx = $i;
						}

						if ($details[$i]['min'] > $min)
						{
							$min = $details[$i]['min'];
							$min_idx = $i;
						}
					}
					$details[$max_idx]['max'] = null;
					$details[$min_idx]['min'] = null;
				}
				else if ($row->type == 'criteria')
				{
					$details = json_decode($row->details, true);
					$this->data['fasilitas']	= $details;
				}

				$config[$row->key] = [
					'key'		=> $row->key,
					'weight'	=> $row->weight,
					'label'		=> $row->label,
					'type'		=> $row->type,
					'values'	=> $details
				];
			}

			$this->data['kost'] = [
				'kost'			=> $this->POST('kost'),
				'harga_sewa'	=> $this->POST('harga_sewa'),
				'luas_kamar'	=> $this->POST('luas_kamar'),
				'fasilitas'		=> [],
				'lokasi'		=> $this->POST('lokasi'),
				'latitude'		=> $this->POST('latitude'),
				'longitude'		=> $this->POST('longitude'),
				'tipe'			=> $this->POST('tipe'),
				'jumlah_kamar'	=> $this->POST('jumlah_kamar')
			];


			foreach ($this->data['fasilitas'] as $key => $value)
			{
				$i = 0;
				$fasilitas = [];
				foreach ($value['values'] as $k => $v)
				{
					if (isset($_POST[$k]) && !empty($_POST[$k]))
					{
						$kk = $this->POST($k);
						$fasilitas[$k] = $kk == 'dll' ? $this->POST('free_text_' . $k) : $kk;
						$i++;
					}
				}

				if ($i > 0)
				{
					$this->data['kost']['fasilitas'][$key] = $fasilitas;
				}
			}

			$this->data['kost']['fasilitas'] = json_encode($this->data['kost']['fasilitas']);

			$this->kost_m->update($this->data['id_kost'], $this->data['kost']);

			$uploaded_dir = $assets_url . 'foto/kost-' . $this->data['id_kost'];
			$deleted_photos = $this->POST('deleted_photo');
			if (isset($deleted_photos))
			{
				foreach ($deleted_photos as $photo)
				{
					@unlink($uploaded_dir . '/' . $photo);
				}
			}

			if (!file_exists($uploaded_dir))
			{
				mkdir($uploaded_dir);	
			}
			
			if (isset($uploaded_files))
			{
				foreach ($uploaded_files as $file)
				{
					rename($assets_url . 'temp_files/' . $file, $uploaded_dir . '/' . $file);
				}
				$this->remove_directory($assets_url . 'temp_files/thumbnail');
				$this->remove_directory($assets_url . 'temp_files');
			}

			$this->flashmsg('Data kost berhasil diperbarui');
			redirect('pemilik/edit-kost/' . $this->data['id_kost']);	
		}

		$this->data['upload_dir'] 			= FCPATH . 'assets/foto/kost-' . $this->data['kost']->id_kost;
		$this->data['files']				= array_values(array_diff(scandir($this->data['upload_dir']), ['.', '..']));
		$this->data['upload_path'] 			= base_url('assets/foto/kost-' . $this->data['kost']->id_kost);	
		$this->data['fasilitas_kost']		= json_decode($this->data['kost']->fasilitas, true);

		$this->load->library('Saw/criteria');
		$this->data['config'] 		= $this->criteria->get_config();
		$this->data['fasilitas']	= $this->data['config']['fasilitas']['values'];

		$this->load->library('Saw/saw');
		$this->load->model('kriteria_m');
		$kriteria = $this->kriteria_m->get();
		$config = [];
		foreach ($kriteria as $row)
		{
			$details = json_decode($row->details, true);

			if ($row->type == 'range')
			{
				$max = PHP_INT_MIN;
				$min = PHP_INT_MAX;
				$max_idx = -1;
				$min_idx = -1;
				for ($i = 0; $i < count($details); $i++)
				{
					if ($details[$i]['max'] > $max)
					{
						$max = $details[$i]['max'];
						$max_idx = $i;
					}

					if ($details[$i]['min'] > $min)
					{
						$min = $details[$i]['min'];
						$min_idx = $i;
					}
				}
				$details[$max_idx]['max'] = null;
				$details[$min_idx]['min'] = null;
			}
			else if ($row->type == 'criteria')
			{
				$details = json_decode($row->details, true);
				$this->data['fasilitas']	= $details;
			}

			$config[$row->key] = [
				'key'		=> $row->key,
				'weight'	=> $row->weight,
				'label'		=> $row->label,
				'type'		=> $row->type,
				'values'	=> $details
			];
		}

		$this->saw->set_config($config);

		$this->data['title']				= 'Edit Informasi Kost';
		$this->data['content']				= 'form_edit_kost';
		$this->template($this->data, $this->module);
	}

	public function upload_handler()
	{
		require_once(FCPATH . '/assets/jQuery-File-Upload-9.23.0/server/php/index.php');
	}
}