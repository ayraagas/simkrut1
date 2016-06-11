-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2016 at 10:14 PM
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
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `asisten`
--

CREATE TABLE IF NOT EXISTS `asisten` (
  `id` int(10) NOT NULL,
  `id_tahun_ajaran` int(10) NOT NULL,
  `id_mahasiswa` int(10) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `status` enum('0','1','','') DEFAULT NULL COMMENT '0=''tidak diterima'' , 1=''diterima'''
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asisten`
--

INSERT INTO `asisten` (`id`, `id_tahun_ajaran`, `id_mahasiswa`, `tipe`, `status`) VALUES
(2, 9, 1, 'Mandiri', '0'),
(3, 9, 2, 'Mandiri', '0'),
(4, 9, 2, 'Praktikum', '0'),
(6, 1, 1, 'Mandiri', NULL),
(7, 1, 2, 'Mandiri', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_asisten_mandiri`
--

CREATE TABLE IF NOT EXISTS `data_asisten_mandiri` (
  `id` int(10) NOT NULL,
  `id_matakuliah` int(10) NOT NULL,
  `nilai` varchar(10) NOT NULL,
  `id_asisten` int(10) NOT NULL,
  `id_dosen` int(10) NOT NULL,
  `kelas` varchar(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_asisten_mandiri`
--

INSERT INTO `data_asisten_mandiri` (`id`, `id_matakuliah`, `nilai`, `id_asisten`, `id_dosen`, `kelas`) VALUES
(6, 18, 'A-', 6, 0, ''),
(7, 124, 'A/B', 6, 1, 'A'),
(10, 18, 'A-', 7, 4, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nama`) VALUES
(0, ''),
(1, 'Novi Setiani'),
(4, 'Hendrik');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bobot` int(10) NOT NULL,
  `kategori` enum('benefit','cost') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `bobot`, `kategori`) VALUES
(1, 'Wawancara', 10, 'benefit'),
(2, 'Nilai', 5, 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id` int(10) NOT NULL,
  `nim` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `ipk` float DEFAULT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0=inactive , 1=active'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `password`, `ipk`, `status`) VALUES
(1, '12523017', 'Agas Arya Widodo', 'ea1d3fbbb2f58eb2f72a81eb85c7dcd1', 4, '1'),
(2, '12523042', 'Alif Gibran Syarvani', 'ea1d3fbbb2f58eb2f72a81eb85c7dcd1', 3.8, '1'),
(3, '12523020', 'Anif Shofiana Durri', 'ea1d3fbbb2f58eb2f72a81eb85c7dcd1', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE IF NOT EXISTS `matakuliah` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `semester` varchar(10) NOT NULL COMMENT 'genap atau ganjil',
  `jenis` varchar(10) NOT NULL COMMENT 'wajib atau pilihan'
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=latin1;

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
(170, 'Algoritma dan Pemrograman 1', 'Ganjil', 'Wajib');

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE IF NOT EXISTS `subkriteria` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bobot` int(10) NOT NULL,
  `kategori` enum('benefit','cost','','') NOT NULL,
  `id_kriteria` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE IF NOT EXISTS `tahun_ajaran` (
  `id` int(10) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0=''inactive'' 1=''active'''
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `tahun`, `semester`, `status`) VALUES
(1, '2015/2016', 'Genap', '1'),
(2, '2016/2017', 'Ganjil', '0'),
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `asisten`
--
ALTER TABLE `asisten`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `data_asisten_mandiri`
--
ALTER TABLE `data_asisten_mandiri`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=171;
--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `asisten`
--
ALTER TABLE `asisten`
  ADD CONSTRAINT `asisten_ibfk_1` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tahun_ajaran` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `asisten_ibfk_2` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `data_asisten_mandiri`
--
ALTER TABLE `data_asisten_mandiri`
  ADD CONSTRAINT `data_asisten_mandiri_ibfk_1` FOREIGN KEY (`id_matakuliah`) REFERENCES `matakuliah` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `data_asisten_mandiri_ibfk_2` FOREIGN KEY (`id_asisten`) REFERENCES `asisten` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `data_asisten_mandiri_ibfk_3` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
