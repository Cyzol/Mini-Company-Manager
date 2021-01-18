-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 18 Sty 2021, 18:12
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.10

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
  `Notatki` varchar(10000) NOT NULL,
  `URL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `dokumenty`
--

INSERT INTO `dokumenty` (`ID`, `IdentyfikatorDokumentu`, `DataDokumentu`, `Nadawca`, `Adresat`, `Notatki`, `URL`) VALUES
(1, '123', '2021-01-03', 'Karol', 'Konrad', 'Super dokumencik', './../uploads/Documents/Dokumentacja_App_Labo_2020.pdf'),
(2, '543', '2021-01-16', 'Kuba', 'Konrad', 'Super dokumencik2', './../uploads/Documents/Wykłady.pdf');

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

--
-- Zrzut danych tabeli `fakturysprzedazy`
--

INSERT INTO `fakturysprzedazy` (`ID`, `NumerFaktury`, `DaneKontrahenta`, `KwotaNetto`, `KwotaPodatkuVAT`, `KwotaBrutto`, `DataSprzedazy`, `KwotaNettoWWalucie`, `Waluta`, `URL`) VALUES
(1, '4324', 'konrad kopec', 123, 232, 433, '2021-01-02', 32, 'usd', './../uploads/SalesInvoice/Dokumentacja_App_Labo_2020.pdf'),
(2, '4343', 'Karol Cylwik', 232, 232, 433, '2021-01-02', 44, 'usd', './../uploads/SalesInvoice/Wykłady.pdf'),
(3, '5435', 'Jakub Ogryzek', 54, 32, 332, '2021-02-19', 5432, 'zloty', './../uploads/SalesInvoice/Wykłady.pdf'),
(4, '645645', 'Mama taty', 124, 543, 543, '2021-01-15', 54, 'zloty', './../uploads/SalesInvoice/Dokumentacja_App_Labo_2020.pdf');

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

--
-- Zrzut danych tabeli `fakturyzakupu`
--

INSERT INTO `fakturyzakupu` (`ID`, `IdentyfikatorFaktury`, `NumerFaktury`, `DaneKontrahenta`, `KwotaNetto`, `KwotaPodatkuVAT`, `KwotaBrutto`, `DataZakupu`, `KwotaNettoWWalucie`, `Waluta`, `URL`) VALUES
(1, '123', '4324', 'konrad kopec', 123, 234, 433, '2021-01-12', 122, 'usd', './../uploads/PurchaseInvoice/Dokumentacja_App_Labo_2020.pdf'),
(2, '434', '7676', 'Karol Cylwik', 124, 222, 655, '2021-01-02', 53, 'usd', './../uploads/PurchaseInvoice/Lab_12_Systemy programowych zapór sieciowych.pdf');

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

--
-- Zrzut danych tabeli `licencje`
--

INSERT INTO `licencje` (`ID`, `NumerInwentarzowy`, `Nazwa`, `KluczSeryjny`, `DataZakupu`, `NumerFaktury`, `WsparcieTechniczneDo`, `LicencjaWaznaDo`, `NaCzyimStanie`, `Notatki`) VALUES
(1, '432', 'Licencja Winrara', '1232-32', '2021-01-02', '1234', '2021-01-03', '2021-01-30', 'Karol Cylwik', 'Super winrar');

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

--
-- Zrzut danych tabeli `sprzet`
--

INSERT INTO `sprzet` (`ID`, `NumerInwentarzowy`, `Nazwa`, `NumerSeryjny`, `DataZakupu`, `NumerFaktury`, `GwarancjaDo`, `WartoscNetto`, `NaCzyimStanie`, `Notatki`) VALUES
(1, '4421', 'Klawiaturka', '4343-54', '2021-01-08', '342', '2021-01-08', 123, 'Konrad', 'Super klawiaturka'),
(2, '5454', 'Mikrofon', '432-21', '2021-01-02', '543', '2021-01-03', 522, 'Karol', 'Super majk');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `fakturysprzedazy`
--
ALTER TABLE `fakturysprzedazy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `fakturyzakupu`
--
ALTER TABLE `fakturyzakupu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `licencje`
--
ALTER TABLE `licencje`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `sprzet`
--
ALTER TABLE `sprzet`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
