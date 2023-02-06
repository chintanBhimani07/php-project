-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2023 at 01:58 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-master`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` text NOT NULL,
  `emp_first_name` varchar(100) NOT NULL,
  `emp_last_name` varchar(100) NOT NULL,
  `emp_description` text DEFAULT NULL,
  `emp_gender` varchar(10) NOT NULL,
  `emp_dob` date NOT NULL,
  `emp_mob` int(20) NOT NULL,
  `emp_email` varchar(100) NOT NULL,
  `emp_address` text DEFAULT NULL,
  `emp_department` varchar(100) NOT NULL,
  `emp_designation` varchar(100) NOT NULL DEFAULT 'Junior Assistant',
  `emp_hod_name` varchar(100) NOT NULL,
  `emp_joining_date` date NOT NULL DEFAULT current_timestamp(),
  `emp_confirmation_date` date DEFAULT NULL,
  `emp_leaving_date` date DEFAULT NULL,
  `emp_working_hours` time NOT NULL,
  `emp_profile_pic` varchar(100) NOT NULL DEFAULT 'default_user.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `emp_first_name`, `emp_last_name`, `emp_description`, `emp_gender`, `emp_dob`, `emp_mob`, `emp_email`, `emp_address`, `emp_department`, `emp_designation`, `emp_hod_name`, `emp_joining_date`, `emp_confirmation_date`, `emp_leaving_date`, `emp_working_hours`, `emp_profile_pic`) VALUES
('0', '0', '0', NULL, '0', '0000-00-00', 0, '0', NULL, '0', '0', '0', '0000-00-00', NULL, NULL, '00:00:00', '0'),
('ce05a805-e24b-4487-ab4f-ee60bcc2bc56', 'Testing', 'User', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Female', '2023-02-06', 2147483647, 'test@gmail.com', 't has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Female', 'Other', 'Chintan Bhimani', '2023-02-06', '2023-02-06', '0000-00-00', '10:00:00', '1675681740_Final Print Files.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` text NOT NULL,
  `user_first_name` varchar(100) DEFAULT NULL,
  `user_last_name` varchar(100) DEFAULT NULL,
  `user_email` text NOT NULL,
  `user_password` text NOT NULL,
  `user_profile_pic` varchar(100) NOT NULL,
  `user_access_type` int(10) NOT NULL DEFAULT 2 COMMENT '1: Admin\r\n2: Employee\r\n3: Engineer\r\n4: HOD',
  `employee_id` text NOT NULL,
  `data_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`(255));

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`(255));
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
