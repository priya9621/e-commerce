-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2025 at 11:34 AM
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
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`, `profile_pic`, `created_at`, `updated_at`) VALUES
(1, 'Priya', 'Mishra', 'priyaumishra121@gmail.com', 785412365, '$2a$12$CSoOnah9d4IfVBC61UBl4uKKImlftT4PCDmbZ/0fmx9adLj8F0YTu', 'product', '2024-12-10 08:50:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) UNSIGNED NOT NULL,
  `fk_product_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `fk_product_id`, `fk_user_id`, `qty`, `cost`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 8, 9989.00, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) UNSIGNED NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_image` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `cat_image`, `created_at`, `updated_at`) VALUES
(1, 'Headphone', '1733821064_1aeb906fd2be42d33a61.jpg', '0000-00-00 00:00:00', NULL),
(2, 'Suitcase ', '1733821694_8fa5caf6f0831d6b5c65.jpg', '0000-00-00 00:00:00', NULL),
(3, 'Watch', '1733821741_f92655e37e2ae9ba212b.jpg', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-04-28-115248', 'App\\Database\\Migrations\\Users', 'default', 'App', 1733820127, 1),
(2, '2024-05-03-024633', 'App\\Database\\Migrations\\Category', 'default', 'App', 1733820127, 1),
(3, '2024-05-03-030638', 'App\\Database\\Migrations\\Product', 'default', 'App', 1733820127, 1),
(4, '2024-05-03-050258', 'App\\Database\\Migrations\\Cart', 'default', 'App', 1733820127, 1),
(5, '2024-05-03-051232', 'App\\Database\\Migrations\\Order', 'default', 'App', 1733820127, 1),
(6, '2024-05-03-052707', 'App\\Database\\Migrations\\OrderItems', 'default', 'App', 1733820127, 1),
(7, '2024-05-03-053538', 'App\\Database\\Migrations\\Admin', 'default', 'App', 1733820127, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(255) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `order_amount` decimal(10,0) NOT NULL,
  `order_date` datetime NOT NULL,
  `fk_userid` int(11) NOT NULL,
  `order_status` enum('Accepted','Pending','out_for_delivery','Rejected') NOT NULL DEFAULT 'Pending',
  `order_type` enum('Online','COD') NOT NULL DEFAULT 'COD',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(255) UNSIGNED NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `items_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `items_qty` int(11) NOT NULL,
  `fk_orderid` int(11) DEFAULT NULL,
  `order_date` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(255) UNSIGNED NOT NULL,
  `product_name` varchar(10) NOT NULL,
  `product_des` text DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `MRP` decimal(10,0) NOT NULL DEFAULT 0,
  `selling_price` decimal(10,0) NOT NULL DEFAULT 0,
  `image` text NOT NULL,
  `fk_catid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_des`, `qty`, `MRP`, `selling_price`, `image`, `fk_catid`, `created_at`, `updated_at`) VALUES
(1, 'Small Cabi', '<p>Meet your perfect travel companion with the Safari Eclipse trolley bag. Ideal for work trips and holidays, this stylish suitcase is made from 100% Polypropylene, ensuring it is lightweight and durable. Stand out with its robust, high-quality design and 4 smooth-rolling wheels for effortless 360-degree maneuverability. With two compartments for organized packing, this versatile bag is perfect for both men and women. Travel with ease and style with the Safari Eclipse.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Effortless Spin Wheels</strong></p>\r\n\r\n<p>Enjoy smooth 360&deg; rotation, allowing you to maneuver effortlessly through any terrain. Navigate crowded airports and narrow aisles with ease and precision.</p>\r\n', 1, 6666, 2550, '4831.jpg', 2, '2024-12-10 09:13:07', NULL),
(2, 'SONY WH-CH', '<p><strong>Product Description</strong></p>\r\n\r\n<p>Noise Cancelling Headphone</p>\r\n\r\n<p>This noise cancelling headphone from Sony uses Dual Noise Sensor Technology and Integrated Processor V1 to provide immersive sound quality.</p>\r\n\r\n<p>Lightweight Design</p>\r\n\r\n<p>This headphone is designed to give comfort to your ears. It has a slim and lightweight headband that makes it easy on your ears as you indulge in your favourite music.</p>\r\n', 1, 14999, 9989, '5.jpg', 1, '2024-12-10 09:16:02', NULL),
(3, 'Purple Cer', '<p>Water Resistant</p>\r\n\r\n<p>Yes</p>\r\n\r\n<p>Display Type</p>\r\n\r\n<p>Analog</p>\r\n\r\n<p>Style Code</p>\r\n\r\n<p>NQ95061WD03</p>\r\n\r\n<p>Series</p>\r\n\r\n<p>Purple Ceramic Upg</p>\r\n\r\n<p>Occasion</p>\r\n\r\n<p>Casual</p>\r\n\r\n<p>Watch Type</p>\r\n\r\n<p>Wrist Watch</p>\r\n\r\n<p>Pack of</p>\r\n\r\n<p>1</p>\r\n\r\n<p>Sales Package</p>\r\n\r\n<p>Watch/Pillow/Warranty Card/Instruction manual</p>\r\n\r\n<p>Model Name</p>\r\n\r\n<p>NQ95061WD03</p>\r\n\r\n<p>Strap Color</p>\r\n\r\n<p>Multicolor</p>\r\n\r\n<p>Net Quantity</p>\r\n\r\n<p>1</p>\r\n\r\n<p>Case/Bezel Material</p>\r\n\r\n<p>Stainless Steel</p>\r\n\r\n<p>Water Resistance Depth</p>\r\n\r\n<p>50</p>\r\n\r\n<p>Power Source</p>\r\n\r\n<p>Battery</p>\r\n\r\n<p>Dial Color</p>\r\n\r\n<p>Black</p>\r\n\r\n<p>Thickness</p>\r\n\r\n<p>39 mm</p>\r\n\r\n<p>Warranty Service Type</p>\r\n\r\n<p>Call Titan Toll free no 1800 266 0123</p>\r\n\r\n<p>Warranty Period</p>\r\n\r\n<p>2 Years</p>\r\n\r\n<p>This is daily workwear made for women with ceramic starp and this watch gives you stylish look on your hand.</p>\r\n\r\n<p>Manufacturing, Packaging and Import Info</p>\r\n', 1, 9959, 5555, '3.jpg', 3, '2024-12-10 09:21:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(250) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `image` text DEFAULT NULL,
  `password` text NOT NULL,
  `mobile` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `image`, `password`, `mobile`, `created_at`, `updated_at`) VALUES
(1, 'ecommerce', 'ecommerce121@gmail.com', NULL, '$2a$12$tMTHrlq8ouY5uKzx.B4qqe8vVP5bc1ZVVmzeUhJK6sScGJq0KMaGq', 2147483647, '0000-00-00 00:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(250) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
