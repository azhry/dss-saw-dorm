<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Manager extends MY_Controller
{

	private $data = [];

  	public function __construct()
	{
	    parent::__construct();		
		$this->load->model('Pelamar_m');
  	}


  	public function index()
  	{
	    $this->data['title'] 	= 'Dashboard Manager';
	    $this->data['pelamar']	= $this->Pelamar_m->get();
	    $this->data['content']	= 'manager/dashboard';
	    $this->template($this->data);
	}

	public function daftar_pelamar()
  	{
  		$this->load->model('kriteria_m');
  		$this->load->model('bobot_m');
  		if ($this->POST('simpan')) {
  			
  		}
  		$this->data['kriteria'] = $this->kriteria_m->get();
	    $this->data['title'] 	= 'Daftar Pelamar';
	    $this->data['content']	= 'manager/daftar_pelamar';
	    $this->data['pelamar']	= $this->Pelamar_m->get();
	    $this->template($this->data);
	}

	public function hasil_penilaian()
  	{
	    $this->data['title'] 	= 'Hasil Penilaian Pelamar';
	    $this->data['content']	= 'manager/hasil_penilaian';
	    $this->template($this->data);
	}

	public function laporan_hasil_penilaian()
  	{
	    $this->load->model('kriteria_m');
  		$this->load->model('bobot_m');
  			
  		$this->data['kriteria'] = $this->kriteria_m->get();
	    $this->data['pelamar']	= $this->Pelamar_m->get();

		$html = $this->load->view('manager/laporan_hasil_penilaian', $this->data, true);
    	$pdfFilePath = 'Laporan Hasil Penilaian Pelamar.pdf';

    	$this->load->library('m_pdf');
    	$this->m_pdf->pdf->WriteHTML($html);
    	$this->m_pdf->pdf->Output($pdfFilePath, "D");
		$this->load->view('manager/laporan_hasil_penilaian');
		//$this->load->view('manager/laporan_hasil_penilaian');
	}
}
