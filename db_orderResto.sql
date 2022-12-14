-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2022 at 08:08 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_orderResto`
--
CREATE DATABASE IF NOT EXISTS `db_orderResto` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `db_orderResto`;

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
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `deskripsi` text COLLATE latin1_general_ci NOT NULL,
  `harga` int(10) UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `kategori_id` int(10) UNSIGNED NOT NULL,
  `aktif` varchar(10) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `aktif` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
