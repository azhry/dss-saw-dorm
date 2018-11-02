<?php  

class Supervisor extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->data['username']       = $this->session->userdata('username');
        $this->data['id_hak_akses']   = $this->session->userdata('id_hak_akses');
        
        if (!isset($this->data['username'], $this->data['id_hak_akses']) or $this->data['id_hak_akses'] != 2)
        {
            $this->session->sess_destroy();
            redirect('login');
            exit;
        }

	}

	public function index()
  	{
        $this->load->model('hasil_penilaian_m');
        $this->load->model('user_m');
        $this->load->model('kriteria_m');
        $this->load->model('pelamar_m');
        $this->data['kriteria'] = $this->kriteria_m->get();
        $this->data['pengguna']	= $this->user_m->get();
        $this->data['hasil']    = $this->hasil_penilaian_m->get();
	    $this->data['pelamar']	= $this->pelamar_m->get();
	    $this->data['title'] 	= 'Dashboard Supervisor';
	    $this->data['content']	= 'supervisor/dashboard';
	    $this->template($this->data);
	}

	public function daftar_pelamar()
	{
		$this->load->model('pelamar_m');
		$this->data['title'] 	= 'Daftar Pelamar';
	    $this->data['content']	= 'supervisor/daftar_pelamar';
	    $this->data['pelamar']	= $this->pelamar_m->get();
	    $this->template($this->data);
	}

	public function kriteria()
	{
		$this->load->model('Kriteria_m');
		$this->data['data']   	= $this->Kriteria_m->get();
	    $this->data['columns']  = ["id_kriteria","nama","benefit","bobot",];
	    $this->data['title']  	= 'Kriteria';
	    $this->data['content']  = 'supervisor/kriteria_all';
	    $this->template($this->data);
	}

	public function hasil_penilaian()
  	{
  		$this->data['id_pelamar']	= $this->uri->segment(3);
  		if (!isset($this->data['id_pelamar']))
  		{
  			redirect('supervisor/daftar-pelamar');
  			exit;
  		}

  		$this->load->model('pelamar_m');
  		$this->load->model('kriteria_m');
  		$this->load->model('bobot_m');
  		$this->load->model('penilaian_m');
  		$this->load->model('keputusan_m');
  		$this->load->model('hasil_penilaian_m');

  		$this->data['pelamar']		= $this->pelamar_m->get_row(['id_pelamar' => $this->data['id_pelamar']]);
  		$this->data['penilaian']	= $this->penilaian_m->get(['id_pelamar' => $this->data['id_pelamar']]);
	    $this->data['title'] 		= 'Hasil Penilaian Pelamar';
	    $this->data['content']		= 'supervisor/hasil_penilaian';
	    $this->template($this->data);
	}

	public function ranking_penilaian()
    {
        $this->load->model('pelamar_m');
        $this->load->model('hasil_penilaian_m');
        $this->load->model('keputusan_m');
        $this->load->model('kriteria_m');
        $this->load->model('bobot_m');
        $this->load->model('penilaian_m');

        $this->data['kriteria']	= $this->kriteria_m->get();
        $this->data['hasil']    = $this->hasil_penilaian_m->get_by_order('hasil', 'DESC');
        $this->data['title']    = 'Ranking Pelamar';
        $this->data['content']  = 'supervisor/ranking_penilaian';
        $this->template($this->data);
    }

    public function edit_profile()
    {
    	$this->load->model('supervisor_m');
    	if ($this->POST('submit'))
    	{
    		$username 		= $this->POST('username');
    		$old_password	= $this->POST('old_password');
    		$check_pass 	= $this->supervisor_m->get_row(['username' => $this->data['username'], 'password' => md5($old_password)]);
    		if ($check_pass)
    		{
    			$new_password 			= $this->POST('new_password');
    			$confirm_new_password	= $this->POST('confirm_new_password');
    			if ($new_password === $confirm_new_password)
    			{
    				$this->data['entri'] = [
    					'username'	=> $username,
    					'password'	=> md5($new_password)
    				];

    				$this->supervisor_m->update($this->data['username'], $this->data['entri']);
    				$this->session->set_userdata(['username' => $username]);
    				$this->flashmsg('<i class="fa fa-check"></i> Profil berhasil di-edit');
    			}
    			else
    			{
    				$this->flashmsg('<i class="fa fa-warning"></i> Password baru anda tidak cocok dengan password konfirmasi', 'danger');		
    			}
    		}
    		else
    		{
    			$this->flashmsg('<i class="fa fa-warning"></i> Password lama anda tidak cocok', 'danger');
    		}

    		redirect('supervisor/edit-profile');
    		exit;
    	}

    	$this->data['title']	= 'Edit Profile' . $this->title;
    	$this->data['content']	= 'supervisor/edit_profile';
    	$this->template($this->data);
    }

    public function laporan()
    {
        @unlink(realpath(APPPATH . '../laporan.pdf'));
        header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
        header("Content-disposition: attachment; filename=laporan.pdf");
        header("Content-type: application/pdf");
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', -1);
        $rand = mt_rand(1000, 2000);
        $cmd = 'assets\phantomjs-2.1.1\bin\phantomjs.exe assets\phantomjs-2.1.1\generate_pdf.js ' . base_url('login/laporan?nocache='.mt_rand(0, 9999999)) . ' laporan.pdf ' . 1;
        echo exec($cmd);
        readfile(base_url('laporan.pdf'));
        // redirect(base_url('laporan.pdf'));
    }
}