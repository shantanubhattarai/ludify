-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for ludifydb
CREATE DATABASE IF NOT EXISTS `ludifydb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ludifydb`;


-- Dumping structure for table ludifydb.user_roles
CREATE TABLE IF NOT EXISTS `user_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ludifydb.user_roles: ~1 rows (approximately)
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` (`role_id`, `role_name`) VALUES
	(1, 'user');
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;

-- Dumping structure for table ludifydb.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` text,
  `username` varchar(25) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ludifydb.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `email`, `password`, `username`, `role_id`) VALUES
	(1, 'example@example.com', 'example123', 'example_user', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

-- Dumping structure for table ludifydb.files
CREATE TABLE IF NOT EXISTS `files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `link` text NOT NULL,
  `no_of_downloads` int(11) DEFAULT NULL,
  PRIMARY KEY (`file_id`,`link`(100))
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table ludifydb.files: ~2 rows (approximately)
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` (`file_id`, `link`, `no_of_downloads`) VALUES
	(1, '../files/06.23.18/Dumpper v.91.2.rar', 0),
	(2, '../files/06.23.18/Capture.PNG', 0);
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
-- Dumping structure for table ludifydb.articles
CREATE TABLE IF NOT EXISTS `articles` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_title` varchar(100) DEFAULT NULL,
  `article_body` text,
  `file_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `article_category` varchar(50) NOT NULL,
  `date_of_upload` date NOT NULL,
  PRIMARY KEY (`article_id`),
  KEY `file_id` (`file_id`),
  KEY `uploader_id` (`author_id`),
  CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `files` (`file_id`),
  CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1006 DEFAULT CHARSET=latin1;

-- Dumping data for table ludifydb.articles: ~2 rows (approximately)
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` (`article_id`, `article_title`, `article_body`, `file_id`, `author_id`, `article_category`, `date_of_upload`) VALUES
	(1004, 'Dumpper', '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.                ', 1, 1, 'category1', '2018-06-12'),
	(1005, 'Lorem', 'Lorem Ipsum dolor dolor I see a little fellow yello yello. heloo world.', 2, 1, 'category2', '2018-06-20');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;


