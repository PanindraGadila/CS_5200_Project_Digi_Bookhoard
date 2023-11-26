-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 11, 2023 at 11:50 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digi_bookhoard`
-- GRANT ALL ON digi_bookhoard.* TO 'php'@'localhost' IDENTIFIED BY 'phpdb';
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `AdminEmail` varchar(120) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `FullName`, `AdminEmail`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'Panindra Gadila', 'gadilapanindrareddy@gmail.com', 'panindra', 'ceb6c970658f31504a901b89dcd3e461', '2021-06-28 16:06:08'),
(2, 'Mahindra', 'mahi@gmail.com', 'mahi', 'ceb6c970658f31504a901b89dcd3e461', '2022-06-28 11:12:08'),
(3, 'Anusha', 'anusha@gmail.com', 'anusha', 'ceb6c970658f31504a901b89dcd3e461', '2022-06-28 11:12:08'),
(4, 'Swetha', 'Swetha@gmail.com', 'Swetha', 'ceb6c970658f31504a901b89dcd3e461', '2022-06-28 11:12:08'),
(5, 'Boomika', 'boomika@gmail.com', 'boomika', 'ceb6c970658f31504a901b89dcd3e461', '2022-06-28 11:12:08'),
(6, 'Priyanka', 'priyanka@gmail.com', 'priyanka', 'ceb6c970658f31504a901b89dcd3e461', '2022-06-28 11:12:08'),
(7, 'Admin', 'admin@gmail.com', 'admin', 'ceb6c970658f31504a901b89dcd3e461', '2021-04-23 15:11:02');

-- --------------------------------------------------------

--
-- Table structure for table `student_requests`
--

CREATE TABLE `student_requests` (
  `id` int(10) NOT NULL,
  `Requested_StudentID` varchar(150) DEFAULT NULL,
  `Requested_Book` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_requests`
--

INSERT INTO `student_requests` (`id`, `Requested_StudentID`, `Requested_Book`) VALUES
(2, 'SID010', '8001031-DDOS Attack');

-- --------------------------------------------------------

--
-- Table structure for table `tblauthors`
--

CREATE TABLE `tblauthors` (
  `id` int(11) NOT NULL,
  `AuthorName` varchar(159) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblauthors`
--

INSERT INTO `tblauthors` (`id`, `AuthorName`, `creationDate`, `UpdationDate`) VALUES
(1, 'Eschar Bach', '2017-07-08 12:49:09', '2021-06-28 16:03:28'),
(2, 'panindra', '2017-07-08 14:30:23', '2018-06-28 16:03:35'),
(3, 'srikant', '2017-07-08 14:35:08', '2017-06-28 16:03:43'),
(4, 'Robin Sharma', '2017-07-08 14:35:21', '2022-06-28 16:03:43'),
(5, 'Jhon Kakhaur', '2017-07-08 14:35:36', '2021-06-28 16:03:43'),
(6, 'Naval Ravikanth', '2017-07-08 15:22:03', '2022-11-27 22:55:33');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooks`
--

CREATE TABLE `tblbooks` (
  `id` int(11) NOT NULL,
  `BookName` varchar(255) DEFAULT NULL,
  `CatId` int(11) DEFAULT NULL,
  `AuthorId` int(11) DEFAULT NULL,
  `ISBNNumber` int(11) DEFAULT NULL,
  `BookPrice` int(11) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbooks`
--

INSERT INTO `tblbooks` (`id`, `BookName`, `CatId`, `AuthorId`, `ISBNNumber`, `BookPrice`, `RegDate`, `UpdationDate`) VALUES
(1, 'PHP And MySql programming', 1, 1, 222333, 20, '2021-07-08 20:04:55', '2017-07-15 05:54:41'),
(2, 'physics', 2, 2, 123098, 15, '2017-07-08 20:17:31', '2020-07-15 06:13:17'),
(3, 'Godel-Eschar-Bach', 3, 3, 223300, 15, '2012-07-08 20:17:31', '2017-07-15 06:13:17'),
(4, 'Almanach of Ravikanth', 5, 5, 1172966, 10, '2022-11-27 22:53:04', NULL),
(5, 'Assembly programming - The beginers guide', 2, 2, 3829691, 12, '2022-11-27 22:54:59', NULL),
(6, 'Mathamatics', 3, 1, 1254143, 11, '2022-11-27 22:56:00', NULL),
(7, 'Chemistry', 3, 5, 8364277, 10, '2022-11-27 22:56:38', NULL),
(8, 'Arlylic paints', 5, 2, 1653451, 13, '2022-11-27 22:57:16', NULL),
(9, 'music-the paradoxical art', 5, 1, 4422476, 9, '2022-11-27 22:57:52', NULL),
(10, 'RaspberryPi', 2, 2, 5169815, 3, '2022-11-27 22:58:16', NULL),
(11, 'DDOS Attack', 2, 2, 8001031, 12, '2022-11-27 22:58:44', NULL),
(12, 'Buffer overflow Exploit', 2, 1, 6893667, 18, '2022-11-27 22:59:20', NULL),
(13, 'Arch-linux', 2, 4, 2172554, 5, '2022-11-27 23:00:01', NULL),
(14, 'REGEX Injections', 2, 3, 6057895, 12, '2022-11-27 23:00:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(150) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Status`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Romantic', 1, '2017-07-04 18:35:25', '2017-08-06 16:00:42'),
(2, 'Technology', 1, '2021-07-04 18:35:39', '2021-07-08 17:13:03'),
(3, 'Science', 1, '2021-07-04 18:35:55', '2017-08-08 17:13:03'),
(4, 'Management', 1, '2012-07-04 18:36:16', '2021-07-09 17:13:03'),
(5, 'Life Science', 1, '2011-07-04 18:35:55', '2017-08-08 17:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `tblissuedbookdetails`
--

CREATE TABLE `tblissuedbookdetails` (
  `id` int(11) NOT NULL,
  `BookId` int(11) DEFAULT NULL,
  `StudentID` varchar(150) DEFAULT NULL,
  `IssuesDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ReturnDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `RetrunStatus` int(1) DEFAULT NULL,
  `fine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblissuedbookdetails`
--

INSERT INTO `tblissuedbookdetails` (`id`, `BookId`, `StudentID`, `IssuesDate`, `ReturnDate`, `RetrunStatus`, `fine`) VALUES
(1, 2, 'SID010', '2022-11-27 22:46:58', '2022-11-27 22:47:28', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `id` int(11) NOT NULL,
  `StudentId` varchar(100) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `MobileNumber` char(11) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`id`, `StudentId`, `FullName`, `EmailId`, `MobileNumber`, `Password`, `Status`, `RegDate`, `UpdationDate`) VALUES
(1, 'SID002', 'Panindra', 'gadilapanindrareddy@gmail.com', '9865472555', 'ceb6c970658f31504a901b89dcd3e461', 1, '2017-07-11 15:37:05', '2017-07-15 18:26:21'),
(2, 'SID005', 'mahindra', 'mahindra@gmail.com', '8569710025', 'ceb6c970658f31504a901b89dcd3e461', 0, '2017-07-11 15:41:27', '2017-07-15 17:43:03'),
(3, 'SID009', 'anusha', 'anusha@gmail.com', '2359874513', 'ceb6c970658f31504a901b89dcd3e461', 1, '2017-07-11 15:58:28', '2017-07-15 13:42:44'),
(4, 'SID009', 'swetha', 'swetha@gmail.com', '2359874527', 'ceb6c970658f31504a901b89dcd3e461', 1, '2017-07-11 15:58:28', '2017-07-15 13:42:44'),
(5, 'SID009', 'boomika', 'boomika@gmail.com', '2490852852', 'ceb6c970658f31504a901b89dcd3e461', 1, '2017-07-11 15:58:28', '2017-07-15 13:42:44'),
(6, 'SID009', 'priyanka', 'priyanka@gmail.com', '6378917582', 'ceb6c970658f31504a901b89dcd3e461', 1, '2017-07-11 15:58:28', '2017-07-15 13:42:44'),
(7, 'SID009', 'swetha', 'swetha@gmail.com', '9155728151', 'ceb6c970658f31504a901b89dcd3e461', 1, '2017-07-11 15:58:28', '2017-07-15 13:42:44'),
(8, 'SID010', 'test', 'test@gmail.com', '7161737658', 'ceb6c970658f31504a901b89dcd3e461', 1, '2017-07-15 13:40:30', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_requests`
--
ALTER TABLE `student_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblauthors`
--
ALTER TABLE `tblauthors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooks`
--
ALTER TABLE `tblbooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `StudentId` (`StudentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_requests`
--
ALTER TABLE `student_requests`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblauthors`
--
ALTER TABLE `tblauthors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblbooks`
--
ALTER TABLE `tblbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
