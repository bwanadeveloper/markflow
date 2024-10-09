-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 07:01 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `User_id`, `Username`, `Email`, `Password`, `Name`, `Role`) VALUES
(1, 2147483647, 'DeanB', 'marixman54@gmail.com', 'password', 'Felix Abondo', 'Dean'),
(2, 1974838809, 'Chair Of Department', 'marixman7@gmail.com', 'password', '', 'Chair of Departments'),
(3, 904464712, 'DVC of Academics', 'marixmem10@gmail.com', 'password', '', 'DVC of Academics');

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
  `Trimester` varchar(20) NOT NULL,
  `Year` varchar(20) NOT NULL,
  `Res_info` text DEFAULT NULL,
  `Time` datetime NOT NULL DEFAULT current_timestamp(),
  `Resolved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `missing_marks`
--

INSERT INTO `missing_marks` (`id`, `Missing_id`, `User_id`, `Unit`, `Name`, `Reg`, `School`, `Lec`, `Exam`, `Ass1`, `Ass2`, `Ass3`, `Cat1`, `Cat2`, `Info`, `Trimester`, `Year`, `Res_info`, `Time`, `Resolved`) VALUES
(2, 813771764, 16461812411, 'Application Programming', 'Mark Otieno', '22/02646', 'Technology', 'Rodgers Abongo', 1, 0, 0, 0, 0, 0, 'i dont have exam', 'Trimester 1', '2024', '', '2024-10-08 20:22:05', 0),
(3, 9207461316, 16461812411, 'Application Programming', 'Mark Otieno', '22/02646', 'Technology', 'Zipporah Munene', 0, 1, 0, 0, 0, 0, 'i dont have ass1', 'Trimester 1', '2024', '', '2024-10-08 20:26:38', 0),
(4, 1761214141216, 16461812411, 'Database Design and Development', 'Mark Otieno', '22/02646', 'Technology', 'Sally Masinde', 1, 0, 0, 0, 0, 0, 'i dont have exam', 'Trimester 1', '2024', '', '2024-10-08 20:28:43', 0),
(5, 18512111448, 16461812411, 'Database Design and Development', 'Mark Otieno', '22/02646', 'Technology', 'Sally Masinde', 1, 0, 0, 0, 0, 0, 'i dont have exam', 'Trimester 2', '2024', '', '2024-10-08 20:31:48', 0),
(6, 91041582010, 16461812411, 'Database Design and Development', 'Mark Otieno', '22/02646', 'Technology', 'Sally Masinde', 1, 0, 0, 0, 0, 0, 'i dont have exam', 'Trimester 2', '2024', '', '2024-10-08 20:32:48', 0),
(7, 1011191819710, 16461812411, 'Database Design and Development', 'Mark Otieno', '22/02646', 'Technology', 'Sally Masinde', 0, 0, 0, 1, 0, 0, 'i dont have ass3', 'Trimester 1', '2024', '', '2024-10-08 20:38:49', 0),
(8, 5177134175, 16461812411, 'Database Design and Development', 'Mark Otieno', '22/02646', 'Technology', 'Sally Masinde', 0, 0, 0, 1, 0, 0, 'i dont have ass3', 'Trimester 1', '2023', '', '2024-10-08 20:40:52', 0),
(9, 1094818198, 16461812411, 'Database Design and Development', 'Mark Otieno', '22/02646', 'Technology', 'Mundian Wangeshi', 0, 1, 0, 0, 0, 0, 'dont have ass1', 'Trimester 2', '2024', '', '2024-10-08 21:07:44', 0),
(10, 516165131212, 16461812411, 'Database Design and Development', 'Mark Otieno', '22/02646', 'Technology', 'Sally Masinde', 0, 0, 1, 0, 0, 0, 'i dont have ass2', 'Trimester 3', '2023', '40', '2024-10-09 11:38:36', 1),
(11, 19111215769, 16461812411, 'Application Programming', 'Mark Otieno', '22/02646', 'Technology', 'Mundian Wangeshi', 1, 0, 0, 0, 0, 0, 'i dont have exam', 'Trimester 1', '2024', '35', '2024-10-09 11:34:20', 1),
(12, 101711817619, 16461812411, 'Database Design and Development', 'Mark Otieno', '22/02646', 'Technology', 'Sally Masinde', 1, 0, 0, 0, 0, 0, 'i dont have exam', 'Trimester 1', '2024', '40', '2024-10-08 22:00:58', 1),
(13, 818141371712, 16461812411, 'Database Design and Development', 'Mark Otieno', '22/02646', 'Technology', 'Mundian Wangeshi', 1, 0, 0, 0, 0, 0, 'i dont have exam', 'Trimester 2', '2024', '35', '2024-10-08 21:57:08', 1);

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
(2, 1819111412816, 'Wambui GG', 'Wambui Otieno', 'wambui@gmail.com', 'password', '22/02543', 'Technology', 'Main');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missing_marks`
--
ALTER TABLE `missing_marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Resolved` (`Resolved`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reg_no` (`reg_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `missing_marks`
--
ALTER TABLE `missing_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
