-- phpMyAdmin SQL Dump
-- version 5.0.0-alpha1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 12, 2020 at 09:56 AM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jackpot`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `balance` decimal(18,2) NOT NULL DEFAULT '0.00',
  `block` int(11) NOT NULL DEFAULT '0',
  `blocktime` varchar(255) DEFAULT NULL,
  `onCreate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `balance`, `block`, `blocktime`, `onCreate`) VALUES
(1, 'kishor@gmail.com', 'kishor@123', '1600.00', 1, '10:17:21', '2020-05-12 00:03:29'),
(2, 'kishor4@gmail.com', 'kishor@123', '0.00', 0, NULL, '2020-05-12 04:24:13'),
(3, 'kishor4shinde@gmail.com', 'kishor@123', '0.00', 1, '10:25:28', '2020-05-12 04:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `userredim`
--

CREATE TABLE `userredim` (
  `rid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `first` int(11) NOT NULL,
  `second` int(11) NOT NULL,
  `third` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userredim`
--

INSERT INTO `userredim` (`rid`, `id`, `first`, `second`, `third`, `point`, `status`) VALUES
(1, 1, 9, 5, 3, 0, 0),
(2, 1, 8, 5, 5, 200, 0),
(3, 1, 6, 8, 7, 0, 0),
(4, 1, 1, 8, 2, 0, 0),
(5, 1, 4, 9, 9, 200, 0),
(6, 1, 4, 7, 2, 0, 0),
(7, 1, 8, 1, 1, 200, 0),
(8, 1, 1, 7, 9, 0, 0),
(9, 1, 2, 7, 2, 200, 0),
(10, 1, 2, 2, 8, 200, 0),
(11, 1, 1, 1, 1, 500, 0),
(12, 1, 7, 9, 5, 0, 0),
(13, 1, 7, 3, 2, 0, 0),
(14, 1, 2, 9, 2, 200, 0),
(15, 3, 2, 1, 5, 0, 0),
(16, 3, 3, 1, 2, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userredim`
--
ALTER TABLE `userredim`
  ADD PRIMARY KEY (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userredim`
--
ALTER TABLE `userredim`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

