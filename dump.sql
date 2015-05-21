-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2015 at 01:25 PM
-- Server version: 5.5.43-0ubuntu0.14.10.1
-- PHP Version: 5.5.12-2ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
`id` int(11) NOT NULL,
  `novost` int(11) NOT NULL,
  `datumobjave` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `autor` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` varchar(500) COLLATE utf8_slovenian_ci NOT NULL
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
`id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `ime` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `prezime` varchar(20) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `username`, `password`, `ime`, `prezime`) VALUES
(1, 'aida', '5cce38a2f2c882a660f64c9d378aff82', 'Aida', 'Hasović');

-- --------------------------------------------------------

--
-- Table structure for table `novosti`
--

CREATE TABLE IF NOT EXISTS `novosti` (
`id` int(11) NOT NULL,
  `autor` int(11) NOT NULL,
  `naslov` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `datumobjave` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `slika` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` varchar(1000) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `novosti`
--

INSERT INTO `novosti` (`id`, `autor`, `naslov`, `datumobjave`, `slika`, `tekst`) VALUES
(1, 1, 'Nova obavijest', '2015-05-21 09:32:36', 'http://unsa.ba/s/templates/unsa/slike/top_1.jpg', 'Nova obavijest je nova obavijest. Nova obavijest je nova obavijest. Nova obavijest je nova obavijest. Nova obavijest je nova obavijest. Nova obavijest je nova obavijest. Nova obavijest je nova obavijest. '),
(2, 1, 'Druga obavijest', '2015-05-21 09:32:36', 'http://unsa.ba/s/templates/unsa/slike/top_1.jpg', 'Druga obavijest je nova obavijest. Nova obavijest je nova obavijest. Nova obavijest je nova obavijest. Nova obavijest je nova obavijest. Nova obavijest je nova obavijest. Nova obavijest je nova obavijest. ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentari`
--
ALTER TABLE `komentari`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `novosti`
--
ALTER TABLE `novosti`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentari`
--
ALTER TABLE `komentari`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `novosti`
--
ALTER TABLE `novosti`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
