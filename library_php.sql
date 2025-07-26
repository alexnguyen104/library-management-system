-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2025 at 09:26 AM
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
-- Database: `library_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `ID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `genres` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ID`, `title`, `author`, `quantity`, `genres`) VALUES
(1, 'Harry Potter', 'J. K. Rowling', 100, 'Fantasy;Magical Realism'),
(2, 'Charlie and the chocolate factory', 'Roald Dahl', 121, 'Fantasy'),
(3, 'Diary of a Wimpy Kid', 'Jeff Kinney', 250, 'Comedy'),
(4, 'ABC', 'XYZ', 12, 'Romance;Science Fiction;Fantasy');

-- --------------------------------------------------------

--
-- Table structure for table `borrowers`
--

CREATE TABLE `borrowers` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_num` varchar(10) NOT NULL,
  `book` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `borrowers`
--

INSERT INTO `borrowers` (`ID`, `name`, `phone_num`, `book`, `start_date`, `end_date`) VALUES
(104, 'Nguyen', '0123456789', 'Harry Potter;Charlie and the chocolate factory', '2025-07-24', '2025-07-31'),
(123, 'Alex', '0999999999', 'Diary of a Wimpy Kid;ABC', '2025-07-08', '2025-07-25'),
(208, 'Jennifer', '0987654321', 'Harry Potter;Charlie and the chocolate factory;Diary of a Wimpy Kid', '2025-07-26', '2025-07-26'),
(228, 'Alexander Alex', '0999999910', 'Harry Potter', '2025-07-26', '2025-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `ID` int(11) NOT NULL,
  `genres` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`ID`, `genres`) VALUES
(1, 'Literary fiction'),
(2, 'Mystery'),
(3, 'Thriller'),
(4, 'Horror'),
(5, 'Historical fiction'),
(6, 'Romance'),
(7, 'Western'),
(8, 'Bildungsroman'),
(9, 'Science Fiction'),
(10, 'Fantasy'),
(11, 'Dystopian'),
(12, 'Magical Realism'),
(13, 'Realist Literature'),
(14, 'Contemporary Fiction'),
(15, 'Comedy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `borrowers`
--
ALTER TABLE `borrowers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
