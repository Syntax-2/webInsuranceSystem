-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2024 at 07:56 PM
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
-- Database: `draudimusistema`
--

-- --------------------------------------------------------

--
-- Table structure for table `darbuotojai`
--

CREATE TABLE `darbuotojai` (
  `darbuotojo_username` varchar(30) NOT NULL,
  `darbuotojo_slaptazodis` varchar(30) NOT NULL,
  `darbuotojo_email` varchar(30) NOT NULL,
  `telefono_nr` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `darbuotojai`
--

INSERT INTO `darbuotojai` (`darbuotojo_username`, `darbuotojo_slaptazodis`, `darbuotojo_email`, `telefono_nr`) VALUES
('admin1', 'YWRtaW4x', 'titasnori12@gmail.com', 863549597),
('admin11', 'YWRtaW4xMQ==', 'liutauras@gmail.com', 864545472),
('darbuotojas', 'ZGFyYnVvdG9qYXM=', 'darbuotojas@gmail.com', 156546),
('puikus', 'cHVpa3Vz', 'puikus', 8645461);

-- --------------------------------------------------------

--
-- Table structure for table `draudimo_polisai`
--

CREATE TABLE `draudimo_polisai` (
  `draudimo_id` int(20) NOT NULL,
  `kategorija` varchar(50) NOT NULL,
  `draudimo_suma` int(20) NOT NULL,
  `menesine_imoka` int(20) NOT NULL,
  `aprasas` varchar(50) NOT NULL,
  `salygu_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `draudimo_polisai`
--

INSERT INTO `draudimo_polisai` (`draudimo_id`, `kategorija`, `draudimo_suma`, `menesine_imoka`, `aprasas`, `salygu_id`) VALUES
(7, 'MINI', 100, 5, 'Telefono draudimas', 12),
(8, 'MINI', 50, 11, 'Telefono draudimas', 17),
(9, 'MAXI', 190, 34, 'Privalomasis draudimas', 10),
(10, 'MINI', 90, 24, 'Privalomasis draudimas', 0),
(12, 'MAXI', 1000, 50, 'Buto draudimas', 15),
(13, 'MINI', 100, 24, 'Nešiojamo draudimas', 9),
(15, 'MAXI', 200, 24, 'Ausiniu draudimas', 15);

-- --------------------------------------------------------

--
-- Table structure for table `nepatvirtinti_draud`
--

CREATE TABLE `nepatvirtinti_draud` (
  `nepatvirtinto_id` int(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `draudimo_id` int(20) NOT NULL,
  `papildoma_info` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nepatvirtinti_draud`
--

INSERT INTO `nepatvirtinti_draud` (`nepatvirtinto_id`, `user_name`, `draudimo_id`, `papildoma_info`) VALUES
(103, 'lukas', 13, 'Nešiojamo draudimas'),
(105, 'lukas', 8, 'Telefono draudimas'),
(121, 'lukas', 7, 'Telefono draudimas');

-- --------------------------------------------------------

--
-- Table structure for table `patvirtinti_draud`
--

CREATE TABLE `patvirtinti_draud` (
  `uzsakyto_id` int(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `draudimo_id` int(20) NOT NULL,
  `draudimo_aprasas` varchar(30) NOT NULL,
  `uzsakymo_data` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patvirtinti_draud`
--

INSERT INTO `patvirtinti_draud` (`uzsakyto_id`, `user_name`, `draudimo_id`, `draudimo_aprasas`, `uzsakymo_data`) VALUES
(55, 'nedas', 8, 'Telefono draudimas', '2023-01-12'),
(56, 'nedas', 8, 'Telefono draudimas', '2023-01-12'),
(57, 'lukas geras', 9, 'Privalomasis draudim', '2023-01-12'),
(58, 'lukas geras', 9, 'Privalomasis draudim', '2023-01-12'),
(59, 'rokas', 9, 'Privalomasis draudim', '2023-01-12'),
(60, 'rokas', 9, 'Privalomasis draudim', '2023-01-12'),
(61, 'lukas geras', 10, 'Privalomasis draudim', '2023-01-12'),
(65, 'nedas', 10, 'Peles draudimas', '2023-01-18'),
(68, 'lukas', 8, 'Telefono draudimas', '2024-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `privati_info`
--

CREATE TABLE `privati_info` (
  `info_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `adresas` varchar(50) NOT NULL,
  `gimimo_data` varchar(20) NOT NULL,
  `lytis` varchar(20) NOT NULL,
  `telefono_nr` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `privati_info`
--

INSERT INTO `privati_info` (`info_id`, `user_name`, `adresas`, `gimimo_data`, `lytis`, `telefono_nr`) VALUES
(9, 'nedas', 'Svyturio g.7', '1987-03-19', 'vyras', '863577978'),
(10, 'rokas', 'Naujoji g. 26', '1987-03-19', 'moteris', '5656565'),
(13, 'lukas', 'pabaliu 7', '2024/02/24', 'vyras', '8684512312');

-- --------------------------------------------------------

--
-- Table structure for table `salygos`
--

CREATE TABLE `salygos` (
  `salygu_id` int(20) NOT NULL,
  `minimalus_amzius` int(20) NOT NULL,
  `minimalus_terminas` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salygos`
--

INSERT INTO `salygos` (`salygu_id`, `minimalus_amzius`, `minimalus_terminas`) VALUES
(0, 41, 6),
(8, 16, 1),
(9, 41, 16),
(10, 15, 3),
(11, 34, 6),
(12, 15, 12),
(13, 20, 6),
(14, 34, 1),
(15, 18, 3),
(16, 19, 10),
(17, 24, 3),
(18, 22, 2),
(19, 15, 6),
(20, 25, 1),
(21, 10, 6),
(24, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vartotojai`
--

CREATE TABLE `vartotojai` (
  `user_id` int(30) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vartotojai`
--

INSERT INTO `vartotojai` (`user_id`, `user_name`, `password`, `email`, `date`) VALUES
(26, 'jonas blogas', 'bGl0YXM=', 'liutauras@gmail.com', '2023-01-18 15:41:36'),
(24, 'jonas jonas', 'am9uYXM=', 'karoliskarolis@gmail', '2023-01-18 15:36:23'),
(21, 'lina naujokeeeeee', 'YkdsdVlRPT0=', 'linaNauja@gmail.com', '2023-01-18 15:41:13'),
(20, 'liutauras nauckunas', 'bGl1dGF1cmFz', 'liutauras@gmail.com', '2023-01-18 13:28:57'),
(11, 'lukas', 'bHVrYXM=', 'lukas@gmail.com', '2022-12-16 05:05:48'),
(16, 'lukas geras', 'bGl0YXM=', 'titasgigas12@gmail.c', '2023-01-12 16:00:15'),
(12, 'lukutis', 'bHVrYXM=', 'elonas@gmail.com', '2022-12-20 17:42:56'),
(13, 'lukutisss', 'bHVrYXM=', 'elonas@gmail.com', '2022-12-20 17:42:59'),
(5, 'nedas', 'bmVkYXM=', 'plovoG@gmail.com', '2022-12-16 04:37:47'),
(8, 'niekas', 'bmlla2Fz', 'admin@gmail.com', '2022-12-16 04:37:51'),
(17, 'petras gilinskas', 'cGV0cmFz', 'titasgigas12@gmail.c', '2023-01-18 13:19:51'),
(22, 'ponas dronas', 'cG9uYXM=', 'yevkfzj360@couldmail', '2023-01-18 13:47:04'),
(10, 'rokas', 'cm9rYXM=', 'rokas@gmail.com', '2022-12-16 04:45:30'),
(6, 'sveikas', 'c3ZlaWthcw==', 'noranora@gmail.com', '2022-12-16 04:37:56'),
(14, 'Titas norkus', 'dGl0YXM=', 'titasnorkus@gmail.co', '2022-12-20 19:27:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `darbuotojai`
--
ALTER TABLE `darbuotojai`
  ADD PRIMARY KEY (`darbuotojo_username`);

--
-- Indexes for table `draudimo_polisai`
--
ALTER TABLE `draudimo_polisai`
  ADD PRIMARY KEY (`draudimo_id`),
  ADD KEY `salygu_id` (`salygu_id`);

--
-- Indexes for table `nepatvirtinti_draud`
--
ALTER TABLE `nepatvirtinti_draud`
  ADD PRIMARY KEY (`nepatvirtinto_id`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `draudimo_id` (`draudimo_id`);

--
-- Indexes for table `patvirtinti_draud`
--
ALTER TABLE `patvirtinti_draud`
  ADD PRIMARY KEY (`uzsakyto_id`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `draudimo_id` (`draudimo_id`),
  ADD KEY `draudimo_aprasas` (`draudimo_aprasas`);

--
-- Indexes for table `privati_info`
--
ALTER TABLE `privati_info`
  ADD PRIMARY KEY (`info_id`),
  ADD KEY `user_name` (`user_name`);

--
-- Indexes for table `salygos`
--
ALTER TABLE `salygos`
  ADD PRIMARY KEY (`salygu_id`);

--
-- Indexes for table `vartotojai`
--
ALTER TABLE `vartotojai`
  ADD PRIMARY KEY (`user_name`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `draudimo_polisai`
--
ALTER TABLE `draudimo_polisai`
  MODIFY `draudimo_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `nepatvirtinti_draud`
--
ALTER TABLE `nepatvirtinti_draud`
  MODIFY `nepatvirtinto_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `patvirtinti_draud`
--
ALTER TABLE `patvirtinti_draud`
  MODIFY `uzsakyto_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `privati_info`
--
ALTER TABLE `privati_info`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `salygos`
--
ALTER TABLE `salygos`
  MODIFY `salygu_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `vartotojai`
--
ALTER TABLE `vartotojai`
  MODIFY `user_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `draudimo_polisai`
--
ALTER TABLE `draudimo_polisai`
  ADD CONSTRAINT `draudimo_polisai_ibfk_1` FOREIGN KEY (`salygu_id`) REFERENCES `salygos` (`salygu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nepatvirtinti_draud`
--
ALTER TABLE `nepatvirtinti_draud`
  ADD CONSTRAINT `nepatvirtinti_draud_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `vartotojai` (`user_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nepatvirtinti_draud_ibfk_2` FOREIGN KEY (`draudimo_id`) REFERENCES `draudimo_polisai` (`draudimo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patvirtinti_draud`
--
ALTER TABLE `patvirtinti_draud`
  ADD CONSTRAINT `patvirtinti_draud_ibfk_1` FOREIGN KEY (`draudimo_id`) REFERENCES `draudimo_polisai` (`draudimo_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patvirtinti_draud_ibfk_2` FOREIGN KEY (`user_name`) REFERENCES `vartotojai` (`user_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `privati_info`
--
ALTER TABLE `privati_info`
  ADD CONSTRAINT `privati_info_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `vartotojai` (`user_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
