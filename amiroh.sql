-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2023 at 09:19 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amiroh`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` varchar(50) NOT NULL,
  `stok` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `deskripsi`, `harga`, `stok`) VALUES
(1, 'Kacamata Hardian', 'kacamata dewasa', '50000', 180),
(3, 'Armani Exchange', 'Kacamata Dewasa', '50000', 10),
(4, 'Baleno', 'Kacamata Anak-Anak', '40000', 79),
(5, 'Bottega Veneta', 'Kacamata Dewasa', '50000', 85),
(6, 'Oliver Peoples', 'Kacamata Dewasa', '200000', 91),
(7, 'Gucci', 'Kacamata Dewasa', '300000', 100),
(8, 'Police', 'Kacamata Dewasa', '500000', 100),
(9, 'Tom Ford', 'Kacamata Dewasa', '500000', 100),
(10, 'Dolce & Gabbana', 'Kacamata Dewasa', '600000', 100),
(12, ' Bridges Eyewear', 'Kacamata Dewasa', '350000', 100),
(13, 'Polaroid ', 'Kacamata Dewasa', '800000', 100),
(14, 'hardi123', 'kacamata hardi', '50000', 100),
(15, 'hardi123', 'kacamata hardi', '50000', 100),
(16, 'hardi123', 'kacamata hardi', '50000', 100),
(17, 'hardi123', 'kacamata hardi', '50000', 100),
(18, 'irul123', 'kacamata irul', '100000', 100),
(19, 'irul123', 'kacamata irul', '100000', 500),
(20, 'irul123', 'kacamata irul', '550000', 100),
(21, 'irul123', 'kacamata irul', '550000', 100),
(24, 'hardi123', 'kacamata hardi', '2', 2),
(25, 'hardi12', 'kacamata hardi', '123000', 100),
(26, 'Baleno', 'kacamata dewasa', '50000', 100),
(27, 'Baleno', 'kacamata dewasa', '50000', 100),
(28, 'Baleno', 'kacamata dewasa', '50000', 100),
(29, 'Baleno', 'kacamata dewasa', '50000', 100),
(30, 'Baleno', 'kacamata dewasa', '50000', 100),
(31, 'Baleno', 'kacamata dewasa', '40000', 84),
(32, 'Baleno', 'Kacamata Anak-Anak', '40000', 84),
(33, 'Baleno', 'Kacamata Anak-Anak', '40000', 84),
(34, 'Baleno', 'Kacamata Anak-Anak', '40000', 84),
(35, 'Baleno', 'Kacamata Anak-Anak', '40000', 84),
(36, 'Baleno', 'Kacamata Anak-Anak', '40000', 84),
(37, 'Baleno', 'Kacamata Anak-Anak', '40000', 84),
(38, 'Baleno', 'Kacamata Anak-Anak', '40000', 84),
(40, 'Baleno', 'Kacamata Anak-Anak', '40000', 84),
(41, 'Baleno', 'Kacamata Anak-Anak', '40000', 84),
(42, 'Baleno', 'Kacamata Anak-Anak', '40000', 84),
(43, 'Baleno', 'Kacamata Anak-Anak', '40000', 84),
(46, 'Premium Hardi', 'Kacamata Dewasa', '50000', 100),
(47, 'Premium Hardi', 'Kacamata Dewasa', '50000', 100),
(48, 'Premium Hardi', 'Kacamata Dewasa', '50000', 100),
(49, 'Premium Hardi', 'Kacamata Dewasa', '50000', 100),
(50, 'Premium Hardian', 'Kacamata Dewasa', '50000', 100);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(20) NOT NULL,
  `id_barang` int(20) NOT NULL,
  `harga_satuan` int(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(20) NOT NULL,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `id_barang`, `harga_satuan`, `qty`, `total`, `id_transaksi`) VALUES
(39, 4, 40000, 3, 120000, 19),
(90, 3, 50000, 2, 100000, 34),
(92, 3, 50000, 3, 150000, 34),
(93, 3, 50000, 3, 150000, 34),
(94, 3, 50000, 3, 150000, 34);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `nama`, `alamat`, `tanggal`) VALUES
(19, 'Hardi', 'Jalan', '2023-04-12'),
(20, 'Hardi', 'Jalan', '2023-04-12'),
(21, 'Hardi', 'Jalan', '2023-04-12'),
(22, 'Hardi', 'Jalan', '2023-04-12'),
(24, 'Hardi', 'Jalan', '2023-04-12'),
(25, 'Hardi', 'Jalan', '2023-04-12'),
(29, 'edy suranta', 'jakarta', '2023-04-15'),
(30, 'edy suranta', 'jakarta', '2023-04-14'),
(31, 'Jamal', 'Bojong Gede', '2023-04-17'),
(32, 'Jamal Bahri', 'Bojong Gede', '2023-04-18'),
(33, 'edy suranta', 'Buaran', '2023-04-18'),
(34, 'Edy Suranta', 'Buaran\n', '2023-04-19'),
(35, 'Achmad Hardian Fadhilla', 'Cakung Jakarta Timur', '2023-04-19'),
(36, 'Achmad Hardian Fadhilla', 'Cakung Jakarta Timur', '2023-04-19'),
(37, 'Achmad Hardian Fadhilla', 'Cakung Jakarta Timur', '2023-04-19'),
(38, 'Achmad Hardian Fadhilla', 'Cakung Jakarta Timur', '2023-04-19'),
(39, 'Achmad Hardian Fadhilla', 'Cakung Jakarta Timur', '2023-04-19'),
(40, 'Achmad Hardian Fadhilla', 'Cakung Jakarta Timur', '2023-04-19'),
(41, 'Achmad Hardian Fadhilla', 'Cakung Jakarta Timur', '2023-04-19'),
(42, 'Achmad Hardian Fadhilla', 'Cakung Jakarta Timur', '2023-04-19'),
(46, 'Achmad Hardian Fadhilla', 'Cakung Jakarta Timur', '2023-04-19'),
(47, 'edy suranta', 'cakung', '2023-04-19'),
(48, 'edy suranta', 'cakung', '2023-04-19'),
(49, 'edy suranta', 'cakung', '2023-04-19'),
(50, 'edy suranta', 'va', '2023-04-19'),
(51, 'edy suranta', 'va', '2023-04-19'),
(52, 'edy suranta', 'va', '2023-04-19'),
(53, 'edy suranta', 'va', '2023-04-19'),
(54, 'edy suranta', 'va', '2023-04-19'),
(55, 'edy suranta', 'va', '2023-04-19'),
(56, 'edy suranta', 'va', '2023-04-19'),
(57, 'edy suranta', 'va', '2023-04-19'),
(58, 'edy suranta', 'v', '2023-04-19'),
(59, 'edy suranta', 'v', '2023-04-19'),
(60, 'edy suranta', 'v', '2023-04-19'),
(61, 'edy suranta', 'v', '2023-04-19'),
(62, 'edy suranta', 'v', '2023-04-19'),
(63, 'edy suranta', 'v', '2023-04-19'),
(64, 'edy suranta', 'cakung', '2023-04-19'),
(65, 'edy suranta', 'cakung', '2023-04-19'),
(66, 'edy suranta', 'cakung', '2023-04-19'),
(67, 'edy suranta', 'cakung', '2023-04-19'),
(68, 'edy suranta', 'cakung', '2023-04-19'),
(69, 'edy suranta', 'cakung', '2023-04-19'),
(70, 'edy suranta', 'cakung', '2023-04-19'),
(71, 'edy suranta', 'cakung', '2023-04-19'),
(72, 'edy suranta', '2', '2023-04-19'),
(73, 'edy suranta', '2', '2023-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `alamat`, `level`) VALUES
(1, 'irul123', '$2a$12$wcxAX8XO859m1qG2EQJVWu.DUDbiHIYkH2idqal7ZbKba2cZS8nuS', 'jakarta', 'admin'),
(6, 'juan123', '$2y$10$4UICBFpPpDUKHa0Wd5BQ9e1s4b/TnCTHqLXyvXoX19KR2J6vk98WS', 'jalan', 'kabag');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign` (`id_transaksi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `foreign` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
