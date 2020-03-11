-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 17, 2019 at 04:05 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `username`, `mobile`, `password`) VALUES
(6, 'admin@mail.com', 'admin', '9876543210', '1234'),
(7, 'admin2@mail.com', 'admin2', '9876543210', '1234'),
(8, 'admin3@mail.com', 'admin3', '9876543210', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rating` int(1) NOT NULL,
  `review` varchar(500) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `email`, `rating`, `review`, `ip`, `product_id`, `date_time`) VALUES
(34, 'user@mail.com', 1, 'ee', '::1', 8, ''),
(43, 'user4@mail.com', 2, 'dd', '::1', 4, ''),
(44, 'user3@mail.com', 3, 'd', '::1', 8, ''),
(45, 'user3@mail.com', 3, 'l', '::1', 4, ''),
(46, 'user3@mail.com', 4, 't', '::1', 4, ''),
(49, 'user3@mail.com', 1, 'very big phone', '::1', 9, ''),
(50, 'user3@mail.com', 2, 'cheap build quality', '::1', 9, ''),
(51, 'user3@mail.com', 3, 'too expensive', '::1', 9, ''),
(52, 'user@mail.com', 1, 'best build quality', '::1', 10, ''),
(53, 'user@mail.com', 2, 'price for money', '::1', 10, ''),
(54, 'user5@mail.com', 3, 'i like it', '::1', 6, ''),
(55, 'user5@mail.com', 4, 'old style', '::1', 6, ''),
(56, 'user5@mail.com', 3, '13&#8377;', '192.168.43.1', 10, ''),
(57, 'user5@mail.com', 4, '23&#8377;', '192.168.43.1', 10, ''),
(58, 'user@mail.com', 5, 'w', '::1', 6, '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `image_name` varchar(200) NOT NULL,
  `image_path` varchar(200) NOT NULL,
  `admin_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category`, `image_name`, `image_path`, `admin_email`) VALUES
(4, 'Redmi 6', 8000, 'Mobiles', 'redmi_6.jpeg', '../../images/products/redmi_6.jpeg', 'admin@mail.com'),
(5, 'hp', 38000, 'Laptops', 'laptop.jpg', '../../images/products/laptop.jpg', 'admin@mail.com'),
(6, 'onida', 15000, 'TVs', 'tv.jpeg', '../../images/products/tv.jpeg', 'admin@mail.com'),
(7, 'boat', 3000, 'Headphones', 'headphones.jpg', '../../images/products/headphones.jpg', 'admin@mail.com'),
(8, 'i phone 11 pro max', 109900, 'Mobiles', 'iphone11promax.jpeg', '../../images/products/iphone11promax.jpeg', 'admin@mail.com'),
(9, 'samsung galaxy s 10 plus', 73900, 'Mobiles', 'samsung_s_10_plus.png', '../../images/products/samsung_s_10_plus.png', 'admin2@mail.com'),
(10, 'mi earphone basic', 349, 'Headphones', 'mi_earphone_basic.png', '../../images/products/mi_earphone_basic.png', 'admin3@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `mobile`, `password`) VALUES
(1, 'user@mail.com', 'user', '9876543210', '1234'),
(2, 'user2@mail.com', 'user2', '9876543211', '1234'),
(3, 'user3@mail.com', 'user3', '9876543212', '1234'),
(4, 'user4@mail.com', 'user4', '9876543210', '1234'),
(5, 'user5@mail.com', 'user5', '9876543210', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
