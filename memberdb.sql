-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2023 at 06:27 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `membersms`
--
CREATE DATABASE IF NOT EXISTS `membersms` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `membersms`;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `AttendanceID` int(11) NOT NULL,
  `memberID` int(11) NOT NULL,
  `attendanceType` text NOT NULL,
  `attendanceDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`AttendanceID`, `memberID`, `attendanceType`, `attendanceDate`) VALUES
(1, 2, 'Present', '2022-02-03'),
(2, 5, 'Present', '2022-02-03'),
(3, 2, 'Absent', '2022-02-17'),
(4, 4, 'Absent', '2022-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `attendancetype`
--

CREATE TABLE `attendancetype` (
  `AttendanceTypeID` int(11) NOT NULL,
  `AttendanceDescription` varchar(50) NOT NULL,
  `AttendanceDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `DonationID` int(11) NOT NULL,
  `memberID` int(11) NOT NULL,
  `DonationType` varchar(20) NOT NULL,
  `AmountQuantity` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`DonationID`, `memberID`, `DonationType`, `AmountQuantity`) VALUES
(1, 2, 'Money', 12);

-- --------------------------------------------------------

--
-- Table structure for table `duespayment`
--

CREATE TABLE `duespayment` (
  `DuesID` int(11) NOT NULL,
  `memberID` int(11) NOT NULL,
  `AmountPaid` double NOT NULL,
  `DatePaid` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `duespayment`
--

INSERT INTO `duespayment` (`DuesID`, `memberID`, `AmountPaid`, `DatePaid`) VALUES
(3, 2, 12, '2022-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `GroupsID` int(11) NOT NULL,
  `GroupTypeID` int(11) NOT NULL,
  `memberID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`GroupsID`, `GroupTypeID`, `memberID`) VALUES
(1, 1, 2),
(2, 1, 4),
(3, 1, 2),
(4, 2, 4),
(5, 2, 5),
(6, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `grouptype`
--

CREATE TABLE `grouptype` (
  `GroupTypeID` int(11) NOT NULL,
  `GroupTypeName` varchar(50) NOT NULL,
  `Deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grouptype`
--

INSERT INTO `grouptype` (`GroupTypeID`, `GroupTypeName`, `Deleted`) VALUES
(1, 'Youth', 0),
(2, 'New Group', 0);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memberID` int(11) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `MName` varchar(50) NOT NULL,
  `MemberNo` varchar(50) NOT NULL,
  `Gender` varchar(5) NOT NULL,
  `PhoneNo` varchar(11) NOT NULL,
  `Church` varchar(50) NOT NULL,
  `Email` text NOT NULL,
  `MemberType` varchar(20) NOT NULL,
  `Status` int(20) NOT NULL DEFAULT 0,
  `ResidenceAddress` text NOT NULL,
  `Profession` varchar(50) NOT NULL,
  `DoB` date NOT NULL,
  `photo` text NOT NULL,
  `Deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberID`, `FName`, `LName`, `MName`, `MemberNo`, `Gender`, `PhoneNo`, `Church`, `Email`, `MemberType`, `Status`, `ResidenceAddress`, `Profession`, `DoB`, `photo`, `Deleted`) VALUES
(2, 'John', 'Kuma', 'Kwaku', 'MS123', 'Male', '0390838228', 'CoP', 'JohnKKuma@gmail.com', 'Life Time', 1, 'AA-232-2323', 'Teacher', '1998-02-04', '', 0),
(4, 'James', 'Kanayo', 'Kportowo', 'MS124', 'Male', '0393830328', 'None', 'JamesKK@gmail.com', 'Monthly', 0, 'AA-232-2323', 'Teacher', '1988-02-28', '', 0),
(5, 'John12', 'Kuma12', 'Kwaku12', '', 'Femal', '0393038228', '', 'JohnKKuma@gmail.com1', 'Monthly', 1, 'AA-232-2323', '', '1212-12-12', 'avatar5.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `FullName` text NOT NULL,
  `Password` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `FullName`, `Password`, `email`) VALUES
(1, '', '', '$2y$10$VkXdldliPI2xZvTQjkhjxed1DJXU7Z7L.CH4EwmQyZYF0egE/ph8G', 'JohnKKuma@gmail.com'),
(5, '', '', '$2y$10$jirS2xCGjpOW.trA/b0LS.hEgToIdEiSpNRCd/PZlNUcZoy3T.IXW', 'jameskk@gmail.com'),
(6, '', '', '$2y$10$vcuEbK9l0nr262JPT0N33un7fHN10qgA0VvJqcEF4gNN29wN1E4X.', 'JohnKKuma@gmail.com1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`AttendanceID`);

--
-- Indexes for table `attendancetype`
--
ALTER TABLE `attendancetype`
  ADD PRIMARY KEY (`AttendanceTypeID`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`DonationID`);

--
-- Indexes for table `duespayment`
--
ALTER TABLE `duespayment`
  ADD PRIMARY KEY (`DuesID`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`GroupsID`);

--
-- Indexes for table `grouptype`
--
ALTER TABLE `grouptype`
  ADD PRIMARY KEY (`GroupTypeID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `AttendanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendancetype`
--
ALTER TABLE `attendancetype`
  MODIFY `AttendanceTypeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `DonationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `duespayment`
--
ALTER TABLE `duespayment`
  MODIFY `DuesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `GroupsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `grouptype`
--
ALTER TABLE `grouptype`
  MODIFY `GroupTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
