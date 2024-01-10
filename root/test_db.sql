-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 12:09 PM
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
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `product_desc` varchar(200) NOT NULL,
  `product_img` varchar(20) NOT NULL,
  `product_price` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_desc`, `product_img`, `product_price`) VALUES
(1, 'Product 1', 'Description 1', 'image1.jpg', 10.99),
(2, 'Product 2', 'Description 2', 'image2.jpg', 15.99),
(3, 'Product 3', 'Description 3', 'image3.jpg', 8.99),
(4, 'Product 4', 'Description 4', 'image4.jpg', 12.99),
(5, 'Product 5', 'Description 5', 'image5.jpg', 19.99),
(6, 'Product 6', 'Description 6', 'image6.jpg', 7.99),
(7, 'Product 7', 'Description 7', 'image7.jpg', 14.99),
(8, 'Product 8', 'Description 8', 'image8.jpg', 9.99),
(9, 'Product 9', 'Description 9', 'image9.jpg', 11.99),
(10, 'Product 10', 'Description 10', 'image10.jpg', 16.99);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL AUTO-INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`user_id`, `item_id`, `total`, `order_date`, `payment_id`) VALUES
(1, 1, 21.98, '2023-05-01 00:00:00', 1001),
(1, 3, 8.99, '2023-05-02 00:00:00', 1002),
(1, 4, 12.99, '2023-05-10 00:00:00', 1010),
(2, 1, 21.98, '2023-05-06 00:00:00', 1006),
(2, 2, 47.97, '2023-05-03 00:00:00', 1003),
(3, 3, 8.99, '2023-05-07 00:00:00', 1007),
(3, 5, 39.98, '2023-05-04 00:00:00', 1004),
(4, 2, 31.98, '2023-05-09 00:00:00', 1009),
(4, 4, 12.99, '2023-05-05 00:00:00', 1005),
(5, 5, 59.97, '2023-05-08 00:00:00', 1008);

-- --------------------------------------------------------

--
-- Table structure for table `order-contents`
--

CREATE TABLE 'order_contents' (
    content_id int UNSIGNED NOT NULL AUTO-INCREMENT,
    order_id int NOT NULL,
    item_id int NOT NULL,
    quantity int NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    );
    
    INSERT INTO order_contents (order_id, item_id, quantity, price) VALUES
(1, 1, 2, 10.99),
(1, 3, 1, 8.99),
(1, 4, 1, 12.99),
(2, 1, 2, 10.99),
(2, 2, 3, 15.99),
(3, 3, 1, 8.99),
(3, 5, 2, 19.99),
(4, 2, 2, 15.99),
(4, 4, 1, 12.99),
(5, 5, 3, 19.99);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(64) NOT NULL,
  `reg_date` datetime NOT NULL,
  `payment_id` int(10) NULL
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
(10, 'Sophia', 'Garcia', 'sophiagarcia@example.com', 'pass4567', '2023-05-10 00:00:00', 1010);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order-contents`
--
ALTER TABLE `order-contents`
  ADD PRIMARY KEY (`content_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
