-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 08:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uaspwl2067`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `npm` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `npm`, `email`, `jurusan`) VALUES
(1, 'Ahmad Badri aja', '202043502067', '25.ahmadbadri@gmail.com', 'Teknik Informatika'),
(2, 'alfinto', '202029459488', 'alfinto@gmai.com', 'DKV'),
(3, 'exel', '20029348239', 'exel@gmail.com', 'Digital Marketing'),
(4, 'raihan', '202039489239283', 'raihan@gmai.com', 'Teknik Industri'),
(6, 'Arief Fadhillah', '202043502067', 'arief@gmail.com', 'Teknik Industri');

-- --------------------------------------------------------

--
-- Table structure for table `table_ag`
--

CREATE TABLE `table_ag` (
  `no_anggota` char(10) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `tgl_bergabung` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_ag`
--

INSERT INTO `table_ag` (`no_anggota`, `nama`, `alamat`, `no_hp`, `tgl_bergabung`) VALUES
('2067', 'ahmad badri', 'kp. sawah', '085155332403', '2023-07-13'),
('2069', 'exel', 'kp. sawah', '085155332343', '2023-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `table_pi`
--

CREATE TABLE `table_pi` (
  `no_pinjaman` char(10) NOT NULL,
  `no_anggota` char(10) NOT NULL,
  `tgl_pinjaman` date NOT NULL,
  `nominal` int(9) NOT NULL,
  `tenor` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_pi`
--

INSERT INTO `table_pi` (`no_pinjaman`, `no_anggota`, `tgl_pinjaman`, `nominal`, `tenor`) VALUES
('PJ00001', '2067', '2023-07-13', 1000, 3),
('PJ00002', '2069', '2023-07-13', 1500000, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_ag`
--
ALTER TABLE `table_ag`
  ADD PRIMARY KEY (`no_anggota`);

--
-- Indexes for table `table_pi`
--
ALTER TABLE `table_pi`
  ADD PRIMARY KEY (`no_pinjaman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
