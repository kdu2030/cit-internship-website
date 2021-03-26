-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 26, 2019 at 12:39 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `experience` longtext,
  `skills` longtext,
  `interests` longtext,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `hash`, `avatar`, `experience`, `skills`, `interests`, `active`) VALUES
(42, 'admin', 'drcitinternship@gmail.com', '$2y$10$JFJoR9KaawWMfWROvNY8MuBEoHMzrqrDj0qafnfskAYqzPiOQa.Am', '9dcb88e0137649590b755372b040afad', '', 'none', 'none', 'none', 0),
(43, 'Tim Berners-Lee', 'hcps-duk1@henricostudents.org', '$2y$10$p14G.AWIJUANjGj7K544se5p1g5f93p8pUDyx0QpbAf32lxZz2dja', 'd1c38a09acc34845c6be3a127a5aacaf', 'image/Tim Berners-Lee.jpg', 'Inventor of the Internet, World Champion Hamburger Eater', 'HTTP, HTML, C, Javascript', 'Web Design, Programming, Cross-Computer Communication', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
