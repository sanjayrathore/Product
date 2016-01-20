-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 20, 2016 at 05:53 PM
-- Server version: 5.5.44
-- PHP Version: 5.3.10-1ubuntu3.19

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `CUSTOMERS`
--

CREATE TABLE IF NOT EXISTS `CUSTOMERS` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `CUSTOMERS`
--

INSERT INTO `CUSTOMERS` (`id`, `firstname`, `lastname`, `email`, `dob`, `gender`) VALUES
(75, 'sanjay', 'rathore', 'sanjayrathore0007@gmail.com', '1994-05-04', 'female'),
(76, 'rathor', 'rat', 'sanjayrathore0007@gmail.com', '1994-05-04', 'male'),
(82, 'kishori', 'malviya', 'hareram.p@cisinlabs.com', '1992-05-04', 'male'),
(83, 'rathores', 'sa', 'sanjayrathore0007@gmail.com', '1994-05-04', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCT`
--

CREATE TABLE IF NOT EXISTS `PRODUCT` (
  `id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(20) DEFAULT NULL,
  `description` text,
  `price` float(7,2) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `is_enabled` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PRODUCT`
--

INSERT INTO `PRODUCT` (`id`, `title`, `description`, `price`, `create_date`, `update_date`, `is_enabled`) VALUES
(1, 'SQL', ' THE PHP VERSION 5 ', 4000.00, '2015-12-01 00:00:00', '2015-12-09 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE IF NOT EXISTS `USER` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `confirmpassword` varchar(25) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`id`, `firstname`, `email`, `password`, `confirmpassword`, `message`) VALUES
(8, 'sanjay', 'sanjayrathore0007@gmail.com', 'Sanjay123$', 'Sanjay123$', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE IF NOT EXISTS `USERS` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `user_type` int(1) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `create_at` varchar(10) DEFAULT NULL,
  `update_date` varchar(10) DEFAULT NULL,
  `arrange_order` int(11) DEFAULT '999',
  `is_enabled` tinyint(1) DEFAULT '1',
  `trashed` tinyint(1) DEFAULT '0',
  `trashed_date` varchar(10) DEFAULT NULL,
  `trashed_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `USERS`
--

INSERT INTO `USERS` (`id`, `name`, `user_type`, `email`, `password`, `username`, `create_at`, `update_date`, `arrange_order`, `is_enabled`, `trashed`, `trashed_date`, `trashed_by`) VALUES
(44, 'hareram', 1, 'hareram.p@cisinlabs.com', 'Sanjay123$', 'hareram', NULL, NULL, 999, 1, 0, NULL, NULL),
(46, 'rathore', 1, 'rathore679@gmail.com', 'Sanjay123$', 'sanjayrathore', NULL, NULL, 999, 1, 0, NULL, NULL),
(48, 'sanjay', 1, 'sanjayrathore0007@gmail.com', 'Sanjay123$', 'sanjayrathore', NULL, NULL, 999, 1, 0, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
