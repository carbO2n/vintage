-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2024 at 02:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vintage`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `image`, `quantity`) VALUES
(1, '1996 At The Gates Slaughter of the Soul', 100.00, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `method` varchar(55) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` float(7,2) NOT NULL,
  `order_status` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone_number`, `method`, `province`, `city`, `barangay`, `street`, `total_products`, `total_price`, `order_status`, `payment_status`, `order_date`) VALUES
(1, 'jos', '0921', 'cash on delivery', 'albay', 'city', 'oyama', 'p1', 'jos (1) ', 10.00, 1, 1, '2024-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `price` float(7,2) NOT NULL,
  `image` varchar(55) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'a' COMMENT 'a - inactive i - inactive\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `status`) VALUES
(1, '2002 Down', 60.00, '', 'a'),
(2, 'Vintage Bootleg Kurt Cobain', 40.00, '', 'a'),
(3, '2000 Darkthrone Under a Funeral Moon', 40.00, '', 'a'),
(4, '2002 Deftones Def Leppard Inspired Logo', 200.00, '', 'a'),
(5, '2019 Knotfest', 35.00, '', 'a'),
(6, '2003 Exhumed Anatomy is Destiny', 55.00, 'product6.jpg', 'a'),
(7, '2020 Thy Art Is Murder Imminent World Tour', 25.00, '', 'a'),
(8, '1996 At The Gates Slaughter of the Soul', 100.00, '', 'a'),
(9, '2009 Nirvana Bleach', 20.00, '', 'a'),
(10, 'Gorillaz Humanz', 20.00, '', 'a'),
(25, 'jos', 10.00, 'model3.jpg', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `user_type` char(1) NOT NULL DEFAULT 'u' COMMENT 'a - admin\r\nu - user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(0, 'john ', 'johnomarclutario@yahoo.com', '12345678', 'u'),
(0, 'john omar', 'johnomarclutario69@yahoo.com', '1234', 'u'),
(0, 'john omar', 'johnomarclutario420@yahoo.com', '1234', 'u'),
(0, 'simone', 'simone420@gmail.com', '12345678', 'u'),
(0, 'jethroy', 'jethroytamulmol@gmail.com', '1234', 'u'),
(5, 'joshua obstaculo', 'joshuatulaybuhangin@gmail.com', '12345678', 'a'),
(0, 'Dexter Nero', 'dexternero123@gmail.com', 'dexpogi123', 'u'),
(0, 'manuel sapao', 'manuelsapao@gmail.com', 'killer31000', 'u'),
(0, 'john', 'johnomar@gmail.com', '1234', 'u');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
