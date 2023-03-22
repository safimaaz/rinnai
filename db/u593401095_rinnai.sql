-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 22, 2023 at 04:49 AM
-- Server version: 10.5.17-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u593401095_rinnai`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`) VALUES
(11, 'Heater', 1),
(12, 'Stove', 1),
(13, 'Geyser', 1),
(14, 'Airfryer', 1),
(15, 'Iron & Steamer', 1),
(16, 'Accessories', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(1, 'Vishal', 'vishal@gmail.com', '1234567890', 'Test Query', '2020-01-14 00:00:00'),
(2, 'safi', 'safi@gmail.co', '03111213412', 'testing contact module', '2022-12-30 16:59:26'),
(3, 'safi', 'safi@gmail.co', '03111213412', 'testing contact module', '2022-12-30 17:02:04'),
(4, 'Joseph Joseph', 'free@freeaiwriting.com', '+1 310-620-8162', 'Dear, \r\n\r\nI came across rinnai.com.pk and wanted to share this great free AI tool. \r\n\r\nWith this tool you write blogs and ads 10 times faster and with much higher conversion rates. \r\nYou can use the tool for free via freeaiwriting.com \r\n\r\nThe AI can write blogs, advertising copy, youtube videos and even entire books. \r\nWe would love to hear your feedback. \r\n\r\n\r\nKind regards, \r\nJoseph\r\nFreeaiwriting.com\r\n', '2023-01-17 03:51:21'),
(5, 'Barbera Keller', 'welcome@freeaivids.com', '+1 360-246-431', 'I came across rinnai.com.pk and wanted to share this amazing FREE AI video creator. \r\nThis AI tool will turn any text into a compelling video. \r\n\r\nIncrease your reach\r\nfreeaivids.com automatically adds captions to your videos, quickly, easily and accurately.\r\nNo more expensive outsourcing or wasting hours trying to do it yourself.\r\n\r\n\r\nSincerly,\r\nBarbera Keller\r\n', '2023-02-14 21:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(18) NOT NULL,
  `price` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(60) NOT NULL DEFAULT 'placed',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `id`, `name`, `phone`, `price`, `address`, `status`, `date`) VALUES
(3, 3, 'SHAHERYAR AHMED JILLANI', '03333773663', 9000, 'Allahabad Road, Westridge-3, Rawalpindi Cantt', 'delivered', '2023-01-21 23:16:09'),
(4, 0, 'Ihsanullah ', '03002266551', 11000, 'House Number 6, Street-7, Peshawar', 'delivered', '2023-02-28 17:04:28');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `opid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pcategory` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `oid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`opid`, `pid`, `pname`, `pcategory`, `qty`, `price`, `oid`) VALUES
(11, 9, 'Rinnai 3in1 Gas Stove', 'Stove', 1, 9000, 3),
(12, 10, 'Rinnai 3in1 Gas Stove', 'Stove', 1, 11000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `pname`, `description`, `price`, `category`, `img`, `qty`) VALUES
(9, 'Rinnai 3in1 Gas Stove', 'no desc', 9000, 'Stove', 'Untitled.1png.png', 2),
(10, 'Rinnai 3in1 Gas Stove', 'no desc', 11000, 'Stove', 'Untitled.1png-removebg-preview.png', 11),
(11, 'Japanese Safe Pressure Cooker', 'no desc', 7000, 'Iron & Steamer', '_MG_8372_copy_-_Copy-removebg-preview.png', 12),
(12, 'Rinnai Instant Gas Water Geyser', 'not required', 12000, 'Geyser', '_MG_8390_copy-removebg-preview (1).png', 12),
(13, 'pipe for stove & heaters', 'pipe for stove & heaters', 450, 'Accessories', '_MG_8384_copy-removebg-preview.png', 34),
(14, 'Steam Station', 'no desc availble', 6500, 'Iron & Steamer', '_MG_8635_copy-removebg-preview.png', 22);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp(),
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `mobile`, `added_on`, `address`) VALUES
(1, 'Vishal Gupta', '', 'vishal@gmail.com', '1234567890', '2020-01-14 00:00:00', ''),
(2, 'safiullah', '1234', 'safiullahmaaz@gmail.com', '03232424324', '2022-12-29 13:20:44', 'gujar kahn'),
(3, 'SHAHERYAR AHMED JILLANI', '12345', 'gerryscommunique@gmail.com', '+923333773663', '2023-01-21 23:14:59', 'C-1, Steel Town'),
(4, 'Sami Ur Rehman', 'Rehman@123', 'sbangash61@gmail.com', '03351954903', '2023-02-02 04:15:00', 'wahdat road'),
(5, 'Sami Ur Rehman', 'rinnaidotcom', 'sbangash@gmail.com', '03351954903', '2023-02-02 06:49:35', 'c-1, Steel Town, Karachi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`opid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `opid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
