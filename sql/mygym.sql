-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 27, 2021 at 09:31 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mygym`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(254) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `lastname` varchar(254) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(500) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `address` varchar(254) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `province` varchar(254) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `phone` int NOT NULL,
  `paymentMethod` varchar(254) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `code` varchar(500) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `time` date NOT NULL,
  `cardInfo` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=346 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Class_name` varchar(255) NOT NULL,
  `Class_time` varchar(245) NOT NULL,
  `Class_Coach` varchar(255) NOT NULL,
  `class_description` varchar(254) NOT NULL,
  `class_image` varchar(254) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `Class_name`, `Class_time`, `Class_Coach`, `class_description`, `class_image`) VALUES
(1, 'YOGA', 'Monday 03:00 to 05:00 PM', 'joanne johnson', 'Stretching, relaxing and mind peace ', '../images/Products/classes/yoga_class.jpg'),
(2, 'Zumba', 'Tuesday 03:00 To 04:00', 'Marc Marcus', 'Very motivational workouts and fat burning', '../images/Products/classes/zumba.jpg'),
(3, 'MMA', 'Wednesday 12:00 02:00 PM', 'John Jonner', 'Adrenaline rush and high skills that is what MMA is all about', '../images/Products/classes/MMA.jpg'),
(4, 'Barre', 'Wednesday 04:00 05:00 PM', 'Sara Sar', 'Fitness, Body shaping and fat burning', '../images/Products/classes/barre.jpg'),
(5, 'Spin', 'Friday 18:00 19:00', 'Elian Ell', 'High intensity cardio workout , best for fat burning and explosive power.', '../images/Products/40d4a203bc881c2d59c6fa3f6ffe0848.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `classes_booking`
--

DROP TABLE IF EXISTS `classes_booking`;
CREATE TABLE IF NOT EXISTS `classes_booking` (
  `id` int NOT NULL AUTO_INCREMENT,
  `class_name` varchar(254) NOT NULL,
  `name` varchar(254) NOT NULL,
  `lastname` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `phone` int NOT NULL,
  `class_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `classes_booking`
--

INSERT INTO `classes_booking` (`id`, `class_name`, `name`, `lastname`, `email`, `phone`, `class_date`) VALUES
(1, 'MMA', 'waleed', 'nader', 'naderwalid@hotmail.com', 21341112, '0000-00-00'),
(2, 'Swimming', 'waleed', 'nader', 'naderwalid@hotmail.com', 21341112, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `contact-us`
--

DROP TABLE IF EXISTS `contact-us`;
CREATE TABLE IF NOT EXISTS `contact-us` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `subject` varchar(254) NOT NULL,
  `message` text NOT NULL,
  `our-reply` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact-us`
--

INSERT INTO `contact-us` (`id`, `name`, `email`, `subject`, `message`, `our-reply`) VALUES
(2, 'waleed', 'naderwalid@hotmail.com', 'my membership', 'i want to pay through OMT can u send me the code', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(50) NOT NULL,
  `province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` int NOT NULL,
  `paymentMethod` varchar(255) NOT NULL,
  `name` varchar(254) NOT NULL,
  `code` varchar(254) NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `type` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  `cardInfo` varchar(255) NOT NULL,
  `status` varchar(254) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `firstname`, `lastname`, `email`, `address`, `province`, `phone`, `paymentMethod`, `name`, `code`, `price`, `quantity`, `type`, `time`, `cardInfo`, `status`) VALUES
(1, 'waleed', 'nader', 'waleednader@hotmail.com', 'mainstreet', 'Beirut', 70777555, 'card', 'Ea Whey', 'W111', 25, 1, 'whey', '2021-09-27 00:00:00', '4123456789111 555', ''),
(2, 'waleed', 'nader', 'waleednader@hotmail.com', 'mainstreet', 'Beirut', 70777555, 'card', 'Dymatize Whey', 'W112', 30, 1, 'whey', '2021-09-27 00:00:00', '4123456789111 555', ''),
(3, 'waliiid', 'nadder', 'naderwalid@hotmail.com', '1st street', 'Mont Lebanon', 70565656, 'cash on delivery', 'Ea Whey', 'W111', 25, 1, 'whey', '2021-09-27 00:00:00', ' ', ''),
(4, 'john', 'nader', 'johnnader@hotmail.com', '2nd street', 'Beirut', 70703366, 'cash on delivery', 'Dymatize Whey', 'W112', 30, 1, 'whey', '2021-09-27 00:00:00', ' ', ''),
(5, 'john', 'nader', 'johnnader@hotmail.com', '2nd street', 'Beirut', 70702233, 'cash on delivery', 'Ea Whey', 'W111', 25, 1, 'whey', '2021-09-27 00:00:00', ' ', ''),
(6, 'john', 'nader', 'johnnader@hotmail.com', '2nd street', 'Beirut', 70702233, 'card', 'Bpi Pre-Workout', 'PW111', 10, 1, 'pre-workout', '2021-09-27 00:00:00', '4123456789111 111', ''),
(7, 'john', 'nader', 'johnnader@hotmail.com', '2nd street', 'Beirut', 70702233, 'card', 'ON Serious Mass', 'W122', 110, 1, 'mass-gainer', '2021-09-27 00:00:00', '4123456789111 111', ''),
(8, 'john', 'nader', 'johnnader@hotmail.com', '2nd street', 'Beirut', 70702233, 'card', 'Ea Whey', 'W111', 25, 1, 'whey', '2021-09-27 00:00:00', '4123456789111 111', ''),
(9, 'john', 'nader', 'johnnader@hotmail.com', '2nd street', 'Beirut', 70702233, 'OMT', 'Ea Whey', 'W111', 25, 1, 'whey', '2021-09-27 00:00:00', ' ', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

DROP TABLE IF EXISTS `tblproduct`;
CREATE TABLE IF NOT EXISTS `tblproduct` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `type`, `code`, `image`, `price`) VALUES
(1, 'Ea Whey', 'whey', 'W111', '../images/Whey/1.jpg', 25.00),
(2, 'Dymatize Whey', 'whey', 'W112', '../images/Whey/4.jpg', 30.00),
(3, 'Bpi Pre-Workout', 'pre-workout', 'PW111', '../images/Pre-workout/1.jpeg', 10.00),
(4, 'C4 ultimate', 'pre-workout', 'Pw112', '../images/Pre-workout/2.jpg', 15.00),
(5, 'Power Weight Gainer', 'mass-gainer', 'W121', '../images/Whey/11.jpg', 100.00),
(6, 'ON Serious Mass', 'mass-gainer', 'W122', '../images/Whey/12.jpg', 110.00),
(7, 'ISO Whey', 'whey', 'W113', '../images/Whey/10.jpg', 75.00),
(8, 'ON pre workout', 'pre-workout', 'Pw114', '../images/Pre-workout/5.jpg', 40.00),
(9, 'Curse pre-workout', 'pre-workout', 'Pw115', '../images/Products/4.jpg', 35.00),
(10, 'PUMP Pre-workout', 'pre-workout', 'PW116', '../images/Products/1629133312.', 35.00),
(11, 'X pre-workout', 'pre-workout', 'PW117', '../images/Products/1629133435.', 25.00),
(12, 'Hydro Whey', 'whey', 'W118', '../images/Products/162914464', 65.00),
(13, 'Viking Whey', 'whey', 'W114', '../images/Products/1629134171.', 65.00),
(14, 'Whey perfection', 'whey', 'W120', '../images/Products/1629134471.', 75.00),
(16, 'SCI-fi Whey', 'whey', 'w123', '../images/Products/654688564', 85.00),
(19, 'B4 USN', 'pre-workout', 'PW414', '../images/Products/eccbc87e4b5ce2fe28308fd9f2a7baf3.jpg', 60.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `surname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `age` int NOT NULL,
  `height` int NOT NULL,
  `weight` int NOT NULL,
  `Subscription date` date NOT NULL,
  `subscription type` text NOT NULL,
  `subscription end` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `age`, `height`, `weight`, `Subscription date`, `subscription type`, `subscription end`) VALUES
(1, 'waleed', 'nader', 'naderwalid@hotmail.com', '25f9e794323b453885f5181f1b624d0b', 30, 177, 72, '0000-00-00', '', '0000-00-00'),
(2, 'john', 'nader', 'johnnader@hotmail.com', '25f9e794323b453885f5181f1b624d0b', 0, 0, 0, '2021-08-26', 'month', '0000-00-00'),
(3, 'elie', 'elias', 'elieelias@hotmail.com', '25f9e794323b453885f5181f1b624d0b', 0, 0, 0, '2021-08-08', '6months', '2022-02-08'),
(9, 'abidal', 'abbdou', 'abbdou@hotmail.com', '25f9e794323b453885f5181f1b624d0b', 0, 0, 0, '2021-08-19', 'month', '2021-09-17'),
(11, 'enrique', 'iglesias', 'eiglesias@hotmail.com', '25f9e794323b453885f5181f1b624d0b', 0, 0, 0, '0000-00-00', '', '0000-00-00'),
(12, 'john', 'king', 'elie@gmail.com', '25f9e794323b453885f5181f1b624d0b', 0, 0, 0, '0000-00-00', '', '0000-00-00'),
(13, 'waleed', 'nader', 'waleednader@hotmail.com', '25f9e794323b453885f5181f1b624d0b', 27, 177, 77, '0000-00-00', '', '0000-00-00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
