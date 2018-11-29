<?php 

class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->module = 'admin';

		$this->data['id_pengguna'] 	= $this->session->userdata('id_pengguna');
		$this->data['username'] 	= $this->session->userdata('username');
	    $this->data['id_role']		= $this->session->userdata('id_role');
		if (!isset($this->data['id_pengguna'], $this->data['username'], $this->data['id_role']))
		{
			$this->session->sess_destroy();
			$this->flashmsg('Anda harus login terlebih dahulu', 'danger');
			redirect('login');
		}

		if ($this->data['id_role'] != 2)
		{
			$this->session->sess_destroy();
			$this->flashmsg('Anda harus login sebagai admin untuk mengakses halaman tersebut', 'danger');
			redirect('login');
		}
	}

	public function index()
	{
		$this->load->model('kost_m');
		$this->data['kost']		= $this->kost_m->get();
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
		$this->data['kost']			= $this->kost_m->get_kost_row(['id_kost' => $this->data['id_kost']]);
		$this->check_allowance(!isset($this->data['kost']), ['Data kost tidak ditemukan', 'danger']);

		$this->data['upload_dir'] 			= FCPATH . 'assets/foto/kost-' . $this->data['kost']->id_kost;
		$this->data['files']				= array_values(array_diff(scandir($this->data['upload_dir']), ['.', '..']));
		$this->data['upload_path'] 			= base_url('assets/foto/kost-' . $this->data['kost']->id_kost);	

		$this->data['title']				= 'Detail Informasi Kost';
		$this->data['content']				= 'detail_kost';
		$this->template($this->data, $this->module);
	}

	public function verifikasi_kost()
	{
		$response['status'] = 'failed';
		if ($this->POST('verify'))
		{
			$this->load->model('kost_m');
			$kost = $this->kost_m->get_row(['id_kost' => $this->POST('id_kost')]);
			if (isset($kost))
			{
				switch ($kost->status)
				{
					case 'Verified':
						$this->kost_m->update($this->POST('id_kost'), ['status' => 'Pending']);
						$response['data'] = 'Pending';
						break;

					case 'Pending':
						$this->kost_m->update($this->POST('id_kost'), ['status' => 'Verified']);
						$response['data'] = 'Verified';
						break;
				}

				$response['status'] = 'success';
			}
		}

		echo json_encode($response);
	}

	public function konfigurasi_spk()
	{
		$this->load->model('kriteria_m');
		if ($this->POST('submit'))
		{
			$this->flashmsg('Konfigurasi berhasil disimpan');
			redirect('admin/konfigurasi-spk');
		}
		$this->data['kriteria'] = $this->kriteria_m->get();
		$this->data['title']	= 'Konfigurasi SPK';
		$this->data['content']	= 'konfigurasi_spk';
		$this->template($this->data, $this->module);
	}

	public function kriteria()
	{
		$this->load->model('kriteria_m');

		$this->data['id_kriteria']	= $this->uri->segment(3);
		if (isset($this->data['id_kriteria']))
		{
			$this->kriteria_m->delete($this->data['id_kriteria']);
			$this->flashmsg('Kriteria berhasil dihapus');
			redirect('admin/kriteria');
		}

		$this->data['kriteria']		= $this->kriteria_m->get();
		$this->data['title']		= 'Daftar Kriteria';
		$this->data['content']		= 'kriteria';
		$this->template($this->data, $this->module);
	}

	public function tambah_kriteria()
	{
		if ($this->POST('submit'))
		{
			var_dump($_POST);
			exit;
			$this->load->model('kriteria_m');
			$type 		= $this->POST('type');
			$details 	= [];
			if ($type == 'range')
			{
				$range_label 	= $this->POST('range_label');
				$range_max 		= $this->POST('range_max');
				$range_min		= $this->POST('range_min');
				$range_value	= $this->POST('range_value');

				for ($i = 0; $i < count($range_label); $i++)
				{
					$details []= [
						'label'	=> $range_label[$i],
						'max'	=> $range_max[$i],
						'min'	=> $range_min[$i],
						'value'	=> $range_value[$i]
					];
				} 
			} 
			elseif ($type == 'option')
			{
				$option_label 	= $this->POST('option_label');
				$option_value	= $this->POST('option_value');

				for ($i = 0; $i < count($option_label); $i++)
				{
					$details []= [
						'label'	=> $option_label[$i],
						'value'	=> $option_value[$i]
					];
				} 
			}

			$this->kriteria_m->insert([
				'key'		=> $this->POST('key'),
				'type'		=> $type,
				'weight'	=> $this->POST('weight'),
				'label'		=> $this->POST('label'),
				'details'	=> json_encode($details)
			]);

			$this->flashmsg('Data kriteria berhasil disimpan');
			redirect('admin/tambah-kriteria');
		}

		$this->data['title']	= 'Form Penambahan Kriteria Baru';
		$this->data['content']	= 'form_tambah_kriteria';
		$this->template($this->data, $this->module);
	}
}