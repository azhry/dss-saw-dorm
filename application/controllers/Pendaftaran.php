<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends MY_Controller
{
	private $data = [];

  	public function __construct()
	{
	    parent::__construct();		
  	}

  	public function index()
  	{
  		$this->load->model('pelamar_m');

  		if ($this->POST('daftar')) 
  		{
  			$this->data['entri'] = [
  				'nama'			=> $this->POST('nama'),
  				'alamat'		=> $this->POST('alamat'),
  				'tempat_lahir'	=> $this->POST('tempat_lahir'),
  				'tgl_lahir'		=> $this->POST('tgl_lahir'),
  				'no_hp'			=> $this->POST('no_hp'),
  				'email'			=> $this->POST('email'),
  				'jk'			=> $this->POST('jk')
  			];

  			$this->pelamar_m->insert($this->data['entri']);
  			$id = $this->pelamar_m->get_row(['nama' => $this->POST('nama'), 'email' => $this->POST('email')])->id_pelamar;
  			$this->upload($id, 'foto', 'foto');

  			$this->flashmsg('<i class="fa fa-check"></i> Anda berhasil mendaftar!');
  			redirect('pendaftaran');
  			exit;
  		}


	    $this->load->view('daftar');
	}
}
