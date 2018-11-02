<link rel="stylesheet" type="text/css" href="<?= base_url('assets/build/css/lightslider.min.css') ?>">
<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content">
					<span class="section">Detail Informasi Ruko</span>
					<div class="row">
						<div class="col-md-5">
							<div class="demo">
								<?php  
									$path = 'assets/foto/ruko-' . $ruko->id_ruko;
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
						<div class="col-md-7">
							<table class="table table-bordered">
								<tbody>
									<tr>
										<td style="width: 200px !important;">
											<b>Alamat</b>
										</td>
										<td><?= $ruko->ruko ?></td>
									</tr>
									<tr>
										<td>
											<b>Biaya Sewa</b>
										</td>
										<td><?= 'Rp. ' . number_format($ruko->biaya_sewa, 2, ',', '.') ?></td>
									</tr>
									<tr>
										<td>
											<b>Luas Bangunan</b>
										</td>
										<td><?= $ruko->luas_bangunan . ' m²' ?></td>
									</tr>
									<tr>
										<td>
											<b>Akses Menuju Lokasi</b>
										</td>
										<td>
											<ul>
												<?php  
													$akses_menuju_lokasi = json_decode($ruko->akses_menuju_lokasi);
													foreach ($akses_menuju_lokasi as $akses)
													{
														echo '<li>' . $akses . '</li>';
													}
												?>
											</ul>
										</td>
									</tr>
									<tr>
										<td>
											<b>Pusat Keramaian</b>
										</td>
										<td>
											<ul>
												<?php  
													$pusat_keramaian = json_decode($ruko->pusat_keramaian);
													foreach ($pusat_keramaian as $pusat)
													{
														echo '<li>' . $pusat . '</li>';
													}
												?>
											</ul>
										</td>
									</tr>
									<tr>
										<td>
											<b>Zona Parkir</b>
										</td>
										<td><?= $ruko->zona_parkir . ' m²' ?></td>
									</tr>
									<tr>
										<td>
											<b>Jumlah Pesaing</b>
										</td>
										<td><?= $ruko->jumlah_pesaing_serupa ?></td>
									</tr>
									<tr>
										<td>
											<b>Tingkat Konsumtif Masyarakat</b>
										</td>
										<td><?= $ruko->tingkat_konsumtif_masyarakat ?></td>
									</tr>
									<tr>
										<td>
											<b>Lingkungan Lokasi Ruko</b>
										</td>
										<td><?= $ruko->lingkungan_lokasi_ruko ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="x_panel">
				<div class="x_content">
					<span class="section">Peta Lokasi Ruko</span>
					<div class="row">
						<div class="col-md-12">
							<div id="map" style="height: 350px;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function initMap() {
		// koordinat palembang
		let lat = <?= $ruko->latitude ?>;
		let lng = <?= $ruko->longitude ?>;
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