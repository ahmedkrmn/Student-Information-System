-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2018 at 07:17 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--


CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_degree` int(11) NOT NULL,
  `study_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `max_degree`, `study_year`) VALUES
(1, 'math', 150, 1),
(2, 'physics', 100, 1),
(3, 'mechanics', 125, 1),
(4, 'computer', 100, 2),
(5, 'network', 125, 2),
(6, 'control', 125, 2);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `degree` int(11) NOT NULL,
  `examine_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `student_id`, `course_id`, `degree`, `examine_at`) VALUES
(2, 1, 2, 75, '2017-06-08'),
(3, 1, 3, 88, '2017-06-12'),
(4, 2, 1, 100, '2017-06-01'),
(5, 2, 2, 95, '2017-06-08'),
(6, 2, 3, 75, '2017-06-12'),
(7, 3, 1, 85, '2017-06-01'),
(8, 3, 2, 92, '2017-06-08'),
(9, 3, 3, 83, '2017-06-12'),
(10, 4, 1, 82, '2017-06-01'),
(11, 4, 2, 93, '2017-06-08'),
(12, 4, 3, 84, '2017-06-12'),
(13, 5, 1, 82, '2017-06-01'),
(14, 5, 2, 86, '2017-06-08'),
(15, 5, 3, 93, '2017-06-12'),
(16, 1, 4, 83, '2018-06-01'),
(17, 1, 5, 79, '2018-06-08'),
(18, 1, 6, 82, '2018-06-12'),
(19, 2, 4, 92, '2018-06-01'),
(20, 2, 5, 86, '2018-06-08'),
(21, 2, 6, 87, '2018-06-12'),
(22, 3, 4, 91, '2018-06-01'),
(23, 3, 5, 92, '2018-06-08'),
(24, 3, 6, 84, '2018-06-12'),
(25, 4, 4, 93, '2018-06-01'),
(26, 4, 5, 94, '2018-06-08'),
(27, 4, 6, 85, '2018-06-12'),
(28, 5, 4, 81, '2018-06-01'),
(29, 5, 5, 98, '2018-06-08'),
(30, 5, 6, 99, '2018-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`) VALUES
(1, 'Ahmed Mohamed'),
(2, 'Said Samy'),
(3, 'Safaa Magdy'),
(4, 'Nagy Nady'),
(5, 'Noor Ahmed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
