-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2018 at 07:14 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `procrastination`
--

-- --------------------------------------------------------

--
-- Table structure for table `createlist`
--

CREATE TABLE `createlist` (
  `userID` int(10) NOT NULL,
  `listTitle` varchar(30) NOT NULL,
  `listDescription` text NOT NULL,
  `Visibility` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `createlist`
--

INSERT INTO `createlist` (`userID`, `listTitle`, `listDescription`, `Visibility`) VALUES
(3, 'Sing', '', 'pub'),
(16, 'Fun', '', 'pub');

-- --------------------------------------------------------

--
-- Table structure for table `createtask`
--

CREATE TABLE `createtask` (
  `userID` int(11) NOT NULL,
  `taskID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `taskTitle` varchar(30) NOT NULL,
  `taskDescription` text NOT NULL,
  `listTitle` varchar(30) NOT NULL,
  `Visibility` char(3) NOT NULL,
  `dueDate` date NOT NULL,
  `priorityLVL` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `createtask`
--

INSERT INTO `createtask` (`userID`, `taskID`, `username`, `taskTitle`, `taskDescription`, `listTitle`, `Visibility`, `dueDate`, `priorityLVL`) VALUES
(3, 17, '', 'Practice A', 'do this ', 'Sing ', 'pub', '2018-12-20', 'm'),
(16, 18, '', 'Fun things AA', 'somethin', 'Fun ', 'pub', '0000-00-00', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `gender` char(1) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `password`, `gender`, `email`, `phone`) VALUES
(16, 'Cardi', '9d5ed678fe57bcca610140957afab571', 'f', 'abcde', 1234567899),
(17, 'Jack', '4ff9fc6e4e5d5f590c4f2134a8cc96d1', 'm', 'jack', 55656454545465);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `createtask`
--
ALTER TABLE `createtask`
  ADD PRIMARY KEY (`taskID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `createtask`
--
ALTER TABLE `createtask`
  MODIFY `taskID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
