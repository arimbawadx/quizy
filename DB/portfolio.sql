-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2019 at 07:35 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE IF NOT EXISTS `biodata` (
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `profil` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nama_panggilan` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `alamat_desa` varchar(50) NOT NULL,
  `alamat_kabupaten` varchar(50) NOT NULL,
  `alamat_provinsi` varchar(50) NOT NULL,
  `hobi` varchar(50) DEFAULT NULL,
  `sekolah` varchar(50) DEFAULT NULL,
  `bekerja` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`username`, `password`, `profil`, `nama_lengkap`, `nama_panggilan`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `status`, `alamat_desa`, `alamat_kabupaten`, `alamat_provinsi`, `hobi`, `sekolah`, `bekerja`) VALUES
('arimbawadx', '$2y$10$TMc7Q2ou.FqY3ujgNWXVIuQ6fO8lMJFUCvTp1M0TSSxmpxESA05qi', 'noprofil.jpg', 'I Made Yoga Arimbawa', 'Yoga', 'Denpasar', '1999-11-05', 'Pria', 'Mahasiswa', 'Banjarangkan', 'Klungkung', 'Bali', 'Videography', 'Stiki Indonesia', '-');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
`id_grade` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_soal` varchar(50) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id_grade`, `username`, `nama_soal`, `nilai`) VALUES
(26, 'arimbawadx', 'PEMROGRAMAN WEB', 80),
(27, 'arimbawadx', 'Matematika', 80);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
`id_soal` int(11) NOT NULL,
  `nama_soal` varchar(50) NOT NULL,
  `isi_soal` varchar(10000) NOT NULL,
  `a` varchar(1000) NOT NULL,
  `b` varchar(1000) NOT NULL,
  `c` varchar(1000) NOT NULL,
  `d` varchar(1000) NOT NULL,
  `jawaban` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `nama_soal`, `isi_soal`, `a`, `b`, `c`, `d`, `jawaban`) VALUES
(1, 'PEMROGRAMAN WEB', 'Type yang berfungsi untuk menerima masukan berupa teks dari pengguna adalah', 'checkbox', 'submit', 'file', 'text', 'text'),
(2, 'PEMROGRAMAN WEB', 'Kepanjangan dari html adalah', 'Hypertext Mail Language', 'Hypertext Markup Language', 'Hypertext Makan Language', 'Hypertext Master Language', 'Hypertext Markup Language'),
(3, 'PEMROGRAMAN WEB', 'Perintah yang digunakan membuat tabel adalah', 'title', 'colspan dan rowspan', 'td dan tr', 'head', 'td dan tr'),
(4, 'PEMROGRAMAN WEB', 'Kepanjangan dari CSS adalah', 'Cascading Style Sheet', 'Cascading Sheet Style', 'Conversion Style Sheet', 'Conversion Sheet Style', 'Cascading Style Sheet'),
(5, 'PEMROGRAMAN WEB', 'Kepanjangan dari PHP adalah', 'Pemberian Harapan Palsu', 'Perawan Hampir Punah', 'Hypertext Preprocessor', 'Pasteur Hyper Point', 'Hypertext Preprocessor'),
(6, 'Matematika', '1+1=', '3', '6', '2', '4', '2'),
(7, 'Matematika', '4+1=', '2', '4', '7', '5', '5'),
(8, 'Matematika', '8-2=', '4', '5', '9', '6', '6'),
(9, 'Matematika', '5x2=', '10', '8', '6', '9', '10'),
(10, 'Matematika', '9:3=', '4', '3', '2', '1', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
 ADD PRIMARY KEY (`id_grade`), ADD KEY `fk_biodata_relation_grade` (`username`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
 ADD PRIMARY KEY (`id_soal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
MODIFY `id_grade` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `grade`
--
ALTER TABLE `grade`
ADD CONSTRAINT `fk_biodata_relation_grade` FOREIGN KEY (`username`) REFERENCES `biodata` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
