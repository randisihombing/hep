-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2022 at 05:45 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ediputra`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` varchar(128) NOT NULL,
  `tgl` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jmlh` int(11) NOT NULL,
  `created_by` varchar(128) NOT NULL,
  `created_date` date NOT NULL,
  `modified_by` varchar(128) NOT NULL,
  `modified_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `tgl`, `nama`, `jmlh`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
('b1', '2022-06-29', 'a', 178, 'admin', '2022-06-29', 'admin', '2022-06-29'),
('b10', '2022-06-29', 'j', 178, 'admin', '2022-06-29', 'admin', '2022-06-29'),
('b2', '2022-06-29', 'b', 178, 'admin', '2022-06-29', 'admin', '2022-06-29'),
('b3', '2022-06-29', 'c', 178, 'admin', '2022-06-29', 'admin', '2022-06-29'),
('b4', '2022-06-29', 'd', 178, 'admin', '2022-06-29', 'admin', '2022-06-29'),
('b5', '2022-06-29', 'e', 178, 'admin', '2022-06-29', 'admin', '2022-06-29'),
('b6', '2022-06-29', 'f', 178, 'admin', '2022-06-29', 'admin', '2022-06-29'),
('b7', '2022-06-29', 'g', 178, 'admin', '2022-06-29', 'admin', '2022-06-29'),
('b8', '2022-06-29', 'h', 178, 'admin', '2022-06-29', 'admin', '2022-06-29'),
('b9', '2022-06-29', 'i', 178, 'admin', '2022-06-29', 'admin', '2022-06-29');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` varchar(128) NOT NULL,
  `tgl` date NOT NULL,
  `jenis_produk` varchar(128) NOT NULL,
  `jumlah` varchar(128) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `tgl`, `jenis_produk`, `jumlah`, `status`) VALUES
('10', '2021-01-01', 'minuman', '115', 1),
('11', '2021-01-10', 'minuman', '100', 1),
('12', '2021-02-10', 'minuman', '110', 1),
('123', '2022-06-25', 'makanan', '50', 1),
('13', '2021-02-11', 'minuman', '100', 1),
('14', '2021-03-10', 'minuman', '105', 1),
('15', '2021-03-11', 'minuman', '100', 1),
('16', '2021-04-10', 'minuman', '102', 1),
('17', '2021-04-11', 'minuman', '100', 1),
('18', '2021-05-10', 'minuman', '107', 1),
('19', '2021-05-11', 'minuman', '100', 1),
('20', '2021-06-10', 'minuman', '100', 1),
('21', '2021-06-11', 'minuman', '100', 1),
('22', '2021-07-10', 'minuman', '115', 1),
('23', '2021-07-11', 'minuman', '100', 1),
('24', '2021-08-10', 'minuman', '110', 1),
('25', '2021-08-11', 'minuman', '100', 1),
('26', '2021-09-10', 'minuman', '100', 1),
('27', '2021-09-11', 'minuman', '100', 1),
('28', '2021-10-10', 'minuman', '108', 1),
('29', '2021-10-11', 'minuman', '100', 1),
('30', '2021-11-10', 'minuman', '110', 1),
('31', '2021-11-11', 'minuman', '100', 1),
('32', '2021-12-10', 'minuman', '115', 1),
('321', '2022-01-27', 'minuman', '211', 0),
('33', '2021-12-11', 'minuman', '100', 1),
('333', '2022-02-27', 'minuman', '211', 0),
('34', '2022-01-10', 'minuman', '110', 1),
('35', '2022-01-11', 'minuman', '100', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(128) NOT NULL,
  `tgl` varchar(128) NOT NULL,
  `jenis_produk` varchar(128) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `tgl`, `jenis_produk`, `jumlah`) VALUES
('1', '2022-07-27 13:07:05', 'minuman', 8406),
('12', '2022-06-25 06:27:39', 'makanan', 50);

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id_produksi` varchar(128) NOT NULL,
  `tgl` varchar(128) NOT NULL,
  `jenis_produk` varchar(128) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jumlah1` int(11) NOT NULL,
  `nama2` varchar(128) NOT NULL,
  `jumlah2` int(11) NOT NULL,
  `nama3` varchar(128) NOT NULL,
  `jumlah3` int(11) NOT NULL,
  `nama4` varchar(128) NOT NULL,
  `jumlah4` int(11) NOT NULL,
  `nama5` varchar(128) NOT NULL,
  `jumlah5` int(11) NOT NULL,
  `nama6` varchar(128) NOT NULL,
  `jumlah6` int(11) NOT NULL,
  `nama7` varchar(128) NOT NULL,
  `jumlah7` int(11) NOT NULL,
  `nama8` varchar(128) NOT NULL,
  `jumlah8` int(11) NOT NULL,
  `nama9` varchar(128) NOT NULL,
  `jumlah9` int(11) NOT NULL,
  `nama10` varchar(128) NOT NULL,
  `jumlah10` int(11) NOT NULL,
  `created_by` varchar(128) NOT NULL,
  `created_date` date NOT NULL,
  `modified_by` varchar(128) NOT NULL,
  `modified_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id_produksi`, `tgl`, `jenis_produk`, `jumlah`, `nama`, `jumlah1`, `nama2`, `jumlah2`, `nama3`, `jumlah3`, `nama4`, `jumlah4`, `nama5`, `jumlah5`, `nama6`, `jumlah6`, `nama7`, `jumlah7`, `nama8`, `jumlah8`, `nama9`, `jumlah9`, `nama10`, `jumlah10`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
('tes1', '2022-06-29 17:40:21', 'minuman', 20, 'a', 22, 'j', 22, 'b', 22, 'c', 22, 'd', 22, 'e', 22, 'f', 22, 'g', 22, 'h', 22, 'i', 22, 'admin', '2022-06-29', 'admin', '2022-06-29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `lupa_pass` varchar(255) DEFAULT NULL,
  `nama` varchar(128) NOT NULL,
  `telp` int(11) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `role` varchar(128) NOT NULL,
  `created_by` varchar(128) NOT NULL,
  `created_date` date NOT NULL,
  `modified_by` varchar(128) NOT NULL,
  `modified_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `lupa_pass`, `nama`, `telp`, `alamat`, `role`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', NULL, 'admin', 0, '-', 'admin', '', '0000-00-00', '', '0000-00-00'),
('randi', '1d60f2af9406547984037696d26849232c1c58ed', NULL, 'randi', 123456, 'randi', 'pemilik', 'manajer', '2022-06-10', 'manajer', '2022-06-10'),
('staff', 'fb94e681fe216054e2dc5012a61241d6ae3399f9', NULL, 'staff', 1223, 'bandung', 'Kepala Produksi', 'admin', '2022-07-27', '', '2022-07-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_produksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
