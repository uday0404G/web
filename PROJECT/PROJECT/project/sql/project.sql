-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2024 at 08:05 AM
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
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `gen` varchar(50) NOT NULL,
  `pas` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `email`, `phone`, `position`, `gen`, `pas`, `name`, `last_name`) VALUES
(15, 'udaylashkari2@gmail.com', 2147483647, 'Manager', 'Male', '121', 'Uday', 'Lashkari'),
(16, 'udaylashkari2@gmail.com', 2147483647, 'owner', 'Male', '123', 'Uday', 'Lashkari');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `price` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `subtotal` varchar(50) NOT NULL,
  `orderid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chackout`
--

INSERT INTO `chackout` (`id`, `first_name`, `last_name`, `company_name`, `address`, `city`, `country`, `postcode`, `mobie`, `email`, `order_note`, `img`, `pr_name`, `price`, `quantity`, `subtotal`, `orderid`) VALUES
(17, 'Uday', 'Lashkari', 'sdddads', 'fe', 'Rajkot', 'India', '360024', '2147483647', 'udaylashkari2@gmail.com', 'df', 'best-product-2.jpg', 'Raspberries', '4.99', 4, '19.96', 14216126);

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `massage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`id`, `name`, `email`, `massage`) VALUES
(1, 'uday', 'vaidik1@gmail.com', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `subtotal` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `image`, `name`, `price`, `quantity`, `subtotal`) VALUES
(1, 'best-product-6.jpg', 'Apple', 5, 1, 0),
(2, 'best-product-6.jpg', 'Apple', 5, 1, 0),
(3, 'b5.jpg', 'Maruti Bread', 5, 1, 0),
(4, 'best-product-5.jpg', 'Grapes', 5, 3, 0),
(5, 'best-product-5.jpg', 'Grapes', 5, 3, 0),
(6, 'vegetable-item-6.jpg', 'Coriander', 5, 6, 0),
(7, 'moondal.webp', 'TATA CHANA DAL	', 5, 3, 0),
(8, 'best-product-5.jpg', 'Grapes', 5, 4, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gen` varchar(50) NOT NULL,
  `pas` varchar(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `name`, `lname`, `email`, `gen`, `pas`, `phone`, `city`, `pincode`, `country`) VALUES
(3, 'Uday', 'Lashkari', 'udaylashkari2@gmail.com', 'Male', '123', 2147483647, 'Rajkot', '360024', 'India');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chackout`
--
ALTER TABLE `chackout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `chackout`
--
ALTER TABLE `chackout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
