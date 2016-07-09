-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Creato il: Lug 09, 2016 alle 16:59
-- Versione del server: 10.1.13-MariaDB
-- Versione PHP: 5.6.20

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
-- Struttura della tabella `contacts`
--

CREATE TABLE `contacts` (
  `IDuser` int(3) NOT NULL,
  `IDcontact` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `contacts`
--

INSERT INTO `contacts` (`IDuser`, `IDcontact`) VALUES
(21, 23),
(21, 24),
(21, 26),
(21, 27),
(21, 28),
(21, 29),
(21, 32),
(21, 33),
(21, 34),
(23, 21),
(24, 21),
(24, 23),
(24, 29),
(26, 21),
(26, 23),
(26, 24),
(26, 27),
(26, 29),
(32, 26);

-- --------------------------------------------------------

--
-- Struttura della tabella `file`
--

CREATE TABLE `file` (
  `ID` int(3) NOT NULL,
  `Size` int(40) NOT NULL,
  `Type` varchar(15) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `IDuser` int(3) NOT NULL,
  `last_modify` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reference` varchar(80) DEFAULT NULL,
  `policy` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `file`
--

INSERT INTO `file` (`ID`, `Size`, `Type`, `Name`, `IDuser`, `last_modify`, `reference`, `policy`) VALUES
(11, 1952749, 'image/png', 'vlcsnap-2016-05-01-21h44m53s155.png', 21, '2016-06-19 15:32:39', '74048-vlcsnap-2016-05-01-21h44m53s155.png', 'PUBLIC'),
(12, 272178, 'image/jpeg', 'maxresdefault.jpg', 26, '2016-06-19 23:57:59', '59742-maxresdefault.jpg', 'PUBLIC'),
(13, 2605983, 'image/png', 'vlcsnap-2016-05-01-21h51m37s317.png', 26, '2016-06-20 00:04:14', '23154-vlcsnap-2016-05-01-21h51m37s317.png', 'PUBLIC'),
(16, 2992653, 'image/png', 'vlcsnap-2015-03-22-13h37m32s207.png', 27, '2016-06-20 09:48:20', '33294-vlcsnap-2015-03-22-13h37m32s207.png', 'PUBLIC'),
(17, 1952749, 'image/png', 'vlcsnap-2016-05-01-21h44m53s155.png', 27, '2016-06-20 09:56:25', '19731-vlcsnap-2016-05-01-21h44m53s155.png', 'PUBLIC'),
(18, 2920435, 'image/jpeg', 'Porto_di Brindisi.jpg', 21, '2016-06-22 08:08:58', '60470-Porto_di Brindisi.jpg', 'PUBLIC'),
(19, 2631299, 'image/jpeg', 'puglia_8376t.T0.jpg', 21, '2016-06-25 19:13:21', '40361-puglia_8376t.T0.jpg', 'PUBLIC'),
(20, 2992653, 'image/png', 'vlcsnap-2015-03-22-13h37m32s207.png', 21, '2016-06-25 19:13:21', '65428-vlcsnap-2015-03-22-13h37m32s207.png', 'PUBLIC'),
(22, 30559, 'application/zip', 'mini-upload-form.zip', 26, '2016-07-07 12:42:07', '4676-mini-upload-form.zip', 'PUBLIC'),
(25, 272178, 'image/jpeg', 'maxresdefault.jpg', 21, '2016-07-09 11:17:48', '65833-maxresdefault.jpg', ''),
(26, 2692896, 'image/jpeg', 'IMG_20140616_001210.jpg', 21, '2016-07-09 14:55:30', '61241-IMG_20140616_001210.jpg', ''),
(29, 30208, 'image/jpeg', '[005893].jpg', 21, '2016-07-09 14:57:23', '58603-[005893].jpg', '');

--
-- Trigger `file`
--
DELIMITER $$
CREATE TRIGGER `refresh_space_occupied` AFTER INSERT ON `file` FOR EACH ROW BEGIN
	UPDATE user
    set space_occupied = space_occupied + NEW.size
    where ID = NEW.IDuser;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struttura della tabella `notifies`
--

CREATE TABLE `notifies` (
  `ID` int(3) NOT NULL,
  `Who` varchar(50) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Forwho` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `notifies`
--

INSERT INTO `notifies` (`ID`, `Who`, `Type`, `Forwho`) VALUES
(6, 'davide', 'Adding', 21),
(5, 'davide', 'Adding', 23),
(2, 'davide', 'Adding', 29),
(3, 'gabriele', 'Adding', 32),
(1, 'gabriele', 'Adding', 33),
(4, 'gabriele', 'Adding', 34),
(8, 'prova', 'Adding', 21),
(9, 'prova', 'Adding', 24),
(10, 'prova', 'Adding', 27);

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `ID` int(3) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `Registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(200) DEFAULT NULL,
  `space_occupied` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`ID`, `Name`, `Password`, `Email`, `Registration_date`, `image`, `space_occupied`) VALUES
(21, 'gabriele', '444bcb3a3fcf8389296c49467f27e1d6', 'gafire@hotmail.it', '2016-05-14 19:54:51', '43841-vlcsnap-2015-03-22-13h37m32s207.png', 13903042),
(23, 'ok', '444bcb3a3fcf8389296c49467f27e1d6', 'gabriele-martino@libero.it', '2016-05-14 19:57:50', NULL, 0),
(24, 'davide', '6e6bc4e49dd477ebc98ef4046c067b5f', 'davidedb@unito.it', '2016-05-15 20:12:19', NULL, 0),
(26, 'vichy', '6e6bc4e49dd477ebc98ef4046c067b5f', 'vichy@libero.it', '2016-05-15 22:41:06', NULL, 2908720),
(27, 'luca', '444bcb3a3fcf8389296c49467f27e1d6', 'luca@ok.it', '2016-05-16 08:57:43', NULL, 4945402),
(28, 'gabriele', '6e6bc4e49dd477ebc98ef4046c067b5f', 'ok@mmm.it', '2016-05-21 14:00:45', NULL, 0),
(29, 'rosa', '6e6bc4e49dd477ebc98ef4046c067b5f', 'rosa@hotmail.it', '2016-05-25 14:46:30', NULL, 0),
(32, 'enrico', '5b1b4dee9103f759fdb57197a78780a6', 'enrico@ciao.it', '2016-06-20 11:27:53', NULL, 0),
(33, 'as', '444bcb3a3fcf8389296c49467f27e1d6', 'as@ok.it', '2016-06-20 14:52:33', NULL, 0),
(34, 'ciao', '6e6bc4e49dd477ebc98ef4046c067b5f', 'ciao@ok.it', '2016-06-20 14:54:56', NULL, 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`IDuser`,`IDcontact`),
  ADD UNIQUE KEY `IDuser` (`IDuser`,`IDcontact`),
  ADD KEY `IDcontact` (`IDcontact`);

--
-- Indici per le tabelle `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`,`IDuser`),
  ADD KEY `IDuser` (`IDuser`);

--
-- Indici per le tabelle `notifies`
--
ALTER TABLE `notifies`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Who` (`Who`,`Type`,`Forwho`),
  ADD KEY `not` (`Who`,`Type`,`Forwho`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);
ALTER TABLE `user` ADD FULLTEXT KEY `Email_2` (`Email`);
ALTER TABLE `user` ADD FULLTEXT KEY `Name` (`Name`);
ALTER TABLE `user` ADD FULLTEXT KEY `Name_2` (`Name`);
ALTER TABLE `user` ADD FULLTEXT KEY `Email_3` (`Email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `contacts`
--
ALTER TABLE `contacts`
  MODIFY `IDuser` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT per la tabella `file`
--
ALTER TABLE `file`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT per la tabella `notifies`
--
ALTER TABLE `notifies`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`IDuser`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contacts_ibfk_2` FOREIGN KEY (`IDcontact`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`IDuser`) REFERENCES `user` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
