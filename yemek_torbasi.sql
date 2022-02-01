-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2022 at 12:42 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yemek_torbasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `burger-0001`
--

CREATE TABLE `burger-0001` (
  `id` int(11) NOT NULL,
  `food_name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(4,2) NOT NULL,
  `img` text DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `total_sale` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `burger-0001`
--

INSERT INTO `burger-0001` (`id`, `food_name`, `description`, `price`, `img`, `quantity`, `date`, `total_sale`) VALUES
(1, 'Big King XL', NULL, '35.90', NULL, 97, '2022-01-12 00:13:21', 20000),
(2, 'Whopper', 'Legendary taste!', '36.75', '', 194, '2022-01-12 00:14:00', 35000),
(3, 'Mac and cheese', 'Customers\' favorite!', '32.50', NULL, 139, '2022-01-16 04:57:30', 2336);

-- --------------------------------------------------------

--
-- Table structure for table `patiss-0001`
--

CREATE TABLE `patiss-0001` (
  `id` int(11) NOT NULL,
  `food_name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(4,2) NOT NULL,
  `img` text DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `total_sale` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patiss-0001`
--

INSERT INTO `patiss-0001` (`id`, `food_name`, `description`, `price`, `img`, `quantity`, `date`, `total_sale`) VALUES
(1, 'Sufle', NULL, '15.50', NULL, 199, '2022-01-20 18:19:09', 4096),
(2, 'Künefe', NULL, '26.90', NULL, 223, '2022-01-20 18:19:09', 5674),
(3, 'Donut', 'Çikolatalı, içi krema dolgulu donut', '20.00', NULL, 222, '2022-01-20 18:27:45', 487),
(4, 'Ekler', NULL, '27.00', NULL, 2566, '2022-01-20 18:27:45', 798);

-- --------------------------------------------------------

--
-- Table structure for table `pizza-0001`
--

CREATE TABLE `pizza-0001` (
  `id` int(11) NOT NULL,
  `food_name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(4,2) NOT NULL,
  `img` text DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `total_sale` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pizza-0001`
--

INSERT INTO `pizza-0001` (`id`, `food_name`, `description`, `price`, `img`, `quantity`, `date`, `total_sale`) VALUES
(1, 'Mixed', 'Bol malzemeli', '44.00', NULL, 223, '2022-01-12 01:27:41', 446),
(2, 'Ceasear', NULL, '55.99', NULL, 445, '2022-01-12 01:27:41', 798);

-- --------------------------------------------------------

--
-- Table structure for table `steak-0001`
--

CREATE TABLE `steak-0001` (
  `id` int(11) NOT NULL,
  `food_name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(5,2) NOT NULL,
  `img` text DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `total_sale` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `steak-0001`
--

INSERT INTO `steak-0001` (`id`, `food_name`, `description`, `price`, `img`, `quantity`, `date`, `total_sale`) VALUES
(1, 'Porterhouse Biftek', NULL, '275.00', NULL, 100, '2022-01-20 18:22:38', 241),
(2, 'Steakhouse Burger', NULL, '99.99', NULL, 101, '2022-01-20 18:22:38', 455),
(3, 'Çıtır Kinoalı Somon', NULL, '160.00', NULL, 78, '2022-01-20 18:25:50', 241);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `balance` double(11,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `password`, `balance`, `date`) VALUES
(8, 38794, 'kgndnc', '$2y$10$uPlVDXJ4dFrNhpnQnnoZku7BU8kkQ.5C9TW/2OQfy4mQfe2wXY/0G', 14229.01, '2022-01-30 11:26:16'),
(10, 47526838, 'new_user', '$2y$10$uQy04JGURxo8J27xk8wfhuId4IYKb7dnn9AlEKhjGldYO8KV6B8VK', 200.00, '2022-01-23 06:06:23'),
(11, 1641419457, 'new_user1', '$2y$10$0ZAZFCwWvx2VInQKjWFPQOF8lCbOC.bgwOKrSw3Z862msyq112Nu.', 0.00, '2022-01-30 11:32:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `burger-0001`
--
ALTER TABLE `burger-0001`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patiss-0001`
--
ALTER TABLE `patiss-0001`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pizza-0001`
--
ALTER TABLE `pizza-0001`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `steak-0001`
--
ALTER TABLE `steak-0001`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `date` (`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `burger-0001`
--
ALTER TABLE `burger-0001`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patiss-0001`
--
ALTER TABLE `patiss-0001`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pizza-0001`
--
ALTER TABLE `pizza-0001`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `steak-0001`
--
ALTER TABLE `steak-0001`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
