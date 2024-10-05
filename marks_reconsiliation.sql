-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2024 at 04:08 PM
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
-- Database: `marks_reconsiliation`
--

-- --------------------------------------------------------

--
-- Table structure for table `missing_marks`
--

CREATE TABLE `missing_marks` (
  `id` int(11) NOT NULL,
  `Missing_id` bigint(20) NOT NULL,
  `User_id` bigint(20) NOT NULL,
  `Unit` varchar(50) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Reg` varchar(20) NOT NULL,
  `School` varchar(20) NOT NULL,
  `Lec` varchar(20) NOT NULL,
  `Exam` int(11) NOT NULL,
  `Ass1` int(11) NOT NULL,
  `Ass2` int(11) NOT NULL,
  `Ass3` int(11) NOT NULL,
  `Cat1` int(11) NOT NULL,
  `Cat2` int(11) NOT NULL,
  `Info` text NOT NULL,
  `Res_info` text DEFAULT NULL,
  `Time` datetime NOT NULL DEFAULT current_timestamp(),
  `Resolved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `missing_marks`
--

INSERT INTO `missing_marks` (`id`, `Missing_id`, `User_id`, `Unit`, `Name`, `Reg`, `School`, `Lec`, `Exam`, `Ass1`, `Ass2`, `Ass3`, `Cat1`, `Cat2`, `Info`, `Res_info`, `Time`, `Resolved`) VALUES
(1, 511181641910, 16461812411, 'Foundation Mathematics', 'Mark Otieno', '22/02646', 'Technology', 'Yvone Nuni', 0, 0, 1, 0, 0, 0, 'I don&#039;t have Ass2', '', '2024-10-04 20:24:34', 0),
(2, 1410201919195, 16461812411, 'Information Technology', 'Mark Otieno', '22/02646', 'Technology', 'Cosmus Kikorir', 1, 0, 0, 0, 0, 0, 'I don&#039;t have Exam', 'Your marks is 30', '2024-10-04 20:25:31', 1),
(3, 1120618152017, 1819111412816, 'Fundamentals of Web Design', 'Wambui Otieno', '22/02646', 'Technology', 'Susan Wambui', 0, 0, 1, 0, 0, 0, 'I don&#039;t have Ass2 marks yet i attempted', 'Your marks is 30', '2024-10-05 10:24:42', 1),
(4, 52020115519, 16461812411, 'Fundamentals of Web Design', 'Mark Otieno', '22/02646', 'Technology', 'Susan Wambui', 0, 0, 1, 0, 0, 0, 'Don&#039;t have Ass2', '', '2024-10-05 12:10:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `Username` varchar(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `reg_no` varchar(10) DEFAULT NULL,
  `school` varchar(50) DEFAULT NULL,
  `campus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `Username`, `name`, `email`, `password`, `reg_no`, `school`, `campus`) VALUES
(1, 16461812411, 'Marixmen', 'Mark Otieno', 'marixmem9@gmail.com', 'password', '22/02646', 'Technology', 'Western'),
(2, 1819111412816, 'Wambui GG', 'Wambui Otieno', 'wambui@gmail.com', 'password', '22/02646', 'Technology', 'Main');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `missing_marks`
--
ALTER TABLE `missing_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `missing_marks`
--
ALTER TABLE `missing_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
