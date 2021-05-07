-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 07. Mai 2021 um 09:45
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `modulist`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `categories`
--

CREATE TABLE `categories` (
  `name` text NOT NULL,
  `presenceFlag` tinyint(1) NOT NULL,
  `position` int(11) NOT NULL,
  `creditHours` float DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `courses`
--

CREATE TABLE `courses` (
  `name` text NOT NULL,
  `nameEN` text DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `exams`
--

CREATE TABLE `exams` (
  `moduleID` int(11) NOT NULL,
  `examType` int(11) NOT NULL,
  `examDuration` int(11) DEFAULT NULL,
  `examCircumference` text DEFAULT NULL,
  `examPeriod` text NOT NULL,
  `examWeighting` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fields`
--

CREATE TABLE `fields` (
  `name` text NOT NULL,
  `nameEN` text DEFAULT NULL,
  `courseID` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `literature`
--

CREATE TABLE `literature` (
  `authors` text NOT NULL,
  `year` int(11) DEFAULT NULL,
  `title` text NOT NULL,
  `edition` text DEFAULT NULL,
  `place` text DEFAULT NULL,
  `publishingCompany` text DEFAULT NULL,
  `ISBN` text DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `modules`
--

CREATE TABLE `modules` (
  `name` text NOT NULL,
  `nameEN` text DEFAULT NULL,
  `code` text DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `summaryEN` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `credits` int(11) DEFAULT NULL,
  `usability` text DEFAULT NULL,
  `examRequirement` text DEFAULT NULL,
  `participationRequirement` text DEFAULT NULL,
  `studyContent` text DEFAULT NULL,
  `knowledgeBroadening` text DEFAULT NULL,
  `knowledgeDeepening` text DEFAULT NULL,
  `instrumentalCompetence` text DEFAULT NULL,
  `systemicCompetence` text DEFAULT NULL,
  `communicativeCompetence` text DEFAULT NULL,
  `responsible` text DEFAULT NULL,
  `lectureLanguage` text DEFAULT NULL,
  `frequency` text DEFAULT NULL,
  `media` text DEFAULT NULL,
  `basicLiteraturePreNote` text DEFAULT NULL,
  `basicLiteraturePostNote` text DEFAULT NULL,
  `deepeningLiteraturePreNote` text DEFAULT NULL,
  `deepeningLiteraturePostNote` text DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `module_category_mm`
--

CREATE TABLE `module_category_mm` (
  `moduleID` text NOT NULL,
  `categoryID` text NOT NULL,
  `workload` int(11) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `module_field_mm`
--

CREATE TABLE `module_field_mm` (
  `moduleID` int(11) NOT NULL,
  `fieldID` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `module_literature_mm`
--

CREATE TABLE `module_literature_mm` (
  `moduleID` int(11) NOT NULL,
  `literatureID` int(11) NOT NULL,
  `basicLiteratureFlag` tinyint(1) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `literature`
--
ALTER TABLE `literature`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `module_category_mm`
--
ALTER TABLE `module_category_mm`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `module_field_mm`
--
ALTER TABLE `module_field_mm`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `module_literature_mm`
--
ALTER TABLE `module_literature_mm`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `courses`
--
ALTER TABLE `courses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `exams`
--
ALTER TABLE `exams`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `fields`
--
ALTER TABLE `fields`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `literature`
--
ALTER TABLE `literature`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `modules`
--
ALTER TABLE `modules`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `module_category_mm`
--
ALTER TABLE `module_category_mm`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `module_field_mm`
--
ALTER TABLE `module_field_mm`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `module_literature_mm`
--
ALTER TABLE `module_literature_mm`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
