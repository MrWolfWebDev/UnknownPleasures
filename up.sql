-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generato il: Nov 13, 2013 alle 15:34
-- Versione del server: 5.6.11
-- Versione PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `up`
--
CREATE DATABASE IF NOT EXISTS `up` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `up`;

-- --------------------------------------------------------

--
-- Struttura della tabella `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `User` varchar(30) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `DataIns` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `admin`
--

INSERT INTO `admin` (`ID`, `User`, `Password`, `DataIns`) VALUES
(1, 'makaio', '6e2371c90dff1eb2df647cc816d88e3b35cc6928', '2013-11-05');

-- --------------------------------------------------------

--
-- Struttura della tabella `brani`
--

CREATE TABLE IF NOT EXISTS `brani` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Titolo` varchar(200) NOT NULL,
  `Artista` varchar(200) NOT NULL,
  `Album` varchar(200) NOT NULL,
  `Genere` varchar(200) NOT NULL,
  `Anno` varchar(200) NOT NULL,
  `ITunes` varchar(200) NOT NULL,
  `Pdf` varchar(200) NOT NULL,
  `DataIns` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dump dei dati per la tabella `brani`
--

INSERT INTO `brani` (`ID`, `Titolo`, `Artista`, `Album`, `Genere`, `Anno`, `ITunes`, `Pdf`, `DataIns`) VALUES
(1, 'prova', 'Vanprova', 'Deprova', 'prova', '1234', 'www.ituns.com/prova', '../pdf/f65pn.pdf', '2013-11-13');

-- --------------------------------------------------------

--
-- Struttura della tabella `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Data` date NOT NULL,
  `Titolo` varchar(200) NOT NULL,
  `Testo` text NOT NULL,
  `Foto` varchar(200) NOT NULL,
  `DataIns` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dump dei dati per la tabella `news`
--

INSERT INTO `news` (`ID`, `Data`, `Titolo`, `Testo`, `Foto`, `DataIns`) VALUES
(7, '2013-11-01', 'Test inserimento', 'no foto', '../images/cover/9uqzm2.jpg', '2013-11-11'),
(8, '2013-11-01', 'Test con foto', 'blabbo', '../images/cover/72.jpg', '2013-11-12'),
(9, '2013-11-01', 'Funziona!!!!', 'blabbo2', '../images/cover/82.jpg', '2013-11-12'),
(10, '2013-11-01', 'Final test', 'srght yu57u6yhtg', '../images/cover/crqmm2.jpg', '2013-11-13');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
