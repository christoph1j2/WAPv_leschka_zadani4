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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kraj` varchar(100) NOT NULL,
  `okres` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `postal_code` varchar(5) NOT NULL,
  `correspondence_kraj` varchar(100) NOT NULL,
  `correspondence_okres` varchar(100) NOT NULL,
  `correspondence_city` varchar(100) NOT NULL,
  `correspondence_street` varchar(100) NOT NULL,
  `correspondence_postal_code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `surname`, `password`, `email`, `kraj`, `okres`, `city`, `street`, `postal_code`, `correspondence_kraj`, `correspondence_okres`, `correspondence_city`, `correspondence_street`, `correspondence_postal_code`) VALUES
(4, 'asdf', 'asdf', 'asdf', '$2y$10$4Mv0EMFsyQdHfMvjz0ubGunkl.HgjevBoDr9VHUvZOT34ZcoY1G4y', 'asdfasdfaadadffssdffd@asdfadfsdf.com', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(5, 'sfafsdadfsdfs', 'asdfasdfasdfadfs', 'asdfasdfasdf', '$2y$10$IdcBe6joF0ZTMM54975z0OZkPmx9Tjg1h7AEpabS/OJMOjUfpb3.S', 'asdfasdfaadaasdfdffssdffd@asdfadfsdf.com', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(6, 'sfafsdadsdfsdfs', 'asdfasdfasdfadfs', 'asdfasdfasdf', '$2y$10$bqCF561gVhWbePtqRZRCU.glmIGhWaGUU2ekBv0FpMHI5b97ZnaN.', 'asdfasdfaadaasdfdffsssdffd@asdfadfsdf.com', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(7, 'sfafsdaddssdfsdfs', 'asdfasdfasdfadfs', 'asdfasdfasdf', '$2y$10$NCd05sBIscQr8NCcqMXh9uQkkmR.tZ05JGIDRryp0ujbZtMH/bNsm', 'asdfassddfaadaasdfdffsssdffd@asdfadfsdf.com', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(8, 'sfafsdadfasddssdfsdfs', 'asdfasdfadfsdfadfs', 'asdfasdfasdf', '$2y$10$PxcdWcoO7rvQpD4gTZ0gf.BqLnWMSJvMuvb127eibkR.PcIyWcdcK', 'asdfassdasdfdfaadaasdfdffsssdffd@asdfadfsdf.com', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(9, 'wwwwww', 'asdff', 'asdfasdf', '$2y$10$Ws.j/uaFkQ9lXG6.Is6KDuOdhqEOfOLrCm5vC2x8rzbpkc2YsMFz6', 'w@w.w', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(10, 'wwwwwww', 'asdff', 'asdfasdf', '$2y$10$VAgLjFECx1d0DcWGCyfamOTWQe2oyCt/eHd1B7oFAzt/wgwp2K1Qm', 'w@ww.w', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(11, 'wwwwwwww', 'asdff', 'asdfasdf', '$2y$10$w6RO1XXKLL08BodbKFYakOaCTIy.u8GIwETFdifeYhmODLERhJLES', 'w@www.w', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(12, 'wwwwwwwww', 'asdff', 'asdfasdf', '$2y$10$abKbjEuvkCS2gw/M/u5hSuuGYVTyhZljyYqZUv46sGShXRICvQOte', 'w@wwww.w', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(13, 'qqq', 'q', 'q', '$2y$10$rBxLbsz5n8VHo7Whar8W.uXeboRnRwGe1TewP3ASqjKfIQdw4Kht6', 'q@q.q', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(14, 'aaaaaaaaaaaaaaaa', 'a', 'a', '$2y$10$D93yYNiBPUC7.7g8.0oI0ufeFGJ6gGn6xLYqCeDTP36gfuqNf9alm', 'aaaa@aaa.c', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(15, 'asdfasdfsdfaasdfsdfasdfa', 'sdfasdfasdfasdf', 'asdfasdfasdfsdfa', '$2y$10$DOn.BvC3lx9s.zunFucuk.cDpkbo8qyXXEYzkcPIqBYZa9RQUW0tG', 'sdf@asdf.asdf', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(16, 'asdfasdfsdfadfasdfsdfasdfa', 'sdfasdfasdfasdf', 'asdfasdfasdfsdfa', '$2y$10$PSH60EKJnH1kZX7u9/oB3uUEeGB3TPzojOWVuHyvAjg/C1A7kAO16', 'sdf@asddf.asdf', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(17, 'asdfasdfsdfdsadfasdfsdfasdfa', 'sdfasdfasdfasdf', 'asdfasdfasdfsdfa', '$2y$10$iLSHqUJ2jUbf5u80Ym9kneAbim09HyvLUPmntIMFu3fIjS3m7Bi0.', 'sdf@assdddf.asdf', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(18, 'asdfasdfasdf', 'asdfasdf', 'sadfasdf', '$2y$10$uF71Or0d/3NL9ATmw6aPEecUok7IXHFHgCswGEsZW57Bpd0NY4q9e', 'asdfasdf@sdfasd.sdfaasdf', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(19, 'ghjf', 'dghf', 'dfgh', '$2y$10$30CaYifv8p5wIy6lwfe8RuysNMUKwwxb5WRcdkHlgOfefDuy6iFbS', 'asdfasdfasdfasdfasdf@asdfasd.asdf', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(20, 'sdffasdfasdf', 'asdfasdf', 'asdfasdfasdf', '$2y$10$bGZq.ND7V7JYfiBcy3HujuTXbD/u9fAveQlQZwddC5KC//vdjsOIG', 'asdfasdfdfdfaadadffssdffd@asdfadfsdf.com', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(21, 'sdffasdfasdfdf', 'asdfasdf', 'asdfasdfasdf', '$2y$10$w5hXoUqUPbZPGETmssPB7epkqfMEMvWNk2UiV5Y0iSN34GIaRpWGq', 'asdfasdfdfdfdfaadadffssdffd@asdfadfsdf.com', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(22, 'sdffasdfasdfdfdf', 'asdfasdf', 'asdfasdfasdf', '$2y$10$nWGHy/DXlut7WD3gAVdLNOisTR7SfXdztUlESsvex6EQvQI/HcgJ.', 'asdfasddffdfdfdfaadadffssdffd@asdfadfsdf.com', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(23, 'faasdfasdf', 'asdfasdf', 'asdfasdf', '$2y$10$G.VEYxJ8yXoGFkq7c7DvyuireGF9.fi1Ue8r2QjkcVonbChTe4hg6', 'asdf@asdf.asdffd', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(24, 'faasdfasfgdf', 'asdfasdf', 'asdfasdf', '$2y$10$esMdvadK.7eTkcuwgHm6zu2WomW5p9LD/gA9x0r/utGbH0GkqoSB.', 'asdff@asdf.asdffd', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(25, 'faasdfasfgdfdf', 'asdfasdf', 'asdfasdf', '$2y$10$5yEU2DBMCp1YHl/wnySoVutgbOIbn48a2cb68PK2SQ75IVduCLh/S', 'asdff@asdfdf.asdffd', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(26, 'faasdfadfsfgdfdf', 'asdfasdf', 'asdfasdf', '$2y$10$E7uywTahvqM7Tcjqx18Rmula2yhGmr45jyBu4yPaQZxNOITHcfU06', 'asasdfdff@asdfdf.asdffd', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(27, 'faasdfadfdfsfgdfdf', 'asdfasdf', 'asdfasdf', '$2y$10$4F8zZE7HNysg9cDgwIhoL.x.T8mwUwLcBuRDUvj.cfQIa8UR3anDW', 'asasdfasdfdff@asdfdf.asdffd', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(28, 'faaasdfsdfadfdfsfgdfdf', 'asdfasdf', 'asdfasdf', '$2y$10$lvrVa1o74hs9/ziVm3NBHuvcPvPIITD.u7rd..9wEagH/L7B8hI3u', 'asaasdfsdfasdfdff@asdfdf.asdffd', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(29, 'faaasdfssdffadfdfsfgdfdf', 'asdfasdf', 'asdfasdf', '$2y$10$tQmzeLYYB6bRU4JrXNlgHuvFxr5/fTDy/nsZV0txxL2LKwBDWcOPO', 'asaasdfdfsdfasdfdff@asdfdf.asdffd', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(30, 'faaasdfssdfasdffadfdfsfgdfdf', 'asdfasdf', 'asdfasdf', '$2y$10$3Cun2nQFM0l7/i4tudGuD.OO/Zc3e6Igm/TlFUmCT8ZOOF3jB0zRO', 'asaasasdfdfdfsdfasdfdff@asdfdf.asdffd', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(31, 'asdfasdfasdfasdfasdfasdf', 'asdfasdfasdfdfas', 'sdfasdfasdfasdf', '$2y$10$ALxeP6LvE2dKDoUUwObJJulnOpUqeIHE35c6ka4EKGJcecB6MGlIq', 'asdfasdfasdfasdfasdf@asdfasd.asdfasdf', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(32, 'asdfasddffasdfasdfasdfasdf', 'asdfasdfasdfdfas', 'sdfasdfasdfasdf', '$2y$10$KtHu4aKoAffIEwznILndxeneO5WsodaY3oFDdCh6oeFhyRSgOwn.e', 'asdfasddffasdfasdfasdf@asdfasd.asdfasdf', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(33, 'asdfasddffasddsfasdfasdfasdf', 'asdfasdfasdfdfas', 'sdfasdfasdfasdf', '$2y$10$NbZ4BekzJC8E0KAxXHjMR.lBAtjKH7tezosHH3PkV.gNOdNmlnFu6', 'asdfasdsddffasdfasdfasdf@asdfasd.asdfasdf', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(34, 'sdfaasdfasdf', 'sdfaasdf', 'dsfasdfasdf', '$2y$10$8FXqBLZqbuYThJi7SF.Keum/HHFIJrRiV4kB6Buanh4Mki40L6dcm', 'asdfasdfdfaadadffssdffd@asdfadfsdf.com', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(35, 'asdfasdfasdfdf', 'sdafasdfasdf', 'asdfasdfsdaf', '$2y$10$tCS.lUAbvl6GGoxQQXLyIe3GxU1Eh6O69onDkktz7S/8EHiTiVPM6', 'asdfasdfasdfasdfasdf@asdf.asdf', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo, 7', '36461'),
(36, 'asdfasdfasdfasdfasdffsdaasdfasdf', 'aasdffasd', 'asdfasdfasdfasdf', '$2y$10$5UGha41pxzpOUdF5mMuwUOENEbQ9zujSw4Gcy47dhqEraVy4efWFa', 'asdfasdfasdfasdfafsdasdfasdf@asdfasdf.asdfasdf', '51', '3402', '555631', 'Staré Sedlo, 7', '36461', '51', '3402', '555631', 'Staré Sedlo, 7', '36461'),
(37, 'sdasdfdssdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsd', 'asdfasdf', 'asdfasdf', '$2y$10$9Z/FF21gaiSjqOKn9dZh3.oIkRb8iceQizt5H7w6dZFKl400K.7ye', 'asdfdfsafasddf@asdfasfd.asfdasdfsfad', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(38, 'asdfasdfasfcrgbhdf', 'asdfasdfasdf', 'asdfasdfasdffa', '$2y$10$nJMCp5/ywbiyi0zTrSBa9OLrsOC.ncWrHTj/6Y8J3/3vWwPo/KcN6', 'asdfdasfasdfafsd@fasdf.asdfasd', '51', '3402', '555631', 'Staré Sedlo, 7', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(39, 'asdfasdsafasfcrgbhdf', 'asdfasdfasdf', 'asdfasdfasdffa', '$2y$10$1D0wJZoN0awRHFt5j4lCC.v/cYhb6KlXM2jTnQWpYSPOVcHEwFAIa', 'asdfdasdsfasdfafsd@fasdf.asdfasd', '51', '3402', '555631', 'Staré Sedlo, 7', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(40, 'asdfasdfasdfasdfasdfasdfasdff', 'asdasdfasdffasd', 'sdaasdfasdfasdf', '$2y$10$rJYHClFSIDgm5YJ0cC/MXu.XNf.774T6bXzCgrHGZCZAOybwtzUl6', 'asdfasdffasdasfdservwe@aseffaessea.fa', '51', '3402', '555631', 'Staré Sedlo, 7', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(41, 'asdfasdfadssdfasdfasdfasdfasdff', 'asdasdfasdffasd', 'sdaasdfasdfasdf', '$2y$10$5/FLOp6ltpSf8NDPCQOjEOGn7zuGqOQT5/MuaYSLbR2LBoDcg9TBC', 'asdfassddffasdasfdservwe@aseffaessea.fa', '51', '3402', '555631', 'Staré Sedlo, 7', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(42, 'asdfasdfasdfasdfasdf', 'qwerqwerqwer', 'qwerqwerqwer', '$2y$10$ePew/ABh/Uq6pYWoTcoTJe11Ui9WbJJQMdEL7MgRWju2RRn7Jsqo2', 'qwerqwerqwer@qfsd.qwre', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(43, 'werqwerqwer', 'werqqwerqwer', 'qwerqwerewr', '$2y$10$KmC57w79Hhx8pqVYb/jRDujRS.q1xrYlR0XP5X1bPhhf5qj28c.vq', 'qwereqwrrqwerqwe@qwerrqwe.qwerew', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(44, 'asdfasdffasdasdf', 'asdfasdfasdfasdf', 'asdfasdfsdafasdf', '$2y$10$JJWKZ3t6HODZXWFNgLYWF.867qz/KvAfJ0iBlLcLGmtjosY3xQHPu', 'uiohkjhmgn@erthfg.sdfg', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(45, 'asdfasdffasdsdasdf', 'asdfasdfasdfasdf', 'asdfasdfsdafasdf', '$2y$10$MaDKKugWJthrmCgFqQ/G0eGK6AYhf4qgHfBKqbfUCIdr4zOiYK1Mm', 'uiohasdjhmgn@erthfg.sdfg', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo', '36461'),
(46, 'asdfgaawerwg', 'sdfaasdf', 'asdfasdf', '$2y$10$y3apVsJaBM5ypzKLyqMjdezsexl5tSTV8XygldEg8kmzOgfmaPTuu', 'asdfsdfaasdf@asdf.werq', '51', '3402', '555631', 'Staré Sedlo', '36461', '51', '3402', '555631', 'Staré Sedlo, 7', '36461');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
