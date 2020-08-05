-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2020 at 09:59 PM
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
(15, 'employ1', '', '4cop.docx', '2020-01-09 10:03:33', 0x3139363138),
(17, 'employ1', '', 'Virtualization.pptx', '2020-01-09 11:06:23', 0x353433303334),
(18, 'employ5', 'aaaaa', '1error.docx', '2020-01-21 13:03:13', 0x3139363138),
(24, 'employ1', '', 'Filemanagement.zip', '2020-01-18 18:16:37', 0x30),
(26, 'employ6', 'ggggggg', 'Arduino bookCopy.pdf', '2020-01-21 13:01:29', 0x30),
(28, 'employ6', '', 'File-management-system.pptx', '2020-01-21 13:01:21', 0x31313330303839),
(30, 'employ1', '', 'File-system.pptx', '2020-01-21 08:25:50', 0x31313330303839),
(38, 'employ5', 'report', 'TendFile.docx', '2020-01-21 13:32:04', 0x393934343039),
(39, 'employ5', 'report1', 'productFile.docx', '2020-01-21 13:35:15', 0x393934343039),
(40, 'employ5', 'did', 'BillList.docx', '2020-01-21 13:42:06', 0x393934343039),
(41, 'employ1', '', 'movie sites.txt', '2020-06-22 20:45:19', 0x3633),
(42, 'employ1', '', '1errr.docx', '2020-06-22 20:46:11', 0x3139363138),
(43, 'employ1', '', '3roll.docx', '2020-06-22 21:50:28', 0x3139363138),
(44, 'employ1', '', '3rol.docx', '2020-06-22 21:55:28', 0x3139363138),
(45, 'employ1', '', 'movie sites.zip', '2020-06-22 22:16:46', 0x313834);

-- --------------------------------------------------------

--
-- Table structure for table `reportedcomments`
--

CREATE TABLE `reportedcomments` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reportedcomments`
--

INSERT INTO `reportedcomments` (`id`, `username`, `name`, `time`) VALUES
(2, 'employ1', 'fsa swdabui fbuibdia dbuiabuidw', '2020-06-22 20:00:29'),
(12, 'employ1', 'suborna afroz', '2020-06-22 20:00:29'),
(48, 'coadmin1', 'dswdabui fbuibdia dbuiabuidw', '2020-06-22 20:00:29'),
(62, 'coadmin1', 'd', '2020-06-22 20:00:29'),
(63, 'admin', 'fewfsa swdabui w', '2020-06-22 20:00:29'),
(64, 'admin', 'fe', '2020-06-22 20:00:59'),
(65, 'admin', 'fnie', '2020-06-22 20:09:16'),
(66, 'coadmin1', 'iuh', '2020-06-22 20:36:36'),
(67, 'employ1', 'denwonfoe', '2020-06-22 20:51:12'),
(68, 'employ1', 'dwhfiowj dfoiwioooooodbob dgigdiw', '2020-06-22 20:51:19'),
(69, 'employ1', 'dhwiohfioc nvksn', '2020-06-22 20:51:31'),
(70, 'employ1', 'nfkwsbvbbs fewvuvc cbsjvc vjvcweu uvvw vuydvwuvc iuvwe', '2020-06-22 20:51:43');

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
(5, 'admin', '', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 'Head', '', 'admin@gmail.com', '', '2019-10-24', 'active'),
(76, 'Rina', 'Khan', 'coadmin1', 'd2ab501d3a1f6eee48c638d754acaa26b159b633', 'coadmin', 'Marketing Department', 'coadmin1.png', 'coadmin1@gmail.com', 'Female', '2019-12-25', 'active'),
(77, 'nitto', 'Hoq', 'coadmin2', '9181713b2aaf9f091933264b74a9f150e42e98db', 'coadmin', 'Finance Department', 'coadmin2.png', 'coadmin2@gmail.com', 'Male', '2019-12-26', 'active'),
(78, 'Aya', 'Akter', 'employ1', '8e29b80d6eee80e4147d9212b179a4411bd0b0da', 'employ', 'Human Resource', 'employ1.jpg', 'employ1@gmail.com', 'Female', '2019-12-26', 'active'),
(79, 'Rahul', 'Hoq', 'employ2', '48b394726fa91b05198d8e64e58df0b05e08d470', 'employ', 'Service department', 'employ2.png', 'employ2@gmail.com', 'Male', '2019-12-27', 'active'),
(80, 'Rony', 'Khan', 'employ3', 'eb9468fe73e943395ff2c572f2da3771b0f21e86', 'employ', 'It', 'employ3.jpg', 'employ3@gmail.com', 'Male', '2019-12-26', 'active'),
(90, 'motoreq', 'Hoq', 'employ5', '0bc667ec457c9ccb6a079a5d288ea227ad69af5e', 'employ', 'Marketing Department', 'employ5.jpg', 'employ5@gmail.com', 'Male', '2020-01-16', 'active'),
(91, 'Nazma', 'rati', 'coadmin3', '9574c863d4c9fee1b965e3df599cbbd32195383c', 'coadmin', 'Pharmacy', 'coadmin3.', 'coadmin3@gmail.com', 'Female', '2020-01-15', 'active'),
(92, 'ratrir', 'shaha', 'employ6', '9219be600a569f40e25e4acbc1c7195beeb9a1e8', 'employ', 'Marketing Department', 'employ6.png', 'employ6@gmail.com', 'Female', '2020-01-09', 'inactive'),
(93, 'hsoi', 'ns', 'employ4', '330ac3c0fb94d3070a83c078857f63a16eab766d', 'employ', 'Finance Department', 'employ4.jpg', 'employ4@gmail.com', 'Female', '2020-01-16', 'active'),
(118, 'sb', '', 'sb', 'b70482a9c35b236639019cd8b2ecb03a9ee7db09', 'employ', 'it', 'sb.png', 'ssbh@gmail.com', 'Male', '0000-00-00', 'inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`up_id`);

--
-- Indexes for table `reportedcomments`
--
ALTER TABLE `reportedcomments`
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
  MODIFY `up_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `reportedcomments`
--
ALTER TABLE `reportedcomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
