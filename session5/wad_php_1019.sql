-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 14, 2019 at 07:40 PM
-- Server version: 5.7.27-0ubuntu0.16.04.1
-- PHP Version: 7.2.22-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wad_php_1019`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_category_id` int(10) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `image` varchar(255) NOT NULL DEFAULT 'product_image_default.png',
  `price` double DEFAULT NULL,
  `discount` float NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_category_id`, `title`, `description`, `image`, `price`, `discount`, `created`, `updated`) VALUES
(3, NULL, 'Sản phẩm chất', 'mo ta 1111', 'myimage.jpg', 1240, 0, '2019-10-09 21:00:00', '2019-10-09 21:00:00'),
(5, NULL, 'Đánh bại nhà cái 333333', NULL, 'product_image_default.png', NULL, 0, NULL, NULL),
(6, NULL, 'Đánh bại nhà cái 768567567', NULL, 'product_image_default.png', NULL, 0, NULL, NULL),
(7, NULL, 'Đánh bại nhà cái', NULL, 'product_image_default.png', NULL, 0, NULL, NULL),
(9, NULL, 'test edit', NULL, 'product_image_default.png', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
