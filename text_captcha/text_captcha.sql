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
-- Database: `text_captcha`
--

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
(61, 'valite');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image_ans`
--
ALTER TABLE `image_ans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image_ans`
--
ALTER TABLE `image_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
