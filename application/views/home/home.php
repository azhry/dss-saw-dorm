<link href="<?= base_url('assets/metronic') ?>/assets/admin/pages/css/search.css" rel="stylesheet" type="text/css"/>
<div class="page-content">
		<!-- BEGIN PAGE HEAD -->
		<div class="page-head">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Sistem Sewa Kost</h1>
			</div>
			<!-- END PAGE TITLE -->
		</div>
		<!-- END PAGE HEAD -->
		<!-- BEGIN PAGE CONTENT INNER -->
		<div class="row">
			<div class="col-md-8">
				<div class="booking-search">
					<!-- BEGIN FORM-->
					<?= form_open_multipart('pemilik/tambah-kost', ['class' => 'form-horizontal']) ?>
						<div class="form-body">
							<?= $this->session->flashdata('msg') ?>
							<div class="form-group">
								<label class="col-md-3 control-label">Harga Sewa Per Tahun</label>
								<div class="col-md-4">
									<div class="input-group">
										<span class="input-group-addon input-circle-left">
											Rp.
										</span>
										<input type="number" name="harga_sewa" class="form-control input-circle-right"/>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Luas Kamar</label>
								<div class="col-md-4">
									<div class="input-group">
										<input type="number" name="luas_kamar" class="form-control input-circle-left">
										<span class="input-group-addon input-circle-right">
											m²
										</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Lokasi</label>
								<div class="col-md-4">
									<div class="input-group">
										<input type="number" name="lokasi" class="form-control input-circle-left">
										<span class="input-group-addon input-circle-right">
											M
										</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Fasilitas</label>
								<div class="col-md-5">
									<select class="form-control input-circle" id="jenis_fasilitas">
										<option value="">-- Pilih Jenis Fasilitas --</option>
										<?php foreach ($fasilitas as $key => $value): ?>
											<option value="<?= $key ?>"><?= $value['label'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-md-4">
									<button type="button" onclick="tambah_fasilitas();" class="btn blue">
										<i class="fa fa-plus"></i> Tambah Fasilitas
									</button>
								</div>
							</div>
							<div id="fasilitas"></div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" name="submit" value="Submit" class="btn blue btn-block margin-top-20">Cari Kost <i class="fa fa-search"></i></button>
								</div>
							</div>
						</div>
					<?= form_close() ?>
					<!-- END FORM-->
				</div>
			</div>
			<!--end booking-search-->
			<div class="col-md-4">
				<div class="booking-app">
					<a href="javascript:;">
					<span>
					Cari kost yang sesuai dengan kebutuhanmu </span>
					</a>
				</div>
				<div class="booking-offer">
					<img src="<?= base_url('assets/metronic') ?>/assets/admin/pages/media/search/1.jpg" class="img-responsive" alt="">
					<div class="booking-offer-in" style="background-color: rgba(0, 0, 0, 0.5);">
						<span>Anda pemilik kostan?</span>
						<em>
							<u><a style="color: white !important;" href="#">Daftar sekarang</a></u>
						</em>
					</div>
				</div>
			</div>
			<!--end col-md-4-->
		</div>
		<!-- END PAGE CONTENT INNER -->
	</div>