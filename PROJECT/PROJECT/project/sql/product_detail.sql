-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2024 at 06:34 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `id` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `nameid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`id`, `img`, `name`, `price`, `nameid`) VALUES
(1, 'best-product-5.jpg', 'Grapes', '4.99', 'fruit'),
(23, 'best-product-2.jpg', 'Raspberries', '4.99', 'fruit'),
(24, 'best-product-4.jpg', 'Apricots', '4.99', 'fruit'),
(25, 'best-product-3.jpg', 'Banana', '4.99', 'fruit'),
(26, 'best-product-1.jpg', 'Oranges', '4.99', 'fruit'),
(27, 'best-product-6.jpg', 'Apple', '4.99', 'fruit'),
(34, 'b2.jpg', 'Normal Bread', '4.99', 'bread'),
(35, 'b3.jpg', 'vaidik joshi ', '4.99', 'bread'),
(38, 'b4.jpg', 'sandwich breads 400g', '4.99', 'bread'),
(39, 'b5.jpg', 'Maruti Bread', '4.99', 'bread'),
(40, 'b1.jpg', 'Whole Wheat Toast', '4.99', 'bread'),
(41, 'featur-3.jpg', 'vagges', '4.99', 'vagi'),
(42, 'vegetable-item-1.jpg', 'TOMATO', '4.99', 'vagi'),
(43, 'vegetable-item-4.jpg', 'Red Chilli', '4.99', 'vagi'),
(44, 'vegetable-item-6.jpg', 'Coriander', '4.99', 'vagi'),
(45, 'vegetable-item-5.jpg', 'POTATO', '4.99', 'vagi'),
(46, 'chanadal.jpg', 'TATA CHANA DAL', '4.99', 'dal'),
(47, 'moondal.webp', 'TATA MONG DAL', '4.99', 'dal'),
(48, 'daltadka.jpg', 'TATA DAL TADKA', '4.99', 'dal'),
(49, 'dalmakhani.avif', 'TATA DAL MAKHANI', '4.99', 'dal'),
(50, 'toordal.webp', 'TATA TOOR DAL', '4.99', 'dal'),
(51, 'udad dal.webp', 'TATA UDAD DAL', '4.99', 'dal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
