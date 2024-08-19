-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2024 at 01:46 PM
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
-- Database: `students_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_no` int(255) NOT NULL,
  `announcer_rank` varchar(255) NOT NULL,
  `announcer_name` varchar(255) NOT NULL,
  `news_class` varchar(255) NOT NULL,
  `headline` varchar(500) NOT NULL,
  `news_main` varchar(1000) NOT NULL,
  `news_date` varchar(50) NOT NULL,
  `news_updates` varchar(1000) NOT NULL,
  `news_photo` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_no`, `announcer_rank`, `announcer_name`, `news_class`, `headline`, `news_main`, `news_date`, `news_updates`, `news_photo`) VALUES
(1, '7', 'GEORGE MAPHOLE', 'sports', 'The season of this year is about to start!', 'Welcome to the season of this year. This year, the season is going to start in March. If you are excited with this news, you can register your name to the sports master or the sports prefect!', '2024-08-17', 'important', 'media/images/news/sports5.jpg'),
(2, '7', 'GEORGE MAPHOLE', 'academics', 'The exam is about to start.', 'The exams are about to start, are you ready? If you are, congratulation. If you are not, please study to make you and your teachers proud', '2024-08-17', 'important', 'media/images/news/class.jpg'),
(3, '5', 'EDMUND KOMBA', 'sports', 'Welcome to this year where all seasons start.', 'It is the year of start of all seasons. You are all welcomed. After all the premier league has started. No, life has started making sense. Please, do not dwell much in the premier league and forget about studies. This is what I remind you all!!!', '2024-08-17', 'important', 'media/images/news/sports3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
