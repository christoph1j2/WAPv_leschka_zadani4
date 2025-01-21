-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2025 at 08:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seznam_obci`
--

-- --------------------------------------------------------

--
-- Table structure for table `preklad`
--

CREATE TABLE `preklad` (
  `id` int(11) NOT NULL,
  `cs` varchar(100) NOT NULL,
  `en` varchar(100) NOT NULL,
  `de` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `preklad`
--

INSERT INTO `preklad` (`id`, `cs`, `en`, `de`) VALUES
(1, 'Registrační formulář', 'Registration form', 'Anmeldungsformular'),
(2, 'Uživatelské jméno:', 'Username:', 'Nutzername:'),
(3, 'Křestní jméno:', 'First name:', 'Vorname:'),
(4, 'Příjmení:', 'Last name:', 'Nachname:'),
(5, 'Heslo:', 'Password:', 'Passwort:'),
(6, 'Potvrdit heslo:', 'Confirm password:', 'Passwort bestätigen:'),
(7, 'Adresa', 'Address', 'Adresse'),
(8, 'Kraj:', 'Region:', 'Bezirk:'),
(9, 'Okres:', 'District:', 'Landkreis:'),
(10, 'Obec:', 'Municipality:', 'Stadt:'),
(11, 'PSČ:', 'Zip code:', 'PLZ:'),
(12, 'Ulice:', 'Street:', 'Straße:'),
(13, 'Email:', 'Email:', 'Email:'),
(14, 'Korespondenční', 'Correspondence', 'Korrespondenz'),
(15, 'Korespondenční adresa', 'Correspondence address', 'Korrespondenz-Adresse'),
(16, '-- Zvolte kraj --', '-- Choose a region --', '-- Wählen Sie einen Region --'),
(17, '-- Zvolte okres --', '-- Choose a district -- ', '-- Wählen Sie einen Bezirk --'),
(18, '-- Zvolte obec --', '-- Choose a municipality --', '-- Wählen Sie eine Stadt --'),
(19, 'Registrovat', 'Register', 'Anmelden'),
(20, 'Zadání', 'Assignment', 'Aufgabe'),
(21, 'Registrace proběhla úspěšně', 'The registration was successful', 'Die Anmeldung war erfolgreich');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `preklad`
--
ALTER TABLE `preklad`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `preklad`
--
ALTER TABLE `preklad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
