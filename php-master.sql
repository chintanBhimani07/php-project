-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2023 at 06:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` text NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `department_hod` varchar(100) DEFAULT NULL,
  `department_employees` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `department_hod`, `department_employees`, `created_at`) VALUES
('584968cf-636d-4b79-9816-2f5a972e6160', 'IT', 'Chintan Bhimani', 4, '2023-02-17 16:53:10'),
('5d47fdb5-e221-4957-8405-feaf708f3c55', 'MDO', 'Ketan Sokanli', 8, '2023-02-09 16:51:51'),
('615e25f9-9104-4d2c-a757-6622210c03a7', 'Architecture', 'Pratiksha Chopra', 45, '2023-02-09 16:53:07'),
('6a9a7fac-2222-484c-b07b-f639442dcaf4', 'Engineer', 'Mehul Makvana', 12, '2023-02-17 16:50:25'),
('da07720b-2545-40cf-8206-3527b7f641b4', 'Interior', 'Rashmika Pande', 24, '2023-02-17 16:49:31'),
('fa3e87df-0fa4-4de6-b0d6-8eaa55ccfc21', 'Finance', 'Dhruvik Vekariya', 19, '2023-02-17 16:53:49');

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
  `emp_designation` varchar(100) NOT NULL,
  `emp_hod_name` varchar(100) NOT NULL,
  `emp_joining_date` date NOT NULL,
  `emp_confirmation_date` date DEFAULT NULL,
  `emp_leaving_date` date DEFAULT NULL,
  `emp_working_hours` time NOT NULL,
  `emp_profile_pic` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `emp_first_name`, `emp_last_name`, `emp_description`, `emp_gender`, `emp_dob`, `emp_mob`, `emp_email`, `emp_address`, `emp_department`, `emp_designation`, `emp_hod_name`, `emp_joining_date`, `emp_confirmation_date`, `emp_leaving_date`, `emp_working_hours`, `emp_profile_pic`) VALUES
('1de7377d-6ad2-4678-8f29-5d1422ad3396', 'Akshay', 'Kaneriya', 'cvnbsibn kfborwpsn', 'Male', '2001-01-01', 2147483647, 'akshay@gmail.com', 'xcvmospdvbmbo', 'Engineer', 'HOD', '', '2023-01-01', '2023-01-01', '0000-00-00', '10:00:00', '1676911140_black-laptop.jpg'),
('7e754019-51f8-460b-bb8d-c4870beb459a', 'Chintan', 'Bhimani', 'dsgnbetrgfmdv vbkm nergmbn fbkgnreisgmbhjowpegwhi bfinrgwbn', 'Male', '2003-03-31', 123456789, 'bhimanicaa3103@gmail.com', 'scdvnegdbn vfbnbifnsibn isvn', 'IT', 'HOD', 'Chintan Bhimani', '2009-01-01', '2009-01-01', '0000-00-00', '09:30:00', '1676910360_black-laptop.jpg'),
('a325785f-4972-4650-b78d-dca3f02ce6c7', 'Pratiksha', 'Chopra', 'sfdgrfb fbnriwhnopn pbnprehbpwnhopbhwsop mfpbnropwhjpo mbpinrwhpfpo opfbnhrwopn', 'Female', '2002-10-07', 2147483647, 'pari@gmail.com', 'dcnbin fbnwgsopBgopb', 'Architecture', 'Senior Architecture', 'Pratiksha Chopra', '2022-01-01', '2022-01-15', '0000-00-00', '07:00:00', '1676911020_girl_profile.jpg'),
('ce05a805-e24b-4487-ab4f-ee60bcc2bc56', 'Testing', 'User', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Male', '2003-03-31', 2147483647, 'testuser.111@gmail.com', 't has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Other', 'Female', 'Unknown User', '2023-02-06', '2023-02-06', '0000-00-00', '09:00:00', '1675957140_testing_profile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `hod_id` text NOT NULL,
  `hod_first_name` text NOT NULL,
  `hod_last_name` text NOT NULL,
  `emp_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`(255));

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`(255));

--
-- Indexes for table `hod`
--
ALTER TABLE `hod`
  ADD PRIMARY KEY (`hod_id`(255));

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`(255));
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
