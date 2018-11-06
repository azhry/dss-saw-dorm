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

		$this->data['kost']		= $this->kost_m->get_by_order('id_kost', 'DESC');
		$this->data['title']	= 'Daftar Kost';
		$this->data['content']	= 'daftar_kost';
		$this->template($this->data, $this->module);
	}

	public function detail_kost()
	{
		$this->data['id_kost']	= $this->uri->segment(3);
		$this->check_allowance(!isset($this->data['id_kost']));

		$this->load->model('kost_m');
		$this->data['kost']			= $this->ruko_m->get_row(['id_kost' => $this->data['id_kost']]);
		$this->check_allowance(!isset($this->data['kost']), ['Data kost tidak ditemukan', 'danger']);	
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

	public function tambah_kost()
	{
		$this->load->library('Saw/criteria');
		$this->data['config'] 		= $this->criteria->get_config();
		$this->data['fasilitas']	= $this->data['config']['fasilitas']['values'];

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
				'longitude'		=> $this->POST('longitude')
			];
			
			foreach ($this->data['fasilitas'] as $key => $value)
			{
				$i = 0;
				$fasilitas = [];
				foreach ($value['values'] as $k => $v)
				{
					if (isset($_POST[$k]) && !empty($_POST[$k]))
					{
						$fasilitas[$k] = $this->POST($k);
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

	public function edit_ruko()
	{
		$this->data['id_ruko']	= $this->uri->segment(3);
		$this->check_allowance(!isset($this->data['id_ruko']));

		$this->load->model('ruko_m');
		$this->data['ruko']			= $this->ruko_m->get_row(['id_ruko' => $this->data['id_ruko']]);
		$this->check_allowance(!isset($this->data['ruko']), ['Data ruko tidak ditemukan', 'danger']);

		if ($this->POST('submit'))
		{
			$assets_url = FCPATH . 'assets/';
			$uploaded_files = $this->POST('new_uploaded_files');

			$this->data['ruko'] = [
				'ruko'							=> $this->POST('ruko'),
				'biaya_sewa'					=> $this->POST('biaya_sewa'),
				'luas_bangunan'					=> $this->POST('luas_bangunan'),
				'akses_menuju_lokasi'			=> json_encode($this->POST('akses_menuju_lokasi')),
				'pusat_keramaian'				=> json_encode($this->POST('pusat_keramaian')),
				'zona_parkir'					=> $this->POST('zona_parkir'),
				'jumlah_pesaing_serupa'			=> $this->POST('jumlah_pesaing_serupa'),
				'tingkat_konsumtif_masyarakat'	=> $this->POST('tingkat_konsumtif_masyarakat'),
				'lingkungan_lokasi_ruko'		=> $this->POST('lingkungan_lokasi_ruko'),
				'latitude'						=> $this->POST('latitude'),
				'longitude'						=> $this->POST('longitude')
			];

			$this->ruko_m->update($this->data['id_ruko'], $this->data['ruko']);

			$uploaded_dir = $assets_url . 'foto/ruko-' . $this->data['id_ruko'];
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

			$this->flashmsg('Data ruko berhasil disimpan');
			redirect('pemilik/edit-ruko/' . $this->data['id_ruko']);	
		  }

		$this->data['upload_dir'] 			= FCPATH . 'assets/foto/ruko-' . $this->data['ruko']->id_ruko;
		$this->data['files']				= array_values(array_diff(scandir($this->data['upload_dir']), ['.', '..']));
		$this->data['upload_path'] 			= base_url('assets/foto/ruko-' . $this->data['ruko']->id_ruko);
		$this->data['akses_menuju_lokasi']	= json_decode($this->data['ruko']->akses_menuju_lokasi);
		$this->data['pusat_keramaian']		= json_decode($this->data['ruko']->pusat_keramaian);
		$this->data['title']				= 'Form Edit Data Ruko';
		$this->data['content']				= 'form_edit_ruko';
		$this->template($this->data, $this->module);
	}

	public function upload_handler()
	{
		require_once(FCPATH . '/assets/jQuery-File-Upload-9.23.0/server/php/index.php');
	}
}