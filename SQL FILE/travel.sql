-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2024 at 05:50 PM
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
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminname` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminname`, `password`) VALUES
('admin', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingid` int(20) NOT NULL,
  `userid` int(20) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `packagename` varchar(30) NOT NULL,
  `person` int(10) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `bookingdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingid`, `userid`, `fullname`, `email`, `phone`, `packagename`, `person`, `amount`, `bookingdate`) VALUES
(1, 7, 'Harshil Sathvara', 'harshil77@gmail.com', '9104980589', 'Taj Mahal, Agra', 2, '3999', '2024-04-19 03:59:54'),
(3, 2, 'Rami Aryan', 'rami12@gmail.com', '9104980589', 'Taj Mahal, Agra', 7, '3999', '2024-04-21 07:58:16'),
(4, 2, 'Rami Aryan', 'rami12@gmail.com', '9667856781', 'Goa', 10, '7999', '2024-04-21 07:59:16'),
(5, 2, 'Rami Aryan', 'rami12@gmail.com', '9104980589', 'Taj Mahal, Agra', 6, '3999', '2024-04-21 09:40:44'),
(6, 1, 'Yash A. Prajapati', 'rami12@gmail.com', '9427377875', 'Ladakh', 7, '8999', '2024-04-21 10:10:54'),
(7, 2, 'Rami Aryan', 'rami12@gmail.com', '9104980589', 'Mysore, Karnataka', 4, '7999', '2024-04-28 03:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `cancel_booking`
--

CREATE TABLE `cancel_booking` (
  `id` int(30) NOT NULL,
  `userid` int(30) NOT NULL,
  `total_amount` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cancel_booking`
--

INSERT INTO `cancel_booking` (`id`, `userid`, `total_amount`) VALUES
(19, 7, 17998),
(20, 7, 6999),
(21, 7, 8999),
(22, 7, 71991),
(23, 2, 5998);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(10) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `full_name`, `username`, `email`, `subject`, `message`) VALUES
(1, 'Rami Aryan', 'Aryan', 'rami12@gmail.com', 'For Transportation', 'This Is Test'),
(2, 'Jay Patel', 'Jay007', 'jay12@gmail.com', 'For Rooms', 'This Second  Test'),
(3, 'Nixeet Prajapati', 'Nixeet07', 'Nixeet12@gmail.com', 'Test', 'This Is Test'),
(4, 'Matt Merdock', 'matto6', 'Matt06@gmail.com', 'Test', 'This Is Test'),
(5, 'Montu Deora', 'montu008', 'Montu12@gmail.com', 'Test', 'This Is Test');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `username`, `email`, `message`) VALUES
(1, 'admin', 'yash12@gmail.com', 'HII'),
(2, 'yash007', 'yash12@gmail.com', 'Best Experience With Traveller Thank You'),
(3, 'Aryan', 'rami12@gmail.com', 'this is test'),
(4, 'Aryan', 'rami12@gmail.com', 'this is test'),
(5, 'Aryan', 'Mahi23@gmail.com', 'hii\r\n'),
(6, 'Aryan19@', 'rami12@gmail.com', 'hiii'),
(7, 'Harshil07', 'harshil77@gmail.com', 'Best Travel Booking Website.');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(30) NOT NULL,
  `userid` int(30) NOT NULL,
  `packagename` varchar(50) NOT NULL,
  `totalamount` int(20) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(40) NOT NULL,
  `pincode` int(10) NOT NULL,
  `paymentdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `cardholdername` varchar(50) NOT NULL,
  `cardnumber` varchar(40) NOT NULL,
  `exp_month` varchar(20) NOT NULL,
  `exp_year` varchar(10) NOT NULL,
  `cvv` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `userid`, `packagename`, `totalamount`, `city`, `state`, `pincode`, `paymentdate`, `cardholdername`, `cardnumber`, `exp_month`, `exp_year`, `cvv`) VALUES
(1, 7, 'Taj Mahal, Agra', 7998, 'Gozaria', 'Gujrat', 382830, '2024-04-19 04:00:24', 'Mr Harshil S Sathvara', '3346754544', 'May', '2040', '3456'),
(2, 2, 'Jaipur', 5998, 'Gozaria', 'Gujrat', 382845, '2024-04-21 07:07:38', 'Mr Aryan Rami', '5667875435', 'May', '2045', '8976'),
(3, 2, 'Taj Mahal, Agra', 27993, 'Kadi', 'Gujrat', 382830, '2024-04-21 07:58:47', 'Mr Aryan Rami', '2345674456', 'May', '2040', '2345'),
(4, 2, 'Goa', 79990, 'Kadi', 'Gujrat', 382830, '2024-04-21 07:59:50', 'Mr Aryan Rami', '2345677890', 'June', '2040', '7890'),
(5, 2, 'Taj Mahal, Agra', 23994, 'Kadi', 'Gujrat', 382845, '2024-04-21 09:41:14', 'Mr Aryan Rami', '78765456567', 'June', '2040', '3456'),
(6, 1, 'Ladakh', 62993, 'Mansa', 'Gujrat', 382845, '2024-04-21 10:11:27', 'Yash Prajapati', '567896543', 'May', '2030', '3456'),
(7, 2, 'Mysore, Karnataka', 31996, 'Kadi', 'Gujrat', 382845, '2024-04-28 03:51:28', 'Mr Aryan Rami', '9887654322', 'May', '2080', '4567');

-- --------------------------------------------------------

--
-- Table structure for table `tourpackage`
--

CREATE TABLE `tourpackage` (
  `packageid` int(10) NOT NULL,
  `packagename` varchar(30) NOT NULL,
  `packprice` varchar(20) NOT NULL,
  `pic1` varchar(150) NOT NULL,
  `pic2` varchar(150) NOT NULL,
  `detail` varchar(150) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tourpackage`
--

INSERT INTO `tourpackage` (`packageid`, `packagename`, `packprice`, `pic1`, `pic2`, `detail`, `startdate`, `enddate`) VALUES
(19, 'Taj Mahal, Agra', '3999', '../admin/uploads/pic1_66214eb309b1e.jpg', '../admin/uploads/pic2_66214eb309ec0.jpg', '3 Day:\r\nTaj Mahal in Agra, India.', '2024-05-10', '2024-05-12'),
(20, 'Jaipur', '2999', '../admin/uploads/pic1_661e421f6d3b9.jpg', '../admin/uploads/pic2_661e421f6d809.jpg', '3 Day:Jaipur,Rajasthan,India.', '2024-06-01', '2024-06-03'),
(21, 'Goa', '7999', '../admin/uploads/Goa (1).jpg', '../admin/uploads/Goa2 (1).jpg', '5 Day:Best Places In Goa,India', '2024-06-06', '2024-06-11'),
(22, 'Ladakh', '8999', '../admin/uploads/destination-2.jpg', '../admin/uploads/destination-3.jpg', '7 Day: Amazing Places In Ladakh,India', '2024-07-11', '2024-08-17'),
(23, 'Mysore, Karnataka', '7999', '../admin/uploads/pic1_661abee252589.jpg', '../admin/uploads/pic2_661abee2529c7.jpg', '7 Day:Karnataka,India', '2024-09-10', '2024-09-17');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `firstname`, `lastname`, `phone`, `email`, `address`) VALUES
(1, 'yash007', '123456', 'Yash', 'Prajapati', '9104980589', 'yash23@gmail.com', 'Itadara,Near Manasa'),
(2, 'Aryan19@', '123456', 'Aryan', 'Rami', '9427377875', 'rami12@gmail.com', '2,Nidhi Banglow,HighWay Road'),
(3, 'Taxil', '123456', 'Taxil', 'Prajapati', '9777756781', 'taxil2004@gmail.com', '2,Nidhi Banglow,HighWay Road'),
(4, 'Sahil6419', '123456', 'Sahil', 'Raval', '8899667732', 'sahil12@gmail.com', 'Kherva,Mhesana'),
(5, 'Janmjay08', '123456', 'Janmjay', 'Thakur', '9423377875', 'jamm23@gmail.com', '3,Swastik Bungalow,Kadi'),
(6, 'Montu08', '123456', 'Bhagyoday', 'Deora', '9164987589', 'Montu12@gmail.com', 'Hanuman Chock,Gozariya'),
(7, 'Harshil07', '123456', 'Harshil', 'Sathvara', '9345656781', 'harshil77@gmail.com', 'Tower Chock,Near Busstand,Goza');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminname`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingid`);

--
-- Indexes for table `cancel_booking`
--
ALTER TABLE `cancel_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tourpackage`
--
ALTER TABLE `tourpackage`
  ADD PRIMARY KEY (`packageid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cancel_booking`
--
ALTER TABLE `cancel_booking`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tourpackage`
--
ALTER TABLE `tourpackage`
  MODIFY `packageid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
