-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 10:10 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`) VALUES
(1, 'Rice'),
(2, 'Viand'),
(3, 'Bread'),
(4, 'Drinks/Beverage'),
(5, 'Desert');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `added_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `phone`, `email`, `added_on`) VALUES
(12, 'aaaaaaaaaaaa', 123123, 'meow@gmail.com', '2023-11-23'),
(13, 'zzzzzzzzzzzzzz', 123123, 'asdfasdkfja@gmail.com', '2003-05-20'),
(14, 'bbbbbbbbbbbbbb', 123123, 'asdfasdkfja@gmail.com', '2003-05-20'),
(16, 'dddddddddddddddd', 123123, 'asdfasdkfja@gmail.com', '2023-11-23'),
(17, 'eeeeeeeeeeeeeee', 123123, 'asdfasdkfja@gmail.com', '2003-05-20'),
(18, 'ffffffffffffff', 123123, 'asdfasdkfja@gmail.com', '2023-11-23'),
(19, 'ggggggggggggggggg', 123123, 'asdfasdkfja@gmail.com', '2003-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productPrice` decimal(10,2) NOT NULL,
  `Quant` int(255) NOT NULL,
  `productImage` varchar(255) DEFAULT 'assets/img/product/default.jpg',
  `productBc` bigint(20) DEFAULT NULL,
  `Category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `productName`, `productPrice`, `Quant`, `productImage`, `productBc`, `Category`) VALUES
(145, 'Water Bottle 350ML', '15.00', 15, 'umpos/uploaded/1702826304_GBE3Ei9W4AA-vtu.jfif', 444949791720, 'drinks'),
(146, 'rizz rice', '10.00', 15, 'umpos/uploaded/1702826371_rice.jpg', 299137308596, 'rice'),
(148, 'pork adowbow', '15.00', 20, 'umpos/uploaded/1702826415_Pork-Adobo-3.jpg', 222079535019, 'viand'),
(149, 'spaniards bread', '5.00', 50, 'umpos/uploaded/1702826440_Spanish_bread_(Señorita_bread)_-_Philippines_05.jpg', 329262857038, 'bread'),
(150, 'float thyy mango', '25.00', 50, 'umpos/uploaded/1702826592_Mango_float_(Crema_de_Mangga)_-_Philippines.jpg', 428635524592, 'desserts');

-- --------------------------------------------------------

--
-- Table structure for table `sreport`
--

CREATE TABLE `sreport` (
  `repid` int(11) NOT NULL,
  `date` date NOT NULL,
  `Rice` int(11) NOT NULL,
  `Viand` int(11) NOT NULL,
  `Bread` int(11) NOT NULL,
  `drink` int(11) NOT NULL,
  `deserts` int(11) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sreport`
--

INSERT INTO `sreport` (`repid`, `date`, `Rice`, `Viand`, `Bread`, `drink`, `deserts`, `Total`) VALUES
(2, '2023-11-01', 10, 35, 10, 25, 40, 0);

-- --------------------------------------------------------

--
-- Table structure for table `temp_prod`
--

CREATE TABLE `temp_prod` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productPrice` decimal(10,2) NOT NULL,
  `Quant` int(255) NOT NULL,
  `productImage` varchar(255) NOT NULL,
  `productBc` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(15, 'admin', '', '$2y$08$2UmUQ2sTc/CZgyWqt.NlDOX4KwFzmtRz9.mZ4isdvMMJuH6jCXE.q');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `sreport`
--
ALTER TABLE `sreport`
  ADD PRIMARY KEY (`repid`);

--
-- Indexes for table `temp_prod`
--
ALTER TABLE `temp_prod`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `sreport`
--
ALTER TABLE `sreport`
  MODIFY `repid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `temp_prod`
--
ALTER TABLE `temp_prod`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
