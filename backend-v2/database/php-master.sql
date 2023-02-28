-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2023 at 05:46 PM
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
('00bcdc6a157a4f21927862a575234242', 'Dhruvik', 'Vekriya', 6, '', 'Male', '2002-01-01', 2147483647, 'dhukiii30@gmail.com', '', 'Architecture', 'HOD', '', '2020-01-01', '2020-01-01', '0000-00-00', '08:00:00', '1677577500_Final Print Files.jpg'),
('0b620ab029bd4b6786ec9435665406c4', 'hiren', 'Patel', 17, '', 'Male', '2000-01-01', 2147483647, 'hiren@gmail.com', '', 'Engineer', 'Engineer', 'Sneha Rathod', '2020-01-01', '2020-01-01', '0000-00-00', '09:30:00', '1677580860_Final Print Files.jpg'),
('0bf2f38fb0694a5fbea599b85e876e8b', 'Dhruvi', 'Jasani', 8, '', 'Female', '2000-01-01', 2147483647, 'dhruvi@gmail.com', '', 'Architecture', 'Senior Architecture', 'Dhruvik Vekriya', '2020-01-01', '2020-01-01', '0000-00-00', '08:00:00', '1677577740_task-management.png'),
('13debf485bfc470dac5b82ddc64617c3', 'Nidhi', 'Ramani', 19, '', 'Female', '2000-01-01', 2147483647, 'nidhi@gmail.com', '', 'Interior', 'Senior Interior', '', '2020-01-01', '2020-01-01', '0000-00-00', '09:30:00', '1677581400_Final Print Files.jpg'),
('210b513f4eab4dabb42d0720d34a292a', 'Khushbu', 'Jasani', 11, '', 'Female', '2000-01-01', 1332132323, 'khushbu@gmail.com', '', 'Architecture', 'Intern', 'Dhruvik Vekriya', '2020-01-01', '2020-01-01', '0000-00-00', '08:00:00', '1677580560_img4.png'),
('4593bf0c87c3400b8edafbc27a4eedc1', 'Chirag', 'Jasani', 9, '', 'Male', '2000-01-01', 2147483647, 'chirag@gmail.com', '', 'IT', 'HOD', '', '2020-01-01', '2020-01-01', '0000-00-00', '08:00:00', '1677577800_download.jpg'),
('521355374af949bbba4a9c2acf245a7e', 'Bharat', 'Aahir', 25, '', 'Male', '2000-01-01', 465841684, 'bharat@gmail.com', '', 'Admin', 'Staff', '', '2020-01-01', '2020-01-01', '0000-00-00', '08:00:00', '1677582060_Final Print Files.jpg'),
('579b0d4bfcf04506ba2e86812c3b0f5f', 'mila', 'ghewala', 18, '', 'Female', '1999-01-01', 2147483647, 'mila@gmail.com', '', 'Engineer', 'Intern', 'Sneha Rathod', '2020-01-01', '2020-01-01', '0000-00-00', '09:30:00', '1677581040_img3.png'),
('712987250d844b5d9182f1e60aff37f5', 'Kiran', 'Manek', 22, '', 'Female', '2000-01-01', 2147483647, 'kiran@gmail.com', '', 'MDO', 'HOD', '', '2020-01-01', '2020-01-01', '0000-00-00', '08:00:00', '1677581700_task-management.png'),
('79e2b1667cc24cc2a33e48ca2d614c3f', 'Aalok', 'Agarval', 20, '', 'Male', '2000-01-01', 2147483647, 'aalok@gmail.com', '', 'Interior', 'HOD', '', '2020-01-01', '2020-01-01', '0000-00-00', '08:00:00', '1677581460_img3.png'),
('7f7cfd7815e14312867fe303ff89a015', 'Mehul', 'Panchal', 16, '', 'Male', '2000-01-01', 2147483647, 'mehul@gmail.com', '', 'Engineer', 'Engineer', 'Sneha Rathod', '2020-01-01', '2020-01-01', '0000-00-00', '09:30:00', '1677580740_Final Print Files.jpg'),
('843d236dcb394d1b86c8b1496b9849dd', 'Ami', 'Bhalala', 24, '', 'Female', '2000-01-01', 2147483647, 'ami@gmail.com', '', 'MDO', 'Intern', 'Kiran Manek', '2020-01-01', '2020-01-01', '0000-00-00', '08:00:00', '1677581940_img6.jpg'),
('874483034c5c473bb5bc2c9267681737', 'Akshay', 'Kaneriya', 10, '', 'Male', '2000-01-01', 2147483647, 'akshay@gmail.com', '', 'IT', 'Intern', 'Chirag Jasani', '2020-01-01', '2020-01-01', '0000-00-00', '08:00:00', '1677577920_img2.jpg'),
('8adcb150dafe45a3b74f4aa454e08c0a', 'Pratiksha ', 'Chopra', 4, 'Ipsum consequat nisl vel pretium lectus quam. Aliquam etiam erat velit scelerisque. Lobortis feugiat vivamus at augue. Ut eu sem integer vitae.', 'Female', '2002-10-07', 2147483647, 'pari@gmail.com', 'Ipsum consequat nisl vel pretium lectus quam. Aliquam etiam erat velit scelerisque. Lobortis feugiat vivamus at augue. Ut eu sem integer vitae.', 'IT', 'Senior Developer', '', '2020-01-01', '2020-01-01', '0000-00-00', '09:30:00', '1677577320_img4.png'),
('8fdaf3c5a96740218efd159c0e4677db', 'Darshan', 'thummar', 7, '', 'Male', '2000-01-01', 2147483647, 'darshan@gmail.com', '', 'Interior', 'Junior Interior', 'Dhruvik Vekriya', '2020-01-01', '2020-01-01', '0000-00-00', '07:00:00', '1677577620_img6.jpg'),
('8fed41bd22e94edb82420479122c4f11', 'Testing', 'User', 2, '', 'Male', '2002-01-01', 2147483647, 'test@gmial.com', '', 'Admin', 'Administrator', '', '2002-01-01', '0000-00-00', '0000-00-00', '10:00:00', '1677570240_img4.png'),
('9c309268c57945e5a38dde5ec8d4069e', 'Rahul', 'Makvana', 5, '', 'Male', '2000-01-01', 2147483647, 'rahul111@gmail.com', '', 'MDO', 'MDO Staff', '', '2020-01-01', '2020-01-01', '0000-00-00', '09:30:00', '1677577440_img3.jpg'),
('9eb64d31a3a84e1992225ab85246f68f', 'Mayank', 'Virani', 15, '', 'Male', '2000-01-01', 23442132, 'mayank@gmail.com', '', 'Engineer', 'Engineer', 'Sneha Rathod', '2020-10-09', '2020-10-09', '0000-00-00', '09:30:00', '1677580680_img5.jpg'),
('b7ab4f5ae37c46f5abec57b293b0baaa', 'Mayuri', 'Gami', 21, '', 'Female', '2000-01-01', 2147483647, 'mayu@gmail.com', '', 'Interior', 'Intern', 'Aalok Agarval', '2020-01-01', '2020-01-01', '0000-00-00', '08:00:00', '1677581580_img4.png'),
('be683a4f979d4c74a9816f7d98ef9a3a', 'Chintan', 'Bhimani', 3, 'facilisi nullam vehicula ipsum a. Nibh tellus molestie nunc non blandit massa enim. Vitae aliquet nec ullamcorper sit amet. Diam quis enim lobortis scelerisque fermentum dui faucibus in. Purus faucibus ornare suspendisse sed nisi lacus sed viverra. Pellentesque habitant morbi tristique senectus et netus et malesuada fames. Arcu non sodales neque sodales ut etiam.', 'Male', '2003-03-31', 2147483647, 'chintan@gmail.com', 'que aliquam vestibulum morbi blandit cursus. Purus in massa tempor nec feugiat nisl pretium. Nunc vel risus commodo viverra maecenas accumsan lacus vel.', 'IT', 'Junior Developer', '', '2022-01-01', '2022-01-01', '0000-00-00', '10:00:00', '1677577200_img1.jpg'),
('c3a2ab11f5a24d63922a505e556ca730', 'Itisha', 'Padsala', 14, '', 'Female', '2000-01-09', 55684654, 'padsala@gmail.com', '', 'Engineer', 'Engineer', 'Sneha Rathod', '2020-01-01', '2020-01-01', '0000-00-00', '09:03:00', '1677580440_img2.jpg'),
('cf6813320082414cb463ffd8aa34a55c', 'Nensi', 'Patel', 12, '', 'Female', '2000-01-01', 2147483647, 'nensi@gmail.com', '', 'Architecture', 'Junior Architecture', 'Dhruvik Vekriya', '2020-01-01', '2020-01-01', '0000-00-00', '08:00:00', '1677578460_img4.png'),
('f1a92584b86745bfb89a9dbdba251082', 'Sneha', 'Rathod', 13, '', 'Female', '2000-01-01', 2147483647, 'sneha@gmail.com', '', 'Engineer', 'HOD', '', '2020-01-01', '2020-01-01', '0000-00-00', '08:00:00', '1677578640_download.jpg'),
('f3d9c2c1b24b444fb463d506f135e7d4', 'Nirali', 'Patel', 23, '', 'Female', '2000-01-01', 2147483647, 'nirali@gmail.com', '', 'Finance', 'HOD', '', '2020-01-01', '2020-01-01', '0000-00-00', '08:00:00', '1677581820_img1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `exp_id` text NOT NULL,
  `exp_name` text NOT NULL,
  `exp_amount` double NOT NULL,
  `exp_date` date NOT NULL,
  `exp_bill_photo` text NOT NULL,
  `exp_createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`exp_id`, `exp_name`, `exp_amount`, `exp_date`, `exp_bill_photo`, `exp_createdAt`) VALUES
('f0592e606c574442b41b1c577be6243d', 'food', 100.43, '2023-02-27', '1677475200_download.jpg', '2023-02-27 05:20:16');

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
('27c01417d131402491993b096f1f23f6', 'Aalok', 'Agarval', 'Interior', '79e2b1667cc24cc2a33e48ca2d614c3f'),
('2afb31b6175342cf8bad67b83fe71232', 'Kiran', 'Manek', 'MDO', '712987250d844b5d9182f1e60aff37f5'),
('2efac22e7ea245e5a22ee1eef323253f', 'Sneha', 'Rathod', 'Engineer', 'f1a92584b86745bfb89a9dbdba251082'),
('6afb638d2f28469ca15ab50cd3e6386c', 'Dhruvik', 'Vekriya', 'Architecture', '00bcdc6a157a4f21927862a575234242'),
('88b6fe5892e444a485d0c117e96292bf', 'Nirali', 'Patel', 'Finance', 'f3d9c2c1b24b444fb463d506f135e7d4'),
('9505ea29ee8e4034b4a8530a813a5051', 'Chirag', 'Jasani', 'IT', '4593bf0c87c3400b8edafbc27a4eedc1');

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
  `engineers_id` text DEFAULT NULL,
  `users_id` text DEFAULT NULL,
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
  `user_first_name` varchar(100) NOT NULL,
  `user_last_name` varchar(100) NOT NULL,
  `user_access_type` int(10) NOT NULL DEFAULT 2 COMMENT '1: Admin\r\n2: Employee\r\n3: Engineer\r\n4: HOD'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `emp_id`, `user_first_name`, `user_last_name`, `user_access_type`) VALUES
('07b2442d3a13471f87f75f80efdc1435', 'nirali@gmail.com', 'bd658eebfb7bfe3e19505b94a75c69d9', 'f3d9c2c1b24b444fb463d506f135e7d4', 'Nirali', 'Patel', 4),
('13b66688ef2f4d798f1de813f5f7d774', 'test@gmial.com', 'e6e061838856bf47e1de730719fb2609', '8fed41bd22e94edb82420479122c4f11', 'Testing', 'User', 1),
('439bc45381884234abad0e6350a4f9f6', 'aalok@gmail.com', '377e5a6e298f214c21f1e44b57725c63', '79e2b1667cc24cc2a33e48ca2d614c3f', 'Aalok', 'Agarval', 4),
('544a98699fbd4919ba6c98c3f72927ae', 'hiren@gmail.com', 'a029664fd4ad20185dc1acc714d48bca', '0b620ab029bd4b6786ec9435665406c4', 'hiren', 'Patel', 3),
('8364e15ef4f749ee95b3391df8732d5f', 'pari@gmail.com', '3b8100eceabeea4260608eb62a48eaac', '8adcb150dafe45a3b74f4aa454e08c0a', 'Pratiksha ', 'Chopra', 2),
('965e28fbb3ad49338ad08136182a7069', 'mehul@gmail.com', '350a6713759d33c794ba9dc579901537', '7f7cfd7815e14312867fe303ff89a015', 'Mehul', 'Panchal', 3),
('9f2b7bb425154228a9897f46e023e219', 'chirag@gmail.com', 'da36f1dd5300dbb62671844db234824d', '4593bf0c87c3400b8edafbc27a4eedc1', 'Chirag', 'Jasani', 4),
('a9b502ce6e8941fb8fecc99f541738f2', 'mayank@gmail.com', '3c2c6e1d3e63f255f543b1f01708bf73', '9eb64d31a3a84e1992225ab85246f68f', 'Mayank', 'Virani', 3),
('af3c3ff0c05842f3960ccd7ba666a6dd', 'kiran@gmail.com', 'd64bc53880b945869498f0322b7802b1', '712987250d844b5d9182f1e60aff37f5', 'Kiran', 'Manek', 4),
('ce05d9bd9fd649f983b3a87adb51c604', 'padsala@gmail.com', '90550463238bf3a7718d04f14824d829', 'c3a2ab11f5a24d63922a505e556ca730', 'Itisha', 'Padsala', 3),
('d57fe6189c974ff2acf1bb49c4270438', 'dhukiii30@gmail.com', '4a45894868a88b73c0b018a0e22bccbe', '00bcdc6a157a4f21927862a575234242', 'Dhruvik', 'Vekriya', 4),
('d5f19b6a5c214da497de76773dca8f13', 'nidhi@gmail.com', '121d62c5443a420a975bea5d88381214', '13debf485bfc470dac5b82ddc64617c3', 'Nidhi', 'Ramani', 2),
('de8f6ca0819c4fa9ab3f2f2f3d851318', 'dhruvi@gmail.com', 'd13eb1f5a4340a779b57229bbfc0d957', '0bf2f38fb0694a5fbea599b85e876e8b', 'Dhruvi', 'Jasani', 2),
('e568b77d8dd942f98180b71de17f7ae4', 'sneha@gmail.com', '76281d4a9faf68bbce161cb21c3ce1f4', 'f1a92584b86745bfb89a9dbdba251082', 'Sneha', 'Rathod', 4),
('eca99ee2ef484eea94e99d4fc81f23ec', 'chintan@gmail.com', '4dc322395edd7f1a6a5a5d9d5cfe8b62', 'be683a4f979d4c74a9816f7d98ef9a3a', 'Chintan', 'Bhimani', 2);

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
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`exp_id`(255));

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
