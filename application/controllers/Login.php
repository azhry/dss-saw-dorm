<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{
	private $data = [];

  	public function __construct()
	{
	    parent::__construct();	
	    $username 	= $this->session->userdata('username');
	    $id_role	= $this->session->userdata('id_role');
		if (isset($username, $id_role))
		{
			switch ($id_role) 
			{
				case 1:
					redirect('pemilik');
					break;
			}

		}
  	}


  	public function index()
  	{
  		if ($this->POST('login-submit'))
		{
			$this->load->model('pengguna_m');
			if (!$this->pengguna_m->required_input(['username','password'])) 
			{
				$this->flashmsg('Data harus lengkap','warning');
				redirect('login');
				exit;
			}
			
			$this->data = [
    			'username'	=> $this->POST('username'),
    			'password'	=> md5($this->POST('password'))
			];

			$result = $this->pengguna_m->login($this->data);
			if (!isset($result)) 
			{
				$this->flashmsg('Username atau password salah','danger');
			}
			redirect('login');
			exit;
		}
		$this->data['title'] 		= 'Login';
		$this->data['global_title'] = $this->title;
		$this->load->view('login',$this->data);
	}

	public function daftar()
  	{
	    $this->load->view('daftar');
	}	

	public function laporan()
    {
        $this->load->model('pelamar_m');
        $this->load->model('hasil_penilaian_m');
        $this->load->model('keputusan_m');
        $this->load->model('kriteria_m');
        $this->load->model('bobot_m');
        $this->load->model('penilaian_m');

        $this->data['kriteria'] = $this->kriteria_m->get();
        $this->data['hasil']    = $this->hasil_penilaian_m->get_by_order('hasil', 'DESC');
        $this->data['title']    = 'Ranking Pelamar';
        $this->load->view('supervisor/laporan', $this->data);
    }
}
