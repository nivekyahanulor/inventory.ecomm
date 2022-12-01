-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 12:09 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daniela`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `cart_qty` int(11) NOT NULL,
  `cart_stock_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart_uniqid` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `item_id`, `cart_qty`, `cart_stock_id`, `user_id`, `cart_uniqid`) VALUES
(15, 3, 2, 8, 1, '637dac826e166'),
(16, 3, 2, 8, 1, '637dac826e166');

-- --------------------------------------------------------

--
-- Table structure for table `expired`
--

CREATE TABLE `expired` (
  `exp_id` int(11) NOT NULL,
  `exp_itemName` varchar(50) NOT NULL,
  `exp_itemPrice` float NOT NULL,
  `exp_itemQty` int(11) NOT NULL,
  `exp_expiredDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expired`
--

INSERT INTO `expired` (`exp_id`, `exp_itemName`, `exp_itemPrice`, `exp_itemQty`, `exp_expiredDate`) VALUES
(1, 'haha', 5.6, 7, '2017-08-18'),
(2, 'haha', 5.6, 12, '2017-03-23'),
(3, 'sipons', 3.5, 3, '2017-03-31'),
(4, '111', 7.5, 34, '2017-04-14'),
(5, '111', 7.5, 13, '2017-04-21'),
(6, 'haha', 5.6, 23, '2017-04-12'),
(7, 'sipons', 3.5, 123, '2017-04-08'),
(8, '111', 7.5, 123, '2017-04-08'),
(9, '111', 7.5, 23, '2017-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_price` double NOT NULL,
  `item_type_id` int(11) NOT NULL,
  `item_code` varchar(35) NOT NULL,
  `item_brand` varchar(50) NOT NULL,
  `item_grams` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_price`, `item_type_id`, `item_code`, `item_brand`, `item_grams`) VALUES
(1, 'sipons', 3.5, 1, '131313', 'Brand Ni Siya', '500ml'),
(2, 'haha', 5.6, 2, '12321', '12321321', '1232213'),
(3, '111', 7.5, 1, '111', '111', '11');

-- --------------------------------------------------------

--
-- Table structure for table `item_type`
--

CREATE TABLE `item_type` (
  `item_type_id` int(11) NOT NULL,
  `item_type_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_type`
--

INSERT INTO `item_type` (`item_type_id`, `item_type_desc`) VALUES
(1, 'Tablet'),
(2, 'Syrup'),
(3, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `item_code` varchar(35) NOT NULL,
  `generic_name` varchar(35) NOT NULL,
  `brand` varchar(35) NOT NULL,
  `gram` varchar(35) NOT NULL,
  `type` varchar(35) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `date_sold` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sales_track` varchar(50) NOT NULL,
  `sales_mop` varchar(50) NOT NULL,
  `sales_status` int(11) NOT NULL,
  `sales_user_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `item_code`, `generic_name`, `brand`, `gram`, `type`, `qty`, `price`, `date_sold`, `sales_track`, `sales_mop`, `sales_status`, `sales_user_id`) VALUES
(5, '12321', '', '', '', '', 5, 0, '2022-11-24 11:06:35', '11-24-12-06-35-464', 'Pick', 0, 'user3'),
(6, '131313', '', '', '', '', 1, 0, '2022-11-24 11:06:35', '11-24-12-06-35-464', 'Pick', 0, 'user3'),
(7, '111', '', '', '', '', 6, 0, '2022-11-24 11:07:26', '11-24-12-07-26-177', 'COD', 0, 'user2'),
(8, '12321', '', '', '', '', 2, 0, '2022-11-24 11:07:26', '11-24-12-07-26-177', 'COD', 0, 'user2');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `stock_qty` int(11) NOT NULL,
  `stock_expiry` date NOT NULL,
  `stock_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stock_manufactured` date NOT NULL,
  `stock_purchased` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `item_id`, `stock_qty`, `stock_expiry`, `stock_added`, `stock_manufactured`, `stock_purchased`) VALUES
(7, 3, 0, '2017-04-22', '2022-11-23 05:23:26', '2017-04-20', '2017-04-14'),
(8, 3, 11, '2022-12-10', '2022-11-23 06:14:57', '2022-12-10', '2022-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(13, 'test@test', 'test@test', 'test@test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(1, 'liptint', 'Food_Category_267.png', 'Yes', 'Yes'),
(2, 'eyeliner', 'Food_Category_502.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_checkout`
--

CREATE TABLE `tbl_checkout` (
  `check_id` int(11) NOT NULL,
  `check_item_id` int(11) NOT NULL,
  `check_unique_id` varchar(250) NOT NULL,
  `check_name` varchar(30) NOT NULL,
  `check_address` varchar(250) NOT NULL,
  `check_phone` varchar(20) NOT NULL,
  `check_email` varchar(20) NOT NULL,
  `check_qty` int(11) NOT NULL,
  `check_date` datetime NOT NULL DEFAULT current_timestamp(),
  `check_status` int(11) NOT NULL,
  `check_reason` varchar(250) NOT NULL,
  `check_mode` varchar(20) NOT NULL,
  `check_senior` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_checkout`
--

INSERT INTO `tbl_checkout` (`check_id`, `check_item_id`, `check_unique_id`, `check_name`, `check_address`, `check_phone`, `check_email`, `check_qty`, `check_date`, `check_status`, `check_reason`, `check_mode`, `check_senior`) VALUES
(1, 1, 'teasdasd-11-01-08-45-35-224', 'teasdasd', 'asdasdasd', '123123123', 'aasd@qwad', 5, '2022-11-01 15:45:35', 4, 'sssssssssssssssssssss', 'Gcash', 1),
(2, 2, 'teasdasd-11-01-08-45-35-224', 'teasdasd', 'asdasdasd', '123123123', 'aasd@qwad', 10, '2022-11-01 15:45:35', 4, 'sssssssssssssssssssss', 'Gcash', 1),
(3, 2, 'bartolotester-11-01-11-50-07-789', 'bartolotester', 'bartolotester address', 'asdasd', 'bartolotester@bartol', 3, '2022-11-01 18:50:07', 1, '', 'Gcash', 1),
(4, 3, 'asdas-11-02-16-45-11-909', 'asdas', 'asdasd', 'dasd', 'asda@asd', 11, '2022-11-02 23:45:11', 0, '', 'Gcash', 1),
(5, 4, 'z9Hj5R0Qz9-11-23-10-15-17-313', 'z9Hj5R0Qz9', 'WO3Eo3oFPb', '5729640450', 'rv119@z0e7.com', 2, '2022-11-23 17:15:17', 0, '', 'Gcash', 1),
(6, 4, '-11-23-10-54-01-717', '', '', '', '', 3, '2022-11-23 17:54:01', 0, '', 'Gcash', 0),
(7, 3, '-11-23-10-54-01-717', '', '', '', '', 1, '2022-11-23 17:54:01', 0, '', 'Gcash', 0),
(8, 1, '-11-23-10-54-01-717', '', '', '', '', 1, '2022-11-23 17:54:01', 0, '', 'Gcash', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `nutrition` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`, `quantity`, `nutrition`) VALUES
(3, 'asdasd', 'asdasd', '123.00', 'Item-Name-493.jpg', 2, 'Yes', 'Yes', 123, 'asdasd'),
(4, 'asdas', 'dasdasd', '123.00', 'Item-Name-433.jpg', 1, 'Yes', 'Yes', 123, 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(20) NOT NULL,
  `bday` date NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `password`, `fname`, `mname`, `lname`, `address`, `email`, `bday`, `gender`) VALUES
(1, 'test@test', 'test@test', '', '', '', '', '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_account` varchar(50) NOT NULL,
  `user_pass` varchar(35) NOT NULL,
  `user_type` int(11) NOT NULL,
  `verify` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_account`, `user_pass`, `user_type`, `verify`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 0),
(2, 'admin2', '21232f297a57a5a743894a0e4a801fc3', 1, 0),
(3, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 0, 1),
(4, 'user2', '21232f297a57a5a743894a0e4a801fc3', 0, 1),
(5, 'user3', '21232f297a57a5a743894a0e4a801fc3', 0, 0),
(6, 'user4', '21232f297a57a5a743894a0e4a801fc3', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `veify_id` int(11) NOT NULL,
  `verify_user` varchar(250) NOT NULL,
  `verify_img1` varchar(250) NOT NULL,
  `verify_img2` varchar(250) NOT NULL,
  `verify_img3` varchar(250) NOT NULL,
  `verify_pending1` int(11) NOT NULL,
  `verify_pending2` int(11) NOT NULL,
  `verify_pending3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`veify_id`, `verify_user`, `verify_img1`, `verify_img2`, `verify_img3`, `verify_pending1`, `verify_pending2`, `verify_pending3`) VALUES
(30, 'user2', 'User_Verification_5032.png', 'User_Verification_1344.png', 'User_Verification_7961.png', 1, 1, 1),
(31, 'user4', 'User_Verification_6001.png', 'User_Verification_8099.jpg', 'User_Verification_5635.jpg', 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `expired`
--
ALTER TABLE `expired`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `item_code` (`item_code`),
  ADD KEY `item_type_id` (`item_type_id`);

--
-- Indexes for table `item_type`
--
ALTER TABLE `item_type`
  ADD PRIMARY KEY (`item_type_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  ADD PRIMARY KEY (`check_id`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_account` (`user_account`);

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`veify_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `expired`
--
ALTER TABLE `expired`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item_type`
--
ALTER TABLE `item_type`
  MODIFY `item_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  MODIFY `check_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `veify_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`item_type_id`) REFERENCES `item_type` (`item_type_id`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
