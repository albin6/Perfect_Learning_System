-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2023 at 09:17 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `learn_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_assignment`
--

CREATE TABLE IF NOT EXISTS `tb_assignment` (
  `as_id` int(11) NOT NULL AUTO_INCREMENT,
  `tr_id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `sm_id` int(11) NOT NULL,
  `sb_id` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`as_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_assignment`
--

INSERT INTO `tb_assignment` (`as_id`, `tr_id`, `dep_id`, `sm_id`, `sb_id`, `deadline`, `description`) VALUES
(1, 6, 1, 1, 2, '2023-04-29', 'Percentage Assignment');

-- --------------------------------------------------------

--
-- Table structure for table `tb_departments`
--

CREATE TABLE IF NOT EXISTS `tb_departments` (
  `dep_id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(100) NOT NULL,
  PRIMARY KEY (`dep_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_departments`
--

INSERT INTO `tb_departments` (`dep_id`, `department`) VALUES
(1, 'BCA'),
(2, 'BBA'),
(3, 'B com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_doubt`
--

CREATE TABLE IF NOT EXISTS `tb_doubt` (
  `db_id` int(11) NOT NULL AUTO_INCREMENT,
  `tr_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `doubt` longtext NOT NULL,
  `reply` longtext NOT NULL,
  PRIMARY KEY (`db_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_doubt`
--

INSERT INTO `tb_doubt` (`db_id`, `tr_id`, `st_id`, `date`, `doubt`, `reply`) VALUES
(1, 6, 4, '2023-04-26', 'What is the formula of distance between two points?', '√(x2 - x1)^2 + (y2-y1)^2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_feedback`
--

CREATE TABLE IF NOT EXISTS `tb_feedback` (
  `fd_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_id` int(11) NOT NULL,
  `rec_id` int(11) NOT NULL,
  `feedback` longtext NOT NULL,
  `reply` longtext NOT NULL,
  `feedback_date` date NOT NULL,
  PRIMARY KEY (`fd_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_feedback`
--

INSERT INTO `tb_feedback` (`fd_id`, `log_id`, `rec_id`, `feedback`, `reply`, `feedback_date`) VALUES
(1, 6, 2, 'Good Service', 'thanks for your reply', '2023-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE IF NOT EXISTS `tb_login` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` longtext NOT NULL,
  `role` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`log_id`, `username`, `password`, `role`, `status`) VALUES
(2, 'admin', 'admin', 'admin', 1),
(4, 'man12', 'man12', 'student', 1),
(6, 'rama12', 'rama12', 'teacher', 1),
(9, 'anu12', 'anu12', 'student', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_semester`
--

CREATE TABLE IF NOT EXISTS `tb_semester` (
  `sm_id` int(11) NOT NULL AUTO_INCREMENT,
  `semester` varchar(200) NOT NULL,
  PRIMARY KEY (`sm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_semester`
--

INSERT INTO `tb_semester` (`sm_id`, `semester`) VALUES
(1, 'Semester 1'),
(3, 'Semester 2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_student_register`
--

CREATE TABLE IF NOT EXISTS `tb_student_register` (
  `st_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `address` varchar(150) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `sm_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`st_id`),
  KEY `tb_Student_register_log_id_04f30560_fk_tb_Login_log_id` (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_student_register`
--

INSERT INTO `tb_student_register` (`st_id`, `name`, `address`, `contact_no`, `email`, `dep_id`, `sm_id`, `log_id`) VALUES
(1, 'Manu M', 'Manu Bhavan', 9856524585, 'manu@gmail.com', 1, 1, 4),
(3, 'Anu', 'Anu Bhavan', 8974565452, 'anu@gmail.com', 1, 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_subject`
--

CREATE TABLE IF NOT EXISTS `tb_subject` (
  `sb_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(60) NOT NULL,
  PRIMARY KEY (`sb_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_subject`
--

INSERT INTO `tb_subject` (`sb_id`, `subject`) VALUES
(1, 'C++'),
(2, 'Maths'),
(3, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `tb_teacher_register`
--

CREATE TABLE IF NOT EXISTS `tb_teacher_register` (
  `st_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `address` varchar(150) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `sb_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  PRIMARY KEY (`st_id`),
  KEY `tb_Teacher_register_log_id_e697c833_fk_tb_Login_log_id` (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_teacher_register`
--

INSERT INTO `tb_teacher_register` (`st_id`, `name`, `address`, `contact_no`, `email`, `dep_id`, `sb_id`, `log_id`) VALUES
(1, 'Rama', 'Rama Bhavan\r\nPathanamthitta', 9877665456, 'rama@gmail.com', 1, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_upload_assignment`
--

CREATE TABLE IF NOT EXISTS `tb_upload_assignment` (
  `ua_id` int(11) NOT NULL AUTO_INCREMENT,
  `as_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `assignment` varchar(100) NOT NULL,
  PRIMARY KEY (`ua_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_upload_assignment`
--

INSERT INTO `tb_upload_assignment` (`ua_id`, `as_id`, `st_id`, `date`, `assignment`) VALUES
(1, 1, 4, '2023-04-26', '/media/1_pUXryxh.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_upload_note`
--

CREATE TABLE IF NOT EXISTS `tb_upload_note` (
  `up_id` int(11) NOT NULL AUTO_INCREMENT,
  `tr_id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `sm_id` int(11) NOT NULL,
  `sb_id` int(11) NOT NULL,
  `upl_date` date NOT NULL,
  `note` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`up_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_upload_note`
--

INSERT INTO `tb_upload_note` (`up_id`, `tr_id`, `dep_id`, `sm_id`, `sb_id`, `upl_date`, `note`, `description`) VALUES
(4, 6, 1, 1, 1, '2023-04-25', '/media/1.pdf', 'c++ Programms');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_student_register`
--
ALTER TABLE `tb_student_register`
  ADD CONSTRAINT `tb_Student_register_log_id_04f30560_fk_tb_Login_log_id` FOREIGN KEY (`log_id`) REFERENCES `tb_login` (`log_id`);

--
-- Constraints for table `tb_teacher_register`
--
ALTER TABLE `tb_teacher_register`
  ADD CONSTRAINT `tb_Teacher_register_log_id_e697c833_fk_tb_Login_log_id` FOREIGN KEY (`log_id`) REFERENCES `tb_login` (`log_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
