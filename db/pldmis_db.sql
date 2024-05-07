-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 02:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pldmis_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `CityId` int(11) NOT NULL,
  `StateId` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`CityId`, `StateId`, `Name`) VALUES
(1, 1, 'Salcedo'),
(2, 1, 'Mercedes'),
(3, 1, 'Balangiga'),
(21, 1, 'Guian'),
(22, 1, 'General MacArthur'),
(23, 1, 'Quinapondan'),
(24, 1, 'Giporlos'),
(25, 1, 'Balangiga'),
(26, 1, 'Lawaan'),
(27, 1, 'Balangiga'),
(28, 1, 'Lawaan'),
(29, 1, 'Balangkayan'),
(30, 1, 'San Policarpo'),
(31, 1, 'Dolores'),
(32, 1, 'Llorente'),
(33, 1, 'Pinabacdao'),
(34, 1, 'Sulat'),
(35, 1, 'Borongan City'),
(36, 1, 'San Julian'),
(37, 1, 'Maydolong'),
(38, 1, 'Jipapad'),
(39, 1, 'Gamay');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `CountryId` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`CountryId`, `Name`) VALUES
(1, 'Philippines'),
(9, 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `dailyworkload`
--

CREATE TABLE `dailyworkload` (
  `DailyWorkLoadId` bigint(20) NOT NULL,
  `EmpId` varchar(50) NOT NULL,
  `LoginDate` datetime DEFAULT NULL,
  `LogoutDate` datetime DEFAULT NULL,
  `DailyWorkingminutes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dailyworkload`
--

INSERT INTO `dailyworkload` (`DailyWorkLoadId`, `EmpId`, `LoginDate`, `LogoutDate`, `DailyWorkingminutes`) VALUES
(1, '1', '2023-11-20 16:43:21', NULL, NULL),
(2, '6231415', '2023-11-21 22:32:17', '2023-11-21 22:41:06', 9),
(3, '1', '2023-11-21 22:56:58', NULL, NULL),
(4, '1', '2023-11-25 15:45:05', NULL, NULL),
(5, '12345', '2023-11-25 19:29:23', '2023-11-25 19:29:35', 28348680),
(6, '6231415', '2023-11-25 19:30:34', '2023-11-25 19:36:40', 28348687),
(7, '12345', '2023-11-27 17:17:46', '2023-11-27 17:20:37', 28351431),
(8, '54321', '2023-11-27 18:00:44', '2023-11-27 18:07:16', 7),
(9, '1', '2023-12-04 08:59:30', NULL, NULL),
(10, '6231415', '2023-12-04 09:57:19', NULL, NULL),
(12, '12345', '2023-12-05 12:26:43', '2023-12-05 12:26:48', 28362657),
(13, '1', '2023-12-05 12:29:16', NULL, NULL),
(14, '54321', '2023-12-05 12:31:59', NULL, NULL),
(15, '09876', '2023-12-05 12:35:48', '2023-12-05 12:36:21', 28362666),
(16, '122333', '2023-12-05 12:43:14', '2023-12-05 13:52:29', 69),
(17, '122333', '2023-12-07 09:14:45', '2023-12-07 09:15:24', 28365345),
(18, '1', '2023-12-07 09:15:34', NULL, NULL),
(19, '6231415', '2024-01-06 19:59:22', NULL, NULL),
(20, '6231415', '2024-01-09 11:28:43', '2024-01-09 13:56:14', 148),
(21, '1', '2024-01-09 13:56:26', NULL, NULL),
(22, '1', '2024-01-17 10:07:05', NULL, NULL),
(23, '6231415', '2024-01-17 15:19:09', '2024-01-17 15:20:06', 28424750),
(24, '6231415', '2024-01-18 06:57:31', '2024-01-18 07:00:30', 1253),
(25, '1', '2024-01-18 07:01:16', NULL, NULL),
(26, '6231415', '2024-01-19 14:21:46', NULL, NULL),
(27, '6231415', '2024-01-22 17:16:35', NULL, NULL),
(28, '6231415', '2024-01-24 20:19:59', NULL, NULL),
(29, '6231415', '2024-02-02 07:21:54', '2024-02-02 10:12:39', 171),
(30, '1', '2024-02-07 10:44:40', NULL, NULL),
(31, '6231415', '2024-02-08 20:36:55', NULL, NULL),
(32, '6231415', '2024-02-11 18:48:36', NULL, NULL),
(33, '6231415', '2024-02-16 08:26:42', NULL, NULL),
(34, '6231415', '2024-02-18 15:54:49', NULL, NULL),
(35, '6231415', '2024-02-19 20:33:29', NULL, NULL),
(36, '6231415', '2024-02-20 13:21:14', '2024-02-20 19:25:18', 364),
(37, '00001', '2024-02-20 18:27:29', NULL, NULL),
(38, '240001', '2024-02-20 18:33:53', '2024-02-20 19:11:20', 37),
(39, '240001', '2024-02-21 06:45:40', NULL, NULL),
(40, '6231415', '2024-02-21 06:50:20', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `degreedetails`
--

CREATE TABLE `degreedetails` (
  `Detail_Id` int(11) NOT NULL,
  `EmpId` int(20) DEFAULT NULL,
  `DegreeType` text DEFAULT NULL,
  `DegreeName` text DEFAULT NULL,
  `YearCompleted` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `degreedetails`
--

INSERT INTO `degreedetails` (`Detail_Id`, `EmpId`, `DegreeType`, `DegreeName`, `YearCompleted`) VALUES
(2, 6231415, 'Masteral', 'Degree Name Testing', '2023'),
(3, 240001, 'Doctoral', 'Doctoral Degree Tests', '2023'),
(4, 240001, 'Doctoral', 'Degree Name Tests2 ', '2023'),
(5, 240001, 'Masteral', 'Masteral1', '2023'),
(6, 6231415, 'Doctoral', 'Doctoral Tests', '2024');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmpId` bigint(20) NOT NULL,
  `EmployeeId` varchar(11) NOT NULL,
  `FirstName` varchar(200) NOT NULL,
  `MiddleName` varchar(200) NOT NULL,
  `LastName` varchar(200) NOT NULL,
  `Birthdate` date NOT NULL,
  `Gender` int(10) NOT NULL,
  `Address1` varchar(500) NOT NULL,
  `Address2` varchar(500) NOT NULL,
  `Address3` varchar(500) NOT NULL,
  `CityId` int(11) NOT NULL,
  `Mobile` decimal(10,0) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `AadharNumber` varchar(25) NOT NULL,
  `MaritalStatus` int(11) NOT NULL,
  `PositionId` int(11) NOT NULL,
  `AcademicRank` varchar(50) DEFAULT NULL,
  `CreatedBy` bigint(20) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ModifiedBy` bigint(20) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `JoinDate` date NOT NULL,
  `LeaveDate` date DEFAULT NULL,
  `LastLogin` datetime DEFAULT NULL,
  `LastLogout` datetime DEFAULT NULL,
  `StatusId` int(11) NOT NULL,
  `RoleId` int(11) NOT NULL,
  `ImageName` varchar(1000) DEFAULT NULL,
  `MacAddress` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmpId`, `EmployeeId`, `FirstName`, `MiddleName`, `LastName`, `Birthdate`, `Gender`, `Address1`, `Address2`, `Address3`, `CityId`, `Mobile`, `Email`, `Password`, `AadharNumber`, `MaritalStatus`, `PositionId`, `AcademicRank`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `JoinDate`, `LeaveDate`, `LastLogin`, `LastLogout`, `StatusId`, `RoleId`, `ImageName`, `MacAddress`) VALUES
(1, '1', 'ADmin', 'ADmin', 'Admin', '1994-10-09', 1, 'address1', 'address2', 'address3', 1, 9999999999, 'admin', 'admin', '', 2, 1, NULL, 1, '2017-01-01 00:00:00', 1, '2023-12-05 02:11:32', '2023-11-24', '0000-00-00', '2024-02-21 06:51:30', '2017-02-09 15:12:09', 1, 1, '140323303827user.png', ''),
(2, '6231415', 'Krizzle', 'P', 'Picasso', '2023-10-01', 1, 'Caridad, Salcedo, Eastern Samar', 'Naparaan Salcedo Eastern Samar- ESSU', '', 1, 912345678, 'krizzle', 'krizzle', '', 2, 2, 'Teacher I', 1, '2022-10-10 08:01:43', 1, '2024-02-02 10:39:19', '2022-10-10', '2024-11-02', '2024-02-21 06:50:20', '2024-02-20 19:25:18', 1, 3, '146570290338female-avatar.png', ''),
(30, '240001', 'Hershey', 'R', 'Alburo', '1987-02-01', 2, 'Brgy.01 Mercedes Eastern Samar', 'Brgy. Naparaan Salcedo Eastern Samar', '', 2, 9971478896, 'hershey', 'hershey', '', 1, 2, 'Teacher 1', 3, '2024-02-20 06:26:22', 3, '2024-02-20 06:31:52', '2019-02-01', '0000-00-00', '2024-02-21 06:45:40', '2024-02-20 19:11:20', 1, 3, '282895290338female-avatar.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `GenderId` int(11) NOT NULL,
  `Name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`GenderId`, `Name`) VALUES
(1, 'male'),
(2, 'female');

-- --------------------------------------------------------

--
-- Table structure for table `leavedays`
--

CREATE TABLE `leavedays` (
  `LeaveDayId` bigint(20) NOT NULL,
  `LeaveDay` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `leavedays`
--

INSERT INTO `leavedays` (`LeaveDayId`, `LeaveDay`) VALUES
(1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `leavedetails`
--

CREATE TABLE `leavedetails` (
  `Detail_Id` bigint(20) NOT NULL,
  `EmpId` bigint(20) NOT NULL,
  `TypesLeaveId` varchar(20) NOT NULL,
  `Commutation` varchar(20) NOT NULL,
  `StateDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `LeaveStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `leavedetails`
--

INSERT INTO `leavedetails` (`Detail_Id`, `EmpId`, `TypesLeaveId`, `Commutation`, `StateDate`, `EndDate`, `LeaveStatus`) VALUES
(19, 6231415, 'Sick Leave', 'Requested', '2024-01-20', '2024-01-21', 'Denied'),
(20, 6231415, 'Vacation Leave', 'Requested', '2023-10-22', '2023-11-22', 'Accept'),
(21, 1, 'Study Leave', 'Requested', '2024-02-08', '2024-02-10', 'Pending'),
(22, 1, 'Paternity Leave', 'Requested', '2024-02-20', '2024-02-24', 'Pending'),
(23, 1, 'Sick Leave', 'Requested', '2024-02-08', '2024-02-10', 'Denied'),
(24, 6231415, 'Sick Leave', 'Requested', '2024-02-16', '2024-02-17', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `maritalstatus`
--

CREATE TABLE `maritalstatus` (
  `MaritalId` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `maritalstatus`
--

INSERT INTO `maritalstatus` (`MaritalId`, `Name`) VALUES
(1, 'Married'),
(2, 'Unmarried');

-- --------------------------------------------------------

--
-- Table structure for table `otherleave`
--

CREATE TABLE `otherleave` (
  `Id` int(11) NOT NULL,
  `EmpId` int(20) DEFAULT NULL,
  `OtherLeave` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `PositionId` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`PositionId`, `Name`) VALUES
(1, 'Security'),
(2, 'Teacher'),
(4, 'Dean'),
(5, 'President'),
(6, 'Faculty'),
(7, 'Registrar'),
(8, 'Athletic Directors and Coaches'),
(9, 'Human Resources');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `RoleId` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleId`, `Name`) VALUES
(1, 'admin'),
(3, 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `seminardetails`
--

CREATE TABLE `seminardetails` (
  `Detail_Id` int(11) NOT NULL,
  `EmpId` int(20) DEFAULT NULL,
  `SeminarType` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `Progress` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seminardetails`
--

INSERT INTO `seminardetails` (`Detail_Id`, `EmpId`, `SeminarType`, `date`, `Progress`) VALUES
(3, 6231415, 'Seminar1', '2024-01-01', 10),
(4, 1, 'Seminar2', '2024-01-04', 46);

-- --------------------------------------------------------

--
-- Table structure for table `sickleave`
--

CREATE TABLE `sickleave` (
  `Id` int(11) NOT NULL,
  `EmpId` int(20) DEFAULT NULL,
  `DetailsLeave` varchar(20) DEFAULT NULL,
  `Illness` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sickleave`
--

INSERT INTO `sickleave` (`Id`, `EmpId`, `DetailsLeave`, `Illness`) VALUES
(7, 6231415, 'In Hospital', 'hiranat'),
(8, 1, '-- Select Details Le', ''),
(9, 6231415, 'In Hospital', 'yyhuhu');

-- --------------------------------------------------------

--
-- Table structure for table `specialprivilegeleave`
--

CREATE TABLE `specialprivilegeleave` (
  `Id` int(11) NOT NULL,
  `EmpId` int(20) DEFAULT NULL,
  `DetailsLeave` varchar(20) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `StateId` int(11) NOT NULL,
  `CountryId` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`StateId`, `CountryId`, `Name`) VALUES
(1, 1, 'Eastern Samar'),
(2, 1, 'Northern Samar');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `StatusId` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`StatusId`, `Name`) VALUES
(1, 'active'),
(2, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `trainingdetails`
--

CREATE TABLE `trainingdetails` (
  `Detail_Id` int(11) NOT NULL,
  `EmpId` int(20) DEFAULT NULL,
  `TrainingType` text DEFAULT NULL,
  `Type_of_seminar_training` varchar(50) DEFAULT NULL,
  `CurrentStatus` varchar(100) DEFAULT NULL,
  `TargetStatus` varchar(100) DEFAULT NULL,
  `Objectives` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `certificate` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainingdetails`
--

INSERT INTO `trainingdetails` (`Detail_Id`, `EmpId`, `TrainingType`, `Type_of_seminar_training`, `CurrentStatus`, `TargetStatus`, `Objectives`, `date`, `certificate`) VALUES
(35, 1, 'wwqewe', 'Technical', 'wds', 'efdfdf', NULL, '2024-02-10', 'rjhel.jpg'),
(40, 6231415, 'Seminar Testing', 'Managerial', 'Status 1', 'Status 2', NULL, '2024-02-10', 'shoe11.jpg'),
(41, 6231415, 'Training Testing', 'Foundational', 'Current Status Testing', 'Target Status Testing', 'Objectives Testing', '2024-02-19', '290338female-avatar.png'),
(42, 240001, 'Testing Training', 'Foundational', 'Current Testing', 'Target Testing', 'Objectives Testing', '2024-02-19', 'bg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `type_of_leave`
--

CREATE TABLE `type_of_leave` (
  `LeaveId` bigint(20) NOT NULL,
  `Type_of_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `type_of_leave`
--

INSERT INTO `type_of_leave` (`LeaveId`, `Type_of_Name`) VALUES
(4, 'Manadatory/Forced Leave'),
(5, 'Maternity Leave'),
(6, 'Paternity Leave'),
(8, 'Solo Parent Leave'),
(9, 'Study Leave'),
(10, '10 Day VAWC Leave'),
(11, 'Rehabilitation Privilege'),
(12, 'Special Leave Benefits for Women'),
(13, 'Special Emergency (Calamity) Leave'),
(14, 'Adoption Leave');

-- --------------------------------------------------------

--
-- Table structure for table `type_of_seminar_training`
--

CREATE TABLE `type_of_seminar_training` (
  `seminar_trainingID` int(11) NOT NULL,
  `Type_of_seminar_training` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type_of_seminar_training`
--

INSERT INTO `type_of_seminar_training` (`seminar_trainingID`, `Type_of_seminar_training`) VALUES
(1, 'Technical'),
(2, 'Managerial'),
(3, 'Supervisory'),
(4, 'Foundational');

-- --------------------------------------------------------

--
-- Table structure for table `vacationleave`
--

CREATE TABLE `vacationleave` (
  `Id` int(11) NOT NULL,
  `EmpId` int(20) DEFAULT NULL,
  `DetailsLeave` varchar(20) DEFAULT NULL,
  `Location` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vacationleave`
--

INSERT INTO `vacationleave` (`Id`, `EmpId`, `DetailsLeave`, `Location`) VALUES
(6, 6231415, 'Abroad', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`CityId`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`CountryId`);

--
-- Indexes for table `dailyworkload`
--
ALTER TABLE `dailyworkload`
  ADD PRIMARY KEY (`DailyWorkLoadId`);

--
-- Indexes for table `degreedetails`
--
ALTER TABLE `degreedetails`
  ADD PRIMARY KEY (`Detail_Id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmpId`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `EmployeeId` (`EmployeeId`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`GenderId`);

--
-- Indexes for table `leavedays`
--
ALTER TABLE `leavedays`
  ADD PRIMARY KEY (`LeaveDayId`);

--
-- Indexes for table `leavedetails`
--
ALTER TABLE `leavedetails`
  ADD PRIMARY KEY (`Detail_Id`);

--
-- Indexes for table `maritalstatus`
--
ALTER TABLE `maritalstatus`
  ADD PRIMARY KEY (`MaritalId`);

--
-- Indexes for table `otherleave`
--
ALTER TABLE `otherleave`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`PositionId`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `seminardetails`
--
ALTER TABLE `seminardetails`
  ADD PRIMARY KEY (`Detail_Id`);

--
-- Indexes for table `sickleave`
--
ALTER TABLE `sickleave`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `specialprivilegeleave`
--
ALTER TABLE `specialprivilegeleave`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`StateId`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`StatusId`);

--
-- Indexes for table `trainingdetails`
--
ALTER TABLE `trainingdetails`
  ADD PRIMARY KEY (`Detail_Id`);

--
-- Indexes for table `type_of_leave`
--
ALTER TABLE `type_of_leave`
  ADD PRIMARY KEY (`LeaveId`);

--
-- Indexes for table `type_of_seminar_training`
--
ALTER TABLE `type_of_seminar_training`
  ADD PRIMARY KEY (`seminar_trainingID`);

--
-- Indexes for table `vacationleave`
--
ALTER TABLE `vacationleave`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `CityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `CountryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dailyworkload`
--
ALTER TABLE `dailyworkload`
  MODIFY `DailyWorkLoadId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `degreedetails`
--
ALTER TABLE `degreedetails`
  MODIFY `Detail_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmpId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `GenderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leavedays`
--
ALTER TABLE `leavedays`
  MODIFY `LeaveDayId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leavedetails`
--
ALTER TABLE `leavedetails`
  MODIFY `Detail_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `otherleave`
--
ALTER TABLE `otherleave`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `PositionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `seminardetails`
--
ALTER TABLE `seminardetails`
  MODIFY `Detail_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sickleave`
--
ALTER TABLE `sickleave`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `specialprivilegeleave`
--
ALTER TABLE `specialprivilegeleave`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `StateId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trainingdetails`
--
ALTER TABLE `trainingdetails`
  MODIFY `Detail_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `type_of_leave`
--
ALTER TABLE `type_of_leave`
  MODIFY `LeaveId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `type_of_seminar_training`
--
ALTER TABLE `type_of_seminar_training`
  MODIFY `seminar_trainingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vacationleave`
--
ALTER TABLE `vacationleave`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
