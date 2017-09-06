-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2017 at 12:07 PM
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
(4, 'เจดีย์สามปลื้ม', 3, '14.353747020428148', '100.59146404266357'),
(5, 'โรงพยาบาลศรีวิชัย', 4, '9.115465787018001', '99.30926084518433'),
(6, 'โจ้กเปิดหม้อ', 5, '13.167779595288456', '100.92538833618164'),
(9, 'สวนสาธารณะหาดใหญ่', 2, '7.042971821437289', '100.50739288330078'),
(12, 'เขารัง', 1, '7.893649112474572', '98.3796501159668'),
(13, 'สวนเสือศรีราชา', 5, '13.148358327567177', '101.01070404052734'),
(14, 'ตลาดน้ำกรุงเก่า', 3, '14.358694471904762', '100.54344177246094'),
(15, 'สนามบินสุราษ', 4, '9.13430025281776', '99.14268493652344'),
(16, 'สนามบินภูเก็ต', 1, '8.111235871444734', '98.30635070800781'),
(17, 'บิ๊กซีสุราษฯ', 4, '9.148197713142977', '99.3698787689209'),
(18, 'สวนนกภูเก็ต', 1, '7.864232040751287', '98.34403038024902'),
(19, 'แหลมพรหมเทพ', 1, '7.759299883556808', '98.30360412597656'),
(45, 'โรงพยาบาลบางบาล', 3, '14.366884550349408', '100.48739433288574'),
(46, 'จังซีลอน', 1, '7.892288831575531', '98.29828262329102'),
(47, 'สวนสัตว์เปิดเขาเขียว', 5, '13.215213662455822', '101.05636596679688');

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
(4, 'ภูเก็ต', 'rbecb');

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
  `instruction` varchar(200) COLLATE utf8_bin NOT NULL
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
  ADD PRIMARY KEY (`user_outgoing_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_outgoing_detail`
--
ALTER TABLE `user_outgoing_detail`
  ADD PRIMARY KEY (`user_outgoing_detail_id`),
  ADD KEY `user_outgoing_id` (`user_outgoing_id`);

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
  MODIFY `branch_destination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_outgoing`
--
ALTER TABLE `user_outgoing`
  MODIFY `user_outgoing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
--
-- AUTO_INCREMENT for table `user_outgoing_detail`
--
ALTER TABLE `user_outgoing_detail`
  MODIFY `user_outgoing_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1243;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
