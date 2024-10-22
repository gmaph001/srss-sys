-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 18, 2024 at 09:58 PM
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
-- Table structure for table `ujumbe`
--

CREATE TABLE `ujumbe` (
  `id` int(20) NOT NULL,
  `kutoka` varchar(255) NOT NULL,
  `ujumbe` text NOT NULL,
  `kwenda` varchar(500) NOT NULL,
  `muda` int(30) NOT NULL,
  `tarehe` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ujumbe`
--

INSERT INTO `ujumbe` (`id`, `kutoka`, `ujumbe`, `kwenda`, `muda`, `tarehe`) VALUES
(1, 'gmaph__001', 'Hi', 'omz', 1150, '2024-10-13'),
(2, 'omz', 'Hi', 'gmaph__001', 1151, '2024-10-13'),
(3, 'gmaph__001', 'How are u?', '@_love', 1152, '2024-10-13'),
(4, '@_love', 'I\'m good! What abt u?', 'gmaph__001', 1153, '2024-10-13'),
(5, '@_love', 'How are u?', 'omz', 1154, '2024-10-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ujumbe`
--
ALTER TABLE `ujumbe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ujumbe`
--
ALTER TABLE `ujumbe`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
