-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2020 at 10:55 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdfilemanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `up_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `file` varchar(300) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `up_size` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`up_id`, `username`, `description`, `file`, `time`, `up_size`) VALUES
(1, '', '', 'fragment.docx', '2020-01-02 20:13:46', ''),
(9, 'employ1', '', '1data base.docx', '2020-01-02 20:29:23', ''),
(10, 'employ1', '', '1data base.docx', '2020-01-02 20:31:57', 0x3134393534),
(11, 'employ2', '', 'fragment.docx', '2020-01-02 20:32:37', 0x3139363138),
(12, 'employ2', '', 'error.docx', '2020-01-04 19:28:27', 0x3139363138),
(13, 'employ4', '', '1error.docx', '2020-01-09 09:39:32', 0x3139363138),
(14, 'employ4', '', '2practice.docx', '2020-01-09 09:39:56', 0x3134393534),
(15, 'employ1', '', '4cop.docx', '2020-01-09 10:03:33', 0x3139363138),
(16, 'employ1', '', 'File-management-system.pptx', '2020-01-09 11:00:27', 0x31313330303839),
(17, 'employ1', '', 'Virtualization.pptx', '2020-01-09 11:06:23', 0x353433303334),
(18, 'employ1', 'aaaaa', '1error.docx', '2020-01-09 11:09:18', 0x3139363138),
(19, 'employ1', '', 'aaaaa4cop.docx', '2020-01-09 15:41:31', 0x3139363138),
(20, 'employ1', '', '5aaaaa.docx', '2020-01-09 17:27:08', 0x3139363138),
(21, 'employ1', '', '2practice.docx', '2020-01-09 19:31:45', 0x3134393534),
(22, 'employ1', 'xsssssssss', '3nam.docx', '2020-01-09 21:31:20', 0x3139363138);

-- --------------------------------------------------------

--
-- Table structure for table `reportbox`
--

CREATE TABLE `reportbox` (
  `id` int(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `msg` varchar(300) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `entry_date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `username`, `password`, `user_type`, `department`, `photo`, `email`, `gender`, `entry_date`, `status`) VALUES
(3, '', '', 'user', '12dea96fec20593566ab75692c9949596833adc9', 'user', '', '', 'user@gmail.com', '', '0000-00-00', ''),
(5, '', '', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', '', '', 'admin@gmail.com', '', '0000-00-00', ''),
(76, 'Rina', 'Khan', 'coadmin1', 'd2ab501d3a1f6eee48c638d754acaa26b159b633', 'coadmin', 'Marketing Department', 'coadmin1.png', 'coadmin1@gmail.com', 'Female', '2019-12-25', 'active'),
(77, 'nitto', 'Hoq', 'coadmin2', '9181713b2aaf9f091933264b74a9f150e42e98db', 'coadmin', 'Finance Department', 'coadmin2.png', 'coadmin2@gmail.com', 'Male', '2019-12-26', 'active'),
(78, 'Aya', 'Akter', 'employ1', '8e29b80d6eee80e4147d9212b179a4411bd0b0da', 'employ', 'Human Resource', 'employ1.jpg', 'employ1@gmail.com', 'Female', '2019-12-26', 'active'),
(79, 'Rahul', 'Hoq', 'employ2', '48b394726fa91b05198d8e64e58df0b05e08d470', 'employ', 'Service department', 'employ2.png', 'employ2@gmail.com', 'Male', '2019-12-27', 'active'),
(80, 'Rony', 'Khan', 'employ3', 'eb9468fe73e943395ff2c572f2da3771b0f21e86', 'employ', 'It', 'employ3.jpg', 'employ3@gmail.com', 'Male', '2019-12-26', 'active'),
(90, 'motoreq', 'Hoq', 'employ5', '0bc667ec457c9ccb6a079a5d288ea227ad69af5e', 'employ', 'It', 'employ5.jpg', 'employ5@gmail.com', 'Male', '2020-01-16', 'active'),
(91, 'Nazma', 'rati', 'coadmin3', '9574c863d4c9fee1b965e3df599cbbd32195383c', 'coadmin', 'Pharmacy', 'coadmin3.', 'coadmin3@gmail.com', 'Female', '2020-01-15', 'active'),
(92, 'ratrir', 'shaha', 'employ6', 'baa7a11295e04224c714ac44ad2e18c4b98d5c2d', 'employ', 'Marketing Department', 'employ6.png', 'employ6@gmail.com', 'Female', '2020-01-09', 'active'),
(93, 'hsoi', 'ns', 'employ4', '330ac3c0fb94d3070a83c078857f63a16eab766d', 'employ', 'Finance Department', 'employ4.jpg', 'employ4@gmail.com', 'Female', '2020-01-16', 'active'),
(94, 'aaaaa', '', 'aaaaa', 'df51e37c269aa94d38f93e537bf6e2020b21406c', 'employ', 'It', 'aaaaa.', 'aaaaa@gmail.com', 'Choose...', '0000-00-00', 'inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`up_id`);

--
-- Indexes for table `reportbox`
--
ALTER TABLE `reportbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `up_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reportbox`
--
ALTER TABLE `reportbox`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
