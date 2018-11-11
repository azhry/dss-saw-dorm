<?php 
/**
* Class for configuration setting which will be used.
*
* @package    Saw
* @author     Azhary Arliansyah
* @version    1.0
*/

class Config
{
	public static $config = [
		'harga_sewa' => [
			'key'		=> 'harga_sewa',
			'weight'	=> 5,
			'label'		=> 'Harga Sewa Pertahun',
			'type'		=> 'range',
			'values'	=> [
				[
					'label'	=> 'Rp. 7.000.000 - Rp. 8.000.000',
					'min'	=> null,
					'max'	=> 8000000,
					'value'	=> 5
				],
				[
					'label'	=> 'Rp. 8.100.000 - Rp. 9.100.000',
					'min'	=> 8100000,
					'max'	=> 9100000,
					'value'	=> 4
				],
				[
					'label'	=> 'Rp. 9.200.000 - Rp. 10.200.000',
					'min'	=> 9200000,
					'max'	=> 10200000,
					'value'	=> 3
				],
				[
					'label'	=> 'Rp. 10.300.000 - Rp. 11.300.000',
					'min'	=> 10300000,
					'max'	=> 11300000,
					'value'	=> 2
				],
				[
					'label'	=> 'Rp. 11.400.000 - Rp. 12.400.000',
					'min'	=> 11400000,
					'max'	=> null,
					'value'	=> 1
				]
			]
		],
		'lokasi' => [
			'key'		=> 'lokasi',
			'weight'	=> 5,
			'label'		=> 'Lokasi',
			'type'		=> 'range',
			'values'	=> [
				[
					'label'	=> '120 M - 236 M',
					'min'	=> null,
					'max'	=> 236,
					'value'	=> 5
				],
				[
					'label'	=> '236,1 M - 352,1 M',
					'min'	=> 236.1,
					'max'	=> 352.1,
					'value'	=> 4
				],
				[
					'label'	=> '352,2 M - 468,2 M',
					'min'	=> 352.2,
					'max'	=> 468.2,
					'value'	=> 3
				],
				[
					'label'	=> '468,3 M - 584,3 M',
					'min'	=> 468.3,
					'max'	=> 584.3,
					'value'	=> 2
				],
				[
					'label'	=> '584,4 M - 700,4 M',
					'min'	=> 584.4,
					'max'	=> null,
					'value'	=> 1
				]
			]
		],
		'luas_kamar' => [
			'key'		=> 'luas_kamar',
			'weight'	=> 4,
			'label'		=> 'Luas Kamar',
			'type'		=> 'range',
			'values'	=> [
				[
					'label'	=> '22 m² - 25 m²',
					'min'	=> 22,
					'max'	=> null,
					'value'	=> 5
				],
				[
					'label'	=> '18 m² - 21 m²',
					'min'	=> 18,
					'max'	=> 21,
					'value'	=> 4
				],
				[
					'label'	=> '14 m² - 17 m²',
					'min'	=> 14,
					'max'	=> 17,
					'value'	=> 3
				],
				[
					'label'	=> '10 m² - 13 m²',
					'min'	=> 10,
					'max'	=> 13,
					'value'	=> 2
				],
				[
					'label'	=> '6 m² - 9 m²',
					'min'	=> null,
					'max'	=> 9,
					'value'	=> 1
				]
			]
		],
		'fasilitas' => [
			'key'		=> 'fasilitas',
			'weight'	=> 5,
			'label'		=> 'Fasilitas',
			'type'		=> 'criteria',
			'values'	=> [
				'tempat_tidur' => [
					'label'		=> 'Tempat Tidur',
					'key'		=> 'tempat_tidur',
					'weight'	=> 0.7,
					'type'		=> 'criteria',
					'values'	=> [
						'merk_tempat_tidur' => [
							'label'		=> 'Merk Tempat Tidur',
							'key'		=> 'merk_tempat_tidur',
							'values'	=> [
								'Olympic'		=> 5,
								'Bola Dunia'	=> 4,
								'Sinar Dunia'	=> 3,
								'Biloxy'		=> 2,
								'dll'			=> 1
							]
						],
						'bahan_tempat_tidur' => [
							'label'		=> 'Bahan Tempat Tidur',
							'key'		=> 'bahan_tempat_tidur',
							'values'	=> [
								'Springbed'	=> 5,
								'Busa'		=> 4
							]
						],
						'ukuran_tempat_tidur' => [
							'label'		=> 'Ukuran Tempat Tidur',
							'key'		=> 'ukuran_tempat_tidur',
							'values'	=> [
								'160 x 120 cm'	=> 5,
								'120 x 200 cm'	=> 4,
								'90 x 200 cm'	=> 3
							]
						]
					]
				],
				'lemari' => [
					'label'		=> 'Lemari',
					'key'		=> 'lemari',
					'weight'	=> 0.5,
					'type'		=> 'criteria',
					'values'	=> [
						'merk_lemari' => [
							'label'		=> 'Merk Lemari',
							'key'		=> 'merk_lemari',
							'values'	=> [
								'Olympic'	=> 5,
								'Napolly'	=> 4,
								'Tidak Ada'	=> 3
							]
						],
						'bahan_lemari' => [
							'label'		=> 'Bahan Lemari',
							'key'		=> 'bahan_lemari',
							'values'	=> [
								'Kayu Jati'			=> 5,
								'Particle Board'	=> 4,
								'Plastik'			=> 3
							]
						],
						'ukuran_lemari' => [
							'label'		=> 'Ukuran Lemari',
							'key'		=> 'ukuran_lemari',
							'values'	=> [
								'150,5 x 59 x 200,1 cm'	=> 5,
								'100 x 60 x 200 cm'		=> 4,
								'80 x 40 x 182 cm'		=> 3,
								'50 x 42 x 107 cm'		=> 2,
								'dll'					=> 1
							]
						]
					]
				],
				'kipas_angin' => [
					'label'		=> 'Kipas Angin',
					'key'		=> 'kipas_angin',
					'weight'	=> 0.3,
					'type'		=> 'criteria',
					'values'	=> [
						'merk_kipas_angin' => [
							'label'		=> 'Merk Kipas Angin',
							'key'		=> 'merk_kipas_angin',
							'values'	=> [
								'Panasonic'	=> 5,
								'Cosmos'	=> 4,
								'Maspion'	=> 3
							]
						],
						'tipe_kipas_angin' => [
							'label'		=> 'Tipe Kipas Angin',
							'key'		=> 'tipe_kipas_angin',
							'values'	=> [
								'Tempel di Dinding'	=> 5
							]
						],
						'ukuran_kipas_angin' => [
							'label'		=> 'Ukuran Kipas Angin',
							'key'		=> 'ukuran_kipas_angin',
							'values'	=> [
								'16 inch'	=> 5,
								'12 inch'	=> 4
							]
						]
					]
				],
				'kamar_mandi_dalam' => [
					'label'		=> 'Kamar Mandi di Dalam',
					'key'		=> 'kamar_mandi_dalam',
					'weight'	=> 0.6,
					'type'		=> 'criteria',
					'values'	=> [
						'fasilitas_kamar_mandi' => [
							'label'		=> 'Fasilitas Kamar Mandi',
							'key'		=> 'fasilitas_kamar_mandi',
							'values'	=> [
								'Bak mandi plastik, gayung, kloset jongkok, PDAM 24 jam'	=> 5,
								'Kloset duduk, ember besar, gayung, shower, PDAM 24 jam'	=> 4,
								'Bak mandi keramik, kloset duduk, gayung'					=> 3,
								'Bak mandi keramik, kloset jongkok, gayung'					=> 2,
								'dll'														=> 1
							]
						],
						'ukuran_kamar_mandi' => [
							'label'		=> 'Ukuran Kamar Mandi',
							'key'		=> 'ukuran_kamar_mandi',
							'values'	=> [
								'200 x 200 cm'	=> 5,
								'150 x 150 cm'	=> 4,
								'140 x 120 cm'	=> 3,
								'100 x 100 cm'	=> 2,
								'dll'			=> 1
							]
						]
					]
				],
				'meja_belajar' => [
					'label'		=> 'Meja Belajar',
					'key'		=> 'meja_belajar',
					'weight'	=> 0.4,
					'type'		=> 'criteria',
					'values'	=> [
						'merk_meja_belajar' => [
							'label'		=> 'Merk Meja Belajar',
							'key'		=> 'merk_meja_belajar',
							'values'	=> [
								'Olympic'			=> 5,
								'Tidak Ada Merk'	=> 4
							]
						],
						'bahan_meja_belajar' => [
							'label'		=> 'Bahan Meja Belajar',
							'key'		=> 'bahan_meja_belajar',
							'values'	=> [
								'Kayu Jati'			=> 5,
								'Particle Board'	=> 4
							]
						],
						'ukuran_meja_belajar' => [
							'label'		=> 'Ukuran Meja Belajar',
							'key'		=> 'ukuran_meja_belajar',
							'values'	=> [
								'120 x 60 x 80 cm'	=> 5,
								'120 x 60 x 74 cm'	=> 4,
								'110 x 45 x 80 cm'	=> 3,
								'90 x 40 x 73 cm'	=> 2
							]
						]
					]
				],
				'listrik' => [
					'label'		=> 'Listrik',
					'key'		=> 'listrik',
					'weight'	=> 0.8,
					'type'		=> 'criteria',
					'values'	=> [
						'listrik' => [
							'label'		=> 'Listrik',
							'key'		=> 'listrik',
							'values'	=> [
								'Prabayar'		=> 5,
								'Pascabayar'	=> 4
							]
						],
						'watt_listrik' => [
							'label'		=> 'Watt Listrik',
							'key'		=> 'watt_listrik',
							'values'	=> [
								'900 watt'	=> 5
							]
						]
					]
				],
				'mesin_cuci' => [
					'label'		=> 'Mesin Cuci',
					'key'		=> 'mesin_cuci',
					'weight'	=> 0.3,
					'type'		=> 'criteria',
					'values'	=> [
						'merk_mesin_cuci' => [
							'label'		=> 'Merk Mesin Cuci',
							'key'		=> 'merk_mesin_cuci',
							'values'	=> [
								'Toshiba VH-E95LNEW (2 Tabung)'		=> 5,
								'Panasonic NA-W60MB1 (2 Tabung)'	=> 4
							]
						],
						'kapasitas_mesin_cuci' => [
							'label'		=> 'Kapasitas Mesin Cuci',
							'key'		=> 'kapasitas_mesin_cuci',
							'values'	=> [
								'9 kg'	=> 5,
								'6 kg'	=> 4
							]
						]
					]
				],
				'kaca_kamar' => [
					'label'		=> 'Kaca Kamar',
					'key'		=> 'kaca_kamar',
					'weight'	=> 0.4,
					'type'		=> 'criteria',
					'values'	=> [
						'merk_kaca_kamar' => [
							'label'		=> 'Merk Kaca Kamar',
							'key'		=> 'merk_kaca_kamar',
							'values'	=> [
								'Bingkai Kayu Jati'	=> 5,
								'Besi Stainless'	=> 4
							]
						],
						'ukuran_kaca_kamar' => [
							'label'		=> 'Ukuran Kaca Kamar',
							'key'		=> 'ukuran_kaca_kamar',
							'values'	=> [
								'100 x 80 cm'	=> 5,
								'70 x 30 cm'	=> 4
							]
						]
					]
				],
				'rak_buku' => [
					'label'		=> 'Rak Buku',
					'key'		=> 'rak_buku',
					'weight'	=> 0.4,
					'type'		=> 'criteria',
					'values'	=> [
						'bahan_rak_buku' => [
							'label'		=> 'Bahan Rak Buku',
							'key'		=> 'bahan_rak_buku',
							'values'	=> [
								'Kayu Jati'	=> 5
							]
						],
						'ukuran_rak_buku' => [
							'label'		=> 'Ukuran Rak Buku',
							'key'		=> 'ukuran_rak_buku',
							'values'	=> [
								'100 x 40 cm'	=> 5
							]
						]
					]
				],
				'wifi' => [
					'label'		=> 'Wifi',
					'key'		=> 'wifi',
					'weight'	=> 0.3,
					'type'		=> 'criteria',
					'values'	=> [
						'merk_wifi' => [
							'label'		=> 'Merk Wifi',
							'key'		=> 'merk_wifi',
							'values'	=> [
								'Indihome'	=> 5
							]
						]
					]
				],
				'laundry' => [
					'label'		=> 'Laundry',
					'key'		=> 'laundry',
					'weight'	=> 0.2,
					'type'		=> 'criteria',
					'values'	=> [
						'laundry' => [
							'label'		=> 'Laundry',
							'key'		=> 'laundry',
							'values'	=> [
								'2 baju 1 celana/hari'	=> 5
							]
						]
					]
				],
				'kulkas' => [
					'label'		=> 'Kulkas',
					'key'		=> 'kulkas',
					'weight'	=> 0.1,
					'type'		=> 'criteria',
					'values'	=> [
						'merk_kulkas' => [
							'label'		=> 'Merk Kulkas',
							'key'		=> 'merk_kulkas',
							'values'	=> [
								'Toshiba Glacio'	=> 5
							]
						],
						'kapasitas_kulkas' => [
							'label'		=> 'Kapasitas Kulkas',
							'key'		=> 'kapasitas_kulkas',
							'values'	=> [
								'150 liter'	=> 5
							]
						]
					]
				],
				'ac' => [
					'label'		=> 'AC',
					'key'		=> 'ac',
					'weight'	=> 0.2,
					'type'		=> 'criteria',
					'values'	=> [
						'merk_ac' => [
							'label'		=> 'Merk AC',
							'key'		=> 'merk_ac',
							'values'	=> [
								'Panasonic'	=> 5
							]
						]
					]
				]
			]
		]
	];
}