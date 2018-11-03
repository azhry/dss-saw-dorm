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
		'harga_sewa_pertahun' => [
			'key'		=> 'harga_sewa_pertahun',
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
			'weight'	=> 5,
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
				[
					'label'		=> 'Tempat Tidur',
					'key'		=> 'tempat_tidur',
					'weight'	=> 0.7,
					'type'		=> 'criteria',
					'values'	=> [
						[
							'label'		=> 'Merk Tempat Tidur',
							'key'		=> 'merk_tempat_tidur',
							'values'	=> [
								[
									'label'	=> 'Olympic',
									'value'	=> 5
								],
								[
									'label'	=> 'Bola Dunia',
									'value'	=> 4
								],
								[
									'label'	=> 'Sinar Dunia',
									'value'	=> 3
								],
								[
									'label'	=> 'Biloxy',
									'value'	=> 2
								],
								[
									'label'	=> 'dll',
									'value'	=> 1
								]
							]
						],
						[
							'label'		=> 'Bahan Tempat Tidur',
							'key'		=> 'bahan_tempat_tidur',
							'values'	=> [
								[
									'label'	=> 'Springbed',
									'value'	=> 5
								],
								[
									'label'	=> 'Busa',
									'value'	=> 4
								]
							]
						],
						[
							'label'		=> 'Ukuran Tempat Tidur',
							'key'		=> 'ukuran_tempat_tidur',
							'values'	=> [
								[
									'label'	=> '160 x 120 cm',
									'value'	=> 5
								],
								[
									'label'	=> '120 x 200 cm',
									'value'	=> 4
								],
								[
									'label'	=> '90 x 200 cm',
									'value'	=> 3
								]
							]
						]
					]
				],
				[
					'label'		=> 'Lemari',
					'key'		=> 'lemari',
					'weight'	=> 0.5,
					'type'		=> 'criteria',
					'values'	=> [
						[
							'label'		=> 'Merk Lemari',
							'key'		=> 'merk_lemari',
							'values'	=> [
								[
									'label'	=> 'Olympic',
									'value'	=> 5
								],
								[
									'label'	=> 'Napolly',
									'value'	=> 4
								],
								[
									'label'	=> 'Tidak Ada',
									'value'	=> 3
								]
							]
						],
						[
							'label'		=> 'Bahan Lemari',
							'key'		=> 'bahan_lemari',
							'values'	=> [
								[
									'label'	=> 'Kayu Jati',
									'value'	=> 5
								],
								[
									'label'	=> 'Particle Board',
									'value'	=> 4
								],
								[
									'label'	=> 'Plastik',
									'value'	=> 3
								]
							]
						],
						[
							'label'		=> 'Ukuran Lemari',
							'key'		=> 'ukuran_lemari',
							'values'	=> [
								[
									'label'	=> '150,5 x 59 x 200,1 cm',
									'value'	=> 5
								],
								[
									'label'	=> '100 x 60 x 200 cm',
									'value'	=> 4
								],
								[
									'label'	=> '80 x 40 x 182 cm',
									'value'	=> 3
								],
								[
									'label'	=> '50 x 42 x 107 cm',
									'value'	=> 2
								],
								[
									'label'	=> 'dll',
									'value'	=> 1
								]
							]
						]
					]
				],
				[
					'label'		=> 'Kipas Angin',
					'key'		=> 'kipas_angin',
					'weight'	=> 0.3,
					'type'		=> 'criteria',
					'values'	=> [
						[
							'label'		=> 'Merk Kipas Angin',
							'key'		=> 'merk_kipas_angin',
							'values'	=> [
								[
									'label'	=> 'Panasonic',
									'value'	=> 5
								],
								[
									'label'	=> 'Cosmos',
									'value'	=> 4
								],
								[
									'label'	=> 'Maspion',
									'value'	=> 3
								]
							]
						],
						[
							'label'		=> 'Tipe Kipas Angin',
							'key'		=> 'tipe_kipas_angin',
							'values'	=> [
								[
									'label'	=> 'Tempel di Dinding',
									'value'	=> 5
								]
							]
						],
						[
							'label'		=> 'Ukuran Kipas Angin',
							'key'		=> 'ukuran_kipas_angin',
							'values'	=> [
								[
									'label'	=> '16 inch',
									'value'	=> 5
								],
								[
									'label'	=> '12 inch',
									'value'	=> 4
								]
							]
						]
					]
				],
				[
					'label'		=> 'Kamar Mandi di Dalam',
					'key'		=> 'kamar_mandi_dalam',
					'weight'	=> 0.6,
					'type'		=> 'criteria',
					'values'	=> [
						[
							'label'		=> 'Fasilitas Kamar Mandi',
							'key'		=> 'fasilitas_kamar_mandi',
							'values'	=> [
								[
									'label'	=> 'Bak mandi plastik, gayung, kloset jongkok, PDAM 24 jam',
									'value'	=> 5
								],
								[
									'label'	=> 'Kloset duduk, ember besar, gayung, shower, PDAM 24 jam',
									'value'	=> 4
								],
								[
									'label'	=> 'Bak mandi keramik, kloset duduk, gayung',
									'value'	=> 3
								],
								[
									'label'	=> 'Bak mandi keramik, kloset jongkok, gayung',
									'value'	=> 2
								],
								[
									'label'	=> 'dll',
									'value'	=> 1
								]
							]
						],
						[
							'label'		=> 'Ukuran Kamar Mandi',
							'key'		=> 'ukuran_kamar_mandi',
							'values'	=> [
								[
									'label'	=> '200 x 200 cm',
									'value'	=> 5
								],
								[
									'label'	=> '150 x 150 cm',
									'value'	=> 4
								],
								[
									'label'	=> '140 x 120 cm',
									'value'	=> 3
								],
								[
									'label'	=> '100 x 100 cm',
									'value'	=> 2
								],
								[
									'label'	=> 'dll',
									'value'	=> 1
								]
							]
						],
						[
							'label'		=> 'Ukuran Kipas Angin',
							'key'		=> 'ukuran_kipas_angin',
							'values'	=> [
								[
									'label'	=> '16 inch',
									'value'	=> 5
								],
								[
									'label'	=> '12 inch',
									'value'	=> 4
								]
							]
						]
					]
				],
				[
					'label'		=> 'Meja Belajar',
					'key'		=> 'meja_belajar',
					'weight'	=> 0.4,
					'type'		=> 'criteria',
					'values'	=> [
						[
							'label'		=> 'Merk Meja Belajar',
							'key'		=> 'merk_meja_belajar',
							'values'	=> [
								[
									'label'	=> 'Olympic',
									'value'	=> 5
								],
								[
									'label'	=> 'Tidak Ada Merk',
									'value'	=> 4
								]
							]
						],
						[
							'label'		=> 'Bahan Meja Belajar',
							'key'		=> 'bahan_meja_belajar',
							'values'	=> [
								[
									'label'	=> 'Kayu Jati',
									'value'	=> 5
								],
								[
									'label'	=> 'Particle Board',
									'value'	=> 4
								]
							]
						],
						[
							'label'		=> 'Ukuran Meja Belajar',
							'key'		=> 'ukuran_meja_belajar',
							'values'	=> [
								[
									'label'	=> '120 x 60 x 80 cm',
									'value'	=> 5
								],
								[
									'label'	=> '120 x 60 x 74 cm',
									'value'	=> 4
								],
								[
									'label'	=> '110 x 45 x 80 cm',
									'value'	=> 3
								],
								[
									'label'	=> '90 x 40 x 73 cm',
									'value'	=> 2
								]
							]
						]
					]
				],
				[
					'label'		=> 'Listrik',
					'key'		=> 'listrik',
					'weight'	=> 0.8,
					'type'		=> 'criteria',
					'values'	=> [
						[
							'label'		=> 'Listrik',
							'key'		=> 'listrik',
							'values'	=> [
								[
									'label'	=> 'Prabayar',
									'value'	=> 5
								],
								[
									'label'	=> 'Pascabayar',
									'value'	=> 4
								]
							]
						],
						[
							'label'		=> 'Watt Listrik',
							'key'		=> 'watt_listrik',
							'values'	=> [
								[
									'label'	=> '900 watt',
									'value'	=> 5
								]
							]
						]
					]
				],
				[
					'label'		=> 'Mesin Cuci',
					'key'		=> 'mesin_cuci',
					'weight'	=> 0.3,
					'type'		=> 'criteria',
					'values'	=> [
						[
							'label'		=> 'Merk Mesin Cuci',
							'key'		=> 'merk_mesin_cuci',
							'values'	=> [
								[
									'label'	=> 'Toshiba VH-E95LNEW (2 Tabung)',
									'value'	=> 5
								],
								[
									'label'	=> 'Panasonic NA-W60MB1 (2 Tabung)',
									'value'	=> 4
								]
							]
						],
						[
							'label'		=> 'Kapasitas Mesin Cuci',
							'key'		=> 'kapasitas_mesin_cuci',
							'values'	=> [
								[
									'label'	=> '9 kg',
									'value'	=> 5
								],
								[
									'label'	=> '6 kg',
									'value'	=> 4
								]
							]
						]
					]
				],
				[
					'label'		=> 'Kaca Kamar',
					'key'		=> 'kaca_kamar',
					'weight'	=> 0.4,
					'type'		=> 'criteria',
					'values'	=> [
						[
							'label'		=> 'Merk Kaca Kamar',
							'key'		=> 'merk_kaca_kamar',
							'values'	=> [
								[
									'label'	=> 'Bingkai Kayu Jati',
									'value'	=> 5
								],
								[
									'label'	=> 'Besi Stainless',
									'value'	=> 4
								]
							]
						],
						[
							'label'		=> 'Ukuran Kaca Kamar',
							'key'		=> 'ukuran_kaca_kamar',
							'values'	=> [
								[
									'label'	=> '100 x 80 cm',
									'value'	=> 5
								],
								[
									'label'	=> '70 x 30 cm',
									'value'	=> 4
								]
							]
						]
					]
				],
				[
					'label'		=> 'Rak Buku',
					'key'		=> 'rak_buku',
					'weight'	=> 0.4,
					'type'		=> 'criteria',
					'values'	=> [
						[
							'label'		=> 'Bahan Rak Buku',
							'key'		=> 'bahan_rak_buku',
							'values'	=> [
								[
									'label'	=> 'Kayu Jati',
									'value'	=> 5
								]
							]
						],
						[
							'label'		=> 'Ukuran Rak Buku',
							'key'		=> 'ukuran_rak_buku',
							'values'	=> [
								[
									'label'	=> '100 x 40 cm',
									'value'	=> 5
								]
							]
						]
					]
				],
				[
					'label'		=> 'Wifi',
					'key'		=> 'wifi',
					'weight'	=> 0.3,
					'type'		=> 'criteria',
					'values'	=> [
						[
							'label'		=> 'Merk Wifi',
							'key'		=> 'merk_wifi',
							'values'	=> [
								[
									'label'	=> 'Indihome',
									'value'	=> 5
								]
							]
						]
					]
				],
				[
					'label'		=> 'Laundry',
					'key'		=> 'laundry',
					'weight'	=> 0.2,
					'type'		=> 'criteria',
					'values'	=> [
						[
							'label'		=> 'Laundry',
							'key'		=> 'laundry',
							'values'	=> [
								[
									'label'	=> '2 baju 1 celana/hari',
									'value'	=> 5
								]
							]
						]
					]
				],
				[
					'label'		=> 'Kulkas',
					'key'		=> 'kulkas',
					'weight'	=> 0.1,
					'type'		=> 'criteria',
					'values'	=> [
						[
							'label'		=> 'Merk Kulkas',
							'key'		=> 'merk_kulkas',
							'values'	=> [
								[
									'label'	=> 'Toshiba Glacio',
									'value'	=> 5
								]
							]
						],
						[
							'label'		=> 'Kapasitas Kulkas',
							'key'		=> 'kapasitas_kulkas',
							'values'	=> [
								[
									'label'	=> '150 liter',
									'value'	=> 5
								]
							]
						]
					]
				],
				[
					'label'		=> 'AC',
					'key'		=> 'ac',
					'weight'	=> 0.2,
					'type'		=> 'criteria',
					'values'	=> [
						[
							'label'		=> 'Merk AC',
							'key'		=> 'merk_ac',
							'values'	=> [
								[
									'label'	=> 'Panasonic',
									'value'	=> 5
								]
							]
						]
					]
				]
			]
		]
	];
}