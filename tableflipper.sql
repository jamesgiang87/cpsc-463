-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 06, 2019 at 12:08 AM
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
-- Database: `tableflipper`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `FNAME` text NOT NULL,
  `LNAME` text NOT NULL,
  `PHONE` int(10) NOT NULL,
  `EMAIL` varchar(32) NOT NULL,
  `UNAME` text NOT NULL,
  `UPASS` text NOT NULL,
  `ADDR` text NOT NULL,
  `CITY` text NOT NULL,
  `STATE` text NOT NULL,
  `ZIP` varchar(6) NOT NULL,
  `APTNUM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`FNAME`, `LNAME`, `PHONE`, `EMAIL`, `UNAME`, `UPASS`, `ADDR`, `CITY`, `STATE`, `ZIP`, `APTNUM`) VALUES
('customer1', 'customer1', 2147483647, 'customer1@gmail.com', 'customer1', 'customer1', '29 linloln', 'anaheim', 'ca', '92806', 222),
('customer', 'customer', 2147483647, 'customer@gmail.com', 'customer', 'customer', '123 E lincoln', 'fullerton', 'ca', '92807', 123),
('www', 'www', 714, 'www@gmail.com', 'www', 'www', '111', '111', '111', '111', 111);

-- --------------------------------------------------------

--
-- Table structure for table `INVENTORY`
--

CREATE TABLE `INVENTORY` (
  `BARC` int(21) NOT NULL,
  `NUM` varchar(45) NOT NULL,
  `NAME` text NOT NULL,
  `TYPE` varchar(45) NOT NULL,
  `INFO` text NOT NULL,
  `BUYPRICE` float NOT NULL,
  `SELLPRICE` float NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `INVENTORY`
--

INSERT INTO `INVENTORY` (`BARC`, `NUM`, `NAME`, `TYPE`, `INFO`, `BUYPRICE`, `SELLPRICE`, `image`) VALUES
(111, '111', '111', '111', '11', 11, 11, 'iphonex.jpeg'),
(1111111, '222222', 'apple watch', 'watch', '44mm', 100, 300, 'apple-watch.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `username` text NOT NULL,
  `Email` text NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Address` text NOT NULL,
  `Apartment` text NOT NULL,
  `City` text NOT NULL,
  `Country` text NOT NULL,
  `State` text NOT NULL,
  `ZIP` int(11) NOT NULL,
  `CardNumber` int(11) NOT NULL,
  `NameOnCard` text NOT NULL,
  `Expiration` text NOT NULL,
  `Code` int(11) NOT NULL,
  `Total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`username`, `Email`, `FirstName`, `LastName`, `Address`, `Apartment`, `City`, `Country`, `State`, `ZIP`, `CardNumber`, `NameOnCard`, `Expiration`, `Code`, `Total`) VALUES
('customer', '', '', '', '', '', '', '', '', 0, 0, '', '', 0, 604.95),
('customer', '', '', '', '', '', '', '', '', 0, 0, '', '', 0, 304.95);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `SALES_NUM` int(11) NOT NULL,
  `BARCODE` int(20) NOT NULL,
  `PURCHASE_DATE` date NOT NULL,
  `CUSTOMER_EMAIL` text NOT NULL,
  `BUYPRICE` float NOT NULL,
  `INFO` text NOT NULL,
  `MARKPRICE` float NOT NULL,
  `NAME` text NOT NULL,
  `NUM` varchar(45) NOT NULL,
  `SELLPRICE` float NOT NULL,
  `TYPE` varchar(45) NOT NULL,
  `USERNAME` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`SALES_NUM`, `BARCODE`, `PURCHASE_DATE`, `CUSTOMER_EMAIL`, `BUYPRICE`, `INFO`, `MARKPRICE`, `NAME`, `NUM`, `SELLPRICE`, `TYPE`, `USERNAME`) VALUES
(1247176432, 1111111, '2019-05-05', '', 100, '44mm', 0, 'apple watch', '222222', 300, 'watch', 'customer'),
(1155419907, 1111111, '2019-05-05', '', 100, '44mm', 0, 'apple watch', '222222', 300, 'watch', 'customer'),
(1318883590, 1111111, '2019-05-05', '', 100, '44mm', 0, 'apple watch', '222222', 300, 'watch', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `username` text NOT NULL,
  `NAME` text NOT NULL,
  `num` int(11) NOT NULL,
  `PRICE` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `image`, `status`, `last_login`) VALUES
(1, ' Admin User', 'admin', '6c7ca345f63f835cb353ff15bd6c5e052ec08e7a', 1, 'no_image.jpg', 1, '2019-05-05 23:49:35'),
(12346, 'Customer User', 'customer', 'b39f008e318efd2bb988d724a161b61c6909677f', 3, 'no_image.jpg', 1, '2019-05-05 23:54:11'),
(12347, 'Customer User', 'customer1', 'e2ea3c6b50c654e7c809c252b97d94386fb283fc', 3, 'no_image.jpg', 1, '2018-12-09 21:17:08'),
(12348, 'Customer User', 'www', 'c50267b906a652f2142cfab006e215c9f6fdc8a0', 3, 'no_image.jpg', 1, '2018-12-10 20:25:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES
(1, 'Admin', 1, 1),
(2, 'special', 2, 1),
(3, 'User', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`EMAIL`);

--
-- Indexes for table `INVENTORY`
--
ALTER TABLE `INVENTORY`
  ADD PRIMARY KEY (`NUM`),
  ADD UNIQUE KEY `NUM` (`NUM`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `user_level` (`user_level`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_level` (`group_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12349;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
