-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2025 at 08:23 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2a$12$m4y1X0Fx4xu4.ZzVPL1CCem1fJHOxlrgLqbmqaNI5g//dq3whphpi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('on','off') NOT NULL DEFAULT 'on',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'qwe', 'qwe', 'qwe@qwe2', 'qwe', '$2y$10$IYTZRmIa8CCUflFaMDYKX.lJycf3KfWYmaHG3FbkShoSZGJ.bX8/u', 'on', '2025-02-15 16:55:34', '2025-02-15 16:55:34'),
(2, 'e', 'eeee', 'ic02@gmail.com', 'qweqwe', '$2y$10$yJqmDxJqeStE82RsJA1JiOsKEXZnVotGGuCDyTjGJnuD/caQxg11K', 'on', '2025-02-15 22:11:40', '2025-02-15 22:11:40'),
(4, 'sample', 'sample', 'carlcastuel@gmail.com', 'qwe2', '$2y$10$vVqEBhofIxh2heFAFO1RjeKPTlD.5ekgIcRRYXmGqm/NkJX3JcspC', 'on', '2025-02-15 22:33:08', '2025-02-15 22:33:08'),
(5, 'sample', 'sample', 'carlcastuel@gmail.com', 'jjk', '$2y$10$vjdBCKCoEdrVdKIVgs81l.Zr0YCABpkEPDOL/5nY/HJYVw0dYuWxy', 'on', '2025-02-15 23:35:23', '2025-02-15 23:35:23'),
(6, 'sample22', 'sample22', 'in02@gmail.com', 'v1', '$2y$10$C3Q2UN5OPnOgmfyWNLiVLO8stOxgm6sixoYy6vuoF09eDiDBAK1e2', 'on', '2025-02-16 01:14:53', '2025-02-16 01:14:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
