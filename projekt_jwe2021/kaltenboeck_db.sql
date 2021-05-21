-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 21. Mai 2021 um 21:24
-- Server-Version: 10.4.17-MariaDB
-- PHP-Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `kaltenboeck_db`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `gaesteliste`
--

CREATE TABLE `gaesteliste` (
  `id` int(11) NOT NULL,
  `vorname` varchar(190) COLLATE utf8_unicode_ci NOT NULL,
  `nachname` varchar(190) COLLATE utf8_unicode_ci NOT NULL,
  `restaurant` varchar(190) COLLATE utf8_unicode_ci NOT NULL,
  `anzahl_erwachsene` int(190) NOT NULL,
  `anzahl_kinder` int(190) NOT NULL,
  `zeit_lokal_betreten` time(6) NOT NULL,
  `zeit_lokal_verlassen` time(6) NOT NULL,
  `datum` date NOT NULL,
  `mail` varchar(190) COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `gaesteliste`
--

INSERT INTO `gaesteliste` (`id`, `vorname`, `nachname`, `restaurant`, `anzahl_erwachsene`, `anzahl_kinder`, `zeit_lokal_betreten`, `zeit_lokal_verlassen`, `datum`, `mail`, `userid`) VALUES
(96, 'Roland', 'Kaltenböck', 'GoldeneRose', 1, 0, '15:39:00.000000', '17:39:00.000000', '2021-05-17', 'roland.kaltenboeck@gmx.at', 1),
(97, 'Roland', 'Kaltenböck', 'GoldeneRose', 1, 5, '15:53:00.000000', '21:53:00.000000', '2021-05-18', 'roland.kaltenboeck@gmx.at', 1),
(98, 'Roland', 'Kaltenböck', 'GoldeneRose', 1, 0, '12:53:00.000000', '17:53:00.000000', '2021-05-19', 'roland.kaltenboeck@gmx.at', 1),
(99, 'Roland', 'Kaltenböck', 'Fenster zum Hof', 1, 0, '20:08:00.000000', '00:09:00.000000', '2021-05-19', 'roland.kaltenboeck@gmx.at', 1),
(100, 'Roland', 'Kaltenböck', 'Manuel´s Gaming Restaurant', 1, 5, '12:53:00.000000', '15:53:00.000000', '2021-05-20', 'roland.kaltenboeck@gmx.at', 1),
(111, 'Roland', 'Kaltenböck', 'GoldeneRose', 2, 0, '19:34:00.000000', '20:34:00.000000', '2021-05-20', 'roland.kaltenboeck@gmx.at', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `titel` varchar(190) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `restaurant`
--

INSERT INTO `restaurant` (`id`, `titel`) VALUES
(1, 'GoldeneRose'),
(2, 'Fenster zum Hof'),
(3, 'Manuel´s Gaming Restaurant');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `restaurantbesitzer`
--

CREATE TABLE `restaurantbesitzer` (
  `id_restaurant` int(11) NOT NULL,
  `id_besitzer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `restaurantbesitzer`
--

INSERT INTO `restaurantbesitzer` (`id_restaurant`, `id_besitzer`) VALUES
(1, 0),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` enum('user','admin') COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(190) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(190) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(190) COLLATE utf8_unicode_ci NOT NULL,
  `nachname` varchar(190) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(190) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `password`, `name`, `nachname`, `mail`) VALUES
(0, 'admin', 'Hildegard', 'ba9c2d245cf02bafed8faf274ed125be', 'Goldene Rose', 'Brot', 'hildegard.brot@gmx.at'),
(1, 'user', 'Roland', 'ee21d5f27a8401788147f6f6184ddb11', 'Roland', 'Kaltenböck', 'roland.kaltenboeck@gmx.at'),
(2, 'admin', 'Alfred', '01a9a73da72226fc32fe1ce5c899b46d', 'Das Fenster zum Hof', 'Hitchcock', 'a.hitchcock@gmail.com'),
(3, 'admin', 'Manuel', '96917805fd060e3766a9a1b834639d35', 'Manuel´s Gaming Restaurant', 'Pfister', 'manuel@pfister.com');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `gaesteliste`
--
ALTER TABLE `gaesteliste`
  ADD PRIMARY KEY (`id`,`restaurant`,`datum`) USING BTREE,
  ADD KEY `user_gast` (`userid`);

--
-- Indizes für die Tabelle `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `restaurantbesitzer`
--
ALTER TABLE `restaurantbesitzer`
  ADD PRIMARY KEY (`id_restaurant`,`id_besitzer`),
  ADD KEY `user_besitzer` (`id_besitzer`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `gaesteliste`
--
ALTER TABLE `gaesteliste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT für Tabelle `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `gaesteliste`
--
ALTER TABLE `gaesteliste`
  ADD CONSTRAINT `user_gast` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints der Tabelle `restaurantbesitzer`
--
ALTER TABLE `restaurantbesitzer`
  ADD CONSTRAINT `restaurantbesitzer_ibfk_1` FOREIGN KEY (`id_restaurant`) REFERENCES `restaurant` (`id`),
  ADD CONSTRAINT `user_besitzer` FOREIGN KEY (`id_besitzer`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
