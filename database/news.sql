-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2024 at 03:44 PM
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
  `news_photo` varchar(10000) NOT NULL,
  `announcer_ID` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_no`, `announcer_rank`, `announcer_name`, `news_class`, `headline`, `news_main`, `news_date`, `news_updates`, `news_photo`, `announcer_ID`) VALUES
(1, '7', 'GEORGE MAPHOLE', 'sports', 'The season of this year is about to start!', 'Welcome to the season of this year. This year\'s season, the season is going to start in March. If you are excited with this news, you can register your name to the sports master or the sports prefect!', '2024-08-17', 'important', 'media/images/news/sports5.jpg', 585133289),
(2, '7', 'GEORGE MAPHOLE', 'academics', 'The exam is about to start.', 'The exams are about to start, are you ready? If you are, congratulation. If you are not, please study to make you and your teachers proud', '2024-08-17', 'important', 'media/images/news/class.jpg', 585133289),
(13, '1', 'SURYAKANT RAMJI', 'events', 'Welcome to Talent Night!', 'Good morning dear students! I am very delighted to announce to you the coming of Talent night event. It will be a spectacular event that will be visited by many people from outside the country. Please, I urge you all to attend. The entrance fees will be Tshs. 10,000/=, per each person. You can also invite your parents also to attend. You are all welcome!', '2024-08-23', 'important', 'media/images/news/IMG-20221203-WA0118.jpg', 449277543),
(15, '7', 'GEORGE MAPHOLE', 'events', 'Welcome to the ICT week!', 'It is a wonderful day! I am glad to welcome you all to the great technological week. This week will be the Shaaban Robert ICT week! You are all welcome to enjoy the week. The week will be accompanied by very many delightful funny moments, such as games and many others. Also, the launching of official Shaaban Robert\'s student\'s <a href=\"https://shaabanrobertsystem.infinityfreeapp.com\" target=\"_blank\">website</a>)! Please, get ready to enjoy! \r\n\r\nFor any questions, please query <a href=\'form.php\'>here!</a>', '2024-08-28', 'important', 'media/images/news/wallpaperflare.com_wallpaper (11).jpg', 585133289);

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
  MODIFY `news_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
