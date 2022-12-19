-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 04:51 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengiriman`
--

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(30) NOT NULL,
  `layanan` varchar(30) NOT NULL,
  `biaya_paket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `layanan`, `biaya_paket`) VALUES
(1, 'JTR', 1000000),
(2, 'OKE', 10000),
(3, 'REGULAR', 20000),
(4, 'CTC', 12000),
(5, 'YES', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(30) NOT NULL,
  `nm_pengirim` varchar(30) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `id_layanan` int(30) NOT NULL,
  `id_tujuan` int(30) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `berat` int(15) NOT NULL,
  `biaya_paket` int(20) NOT NULL,
  `total_biaya` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `nm_pengirim`, `alamat`, `id_layanan`, `id_tujuan`, `tanggal_pengiriman`, `berat`, `biaya_paket`, `total_biaya`) VALUES
(1, 'Iqbal Maftuha', '', 5, 1, '2022-12-17', 3, 15000, 45000),
(2, 'Ahmad Nurdin', '211223', 1, 1, '2022-12-17', 1, 1000000, 1000000),
(3, 'Tiara Natasya', 'Link. Jombang Kali no 3', 2, 4, '2022-12-17', 1, 10000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tujuan`
--

CREATE TABLE `tujuan` (
  `id_tujuan` int(30) NOT NULL,
  `kode_pos` int(5) NOT NULL,
  `tujuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tujuan`
--

INSERT INTO `tujuan` (`id_tujuan`, `kode_pos`, `tujuan`) VALUES
(1, 42411, 'Jombang Wetan, Jombang, Cilegon'),
(2, 42412, 'Panggung Rawi, Jombang, Cilegon'),
(3, 42413, 'Gedong Dalem, Jombang, Cilegon'),
(4, 42414, 'Masigit, Jombang, Cilegon'),
(5, 42415, 'Ciwaduk, Cilegon, Cilegon');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_pengguna` int(30) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `level` enum('User','Operator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_pengguna`, `username`, `password`, `nama`, `alamat`, `no_tlp`, `level`) VALUES
(1, 'arfan@gmail.com', 'd9d0fec758f684f5f9bd7b1f4335d6e6', 'Nur Ali Arfan', 'Link. Jombang Kali No.3 RT02/RT03', '085156190923', 'Operator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `id_layanan` (`id_layanan`),
  ADD KEY `id_tujuan` (`id_tujuan`),
  ADD KEY `biaya_paket` (`biaya_paket`),
  ADD KEY `total_biaya` (`total_biaya`);

--
-- Indexes for table `tujuan`
--
ALTER TABLE `tujuan`
  ADD PRIMARY KEY (`id_tujuan`),
  ADD KEY `tujuan` (`tujuan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `id_tujuan` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_pengguna` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_2` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengiriman_ibfk_3` FOREIGN KEY (`id_tujuan`) REFERENCES `tujuan` (`id_tujuan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
