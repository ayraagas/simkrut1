-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2016 at 04:33 PM
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
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'admin1', 'e00cf25ad42683b3df678c61f42c6bda'),
(3, 'admin2', 'c84258e9c39059a89ab77d846ddab909');

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
(1, 'Agas Arya Widodo', 0.39189945751848, 71),
(2, 'Bharamida Dwi Rizky', 1, 72),
(3, 'Novia Vazela', 0.31418322232354, 73),
(5, 'Agas Arya Widodo', 0.57422194648717, 75),
(6, 'Randy Varianda', 0.42577805351283, 77),
(7, 'Agas Arya Widodo', 0, 81),
(18, 'Randy Varianda', 1, 92);

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
(70, 2, 1, 'Mandiri', '0'),
(71, 2, 1, 'Praktikum', '1'),
(72, 2, 4, 'Praktikum', '1'),
(73, 2, 3, 'Praktikum', '0'),
(75, 10, 1, 'Praktikum', '0'),
(76, 10, 1, 'Mandiri', '0'),
(77, 10, 13, 'Praktikum', '0'),
(78, 10, 13, 'Mandiri', '0'),
(80, 10, 14, 'Mandiri', '0'),
(81, 1, 1, 'Praktikum', '0'),
(92, 1, 13, 'Praktikum', '0');

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
(29, 1, 'A', 70, 89, 'A'),
(30, 2, 'A-', 70, 89, 'B'),
(31, 3, 'A/B', 70, 58, 'C'),
(32, 4, 'A', 70, 89, 'B'),
(33, 5, 'A-', 70, 89, 'B'),
(34, 1, 'A', 76, 85, 'A'),
(35, 2, 'A-', 76, 0, NULL),
(36, 3, 'B+', 76, 0, NULL),
(37, 4, 'A-', 76, 0, NULL),
(38, 5, 'A-', 76, 0, NULL),
(39, 1, 'A', 78, 0, NULL),
(40, 2, 'A/B', 78, 0, NULL),
(41, 3, 'A', 78, 0, NULL),
(42, 4, 'A-', 78, 86, 'E'),
(43, 5, 'A-', 78, 0, NULL),
(44, 1, 'A', 80, 0, NULL),
(45, 2, 'A-', 80, 86, 'C'),
(46, 3, 'A/B', 80, 0, NULL);

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
(1, 45, 5, 71),
(3, 45, 4, 72),
(5, 45, 5, 73),
(9, 48, 5, 75),
(10, 49, 2, 75),
(11, 55, 3, 75),
(12, 53, 4, 75),
(13, 59, 4, 75),
(14, 47, 3, 75),
(15, 48, 3, 77),
(16, 49, 4, 77),
(17, 55, 5, 77),
(18, 53, 4, 77),
(19, 59, 5, 77),
(20, 48, 5, 81),
(21, 49, 4, 81),
(22, 55, 3, 81),
(23, 53, 1, 81),
(24, 47, 4, 81),
(25, 45, 3, 81),
(26, 56, 2, 81),
(97, 48, 5, 92),
(98, 49, 5, 92),
(99, 55, 3, 92),
(100, 53, 1, 92),
(101, 47, 5, 92),
(102, 45, 2, 92),
(103, 56, 3, 92),
(104, 54, 3, 92),
(105, 60, 3, 92);

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
(52, 'Zainudin Zukhri ,S.T., M.I.T.'),
(53, 'Yudi Prayudi ,S.Si., M.Kom.'),
(54, 'Taufiq Hidayat ,S.T., M.C.S.'),
(55, 'Syarif Hidayat ,S.Kom., M.I.T.'),
(56, 'Sri Mulyati ,S.Kom., M.Kom.'),
(57, 'Sri Kusumadewi Dr.,S.Si., M.T.'),
(58, 'Sheila Nurul Huda ,S.Kom., M.Cs.'),
(59, 'Septia Rani ,S.T., M.Cs.'),
(60, 'Rahadian Kurniawan ,S.Kom., M.Kom.'),
(61, 'Raden Teduh Dirgahayu Dr.,S.T., M.Sc.'),
(62, 'Nur Wijayaning Rahayu ,S.Kom., M.Cs.'),
(63, 'Novi Setiani ,S.T., M.T.'),
(64, 'Mukhammad Andri Setiawan ,S.T., M.Sc., Ph.D.'),
(65, 'Moh. Idris ,S.Kom., M.Kom.'),
(66, 'Lizda Iswari ,S.T., M.Sc.'),
(67, 'Kholid Haryono ,S.T., M.Kom.'),
(68, 'Izzati Muhimmah ,S.T., M.Sc., Ph.D.'),
(69, 'Hendrik ,S.T., M.Eng.'),
(70, 'Hari Setiaji ,S.Kom., M.Eng.'),
(71, 'Hanson Prihantoro Putro ,S.T., M.T.'),
(72, 'Hamid ,S.T., M.Eng.'),
(73, 'Galang Prihadi Mahardhika ,S.Kom., M.Kom.'),
(74, 'Fietyata Yudha ,S.Kom., M.Kom.'),
(75, 'Feri Wijayanto ,S.T., M.T.'),
(76, 'Fathul Wahid ,S.T., M.Sc., Ph.D.'),
(77, 'Erika Ramadhani ,S.T., M.Eng.'),
(78, 'Elyza Gustri Wahyuni ,S.T., M.Cs.'),
(79, 'Chanifah Indah Ratnasari ,S.Kom., M.Kom.'),
(80, 'Chandra Kusuma Dewa ,S.Kom., M.Cs.'),
(81, 'Beni Suranto ,S.T., M.Soft.Eng.'),
(82, 'Arrie Kurniawardhani ,S.Si., M.Kom.'),
(83, 'Aridhanyati Arifin ,S.T., M.Cs.'),
(84, 'Ari Sujarwo ,S.Kom., M.I.T.'),
(85, 'Andhika Giri Persada ,S.Kom., M.Eng.'),
(86, 'Andhik Budi Cahyono ,S.T., M.T.'),
(87, 'Almed Hamzah ,S.T., M.Eng.'),
(89, 'Ahmad Fathan Hidayatullah ,S.T., M.Cs.'),
(90, 'Affan Mahtarami ,S.Kom., M.T.'),
(91, 'Ahmad Luthfi ,S.Kom., M.Kom.');

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
  `no_telp` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0=inactive , 1=active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `password`, `angkatan`, `ipk`, `no_telp`, `status`) VALUES
(1, '12523017', 'Agas Arya Widodo', 'ea1d3fbbb2f58eb2f72a81eb85c7dcd1', '2013', 3.89, '085728175464', '1'),
(3, '12523156', 'Novia Vazela', 'ea1d3fbbb2f58eb2f72a81eb85c7dcd1', '2012', NULL, '081234567890', '1'),
(4, '12523096', 'Bharamida Dwi Rizky', 'ea1d3fbbb2f58eb2f72a81eb85c7dcd1', '2012', 3.56, '085678901234', '1'),
(13, '12523025', 'Randy Varianda', 'ea1d3fbbb2f58eb2f72a81eb85c7dcd1', '434234', 3.89, '089778447336', '1'),
(14, '12523042', 'Alif', 'e10adc3949ba59abbe56e057f20f883e', '2012', 3.89, '087788655666', '1');

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
(1, 'Algoritma dan Pemrograman 1', 'Ganjil', 'Wajib'),
(2, 'Aljabar Linier dan Matriks', 'Ganjil', 'Wajib'),
(3, 'Animasi Komputer', 'Ganjil', 'Pilihan'),
(4, 'Audit Sistem Informasi', 'Ganjil', 'Pilihan'),
(5, 'Cyber Law', 'Ganjil', 'Pilihan'),
(6, 'Fundamen Informatika (Kur. 2016)', 'Ganjil', 'Wajib'),
(7, 'Grafika 3 Dimensi', 'Ganjil', 'Pilihan'),
(8, 'Grafika Komputer', 'Ganjil', 'Wajib'),
(9, 'Interaksi Manusia dan Komputer', 'Ganjil', 'Wajib'),
(10, 'Jaringan Komputer', 'Ganjil', 'Wajib'),
(11, 'Jaringan Nirkabel & Sistem Bergerak', 'Ganjil', 'Pilihan'),
(12, 'Kecerdasan Buatan', 'Ganjil', 'Wajib'),
(13, 'Kewirausahaan', 'Ganjil', 'Wajib'),
(14, 'Layanan Web.', 'Ganjil', 'Pilihan'),
(15, 'Logika Fuzzy', 'Ganjil', 'Pilihan'),
(16, 'Logika Matematika', 'Ganjil', 'Wajib'),
(17, 'Manajemen Jaringan Komputer', 'Ganjil', 'Pilihan'),
(18, 'Manajemen Proses Bisnis', 'Ganjil', 'Pilihan'),
(19, 'Metodologi Penelitian', 'Ganjil', 'Wajib'),
(20, 'Multimedia', 'Ganjil', 'Wajib'),
(21, 'Pemikiran Desain (Kur. 2016)', 'Ganjil', 'Wajib'),
(22, 'Pemrograman Berorientasi Komponen', 'Ganjil', 'Pilihan'),
(23, 'Pemrograman Berorientasi Obyek', 'Ganjil', 'Wajib'),
(24, 'Pemrograman dan Struktur Data (Kur. 2016)', 'Ganjil', 'Wajib'),
(25, 'Pemrograman GIM', 'Ganjil', 'Pilihan'),
(26, 'Pemrosesan Pararel', 'Ganjil', 'Pilihan'),
(27, 'Pengamanan Sistem Komputer', 'Ganjil', 'Pilihan'),
(28, 'Pengantar Teknologi Informasi', 'Ganjil', 'Wajib'),
(29, 'Pengembangan GIM', 'Ganjil', 'Pilihan'),
(30, 'Rekayasa Web', 'Ganjil', 'Pilihan'),
(31, 'Riset Operasi', 'Ganjil', 'Wajib'),
(32, 'Semantic WEB', 'Ganjil', 'Pilihan'),
(33, 'Sistem Informasi', 'Ganjil', 'Wajib'),
(34, 'Sistem Informasi Geografis', 'Ganjil', 'Pilihan'),
(35, 'Sistem Manajemen Basisdata', 'Ganjil', 'Pilihan'),
(36, 'Sistem Pakar', 'Ganjil', 'Pilihan'),
(37, 'Teknik Pengolahan Citra', 'Ganjil', 'Pilihan'),
(38, 'Teknologi XML', 'Ganjil', 'Pilihan'),
(39, 'Teori Bahasa dan Otomata', 'Ganjil', 'Wajib'),
(45, 'Pr. Basisdata', 'Genap', 'Praktikum'),
(47, 'Pr. Algoritma & Pemrograman 1', 'Ganjil', 'Praktikum'),
(48, 'Algoritma dan Pemrograman (P)', 'Ganjil', 'Praktikum'),
(49, 'Basisdata (P)', 'Genap', 'Praktikum'),
(51, 'Sistem Operasi (P)', 'Genap', 'Praktikum'),
(52, 'Pr. Sistem Operasi', 'Genap', 'Praktikum'),
(53, 'Pemrograman Berorientasi Objek (P)', 'Ganjil', 'Praktikum'),
(54, 'Pr. Pemrograman Berorientasi Objek', 'Ganjil', 'Praktikum'),
(55, 'Jaringan Komputer (P)', 'Ganjil', 'Praktikum'),
(56, 'Pr. Jaringan Komputer', 'Ganjil', 'Praktikum'),
(57, 'Struktur Data (P)', 'Genap', 'Praktikum'),
(58, 'Pr. Struktur Data', 'Genap', 'Praktikum'),
(59, 'Pemrograman Web (P)', 'Genap', 'Praktikum'),
(60, 'Pr. Pemrograman Web', 'Genap', 'Praktikum');

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
(26, 2, 2, 1),
(27, 2, 3, 90),
(28, 2, 4, 0.9525000095367432),
(29, 2, 5, 1.0000000223517418),
(30, 3, 2, 0.875),
(31, 3, 3, 75),
(32, 3, 4, 0.9125000089406967),
(33, 3, 5, 0.8500000201165676),
(55, 6, 2, 0.9),
(56, 6, 3, 100),
(57, 6, 4, 0.8900000110268593),
(58, 6, 5, 0.7600000143051148),
(79, 5, 2, 1),
(80, 5, 3, 80),
(81, 5, 4, 1.000000011175871),
(82, 5, 5, 1.0000000223517418),
(83, 1, 2, 0.875),
(84, 1, 3, 90),
(85, 1, 4, 0.7800000097602606),
(86, 1, 5, 0.8250000197440386),
(87, 7, 2, 0.9330357142857143),
(92, 18, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_penguji_kriteria`
--

CREATE TABLE `nilai_penguji_kriteria` (
  `id` int(11) NOT NULL,
  `id_penguji` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_penguji_kriteria`
--

INSERT INTO `nilai_penguji_kriteria` (`id`, `id_penguji`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(5, 5, 7, 3, 100),
(8, 3, 7, 3, 99),
(9, 3, 18, 3, 88),
(10, 5, 18, 3, 60);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_penguji_subkriteria`
--

CREATE TABLE `nilai_penguji_subkriteria` (
  `id` int(11) NOT NULL,
  `id_penguji` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_penguji_subkriteria`
--

INSERT INTO `nilai_penguji_subkriteria` (`id`, `id_penguji`, `id_alternatif`, `id_subkriteria`, `nilai`) VALUES
(206, 5, 7, 16, 3),
(207, 5, 7, 17, 2),
(208, 5, 7, 18, 3),
(209, 5, 7, 19, 2),
(210, 5, 7, 3, 3),
(211, 5, 7, 5, 2),
(212, 5, 7, 13, 3),
(213, 5, 7, 14, 2),
(214, 5, 7, 15, 3),
(233, 3, 7, 3, 3),
(234, 3, 7, 5, 4),
(235, 3, 7, 13, 3),
(236, 3, 7, 14, 4),
(237, 3, 7, 15, 3),
(238, 3, 7, 16, 4),
(239, 3, 7, 17, 3),
(240, 3, 7, 18, 4),
(241, 3, 7, 19, 3),
(242, 3, 18, 3, 2),
(243, 3, 18, 5, 3),
(244, 3, 18, 13, 2),
(245, 3, 18, 14, 3),
(246, 3, 18, 15, 5),
(247, 3, 18, 16, 4),
(248, 3, 18, 17, 4),
(249, 3, 18, 18, 3),
(250, 3, 18, 19, 4),
(251, 5, 18, 16, 3),
(252, 5, 18, 17, 2),
(253, 5, 18, 18, 2),
(254, 5, 18, 19, 3),
(255, 5, 18, 3, 3),
(256, 5, 18, 5, 3),
(257, 5, 18, 13, 2),
(258, 5, 18, 14, 3),
(259, 5, 18, 15, 1);

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
(100, 2, 3, 4),
(101, 2, 5, 4),
(102, 2, 12, 3),
(103, 2, 13, 4),
(104, 2, 14, 4),
(105, 2, 15, 4),
(106, 2, 16, 4),
(107, 2, 17, 4),
(108, 2, 18, 3),
(109, 2, 19, 4),
(110, 2, 20, 4),
(111, 3, 3, 3),
(112, 3, 5, 4),
(113, 3, 12, 3),
(114, 3, 13, 4),
(115, 3, 14, 5),
(116, 3, 15, 4),
(117, 3, 16, 4),
(118, 3, 17, 3),
(119, 3, 18, 3),
(120, 3, 19, 3),
(121, 3, 20, 3),
(144, 6, 3, 5),
(145, 6, 5, 4),
(146, 6, 12, 4),
(147, 6, 13, 5),
(148, 6, 14, 4),
(149, 6, 15, 5),
(150, 6, 16, 4),
(151, 6, 17, 5),
(152, 6, 18, 2),
(153, 6, 19, 4),
(154, 6, 20, 5),
(155, 5, 3, 5),
(156, 5, 5, 5),
(157, 5, 12, 5),
(158, 5, 13, 5),
(159, 5, 14, 5),
(160, 5, 15, 5),
(161, 5, 16, 5),
(162, 5, 17, 5),
(163, 5, 18, 5),
(164, 5, 19, 5),
(165, 5, 20, 5),
(177, 1, 3, 3),
(178, 1, 5, 3),
(179, 1, 12, 3),
(180, 1, 13, 3),
(181, 1, 14, 3),
(182, 1, 15, 3),
(183, 1, 16, 3),
(184, 1, 17, 3),
(185, 1, 18, 3),
(186, 1, 19, 3),
(187, 1, 20, 3),
(193, 7, 20, 3.25),
(195, 7, 12, 3),
(199, 18, 12, 3.2),
(200, 18, 20, 3.5);

-- --------------------------------------------------------

--
-- Table structure for table `penguji`
--

CREATE TABLE `penguji` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penguji`
--

INSERT INTO `penguji` (`id`, `nama`, `password`) VALUES
(3, 'A', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'B', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `penguji_kriteria`
--

CREATE TABLE `penguji_kriteria` (
  `id` int(11) NOT NULL,
  `id_penguji` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penguji_kriteria`
--

INSERT INTO `penguji_kriteria` (`id`, `id_penguji`, `id_kriteria`) VALUES
(2, 5, 5),
(3, 3, 4),
(4, 5, 4),
(7, 3, 5),
(8, 3, 3),
(9, 5, 3);

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
-- Indexes for table `nilai_penguji_kriteria`
--
ALTER TABLE `nilai_penguji_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penguji` (`id_penguji`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `nilai_penguji_subkriteria`
--
ALTER TABLE `nilai_penguji_subkriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penguji` (`id_penguji`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `id_subkriteria` (`id_subkriteria`);

--
-- Indexes for table `nilai_subkriteria`
--
ALTER TABLE `nilai_subkriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_subkriteria` (`id_subkriteria`),
  ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indexes for table `penguji`
--
ALTER TABLE `penguji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penguji_kriteria`
--
ALTER TABLE `penguji_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penguji` (`id_penguji`),
  ADD KEY `id_kriteria` (`id_kriteria`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `asisten`
--
ALTER TABLE `asisten`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `data_asisten_mandiri`
--
ALTER TABLE `data_asisten_mandiri`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `data_asisten_praktikum`
--
ALTER TABLE `data_asisten_praktikum`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `nilai_penguji_kriteria`
--
ALTER TABLE `nilai_penguji_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `nilai_penguji_subkriteria`
--
ALTER TABLE `nilai_penguji_subkriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;
--
-- AUTO_INCREMENT for table `nilai_subkriteria`
--
ALTER TABLE `nilai_subkriteria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;
--
-- AUTO_INCREMENT for table `penguji`
--
ALTER TABLE `penguji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `penguji_kriteria`
--
ALTER TABLE `penguji_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
-- Constraints for table `nilai_penguji_kriteria`
--
ALTER TABLE `nilai_penguji_kriteria`
  ADD CONSTRAINT `nilai_penguji_kriteria_ibfk_1` FOREIGN KEY (`id_penguji`) REFERENCES `penguji` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_penguji_kriteria_ibfk_2` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_penguji_kriteria_ibfk_3` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_penguji_subkriteria`
--
ALTER TABLE `nilai_penguji_subkriteria`
  ADD CONSTRAINT `nilai_penguji_subkriteria_ibfk_1` FOREIGN KEY (`id_penguji`) REFERENCES `penguji` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_penguji_subkriteria_ibfk_2` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_penguji_subkriteria_ibfk_3` FOREIGN KEY (`id_subkriteria`) REFERENCES `subkriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_subkriteria`
--
ALTER TABLE `nilai_subkriteria`
  ADD CONSTRAINT `nilai_subkriteria_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_subkriteria_ibfk_2` FOREIGN KEY (`id_subkriteria`) REFERENCES `subkriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penguji_kriteria`
--
ALTER TABLE `penguji_kriteria`
  ADD CONSTRAINT `penguji_kriteria_ibfk_1` FOREIGN KEY (`id_penguji`) REFERENCES `penguji` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penguji_kriteria_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
