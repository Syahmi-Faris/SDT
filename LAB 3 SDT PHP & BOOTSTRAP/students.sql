-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2024 at 12:24 PM
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
-- Database: `student_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `studentID` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `program` varchar(10) NOT NULL,
  `year_of_study` enum('YEAR1','YEAR2','YEAR3','YEAR4') NOT NULL,
  `subject_digital_logic` tinyint(1) DEFAULT 0,
  `subject_discrete_structure` tinyint(1) DEFAULT 0,
  `subject_psda` tinyint(1) DEFAULT 0,
  `subject_sad` tinyint(1) DEFAULT 0,
  `subject_programming` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `studentID`, `email`, `phone`, `gender`, `date_of_birth`, `program`, `year_of_study`, `subject_digital_logic`, `subject_discrete_structure`, `subject_psda`, `subject_sad`, `subject_programming`) VALUES
(7, 'Syahmi Faris', 'A23CS0138', 'fsyahmi0707@gmail.com', '0198779670', 'Male', '2024-10-29', 'SECPH', 'YEAR2', 1, 1, 1, 1, 1),
(8, 'Haziq Hafizal', 'A23CS0132', 'haziqhafizal@gmail.com', '0139664402', 'Male', '2003-02-06', 'SECBH', 'YEAR2', 1, 1, 0, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
