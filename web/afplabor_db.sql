-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2019. Okt 05. 11:26
-- Kiszolgáló verziója: 10.3.16-MariaDB
-- PHP verzió: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `afplabor`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` int(11) NOT NULL,
  `felhasznalonev` varchar(250) NOT NULL,
  `jelszo` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `reg_datum` datetime DEFAULT current_timestamp(),
  `jogosultsag` enum('felhasznalo','admin') NOT NULL DEFAULT 'felhasznalo',
  `last_login` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `felhasznalonev`, `jelszo`, `email`, `reg_datum`, `jogosultsag`, `last_login`) VALUES
(1, 'root', '$2y$10$fDjEw6XEGu8G2hseKcXaWuulEJxwHxaRbkd1u.UNnDPMJ6fLE8LLa', 'root@root.hu', '2019-09-17 10:57:50', 'admin', '2019-09-23 11:09:55'),
(2, 'demo', '$2y$10$XcloZTeqPeznWjwxen1gruNkSoyOLNG3apNfyKy25dCt7.yG1PwQi', 'demo@demo.hu', '2019-09-18 11:31:05', 'felhasznalo', '2019-09-23 11:09:05');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jelszo_helyreallitas`
--

CREATE TABLE `jelszo_helyreallitas` (
  `email` varchar(250) NOT NULL,
  `kulcs` varchar(250) NOT NULL,
  `lejar_datum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `jelszo_helyreallitas`
--

INSERT INTO `jelszo_helyreallitas` (`email`, `kulcs`, `lejar_datum`) VALUES
('root@root.hu', '715d91778d743b59134e3cab3b0ffb1d', '2019-10-05 11:20:28'),
('root@root.hu', 'a474ed3b8f3e80d8a69dec714fb90e72', '2019-10-05 11:20:28');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `felhasznalonev` (`felhasznalonev`),
  ADD UNIQUE KEY `email` (`email`);

--
-- A tábla indexei `jelszo_helyreallitas`
--
ALTER TABLE `jelszo_helyreallitas`
  ADD UNIQUE KEY `kulcs` (`kulcs`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
