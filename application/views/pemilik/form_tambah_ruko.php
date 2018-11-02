<link href="<?= base_url('assets') ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

<!-- PNotify -->
<link href="<?= base_url('assets') ?>/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
<link href="<?= base_url('assets') ?>/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">

<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content">
					<?= form_open_multipart('pemilik/tambah-ruko', ['class' => 'form-horizontal form-label-left']) ?>
						<span class="section">Informasi Ruko</span>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="ruko">Alamat Ruko  <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="ruko" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" name="ruko" placeholder="Contoh: Jl. Mangkunegara" required="required" type="text"/>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="biaya_sewa">Biaya Sewa <span class="required">*</span></label>
							<div class="col-md-3 col-sm-3 col-xs-12 input-group" style="padding-left: 10px;">
								<span class="input-group-addon" aria-hidden="true">Rp.</span>
								<input type="number" id="biaya_sewa" name="biaya_sewa" required="required" min="1" class="form-control">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="luas_bangunan">Luas Bangunan <span class="required">*</span></label>
							<div class="col-md-3 col-sm-3 col-xs-12 input-group" style="padding-left: 10px;">
								<input type="number" id="luas_bangunan" name="luas_bangunan" required="required" min="1" class="form-control col-md-7 col-xs-12">
								<span class="input-group-addon" aria-hidden="true">m²</span>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="akses_menuju_lokasi">Akses Menuju Lokasi <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<p style="padding: 5px;">
									<div class="row">
										<div class="col-md-4">
											<input type="checkbox" name="akses_menuju_lokasi[]" id="akses_menuju_lokasi1" value="Pejalan Kaki" data-parsley-mincheck="1" class="flat" /> Pejalan Kaki
					                        <br/><br/>

					                        <input type="checkbox" name="akses_menuju_lokasi[]" id="akses_menuju_lokasi2" value="Angkutan Umum" class="flat" /> Angkutan Umum
					                        <br/><br/>

					                        <input type="checkbox" name="akses_menuju_lokasi[]" id="akses_menuju_lokasi3" value="Kendaraan Mobil" class="flat" /> Kendaraan Mobil
					                        <br/><br/>
										</div>
										<div class="col-md-4">
											<input type="checkbox" name="akses_menuju_lokasi[]" id="akses_menuju_lokasi4" value="Kendaraan Motor" class="flat" /> Kendaraan Motor
					                        <br/><br/>

					                        <input type="checkbox" name="akses_menuju_lokasi[]" id="akses_menuju_lokasi5" value="Semuanya" class="flat" /> Semuanya
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
											<input type="checkbox" name="pusat_keramaian[]" id="pusat_keramaian1" value="Kantor" data-parsley-mincheck="1" class="flat" /> Kantor
					                        <br/><br/>

					                        <input type="checkbox" name="pusat_keramaian[]" id="pusat_keramaian2" value="Mall" class="flat" /> Mall
					                        <br/><br/>

					                        <input type="checkbox" name="pusat_keramaian[]" id="pusat_keramaian3" value="Pasar" class="flat" /> Pasar
					                        <br/><br/>

					                        <input type="checkbox" name="pusat_keramaian[]" id="pusat_keramaian4" value="Rumah Sakit" class="flat" /> Rumah Sakit
			                        		<br/><br/>
										</div>
										<div class="col-md-4">
											<input type="checkbox" name="pusat_keramaian[]" id="pusat_keramaian5" value="Sekolah" class="flat" /> Sekolah
					                        <br/><br/>

					                        <input type="checkbox" name="pusat_keramaian[]" id="pusat_keramaian6" value="Kampus" class="flat" /> Kampus
					                        <br/><br/>

					                        <input type="checkbox" name="pusat_keramaian[]" id="pusat_keramaian7" value="Tidak Ada" class="flat" /> Tidak Ada
					                        <br/><br/>
										</div>
									</div>
			                    </p>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="zona_parkir">Zona Parkir <span class="required">*</span></label>
							<div class="col-md-3 col-sm-3 col-xs-12 input-group" style="padding-left: 10px;">
								<input type="number" id="zona_parkir" name="zona_parkir" required="required" min="1" class="form-control col-md-7 col-xs-12">
								<span class="input-group-addon" aria-hidden="true">m²</span>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="jumlah_pesaing_serupa">Jumlah Pesaing Serupa <span class="required">*</span></label>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<input type="number" id="jumlah_pesaing_serupa" name="jumlah_pesaing_serupa" required="required" min="0" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tingkat_konsumtif_masyarakat">Tingkat Konsumtif Masyarakat <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select type="select" id="tingkat_konsumtif_masyarakat" name="tingkat_konsumtif_masyarakat" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" required="required">
									<option value="">Pilih..</option>
									<option value="Sangat Tinggi">Sangat Tinggi</option>
									<option value="Tinggi">Tinggi</option>
									<option value="Cukup Tinggi">Cukup Tinggi</option>
									<option value="Rendah">Rendah</option>
									<option value="Sangat Rendah">Sangat Rendah</option>
								</select>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="lingkungan_lokasi_ruko">Lingkungan Lokasi Ruko <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select type="select" id="lingkungan_lokasi_ruko" name="lingkungan_lokasi_ruko" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" required="required">
									<option value="">Pilih..</option>
									<option value="Pertengahan Kota">Pertengahan Kota</option>
									<option value="Lingkungan Perkampungan">Lingkungan Perkampungan</option>
									<option value="Lingkungan Perumahan">Lingkungan Perumahan</option>
									<option value="Jalan Utama">Jalan Utama</option>
									<option value="Jalan Raya Kota">Jalan Raya Kota</option>
									<option value="Jalan Lintas Kota">Jalan Lintas Kota</option>
								</select>
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
										</ul>	
			                    	</div>
			                    </div>
							</div>
						</div>
                      
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-3">
								<button type="reset" class="btn btn-primary">Reset</button>
								<input id="submit" name="submit" type="submit" class="btn btn-success" value="Submit"/>
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
	function initMap() {
		// koordinat palembang
		let lat = -2.990934;
		let lng = 104.7754;

		let map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: lat, lng: lng},
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
					'<input type="hidden" value="' + file.name + '" name="uploaded_files[]"/>' +
				'</li>');
	        }
	    });
	});
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDV1CNPBI4qy_Wr5jDjKe0Pb40u9Tn27UA&libraries=places&callback=initMap" async defer></script>