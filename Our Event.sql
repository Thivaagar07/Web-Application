-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2017 at 02:42 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_management`
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
(2017, 'WebApp17', 'Ahmed Amin', 'ahmed@gmail.com');

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
(4, 'The greatest event', '2017-12-13', '13:00:00', 'write your event address', 'write a description', 490, '500.00', 9),
(5, 'The Last Day', '2017-09-27', '14:01:00', 'Jalan ampang, Kuala Lumpur', 'The event is about having experience of living in vary dangerous environment.', 4, '50.00', 11);

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
(4, 7, 8, '4000.00'),
(4, 8, 2, '1000.00'),
(4, 9, 10, '5000.00');

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
(7, '5d106d697c848690d30c22fd5df67d20a507f09929d42f6a9e2da933b067c063997ba3cfc92fd28af13a201187f3af44c1d59621476c35e412a3f1764e3b675c', 'hakeem95shubr@gmail.com', 'Hakem', 'Shubar', '1995-05-26', '012-62274977'),
(8, '1bf043dba166effc3dbd96647334179c2099831fd0ffb051a62336a258f38808efe4f5a59c4009797802e788f67b3360b4c266b395a1804bc10422aa1f25a279', 'jackhandersn@gmail.com', 'Ashraf', 'Handerson', '2000-05-16', '012-62244447'),
(9, '0eeb15f3c7ca2f9bf1749a08cb52e1f4c23908c2127aade4668f90a66f5632eaadb20852110646e55ce1e9792b1afea5c20829363d6eb85724b1479de08260ea', 'khalid@gmail.com', 'Khalid', 'Salih', '1992-06-10', '012-62244447'),
(10, 'adf848b15add92c20079188628ce91536f1c7c48756da3104eb10b9d6a91f3bf4d37cbc0305ad0b8aa1c2d08ad99336f89f2cb71a07f8787739e347fe227fd77', 'khalid@gmail.com', 'kamal', 'Lamia', '2017-09-13', '012-62244447'),
(11, 'c43b3fc35c16180d2ff4c764028d4a9a6eefcce4cac1b392e77fe4f32bb71b1737bf81a4e2af67c541b6bb0819ee553617daee107e4eed78962c6701d83441f1', 'Ahmed@gmail.com', 'Ahmed', 'Ali', '2017-09-28', '012-12345677');

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
  MODIFY `adminID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2018;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
