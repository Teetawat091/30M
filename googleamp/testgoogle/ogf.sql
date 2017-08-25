-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2017 at 12:42 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ogf`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `branch_lat` varchar(100) COLLATE utf8_bin NOT NULL,
  `branch_lng` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`, `branch_lat`, `branch_lng`) VALUES
(1, 'ภูเก็ต', '7.90608272245317', '98.36664140224457'),
(2, 'หาดใหญ่', '7.006341665683104', '100.4985523223877'),
(3, 'อยุธยา', '14.343238520299131', '100.60918271541595'),
(4, 'สุราษฯ', '9.11065637716888', '99.30181503295898'),
(5, 'ศรีราชา', '13.168317602040103', '100.93120604753494');

-- --------------------------------------------------------

--
-- Table structure for table `branch_destination`
--

CREATE TABLE `branch_destination` (
  `branch_destination_id` int(11) NOT NULL,
  `branch_destination_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `branch_id` int(11) NOT NULL,
  `lat_destination` varchar(100) COLLATE utf8_bin NOT NULL,
  `lng_destination` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `branch_destination`
--

INSERT INTO `branch_destination` (`branch_destination_id`, `branch_destination_name`, `branch_id`, `lat_destination`, `lng_destination`) VALUES
(1, 'เซนทรัล ภูเก็ต', 1, '7.891948760651239\r\n', '98.36819171905518'),
(2, 'มอ ภูเก็ต', 1, '7.894393014197344', '98.35289239883423'),
(3, 'อาม่าติ่มซำ', 2, '7.004893437492478\r\n', '100.48960447311401'),
(4, 'เจดีย์สามปลื้ม', 3, '14.353747020428148', '100.59146404266357'),
(5, 'โรงพยาบาลศรีวิชัย', 4, '9.115465787018001', '99.30926084518433'),
(6, 'โจ้กเปิดหม้อ', 5, '13.167779595288456', '100.92538833618164');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `branch_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `user_name` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `branch_name`, `user_name`) VALUES
(3, 'ภูเก็ต', 'jgffgh'),
(4, 'ภูเก็ต', 'rbecb'),
(5, 'ภูเก็ต', 'xvqvqv');

-- --------------------------------------------------------

--
-- Table structure for table `user_outgoing`
--

CREATE TABLE `user_outgoing` (
  `user_outgoing_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `origin_lat` varchar(100) COLLATE utf8_bin NOT NULL,
  `origin_lng` varchar(100) COLLATE utf8_bin NOT NULL,
  `origin_branch_description_id` enum('0','1') COLLATE utf8_bin NOT NULL,
  `destination_lat` varchar(100) COLLATE utf8_bin NOT NULL,
  `destination_lng` varchar(100) COLLATE utf8_bin NOT NULL,
  `destination_branch_description_id` enum('0','1') COLLATE utf8_bin NOT NULL,
  `vihecle_type` enum('car','motercycle') COLLATE utf8_bin NOT NULL,
  `distance` double NOT NULL,
  `rate` double NOT NULL,
  `cost` double NOT NULL,
  `status` enum('wait','approve','cancle') COLLATE utf8_bin NOT NULL,
  `datetime_enter` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_outgoing`
--

INSERT INTO `user_outgoing` (`user_outgoing_id`, `branch_id`, `user_id`, `origin_lat`, `origin_lng`, `origin_branch_description_id`, `destination_lat`, `destination_lng`, `destination_branch_description_id`, `vihecle_type`, `distance`, `rate`, `cost`, `status`, `datetime_enter`) VALUES
(85, 1, 4, '7.90608272245317', '98.36664140224457', '0', '7.891948760651239\r\n', '98.36819171905518', '0', 'motercycle', 2.18, 2, 4.36, 'wait', '2017-07-05 16:45:55'),
(86, 4, 4, '9.11065637716888', '99.30181503295898', '0', '9.115465787018001', '99.30926084518433', '0', 'motercycle', 3.799, 2, 7.598, 'wait', '2017-07-05 16:46:51'),
(87, 3, 4, '14.343238520299131', '100.60918271541595', '0', '', '', '0', 'motercycle', 0, 2, 0, 'wait', '2017-07-05 16:54:37'),
(88, 2, 4, '7.006341665683104', '100.4985523223877', '0', '7.004893437492478\r\n', '100.48960447311401', '0', 'car', 1.572, 4.5, 7.074, 'wait', '2017-07-05 16:57:20'),
(89, 2, 4, '7.006341665683104', '100.4985523223877', '0', '7.004893437492478\r\n', '100.48960447311401', '0', 'car', 1.572, 4.5, 7.074, 'wait', '2017-07-05 16:57:20'),
(90, 2, 4, '7.006341665683104', '100.4985523223877', '0', '7.004893437492478\r\n', '100.48960447311401', '0', 'car', 1.572, 4.5, 7.074, 'wait', '2017-07-05 16:57:20'),
(91, 2, 4, '7.006341665683104', '100.4985523223877', '0', '7.004893437492478\r\n', '100.48960447311401', '0', 'car', 1.572, 4.5, 7.074, 'wait', '2017-07-05 16:57:20'),
(92, 2, 4, '7.006341665683104', '100.4985523223877', '0', '7.004893437492478\r\n', '100.48960447311401', '0', 'car', 1.572, 4.5, 7.074, 'wait', '2017-07-05 16:57:20'),
(93, 2, 4, '7.006341665683104', '100.4985523223877', '0', '7.004893437492478\r\n', '100.48960447311401', '0', 'car', 1.572, 4.5, 7.074, 'wait', '2017-07-05 16:57:20'),
(94, 2, 4, '7.006341665683104', '100.4985523223877', '0', '7.004893437492478\r\n', '100.48960447311401', '0', 'car', 1.572, 4.5, 7.074, 'wait', '2017-07-05 16:57:20'),
(95, 2, 4, '7.006341665683104', '100.4985523223877', '0', '7.004893437492478\r\n', '100.48960447311401', '0', 'car', 1.572, 4.5, 7.074, 'wait', '2017-07-05 16:57:20'),
(96, 2, 4, '7.006341665683104', '100.4985523223877', '0', '7.004893437492478\r\n', '100.48960447311401', '0', 'car', 1.572, 4.5, 7.074, 'wait', '2017-07-05 16:57:20'),
(97, 2, 4, '7.006341665683104', '100.4985523223877', '0', '7.004893437492478\r\n', '100.48960447311401', '0', 'car', 1.572, 4.5, 7.074, 'wait', '2017-07-05 16:57:20'),
(98, 3, 4, '14.343238520299131', '100.60918271541595', '0', '14.353747020428148', '100.59146404266357', '0', 'car', 2.761, 4.5, 12.4245, 'wait', '2017-07-05 17:12:16'),
(99, 3, 4, '14.343238520299131', '100.60918271541595', '0', '14.353747020428148', '100.59146404266357', '0', 'car', 2.761, 4.5, 12.4245, 'wait', '2017-07-05 17:12:16'),
(100, 1, 4, '7.90608272245317', '98.36664140224457', '0', '7.894393014197344', '98.35289239883423', '0', 'car', 5.206, 4.5, 23.427, 'wait', '2017-07-05 17:32:43'),
(101, 1, 4, '7.90608272245317', '98.36664140224457', '0', '7.894393014197344', '98.35289239883423', '0', 'car', 5.206, 4.5, 23.427, 'wait', '2017-07-05 17:32:43'),
(102, 1, 4, '7.90608272245317', '98.36664140224457', '0', '7.894393014197344', '98.35289239883423', '0', 'car', 5.206, 4.5, 23.427, 'wait', '2017-07-05 17:32:43'),
(103, 1, 4, '7.90608272245317', '98.36664140224457', '0', '7.894393014197344', '98.35289239883423', '0', 'car', 5.206, 4.5, 23.427, 'wait', '2017-07-05 17:32:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_outgoing_detail`
--

CREATE TABLE `user_outgoing_detail` (
  `user_outgoing_detail_id` int(11) NOT NULL,
  `user_outgoing_id` int(11) NOT NULL,
  `start_lat` varchar(100) COLLATE utf8_bin NOT NULL,
  `start_lng` varchar(100) COLLATE utf8_bin NOT NULL,
  `end_lat` varchar(100) COLLATE utf8_bin NOT NULL,
  `end_lng` varchar(100) COLLATE utf8_bin NOT NULL,
  `distance` varchar(60) COLLATE utf8_bin NOT NULL,
  `instruction` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`),
  ADD KEY `branch_name` (`branch_name`);

--
-- Indexes for table `branch_destination`
--
ALTER TABLE `branch_destination`
  ADD PRIMARY KEY (`branch_destination_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `branch_name` (`branch_name`);

--
-- Indexes for table `user_outgoing`
--
ALTER TABLE `user_outgoing`
  ADD PRIMARY KEY (`user_outgoing_id`);

--
-- Indexes for table `user_outgoing_detail`
--
ALTER TABLE `user_outgoing_detail`
  ADD PRIMARY KEY (`user_outgoing_detail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `branch_destination`
--
ALTER TABLE `branch_destination`
  MODIFY `branch_destination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_outgoing`
--
ALTER TABLE `user_outgoing`
  MODIFY `user_outgoing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `user_outgoing_detail`
--
ALTER TABLE `user_outgoing_detail`
  MODIFY `user_outgoing_detail_id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
