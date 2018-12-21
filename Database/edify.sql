-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2018 at 09:09 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edify`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic`
--

CREATE TABLE `academic` (
  `u_id` int(11) NOT NULL,
  `Bid` varchar(30) DEFAULT NULL,
  `sem` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `addsub`
--

CREATE TABLE `addsub` (
  `u_id` int(20) DEFAULT NULL,
  `sid` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `annsid` int(20) NOT NULL,
  `qid` int(20) DEFAULT NULL,
  `u_id` int(20) DEFAULT NULL,
  `ansBody` longtext,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `Bid` varchar(30) NOT NULL,
  `Bname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`Bid`, `Bname`) VALUES
('B1', 'Computer Engineering'),
('B2', 'Information Technology'),
('B3', 'Electrical Engineering'),
('B4', 'Electronics Engineering'),
('B5', 'Electronics and Telecommunication Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `nid` int(200) NOT NULL,
  `recid` int(20) DEFAULT NULL,
  `senid` int(20) DEFAULT NULL,
  `qid` int(20) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uniqid` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `u_id` int(20) DEFAULT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `body` mediumtext,
  `qid` int(20) NOT NULL,
  `Sname` varchar(500) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uniqid` mediumtext NOT NULL,
  `state` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recovery_keys`
--

CREATE TABLE `recovery_keys` (
  `rid` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `token` varchar(50) NOT NULL,
  `valid` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sid` int(20) NOT NULL,
  `Bid` varchar(30) DEFAULT NULL,
  `Sname` varchar(60) DEFAULT NULL,
  `sem` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sid`, `Bid`, `Sname`, `sem`) VALUES
(1, 'B1', 'Applied Mathematics-I', 'sem1'),
(2, 'B1', 'Applied Physics-I', 'sem1'),
(3, 'B1', 'Applied Chemistry -I', 'sem1'),
(4, 'B1', 'Engineering Mechanics', 'sem1'),
(5, 'B1', 'Basic Electrical Engineering ', 'sem1'),
(6, 'B2', 'Applied Mathematics-I', 'sem1'),
(7, 'B2', 'Applied Physics-I', 'sem1'),
(8, 'B2', 'Applied Chemistry -I', 'sem1'),
(9, 'B2', 'Engineering Mechanics', 'sem1'),
(10, 'B2', 'Basic Electrical Engineering ', 'sem1'),
(11, 'B3', 'Applied Mathematics-I', 'sem1'),
(12, 'B3', 'Applied Physics-I', 'sem1'),
(13, 'B3', 'Applied Chemistry -I', 'sem1'),
(14, 'B3', 'Engineering Mechanics', 'sem1'),
(15, 'B3', 'Basic Electrical Engineering ', 'sem1'),
(16, 'B4', 'Applied Mathematics-I', 'sem1'),
(17, 'B4', 'Applied Physics-I', 'sem1'),
(18, 'B4', 'Applied Chemistry -I', 'sem1'),
(19, 'B4', 'Engineering Mechanics', 'sem1'),
(20, 'B4', 'Basic Electrical Engineering ', 'sem1'),
(21, 'B5', 'Applied Mathematics-I', 'sem1'),
(22, 'B5', 'Applied Physics-I', 'sem1'),
(23, 'B5', 'Applied Chemistry -I', 'sem1'),
(24, 'B5', 'Engineering Mechanics', 'sem1'),
(25, 'B5', 'Basic Electrical Engineering ', 'sem1'),
(26, 'B1', 'Applied Mathematics-II', 'sem2'),
(27, 'B1', 'Applied Physics-II', 'sem2'),
(28, 'B1', 'Applied Chemistry -II', 'sem2'),
(29, 'B1', 'Engineering Drawing', 'sem2'),
(30, 'B1', 'Structured Programming Approach', 'sem2'),
(31, 'B2', 'Applied Mathematics-II', 'sem2'),
(32, 'B2', 'Applied Physics-II', 'sem2'),
(33, 'B2', 'Applied Chemistry -II', 'sem2'),
(34, 'B2', 'Engineering Drawing', 'sem2'),
(35, 'B2', 'Structured Programming Approach', 'sem2'),
(36, 'B3', 'Applied Mathematics-II', 'sem2'),
(37, 'B3', 'Applied Physics-II', 'sem2'),
(38, 'B3', 'Applied Chemistry -II', 'sem2'),
(39, 'B3', 'Engineering Drawing', 'sem2'),
(40, 'B3', 'Structured Programming Approach', 'sem2'),
(41, 'B4', 'Applied Mathematics-II', 'sem2'),
(42, 'B4', 'Applied Physics-II', 'sem2'),
(43, 'B4', 'Applied Chemistry -II', 'sem2'),
(44, 'B4', 'Engineering Drawing', 'sem2'),
(45, 'B4', 'Structured Programming Approach', 'sem2'),
(46, 'B5', 'Applied Mathematics-II', 'sem2'),
(47, 'B5', 'Applied Physics-II', 'sem2'),
(48, 'B5', 'Applied Chemistry -II', 'sem2'),
(49, 'B5', 'Engineering Drawing', 'sem2'),
(50, 'B5', 'Structured Programming Approach', 'sem2'),
(51, 'B1', 'Applied Mathematics-III', 'sem3'),
(52, 'B1', 'Logic Design', 'sem3'),
(53, 'B1', 'Data Structures & Analysis', 'sem3'),
(54, 'B1', 'Database Management System', 'sem3'),
(55, 'B1', 'Principle of Communications', 'sem3'),
(56, 'B1', 'Applied Mathematics-IV', 'sem4'),
(57, 'B1', 'Computer Networks', 'sem4'),
(58, 'B1', 'Operating Systems', 'sem4'),
(59, 'B1', 'Computer Organization and Architecture', 'sem4'),
(60, 'B1', 'Automata Theory', 'sem4'),
(61, 'B3', 'Applied Mathematics-III', 'sem3'),
(62, 'B3', 'Electronic Devices and Circuits ', 'sem3'),
(63, 'B3', 'Conventional and Non-Conventional Power Generation', 'sem3'),
(64, 'B3', 'Electrical and Electronics Measurement', 'sem3'),
(65, 'B3', 'Electrical Machine – I', 'sem3'),
(66, 'B3', 'Applied Mathematics-IV', 'sem4'),
(67, 'B3', 'Power System - I', 'sem4'),
(68, 'B3', 'Electrical Machines – II', 'sem4'),
(69, 'B3', 'Electromagnetic Field and wave Theory', 'sem4'),
(70, 'B3', 'Analog and Digital Integrated Circuits', 'sem4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(20) NOT NULL,
  `u_name` char(50) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_username` varchar(50) NOT NULL,
  `u_password` varchar(50000) NOT NULL,
  `status` int(20) NOT NULL,
  `profileLoc` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic`
--
ALTER TABLE `academic`
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `addsub`
--
ALTER TABLE `addsub`
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`annsid`),
  ADD KEY `qid` (`qid`),
  ADD KEY `u_id` (`u_id`);
ALTER TABLE `answers` ADD FULLTEXT KEY `ansBody` (`ansBody`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`Bid`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `recovery_keys`
--
ALTER TABLE `recovery_keys`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `annsid` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `nid` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `recovery_keys`
--
ALTER TABLE `recovery_keys`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic`
--
ALTER TABLE `academic`
  ADD CONSTRAINT `academic_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `addsub`
--
ALTER TABLE `addsub`
  ADD CONSTRAINT `addsub_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`qid`) REFERENCES `questions` (`qid`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
