<link href="<?= base_url('assets') ?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets') ?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets') ?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets') ?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets') ?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar Ruko <small>Nama Pemilik</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="text-muted font-13 m-b-30">
                                Berikut ini merupakan daftar ruko anda berdasarkan data yang telah anda masukan sebelumnya
                            </p>  
                        </div>
                        <div class="col-md-4">
                            <a href="#" class="btn btn-success pull-right">
                                <i class="fa fa-plus-square"></i> Tambah Ruko
                            </a>
                        </div>
                    </div>
                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Foto</th>
                                <th style="text-align: center;">Ruko</th>
                                <th style="text-align: center;">Biaya Sewa</th>
                                <th style="text-align: center;">Luas Bangunan</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($ruko as $row): ?>
                                <?php  
                                    $foto = array_values(array_diff(scandir($upload_dir . $row->id_ruko), ['.', '..']));
                                ?>
                                <tr>
                                    <td align="middle" style="vertical-align: middle;">
                                        <img src="<?= count($foto) > 0 ? base_url('assets/foto/ruko-' . $row->id_ruko . '/' . $foto[0]) : 'http://placehold.it/100' ?>" width="100" height="100">
                                    </td>
                                    <td align="middle" style="vertical-align: middle;"><?= $row->ruko ?></td>
                                    <td align="middle" style="vertical-align: middle;"><?= 'Rp. ' . number_format($row->biaya_sewa, 2, ',', '.') ?></td>
                                    <td align="middle" style="vertical-align: middle;"><?= $row->luas_bangunan ?></td>
                                    <td align="middle" style="vertical-align: middle;">
                                        <div class="btn-group">
                                            <a href="<?= base_url('pemilik/detail-ruko/' . $row->id_ruko) ?>" type="button" class="btn btn-info"><i class="fa fa-eye"></i> Detail</a>
                                            <a href="<?= base_url('pemilik/edit-ruko/' . $row->id_ruko) ?>" type="button" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DataTables -->
<script src="<?= base_url('assets') ?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets') ?>/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('assets') ?>/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets') ?>/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/vendors/datatables.net-fixedheader/js/datatables.fixedHeader.min.js') ?>"></script>