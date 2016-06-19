-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2016 at 01:00 PM
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

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`IDuser`, `IDcontact`) VALUES
(21, 23),
(21, 24),
(21, 25),
(21, 26),
(21, 27),
(26, 23);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `ID` int(3) NOT NULL,
  `Size` int(40) NOT NULL,
  `Type` varchar(15) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `IDuser` int(3) NOT NULL,
  `last_modify` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`ID`, `Size`, `Type`, `Name`, `IDuser`, `last_modify`) VALUES
(2549, 2605983, 'image/png', 'vlcsnap-2016-05-01-21h51m37s317.png', 21, '2016-06-16 11:21:58');

-- --------------------------------------------------------

--
-- Table structure for table `notifies`
--

CREATE TABLE `notifies` (
  `ID` int(3) NOT NULL,
  `Who` varchar(50) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Forwho` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifies`
--

INSERT INTO `notifies` (`ID`, `Who`, `Type`, `Forwho`) VALUES
(12, 'gabriele', 'Adding', 23),
(8, 'gabriele', 'Adding', 24),
(14, 'gabriele', 'Adding', 25),
(9, 'gabriele', 'Adding', 26),
(13, 'gabriele', 'Adding', 27),
(7, 'luca', 'Adding', 21),
(15, 'vichy', 'Adding', 23);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(3) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `Registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Name`, `Password`, `Email`, `Registration_date`, `image`) VALUES
(21, 'gabriele', '444bcb3a3fcf8389296c49467f27e1d6', 'gafire@hotmail.it', '2016-05-14 19:54:51', NULL),
(23, 'ok', '444bcb3a3fcf8389296c49467f27e1d6', 'gabriele-martino@libero.it', '2016-05-14 19:57:50', NULL),
(24, 'davide', '6e6bc4e49dd477ebc98ef4046c067b5f', 'davidedb@unito.it', '2016-05-15 20:12:19', NULL),
(25, 'salvatore', '0d149b90e7394297301c90191ae775f0', 'ok@salvo.it', '2016-05-15 20:33:46', NULL),
(26, 'vichy', '6e6bc4e49dd477ebc98ef4046c067b5f', 'vichy@libero.it', '2016-05-15 22:41:06', NULL);
INSERT INTO `user` (`ID`, `Name`, `Password`, `Email`, `Registration_date`, `image`) VALUES
(28, 'gabriele', '6e6bc4e49dd477ebc98ef4046c067b5f', 'ok@mmm.it', '2016-05-21 14:00:45', NULL),
(29, 'rosa', '6e6bc4e49dd477ebc98ef4046c067b5f', 'rosa@hotmail.it', '2016-05-25 14:46:30', NULL),
(30, 'paola', '1722a28089f91b73fff8708c26800a5e', 'paola@minchia.it', '2016-05-25 17:50:45', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`IDuser`,`IDcontact`),
  ADD UNIQUE KEY `IDuser` (`IDuser`,`IDcontact`),
  ADD KEY `IDcontact` (`IDcontact`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`,`IDuser`),
  ADD KEY `IDuser` (`IDuser`);

--
-- Indexes for table `notifies`
--
ALTER TABLE `notifies`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Who` (`Who`,`Type`,`Forwho`),
  ADD KEY `not` (`Who`,`Type`,`Forwho`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);
ALTER TABLE `user` ADD FULLTEXT KEY `Email_2` (`Email`);
ALTER TABLE `user` ADD FULLTEXT KEY `Name` (`Name`);
ALTER TABLE `user` ADD FULLTEXT KEY `Name_2` (`Name`);
ALTER TABLE `user` ADD FULLTEXT KEY `Email_3` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `IDuser` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2550;
--
-- AUTO_INCREMENT for table `notifies`
--
ALTER TABLE `notifies`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`IDuser`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contacts_ibfk_2` FOREIGN KEY (`IDcontact`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`IDuser`) REFERENCES `user` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
