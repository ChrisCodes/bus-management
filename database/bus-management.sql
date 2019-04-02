-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2019 at 12:15 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus-management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `profile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `profile`) VALUES
(1, 'Hope Cutie', 'chrisnewcarson@gmail.com', 'hope001', '-'),
(2, 'Amanda Stacy', 'valley@gmail.com', 'valley001', '-'),
(3, 'John Benard Doe', 'valley3@gmail.com', 'milimani', '-');

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `plate` varchar(255) NOT NULL,
  `route` varchar(255) NOT NULL,
  `seats` int(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `name`, `plate`, `route`, `seats`, `image`) VALUES
(1, 'Transline Classic', 'KAC 234D', '1', 45, 'http://localhost/bus-management/images/buses/bus_transline_classic_84973898.jpeg'),
(2, 'Easy Coach', 'KAV 564F', '1', 32, 'http://localhost/bus-management/images/buses/bus_easy_coach_1414468201.jpeg'),
(3, 'Guardian Angel', 'KAY 112K', '3', 62, 'http://localhost/bus-management/images/buses/bus_guardian_angel_915201182.jpeg'),
(4, 'Coast Comfort', 'KAD 765J', '2', 60, 'http://localhost/bus-management/images/buses/bus_coast_comfort_1673682217.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `profile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `password`, `profile`) VALUES
(1, 'Hope Cutie', 'h.muigai@starskillventures.org', '-', 'valley001', '-');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(255) NOT NULL,
  `departure` text NOT NULL,
  `destination` text NOT NULL,
  `fare` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `departure`, `destination`, `fare`) VALUES
(1, 'Nairobi', 'Nairobi', '800'),
(2, 'Nairobi', 'Nairobi', '800'),
(3, 'Nairobi', 'Mombasa', '5666'),
(4, 'Nairobi', 'Kwale', '700'),
(5, 'Runda', 'CBD', '100');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(255) NOT NULL,
  `bus_id` varchar(255) NOT NULL,
  `seat_no` int(255) NOT NULL,
  `booking` varchar(255) NOT NULL DEFAULT 'empty-seat',
  `customer_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `bus_id`, `seat_no`, `booking`, `customer_id`) VALUES
(1, '1', 1, 'occupied', '1'),
(2, '1', 2, 'empty-seat', 'none'),
(3, '1', 3, 'empty-seat', 'none'),
(4, '1', 4, 'empty-seat', 'none'),
(5, '1', 5, 'empty-seat', 'none'),
(6, '1', 6, 'empty-seat', 'none'),
(7, '1', 7, 'empty-seat', 'none'),
(8, '1', 8, 'empty-seat', 'none'),
(9, '1', 9, 'empty-seat', 'none'),
(10, '1', 10, 'empty-seat', 'none'),
(11, '1', 11, 'empty-seat', 'none'),
(12, '1', 12, 'empty-seat', 'none'),
(13, '1', 13, 'empty-seat', 'none'),
(14, '1', 14, 'empty-seat', 'none'),
(15, '1', 15, 'empty-seat', 'none'),
(16, '1', 16, 'empty-seat', 'none'),
(17, '1', 17, 'empty-seat', 'none'),
(18, '1', 18, 'empty-seat', 'none'),
(19, '1', 19, 'empty-seat', 'none'),
(20, '1', 20, 'empty-seat', 'none'),
(21, '1', 21, 'empty-seat', 'none'),
(22, '1', 22, 'empty-seat', 'none'),
(23, '1', 23, 'empty-seat', 'none'),
(24, '1', 24, 'empty-seat', 'none'),
(25, '1', 25, 'empty-seat', 'none'),
(26, '1', 26, 'empty-seat', 'none'),
(27, '1', 27, 'empty-seat', 'none'),
(28, '1', 28, 'empty-seat', 'none'),
(29, '1', 29, 'empty-seat', 'none'),
(30, '1', 30, 'empty-seat', 'none'),
(31, '1', 31, 'empty-seat', 'none'),
(32, '1', 32, 'empty-seat', 'none'),
(33, '1', 33, 'empty-seat', 'none'),
(34, '1', 34, 'empty-seat', 'none'),
(35, '1', 35, 'empty-seat', 'none'),
(36, '1', 36, 'empty-seat', 'none'),
(37, '1', 37, 'empty-seat', 'none'),
(38, '1', 38, 'empty-seat', 'none'),
(39, '1', 39, 'empty-seat', 'none'),
(40, '1', 40, 'empty-seat', 'none'),
(41, '1', 41, 'empty-seat', 'none'),
(42, '1', 42, 'empty-seat', 'none'),
(43, '1', 43, 'empty-seat', 'none'),
(44, '1', 44, 'empty-seat', 'none'),
(45, '1', 45, 'empty-seat', 'none'),
(46, '2', 1, 'empty-seat', 'none'),
(47, '2', 2, 'empty-seat', 'none'),
(48, '2', 3, 'empty-seat', 'none'),
(49, '2', 4, 'empty-seat', 'none'),
(50, '2', 5, 'empty-seat', 'none'),
(51, '2', 6, 'empty-seat', 'none'),
(52, '2', 7, 'empty-seat', 'none'),
(53, '2', 8, 'empty-seat', 'none'),
(54, '2', 9, 'empty-seat', 'none'),
(55, '2', 10, 'empty-seat', 'none'),
(56, '2', 11, 'empty-seat', 'none'),
(57, '2', 12, 'empty-seat', 'none'),
(58, '2', 13, 'empty-seat', 'none'),
(59, '2', 14, 'empty-seat', 'none'),
(60, '2', 15, 'empty-seat', 'none'),
(61, '2', 16, 'empty-seat', 'none'),
(62, '2', 17, 'empty-seat', 'none'),
(63, '2', 18, 'empty-seat', 'none'),
(64, '2', 19, 'empty-seat', 'none'),
(65, '2', 20, 'empty-seat', 'none'),
(66, '2', 21, 'empty-seat', 'none'),
(67, '2', 22, 'empty-seat', 'none'),
(68, '2', 23, 'empty-seat', 'none'),
(69, '2', 24, 'empty-seat', 'none'),
(70, '2', 25, 'empty-seat', 'none'),
(71, '2', 26, 'empty-seat', 'none'),
(72, '2', 27, 'empty-seat', 'none'),
(73, '2', 28, 'empty-seat', 'none'),
(74, '2', 29, 'empty-seat', 'none'),
(75, '2', 30, 'empty-seat', 'none'),
(76, '2', 31, 'empty-seat', 'none'),
(77, '2', 32, 'empty-seat', 'none'),
(78, '3', 1, 'occupied', '1'),
(79, '3', 2, 'empty-seat', 'none'),
(80, '3', 3, 'empty-seat', 'none'),
(81, '3', 4, 'empty-seat', 'none'),
(82, '3', 5, 'empty-seat', 'none'),
(83, '3', 6, 'empty-seat', 'none'),
(84, '3', 7, 'empty-seat', 'none'),
(85, '3', 8, 'empty-seat', 'none'),
(86, '3', 9, 'empty-seat', 'none'),
(87, '3', 10, 'empty-seat', 'none'),
(88, '3', 11, 'empty-seat', 'none'),
(89, '3', 12, 'empty-seat', 'none'),
(90, '3', 13, 'empty-seat', 'none'),
(91, '3', 14, 'empty-seat', 'none'),
(92, '3', 15, 'empty-seat', 'none'),
(93, '3', 16, 'empty-seat', 'none'),
(94, '3', 17, 'empty-seat', 'none'),
(95, '3', 18, 'empty-seat', 'none'),
(96, '3', 19, 'empty-seat', 'none'),
(97, '3', 20, 'empty-seat', 'none'),
(98, '3', 21, 'empty-seat', 'none'),
(99, '3', 22, 'empty-seat', 'none'),
(100, '3', 23, 'empty-seat', 'none'),
(101, '3', 24, 'empty-seat', 'none'),
(102, '3', 25, 'empty-seat', 'none'),
(103, '3', 26, 'empty-seat', 'none'),
(104, '3', 27, 'empty-seat', 'none'),
(105, '3', 28, 'empty-seat', 'none'),
(106, '3', 29, 'empty-seat', 'none'),
(107, '3', 30, 'empty-seat', 'none'),
(108, '3', 31, 'empty-seat', 'none'),
(109, '3', 32, 'empty-seat', 'none'),
(110, '3', 33, 'empty-seat', 'none'),
(111, '3', 34, 'empty-seat', 'none'),
(112, '3', 35, 'empty-seat', 'none'),
(113, '3', 36, 'empty-seat', 'none'),
(114, '3', 37, 'empty-seat', 'none'),
(115, '3', 38, 'empty-seat', 'none'),
(116, '3', 39, 'empty-seat', 'none'),
(117, '3', 40, 'empty-seat', 'none'),
(118, '3', 41, 'empty-seat', 'none'),
(119, '3', 42, 'empty-seat', 'none'),
(120, '3', 43, 'empty-seat', 'none'),
(121, '3', 44, 'empty-seat', 'none'),
(122, '3', 45, 'empty-seat', 'none'),
(123, '3', 46, 'empty-seat', 'none'),
(124, '3', 47, 'empty-seat', 'none'),
(125, '3', 48, 'empty-seat', 'none'),
(126, '3', 49, 'empty-seat', 'none'),
(127, '3', 50, 'empty-seat', 'none'),
(128, '3', 51, 'empty-seat', 'none'),
(129, '3', 52, 'empty-seat', 'none'),
(130, '3', 53, 'empty-seat', 'none'),
(131, '3', 54, 'empty-seat', 'none'),
(132, '3', 55, 'empty-seat', 'none'),
(133, '3', 56, 'empty-seat', 'none'),
(134, '3', 57, 'empty-seat', 'none'),
(135, '3', 58, 'empty-seat', 'none'),
(136, '3', 59, 'empty-seat', 'none'),
(137, '3', 60, 'empty-seat', 'none'),
(138, '3', 61, 'empty-seat', 'none'),
(139, '3', 62, 'empty-seat', 'none'),
(140, '4', 1, 'empty-seat', 'none'),
(141, '4', 2, 'empty-seat', 'none'),
(142, '4', 3, 'empty-seat', 'none'),
(143, '4', 4, 'empty-seat', 'none'),
(144, '4', 5, 'empty-seat', 'none'),
(145, '4', 6, 'empty-seat', 'none'),
(146, '4', 7, 'empty-seat', 'none'),
(147, '4', 8, 'empty-seat', 'none'),
(148, '4', 9, 'empty-seat', 'none'),
(149, '4', 10, 'empty-seat', 'none'),
(150, '4', 11, 'empty-seat', 'none'),
(151, '4', 12, 'empty-seat', 'none'),
(152, '4', 13, 'empty-seat', 'none'),
(153, '4', 14, 'empty-seat', 'none'),
(154, '4', 15, 'empty-seat', 'none'),
(155, '4', 16, 'empty-seat', 'none'),
(156, '4', 17, 'empty-seat', 'none'),
(157, '4', 18, 'empty-seat', 'none'),
(158, '4', 19, 'empty-seat', 'none'),
(159, '4', 20, 'empty-seat', 'none'),
(160, '4', 21, 'empty-seat', 'none'),
(161, '4', 22, 'empty-seat', 'none'),
(162, '4', 23, 'empty-seat', 'none'),
(163, '4', 24, 'empty-seat', 'none'),
(164, '4', 25, 'empty-seat', 'none'),
(165, '4', 26, 'empty-seat', 'none'),
(166, '4', 27, 'empty-seat', 'none'),
(167, '4', 28, 'empty-seat', 'none'),
(168, '4', 29, 'empty-seat', 'none'),
(169, '4', 30, 'empty-seat', 'none'),
(170, '4', 31, 'empty-seat', 'none'),
(171, '4', 32, 'empty-seat', 'none'),
(172, '4', 33, 'empty-seat', 'none'),
(173, '4', 34, 'empty-seat', 'none'),
(174, '4', 35, 'empty-seat', 'none'),
(175, '4', 36, 'empty-seat', 'none'),
(176, '4', 37, 'empty-seat', 'none'),
(177, '4', 38, 'empty-seat', 'none'),
(178, '4', 39, 'empty-seat', 'none'),
(179, '4', 40, 'empty-seat', 'none'),
(180, '4', 41, 'empty-seat', 'none'),
(181, '4', 42, 'empty-seat', 'none'),
(182, '4', 43, 'empty-seat', 'none'),
(183, '4', 44, 'empty-seat', 'none'),
(184, '4', 45, 'empty-seat', 'none'),
(185, '4', 46, 'empty-seat', 'none'),
(186, '4', 47, 'empty-seat', 'none'),
(187, '4', 48, 'empty-seat', 'none'),
(188, '4', 49, 'empty-seat', 'none'),
(189, '4', 50, 'empty-seat', 'none'),
(190, '4', 51, 'empty-seat', 'none'),
(191, '4', 52, 'empty-seat', 'none'),
(192, '4', 53, 'empty-seat', 'none'),
(193, '4', 54, 'empty-seat', 'none'),
(194, '4', 55, 'empty-seat', 'none'),
(195, '4', 56, 'empty-seat', 'none'),
(196, '4', 57, 'empty-seat', 'none'),
(197, '4', 58, 'empty-seat', 'none'),
(198, '4', 59, 'empty-seat', 'none'),
(199, '4', 60, 'empty-seat', 'none');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
