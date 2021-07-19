-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Počítač: localhost:8889
-- Vytvořeno: Pon 19. čec 2021, 12:53
-- Verze serveru: 5.7.32
-- Verze PHP: 7.4.16

SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";
START TRANSACTION;
SET time_zone = \"+00:00\";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `adresarDemo`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `adresar`
--

CREATE TABLE `adresar` (
  `id` int(11) NOT NULL,
  `url` varchar(250) NOT NULL,
  `name` varchar(150) NOT NULL,
  `surname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `adresar`
--

INSERT INTO `adresar` (`id`, `url`, `name`, `surname`, `email`, `phone`, `note`) VALUES
(1, 'michal-pesat', 'Michal', 'Pešat', 'pesatmichal@seznam.cz', '608747877', 'poznámka řčáíéřášéěířčš'),
(2, 'url-adresa', 'Petr', 'Novák', 'petr.novak@obchodniuspech.cz', '608747877', ''),
(3, 'milan-skauk-pesat-otec', 'Milan Skauk', 'Pesat Otec', 'pesatmilan@gmail.com', '777888999', 'není to matka');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `adresar`
--
ALTER TABLE `adresar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `adresar`
--
ALTER TABLE `adresar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
