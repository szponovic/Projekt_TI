-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lip 04, 2023 at 10:49 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lib`
--
CREATE DATABASE IF NOT EXISTS `lib` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `lib`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `book_id` int(100) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `author` varchar(150) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `year` year(4) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'dostępne',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- RELACJE DLA TABELI `books`:
--

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `author`, `genre`, `year`, `picture`, `status`, `description`) VALUES
(4, 'HP', 'JKR', 'scifi', '1999', 'sowa.png', '3', 'Cykl przedstawia świat magii, czyli społeczność czarodziejów, istniejącą równolegle do świata niemagicznego, tak zwanego mugolskiego. Głównymi bohaterami są nastoletni Harry Potter oraz jego przyjaciele: Ron Weasley i Hermiona Granger, uczniowie Szkoły Magii i Czarodziejstwa w Hogwarcie.'),
(7, 'rf', 'ygu', 'gy', '2000', 'g', '4', 'fy'),
(8, 'HP2', 'JKK', 'dcifi', '2008', 'ghfdefg.png', 'dostępne', '2dtghhafadfah');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `borrowings`
--

DROP TABLE IF EXISTS `borrowings`;
CREATE TABLE `borrowings` (
  `borrowing_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(100) UNSIGNED NOT NULL,
  `book_id` int(100) UNSIGNED NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- RELACJE DLA TABELI `borrowings`:
--   `user_id`
--       `users` -> `user_id`
--   `book_id`
--       `books` -> `book_id`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `role_id` int(1) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- RELACJE DLA TABELI `roles`:
--

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `name`) VALUES
(1, 'użytkownik'),
(2, 'bibliotekarz'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(3) UNSIGNED NOT NULL,
  `imie` varchar(100) DEFAULT NULL,
  `nazwisko` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `role_id` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- RELACJE DLA TABELI `users`:
--   `role_id`
--       `roles` -> `role_id`
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `imie`, `nazwisko`, `email`, `haslo`, `role_id`) VALUES
(7, 'Q', 'Q', 'q', 'q', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indeksy dla tabeli `borrowings`
--
ALTER TABLE `borrowings`
  ADD PRIMARY KEY (`borrowing_id`),
  ADD KEY `user_id` (`user_id`,`book_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indeksy dla tabeli `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `borrowings`
--
ALTER TABLE `borrowings`
  MODIFY `borrowing_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowings`
--
ALTER TABLE `borrowings`
  ADD CONSTRAINT `borrowings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrowings_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
