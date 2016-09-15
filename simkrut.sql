-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2016 at 05:47 AM
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
(28, 2, 5, 'Mandiri', '0'),
(69, 2, 1, 'Mandiri', '0');

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
(25, 1, 'A', 28, 90, 'C'),
(26, 2, 'A/B', 28, 0, NULL),
(27, 3, 'A', 28, 89, 'C'),
(28, 1, 'A', 69, 88, 'D');

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
(88, 'Ahmad Luthfi ,S.Kom., M.Kom.'),
(89, 'Ahmad Fathan Hidayatullah ,S.T., M.Cs.'),
(90, 'Affan Mahtarami ,S.Kom., M.T.');

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
(1, '12523017', 'Agas Arya Widodo', 'ea1d3fbbb2f58eb2f72a81eb85c7dcd1', '2012', 4, '', '1'),
(3, '12523156', 'Novia Vazela', 'ea1d3fbbb2f58eb2f72a81eb85c7dcd1', '2012', NULL, '', '1'),
(4, '12523096', 'Bharamida Dwi Rizky', 'ea1d3fbbb2f58eb2f72a81eb85c7dcd1', '2012', 3.56, '', '1'),
(5, '1', 'a', 'c4ca4238a0b923820dcc509a6f75849b', '', 3.65, '11', '1');

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
(39, 'Teori Bahasa dan Otomata', 'Ganjil', 'Wajib');

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
(1, '2015/2016', 'Genap', '0'),
(2, '2016/2017', 'Ganjil', '1'),
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `asisten`
--
ALTER TABLE `asisten`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `data_asisten_mandiri`
--
ALTER TABLE `data_asisten_mandiri`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `data_asisten_praktikum`
--
ALTER TABLE `data_asisten_praktikum`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nilai_subkriteria`
--
ALTER TABLE `nilai_subkriteria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
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
