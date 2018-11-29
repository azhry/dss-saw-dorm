<link href="<?= base_url('assets/metronic') ?>/assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet"/>
<link href="<?= base_url('assets/metronic') ?>/assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet"/>
<link href="<?= base_url('assets/metronic') ?>/assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet"/>
<div class="page-content">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<!-- BEGIN PAGE TITLE -->
		<div class="page-title">
			<h1>Tambah Kost</h1>
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
						<i class="fa fa-gift"></i>Form Penambahan Kost Baru
					</div>
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<?= form_open_multipart('pemilik/tambah-kost', ['class' => 'form-horizontal']) ?>
						<div class="form-body">
							<?= $this->session->flashdata('msg') ?>
							<div class="form-group">
								<label class="col-md-3 control-label">Kost</label>
								<div class="col-md-4">
									<textarea name="kost" class="form-control"></textarea>
								</div>
							</div>
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
								<label class="col-md-3 control-label">Tipe</label>
								<div class="col-md-4">
									<div class="radio-list">
										<label>
										<input type="radio" name="tipe" value="Laki-laki"> Laki-laki</label>
										<label>
										<input type="radio" name="tipe" value="Perempuan"> Perempuan</label>
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
								<label class="col-md-3 control-label">Jumlah Kamar</label>
								<div class="col-md-4">
									<input type="number" name="jumlah_kamar" class="form-control input-circle-right"/>
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
							<div class="form-group">
								<label class="col-md-3 control-label">Lokasi Kost</label>
								<div class="col-md-7">
									<input id="pac-input" class="form-control" type="text" placeholder="Cari Lokasi"/>
									<div id="map" style="height: 250px;"></div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Koordinat Lokasi</label>
								<div class="col-md-3 col-sm-3 col-xs-12">
									<div class="input-group">
										<span class="input-group-addon input-circle-left">
											x
										</span>
										<input type="number" step="any" name="latitude" required class="form-control input-circle-right"/>
									</div>
									<div class="input-group">
										<span class="input-group-addon input-circle-left">
											y
										</span>
										<input type="number" step="any" name="longitude" required class="form-control input-circle-right"/>
									</div>
									
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Jarak ke Unsri Bukit</label>
								<div class="col-md-4">
									<div class="input-group">
										<input type="number" name="lokasi" id="jarak" readonly class="form-control input-circle-left">
										<span class="input-group-addon input-circle-right">
											M
										</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Foto Kost</label>
								<div class="col-md-9">
									<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
									<div class="row fileupload-buttonbar">
										<div class="col-lg-7">
											<!-- The fileinput-button span is used to style the file input field as button -->
											<span class="btn green fileinput-button">
												<i class="fa fa-plus"></i>
												<span>Add files... </span>
												<input type="file" id="foto_kost" data-url="<?= base_url('pemilik/upload-handler') ?>" name="foto_kost[]" multiple>
											</span>
										</div>
									</div>
									<div class="row">
										<div class="col-md-9">
											<div id="progress" class="progress progress-striped active">
												<div class="progress-bar bar progress-bar-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%; height: 20px;">
												</div>
											</div>	
										</div>
									</div>
									<div class="row">
										<div class="col-md-9">
											<!-- The table listing the files available for upload/download -->
											<table role="presentation" class="table table-striped clearfix">
												<tbody id="files">
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" name="submit" value="Submit" class="btn btn-circle blue">Submit</button>
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

        function setJarak(latLng) {
        	let currentLocation = latLng;
			let unsriLocation = new google.maps.LatLng(-2.984833, 104.732662);
	        
	        let request = {
	        	origin: currentLocation,
	        	destination: unsriLocation,
	        	travelMode: google.maps.TravelMode.DRIVING
	        };

	        let directionService = new google.maps.DirectionsService();
	        directionService.route(request, function(response, status) {
	        	$('#jarak').val(response.routes[0].legs[0].distance.value);
	        });
        }

        map.addListener('click', function(e) {
        	let clickedLat = e.latLng.lat();
        	let clickedLng = e.latLng.lng();

        	setMarker({ lat: clickedLat, lng: clickedLng });

        	$('input[name=latitude]').val(clickedLat);
			$('input[name=longitude]').val(clickedLng);

			setJarak(new google.maps.LatLng(clickedLat, clickedLng));
        });


        $('input[name=latitude]').keyup(function() {
        	let latLng = new google.maps.LatLng($(this).val(), $('input[name=longitude]').val());
        	setMarker(latLng);
        	map.setCenter(latLng);
        	setJarak(latLng);
        });
		$('input[name=longitude]').keyup(function() {
			let latLng = new google.maps.LatLng($('input[name=latitude]').val(), $(this).val());
        	setMarker(latLng);
        	map.setCenter(latLng);
        	setJarak(latLng);
        });
	}

	$(function () {
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

<script type="text/javascript" src="<?= base_url('assets/jQuery-File-Upload-9.23.0/js/vendor/jquery.ui.widget.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/jQuery-File-Upload-9.23.0/js/jquery.iframe-transport.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/jQuery-File-Upload-9.23.0/js/jquery.fileupload.js') ?>"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#foto_kost').fileupload({
	        dataType: 'json',
	        progressall: function (e, data) {
		        let progress = parseInt(data.loaded / data.total * 100, 10);
		        $('#progress .bar').css(
		            'width',
		            progress + '%'
		        ); 

		        if (progress >= 100) {
		        	$('#progress').removeClass('active');
		        	$('#progress .bar').removeClass('progress-bar-warning')
		        		.addClass('progress-bar-success');
		        }
		    },
	        done: function (e, data) {
	        	let files = data.result['foto_kost'];
	        	let file = files[0];
	        	$('#files').append('<tr>' +
        			'<td>' +
						'<span class="image"><img style="width: 50px; height: 50px;" src="' + file.thumbnailUrl + '" alt="Uploaded Image" /></span>' +
					'</td>' +
					'<td>' +
						'<span>' + file.name + '</span>' +
					'</td>' +
					'<td>' +
						'<span class="message">' +
							Math.round((file.size / 1024) * 100) / 100 + ' KB' +
						'</span>' +
					'</td>' +
					'<td>' +
						'<button type="button" class="btn red" onclick="hapus_foto(this);">Hapus</button>' +
					'</td>' +
					'<input type="hidden" value="' + file.name + '" name="uploaded_files[]"/>' +
				'</tr>');
	        },
	        error: function(err) { console.log(err.responseText); }
	    });
	});

	function hapus_foto(obj) {
		$(obj).parent().parent().remove();
	}

	function isInArray(value, array) {
		return array.indexOf(value) > -1;
	}

	var fasilitas = [];
	function tambah_fasilitas() {
		let jenis_fasilitas = $('#jenis_fasilitas').val();
		<?php foreach ($fasilitas as $key => $value): ?>
			if (jenis_fasilitas === '<?= $key ?>') {
				let config = {};
				let opt;
				<?php 
					$opt = $value['values']; 
					foreach ($opt as $k => $v):
					?>
						<?php $values = $v['values']; ?>
						
						opt = [];
						
						<?php foreach ($values as $ok => $ov): ?>
							opt.push('<?= $ok ?>');
						<?php endforeach; ?>

						config['<?= $k ?>'] = opt;

					<?php endforeach; ?>
				if (!isInArray('<?= $key ?>', fasilitas)) {
					create_option_form('<?= $value['label'] ?>', config, '<?= $key ?>');
					fasilitas.push('<?= $key ?>');
				} else {
					alert('Fasilitas tersebut telah ditambahkan sebelumnya');
				}
			}
		<?php endforeach; ?>
	}

	function generate_option(key, opt) {
		let html = '<div class="col-md-3">';
		html += '<select onchange="option_free_text(\'' + key + '\', this);" class="form-control input-circle" name="' + key + '" id="' + key + '">';
		let name = key.replace(/_/g, x => ' ');
		html += '<option value="">' + name + '</option>';
		for (let i = 0; i < opt.length; i++) {
			html += '<option value="' + opt[i] + '">' + opt[i] + '</option>';
		}
		html += '</select>';
		html += '</div>';
		return html;
	}

	function option_free_text(key, obj) {
		let value = $(obj).val();
		if (value == 'dll') {
			$(obj).parent().append('<input type="text" class="form-control input-circle" id="free-text-' + key + '" name="free_text_' + key + '" placeholder="' + key + '"/>');
		} else {
			$('#free-text-' + key).remove();
		}
	}

	function create_option_form(label, config, key) {

		let html = '<div class="row">' +
				'<label class="col-md-2 control-label"><small>' + label + '</small></label>';
		for (let k in config) {
			if (config.hasOwnProperty(k)) {
				html += generate_option(k, config[k]);
			}
		}
		html += '<button type="button" class="btn red" onclick="hapus_fasilitas(this, \'' + key + '\');"><i class="fa fa-times"></i></button>';
		html += '</div>' +
			'</div><br/>';
		$('#fasilitas').append(html);
	}

	function hapus_fasilitas(obj, key) {
		$(obj).parent().remove();
		fasilitas.splice(fasilitas.indexOf(key), 1);
	}
</script>