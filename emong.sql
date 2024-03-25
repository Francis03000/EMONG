-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 04:55 AM
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
-- Database: `emong`
--

-- --------------------------------------------------------

--
-- Table structure for table `denomination`
--

CREATE TABLE `denomination` (
  `denomination_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `onek` int(11) NOT NULL,
  `fiveh` int(11) NOT NULL,
  `twoh` int(11) NOT NULL,
  `oneh` int(11) NOT NULL,
  `fiftyp` int(11) NOT NULL,
  `twentyp` int(11) NOT NULL,
  `tenp` int(11) NOT NULL,
  `fivep` int(11) NOT NULL,
  `onep` int(11) NOT NULL,
  `denomination_total` int(11) NOT NULL,
  `denomination_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `denomination`
--

INSERT INTO `denomination` (`denomination_id`, `sales_id`, `onek`, `fiveh`, `twoh`, `oneh`, `fiftyp`, `twentyp`, `tenp`, `fivep`, `onep`, `denomination_total`, `denomination_created_at`) VALUES
(14, 28, 5, 1, 2, 0, 1, 0, 0, 0, 0, 5950, '2024-03-25 03:17:26'),
(15, 29, 5, 1, 2, 0, 1, 0, 0, 0, 0, 5950, '2024-03-25 03:18:16'),
(16, 30, 5, 1, 1, 1, 1, 0, 1, 1, 0, 5865, '2024-03-25 03:35:00'),
(17, 31, 5, 1, 1, 1, 1, 0, 1, 1, 0, 5865, '2024-03-25 03:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `item_per_plantsa` int(11) NOT NULL,
  `product_price` double NOT NULL,
  `date_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `item_per_plantsa`, `product_price`, `date_created_at`) VALUES
(1, 'PLAIN', 24, 5, '2024-03-22 15:01:53'),
(6, 'SPANISH', 12, 10, '2024-03-22 16:55:12'),
(7, 'CHEESE', 15, 10, '2024-03-22 17:19:39'),
(16, 'PAN DE COCO', 8, 10, '2024-03-25 02:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `total_plantsa` int(11) NOT NULL,
  `bo` int(11) NOT NULL,
  `gas` int(11) NOT NULL,
  `sales_total` int(11) NOT NULL,
  `rider_commission` int(11) NOT NULL,
  `owner_commission` int(11) NOT NULL,
  `subTotal` int(11) NOT NULL,
  `sales_date_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `product_id`, `total_plantsa`, `bo`, `gas`, `sales_total`, `rider_commission`, `owner_commission`, `subTotal`, `sales_date_created_at`) VALUES
(28, 1, 50, 10, 200, 5950, 476, 416, 5057, '2024-03-25 03:17:26'),
(29, 1, 50, 10, 200, 5950, 476, 416, 4858, '2024-03-25 03:18:16'),
(30, 1, 50, 27, 0, 5865, 469, 411, 4985, '2024-03-25 03:35:00'),
(31, 1, 50, 27, 200, 5865, 469, 411, 4785, '2024-03-25 03:38:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `denomination`
--
ALTER TABLE `denomination`
  ADD PRIMARY KEY (`denomination_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `denomination`
--
ALTER TABLE `denomination`
  MODIFY `denomination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
