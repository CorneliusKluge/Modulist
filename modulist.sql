-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 31. Mai 2021 um 16:23
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
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `categories`
--

INSERT INTO `categories` (`name`, `presenceFlag`, `position`, `ID`) VALUES
('Vorlesung/Seminar', 1, 1, 1),
('Übungen am Computer', 1, 2, 2),
('Prüfungsleistung', 1, 3, 3),
('Selbststudium/Übungen am Computer', 0, 1, 4),
('Selbststudium/Übungen am Computer in Praxisphase', 0, 2, 5),
('Selbststudium', 0, 3, 6);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `courses`
--

CREATE TABLE `courses` (
  `name` text NOT NULL,
  `nameEN` text DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `courses`
--

INSERT INTO `courses` (`name`, `nameEN`, `ID`) VALUES
('Informationstechnologie', 'Information Technology', 1);

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
  `examSemester` int(11) DEFAULT NULL,
  `examWeighting` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `exams`
--

INSERT INTO `exams` (`moduleID`, `examType`, `examDuration`, `examCircumference`, `examPeriod`, `examSemester`, `examWeighting`, `ID`) VALUES
(1, 1, 120, NULL, '1', NULL, 100, 1),
(2, 1, 120, NULL, '1', NULL, 100, 2);

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

--
-- Daten für Tabelle `fields`
--

INSERT INTO `fields` (`name`, `nameEN`, `courseID`, `ID`) VALUES
('Medieninformatik', 'Media Informatics', 1, 1),
('Informationstechnik', 'Information engineering', 1, 2);

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
  `publisher` text DEFAULT NULL,
  `isbn` text DEFAULT NULL,
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
  `responsibleName` text DEFAULT NULL,
  `responsibleEmail` text DEFAULT NULL,
  `lectureLanguage` text DEFAULT NULL,
  `frequency` text DEFAULT NULL,
  `media` text DEFAULT NULL,
  `basicLiteraturePreNote` text DEFAULT NULL,
  `basicLiteraturePostNote` text DEFAULT NULL,
  `deepeningLiteraturePreNote` text DEFAULT NULL,
  `deepeningLiteraturePostNote` text DEFAULT NULL,
  `overallGradeWeighting` text DEFAULT NULL,
  `presenceCreditHours` float DEFAULT NULL,
  `selfLearningCreditHours` float DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `modules`
--

INSERT INTO `modules` (`name`, `nameEN`, `code`, `summary`, `summaryEN`, `type`, `semester`, `duration`, `credits`, `usability`, `examRequirement`, `participationRequirement`, `studyContent`, `knowledgeBroadening`, `knowledgeDeepening`, `instrumentalCompetence`, `systemicCompetence`, `communicativeCompetence`, `responsibleName`, `responsibleEmail`, `lectureLanguage`, `frequency`, `media`, `basicLiteraturePreNote`, `basicLiteraturePostNote`, `deepeningLiteraturePreNote`, `deepeningLiteraturePostNote`, `overallGradeWeighting`, `presenceCreditHours`, `selfLearningCreditHours`, `ID`) VALUES
('Imperative Programmierung', NULL, '3IM-IMPPR-10', 'Die  Studierenden  lernen  die  imperative  und  prozedurale  Herangehensweise  theoretisch  und  am  praktischen  Beispiel  kennen.  Voraussetzung  für  die  Implementation  ist  das  Verständnis  für  die  Erarbeitung eines Algorithmus zur Lösung eines praktischen Problems. Dazu werden Kenntnisse über grafische Hilfsmittel (Ablaufpläne, Struktogramme) für die Umsetzung vermittelt. Der sichere Umgang mit  den  Kontrollstrukturen  für  strukturierte  Programmierung  ist  die  Voraussetzung  für  die  weiteren  Module der Softwareentwicklung.', NULL, 'Pflichtmodul', 1, 1, 6, 'Studiengang Informationstechnologie', 'Laut aktueller Prüfungsordnung', 'Keine', 'Begriffsdefinitionen und -erläuterungen:-Algorithmus, Programm, Programmierung -Klassifikation der Programmiersprachen -Darstellungsformen Programmablaufpläne, StruktogrammeSyntaxbeschreibungen, erweiterte Backus-Naur-Formstrukturiertes Vorgehen bei der ProgrammentwicklungProzedurale Programmiersprache:- Eigenschaften, elementare und strukturierte Datentypen, Operatoren (arithmetische, Vergleichs-, logische, Bedingungs-), Zuweisungen- Kontrollstrukturen (switch, for, if, while, do while)- Funktionen, Call-by-Value und Call-by-Reference- Zeiger, Felder, Strukturen- Dateiarbeit, Präcompiler- Testen von Programmen- Programmprojekte, Fehlerbehandlung', 'Die  Studierenden  kennen  die  Grundelemente  sowie  die  Konzepte  von  Programmiersprachen.  Sie  verstehen die Grundprinzipien der imperativen und prozeduralen Programmierung.', 'Die  Studierenden  beherrschen  die  Beschreibung  eines  Algorithmus  in  einer  problemorientierten  prozeduralen   Programmiersprache   und   die   notwendigen   Arbeitsschritte   zur   Erstellung   eines   Anwendungsprogramms. ', 'Die Studierenden können Entwicklungsumgebungen einsetzen, um Programme zu implementieren. Sie kennen  die  Werkzeuge  der  einzelnen  Arbeitsschritte  zur  Programmerstellung  sowie  die  benötigten  Systemkomponenten und sind somit in der Lage, für spezielle Anwendungen Programme zu erstellen.', 'Die   Studierenden   können   die   Grundprinzipien   der   prozeduralen   Programmierung   in   eigenen   Programmen anwenden. Sie sind in der Lage, einfache Problemstellungen algorithmisch zu formulieren und  die  erarbeiteten  Algorithmen  nach  den  Regeln  der  strukturierten  Programmierung  mit  den  gegebenen Möglichkeiten der Programmiersprache umzusetzen.', 'Die Studierenden sind in der Lage, auftretende Probleme bei der Algorithmierung und Programmierung im Team zu gemeinsam zu lösen, die Ergebnisse zu erläutern, zu demonstrieren und zu verteidigen. Sie können erhaltene Hinweise zu ihrer Lösung einarbeiten.', 'Herr Prof. Dipl.-Math. Engelhardt', 'Informationstechnik@ba-dresden.de', 'Deutsch', 'Jährlich (Wintersemester)', 'Skripte und Übungsbeispiele des Lehrbeauftragten', 'Ausgewählte Kapitel aus:', NULL, NULL, NULL, NULL, NULL, NULL, 1),
('Algebra/Analysis', NULL, '3MI-MATHE-10', 'Ziel ist  die  Vermittlung  von  Grundkenntnissen  mathematischen  Arbeitens  sowohl  mit  Methoden  der  Diskreten    Mathematik    als    auch    der    Analysis,    um    ingenieurtechnische    Aufgabenstellungen    mathematisch  formulieren  und  lösen  zu  können.  Das  Modul  ist  Voraussetzung  für  die  Module „Naturwissenschaftliche   Grundlagen“,   „Bildverarbeitung   und   Druckvorstufe“   und   „Angewandte Mathematik“ und unterstützt die Wissensvermittlung in weiteren Modulen.', NULL, 'Pflichtmodul', 1, 1, 6, 'Studiengang Informationstechnologie', 'Laut aktueller Prüfungsordnung', 'Keine', '-Grundlagen von Logik und Mengenlehre-Zahlenbereiche (insbes. komplexe Zahlen und Zahlenkongruenzen)-Algebraische Strukturen  -Vektorräume  -Matrizen und Determinanten -Allgemeine lineare Gleichungssysteme -Unendliche Folgen und Reihen-Stetige Funktionen-Infinitesimalrechnung ein- und mehrstelliger Funktionen -Differenzialgleichungen', 'Die  Studierenden  lernen  die  „Sprache  der  Mathematik“  (Logik  und  Mengenlehre)  und  können  diese  verstehen.  Sie  erlernen  effiziente  Algorithmen  zur  Lösung  linearer  Gleichungssysteme  und  können  weitere Aufgabenstellungen der Linearen Algebra lösen.', 'Die  Studierenden  erhalten  einen  Überblick  über  die  Struktur  der  Zahlenbereiche.  Ferner  wird  ein  Grundverständnis  für  die  Vielfalt  weiterer  algebraischer  Strukturen  vermittelt.  Sie  verstehen  die  theoretischen  Grundlagen  zur  Lösung  linearer  Gleichungssysteme  (mögliche  Lösungsfälle  und  derenCharakterisierung). Nach einem Einblick in die Theorie der Differenzialgleichungen sind sie in der Lage, selbständig einfache Probleme der Modellierung dynamischer Vorgänge zu lösen.', 'Die Studierenden können mathematische Modelle zur Lösung von informationstechnischen Aufgaben anwenden.  Sie  erwerben  rechnerische  Fertigkeiten,  insbesondere  in  informatikrelevanten  Zahlen-bereichen und beim Lösen von linearen Gleichungssystemen.', 'Sie  entwickeln  die  Fähigkeit,  formal  ausgedrückte  Sachverhalte  anschaulich  zu  interpretieren  und  umgekehrt    konkrete    Situationen    formal    zu    beschreiben.    Die    Studierenden    sind    befähigt,    naturwissenschaftliche oder technische Problemstellungen adäquat zu modellieren und mathematisch zu behandeln. Der der Diskreten Mathematik innewohnende hohe Abstraktionsgrad erleichtert ihnen die Analyse  von  praktischen  Problemstellungen  und  die  Entwicklung  klar  strukturierter  Lösungen  im  Rahmen der Software-Entwicklung.', 'Die  Studierenden  können  gewonnene  Ergebnisse  interpretieren  und  diese  für  eine  sachgerechte Argumentation und Entscheidungsfindung nutzen.', 'Herr Prof. Dr. rer. nat. Gembris', 'daniel.gembris@ba-dresden.de', 'Deutsch', 'Jährlich (Wintersemester)', 'Aufgaben- und Foliensammlung; Formelsammlung; Übungsbeispiele des Lehrbeauftragten', 'Ausgewählte Kapitel aus:', NULL, NULL, NULL, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `module_category_mm`
--

CREATE TABLE `module_category_mm` (
  `moduleID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `workload` int(11) DEFAULT NULL,
  `theoryFlag` tinyint(1) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `module_category_mm`
--

INSERT INTO `module_category_mm` (`moduleID`, `categoryID`, `workload`, `theoryFlag`, `semester`, `ID`) VALUES
(1, 1, 28, NULL, 1, 2),
(1, 2, 30, NULL, 1, 3),
(1, 3, 2, NULL, 1, 4),
(1, 4, 30, 1, 1, 5),
(1, 5, 90, 0, 1, 6),
(2, 1, 88, NULL, 1, 7),
(2, 3, 2, NULL, 1, 8),
(2, 6, 40, 1, 1, 9),
(2, 6, 50, 0, 1, 10);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `module_field_mm`
--

CREATE TABLE `module_field_mm` (
  `moduleID` int(11) NOT NULL,
  `fieldID` int(11) DEFAULT NULL,
  `courseID` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `module_field_mm`
--

INSERT INTO `module_field_mm` (`moduleID`, `fieldID`, `courseID`, `ID`) VALUES
(1, 1, 0, 1),
(2, NULL, 1, 2);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `courses`
--
ALTER TABLE `courses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `exams`
--
ALTER TABLE `exams`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `fields`
--
ALTER TABLE `fields`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `literature`
--
ALTER TABLE `literature`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `modules`
--
ALTER TABLE `modules`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `module_category_mm`
--
ALTER TABLE `module_category_mm`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `module_field_mm`
--
ALTER TABLE `module_field_mm`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `module_literature_mm`
--
ALTER TABLE `module_literature_mm`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
