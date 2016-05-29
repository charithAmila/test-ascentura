-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: May 29, 2016 at 09:29 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `note` longtext NOT NULL,
  `created` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updted` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `note`, `created`, `created_at`, `updted`, `updated_at`) VALUES
(9, 'Yii2 Pjax Tutorial', 'pjax is a jQuery plugin that allows quick website navigation by combining ajax and pushState. It works by sending a special request to the server every time a link is clicked or a form is submitted. The server sends back the content that needs to be updated, pjax replaces old content with new content and pushes the new URL to browser history, without the need to update the whole page.', 26, '2016-05-26 10:24:24', NULL, NULL),
(10, 'Deploy Symfony2 on OpenShift', 'Deploying Symfony 2 on OpenShift is real easy and it’s free. You can even build a scalable application, that will add servers automatically when the load increases and remove servers when the load drops. OpenShift offers a Symfony 2.3 cartridge, no setup required, but in this tutorial we will setup Symfony 2.7 for deployment.', 26, '2016-05-28 16:44:59', NULL, NULL),
(11, 'AngularJS and Yii2 Part 2: Authentication', 'In this part we will cover form submission, form validation (with help from Yii2) and authentication. Here’s the the demo. The username is demo and the password is demo. Download the source code from GitHub.', 32, '2016-05-28 17:19:09', NULL, NULL),
(12, 'Configuring Yii2', 'If you haven’t configured the database connection in common/config/main-local.php, this would be a good time. After that apply the migration with the php yii migrate command. You can add a demo user with this SQL query if you need to.', 32, '2016-05-28 18:19:09', NULL, NULL),
(13, 'ApiController', 'Our frontend/controllers/ApiController.php will extend from yii\\rest\\Controller instead of yii\\web\\Controller.\r\n\r\nWe will be using HTTP Bearer Authentication for our app. AngularjS will send our login and password to Yii2 and Yii2 will send back an access_token. For all the requests after that we will send the access_token as part of the HTTP header in such format:', 32, '2016-05-28 17:19:57', NULL, NULL),
(19, 'Yii2 Routing – UrlManager', 'Chances are you’ve probably used UrlManager before, at least to enable “Pretty URLs” and hide index.php from the URL.\r\n\r\n//...\r\n''urlManager'' => [\r\n    ''class'' => ''yii\\web\\UrlManager'',\r\n    ''enablePrettyUrl'' => true,\r\n    ''showScriptName'' => false,\r\n],\r\n/..\r\nIt can do much more than that. Learn how to get the most of it in this tutorial.', 26, '2016-05-28 20:11:18', 26, '2016-05-28 20:11:18'),
(23, 'AngularJS and Yii2 Part 1: Routing', 'AngularJS is becoming more and more popular which makes it a valuable skill for both – frontend and backend web developers.\r\nIn this tutorial we will build an AngularJS web app with Yii framework 2.0 handling the backend. We will take the Yii2 advanced template as the base and Angularize it.\r\nThe first part of this tutorial will deal with navigation and partial views. This is how our final result will look. You can download the code from GitHub.', 33, '2016-05-29 09:04:36', 33, '2016-05-29 09:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`post_id`, `tag_id`) VALUES
(11, 1),
(13, 1),
(12, 2),
(9, 19),
(10, 19),
(11, 19),
(12, 19),
(13, 19),
(19, 19),
(23, 19),
(9, 33),
(10, 33),
(11, 33),
(12, 33),
(13, 33),
(19, 33),
(23, 33),
(11, 39),
(23, 39),
(19, 41);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `public_email` varchar(255) DEFAULT NULL,
  `phone` varchar(10) NOT NULL,
  `school` varchar(100) NOT NULL,
  `skype` varchar(100) NOT NULL,
  `gravatar_email` varchar(255) DEFAULT NULL,
  `gravatar_id` varchar(32) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `bio` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `last_name`, `public_email`, `phone`, `school`, `skype`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`) VALUES
(26, NULL, '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL),
(32, NULL, '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL),
(33, NULL, '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`, `created`, `created_at`) VALUES
(1, 'Education', 26, '2016-05-28 12:23:54'),
(2, 'Java', 26, '2016-05-28 12:23:54'),
(19, 'php', 26, '2016-05-28 13:40:27'),
(33, 'Yiii', 26, '2016-05-28 14:11:25'),
(39, 'AngularJS', NULL, '2016-05-28 15:19:01'),
(41, 'Url Manager', 32, '2016-05-28 16:50:43'),
(44, 'javascript', 26, '2016-05-29 06:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `role` varchar(100) NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `role`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`) VALUES
(26, 'admin', 'dkcadissanayaka@gmail.com', '$2y$10$f4DYlTu8E6L8iu.hNdErluGap/pxN54DSYUfApyHjet5L5agkTMGW', '5KoOWFGNfGaIU4-UETxbObiC3owo7_DN', 'admin', 1, NULL, NULL, '::1', 1462817993, 1462817993, 0),
(32, 'amila', 'amila@gmail.com', '$2y$10$mV8cJllTgVu03Fco9WwVNOloK17V7CUYekBoF1Vw8/B6JSXKAZdGO', '22M1D2_LvYhpCry38FaVhDDrF-hIMdD5', 'user', 1464452554, NULL, NULL, '::1', 1464452554, 1464452554, 0),
(33, 'uiheenatigala', 'ui@gmail.com', '$2y$10$EjrMVsYE8jQ/OkXifNXAdeWuWI15yv3K7VIKUNK5GP9AK6nPuKWgS', 'MRV6nHcDHlsOgGjSJJvcmjCdoZIioJRx', 'user', 1464505303, NULL, NULL, '::1', 1464505303, 1464505303, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created` (`created`),
  ADD KEY `updted` (`updted`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`post_id`,`tag_id`),
  ADD KEY `post_tag_ibfk_2` (`tag_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `crated` (`created`),
  ADD KEY `created` (`created`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`updted`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`created`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tag`
--
ALTER TABLE `tag`
  ADD CONSTRAINT `tag_ibfk_1` FOREIGN KEY (`created`) REFERENCES `user` (`id`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
