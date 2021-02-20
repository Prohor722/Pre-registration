-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2019 at 03:19 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pre_registration`
--
CREATE DATABASE IF NOT EXISTS `pre_registration` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pre_registration`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(35) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `pass` varchar(35) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `name`, `pass`, `id`) VALUES
('admin@admin.com', 'Admin', '123123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pre_reg`
--

CREATE TABLE `pre_reg` (
  `code` varchar(10) DEFAULT NULL,
  `sub` varchar(60) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `credit` double DEFAULT NULL,
  `uid` varchar(20) DEFAULT NULL,
  `insid` varchar(15) DEFAULT NULL,
  `stu_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pre_reg`
--

INSERT INTO `pre_reg` (`code`, `sub`, `semester`, `status`, `id`, `credit`, `uid`, `insid`, `stu_name`) VALUES
('CSE-0103', 'Structured Programming Language (SPL)', 3, 'A', 52, 3, 'UG02-41-16-046', '5', 'Prohor'),
('CSE-0104', 'Structured Programming Language Lab', 3, 'A', 53, 1.5, 'UG02-41-16-046', '5', 'Prohor'),
('CSE-0105', 'Object Oriented Programming (OOP)Language', 3, 'A', 54, 3, 'UG02-41-16-046', '5', 'Prohor'),
('CSE-0401', 'E-Commerce and Web Engineering', 10, 'R', 69, 3, 'UG02-41-16-046', '5', 'Prohor'),
('CSE-0406', 'Computer Peripherals and Interfacing Lab', 10, 'R', 70, 0.75, 'UG02-41-16-046', '5', 'Prohor'),
('CSE-0405', 'Computer Peripherals and Interfacing', 10, 'R', 71, 3, 'UG02-41-16-046', '5', 'Prohor'),
('CSE-0403', 'Communication Engineering', 10, 'R', 72, 3, 'UG02-41-16-046', '5', 'Prohor'),
('CSE-0402', 'E-Commerce and Web Engineering Lab', 10, 'R', 73, 0.75, 'UG02-41-16-046', '5', 'Prohor');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `name` varchar(30) DEFAULT NULL,
  `uid` varchar(20) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `pass` varchar(35) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `insid` int(2) DEFAULT NULL,
  `program` varchar(4) DEFAULT NULL,
  `batch` int(11) DEFAULT NULL,
  `dept` varchar(40) DEFAULT NULL,
  `house` varchar(30) DEFAULT NULL,
  `road` varchar(60) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `pcode` int(11) DEFAULT NULL,
  `village` varchar(20) DEFAULT NULL,
  `post` varchar(70) DEFAULT NULL,
  `district` varchar(20) DEFAULT NULL,
  `ps` varchar(20) DEFAULT NULL,
  `gname` varchar(40) DEFAULT NULL,
  `gphone` varchar(17) DEFAULT NULL,
  `grs` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `uid`, `phone`, `email`, `pass`, `status`, `insid`, `program`, `batch`, `dept`, `house`, `road`, `area`, `city`, `pcode`, `village`, `post`, `district`, `ps`, `gname`, `gphone`, `grs`) VALUES
('Student', 'UG02-41-16-030', '+08801759458755', 'hello@gmail.com', '21b95a0f90138767b0fd324e6be3457b', 'h', 44, 'BSC', 41, 'CSE', '43/3', 'shankor 27', 'Dhanmondi', 'Dhaka', 125, 'Tangail', 'tangail ps', 'Dhaka', 'tangail thana', 'Prodip Saha', '01739451800', 'Uncle'),
('Prohor', 'UG02-41-16-046', '+08801739451755', 'prohos10@gmail.com', '4297f44b13955235245b2497399d7a93', 'a', 5, 'BSC', 41, 'CSE', '43/3', 'Shomaj kollan road', 'Mirpur 10', 'Dhaka', 125, 'Kurigram', 'Kurigram', 'Kurigram', 'Kurigram Thana', 'Prodip Saha', '01739451757', 'Uncle'),
('urmi', 'UG02-43-16-017', '+08801739451707', 'urmi@gmail.com', '21b95a0f90138767b0fd324e6be3457b', 'h', 5, 'BSC', 43, 'CSE', '40/6', 'shankor 27', 'Dhanmondi', 'Dhaka', 2504, 'Tangail', 'tangail ps', 'Dhaka', 'tangail thana', 'md mostofa', '01739451757', 'father');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `code` varchar(10) NOT NULL,
  `sub` varchar(60) DEFAULT NULL,
  `semester` int(1) DEFAULT NULL,
  `credit` double DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`code`, `sub`, `semester`, `credit`, `id`) VALUES
('SUB-599', 'Ethics and Aesthetics', 1, 0, 71),
('PHY-0101', 'Physics', 1, 3, 72),
('PHY-0102', 'Physics Lab', 1, 0.75, 73),
('CSE-0101', 'Computer Fundamentals', 1, 2, 74),
('CSE-0102', 'Computer Fundamentals Lab', 1, 1.5, 75),
('STA-0101', 'Statistics for Engineers', 1, 2, 76),
('MAT-0100', 'Remedial Math', 2, 0, 77),
('ENG-0101', 'English Language', 2, 2, 78),
('ENG-0102', 'English Language Lab', 2, 0.75, 79),
('EEE-0101', 'Electrical Circuit Analysis', 2, 2, 80),
('EEE-0102', 'Electrical Circuit Analysis Lab', 2, 1.5, 81),
('CSE-0103', 'Structured Programming Language (SPL)', 2, 3, 82),
('CSE-0104', 'Structured Programming Language Lab', 2, 1.5, 83),
('ACT-0101', 'Financial and Managerial Accounting', 3, 2, 84),
('MAT-0101', 'Calculus-I', 3, 3, 85),
('EEE-0103', 'Electronic Devices and Circuits', 3, 2, 86),
('EEE-0104', 'Electronic Devices and Circuits Lab', 3, 1.5, 87),
('CSE-0105', 'Object Oriented Programming (OOP)Language', 3, 3, 88),
('CSE-0106', 'Object Oriented Programming Language Lab', 3, 1.5, 89),
('CSE-0200', 'Project Work I', 4, 1, 90),
('STA-0201', 'Theory of Statistics', 4, 2, 91),
('MAT-0103', 'Calculus -II', 4, 3, 92),
('CSE-0201', 'Discrete Mathematics', 4, 3, 93),
('CSE-0203', 'Digital Electronics', 4, 2, 94),
('CSE-0204', 'Digital Electronics Lab', 4, 0.75, 95),
('ECO-0101', 'Economics', 4, 2, 96),
('MAT-0105', 'Differential Equation', 5, 3, 143),
('MGT-0101', 'Industrial Management', 5, 2, 144),
('CSE-0205', 'Digital Logic Design', 5, 2, 145),
('CSE-0206', 'Digital Logic Design Lab', 5, 0.75, 146),
('CSE-0207', 'Data Structure', 5, 3, 147),
('CSE-0208', 'Data Structure Lab', 5, 1.5, 148),
('MAT-0201', 'Linear Algebra', 6, 3, 149),
('CSE-0209', 'Numerical Methods', 6, 3, 150),
('CSE-0210', 'Numerical Methods Lab', 6, 0.75, 151),
('CSE-0211', 'Theory of Computation', 6, 2, 152),
('CSE-0213', 'Algorithms', 6, 3, 153),
('CSE-0214', 'Algorithms Lab', 6, 1.5, 154),
('MAT-0203', 'Methods of Applied Mathematics', 7, 3, 155),
('CSE-0301', 'Compiler Design', 7, 3, 156),
('CSE-0302', 'Compiler Design Lab', 7, 0.75, 157),
('CSE-0303', 'Computer Architecture', 7, 3, 158),
('CSE-0305', 'Database Systems', 7, 3, 159),
('CSE-0306', 'Database Systems Lab', 7, 1.5, 160),
('CSE-0307', 'System Analysis and Design', 8, 3, 161),
('CSE-0309', 'Operating System', 8, 3, 162),
('CSE-0310', 'Operating System Lab', 8, 0.75, 163),
('CSE-0311', 'Computer Networks', 8, 3, 164),
('CSE-0312', 'Computer Networks Lab', 8, 1.5, 165),
('SCO-0103', 'Engineering Ethics', 8, 2, 166),
('CSE-0313', 'Computer Graphics', 9, 3, 167),
('CSE-0314', 'Computer Graphics Lab', 9, 1.5, 168),
('CSE-0315', 'Microprocessors and Microcontrollers', 9, 3, 169),
('CSE-0316', 'Microprocessor and Microcontrollers Lab', 9, 0.75, 170),
('CSE-0317', 'Software Engineering', 9, 3, 171),
('CSE-0318', 'Software Engineering Lab', 9, 0.75, 172),
('CSE-0401', 'E-Commerce and Web Engineering', 10, 3, 173),
('CSE-0402', 'E-Commerce and Web Engineering Lab', 10, 0.75, 174),
('CSE-0403', 'Communication Engineering', 10, 3, 175),
('CSE-0405', 'Computer Peripherals and Interfacing', 10, 3, 176),
('CSE-0406', 'Computer Peripherals and Interfacing Lab', 10, 0.75, 177),
('CSE-0407', 'Artificial Intelligence', 11, 3, 178),
('CSE-0408 	', 'Artificial Intelligence Lab', 11, 0.75, 179),
('CSE-0409', 'Parallel Processing and Distributed System', 11, 3, 180),
('CSE-0410', 'Parallel Processing and Distributed System Lab', 11, 0.75, 181),
('CSE...', 'One from elective courses', 11, 3, 182),
('CSE...', 'Elective course Lab', 11, 0.75, 183),
('CSE-0400', 'Project', 12, 4, 184),
('CSE-0411', 'Computer Vision and Image Processing', 12, 3, 185),
('CSE-0412', 'Computer Vision and Image Processing Lab', 12, 0.75, 186),
('CSE...', 'One from elective courses', 12, 3, 189),
('CSE...', 'Elective course Lab', 12, 0.75, 192);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `name` varchar(30) DEFAULT NULL,
  `insid` varchar(15) NOT NULL,
  `pass` varchar(35) NOT NULL,
  `email` varchar(40) NOT NULL,
  `status` char(1) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `position` varchar(40) DEFAULT NULL,
  `address` varchar(70) DEFAULT NULL,
  `edu` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`name`, `insid`, `pass`, `email`, `status`, `phone`, `position`, `address`, `edu`) VALUES
('Tisa Islam Erana', '1', 'b51e8dbebd4ba8a8f342190a4b9f08d7', 'erana@gmail.com', 'a', '+08801739451420', NULL, NULL, NULL),
('Mahruna Kader', '10', 'b51e8dbebd4ba8a8f342190a4b9f08d7', 'peya@gmail.com', 'a', '+08801759458722', NULL, NULL, NULL),
('Nasid Habib Barna', '3', 'b51e8dbebd4ba8a8f342190a4b9f08d7', 'borna@gmail.com', 'a', '+08801739451855', NULL, NULL, NULL),
('Amina Rahman', '5', 'b51e8dbebd4ba8a8f342190a4b9f08d7', 'aminarahman@gmail.com', 'a', '+08801739451701', 'Lecturer', 'mirpur 11 circle, dhaka 1217', 'B.Sc in CSE, BUET'),
('Farhan Fuad Chowdhury', '7', 'b51e8dbebd4ba8a8f342190a4b9f08d7', 'fuad@gmail.com', 'a', '+08801739451758', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_reg`
--
ALTER TABLE `pre_reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`insid`),
  ADD UNIQUE KEY `teachers_email_uindex` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pre_reg`
--
ALTER TABLE `pre_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
