-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2024 at 09:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `chackout`
--

CREATE TABLE `chackout` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(34) NOT NULL,
  `country` varchar(50) NOT NULL,
  `postcode` varchar(50) NOT NULL,
  `mobie` varchar(50) NOT NULL,
  `email` varchar(33) NOT NULL,
  `order_note` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `pr_name` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `subtotal` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chackout`
--

INSERT INTO `chackout` (`id`, `first_name`, `last_name`, `company_name`, `address`, `city`, `country`, `postcode`, `mobie`, `email`, `order_note`, `img`, `pr_name`, `price`, `quantity`, `subtotal`) VALUES
(2, 'Uday', 'Lashkari', 'yuytu', 'Sidc road usha malti pak ni exit same', 'Rajkot', 'India', '360024', '8849622313', 'udaylashkari2@gmail.com', 'csdfdw', 'best-product-5.jpg', 'Grapes', 5, 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chackout`
--
ALTER TABLE `chackout`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chackout`
--
ALTER TABLE `chackout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
