-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 18 Sty 2021, 14:09
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bazadanych`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dokumenty`
--

CREATE TABLE `dokumenty` (
  `ID` int(11) NOT NULL,
  `IdentyfikatorDokumentu` varchar(255) NOT NULL,
  `DataDokumentu` date NOT NULL,
  `Nadawca` varchar(255) NOT NULL,
  `Adresat` varchar(255) NOT NULL,
  `Notatki` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `fakturysprzedazy`
--

CREATE TABLE `fakturysprzedazy` (
  `ID` int(11) NOT NULL,
  `NumerFaktury` varchar(255) NOT NULL,
  `DaneKontrahenta` varchar(255) NOT NULL,
  `KwotaNetto` int(11) NOT NULL,
  `KwotaPodatkuVAT` int(11) NOT NULL,
  `KwotaBrutto` int(11) NOT NULL,
  `DataSprzedazy` date NOT NULL,
  `KwotaNettoWWalucie` float NOT NULL,
  `Waluta` varchar(255) NOT NULL,
  `URL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `fakturyzakupu`
--

CREATE TABLE `fakturyzakupu` (
  `ID` int(11) NOT NULL,
  `IdentyfikatorFaktury` varchar(255) NOT NULL,
  `NumerFaktury` varchar(255) NOT NULL,
  `DaneKontrahenta` varchar(255) NOT NULL,
  `KwotaNetto` int(11) NOT NULL,
  `KwotaPodatkuVAT` int(11) NOT NULL,
  `KwotaBrutto` int(11) NOT NULL,
  `DataZakupu` date NOT NULL,
  `KwotaNettoWWalucie` float NOT NULL,
  `Waluta` varchar(255) NOT NULL,
  `URL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `licencje`
--

CREATE TABLE `licencje` (
  `ID` int(11) NOT NULL,
  `NumerInwentarzowy` varchar(255) NOT NULL,
  `Nazwa` varchar(255) NOT NULL,
  `KluczSeryjny` varchar(255) NOT NULL,
  `DataZakupu` date NOT NULL,
  `NumerFaktury` varchar(255) NOT NULL,
  `WsparcieTechniczneDo` date NOT NULL,
  `LicencjaWaznaDo` date NOT NULL,
  `NaCzyimStanie` varchar(255) NOT NULL,
  `Notatki` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sprzet`
--

CREATE TABLE `sprzet` (
  `ID` int(11) NOT NULL,
  `NumerInwentarzowy` varchar(255) NOT NULL,
  `Nazwa` varchar(255) NOT NULL,
  `NumerSeryjny` varchar(255) NOT NULL,
  `DataZakupu` date NOT NULL,
  `NumerFaktury` varchar(255) NOT NULL,
  `GwarancjaDo` varchar(255) NOT NULL,
  `WartoscNetto` int(11) NOT NULL,
  `NaCzyimStanie` varchar(255) NOT NULL,
  `Notatki` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(256) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dokumenty`
--
ALTER TABLE `dokumenty`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `fakturysprzedazy`
--
ALTER TABLE `fakturysprzedazy`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `fakturyzakupu`
--
ALTER TABLE `fakturyzakupu`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `licencje`
--
ALTER TABLE `licencje`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `sprzet`
--
ALTER TABLE `sprzet`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `dokumenty`
--
ALTER TABLE `dokumenty`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `fakturysprzedazy`
--
ALTER TABLE `fakturysprzedazy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `fakturyzakupu`
--
ALTER TABLE `fakturyzakupu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `licencje`
--
ALTER TABLE `licencje`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sprzet`
--
ALTER TABLE `sprzet`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
