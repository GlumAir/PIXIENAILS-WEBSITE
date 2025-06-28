-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 28, 2025 at 02:05 PM
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
-- Database: `pixiedustdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `admin_email` varchar(100) NOT NULL DEFAULT 'admin@gmail.com'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`admin_id`, `username`, `password`, `created_at`, `admin_email`) VALUES
(1, 'Admin1', 'password', '2025-06-24 17:02:57', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pixiedust_appointment_tbl`
--

CREATE TABLE `pixiedust_appointment_tbl` (
  `appointment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `services` varchar(200) NOT NULL,
  `total_price` varchar(200) NOT NULL,
  `appointment_date` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `admin_id` int(10) NOT NULL,
  `add_ons` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pixiedust_appointment_tbl`
--

INSERT INTO `pixiedust_appointment_tbl` (`appointment_id`, `user_id`, `services`, `total_price`, `appointment_date`, `created_at`, `admin_id`, `add_ons`) VALUES
(11, 2, 'Gel Manicure', 'PHP 300.00', '2025-06-28', '2025-06-26 23:27:36', 1, ''),
(15, 2, 'Regular Polish', 'PHP 160.00', '2025-07-04', '2025-06-27 00:37:50', 1, 'Ombre'),
(23, 7, 'Gel Manicure, Gel Manicure', 'PHP 720.00', '2025-06-30', '2025-06-28 17:08:56', 1, 'Molding Gel');

-- --------------------------------------------------------

--
-- Table structure for table `pixiedust_user_tbl`
--

CREATE TABLE `pixiedust_user_tbl` (
  `user_id` int(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phonenum` varchar(100) NOT NULL,
  `acc_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pixiedust_user_tbl`
--

INSERT INTO `pixiedust_user_tbl` (`user_id`, `username`, `email`, `password`, `firstname`, `middlename`, `lastname`, `phonenum`, `acc_created`) VALUES
(1, '@jjj', 'john@gmail.com', '$2y$10$3XxqHpB9PMVQ7mnGsXU4Xu7yc9YTj9gxYZU12NwezUD9c.FYxf9Sm', 'john', 'joe', 'joseph', '+639605387818', '2025-06-24 17:48:00'),
(2, '@rav', 'rav@gmail.com', '$2y$10$U16Oa29tIoi5Kp/MXv3GruhV76iw5QxJQq4aMPZGr9XgDeUfJl2T2', 'rav', 'vivas', 'arroyo', '+639605387818', '2025-06-24 17:50:52'),
(3, '@zai', 'zaije@gmail.com', '$2y$10$GOO48ysDdO5TiqYxJ6UOl.XzUaJcfgahc6YsIaQ2GoyGnYVvF2vE2', 'Zaije', 'A', 'Asias', '+631111111111', '2025-06-25 19:47:28'),
(4, '@luke', 'luke@gmail.com', '$2y$10$lHDVclCR0oAiYNO.Z/49ROF.xIsC.l1.kaZcmKHMhEXMJ/MkPGlI.', 'luke', '', 'bernandino', '+639605387818', '2025-06-26 23:45:51'),
(5, '@alexis', 'alexis@gmail.com', '$2y$10$ulkCxo.JfO7DrpibbHy/7eMpCDuOrPQ5Uh34s1UuR5/yDwsd8rdZm', 'alexis', '', 'Ricafort', '+639605387818', '2025-06-27 15:22:02'),
(6, '@dansicutie', 'dansicutie@gmail.com', '$2y$10$jxjroTdKAjav216kKBlq1ep4kH3wKyU9h1ZIIy2iXh77fUTNDE6r6', 'Dansi', '', 'Cutie', '+639999999999', '2025-06-27 22:16:34'),
(7, '@symon', 'symon@gmail.com', '$2y$10$E45V1ZfDJ2PD4w1.O9OSX.tS0RLA7H1zqMATn0JCIN1K3obuPLmLm', 'Symon', 'Vivas', 'Arroyo', '+639605387212', '2025-06-28 16:53:47'),
(8, '@joyce', 'joyce@gmail.com', '$2y$10$heWpNA9i.ndp8Vb4eOp.1.VD9gRR6ApY9cqC064hYpsYPqaW6Y8Fq', 'alexis', '', 'ricafort', '+630960538794', '2025-06-28 17:21:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `pixiedust_appointment_tbl`
--
ALTER TABLE `pixiedust_appointment_tbl`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `pixiedust_appointment_tbl_ibfk_1` (`user_id`),
  ADD KEY `pixiedust_appointment_tbl_ibfk_2` (`admin_id`);

--
-- Indexes for table `pixiedust_user_tbl`
--
ALTER TABLE `pixiedust_user_tbl`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pixiedust_appointment_tbl`
--
ALTER TABLE `pixiedust_appointment_tbl`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pixiedust_user_tbl`
--
ALTER TABLE `pixiedust_user_tbl`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pixiedust_appointment_tbl`
--
ALTER TABLE `pixiedust_appointment_tbl`
  ADD CONSTRAINT `pixiedust_appointment_tbl_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `pixiedust_user_tbl` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pixiedust_appointment_tbl_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin_tbl` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
