<link rel="stylesheet" type="text/css" href="<?= base_url('assets/custom/css/card.ios.css') ?>">

<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
				<div class="promotion-section">
				    <div class="w-container promotion-container">
						<h1 class="section-title">Daftar Ruko</h1>
						<div class="title-underline"></div>

						<div class="promo-flex">
							<?php foreach ($ruko as $row): ?>
								<?php  
									$path = 'assets/foto/ruko-' . $row->id_ruko;
									$foto = scandir(FCPATH . $path);
									$foto = array_values(array_diff($foto, ['.', '..']));
								?>
								<a href="<?= base_url('home/detail-ruko/' . $row->id_ruko) ?>">
									<div class="w-clearfix w-preserve-3d promo-card">
										<img width="100%" src="<?= isset($foto[0]) ? base_url($path . '/' . $foto[0]) : 'http://placehold.it/313x313' ?>">
										<div class="blog-bar color-pink"></div>
										<div class="blog-post-text">
											<?= $row->ruko ?>
											<div class="blog-description pink-text"><?= 'Rp. ' . number_format($row->biaya_sewa, 2, ',', '.') ?></div>
										</div>
									</div>
								</a>
							<?php endforeach; ?>
				      	</div>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>