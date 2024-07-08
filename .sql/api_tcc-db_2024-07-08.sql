-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 08, 2024 at 01:34 AM
-- Server version: 8.2.0
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api_tcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `sys_keys`
--

CREATE TABLE `sys_keys` (
  `ss_key_id` int NOT NULL,
  `ss_client_name` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `ss_client_key` varchar(85) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sys_keys`
--

INSERT INTO `sys_keys` (`ss_key_id`, `ss_client_name`, `ss_client_key`, `create_at`, `updated_at`) VALUES
(1, 'Student Information System API', 'a71d14fe67c98c4ed4f47868792dee0f65ba1e4a98e46de6d6ea2be4d070830e', '2024-07-06 01:09:06', '2024-07-06 01:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `sys_klogs`
--

CREATE TABLE `sys_klogs` (
  `log_id` int NOT NULL,
  `log_key_id` int NOT NULL,
  `log_username` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `log_status` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `log_ip_address` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `log_browser` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sys_klogs`
--

INSERT INTO `sys_klogs` (`log_id`, `log_key_id`, `log_username`, `log_status`, `log_ip_address`, `log_browser`, `created_at`, `updated_at`) VALUES
(4, 1, '20231054', 'Authorized', '::1', 'PostmanRuntime/7.39.0', '2024-07-06 03:57:32', '2024-07-06 03:57:32'),
(5, 1, '20231054', 'Authorized', '::1', 'PostmanRuntime/7.39.0', '2024-07-06 04:00:48', '2024-07-06 04:00:48'),
(6, 1, '20231054', 'Authorized', '::1', 'PostmanRuntime/7.39.0', '2024-07-06 05:00:02', '2024-07-06 05:00:02'),
(7, 1, '20231054', 'Authorized', '::1', 'PostmanRuntime/7.39.0', '2024-07-06 06:44:04', '2024-07-06 06:44:04'),
(8, 1, '20231054', 'Authorized', '::1', 'PostmanRuntime/7.39.0', '2024-07-06 07:47:05', '2024-07-06 07:47:05');

-- --------------------------------------------------------

--
-- Table structure for table `sys_repository`
--

CREATE TABLE `sys_repository` (
  `rep_id` int NOT NULL,
  `rep_source` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `rep_keys` varchar(85) COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sys_repository`
--

INSERT INTO `sys_repository` (`rep_id`, `rep_source`, `rep_keys`, `create_at`, `updated_at`) VALUES
(1, 'secret_key', 'e75aa73455222e766d70b407a3594837f5fcf373875d1ac5376253763b5c6908', '2024-07-06 01:15:33', '2024-07-06 01:15:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sys_keys`
--
ALTER TABLE `sys_keys`
  ADD PRIMARY KEY (`ss_key_id`);

--
-- Indexes for table `sys_klogs`
--
ALTER TABLE `sys_klogs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `sys_repository`
--
ALTER TABLE `sys_repository`
  ADD PRIMARY KEY (`rep_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sys_keys`
--
ALTER TABLE `sys_keys`
  MODIFY `ss_key_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sys_klogs`
--
ALTER TABLE `sys_klogs`
  MODIFY `log_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sys_repository`
--
ALTER TABLE `sys_repository`
  MODIFY `rep_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
