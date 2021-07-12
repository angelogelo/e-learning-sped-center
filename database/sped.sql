-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2021 at 03:46 PM
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
(8, ' Narciso R. Ramos Elementary School', 'Asingan, Pangasinan', 'The mission of the Department of Special Education is to improve the quality of life of people with disabilities and their families by developing and disseminating essential skills, knowledge, and values through research, teaching, and service', 'A collaborative community that maximizes the experiences of all learners, birth through age 21. Special education processes are participant friendly, culturally responsive and collaborative with a focus on the strengths and needs of the student / child.');

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
(1, 'admin', 'admin', 'admin', 'admin', 'male', 'none', 'none', '12345', 'activated', '2019-09-03 20:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cms` varchar(255) NOT NULL DEFAULT 'true',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `description`, `cms`, `created_at`) VALUES
(3, 'Fogging', 'School Foggings', 'true', '2021-06-02 05:33:53'),
(4, 'Asd', 'Asdas', 'true', '2021-06-02 05:33:54');

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
  `assign_teacher` varchar(250) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disability`
--

INSERT INTO `disability` (`id`, `assign_teacher`, `description`, `created_at`) VALUES
(1, '2021', 'Visual Impairment', '2021-05-29 18:31:21'),
(2, '2022', 'ADHD', '2021-06-02 04:15:34'),
(3, '2023', 'Down Syndrome', '2021-05-29 18:31:36'),
(4, 'Asd', 'Mute', '2021-05-31 04:15:59');

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
(14, '27', '1.png', '2021-05-29 18:45:51'),
(15, '27', '2.png', '2021-05-29 18:45:52'),
(16, '27', '3.png', '2021-05-29 18:45:52'),
(17, '27', '4.png', '2021-05-29 18:45:52'),
(18, '28', '11.png', '2021-05-29 18:46:34'),
(19, '28', '12.png', '2021-05-29 18:46:34'),
(20, '28', '13.png', '2021-05-29 18:46:34'),
(21, '28', '14.png', '2021-05-29 18:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `flash_cards_title`
--

CREATE TABLE `flash_cards_title` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `teacher_id` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flash_cards_title`
--

INSERT INTO `flash_cards_title` (`id`, `title`, `teacher_id`, `created_at`) VALUES
(27, 'Letters', '2021', '2021-05-29 18:43:45'),
(28, 'Animals', '2021', '2021-05-29 18:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `id` int(11) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `last_login` varchar(250) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`id`, `user_id`, `last_login`, `last_activity`) VALUES
(23, 'LRN1', '1622878116', '2021-06-05 07:28:26'),
(24, 'LRN2', '1622615821', '2021-06-02 06:36:51'),
(25, 'wew', '1622434633', '2021-05-31 04:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(10) NOT NULL,
  `user` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user`, `title`, `details`, `created_at`) VALUES
(132, 'lrn1', 'Student Logout', 'Student has been logout to the System.', '2021-06-02 06:25:44'),
(133, 'lrn2', 'Student Login', 'Princess Prado is now Login to the system', '2021-06-02 06:25:55'),
(134, '2022', 'Teacher Logout', 'Teacher has been logout to the System.', '2021-06-02 06:26:08'),
(135, '2021', 'Teacher Login', 'Gian Carino is now Login to the system', '2021-06-02 06:26:11'),
(136, '2021', 'Teacher Logout', 'Teacher has been logout to the System.', '2021-06-02 06:26:16'),
(137, '2022', 'Teacher Login', 'Jan Michael Espiritu is now Login to the system', '2021-06-02 06:26:19'),
(138, 'lrn2', 'Student Logout', 'Student has been logout to the System.', '2021-06-02 06:27:56'),
(139, '2022', 'Teacher Logout', 'Teacher has been logout to the System.', '2021-06-02 06:32:28'),
(140, 'Admin', 'Admin Login', 'Administrator is now Login to the system', '2021-06-02 06:32:30'),
(141, 'admin', 'Admin Logout', 'Admin has been logout to the System.', '2021-06-02 06:36:31'),
(142, '2021', 'Teacher Login', 'Gian Carino is now Login to the system', '2021-06-02 06:36:36'),
(143, '2021', 'Teacher Logout', 'Teacher has been logout to the System.', '2021-06-02 06:36:42'),
(144, 'lrn2', 'Student Login', 'Princess Prado is now Login to the system', '2021-06-02 06:36:46'),
(145, 'lrn2', 'Student Logout', 'Student has been logout to the System.', '2021-06-02 06:36:52'),
(146, '2022', 'Teacher Login', 'Jan Michael Espiritu is now Login to the system', '2021-06-02 06:36:57'),
(147, 'lrn1', 'Student Login', 'Shanne Marie Capinpin is now Login to the system', '2021-06-02 06:41:19'),
(148, '2021', 'Teacher Login', 'Gian Carino is now Login to the system', '2021-06-05 06:44:18'),
(149, '2021', 'Teacher Login', 'Gian Carino is now Login to the system', '2021-06-05 06:59:35'),
(150, '2021', 'Teacher Login', 'Gian Carino is now Login to the system', '2021-06-05 07:10:22'),
(151, '2021', 'Teacher Logout', 'Teacher has been logout to the System.', '2021-06-05 07:11:02'),
(152, '2021', 'Teacher Login', 'Gian Carino is now Login to the system', '2021-06-05 07:11:37'),
(153, '2021', 'Teacher Logout', 'Teacher has been logout to the System.', '2021-06-05 07:11:59'),
(154, 'Admin', 'Admin Login', 'Administrator is now Login to the system', '2021-06-05 07:12:22'),
(155, 'admin', 'Admin Logout', 'Admin has been logout to the System.', '2021-06-05 07:12:45'),
(156, '2023', 'Teacher Login', 'Ramel Macaraeg is now Login to the system', '2021-06-05 07:12:50'),
(157, '2023', 'Teacher Logout', 'Teacher has been logout to the System.', '2021-06-05 07:13:01'),
(158, 'Admin', 'Admin Login', 'Administrator is now Login to the system', '2021-06-05 07:13:05'),
(159, 'admin', 'Admin Logout', 'Admin has been logout to the System.', '2021-06-05 07:13:32'),
(160, '2021', 'Teacher Login', 'Gian Carino is now Login to the system', '2021-06-05 07:13:35'),
(161, '2021', 'Teacher Logout', 'Teacher has been logout to the System.', '2021-06-05 07:23:49'),
(162, 'lrn1', 'Student Login', 'Shanne Marie Capinpin is now Login to the system', '2021-06-05 07:23:53'),
(163, 'lrn1', 'Student Logout', 'Student has been logout to the System.', '2021-06-05 07:25:00'),
(164, 'Admin', 'Admin Login', 'Administrator is now Login to the system', '2021-06-05 07:25:03'),
(165, 'admin', 'Admin Logout', 'Admin has been logout to the System.', '2021-06-05 07:27:44'),
(166, 'lrn1', 'Student Login', 'Shanne Marie Capinpin is now Login to the system', '2021-06-05 07:28:19'),
(167, 'lrn1', 'Student Logout', 'Student has been logout to the System.', '2021-06-05 07:28:26'),
(168, '2021', 'Teacher Login', 'Gian Carino is now Login to the system', '2021-06-05 07:28:37'),
(169, '2021', 'Teacher Logout', 'Teacher has been logout to the System.', '2021-06-05 07:29:04'),
(170, '2021', 'Teacher Login', 'Gian Carino is now Login to the system', '2021-06-05 07:29:18'),
(171, '2021', 'Teacher Logout', 'Teacher has been logout to the System.', '2021-06-05 07:29:38'),
(172, 'Admin', 'Admin Login', 'Administrator is now Login to the system', '2021-06-05 07:30:10'),
(173, 'admin', 'Admin Logout', 'Admin has been logout to the System.', '2021-06-05 07:31:04'),
(174, '', 'Student Logout', 'Student has been logout to the System.', '2021-06-05 07:41:23');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `disability` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `teacher_id` varchar(250) NOT NULL,
  `file` text NOT NULL,
  `view` varchar(255) NOT NULL DEFAULT '0',
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `disability`, `title`, `teacher_id`, `file`, `view`, `created_at`) VALUES
(11, '1', 'Mathematics', '2021', 'me.docx', '6', '2021-05-30 02:47:02'),
(12, '2', 'English', '2022', 'us.docx', '4', '2021-05-30 02:48:20');

-- --------------------------------------------------------

--
-- Table structure for table `module_view`
--

CREATE TABLE `module_view` (
  `id` int(11) NOT NULL,
  `module_id` varchar(255) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `lrn_id` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module_view`
--

INSERT INTO `module_view` (`id`, `module_id`, `teacher_id`, `lrn_id`, `created_at`) VALUES
(69, '11', '2021', 'lrn1', '2021-05-29 19:00:54'),
(70, '12', '2022', 'lrn2', '2021-05-29 19:00:56'),
(74, '12', '2022', 'lrn2', '2021-05-29 19:16:18'),
(75, '11', '2021', 'lrn1', '2021-05-29 19:16:48'),
(76, '11', '2021', 'lrn1', '2021-05-29 19:17:09'),
(77, '12', '2022', 'lrn2', '2021-06-02 06:26:31'),
(78, '12', '2022', 'lrn2', '2021-06-02 06:27:38'),
(79, '11', '2021', 'lrn1', '2021-06-05 07:23:58'),
(80, '11', '2021', 'lrn1', '2021-06-05 07:24:16'),
(81, '11', '2021', 'lrn1', '2021-06-05 07:24:25');

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
  `status` varchar(255) NOT NULL DEFAULT 'activated',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `lrn`, `type`, `picture`, `fullname`, `disability`, `contact_no`, `address`, `gender`, `status`, `created_at`) VALUES
(9, 'LRN1', 'student', '1622313240_1575459576_nonales.png', 'Shanne Marie Capinpin', '1', 'lrn1', 'urdaneta, pangasinan', 'Female', 'activated', '2021-06-02 06:19:38'),
(10, 'LRN2', 'student', '1622313286_1567571907_deguzman.png', 'Princess Prado', '2', 'lrn2', 'Pangasinan', 'Female', 'activated', '2021-06-02 06:36:11'),
(11, 'wew', 'student', '1622434545_1620871063_email-309491.png', 'wew', '4', 'wew', 'wew', 'Male', 'activated', '2021-05-31 04:15:45');

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
(11, '2021', 'teacher', '1622312706_1620824045_1569425601_cry.jpg', 'Gian Carino', '2021', 'gian@gmail.com', 'Alcala, Pangasinan', 'Male', 'activated', '2021-05-29 18:25:07'),
(12, '2022', 'teacher', '1622312746_1620823696_1575495009_myAvatar.png', 'Jan Michael Espiritu', '2022', 'janong@gmail.com', 'Pozorubio, Pangasinan', 'Male', 'activated', '2021-05-29 18:25:46'),
(13, '2023', 'teacher', '1622312778_1620823988_1567591139_micua.jpg', 'Ramel Macaraeg', '2023', 'ramel@gmail.com', 'Alcala, Pangasinan', 'Male', 'activated', '2021-05-29 18:26:19'),
(14, 'asd', 'teacher', '1622434383_1622131308_placeholder.png', 'asd', 'asd', 'asd@gmail.com', 'asd', 'Male', 'activated', '2021-05-31 04:13:03');

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
(3, 'admin', 'admin', '$2y$10$fG7axLyvDMqWdg02oECgCOCWJF6h10OPQugHsoIQxjOtpg42qUVxK', 'none', 'admin', 'approved', '12345', '2019-09-01 09:01:11'),
(239, '2021', '2021', '$2y$10$nZwT.TcMTnFiNitnKvGySeIi8stqqUbQRw0PoQRcl0xBbli.hozfG', '1622312706_1620824045_1569425601_cry.jpg', 'teacher', 'approved', '2021', '2021-05-29 18:25:07'),
(240, '2022', '2022', '$2y$10$zyYAhnNaoIWAer/4lVzzmOyAWc1mfyy34CoCYRjCwKVtvDoYuoL1u', '1622312746_1620823696_1575495009_myAvatar.png', 'teacher', 'approved', '2022', '2021-05-29 18:25:46'),
(241, '2023', '2023', '$2y$10$AOoAljsW9yYHPU0Qj98RHOARFGJCQNeQqHCGrbFIXgngYgTJLUxuW', '1622312778_1620823988_1567591139_micua.jpg', 'teacher', 'approved', '2023', '2021-05-29 18:26:19'),
(242, 'LRN1', 'LRN1', '$2y$10$lDrRkA6LOwJzK2ibicUQSeoUL3xjbUCU4K1jOIVUCcHf2udH4aEaO', '1622313240_1575459576_nonales.png', 'student', 'approved', 'lrn1', '2021-05-29 18:34:00'),
(243, 'LRN2', 'LRN2', '$2y$10$qtOmNquF2GYaUC7fwTxd4OLh0vXd34OMQGv3GYSX1kHt3OSyMDenq', '1622313286_1567571907_deguzman.png', 'student', 'approved', 'lrn2', '2021-05-29 18:34:46'),
(244, 'asd', 'asd', '$2y$10$fAUIO6TqJTc2CD3zFq5vGeDaEb5PVWHE9gQ.qsr3DaVJLo1/rvsUG', '1622434383_1622131308_placeholder.png', 'teacher', 'approved', 'asd', '2021-05-31 04:13:03'),
(245, 'wew', 'wew', '$2y$10$5KJwnlcM7C7vU.CalK0JG.drLTZRArQgabEd71p80JBnRGmovH/EC', '1622434545_1620871063_email-309491.png', 'student', 'approved', 'wew', '2021-05-31 04:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `disability` varchar(255) NOT NULL,
  `title` varchar(25) NOT NULL,
  `teacher_id` varchar(250) NOT NULL,
  `video` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `disability`, `title`, `teacher_id`, `video`, `created_at`) VALUES
(10, '1', 'For the kids', '2021', '1611050902_Components of Physical Fitness (MAPEH Educational Video).mp4', '2021-05-29 18:40:54');

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
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_view`
--
ALTER TABLE `module_view`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `disability`
--
ALTER TABLE `disability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `flash_cards_file`
--
ALTER TABLE `flash_cards_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `flash_cards_title`
--
ALTER TABLE `flash_cards_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `module_view`
--
ALTER TABLE `module_view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
