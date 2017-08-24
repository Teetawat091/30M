-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2017 at 12:41 PM
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
-- Database: `outgoing_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `brench`
--

CREATE TABLE `brench` (
  `brench_id` int(11) NOT NULL,
  `brench_name` varchar(70) COLLATE utf8_bin NOT NULL,
  `brench_lat` varchar(100) COLLATE utf8_bin NOT NULL,
  `brench_lng` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `brench`
--

INSERT INTO `brench` (`brench_id`, `brench_name`, `brench_lat`, `brench_lng`) VALUES
(1, 'ภูเก็ต', '7.90608272245317', '98.36664140224457'),
(2, 'หาดใหญ่', '7.006341665683104', '100.4985523223877'),
(3, 'อยุธยา', '14.343238520299131', '100.60918271541595'),
(4, 'สุราษฯ', '9.11065637716888', '99.30181503295898'),
(5, 'ศรีราชา', '13.168317602040103', '100.93120604753494');

-- --------------------------------------------------------

--
-- Table structure for table `brench-destination`
--

CREATE TABLE `brench-destination` (
  `brench_destination_id` int(11) NOT NULL,
  `brench_id` int(11) NOT NULL,
  `brench_destination_name` varchar(200) COLLATE utf8_bin NOT NULL,
  `lat_destination` varchar(100) COLLATE utf8_bin NOT NULL,
  `lng_destination` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `brench-destination`
--

INSERT INTO `brench-destination` (`brench_destination_id`, `brench_id`, `brench_destination_name`, `lat_destination`, `lng_destination`) VALUES
(1, 1, 'เซนทรัล เฟสติวัล ภูเก็ต', '7.891948760651239', '98.36819171905518'),
(9, 2, 'อาม่าติ่มซำ', '7.004893437492478', '100.48960447311401');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `brench_id` int(11) NOT NULL,
  `user_name` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `brench_id`, `user_name`) VALUES
(1, 1, 'MR.a'),
(2, 2, 'นาย ก'),
(3, 3, 'นาง ข'),
(4, 4, 'mrs.c'),
(5, 5, 'GG_WP');

-- --------------------------------------------------------

--
-- Table structure for table `user-outgoing`
--

CREATE TABLE `user-outgoing` (
  `user_outgoing_id` int(11) NOT NULL,
  `brench_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `origin_lat` varchar(100) COLLATE utf8_bin NOT NULL,
  `origin_lng` varchar(100) COLLATE utf8_bin NOT NULL,
  `origin_brench_description_id` int(11) NOT NULL,
  `destination_lat` varchar(100) COLLATE utf8_bin NOT NULL,
  `destination_lng` varchar(100) COLLATE utf8_bin NOT NULL,
  `destination_brench_description_id` int(11) NOT NULL,
  `vihecle_type` enum('Car','Motercycle') COLLATE utf8_bin NOT NULL,
  `distance` double NOT NULL,
  `rate` double NOT NULL,
  `cost` double NOT NULL,
  `status` enum('Approve','Wait','Cancle') COLLATE utf8_bin NOT NULL,
  `datetime_enter` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user-outgoing-detail`
--

CREATE TABLE `user-outgoing-detail` (
  `user_outgoing_detail_id` int(11) NOT NULL,
  `user_outgoing_id` int(11) NOT NULL,
  `start_lat` varchar(100) COLLATE utf8_bin NOT NULL,
  `start_lng` varchar(100) COLLATE utf8_bin NOT NULL,
  `end_lat` varchar(100) COLLATE utf8_bin NOT NULL,
  `end_lng` varchar(100) COLLATE utf8_bin NOT NULL,
  `action` varchar(70) COLLATE utf8_bin NOT NULL,
  `distance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brench`
--
ALTER TABLE `brench`
  ADD PRIMARY KEY (`brench_id`);

--
-- Indexes for table `brench-destination`
--
ALTER TABLE `brench-destination`
  ADD PRIMARY KEY (`brench_destination_id`),
  ADD UNIQUE KEY `brench_id` (`brench_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `brench_id` (`brench_id`);

--
-- Indexes for table `user-outgoing`
--
ALTER TABLE `user-outgoing`
  ADD PRIMARY KEY (`user_outgoing_id`),
  ADD UNIQUE KEY `brench_id` (`brench_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `user-outgoing-detail`
--
ALTER TABLE `user-outgoing-detail`
  ADD PRIMARY KEY (`user_outgoing_detail_id`),
  ADD UNIQUE KEY `user_outgoing_id` (`user_outgoing_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brench`
--
ALTER TABLE `brench`
  MODIFY `brench_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `brench-destination`
--
ALTER TABLE `brench-destination`
  MODIFY `brench_destination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user-outgoing`
--
ALTER TABLE `user-outgoing`
  MODIFY `user_outgoing_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user-outgoing-detail`
--
ALTER TABLE `user-outgoing-detail`
  MODIFY `user_outgoing_detail_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `brench-destination`
--
ALTER TABLE `brench-destination`
  ADD CONSTRAINT `brench-destination_ibfk_1` FOREIGN KEY (`brench_id`) REFERENCES `brench` (`brench_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`brench_id`) REFERENCES `brench` (`brench_id`);

--
-- Constraints for table `user-outgoing`
--
ALTER TABLE `user-outgoing`
  ADD CONSTRAINT `user-outgoing_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `user-outgoing_ibfk_2` FOREIGN KEY (`brench_id`) REFERENCES `brench` (`brench_id`),
  ADD CONSTRAINT `user-outgoing_ibfk_3` FOREIGN KEY (`user_outgoing_id`) REFERENCES `user-outgoing-detail` (`user_outgoing_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
