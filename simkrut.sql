-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2016 at 09:26 AM
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
(1, 'Agas Arya Widodo', 0.69876314407848, 14),
(2, 'Novia Vazela', 0.70633372536646, 15),
(3, 'Bharamida Dwi Rizky', 0.078764133119069, 16),
(4, 'Agas Arya Widodo', 0.28814802098458, 18),
(5, 'Bharamida Dwi Rizky', 0.17002720401022, 20),
(7, 'Agas Arya Widodo', 0.68802510366627, 23),
(8, 'Bharamida Dwi Rizky', 0.31197489633373, 24);

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
(15, 1, 3, 'Praktikum', '1'),
(16, 1, 4, 'Praktikum', '0'),
(17, 1, 4, 'Mandiri', '0'),
(18, 2, 1, 'Praktikum', '0'),
(19, 2, 1, 'Mandiri', '0'),
(20, 2, 4, 'Praktikum', '0'),
(23, 9, 1, 'Praktikum', '0'),
(24, 9, 4, 'Praktikum', '0');

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
(7, 124, 'A/B', 6, 1, 'A'),
(9, 182, 'A-', 17, 10, 'E'),
(10, 20, 'A/B', 17, 9, 'D'),
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
(49, 189, 5, 18),
(50, 183, 4, 20),
(51, 184, 5, 20),
(52, 186, 5, 20),
(53, 187, 4, 20),
(54, 189, 3, 20),
(55, 163, 2, 20),
(61, 183, 4, 23),
(62, 184, 4, 23),
(63, 186, 3, 23),
(64, 187, 2, 23),
(65, 189, 2, 23),
(66, 163, 2, 23),
(67, 164, 5, 23),
(68, 167, 1, 23),
(69, 166, 3, 23),
(70, 183, 2, 24),
(71, 184, 3, 24),
(72, 186, 4, 24),
(73, 189, 3, 24);

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
(12, 'Syarif Hidayat');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bobot` float NOT NULL,
  `kategori` enum('benefit','cost') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `bobot`, `kategori`) VALUES
(2, 'Nilai', 4, 'benefit'),
(3, 'Tes Praktek', 5, 'benefit'),
(4, 'Wawancara', 4, 'benefit'),
(5, 'Microteaching', 5, 'benefit');

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
(1, '12523017', 'Agas Arya Widodo', 'ea1d3fbbb2f58eb2f72a81eb85c7dcd1', '2012', 3.69, '1'),
(3, '12523156', 'Novia Vazela', 'ea1d3fbbb2f58eb2f72a81eb85c7dcd1', '2012', NULL, '1'),
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
(190, 'Algoritma dan Pemrograman 1', 'Ganjil', 'Wajib'),
(191, 'Algoritma dan Pemrograman 2', 'Genap', 'Wajib');

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
(186, 4, 2, 1),
(187, 4, 3, 2),
(188, 4, 4, 0.9400000087916851),
(210, 5, 2, 0.8),
(211, 5, 3, 5),
(212, 5, 4, 0.7925000086426736),
(618, 2, 2, 0.375),
(619, 2, 3, 90),
(620, 2, 4, 0.9525000095367432),
(621, 2, 5, 1.0000000223517418),
(622, 3, 2, 0.375),
(623, 3, 3, 75),
(624, 3, 4, 0.9125000089406967),
(625, 3, 5, 0.8500000201165676),
(653, 4, 5, 1.0000000223517418),
(654, 5, 5, 0.8000000178813934),
(662, 7, 2, 0.9166666666666667),
(663, 7, 3, 5),
(664, 7, 4, 0.9500000104308128),
(665, 7, 5, 0.9333333546916645),
(681, 8, 2, 1),
(682, 8, 3, 4),
(683, 8, 4, 0.9750000101824602),
(684, 8, 5, 1.0000000223517418),
(685, 1, 2, 0.5),
(686, 1, 3, 90),
(687, 1, 4, 0.8800000093877316),
(688, 1, 5, 0.9000000208616257);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_subkriteria`
--

CREATE TABLE `nilai_subkriteria` (
  `id` int(10) NOT NULL,
  `id_alternatif` int(10) NOT NULL,
  `id_subkriteria` int(10) NOT NULL,
  `nilai` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_subkriteria`
--

INSERT INTO `nilai_subkriteria` (`id`, `id_alternatif`, `id_subkriteria`, `nilai`) VALUES
(946, 4, 3, 5),
(947, 4, 5, 5),
(949, 4, 12, 5),
(950, 4, 13, 5),
(951, 4, 14, 5),
(952, 4, 15, 5),
(953, 4, 16, 5),
(954, 4, 17, 5),
(955, 4, 18, 5),
(956, 4, 19, 5),
(957, 5, 3, 4),
(958, 5, 5, 4),
(960, 5, 12, 4),
(961, 5, 13, 4),
(962, 5, 14, 4),
(963, 5, 15, 4),
(964, 5, 16, 4),
(965, 5, 17, 4),
(966, 5, 18, 4),
(967, 5, 19, 4),
(968, 7, 3, 5),
(969, 7, 5, 5),
(971, 7, 12, 5),
(972, 7, 13, 5),
(973, 7, 14, 5),
(974, 7, 15, 5),
(975, 7, 16, 5),
(976, 7, 17, 5),
(977, 7, 18, 5),
(978, 7, 19, 5),
(990, 8, 3, 6),
(991, 8, 5, 5),
(993, 8, 12, 5),
(994, 8, 13, 6),
(995, 8, 14, 5),
(996, 8, 15, 6),
(997, 8, 16, 5),
(998, 8, 17, 6),
(999, 8, 18, 5),
(1000, 8, 19, 5),
(1001, 1, 3, 2),
(1002, 1, 5, 4),
(1004, 1, 12, 4),
(1005, 1, 13, 4),
(1006, 1, 14, 3),
(1007, 1, 15, 3),
(1008, 1, 16, 2),
(1009, 1, 17, 4),
(1010, 1, 18, 3),
(1011, 1, 19, 3),
(1012, 2, 3, 4),
(1013, 2, 5, 4),
(1015, 2, 12, 3),
(1016, 2, 13, 4),
(1017, 2, 14, 4),
(1018, 2, 15, 4),
(1019, 2, 16, 4),
(1020, 2, 17, 4),
(1021, 2, 18, 3),
(1022, 2, 19, 4),
(1023, 3, 3, 3),
(1024, 3, 5, 4),
(1026, 3, 12, 3),
(1027, 3, 13, 4),
(1028, 3, 14, 5),
(1029, 3, 15, 4),
(1030, 3, 16, 4),
(1031, 3, 17, 3),
(1032, 3, 18, 3),
(1033, 3, 19, 3);

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
(3, 'Kerjasama', 0.2, 'benefit', 4),
(5, 'Komitmen', 0.5, 'benefit', 4),
(12, 'Nilai Praktikum', 0.5, 'benefit', 2),
(13, 'Sikap', 0.1, 'benefit', 4),
(14, 'Motivasi', 0.05, 'benefit', 4),
(15, 'Komunikasi', 0.15, 'cost', 4),
(16, 'Kemampuan Kelas', 0.1, 'benefit', 5),
(17, 'Penguasaan Materi', 0.4, 'benefit', 5),
(18, 'Kemampuan Presentasi', 0.3, 'benefit', 5),
(19, 'Penguasaan Kelas', 0.2, 'benefit', 5),
(20, 'Nilai Teori', 0.5, 'benefit', 2);

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
(1, '2015/2016', 'Genap', '1'),
(2, '2016/2017', 'Ganjil', '0'),
(9, '2016/2017', 'Genap', '0'),
(10, '2017/2018', 'Ganjil', '0');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `asisten`
--
ALTER TABLE `asisten`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `data_asisten_mandiri`
--
ALTER TABLE `data_asisten_mandiri`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `data_asisten_praktikum`
--
ALTER TABLE `data_asisten_praktikum`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;
--
-- AUTO_INCREMENT for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=689;
--
-- AUTO_INCREMENT for table `nilai_subkriteria`
--
ALTER TABLE `nilai_subkriteria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1034;
--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
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
  ADD CONSTRAINT `asisten_ibfk_1` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tahun_ajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asisten_ibfk_2` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_asisten_mandiri`
--
ALTER TABLE `data_asisten_mandiri`
  ADD CONSTRAINT `data_asisten_mandiri_ibfk_1` FOREIGN KEY (`id_matakuliah`) REFERENCES `matakuliah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_asisten_mandiri_ibfk_2` FOREIGN KEY (`id_asisten`) REFERENCES `asisten` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_asisten_mandiri_ibfk_3` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_asisten_praktikum`
--
ALTER TABLE `data_asisten_praktikum`
  ADD CONSTRAINT `data_asisten_praktikum_ibfk_2` FOREIGN KEY (`id_matakuliah`) REFERENCES `matakuliah` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_asisten_praktikum_ibfk_3` FOREIGN KEY (`id_asisten`) REFERENCES `asisten` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD CONSTRAINT `nilai_kriteria_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_kriteria_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE;

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
