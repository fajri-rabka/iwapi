-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2022 at 03:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_iwapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id` int(11) NOT NULL,
  `kode_brng` varchar(255) NOT NULL,
  `nm_brng` varchar(255) NOT NULL,
  `jenis_brng` varchar(255) NOT NULL,
  `harga` decimal(19,2) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id`, `kode_brng`, `nm_brng`, `jenis_brng`, `harga`, `gambar`, `is_delete`) VALUES
(1, '1491613618', 'Kursi Kantor', 'Peralatan Sekolah', '45000.00', '../assets/img/barang/3.png', 0),
(2, '2030881412', 'Buku', 'Peralatan Kantor', '3000.00', '../assets/img/barang/2.png', 0),
(3, '1857031204', 'Pensil', 'Peralatan Kantor', '2000.00', '../assets/img/barang/1.png', 0),
(4, '163364285', 'Meja', 'Peralatan Kantor', '250000.00', '../assets/img/barang/4.png', 0),
(5, '2126548961', 'Kursi Kantor', 'Peralatan Sekolah', '89000.00', '../assets/img/barang/3.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keranjang`
--

CREATE TABLE `tbl_keranjang` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_brng` int(11) NOT NULL,
  `pcs` decimal(19,2) NOT NULL,
  `harga` decimal(19,2) NOT NULL,
  `total` decimal(19,2) NOT NULL,
  `no_order` varchar(255) NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_keranjang`
--

INSERT INTO `tbl_keranjang` (`id`, `id_user`, `id_brng`, `pcs`, `harga`, `total`, `no_order`, `is_delete`) VALUES
(1, 2, 1, '1.00', '0.00', '0.00', '', 1),
(2, 2, 4, '20.00', '250000.00', '5000000.00', '416557910', 0),
(3, 2, 1, '120.00', '45000.00', '5400000.00', '1962862168', 0),
(4, 2, 1, '20.00', '45000.00', '900000.00', '1399145186', 0),
(5, 2, 4, '30.00', '250000.00', '7500000.00', '1399145186', 0),
(6, 2, 2, '20.00', '3000.00', '60000.00', '1399145186', 0),
(7, 11, 1, '1.00', '45000.00', '45000.00', '1862369278', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id` int(11) NOT NULL,
  `no_order` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total` decimal(19,2) NOT NULL,
  `sts` varchar(255) NOT NULL,
  `tgl` date NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id`, `no_order`, `id_user`, `total`, `sts`, `tgl`, `is_delete`) VALUES
(1, '416557910', 2, '5000000.00', 'DITOLAK', '2022-07-03', 1),
(2, '1962862168', 2, '5400000.00', 'BATAL', '2022-07-03', 0),
(3, '1399145186', 2, '8460000.00', 'BATAL', '2022-07-03', 0),
(4, '1862369278', 11, '45000.00', 'BERJALAN', '2022-07-23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nm_user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nm_user`, `email`, `alamat`, `password`, `level`, `is_delete`) VALUES
(1, 'admin', 'admin', '', '21232f297a57a5a743894a0e4a801fc3', 1, 0),
(2, 'poltak', 'poltak@mail.com', '', '08a4415e9d594ff960030b921d42b91e', 2, 0),
(7, 'brilian', 'brilian@mail.com', '', '08a4415e9d594ff960030b921d42b91e', 1, 1),
(8, 'iwazaki', 'iwazaki@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055', 2, 0),
(11, 'ee', 'ee@gmail.com', 'jl. ee', '08a4415e9d594ff960030b921d42b91e', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
