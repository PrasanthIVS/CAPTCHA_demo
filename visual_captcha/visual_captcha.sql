-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2018 at 08:27 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visual_captcha`
--

-- --------------------------------------------------------

--
-- Table structure for table `visual_ans`
--

CREATE TABLE `visual_ans` (
  `folder_name` int(11) NOT NULL,
  `file_name` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `answer` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visual_ans`
--

INSERT INTO `visual_ans` (`folder_name`, `file_name`, `question`, `answer`) VALUES
(1, 1, 'Select all images with bicycles', 357),
(2, 1, 'Select all images with crosswalks', 356),
(3, 1, 'Select all images with palm trees', 678),
(4, 1, 'Select all images with boats', 249),
(5, 1, 'Select all images with a bus', 346),
(6, 1, 'Select all images with statues', 256),
(7, 1, 'Select all images with cars', 467),
(8, 1, 'Select all the images with taxis', 237),
(9, 1, 'Select all images with mountains', 168),
(10, 1, 'Select all images with street signs', 568),
(11, 1, 'Select all images with a bus', 239),
(12, 1, 'Select all images with roads', 678),
(13, 1, 'Select all images with coffee', 679),
(14, 1, 'Select all squares that match the label \'helicopter\'', 123),
(15, 1, 'Select all squares with bridges', 279),
(16, 1, 'Select all images with drinks', 150);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `visual_ans`
--
ALTER TABLE `visual_ans`
  ADD PRIMARY KEY (`folder_name`,`file_name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
