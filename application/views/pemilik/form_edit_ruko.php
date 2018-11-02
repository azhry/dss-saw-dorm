<link href="<?= base_url('assets') ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

<!-- PNotify -->
<link href="<?= base_url('assets') ?>/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
<link href="<?= base_url('assets') ?>/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">

<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content">
					<?= form_open_multipart('pemilik/edit-ruko/' . $id_ruko, ['class' => 'form-horizontal form-label-left']) ?>
						<span class="section">Edit Informasi Ruko</span>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="ruko">Alamat Ruko  <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="ruko" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" name="ruko" placeholder="Contoh: Jl. Mangkunegara" required="required" type="text" value="<?= $ruko->ruko ?>"/>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="biaya_sewa">Biaya Sewa <span class="required">*</span></label>
							<div class="col-md-3 col-sm-3 col-xs-12 input-group" style="padding-left: 10px;">
								<span class="input-group-addon" aria-hidden="true">Rp.</span>
								<input type="number" id="biaya_sewa" name="biaya_sewa" required="required" min="1" class="form-control" value="<?= $ruko->biaya_sewa ?>">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="luas_bangunan">Luas Bangunan <span class="required">*</span></label>
							<div class="col-md-3 col-sm-3 col-xs-12 input-group" style="padding-left: 10px;">
								<input type="number" id="luas_bangunan" name="luas_bangunan" required="required" min="1" class="form-control col-md-7 col-xs-12" value="<?= $ruko->luas_bangunan ?>">
								<span class="input-group-addon" aria-hidden="true">m²</span>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="akses_menuju_lokasi">Akses Menuju Lokasi <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<p style="padding: 5px;">
									<div class="row">
										<div class="col-md-4">
											<input type="checkbox" name="akses_menuju_lokasi[]" id="akses_menuju_lokasi1" value="Pejalan Kaki" data-parsley-mincheck="1" <?= in_array('Pejalan Kaki', $akses_menuju_lokasi) ? 'checked' : '' ?> class="flat" /> Pejalan Kaki
					                        <br/><br/>

					                        <input type="checkbox" name="akses_menuju_lokasi[]" id="akses_menuju_lokasi2" value="Angkutan Umum" <?= in_array('Angkutan Umum', $akses_menuju_lokasi) ? 'checked' : '' ?> class="flat" /> Angkutan Umum
					                        <br/><br/>

					                        <input type="checkbox" name="akses_menuju_lokasi[]" id="akses_menuju_lokasi3" value="Kendaraan Mobil" <?= in_array('Kendaraan Mobil', $akses_menuju_lokasi) ? 'checked' : '' ?> class="flat" /> Kendaraan Mobil
					                        <br/><br/>
										</div>
										<div class="col-md-4">
											<input type="checkbox" name="akses_menuju_lokasi[]" id="akses_menuju_lokasi4" value="Kendaraan Motor" <?= in_array('Kendaraan Motor', $akses_menuju_lokasi) ? 'checked' : '' ?> class="flat" /> Kendaraan Motor
					                        <br/><br/>

					                        <input type="checkbox" name="akses_menuju_lokasi[]" id="akses_menuju_lokasi5" value="Semuanya" <?= in_array('Semuanya', $akses_menuju_lokasi) ? 'checked' : '' ?> class="flat" /> Semuanya
					                        <br/><br/>
										</div>
									</div>
			                    </p>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="pusat_keramaian">Pusat Keramaian <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<p style="padding: 5px;">
									<div class="row">
										<div class="col-md-4">
											<input type="checkbox" name="pusat_keramaian[]" id="pusat_keramaian1" value="Kantor" <?= in_array('Kantor', $pusat_keramaian) ? 'checked' : '' ?> data-parsley-mincheck="1" class="flat" /> Kantor
					                        <br/><br/>

					                        <input type="checkbox" name="pusat_keramaian[]" id="pusat_keramaian2" value="Mall" <?= in_array('Mall', $pusat_keramaian) ? 'checked' : '' ?> class="flat" /> Mall
					                        <br/><br/>

					                        <input type="checkbox" name="pusat_keramaian[]" id="pusat_keramaian3" value="Pasar" <?= in_array('Pasar', $pusat_keramaian) ? 'checked' : '' ?> class="flat" /> Pasar
					                        <br/><br/>

					                        <input type="checkbox" name="pusat_keramaian[]" id="pusat_keramaian4" value="Rumah Sakit" <?= in_array('Rumah Sakit', $pusat_keramaian) ? 'checked' : '' ?> class="flat" /> Rumah Sakit
			                        		<br/><br/>
										</div>
										<div class="col-md-4">
											<input type="checkbox" name="pusat_keramaian[]" id="pusat_keramaian5" value="Sekolah" <?= in_array('Sekolah', $pusat_keramaian) ? 'checked' : '' ?> class="flat" /> Sekolah
					                        <br/><br/>

					                        <input type="checkbox" name="pusat_keramaian[]" id="pusat_keramaian6" value="Kampus" <?= in_array('Kampus', $pusat_keramaian) ? 'checked' : '' ?> class="flat" /> Kampus
					                        <br/><br/>

					                        <input type="checkbox" name="pusat_keramaian[]" id="pusat_keramaian7" value="Tidak Ada" <?= in_array('Tidak Ada', $pusat_keramaian) ? 'checked' : '' ?> class="flat" /> Tidak Ada
					                        <br/><br/>
										</div>
									</div>
			                    </p>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="zona_parkir">Zona Parkir <span class="required">*</span></label>
							<div class="col-md-3 col-sm-3 col-xs-12 input-group" style="padding-left: 10px;">
								<input type="number" id="zona_parkir" name="zona_parkir" required="required" min="1" class="form-control col-md-7 col-xs-12" value="<?= $ruko->zona_parkir ?>">
								<span class="input-group-addon" aria-hidden="true">m²</span>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="jumlah_pesaing_serupa">Jumlah Pesaing Serupa <span class="required">*</span></label>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<input type="number" id="jumlah_pesaing_serupa" name="jumlah_pesaing_serupa" required="required" min="0" class="form-control col-md-7 col-xs-12" value="<?= $ruko->jumlah_pesaing_serupa ?>">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tingkat_konsumtif_masyarakat">Tingkat Konsumtif Masyarakat <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<?php  
									$data = [
										'Sangat Tinggi'	=> 'Sangat Tinggi',
										'Tinggi'		=> 'Tinggi',
										'Cukup Tinggi'	=> 'Cukup Tinggi',
										'Rendah'		=> 'Rendah',
										'Sangat Rendah'	=> 'Sangat Rendah'
									];
									echo form_dropdown('tingkat_konsumtif_masyarakat', $data, $ruko->tingkat_konsumtif_masyarakat, ['id' => 'tingkat_konsumtif_masyarakat', 'class' => 'form-control col-md-7 col-xs-12', 'required' => 'required']);
								?>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="lingkungan_lokasi_ruko">Lingkungan Lokasi Ruko <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<?php  
									$data = [
										'Pertengahan Kota'			=> 'Pertengahan Kota',
										'Lingkungan Perkampungan'	=> 'Lingkungan Perkampungan',
										'Lingkungan Perumahan'		=> 'Lingkungan Perumahan',
										'Jalan Utama'				=> 'Jalan Utama',
										'Jalan Raya Kota'			=> 'Jalan Raya Kota',
										'Jalan Lintas Kota'			=> 'Jalan Lintas Kota'
									];
									echo form_dropdown('lingkungan_lokasi_ruko', $data, $ruko->lingkungan_lokasi_ruko, ['id' => 'lingkungan_lokasi_ruko', 'class' => 'form-control col-md-7 col-xs-12', 'required' => 'required']);
								?>
							</div>
						</div>

						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="lingkungan_lokasi_ruko">Lokasi Ruko <span class="required">*</span></label>
							<input id="pac-input" class="controls" type="text" placeholder="Cari Lokasi"/>
							<div id="map" style="height: 250px;"></div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="lingkungan_lokasi_ruko">Koordinat Lokasi <span class="required">*</span></label>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<input type="number" step="any" name="latitude" required class="form-control col-md-7 col-xs-12"/>
								<input type="number" step="any" name="longitude" required class="form-control col-md-7 col-xs-12"/>
							</div>
						</div>

						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="lingkungan_lokasi_ruko">Foto Ruko <span class="required">*</span></label>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<input type="file" id="foto_ruko" name="foto_ruko[]" data-url="<?= base_url('pemilik/upload-handler') ?>" class="form-control col-md-7 col-xs-12" multiple>
							</div>
						</div>
						<div class="item form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<div class="progress" id="progress">
			                        <div class="progress-bar progress-bar-info bar" style="width: 0%;">0%</div>
			                    </div>
			                    <div class="x_panel">
			                    	<div class="x_content">
			                    		<ul class="list-unstyled msg_list" role="menu" id="list-files">
			                    			<?php $i = 0; foreach ($files as $file): ?>
				                    			<li id="file-<?= $i ?>">
													<a>
														<div class="row">
															<div class="col-md-4">
																<span class="image"><img style="width: 50px; height: 50px;" src="<?= $upload_path . '/' . $file ?>" alt="Uploaded Image" /></span>
															</div>
															<div class="col-md-8">
																	<div class="row">
																		<div class="col-md-12">
																			<span class="pull-left"><?= $file ?></span>
																			<span class="pull-right">
																				<i onclick="removePhoto('#file-<?= $i++ ?>', '<?= $file ?>');" class="fa fa-close"></i>
																			</span>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-md-12">
																			<span class="message">
																				<?= round((filesize($upload_dir . '/' . $file) / 1024), 2) . ' KB' ?>
																			</span>
																		</div>
																	</div>
															</div>
														</div>
													</a>
													<input type="hidden" value="<?= $file ?>" name="uploaded_files[]"/>
												</li>
											<?php endforeach; ?>
										</ul>	
			                    	</div>
			                    </div>
							</div>
						</div>

						<div id="hidden-deleted-photo"></div>
                      
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-3">
								<button type="reset" class="btn btn-primary">Reset</button>
								<input id="submit" name="submit" type="submit" class="btn btn-success" value="Edit"/>
							</div>
						</div>
                    <?= form_close() ?>
				</div>
			</div>
			
		</div>
	</div>
</div>

<!-- validator -->
<script src="<?= base_url('assets') ?>/custom/js/validator.js"></script>

<!-- PNotify -->
<script src="<?= base_url('assets') ?>/vendors/pnotify/dist/pnotify.js"></script>
<script src="<?= base_url('assets') ?>/vendors/pnotify/dist/pnotify.buttons.js"></script>

<script src="<?= base_url('assets') ?>/vendors/iCheck/icheck.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/jQuery-File-Upload-9.23.0/js/vendor/jquery.ui.widget.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/jQuery-File-Upload-9.23.0/js/jquery.iframe-transport.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/jQuery-File-Upload-9.23.0/js/jquery.fileupload.js') ?>"></script>

<script type="text/javascript">
	function removePhoto(obj, file) {
		$('#hidden-deleted-photo').append('<input type="hidden" value="' + file + '" name="deleted_photo[]"/>');
		$(obj).remove();
	}

	function initMap() {
		// koordinat palembang
		let lat = <?= $ruko->latitude ?>;
		let lng = <?= $ruko->longitude ?>;
		let currentLocation = new google.maps.LatLng(lat, lng);

		let map = new google.maps.Map(document.getElementById('map'), {
			center: currentLocation,
			zoom: 12
		});

		$('input[name=latitude]').val(lat);
		$('input[name=longitude]').val(lng);

		let input = document.getElementById('pac-input');
        let searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        let markers = [];
        // Create a marker for each place.
        markers.push(new google.maps.Marker({
			map: map,
			position: currentLocation
        }));

        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          let places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          let bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }

            $('input[name=latitude]').val(place.geometry.location.lat);
			$('input[name=longitude]').val(place.geometry.location.lng);
          });
          map.fitBounds(bounds);
        });

        function setMarker(latLng) {
        	// Clear out the old markers.
			markers.forEach(function(marker) {	
				marker.setMap(null);
			});
			markers = [];

			// Create a marker for each place.
            markers.push(new google.maps.Marker({
				map: map,
				position: latLng
            }));
        }

        map.addListener('click', function(e) {
        	let clickedLat = e.latLng.lat();
        	let clickedLng = e.latLng.lng();

        	setMarker({ lat: clickedLat, lng: clickedLng });

        	$('input[name=latitude]').val(clickedLat);
			$('input[name=longitude]').val(clickedLng);
        });


        $('input[name=latitude]').keyup(function() {
        	let latLng = new google.maps.LatLng($(this).val(), $('input[name=longitude]').val());
        	setMarker(latLng);
        	map.setCenter(latLng);
        });
		$('input[name=longitude]').keyup(function() {
			let latLng = new google.maps.LatLng($('input[name=latitude]').val(), $(this).val());
        	setMarker(latLng);
        	map.setCenter(latLng);
        });
	}

	$(function () {

		<?php  
			$msg = $this->session->flashdata('msg');
			if (isset($msg)):
		?>

			new PNotify({
				title: 'Data Berhasil Disimpan',
				text: 'Informasi ruko yang anda masukkan telah berhasil tersimpan',
				type: 'success',
				styling: 'bootstrap3'
			});

		<?php endif;  ?>

	    $('#foto_ruko').fileupload({
	        dataType: 'json',
	        progressall: function (e, data) {
		        let progress = parseInt(data.loaded / data.total * 100, 10);
		        $('#progress .bar').css(
		            'width',
		            progress + '%'
		        ).text(progress + '%');

		        if (progress >= 100) {
		        	$('#progress .bar').removeClass('progress-bar-info')
		        		.addClass('progress-bar-success').text(progress + '% completed');
		        }
		    },
	        done: function (e, data) {
	        	let files = data.result['foto_ruko'];
	        	let file = files[0];
	        	$('#list-files').append('<li>' +
					'<a>' +
						'<span class="image"><img style="width: 50px; height: 50px;" src="' + file.thumbnailUrl + '" alt="Uploaded Image" /></span>' +
						'<span>' +
							'<span>' + file.name + '</span>' +
						'</span>' +
						'<span class="message">' +
							Math.round((file.size / 1024) * 100) / 100 + ' KB' +
						'</span>' +
					'</a>' +
					'<input type="hidden" value="' + file.name + '" name="new_uploaded_files[]"/>' +
				'</li>');
	        }
	    });
	});
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDV1CNPBI4qy_Wr5jDjKe0Pb40u9Tn27UA&libraries=places&callback=initMap" async defer></script>