<link href="<?= base_url('assets/metronic') ?>/assets/admin/pages/css/search.css" rel="stylesheet" type="text/css"/>
<div style="background-color: black !important; margin: 0 !important;">
	<div class="booking-offer">
		<img src="<?= base_url('assets/web-img/169183.jpg') ?>" class="img-responsive" alt="" style="width: 100%;">
		<div class="booking-offer-in" style="background-color: rgba(0, 0, 0, 0.5);">
			<div class="vertical-center">
				<div class="text-center">
					<h1>Selamat Datang di Sistem Sewa Kost</h1>
					<a href="<?= base_url('home/cari') ?>" class="btn blue btn-lg">Cari Kost Sekarang!</a>
				</div>
				<br><br><br><br>
				<div class="text-center">
					<span>Anda pemilik kostan?</span>
					<em>
						<u><a style="color: white !important;" href="<?= base_url('login') ?>">Daftar sekarang</a></u>
					</em>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('.booking-offer-in').css('height', $(window).height() + 'px');
	});
</script>

<style type="text/css">
	.page-container {
		margin: 0;
		padding: 0;
	}

	.vertical-center {
		margin: 0;
		position: absolute;
		top: 30%;
		-ms-transform: translateY(-50%);
		transform: translateY(-50%);
		width: 100%;
	}
</style>
