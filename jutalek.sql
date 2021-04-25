-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2019. Sze 01. 09:58
-- Kiszolgáló verziója: 10.4.6-MariaDB
-- PHP verzió: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `jutalek`
--
CREATE DATABASE IF NOT EXISTS `jutalek` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `jutalek`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jogcimek`
--

CREATE TABLE `jogcimek` (
  `ID_jogcim` int(11) NOT NULL,
  `jogcim` varchar(20) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `jogcimek`
--

INSERT INTO `jogcimek` (`ID_jogcim`, `jogcim`) VALUES
(2, 'Budakalász Zrt.'),
(6, 'Mátrakincse Kft.'),
(1, 'Gyöngyös patak Nyrt.'),
(7, 'Italház Kft.'),
(8, 'Rest Elek e.v.'),
(4, 'Sandorini Kft.'),
(5, 'Öntözés Kft.'),
(3, 'Fuvaros Bt.');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jutalekok`
--

CREATE TABLE `jutalekok` (
  `ID_jutalek` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `datum` date NOT NULL,
  `ID_jogcim` int(11) NOT NULL,
  `visszairas` int(11) NOT NULL,
  `jutalek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `jutalekok`
--

INSERT INTO `jutalekok` (`ID_jutalek`, `ID_user`, `datum`, `ID_jogcim`, `visszairas`, `jutalek`) VALUES
(1, 1, '2019-08-10', 7, 0, 8000),
(2, 1, '2019-08-12', 2, 0, 15000),
(3, 1, '2019-08-12', 3, 0, 2000),
(4, 1, '2019-08-12', 4, 0, 8000),
(5, 1, '2019-08-12', 5, 0, 10000),
(6, 1, '2019-08-12', 6, 0, 20000),
(7, 1, '2019-08-12', 8, 0, 20000),
(8, 1, '2019-08-13', 6, 0, 2000),
(9, 1, '2019-08-17', 8, 0, 7000),
(10, 1, '2019-08-13', 6, 0, 2000),
(11, 1, '2019-08-14', 6, 0, 2000),
(12, 1, '2019-08-15', 6, 0, 2000),
(13, 1, '2019-08-16', 6, 0, 2000),
(14, 1, '2019-08-16', 7, 0, 3500),
(15, 1, '2019-08-17', 6, 3000, 0),
(16, 1, '2019-08-17', 8, 0, 1000),
(17, 1, '2019-08-18', 6, 0, 2700),
(18, 1, '2019-08-19', 6, 0, 2000),
(19, 1, '2019-08-20', 6, 0, 2000),
(20, 1, '2019-08-21', 6, 0, 2000),
(21, 1, '2019-08-22', 6, 0, 2000),
(22, 1, '2019-08-23', 6, 0, 2000),
(23, 1, '2019-08-23', 7, 0, 2500),
(24, 1, '2019-08-24', 8, 0, 20000),
(25, 1, '2019-08-25', 6, 0, 1500),
(26, 1, '2019-08-26', 6, 0, 2000),
(27, 1, '2019-08-27', 6, 0, 2000),
(28, 1, '2019-08-28', 6, 0, 2000),
(29, 1, '2019-08-29', 6, 0, 2000),
(30, 1, '2019-08-30', 6, 0, 2000),
(31, 1, '2019-08-30', 7, 0, 1000),
(32, 1, '2019-08-31', 8, 0, 25000),
(33, 1, '2019-09-02', 6, 0, 2000),
(34, 1, '2019-09-02', 6, 0, 2000),
(35, 1, '2019-09-03', 6, 0, 2000),
(36, 1, '2019-09-04', 6, 0, 2000),
(37, 1, '2019-09-05', 6, 0, 2000),
(38, 1, '2019-09-06', 6, 0, 2000),
(39, 1, '2019-09-06', 7, 0, 3000),
(40, 1, '2019-09-07', 8, 0, 10000),
(41, 1, '2019-09-08', 2, 0, 1500),
(42, 1, '2019-09-09', 6, 0, 1500),
(43, 1, '2019-09-10', 1, 0, 250000),
(44, 1, '2019-09-10', 8, 0, 20000),
(45, 1, '2019-09-11', 2, 0, 12000),
(46, 1, '2019-09-11', 3, 0, 7000),
(47, 1, '2019-09-11', 4, 0, 9000),
(48, 1, '2019-09-11', 5, 0, 8500),
(49, 1, '2019-09-12', 6, 0, 2000),
(50, 1, '2019-09-13', 6, 0, 2000),
(51, 1, '2019-09-13', 8, 0, 20000),
(52, 1, '2019-09-16', 6, 0, 2000),
(53, 1, '2019-09-17', 6, 0, 2000),
(54, 1, '2019-09-17', 7, 0, 4000),
(55, 1, '2019-09-18', 6, 0, 2000),
(56, 1, '2019-09-19', 6, 0, 2000);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `ID_user` int(11) NOT NULL,
  `Nev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `Jelszo` varchar(40) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`ID_user`, `Nev`, `Jelszo`) VALUES
(1, 'Áron', '123456');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `jogcimek`
--
ALTER TABLE `jogcimek`
  ADD PRIMARY KEY (`ID_jogcim`),
  ADD UNIQUE KEY `jogcim` (`jogcim`);

--
-- A tábla indexei `jutalekok`
--
ALTER TABLE `jutalekok`
  ADD PRIMARY KEY (`ID_jutalek`),
  ADD KEY `user` (`ID_user`),
  ADD KEY `datum` (`datum`),
  ADD KEY `jogcim` (`ID_jogcim`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_user`),
  ADD UNIQUE KEY `name` (`Nev`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `jogcimek`
--
ALTER TABLE `jogcimek`
  MODIFY `ID_jogcim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT a táblához `jutalekok`
--
ALTER TABLE `jutalekok`
  MODIFY `ID_jutalek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `jutalekok`
--
ALTER TABLE `jutalekok`
  ADD CONSTRAINT `jutalekok_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jutalekok_ibfk_2` FOREIGN KEY (`ID_jogcim`) REFERENCES `jogcimek` (`ID_jogcim`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
