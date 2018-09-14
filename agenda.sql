-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 12 sep 2018 om 16:34
-- Serverversie: 10.1.23-MariaDB-9+deb9u1
-- PHP-versie: 7.0.30-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agenda`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Agenda`
--

CREATE TABLE `Agenda` (
  `id` int(11) NOT NULL,
  `lokaalId` int(11) DEFAULT NULL,
  `startTijd` timestamp NULL DEFAULT NULL,
  `eindTijd` timestamp NULL DEFAULT NULL,
  `gebruik` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Agenda`
--

INSERT INTO `Agenda` (`id`, `lokaalId`, `startTijd`, `eindTijd`, `gebruik`) VALUES
(52, 1, '2018-09-11 22:32:00', '2018-09-12 11:21:00', 'Schoonmaak'),
(53, 1, '2018-09-11 22:33:00', '2018-09-12 11:33:00', 'Schoonmaak'),
(54, 1, '2018-09-12 13:00:00', '2018-09-12 14:00:00', NULL),
(55, 1, '2018-09-12 10:31:00', '2018-09-12 10:31:00', 'Schoonmaak'),
(57, 1, '2018-09-11 23:12:00', '2018-09-11 23:31:00', 'Schoonmaak'),
(59, 1, '2018-09-12 13:15:00', '2018-09-12 13:15:00', 'Schoonmaak'),
(60, 1, '2018-09-12 14:16:00', '2018-09-12 16:00:00', 'Schoonmaak');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `locatie`
--

CREATE TABLE `locatie` (
  `lokaalId` int(11) NOT NULL,
  `lokaalNaam` char(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `locatie`
--

INSERT INTO `locatie` (`lokaalId`, `lokaalNaam`) VALUES
(1, 'Ruimte 1'),
(2, 'Ruimte 2'),
(3, 'Ruimte 3');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Agenda`
--
ALTER TABLE `Agenda`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `startTijd` (`startTijd`),
  ADD UNIQUE KEY `eindTijd` (`eindTijd`),
  ADD KEY `lokaalId` (`lokaalId`);

--
-- Indexen voor tabel `locatie`
--
ALTER TABLE `locatie`
  ADD PRIMARY KEY (`lokaalId`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `Agenda`
--
ALTER TABLE `Agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT voor een tabel `locatie`
--
ALTER TABLE `locatie`
  MODIFY `lokaalId` int(11) NOT NULL AUTO_INCREMENT;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `Agenda`
--
ALTER TABLE `Agenda`
  ADD CONSTRAINT `Agenda_ibfk_1` FOREIGN KEY (`lokaalId`) REFERENCES `locatie` (`lokaalID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
