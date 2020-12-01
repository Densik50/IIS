-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2020 at 11:03 PM
-- Server version: 8.0.22-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iis_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `EVENTS`
--

CREATE TABLE `EVENTS` (
  `EventID` int NOT NULL,
  `Name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `Describtion` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Address` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `Start_date` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `Start_time` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `End_date` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `End_time` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `Price` float NOT NULL,
  `Capacity` int NOT NULL,
  `Reserved` int NOT NULL,
  `MaxCapacity` int NOT NULL,
  `UserID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `EVENTS`
--

INSERT INTO `EVENTS` (`EventID`, `Name`, `Describtion`, `Address`, `Start_date`, `Start_time`, `End_date`, `End_time`, `Price`, `Capacity`, `Reserved`, `MaxCapacity`, `UserID`) VALUES
(1, 'Tvrde srdce', 'Tvrde srdce je zhromazdenie najtvrdsich metalovych fanusikov! Nenechaj si ujst tento zazitok!', 'Hlasna ulica 4 ,Hora zvukov, Hlucna republika', '13.12.2020', '15:00', '16.12.2020', '06:00', 65, 0, 1, 500, 1),
(2, 'Tancujuci twister', 'Najvecsia tanecna slavnost pre milovnikov disco v Tanecnikove', 'Tanecna skola 4, Tanecnikov, Czechia', '04.12.2020', '17:00', '05.12.2020', '02:00', 10, 1, 0, 150, 1);

-- --------------------------------------------------------

--
-- Table structure for table `EVENT_CASHIERS`
--

CREATE TABLE `EVENT_CASHIERS` (
  `EventID` int DEFAULT NULL,
  `UserID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `EVENT_CASHIERS`
--

INSERT INTO `EVENT_CASHIERS` (`EventID`, `UserID`) VALUES
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `EVENT_GENRES`
--

CREATE TABLE `EVENT_GENRES` (
  `EventID` int DEFAULT NULL,
  `GenreID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `EVENT_GENRES`
--

INSERT INTO `EVENT_GENRES` (`EventID`, `GenreID`) VALUES
(1, 1),
(1, 5),
(2, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `EVENT_INTERPRETS`
--

CREATE TABLE `EVENT_INTERPRETS` (
  `EventID` int DEFAULT NULL,
  `InterpretID` int DEFAULT NULL,
  `Stage_name` varchar(16) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Start_time` varchar(32) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Start_date` varchar(32) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `End_time` varchar(32) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `End_date` varchar(32) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `EVENT_INTERPRETS`
--

INSERT INTO `EVENT_INTERPRETS` (`EventID`, `InterpretID`, `Stage_name`, `Start_time`, `Start_date`, `End_time`, `End_date`) VALUES
(2, 1, 'Stage D', '16:00', '12.12.2020', '18:00', '12.12.2020');

-- --------------------------------------------------------

--
-- Table structure for table `EVENT_TICKETS`
--

CREATE TABLE `EVENT_TICKETS` (
  `TicketID` int NOT NULL,
  `EventID` int DEFAULT NULL,
  `Buyer` int DEFAULT NULL,
  `Paied` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `EVENT_TICKETS`
--

INSERT INTO `EVENT_TICKETS` (`TicketID`, `EventID`, `Buyer`, `Paied`) VALUES
(1, 2, 4, 1),
(2, 1, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `GENRE`
--

CREATE TABLE `GENRE` (
  `GenreID` int NOT NULL,
  `GenreName` varchar(32) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `GENRE`
--

INSERT INTO `GENRE` (`GenreID`, `GenreName`) VALUES
(1, 'Metal'),
(2, 'Rap'),
(3, 'Pop'),
(4, 'Dance'),
(5, 'Rock'),
(6, 'Dubstep'),
(7, 'Country');

-- --------------------------------------------------------

--
-- Table structure for table `INTERPRET`
--

CREATE TABLE `INTERPRET` (
  `InterpretID` int NOT NULL,
  `Owner` int DEFAULT NULL,
  `Describtion` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Name` varchar(128) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `INTERPRET`
--

INSERT INTO `INTERPRET` (`InterpretID`, `Owner`, `Describtion`, `Name`) VALUES
(1, 1, 'Country originals je zabavna skupina datajuca sa od roku 1985, sme milovnici country hudby a radi sa o nu podelime.', 'Countrie originals');

-- --------------------------------------------------------

--
-- Table structure for table `INTERPRET_GENRES`
--

CREATE TABLE `INTERPRET_GENRES` (
  `InterpretID` int DEFAULT NULL,
  `GenreID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `INTERPRET_GENRES`
--

INSERT INTO `INTERPRET_GENRES` (`InterpretID`, `GenreID`) VALUES
(1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE `USERS` (
  `UserID` int NOT NULL,
  `Fullname` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `Username` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `Mobile` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `Address` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `is_banned` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `USERS`
--

INSERT INTO `USERS` (`UserID`, `Fullname`, `Username`, `Email`, `Password`, `Mobile`, `Address`, `is_admin`, `is_banned`) VALUES
(1, 'Marek Administrator', 'admin', 'admin@festival.com', '$2y$10$upBzoY3tWcCEwcc94RrdSuTXkCDwDwGw7CRHlxAN7G/fNWI1S14dq', '421123456789', 'Admin 01, Admin city, Admin Republic', 1, 0),
(2, 'Jan divak', 'divak', 'divak@gmail.com', '$2y$10$XqykSf0W7xdvXY.ZsC0MOOhHX3oJSqA4sA2eRhAnHCHn3CC7cOHru', '421987654321', 'Divakov 16, Divacke mesto, Czechia', 0, 0),
(3, 'Jan Nezbedny', 'banned', 'banned@gmail.com', '$2y$10$bFrfawOWEZjMHbKnjiFJ8ufRae4Z6WPbK.f1hb5/H2N9anHHWHkbu', '421654123789', 'Nezbedna ulica 13, Satanov dvor', 0, 1),
(4, 'Honza Penizomil', 'pokladnik', 'pokladnik@gmail.com', '$2y$10$aGRoZPauZehtyg1ndttRvul72o0C0VttPxikkPrzsSU4AAEBaVpqm', '421940654123', 'Bohata ulica 123, Hora penazi', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `EVENTS`
--
ALTER TABLE `EVENTS`
  ADD PRIMARY KEY (`EventID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `EVENT_CASHIERS`
--
ALTER TABLE `EVENT_CASHIERS`
  ADD KEY `EventID` (`EventID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `EVENT_GENRES`
--
ALTER TABLE `EVENT_GENRES`
  ADD KEY `EventID` (`EventID`),
  ADD KEY `GenreID` (`GenreID`);

--
-- Indexes for table `EVENT_INTERPRETS`
--
ALTER TABLE `EVENT_INTERPRETS`
  ADD KEY `EventID` (`EventID`),
  ADD KEY `InterpretID` (`InterpretID`);

--
-- Indexes for table `EVENT_TICKETS`
--
ALTER TABLE `EVENT_TICKETS`
  ADD PRIMARY KEY (`TicketID`),
  ADD KEY `EventID` (`EventID`),
  ADD KEY `Buyer` (`Buyer`);

--
-- Indexes for table `GENRE`
--
ALTER TABLE `GENRE`
  ADD PRIMARY KEY (`GenreID`);

--
-- Indexes for table `INTERPRET`
--
ALTER TABLE `INTERPRET`
  ADD PRIMARY KEY (`InterpretID`),
  ADD KEY `Owner` (`Owner`);

--
-- Indexes for table `INTERPRET_GENRES`
--
ALTER TABLE `INTERPRET_GENRES`
  ADD KEY `InterpretID` (`InterpretID`),
  ADD KEY `GenreID` (`GenreID`);

--
-- Indexes for table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `EVENTS`
--
ALTER TABLE `EVENTS`
  MODIFY `EventID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `EVENT_TICKETS`
--
ALTER TABLE `EVENT_TICKETS`
  MODIFY `TicketID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `GENRE`
--
ALTER TABLE `GENRE`
  MODIFY `GenreID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `INTERPRET`
--
ALTER TABLE `INTERPRET`
  MODIFY `InterpretID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `USERS`
--
ALTER TABLE `USERS`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `EVENTS`
--
ALTER TABLE `EVENTS`
  ADD CONSTRAINT `EVENTS_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `USERS` (`UserID`);

--
-- Constraints for table `EVENT_CASHIERS`
--
ALTER TABLE `EVENT_CASHIERS`
  ADD CONSTRAINT `EVENT_CASHIERS_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `EVENTS` (`EventID`),
  ADD CONSTRAINT `EVENT_CASHIERS_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `USERS` (`UserID`);

--
-- Constraints for table `EVENT_GENRES`
--
ALTER TABLE `EVENT_GENRES`
  ADD CONSTRAINT `EVENT_GENRES_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `EVENTS` (`EventID`),
  ADD CONSTRAINT `EVENT_GENRES_ibfk_2` FOREIGN KEY (`GenreID`) REFERENCES `GENRE` (`GenreID`);

--
-- Constraints for table `EVENT_INTERPRETS`
--
ALTER TABLE `EVENT_INTERPRETS`
  ADD CONSTRAINT `EVENT_INTERPRETS_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `EVENTS` (`EventID`),
  ADD CONSTRAINT `EVENT_INTERPRETS_ibfk_2` FOREIGN KEY (`InterpretID`) REFERENCES `INTERPRET` (`InterpretID`);

--
-- Constraints for table `EVENT_TICKETS`
--
ALTER TABLE `EVENT_TICKETS`
  ADD CONSTRAINT `EVENT_TICKETS_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `EVENTS` (`EventID`),
  ADD CONSTRAINT `EVENT_TICKETS_ibfk_2` FOREIGN KEY (`Buyer`) REFERENCES `USERS` (`UserID`);

--
-- Constraints for table `INTERPRET`
--
ALTER TABLE `INTERPRET`
  ADD CONSTRAINT `INTERPRET_ibfk_1` FOREIGN KEY (`Owner`) REFERENCES `USERS` (`UserID`);

--
-- Constraints for table `INTERPRET_GENRES`
--
ALTER TABLE `INTERPRET_GENRES`
  ADD CONSTRAINT `INTERPRET_GENRES_ibfk_1` FOREIGN KEY (`InterpretID`) REFERENCES `INTERPRET` (`InterpretID`),
  ADD CONSTRAINT `INTERPRET_GENRES_ibfk_2` FOREIGN KEY (`GenreID`) REFERENCES `GENRE` (`GenreID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
