-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2012 at 12:41 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_report`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `c_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `course` varchar(250) NOT NULL,
  PRIMARY KEY (`c_id`),
  UNIQUE KEY `course` (`course`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `course`) VALUES
(5, 'Bachelor of Arts in Accountancy'),
(6, 'Bachelor of Arts in Accountancy (Part Time) ');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `l_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Location` varchar(250) NOT NULL,
  PRIMARY KEY (`l_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`l_id`, `Location`) VALUES
(1, 'Yishun'),
(2, 'Suntec');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `m_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `m_name` varchar(50) NOT NULL,
  `value` float NOT NULL,
  `c_id` bigint(20) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`m_id`, `m_name`, `value`, `c_id`) VALUES
(5, 'x', 10, 5),
(6, 'r', 40, 5),
(7, 'z', 30, 5),
(8, 'y', 20, 5),
(9, 'w1', 10, 6),
(10, 'w3', 30, 6),
(11, 'w2', 20, 6),
(12, 'm1', 12, 5),
(13, 'm3', 58, 5),
(14, 'm2', 15, 5);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `l_id` bigint(250) NOT NULL,
  `c_id` bigint(20) NOT NULL,
  `date_created` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `l_id`, `c_id`, `date_created`) VALUES
(3, 2, 5, '10/31/2012'),
(4, 1, 6, '10/31/2012'),
(5, 1, 5, '10/31/2012');
