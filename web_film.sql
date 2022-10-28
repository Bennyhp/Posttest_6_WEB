-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 01:30 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_film`
--

-- --------------------------------------------------------

--
-- Table structure for table `appendix`
--

CREATE TABLE `appendix` (
  `id_appendix` int(13) NOT NULL,
  `id_films` int(13) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `time_uploaded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appendix`
--

INSERT INTO `appendix` (`id_appendix`, `id_films`, `file_name`, `file`, `time_uploaded`) VALUES
(25, 50, 'oceaneleven', 'oceaneleven.jpeg', '2022-10-28 19:26:37'),
(28, 53, 'oceantwelve', 'oceantwelve.jpg', '2022-10-28 19:26:06'),
(29, 54, 'oceanthirteen', 'oceanthirteen.jpg', '2022-10-28 19:28:06');

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id_films` int(13) NOT NULL,
  `title` varchar(64) NOT NULL,
  `year` int(4) NOT NULL,
  `genre` varchar(64) NOT NULL,
  `duration` varchar(64) NOT NULL,
  `ratings` float NOT NULL,
  `rent` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id_films`, `title`, `year`, `genre`, `duration`, `ratings`, `rent`) VALUES
(50, 'Ocean&#039;s Eleven ', 2001, 'Crime/Comedy', '1h 56m', 7.7, 25000),
(53, 'Ocean&#039;s Twelve', 2004, 'Crime/Comedy', '2h 5m', 6.3, 25000),
(54, 'Ocean&#039;s Thirteen', 2007, 'Crime/Comedy', '1h 53m', 6.9, 25000);

-- --------------------------------------------------------

--
-- Table structure for table `rented`
--

CREATE TABLE `rented` (
  `id_rented` int(13) NOT NULL,
  `id_films` int(13) NOT NULL,
  `id_renters` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rented`
--

INSERT INTO `rented` (`id_rented`, `id_films`, `id_renters`) VALUES
(11, 50, 11);

-- --------------------------------------------------------

--
-- Table structure for table `renters`
--

CREATE TABLE `renters` (
  `id_renters` int(13) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `renters`
--

INSERT INTO `renters` (`id_renters`, `name`, `email`) VALUES
(5, 'Testing', '123@gmail.com'),
(8, 'Testing', '123@gmail.com'),
(9, 'Testing', '123@gmail.com'),
(11, 'Testing', '123@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appendix`
--
ALTER TABLE `appendix`
  ADD PRIMARY KEY (`id_appendix`),
  ADD KEY `id_films` (`id_films`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id_films`);

--
-- Indexes for table `rented`
--
ALTER TABLE `rented`
  ADD PRIMARY KEY (`id_rented`),
  ADD KEY `id_films` (`id_films`,`id_renters`),
  ADD KEY `id_renters` (`id_renters`);

--
-- Indexes for table `renters`
--
ALTER TABLE `renters`
  ADD PRIMARY KEY (`id_renters`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appendix`
--
ALTER TABLE `appendix`
  MODIFY `id_appendix` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id_films` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `rented`
--
ALTER TABLE `rented`
  MODIFY `id_rented` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `renters`
--
ALTER TABLE `renters`
  MODIFY `id_renters` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appendix`
--
ALTER TABLE `appendix`
  ADD CONSTRAINT `appendix_ibfk_1` FOREIGN KEY (`id_films`) REFERENCES `films` (`id_films`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rented`
--
ALTER TABLE `rented`
  ADD CONSTRAINT `rented_ibfk_1` FOREIGN KEY (`id_renters`) REFERENCES `renters` (`id_renters`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rented_ibfk_2` FOREIGN KEY (`id_films`) REFERENCES `films` (`id_films`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
