-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 04:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brgy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `barangay` text DEFAULT NULL,
  `comp` text NOT NULL,
  `file` text NOT NULL,
  `pending` int(11) DEFAULT NULL,
  `date` text NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `nature` text NOT NULL,
  `incident` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_credentials`
--

CREATE TABLE `tbl_admin_credentials` (
  `id` int(11) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `middle_name` varchar(200) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin_credentials`
--

INSERT INTO `tbl_admin_credentials` (`id`, `last_name`, `first_name`, `middle_name`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', '$2y$10$lvBXIolFQqmeHJzhjo06BOsa5UiUtE42w78ziu9tdhghlR/Ynswzu'),
(2, 'lastica', 'mark', 'aldrin', 'user', 'user'),
(3, 'lastica', 'mark', 'aldrin', 'user', 'user'),
(4, 'lastica', 'mark', 'aldrin', 'users', 'user'),
(5, 'newonly', 'newonly', 'newonly', 'newonly', '$2y$10$wn3pCl3.VPv7l8MKsx5gxe/EyKIdNYQxGciZiP4ezyLGpzTQG5yUa'),
(6, 'pogi', 'miguelfranz', '321e', '321e', '$2y$10$hALq9R0y0kCairlanN3xv.cNpkiyBWaY.9CEGzzY7yBz2ii5sIBKa'),
(7, 'b1322', 'b132', 'b132', 'b132', '$2y$10$XBB5l.kcy/yrjH1Y/jWr1.LS8hJP.4WLtbn/hKmxS2iJWAkmdfDH.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_credentials`
--

CREATE TABLE `tbl_user_credentials` (
  `id` int(55) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user_credentials`
--

INSERT INTO `tbl_user_credentials` (`id`, `last_name`, `first_name`, `username`, `password`, `phone_number`, `address`) VALUES
(1, '4242', '4242', '4242', '4242', '4242', '4242');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_credentials`
--
ALTER TABLE `tbl_admin_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_credentials`
--
ALTER TABLE `tbl_user_credentials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin_credentials`
--
ALTER TABLE `tbl_admin_credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_user_credentials`
--
ALTER TABLE `tbl_user_credentials`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
