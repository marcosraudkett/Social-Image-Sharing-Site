-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host:
-- Generation Time: Dec 21, 2016 at 12:25 PM
-- Server version: 5.5.43
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projektityo`
--
CREATE DATABASE `projektityo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projektityo`;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `friends_id` int(11) NOT NULL AUTO_INCREMENT,
  `friend_one_id` varchar(255) NOT NULL,
  `friend_two_id` varchar(255) NOT NULL,
  `friends_date` varchar(255) NOT NULL,
  PRIMARY KEY (`friends_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `friends`
--


-- --------------------------------------------------------

--
-- Table structure for table `kommentit`
--

CREATE TABLE `kommentit` (
  `kommentti_id` int(11) NOT NULL AUTO_INCREMENT,
  `kommentti_kuvan_id` varchar(255) NOT NULL,
  `kommentin_lisannyt` varchar(255) NOT NULL,
  `kommentin_sisalto` varchar(255) NOT NULL,
  `kommentti_lisaysaika` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`kommentti_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `kommentit`
--


-- --------------------------------------------------------

--
-- Table structure for table `kuvat`
--

CREATE TABLE `kuvat` (
  `kuva_id` int(11) NOT NULL AUTO_INCREMENT,
  `kuvan_teksti` varchar(255) NOT NULL,
  `kuvan_lisannyt_id` varchar(25) NOT NULL,
  `kuvan_linkki` varchar(255) NOT NULL,
  `kuvan_lisaysaika` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`kuva_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `kuvat`
--

INSERT INTO `kuvat` VALUES(28, ':)', '1', 'http://marcosraudkett.com/projektityo/uploads/0b5562f41c02c0ae5f051e3f57ed087b.jpg', '2016-12-20 13:42:39');
INSERT INTO `kuvat` VALUES(25, 'drone kuva 2', '2', 'http://marcosraudkett.com/projektityo/uploads/0327444f0ff4809453d2cb4e5fdc72e2.jpg', '2016-12-20 09:05:57');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL AUTO_INCREMENT,
  `like_photo_id` varchar(255) NOT NULL,
  `like_user_id` varchar(255) NOT NULL,
  `like_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`like_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` VALUES(43, '25', '15', '2016-12-21 06:10:53');
INSERT INTO `likes` VALUES(33, '24', '19', '2016-12-20 13:37:14');
INSERT INTO `likes` VALUES(31, '25', '1', '2016-12-20 12:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_name` varchar(255) NOT NULL,
  `message_email` varchar(255) NOT NULL,
  `message_text` varchar(255) NOT NULL,
  `message_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` VALUES(3, 'Raudkett', 'test@hotmail.com', 'Test msg 2', '2016-12-20 12:56:34');
INSERT INTO `messages` VALUES(4, 'Marcos', 'info@example.com', 'Test msg', '2016-12-20 17:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE `share` (
  `share_id` int(11) NOT NULL AUTO_INCREMENT,
  `share_photo_id` varchar(255) NOT NULL,
  `share_user_id` varchar(255) NOT NULL,
  `share_to` varchar(255) NOT NULL,
  `share_date` varchar(255) NOT NULL,
  PRIMARY KEY (`share_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `share`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `privileges` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(1, '1', 'projektityo', 'Qwerty1!', 'yllapitaja@marcosraudkett.com', '', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES(19, '3', 'marcosmast', '123', 'info@marcosraudkett.com', '', '2016-12-20 12:28:25');
INSERT INTO `users` VALUES(3, '3', 'tavallinen', 'tavallinen', 'tavallinen@marcosraudkett.com', '', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES(15, '2', 'postaaja', 'postaaja', 'postaaja@marcosraudkett.com', '', '2016-12-20 12:10:37');
