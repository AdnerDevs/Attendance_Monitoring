-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2024 at 09:33 AM
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
(1, 'Attendance', '0000-00-00 00:00:00', '2024-02-15 08:33:12', 0, 0),
(2, 'Lunch', '0000-00-00 00:00:00', '2024-02-15 08:33:12', 0, 0),
(3, 'meeting', '2024-02-15 01:27:14', '2024-02-15 08:33:12', 0, 0),
(4, 'quick activity', '2024-02-15 01:28:04', '2024-02-15 08:33:12', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendance`
--

CREATE TABLE `employee_attendance` (
  `employee_attendance_id` int(11) NOT NULL,
  `employee_name` varchar(150) NOT NULL,
  `activity_type` int(11) NOT NULL,
  `activity_description` varchar(150) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_time` time NOT NULL,
  `submitted_by` varchar(150) NOT NULL,
  `submitted_in` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_attendance`
--

INSERT INTO `employee_attendance` (`employee_attendance_id`, `employee_name`, `activity_type`, `activity_description`, `start_time`, `end_time`, `total_time`, `submitted_by`, `submitted_in`) VALUES
(1, 'John', 1, 'attendance', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '00:00:04', 'Ce', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  ADD PRIMARY KEY (`employee_attendance_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  MODIFY `employee_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
