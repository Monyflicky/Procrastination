-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2018 at 04:24 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

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
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `date` datetime NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `username`, `date`, `message`) VALUES
(3, 'Michael', '2018-12-15 09:00:00', 'Does anyone have any tips for singing lessons?');

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
(29, 'Concert Prep', '', 'pub'),
(30, 'Chores', '', 'pub'),
(30, 'Schoolwork', '', 'pub');

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
(29, 48, '', 'Dance Show', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Concert Prep ', 'pub', '2018-12-30', 'h'),
(29, 49, '', 'Dance Practice', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Concert Prep ', 'pub', '2018-12-21', 'm'),
(29, 50, '', 'Singing Exam Practice', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Concert Prep ', 'pub', '2018-12-29', 'l'),
(29, 51, '', 'Dance Show B', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Concert Prep ', 'pub', '2019-01-21', 'm'),
(29, 52, '', 'Vocal Lessons with Opera ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Concert Prep ', 'pub', '2019-02-12', 'h'),
(29, 53, '', 'Start Tour', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Concert Prep ', 'pub', '2019-02-03', 'h'),
(29, 54, '', 'Call Mom', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Concert Prep ', 'pub', '2019-01-23', 'l'),
(29, 55, '', 'Sell tickets', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Concert Prep ', 'pub', '2019-01-01', 'm'),
(29, 56, '', 'Sell backstage passes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Concert Prep ', 'pub', '2019-03-02', 'm'),
(29, 57, '', 'Buy costumes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Concert Prep ', 'pub', '2019-01-07', 'h'),
(30, 58, '', 'Clean bathroom', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Chores ', 'pub', '2018-12-25', 'h'),
(30, 59, '', 'Clean room ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Chores ', 'pub', '2018-12-27', 'm'),
(30, 60, '', 'Clean kitchen', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Chores ', 'pub', '2019-01-01', 'l'),
(30, 61, '', 'Organize bookshelf', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Chores ', 'pri', '2019-12-29', 'h'),
(30, 62, '', 'Organize work station ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Chores ', 'pub', '2019-01-04', 'h'),
(30, 63, '', 'Study for 307', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Chores ', 'pub', '2018-12-28', 'h'),
(30, 64, '', 'Take out trash', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Chores ', 'pub', '2019-01-03', 'l'),
(30, 65, '', 'Call dentist', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Chores ', 'pub', '2018-12-27', 'm'),
(30, 66, '', 'Walk dog', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Chores ', 'pub', '2019-02-12', 'h'),
(30, 67, '', 'Pick up cheque', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Chores ', 'pub', '2019-01-10', 'h'),
(30, 68, '', 'Drop off clothes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Chores ', 'pub', '2019-01-08', 'm'),
(30, 69, '', 'Study for Econ227', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Schoolwork ', 'pub', '2019-01-21', 'h'),
(30, 70, '', 'Study for Math223', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Schoolwork ', 'pub', '2019-02-12', 'h'),
(30, 71, '', 'Review Phys 180 notes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Schoolwork ', 'pub', '2019-12-12', 'l'),
(30, 72, '', 'Math 223 Review Session', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Schoolwork ', 'pub', '2019-03-12', 'm'),
(30, 73, '', 'Redo midterms', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Schoolwork ', 'pub', '2019-12-29', 'l'),
(30, 74, '', 'Redo old assignments', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Schoolwork ', 'pub', '2019-10-17', 'm'),
(30, 75, '', 'Office hourse for 273', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Schoolwork ', 'pub', '2018-12-28', 'h'),
(30, 76, '', 'Go for run', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac nibh ultrices, bibendum metus nec, tristique erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Chores ', 'pub', '2018-12-24', 'l'),
(30, 77, '', 'Buy tea', 'oinsoivnaeorlnves', 'Chores ', 'pub', '2018-12-29', 'l');

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
(28, 'Bruno', '38ba178e70015dc411a7337bdcd834ed', '', 'sohcowne', 0),
(29, 'Michael', '7930c951e609e461e8226004ed91a985', '', 'ncionevcwevc', 0),
(30, 'Britney', '9ae7efb0ebbf43a97ef3e7062d780237', '', 'novnoewvoiwenap', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `rid` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `comment_Id` int(11) NOT NULL,
  `time_updated` datetime NOT NULL,
  `replied_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`rid`, `username`, `comment_Id`, `time_updated`, `replied_message`) VALUES
(3, 'Britney', 3, '2018-12-15 09:17:00', 'Yea come to the studio this weekend Michael!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `createtask`
--
ALTER TABLE `createtask`
  MODIFY `taskID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
