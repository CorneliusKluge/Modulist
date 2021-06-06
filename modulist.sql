-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Jun 2021 um 13:53
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
('Selbststudium', 0, 3, 6),
('Übungen an Gerätetechnik', 1, 4, 7),
('Eigenständiges Erstellen von Versuchsauswertungen', 0, 4, 8);

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
(2, 1, 120, NULL, '1', 1, 100, 2),
(3, 1, 90, NULL, '1', 1, 50, 3),
(3, 1, 90, NULL, '2', 2, 50, 4),
(6, 1, 120, NULL, '2', 2, 50, 5),
(6, 7, NULL, '10-15 Seiten', '2', 2, 50, 6),
(1, 1, 120, NULL, '1', 1, 100, 28);

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

--
-- Daten für Tabelle `literature`
--

INSERT INTO `literature` (`authors`, `year`, `title`, `edition`, `place`, `publisher`, `isbn`, `ID`) VALUES
('HEISTER, W.', NULL, 'Studieren mit Erfolg: effizientes Lernen und Selbstmanagement: in Bachelor-, Master- und Diplomstudiengängen', 'aktuelle Auflage', 'Stuttgart', 'Schäffer-Poeschel', NULL, 1);

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
  `lockedFlag` tinyint(1) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `modules`
--

INSERT INTO `modules` (`name`, `nameEN`, `code`, `summary`, `summaryEN`, `type`, `semester`, `duration`, `credits`, `usability`, `examRequirement`, `participationRequirement`, `studyContent`, `knowledgeBroadening`, `knowledgeDeepening`, `instrumentalCompetence`, `systemicCompetence`, `communicativeCompetence`, `responsibleName`, `responsibleEmail`, `lectureLanguage`, `frequency`, `media`, `basicLiteraturePreNote`, `basicLiteraturePostNote`, `deepeningLiteraturePreNote`, `deepeningLiteraturePostNote`, `overallGradeWeighting`, `presenceCreditHours`, `selfLearningCreditHours`, `lockedFlag`, `ID`) VALUES
('Imperative Programmierung', NULL, '3IM-IMPPR-10', '<p>Die Studierenden lernen die imperative und prozedurale Herangehensweise theoretisch und am praktischen Beispiel kennen. Voraussetzung f&uuml;r die Implementation ist das Verst&auml;ndnis f&uuml;r die Erarbeitung eines Algorithmus zur L&ouml;sung eines praktischen Problems. Dazu werden Kenntnisse &uuml;ber grafische Hilfsmittel (Ablaufpl&auml;ne, Struktogramme) f&uuml;r die Umsetzung vermittelt. Der sichere Umgang mit den Kontrollstrukturen f&uuml;r strukturierte Programmierung ist die Voraussetzung f&uuml;r die weiteren Module der Softwareentwicklung.</p>', NULL, 'Pflichtmodul', 1, 1, 6, 'Studiengang Informationstechnologie', 'Laut aktueller Prüfungsordnung', 'Keine', '<p>Begriffsdefinitionen und -erl&auml;uterungen:-Algorithmus, Programm, Programmierung -Klassifikation der Programmiersprachen -Darstellungsformen Programmablaufpl&auml;ne, StruktogrammeSyntaxbeschreibungen, erweiterte Backus-Naur-Formstrukturiertes Vorgehen bei der ProgrammentwicklungProzedurale Programmiersprache:- Eigenschaften, elementare und strukturierte Datentypen, Operatoren (arithmetische, Vergleichs-, logische, Bedingungs-), Zuweisungen- Kontrollstrukturen (switch, for, if, while, do while)- Funktionen, Call-by-Value und Call-by-Reference- Zeiger, Felder, Strukturen- Dateiarbeit, Pr&auml;compiler- Testen von Programmen- Programmprojekte, Fehlerbehandlung</p>', '<p>Die Studierenden kennen die Grundelemente sowie die Konzepte von Programmiersprachen. Sie verstehen die Grundprinzipien der imperativen und prozeduralen Programmierung.</p>', '<p>Die Studierenden beherrschen die Beschreibung eines Algorithmus in einer problemorientierten prozeduralen Programmiersprache und die notwendigen Arbeitsschritte zur Erstellung eines Anwendungsprogramms.</p>', '<p>Die Studierenden k&ouml;nnen Entwicklungsumgebungen einsetzen, um Programme zu implementieren. Sie kennen die Werkzeuge der einzelnen Arbeitsschritte zur Programmerstellung sowie die ben&ouml;tigten Systemkomponenten und sind somit in der Lage, f&uuml;r spezielle Anwendungen Programme zu erstellen.</p>', '<p>Die Studierenden k&ouml;nnen die Grundprinzipien der prozeduralen Programmierung in eigenen Programmen anwenden. Sie sind in der Lage, einfache Problemstellungen algorithmisch zu formulieren und die erarbeiteten Algorithmen nach den Regeln der strukturierten Programmierung mit den gegebenen M&ouml;glichkeiten der Programmiersprache umzusetzen.</p>', '<p>Die Studierenden sind in der Lage, auftretende Probleme bei der Algorithmierung und Programmierung im Team zu gemeinsam zu l&ouml;sen, die Ergebnisse zu erl&auml;utern, zu demonstrieren und zu verteidigen. Sie k&ouml;nnen erhaltene Hinweise zu ihrer L&ouml;sung einarbeiten.</p>', 'Herr Prof. Dipl.-Math. Engelhardt', 'Informationstechnik@ba-dresden.de', 'Deutsch', 'Jährlich (Wintersemester)', 'Skripte und Übungsbeispiele des Lehrbeauftragten', '<p>Ausgew&auml;hlte Kapitel aus:</p>', NULL, NULL, NULL, '3', 5, NULL, 0, 1),
('Algebra/Analysis', NULL, '3MI-MATHE-10', 'Ziel ist  die  Vermittlung  von  Grundkenntnissen  mathematischen  Arbeitens  sowohl  mit  Methoden  der  Diskreten    Mathematik    als    auch    der    Analysis,    um    ingenieurtechnische    Aufgabenstellungen    mathematisch  formulieren  und  lösen  zu  können.  Das  Modul  ist  Voraussetzung  für  die  Module „Naturwissenschaftliche   Grundlagen“,   „Bildverarbeitung   und   Druckvorstufe“   und   „Angewandte Mathematik“ und unterstützt die Wissensvermittlung in weiteren Modulen.', NULL, 'Pflichtmodul', 1, 1, 6, 'Studiengang Informationstechnologie', 'Laut aktueller Prüfungsordnung', 'Keine', '-Grundlagen von Logik und Mengenlehre-Zahlenbereiche (insbes. komplexe Zahlen und Zahlenkongruenzen)-Algebraische Strukturen  -Vektorräume  -Matrizen und Determinanten -Allgemeine lineare Gleichungssysteme -Unendliche Folgen und Reihen-Stetige Funktionen-Infinitesimalrechnung ein- und mehrstelliger Funktionen -Differenzialgleichungen', 'Die  Studierenden  lernen  die  „Sprache  der  Mathematik“  (Logik  und  Mengenlehre)  und  können  diese  verstehen.  Sie  erlernen  effiziente  Algorithmen  zur  Lösung  linearer  Gleichungssysteme  und  können  weitere Aufgabenstellungen der Linearen Algebra lösen.', 'Die  Studierenden  erhalten  einen  Überblick  über  die  Struktur  der  Zahlenbereiche.  Ferner  wird  ein  Grundverständnis  für  die  Vielfalt  weiterer  algebraischer  Strukturen  vermittelt.  Sie  verstehen  die  theoretischen  Grundlagen  zur  Lösung  linearer  Gleichungssysteme  (mögliche  Lösungsfälle  und  derenCharakterisierung). Nach einem Einblick in die Theorie der Differenzialgleichungen sind sie in der Lage, selbständig einfache Probleme der Modellierung dynamischer Vorgänge zu lösen.', 'Die Studierenden können mathematische Modelle zur Lösung von informationstechnischen Aufgaben anwenden.  Sie  erwerben  rechnerische  Fertigkeiten,  insbesondere  in  informatikrelevanten  Zahlen-bereichen und beim Lösen von linearen Gleichungssystemen.', 'Sie  entwickeln  die  Fähigkeit,  formal  ausgedrückte  Sachverhalte  anschaulich  zu  interpretieren  und  umgekehrt    konkrete    Situationen    formal    zu    beschreiben.    Die    Studierenden    sind    befähigt,    naturwissenschaftliche oder technische Problemstellungen adäquat zu modellieren und mathematisch zu behandeln. Der der Diskreten Mathematik innewohnende hohe Abstraktionsgrad erleichtert ihnen die Analyse  von  praktischen  Problemstellungen  und  die  Entwicklung  klar  strukturierter  Lösungen  im  Rahmen der Software-Entwicklung.', 'Die  Studierenden  können  gewonnene  Ergebnisse  interpretieren  und  diese  für  eine  sachgerechte Argumentation und Entscheidungsfindung nutzen.', 'Herr Prof. Dr. rer. nat. Gembris', 'daniel.gembris@ba-dresden.de', 'Deutsch', 'Jährlich (Wintersemester)', 'Aufgaben- und Foliensammlung; Formelsammlung; Übungsbeispiele des Lehrbeauftragten', 'Ausgewählte Kapitel aus:', NULL, NULL, NULL, '2', 7.5, NULL, 0, 2),
('Ingenieurtechnische Grundlagen', NULL, '3IT-INGT-12 ', 'Ziel   des   Moduls   ist   es,   Elektrotechnik   und   Physik   als   physikalisch-technische   Basis   der   Informationstechnik  zu  erfassen  sowie  kennen  und  verstehen  zu  lernen.  Dazu  wird  die  notwendige  Mathematik auf dem Niveau der Zugangsvoraussetzungen benutzt, um elektrotechnische Modellbildung algebraisch abstrakt zu untersetzen.', NULL, 'Pflichtmodul', 1, 2, 6, 'Studienrichtung Informationstechnik', 'Laut aktueller Prüfungsordnung', 'Keine', 'Elektrotechnische Grundlagen: - Berechnung von Widerstandsnetzwerken - Homogene und quasihomogene elektrische und magnetische Felder- Übergangsverhalten von Strom und Spannung an Kondensatoren und Spulen- Lineare Netzwerke bei sinusförmigem Wechselstrom- Technisch wichtige Schaltungen und ihr Verhalten bei Veränderung eines ParametersPhysikalische Grundlagen: - Mechanik- Schwingungen und Wellen- Optik', 'Durch das Aufgreifen vorhandenen Basiswissens aus Physik und Mathematik, ingenieurmäßiges Strukturieren, algebraisches Beschreiben sowie das Veranschaulichen der Elektrotechnik an aktuellen, praktischen Beispielen erhalten die Studierenden die notwendige Wissensbasis für das Verstehen der technischen Grundlagen und Zusammenhänge des breiten Fachgebietes der Informationstechnik. Die Studierenden lernen grundlegende physikalische Gesetzmäßigkeiten und ihre Anwendungen kennen. Durchführung von Experimenten und wissenschaftliche Auswertung.', 'Die  schwerpunktmäßige  Konzentration  auf  Vorgänge  an  elementaren  elektrischen  Bauelementen  ermöglichen  den  notwendigen  Wissenszuwachs  zum  Verstehen  aktueller  technischer  Entwicklungen  der  Informationsaufnahme,  -übertragung  und  -verarbeitung  sowie  zur  Lösung  informations-  und elektrotechnischer Aufgabenstellungen.Die Studierenden erkennen das methodische Grundprinzip der Naturwissenschaften des Wechselspiels zwischen Theorie und Experiment als die Basis von Ingenieurwissenschaften.', 'Die  Absolventen  des  Moduls  können  die  Grundgesetze  der  Elektrotechnik  sowie  das  Erkennen,  Abstrahieren   und   mathematische   Beschreiben   von   elektrotechnischen   Ersatzschaltungen   für   berufspraktisch relevante Probleme anwenden. Die   Fertigkeiten   der   Studierenden   sollen   sich   nicht   auf   das   theoretische   Durchdringen   von   physikalischen Problemen beschränken, sondern es wird die Fähigkeit zum Durchrechnen und Lösen von Problemen gefördert.', 'Das  Erlernen  und  Üben  geeigneter  elektrotechnischer  Modellbildungen  als  verallgemeinerungsfähige  Problemlösungsmethode  der  Informationstechnik  ist  das  entscheidende  Modulziel  zur  Verbesserung  eines lösungsorientierten Denkens sowie zur Vertiefung der eigenen Urteilsfähigkeit der Studierenden.Sie werden befähigt, eigene Ergebnisse zu überprüfen und die Anwendungsgrenzen der verwendeten Modelle  zu  erkennen.  Dadurch  können  sie  sich  selbst  physikalische  und  damit  zusammenhängendetechnische Kenntnisse und Fertigkeiten aneignen und diese üben.', 'Das schriftliche und mündliche Formulieren auf der Basis von Darstellungs- und Beschreibungsmitteln der  informationstechnischen  Ingenieurwissenschaft  in  Form  elektrischer  Schaltbilder  befähigt  die  Absolventen  zur  fachlichen  Kommunikation  sowie  zur  Diskussion  mit  Vertreten  anderer  technischer  Fachdisziplinen.Die Studierenden sind in der Lage, physikalische Problemstellungen zu formulieren und argumentativ vertreten zu können.', 'Herr Prof. Dr.  rer. nat. Gembris', 'daniel.gembris@ba-dresden.de', 'Deutsch', 'Jährlich (Wintersemester)', 'Aufgabensammlung; Skript; Präsentation mit Beamer; Tafel; Simulationsbeispiele', 'Ausgewählte Kapitel aus:', NULL, NULL, NULL, '3', 10, NULL, 0, 3),
('Objektorientierte Programmierung und Entwicklungsumgebungen', NULL, '3IM-OOP-20', 'Mit  diesem  Modul  erlernen  die  Studierenden  die  wesentlichen  Fähigkeiten  des  Entwurfes  von  Datenstrukturen und des Algorithmierens im Zusammenhang mit der Problemlösung unter Verwendung eines Rechners.  Dazu  erlernen  die  Studierenden  die  wichtigsten  Algorithmen  zur  Manipulation  der  Informationen,  die  in  einer  Datenstruktur  enthalten  sind  und  verstehen  die  Leistungsparameter  einer  Datenstruktur und der zugehörigen Algorithmen, um im Arbeitsprozess die geeigneten Strukturen und Algorithmen auswählen zu können.Das Modul vermittelt die Grundbegriff Kenntnisse und Fertigkeiten des objektorientierten Paradigmas. Es  wird  die  Fähigkeit  vermittelt,  ein  Programm  mit  Hilfe  des  objektorientierten  Paradigmas  zu entwickeln.', NULL, 'Pflichtmodul', 2, 1, 6, 'StudiengangInformationstechnologie', 'Laut aktueller Prüfungsordnung', 'Keine', 'Objektorientierte Programmierung - Grundkonzepte Klassen / Objekte / Eigenschaften / Methoden- Sichtbarkeit / Datenkapselung / Pakete- Vererbung / Abstrakte Klassen / Schnittstellen / Polymorphismus- Exceptions und Ausnahmebehandlung- Erstellen von grafischen Oberflächen- Arbeiten mit Streams und DatenbankenGrafische Oberflächen- Besonderheiten im Programmablauf- Aufbau grafischer OberflächenAlternative Betriebssysteme - Plattformunabhängige Programme- Entwicklungswerkzeuge', 'Die   Studierenden   kennen   die   grundlegenden   Unterschiede   zwischen   der   prozeduralen   und   objektorientierten    Programmierung.  Sie  beherrschen  die  Grundprinzipien  der  Objektorientierung  und  können die Eigenschaften von Klassen bewusst nutzen. Die Besonderheiten der Programmierung mit grafischen Oberflächen sind ihnen bekannt.', 'Die  Studierenden  haben  Algorithmen  aus  verschiedenen  Gebieten  kennengelernt,  darunter  Sortier-algorithmen und Suchalgorithmen, Graphenalgorithmen und Algorithmen der Textverarbeitung.Die   Studierenden   beherrschen   die   Beschreibung   eines   Algorithmus   in   einer   objektorientierten   Programmiersprache. Die grundlegenden Prinzipien der Arbeit mit Klassen und Objekten sind bekannt. Sie kennen die Besonderheiten der plattformunabhängigen Programmierung.', 'Die Studierenden  verfügen  über  Fähigkeiten,  die  Leistungsparameter  von  Algorithmen  unter  dem  Aspekt ihrer Nutzung zu analysieren und die für eine Anwendung geeigneten auszuwählen.Die Studierenden werden befähigt, Konzepte der objektorientierten Programmierung zu verstehen. Sie sind in der Lage, Algorithmen mit den Sprachelementen einer objektorientierten Programmiersprache zu formulieren. Sie beherrschen Entwicklungswerkzeuge der betreffenden Programmiersprache.', 'Die Studierenden kennen grundlegende Qualitätsmerkmale von Algorithmen und Programmen, können gegebene  Algorithmen  und  Programme  anhand  der  Kriterien  bewerten,  verschiedene  Merkmale  gegeneinander abwägen und bei der Erstellung eigener Programme berücksichtigenDie  Studierenden  können  die  Grundprinzipien  der  objektorientierten  Programmierung  in  eigenen  Programmen  anwenden.  Sie  sind  in  der  Lage,  Problemstellungen  in  Klassen  zu  zerlegen  und  diese  nach  den  Regeln  der  objektorientierten  Programmierung  mit  den  gegebenen  Möglichkeiten  der  Programmiersprache zu realisieren. ', 'Die Studierenden   sind   in   der   Lage,   auftretende   Probleme   im   Rahmen   des   Prozesses   der   Programmentwicklung im Team gemeinsam zu erörtern und zu lösen, die Ergebnisse zu erläutern, zu demonstrieren und zu verteidigen. Erhaltene Hinweise können sie in ihre Lösung einarbeiten.', 'Herr Prof. Dipl.-Math. Engelhardt ', 'Informationstechnik@ba-dresden.de', 'Deutsch', 'Jährlich', 'Skripte und Übungsbeispiele des Lehrbeauftragten', NULL, NULL, NULL, NULL, '3', 7.5, NULL, 0, 6);

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
(2, 1, 88, NULL, 1, 7),
(2, 3, 2, NULL, 1, 8),
(2, 6, 40, 1, 1, 9),
(2, 6, 50, 0, 1, 10),
(3, 1, 60, NULL, 1, 11),
(3, 7, 20, 1, 1, 12),
(3, 3, 10, 0, 1, 13),
(3, 1, 60, NULL, 2, 14),
(3, 8, 20, 1, 2, 15),
(3, 2, 10, 0, 2, 16),
(6, 1, 90, NULL, 2, 17),
(6, 2, 50, 0, 2, 18),
(6, 6, 40, 1, 2, 19),
(1, 1, 60, NULL, 1, 50);

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
(2, NULL, 1, 2),
(3, 2, 0, 4),
(6, NULL, 1, 5),
(1, NULL, 1, 35);

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
-- Daten für Tabelle `module_literature_mm`
--

INSERT INTO `module_literature_mm` (`moduleID`, `literatureID`, `basicLiteratureFlag`, `ID`) VALUES
(2, 1, 1, 2),
(3, 1, 1, 3),
(6, 1, 1, 4),
(1, 1, 1, 55),
(1, 1, 0, 56);

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
  ADD PRIMARY KEY (`ID`),
  ADD KEY `moduleID` (`moduleID`);

--
-- Indizes für die Tabelle `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `courseID` (`courseID`);

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
  ADD PRIMARY KEY (`ID`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `module_category_mm_ibfk_2` (`moduleID`);

--
-- Indizes für die Tabelle `module_field_mm`
--
ALTER TABLE `module_field_mm`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `moduleID` (`moduleID`);

--
-- Indizes für die Tabelle `module_literature_mm`
--
ALTER TABLE `module_literature_mm`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `literatureID` (`literatureID`),
  ADD KEY `moduleID` (`moduleID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `courses`
--
ALTER TABLE `courses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `exams`
--
ALTER TABLE `exams`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT für Tabelle `fields`
--
ALTER TABLE `fields`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `literature`
--
ALTER TABLE `literature`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `modules`
--
ALTER TABLE `modules`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `module_category_mm`
--
ALTER TABLE `module_category_mm`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT für Tabelle `module_field_mm`
--
ALTER TABLE `module_field_mm`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT für Tabelle `module_literature_mm`
--
ALTER TABLE `module_literature_mm`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_ibfk_1` FOREIGN KEY (`moduleID`) REFERENCES `modules` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `fields`
--
ALTER TABLE `fields`
  ADD CONSTRAINT `fields_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `courses` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `module_category_mm`
--
ALTER TABLE `module_category_mm`
  ADD CONSTRAINT `module_category_mm_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `module_category_mm_ibfk_2` FOREIGN KEY (`moduleID`) REFERENCES `modules` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `module_field_mm`
--
ALTER TABLE `module_field_mm`
  ADD CONSTRAINT `module_field_mm_ibfk_1` FOREIGN KEY (`moduleID`) REFERENCES `modules` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `module_literature_mm`
--
ALTER TABLE `module_literature_mm`
  ADD CONSTRAINT `module_literature_mm_ibfk_1` FOREIGN KEY (`literatureID`) REFERENCES `literature` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `module_literature_mm_ibfk_2` FOREIGN KEY (`moduleID`) REFERENCES `modules` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
