<link rel="stylesheet" type="text/css" href="<?= base_url('assets/build/css/lightslider.min.css') ?>">
<div class="page-content">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<!-- BEGIN PAGE TITLE -->
		<div class="page-title">
			<h1>Detail Informasi Kost</h1>
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
						<i class="fa fa-globe"></i>Data Kost
					</div>
				</div>
				<div class="portlet-body">
					<div class="row">
						<div class="col-md-4">
							<div class="demo">
								<?php  
									$path = 'assets/foto/kost-' . $kost->id_kost;
									$photos = scandir(FCPATH . $path);
									$photos = array_values(array_diff($photos, ['.', '..']));
								?>
							    <ul id="lightSlider">
							    	<?php foreach ($photos as $photo): ?>
								        <li data-thumb="<?= base_url($path . '/' . $photo) ?>">
								            <img width="400" src="<?= base_url($path . '/' . $photo) ?>" />
								        </li>
							    	<?php endforeach; ?>
							    </ul>
							</div>
						</div>
						<div class="col-md-8">
							<table class="table table-striped table-bordered table-hover" id="sample_1">
								<tbody>
									<tr>
										<td><b>Kost</b></td>
										<td><?= $kost->kost ?></td>
									</tr>
									<tr>
										<td><b>Harga Sewa Per Tahun</b></td>
										<td><?= 'Rp. ' . number_format($kost->harga_sewa, 2, ',', '.') ?></td>
									</tr>
									<tr>
										<td><b>Luas Kamar</b></td>
										<td><?= $kost->luas_kamar ?> m²</td>
									</tr>
									<tr>
										<td><b>Lokasi</b></td>
										<td><?= $kost->lokasi ?> M</td>
									</tr>
									<tr>
										<td><b>Fasilitas</b></td>
										<td>
											<ul>
												<?php  
													$fasilitas = json_decode($kost->fasilitas);
													foreach ($fasilitas as $key => $value):
												?>
													<li>
														<?= ucwords(str_replace('_', ' ', $key)) . ' ' ?>
														<?php foreach ($value as $k => $v): ?>
															<?= $v . ' ' ?>
														<?php endforeach; ?>
													</li>
												<?php endforeach; ?>
											</ul>
										</td>
									</tr>
								</tbody>
							</table>	
						</div>
					</div>
				</div>
			</div>
			<!-- END EXAMPLE TABLE PORTLET-->
			<div class="portlet box grey-cascade">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-globe"></i> Lokasi Kost
					</div>
				</div>
				<div class="portlet-body">
					<div class="row">
						<div class="col-md-12">
							<div id="map" style="height: 350px;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END PAGE CONTENT INNER -->
</div>

<script type="text/javascript">
	function initMap() {
		let lat = <?= $kost->latitude ?>;
		let lng = <?= $kost->longitude ?>;
		let currentLocation = new google.maps.LatLng(lat, lng);

		let map = new google.maps.Map(document.getElementById('map'), {
			center: currentLocation,
			zoom: 16
		});

        let markers = [];
        // Create a marker for each place.
        markers.push(new google.maps.Marker({
			map: map,
			position: currentLocation
        }));
	}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDV1CNPBI4qy_Wr5jDjKe0Pb40u9Tn27UA&libraries=places&callback=initMap" async defer></script>

<script type="text/javascript" src="<?= base_url('assets/build/js/lightslider.min.js') ?>"></script>
<script type="text/javascript">
	$('#lightSlider').lightSlider({
	    gallery: true,
	    item: 1,
	    loop: true,
	    slideMargin: 0,
	    thumbItem: <?= count($photos) ?>
	});
</script>