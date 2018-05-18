-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2018 at 01:58 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `captcha`
--

-- --------------------------------------------------------

--
-- Table structure for table `captcha_evaluate_set`
--

CREATE TABLE `captcha_evaluate_set` (
  `id` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `collage_ans`
--

CREATE TABLE `collage_ans` (
  `folder_name` int(11) NOT NULL,
  `question` varchar(150) NOT NULL,
  `answer` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collage_ans`
--

INSERT INTO `collage_ans` (`folder_name`, `question`, `answer`) VALUES
(1, 'How many Donald Duck clones are there in each image?', 422),
(2, 'How many Jerry Mouse clones are there in each image?', 631),
(3, 'How many people doing diving are there in each image?', 332),
(4, 'How many ovens are there in each image?', 501),
(5, 'How many policemen are there in each image?', 712),
(6, 'How many jugs are there in each image?', 141),
(7, 'How many Jerry Mouse clones are there in each image?', 424),
(8, 'How many starfishes are there in each image?', 621),
(9, 'How many Astro Boy clones are there in each image?', 216),
(10, 'How many telescopes are there in each image?', 133),
(11, 'How many babies are there in each image?', 532),
(12, 'How many penguins are there in each image?', 164),
(13, 'How many monkeys are there in each image?', 222),
(14, 'How many stoves are there in each image?', 711),
(15, 'How many pans are there in each image?', 135),
(16, 'How many telescopes are there in each image?', 181),
(17, 'How many pots are there in each image?', 801),
(18, 'How many pairs of chopsticks are there in each image?', 313),
(19, 'How many jugs are there in each image?', 432),
(20, 'How many spatulas are there in each image?', 411);

-- --------------------------------------------------------

--
-- Table structure for table `collage_report`
--

CREATE TABLE `collage_report` (
  `id` int(11) NOT NULL,
  `response` varchar(26) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `image_ans`
--

CREATE TABLE `image_ans` (
  `id` int(11) NOT NULL,
  `answer` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_ans`
--

INSERT INTO `image_ans` (`id`, `answer`) VALUES
(11, 'ghtsgug'),
(12, 'nFinabi'),
(13, 'birdthere'),
(14, 'birdcheese'),
(15, 'politicaltomorrow'),
(16, 'takepublic'),
(17, 'vizesiblen'),
(18, 'ressessecl'),
(19, 'remantersu'),
(20, 'burici'),
(21, 'frupereog'),
(22, 'catseem'),
(23, 'lockhollow'),
(24, 'lineline'),
(25, 'NTcrtInT'),
(26, 'Auckkw'),
(27, '8Y70I01'),
(28, 'muaumwwv'),
(29, 'LIBRARYCAMERA'),
(30, 'BRUSHCAMERA'),
(31, 'SQUARELIBRARY'),
(32, 'Wardwell'),
(33, 'STREETRECEIPT'),
(34, 'MOUTHKNIFE'),
(35, 'MOUTHWINDOW'),
(36, 'NUTKNIFE'),
(37, 'dalerisen'),
(38, 'PLANEPLANE'),
(39, 'atiovemA'),
(40, 'USERUNFRIenDLY'),
(41, 'ntrtyLt'),
(42, 'rITuntht'),
(43, 'hurnmyyF'),
(44, 'crACreh'),
(45, 'cowchin'),
(46, 'nosesharp'),
(47, 'RATBONE'),
(48, 'wideeven'),
(49, 'futurenerve'),
(50, 'ightsiw'),
(51, 'inulkro'),
(52, 'PACEW3X2'),
(53, 'Efffesl'),
(54, 'muthipic'),
(55, 'aminisece'),
(56, 'flirc'),
(57, 'wrans'),
(58, 'unrexc'),
(59, 'iscive'),
(60, 'ejujle'),
(61, 'valite'),
(62, 'untonations');

-- --------------------------------------------------------

--
-- Table structure for table `name_user`
--

CREATE TABLE `name_user` (
  `id` int(11) NOT NULL,
  `name` varchar(26) DEFAULT NULL,
  `last_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `text_report`
--

CREATE TABLE `text_report` (
  `id` int(11) NOT NULL,
  `response` varchar(26) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visual_ans`
--

CREATE TABLE `visual_ans` (
  `folder_name` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `answer` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visual_ans`
--

INSERT INTO `visual_ans` (`folder_name`, `question`, `answer`) VALUES
(1, 'Select all images with bicycles', 357),
(2, 'Select all images with crosswalks', 356),
(3, 'Select all images with palm trees', 678),
(4, 'Select all images with boats', 249),
(5, 'Select all images with a bus', 346),
(6, 'Select all images with statues', 256),
(7, 'Select all images with cars', 467),
(8, 'Select all the images with taxis', 237),
(9, 'Select all images with mountains', 168),
(10, 'Select all images with street signs', 568),
(11, 'Select all images with a bus', 239),
(12, 'Select all images with roads', 678),
(13, 'Select all images with coffee', 679),
(14, 'Select all squares with label helicopter', 123),
(15, 'Select all squares with bridges', 279),
(16, 'Select all images with drinks', 150);

-- --------------------------------------------------------

--
-- Table structure for table `visual_report`
--

CREATE TABLE `visual_report` (
  `id` int(11) NOT NULL,
  `response` varchar(26) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `captcha_evaluate_set`
--
ALTER TABLE `captcha_evaluate_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collage_ans`
--
ALTER TABLE `collage_ans`
  ADD PRIMARY KEY (`folder_name`);

--
-- Indexes for table `collage_report`
--
ALTER TABLE `collage_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_ans`
--
ALTER TABLE `image_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `name_user`
--
ALTER TABLE `name_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `text_report`
--
ALTER TABLE `text_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visual_ans`
--
ALTER TABLE `visual_ans`
  ADD PRIMARY KEY (`folder_name`);

--
-- Indexes for table `visual_report`
--
ALTER TABLE `visual_report`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `captcha_evaluate_set`
--
ALTER TABLE `captcha_evaluate_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `collage_report`
--
ALTER TABLE `collage_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image_ans`
--
ALTER TABLE `image_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `name_user`
--
ALTER TABLE `name_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `text_report`
--
ALTER TABLE `text_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `visual_report`
--
ALTER TABLE `visual_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
