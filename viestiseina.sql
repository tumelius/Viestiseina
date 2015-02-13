-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Palvelin: 127.0.0.1
-- Luontiaika: 01.12.2014 klo 07:27
-- Palvelimen versio: 5.5.32
-- PHP:n versio: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Tietokanta: `viestiseina`
--
CREATE DATABASE IF NOT EXISTS `viestiseina` DEFAULT CHARACTER SET utf8 COLLATE utf8_swedish_ci;
USE `viestiseina`;

-- --------------------------------------------------------

--
-- Rakenne taululle `viestit`
--

CREATE TABLE IF NOT EXISTS `viestit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `viesti` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `aika` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nimi` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `ok` tinyint(3) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci COMMENT='Sisältää viestiseinän viestit' AUTO_INCREMENT=7 ;

--
-- Vedos taulusta `viestit`
--

INSERT INTO `viestit` (`id`, `viesti`, `aika`, `nimi`, `ok`) VALUES
(1, 'Moi', '2014-11-28 10:01:13', 'Tuomas', 1),
(2, 'Hei', '2014-11-28 08:50:00', 'Sampo', 0),
(3, 'Hei kaikki! Taas...', '2014-11-28 10:01:18', 'Jaakkokulta', 1),
(4, 'Heti kotiin sieltÃ¤!!!', '2014-11-28 09:18:53', 'Ã„iti', 0),
(5, 'Äääää ei saa läikyttää ööliä.', '2014-11-28 09:20:54', 'Isoäiti', 0),
(6, 'Äääää ei saa läikyttää ööliä.', '2014-11-28 09:23:17', 'Isoäiti', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE USER 'viestiUser'@'localhost' IDENTIFIED BY '***';GRANT USAGE ON *.* TO 'viestiUser'@'localhost' IDENTIFIED BY 'qwerty' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;GRANT ALL PRIVILEGES ON `viestiseina`.* TO 'viestiUser'@'localhost';