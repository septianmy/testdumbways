-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2020 at 04:51 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sepeda`
--

-- --------------------------------------------------------

--
-- Table structure for table `importir_tb`
--

CREATE TABLE `importir_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `importir_tb`
--

INSERT INTO `importir_tb` (`id`, `name`, `address`, `phone`) VALUES
(1, 'PT. Dumbways Indonesia', 'Jl. Ciputat 1 Tangerang Selatan, Provinsi Banten', '081223464676'),
(2, 'PT. Wimcycle Indonesia', 'Jl. Kebayoran Baru, Jakarta', '081320967467'),
(3, 'PT. Mahendra Jaya', 'Jl. Pasirkaliki Bandung', '0223456789'),
(5, 'PT. Jayamakmur Sepeda', 'Solo, Jawa Tengah', '089191991');

-- --------------------------------------------------------

--
-- Table structure for table `product_tb`
--

CREATE TABLE `product_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `importir_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_tb`
--

INSERT INTO `product_tb` (`id`, `name`, `importir_id`, `photo`, `qty`, `price`) VALUES
(1, 'Brompton Blue', 1, 'images/images-1.jpg', 15, '7000000'),
(2, 'Mountain Bike Blue Wim Cycle', 1, 'images/images-2.jpg', 13, '5000000'),
(3, 'Fixed Gear Custom', 2, 'images/images-3.jpg', 12, '4500000'),
(4, 'BMX Wim Cycle', 2, 'images/images-4.jpg', 20, '2500000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `importir_tb`
--
ALTER TABLE `importir_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_tb`
--
ALTER TABLE `product_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `importir_tb`
--
ALTER TABLE `importir_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_tb`
--
ALTER TABLE `product_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
