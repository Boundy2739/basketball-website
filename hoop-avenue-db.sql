-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 20, 2026 at 07:52 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hoop-avenue-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `filename`) VALUES
(90, 'WTB4809XB__ac8a1a1c895df690048b3cc80698876c.jpg'),
(89, 'balon-wilson-nba-dribbler-white-0.jpg'),
(88, 'Hamburger_Basketball_1.jpg'),
(87, 'Hamburger_Basketball_1.jpg'),
(86, '81punEDgszL._AC_UF894,1000_QL80_.jpg'),
(85, '81punEDgszL._AC_UF894,1000_QL80_.jpg'),
(77, 'WTB7500ID__b722ae318490e0f2e686864dc70fd730.webp'),
(76, 's-l300.jpg'),
(74, 'picturegray.avif'),
(75, '6796961_R_SET.jpg'),
(84, '81punEDgszL._AC_UF894,1000_QL80_.jpg'),
(72, 'Galaxy_Bal_1.jpg'),
(71, 'Ice_Cream_Bal_1.jpg'),
(70, '24-city-edition-collectors-basketball_ss5_p-5352741+pv-1+u-4zj80nlgfj1aluglpsdo+v-qwsrtnysr0ecoqt0qpyo.avif'),
(69, '272753_Main_Thumb_1385132.png'),
(68, 'los-angeles-lakers-wilson-nba-player-icon-outdoor-basketball-lebron-james_ss5_p-202794952+pv-1+u-vdrzioqgg1fhtxaovgq7+v-pdei6zfltskilukglfc9.png'),
(65, 'WTB3200XBDEN_denver_mini__71043__91271.jpg'),
(58, '71JeA4Ng+4L._AC_UL375_SR375,375_.jpg'),
(83, '1046095_Main_2081111.jpg'),
(62, '71JeA4Ng+4L._AC_UL375_SR375,375_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alt_name` text NOT NULL,
  `brand` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `colour` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `size` int DEFAULT NULL,
  `surface` text,
  `long_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `quantity` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `ratings` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `image`, `name`, `alt_name`, `brand`, `colour`, `size`, `surface`, `long_description`, `quantity`, `price`, `ratings`) VALUES
(44, '71JeA4Ng+4L._AC_UL375_SR375,375_.jpg', 'Molten red basketball', 'Molten red basketball', 'Molten', 'red', 7, 'indoor', 'Red basketball ', 77, 1.00, NULL),
(45, '1046095_Main_2081111.jpg', 'Light green basket ball', 'Celtic\'s light green basket ball', 'Celtics', 'green', 4, 'indoor', 'Light green basket ball', 10, 6.00, NULL),
(47, 'los-angeles-lakers-wilson-nba-player-icon-outdoor-basketball-lebron-james_ss5_p-202794952+pv-1+u-vdrzioqgg1fhtxaovgq7+v-pdei6zfltskilukglfc9.png', 'Wilson purple baskeball', 'Wilson purple basket ball', 'Wilson', 'purple', 6, 'both', 'Wilson purple basketball', 12, 12.99, NULL),
(48, '272753_Main_Thumb_1385132.png', 'Nike blue basketball', 'Nike\'s blue basketball', 'Nike', 'blue', 7, 'both', 'Nike blue basketball', 12, 14.99, NULL),
(49, '24-city-edition-collectors-basketball_ss5_p-5352741+pv-1+u-4zj80nlgfj1aluglpsdo+v-qwsrtnysr0ecoqt0qpyo.avif', 'Wilson San francisco golden ball', 'Black and yellow basket ball', 'Wilson', 'black', 6, 'both', 'San francisco golden ball', 4, 999.99, NULL),
(50, 'Ice_Cream_Bal_1.jpg', 'Ice cream ball', 'Ice cream themed basketball', 'Bucketsquad', 'themed', 5, 'indoor', 'Ice cream basketball', 3, 11.99, NULL),
(51, 'Galaxy_Bal_1.jpg', 'Galaxy ball', 'Space galaxy themed basketball', 'Bucketsquad', 'themed', 7, 'indoor', 'Galaxy basketball', 1, 13.99, NULL),
(53, 'picturegray.avif', 'Gray basketball', 'Gray basketball ', 'Kipsta', 'gray', 7, 'outdoor', 'Gray basketball', 9, 16.99, NULL),
(54, '6796961_R_SET.jpg', 'Yellow basketball', 'Yellow basket ball', 'Tarmak', 'yellow', 5, 'indoor', 'Yellow basketball', 12, 9.99, NULL),
(55, 's-l300.jpg', 'Black basketball', 'Black basket ball', 'Wilson', 'black', 6, 'outdoor', 'Black basketball', 8, 14.99, NULL),
(56, 'WTB7500ID__b722ae318490e0f2e686864dc70fd730.webp', 'Red basketball', 'Red basketball', 'Wilson', 'red', 7, 'outdoor', 'Red generic basketball', 45, 10.99, NULL),
(61, '81punEDgszL._AC_UF894,1000_QL80_.jpg', 'Light green basket ball', 'Green basket ball', 'Zone', 'yellow', 5, 'indoor', 'Green basket ball', 4, 9.99, NULL),
(62, 'Hamburger_Basketball_1.jpg', 'Hamburger ball', 'Hamburger themed ball', 'Bucketsquad', 'themed', 6, 'indoor', 'Hamburger themed ball', 3, 14.99, NULL),
(63, 'balon-wilson-nba-dribbler-white-0.jpg', 'White basketball', 'White basketball', 'Wilson', 'white', 7, 'outdoor', 'White basket ball', 7, 13.99, NULL),
(64, 'WTB4809XB__ac8a1a1c895df690048b3cc80698876c.jpg', 'Orange cyan basketball', 'cyan basket ball', 'Wilson', 'cyan', 4, 'indoor', 'Cyan basketballl with orange stripes', 7, 10.99, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locked_ips`
--

DROP TABLE IF EXISTS `locked_ips`;
CREATE TABLE IF NOT EXISTS `locked_ips` (
  `ip_address` int UNSIGNED NOT NULL,
  `attempts` int NOT NULL DEFAULT '0',
  `last_attempt` datetime DEFAULT NULL,
  `lock_time` datetime DEFAULT NULL,
  PRIMARY KEY (`ip_address`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `locked_ips`
--

INSERT INTO `locked_ips` (`ip_address`, `attempts`, `last_attempt`, `lock_time`) VALUES
(2130706433, 3, '2026-04-20 19:43:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Anonymous',
  `lastname` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'User',
  `subject` varchar(255) NOT NULL,
  `review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rating` tinyint NOT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `email`, `firstname`, `lastname`, `subject`, `review`, `rating`, `created_at`) VALUES
(48, '', 'Anonymous', 'Uset', '', 'dtcfvygbuhnj', 3, '2026-04-20'),
(49, '', 'Abc', 'Def', '', 'testttfuybgibiu', 4, '2026-04-20'),
(50, '', 'Joe', '', '', 'Ok website', 3, '2026-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `surname` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`, `email`, `password`) VALUES
(32, 'Acer', '', 'nitro@gmail.com', '$2y$10$syhYV8nMlgXTIBHrjsH1r.JwBdPMxKS.MlsryQ8j3ByA5xswpEceK'),
(39, 'Anton', '', 'Anton@gmail.com', '$2y$10$DPy1zNnoB9c9nOl5HPy5ReIc/0JatOmoknLQmDkrjpSPOcEV4bhAC'),
(40, 'Bobby', '', 'email@email.com', '$2y$10$LP6Mg8MrMDY60Vb/W87Bf.lINqrM46ieYNL.B8eLQZCQpG4Iig7hi'),
(42, 'John', 'Doe', 'johnDoe@email.com', '$2y$10$mFYhZlxCICSNP5AW1gZYy.ZsiDDXYU0C.9nyGMn5VFuYVAR5Z/mbi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
