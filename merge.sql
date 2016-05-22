-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2016 at 01:17 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `merge`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `IDuser` int(3) NOT NULL,
  `IDcontact` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `desks`
--

CREATE TABLE `desks` (
  `IDuser` int(11) NOT NULL,
  `IDdesks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `ID` int(3) NOT NULL,
  `Size` int(40) NOT NULL,
  `Type` varchar(15) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Content` longblob NOT NULL,
  `IDuser` int(3) NOT NULL,
  `last_modify` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(3) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `Registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Name`, `Password`, `Email`, `Registration_date`) VALUES
(21, 'gabriele', '444bcb3a3fcf8389296c49467f27e1d6', 'gafire@hotmail.it', '2016-05-14 19:54:51'),
(23, 'ok', '444bcb3a3fcf8389296c49467f27e1d6', 'gabriele-martino@libero.it', '2016-05-14 19:57:50'),
(24, 'davide', '6e6bc4e49dd477ebc98ef4046c067b5f', 'davidedb@unito.it', '2016-05-15 20:12:19'),
(25, 'salvatore', '0d149b90e7394297301c90191ae775f0', 'ok@salvo.it', '2016-05-15 20:33:46'),
(26, 'vichy', '4d186321c1a7f0f354b297e8914ab240', 'vichy@libero.it', '2016-05-15 22:41:06'),
(27, 'luca', '444bcb3a3fcf8389296c49467f27e1d6', 'luca@ok.it', '2016-05-16 08:57:43'),
(28, 'gabriele', '6e6bc4e49dd477ebc98ef4046c067b5f', 'ok@mmm.it', '2016-05-21 14:00:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`IDuser`),
  ADD UNIQUE KEY `IDuser` (`IDuser`,`IDcontact`),
  ADD KEY `IDcontact` (`IDcontact`);

--
-- Indexes for table `desks`
--
ALTER TABLE `desks`
  ADD PRIMARY KEY (`IDuser`),
  ADD UNIQUE KEY `IDuser` (`IDuser`,`IDdesks`),
  ADD KEY `IDdesks` (`IDdesks`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDuser` (`IDuser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `IDuser` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`IDuser`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `contacts_ibfk_2` FOREIGN KEY (`IDcontact`) REFERENCES `user` (`ID`);

--
-- Constraints for table `desks`
--
ALTER TABLE `desks`
  ADD CONSTRAINT `desks_ibfk_1` FOREIGN KEY (`IDuser`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `desks_ibfk_2` FOREIGN KEY (`IDdesks`) REFERENCES `user` (`ID`);

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`IDuser`) REFERENCES `user` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
