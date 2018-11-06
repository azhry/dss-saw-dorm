<?php
public function hehe()
{
$this->data['id_kost'] = $this->uri->segment(3);
$this->check_allowance(!isset($this->data['id_kost']));
$this->load->model('kost_m');
$this->data['data'] = $this->kost_m->get_row(['id_kost' => $this->data['id_kost']]);
$this->check_allowance(!isset($this->data['data']), ['data tidak ditemukan', 'danger']);
}
