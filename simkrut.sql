-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2016 at 05:08 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simkrut`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `hasil` double DEFAULT NULL,
  `id_asisten` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `nama`, `hasil`, `id_asisten`) VALUES
(1, 'Agas Arya Widodo', NULL, 14),
(2, 'Anif Shofiana Durri', NULL, 15),
(3, 'Bharamida Dwi Rizky', NULL, 16),
(4, 'Agas Arya Widodo', NULL, 18);

-- --------------------------------------------------------

--
-- Table structure for table `asisten`
--

CREATE TABLE `asisten` (
  `id` int(10) NOT NULL,
  `id_tahun_ajaran` int(10) NOT NULL,
  `id_mahasiswa` int(10) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `status` enum('0','1') DEFAULT '0' COMMENT '0=''tidak diterima'' , 1=''diterima'''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asisten`
--

INSERT INTO `asisten` (`id`, `id_tahun_ajaran`, `id_mahasiswa`, `tipe`, `status`) VALUES
(2, 9, 1, 'Mandiri', NULL),
(6, 1, 1, 'Mandiri', NULL),
(14, 1, 1, 'Praktikum', '1'),
(15, 1, 3, 'Praktikum', '0'),
(16, 1, 4, 'Praktikum', '0'),
(17, 1, 4, 'Mandiri', '0'),
(18, 2, 1, 'Praktikum', '1'),
(19, 2, 1, 'Mandiri', '0');

-- --------------------------------------------------------

--
-- Table structure for table `data_asisten_mandiri`
--

CREATE TABLE `data_asisten_mandiri` (
  `id` int(10) NOT NULL,
  `id_matakuliah` int(10) NOT NULL,
  `nilai` varchar(10) NOT NULL,
  `id_asisten` int(10) NOT NULL,
  `id_dosen` int(10) NOT NULL,
  `kelas` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_asisten_mandiri`
--

INSERT INTO `data_asisten_mandiri` (`id`, `id_matakuliah`, `nilai`, `id_asisten`, `id_dosen`, `kelas`) VALUES
(6, 18, 'A-', 6, 8, 'C'),
(7, 124, 'A/B', 6, 1, 'A'),
(8, 18, 'A', 17, 7, 'D'),
(9, 182, 'A-', 17, 0, NULL),
(10, 20, 'A/B', 17, 0, NULL),
(11, 21, 'A-', 17, 0, NULL),
(12, 22, 'A/B', 17, 0, NULL),
(13, 23, 'A-', 17, 0, NULL),
(14, 32, 'A-', 17, 0, NULL),
(15, 190, 'A/B', 19, 0, NULL),
(16, 35, 'A/B', 19, 0, NULL),
(17, 36, 'A/B', 19, 0, NULL),
(18, 37, 'A-', 19, 0, NULL),
(19, 38, 'A-', 19, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_asisten_praktikum`
--

CREATE TABLE `data_asisten_praktikum` (
  `id` int(10) NOT NULL,
  `id_matakuliah` int(10) NOT NULL,
  `nilai` int(10) NOT NULL,
  `id_asisten` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_asisten_praktikum`
--

INSERT INTO `data_asisten_praktikum` (`id`, `id_matakuliah`, `nilai`, `id_asisten`) VALUES
(23, 183, 4, 14),
(24, 183, 5, 15),
(25, 184, 2, 15),
(26, 186, 5, 15),
(27, 187, 2, 15),
(28, 189, 5, 15),
(29, 163, 1, 15),
(30, 164, 4, 15),
(31, 183, 5, 16),
(32, 184, 4, 16),
(33, 186, 3, 16),
(34, 187, 3, 16),
(35, 189, 5, 16),
(36, 163, 4, 16),
(37, 164, 2, 16),
(38, 167, 5, 16),
(39, 166, 3, 16),
(40, 169, 4, 16),
(41, 165, 5, 16),
(42, 168, 2, 16),
(43, 185, 5, 16),
(44, 188, 3, 16),
(45, 183, 5, 18),
(46, 184, 2, 18),
(47, 186, 3, 18),
(48, 187, 5, 18),
(49, 189, 5, 18);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nama`) VALUES
(0, ''),
(1, 'Novi Setiani'),
(4, 'Hendrik'),
(5, 'Almed Hamzah'),
(6, 'Chandra Kusuma Dewa'),
(7, 'Nur Wijayaning Rahayu'),
(8, 'Ahmad Fathan Hidayatullah'),
(9, 'Aridanyati Arifin'),
(10, 'Rahadian Kurniawan'),
(11, 'Taufiq Hidayat'),
(12, 'Syarif Hidayat');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bobot` int(10) NOT NULL,
  `kategori` enum('benefit','cost') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `bobot`, `kategori`) VALUES
(2, 'Nilai', 5, 'benefit'),
(3, 'Tes Praktek', 5, 'benefit'),
(4, 'Wawancara', 5, 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(10) NOT NULL,
  `nim` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `angkatan` varchar(10) NOT NULL,
  `ipk` float DEFAULT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0=inactive , 1=active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `password`, `angkatan`, `ipk`, `status`) VALUES
(1, '12523017', 'Agas Arya Widodo', 'ea1d3fbbb2f58eb2f72a81eb85c7dcd1', '2012', 3.8, '1'),
(3, '12523020', 'Anif Shofiana Durri', 'ea1d3fbbb2f58eb2f72a81eb85c7dcd1', '2012', NULL, '1'),
(4, '12523096', 'Bharamida Dwi Rizky', 'ea1d3fbbb2f58eb2f72a81eb85c7dcd1', '2012', 3.56, '1');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `semester` varchar(10) NOT NULL COMMENT 'genap atau ganjil',
  `jenis` varchar(10) NOT NULL COMMENT 'wajib, pilihan, praktikum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `nama`, `semester`, `jenis`) VALUES
(18, 'Algoritma dan Pemrograman 2', 'Genap', 'Wajib'),
(20, 'Data Mining', 'Genap', 'Wajib'),
(21, 'Etika Profesi', 'Genap', 'Wajib'),
(22, 'Manajemen Teknologi Informasi', 'Genap', 'Wajib'),
(23, 'Matematika Diskret', 'Genap', 'Wajib'),
(24, 'Metode Numerik', 'Genap', 'Wajib'),
(25, 'Metodologi Penelitian', 'Genap', 'Wajib'),
(26, 'Organisasi & Arsitektur Komputer', 'Genap', 'Wajib'),
(28, 'Rekayasa Perangkat Lunak', 'Genap', 'Wajib'),
(30, 'Sistem Operasi', 'Genap', 'Wajib'),
(31, 'Sosio Teknologi Informasi', 'Genap', 'Wajib'),
(32, 'Statistika & Probabilitas', 'Genap', 'Wajib'),
(33, 'Struktur Data', 'Genap', 'Wajib'),
(35, 'Aljabar Linier dan Matriks', 'Ganjil', 'Wajib'),
(36, 'Bahasa Inggris', 'Ganjil', 'Wajib'),
(37, 'Grafika Komputer', 'Ganjil', 'Wajib'),
(38, 'Interaksi Manusia dan Komputer', 'Ganjil', 'Wajib'),
(39, 'Jaringan Komputer', 'Ganjil', 'Wajib'),
(40, 'Kalkulus', 'Ganjil', 'Wajib'),
(41, 'Kecerdasan Buatan', 'Ganjil', 'Wajib'),
(42, 'Kewirausahaan', 'Ganjil', 'Wajib'),
(43, 'Logika Matematika', 'Ganjil', 'Wajib'),
(45, 'Multimedia', 'Ganjil', 'Wajib'),
(46, 'Pemrograman Berorientasi Obyek', 'Ganjil', 'Wajib'),
(47, 'Pengantar Teknologi Informasi', 'Ganjil', 'Wajib'),
(48, 'Riset Operasi', 'Ganjil', 'Wajib'),
(49, 'Sistem Informasi', 'Ganjil', 'Wajib'),
(50, 'Teori Bahasa dan Otomata', 'Ganjil', 'Wajib'),
(87, 'Pemrograman Web', 'Genap', 'Wajib'),
(124, 'Animasi Komputer', '', 'Pilihan'),
(125, 'Audit Sistem Informasi', '', 'Pilihan'),
(126, 'Computer Forensics', '', 'Pilihan'),
(127, 'Cyber Law', '', 'Pilihan'),
(128, 'Ethical Hacking', '', 'Pilihan'),
(129, 'Grafika 3 Dimensi', '', 'Pilihan'),
(130, 'Informatika Robotika', '', 'Pilihan'),
(131, 'Jaringan Nirkabel dan Sistem Bergerak', '', 'Pilihan'),
(132, 'Jaringan Syaraf Tiruan', '', 'Pilihan'),
(133, 'Komputasi Evolusioner', '', 'Pilihan'),
(134, 'Layanan Web', '', 'Pilihan'),
(135, 'Logika Fuzzy', '', 'Pilihan'),
(136, 'Manajemen Jaringan Komputer', '', 'Pilihan'),
(137, 'Manajemen Proses Bisnis', '', 'Pilihan'),
(138, 'Pembelajaran Mesin', '', 'Pilihan'),
(139, 'Pemrograman Berorientasi Komponen', '', 'Pilihan'),
(140, 'Pemrograman Gim', '', 'Pilihan'),
(141, 'Pemrosesan Paralel', '', 'Pilihan'),
(142, 'Pencitraan Medis', '', 'Pilihan'),
(143, 'Pengajaran Berbantuan Komputer', '', 'Pilihan'),
(144, 'Pengamanan Sistem Komputer', '', 'Pilihan'),
(145, 'Pengembangan Perangkat Lunak Agile', '', 'Pilihan'),
(146, 'Pola Rancangan Berorientasi Objek', '', 'Pilihan'),
(147, 'Rekayasa Web', '', 'Pilihan'),
(148, 'Semantic Web', '', 'Pilihan'),
(149, 'Sistem Informasi Geografis', '', 'Pilihan'),
(150, 'Sistem Informasi Kesehatan', '', 'Pilihan'),
(151, 'Sistem Manajemen Basisdata', '', 'Pilihan'),
(152, 'Sistem Pakar', '', 'Pilihan'),
(153, 'Sistem Pendukung Keputusan', '', 'Pilihan'),
(154, 'Sistem Tersebar', '', 'Pilihan'),
(155, 'Teknik Pengenalan Pola', '', 'Pilihan'),
(156, 'Teknik Pengolahan Citra', '', 'Pilihan'),
(157, 'Teknologi XML', '', 'Pilihan'),
(158, 'Telemedicine', '', 'Pilihan'),
(159, 'Transformasi Linear', '', 'Pilihan'),
(160, 'Pemrograman Non Prosedural \r\n', '', 'Pilihan'),
(161, 'Pengembangan Gim', '', 'Pilihan'),
(162, 'Pengolahan Bahasa Alami', '', 'Pilihan'),
(163, 'Pr. Algoritma dan Pemrograman 1', 'Ganjil', 'Praktikum'),
(164, 'Pr. Basisdata', 'Genap', 'Praktikum'),
(165, 'Pr. Sistem Operasi', 'Genap', 'Praktikum'),
(166, 'Pr. Pemrograman Berorientasi Obyek', 'Ganjil', 'Praktikum'),
(167, 'Pr. Jaringan komputer', 'Ganjil', 'Praktikum'),
(168, 'Pr. Struktur Data', 'Genap', 'Praktikum'),
(169, 'Pr. Pemrograman Web', 'Genap', 'Praktikum'),
(182, 'Basis Data', 'Genap', 'Wajib'),
(183, 'Algoritma dan Pemrograman 1	(P)', 'Ganjil', 'Praktikum'),
(184, 'Basis Data(P)', 'Genap', 'Praktikum'),
(185, 'Sistem Operasi(P)', 'Genap', 'Praktikum'),
(186, 'Jaringan Komputer(P)', 'Ganjil', 'Praktikum'),
(187, 'Pemrograman Berorientasi Obyek(P)', 'Ganjil', 'Praktikum'),
(188, 'Struktur Data(P)', 'Genap', 'Praktikum'),
(189, 'Pemrograman Web(P)', 'Genap', 'Praktikum'),
(190, 'Algoritma dan Pemrograman 1', 'Ganjil', 'Wajib');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_kriteria`
--

CREATE TABLE `nilai_kriteria` (
  `id` int(10) NOT NULL,
  `id_alternatif` int(10) NOT NULL,
  `id_kriteria` int(10) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_kriteria`
--

INSERT INTO `nilai_kriteria` (`id`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(97, 1, 2, 1),
(98, 2, 2, 0.7),
(99, 3, 2, 0.6),
(100, 1, 4, 28),
(101, 3, 4, 13.8),
(102, 2, 4, 11.600000000000001),
(105, 1, 3, 100),
(119, 4, 2, 0.8),
(120, 4, 3, 432432432),
(121, 4, 4, 18.4);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_subkriteria`
--

CREATE TABLE `nilai_subkriteria` (
  `id` int(10) NOT NULL,
  `id_alternatif` int(10) NOT NULL,
  `id_subkriteria` int(10) NOT NULL,
  `nilai` double NOT NULL DEFAULT '0',
  `bobot_normalisasi` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_subkriteria`
--

INSERT INTO `nilai_subkriteria` (`id`, `id_alternatif`, `id_subkriteria`, `nilai`, `bobot_normalisasi`) VALUES
(51, 2, 3, 2, 0),
(52, 2, 5, 3, 0),
(53, 2, 11, 4, 0),
(54, 2, 12, 3, 0),
(55, 2, 13, 4, 0),
(56, 2, 14, 1, 0),
(57, 2, 15, 3, 0),
(480, 3, 3, 3, 0),
(481, 3, 5, 3, 0),
(482, 3, 11, 3, 0),
(483, 3, 12, 3, 0),
(484, 3, 13, 3, 0),
(485, 3, 14, 3, 0),
(486, 3, 15, 3, 0),
(655, 1, 3, 5, 0),
(656, 1, 5, 5, 0),
(657, 1, 11, 5, 0),
(658, 1, 12, 5, 0),
(659, 1, 13, 5, 0),
(660, 1, 14, 5, 0),
(661, 1, 15, 5, 0),
(662, 1, 3, 5, 0),
(670, 4, 3, 4, 0),
(671, 4, 5, 4, 0),
(672, 4, 11, 4, 0),
(673, 4, 12, 4, 0),
(674, 4, 13, 4, 0),
(675, 4, 14, 4, 0),
(676, 4, 15, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bobot` float NOT NULL,
  `kategori` enum('benefit','cost') NOT NULL,
  `id_kriteria` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id`, `nama`, `bobot`, `kategori`, `id_kriteria`) VALUES
(3, 'Kerjasama', 5, 'benefit', 4),
(5, 'Komitmen', 4, 'benefit', 4),
(11, 'Nilai Teori', 0.5, 'benefit', 2),
(12, 'Nilai Praktikum', 0.5, 'benefit', 2),
(13, 'Sikap', 4, 'benefit', 4),
(14, 'Motivasi', 5, 'benefit', 4),
(15, 'Komunikasi', 5, 'benefit', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` int(10) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0=''inactive'' 1=''active'''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `tahun`, `semester`, `status`) VALUES
(1, '2015/2016', 'Genap', '0'),
(2, '2016/2017', 'Ganjil', '1'),
(9, '2016/2017', 'Genap', '0'),
(10, '2017/2018', 'Ganjil', '0'),
(15, '2017/2018', 'Genap', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_data_asisten_praktikum` (`id_asisten`);

--
-- Indexes for table `asisten`
--
ALTER TABLE `asisten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tahun_ajaran` (`id_tahun_ajaran`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `data_asisten_mandiri`
--
ALTER TABLE `data_asisten_mandiri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_matakuliah` (`id_matakuliah`,`id_asisten`,`id_dosen`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `data_asisten_mandiri_ibfk_2` (`id_asisten`);

--
-- Indexes for table `data_asisten_praktikum`
--
ALTER TABLE `data_asisten_praktikum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_asisten` (`id_asisten`),
  ADD KEY `id_matakuliah` (`id_matakuliah`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `nilai_subkriteria`
--
ALTER TABLE `nilai_subkriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_subkriteria` (`id_subkriteria`),
  ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `asisten`
--
ALTER TABLE `asisten`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `data_asisten_mandiri`
--
ALTER TABLE `data_asisten_mandiri`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `data_asisten_praktikum`
--
ALTER TABLE `data_asisten_praktikum`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;
--
-- AUTO_INCREMENT for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `nilai_subkriteria`
--
ALTER TABLE `nilai_subkriteria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=677;
--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD CONSTRAINT `alternatif_ibfk_1` FOREIGN KEY (`id_asisten`) REFERENCES `asisten` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `asisten`
--
ALTER TABLE `asisten`
  ADD CONSTRAINT `asisten_ibfk_1` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tahun_ajaran` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `asisten_ibfk_2` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_asisten_mandiri`
--
ALTER TABLE `data_asisten_mandiri`
  ADD CONSTRAINT `data_asisten_mandiri_ibfk_1` FOREIGN KEY (`id_matakuliah`) REFERENCES `matakuliah` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `data_asisten_mandiri_ibfk_2` FOREIGN KEY (`id_asisten`) REFERENCES `asisten` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_asisten_mandiri_ibfk_3` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `data_asisten_praktikum`
--
ALTER TABLE `data_asisten_praktikum`
  ADD CONSTRAINT `data_asisten_praktikum_ibfk_2` FOREIGN KEY (`id_matakuliah`) REFERENCES `matakuliah` (`id`),
  ADD CONSTRAINT `data_asisten_praktikum_ibfk_3` FOREIGN KEY (`id_asisten`) REFERENCES `asisten` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD CONSTRAINT `nilai_kriteria_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id`),
  ADD CONSTRAINT `nilai_kriteria_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`);

--
-- Constraints for table `nilai_subkriteria`
--
ALTER TABLE `nilai_subkriteria`
  ADD CONSTRAINT `nilai_subkriteria_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_subkriteria_ibfk_2` FOREIGN KEY (`id_subkriteria`) REFERENCES `subkriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
