-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2018 at 08:25 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `collage_captcha`
--

-- --------------------------------------------------------

--
-- Table structure for table `collage_ans`
--

CREATE TABLE `collage_ans` (
  `folder_name` int(11) NOT NULL,
  `file_name` int(11) NOT NULL,
  `question` varchar(150) NOT NULL,
  `answer` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collage_ans`
--

INSERT INTO `collage_ans` (`folder_name`, `file_name`, `question`, `answer`) VALUES
(1, 1, 'How many Donald Duck clones are there in each image?', 422),
(2, 1, 'How many Jerry Mouse clones are there in each image?', 631),
(3, 1, 'How many people doing diving are there in each image?', 332),
(4, 1, 'How many ovens are there in each image?', 501),
(5, 1, 'How many policemen are there in each image?', 712),
(6, 1, 'How many jugs are there in each image?', 141),
(7, 1, 'How many Jerry Mouse clones are there in each image?', 424),
(8, 1, 'How many starfishes are there in each image?', 621),
(9, 1, 'How many Astro Boy clones are there in each image?', 216),
(10, 1, 'How many telescopes are there in each image?', 133),
(11, 1, 'How many babies are there in each image?', 532),
(12, 1, 'How many penguins are there in each image?', 164),
(13, 1, 'How many monkeys are there in each image?', 222),
(14, 1, 'How many stoves are there in each image?', 711),
(15, 1, 'How many pans are there in each image?', 135),
(16, 1, 'How many telescopes are there in each image?', 181),
(17, 1, 'How many pots are there in each image?', 801),
(18, 1, 'How many pairs of chopsticks are there in each image?', 313),
(19, 1, 'How many jugs are there in each image?', 432),
(20, 1, 'How many spatulas are there in each image?', 411);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collage_ans`
--
ALTER TABLE `collage_ans`
  ADD PRIMARY KEY (`folder_name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
