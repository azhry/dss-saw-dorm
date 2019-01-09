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
        $this->data['title']    = 'Selamat Datang';
        $this->data['content']  = 'main';
        $this->template($this->data, $this->module, ['sidebar']);
    }

    public function cari()
    {
        $this->load->model('kost_m');
        $this->data['range']        = $this->kost_m->get_range();
        $this->load->library('Saw/criteria');
        $this->load->library('Saw/saw');

        $this->load->model('kriteria_m');
        $kriteria = $this->kriteria_m->get();
        $config = [];
        foreach ($kriteria as $row)
        {
            $details = json_decode($row->details, true);

            if ($row->type == 'range') {
                $max = PHP_INT_MIN;
                $min = PHP_INT_MAX;
                $max_idx = -1;
                $min_idx = -1;
                for ($i = 0; $i < count($details); $i++)
                {
                    if ($details[$i]['max'] > $max) {
                        $max = $details[$i]['max'];
                        $max_idx = $i;
                    }

                    if ($details[$i]['min'] > $min) {
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
                $this->data['fasilitas']    = $details;
            }

            $config[$row->key] = [
             'key'        => $row->key,
             'weight'    => $row->weight,
             'label'        => $row->label,
             'type'        => $row->type,
             'values'    => $details
            ];
        }

        $this->saw->set_config($config);
        $this->data['config']         = $this->criteria->get_config();
        $this->data['fasilitas']    = $config['fasilitas']['values'];
        $this->data['title']        = 'Home';
        $this->data['content']      = 'home';
        $this->template($this->data, $this->module);    
    }

    public function documentation()
    {
        redirect('assets/metronic/templates/admin4_material_design/');
    }

    public function daftar_kost()
    {
        $this->load->library('Saw/criteria');
        $this->load->library('Saw/saw');

        $this->load->model('kriteria_m');
        $kriteria = $this->kriteria_m->get();
        $config = [];
        foreach ($kriteria as $row)
        {
            $details = json_decode($row->details, true);

            if ($row->type == 'range') {
                $max = PHP_INT_MIN;
                $min = PHP_INT_MAX;
                $max_idx = -1;
                $min_idx = -1;
                for ($i = 0; $i < count($details); $i++)
                {
                    if ($details[$i]['max'] > $max) {
                        $max = $details[$i]['max'];
                        $max_idx = $i;
                    }

                    if ($details[$i]['min'] > $min) {
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
                $this->data['fasilitas']    = $details;
            }

            $config[$row->key] = [
             'key'        => $row->key,
             'weight'    => $row->weight,
             'label'        => $row->label,
             'type'        => $row->type,
             'values'    => $details
            ];
        }

        $this->saw->set_config($config);
        $this->data['config']       = $this->criteria->get_config();
        $this->data['fasilitas']    = $this->data['config']['fasilitas']['values'];
        $this->load->model('kost_m');
        $this->data['kost']    = $this->kost_m->get();
        $rank = [];
        if (count($this->data['kost']) > 0) 
        {
            $this->saw->set_criteria_type(
                [
                    'harga_sewa'    => 'cost',
                    'lokasi'        => 'cost',
                    'luas_kamar'    => 'benefit',
                    'fasilitas'     => 'benefit'
                ]
            );
            $this->data['kost'] = array_map(
                function ($x) {
                     $x->fasilitas = json_decode($x->fasilitas, true);
                     return $x;
                }, $this->data['kost']
            );
            $this->saw->fit($this->data['kost'], ['id_kost', 'id_pengguna', 'kost', 'latitude', 'longitude', 'status', 'jumlah_kamar', 'tipe', 'pesan_verifikasi']);
            $this->saw->normalize();
            $this->saw->result();

            $rank = $this->saw->rank();
            $rank = array_map(
                function ($row) {
                     $row = (array)$row;
                     $path = 'assets/foto/kost-' . $row['id_kost'];
                     if (file_exists(FCPATH . $path))
                     {
                        $foto = scandir(FCPATH . $path);
                        $foto = array_values(array_diff($foto, ['.', '..']));
                     }
                     $row['fasilitas'] = implode(',', array_keys($row['fasilitas']));
                     $row['foto'] = isset($foto[0]) ? base_url($path . '/' . $foto[0]) : 'http://placehold.it/313x313';
                     return (object)$row;
                }, $rank
            );

            $this->data['kost'] = $rank;
        }
        $this->data['title']    = 'Daftar Kost';
        $this->data['content']    = 'daftar_kost';
        $this->template($this->data, $this->module);
    }

    public function detail_kost()
    {
        $this->data['id_kost']    = $this->uri->segment(3);
        $this->check_allowance(!isset($this->data['id_kost']));

        $this->load->model('kost_m');
        $this->data['kost']            = $this->kost_m->get_kost_row(['kost.id_kost' => $this->data['id_kost']]);
        $this->check_allowance(!isset($this->data['kost']), ['Data kost tidak ditemukan', 'danger']);

        $this->data['upload_dir']           = FCPATH . 'assets/foto/kost-' . $this->data['kost']->id_kost;
        $this->data['files']                = [];
        if (file_exists($this->data['upload_dir']))
        {
            $this->data['files'] = array_values(array_diff(scandir($this->data['upload_dir']), ['.', '..']));
        }
        
        $this->data['upload_path']          = base_url('assets/foto/kost-' . $this->data['kost']->id_kost);    

        $this->data['title']                = 'Detail Informasi Kost';
        $this->data['content']                = 'detail_kost';
        $this->template($this->data, $this->module);
    }

    public function rank()
    {
        if ($this->POST('cari')) 
        {
            $this->load->library('Saw/criteria');
            $this->load->library('Saw/saw');

            $this->load->model('kriteria_m');
            $kriteria = $this->kriteria_m->get();
            $config = [];
            foreach ($kriteria as $row)
            {
                $details = json_decode($row->details, true);

                if ($row->type == 'range') {
                    $max = PHP_INT_MIN;
                    $min = PHP_INT_MAX;
                    $max_idx = -1;
                    $min_idx = -1;
                    for ($i = 0; $i < count($details); $i++)
                    {
                        if ($details[$i]['max'] > $max) {
                            $max = $details[$i]['max'];
                            $max_idx = $i;
                        }

                        if ($details[$i]['min'] > $min) {
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
                    $this->data['fasilitas']    = $details;
                }

                $config[$row->key] = [
                 'key'        => $row->key,
                 'weight'    => $row->weight,
                 'label'        => $row->label,
                 'type'        => $row->type,
                 'values'    => $details
                ];
            }

            $this->saw->set_config($config);
            $this->data['config']         = $this->criteria->get_config();
            $this->data['fasilitas']    = $this->data['config']['fasilitas']['values'];

            $this->load->model('kost_m');
            $range = $this->kost_m->get_range();

            $cond = '';
            if (!empty($this->POST('harga_sewa'))) 
            {
                $harga_sewa = $this->POST('harga_sewa');
                $range_sewa = $range['harga_sewa'];
                $cond .= '(harga_sewa >= ' . $range_sewa[count($range_sewa) - $harga_sewa]['min'] . ' AND harga_sewa <= ' . $range_sewa[count($range_sewa) - $harga_sewa]['max'] . ') ';
            }

            if (!empty($this->POST('lokasi'))) 
            {
                if (strlen($cond) > 0) 
                {
                    $cond .= 'AND ';
                }

                $lokasi = $this->POST('lokasi');
                $range_lokasi = $range['lokasi'];
                $cond .= '(lokasi >= ' . $range_lokasi[count($range_lokasi) - $lokasi]['min'] . ' AND lokasi <= ' . $range_lokasi[count($range_lokasi) - $lokasi]['max'] . ') ';
            }

            $jenis = $this->POST('jenis');
            $jenis = isset($jenis) ? $jenis : [];
            foreach ($this->data['fasilitas'] as $key => $value)
            {
                if (!in_array($key, $jenis))
                {
                    continue;
                }

                $i = 0;
                foreach ($value['values'] as $k => $v)
                {
                    $key = $this->POST($k);
                    if (isset($key) && !empty($key)) 
                    {
                        if (strlen($cond) > 0 && $i <= 0) 
                        {
                            $cond .= 'AND ';
                        }
                        if ($key == 'dll')
                        {
                            $cond .= ($i > 0 ? 'AND ' : ' ') . 'fasilitas LIKE \'%';
                            $cond .= '"' . $k . '":%\' ';
                            foreach ($v['values'] as $kk => $vv)
                            {
                                $cond .= 'AND fasilitas NOT LIKE \'%';
                                $cond .= '"' . $k . '":"' . $kk . '"%\' ';
                            }
                        }
                        else
                        {
                            $cond .= ($i > 0 ? 'AND ' : ' ') . 'fasilitas LIKE \'%';
                            $cond .= '"' . $k . '":"' . $this->POST($k) . '"%\' ';
                        }
                        $i++;
                    }
                }
            }

            if (!empty($this->POST('luas_kamar'))) 
            {
                if (strlen($cond) > 0) 
                {
                    $cond .= 'AND ';
                }
                
                $luas_kamar = $this->POST('luas_kamar');
                $luas_kamar_range = $range['luas_kamar'];
                $cond .= '(luas_kamar >= ' . $luas_kamar_range[$luas_kamar - 1]['min'] . ' AND luas_kamar <= ' . $luas_kamar_range[$luas_kamar - 1]['max'] . ') ';
            }

            if (!empty($this->POST('tipe'))) {
                if (strlen($cond) > 0) {
                    $cond .= 'AND ';
                }
                
                $cond .= 'tipe = "' . $this->POST('tipe') . '" '; 
            }

            if (strlen($cond) > 0) {
                $cond .= 'AND status = "Verified"';
            }
            else
            {
                $cond .= 'status = "Verified"';
            }

            $this->data['kost']    = $this->kost_m->get($cond);
            $rank = [];
            if (count($this->data['kost']) > 0) {
                $this->saw->set_criteria_type(
                    [
                        'harga_sewa'    => 'cost',
                        'lokasi'        => 'cost',
                        'luas_kamar'    => 'benefit',
                        'fasilitas'     => 'benefit'
                    ]
                );
                $this->load->model('kost_m');
                $this->data['kost'] = array_map(
                    function ($x) {
                         $x->fasilitas = json_decode($x->fasilitas, true);
                         return $x;
                    }, $this->data['kost']
                );
                $this->saw->fit($this->data['kost'], ['id_kost', 'id_pengguna', 'kost', 'latitude', 'longitude', 'status', 'jumlah_kamar', 'tipe', 'pesan_verifikasi']);
                $this->saw->normalize();
                $this->saw->result();

                $rank = $this->saw->rank();
                $rank = array_map(
                    function ($row) {
                         $row = (array)$row;
                         $path = 'assets/foto/kost-' . $row['id_kost'];
                         if (file_exists(FCPATH . $path))
                         {
                            $foto = scandir(FCPATH . $path);
                            $foto = array_values(array_diff($foto, ['.', '..']));
                         }
                         $row['fasilitas'] = implode(',', array_keys($row['fasilitas']));
                         $row['foto'] = isset($foto[0]) ? base_url($path . '/' . $foto[0]) : 'http://placehold.it/313x313';
                         $row['harga_sewa'] = 'Rp. ' . number_format($row['harga_sewa'], 2, ',', '.');
                         return $row;
                    }, $rank
                );
            }
            echo json_encode($rank);
        }
    }
}
