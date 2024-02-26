-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2024 at 11:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` int(11) NOT NULL,
  `activity_type` varchar(155) NOT NULL,
  `activity_created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `activity_edited_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `isDeleted` tinyint(1) DEFAULT 0,
  `isArchive` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `activity_type`, `activity_created_time`, `activity_edited_time`, `isDeleted`, `isArchive`) VALUES
(1, 'Attendances', '2024-02-14 16:00:00', '2024-02-19 05:04:22', 0, 0),
(2, 'Lunch', '2024-02-14 16:00:00', '2024-02-15 18:52:02', 0, 0),
(3, 'Meeting', '2024-02-15 01:27:14', '2024-02-15 18:52:02', 0, 0),
(4, 'Quick Activity', '2024-02-15 01:28:04', '2024-02-15 18:52:02', 0, 0),
(5, 'htttss', '2024-02-15 01:38:41', '2024-02-15 18:59:39', 0, 0),
(6, 'sasss', '2024-02-15 18:17:44', '2024-02-17 23:12:28', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `admin_id` varchar(8) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `userlevel_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `isArchive` tinyint(1) NOT NULL DEFAULT 0,
  `isRemove` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`admin_id`, `admin_name`, `userlevel_id`, `status`, `isArchive`, `isRemove`) VALUES
('1234Devs', 'Adner Devila', 5, 0, 0, 0),
('123ADMIN', 'Name Surname', 1, 0, 0, 0),
('123Devs', 'Adner Devila', 5, 0, 0, 0),
('123SAMPL', 'samp sampler', 5, 0, 0, 0),
('321ADNER', 'Gon Kurapika', 6, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcment_id` int(11) NOT NULL,
  `announcement_text` text NOT NULL,
  `announcement_image` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `isDeleted` tinyint(1) DEFAULT 0,
  `isArchive` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcment_id`, `announcement_text`, `announcement_image`, `date_created`, `isDeleted`, `isArchive`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio beatae aliquam veniam maiores et. Optio, in commodi. Perferendis similique, nam tempore accusamus voluptatibus doloribus tempora ipsum facere temporibus iusto ut?', 'marcus.jpg', '2024-02-24 20:39:50', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(50) NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `isDeleted` tinyint(1) DEFAULT 0,
  `isArchive` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `status`, `isDeleted`, `isArchive`) VALUES
(1, 'IT Department', 0, 0, 0),
(2, 'Accounting Department', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendance`
--

CREATE TABLE `employee_attendance` (
  `employee_attendance_id` int(11) NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `employee_name` varchar(150) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `activity_type` int(11) NOT NULL,
  `activity_description` varchar(150) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_time` varchar(30) DEFAULT NULL,
  `day` int(11) NOT NULL,
  `hour` int(11) NOT NULL,
  `minute` int(11) NOT NULL,
  `second` int(11) NOT NULL,
  `submitted_by` varchar(150) NOT NULL,
  `submitted_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_attendance`
--

INSERT INTO `employee_attendance` (`employee_attendance_id`, `employee_id`, `employee_name`, `department_id`, `activity_type`, `activity_description`, `start_time`, `end_time`, `total_time`, `day`, `hour`, `minute`, `second`, `submitted_by`, `submitted_on`) VALUES
(1, '02002John', 'John', 1, 6, 'attendance', '2024-02-22 16:00:00', '2024-02-23 16:00:00', '0.00', 0, 5, 2, 42, 'Ce', '0000-00-00 00:00:00'),
(7, '1234567891DEV', 'John Luck', 2, 4, 'sample act', '2024-02-23 07:59:39', '2024-02-25 09:00:00', '2 day, 1 hrs, 0 mns', 0, 0, 0, 0, '1234567891DEV', '2024-02-25 09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_user`
--

CREATE TABLE `employee_user` (
  `employee_id` varchar(20) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `nickname` varchar(10) NOT NULL,
  `department_id` int(20) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `isRemove` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_user`
--

INSERT INTO `employee_user` (`employee_id`, `employee_name`, `nickname`, `department_id`, `created_time`, `status`, `isRemove`) VALUES
('01-2457321', 'EROR LOGIN', 'ERO', 2, '2024-02-22 13:05:51', 0, 0),
('02-0454sen', 'adner devila', '', 2, '2024-02-21 15:07:10', 0, 0),
('02-070031-CENA', 'JOHN CENA', '', 2, '2024-02-21 15:07:10', 0, 0),
('02-2295931', 'LEGENDS LION', 'LEAGUE', 1, '2024-02-24 19:48:36', 1, 0),
('02-5003dEV', '02-5003dEV', '', 2, '2024-02-21 15:07:10', 0, 0),
('09-1236781', 'ALCOR LOER', 'LOR', 2, '2024-02-22 13:03:06', 0, 0),
('123', 'ASD DSA', 'ASD', 1, '2024-02-21 15:07:10', 0, 0),
('1234', 'ADNER DEVS', 'DEV', 1, '2024-02-21 15:07:10', 0, 0),
('1234567891', 'AD NER', 'DEV', 1, '2024-02-21 15:07:10', 0, 0),
('20-3455les', 'lesly summer', '', 1, '2024-02-21 15:07:10', 0, 0),
('9876543211', 'HANNA KUL', 'JUS', 2, '2024-02-21 15:07:10', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_credentials`
--

CREATE TABLE `login_credentials` (
  `login_id` int(11) NOT NULL,
  `employee_id` varchar(100) NOT NULL,
  `credential_id` varchar(100) NOT NULL,
  `credential_surname` varchar(100) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_credentials`
--

INSERT INTO `login_credentials` (`login_id`, `employee_id`, `credential_id`, `credential_surname`, `user_type`) VALUES
(1, '1234', '1234DEV', 'DEVS', 'employee'),
(2, '123', '123ASD', 'DSA', 'employee'),
(3, '1234567891', '1234567891DEV', 'NER', 'employee'),
(4, '9876543211', '9876543211JUS', 'KUL', 'admin'),
(6, '01-2457321', '01-2457321ERO', 'LOGIN', 'employee'),
(7, '02-2295931', '02-2295931LEAGUE', 'LION', 'employee'),
(8, '123ADMIN', '123ADMIN', 'admin', 'admin'),
(9, '123Devs', '123Devs', 'Devs', 'admin'),
(10, '1234Devs', '1234Devs', 'Devss', 'admin'),
(11, '321ADNER', '321ADNER', 'neru', 'admin'),
(12, '123SAMPL', '123SAMPL', 'samp', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `userlevel`
--

CREATE TABLE `userlevel` (
  `userlevel_id` int(11) NOT NULL,
  `userlevel_name` varchar(30) NOT NULL,
  `dashboard_permission_view` tinyint(1) DEFAULT 0,
  `admin_management_view` tinyint(1) DEFAULT 0,
  `admin_management_create` tinyint(1) DEFAULT 0,
  `admin_management_update` tinyint(1) DEFAULT 0,
  `admin_management_delete` tinyint(1) DEFAULT 0,
  `admin_management_archive` tinyint(1) NOT NULL DEFAULT 0,
  `employee_management_view` tinyint(1) DEFAULT 0,
  `employee_management_create` tinyint(1) DEFAULT 0,
  `employee_management_update` tinyint(1) DEFAULT 0,
  `employee_management_delete` tinyint(1) DEFAULT 0,
  `employee_monitoring_management_view` tinyint(1) DEFAULT 0,
  `employee_monitoring_management_create` tinyint(1) DEFAULT 0,
  `employee_monitoring_management_update` tinyint(1) DEFAULT 0,
  `employee_monitoring_management_delete` tinyint(1) DEFAULT 0,
  `announcement_view` tinyint(1) NOT NULL DEFAULT 0,
  `announcement_create` tinyint(1) NOT NULL DEFAULT 0,
  `announcement_update` tinyint(1) NOT NULL DEFAULT 0,
  `announcement_delete` tinyint(1) NOT NULL DEFAULT 0,
  `announcement_archive` tinyint(1) NOT NULL DEFAULT 0,
  `cms_permission_view` tinyint(1) DEFAULT 0,
  `cms_permission_update` tinyint(1) DEFAULT 0,
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userlevel`
--

INSERT INTO `userlevel` (`userlevel_id`, `userlevel_name`, `dashboard_permission_view`, `admin_management_view`, `admin_management_create`, `admin_management_update`, `admin_management_delete`, `admin_management_archive`, `employee_management_view`, `employee_management_create`, `employee_management_update`, `employee_management_delete`, `employee_monitoring_management_view`, `employee_monitoring_management_create`, `employee_monitoring_management_update`, `employee_monitoring_management_delete`, `announcement_view`, `announcement_create`, `announcement_update`, `announcement_delete`, `announcement_archive`, `cms_permission_view`, `cms_permission_update`, `isDeleted`) VALUES
(1, 'Superadmin', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0),
(5, 'Sec', 1, 1, 0, 0, 0, 0, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 'Sub', 1, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcment_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  ADD PRIMARY KEY (`employee_attendance_id`);

--
-- Indexes for table `employee_user`
--
ALTER TABLE `employee_user`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `login_credentials`
--
ALTER TABLE `login_credentials`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `userlevel`
--
ALTER TABLE `userlevel`
  ADD PRIMARY KEY (`userlevel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  MODIFY `employee_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login_credentials`
--
ALTER TABLE `login_credentials`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `userlevel`
--
ALTER TABLE `userlevel`
  MODIFY `userlevel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
