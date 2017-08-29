-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2017 at 08:40 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `messages`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(255) NOT NULL,
  `receiver_id` int(255) NOT NULL,
  `sender_id` int(255) NOT NULL,
  `message` text NOT NULL,
  `date_time` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `receiver_id`, `sender_id`, `message`, `date_time`, `status`) VALUES
(1, 2, 1, 'hello', '2017-08-25 11:51:06', ''),
(2, 2, 1, 'asdaw', '2017-08-25 11:57:42', ''),
(3, 2, 1, 'oy', '2017-08-29 02:00:52', ''),
(4, 1, 1, 'hey', '2017-08-29 02:01:40', ''),
(5, 2, 1, 'hey yoooo', '2017-08-29 02:15:37', ''),
(6, 1, 2, 'carl', '2017-08-29 02:18:12', ''),
(7, 2, 1, 'hello', '2017-08-29 02:31:25', ''),
(8, 1, 2, 'carl hello', '2017-08-29 02:40:16', ''),
(9, 1, 2, 'hellllloooo', '2017-08-29 02:40:24', ''),
(10, 2, 1, 'hello', '2017-08-29 03:21:25', ''),
(11, 2, 1, 'hey boi', '2017-08-29 03:21:36', ''),
(12, 2, 1, 'hello', '2017-08-29 03:21:45', ''),
(13, 1, 2, 'caca3', '2017-08-29 03:22:18', ''),
(14, 1, 2, 'casasfda', '2017-08-29 03:22:24', ''),
(15, 2, 1, 'refresh the page', '2017-08-29 03:23:40', ''),
(16, 1, 2, 'ano na?', '2017-08-29 03:25:10', ''),
(17, 2, 1, 'eto', '2017-08-29 03:25:18', ''),
(18, 1, 1, 'asdkj', '2017-08-29 03:25:30', ''),
(19, 1, 2, 'the quick brown fox jumps over the lazy dog', '2017-08-29 03:25:31', ''),
(20, 1, 2, 'qqq qqw qqe www wwq wwe eee eeq eew qwe', '2017-08-29 03:26:27', ''),
(21, 2, 1, 'invo lord', '2017-08-29 03:26:38', ''),
(22, 1, 1, 'oy', '2017-08-29 07:02:26', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `img` varchar(500) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `alias`, `img`, `status`) VALUES
(1, 'carlalmayda', 'carlalmayda', 'King', 'carl.jpg', 'offline'),
(2, 'nath', 'nath', 'Natsu', 'nat.jpg', 'offline');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
