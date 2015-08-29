-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2015 at 12:56 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vijecemladih`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE IF NOT EXISTS `komentari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `novost` int(11) NOT NULL,
  `datumobjave` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `autor` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` varchar(500) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`id`, `novost`, `datumobjave`, `autor`, `email`, `tekst`) VALUES
(1, 1, '2015-05-21 10:33:21', 'Faros', 'fare@etf.ba', 'sarajevo'),
(2, 1, '2015-05-21 10:33:21', 'Ajdin', 'ajdin@etf.ba', 'Drugi komentar sarajevo'),
(3, 1, '2015-05-21 11:20:03', 'bhkj', 'nj', 'INSERT into komentari SET novost = :idNovosti, autor = :autor, email = :email, tekst = :tekst;'),
(4, 1, '2015-05-21 11:20:42', 'bhkj', 'nj', 'njkl'),
(5, 1, '2015-05-21 11:21:55', 'f', '', 'dvs'),
(6, 1, '2015-05-21 11:23:43', 'f', '', 'dvs');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `ime` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `prezime` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `username`, `password`, `ime`, `prezime`, `email`) VALUES
(1, 'aida', 'd0aeeef9a9aeddbaa999b7b65101b3a1', 'Aida', 'Hasović', 'ahasovic1@etf.unsa.ba');

-- --------------------------------------------------------

--
-- Table structure for table `novosti`
--

CREATE TABLE IF NOT EXISTS `novosti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `autor` int(11) NOT NULL,
  `naslov` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `datumobjave` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `slika` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` varchar(1000) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `novosti`
--

INSERT INTO `novosti` (`id`, `autor`, `naslov`, `datumobjave`, `slika`, `tekst`) VALUES
(1, 1, 'Nova obavijest', '2015-05-21 09:32:36', 'http://unsa.ba/s/templates/unsa/slike/top_1.jpg', 'Nova obavijest je nova obavijest. Nova obavijest je nova obavijest. Nova obavijest je nova obavijest. Nova obavijest je nova obavijest. Nova obavijest je nova obavijest. Nova obavijest je nova obavijest. '),
(2, 1, 'Druga obavijest', '2015-05-21 09:32:36', 'http://unsa.ba/s/templates/unsa/slike/top_1.jpg', 'Druga obavijest je nova obavijest. Nova obavijest je nova obavijest. Nova obavijest je nova obavijest. Nova obavijest je nova obavijest. Nova obavijest je nova obavijest. Nova obavijest je nova obavijest. '),
(5, 1, 'Normalan naslov', '2015-05-28 12:56:06', '', 'Normalan tekst');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
