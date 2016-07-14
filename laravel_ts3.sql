-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 14, 2016 at 04:27 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laravel_ts3`
--

-- --------------------------------------------------------

--
-- Table structure for table `group_users_virtualservers`
--

CREATE TABLE IF NOT EXISTS `group_users_virtualservers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `virtualserver_id` int(11) NOT NULL,
  `nivel` int(2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `group_users_virtualservers`
--

INSERT INTO `group_users_virtualservers` (`id`, `user_id`, `virtualserver_id`, `nivel`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 99, '2016-07-13 14:13:14', NULL),
(2, 1, 2, 99, '2016-07-13 12:22:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `servers`
--

CREATE TABLE IF NOT EXISTS `servers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hostname` varchar(32) NOT NULL,
  `ip` varchar(32) NOT NULL,
  `port` varchar(7) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `servers`
--

INSERT INTO `servers` (`id`, `hostname`, `ip`, `port`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Teste', '127.0.0.1', '10011', 'serveradmin', '123', '2016-07-13 04:48:06', NULL),
(2, 'Outro', 'localhost', '10011', 'serveradmin', '123', '2016-07-13 05:09:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(64) DEFAULT NULL,
  `level` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`, `remember_token`, `level`) VALUES
(1, 'João Reis', 'joaoreis@outlook.pt', '$2y$10$WHIq4YEqUY34C/4v7EhleeeQ0/PYstm/Xc/N99WTguwkmlcmTHfO.', '2016-07-13 17:18:59', '2016-07-13 15:00:36', 'yEJGeNrMpf0mbDWcZAe8pzIaz6HcaMs8QjNovB4hDk1Uct3hWTCEUB35I5Qt', 1),
(2, 'Hardcorder', 'hardcorder@hotmail.com', '$2y$10$WHIq4YEqUY34C/4v7EhleeeQ0/PYstm/Xc/N99WTguwkmlcmTHfO.', '2016-07-13 17:18:59', '2016-07-13 12:24:19', 'LvEvy8EiRxczpvUZ6SstiqSdukvZGvQ1sxpa0ho0Zmgut5avHeW7A1ifhRV8', 0);

-- --------------------------------------------------------

--
-- Table structure for table `virtual_servers`
--

CREATE TABLE IF NOT EXISTS `virtual_servers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server_id` int(11) NOT NULL,
  `port` varchar(7) NOT NULL,
  `max_slots` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `virtual_servers`
--

INSERT INTO `virtual_servers` (`id`, `server_id`, `port`, `max_slots`, `created_at`, `updated_at`) VALUES
(1, 1, '9987', 32, '2016-07-13 13:16:22', NULL),
(2, 1, '9988', 512, '2016-07-13 09:41:24', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
