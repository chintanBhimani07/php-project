-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2023 at 10:29 AM
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
-- Database: `project-v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `emp_id` varchar(255) NOT NULL,
  `current_day` date NOT NULL DEFAULT current_timestamp(),
  `punch_in` timestamp NOT NULL DEFAULT current_timestamp(),
  `punch_out` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `project` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departmets`
--

CREATE TABLE `departmets` (
  `deprt_id` int(255) NOT NULL,
  `deprt_name` varchar(255) NOT NULL,
  `hod` varchar(100) NOT NULL,
  `no_of_emp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departmets`
--

INSERT INTO `departmets` (`deprt_id`, `deprt_name`, `hod`, `no_of_emp`) VALUES
(1, 'IT', 'Rahul', 110),
(2, 'Design', 'Rahul Makvana', 18),
(3, 'Engineer', 'Pinal Rathod', 26),
(4, 'MDO/Admin', 'Sakshi Patel', 8),
(5, 'Architecture', 'Jaimin Chunawala', 40),
(6, 'Drivers', 'Chetan patel', 3),
(7, 'Account', 'Akshay kaneriya', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(255) NOT NULL,
  `emp_full_name` varchar(255) NOT NULL,
  `emp_gender` varchar(10) DEFAULT NULL,
  `emp_dob` date DEFAULT NULL,
  `emp_mob` int(20) DEFAULT NULL,
  `emp_email` varchar(255) NOT NULL,
  `emp_address` varchar(255) DEFAULT NULL,
  `emp_joining_date` date NOT NULL DEFAULT current_timestamp(),
  `emp_confirmation_date` date DEFAULT NULL,
  `emp_leaving_date` date DEFAULT NULL,
  `emp_department_name` varchar(100) NOT NULL,
  `emp_designation` varchar(100) NOT NULL,
  `hod` varchar(50) DEFAULT NULL,
  `emp_working_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `emp_full_name`, `emp_gender`, `emp_dob`, `emp_mob`, `emp_email`, `emp_address`, `emp_joining_date`, `emp_confirmation_date`, `emp_leaving_date`, `emp_department_name`, `emp_designation`, `hod`, `emp_working_time`) VALUES
(2, 'Chintan Bhimani', 'male', '2003-03-31', 1234567890, 'chintan@gmail.com', 'Surat surat Surat surat Surat surat Surat surat', '2022-11-11', '2022-11-12', '0000-00-00', 'IT', 'Senior Devloper', 'null', '08:00:00'),
(3, 'Pratiksha Chopra', 'female', '2002-10-07', 2147483647, 'pratiksha123@gmail.com', 'i am not providing you....', '2022-09-09', '2022-09-09', '0000-00-00', 'IT', 'junior Devloper', 'null', '08:30:00'),
(4, 'Jasmin Bhanderi', 'female', '2003-11-11', 1212121212, 'jasmin111@gmail.com', 'surat varachha USA', '2022-12-31', '2023-01-01', '2023-01-31', 'IT', 'junior Devloper', 'null', '10:00:00'),
(5, 'Darshan Thummar', 'male', '2003-01-01', 2147483647, 'darshan0101@gmail.com', '1, mahatma gandhi road, adajan surart', '2023-03-15', '2023-03-20', '0000-00-00', 'Drivers', 'driver', 'null', '10:00:00'),
(6, 'Mihit Viththani', 'male', '2003-01-01', 101010101, 'mihir000@gmail.com', '12 Union higth vesu surat', '2010-12-12', '2010-12-12', '2022-01-31', 'Engineer', 'Engineer', 'null', '09:00:00'),
(8, 'Akshay kaneriya', 'male', '2000-12-12', 2147483647, 'akshay@gmail.com', 'nothing', '2022-12-12', '2022-12-12', '0000-00-00', 'Architecture', 'architect', 'null', '09:00:00'),
(9, 'Deep Parvadiya', 'male', '2022-02-01', 2147483647, 'deep@gmail.com', '.......', '2022-01-01', '2022-01-01', '0000-00-00', 'Engineer', 'Engineer', 'null', '10:00:00'),
(10, 'Dhruvi Jasani', 'female', '2003-07-05', 2147483647, 'jasani@gmail.com', 'surat', '2023-03-31', '2003-03-31', '0000-00-00', 'Account', 'Manager', 'null', '07:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `enginners`
--

CREATE TABLE `enginners` (
  `id` varchar(255) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `project_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `expected_end_date` date NOT NULL,
  `manager_id` int(30) NOT NULL,
  `user_id` text NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `status`, `start_date`, `expected_end_date`, `manager_id`, `user_id`, `date_created`) VALUES
(1, 'project 4', 'fdfvsrgrtrtrtrtrtrtrtegfrsghfijsh \r\nfborfhjhn\r\n jmgnpoego ggiddegfhbtghmjutyhrofgvmrkghmjmj re\r\ngrefo', 0, '2022-09-04', '2023-11-29', 4, '2', '2023-01-16'),
(2, 'project 1', 'fdfvsrgrtrtrtrtrtrtrtegfrsghfijsh \r\nfborfhjhn\r\n jmgnpoego ggiddegfhbtghmjutyhrofgvmrkghmjmj re\r\ngrefo', 5, '2022-09-10', '2023-11-28', 4, '5', '2023-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `cover_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `address`, `cover_img`) VALUES
(1, 'Company Management', 'demo@gmail.com', '+91 1234 5678 90', '2102  Vesu Road, Surat, Gujrat, India 395006', '');

-- --------------------------------------------------------

--
-- Table structure for table `task_list`
--

CREATE TABLE `task_list` (
  `id` int(30) NOT NULL,
  `project_id` int(30) NOT NULL,
  `task` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `status` int(10) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_list`
--

INSERT INTO `task_list` (`id`, `project_id`, `task`, `description`, `status`, `date_created`) VALUES
(1, 1, 'new', '1', 1, '2023-01-13 14:23:18'),
(2, 1, '2', '2', 2, '2023-01-13 14:23:35'),
(3, 1, 'task 1', 'dfdgsgerfth', 3, '2023-01-13 14:25:13'),
(4, 1, 'semple 1 task', 'this is semple 1 description', 3, '2023-01-16 09:21:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1 = admin, 2 = staff',
  `avatar` text NOT NULL DEFAULT 'no-image-available.png',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `type`, `avatar`, `date_created`) VALUES
(3, 'chintan', 'bhimani', 'chintanbhimani07@gmail.com', '0bbda252617eb85922d5b979a593238e', 1, '1674634740_task-management.png', '2023-01-25 13:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_productivity`
--

CREATE TABLE `user_productivity` (
  `id` int(30) NOT NULL,
  `project_id` int(30) NOT NULL,
  `task_id` int(30) NOT NULL,
  `comment` text NOT NULL,
  `subject` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `user_id` int(30) NOT NULL,
  `time_rendered` float NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_productivity`
--

INSERT INTO `user_productivity` (`id`, `project_id`, `task_id`, `comment`, `subject`, `date`, `start_time`, `end_time`, `user_id`, `time_rendered`, `date_created`) VALUES
(1, 1, 1, '							&lt;p&gt;Sample Progress&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Test 1&lt;/li&gt;&lt;li&gt;Test 2&lt;/li&gt;&lt;li&gt;Test 3&lt;/li&gt;&lt;/ul&gt;																			', 'Sample Progress', '2020-12-03', '08:00:00', '10:00:00', 1, 2, '2020-12-03 12:13:28'),
(2, 1, 1, '							Sample Progress						', 'Sample Progress 2', '2020-12-03', '13:00:00', '14:00:00', 1, 1, '2020-12-03 13:48:28'),
(3, 1, 2, '							Sample						', 'Test', '2020-12-03', '08:00:00', '09:00:00', 5, 1, '2020-12-03 13:57:22'),
(4, 1, 2, 'asdasdasd', 'Sample Progress', '2020-12-02', '08:00:00', '10:00:00', 2, 2, '2020-12-03 14:36:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departmets`
--
ALTER TABLE `departmets`
  ADD PRIMARY KEY (`deprt_id`),
  ADD UNIQUE KEY `deprt_name` (`deprt_name`),
  ADD UNIQUE KEY `hod` (`hod`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `emp_emial` (`emp_email`),
  ADD UNIQUE KEY `emp_full_name` (`emp_full_name`);

--
-- Indexes for table `enginners`
--
ALTER TABLE `enginners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emp_id` (`emp_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_list`
--
ALTER TABLE `task_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_productivity`
--
ALTER TABLE `user_productivity`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departmets`
--
ALTER TABLE `departmets`
  MODIFY `deprt_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `task_list`
--
ALTER TABLE `task_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
