-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2018 at 08:03 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ludifydb`
--
CREATE DATABASE IF NOT EXISTS `ludifydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ludifydb`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_settings`
--

CREATE TABLE `admin_settings` (
  `id` int(1) NOT NULL,
  `maintenance` int(11) NOT NULL,
  `settings` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_settings`
--

INSERT INTO `admin_settings` (`id`, `maintenance`, `settings`) VALUES
(1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `article_title` varchar(100) DEFAULT NULL,
  `article_body` text,
  `file_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `article_category` varchar(50) NOT NULL,
  `date_of_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `article_title`, `article_body`, `file_id`, `author_id`, `article_category`, `date_of_upload`) VALUES
(1004, 'Dumpper', '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.                ', 1, 84, '3', '2018-06-12'),
(1005, 'Lorem', 'Lorem Ipsum dolor dolor I see a little fellow yello yello. heloo world.', 2, 89, '4', '2018-06-20'),
(1006, 'Article 1', 'New article here', 6, 86, '1', '0000-00-00'),
(1007, 'New one', 'Article 4 maybe', 11, 87, '2', '0000-00-00'),
(1011, 'Title', 'body', 14, 88, '1', '0000-00-00'),
(1012, 'asdfkjh', 'asdfasdf', 16, 88, '3', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `article_categories`
--

CREATE TABLE `article_categories` (
  `category_id` int(11) NOT NULL,
  `categoery` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_body` text,
  `comment_date` date DEFAULT NULL,
  `comment_user_id` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_body`, `comment_date`, `comment_user_id`, `article_id`) VALUES
(1, 'Good one', '0000-00-00', 88, 1004),
(2, 'Nextone', '0000-00-00', 88, 1004),
(3, 'Nextone2', '0000-00-00', 88, 1004);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_title` text,
  `feedback_body` text,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `feedback_title`, `feedback_body`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Feedback', 'feedback body', 90, '2018-07-17 16:42:26', '2018-07-17 16:42:26');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `link` text NOT NULL,
  `no_of_downloads` int(11) DEFAULT NULL,
  `file_name` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `link`, `no_of_downloads`, `file_name`) VALUES
(1, '../files/06.23.18/Dumpper v.91.2.rar', 0, 'Dumper.rar'),
(2, '../files/06.23.18/Capture.PNG', 0, 'Caputre.png'),
(6, '../files/1006/Assignment3.docx', 0, 'Assignment3.docx'),
(11, '../files/1007/User.docx', 0, 'User.docx'),
(12, '../files/1008/Sample.xml', 0, 'sapmle.xml'),
(13, '../files/1008/Sample.xml', 0, 'sample.xml'),
(14, '../files/1008/sample.png', 0, 'sample.png'),
(15, '../files/1008/sample.png', 0, 'sample.png'),
(16, '../files/1012/citizenship.jpg', 0, 'citizenship.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `notice_id` int(11) NOT NULL,
  `notice_title` text,
  `notice_body` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`notice_id`, `notice_title`, `notice_body`, `created_at`, `updated_at`) VALUES
(0, 'Notice', 'Notice Body', '2018-07-17 16:36:40', '2018-07-17 16:36:40');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `user_id` int(11) DEFAULT NULL,
  `notification_id` int(11) NOT NULL,
  `last_logged_in` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`user_id`, `notification_id`, `last_logged_in`) VALUES
(89, 1, '2018-07-11 22:29:00'),
(88, 2, '2018-07-15 09:13:54'),
(90, 3, '2018-07-17 19:24:21');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `request_body` text,
  `request_title` text,
  `date_of_request` datetime DEFAULT NULL,
  `accepted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `user_id`, `request_body`, `request_title`, `date_of_request`, `accepted`) VALUES
(1, 87, 'This is a sample request', 'Title', '2018-07-03 03:27:08', NULL),
(2, 86, 'Another Request is here', 'Title2', '2018-07-01 07:01:06', 1),
(3, 89, 'This is the third request', 'Title 3', '2018-07-11 01:07:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `loggedin` int(11) NOT NULL,
  `avatar` varchar(600) NOT NULL,
  `username` varchar(500) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(200) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `hash`, `active`, `loggedin`, `avatar`, `username`, `dob`, `gender`, `contact`, `role_id`, `count`) VALUES
(84, 'sudip', 'Neupane', 'shibasudipyoddha@gmail.com', '$2y$10$J/ekEhaTAYCuSzu5qEUFGOFwnM08e984XPBPOZawKvoWIM.SJwBvK', 'e0cf1f47118daebc5b16269099ad7347', 1, 1, '', 'sudip', '2018-06-27', 'male', 13254651, NULL, 0),
(86, 'sdf', 'sdf', 'sdfsd', '$2y$10$1cVhldjdNh9nnv3Cq5StfuyNK70ujMe0BszNCpp2IwzbwyZGZyc92', 'a9a6653e48976138166de32772b1bf40', 0, 0, '', 'sdf', '2018-06-25', 'male', 0, NULL, 0),
(87, 'sudip', 'Neupane', 'sudipssy@yahoo0.com', '$2y$10$vTF2mwoccfXoEX3iG0k/COkcN9S98GETiSLJztmhXxHScaXaXP33y', '15de21c670ae7c3f6f3f1f37029303c9', 0, 0, '', 'ssya', '2018-06-26', '', 9841410162, NULL, 0),
(88, 'ram', 'ram', 'ram@example.com', 'e10adc3949ba59abbe56e057f20f883e', '6974ce5ac660610b44d9b9fed0ff9548', 1, 0, '/ludify//media/IMG_20180407_061242.jpg', 'ram', '0000-00-00', '', 0, 2, 1),
(89, 'hari', 'hari', 'hari@example.com', 'e10adc3949ba59abbe56e057f20f883e', '8b6dd7db9af49e67306feb59a8bdc52c', 0, 0, '', 'hari', '2000-01-01', 'male', 98765431, 3, 0),
(90, 'Divyaswor', 'Makai ', 'div@example.com', 'e10adc3949ba59abbe56e057f20f883e', 'c4ca4238a0b923820dcc509a6f75849b', 0, 0, '/ludify//media/citizenship.jpg', 'makai', '2000-01-01', 'male', 9860555555, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`role_id`, `role_name`) VALUES
(1, 'User'),
(2, 'Developer'),
(3, 'adminstrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `file_id` (`file_id`),
  ADD KEY `uploader_id` (`author_id`);

--
-- Indexes for table `article_categories`
--
ALTER TABLE `article_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `comment_user_id` (`comment_user_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`,`link`(100));

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1013;

--
-- AUTO_INCREMENT for table `article_categories`
--
ALTER TABLE `article_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `files` (`file_id`),
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`comment_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
