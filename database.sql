-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 12:39 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_orderresto`
--
CREATE DATABASE IF NOT EXISTS `db_orderresto` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `db_orderresto`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_hidangan`
--

CREATE TABLE `tb_hidangan` (
  `id` int(10) NOT NULL,
  `menu` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `deskripsi` text COLLATE latin1_general_ci NOT NULL,
  `harga` int(10) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `aktif` enum('Yes','No') COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_hidangan`
--

INSERT INTO `tb_hidangan` (`id`, `menu`, `deskripsi`, `harga`, `id_kategori`, `aktif`) VALUES
(3, 'Bakso', 'Bakso son haji', 17000, 0, 'Yes'),
(4, 'Kwetiaw', 'Kwetiaw goreng', 27000, 0, 'Yes'),
(7, 'Ayam Geprek', 'Geprek 10ribuan', 10000, 0, 'Yes'),
(8, 'pempek', 'hihihaahhh', 12000, 0, 'Yes'),
(9, 'Ayam penyet', 'nani ga ii kamo', 20000, 0, 'Yes'),
(10, 'Mie ayam', 'ghak jak aklo aokopp', 20000, 0, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Yes','No') COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `nama`, `foto`, `aktif`) VALUES
(2, 'Soup', '-', 'Yes'),
(3, 'Dessert', '-', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(10) UNSIGNED NOT NULL,
  `hidangan` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `harga` int(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(10) NOT NULL,
  `tgl_pesanan` datetime NOT NULL,
  `status` enum('dipesan','diperjalanan','terkirim','dibatalkan') COLLATE latin1_general_ci NOT NULL,
  `nama_pelanggan` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `no_meja` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_hidangan`
--
ALTER TABLE `tb_hidangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_hidangan`
--
ALTER TABLE `tb_hidangan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
