-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 27, 2020 at 10:10 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expense_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_expense`
--

DROP TABLE IF EXISTS `add_expense`;
CREATE TABLE IF NOT EXISTS `add_expense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `expense` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `bill` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_expense`
--

INSERT INTO `add_expense` (`id`, `title`, `date`, `expense`, `p_id`, `bill`) VALUES
(1, 'first', '2019-04-01', 100, 1, '0'),
(2, 'second', '2019-04-01', 2000, 2, '0'),
(3, 'third', '2019-04-02', 500, 1, '0'),
(4, 'fourth', '2019-04-03', 500, 2, '0'),
(5, 'fifth', '2019-04-03', 800, 1, '0'),
(6, 'Murgan Idli Shop', '2019-04-04', 88, 2, 'img/27-05-2020-1590560356.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `budget_plan`
--

DROP TABLE IF EXISTS `budget_plan`;
CREATE TABLE IF NOT EXISTS `budget_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `initial_budget` bigint(20) NOT NULL,
  `people` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `budget_plan`
--

INSERT INTO `budget_plan` (`id`, `user_id`, `from_date`, `to_date`, `initial_budget`, `people`, `title`) VALUES
(1, 1, '2019-04-01', '2019-04-04', 4000, 2, 'Trip to Goa');

-- --------------------------------------------------------

--
-- Table structure for table `person_details`
--

DROP TABLE IF EXISTS `person_details`;
CREATE TABLE IF NOT EXISTS `person_details` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `bud_id` int(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `expense` bigint(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bud_id` (`bud_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person_details`
--

INSERT INTO `person_details` (`id`, `bud_id`, `name`, `expense`) VALUES
(1, 1, 'rohit', 1400),
(2, 1, 'ritika', 2588);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`) VALUES
(1, 'Mugdha Agarwal', 'agarwalmugdha1998@gmail.com', 7905043844, 'fc5e038d38a57032085441e7fe7010b0'),
(2, 'RaghuVansh Agarwal', 'raghu@gmail.com', 9807564231, 'fc5e038d38a57032085441e7fe7010b0');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_expense`
--
ALTER TABLE `add_expense`
  ADD CONSTRAINT `add_expense_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `person_details` (`id`);

--
-- Constraints for table `budget_plan`
--
ALTER TABLE `budget_plan`
  ADD CONSTRAINT `budget_plan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `person_details`
--
ALTER TABLE `person_details`
  ADD CONSTRAINT `person_details_ibfk_1` FOREIGN KEY (`bud_id`) REFERENCES `budget_plan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
