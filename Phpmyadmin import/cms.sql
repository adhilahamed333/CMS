-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2020 at 04:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `flows`
--

CREATE TABLE `flows` (
  `id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `submit` tinyint(1) NOT NULL DEFAULT 0,
  `submit_date` datetime DEFAULT current_timestamp(),
  `advisor` tinyint(1) NOT NULL,
  `advisor_id` varchar(255) NOT NULL,
  `a_remarks` varchar(255) NOT NULL,
  `a_date` datetime DEFAULT NULL,
  `hod` tinyint(1) NOT NULL,
  `hod_id` varchar(255) NOT NULL,
  `h_remarks` varchar(255) NOT NULL,
  `h_date` datetime DEFAULT NULL,
  `principal` tinyint(1) NOT NULL,
  `principal_id` varchar(255) NOT NULL,
  `p_remarks` varchar(255) NOT NULL,
  `p_date` datetime DEFAULT NULL,
  `office` tinyint(1) NOT NULL,
  `office_id` varchar(255) NOT NULL,
  `o_remarks` varchar(255) NOT NULL,
  `o_date` datetime DEFAULT NULL,
  `issued` tinyint(1) NOT NULL DEFAULT 0,
  `issue_date` datetime DEFAULT NULL,
  `receipt` tinyint(1) NOT NULL DEFAULT 0,
  `receipt_date` datetime DEFAULT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `c_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flows`
--

INSERT INTO `flows` (`id`, `request_id`, `submit`, `submit_date`, `advisor`, `advisor_id`, `a_remarks`, `a_date`, `hod`, `hod_id`, `h_remarks`, `h_date`, `principal`, `principal_id`, `p_remarks`, `p_date`, `office`, `office_id`, `o_remarks`, `o_date`, `issued`, `issue_date`, `receipt`, `receipt_date`, `completed`, `c_date`) VALUES
(70, 83, 1, '2020-04-02 15:21:15', 1, 'anju_advisor', 'done', '2020-04-02 15:21:46', 1, 'madhu_hod', 'did', '2020-04-02 15:23:27', 1, 'principal', 'done', '2020-04-02 15:23:39', 1, 'office_1', 'ready', '2020-04-02 15:23:51', 1, '2020-04-02 15:33:00', 1, '2020-04-02 19:22:12', 1, '2020-04-02 19:22:12'),
(71, 84, 1, '2020-04-02 18:58:47', -1, 'anju_advisor', 'fail', '2020-04-02 19:30:05', 0, '', '', NULL, 0, '', '', NULL, 0, '', '', NULL, 0, NULL, 0, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `owner` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `remarks` varchar(511) NOT NULL,
  `return_applicable` tinyint(1) NOT NULL DEFAULT 0,
  `returned` tinyint(1) NOT NULL DEFAULT 0,
  `return_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `type`, `owner`, `reason`, `remarks`, `return_applicable`, `returned`, `return_date`) VALUES
(83, 'Refund of fees', 6079, 'Scholarship', 'chumma', 1, 1, '2020-04-02 15:33:15'),
(84, 'Transfer', 6079, 'Scholarship', 'done', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_academic_entrys`
--

CREATE TABLE `student_academic_entrys` (
  `id` int(11) NOT NULL,
  `admission_no` int(11) NOT NULL,
  `qualifying_exam` varchar(255) NOT NULL,
  `period_of_study` varchar(255) NOT NULL,
  `name_of_institution` varchar(255) NOT NULL,
  `university_or_board` varchar(255) NOT NULL,
  `total_marks_secured` int(11) NOT NULL,
  `max_mark` int(11) NOT NULL,
  `tc_or_cc_no` varchar(255) NOT NULL,
  `date_of_tc_or_cc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_academic_entrys`
--

INSERT INTO `student_academic_entrys` (`id`, `admission_no`, `qualifying_exam`, `period_of_study`, `name_of_institution`, `university_or_board`, `total_marks_secured`, `max_mark`, `tc_or_cc_no`, `date_of_tc_or_cc`) VALUES
(1, 6079, 'Board', '2014-16', 'Sevamandir Post Basic HSS', 'HSE', 1095, 1200, 'seva/333', '2016-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `student_academic_exits`
--

CREATE TABLE `student_academic_exits` (
  `id` int(11) NOT NULL,
  `admission_no` int(11) NOT NULL,
  `cgpa` float DEFAULT NULL,
  `year_of_graduation` date DEFAULT NULL,
  `tc_no` varchar(255) NOT NULL,
  `tc_issue_date` date DEFAULT NULL,
  `conduct_and_chara` varchar(255) DEFAULT NULL,
  `rank_in_class` int(11) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_academic_exits`
--

INSERT INTO `student_academic_exits` (`id`, `admission_no`, `cgpa`, `year_of_graduation`, `tc_no`, `tc_issue_date`, `conduct_and_chara`, `rank_in_class`, `remarks`) VALUES
(1, 6079, NULL, NULL, '', '0000-00-00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_admissions`
--

CREATE TABLE `student_admissions` (
  `id` int(11) NOT NULL,
  `admission_no` int(11) NOT NULL,
  `date_of_admission` date DEFAULT NULL,
  `adcard_memo_no` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `category_admission` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_admissions`
--

INSERT INTO `student_admissions` (`id`, `admission_no`, `date_of_admission`, `adcard_memo_no`, `rank`, `category_admission`) VALUES
(1, 6079, '2016-07-13', 789, 11602, 'MU');

-- --------------------------------------------------------

--
-- Table structure for table `student_basics`
--

CREATE TABLE `student_basics` (
  `id` int(11) NOT NULL,
  `admission_no` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `semester` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date_of_joining` date DEFAULT NULL,
  `date_of_leaving` date DEFAULT NULL,
  `univercity_reg_no` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_basics`
--

INSERT INTO `student_basics` (`id`, `admission_no`, `course`, `branch`, `semester`, `username`, `date_of_joining`, `date_of_leaving`, `univercity_reg_no`) VALUES
(1, 6079, 'B Tech', 'CSE', 8, 'adhil', '2020-06-13', '0000-00-00', 'IDK16CS002'),
(2, 6000, 'B tech', 'CSE', 6, 'baby', '2020-06-13', '0000-00-00', 'IDK16CS006'),
(3, 6500, 'B tech', 'IT', 8, 'it', '2020-03-03', '0000-00-00', 'IDK16IT002');

-- --------------------------------------------------------

--
-- Table structure for table `student_familys`
--

CREATE TABLE `student_familys` (
  `id` int(11) NOT NULL,
  `admission_no` int(11) NOT NULL,
  `name_of_fm` varchar(255) NOT NULL,
  `occupation_of_fm` varchar(255) NOT NULL,
  `address_of_fm` varchar(511) NOT NULL,
  `phone_of_fm` bigint(20) DEFAULT NULL,
  `email_of_fm` varchar(255) NOT NULL,
  `name_of_lg` varchar(255) NOT NULL,
  `relation_with_lg` varchar(255) NOT NULL,
  `occupation_of_lg` varchar(255) NOT NULL,
  `address_of_lg` varchar(511) NOT NULL,
  `phone_of_lg` bigint(20) DEFAULT NULL,
  `email_of_lg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_familys`
--

INSERT INTO `student_familys` (`id`, `admission_no`, `name_of_fm`, `occupation_of_fm`, `address_of_fm`, `phone_of_fm`, `email_of_fm`, `name_of_lg`, `relation_with_lg`, `occupation_of_lg`, `address_of_lg`, `phone_of_lg`, `email_of_lg`) VALUES
(1, 6079, 'Mohamed Musthafa A.P', 'Business', 'Fathima Manzil,\r\nKodampuzha,\r\nP.O Farook College,\r\nCalicut,\r\n673632', 9388879074, '', '', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `student_personals`
--

CREATE TABLE `student_personals` (
  `id` int(11) NOT NULL,
  `admission_no` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `phone` bigint(15) DEFAULT NULL,
  `mobile` bigint(20) NOT NULL,
  `address` varchar(511) NOT NULL,
  `email` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_personals`
--

INSERT INTO `student_personals` (`id`, `admission_no`, `name`, `gender`, `dob`, `phone`, `mobile`, `address`, `email`, `category`) VALUES
(1, 6079, 'Adhil Ahamed A.P', 'male', '1998-12-11', 0, 8593007310, 'Fathima Manzil,\r\nKodampuzha,\r\nP.O Farook College,\r\nCalicut,\r\n673632', 'adhilahamed484@gmail.com', 'OBC'),
(2, 6000, 'amal baby', 'm', '2020-03-04', 8527419632, 8593007310, 'bhbjb', 'nlkjnj', 'oec'),
(3, 6500, 'It', 'm', '1998-12-11', 7894561230, 789456123852, 'asfasv', 'sdgsf', 'asfa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'adhil', 'e10adc3949ba59abbe56e057f20f883e', 'student'),
(3, 'madhu_hod', 'e10adc3949ba59abbe56e057f20f883e', 'hod'),
(4, 'anju_advisor', 'e10adc3949ba59abbe56e057f20f883e', 'advisor'),
(5, 'principal', 'e10adc3949ba59abbe56e057f20f883e', 'principal'),
(6, 'office_1', 'e10adc3949ba59abbe56e057f20f883e', 'office'),
(7, 'deepa_advisor', 'e10adc3949ba59abbe56e057f20f883e', 'advisor'),
(8, 'baby', 'e10adc3949ba59abbe56e057f20f883e', 'student'),
(9, 'office_2', 'e10adc3949ba59abbe56e057f20f883e', 'office'),
(10, 'office_3', 'e10adc3949ba59abbe56e057f20f883e', 'office'),
(11, 'office_4', 'e10adc3949ba59abbe56e057f20f883e', 'office'),
(12, 'office_5', 'e10adc3949ba59abbe56e057f20f883e', 'office'),
(13, 'it', 'e10adc3949ba59abbe56e057f20f883e', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flows`
--
ALTER TABLE `flows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Forign_req` (`request_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `Forign_adm` (`owner`),
  ADD KEY `Forign_type` (`type`);

--
-- Indexes for table `student_academic_entrys`
--
ALTER TABLE `student_academic_entrys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Forign_adm_acen` (`admission_no`);

--
-- Indexes for table `student_academic_exits`
--
ALTER TABLE `student_academic_exits`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admission_no` (`admission_no`),
  ADD UNIQUE KEY `tc_no` (`tc_no`);

--
-- Indexes for table `student_admissions`
--
ALTER TABLE `student_admissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admission_no` (`admission_no`);

--
-- Indexes for table `student_basics`
--
ALTER TABLE `student_basics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admission_no` (`admission_no`),
  ADD KEY `Forign_username` (`username`);

--
-- Indexes for table `student_familys`
--
ALTER TABLE `student_familys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admission_no` (`admission_no`);

--
-- Indexes for table `student_personals`
--
ALTER TABLE `student_personals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Forign_adm_no` (`admission_no`);

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
-- AUTO_INCREMENT for table `flows`
--
ALTER TABLE `flows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `student_academic_entrys`
--
ALTER TABLE `student_academic_entrys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_academic_exits`
--
ALTER TABLE `student_academic_exits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_admissions`
--
ALTER TABLE `student_admissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_basics`
--
ALTER TABLE `student_basics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_familys`
--
ALTER TABLE `student_familys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_personals`
--
ALTER TABLE `student_personals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flows`
--
ALTER TABLE `flows`
  ADD CONSTRAINT `Forign_req` FOREIGN KEY (`request_id`) REFERENCES `requests` (`request_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `Forign_adm` FOREIGN KEY (`owner`) REFERENCES `student_basics` (`admission_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Forign_type` FOREIGN KEY (`type`) REFERENCES `request_types` (`type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_academic_entrys`
--
ALTER TABLE `student_academic_entrys`
  ADD CONSTRAINT `Forign_adm_acen` FOREIGN KEY (`admission_no`) REFERENCES `student_basics` (`admission_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_academic_exits`
--
ALTER TABLE `student_academic_exits`
  ADD CONSTRAINT `Forign_adm_acex` FOREIGN KEY (`admission_no`) REFERENCES `student_basics` (`admission_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_admissions`
--
ALTER TABLE `student_admissions`
  ADD CONSTRAINT `Forign_adm_adm` FOREIGN KEY (`admission_no`) REFERENCES `student_basics` (`admission_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_basics`
--
ALTER TABLE `student_basics`
  ADD CONSTRAINT `Forign_username` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_familys`
--
ALTER TABLE `student_familys`
  ADD CONSTRAINT `Forign_adm_fam` FOREIGN KEY (`admission_no`) REFERENCES `student_basics` (`admission_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_personals`
--
ALTER TABLE `student_personals`
  ADD CONSTRAINT `Forign_adm_no` FOREIGN KEY (`admission_no`) REFERENCES `student_basics` (`admission_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
