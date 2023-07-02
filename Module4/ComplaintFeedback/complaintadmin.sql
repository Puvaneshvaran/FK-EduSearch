-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2023 at 05:32 PM
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
-- Database: `kss3`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaintlist`
--

CREATE TABLE `complaintlist` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `type_complaint` varchar(50) NOT NULL,
  `complaint` varchar(100) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(8) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaintlist`
--

INSERT INTO `complaintlist` (`id`, `username`, `type_complaint`, `complaint`, `date`, `time`, `status`) VALUES
(41, 'Ahmad', 'Answer Not Specific', 'BBBBBBB', '22-06-2023', '10:11:54', 'Resolved'),
(43, 'ABU', 'Answer Not Specific', 'AAAAA', '22-06-2023', '11:40:00', 'In Investigation'),
(44, 'Farah', 'Wrongly Assigned Research Area', 'aaaaa', '30-06-2023', '12:08:35', 'On Hold'),
(47, 'Raudhah', 'Answer Not Specific', 'Answer Not Relate To question', '30-06-2023', '21:26:44', 'On Hold');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` int(10) NOT NULL,
  `date` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`, `date`) VALUES
(6, 'Anas', 'anas@anas', '$2y$10$T3PEs2zob6sUnDymZSfm0O9w/Zx1mi2lw7dG0ojMxZrKQtZU7N/f6', 4, '06-06-2023'),
(7, 'moh', 'moh@hhss', '$2y$10$P2ZAIUwlVYAxC8s/ckslGulukHBT72Ah6/m9y.FGmIK8x3q22WTlC', 0, '06-08-2023'),
(8, 'puva', 'puva@puva.com', '$2y$10$ZxOYTzTPvZ6lTgXrG42aJ.GysGINSR.qrE7v.pQm4wMfnaZWl3fQa', 4, '06-08-2023'),
(62, 'momo', 'mohammedgha037@gmail.com', '$2y$10$VAZSbkfO.Zx8tfWzXxffDOhWhJbuZfPSOsJIQzqEfZHG6xQPco/Ta', 1, '06-18-2023'),
(64, 'Dummy', 'anasalzumor@gmail.com', '$2y$10$.yoyvJnpOLD3zgVylR6c9eIwQQnRP9hgCL/4bqeZzLDpve9w73yLO', 1, '06-18-2023'),
(65, 'momo', 'tmcfashion1@gmail.com', '$2y$10$31f0WITa1Igoq..1AJzDXeqv5F3.GehUM2kF6xXRlUL3vbHE3qjle', 3, '06-18-2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaintlist`
--
ALTER TABLE `complaintlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaintlist`
--
ALTER TABLE `complaintlist`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
