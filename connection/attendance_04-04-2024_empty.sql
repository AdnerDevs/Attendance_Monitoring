-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 10:31 AM
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
(1, 'Attendance', '2024-02-14 16:00:00', '2024-03-07 07:12:55', 0, 0),
(9, 'lunch', '2024-04-04 03:56:01', '2024-04-04 03:56:01', 0, 0);

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
('1234Devs', 'Adners Devilaa', 5, 0, 0, 0),
('123ADMIN', 'Admin', 1, 1, 0, 0),
('123Devs', 'Adner Devila', 5, 1, 0, 0),
('123SAMPL', 'samp sampler', 6, 0, 0, 1),
('250minad', 'Marya Careys', 1, 1, 0, 0),
('321ADNER', 'Gon Kurapika', 1, 1, 0, 0),
('CHECK123', 'check check', 6, 0, 0, 0);

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
  `department_id` int(11) NOT NULL,
  `activity_type` int(11) NOT NULL,
  `activity_description` varchar(150) DEFAULT NULL,
  `start_time` datetime NOT NULL DEFAULT current_timestamp(),
  `end_time` datetime DEFAULT NULL,
  `total_time` varchar(30) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `hour` int(11) DEFAULT NULL,
  `minute` int(11) DEFAULT NULL,
  `second` int(11) DEFAULT NULL,
  `submitted_by` varchar(150) NOT NULL,
  `submitted_on` datetime NOT NULL DEFAULT current_timestamp(),
  `isRemove` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_attendance`
--

INSERT INTO `employee_attendance` (`employee_attendance_id`, `employee_id`, `employee_name`, `department_id`, `activity_type`, `activity_description`, `start_time`, `end_time`, `total_time`, `day`, `hour`, `minute`, `second`, `submitted_by`, `submitted_on`, `isRemove`) VALUES
(175, '01-2457321', 'EROR LOGIN', 2, 1, 'Attendance', '2024-03-13 08:53:51', '2024-03-13 09:09:46', '955', 0, 0, 15, 55, '01-2457321ERO', '2024-03-13 09:09:46', 0),
(176, '01-2457321', 'EROR LOGIN', 2, 4, '', '2024-03-13 08:55:26', '2024-03-13 08:55:28', '2', 0, 0, 0, 2, '01-2457321ERO', '2024-03-13 08:55:28', 0),
(177, '01-2457321', 'EROR LOGIN', 2, 1, 'Attendance', '2024-03-13 09:11:50', '2024-03-13 11:20:44', '7734', 0, 2, 8, 54, '01-2457321ERO', '2024-03-13 11:20:44', 0),
(178, '12345678912131', 'ASDAD DF', 2, 1, 'Attendance', '2024-03-13 13:54:35', '2024-03-13 14:10:09', '934', 0, 0, 15, 34, '12345678912131SA', '2024-03-13 14:10:09', 0),
(179, '12345678912131', 'ASDAD DF', 2, 1, 'Attendance', '2024-03-13 14:10:21', NULL, NULL, NULL, NULL, NULL, NULL, '12345678912131SA', '2024-03-13 14:10:21', 0),
(180, '01-2457321', 'EROR LOGIN', 2, 1, 'Attendance', '2024-03-14 08:37:42', '2024-03-14 09:10:02', '1940', 0, 0, 32, 20, '01-2457321ERO', '2024-03-14 09:10:02', 0),
(181, '01-2457321', 'EROR LOGIN', 2, 1, 'Attendance', '2024-03-14 14:01:31', '2024-03-18 09:27:11', '329140', 3, 19, 25, 40, '01-2457321ERO', '2024-03-18 09:27:11', 0),
(182, '01-2457321', 'EROR LOGIN', 2, 1, 'Attendance', '2024-03-18 09:18:10', '2024-03-18 09:24:52', '402', 0, 0, 6, 42, '01-2457321ERO', '2024-03-18 09:24:52', 0),
(183, '01-2457321', 'EROR LOGIN', 2, 1, 'Attendance', '2024-03-18 17:07:45', '2024-03-18 17:11:11', '206', 0, 0, 3, 26, '01-2457321ERO', '2024-03-18 17:11:11', 0),
(184, '01-2457321', 'EROR LOGIN', 2, 1, 'Attendance', '2024-03-22 13:47:37', '2024-03-22 14:23:44', '2167', 0, 0, 36, 7, '01-2457321ERO', '2024-03-22 14:23:44', 0),
(185, '01-2457321', 'EROR LOGIN', 2, 1, 'Attendance', '2024-03-25 09:36:21', '2024-03-25 09:42:35', '374', 0, 0, 6, 14, '01-2457321ERO', '2024-03-25 09:42:35', 0),
(186, '01-2457321', 'EROR LOGIN', 2, 1, 'Attendance', '2024-03-25 09:42:53', '2024-03-25 09:46:28', '215', 0, 0, 3, 35, '01-2457321ERO', '2024-03-25 09:46:28', 0),
(187, '01-2457321', 'EROR LOGIN', 2, 2, 'asdada', '2024-03-25 09:43:03', '2024-03-25 09:46:26', '203', 0, 0, 3, 23, '01-2457321ERO', '2024-03-25 09:46:26', 0),
(188, '01-2457321', 'EROR LOGIN', 2, 1, 'Attendance', '2024-03-25 09:46:37', '2024-03-25 09:48:19', '102', 0, 0, 1, 42, '01-2457321ERO', '2024-03-25 09:48:19', 0),
(189, '01-2457321', 'EROR LOGIN', 2, 1, 'Attendance', '2024-04-01 09:13:06', NULL, NULL, NULL, NULL, NULL, NULL, '01-2457321ERO', '2024-04-01 09:13:06', 0),
(190, '1234567890', 'ADNER DEVILA', 1, 1, 'Attendance', '2024-04-01 13:15:41', '2024-04-01 13:16:12', '31', 0, 0, 0, 31, '1234567890SFA', '2024-04-01 13:16:12', 0),
(191, '1234567890', 'ADNER DEVILA', 1, 1, 'Attendance', '2024-04-01 13:16:15', NULL, NULL, NULL, NULL, NULL, NULL, '1234567890SFA', '2024-04-01 13:16:15', 0),
(192, '1234567890', 'ADNER DEVILA', 1, 3, 'sadada', '2024-04-01 13:16:22', NULL, NULL, NULL, NULL, NULL, NULL, '1234567890SFA', '2024-04-01 13:16:22', 0),
(193, '01-2457321', 'EROR LOGIN', 2, 1, 'Attendance', '2024-04-03 09:12:54', '2024-04-03 09:12:58', '4', 0, 0, 0, 4, '01-2457321ERO', '2024-04-03 09:12:58', 0),
(194, '01-2457321', 'EROR LOGIN', 2, 1, 'Attendance', '2024-04-04 09:53:40', '2024-04-04 10:06:47', '787', 0, 0, 13, 7, '01-2457321ERO', '2024-04-04 10:06:47', 0),
(195, '01-2457321', 'EROR LOGIN', 2, 1, 'Attendance', '2024-04-04 10:07:02', '2024-04-04 10:08:30', '88', 0, 0, 1, 28, '01-2457321ERO', '2024-04-04 10:08:30', 0),
(196, '01-2457321', 'EROR LOGIN', 2, 1, 'Attendance', '2024-04-04 10:08:32', '2024-04-04 10:08:56', '24', 0, 0, 0, 24, '01-2457321ERO', '2024-04-04 10:08:56', 0),
(197, '01-2457321', 'EROR LOGIN', 2, 1, 'Attendance', '2024-04-04 10:09:00', '2024-04-04 11:57:57', '6537', 0, 1, 48, 57, '01-2457321ERO', '2024-04-04 11:57:57', 0),
(198, '01-2457321', 'ADNER DEVILA', 2, 9, '', '2024-04-04 11:57:01', '2024-04-04 11:57:14', '13', 0, 0, 0, 13, '01-2457321ERO', '2024-04-04 11:57:14', 0),
(199, '01-2457321', 'ADNER DEVILA', 2, 1, 'Attendance', '2024-04-04 12:05:08', '2024-04-04 12:06:41', '93', 0, 0, 1, 33, '01-2457321ERO', '2024-04-04 12:06:41', 0),
(200, '01-2457321', 'ADNER DEVILA', 2, 9, '', '2024-04-04 12:05:24', '2024-04-04 12:05:52', '28', 0, 0, 0, 28, '01-2457321ERO', '2024-04-04 12:05:52', 0),
(201, '01-2457321', 'ADNER DEVILA', 2, 1, 'Attendance', '2024-04-04 12:09:48', '2024-04-04 12:10:24', '36', 0, 0, 0, 36, '01-2457321ERO', '2024-04-04 12:10:24', 0),
(202, '01-2457321', 'ADNER DEVILA', 2, 9, '', '2024-04-04 12:09:56', '2024-04-04 12:10:03', '7', 0, 0, 0, 7, '01-2457321ERO', '2024-04-04 12:10:03', 0),
(203, '01-2457321', 'ADNER DEVILA', 2, 1, 'Attendance', '2024-04-04 13:38:22', '2024-04-04 13:38:41', '19', 0, 0, 0, 19, '01-2457321ERO', '2024-04-04 13:38:41', 0),
(204, '01-2457321', 'ADNER DEVILA', 2, 1, 'Attendance', '2024-04-04 13:38:44', '2024-04-04 13:40:55', '131', 0, 0, 2, 11, '01-2457321ERO', '2024-04-04 13:40:55', 0),
(205, '01-2457321', 'ADNER DEVILA', 2, 1, 'Attendance', '2024-04-04 13:50:43', '2024-04-04 13:50:49', '6', 0, 0, 0, 6, '01-2457321ERO', '2024-04-04 13:50:49', 0),
(206, '01-2457321', 'ADNER DEVILA', 2, 1, 'Attendance', '2024-04-04 14:03:18', '2024-04-04 14:03:24', '6', 0, 0, 0, 6, '01-2457321ERO', '2024-04-04 14:03:24', 0),
(207, '01-2457321', 'ADNER DEVILA', 2, 1, 'Attendance', '2024-04-04 14:19:11', '2024-04-04 14:19:27', '16', 0, 0, 0, 16, '01-2457321ERO', '2024-04-04 14:19:27', 0),
(208, '01-2457321', 'ADNER DEVILA', 2, 9, 'sdsfdsfs', '2024-04-04 14:19:15', '2024-04-04 14:19:19', '4', 0, 0, 0, 4, '01-2457321ERO', '2024-04-04 14:19:19', 0),
(209, '01-2457321', 'ADNER DEVILA', 2, 1, 'Attendance', '2024-04-04 14:23:54', '2024-04-04 14:34:06', '612', 0, 0, 10, 12, '01-2457321ERO', '2024-04-04 14:34:06', 0),
(210, '01-2457321', 'ADNER DEVILA', 2, 9, '', '2024-04-04 14:24:00', '2024-04-04 14:24:04', '4', 0, 0, 0, 4, '01-2457321ERO', '2024-04-04 14:24:04', 0);

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
('01-2457321', 'ADNER DEVILA', 'ERO', 2, '2024-02-22 13:05:51', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_credentials`
--

CREATE TABLE `login_credentials` (
  `login_id` int(11) NOT NULL,
  `employee_id` varchar(100) NOT NULL,
  `credential_id` varchar(100) NOT NULL,
  `credential_surname` varchar(100) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `isRemove` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_credentials`
--

INSERT INTO `login_credentials` (`login_id`, `employee_id`, `credential_id`, `credential_surname`, `user_type`, `isRemove`) VALUES
(6, '01-2457321', '01-2457321ERO', 'LOGIN', 'employee', 0),
(8, '123ADMIN', '123ADMIN', '123admin', 'admin', 0),
(11, '321ADNER', '321ADNER', 'neru', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `isSeen` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `employee_id`, `message`, `created_at`, `isSeen`) VALUES
(38, '202', 'You have ongoing activity, please end it if you forgot to end your activity, thank you!', '2024-04-04 12:16:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notify_update_announcement`
--

CREATE TABLE `notify_update_announcement` (
  `id` int(10) NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `message` text NOT NULL DEFAULT 'New announcement has been uploaded, click to refresh the page.',
  `isSeen` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0,
  `isArchive` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userlevel`
--

INSERT INTO `userlevel` (`userlevel_id`, `userlevel_name`, `dashboard_permission_view`, `admin_management_view`, `admin_management_create`, `admin_management_update`, `admin_management_delete`, `admin_management_archive`, `employee_management_view`, `employee_management_create`, `employee_management_update`, `employee_management_delete`, `employee_monitoring_management_view`, `employee_monitoring_management_create`, `employee_monitoring_management_update`, `employee_monitoring_management_delete`, `announcement_view`, `announcement_create`, `announcement_update`, `announcement_delete`, `announcement_archive`, `cms_permission_view`, `cms_permission_update`, `isDeleted`, `isArchive`) VALUES
(1, 'Superadmin', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0);

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
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `notify_update_announcement`
--
ALTER TABLE `notify_update_announcement`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  MODIFY `employee_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `login_credentials`
--
ALTER TABLE `login_credentials`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `notify_update_announcement`
--
ALTER TABLE `notify_update_announcement`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userlevel`
--
ALTER TABLE `userlevel`
  MODIFY `userlevel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
