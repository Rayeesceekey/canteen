-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2016 at 09:09 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `canteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_table`
--

CREATE TABLE `food_table` (
  `foodid` int(11) NOT NULL,
  `foodname` varchar(20) NOT NULL,
  `foodprice` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_table`
--

INSERT INTO `food_table` (`foodid`, `foodname`, `foodprice`) VALUES
(5, 'chappathi', 30),
(8, 'nonveg biriyani', 100),
(3, 'pizza', 200),
(4, 'burger', 120),
(6, 'noodles', 90),
(7, 'veg biriyani', 80),
(9, 'fried rice', 90),
(10, 'omlet', 20),
(11, 'black tea', 10),
(12, 'nonveg platter for 2', 220);

-- --------------------------------------------------------

--
-- Table structure for table `menu_food_table`
--

CREATE TABLE `menu_food_table` (
  `menufoodmid` varchar(20) NOT NULL,
  `menufoodfid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_food_table`
--

INSERT INTO `menu_food_table` (`menufoodmid`, `menufoodfid`) VALUES
('Indian', 5),
('Indian', 8),
('Indian', 7),
('Indian', 9),
('Indian', 10),
('Indian', 11),
('Indian', 12),
('Chineese', 6),
('Chineese', 9),
('american', 3),
('american', 4),
('american', 10),
('non veg items', 8),
('non veg items', 4),
('non veg items', 10),
('non veg items', 12),
('veg items', 5),
('veg items', 3),
('veg items', 6),
('veg items', 7),
('veg items', 9);

-- --------------------------------------------------------

--
-- Table structure for table `menu_table`
--

CREATE TABLE `menu_table` (
  `menuid` varchar(20) NOT NULL,
  `menustatus` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_table`
--

INSERT INTO `menu_table` (`menuid`, `menustatus`) VALUES
('Indian', 'available'),
('Chineese', 'available'),
('american', 'available'),
('non veg items', 'available'),
('veg items', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `order_food_table`
--

CREATE TABLE `order_food_table` (
  `orderfoodoid` int(11) NOT NULL,
  `orderfoodfid` int(11) NOT NULL,
  `orderfoodfcount` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_food_table`
--

INSERT INTO `order_food_table` (`orderfoodoid`, `orderfoodfid`, `orderfoodfcount`) VALUES
(1, 5, 3),
(1, 8, 1),
(1, 7, 1),
(1, 10, 2),
(1, 11, 3),
(2, 3, 3),
(3, 3, 2),
(3, 6, 4),
(3, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `orderid` int(11) NOT NULL,
  `orderuid` int(11) NOT NULL,
  `orderstatus` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`orderid`, `orderuid`, `orderstatus`) VALUES
(3, 2, 'ORDER_PROCESSED'),
(2, 2, 'ORDER_PLACED'),
(1, 2, 'ORDER_PROCESSING');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `userid` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `userpassword` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`userid`, `usertype`, `userpassword`) VALUES
(1, 'admin', '5y5@dmin'),
(2, 'cust', '5y5@dmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_table`
--
ALTER TABLE `food_table`
  ADD PRIMARY KEY (`foodid`);

--
-- Indexes for table `menu_table`
--
ALTER TABLE `menu_table`
  ADD PRIMARY KEY (`menuid`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_table`
--
ALTER TABLE `food_table`
  MODIFY `foodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
