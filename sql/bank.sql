-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 08:48 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `sno` int(3) NOT NULL,
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `balance` int(8) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`sno`, `sender`, `receiver`, `balance`, `datetime`) VALUES
(1, 'User_1', 'User_2', 1000, '2021-03-15 13:26:24'),
(2, 'User_1', 'User_2', 1000, '2021-03-15 17:13:56'),
(3, 'User_1', 'User_2', 1000, '2021-03-15 17:14:45'),
(4, 'User_2', 'User_1', 3000, '2021-03-15 17:39:05'),
(5, 'User_1', 'User_2', 1000, '2021-03-15 17:45:34'),
(6, 'User_1', 'User_2', 2000, '2021-03-15 17:46:53'),
(7, 'User_2', 'User_1', 3000, '2021-03-15 21:55:09'),
(8, 'User_3', 'User_1', 1000, '2021-03-15 22:04:43'),
(9, 'User_1', 'User_3', 1000, '2021-03-15 22:11:10'),
(10, 'User_1', 'User_2', 20000, '2021-03-15 22:51:47'),
(11, 'User_1', 'User_10', 1000, '2021-03-17 17:52:19'),
(12, 'User_10', 'User_1', 1000, '2021-03-18 12:57:27'),
(13, 'User_1', 'User_2', 2000, '2021-03-18 13:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `balance` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `balance`) VALUES
(1, 'User_1', 'user1@gmail.com', 28000),
(2, 'User_2', 'user2@gmail.com', 52000),
(3, 'User_3', 'user3@gmail.com', 40000),
(4, 'User_4', 'user4@gmail.com', 50000),
(5, 'User_5', 'user5@gmail.com', 40000),
(6, 'User_6', 'user6@gmail.com', 30000),
(7, 'User_7', 'user7@gmail.com', 50000),
(8, 'User_8', 'user8@gmail.com', 40000),
(9, 'User_9', 'user9@gmail.com', 30000),
(10, 'User_10', 'user10@gmail.com', 50000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `sno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
