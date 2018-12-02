-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02 Des 2018 pada 06.33
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_saw`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kost`
--

CREATE TABLE `kost` (
  `id_kost` mediumint(9) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `kost` text NOT NULL,
  `tipe` enum('Laki-laki','Perempuan') NOT NULL DEFAULT 'Laki-laki',
  `harga_sewa` int(11) NOT NULL,
  `luas_kamar` int(11) NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `lokasi` int(11) NOT NULL,
  `fasilitas` text NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `status` enum('Pending','Verified') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kost`
--

INSERT INTO `kost` (`id_kost`, `id_pengguna`, `kost`, `tipe`, `harga_sewa`, `luas_kamar`, `jumlah_kamar`, `lokasi`, `fasilitas`, `latitude`, `longitude`, `status`) VALUES
(1, 1, 'Bedeng 12 Lrg Hasanah', 'Perempuan', 11000000, 15, 0, 3289, '{\"tempat_tidur\":{\"merk_tempat_tidur\":\"Tidak ada merk\",\"bahan_tempat_tidur\":\"Springbed\",\"ukuran_tempat_tidur\":\"160 x 120 cm\"},\"lemari\":{\"merk_lemari\":\"Olympic\",\"bahan_lemari\":\"Plastik\",\"ukuran_lemari\":\"50 x 42 x 107 cm\"},\"kipas_angin\":{\"merk_kipas_angin\":\"Cosmos\",\"tipe_kipas_angin\":\"Tempel di Dinding\",\"ukuran_kipas_angin\":\"16 inch\"},\"kamar_mandi_dalam\":{\"fasilitas_kamar_mandi\":\"Shower dan kloset duduk\",\"ukuran_kamar_mandi\":\"100 x 70 cm\"}}', -2.99368, 104.738, 'Verified'),
(3, 1, 'Kost 21', 'Perempuan', 12400000, 6, 0, 3289, '{\"tempat_tidur\":{\"merk_tempat_tidur\":\"Olympic\",\"bahan_tempat_tidur\":\"Springbed\",\"ukuran_tempat_tidur\":\"120 x 200 cm\"},\"lemari\":{\"merk_lemari\":\"Olympic\",\"bahan_lemari\":\"Plastik\",\"ukuran_lemari\":\"dll\"},\"kamar_mandi_dalam\":{\"fasilitas_kamar_mandi\":\"dll\",\"ukuran_kamar_mandi\":\"100 x 100 cm\"},\"meja_belajar\":{\"merk_meja_belajar\":\"Olympic\",\"bahan_meja_belajar\":\"Particle Board\",\"ukuran_meja_belajar\":\"110 x 45 x 80 cm\"},\"mesin_cuci\":{\"merk_mesin_cuci\":\"Toshiba VH-E95LNEW (2 Tabung)\",\"kapasitas_mesin_cuci\":\"9 kg\"},\"wifi\":{\"merk_wifi\":\"Indihome\"},\"laundry\":{\"laundry\":\"2 baju 1 celana\\/hari\"},\"kulkas\":{\"merk_kulkas\":\"Toshiba Glacio\",\"kapasitas_kulkas\":\"150 liter\"},\"ac\":{\"merk_ac\":\"Panasonic\"}}', -2.99368, 104.738, 'Pending'),
(5, 1, 'Kost Samoraso', 'Laki-laki', 11000000, 18, 0, 3844, '{\"tempat_tidur\":{\"merk_tempat_tidur\":\"Biloxy\",\"bahan_tempat_tidur\":\"Springbed\",\"ukuran_tempat_tidur\":\"120 x 200 cm\"},\"lemari\":{\"merk_lemari\":\"Olympic\",\"bahan_lemari\":\"Particle Board\",\"ukuran_lemari\":\"80 x 40 x 182 cm\"},\"kipas_angin\":{\"merk_kipas_angin\":\"Maspion\",\"tipe_kipas_angin\":\"Tempel di Dinding\",\"ukuran_kipas_angin\":\"12 inch\"},\"kamar_mandi_dalam\":{\"fasilitas_kamar_mandi\":\"Kloset duduk, ember besar, gayung, shower, PDAM 24 jam\",\"ukuran_kamar_mandi\":\"dll\"},\"listrik\":{\"listrik\":\"Prabayar\",\"watt_listrik\":\"900 watt\"},\"mesin_cuci\":{\"merk_mesin_cuci\":\"Panasonic NA-W60MB1 (2 Tabung)\",\"kapasitas_mesin_cuci\":\"6 kg\"}}', -2.99436, 104.741, 'Pending'),
(6, 1, 'Siguntang 88', 'Laki-laki', 12000000, 24, 0, 3685, '{\"tempat_tidur\":{\"merk_tempat_tidur\":\"Bola Dunia\",\"bahan_tempat_tidur\":\"Busa\",\"ukuran_tempat_tidur\":\"90 x 200 cm\"},\"lemari\":{\"merk_lemari\":\"Tidak Ada\",\"bahan_lemari\":\"Kayu Jati\",\"ukuran_lemari\":\"100 x 60 x 200 cm\"},\"kamar_mandi_dalam\":{\"fasilitas_kamar_mandi\":\"Shower, kloset duduk, tempat sabun\",\"ukuran_kamar_mandi\":\"200 x 200 cm\"},\"meja_belajar\":{\"merk_meja_belajar\":\"Tidak Ada Merk\",\"bahan_meja_belajar\":\"Kayu Jati\",\"ukuran_meja_belajar\":\"90 x 40 x 73 cm\"},\"kaca_kamar\":{\"merk_kaca_kamar\":\"Bingkai Kayu Jati\",\"ukuran_kaca_kamar\":\"100 x 80 cm\"},\"rak_buku\":{\"bahan_rak_buku\":\"Kayu Jati\",\"ukuran_rak_buku\":\"100 x 40 cm\"}}', -3.00431, 104.729, 'Pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` tinyint(4) NOT NULL,
  `weight` int(11) NOT NULL,
  `key` varchar(100) NOT NULL,
  `type` enum('option','range','criteria') NOT NULL,
  `label` varchar(100) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `weight`, `key`, `type`, `label`, `details`) VALUES
(1, 5, 'fasilitas', 'criteria', 'Fasilitas', '{\"tempat_tidur\":{\"label\":\"Tempat Tidur\",\"key\":\"tempat_tidur\",\"weight\":\"0.7\",\"values\":{\"merk_tempat_tidur\":{\"label\":\"Merk Tempat Tidur\",\"key\":\"merk_tempat_tidur\",\"values\":{\"Olympic\":\"5\",\"Bola Dunia\":\"4\",\"Sinar Dunia\":\"3\",\"Biloxy\":\"2\",\"dll\":\"1\"}},\"bahan_tempat_tidur\":{\"label\":\"Bahan Tempat Tidur\",\"key\":\"bahan_tempat_tidur\",\"values\":{\"Springbed\":\"5\",\"Busa\":\"4\"}},\"ukuran_tempat_tidur\":{\"label\":\"Ukuran Tempat Tidur\",\"key\":\"ukuran_tempat_tidur\",\"values\":{\"160 x 120 cm\":\"5\",\"120 x 200 cm\":\"4\",\"90 x 200 cm\":\"3\"}}}},\"lemari\":{\"label\":\"Lemari\",\"key\":\"lemari\",\"weight\":\"0.5\",\"values\":{\"merk_lemari\":{\"label\":\"Merk Lemari\",\"key\":\"merk_lemari\",\"values\":{\"Olympic\":\"5\",\"Napolly\":\"4\",\"Tidak Ada\":\"3\"}},\"bahan_lemari\":{\"label\":\"Bahan Lemari\",\"key\":\"bahan_lemari\",\"values\":{\"Kayu Jati\":\"5\",\"Particle Board\":\"4\",\"Plastik\":\"3\"}},\"ukuran_lemari\":{\"label\":\"Ukuran Lemari\",\"key\":\"ukuran_lemari\",\"values\":{\"150,5 x 59 x 200,1 cm\":\"5\",\"100 x 60 x 200 cm\":\"4\",\"80 x 40 x 182 cm\":\"3\",\"50 x 42 x 107 cm\":\"2\",\"dll\":\"1\"}}}},\"kipas_angin\":{\"label\":\"Kipas Angin\",\"key\":\"kipas_angin\",\"weight\":\"0.3\",\"values\":{\"merk_kipas_angin\":{\"label\":\"Merk Kipas Angin\",\"key\":\"merk_kipas_angin\",\"values\":{\"Panasonic\":\"5\",\"Cosmos\":\"4\",\"Maspion\":\"3\"}},\"tipe_kipas_angin\":{\"label\":\"Tipe Kipas Angin\",\"key\":\"tipe_kipas_angin\",\"values\":{\"Tempel di Dinding\":\"5\"}},\"ukuran_kipas_angin\":{\"label\":\"Ukuran Kipas Angin\",\"key\":\"ukuran_kipas_angin\",\"values\":{\"16 inch\":\"5\",\"12 inch\":\"4\"}}}},\"kamar_mandi_dalam\":{\"label\":\"Kamar Mandi di Dalam\",\"key\":\"kamar_mandi_dalam\",\"weight\":\"0.6\",\"values\":{\"fasilitas_kamar_mandi\":{\"label\":\"Fasilitas Kamar Mandi\",\"key\":\"fasilitas_kamar_mandi\",\"values\":{\"Bak mandi plastik, gayung, kloset jongkok, PDAM 24 jam\":\"5\",\"Kloset duduk, ember besar, gayung, shower, PDAM 24 jam\":\"4\",\"Bak mandi keramik, kloset duduk, gayung\":\"3\",\"Bak mandi keramik, kloset jongkok, gayung\":\"2\",\"dll\":\"1\"}},\"ukuran_kamar_mandi\":{\"label\":\"Ukuran Kamar Mandi\",\"key\":\"ukuran_kamar_mandi\",\"values\":{\"200 x 200 cm\":\"5\",\"150 x 150 cm\":\"4\",\"140 x 120 cm\":\"3\",\"100 x 100 cm\":\"2\",\"dll\":\"1\"}}}},\"meja_belajar\":{\"label\":\"Meja Belajar\",\"key\":\"meja_belajar\",\"weight\":\"0.4\",\"values\":{\"merk_meja_belajar\":{\"label\":\"Merk Meja Belajar\",\"key\":\"merk_meja_belajar\",\"values\":{\"Olympic\":\"5\",\"Tidak Ada Merk\":\"4\"}},\"bahan_meja_belajar\":{\"label\":\"Bahan Meja Belajar\",\"key\":\"bahan_meja_belajar\",\"values\":{\"Kayu Jati\":\"5\",\"Particle Board\":\"4\"}},\"ukuran_meja_belajar\":{\"label\":\"Ukuran Meja Belajar\",\"key\":\"ukuran_meja_belajar\",\"values\":{\"120 x 60 x 80 cm\":\"5\",\"120 x 60 x 74 cm\":\"4\",\"110 x 45 x 80 cm\":\"3\",\"90 x 40 x 73 cm\":\"2\"}}}},\"listrik\":{\"label\":\"Listrik\",\"key\":\"listrik\",\"weight\":\"0.8\",\"values\":{\"listrik\":{\"label\":\"Listrik\",\"key\":\"listrik\",\"values\":{\"Prabayar\":\"5\",\"Pascabayar\":\"4\"}},\"watt_listrik\":{\"label\":\"Watt Listrik\",\"key\":\"watt_listrik\",\"values\":{\"900 watt\":\"5\"}}}},\"mesin_cuci\":{\"label\":\"Mesin Cuci\",\"key\":\"mesin_cuci\",\"weight\":\"0.3\",\"values\":{\"merk_mesin_cuci\":{\"label\":\"Merk Mesin Cuci\",\"key\":\"merk_mesin_cuci\",\"values\":{\"Toshiba VH-E95LNEW (2 Tabung)\":\"5\",\"Panasonic NA-W60MB1 (2 Tabung)\":\"4\"}},\"kapasitas_mesin_cuci\":{\"label\":\"Kapasitas Mesin Cuci\",\"key\":\"kapasitas_mesin_cuci\",\"values\":{\"9 kg\":\"5\",\"6 kg\":\"4\"}}}},\"kaca_kamar\":{\"label\":\"Kaca Kamar\",\"key\":\"kaca_kamar\",\"weight\":\"0.4\",\"values\":{\"merk_kaca_kamar\":{\"label\":\"Merk Kaca Kamar\",\"key\":\"merk_kaca_kamar\",\"values\":{\"Bingkai Kayu Jati\":\"5\",\"Besi Stainless\":\"4\"}},\"ukuran_kaca_kamar\":{\"label\":\"Ukuran Kaca Kamar\",\"key\":\"ukuran_kaca_kamar\",\"values\":{\"100 x 80 cm\":\"5\",\"70 x 30 cm\":\"4\"}}}},\"rak_buku\":{\"label\":\"Rak Buku\",\"key\":\"rak_buku\",\"weight\":\"0.4\",\"values\":{\"bahan_rak_buku\":{\"label\":\"Bahan Rak Buku\",\"key\":\"bahan_rak_buku\",\"values\":{\"Kayu Jati\":\"5\"}},\"ukuran_rak_buku\":{\"label\":\"Ukuran Rak Buku\",\"key\":\"ukuran_rak_buku\",\"values\":{\"100 x 40 cm\":\"5\"}}}},\"wifi\":{\"label\":\"Wifi\",\"key\":\"wifi\",\"weight\":\"0.3\",\"values\":{\"merk_wifi\":{\"label\":\"Merk Wifi\",\"key\":\"merk_wifi\",\"values\":{\"Indihome\":\"5\"}}}},\"laundry\":{\"label\":\"Laundry\",\"key\":\"laundry\",\"weight\":\"0.2\",\"values\":{\"laundry\":{\"label\":\"Laundry\",\"key\":\"laundry\",\"values\":{\"2 baju 1 celana \\/ hari\":\"5\"}}}},\"kulkas\":{\"label\":\"Kulkas\",\"key\":\"kulkas\",\"weight\":\"0.1\",\"values\":{\"merk_kulkas\":{\"label\":\"Merk Kulkas\",\"key\":\"merk_kulkas\",\"values\":{\"Toshiba Glacio\":\"5\"}},\"kapasitas_kulkas\":{\"label\":\"Kapasitas Kulkas\",\"key\":\"kapasitas_kulkas\",\"values\":{\"150 liter\":\"5\"}}}},\"ac\":{\"label\":\"AC\",\"key\":\"ac\",\"weight\":\"0.2\",\"values\":{\"merk_ac\":{\"label\":\"Merk AC\",\"key\":\"merk_ac\",\"values\":{\"Panasonic\":\"5\"}}}}}'),
(2, 5, 'harga_sewa', 'range', 'Harga Sewa', '[{\"label\":\"Rp. 7.000.000 - Rp. 8.000.000\",\"max\":\"8000000\",\"min\":\"7000000\",\"value\":\"5\"},{\"label\":\"Rp. 8.100.000 - Rp. 9.100.000\",\"max\":\"9100000\",\"min\":\"8100000\",\"value\":\"4\"},{\"label\":\"Rp. 9.200.000 - Rp. 10.200.000\",\"max\":\"10200000\",\"min\":\"9200000\",\"value\":\"3\"},{\"label\":\"Rp. 10.300.000 - Rp. 11.300.000\",\"max\":\"11300000\",\"min\":\"10300000\",\"value\":\"2\"},{\"label\":\"Rp. 11.400.000 - Rp. 12.400.000\",\"max\":\"12400000\",\"min\":\"11400000\",\"value\":\"1\"}]'),
(3, 5, 'lokasi', 'range', 'Lokasi', '[{\"label\":\"120 M - 236 M\",\"max\":\"236\",\"min\":\"120\",\"value\":\"5\"},{\"label\":\"236,1 M - 352,1 M\",\"max\":\"352.1\",\"min\":\"236.1\",\"value\":\"4\"},{\"label\":\"352,2 M - 468,2 M\",\"max\":\"468.2\",\"min\":\"352.2\",\"value\":\"3\"},{\"label\":\"468,3 M - 584,3 M\",\"max\":\"584.3\",\"min\":\"468.3\",\"value\":\"2\"},{\"label\":\"584,4 M - 700,4 M\",\"max\":\"700.4\",\"min\":\"584.4\",\"value\":\"1\"}]'),
(4, 4, 'luas_kamar', 'range', 'Luas Kamar', '[{\"label\":\"22 m\\u00b2 - 25 m\\u00b2\",\"max\":\"25\",\"min\":\"22\",\"value\":\"5\"},{\"label\":\"18 m\\u00b2 - 21 m\\u00b2\",\"max\":\"21\",\"min\":\"18\",\"value\":\"4\"},{\"label\":\"14 m\\u00b2 - 17 m\\u00b2\",\"max\":\"17\",\"min\":\"14\",\"value\":\"3\"},{\"label\":\"10 m\\u00b2 - 13 m\\u00b2\",\"max\":\"13\",\"min\":\"10\",\"value\":\"2\"},{\"label\":\"6 m\\u00b2 - 9 m\\u00b2\",\"max\":\"9\",\"min\":\"6\",\"value\":\"1\"}]');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `id_role` tinyint(4) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `nama`, `email`, `kontak`, `id_role`, `alamat`) VALUES
(1, 'azhry', '985fabf8f96dc1c4c306341031569937', 'Azhary Arliansyah', 'arliansyah_azhary@yahoo.com', '85380109887', 1, 'Komplek Bougenville'),
(2, 'az', '985fabf8f96dc1c4c306341031569937', 'Azhary Arliansyah', 'azhary.arliansyah@studentpartner.com', '008080808', 2, '-'),
(3, 'azhary', '985fabf8f96dc1c4c306341031569937', 'Azhary Arliansyah', 'arliansyah_azhary@yahoo.com', '081234265011', 3, 'wre');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` tinyint(4) NOT NULL,
  `role` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `role`, `deskripsi`) VALUES
(1, 'Pemilik Kost', 'Pemilik Kost'),
(2, 'Admin', 'Admin'),
(3, 'Pengguna', 'Pengguna');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kost`
--
ALTER TABLE `kost`
  ADD PRIMARY KEY (`id_kost`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kost`
--
ALTER TABLE `kost`
  MODIFY `id_kost` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kost`
--
ALTER TABLE `kost`
  ADD CONSTRAINT `kost_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
