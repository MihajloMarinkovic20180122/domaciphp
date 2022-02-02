-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2022 at 03:39 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `domaciphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `automobili`
--

CREATE TABLE `automobili` (
  `Automobil_ID` int(11) NOT NULL,
  `Naziv` varchar(100) NOT NULL,
  `Cena` decimal(11,0) NOT NULL,
  `DatumUnosa` date DEFAULT NULL,
  `Radnik_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `automobili`
--

INSERT INTO `automobili` (`Automobil_ID`, `Naziv`, `Cena`, `DatumUnosa`, `Radnik_ID`) VALUES
(1, 'Audi A7', '200', '2022-02-01', 2),
(2, 'BMW X6', '180', '2022-02-01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `izvestaji`
--

CREATE TABLE `izvestaji` (
  `izvestaj_id` int(20) NOT NULL,
  `datum_izvestaja` date NOT NULL,
  `izvestaj` longtext NOT NULL,
  `uneo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `izvestaji`
--

INSERT INTO `izvestaji` (`izvestaj_id`, `datum_izvestaja`, `izvestaj`, `uneo`) VALUES
(21, '2022-02-01', '2.1.2022.\r\nIzdat je Audi A7 na 2 dana (48h) \r\nIme i Prezime: Marko Markovic\r\nJMBG: 0123456789 \r\nBroj telefona: 064123456', 'Miha853');

-- --------------------------------------------------------

--
-- Table structure for table `zaposleni`
--

CREATE TABLE `zaposleni` (
  `Radnik_ID` int(11) NOT NULL,
  `Ime` varchar(100) NOT NULL,
  `Prezime` varchar(100) NOT NULL,
  `Datum_Rodjenja` date DEFAULT NULL,
  `Sifra` varchar(100) NOT NULL,
  `Korisnicko_Ime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zaposleni`
--

INSERT INTO `zaposleni` (`Radnik_ID`, `Ime`, `Prezime`, `Datum_Rodjenja`, `Sifra`, `Korisnicko_Ime`) VALUES
(1, 'admin', 'admin', '1999-06-04', 'admin', 'admin'),
(2, 'Mihajlo', 'Marinkovic', '1999-06-04', 'mihacar', 'Miha853'),
(3, 'Nikola', 'Nikolic', '1997-06-25', '123', 'nikola');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `automobili`
--
ALTER TABLE `automobili`
  ADD PRIMARY KEY (`Automobil_ID`),
  ADD KEY `Uneo` (`Radnik_ID`);

--
-- Indexes for table `izvestaji`
--
ALTER TABLE `izvestaji`
  ADD PRIMARY KEY (`izvestaj_id`);

--
-- Indexes for table `zaposleni`
--
ALTER TABLE `zaposleni`
  ADD PRIMARY KEY (`Radnik_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `izvestaji`
--
ALTER TABLE `izvestaji`
  MODIFY `izvestaj_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `automobili`
--
ALTER TABLE `automobili`
  ADD CONSTRAINT `Uneo` FOREIGN KEY (`Radnik_ID`) REFERENCES `zaposleni` (`Radnik_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
