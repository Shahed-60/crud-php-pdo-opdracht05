-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 04 mrt 2023 om 16:09
-- Serverversie: 5.7.36
-- PHP-versie: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Basicfit`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Inschrijving`
--

DROP TABLE IF EXISTS `Inschrijving`;
CREATE TABLE IF NOT EXISTS `Inschrijving` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Homeclub` varchar(200) NOT NULL,
  `Lidmaatschap` varchar(200) NOT NULL,
  `Looptijd` varchar(100) NOT NULL,
  `Extra` varchar(200) NOT NULL,
  `Email` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Inschrijving`
--

INSERT INTO `Inschrijving` (`Id`, `Homeclub`, `Lidmaatschap`, `Looptijd`, `Extra`, `Email`) VALUES
(1, '5', 'Comfort', 'on', '', '335476@student.mboutrecht.nl'),
(2, '5', 'Comfort', 'on', '', '335476@student.mboutrecht.nl'),
(3, '1', 'Comfort', 'on', '', '335476@student.mboutrecht.nl'),
(4, '6', 'Premium', 'on', 'on', '335476@student.mboutrecht.nl'),
(5, '2', 'All in', 'on', 'on', '335476@student.mboutrecht.nl'),
(6, '4', 'All in', 'on', 'on', '335476@student.mboutrecht.nl');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
