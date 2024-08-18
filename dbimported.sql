-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 18, 2024 at 02:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alkarim`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '123'),
(2, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kelas_ajar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `password`, `nama`, `email`, `jk`, `kontak`, `alamat`, `tgl_lahir`, `kelas_ajar`) VALUES
('09876', '202cb962ac59075b964b07152d234b70', 'Ahmad', 'ahmad@guru.com', 'Pria', '1234', 'Natar', NULL, 'VII Abu Bakar'),
('12345', '827ccb0eea8a706c4c34a16891f84e7b', 'Andi, S.Pd', 'andi@guru.com', 'Pria', '08976', 'Bandar Lampung', NULL, 'VIII Umar');

-- --------------------------------------------------------

--
-- Table structure for table `rapor`
--

CREATE TABLE `rapor` (
  `nisn` varchar(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `mapel` varchar(25) NOT NULL,
  `nilai_akhir` double NOT NULL,
  `tugas1` double DEFAULT NULL,
  `tugas2` double DEFAULT NULL,
  `tugas3` double DEFAULT NULL,
  `uts` double DEFAULT NULL,
  `tugas4` double DEFAULT NULL,
  `tugas5` double DEFAULT NULL,
  `tugas6` double DEFAULT NULL,
  `uas` double DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `semester` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rapor`
--

INSERT INTO `rapor` (`nisn`, `nama`, `kelas`, `mapel`, `nilai_akhir`, `tugas1`, `tugas2`, `tugas3`, `uts`, `tugas4`, `tugas5`, `tugas6`, `uas`, `deskripsi`, `semester`) VALUES
('121314', '', '', 'IPA', 84.5, 90, 80, 80, 90, 80, 80, 90, 80, 'Ananda Ichwan sudah sangat baik memahami bagaimana cara membuat ...', '');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(10) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nipd` varchar(25) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `nik` varchar(25) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `dusun` varchar(50) DEFAULT NULL,
  `kelurahan` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kodepos` varchar(10) DEFAULT NULL,
  `jenistinggal` varchar(50) DEFAULT NULL,
  `transport` varchar(50) DEFAULT NULL,
  `bb` varchar(3) DEFAULT NULL,
  `tb` varchar(3) DEFAULT NULL,
  `jarak` int(11) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `nama_wali` varchar(100) DEFAULT NULL,
  `pekerjaan_ayah` varchar(50) DEFAULT NULL,
  `pekerjaan_ibu` varchar(50) DEFAULT NULL,
  `pekerjaan_wali` varchar(50) DEFAULT NULL,
  `penghasilan_ayah` varchar(50) DEFAULT NULL,
  `penghasilan_ibu` varchar(50) DEFAULT NULL,
  `penghasilan_wali` varchar(50) DEFAULT NULL,
  `sklh_asal` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama`, `password`, `email`, `tgl_lahir`, `jk`, `kontak`, `alamat`, `nipd`, `kelas`, `nik`, `agama`, `rt`, `rw`, `dusun`, `kelurahan`, `kecamatan`, `kodepos`, `jenistinggal`, `transport`, `bb`, `tb`, `jarak`, `nama_ayah`, `nama_ibu`, `nama_wali`, `pekerjaan_ayah`, `pekerjaan_ibu`, `pekerjaan_wali`, `penghasilan_ayah`, `penghasilan_ibu`, `penghasilan_wali`, `sklh_asal`) VALUES
('121314', 'Ichwan', '598d4c200461b81522a3328565c25f7c', 'hallo@gmail.com', '2001-04-03', 'Laki', '087654321', 'NATAR', '123', 'VII Abu Bakar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('123', 'ujang', '25d55ad283aa400af464c76d713c07ad', 'ujang@test.com', '2001-01-03', 'Male', '12345678', 'Natar', '1234', 'VII Abu Bakar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('12345678', 'Abdul', '827ccb0eea8a706c4c34a16891f84e7b', 'abdull@gmail.com', '2001-02-03', 'Male', '08212113', 'Natar', '12345678', 'VII Abu Bakar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('19121212', 'pablo', '202cb962ac59075b964b07152d234b70', 'pablo@gmail.com', '2001-01-03', 'Male', '0857666', 'natar', '1231', 'VIII Umar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('19223132', 'Naquib Alattas', '202cb962ac59075b964b07152d234b70', 'syed@gmail.com', '2000-02-01', 'Male', '08993484859', 'Metro', '19231', 'VII Abu Bakar', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', ''),
('19224141', 'Abdullah Azzam', '63a9f0ea7bb98050796b649e85481845', 'azzam@gmail.com', '2001-09-09', 'Male', '087738495960', 'Teluk Betung', '09080', 'VIII Umar', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', ''),
('19312131', 'Ichwan Sholihin', 'caf1a3dfb505ffed0d024130f58c5cfa', 'ichwan@gmail.com', '2001-03-04', 'Laki', '087493848445', 'Natar', '1234', 'VIII Umar', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', ''),
('19323030', 'Lia Karimatunnisa', '8d84dd7c18bdcb39fbb17ceeea1218cd', 'lia@gmail.com', '1999-02-04', 'Female', '085687980765', 'Teluk Betung', '3435', 'VII Abu Bakar', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', ''),
('19902345', 'Ujang Abdullah', 'c959810f01adc10791f46e1b3ecab45a', 'ujang@gmail.com', '2000-07-23', 'Male', '082837485678', 'Tanjungpura', '12345', 'VII Abu Bakar', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', ''),
('19992001', 'Ahmad', '202cb962ac59075b964b07152d234b70', 'ahmad@gmail.com', '2001-07-10', 'Male', '082837485678', 'Natar', '1234567', 'VIII Umar', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `rapor`
--
ALTER TABLE `rapor`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
