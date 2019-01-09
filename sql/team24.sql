-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2019 at 10:16 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team24`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` char(60) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `username`, `password`, `role`) VALUES
(1, 'a-albaker', '$2y$10$FjO1cTSpw9zdqTwTgu39ouIMyN8hlts7d6qcynpt9jiGWZaR84ZtO', 'Admin'),
(2, 'm-alenezi', '$2y$10$FjO1cTSpw9zdqTwTgu39ouIMyN8hlts7d6qcynpt9jiGWZaR84ZtO', 'Admin'),
(3, 'a-antoniados', '$2y$10$FjO1cTSpw9zdqTwTgu39ouIMyN8hlts7d6qcynpt9jiGWZaR84ZtO', 'Admin'),
(4, 'n-fayyaz', '$2y$10$FjO1cTSpw9zdqTwTgu39ouIMyN8hlts7d6qcynpt9jiGWZaR84ZtO', 'Admin'),
(5, 'j-stocks', '$2y$10$FjO1cTSpw9zdqTwTgu39ouIMyN8hlts7d6qcynpt9jiGWZaR84ZtO', 'Admin'),
(6, 'p-thompson', '$2y$10$FjO1cTSpw9zdqTwTgu39ouIMyN8hlts7d6qcynpt9jiGWZaR84ZtO', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `employee_state`
--

CREATE TABLE `employee_state` (
  `employee_id` int(10) UNSIGNED NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lorry`
--

CREATE TABLE `lorry` (
  `lorry_id` int(10) UNSIGNED NOT NULL,
  `registration` varchar(20) DEFAULT NULL,
  `capacity` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `part`
--

CREATE TABLE `part` (
  `part_id` int(10) UNSIGNED NOT NULL,
  `part_type_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `part`
--

INSERT INTO `part` (`part_id`, `part_type_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `part_state`
--

CREATE TABLE `part_state` (
  `part_id` int(10) UNSIGNED NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `part_truss`
--

CREATE TABLE `part_truss` (
  `truss_id` int(10) UNSIGNED NOT NULL,
  `part_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `part_truss`
--

INSERT INTO `part_truss` (`truss_id`, `part_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `part_type`
--

CREATE TABLE `part_type` (
  `part_type_id` int(10) UNSIGNED NOT NULL,
  `type_name` varchar(200) DEFAULT NULL,
  `cost` float DEFAULT NULL,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `part_type`
--

INSERT INTO `part_type` (`part_type_id`, `type_name`, `cost`, `data`) VALUES
(1, 'Bracket A', 0.5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

CREATE TABLE `sensor` (
  `sensor_id` int(10) UNSIGNED NOT NULL,
  `sensor_name` varchar(200) DEFAULT NULL,
  `uri` varchar(200) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`sensor_id`, `sensor_name`, `uri`, `location`) VALUES
(1, 'test1', NULL, NULL),
(2, 'test2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sensor_state`
--

CREATE TABLE `sensor_state` (
  `sensor_id` int(10) UNSIGNED NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sensor_state`
--

INSERT INTO `sensor_state` (`sensor_id`, `state_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(10) UNSIGNED NOT NULL,
  `state_type_id` int(10) UNSIGNED NOT NULL,
  `timestamp` datetime DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_type_id`, `timestamp`, `location`, `data`) VALUES
(1, 1, '2019-01-18 09:28:00', NULL, NULL),
(2, 2, '2019-01-18 09:35:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `state_type`
--

CREATE TABLE `state_type` (
  `state_type_id` int(10) UNSIGNED NOT NULL,
  `state_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state_type`
--

INSERT INTO `state_type` (`state_type_id`, `state_name`) VALUES
(1, 'Pick Materials'),
(2, 'Cut Timber'),
(3, 'Make'),
(4, 'Load');

-- --------------------------------------------------------

--
-- Table structure for table `truss`
--

CREATE TABLE `truss` (
  `truss_id` int(10) UNSIGNED NOT NULL,
  `height` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `span` float DEFAULT NULL,
  `pitch` float DEFAULT NULL,
  `overhang_right` float DEFAULT NULL,
  `overhang_left` float DEFAULT NULL,
  `timber_top` varchar(10) DEFAULT NULL,
  `timber_bot` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `truss`
--

INSERT INTO `truss` (`truss_id`, `height`, `weight`, `span`, `pitch`, `overhang_right`, `overhang_left`, `timber_top`, `timber_bot`) VALUES
(1, 3.649, 212.52, 7.487, 39, 0, 0.45, '47x197', '47x197');

-- --------------------------------------------------------

--
-- Table structure for table `truss_lorry`
--

CREATE TABLE `truss_lorry` (
  `truss_id` int(10) UNSIGNED NOT NULL,
  `lorry_id` int(10) UNSIGNED NOT NULL,
  `loaded_timestamp` datetime DEFAULT NULL,
  `unloaded_timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `truss_state`
--

CREATE TABLE `truss_state` (
  `truss_id` int(10) UNSIGNED NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `truss_state`
--

INSERT INTO `truss_state` (`truss_id`, `state_id`) VALUES
(1, 1),
(1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employee_state`
--
ALTER TABLE `employee_state`
  ADD PRIMARY KEY (`employee_id`,`state_id`),
  ADD KEY `fk__employee_state_state__state_id` (`state_id`);

--
-- Indexes for table `lorry`
--
ALTER TABLE `lorry`
  ADD PRIMARY KEY (`lorry_id`);

--
-- Indexes for table `part`
--
ALTER TABLE `part`
  ADD PRIMARY KEY (`part_id`),
  ADD KEY `fk__part_part_type__part_type_id` (`part_type_id`);

--
-- Indexes for table `part_state`
--
ALTER TABLE `part_state`
  ADD PRIMARY KEY (`part_id`,`state_id`),
  ADD KEY `fk__part_state_state__state_id` (`state_id`);

--
-- Indexes for table `part_truss`
--
ALTER TABLE `part_truss`
  ADD PRIMARY KEY (`truss_id`,`part_id`),
  ADD KEY `fk__part_truss_part__part_id` (`part_id`);

--
-- Indexes for table `part_type`
--
ALTER TABLE `part_type`
  ADD PRIMARY KEY (`part_type_id`);

--
-- Indexes for table `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`sensor_id`);

--
-- Indexes for table `sensor_state`
--
ALTER TABLE `sensor_state`
  ADD PRIMARY KEY (`sensor_id`,`state_id`),
  ADD KEY `fk__sensor_state_state__state_id` (`state_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`),
  ADD KEY `fk__state_state_type__state_type_id` (`state_type_id`);

--
-- Indexes for table `state_type`
--
ALTER TABLE `state_type`
  ADD PRIMARY KEY (`state_type_id`);

--
-- Indexes for table `truss`
--
ALTER TABLE `truss`
  ADD PRIMARY KEY (`truss_id`);

--
-- Indexes for table `truss_lorry`
--
ALTER TABLE `truss_lorry`
  ADD PRIMARY KEY (`truss_id`,`lorry_id`),
  ADD KEY `fk__truss_lorry_lorry__lorry_id` (`lorry_id`);

--
-- Indexes for table `truss_state`
--
ALTER TABLE `truss_state`
  ADD PRIMARY KEY (`truss_id`,`state_id`),
  ADD KEY `fk__truss_state_state__state_id` (`state_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lorry`
--
ALTER TABLE `lorry`
  MODIFY `lorry_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `part`
--
ALTER TABLE `part`
  MODIFY `part_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `part_type`
--
ALTER TABLE `part_type`
  MODIFY `part_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sensor`
--
ALTER TABLE `sensor`
  MODIFY `sensor_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `state_type`
--
ALTER TABLE `state_type`
  MODIFY `state_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `truss`
--
ALTER TABLE `truss`
  MODIFY `truss_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_state`
--
ALTER TABLE `employee_state`
  ADD CONSTRAINT `fk__employee_state_employee__employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`),
  ADD CONSTRAINT `fk__employee_state_state__state_id` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`);

--
-- Constraints for table `part`
--
ALTER TABLE `part`
  ADD CONSTRAINT `fk__part_part_type__part_type_id` FOREIGN KEY (`part_type_id`) REFERENCES `part_type` (`part_type_id`);

--
-- Constraints for table `part_state`
--
ALTER TABLE `part_state`
  ADD CONSTRAINT `fk__part_state_part__part_id` FOREIGN KEY (`part_id`) REFERENCES `part` (`part_id`),
  ADD CONSTRAINT `fk__part_state_state__state_id` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`);

--
-- Constraints for table `part_truss`
--
ALTER TABLE `part_truss`
  ADD CONSTRAINT `fk__part_truss_part__part_id` FOREIGN KEY (`part_id`) REFERENCES `part` (`part_id`),
  ADD CONSTRAINT `fk__part_truss_truss__truss_id` FOREIGN KEY (`truss_id`) REFERENCES `truss` (`truss_id`);

--
-- Constraints for table `sensor_state`
--
ALTER TABLE `sensor_state`
  ADD CONSTRAINT `fk__sensor_state_sensor__sensor_id` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`sensor_id`),
  ADD CONSTRAINT `fk__sensor_state_state__state_id` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`);

--
-- Constraints for table `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `fk__state_state_type__state_type_id` FOREIGN KEY (`state_type_id`) REFERENCES `state_type` (`state_type_id`);

--
-- Constraints for table `truss_lorry`
--
ALTER TABLE `truss_lorry`
  ADD CONSTRAINT `fk__truss_lorry_lorry__lorry_id` FOREIGN KEY (`lorry_id`) REFERENCES `lorry` (`lorry_id`),
  ADD CONSTRAINT `fk__truss_lorry_truss__truss_id` FOREIGN KEY (`truss_id`) REFERENCES `truss` (`truss_id`);

--
-- Constraints for table `truss_state`
--
ALTER TABLE `truss_state`
  ADD CONSTRAINT `fk__truss_state_state__state_id` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`),
  ADD CONSTRAINT `fk__truss_state_truss__truss_id` FOREIGN KEY (`truss_id`) REFERENCES `truss` (`truss_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
