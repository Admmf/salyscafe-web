-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 02:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salyscafedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `phone_num` bigint(15) NOT NULL,
  `password` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `staff_name`, `phone_num`, `password`) VALUES
('mmfirdaus@gmail.com', 'Mohammad Firdaus Bin Mohd Marzuki', 60192225444, 12345);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(20) NOT NULL,
  `price` int(15) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `price`, `description`, `image`) VALUES
(1, 'Lamb Chop', 18, 'Succulent and tender, our lamb chop is expertly selected from the finest cuts of premium lamb, ensuring exceptional quality and flavor.', 'uploads/menu-img-01.jpg'),
(2, 'Chicken Chop', 10, 'Made from the finest cuts of tender, juicy chicken, our chicken chop is a perfect blend of flavor and satisfaction.', 'uploads/menu-img-02.jpg'),
(3, 'Chicken Grill', 18, 'Our grilled chicken is crafted using premium cuts of tender, succulent chicken, ensuring a juicy and satisfying dining experience.', 'uploads/menu-img-03.jpg'),
(4, 'Fish and Chip', 10, 'Made with the finest, flaky white fish and perfectly crispy golden chips, our fish and chips will tantalize your taste buds and leave you craving for more.', 'uploads/menu-img-04.jpg'),
(5, 'Beef Steak', 18, 'Made from the finest cuts of prime beef, our steak is a true indulgence for meat lovers.', 'uploads/menu-img-05.jpg'),
(6, 'Wedges', 5, 'Our wedges are crafted from premium potatoes, perfectly seasoned and cooked to crispy perfection.', 'uploads/menu-img-06.jpg'),
(7, 'French Fries', 5, 'Made from carefully selected potatoes and expertly cooked to perfection, our fries are the ultimate side dish that will delight your taste buds.', 'uploads/menu-img-07.jpg'),
(8, 'Curly Fries', 5, 'Made from premium potatoes and expertly seasoned, our curly fries offer a unique and delightful dining experience.', 'uploads/menu-img-08.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_`
--

CREATE TABLE `order_` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `total_order` double NOT NULL,
  `reciept_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0,
  `payment_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_menu`
--

CREATE TABLE `order_menu` (
  `order_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `receipt_id` int(100) NOT NULL,
  `receipt_date` date NOT NULL,
  `table_no` int(10) NOT NULL,
  `total_amount` int(50) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `order_`
--
ALTER TABLE `order_`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_menu`
--
ALTER TABLE `order_menu`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receipt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_`
--
ALTER TABLE `order_`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_menu`
--
ALTER TABLE `order_menu`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `receipt_id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
