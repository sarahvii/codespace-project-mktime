-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 19, 2024 at 05:08 PM
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
-- Database: `mktime`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total`, `order_date`) VALUES
(1, 11, 43.96, '2023-05-01 00:00:00'),
(2, 12, 69.95, '2023-05-02 00:00:00'),
(3, 12, 48.97, '2023-05-10 00:00:00'),
(4, 13, 44.97, '2023-05-06 00:00:00'),
(5, 13, 59.97, '2023-05-03 00:00:00'),
(6, 14, 8.99, '2023-05-07 00:00:00'),
(7, 14, 39.98, '2023-05-04 00:00:00'),
(8, 15, 31.98, '2023-05-09 00:00:00'),
(9, 15, 12.99, '2023-05-05 00:00:00'),
(10, 16, 59.97, '2023-05-08 00:00:00'),
(12, 12, 109.98, '2024-01-15 14:47:49'),
(13, 11, 399.96, '2024-01-15 15:22:52'),
(14, 21, 28.98, '2024-01-17 10:36:23'),
(15, 12, 99.99, '2024-01-17 12:02:36'),
(16, 12, 21.98, '2024-01-17 12:23:28'),
(17, 12, 35.98, '2024-01-17 16:10:59'),
(18, 12, 10.99, '2024-01-18 17:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `order_contents`
--

CREATE TABLE `order_contents` (
  `content_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
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
(10, 5, 5, 3, 19.99),
(12, 12, 3, 1, 8.99),
(13, 12, 11, 1, 99.99),
(14, 12, 12, 1, 1.00),
(15, 13, 11, 4, 99.99),
(16, 14, 3, 1, 8.99),
(17, 14, 5, 1, 19.99),
(18, 15, 11, 1, 99.99),
(19, 16, 1, 2, 10.99),
(20, 17, 2, 1, 15.99),
(21, 17, 5, 1, 19.99),
(22, 18, 1, 1, 10.99);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `product_desc` varchar(200) NOT NULL,
  `product_img` varchar(20) NOT NULL,
  `product_price` decimal(4,2) NOT NULL,
  `key_features` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_desc`, `product_img`, `product_price`, `key_features`) VALUES
(1, 'Schaffhausen', 'A watch for the stylish traveller. Look at all the dials on it! What do they do? No one knows.', 'img/watch1.jpg', 10.99, '18 ct 5N gold case, Automatic, self-winding, Diameter 41.0 mm, Blue alligator leather strap, Strap width 20.0 mm.'),
(2, 'Dior', 'Nothing says style and elegance like this Dior Watch. Can you tell the exact time? Who cares, numbers are for people who buy their jeans from Tesco.', 'img/watch2.jpg', 15.99, '36mm polished stainless steel case, Water Resistant to 50 metres, White mother of pearl dial, 42 hour power reserve.'),
(3, 'Gold', 'Gold! Always believe in your soul. Dress like a Tom Hiddleston love interest who is about to be killed off.', 'img/watch3.jpg', 8.99, '24ct 5N gold case, Automatic, self-winding, watch-strap: gold, watch-face: gold, hands: gold. It\'s gold. Gold. '),
(4, 'Gucci', 'Nothing is \"a bit much\". Contains fragments of the true cross.', 'img/watch4.jpeg', 12.99, 'Yellow gold PVD case, gold sunbrushed dial, marble outlay, 9 links yellow gold PVD bracelet.'),
(5, 'Heuer', 'With three extra dials and a monochromatic colour scheme, this is the ideal gift for the goth with wanderlust in your life.', 'img/watch5.jpg', 19.99, '43mm gold case, 100 Mikrograph, stopwatch, chronograph.'),
(6, 'Rolex', 'The hallmark of quality, with a strap designed specifically to trap arm hairs.', 'img/watch6.jpg', 7.99, 'Submariner Date, Oyster, 41mm, Oystersteel and yellow gold, waterproof up to 300m, luminescent Chromalight.'),
(7, 'Retro', 'If you have really small pointy fingertips and little to no ability to do mental arithmetic, this Casio Calculator watch is the one for you.', 'img/watch7.jpg', 14.99, 'Casio DBC-32, calculator mode, stopwatch,, dual time, an alarm, storage space for up to 25 phone numbers, backlight.'),
(8, 'Classic Leather', 'A watch for Dads', 'img/watch8.jpeg', 9.99, 'Leather strap, straightforward display, nothing fancy, reliable, little dial thing round the outside so you can try and fail to time things, date.'),
(9, 'Longines', 'Swiss made class, something which says you don\'t want to just tell the time, you want to look great doing it.', 'img/watch9.jpg', 11.99, '34mm Stainless steel and yellow PVD case, white mother of pear dials, gilt hands. '),
(10, 'Rado', 'A retro classic, this gold digital watch is just what you need to distinguish yourself at your local Brewdog pub.', 'img/watch10.jpg', 16.99, 'Vintage, digital, quartz, red LED display, original band, 1974.'),
(11, 'Mitchell Nyan Cat', 'Look, if you know what any of those words mean you should buy this watch.', 'img/watch11.jpg', 99.99, 'Unisex Business Casual Phil Mitchell Nyan Cat watch. Imported Quartz Movement, Silver Stainless Steel Case, Durable And Scratch-resistant Mineral Crystal Dial Window, PU Leather Strap Buckle.'),
(12, 'Big Ass Watch', 'Why not buy a watch that screams \"I AM NOT INSECURE\"?', 'img/watch12.jpg', 1.00, 'Mens Big Face Watch - Cool Military Wrist Watch Genuine Leather Strap Dual Time Zone Sport Watch Analog Quartz Display with Thermometer Compass.');

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
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`, `reg_date`) VALUES
(11, 'Andrew', 'Coolio', 'a_coolio@email.com', '31bd5a11fce31353df946d229568d17ceb3284e2d51b3dcc7d0f3b2f064cf8b3', '2024-01-11 14:57:58'),
(12, 'John', 'Doe', 'johndoe@example.com', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', '2024-01-15 11:56:03'),
(13, 'Michael', 'Johnson', 'michaeljohnson@example.com', 'fbb4a8a163ffa958b4f02bf9cabb30cfefb40de803f2c4c346a9d39b3be1b544', '2024-01-15 12:04:24'),
(14, 'Emily', 'Brown', 'emilybrown@example.com', 'daaad6e5604e8e17bd9f108d91e26afe6281dac8fda0091040a7a6d7bd9b43b5', '2024-01-15 12:04:57'),
(15, 'David', 'Wilson', 'davidwilson@example.com', 'a20aff106fe011d5dd696e3b7105200ff74331eeb8e865bb80ebd82b12665a07', '2024-01-15 12:05:28'),
(16, 'Sarah', 'Taylor', 'sarahtaylor@example.com', '5b601e6b0a166389a2be57d276bd2e4bbe0e7f689a7d287af6a7079efc6e34c7', '2024-01-15 12:05:49'),
(17, 'Matthew', 'Anderson', 'matthewanderson@example.com', 'bd94dcda26fccb4e68d6a31f9b5aac0b571ae266d822620e901ef7ebe3a11d4f', '2024-01-15 12:06:14'),
(18, 'Olivia', 'Lee', 'olivialee@example.com', '5efc2b017da4f7736d192a74dde5891369e0685d4d38f2a455b6fcdab282df9c', '2024-01-15 12:08:18'),
(19, 'Daniel', 'Martinez', 'danielmartinez@example.com', '2e8edcbf091ab6a39ae55a0c9c7a00f793c39683898937d8760e04017c98d2d8', '2024-01-15 12:08:53'),
(20, 'Sophia', 'Garcia', 'sophiagarcia@example.com', 'ced75643425df8422f6b947248904aad4b0a471da94c6618be2819b8fb455e77', '2024-01-15 12:10:22'),
(21, 'c', 'c', 'c@c.com', '2e7d2c03a9507ae265ecf5b5356885a53393a2029d241394997265a1a25aefc6', '2024-01-17 11:53:27'),
(22, 'r', 'r', 'r@r.com', '454349e422f05297191ead13e21d3db520e5abef52055e4964b82fb213f593a1', '2024-01-17 12:35:48'),
(23, 'd', 'd', 'd@d.com', '18ac3e7343f016890c510e93f935261169d9e3f565436429830faf0934f4f8e4', '2024-01-17 12:36:41'),
(24, 'g', 'g', 'g@g.com', 'cd0aa9856147b6c5b4ff2b7dfee5da20aa38253099ef1b4a64aced233c9afe29', '2024-01-17 12:50:02'),
(25, 'f', 'f', 'f@f.com', '252f10c83610ebca1a059c0bae8255eba2f95be4d1d7bcfa89d7248a82d9f111', '2024-01-17 12:51:59'),
(26, 'h', 'h', 'h@h.com', 'aaa9402664f1a41f40ebbc52c9993eb66aeb366602958fdfaa283b71e64db123', '2024-01-17 13:24:02');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_orders`
-- (See below for the actual view)
--
CREATE TABLE `view_orders` (
`order_id` int(10) unsigned
,`user_id` int(10) unsigned
,`total` decimal(8,2)
,`order_date` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_order_contents`
-- (See below for the actual view)
--
CREATE TABLE `view_order_contents` (
`content_id` int(10) unsigned
,`order_id` int(10) unsigned
,`product_id` int(10) unsigned
,`quantity` int(11)
,`price` decimal(10,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_products`
-- (See below for the actual view)
--
CREATE TABLE `view_products` (
`product_id` int(10) unsigned
,`product_name` varchar(20)
,`product_desc` varchar(200)
,`product_img` varchar(20)
,`product_price` decimal(4,2)
,`key_features` varchar(200)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_users`
-- (See below for the actual view)
--
CREATE TABLE `view_users` (
`user_id` int(10) unsigned
,`firstname` varchar(20)
,`lastname` varchar(40)
,`email` varchar(60)
,`password` varchar(64)
,`reg_date` datetime
);

-- --------------------------------------------------------

--
-- Structure for view `view_orders`
--
DROP TABLE IF EXISTS `view_orders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_orders`  AS SELECT `orders`.`order_id` AS `order_id`, `orders`.`user_id` AS `user_id`, `orders`.`total` AS `total`, `orders`.`order_date` AS `order_date` FROM `orders` ;

-- --------------------------------------------------------

--
-- Structure for view `view_order_contents`
--
DROP TABLE IF EXISTS `view_order_contents`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_order_contents`  AS SELECT `order_contents`.`content_id` AS `content_id`, `order_contents`.`order_id` AS `order_id`, `order_contents`.`product_id` AS `product_id`, `order_contents`.`quantity` AS `quantity`, `order_contents`.`price` AS `price` FROM `order_contents` ;

-- --------------------------------------------------------

--
-- Structure for view `view_products`
--
DROP TABLE IF EXISTS `view_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_products`  AS SELECT `products`.`product_id` AS `product_id`, `products`.`product_name` AS `product_name`, `products`.`product_desc` AS `product_desc`, `products`.`product_img` AS `product_img`, `products`.`product_price` AS `product_price`, `products`.`key_features` AS `key_features` FROM `products` ;

-- --------------------------------------------------------

--
-- Structure for view `view_users`
--
DROP TABLE IF EXISTS `view_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_users`  AS SELECT `users`.`user_id` AS `user_id`, `users`.`firstname` AS `firstname`, `users`.`lastname` AS `lastname`, `users`.`email` AS `email`, `users`.`password` AS `password`, `users`.`reg_date` AS `reg_date` FROM `users` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_orders_users` (`user_id`);

--
-- Indexes for table `order_contents`
--
ALTER TABLE `order_contents`
  ADD PRIMARY KEY (`content_id`),
  ADD KEY `fk_order_contents_products` (`product_id`),
  ADD KEY `fk_order_contents_orders` (`order_id`);

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
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_contents`
--
ALTER TABLE `order_contents`
  MODIFY `content_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_contents`
--
ALTER TABLE `order_contents`
  ADD CONSTRAINT `fk_order_contents_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `fk_order_contents_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
