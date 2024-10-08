-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 04:13 PM
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
-- Database: `e-park`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_phone` varchar(15) NOT NULL,
  `admin_dob` date NOT NULL,
  `admin_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_phone`, `admin_dob`, `admin_password`) VALUES
(1, 'Kabiththanan', 'kabiththanan@gmail.com', '+94761234567', '2003-05-22', 'Kabiththanan0522'),
(2, 'Sobiyan', 'sobiyan@gmail.com', '+95762364349', '2003-04-03', 'Sobiyan0403'),
(3, 'Saran', 'saran@gmail.com', '+97760095348', '2004-01-09', 'Saran0109'),
(4, 'Sinthujan', 'sinthujan@gmail.com', '+98766722690', '2003-08-07', 'Sinthujan0807'),
(5, 'Jathusan', 'jathusan@gmail.com', '+92761232881', '2001-09-21', 'jathushan0921');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact` varchar(15) NOT NULL,
  `DOB` date NOT NULL,
  `NIC` varchar(20) NOT NULL,
  `salary` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `full_name`, `email`, `contact`, `DOB`, `NIC`, `salary`) VALUES
(1, 'Sam Curren', 'sam@gmail.com', '+9478895412', '2000-07-21', '200012345678', 40000.00),
(2, 'Danial Vectory', 'dani001@gmail.com', '+9474995322', '2002-12-29', '200232145876', 21000.00),
(4, 'Jose Buttler', 'buttler@gmail.com', '+9874675320', '2000-10-06', '200024067198', 35000.00),
(5, 'Kane Williams', 'kane@gmail.com', '+9874675328', '2000-06-07', '200024067100', 80000.00);

-- --------------------------------------------------------

--
-- Table structure for table `feedack`
--

CREATE TABLE `feedack` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback_msg` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedack`
--

INSERT INTO `feedack` (`feedback_id`, `user_id`, `feedback_msg`) VALUES
(11, 4, '          I love this system      '),
(12, 1, '      Very user friendly.');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `user_id`, `date_time`) VALUES
(1, 4, '2024-10-02 20:42:32'),
(2, 4, '2024-10-02 20:45:58'),
(3, 4, '2024-10-02 20:46:09'),
(4, 4, '2024-10-03 00:36:26'),
(5, 4, '2024-10-03 08:37:26'),
(7, 4, '2024-10-03 11:53:48'),
(8, 4, '2024-10-03 14:33:00'),
(9, 4, '2024-10-03 14:35:53'),
(10, 1, '2024-10-04 08:35:39'),
(11, 1, '2024-10-04 08:39:37'),
(12, 1, '2024-10-04 08:42:43'),
(13, 1, '2024-10-04 08:43:09'),
(14, 1, '2024-10-04 08:49:25'),
(15, 1, '2024-10-04 08:55:39'),
(19, 1, '2024-10-04 10:06:41'),
(20, 4, '2024-10-04 11:16:29'),
(22, 8, '2024-10-04 17:32:24'),
(23, 4, '2024-10-04 22:19:48'),
(24, 4, '2024-10-04 22:36:17'),
(25, 4, '2024-10-04 23:45:18'),
(26, 4, '2024-10-05 00:23:01'),
(27, 4, '2024-10-05 00:46:01'),
(28, 3, '2024-10-05 01:11:37'),
(29, 4, '2024-10-05 18:14:55'),
(30, 4, '2024-10-05 18:15:15'),
(31, 4, '2024-10-06 10:35:30'),
(32, 4, '2024-10-07 00:20:00'),
(33, 4, '2024-10-07 00:22:35'),
(34, 4, '2024-10-07 00:23:20'),
(35, 4, '2024-10-07 00:28:54'),
(36, 4, '2024-10-07 00:43:47'),
(37, 4, '2024-10-07 01:28:44'),
(38, 4, '2024-10-07 08:19:54'),
(39, 4, '2024-10-07 08:48:01'),
(40, 4, '2024-10-07 08:55:43'),
(41, 4, '2024-10-07 09:25:13'),
(42, 4, '2024-10-07 10:02:20'),
(43, 4, '2024-10-07 10:14:33'),
(44, 4, '2024-10-07 10:30:23'),
(45, 4, '2024-10-07 10:48:59'),
(46, 4, '2024-10-07 11:33:54'),
(47, 12, '2024-10-07 11:56:03'),
(48, 12, '2024-10-07 11:59:05'),
(49, 4, '2024-10-07 12:20:31'),
(50, 4, '2024-10-07 12:24:12'),
(51, 4, '2024-10-07 14:51:32'),
(52, 1, '2024-10-07 19:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `parking_locations`
--

CREATE TABLE `parking_locations` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parking_locations`
--

INSERT INTO `parking_locations` (`location_id`, `location_name`) VALUES
(1, 'Cargills'),
(7, 'Cream Shop'),
(2, 'Hospital'),
(3, 'Library'),
(4, 'Mall'),
(6, 'Railway Station'),
(8, 'Stadium'),
(5, 'Theater');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `invoice_no` varchar(20) NOT NULL,
  `NIC_No` varchar(20) NOT NULL,
  `vechicle_no` varchar(10) NOT NULL,
  `package_id` int(11) NOT NULL,
  `location` varchar(30) NOT NULL,
  `method` varchar(10) NOT NULL,
  `parking_hours` int(11) NOT NULL,
  `total_amount` decimal(50,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `full_name`, `invoice_no`, `NIC_No`, `vechicle_no`, `package_id`, `location`, `method`, `parking_hours`, `total_amount`, `user_id`, `date_time`) VALUES
(1, 'Pooja', '101', '199912340333', 'ka 2204', 1, 'Hospital', 'PayPal', 3, 1497.00, 3, '2024-10-04 09:03:05'),
(13, 'Paran Kabiththanan', '105', '200324010190', 'JA 2009', 2, 'Hospital', 'PayPal', 2, 1598.00, 4, '2024-10-07 10:03:53'),
(25, 'Paran Kabiththanan', '110', '200312340222', 'JA 2009', 1, 'Cargills', 'Bank', 4, 1996.00, 4, '2024-10-07 14:57:58'),
(26, 'Paran Kabiththanan', '111', '200324010190', 'JA 2009', 2, 'University', 'Bank', 10, 7990.00, 4, '2024-10-07 18:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `price_packages`
--

CREATE TABLE `price_packages` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(10) NOT NULL,
  `package_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `price_packages`
--

INSERT INTO `price_packages` (`package_id`, `package_name`, `package_price`) VALUES
(1, 'Basic', 499.00),
(2, 'Pro', 799.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `user_name`, `email`, `password`, `phone`, `DOB`) VALUES
(1, 'Abi', 'Abi_01', 'abi1@gmail.com', 'Abi01234', '+94761237860', '2003-02-11'),
(12, 'Jacky Pandian', 'Jack', 'jackypandi@gmail.com', '1234', '+941236789', '2001-05-03'),
(4, 'Paran Kabiththanan ', 'Kabi', 'kabi@gmail.com', 'Kabi1234', '+94761234592', '2003-05-22'),
(11, 'Kamala Hariss', 'Kamala', 'kamala@gmail.com', '12345678', '+94741187760', '1998-01-02'),
(8, 'Kannan', 'Kanna', 'kanna007@gmail.com', 'Kanna007', '+94761345457', '2004-02-29'),
(3, 'Pooja Raj', 'Pooja', 'pooja@gmail.com', 'Pooja101', '+94754537050', '1999-11-19'),
(9, 'Raja', 'Raj', 'raj@gmail.com', 'raj1234', '+94761234890', '2001-10-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `feedack`
--
ALTER TABLE `feedack`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `USER_ID` (`user_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `fk_users_id` (`user_id`);

--
-- Indexes for table `parking_locations`
--
ALTER TABLE `parking_locations`
  ADD PRIMARY KEY (`location_id`),
  ADD UNIQUE KEY `location_name` (`location_name`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD UNIQUE KEY `invoice_no` (`invoice_no`),
  ADD KEY `package_id` (`package_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `price_packages`
--
ALTER TABLE `price_packages`
  ADD PRIMARY KEY (`package_id`),
  ADD UNIQUE KEY `package_name` (`package_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_name`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedack`
--
ALTER TABLE `feedack`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `parking_locations`
--
ALTER TABLE `parking_locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `price_packages`
--
ALTER TABLE `price_packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedack`
--
ALTER TABLE `feedack`
  ADD CONSTRAINT `feedack_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_users_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `price_packages` (`package_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
