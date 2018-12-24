<div class="page-content">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<!-- BEGIN PAGE TITLE -->
		<div class="page-title">
			<h1>Daftar Kost</h1>
		</div>
		<!-- END PAGE TITLE -->
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT INNER -->
	<div class="row margin-top-10">
		<div class="col-md-12">
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<div class="portlet box grey-cascade">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-globe"></i>
					</div>
				</div>
				<div class="portlet-body">
					<table class="table table-striped table-bordered table-hover" id="sample_1">
						<thead>
							<tr>
								<th style="text-align: center;">
									Kost
								</th>
								<th style="text-align: center;">
									Harga Sewa Per Tahun
								</th>
								<th style="text-align: center;">
									Luas Kamar
								</th>
								<th style="text-align: center;">
									Lokasi
								</th>
								<th style="text-align: center;">
									Status
								</th>
								<th width="200" style="text-align: center;">
									Aksi
								</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($kost as $row): ?>
								<tr class="odd gradeX">
									<td>
										<?= $row->kost ?>
									</td>
									<td>
										<?= 'Rp. ' . number_format($row->harga_sewa, 2, ',', '.') ?>
									</td>
									<td>
										<?= $row->luas_kamar ?> m²
									</td>
									<td class="center">
										<?= $row->lokasi ?> M
									</td>
									<td id="button-<?= $row->id_kost ?>">
										<?php if ($row->status == 'Verified'): ?>
											<button class="btn green" onclick="verify('<?= $row->id_kost ?>', this)"><i class="fa fa-check"></i> Verified</button>
										<?php else: ?>
											<button class="btn yellow" onclick="verify('<?= $row->id_kost ?>', this)">Pending</button>
										<?php endif; ?>
									</td>
									<td>
										<div class="btn-group btn-group-solid">
											<a href="<?= base_url('admin/detail-kost/' . $row->id_kost) ?>" class="btn blue btn-sm"><i class="fa fa-eye"></i> Lihat Info Detail</a>
											<a href="#modal" onclick="show_modal('<?= $row->id_kost ?>', '<?= $row->kost ?>', '<?= $row->status ?>');" data-toggle="modal" class="btn btn-info btn-sm">Ubah Status</a>
										</div>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- END EXAMPLE TABLE PORTLET-->
		</div>
	</div>
	<!-- END PAGE CONTENT INNER -->
</div>

<div class="modal fade" id="modal" tabindex="-1" role="modal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Verifikasi Kost <span id="kost"></span></h4>
			</div>
			<div class="modal-body">
				<input type="hidden" name="id_kost" id="id_kost">
				<div class="form-group">
					<label class="col-md-3 control-label">Status</label>
					<div class="col-md-9">
						<div class="radio-list">
							<label>
							<input type="radio" name="status" value="Verified"> Lolos Verifikasi</label>
							<label>
							<input type="radio" name="status" value="Pending"> Tidak Lolos Verifikasi</label>
						</div>
					</div>
				</div>
				<div id="pesan-verifikasi-container" style="display: none;">
					<textarea class="form-control" id="pesan_verifikasi" placeholder="Masukkan pesan"></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn default" data-dismiss="modal">Batal</button>
				<button type="button" onclick="ubah_status();" name="ubah_status" value="Ubah" class="btn blue">Ubah</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<script type="text/javascript" src="<?= base_url('assets/metronic') ?>/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/metronic') ?>/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/metronic') ?>/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#sample_1').dataTable();

		$('input[name=status]').on('change', function() {
			const status = $('input[name=status]:checked').val();
			if (status === 'Pending') {
				$('#pesan-verifikasi-container').css('display', 'block');
			} else {
				$('#pesan-verifikasi-container').css('display', 'none');
			}
		});
	});

	function show_modal(id_kost, kost, status) {
		$('#kost').text(kost);
		$('#id_kost').val(id_kost);
		$('#pesan_verifikasi').val('');
	}

	function ubah_status() {
		const data = {
			id_kost: $('#id_kost').val(),
			status: $('input[name=status]:checked').val(),
			pesan: $('#pesan_verifikasi').val(),
			ubah_status: true
		};

		console.log(data);

		$.ajax({
			url: '<?= base_url('admin/daftar-kost') ?>',
			type: 'POST',
			data: data,
			success: function(response) {
				$('#modal').modal('hide');
				let html;
				if (data.status == 'Verified') {
					html = '<button class="btn green" onclick="verify(' + data.id_kost + ', this)"><i class="fa fa-check"></i> Verified</button>';
				} else {
					html = '<button class="btn yellow" onclick="verify(' + data.id_kost + ', this)">Pending</button>';
				}

				$('#button-' + data.id_kost).html(html);
			},
			error: function(err) { 
				console.log(err.responseText); 
				$('#modal').modal('hide');
			}
		});
	}

	function verify(id_kost, obj) {
		$.ajax({
			url: '<?= base_url('admin/verifikasi-kost') ?>',
			type: 'POST',
			data: {
				verify: true,
				id_kost: id_kost
			},
			success: function(response) {
				let json = $.parseJSON(response);
				if (json.status == 'success') {
					if (json.data == 'Verified') {
						$(obj).removeClass('yellow').addClass('green').html('<i class="fa fa-check"></i> Verified');
					} else {
						$(obj).removeClass('green').addClass('yellow').html('Pending');
					}
				}
			},
			error: function(error) { console.log(error.responseText); }
		});
	}
</script>