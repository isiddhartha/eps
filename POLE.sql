-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 20, 2014 at 03:58 PM
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
  `image` char(20) NOT NULL,
  `description` text,
  PRIMARY KEY (`proj_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`proj_id`, `title`, `admin`, `doc`, `type`, `visibility`, `image`, `description`) VALUES
(1, 'First', 'Sid', '2013-09-06', 'sw', 'public', 'default.jpg', 'This is the first project'),
(2, 'Open Project Collaboration Platform', 'Sid', '2013-09-06', 'software', 'public', 'default.jpg', 'This is a boot strapped project of the platform'),
(3, 'Platform Extension', 'Sid', '2013-09-06', 'SW', 'public', 'default.jpg', 'This is a future expansion project'),
(4, 'Sample project', 'Adhith', '2013-11-28', 'Electronics', 'public', 'default.jpg', 'This is a dummy project');

-- --------------------------------------------------------

--
-- Table structure for table `proj_mem`
--

DROP TABLE IF EXISTS `proj_mem`;
CREATE TABLE IF NOT EXISTS `proj_mem` (
  `proj_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `auth` int(3) NOT NULL,
  PRIMARY KEY (`proj_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proj_mem`
--


-- --------------------------------------------------------

--
-- Table structure for table `proj_prof`
--

DROP TABLE IF EXISTS `proj_prof`;
CREATE TABLE IF NOT EXISTS `proj_prof` (
  `proj_id` int(11) NOT NULL,
  `desc` longtext NOT NULL,
  `tags` mediumtext NOT NULL,
  PRIMARY KEY (`proj_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proj_prof`
--

INSERT INTO `proj_prof` (`proj_id`, `desc`, `tags`) VALUES
(1, '', ''),
(2, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `username` char(40) NOT NULL,
  `password` char(50) NOT NULL,
  `email` text,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`) VALUES
(1, '6isiddhartha@gmail.com', '*E49CD9A54870E4F60F41AEC6114560EF0F216CC9', NULL),
(2, 'wildpupc@gmail.com', '*75A196F0F9931AF9ABB19EA9A26672090CAF4CE1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_prof`
--

DROP TABLE IF EXISTS `user_prof`;
CREATE TABLE IF NOT EXISTS `user_prof` (
  `user_id` int(10) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `dob` date NOT NULL,
  `admin` text NOT NULL,
  `type` text NOT NULL,
  `img` text NOT NULL,
  `visibility` char(15) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_prof`
--

