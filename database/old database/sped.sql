-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2021 at 05:23 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sped`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `school_name` varchar(50) NOT NULL,
  `school_address` varchar(50) NOT NULL,
  `mission` varchar(500) NOT NULL,
  `vision` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `school_name`, `school_address`, `mission`, `vision`) VALUES
(8, ' Narciso R. Ramos Elementary School', 'Asingan, Pangasinan', 'The mission of the Department of Special Education is to improve the quality of life of people with disabilities and their families by developing and disseminating essential skills, knowledge, and values through research, teaching, and service', 'Vision: A collaborative community that maximizes the experiences of all learners, birth through age 21. Special education processes are participant friendly, culturally responsive and collaborative with a focus on the strengths and needs of the student / child.');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `admin_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activated',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_id`, `last_name`, `first_name`, `middle_name`, `gender`, `address`, `picture`, `contact_no`, `status`, `created_at`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'male', 'none', 'none', '09392813810', 'activated', '2019-09-03 20:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `description`, `created_at`) VALUES
(3, 'Fogging', 'School Foggings', '2021-05-14 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `social_media` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `contact_no`, `social_media`, `email`) VALUES
(6, '0948 108 0657', 'https://www.facebook.com/NarcisoRRamosESSC/', 'gianixxx01@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `disability`
--

CREATE TABLE `disability` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disability`
--

INSERT INTO `disability` (`id`, `description`) VALUES
(1, 'Visual Impairment'),
(2, 'ADHD'),
(3, 'Down Syndrome'),
(4, 'Mute');

-- --------------------------------------------------------

--
-- Table structure for table `flash_cards_file`
--

CREATE TABLE `flash_cards_file` (
  `id` int(11) NOT NULL,
  `title_id` varchar(255) NOT NULL,
  `files_images` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flash_cards_file`
--

INSERT INTO `flash_cards_file` (`id`, `title_id`, `files_images`, `created_at`) VALUES
(4, '22', '1.png', '2021-05-07 16:14:55'),
(5, '22', '2.png', '2021-05-07 16:14:55'),
(6, '22', '3.png', '2021-05-07 16:14:56'),
(7, '22', '4.png', '2021-05-07 16:14:56'),
(8, '23', '11.png', '2021-05-07 16:25:39'),
(9, '23', '12.png', '2021-05-07 16:25:39'),
(10, '23', '13.png', '2021-05-07 16:25:39'),
(11, '23', '14.png', '2021-05-07 16:25:39'),
(13, '22', 'a052nbQ_700b.jpg', '2021-05-13 01:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `flash_cards_title`
--

CREATE TABLE `flash_cards_title` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flash_cards_title`
--

INSERT INTO `flash_cards_title` (`id`, `title`, `created_at`) VALUES
(22, 'Numbers', '2021-05-07 13:20:31'),
(23, 'Animals', '2021-05-07 16:21:29'),
(24, 'Janong', '2021-05-13 01:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `disability` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `disability`, `title`, `file`, `created_at`) VALUES
(7, '1', 'Ghian', 'LEARNING-CONTRACT.docx', '2021-05-13 01:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `lrn` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `picture` text NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `disability` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `lrn`, `type`, `picture`, `fullname`, `disability`, `contact_no`, `address`, `gender`, `status`, `created_at`) VALUES
(4, '2002', 'student', '1620869133_cap-1266204.png', 'Janong Lovers', '2', '123', 'Pangasinan', 'Male', '', '2021-05-13 01:25:33'),
(5, '2003', 'student', '1620871207_cap-1266204.png', 'Jan Michael Espiritu', '1', '09667548248', 'Pozorrubio', 'Male', '', '2021-05-13 02:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `picture` text NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `contact_no` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'activated',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `teacher_id`, `type`, `picture`, `fullname`, `contact_no`, `email`, `address`, `gender`, `status`, `created_at`) VALUES
(5, '1001', 'teacher', '1620823696_1575495009_myAvatar.png', 'Ghian Carino', '09123456789', 'ghian@gmail.com', 'Pangasinan', 'Male', 'deactivated', '2021-05-13 02:26:59'),
(6, '1002', 'teacher', '1620823988_1567591139_micua.jpg', 'Jan Michael Espiritu', '091234567890', 'janong@gmail.com', 'Pangasinan', 'Male', 'activated', '2021-05-12 12:53:30'),
(8, '1003', 'teacher', '1620871063_email-309491.png', 'Ramel Macaraeg', '099999999999', 'ramel@gmail.com', 'Alcala', 'Male', 'activated', '2021-05-13 01:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `identification` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'approved',
  `contact_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `identification`, `username`, `password`, `picture`, `type`, `status`, `contact_no`, `created_at`) VALUES
(3, 'admin', 'admin', '$2y$10$fG7axLyvDMqWdg02oECgCOCWJF6h10OPQugHsoIQxjOtpg42qUVxK', 'none', 'admin', 'approved', '09368006498', '2019-09-01 09:01:11'),
(228, '1001', '1001', '$2y$10$ZUOn7/aYiS4rjV5x0sZAF.ZD80MDE63xtOE8hAuhGPVcmcYlDh2l6', '1620823696_1575495009_myAvatar.png', 'teacher', 'approved', '09123456789', '2021-05-12 12:48:16'),
(229, '1002', '1002', '$2y$10$WN4tbBT0wK2jJVRhgFvgmOPBKWiXzWe02IUsMzncrV/4JGN0QK25a', '1620823988_1567591139_micua.jpg', 'teacher', 'approved', '091234567890', '2021-05-12 12:53:08'),
(231, '2002', '2002', '$2y$10$6PaXNVZz6qMnUF8em5gv1O6hm9y8XOX5KUg4HVIZzgLATALOJaARO', '1620869133_cap-1266204.png', 'student', 'approved', '123', '2021-05-13 01:25:33'),
(232, '1003', '1003', '$2y$10$AuBmtPO.phCrgC7s6G/tvOYQM1X0i0LkGWT//REfRNOEseC08FrIW', '1620871063_email-309491.png', 'teacher', 'approved', '099999999999', '2021-05-13 01:57:43'),
(233, '2003', '2003', '$2y$10$ACP3HGeU0hxCefkNNrrdg.K0fzopJEya5UYWvqYhLWGWr.aL0v1IC', '1620871207_cap-1266204.png', 'student', 'approved', '09667548248', '2021-05-13 02:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `disability` varchar(255) NOT NULL,
  `title` varchar(25) NOT NULL,
  `video` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `disability`, `title`, `video`, `created_at`) VALUES
(7, '1', 'wew', 'Components of Physical Fitness (MAPEH Educational Video).mp4', '2021-05-13 01:21:57'),
(8, '4', 'Sign Languages', 'Components of Physical Fitness (MAPEH Educational Video).mp4', '2021-05-13 02:02:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disability`
--
ALTER TABLE `disability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flash_cards_file`
--
ALTER TABLE `flash_cards_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flash_cards_title`
--
ALTER TABLE `flash_cards_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `disability`
--
ALTER TABLE `disability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `flash_cards_file`
--
ALTER TABLE `flash_cards_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `flash_cards_title`
--
ALTER TABLE `flash_cards_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
