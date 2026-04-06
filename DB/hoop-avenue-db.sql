-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 06, 2026 at 04:04 PM
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
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int DEFAULT NULL,
  `addres1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `CustomerID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`ID`, `filename`) VALUES
(1, '541-5418907_goat-plants-vs-zombies-plants-vs-zombies-heroes.png'),
(2, '541-5418907_goat-plants-vs-zombies-plants-vs-zombies-heroes.png'),
(3, '4e59338defcvybyunije4165a2a541d9a7c5.png'),
(4, '4e59338defcvybyunije4165a2a541d9a7c5.png'),
(5, '47823.png'),
(6, '348_sin_titulo_20251215100836.png'),
(7, '603980092d87f.png'),
(8, 'killerqueen.png'),
(9, '73337602.jpg'),
(10, 'zs9fr2doai8c1.jpeg'),
(11, '73337602.jpg'),
(12, '73337602.jpg'),
(13, '2rk2czxmobsc1.jpeg'),
(14, '44b.jpg'),
(15, 'ToothpasteRose.gif'),
(16, 'polenta-768x512.gif'),
(17, '4e59338defcvybyunije4165a2a541d9a7c5.png'),
(18, '45-459644_goat-plants-vs-zombies-goat-plants-versus-zombies.png'),
(19, '4e59338deb8d351e4165a2a541d9a7c5.png'),
(20, '44b.jpg'),
(21, 'siali424d4x51.png'),
(22, '1607977765447.jpg'),
(23, 'e36449e53e2f652197d077a9422810bb.png'),
(24, 'spongebob crying.jpg'),
(25, '603980092d87f.png'),
(26, '73337602.jpg'),
(27, 'qtarokujo.jpg'),
(28, '1607977765447.jpg'),
(29, 'celticsmini__68836.jpg'),
(30, 'NBA-miami-heat-retro__20427__49771.jpg'),
(31, 'WTB3200XBDEN_denver_mini__71043__91271.jpg'),
(32, '81vIYCAajvL._AC_UF1000,1000_QL80_.jpg'),
(33, 'eng_pl_Nike-Everyday-All-Court-8P-Deflated-Indoor-Outdoor-Basketball-Ball-N-100-4369-120-44084_1.jpg'),
(34, 'molten-basketballs-molten-bg4500-indoor-basketball-29673406922829-120571_def9362c-cae0-407a-b874-3aca3d244fb6.jpg'),
(35, 'molten-basketballs-molten-bg4500-indoor-basketball-29673406922829-120571_def9362c-cae0-407a-b874-3aca3d244fb6.jpg'),
(36, 'celticsmini__68836.jpg'),
(37, '1046095_Main_2081111.jpg'),
(38, 'NBA-miami-heat-retro__20427__49771.jpg'),
(39, '91Ssw7FHcjL._AC_UL375_SR375,375_.jpg'),
(40, 'NBA-miami-heat-retro__20427__49771.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `ratings` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `image`, `name`, `description`, `quantity`, `price`, `ratings`) VALUES
(24, '81vIYCAajvL._AC_UF1000,1000_QL80_.jpg', 'Champion basketball [yellow]', 'Yellow basketball', 25, 9.00, NULL),
(23, 'WTB3200XBDEN_denver_mini__71043__91271.jpg', 'WILSON denver nuggets NBA retro mini basketball [white/blue]', 'THE DENVER NUGGETS TEAM RETRO MINI BASKETBALL: Remember the best of times with your team. The Wilson NBA Team Retro Mini Basketball puts a new spin on a classic. The Outdoor Performance Cover and throwback aesthetic with Matching Team Colours is a must ha', 17, 14.00, NULL),
(25, 'eng_pl_Nike-Everyday-All-Court-8P-Deflated-Indoor-Outdoor-Basketball-Ball-N-100-4369-120-44084_1.jpg', 'Nike [black/gray]', NULL, 12, 12.00, NULL),
(26, 'NBA-miami-heat-retro__20427__49771.jpg', 'Molten [red]', NULL, 23, 8.00, NULL),
(29, '1046095_Main_2081111.jpg', 'wada', NULL, 3, 32.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_reviews`
--

DROP TABLE IF EXISTS `item_reviews`;
CREATE TABLE IF NOT EXISTS `item_reviews` (
  `reviewID` int NOT NULL AUTO_INCREMENT,
  `itemID` int DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `rating` int DEFAULT NULL,
  `review_date` date DEFAULT NULL,
  PRIMARY KEY (`reviewID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `item_reviews`
--

INSERT INTO `item_reviews` (`reviewID`, `itemID`, `item_name`, `user_name`, `review`, `rating`, `review_date`) VALUES
(1, 24, NULL, 'Abdoulaye', 'Hello this is a revieew fjmfama', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `item` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `order_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `email`, `firstname`, `lastname`, `subject`, `review`, `rating`, `created_at`) VALUES
(5, 'script@email.com', 'Anonym', 'User', 'script test', '<script>location.href=\'http://bbc.co.uk\'</script>', 2, '2025-12-17 11:13:57'),
(6, 'Abdoulaye@gmail.com', 'Anonym', 'User', 'Subject ', 'Awesome', 5, '2025-12-17 13:44:36'),
(4, 'test@test.com', 'Anonym', 'User', 'test subject', 'Review test test test', 4, '2025-12-17 10:57:40'),
(7, 'JimmyJoe', 'Anonym', 'User', 'fyughji', 'I like this company!', 4, '2025-12-17 13:48:06'),
(42, '', 'Frank', 'Uset', '', 'Test 28129120', 4, '2026-04-05 21:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`) VALUES
(27, 'Abdoulaye', 'email@email.com', '$2y$10$oq7.7kYrL6YnWmgp2rhOlu16d/xrsA6xLRzZDb8pL17weZ0IMONFa'),
(30, 'User2', 'User@user.com', '$2y$10$MVSApDmjJTqRcWWdv8eHQuWnGrFSWqk4sIl4gvwCKcNkb4jK4DHUC'),
(31, 'Hamed', 'gmail@gmail.com', '$2y$10$4JVwwksYhUsTtp0UGjnEEOVuvi6woLYjhnYDz3dZiaBC.eYJL8LYS'),
(32, 'Acer', 'nitro@gmail.com', '$2y$10$syhYV8nMlgXTIBHrjsH1r.JwBdPMxKS.MlsryQ8j3ByA5xswpEceK'),
(34, 'Midqmidkmdik', 'redmi@gmail.com', '$2y$10$BtMdDFIAGWScMpCQ6DcBXeMGhDuCDr9Sw8golrsSgGiwgkrl9dq4u'),
(39, 'Anton', 'Anton@gmail.com', '$2y$10$DPy1zNnoB9c9nOl5HPy5ReIc/0JatOmoknLQmDkrjpSPOcEV4bhAC');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
