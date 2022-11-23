-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2022 at 06:58 AM
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
-- Database: `placement`
--

-- --------------------------------------------------------

--
-- Table structure for table `csv`
--

CREATE TABLE `csv` (
  `id` int(11) NOT NULL,
  `first` varchar(255) NOT NULL,
  `sjdjj` varchar(39) NOT NULL,
  `last` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `csv`
--

INSERT INTO `csv` (`id`, `first`, `sjdjj`, `last`, `gender`) VALUES
(1, 'meki', '', 'ermena', ''),
(2, 'shemisu', '', 'kemal', ''),
(3, 'meki', '', 'ermena', ''),
(4, 'shemisu', '', 'kemal', ''),
(5, 'meki', '', 'ermena', ''),
(6, 'shemisu', '', 'kemal', '');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `ID` int(11) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `dsname` varchar(100) NOT NULL,
  `stream` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`ID`, `dname`, `dsname`, `stream`, `semester`) VALUES
(7, 'Medicine', 'medicine', 'natural science', '1'),
(8, 'Pharmacy', 'pharmacy', 'natural science', '1'),
(9, 'Natural Science', 'natural', 'natural science', '1'),
(10, 'Engineering', 'engineering', 'natural science', '1'),
(14, 'marketing', 'marketing', 'social science', '1'),
(21, 'Economics', 'Economics', 'social science', '1');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `ID` int(11) NOT NULL,
  `region_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`ID`, `region_name`, `status`) VALUES
(1, 'SNNPR', 'Normal'),
(2, 'Oromo', 'Normal'),
(3, 'Sidama', 'Normal'),
(4, 'Harer', 'Normal'),
(5, 'Amhara', 'Normal'),
(6, 'tigray', 'Normal'),
(7, 'Somale', 'Affirmative'),
(8, 'afar', 'Affirmative'),
(9, 'Gembela', 'Affirmative'),
(10, 'Benshagul gumuz', 'Affirmative');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `ID` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`ID`, `user_id`, `password`, `fname`, `mname`, `lname`, `email`, `gender`, `role`) VALUES
(1, 'admin', 'c20ad4d76fe97759aa27a0c99bff6710', 'Meki', 'Ermena', 'Hamid', 'meki@gmail.com', 'male', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `stu`
--

CREATE TABLE `stu` (
  `ID` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `grade` float NOT NULL,
  `region` varchar(100) NOT NULL,
  `disability` varchar(100) NOT NULL,
  `enterance` float NOT NULL,
  `gender` varchar(100) NOT NULL,
  `coc` float NOT NULL,
  `department` varchar(100) NOT NULL,
  `total` float NOT NULL,
  `c1` varchar(100) NOT NULL,
  `c2` varchar(100) NOT NULL,
  `c3` varchar(100) NOT NULL,
  `c4` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stu`
--

INSERT INTO `stu` (`ID`, `student_id`, `password`, `fname`, `mname`, `lname`, `grade`, `region`, `disability`, `enterance`, `gender`, `coc`, `department`, `total`, `c1`, `c2`, `c3`, `c4`) VALUES
(1, 's1', 'aaaf1s1', 's1', '', 'f1', 3.66, 'benshagul', 'no', 0.9, 'male', 20, 'med', 71.65, 'med', 'phar', 'eng', 'natural'),
(2, 's2', 'aaaf2s2', 's2', '', 'f2', 3, 'benshagul', 'no', 16, 'female', 26, 'med', 89.5, 'med', 'eng', 'phar', 'natural'),
(3, 's3', 'aaaf3s3', 's3', '', 'f3', 3.87, 'benshagul', 'no', 14.5, 'male', 30, 'med', 97.875, 'med', 'phar', 'eng', 'natural'),
(4, 's4', 'aaaf4s4', 's4', '', 'f4', 2.65, 'afar', 'yes', 17.25, 'female', 29, 'med', 94.375, 'med', 'natural', 'eng', 'phar'),
(5, 's5', 'aaaf5s5', 's5', '', 'f5', 3.44, 'somale', 'no', 1.05, 'female', 27, 'med', 81.05, 'med', 'eng', 'natural', 'phar'),
(6, 's6', 'aaaf6s6', 's6', '', 'f6', 3.11, 'benshagul', 'yes', 10.15, 'female', 22, 'med', 86.025, 'med', 'natural', 'eng', 'phar'),
(7, 's7', 'aaaf7s7', 's7', '', 'f7', 3.45, 'benshagul', 'no', 16.15, 'male', 29, 'med', 93.275, 'med', 'eng', 'phar', 'natural'),
(8, 's8', 'aaaf8s8', 's8', '', 'f8', 2.98, 'benshagul', 'yes', 15, 'male', 18, 'phar', 80.25, 'phar', 'natural', 'eng', 'med'),
(9, 's9', 'aaaf9s9', 's9', '', 'f9', 3.9, 'benshagul', 'no', 14.5, 'male', 27, 'med', 95.25, 'med', 'eng', 'phar', 'natural'),
(10, 's10', 'aaaf10s10', 's10', '', 'f10', 3.88, 'benshagul', 'no', 10.1, 'female', 23, 'med', 91.6, 'med', 'phar', 'natural', 'eng'),
(11, 's11', 'aaaf11s11', 's11', '', 'f11', 3.32, 'gembela', 'no', 9.5, 'female', 27, 'phar', 88, 'phar', 'eng', 'med', 'natural'),
(12, 's12', 'aaaf12s12', 's12', '', 'f12', 2.2, 'benshagul', 'yes', 10.15, 'male', 17, 'phar', 64.65, 'phar', 'med', 'eng', 'natural'),
(13, 's13', 'aaaf13s13', 's13', '', 'f13', 4, 'benshagul', 'no', 14.5, 'male', 22, 'phar', 91.5, 'phar', 'eng', 'natural', 'med'),
(14, 's14', 'aaaf14s14', 's14', '', 'f14', 3.76, 'benshagul', 'no', 15.15, 'female', 24, 'phar', 96.15, 'phar', 'natural', 'med', 'eng'),
(15, 's15', 'aaaf15s15', 's15', '', 'f15', 2.9, 'benshagul', 'no', 12.7, 'male', 20, 'phar', 73.95, 'phar', 'med', 'natural', 'eng'),
(16, 's16', 'aaaf16s16', 's16', '', 'f16', 3.45, 'benshagul', 'no', 14.95, 'male', 29, 'phar', 92.075, 'phar', 'natural', 'med', 'eng'),
(17, 's17', 'aaaf17s17', 's17', '', 'f17', 3.77, 'benshagul', 'no', 8.85, 'female', 24, 'phar', 89.975, 'phar', 'med', 'eng', 'natural'),
(18, 's18', 'aaaf18s18', 's18', '', 'f18', 3.9, 'benshagul', 'no', 17.25, 'male', 22, 'eng', 93, 'eng', 'med', 'natural', 'phar'),
(19, 's19', 'aaaf19s19', 's19', '', 'f19', 3.92, 'afar', 'no', 10.7, 'male', 30, 'eng', 94.7, 'eng', 'phar', 'med', 'natural'),
(20, 's20', 'aaaf20s20', 's20', '', 'f20', 2.99, 'somale', 'no', 11.7, 'female', 23, 'eng', 82.075, 'eng', 'natural', 'phar', 'med'),
(21, 's21', 'aaaf21s21', 's21', '', 'f21', 3.78, 'afar', 'no', 1.25, 'male', 29, 'eng', 82.5, 'eng', 'phar', 'natural', 'med'),
(22, 's22', 'aaaf22s22', 's22', '', 'f22', 3.77, 'benshagul', 'no', 10.95, 'male', 23, 'natural', 86.075, 'natural', 'eng', 'med', 'phar'),
(23, 's23', 'aaaf23s23', 's23', '', 'f23', 3.22, 'benshagul', 'yes', 10.1, 'male', 29, 'natural', 89.35, 'natural', 'med', 'phar', 'eng'),
(24, 's24', 'aaaf24s24', 's24', '', 'f24', 2.8, 'benshagul', 'no', 16, 'female', 22, 'eng', 83, 'eng', 'natural', 'phar', 'med'),
(25, 's25', 'aaaf25s25', 's25', '', 'f25', 3.88, 'benshagul', 'no', 11.7, 'female', 24, 'natural', 94.2, 'natural', 'phar', 'eng', 'med'),
(26, 's26', 'aaaf26s26', 's26', '', 'f26', 3.98, 'benshagul', 'no', 13.45, 'female', 23, '', 96.2, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `disability` varchar(100) NOT NULL,
  `enterance` varchar(50) NOT NULL,
  `stream` varchar(50) NOT NULL,
  `year` int(100) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `coc` varchar(50) NOT NULL,
  `transcript1` varchar(50) NOT NULL,
  `transcript2` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `department` varchar(100) NOT NULL,
  `c1` varchar(100) NOT NULL,
  `c2` varchar(100) NOT NULL,
  `c3` varchar(100) NOT NULL,
  `c4` varchar(100) NOT NULL,
  `c5` varchar(100) DEFAULT NULL,
  `c6` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `student_id`, `password`, `status`, `fname`, `mname`, `lname`, `gender`, `region`, `disability`, `enterance`, `stream`, `year`, `semester`, `grade`, `coc`, `transcript1`, `transcript2`, `total`, `department`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`) VALUES
(12, 's1', '202cb962ac59075b964b07152d234b70', 1, 's1', 'm1', 'f1', 'male', 'afar', 'yes', '17.25', 'natural science', 2015, '1', '3.7', '25', '90', '90.123', '98.5', 'medicine', 'medicine', 'natural', 'engineering', 'pharmacy', 'natural', NULL),
(13, 's2', 'aaaf2s2', 1, 's2', 'm2', 'f2', 'female', 'Amhara', 'no', '15', 'natural science', 2015, '1', '4.00', '16.2', '90', '89.78', '86.2', 'pharmacy', 'pharmacy', 'natural', 'medicine', 'engineering', 'phar', NULL),
(14, 's3', 'aaaf3s3', 0, 's3', 'm3', 'f3', 'male', 'somale', 'no', '11.7', 'natural science', 2015, '1', '3.55', '25.1', '90', '82', '81.175', 'pharmacy', 'pharmacy', 'natural', 'medicine', 'engineering', 'med', NULL),
(15, 's4', 'aaaf4s4', 1, 's4', 'm4', 'f4', 'male', 'amhara', 'no', '15', 'natural science', 2015, '1', '4.00', '21.2', '90', '87.9', '86.2', 'engineering', 'engineering', 'pharmacy', 'natural', 'medicine', 'phar', NULL),
(16, 's5', 'aaaf5s5', 0, 's5', 'm5', 'f5', 'male', 'SNNP', 'no', '15', 'natural science', 2015, '1', '2.22', '30', '78', '89', '72.15', 'pharmacy', 'pharmacy', 'medicine', 'natural', 'engineering', 'med', NULL),
(17, 's6', 'aaaf6s6', 0, 's6', 'm6', 'f6', 'female', 'tigray', 'yes', '10', 'natural science', 2015, '1', '3.8', '25', '89', '70', '92.5', 'medicine', 'medicine', 'natural', 'pharmacy', 'engineering', 'natural', NULL),
(18, 's7', 'aaaf7s7', 0, 's7', 'm7', 'f7', 'male', 'oromo', 'no', '15', 'natural science', 2015, '1', '4', '21.2', '90', '80', '86.2', 'natural', 'natural', 'medicine', 'engineering', 'pharmacy', 'eng', NULL),
(19, 's8', 'aaaf8s8', 0, 's8', 'm8', 'f8', 'male', 'SNNP', 'no', '15', 'natural science', 2015, '1', '4.00', '21.2', '90', '59', '86.2', 'engineering', 'engineering', 'pharmacy', 'natural', 'medicine', 'eng', NULL),
(20, 's9', 'aaaf9s9', 0, 's9', 'm9', 'f9', 'male', 'oromo', 'no', '10', 'natural science', 2015, '1', '4', '26.6', '90', '69.7', '86.6', 'engineering', 'engineering', 'pharmacy', 'natural', 'medicine', 'marketing', NULL),
(21, 's10', 'aaaf10s10', 0, 's10', 'm10', 'f10', 'male', 'oromo', 'no', '15', 'natural science', 2015, '1', '4.00', '21.7', '90', '87', '86.7', 'engineering', 'engineering', 'pharmacy', 'natural', 'medicine', 'med', NULL),
(22, 's11', 'aaaf11s11', 0, 's11', 'm11', 'f11', 'male', 'SNNP', 'no', '15', 'natural science', 2015, '1', '4', '21.8', '90', '89', '86.8', 'engineering', 'engineering', 'pharmacy', 'natural', 'medicine', 'marketing', NULL),
(23, 's12', '123', 1, 's12', 'm12', 'f12', 'female', 'oromo', 'no', '15', 'natural science', 2015, '1', '3.56', '23', '79.67', '46.78', '87.5', 'natural', 'natural', 'medicine', 'engineering', 'pharmacy', 'marketing', NULL),
(24, 's13', 'aaaf13s13', 0, 's13', 'm13', 'f13', 'male', 'sidama', 'no', '15', 'natural science', 2015, '1', '3.5', '28.15', '90', '90.77', '86.9', 'medicine', 'medicine', 'engineering', 'pharmacy', 'natural', 'natural', NULL),
(25, 's14', 'aaaf14s14', 0, 's14', 'm14', 'f14', 'male', 'oromo', 'no', '15', 'natural science', 2015, '1', '3.5', '27', '90', '51', '85.75', 'engineering', 'engineering', 'pharmacy', 'natural', 'medicine', 'eng', NULL),
(26, 's15', 'aaaf15s15', 0, 's15', 'm15', 'f15', 'female', 'amhara', 'no', '15', 'natural science', 2015, '1', '3.45', '26', '45', '59.99', '89.125', 'medicine', 'medicine', 'engineering', 'pharmacy', 'natural', 'marketing', NULL),
(27, 's16', 'aaaf16s16', 0, 's16', 'm16', 'f16', 'male', 'sidama', 'no', '15', 'natural science', 2015, '1', '3', '22', '70', '58.7', '74.5', 'pharmacy', 'pharmacy', 'medicine', 'engineering', 'natural', 'natural', NULL),
(28, 's17', 'aaaf17s17', 0, 's17', 'm17', 'f17', 'female', 'oromo', 'no', '8.9', 'natural science', 2015, '1', '3.12', '22', '87.99', '67.8', '74.9', 'pharmacy', 'pharmacy', 'medicine', 'engineering', 'natural', 'phar', NULL),
(29, 's18', 'aaaf18s18', 1, 's18', 'm18', 'f18', 'male', 'amhara', 'no', '14.95', 'natural science', 2015, '1', '3.7', '26', '90', '85', '87.2', 'medicine', 'medicine', 'engineering', 'pharmacy', 'natural', 'phar', NULL),
(30, 's19', '123', 1, 's19', 'm19', 'f19', 'female', 'oromo', 'no', '16.2', 'natural science', 2015, '1', '3.6', '20', '80', '97', '86.9', 'natural', 'natural', 'pharmacy', 'engineering', 'medicine', 'eng', NULL),
(31, 's20', 'aaaf20s20', 0, 's20', 'm20', 'f20', 'male', 'harer', 'no', '11.95', 'natural science', 2015, '1', '3.8', '24.1', '90', '91', '83.55', 'pharmacy', 'pharmacy', 'engineering', 'medicine', 'natural', 'phar', NULL),
(32, 's21', 'aaaf21s21', 0, 's21', 'm21', 'f21', 'male', 'SNNP', 'no', '13.25', 'natural science', 2015, '1', '3.9', '25', '97.6', '49', '87', 'engineering', 'engineering', 'pharmacy', 'medicine', 'natural', 'natural', NULL),
(33, 's22', 'aaaf22s22', 0, 's22', 'm22', 'f22', 'female', 'oromo', 'no', '11.7', 'natural science', 2015, '1', '3.89', '17', '79', '58', '82.325', 'engineering', 'engineering', 'natural', 'pharmacy', 'medicine', 'eng', NULL),
(34, 's23', 'aaaf23s23', 0, 's23', 'm23', 'f23', 'female', 'amhara', 'no', '14.5', 'natural science', 2015, '1', '2.99', '15', '90', '79', '71.875', 'pharmacy', 'pharmacy', 'natural', 'medicine', 'engineering', 'marketing', NULL),
(35, 's24', 'aaaf24s24', 0, 's24', 'm24', 'f24', 'male', 'sidama', 'no', '10', 'natural science', 2015, '1', '3.7', '29.95', '90', '88', '86.2', 'engineering', 'engineering', 'pharmacy', 'natural', 'medicine', 'marketing', NULL),
(36, 's25', 'aaaf25s25', 0, 's25', 'm25', 'f25', 'female', 'SNNP', 'no', '10.45', 'natural science', 2015, '1', '2', '25', '90', '78', '86.2', 'natural', 'natural', 'engineering', 'pharmacy', 'medicine', 'natural', NULL),
(45, 's26', '123', 1, 's26', 'm26', 'f26', 'male', 'Oromo', 'no', '11.5', 'social science', 2015, '1', '3.37', '20', '0', '0', '73.625', 'Economics', 'Economics', 'marketing', '', '', NULL, NULL),
(46, 's27', '123', 1, 's27', '', 'f27', 'male', 'Oromo', 'no', '11.5', 'social science', 2015, '1', '3.33', '20', '0', '0', '78.125', 'Economics', 'Economics', 'marketing', '', '', NULL, NULL),
(47, 's28', '123', 1, 's28', '', 'f28', 'male', 'SNNPR', 'no', '11.5', 'social science', 2015, '1', '3.33', '20', '0', '0', '73.125', 'marketing', 'marketing', 'Economics', '', '', NULL, NULL),
(48, 's29', '123', 1, 's29', '', 'f29', 'male', 'Somale', 'no', '11.5', 'social science', 2015, '1', '3.34', '21', '0', '0', '79.25', 'marketing', 'marketing', 'Economics', '', '', NULL, NULL),
(49, 's30', '123', 1, 'ff', 'mm', 'ff', 'male', 'Sidama', 'no', '0.85', 'social science', 2015, '2', '4', '23', '', '', '73.85', '', '', '', '', '', NULL, NULL),
(50, 's31', 'c20ad4d76fe97759aa27a0c99bff6710', 1, 'f31', 'm31', 'l31', 'male', 'SNNPR', 'no', '0.75', 'social science', 2015, '2', '3', '26', '', '', '64.25', '', '', '', '', '', NULL, NULL),
(51, 'w1', '', 0, 'a1', 'a2', 'a3', 'male', 'amhara', 'no', '320', 'natural', 2015, '1', '2.3', '26', '', '', '', '', '', '', '', '', NULL, NULL),
(52, 'w2', '', 0, 'b1', 'b2', 'b3', 'female', 'oromo', 'no', '280', 'natural', 2015, '1', '3.3', '20', '', '', '', '', '', '', '', '', NULL, NULL),
(53, 'w3', '', 0, 'c1', 'c2', 'c3', 'male', 'sidama', 'no', '200', 'natural', 2015, '1', '3.8', '21', '', '', '', '', '', '', '', '', NULL, NULL),
(54, 'w4', '', 0, 'd1', 'd2', 'd3', 'male', 'sidama', 'no', '280', 'natural', 2015, '1', '4', '18', '', '', '', '', '', '', '', '', NULL, NULL),
(55, 'w5', '', 0, 'e1', 'e2', 'e3', 'female', 'oromo', 'yes', '199', 'natural', 2015, '1', '2', '28', '', '', '', '', '', '', '', '', NULL, NULL),
(56, 'w1', '', 0, 'a1', 'a2', 'a3', 'male', 'amhara', 'no', '320', 'natural', 2015, '1', '2.3', '26', '90', '80', '', '', '', '', '', '', NULL, NULL),
(57, 'w2', '', 0, 'b1', 'b2', 'b3', 'female', 'oromo', 'no', '280', 'natural', 2015, '1', '3.3', '20', '78', '89', '', '', '', '', '', '', NULL, NULL),
(58, 'w3', '', 0, 'c1', 'c2', 'c3', 'male', 'sidama', 'no', '200', 'natural', 2015, '1', '3.8', '21', '71', '80', '', '', '', '', '', '', NULL, NULL),
(59, 'w4', '', 0, 'd1', 'd2', 'd3', 'male', 'sidama', 'no', '280', 'natural', 2015, '1', '4', '18', '78', '99', '', '', '', '', '', '', NULL, NULL),
(60, 'w5', '', 0, 'e1', 'e2', 'e3', 'female', 'oromo', 'yes', '199', 'natural', 2015, '1', '2', '28', '77', '40', '', '', '', '', '', '', NULL, NULL),
(61, 'w1', '', 0, 'a1', 'a2', 'a3', 'male', 'amhara', 'no', '320', 'natural', 2015, '1', '2.3', '26', '90', '80', '', '', 'medicine', 'pharmacy', 'engineering', 'natural', NULL, NULL),
(62, 'w2', '', 0, 'b1', 'b2', 'b3', 'female', 'oromo', 'no', '280', 'natural', 2015, '1', '3.3', '20', '78', '89', '', '', 'natural', 'medicine', 'engineering', 'pharmacy', NULL, NULL),
(63, 'w3', '', 0, 'c1', 'c2', 'c3', 'male', 'sidama', 'no', '200', 'natural', 2015, '1', '3.8', '21', '71', '80', '', '', 'pharmacy', 'engineering', 'medicine', 'natural', NULL, NULL),
(64, 'w4', '', 0, 'd1', 'd2', 'd3', 'male', 'sidama', 'no', '280', 'natural', 2015, '1', '4', '18', '78', '99', '', '', 'medicine', 'natural', 'pharmacy', 'engineering', NULL, NULL),
(65, 'w5', '', 0, 'e1', 'e2', 'e3', 'female', 'oromo', 'yes', '199', 'natural', 2015, '1', '2', '28', '77', '40', '', '', 'engineering', 'natural', 'pharmacy', 'medicine', NULL, NULL),
(66, 'w1', '', 0, 'a1', 'a2', 'a3', 'male', 'amhara', 'no', '16', 'natural science', 2015, '1', '2.3', '26', '90', '80', '70.75', 'medicine', 'medicine', 'pharmacy', 'engineering', 'natural', NULL, NULL),
(67, 'w2', '', 0, 'b1', 'b2', 'b3', 'female', 'oromo', 'no', '11.15', 'natural science', 2015, '1', '3.3', '20', '78', '89', '77.4', 'pharmacy', 'pharmacy', 'natural', 'medicine', 'engineering', NULL, NULL),
(68, 'w3', '', 0, 'c1', 'c2', 'c3', 'male', 'sidama', 'no', '15', 'natural science', 2014, '1', '3.8', '21', '71', '80', '83.5', 'medicine', 'medicine', 'natural', 'pharmacy', 'engineering', NULL, NULL),
(69, 'w4', '', 0, 'd1', 'd2', 'd3', 'male', 'sidama', 'no', '11.2', 'natural science', 2014, '1', '4', '18', '78', '99', '79.2', 'medicine', 'medicine', 'natural', 'pharmacy', 'engineering', NULL, NULL),
(70, 'w5', '', 0, 'e1', 'e2', 'e3', 'female', 'oromo', 'yes', '12.8', 'natural science', 2015, '1', '2', '28', '77', '40', '75.8', 'pharmacy', 'pharmacy', 'medicine', 'engineering', 'natural', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_choice`
--

CREATE TABLE `student_choice` (
  `ID` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `c1` varchar(100) NOT NULL,
  `c2` varchar(100) NOT NULL,
  `c3` varchar(100) NOT NULL,
  `c4` varchar(100) NOT NULL,
  `c5` varchar(100) NOT NULL,
  `c6` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_choice`
--

INSERT INTO `student_choice` (`ID`, `student_id`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`) VALUES
(1, 's1', '', '', '', '', '', NULL),
(2, 's2', '', '', '', '', '', NULL),
(3, 's3', '', '', '', '', '', NULL),
(4, 's4', '', '', '', '', '', NULL),
(5, 's5', '', '', '', '', '', NULL),
(6, 's6', '', '', '', '', '', NULL),
(7, 's7', '', '', '', '', '', NULL),
(8, 's8', '', '', '', '', '', NULL),
(9, 's9', '', '', '', '', '', NULL),
(10, 's10', '', '', '', '', '', NULL),
(11, 's11', '', '', '', '', '', NULL),
(12, 's12', '', '', '', '', '', NULL),
(13, 's13', '', '', '', '', '', NULL),
(14, 's14', '', '', '', '', '', NULL),
(15, 's15', '', '', '', '', '', NULL),
(16, 's16', '', '', '', '', '', NULL),
(17, 's17', '', '', '', '', '', NULL),
(18, 's18', '', '', '', '', '', NULL),
(19, 's19', '', '', '', '', '', NULL),
(20, 's20', '', '', '', '', '', NULL),
(21, 's21', '', '', '', '', '', NULL),
(22, 's22', '', '', '', '', '', NULL),
(23, 's23', '', '', '', '', '', NULL),
(24, 's24', '', '', '', '', '', NULL),
(25, 's25', '', '', '', '', '', NULL),
(26, 's26', 'Economics', 'marketing', '', '', '', NULL),
(27, 's27', 'Economics', 'marketing', '', '', '', NULL),
(28, 's28', 'marketing', 'Economics', '', '', '', NULL),
(29, 's29', 'marketing', 'Economics', '', '', '', NULL),
(30, 's30', '', '', '', '', '', NULL),
(31, 's31', '', '', '', '', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `csv`
--
ALTER TABLE `csv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `stu`
--
ALTER TABLE `stu`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student_choice`
--
ALTER TABLE `student_choice`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `choice` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `csv`
--
ALTER TABLE `csv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stu`
--
ALTER TABLE `stu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `student_choice`
--
ALTER TABLE `student_choice`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
