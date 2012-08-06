-- Adminer 3.4.0 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `labtest_exercise`;
CREATE DATABASE `labtest_exercise` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `labtest_exercise`;

DROP TABLE IF EXISTS `songs`;
CREATE TABLE `songs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `userid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `songs` (`id`, `title`, `body`, `userid`) VALUES
(1,	'Lazy Song',	'lyrics of lazy song',	'user1'),
(2,	'Call Me Maybe',	'lyrics of call me maybe',	'user1'),
(3,	'Majulah Singapura',	'lyrics ',	'user2'),
(4,	'Heya!',	'lyrics to Heya!',	'user2'),
(5,	'Monster in the Mirror',	'lyrics',	'user1');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`userid`, `password`, `email`, `name`) VALUES
('user1',	'12345678',	'user1@hotmail.com',	'woody'),
('user2',	'12345678',	'user2@hotmail.com',	'buzz lightyear');

-- 2012-07-30 11:29:47
