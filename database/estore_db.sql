-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2021 at 06:26 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estore_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `banner_id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`banner_id`, `title`, `image`, `category_id`, `created_at`, `user_id`) VALUES
(1, 'MSI', 'msi.png', 2, '2021-05-05 01:10:26', 1),
(2, 'DELL', 'dell.png', 2, '2021-05-05 01:10:43', 1),
(3, 'ASUS', 'asus.png', 2, '2021-05-05 01:10:55', 1),
(4, 'ALIENWARE', 'alienware-logo.png', 2, '2021-05-05 01:11:23', 1),
(5, 'HP', 'hp.png', 2, '2021-05-05 01:11:40', 1),
(6, 'APPLE', 'apple-design.png', 2, '2021-05-05 01:11:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `user_id`, `status`, `product_id`, `qty`, `created_at`) VALUES
(1, 5, 1, 1, 1, '2021-05-06 01:38:17'),
(2, 5, 1, 2, 1, '2021-05-06 01:38:24'),
(3, 5, 1, 3, 1, '2021-05-06 01:41:43'),
(4, 5, 1, 1, 1, '2021-05-06 03:42:20'),
(5, 5, 1, 3, 1, '2021-05-06 03:42:32'),
(6, 5, 1, 5, 1, '2021-05-06 04:10:48');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cate_id` int(11) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cate_id`, `category_name`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(2, 'Computer Accessories', 1, '2021-05-04 17:13:47', NULL, 1),
(3, 'Electronics & Appliances', 1, '2021-05-04 17:14:04', NULL, 1),
(4, 'Phone Accessories', 1, '2021-05-04 17:14:21', NULL, 1),
(5, 'Shoes & Bags', 1, '2021-05-04 17:14:36', NULL, 1),
(6, 'Man’s Fashion', 1, '2021-05-04 17:15:00', NULL, 1),
(7, 'Women’s Fashion', 1, '2021-05-04 17:15:11', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NULL DEFAULT NULL,
  `total_amount` decimal(10,0) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `total_amount`, `status`) VALUES
(1, 5, '2021-05-06 03:42:40', '18', 1),
(2, 5, '2021-05-06 04:10:55', '40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_unit_price` decimal(10,0) NOT NULL,
  `amount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `product_qty`, `product_unit_price`, `amount`) VALUES
(1, 1, 1, '10', '10'),
(1, 3, 1, '8', '8'),
(2, 5, 1, '40', '40');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` text NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `qty`, `description`, `category_id`, `status`, `created_at`, `user_id`) VALUES
(1, 'Leisure loose', 'Leisure-loose-two-bars-zipper-1-600x600.jpg', 10, 100, 'New women brand Leisure Loose Two Bars Zipper.\r\n                            ', 7, 1, '2021-05-05 00:22:53', 1),
(2, 'Woolen Short Skirt', 'Mangle-Town-woolen-short-skirt-female-2020-2.jpg', 22, 100, 'Mangle Town Woolen Short Skirt Female 2021.\r\n                            ', 7, 1, '2021-05-05 00:26:30', 1),
(3, 'Bottom Shirt', 'Bottom-shirt-female-2020-2-large.jpg', 8, 100, 'New brand Bottom Shirt Female 2021                         ', 7, 1, '2021-05-05 00:27:44', 1),
(4, 'Linen Short Sleeved', 'Linen-short-sleeved-men-t-shirt-grey.jpg', 27, 100, 'New brand Linen Short-Sleeved Men T-Shirt.\r\n                            ', 6, 1, '2021-05-05 00:30:34', 1),
(5, 'Playboy Plaid Shirt', 'Playboy-plaid-shirt-red.jpg', 40, 100, 'New brand Playboy Plaid Shirt 2021. ', 6, 1, '2021-05-05 00:31:37', 1),
(6, 'Man Long Sleeve Shirts', 'tenhh_shirt-1.jpg', 17, 100, 'New brand Man Long Sleeve Shirts 2021.', 6, 1, '2021-05-05 00:32:42', 1),
(7, '3.5mm Headphone Jack Adapter', 'Adapter-1.jpg', 5, 100, 'Adapter  3.5mm Headphone Jack With Audio And Charger', 4, 1, '2021-05-05 00:36:00', 1),
(8, 'Benmax BMS Car Wireless Charger', 'charger-1.jpg', 12, 100, 'New brand Benmax BMS Car Wireless Charger', 4, 1, '2021-05-05 00:37:12', 1),
(9, 'Mobile Phone Folding Vertical', 'ext1.jpg', 7, 100, 'New brand Mobile Phone Folding Vertical.', 4, 1, '2021-05-05 00:38:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `phone`, `address1`, `address2`) VALUES
(1, 'admin', 'admin@e-store.com', '$2y$10$ouL..l1dq9rPs.08PqCtZOkW.sQ4EvQNevv5oMSEgTdhiZC1nbJ0W', 'admin', '010371018', 'Phonm Penn', '12 Building'),
(5, 'customer', 'customer@gmail.com', '$2y$10$4E1IGvpuQsTxiNbr0LML7uwZgBe6i8hxyGDTLSnBU.B8NZxFJHGy.', 'customer', '078582881', 'Phnom Penh', 'Cambodia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`) USING BTREE;

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
