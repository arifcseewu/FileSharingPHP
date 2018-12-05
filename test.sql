-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2016 at 09:22 AM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `f_name` varchar(30) DEFAULT NULL,
  `comnt` varchar(150) DEFAULT NULL,
  `cmnter` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`f_name`, `comnt`, `cmnter`) VALUES
('dom.html', 'Nice work', 'brainaxe'),
('dom.html', 'Thanks brainAxe', 'tanzim51');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `fullname` varchar(30) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `picname` varchar(15) DEFAULT NULL,
  `location` varchar(25) DEFAULT NULL,
  `about` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`fullname`, `username`, `picname`, `location`, `about`) VALUES
('Tanzim Rizwan', 'tanzim51', 'tanzim51.jpg', 'Dhaka,Bangladesh', 'I am a student.'),
(NULL, 'brainaxe', NULL, NULL, NULL),
(NULL, ' ', NULL, NULL, NULL),
(NULL, '', NULL, NULL, NULL),
(NULL, '', NULL, NULL, NULL),
('Rizwan', 'rizwan063', 'rizwan063.png', 'Pabna,Bangladesh', 'Nice and hard.'),
(NULL, 'nabil', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `student_id` varchar(20) DEFAULT NULL,
  `dept_name` varchar(6) DEFAULT NULL,
  `course_number` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`student_id`, `dept_name`, `course_number`) VALUES
('2013-1-60-063', 'CSE', 'CSE-480'),
('2013-1-60-063', 'CSE', 'CSE-405'),
('2013-1-60-063', 'CSE', 'CSE-107'),
('2013-1-60-063', 'CSE', 'ECO-102'),
('2013-1-60-007', 'CSE', 'CSE-375'),
('2013-1-60-007', 'CSE', 'CSE-405'),
('2013-1-60-007', 'CSE', 'CSE-480'),
('2013-1-60-001', 'CSE', 'CSE-405'),
('2013-1-60-008', 'CSE', 'CSE-360'),
('2013-1-60-032', 'CSE', 'CSE-350'),
('2013-1-60-047', 'CSE', 'CSE-375');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` varchar(15) NOT NULL DEFAULT '',
  `name` varchar(20) DEFAULT NULL,
  `cgpa` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `cgpa`) VALUES
('007', 'shawon', 3.25),
('063', 'Tanzim', 2.72);

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `username` varchar(15) DEFAULT NULL,
  `f_name` varchar(40) DEFAULT NULL,
  `f_des` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`username`, `f_name`, `f_des`) VALUES
('tanzim51', 'dom.html', 'This is js dom.'),
('rizwan063', '61.cpp', 'This is a c++ project.'),
('tanzim51', 'dir_list.py', 'This is a python script.'),
('nabil', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(15) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(30) NOT NULL,
  `joined` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `joined`) VALUES
('brainaxe', 'tanzimrizwan@gmail.com', 'bruENzcHkRS8E', '2016-08-09'),
('nabil', 'nabil@gmail.com', 'naSpJO0ZhsxFY', '2016-08-11'),
('rizwan063', 'rtanzim063@gmail.com', 'rioLU6WqKpa6g', '2016-08-10'),
('tanzim51', 'tanzim51@gmail.com', 'tarRU/F9EJjRU', '2016-08-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`,`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
