-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 05:06 PM
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
-- Database: `mktime`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `total` decimal(8,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `total`, `order_date`, `payment_id`) VALUES
(1, 1, 1, 21.98, '2023-05-01 00:00:00', 1001),
(2, 1, 3, 8.99, '2023-05-02 00:00:00', 1002),
(3, 1, 4, 12.99, '2023-05-10 00:00:00', 1010),
(4, 2, 1, 21.98, '2023-05-06 00:00:00', 1006),
(5, 2, 2, 47.97, '2023-05-03 00:00:00', 1003),
(6, 3, 3, 8.99, '2023-05-07 00:00:00', 1007),
(7, 3, 5, 39.98, '2023-05-04 00:00:00', 1004),
(8, 4, 2, 31.98, '2023-05-09 00:00:00', 1009),
(9, 4, 4, 12.99, '2023-05-05 00:00:00', 1005),
(10, 5, 5, 59.97, '2023-05-08 00:00:00', 1008);

-- --------------------------------------------------------

--
-- Table structure for table `order_contents`
--

CREATE TABLE `order_contents` (
  `content_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_contents`
--

INSERT INTO `order_contents` (`content_id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 1, 2, 10.99),
(2, 1, 3, 1, 8.99),
(3, 1, 4, 1, 12.99),
(4, 2, 1, 2, 10.99),
(5, 2, 2, 3, 15.99),
(6, 3, 3, 1, 8.99),
(7, 3, 5, 2, 19.99),
(8, 4, 2, 2, 15.99),
(9, 4, 4, 1, 12.99),
(10, 5, 5, 3, 19.99);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_amount` decimal(6,2) NOT NULL,
  `account_no` int(10) NOT NULL,
  `bsb_no` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_amount`, `account_no`, `bsb_no`, `user_id`) VALUES
(1001, 50.99, 123456789, 987654, 1),
(1002, 25.99, 987654321, 123456, 2),
(1003, 12.99, 456789123, 654321, 3),
(1004, 35.99, 321654987, 789456, 4),
(1005, 18.99, 789123456, 456789, 5),
(1006, 42.99, 654987321, 321654, 1),
(1007, 29.99, 123789456, 987123, 2),
(1008, 14.99, 987321654, 456123, 3),
(1009, 19.99, 456123789, 321987, 4),
(1010, 31.99, 789456123, 123789, 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `product_desc` varchar(200) NOT NULL,
  `product_img` varchar(20) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `key_features` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_desc`, `product_img`, `product_price`, `key_features`) VALUES
(1, 'Schaffhausen', 'A watch for the stylish traveller. Look at all the dials on it! What do they do? No one knows.', 'img/watch1.jpg', 1099.99, '*Floating tourbillon with celestial-themed rotor<br>
*Titanium case with a holographic dial.<br> *Multi-layered sapphire crystal for depth.'),
(2, 'Dior', 'Nothing says style and elegance like this Dior Watch. Can you tell the exact time? Who cares, numbers are for people who buy their jeans from Tesco.', 'img/watch2.jpg', 1015.99, '*Diamond-encrusted bezel and lugs.<br>
*Mother-of-pearl dial with rose gold accents.<br> *Moon phase complication with a rotating night sky.<br>'),
(3, 'Gold', 'Gold! Always believe in your soul. Dress like a Tom Hiddleston love interest who is about to be killed off.', 'img/watch3.jpg', 6698.99, '*Snow white ceramic unidirectional bezel.<br>
*Gold plated.<br>*12 highest quality dimonds for dazzling effect.'),
(4, 'Gucci', 'Nothing is "a bit much". Contains fragments of the true cross.', 'img/watch4.jpeg', 1102.99, '*Minimalistic and sophisticated display.<br>
*Platinum case with a transparent case back.<br> *Limited edition with individually numbered pieces.'),
(5, 'Heuer', 'With three extra dials and a monochromatic colour scheme, this is the ideal gift for the goth with wanderlust in your life.', 'img/watch5.jpg', 3219.99, '*Bi-directional rotating compass bezel.<br>
*Meteorite dial with orbiting date indicator.<br>*Titanium case with a cosmic-inspired crown.'),
(6, 'Rolex', 'The hallmark of quality, with a strap designed specifically to trap arm hairs.', 'img/watch6.jpg', 5467.99, 'Anti-gravity tourbillon for enhanced precision.<br>
*Sapphire crystal dial revealing intricate movement.<br>*Aerospace-grade carbon fiber case.'),
(7, 'Retro', 'If you have really small pointy fingertips and little to no ability to do mental arithmetic, this Casio Calculator watch is the one for you.', 'img/watch7.jpg', 1014.99, '*Perfect blend of nostalgia and practicality for tech enthusiasts.<br> *Water-resistant for everyday wear and casual activities.<br>*Multi-function capabilities: calculator, alarm, stopwatch, and calendar.'),
(8, 'Classic Leather', 'A watch for Dads', 'img/watch8.jpeg', 1099.99, '*Slide rule bezel for aviation calculations.<br>
*Vintage-inspired riveted leather strap.<br>*Matte black PVD-coated stainless steel case.'),
(9, 'Longines', 'Swiss made class, something which says you don''t want to just tell the time, you want to look great doing it.', 'img/watch9.jpg', 2111.99, '*Clean and uncluttered dial featuring only hour markers.<br> *A tribute to classic watchmaking traditions, combining simplicity and sophistication.<br>
*Timepiece that transcends trends, embodying enduring style and grace.'),
(10, 'Rado', 'A retro classic, this gold digital watch is just what you need to distinguish yourself at your local Brewdog pub.', 'img/watch10.jpg', 1016.99, '*Titanium smartwatch with traditional watch aesthetics.<br>
*E-ink display with customizable complications.<br>*Health and fitness tracking capabilities.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(64) NOT NULL,
  `reg_date` datetime NOT NULL,
  `payment_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`, `reg_date`, `payment_id`) VALUES
(1, 'John', 'Doe', 'johndoe@example.com', 'password123', '2023-05-01 00:00:00', 1001),
(2, 'Jane', 'Smith', 'janesmith@example.com', 'p@ssw0rd456', '2023-05-02 00:00:00', 1002),
(3, 'Michael', 'Johnson', 'michaeljohnson@example.com', 'securepass', '2023-05-03 00:00:00', 1003),
(4, 'Emily', 'Brown', 'emilybrown@example.com', 'qwerty123', '2023-05-04 00:00:00', 1004),
(5, 'David', 'Wilson', 'davidwilson@example.com', 'password321', '2023-05-05 00:00:00', 1005),
(6, 'Sarah', 'Taylor', 'sarahtaylor@example.com', 'safepass', '2023-05-06 00:00:00', 1006),
(7, 'Matthew', 'Anderson', 'matthewanderson@example.com', 'pass1234', '2023-05-07 00:00:00', 1007),
(8, 'Olivia', 'Lee', 'olivialee@example.com', 'password789', '2023-05-08 00:00:00', 1008),
(9, 'Daniel', 'Martinez', 'danielmartinez@example.com', 'danielpass', '2023-05-09 00:00:00', 1009),
(10, 'Sophia', 'Garcia', 'sophiagarcia@example.com', 'pass4567', '2023-05-10 00:00:00', 1010),
(11, 'Andrew', 'Coolio', 'a_coolio@email.com', '31bd5a11fce31353df946d229568d17ceb3284e2d51b3dcc7d0f3b2f064cf8b3', '2024-01-11 14:57:58', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_contents`
--
ALTER TABLE `order_contents`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_contents`
--
ALTER TABLE `order_contents`
  MODIFY `content_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
