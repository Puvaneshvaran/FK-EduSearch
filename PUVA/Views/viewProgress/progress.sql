-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 12:25 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progress`
--

-- --------------------------------------------------------

--
-- Table structure for table `evaluator`
--

CREATE TABLE `evaluator` (
  `id` int(11) NOT NULL,
  `name_eva` varchar(30) NOT NULL,
  `comment_Eva` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evaluator`
--

INSERT INTO `evaluator` (`id`, `name_eva`, `comment_Eva`) VALUES
(1, 'Faizal', 'Your Project is messy'),
(2, 'Izzati', 'You need more improvement'),
(3, 'Haidar', 'Your project is perfect\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL,
  `name_super` varchar(30) NOT NULL,
  `comment_Super` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`id`, `name_super`, `comment_Super`) VALUES
(1, 'Miss Izzatul', 'Please repair your Project'),
(2, 'Sir Hairi', 'You due date is near. If you have any question, Please contact me'),
(3, 'Miss Sofi', 'Good Work!');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `student_id` varchar(30) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `rating` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `student_id`, `project_name`, `rating`) VALUES
(1, 'CB20067', 'MySejahtera', '3.45'),
(2, 'CD20159', 'BoostApps', '3.68'),
(3, 'CN21658', 'Touch-N-Go', '4.65');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evaluator`
--
ALTER TABLE `evaluator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evaluator`
--
ALTER TABLE `evaluator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
