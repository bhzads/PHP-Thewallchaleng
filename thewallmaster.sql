-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2018 at 12:32 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thewallmaster`
--
CREATE DATABASE IF NOT EXISTS `thewallmaster` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `thewallmaster`;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `text` text,
  `upvoet` bigint(20) DEFAULT '0',
  `user_id` bigint(20) DEFAULT NULL,
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `text`, `upvoet`, `user_id`, `create_date`) VALUES
(17, 'In het Limburgse Neer wordt dit weekend het Europees Schutterstreffen gehouden. 12.000 schutters van 500 schutterijen, schutbroederschappen en schuttersgildes uit heel Europa zijn bij elkaar gekomen om deel te nemen aan schietwedstrijden, demonstraties, vendelzwaaien, marcheren en exerceren.', 3, 22, '2018-08-18 14:27:21'),
(18, 'Hun opkomst hangt samen met het ontstaan van de eerste steden in Nederland. Toen steden stadsrechten kregen, werden ze verantwoordelijk voor hun eigen veiligheid en verdediging. De naam van de schutterij kan daar van afstammen. De eerste schuttersgilden \'beschutten\' de burgerij. Ook kan de naam slaan op \'schieten\' vanwege de wapens die het gilde gebruikte, namelijk schutterswapens als bogen en later geweren.', 0, 22, '2018-08-18 14:27:38'),
(20, 'De schutters waren vrijwilligers die het naast hun dagelijkse werk deden. Ze kregen er dus niet voor betaald. Niet iedereen stond daarom te springen om bij de schutterij te komen, maar je kon er ook niet altijd onderuit. De beroepsgildes, waarin alle mensen die een bepaald beroep uitoefenden waren verenigd, moesten mannen leveren die in een soort rotatierooster dienst deden ', 4, 23, '2018-08-18 14:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `fullname` varchar(32) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`) VALUES
(22, 'bhzads', 'bhzads@hotmail.com', 'fa43fb647d0cf4426e40f7eedefeff1b7d1a34325de53586fb4c7b0d72de0682ec537a6beecadda03c06b24ceaa729c76d24bba56be69155911b530279fb340dlGWO/nqwUp/CPnEu62350GCCV5KOSZ5DvETRyzWY05Q='),
(23, 'user', 'user@test.com', 'dc83baa856a7066e2c43017ac22fa3952988fc7f3b15aac09795e27c6bebcf1d3c9a252ae88874da717f3bccd1e04769b7bb4c783f6d5bfa208753f10a535a6dCkx3mUjP1NoX24FhNVf7GodUAdmrNhMiRsfdeyxLsaw=');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ind_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
