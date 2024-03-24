-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2024 at 12:26 PM
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
  `denomination_total` float NOT NULL,
  `denomination_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `denomination`
--

INSERT INTO `denomination` (`denomination_id`, `sales_id`, `onek`, `fiveh`, `twoh`, `oneh`, `fiftyp`, `twentyp`, `tenp`, `fivep`, `onep`, `denomination_total`, `denomination_created_at`) VALUES
(3, 17, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1200, '2024-03-24 07:47:12'),
(4, 18, 0, 0, 1, 0, 0, 0, 0, 0, 0, 200, '2024-03-24 07:47:33');

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
(1, 'REGULAR', 10, 10, '2024-03-22 15:01:53'),
(6, 'SPANISH', 12, 10, '2024-03-22 16:55:12'),
(7, 'JUMBO', 15, 10, '2024-03-22 17:19:39');

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
  `sales_total` float NOT NULL,
  `rider_commission` float NOT NULL,
  `owner_commission` float NOT NULL,
  `subTotal` float NOT NULL,
  `sales_date_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `product_id`, `total_plantsa`, `bo`, `gas`, `sales_total`, `rider_commission`, `owner_commission`, `subTotal`, `sales_date_created_at`) VALUES
(17, 1, 12, 0, 0, 1200, 96, 84, 180, '2024-03-24 07:47:12'),
(18, 1, 2, 0, 0, 200, 16, 14, 30, '2024-03-24 07:47:33');

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
  MODIFY `denomination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
