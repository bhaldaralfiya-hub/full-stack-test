-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2026 at 09:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wpoets_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `label` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `button_text` varchar(100) DEFAULT 'Learn More',
  `image` varchar(255) NOT NULL,
  `sort_order` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `category`, `label`, `title`, `button_text`, `image`, `sort_order`, `created_at`, `icon`) VALUES
(2, 'Learning', 'DIGITAL LEARNING INFRASTRUCTURE', 'Usability enhancement and Training for Transaction Portal for Customers', 'Learn More', 'learning.jpg', 0, '2026-06-02 07:43:32', 'learning.svg'),
(3, 'Technology', 'TECHNOLOGY SOLUTIONS', 'Technology Solutions for Business Growth', 'Learn More', 'technology.jpg', 0, '2026-06-02 12:57:32', 'technology.svg'),
(4, 'Communication', 'COMMUNICATION SERVICES', 'Effective Communication Platform', 'Learn More', 'communication.jpg', 0, '2026-06-02 12:59:14', 'communication.svg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
