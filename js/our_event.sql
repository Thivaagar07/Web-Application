-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2019 at 09:30 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `our event`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(10) NOT NULL,
  `password` varchar(320) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(320) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `password`, `name`, `email`) VALUES
(2019, 'abc123', 'Thivaa', 'thivaagar@ymail.com');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventID` int(50) NOT NULL,
  `eventName` mediumtext NOT NULL,
  `eventDate` date NOT NULL,
  `eventTime` time NOT NULL,
  `location` varchar(50) NOT NULL,
  `eventDesc` longtext NOT NULL,
  `capacity` int(10) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `userFK` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventID`, `eventName`, `eventDate`, `eventTime`, `location`, `eventDesc`, `capacity`, `price`, `userFK`) VALUES
(10, 'Game', '0000-00-00', '13:23:00', '', 'Write your goals!', -3, '0.00', 12),
(11, 'Car Game', '0000-00-00', '02:34:00', '', 'Race', 0, '0.00', 12),
(12, 'Car Game', '0000-00-00', '02:34:00', '', 'Race', 0, '0.00', 12),
(13, 'Car Game', '0000-00-00', '02:34:00', 'Write your event venue!', 'Race', 0, '0.00', 12),
(14, 'Car Game', '0000-00-00', '02:34:00', 'Write your event venue!', 'Race', 0, '0.00', 12),
(15, 'Motor Game', '2019-03-10', '09:10:00', 'Multimedia University', '', 0, '0.00', 12),
(16, 'Motor Game', '2019-03-10', '09:10:00', 'Multimedia University', '', 0, '0.00', 12),
(17, 'Motor Game', '2019-03-10', '09:10:00', 'Multimedia University', '', 0, '0.00', 12),
(18, 'Motor Game', '2019-03-10', '09:10:00', 'Multimedia University', '', 0, '0.00', 12),
(19, 'Motor Game', '2019-03-10', '09:10:00', 'Multimedia University', '', 0, '0.00', 12),
(20, 'Motor Game', '2019-03-10', '09:10:00', 'Multimedia University', '', 0, '0.00', 12),
(21, 'Fair', '2019-02-15', '13:59:00', 'MMU', '', 0, '0.00', 12),
(22, 'Running Race', '2019-02-09', '06:00:00', 'MMU Uni', '', 0, '0.00', 12);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `name`, `email`, `subject`) VALUES
(2, 'Thivaagar', 'testuser@abc', 'Heyy...lol'),
(3, 'Thivaagar', 'testuser@abc', 'Heyy...lol'),
(4, 'Thivaagar', 'thivaagarthamilselvan@gmail.com', 'Heyy...wassupp'),
(5, 'Thivaagar', 'thivaagarthamilselvan@gmail.com', 'Heyy...wassupp'),
(6, 'Thivaagar', 'thivaagar@ymail.com', 'dasd'),
(7, 'Thivaagar Thamil Selvan', 'thivaagar@ymail.com', 'asdasd'),
(9, 'Thivaagar', 'thivaagar@ymail.com', 'adfa'),
(11, 'Thivaagar', 'randy@abc.net', 'hjkjghfgf'),
(12, 'Thivaagar Thamil Selvan', 'testuser@abc', 'dfjkkljghf'),
(13, 'Thivaagar Thamil Selvan', 'thivaagar@ymail.com', 'I like this');

-- --------------------------------------------------------

--
-- Table structure for table `ticketing`
--

CREATE TABLE `ticketing` (
  `eventID` int(50) NOT NULL,
  `userID` int(25) NOT NULL,
  `numberOfTickets` int(10) NOT NULL,
  `TotalPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticketing`
--

INSERT INTO `ticketing` (`eventID`, `userID`, `numberOfTickets`, `TotalPrice`) VALUES
(10, 12, 3, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(25) NOT NULL,
  `password` varchar(320) NOT NULL,
  `email` varchar(320) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `password`, `email`, `fname`, `lname`, `dob`, `phone`) VALUES
(11, 'c43b3fc35c16180d2ff4c764028d4a9a6eefcce4cac1b392e77fe4f32bb71b1737bf81a4e2af67c541b6bb0819ee553617daee107e4eed78962c6701d83441f1', 'testuser@abc', 'Test', 'ABCD', '1997-03-10', '011-1234567'),
(12, '5df9d18c2be6ebc4e84801b71b065fcc63b721c097370ce0dc8ca5f716b36956266d06913514274b8bc9ff4d88ce29112f82802d838c0293b910944a25752d34', 'testuser@abc', 'Test', 'ABCD', '1997-03-10', '011-1234567'),
(15, '5df9d18c2be6ebc4e84801b71b065fcc63b721c097370ce0dc8ca5f716b36956266d06913514274b8bc9ff4d88ce29112f82802d838c0293b910944a25752dd4', 'testuser@abc', 'Thivaagar', 'Thamil', '0006-12-31', '011-12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `userID` (`userFK`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticketing`
--
ALTER TABLE `ticketing`
  ADD PRIMARY KEY (`eventID`,`userID`),
  ADD KEY `eventID` (`eventID`),
  ADD KEY `ticketing_ibfk_2` (`userID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2020;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`userFK`) REFERENCES `user` (`userID`) ON UPDATE CASCADE;

--
-- Constraints for table `ticketing`
--
ALTER TABLE `ticketing`
  ADD CONSTRAINT `ticketing_ibfk_1` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticketing_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
