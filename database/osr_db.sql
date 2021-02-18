-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 06:05 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osr_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(2, 'junaid', 'junaid123');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `units` varchar(40) NOT NULL,
  `seats` int(40) NOT NULL,
  `description` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `units`, `seats`, `description`) VALUES
(20, 'Android', '1-4', 30, 'Android programming concepts using the Java programming language. You build a variety of apps, starting with Hello World and working your way up to apps that schedule jobs, update settings, and use Android Architecture Components.'),
(21, 'PHP ', '1-6', 50, 'PHP is one of the most used programming languages in the world which is used to create dynamic web applications. PHP is a server-side scripting language that is used for web development. With PHP you will get detail knowledge on its inbuilt database engine MySql.');

-- --------------------------------------------------------

--
-- Table structure for table `courseenrolled`
--

CREATE TABLE `courseenrolled` (
  `id` int(11) NOT NULL,
  `registration_number` int(100) NOT NULL,
  `course_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseenrolled`
--

INSERT INTO `courseenrolled` (`id`, `registration_number`, `course_name`) VALUES
(32, 18550011, 'Android'),
(33, 18550011, 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(40) NOT NULL,
  `department_name` varchar(40) NOT NULL,
  `description` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`, `description`) VALUES
(22, 'Computer Science', 'This program involves every aspect of the human endeavor, from common technologies like mobile phones, artificial intelligence, medical imaging, and game design and development. '),
(24, 'History', 'The department specializes in the fields of American, European, Asian, and African history '),
(25, 'Chemistry And Biochemistry', 'Chemistry majors learn to think creatively, troubleshoot complex problems, perform detailed analyses, and make decisions based on research. These skills are highly valuable in any workplace, and have applications in virtually every field.'),
(26, 'Mathematics', 'Mathematics is the foundation and common language of physics, science, engineering, and computer science. In addition, there is a rich history of the influence of mathematics on economics, business, and even on arts and music.');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `name`) VALUES
(7, '1st semester'),
(8, '2nd Semester');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `registration_number` varchar(100) NOT NULL,
  `skill` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `registration_number`, `skill`) VALUES
(28, '18550011', 'Android Developemt'),
(29, '18550011', 'Competitive programming'),
(30, '18550011', 'Leet Coading');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `registration_number` varchar(40) NOT NULL,
  `adress` varchar(1000) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `password`, `email`, `registration_number`, `adress`, `gender`, `semester`, `department`) VALUES
(14, 'Tehleel Mir', '83e12633a9451754096bb24d6b66afc7', 'tehleelmir64@gmail.com', '18550011', 'shalimar', 'Male', '5th', 'bca'),
(15, 'ubaid ahmad', 'a5d8b1b521ad68a3a96c1a0349faaa9d', 'ubaid@gmail.com', '32432', 'shalimar', 'Male', '9th', 'arts');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseenrolled`
--
ALTER TABLE `courseenrolled`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `courseenrolled`
--
ALTER TABLE `courseenrolled`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
