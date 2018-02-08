-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 02, 2015 at 07:41 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission_form`
--

CREATE TABLE IF NOT EXISTS `admission_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roll` int(6) NOT NULL,
  `s_name` varchar(30) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `cnic` varchar(30) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `paddress` varchar(30) NOT NULL,
  `taddress` varchar(30) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `year` varchar(30) NOT NULL,
  `university` varchar(30) NOT NULL,
  `obtained` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `cgpa` float NOT NULL,
  `subject` varchar(255) NOT NULL,
  `image` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `admission_form`
--

INSERT INTO `admission_form` (`id`, `roll`, `s_name`, `f_name`, `gender`, `dob`, `cnic`, `mobile`, `email`, `paddress`, `taddress`, `qualification`, `year`, `university`, `obtained`, `total`, `cgpa`, `subject`, `image`) VALUES
(1, 10865, 'Ali', 'Imran', 'Male', '2015-02-09', '3242342342', '9879879898', 'sdfsdf@gmail.com', 'karachi', 'Lahore', 'SSC', '2012', 'UET', 234, 324, 3.3, 'Chemistry', 'images/Water lilies.jpg'),
(5, 184500, 'Shees', 'Imtiaz', 'Male', '2015-03-01', '42101-132412', '234234234234', 'shees@gmail.com', 'Islamabad', 'Sialkot', 'SSC', '2014', 'UET', 123, 234, 3, 'Physics', 'images/Blue hills.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `role`) VALUES
(3, 'Inzi', 'bcs123', 'teacher'),
(6, 'raheel', 'pak12', 'student'),
(8, 'ali', 'bcs12', 'student');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
