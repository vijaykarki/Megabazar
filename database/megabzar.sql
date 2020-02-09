-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 25, 2019 at 04:47 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `megabzar`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `category_id` int(11) NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `category_title` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`category_id`, `parent_id`, `category_title`) VALUES
(1, 0, 'Apparels'),
(2, 0, 'Automobiles'),
(3, 0, 'Computer'),
(4, 0, 'Electronics'),
(5, 0, 'Mobile'),
(7, 0, 'Real Estate'),
(8, 2, 'Cars'),
(9, 2, 'Bikes'),
(10, 5, 'Smartphones'),
(11, 5, 'Accessories'),
(12, 0, 'Sports'),
(13, 12, 'Basketball');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `uname` varchar(255) COLLATE utf8_bin NOT NULL,
  `comment` varchar(255) COLLATE utf8_bin NOT NULL,
  `up_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `productid`, `uname`, `comment`, `up_date`) VALUES
(3, 76, 'vijay@vijay.com', 'hi i want to buy it\r\n        ', '2019-08-25 12:26:07'),
(4, 76, 'khatri@khatri.om', 'how down can you go brother\r\n        ', '2019-08-25 12:58:44');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uname` varchar(255) COLLATE utf8_bin NOT NULL,
  `comment` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `prd_image`
--

CREATE TABLE `prd_image` (
  `img_id` int(11) NOT NULL,
  `imgfilename` varchar(255) COLLATE utf8_bin NOT NULL,
  `productid` int(10) UNSIGNED DEFAULT NULL,
  `filelocation` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `prd_image`
--

INSERT INTO `prd_image` (`img_id`, `imgfilename`, `productid`, `filelocation`) VALUES
(37, 'Redmi-7-2-696x435.jpg', 76, './../image/productimg/Redmi-7-2-696x435.jpg'),
(38, '81688.jpg', 77, './../image/productimg/81688.jpg'),
(39, '1190.jpg', 78, './../image/productimg/1190.jpg'),
(40, '2537088.jpg', 79, './../image/productimg/2537088.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) COLLATE utf8_bin NOT NULL,
  `price` double NOT NULL,
  `product_type` varchar(255) COLLATE utf8_bin NOT NULL,
  `condition_prd` varchar(255) COLLATE utf8_bin NOT NULL,
  `category` varchar(255) COLLATE utf8_bin NOT NULL,
  `details` varchar(255) COLLATE utf8_bin NOT NULL,
  `uname` varchar(255) COLLATE utf8_bin NOT NULL,
  `p_address` varchar(255) COLLATE utf8_bin NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `p_status` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'hide',
  `view` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `price`, `product_type`, `condition_prd`, `category`, `details`, `uname`, `p_address`, `upload_date`, `p_status`, `view`) VALUES
(76, 'Dummy Mobile ', 5000, 'normal', 'used', 'Smartphones', '6 Gb ram\r\nRedmi note 4\r\nsnapdragon 855\r\n                ', 'official4aashish@gmail.com', 'Kathmandu', '2019-08-25 12:22:52', 'available', NULL),
(77, 'Apple Phone', 600000, 'featured', 'brand_new', 'Smartphones', 'Iphone 60\r\nno bargain\r\n                ', 'vijay@vijay.com', 'Pokhara', '2019-08-25 12:27:35', 'available', NULL),
(78, 'Cars', 600000000, 'featured', 'used', 'Cars', 'All new cars are available\r\njust visit us\r\n                ', 'khatri@khatri.om', 'Bhaktapur', '2019-08-25 12:32:08', 'available', 60),
(79, 'Laptops', 6000, 'featured', 'brand_new', 'Computer', '\r\n All acessories are available               ', 'khatri@khatri.om', 'Bhaktapur', '2019-08-25 12:36:31', 'sold', 60);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `uname` varchar(255) COLLATE utf8_bin NOT NULL,
  `phone` double DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `type` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `uname`, `phone`, `address`, `password`, `type`) VALUES
(13, 'Aashish Thapa Magar', 'official4aashish@gmail.com', NULL, NULL, '$2y$10$5d3txaXcwwb/u2xvfC4Y9eUhuR02APg5Mmty8oxgXZfDugvz.QWji', 'normal'),
(14, 'vijay Karki', 'vijay@vijay.com', NULL, NULL, '$2y$10$X.GCfH8oHgRIpEoM9A.OHOWMZvjy.CodhQRsvr/TfOh1353Fl.G9G', 'normal'),
(15, 'Arjun Khatri', 'khatri@khatri.om', NULL, NULL, '$2y$10$tuhzy1Xt9Oyfnep8EMWIfOjY94S9AGTDq3Mn.QXQURd3q5JHlaKSG', 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `id` int(10) UNSIGNED NOT NULL,
  `productid` int(11) NOT NULL,
  `product_title` varchar(255) COLLATE utf8_bin NOT NULL,
  `price` int(11) NOT NULL,
  `uname` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`id`, `productid`, `product_title`, `price`, `uname`) VALUES
(43, 76, 'Dummy Mobile ', 5000, 'vijay@vijay.com'),
(44, 77, 'Apple Phone', 600000, 'khatri@khatri.om'),
(45, 79, 'Laptops', 6000, 'khatri@khatri.om');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prd_image`
--
ALTER TABLE `prd_image`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `productid` (`productid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prd_image`
--
ALTER TABLE `prd_image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
