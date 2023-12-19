-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 07:40 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sistem_barcode`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_box`
--

CREATE TABLE `table_box` (
  `id` int(4) NOT NULL,
  `barcode` varchar(20) NOT NULL,
  `quantity_stock` int(4) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_box`
--

INSERT INTO `table_box` (`id`, `barcode`, `quantity_stock`, `last_update`) VALUES
(1, 'BS-9901', 5, '2023-12-17 08:06:23'),
(8, 'BD-02910', 22, '2023-12-17 10:11:46');

-- --------------------------------------------------------

--
-- Table structure for table `table_customer`
--

CREATE TABLE `table_customer` (
  `id` int(4) NOT NULL,
  `nama` varchar(75) NOT NULL,
  `alamat` varchar(75) NOT NULL,
  `no_telepon` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_customer`
--

INSERT INTO `table_customer` (`id`, `nama`, `alamat`, `no_telepon`) VALUES
(1, 'PT. Yamaha Bahana', 'jagabaya selatan', '0292929'),
(4, 'PT. Coba coba', 'jalan margahayu', '020202-22020');

-- --------------------------------------------------------

--
-- Table structure for table `table_info`
--

CREATE TABLE `table_info` (
  `id` int(4) NOT NULL,
  `berita` varchar(200) NOT NULL,
  `started_date` date NOT NULL,
  `ended_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_info`
--

INSERT INTO `table_info` (`id`, `berita`, `started_date`, `ended_date`) VALUES
(5, 'coba lagi', '2023-12-01', '2024-02-01'),
(6, 'PHK 200 orang', '2023-12-25', '2023-12-31'),
(7, 'Keripik Kentang Bisa DIjual', '2023-12-16', '2023-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

CREATE TABLE `table_user` (
  `id` int(4) NOT NULL,
  `nama_lengkap` varchar(75) NOT NULL,
  `username` varchar(75) NOT NULL,
  `no_telepon` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `pass` varchar(75) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `avatar` varchar(20) NOT NULL DEFAULT 'face0.jpg',
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_user`
--

INSERT INTO `table_user` (`id`, `nama_lengkap`, `username`, `no_telepon`, `email`, `pass`, `user_type`, `avatar`, `created_date`) VALUES
(1, 'udin markudin', 'udin', '022-0929292', 'udin@home.com', 'mark22', 'admin', 'face1.jpg', '2023-12-17 03:42:53'),
(17, 'fff', 'fff', '021-020202', 'fff@yahoo.com', 'fff', 'admin', 'face0.jpg', '2023-12-17 16:42:04'),
(18, 'baharuddin markop', 'baharuddin', '0292929', 'baharuddin@yahoo.com', 'baharuddin', 'staff', 'face0.jpg', '2023-12-17 16:11:59'),
(19, 'kokoh saputra sandi', 'kokoh', '929292', 'kokoh@gmail.com', 'kokoh', 'staff', 'face0.jpg', '2023-12-17 18:26:42'),
(20, 'sisila', 'sisila', '0', 'sisila@yahoo.com', 'sisila', 'staff', 'face0.jpg', '2023-12-17 17:16:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_box`
--
ALTER TABLE `table_box`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_customer`
--
ALTER TABLE `table_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_info`
--
ALTER TABLE `table_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_box`
--
ALTER TABLE `table_box`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `table_customer`
--
ALTER TABLE `table_customer`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_info`
--
ALTER TABLE `table_info`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_user`
--
ALTER TABLE `table_user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
