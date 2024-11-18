-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2024 at 12:23 PM
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
-- Database: `db_certificate`
--

-- --------------------------------------------------------

--
-- Table structure for table `nilai_pkl`
--

CREATE TABLE `nilai_pkl` (
  `id` int(11) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `nilai_kerajinan` int(11) DEFAULT NULL,
  `nilai_disiplin` int(11) DEFAULT NULL,
  `nilai_kerjasama` int(11) DEFAULT NULL,
  `nilai_inisiatif` int(11) DEFAULT NULL,
  `nilai_tanggung_jawab` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai_pkl`
--

INSERT INTO `nilai_pkl` (`id`, `nisn`, `nama_lengkap`, `jurusan`, `tanggal_mulai`, `tanggal_selesai`, `nilai_kerajinan`, `nilai_disiplin`, `nilai_kerjasama`, `nilai_inisiatif`, `nilai_tanggung_jawab`, `created_at`) VALUES
(1, '1293743800221', 'cecep', 'teknik mesin', '2024-11-18', '2025-01-18', 100, 100, 100, 100, 100, '2024-11-18 01:36:15'),
(2, '129374380075', 'budi hasclaw', 'teknik mesin', '2024-11-18', '2025-01-18', 100, 100, 100, 100, 100, '2024-11-18 01:58:49'),
(3, '23932323004', 'ucup glowing wand', 'teknik mesin', '2024-11-18', '2025-01-18', 100, 100, 100, 100, 100, '2024-11-18 05:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$lAU1XFmriwHuj0spb/B6cOXBSa9GlXc1xbZ76dVmGi1NpxQXE/B4.', 'admin'),
(3, 'orcus', 'orcus12@gmail.com', '$2y$10$VDmJUmxIAlaOhZ/9AEnSpOpxHsqkF/iqP5J/a8QkDNID5BEqiTBh6', 'user'),
(4, 'ujang', 'ujang99@gmail.com', '$2y$10$Dw8iuLd.FbZ2Xf4jS4S4X.IGMGA5syZ4b8uKJuCv/BYXKxzYqjyh2', 'user'),
(5, 'jajang', 'jajang10@gmail.com', '$2y$10$KJcO4Ur9js6PVy0PlopgF.CXFd2Yzwpg.oGhTQL7bX7x6iNY1mjhy', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nilai_pkl`
--
ALTER TABLE `nilai_pkl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nilai_pkl`
--
ALTER TABLE `nilai_pkl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
