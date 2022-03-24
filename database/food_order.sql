-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2022 at 06:59 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(21, 'Mufutau Roberts', 'vogoxew', '56de48825b002939979921f9ea0c9033'),
(23, 'Byron Joyner', 'nydetyvot', '56de48825b002939979921f9ea0c9033'),
(24, 'Kareem Foster', 'guhuzasewe', '56de48825b002939979921f9ea0c9033'),
(33, 'admin', 'admin', 'c3284d0f94606de1fd2af172aba15bf3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(11, 'Vegetables', 'Food_Category_870.jpg', 'Yes', 'Yes'),
(12, 'Fruits', 'Food_Category_374.jpg', 'Yes', 'Yes'),
(13, 'Fresh Meat', 'Food_Category_747.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

CREATE TABLE `tbl_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(11, 'Big Onions', '', '230.00', 'Item-Name-3512.jpg', 11, 'Yes', 'Yes'),
(12, 'Potatoes', '', '200.00', 'Item-Name-9158.jpg', 11, 'Yes', 'Yes'),
(13, 'Carrot', '', '350.00', 'Item-Name-7898.jpg', 11, 'Yes', 'Yes'),
(14, 'Pumpkin', '', '110.00', 'Item-Name-5773.jpg', 11, 'Yes', 'Yes'),
(15, 'Cabbage', '', '110.00', 'Item-Name-803.jpg', 11, 'Yes', 'Yes'),
(16, 'Beans', '', '310.00', 'Item-Name-1003.jpg', 11, 'Yes', 'Yes'),
(17, 'Brinjal', '', '120.00', 'Item-Name-8734.jpg', 11, 'Yes', 'Yes'),
(18, 'Beetroot', '', '130.00', 'Item-Name-610.jpg', 11, 'Yes', 'Yes'),
(19, 'Chicken full', '', '1090.00', 'Item-Name-5778.jpg', 13, 'Yes', 'Yes'),
(20, 'Chicken wings', '', '720.00', 'Item-Name-9891.jpg', 13, 'Yes', 'Yes'),
(22, 'Pomegranate', '', '790.00', 'Item-Name-9827.jpg', 12, 'Yes', 'Yes'),
(23, 'Avacado', '', '650.00', 'Item-Name-5461.jpg', 12, 'Yes', 'Yes'),
(24, 'Dragon Fruit', '', '790.00', 'Item-Name-1874.jpg', 12, 'Yes', 'Yes'),
(25, 'Papaya Local', '', '210.00', 'Item-Name-9019.jpg', 12, 'Yes', 'Yes'),
(26, 'Banana', '', '120.00', 'Item-Name-8800.jpg', 12, 'Yes', 'Yes'),
(27, 'Orange Local', '', '180.00', 'Item-Name-8763.jpg', 12, 'Yes', 'Yes'),
(28, 'Woodapple', '', '270.00', 'Item-Name-1233.jpg', 12, 'Yes', 'Yes'),
(29, 'King coconut', '', '70.00', 'Item-Name-8577.jpg', 12, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_items`
--
ALTER TABLE `tbl_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
