-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 28, 2021 at 10:48 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezeemaxntfs`
--

-- --------------------------------------------------------

--
-- Table structure for table `cats`
--

CREATE TABLE `cats` (
  `cat_id` int(11) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `icon` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`cat_id`, `cat`, `icon`, `status`) VALUES
(1, 'Animals', 'animal.svg', 1),
(2, 'Anime', 'anime.svg', 1),
(3, 'Landscapes', 'landscapes.svg', 1),
(4, 'Culture', 'culture.svg', 1),
(5, 'Athletics', 'athletics.svg', 1),
(6, 'Automotive', 'automotive.svg', 1),
(7, 'Finance', 'finance.svg', 1),
(8, 'Educational', 'educational.svg', 1),
(9, 'Emotional', 'emotional.svg', 1),
(10, 'Fashion', 'fashion.svg', 1),
(11, 'Festive', 'festive.svg', 1),
(12, 'Food', 'food.svg', 1),
(13, 'History', 'history.svg', 1),
(14, 'Graphics', 'graphics.svg', 1),
(15, 'Memes', 'memes.svg', 1),
(16, 'Movies', 'movies.svg', 1),
(17, 'Musical', 'musical.svg', 1),
(18, 'Nature', 'nature.svg', 1),
(19, 'People', 'people.svg', 1),
(20, 'Space', 'space.svg', 1),
(21, 'Spiritual ', 'spiritual.svg', 1),
(22, 'Traveling', 'traveling.svg', 1),
(23, 'Technology', 'technology.svg', 1),
(24, 'Texture', 'texture.svg', 1),
(25, 'Gaming', 'gaming.svg', 1),
(27, 'Comics', 'comics.svg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(11) DEFAULT NULL,
  `post_author` varchar(50) DEFAULT NULL,
  `comment_author` varchar(50) DEFAULT '',
  `connection` varchar(50) DEFAULT NULL,
  `category` varchar(25) DEFAULT '',
  `contact_no` varchar(15) DEFAULT '',
  `comment_email` varchar(50) DEFAULT NULL,
  `comment_content` varchar(255) DEFAULT '',
  `type` varchar(50) DEFAULT '',
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0,
  `viewed` varchar(3) DEFAULT 'no',
  `appointment_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `post_author`, `comment_author`, `connection`, `category`, `contact_no`, `comment_email`, `comment_content`, `type`, `date`, `status`, `viewed`, `appointment_date`) VALUES
(6, 285, 'admin', 'admin', NULL, NULL, NULL, 'admin@excarz.co.za', ',mnm,nmd,nvcx', 'comment', '2020-12-13 17:51:37', 1, 'yes', '2020-12-13 17:51:37'),
(7, 283, 'admin', 'no-reply', NULL, NULL, NULL, 'no-reply@excarz.co.za', 'Another test ', 'comment', '2020-12-13 17:55:55', 1, 'yes', '2020-12-13 17:55:55'),
(8, NULL, 'admin', NULL, 'no-reply', NULL, NULL, 'no-reply@excarz.co.za', NULL, 'connection', '2020-12-13 17:55:55', 0, 'yes', '2020-12-13 17:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `currency_id` int(11) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `icon` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currency_id`, `currency`, `icon`, `status`) VALUES
(1, 'ADA', 'img.svg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `post_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `category` varchar(255) NOT NULL,
  `sub_category` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `url` varchar(30) DEFAULT NULL,
  `title` varchar(80) DEFAULT '',
  `description` text DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `img` text DEFAULT NULL,
  `payment_type` varchar(255) NOT NULL,
  `currency` varchar(111) NOT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `voice_call` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `email_me` varchar(30) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `comment_count` int(11) NOT NULL DEFAULT 0,
  `post_views` int(11) NOT NULL DEFAULT 0,
  `post_likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`post_id`, `username`, `category`, `sub_category`, `cat_id`, `sub_cat_id`, `url`, `title`, `description`, `date`, `img`, `payment_type`, `currency`, `price`, `contact`, `email`, `voice_call`, `whatsapp`, `email_me`, `status`, `comment_count`, `post_views`, `post_likes`) VALUES
(286, 'EzeeMax', 'Animals', 'Apes', 1, 3, 'https://ezeemax.net', 'The ape of ape', 'This is a NTF of NTF', '2021-09-27 21:37:37', 'jeep-4640909_640.jpg', 'cash', 'ADA', '2000', '0817884082', 'eric@ezeemax.net', 'yes', 'yes', 'yest', 1, 0, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE `img` (
  `img_id` int(11) NOT NULL,
  `img` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`img_id`, `img`, `active`) VALUES
(1, 'lenovoCover.jpg', 1),
(4, 'screensCover.jpg', 1),
(6, 'keyboard.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_cat`
--

CREATE TABLE `sub_cat` (
  `sub_cat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat` varchar(255) NOT NULL,
  `icon` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_cat`
--

INSERT INTO `sub_cat` (`sub_cat_id`, `cat_id`, `sub_cat`, `icon`, `status`) VALUES
(1, 1, 'Dogs', '', 1),
(2, 1, 'Cats', '', 1),
(3, 1, 'Monkeys', '', 1),
(4, 1, 'Lions', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL DEFAULT '',
  `last_name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL,
  `contact` varchar(11) NOT NULL DEFAULT '',
  `img` text DEFAULT NULL,
  `joined` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_description` varchar(150) NOT NULL DEFAULT '',
  `validation_code` text NOT NULL,
  `user_role` varchar(255) DEFAULT 'user',
  `activate` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`, `contact`, `img`, `joined`, `user_description`, `validation_code`, `user_role`, `activate`) VALUES
(21, 'EzeeMax', '$2y$12$rnePFTJFSyA7CUg2J3lC.uOhvqcTlr7jNlkqUsYNk8xGjNGuC5g7u', '', '', 'ericcoetzee123@gmail.com', '', NULL, '2021-09-27 19:38:16', '', '0', 'user', 1),
(22, 'aiden', 'jhskjfhjkdsahfsa', 'Aiden ', 'Botha', 'aiden@a.co', '09594', '878475', '2021-09-28 16:42:22', 'mjkfdsl', '', 'user', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cats`
--
ALTER TABLE `cats`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD UNIQUE KEY `comment_id` (`comment_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cats`
--
ALTER TABLE `cats`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=287;

--
-- AUTO_INCREMENT for table `img`
--
ALTER TABLE `img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_cat`
--
ALTER TABLE `sub_cat`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
