-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2023 at 03:04 PM
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
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` text NOT NULL,
  `client_first_name` varchar(100) NOT NULL,
  `client_last_name` varchar(100) NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `client_address` varchar(100) DEFAULT NULL,
  `client_email` varchar(100) NOT NULL,
  `client_contact` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_first_name`, `client_last_name`, `gender`, `client_address`, `client_email`, `client_contact`) VALUES
('615e5f0d-8954-447d-bbfc-cb22cea62d83', 'Rahul', 'Vasoya', 'Male', 'scdassfdsfafdgf', 'rahul111@gmail.com', '123433543556');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` text NOT NULL,
  `emp_first_name` varchar(100) NOT NULL,
  `emp_last_name` varchar(100) NOT NULL,
  `emp_code` bigint(20) NOT NULL,
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

INSERT INTO `employees` (`emp_id`, `emp_first_name`, `emp_last_name`, `emp_code`, `emp_description`, `emp_gender`, `emp_dob`, `emp_mob`, `emp_email`, `emp_address`, `emp_department`, `emp_designation`, `emp_hod_name`, `emp_joining_date`, `emp_confirmation_date`, `emp_leaving_date`, `emp_working_hours`, `emp_profile_pic`) VALUES
('0fa48220c45d450392a8111060b78562', 'Priyanka', 'Aahir', 1, 'sckdsgsidgnbisfvmobpf', 'Male', '2000-01-01', 1234564323, 'priyanka@gmail.com', 'kcvbpdasfbospdv daovdaopmvkb sdkbmisgjpsdzvmskbvbk ', 'Architecture', 'Junior Interior', '', '2003-01-01', '2003-01-01', '0000-00-00', '10:00:00', '1677417300_girl_profile.jpg'),
('3b3e819d-11ad-425b-8e30-5cf08afc25fa', 'Testing', 'User', 0, '', 'Male', '2002-01-01', 1234567890, 'test@gmail.com', '', 'Admin', 'HOD', '', '2002-01-01', '2002-02-01', '0000-00-00', '10:00:00', '1676957100_img1.jpg'),
('3e866ce7b9c34d8da798a4ff9ed83b56', 'Jasmin', 'Bhanderi', 0, 'dascasvgfDSB hetehrenw haewgnrpewj mhpormhfjrfhbtnettt', 'Female', '2002-01-01', 2147483647, 'janki@gmail.com', 'sdfcsafdeswgfv', 'Interior', 'Intern', 'Jasmin Bhanderi', '2022-01-01', '0000-00-00', '0000-00-00', '09:00:00', '1677046260_pexels-pixabay-460672.jpg'),
('8808a6c1-cf80-49f4-9cfd-6c7310f86f5d', 'Pratiksha', 'Chopra', 0, '', 'Female', '1999-01-01', 2147483647, 'pari@gmail.com', '', 'Architecture', 'Junior Interior', '', '2022-01-01', '2022-01-01', '0000-00-00', '07:00:00', '1676957400_img4.png'),
('a80bd20e57ad4ac5a4ea2722a23904ff', 'Janki', 'Bhatt', 0, 'swdfkegw rghmoewyhtmjoe  ,mrwgkmews', 'Female', '2003-03-31', 123243545, 'jay001@gmail.com', 'scdsafvmdpo', 'Finance', 'Intern', '', '2002-01-01', '2002-01-01', '2022-03-31', '10:00:00', '1677045840_img3.jpg'),
('e6de9027-6d88-4fa9-b32d-d2fa67f880d6', 'Chintan', 'Bhimani', 0, 'grnboibh fpbmrotfotfotfotfotfotfotfmnrgkep\r\n[whmkortmhnjoooooooooooooorwohohohohohohohohohohohohohtmnejonjtpeohbreomnbetj', 'Male', '2003-03-31', 2147483647, 'chintan@gmail.com', 'dwfeedpgwnr rgjrphj rphj hjrpjgrew pohjtgiphrjedf', 'MDO', 'MDO Staff', '', '2002-01-01', '2002-01-01', '0000-00-00', '09:30:00', '1676957220_img9.png');

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `hod_id` text NOT NULL,
  `hod_first_name` text NOT NULL,
  `hod_last_name` text NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `emp_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`hod_id`, `hod_first_name`, `hod_last_name`, `department_name`, `emp_id`) VALUES
('04caf9ba-9e8d-4cba-9976-66976c8c4bd7', 'Testing', 'User', 'Admin', '3b3e819d-11ad-425b-8e30-5cf08afc25fa'),
('cfbcfbf8-fa5e-44f6-a2fe-ef1fe38928b7', 'Akshay', 'Kaneriya', 'Engineer', '4196036b-0dcf-4ad9-825a-661e17677512');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` text NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `project_status` varchar(100) NOT NULL,
  `project_code` varchar(100) NOT NULL,
  `client_id` text NOT NULL,
  `start_date` date NOT NULL,
  `expected_end_date` date DEFAULT NULL,
  `hod_id` text NOT NULL,
  `nature_of_project` varchar(100) NOT NULL,
  `reference_by` text DEFAULT NULL,
  `project_location` varchar(100) NOT NULL,
  `engineers_id` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` text NOT NULL,
  `user_email` text NOT NULL,
  `user_password` text NOT NULL,
  `emp_id` text NOT NULL,
  `user_access_type` int(10) NOT NULL DEFAULT 2 COMMENT '1: Admin\r\n2: Employee\r\n3: Engineer\r\n4: HOD'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `emp_id`, `user_access_type`) VALUES
('21710fd4918043958c773d741e759780', 'test@gmail.com', '09d1d20bd495912ed5307a08510440d6', '3b3e819d-11ad-425b-8e30-5cf08afc25fa', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`(255));

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`(255));

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`(255));
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
