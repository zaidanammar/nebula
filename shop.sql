-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2024 at 04:50 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `Keterangan` varchar(255) DEFAULT NULL,
  `NamaBarang` varchar(255) DEFAULT NULL,
  `Satuan` varchar(255) DEFAULT NULL,
  `IdPengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `Keterangan`, `NamaBarang`, `Satuan`, `IdPengguna`) VALUES
(1, 'Laptop', 'Laptop SUPER BUSUK', '200', 2),
(2, 'Printer', 'Printer Canon Pixma', '120', 2),
(3, 'Mouse', 'Mouse Logitech', '400', 2),
(4, 'Keyboard', 'Keyboard Mechanical', '500', 2),
(5, 'Monitor', 'Monitor Dell 27\"', '200', 2),
(6, 'Projector', 'Projector Epson', '100', 3),
(7, 'Scanner', 'Scanner HP', '80', 3),
(8, 'UPS', 'UPS APC 400W', '30', 3),
(9, 'Storage', 'External HDD 2TB', '300', 3),
(10, 'Router', 'Router TP-Link', '100', 3),
(11, 'asd', 'asd', '1212', 2),
(12, 'aaa', 'AS', '1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `hakakses`
--

CREATE TABLE `hakakses` (
  `id` int(11) NOT NULL,
  `NamaAkses` varchar(255) DEFAULT NULL,
  `Keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hakakses`
--

INSERT INTO `hakakses` (`id`, `NamaAkses`, `Keterangan`) VALUES
(1, 'Admin', 'Hak akses penuh'),
(2, 'Pengguna Biasa', 'Akses terbatas untuk operasional sehari-hari'),
(3, 'Staf Gudang', 'Akses khusus untuk staf gudang'),
(4, 'Manager', 'Akses manajemen penuh'),
(5, 'Pemasaran', 'Akses khusus untuk tim pemasaran'),
(6, 'asdasd', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `JumlahPembelian` int(11) DEFAULT NULL,
  `HargaBeli` double DEFAULT NULL,
  `IdPengguna` int(11) DEFAULT NULL,
  `IdBarang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `JumlahPembelian`, `HargaBeli`, `IdPengguna`, `IdBarang`) VALUES
(1, 5, 5000000, 2, 1),
(2, 3, 3000000, 2, 2),
(3, 10, 2000000, 3, 6),
(4, 2, 5000000, 2, 3),
(5, 1, 1500000, 4, 8),
(6, 4, 1000000, 3, 7),
(7, 8, 8000000, 3, 9),
(8, 3, 3000000, 2, 4),
(9, 6, 9000000, 4, 10),
(10, 2, 1200000, 5, 5),
(11, 7, 3500000, 3, 1),
(12, 5, 2500000, 2, 7),
(13, 1, 700000, 5, 2),
(14, 3, 1800000, 4, 9),
(15, 4, 4000000, 3, 4),
(16, 2, 800000, 5, 8),
(17, 1, 5000000, 3, 5),
(18, 3, 3000000, 4, 6),
(19, 6, 2400000, 2, 9),
(20, 2, 1600000, 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `NamaPengguna` varchar(255) DEFAULT NULL,
  `Pass` varchar(255) DEFAULT NULL,
  `NamaDepan` varchar(255) DEFAULT NULL,
  `NamaBelakang` varchar(255) DEFAULT NULL,
  `NoHp` varchar(255) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `IdAkses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `NamaPengguna`, `Pass`, `NamaDepan`, `NamaBelakang`, `NoHp`, `Alamat`, `IdAkses`) VALUES
(1, 'admin', 'admin123', 'Admin', '', '', '', 1),
(2, 'user1', 'password1', 'Andi', 'Sunandi', '08234567890', 'Jl. MH Thamrin No. 10', 2),
(3, 'warehouse1', 'warehousepass', 'Junah', 'Marisnah', '08345678901', 'Jl. Surya Sumantri No. 5', 3),
(4, 'manager1', 'managerpass', 'Satriyo', 'Kuncoro', '08456789012', 'Jl. Gatot Subroto No. 15', 4),
(5, 'marketing1', 'marketingpass', 'Asep', 'Surasep', '08567890123', 'Jl. Asia Afrika No. 20', 5),
(6, 'user2', 'password2', 'Ong', 'Pek San', '08678901234', 'Jl. Pahlawan No. 25', 2),
(7, 'warehouse2', 'warehousepass2', 'Salimah', 'Solimah', '08789012345', 'Jl. Merdeka No. 30', 3),
(8, 'manager2', 'managerpass2', 'Dadang', 'Situmorang', '08890123456', 'Jl. Diponegoro No. 35', 4),
(9, 'marketing2', 'marketingpass2', 'Asegar', 'Asegaf', '08901234567', 'Jl. Gajah Mada No. 40', 5),
(10, 'user3', 'password3', 'Amin', 'Bismillah', '08912345678', 'Jl. Raya No. 45', 2),
(12, 'testing', NULL, 'testing', 'testing', 'testing', 'testing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `JumlahPenjualan` int(11) DEFAULT NULL,
  `HargaJual` double DEFAULT NULL,
  `IdPengguna` int(11) DEFAULT NULL,
  `IdBarang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `JumlahPenjualan`, `HargaJual`, `IdPengguna`, `IdBarang`) VALUES
(1, 15, 35000000, 2, 1),
(2, 5, 4000000, 2, 2),
(3, 8, 4000000, 5, 5),
(4, 1, 1500000, 3, 7),
(5, 6, 3000000, 2, 4),
(6, 3, 1500000, 4, 8),
(7, 4, 2000000, 3, 3),
(8, 2, 1000000, 2, 3),
(9, 7, 3500000, 5, 10),
(10, 3, 3000000, 3, 7),
(11, 5, 2500000, 2, 9),
(12, 1, 800000, 3, 1),
(13, 4, 4000000, 2, 4),
(14, 2, 1600000, 3, 4),
(15, 3, 5000000, 2, 5),
(16, 2, 1800000, 4, 6),
(17, 4, 2000000, 5, 8),
(18, 5, 3500000, 3, 2),
(19, 6, 2400000, 2, 9),
(20, 3, 2400000, 5, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IdPengguna` (`IdPengguna`);

--
-- Indexes for table `hakakses`
--
ALTER TABLE `hakakses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IdPengguna` (`IdPengguna`),
  ADD KEY `IdBarang` (`IdBarang`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IdAkses` (`IdAkses`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IdPengguna` (`IdPengguna`),
  ADD KEY `IdBarang` (`IdBarang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hakakses`
--
ALTER TABLE `hakakses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`IdPengguna`) REFERENCES `pengguna` (`id`);

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`IdPengguna`) REFERENCES `pengguna` (`id`),
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`IdBarang`) REFERENCES `barang` (`id`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`IdAkses`) REFERENCES `hakakses` (`id`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`IdPengguna`) REFERENCES `pengguna` (`id`),
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`IdBarang`) REFERENCES `barang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
