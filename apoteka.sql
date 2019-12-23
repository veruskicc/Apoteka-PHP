-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 29, 2019 at 11:06 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apoteka`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

DROP TABLE IF EXISTS `korisnici`;
CREATE TABLE IF NOT EXISTS `korisnici` (
  `Email` varchar(255) NOT NULL,
  `Ime` varchar(255) NOT NULL,
  `Prezime` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`Email`, `Ime`, `Prezime`, `Password`) VALUES
('dejanski92@gmail.com', 'Radivoj', 'Dejanovic', '123654789'),
('milic@gmail.com', 'Milica', 'Milic', '98765432'),
('stefanl996@gmail.com', 'Stefan', 'Lazic', '87654321'),
('veradejanovic24@gmail.com', 'Vera', 'Dejanovic', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `kupovina`
--

DROP TABLE IF EXISTS `kupovina`;
CREATE TABLE IF NOT EXISTS `kupovina` (
  `Korisnik` varchar(255) NOT NULL,
  `SifraLeka` varchar(255) NOT NULL,
  PRIMARY KEY (`Korisnik`,`SifraLeka`),
  KEY `Korisnik` (`Korisnik`,`SifraLeka`),
  KEY `SifraLeka` (`SifraLeka`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kupovina`
--

INSERT INTO `kupovina` (`Korisnik`, `SifraLeka`) VALUES
('veradejanovic24@gmail.com', 'AB2'),
('veradejanovic24@gmail.com', 'AF1'),
('stefanl996@gmail.com', 'AN1'),
('veradejanovic24@gmail.com', 'AN1'),
('veradejanovic24@gmail.com', 'AN2'),
('veradejanovic24@gmail.com', 'AN3'),
('veradejanovic24@gmail.com', 'AT1');

-- --------------------------------------------------------

--
-- Table structure for table `lekovi`
--

DROP TABLE IF EXISTS `lekovi`;
CREATE TABLE IF NOT EXISTS `lekovi` (
  `Sifra` varchar(255) NOT NULL,
  `Naziv` varchar(255) NOT NULL,
  `Cena` int(20) NOT NULL,
  `SifraVrste` int(11) NOT NULL,
  PRIMARY KEY (`Sifra`),
  KEY `SifraVrste` (`SifraVrste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lekovi`
--

INSERT INTO `lekovi` (`Sifra`, `Naziv`, `Cena`, `SifraVrste`) VALUES
('AB1', 'Dovicin 100mg film tableta', 140, 92),
('AB2', 'Orvagil 400mg film tableta', 330, 92),
('AB3', 'Panklav 875mg+125mg tegla tableta', 450, 92),
('AB4', 'Palitrex 500mg film kapsula', 325, 92),
('AF1', 'Fluconal 150mg film tableta', 250, 12),
('AF2', 'Daktanol 2% krem', 280, 12),
('AF3', 'Canesten 1% krem', 320, 12),
('AH1', 'Dramina 50mg film tableta', 150, 52),
('AH2', 'Pressing 10mg film tableta', 210, 52),
('AH3', 'Galitifen 1mg/5ml sirup', 200, 52),
('AI1', 'Diklofenak HF 50mg film tableta', 85, 32),
('AI2', 'Brufen 400mg film tableta', 270, 32),
('AI3', 'Rapten-K 500mg film tableta', 65, 32),
('AN1', 'Andol 300mg film tableta', 210, 22),
('AN2', 'Aspirin 500mg film tableta', 350, 22),
('AN3', 'Febricet 500mg film tableta', 320, 22),
('AN4', 'Panadol 500mg film tableta', 350, 22),
('AT1', 'Gastal 450mg+300mg film tableta', 400, 62),
('AT2', 'Rupurut 500mg film tableta', 370, 62),
('K1', ' Prednizon 5mg film tableta', 150, 82),
('K2', 'Hydrocortison 2.5% mast', 130, 82),
('OK1', 'Yaz 3mg+0.02mg film tableta', 800, 42),
('OK2', 'Logest 75mcg+20mcg film tableta', 1100, 42),
('OK3', 'Yasmin 3mg+0.03mg film tableta', 950, 42),
('V1', 'Vitawill Vitamin C 1000mg sumece tablete', 1425, 72),
('V2', 'Calivita Full Spectrum Multivitamin tegla tableta', 1550, 72),
('V3', 'Now E 200 tegla kapsula', 1700, 72);

-- --------------------------------------------------------

--
-- Table structure for table `recenzije`
--

DROP TABLE IF EXISTS `recenzije`;
CREATE TABLE IF NOT EXISTS `recenzije` (
  `Sifra` int(11) NOT NULL AUTO_INCREMENT,
  `Korisnik` varchar(255) NOT NULL,
  `Komentar` varchar(1000) NOT NULL,
  PRIMARY KEY (`Sifra`),
  KEY `UsernameKorisnika` (`Korisnik`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `slike_lekova`
--

DROP TABLE IF EXISTS `slike_lekova`;
CREATE TABLE IF NOT EXISTS `slike_lekova` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Path` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slike_lekova`
--

INSERT INTO `slike_lekova` (`ID`, `Path`) VALUES
(3, 'slike/_3607462-large.jpg'),
(4, 'slike/_Febircet-tablete.jpg'),
(5, 'slike/_pressing-tablete-95.png'),
(6, 'slike/_andol-300-500x500.jpg'),
(7, 'slike/_DSC_0570.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vrste_lekova`
--

DROP TABLE IF EXISTS `vrste_lekova`;
CREATE TABLE IF NOT EXISTS `vrste_lekova` (
  `Sifra` int(11) NOT NULL,
  `Vrsta` varchar(255) NOT NULL,
  PRIMARY KEY (`Sifra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vrste_lekova`
--

INSERT INTO `vrste_lekova` (`Sifra`, `Vrsta`) VALUES
(12, 'Antifungalni'),
(22, 'Analgetik'),
(32, 'Antiinflamatorni'),
(42, 'Oralni kontraceptiv'),
(52, 'Antihistaminik'),
(62, 'Antacid'),
(72, 'Vitamin'),
(82, 'Kortikosteroid'),
(92, 'Antibiotik');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kupovina`
--
ALTER TABLE `kupovina`
  ADD CONSTRAINT `kupovina_ibfk_2` FOREIGN KEY (`SifraLeka`) REFERENCES `lekovi` (`Sifra`),
  ADD CONSTRAINT `kupovina_ibfk_3` FOREIGN KEY (`Korisnik`) REFERENCES `korisnici` (`Email`);

--
-- Constraints for table `lekovi`
--
ALTER TABLE `lekovi`
  ADD CONSTRAINT `lekovi_ibfk_1` FOREIGN KEY (`SifraVrste`) REFERENCES `vrste_lekova` (`Sifra`);

--
-- Constraints for table `recenzije`
--
ALTER TABLE `recenzije`
  ADD CONSTRAINT `recenzije_ibfk_1` FOREIGN KEY (`Korisnik`) REFERENCES `korisnici` (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
