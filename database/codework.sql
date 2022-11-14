-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2022 at 12:03 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Codify`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'abc@abc.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2019-01-21 10:38:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `cid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(128) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`cid`, `name`, `email`, `password`, `date`) VALUES
(2, 'client1', 'client@abc.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2019-01-28 11:12:30'),
(24, 'testc', 'testc@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '2022-05-09 17:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `client_infos`
--

CREATE TABLE `client_infos` (
  `id` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_infos`
--

INSERT INTO `client_infos` (`id`, `client`, `created_at`, `updated_at`) VALUES
(2, 0, '2019-01-28 16:42:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fbid` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `email`, `msg`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 'krunal', 'krunal@abc.com', 'nice work', 0, '2020-10-10 03:43:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `freelancer`
--

CREATE TABLE `freelancer` (
  `fid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(128) NOT NULL,
  `lang` varchar(10) NOT NULL,
  `cv` varchar(50) NOT NULL,
  `id_proof` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `freelancer`
--

INSERT INTO `freelancer` (`fid`, `name`, `email`, `password`, `lang`, `cv`, `id_proof`, `date`) VALUES
(1, 'freelancer', 'free@abc.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'php', 'user_data/2019-01-28-22-13-29-ba683e9ab36398d2c27b', 'user_data/2019-01-28-22-13-29-Brie-Larson-Actress0', '2019-01-28 11:13:29'),
(8, 'hamid', 'hamid@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'php', 'user_data/2022-05-10-03-25-45-irelia-league-of-leg', 'user_data/2022-05-10-03-25-45-1920x1080 Neon Samur', '2022-05-09 21:55:45'),
(7, 'testf2', 'testf2@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'php', 'user_data/2022-05-09-23-38-36-enslogo.jpg', 'user_data/2022-05-09-23-38-36-pegaxy_rent_bot.txt', '2022-05-09 18:08:36'),
(6, 'testf', 'testf@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'php', 'user_data/2022-05-09-23-31-21-Screenshot 2022-04-1', 'user_data/2022-05-09-23-31-21-cahier de charges st', '2022-05-09 18:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_infos`
--

CREATE TABLE `freelancer_infos` (
  `id` int(11) NOT NULL,
  `freelancer` int(11) NOT NULL,
  `lang` varchar(10) NOT NULL,
  `cv` varchar(50) NOT NULL,
  `id_proof` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `freelancer_infos`
--

INSERT INTO `freelancer_infos` (`id`, `freelancer`, `lang`, `cv`, `id_proof`, `created_at`, `updated_at`) VALUES
(1, 0, 'php', 'user_data/2019-01-28-22-13-29-ba683e9ab36398d2c27b', 'user_data/2019-01-28-22-13-29-Brie-Larson-Actress0', '2019-01-28 16:43:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(10, 228935754, 1288284516, 'gg'),
(9, 228935754, 1288284516, 'nice');

-- --------------------------------------------------------

--
-- Table structure for table `mssgusers`
--

CREATE TABLE `mssgusers` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fid` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mssgusers`
--

INSERT INTO `mssgusers` (`user_id`, `unique_id`, `fid`, `cid`, `name`, `email`, `password`, `usertype`, `img`, `status`) VALUES
(18, 228935754, 8, NULL, 'hamid', 'hamid@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'freelancer', '1652133345irelia-moba-warriors-league-of-legends-2020-games-besthqwallpapers.com-1366x768.jpg', 'Active now'),
(16, 1437626654, 0, NULL, 'nsa', 'nsa', 'nsa', 'freelancer', 'nsa', 'nsa'),
(17, 1309137648, 7, NULL, 'testf2', 'testf2@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'freelancer', '1652119716completefromhere.png', 'Active now'),
(14, 1288284516, NULL, 24, 'testc', 'testc@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'client', '1652118986enslogo.jpg', 'Offline'),
(15, 394241255, 6, NULL, 'testf', 'testf@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'freelancer', '1652119281WhatsApp Image 2022-04-13 at 8.57.06 PM.jpeg', 'Active now');

-- --------------------------------------------------------

--
-- Table structure for table `post_prj`
--

CREATE TABLE `post_prj` (
  `pid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `category` varchar(30) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `lang` varchar(20) NOT NULL,
  `cid` int(11) NOT NULL,
  `fid` int(11) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `cost` int(11) NOT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_prj`
--

INSERT INTO `post_prj` (`pid`, `name`, `detail`, `category`, `file`, `lang`, `cid`, `fid`, `status`, `duration`, `cost`, `paid`, `date`) VALUES
(1, 'website', 'ababab', 'website', '', 'php', 3, 0, '', '1 Week', 5000, 0, '2019-02-06 13:07:27'),
(2, 'E commerce website', 'Full featured e commerce website.', 'webdev', NULL, 'PHP', 2, 0, '', '1 Month', 10000, 0, '2020-10-10 00:17:04'),
(3, 'Blog website', 'Blog website that provide features like blog post, category, image and video etc.', 'web', NULL, 'PHP', 2, NULL, 'Pending', NULL, 5000, 0, '2020-11-06 23:07:07'),
(4, 'Website for College', 'College management website', 'web', NULL, 'PHP', 2, NULL, 'Pending', NULL, 10000, 0, '2020-11-06 23:18:56'),
(14, '3awd2', '3awd23awd23awd23awd23awd2', 'webdev', NULL, 'php', 24, NULL, 'Pending', NULL, 123, 0, '2022-05-09 22:17:01'),
(15, 'maghaytl3 walo', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', 'webdev', NULL, 'php', 24, NULL, 'Pending', NULL, 1111111, 0, '2022-05-09 23:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `post_req`
--

CREATE TABLE `post_req` (
  `rid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_req`
--

INSERT INTO `post_req` (`rid`, `pid`, `fid`, `msg`, `price`, `duration`, `status`, `date`) VALUES
(2, 2, 1, 'i have created more than  5 e commerce websites in PHP.', 2000, '1 Month', '', '2020-10-10 00:18:30'),
(3, 1, 1, 'I have 5 years of experiences in PHP website', 4000, '2 Weeks', '', '2020-10-23 23:14:59'),
(4, 3, 1, 'I can do this. I have 5 years of experience.', 8000, '1 Month', '', '2020-11-06 23:28:22'),
(7, 12, 6, 'blablblblablablablablablabalbblablbalblbal', 1000, '1111', 'completed', '2022-05-09 19:04:52'),
(8, 12, 7, 'brrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 22222, '22222', '', '2022-05-09 19:09:35'),
(9, 4, 7, 'ajhsdlkahskldhakljshdkajshdkahskdjhaskdakjshd', 32131, '3', '', '2022-05-09 19:47:32'),
(10, 13, 6, '1111111111111111111111111111111111111111111111111111111111', 200, '100', 'completed', '2022-05-09 21:40:35'),
(11, 13, 7, '22222222222222222222222222222222222', 22222222, '222222222', '', '2022-05-09 21:45:29'),
(12, 14, 7, '3333333333333333333333333333333333333333333', 2147483647, '333333333333', '', '2022-05-09 22:17:23'),
(13, 14, 6, '12333333333333333333333333333333333', 123, '12333333333333', '', '2022-05-09 22:17:42'),
(14, 14, 8, 'djhfjfdhjfhdjdfdfdfdfdfdfddfdf', 123, '123', '', '2022-05-09 22:56:22'),
(15, 15, 8, '00000000000000000000000000000000000000000000000000000000000000000000', 0, '0', '', '2022-05-09 23:01:56');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `category` varchar(30) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `language` varchar(20) NOT NULL,
  `client` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `cost` int(11) NOT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `detail`, `category`, `file`, `language`, `client`, `duration`, `status`, `cost`, `paid`, `created_at`, `updated_at`) VALUES
(1, 'website', 'ababab', 'website', '', 'php', 3, 0, '', 5000, 0, '2019-02-06 07:37:27', NULL),
(2, 'E commerce website', 'Full featured e commerce website.', 'webdev', 'user_data/2020-10-10-09-19-04-client.zip', 'PHP', 2, 1, 'completed', 10000, 0, '2020-10-09 18:47:04', NULL),
(3, 'Inventory System', 'Inventory system with payment options', 'webdev', 'user_data/2020-10-10-09-43-17-client.zip', 'PHP', 2, 1, 'completed', 50000, 0, '2020-10-10 03:50:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `rid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`rid`, `pid`, `fid`, `msg`, `status`, `date`) VALUES
(1, 1, 1, 'I have 5 years of work experience  in php.', '', '2020-10-10 00:14:08'),
(2, 2, 1, 'i have created more than  5 e commerce websites in PHP.', 'completed', '2020-10-10 00:18:30'),
(3, 3, 1, 'I have done more than 5 inventory systems.', 'completed', '2020-10-10 09:41:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `fid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(128) NOT NULL,
  `lang` varchar(10) NOT NULL,
  `cv` varchar(50) NOT NULL,
  `id_proof` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fid`, `name`, `email`, `password`, `lang`, `cv`, `id_proof`, `date`) VALUES
(1, 'freelancer', 'free@abc.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'php', 'user_data/2019-01-28-22-13-29-ba683e9ab36398d2c27b', 'user_data/2019-01-28-22-13-29-Brie-Larson-Actress0', '2019-01-28 16:43:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `client_infos`
--
ALTER TABLE `client_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fbid`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelancer`
--
ALTER TABLE `freelancer`
  ADD PRIMARY KEY (`fid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `freelancer_infos`
--
ALTER TABLE `freelancer_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `mssgusers`
--
ALTER TABLE `mssgusers`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `post_prj`
--
ALTER TABLE `post_prj`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `post_req`
--
ALTER TABLE `post_req`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`fid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `client_infos`
--
ALTER TABLE `client_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fbid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `freelancer`
--
ALTER TABLE `freelancer`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `freelancer_infos`
--
ALTER TABLE `freelancer_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mssgusers`
--
ALTER TABLE `mssgusers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `post_prj`
--
ALTER TABLE `post_prj`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `post_req`
--
ALTER TABLE `post_req`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
