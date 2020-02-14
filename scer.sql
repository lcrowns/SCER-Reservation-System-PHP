-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2019 at 06:19 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(20) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `middleName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `userType` varchar(50) NOT NULL DEFAULT 'Admin',
  `accStatus` varchar(50) NOT NULL DEFAULT 'Active',
  `address` varchar(100) NOT NULL,
  `contactNumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `firstName`, `middleName`, `lastName`, `username`, `password`, `userType`, `accStatus`, `address`, `contactNumber`) VALUES
(1, 'Chito', '', 'Miranda', 'admin', 'admin', 'Admin', 'Active', 'La Trinidad, Benguet', '09123456789'),
(2, 'ronnie', '', 'lacar', 'arjun', '123', 'Admin', 'Active', 'baguio1', '9464080363'),
(3, 'John Kent', '', 'Merino', 'kent', '123', 'Admin', 'Active', 'Baguio', '9123456798'),
(5, 'Edmund', '', 'Luna', 'edmundluna', '123', 'Admin', 'Active', 'BL 21 LOT 2 BAKAKENG NORTH', '9422582160'),
(6, 'Russel Jay', '', ' Buan', 'russelbuan', '123', 'Admin', 'Inactive', 'Baguio', '9464080363');

-- --------------------------------------------------------

--
-- Table structure for table `court`
--

CREATE TABLE `court` (
  `courtID` int(20) NOT NULL,
  `courtName` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `sportID` int(20) NOT NULL,
  `Stat` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `court`
--

INSERT INTO `court` (`courtID`, `courtName`, `price`, `photo`, `sportID`, `Stat`) VALUES
(22, 'Basketball Court A', 500, 'court3.jpg', 3, 'Inactive'),
(23, 'Baseball Field A', 600, 'court2.jpg', 6, 'Active'),
(24, 'Volleyball Court A', 400, 'court3.jpg', 9, 'Active'),
(25, 'Badminton Court A', 300, 'badminton.jpg', 8, 'Active'),
(26, 'Track and Field A', 700, 'court2.jpg', 10, 'Active'),
(27, 'Swimming Pool A', 600, 'swimming.jpg', 11, 'Active'),
(28, 'Tennis Court A', 400, 'badminton.jpg', 12, 'Active'),
(29, 'Swimming Pool B', 600, 'swimming.jpg', 11, 'Active'),
(30, 'Basketball Court B', 500, 'basketball.jpg', 3, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE `sport` (
  `sportID` int(50) NOT NULL,
  `sportsName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`sportID`, `sportsName`) VALUES
(3, 'Basketball'),
(6, 'Baseball'),
(8, 'Badminton'),
(9, 'Volleyball'),
(10, 'Track and Field'),
(11, 'Swimming'),
(12, 'Tennis');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transactionID` int(20) NOT NULL,
  `IDnumber` int(20) NOT NULL,
  `courtID` int(20) NOT NULL,
  `additionalItems` int(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `daysUse` int(2) NOT NULL,
  `checkIn` date NOT NULL,
  `checkInTime` time NOT NULL,
  `checkOut` date NOT NULL,
  `checkOutTime` time NOT NULL,
  `totalPrice` varchar(20) NOT NULL,
  `cancelReason` varchar(255) NOT NULL,
  `WalkIn` varchar(30) NOT NULL DEFAULT 'No',
  `WIname` varchar(50) DEFAULT NULL,
  `chargeReason` varchar(50) DEFAULT NULL,
  `feedback` varchar(50) NOT NULL,
  `cancelBy` varchar(50) NOT NULL,
  `notif` varchar(250) NOT NULL,
  `clientnotif` varchar(250) NOT NULL,
  `clientnotifcancel` varchar(50) NOT NULL,
  `notifcancel` varchar(50) NOT NULL,
  `isRead` varchar(50) NOT NULL DEFAULT 'No',
  `isReadClient` varchar(50) NOT NULL DEFAULT 'No',
  `isReadCancel` varchar(50) NOT NULL DEFAULT 'No',
  `isReadCancelClient` varchar(50) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transactionID`, `IDnumber`, `courtID`, `additionalItems`, `status`, `daysUse`, `checkIn`, `checkInTime`, `checkOut`, `checkOutTime`, `totalPrice`, `cancelReason`, `WalkIn`, `WIname`, `chargeReason`, `feedback`, `cancelBy`, `notif`, `clientnotif`, `clientnotifcancel`, `notifcancel`, `isRead`, `isReadClient`, `isReadCancel`, `isReadCancelClient`) VALUES
(246, 15, 25, 0, 'Accepted', 1, '2019-11-30', '00:00:00', '0000-00-00', '00:00:00', '300', '', 'No', NULL, NULL, '', '', 'Lester John Sasa has requested a new transaction.', 'Your request have been accepted!', '', '', 'Yes', 'Yes', 'No', 'No'),
(247, 23, 25, 500, 'Check Out', 1, '2019-11-30', '18:06:49', '0000-00-00', '18:07:11', '800', '', 'No', NULL, 'Minor property damages', '', '', 'Jimwell Sasa has requested a new transaction.', 'Your request have been accepted!', '', '', 'No', 'No', 'No', 'No'),
(248, 23, 29, 0, 'Check In', 1, '2019-11-30', '18:07:50', '0000-00-00', '00:00:00', '600', '', 'No', NULL, NULL, '', '', 'Jimwell Sasa has requested a new transaction.', 'Your request have been accepted!', '', '', 'Yes', 'No', 'No', 'No'),
(249, 23, 25, 0, 'Cancelled', 1, '2019-12-19', '00:00:00', '0000-00-00', '00:00:00', '300', 'Under renovation', 'No', NULL, NULL, '', 'Admin', 'Jimwell Sasa has requested a new transaction.', 'Your request have been accepted!', 'Your transaction has been cancelled by the Admin.', '', 'No', 'Yes', 'No', 'Yes'),
(250, 23, 29, 0, 'Accepted', 1, '2020-01-31', '00:00:00', '0000-00-00', '00:00:00', '600', '', 'No', NULL, NULL, '', '', 'Jimwell Sasa has requested a new transaction.', 'Your request have been accepted!', '', '', 'No', 'Yes', 'No', 'No'),
(252, 39, 25, 0, 'Accepted', 3, '2020-01-14', '00:00:00', '0000-00-00', '00:00:00', '300', '', 'No', NULL, NULL, '', '', 'Russel Jay Buwan has requested a new transaction.', 'Your request have been accepted!', '', '', 'Yes', 'Yes', 'No', 'No'),
(253, 40, 24, 0, 'Accepted', 4, '2019-12-19', '00:00:00', '0000-00-00', '00:00:00', '400', '', 'No', NULL, NULL, '', '', 'John Kent Merino has requested a new transaction.', 'Your request have been accepted!', '', '', 'Yes', 'Yes', 'No', 'No'),
(254, 40, 29, 0, 'Cancelled', 2, '2019-12-26', '00:00:00', '0000-00-00', '00:00:00', '600', 'Sports Complex busy that time', 'No', NULL, NULL, '', 'Admin', 'John Kent Merino has requested a new transaction.', '', 'Your transaction has been cancelled by the Admin.', '', 'No', 'No', 'No', 'Yes'),
(255, 40, 25, 0, 'Cancelled', 1, '2019-11-29', '00:00:00', '0000-00-00', '00:00:00', '300', '', 'No', NULL, NULL, '', 'Admin', 'John Kent Merino has requested a new transaction.', 'Your request have been accepted!', 'Your transaction has been cancelled by the Admin.', '', 'No', 'No', 'No', 'Yes'),
(256, 40, 25, 0, 'Cancelled', 1, '2019-11-29', '00:00:00', '0000-00-00', '00:00:00', '300', 'conflict', 'No', NULL, NULL, '', 'Admin', 'John Kent Merino has requested a new transaction.', '', 'Your transaction has been cancelled by the Admin.', '', 'No', 'No', 'No', 'Yes'),
(257, 40, 25, 0, 'Accepted', 1, '2019-11-29', '00:00:00', '0000-00-00', '00:00:00', '300', '', 'No', NULL, NULL, '', '', 'John Kent Merino has requested a new transaction.', 'Your request have been accepted!', '', '', 'No', 'Yes', 'No', 'No'),
(258, 40, 23, 0, 'Accepted', 1, '2019-12-01', '00:00:00', '0000-00-00', '00:00:00', '600', '', 'No', NULL, NULL, '', '', 'John Kent Merino has requested a new transaction.', 'Your request have been accepted!', '', '', 'No', 'No', 'No', 'No'),
(259, 40, 24, 0, 'Cancelled', 1, '2019-11-29', '00:00:00', '0000-00-00', '00:00:00', '400', 'conflict', 'No', NULL, NULL, '', 'Admin', 'John Kent Merino has requested a new transaction.', '', 'Your transaction has been cancelled by the Admin.', '', 'No', 'No', 'No', 'Yes'),
(260, 40, 27, 0, 'Accepted', 1, '2019-12-04', '00:00:00', '0000-00-00', '00:00:00', '600', '', 'No', NULL, NULL, '', '', 'John Kent Merino has requested a new transaction.', 'Your request have been accepted!', '', '', 'Yes', 'No', 'No', 'No'),
(261, 40, 25, 0, 'Pending', 1, '2019-11-29', '00:00:00', '0000-00-00', '00:00:00', '300', '', 'No', NULL, NULL, '', '', 'John Kent Merino has requested a new transaction.', '', '', '', 'Yes', 'No', 'No', 'No'),
(262, 40, 23, 0, 'Pending', 1, '2019-11-29', '00:00:00', '0000-00-00', '00:00:00', '600', '', 'No', NULL, NULL, '', '', 'John Kent Merino has requested a new transaction.', '', '', '', 'No', 'No', 'No', 'No'),
(263, 40, 23, 0, 'Pending', 1, '2019-12-02', '00:00:00', '0000-00-00', '00:00:00', '600', '', 'No', NULL, NULL, '', '', 'John Kent Merino has requested a new transaction.', '', '', '', 'No', 'No', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `IDnumber` int(30) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contactNumber` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dateadded` date NOT NULL DEFAULT '0000-00-00',
  `userType` varchar(50) NOT NULL DEFAULT 'User',
  `accStatus` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`IDnumber`, `firstName`, `middleName`, `lastName`, `address`, `contactNumber`, `username`, `password`, `dateadded`, `userType`, `accStatus`) VALUES
(15, 'Lester John', '', 'Sasa', 'DD-013 Sadag, Bahong, La Trinidad, Benguet', '09123456789', 'lestersasa', '123', '0000-00-00', 'User', 'Active'),
(23, 'Jimwell', 'Padtoc', 'Sasa', 'DD-013 Sadag, Bahong, La Trinidad, Benguet', '2147483647', 'jimwellsasa', '123', '0000-00-00', 'User', 'Active'),
(24, 'Fernando', '', 'Poe Jr.', 'La Trinidad, Benguet', '1231231', 'fpj', '123', '0000-00-00', 'User', 'Inactive'),
(34, 'Jack', '', 'Sparrow', 'Carribean', '0941231412', 'adminjack', '123', '0000-00-00', 'Admin', 'Inactive'),
(35, 'lee', 'Sin', 'God', 'BL 21 LOT 2 BAKAKENG NORTH', '9234565996', 'Kentchow', '123', '0000-00-00', 'User', 'Inactive'),
(36, 'Ezekiel', 'Fernandez', 'De Guzman', 'Leonila Hill', '9128797544', 'MVTEO', '123', '0000-00-00', 'User', 'Active'),
(37, 'Ronnie', 'Tannong', 'Lacar', 'Navy Base', '9079536840', 'Arjun', '123', '0000-00-00', 'User', 'Active'),
(38, 'Edmon', 'Cueva', 'Luna', 'Upper Bonifacio', '9453865931', 'Zern', '123', '0000-00-00', 'User', 'Active'),
(39, 'Russel Jay', 'Bagayas', 'Buwan', 'Sadiko Street', '9894098761', 'Grim', '123', '0000-00-00', 'User', 'Active'),
(40, 'John Kent', 'Refamonte', 'Merino', 'Cato Infanta Pangasinan', '9268306256', 'Chowchow', '123', '0000-00-00', 'User', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `court`
--
ALTER TABLE `court`
  ADD PRIMARY KEY (`courtID`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`sportID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transactionID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IDnumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `court`
--
ALTER TABLE `court`
  MODIFY `courtID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `sportID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transactionID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `IDnumber` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
