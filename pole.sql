-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2014 at 05:59 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pole`
--

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `proj_id` int(11) NOT NULL,
  `title` char(80) NOT NULL,
  `admin` char(10) NOT NULL,
  `doc` date NOT NULL,
  `type` char(20) NOT NULL,
  `visibility` char(10) NOT NULL,
  `tags` char(100) DEFAULT NULL,
  `image` char(20) NOT NULL,
  PRIMARY KEY (`proj_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`proj_id`, `title`, `admin`, `doc`, `type`, `visibility`, `tags`, `image`) VALUES
(1, 'First', 'Sid', '2013-09-06', 'sw', 'public', 'web', 'default.jpg'),
(2, 'Open Project Collaboration Platform', 'Sid', '2013-09-06', 'software', 'public', 'web', 'default.jpg'),
(3, 'Platform Extension', 'Sid', '2013-09-06', 'SW', 'public', 'web', 'default.jpg'),
(4, 'Sample project', 'Adhith', '2013-11-28', 'Electronics', 'public', 'electronics', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `proj_prof`
--

DROP TABLE IF EXISTS `proj_prof`;
CREATE TABLE IF NOT EXISTS `proj_prof` (
  `proj_id` int(11) NOT NULL,
  `descr` text,
  `images` char(100) DEFAULT NULL,
  `videos` char(100) DEFAULT NULL,
  PRIMARY KEY (`proj_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proj_prof`
--

INSERT INTO `proj_prof` (`proj_id`, `descr`, `images`, `videos`) VALUES
(1, 'This is the first sample project ever started to test this application', NULL, NULL),
(2, 'This is a project started for the further development of this project itself.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL,
  `username` char(40) NOT NULL,
  `password` char(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`) VALUES
(1, '6isiddhartha@gmail.com', '*E49CD9A54870E4F60F41AEC6114560EF0F216CC9'),
(2, 'wildpupc@gmail.com', '*75A196F0F9931AF9ABB19EA9A26672090CAF4CE1');
