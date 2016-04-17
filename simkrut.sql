-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2016 at 12:40 PM
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

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'e172dd95f4feb21412a692e73929961e');

-- --------------------------------------------------------

--
-- Table structure for table `data_asisten_mandiri`
--

CREATE TABLE IF NOT EXISTS `data_asisten_mandiri` (
  `id` int(10) NOT NULL,
  `id_matakuliah` int(10) NOT NULL,
  `id_mahasiswa` int(10) NOT NULL,
  `nilai_mk` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `data_mahasiswa` (
  `id` int(10) NOT NULL,
  `id_mahasiswa` int(10) NOT NULL,
  `ipk` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id` int(10) NOT NULL,
  `nim` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `status` enum('0','1','','','','') NOT NULL COMMENT '0=inactive , 1=active'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `password`, `status`) VALUES
(1, '12523017', 'Agas Arya Widodo', 'ea1d3fbbb2f58eb2f72a81eb85c7dcd1', '1'),
(22, '12523042', 'Alif Gibran Syarvani', '15d81a7922fb166706435cc7af138882', '0');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE IF NOT EXISTS `matakuliah` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `semester` varchar(10) NOT NULL COMMENT 'genap atau ganjil',
  `jenis` varchar(10) NOT NULL COMMENT 'wajib atau pilihan'
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `nama`, `semester`, `jenis`) VALUES
(18, 'Algoritma dan Pemrograman 2', 'Genap', 'Wajib'),
(19, 'Basisdata', 'Genap', 'Wajib'),
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
(34, 'Algoritma dan Pemrograman 1', 'Ganjil', 'Wajib'),
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
(169, 'Pr. Pemrograman Web', 'Genap', 'Praktikum');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE IF NOT EXISTS `tahun_ajaran` (
  `id` int(10) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0=''inactive'' 1=''active'''
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `tahun`, `semester`, `status`) VALUES
(1, '2015/2016', 'Genap', '1');

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
-- Indexes for table `data_asisten_mandiri`
--
ALTER TABLE `data_asisten_mandiri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_mahasiswa` (`id_mahasiswa`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `data_asisten_mandiri`
--
ALTER TABLE `data_asisten_mandiri`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=170;
--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
