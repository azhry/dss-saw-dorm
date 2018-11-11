<div class="page-content">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<!-- BEGIN PAGE TITLE -->
		<div class="page-title">
			<h1>Konfigurasi SPK</h1>
		</div>
		<!-- END PAGE TITLE -->
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT INNER -->
	<div class="row margin-top-10">
		<div class="col-md-12">
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i>Form Konfigurasi Kriteria SPK
					</div>
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<?= form_open_multipart('pemilik/tambah-kost', ['class' => 'form-horizontal']) ?>
						<div class="form-actions">
							<?= $this->session->flashdata('msg') ?>
							<div class="form-group">
								<label class="col-md-3 control-label">Tambah Kriteria Baru</label>
								<div class="col-md-2">
									<input type="text" name="key" id="key" class="form-control input-circle" placeholder="key">
								</div>
								<div class="col-md-2">
									<input type="number" name="weight" id="weight" class="form-control input-circle" placeholder="weight">
								</div>
								<div class="col-md-2">
									<input type="text" name="label" id="label" class="form-control input-circle" placeholder="label">
								</div>
								<div class="col-md-2">
									<select class="form-control input-circle" name="type" id="type">
										<option value="">select type</option>
										<option value="range">range</option>
										<option value="option">option</option>
										<option value="criteria">criteria</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<button type="button" id="tambah-kriteria-button" class="btn btn-circle green"><i class="fa fa-plus"></i> Tambah Kriteria</button>
								</div>
							</div>
						</div>
						<div class="form-body" id="daftar-kriteria"></div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" name="submit" value="Submit" class="btn btn-circle blue">Simpan</button>
								</div>
							</div>
						</div>
					<?= form_close() ?>
					<!-- END FORM-->
				</div>
			</div>
		</div>
	</div>
	<!-- END PAGE CONTENT INNER -->
</div>

<script type="text/javascript">
	var f = {
		option: function(key, weight, label) {

		},
		range: function(key, weight, label) {
			let html = '<hr/><div class="form-group">' +
				'<input type="hidden" name="keys[]" value="' + key + '"/>' +
				'<input type="hidden" name="types[]" value="range"/>' +
				'<label class="col-md-2 control-label"><b>' + key + '</b></label>';
			
			html += '<div class="col-md-2">' +
						'<label>Label Kriteria</label>' +
						'<input type="text" placeholder="Label Kriteria" class="form-control input-circle" name="labels[]" value="' + label + '"/>' +
					'</div>';
			html += '<div class="col-md-2">' +
						'<label>Bobot</label>' +
						'<input type="number" placeholder="Weight" class="form-control input-circle" name="weights[]" value="' + weight + '"/>' +
					'</div>';

			html += '<div class="col-md-2">' +
						'<button onclick="add_range_option(\'' + key + '\');" type="button" class="btn btn-circle green"><i class="fa fa-plus"></i></label>' +
						'<button onclick="$(this).parent().parent().remove();" type="button" class="btn btn-circle red"><i class="fa fa-trash"></i></label>' +
					'</div>';				

			html += '<div class="col-md-12" id="' + key + '">' +
					'</div>';

			html +=	'</div>';

			$('#daftar-kriteria').append(html);
		},
		criteria: function(key, weight, label) {
			let html = '<hr/><div class="form-group">' +
				'<input type="hidden" name="keys[]" value="' + key + '"/>' +
				'<input type="hidden" name="types[]" value="criteria"/>' +
				'<label class="col-md-2 control-label"><b>' + key + '</b></label>';
			
			html += '<div class="col-md-2">' +
						'<label>Label Kriteria</label>' +
						'<input type="text" placeholder="Label Kriteria" class="form-control input-circle" name="labels[]" value="' + label + '"/>' +
					'</div>';
			html += '<div class="col-md-2">' +
						'<label>Bobot</label>' +
						'<input type="number" placeholder="Weight" class="form-control input-circle" name="weights[]" value="' + weight + '"/>' +
					'</div>';

			html += '<div class="col-md-2">' +
						'<label>Aksi</label><br/>' +
						'<button onclick="add_criteria_values(\'' + key + '\')" type="button" class="btn btn-circle green"><i class="fa fa-plus"></i></label>' +
						'<button onclick="$(this).parent().parent().remove();" type="button" class="btn btn-circle red"><i class="fa fa-trash"></i></label>' +
					'</div>';				

			html += '<div class="col-md-12" id="criteria_' + key + '">' +
					'</div>';

			html +=	'</div>';

			$('#daftar-kriteria').append(html);
		}
	};

	$('#tambah-kriteria-button').on('click', function() {
		let key = $('#key').val();
		let weight = $('#weight').val();
		let label = $('#label').val();
		let type = $('#type').val();

		f[type](key, weight, label);
	});

	function range_option(key, label, min, max, value) {
		label = label || '';
		return '<div class="row">' +
			'<div class="col-md-2"></div>' +
			'<div class="col-md-2">' +
				'<label><small>Label</small></label>' +
				'<input type="text" placeholder="Label" class="form-control input-circle" name="label_' + key + '[]" value="' + label + '"/>' +
			'</div>' +
			'<div class="col-md-2">' +
				'<label><small>Min</small></label>' +
				'<input type="number" placeholder="Min" class="form-control input-circle" name="min_' + key + '[]" value="' + min + '"/>' +
			'</div>' +
			'<div class="col-md-2">' +
				'<label><small>Max</small></label>' +
				'<input type="number" placeholder="Max" class="form-control input-circle" name="max_' + key + '[]" value="' + max + '"/>' +
			'</div>' +
			'<div class="col-md-2">' +
				'<label><small>Value</small></label>' +
				'<input type="number" placeholder="Value" class="form-control input-circle" name="value_' + key + '[]" value="' + value + '"/>' +
			'</div>' +
			'<div class="col-md-2">' +
				'<label><small>Hapus</small></label><br/>' +
				'<button onclick="$(this).parent().parent().remove();" type="button" class="btn btn-circle red btn-xs"><i class="fa fa-trash"></i></label>' +
			'</div>';
		'</div>';
	}

	function add_range_values(key, label, min, max, value) {
		$('#' + key).append(range_option(key, label, min, max, value));
	}

	function add_criteria_values(key, subkey, subweight, sublabel) {
		subkey = subkey || '';
		sublabel = sublabel || ''

		let html = '<div class="col-md-12">' +
			'<div class="row">' +
				'<div class="col-md-2"></div>' +
				'<div class="col-md-2">' +
					'<label><small>Subkey</small></label>' +
					'<input type="text" placeholder="Subkey" class="form-control input-circle" name="subkey_' + key + '[]" id="subkey_' + key + '" value="' + subkey + '"/>' +
				'</div>' +
				'<div class="col-md-2">' +
					'<label><small>Sublabel</small></label>' +
					'<input type="text" placeholder="Sublabel" class="form-control input-circle" name="sublabel_' + key + '[]" id="sublabel_' + key + '" value="' + sublabel + '"/>' +
				'</div>' +
				'<div class="col-md-2">' +
					'<label><small>Subweight</small></label>' +
					'<input type="number" placeholder="Subweight" class="form-control input-circle" name="subweight_' + key + '[]" id="subweight_' + key + '" value="' + subweight + '"/>' +
				'</div>' +
				'<div class="col-md-2">' +
					'<label><small>Aksi</small></label><br/>' +
					'<button onclick="add_new_criteria_value(\'' + key + '\')" type="button" class="btn btn-circle green btn-sm"><i class="fa fa-plus"></i></label>' +
					'<button onclick="$(this).parent().parent().remove()" type="button" class="btn btn-circle red btn-sm"><i class="fa fa-trash"></i></label>' +
				'</div>';
			'</div>';
		'</div>';

		html += '<div class="col-md-12" id="subcriteria_' + key + '">' +
					'</div>';
	
		$('#criteria_' + key).append(html);
	}

	function add_criteria_value(key, subkey, subsubkey, subsublabel) {
		let html = '<div class="col-md-12">' +
			'<div class="row">' +
				'<label class="col-md-2 control-label"><b><small>' + subkey + '</small></b></label>' +
				'<div class="col-md-2">' +
					'<label><small>Subsubkey</small></label>' +
					'<input type="text" placeholder="Subsubkey" class="form-control input-circle" name="subsubkey_' + subkey + '[]" id="subsubkey_' + subkey + '" value="' + subsubkey + '"/>' +
				'</div>' +
				'<div class="col-md-2">' +
					'<label><small>Subsublabel</small></label>' +
					'<input type="text" placeholder="Sublabel" class="form-control input-circle" name="subsublabel_' + subkey + '[]" id="subsublabel_' + subkey + '" value="' + subsublabel + '"/>' +
				'</div>' +
				'<div class="col-md-2">' +
					'<label><small>Tambah</small></label><br/>' +
					'<button onclick="add_criteria_option(\'' + subkey + '\')" type="button" class="btn btn-circle green btn-sm"><i class="fa fa-plus"></i></label>' +
					'<button onclick="$(this).parent().parent().remove()" type="button" class="btn btn-circle red btn-sm"><i class="fa fa-trash"></i></label>' +
				'</div>';
			'</div>';
		'</div>';

		html += '<div class="col-md-12" id="subsubcriteria_' + key + '">' +
					'</div>';
	
		$('#subcriteria_' + key).append(html);
	}

	function add_new_criteria_value(key, subkey, subsubkey, subsublabel) {
		subkey = subkey || $('#subkey_' + key).val();
		subsubkey = subsubkey || '';
		subsublabel = subsublabel || '';

		let html = '<div class="col-md-12">' +
			'<div class="row">' +
				'<label class="col-md-2 control-label"><b><small>' + subkey + '</small></b></label>' +
				'<div class="col-md-2">' +
					'<label><small>Subsubkey</small></label>' +
					'<input type="text" placeholder="Subsubkey" class="form-control input-circle" name="subsubkey_' + subkey + '[]" id="subsubkey_' + subkey + '" value="' + subsubkey + '"/>' +
				'</div>' +
				'<div class="col-md-2">' +
					'<label><small>Subsublabel</small></label>' +
					'<input type="text" placeholder="Sublabel" class="form-control input-circle" name="subsublabel_' + subkey + '[]" id="subsublabel_' + subkey + '" value="' + subsublabel + '"/>' +
				'</div>' +
				'<div class="col-md-2">' +
					'<label><small>Tambah</small></label><br/>' +
					'<button onclick="" type="button" class="btn btn-circle green btn-sm"><i class="fa fa-plus"></i></label>' +
					'<button onclick="$(this).parent().parent().remove()" type="button" class="btn btn-circle red btn-sm"><i class="fa fa-trash"></i></label>' +
				'</div>';
			'</div>';
		'</div>';

		html += '<div class="col-md-12" id="subcriteria_' + subkey + '">' +
					'</div>';
	
		$('#subcriteria_' + subkey).append(html);
	}

	function add_criteria_opt(key, subsubkey, subsubsubkey, subsubsubvalue) {
		let html = '<div class="col-md-12">' +
			'<div class="row">' +
				'<label class="col-md-2 control-label"><b><small><small>' + subsubkey + '</small></small></b></label>' +
				'<div class="col-md-2">' +
					'<label><small><small>Name</small></small></label>' +
					'<input type="text" placeholder="Subsubkey" class="form-control input-circle" name="name_' + subsubkey + '[]" id="name_' + subsubkey + '" value="' + subsubsubkey + '"/>' +
				'</div>' +
				'<div class="col-md-2">' +
					'<label><small><small>Value</small></small></label>' +
					'<input type="text" placeholder="Sublabel" class="form-control input-circle" name="value_' + subsubkey + '[]" id="value_' + subsubkey + '" value="' + subsubsubvalue + '"/>' +
				'</div>' +
				'<div class="col-md-2">' +
					'<label><small><small>Hapus</small></small></label><br/>' +
					'<button onclick="$(this).parent().parent().remove()" type="button" class="btn btn-circle red btn-xs"><i class="fa fa-trash"></i></label>' +
				'</div>';
			'</div>';
		'</div>';

		$('#subsubcriteria_' + key).append(html);
	}

	<?php foreach ($kriteria as $row): ?>
		f['<?= $row->type ?>']('<?= $row->key ?>', <?= $row->weight ?>, '<?= $row->label ?>');
		<?php if ($row->type == 'range'): ?>
			<?php 
				$details = json_decode($row->details); 
				foreach ($details as $detail):
			?>
				add_range_values('<?= $row->key ?>', '<?= $detail->label ?>', '<?= $detail->min ?>', '<?= $detail->max ?>', '<?= $detail->value ?>');
			<?php endforeach; ?>
		<?php elseif ($row->type == 'criteria'): ?>
			<?php 
				$details = json_decode($row->details);
				foreach ($details as $key => $value):
			?>
				add_criteria_values('<?= $row->key ?>', '<?= $key ?>', '<?= $value->weight ?>', '<?= $value->label ?>');
				<?php foreach ($value->values as $k => $v): ?>
					add_criteria_value('<?= $row->key ?>', '<?= $key ?>', '<?= $k ?>', '<?= $v->label ?>');
					<?php foreach ($v->values as $kk => $vv): ?>
						add_criteria_opt('<?= $row->key ?>', '<?= $k ?>', '<?= $kk ?>', '<?= $vv ?>');
					<?php endforeach; ?>
				<?php endforeach; ?>
			<?php endforeach; ?>
		<?php endif; ?>
	<?php endforeach; ?>
</script>
