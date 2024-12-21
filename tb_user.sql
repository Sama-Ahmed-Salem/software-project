-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2024 at 02:27 PM
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
-- Database: `reglog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `name` VARCHAR(25) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `password` VARCHAR(75) NOT NULL,
  `role` VARCHAR(10) NOT NULL DEFAULT 'user',
  `role` VARCHAR(10) NOT NULL DEFAULT 'user',
  `feedback` TEXT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`name`, `email`, `password`,`role`,  `feedback`) VALUES
('jana', 'jana1@gmail.com', PASSWORD('jana123'), 'admin',NULL),
('sama', 'sama1@gmail.com', PASSWORD('sama123'), 'user',NULL),
('mostafa', 'mostafa1@gmail.com', PASSWORD('mostafa123'), 'user',NULL),
('habiba', 'habiba1@example.com', PASSWORD('habiba123'), 'user',NULL),
('shaaban', 'shaaban1@gmail.com', PASSWORD('shaaban123'), 'user',NULL);
INSERT INTO `tb_user` (`name`, `email`, `password`,`role`, `feedback`) VALUES
('jana', 'jana1@gmail.com', PASSWORD('jana123'),'admin', NULL),
('sama', 'sama1@gmail.com', PASSWORD('sama123'),'user', NULL),
('mostafa', 'mostafa1@gmail.com', PASSWORD('mostafa123'), 'user',NULL),
('habiba', 'habiba1@example.com', PASSWORD('habiba123'),'user', NULL),
('shaaban', 'shaaban1@gmail.com', PASSWORD('shaaban123'), 'user',NULL);

-- --------------------------------------------------------

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
