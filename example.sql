-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Már 06. 13:54
-- Kiszolgáló verziója: 10.4.8-MariaDB
-- PHP verzió: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `example`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `activity`
--

INSERT INTO `activity` (`id`, `name`) VALUES
(1, 'cooking'),
(2, 'gardening'),
(3, 'shopping');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `date`
--

CREATE TABLE `date` (
  `id` int(11) NOT NULL,
  `start_date` int(11) NOT NULL,
  `end_date` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `activity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `date`
--

INSERT INTO `date` (`id`, `start_date`, `end_date`, `title`, `description`, `activity_id`) VALUES
(6, 1583275380, 1583275380, 'asda', 'asd', 1),
(7, 1583276280, 1583276280, 'weqeq', 'dqwd', 2),
(8, 1583276340, 1583276340, 'qwe', 'qwewq', 3),
(9, 1583327100, 1583327100, 'qweqwe', 'qwe', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `intro` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `intro`) VALUES
(31, 'aaaaaaaaarrr', 'llacczyqwe', 'wrefwefd@fgfhj.dfg', 'aa7d36132d7d93004719a74e4f389f93be4b40ff', 'qwe'),
(33, 'qweqwe', 'qweqwe', 'wrefwefd@fgfhj.dfg', 'f4542db9ba30f7958ae42c113dd87ad21fb2eddb', 'qweqwe'),
(34, 'qweqwe', 'qweq', 'wrefwefd@fgfhj.dfg', '056eafe7cf52220de2df36845b8ed170c67e23e3', 'qweqwe'),
(35, 'qweqwe', 'qweqweee', 'wrefwefd@fgfhj.dfg', '386f47c570256177ea1461493414e3f346b165f8', 'eqwe'),
(36, 'asdas', 'testuserasdasd', 'wrefwefd@fgfhj.dfg', '930a0029225aa4c28b8ef095b679285eaae27078', 'asdasd'),
(37, 'asdasdasdd', 'testuserasds', 'wrefwefd@fgfhj.dfg', '85136c79cbf9fe36bb9d05d0639c70c265c18d37', 'asd');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_id` (`activity_id`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `date`
--
ALTER TABLE `date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `date`
--
ALTER TABLE `date`
  ADD CONSTRAINT `date_ibfk_1` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
