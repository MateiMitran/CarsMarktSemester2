-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: studmysql01.fhict.local
-- Generation Time: May 30, 2021 at 08:55 PM
-- Server version: 5.7.26-log
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbi458877`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(255) NOT NULL,
  `announcement` varchar(255) NOT NULL,
  `admin_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `announcement`, `admin_id`) VALUES
(27, 'Test | posted on 2021-05-29 12:05:13pm', 25),
(28, 'Test | posted on 2021-05-29 12:06:46pm', 25),
(31, 'We reached 10 listings! | posted on 2021-05-30 08:33:46pm', 25);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `manufacturer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `build_year` int(255) NOT NULL,
  `price` double NOT NULL,
  `total_mileage` int(255) NOT NULL,
  `type` enum('sedan','coupe','suv','crossover','hatchback','hybrid','convertible','sports_car','pickup_truck','minivan_van','electric','limo') COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `engine` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fuel_type` enum('petrol','diesel','lpg','electric') COLLATE utf8_unicode_ci NOT NULL,
  `transmission` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `drivetrain` enum('awd','fwd','rwd','4wd') COLLATE utf8_unicode_ci NOT NULL,
  `city_mileage` int(255) NOT NULL,
  `highway_mileage` int(255) NOT NULL,
  `exterior_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `interior_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vin` varchar(17) COLLATE utf8_unicode_ci NOT NULL,
  `convenience_features` varchar(1020) COLLATE utf8_unicode_ci NOT NULL,
  `safety_features` varchar(1020) COLLATE utf8_unicode_ci NOT NULL,
  `seating_features` varchar(1020) COLLATE utf8_unicode_ci NOT NULL,
  `exterior_features` varchar(1020) COLLATE utf8_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image5` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `model`, `manufacturer`, `build_year`, `price`, `total_mileage`, `type`, `description`, `engine`, `fuel_type`, `transmission`, `drivetrain`, `city_mileage`, `highway_mileage`, `exterior_color`, `interior_color`, `vin`, `convenience_features`, `safety_features`, `seating_features`, `exterior_features`, `image1`, `image2`, `image3`, `image4`, `image5`) VALUES
(50, 'MDX', 'Acura', 2020, 25000, 125000, 'sedan', 'Used Acura', 'Inline V6', 'diesel', '6-speed shiftable automatic', 'awd', 18, 27, 'Black', 'Black', '123ABC', 'Cruise Control', 'Break Assist', 'Heated Seats', 'Alloy Wheels', 'carimages/acura_1.jpg', 'carimages/acura_2.jpg', 'carimages/acura_3.jpg', 'carimages/acura_4.jpg', 'carimages/acura_5.jpg'),
(51, 'A6', 'Audi', 2018, 25000, 125000, 'sedan', 'Used Audi A6', 'Inline V6', 'diesel', '8-Speed Automatic', 'rwd', 25, 45, 'Black', 'Black', '123ABD', 'Cruise Control', 'Break Assist', 'Heated Seats', 'Alloy Wheels', 'carimages/audi_1.jpg', 'carimages/audi_2.jpg', 'carimages/audi_3.jpg', 'carimages/audi_4.png', 'carimages/audi_5.jpg'),
(52, 'X6', 'BMW', 2020, 125000, 65000, 'suv', 'Used blue BMW X6', 'Inline V8', 'diesel', '9-Speed Automatic', 'awd', 25, 35, 'Blue', 'Black', '123ABE', 'Cruise Control', 'Break Assist', 'Heated Seats', 'Alloy Wheels', 'carimages/bmw_1.jpg', 'carimages/bmw_2.jpg', 'carimages/bmw_3.jpg', 'carimages/bmw_4.jpg', 'carimages/bmw_5.jpg'),
(53, 'Fiesta', 'Ford', 2016, 2000, 250000, 'sedan', 'Used Ford. Price is negotiable', 'Inline 2.0 l', 'diesel', '5-Speed Manual', 'rwd', 25, 43, 'Black', 'Black', '123ABF', 'Cruise Control', 'Break Assist', 'Heated Seats', 'Alloy Wheels', 'carimages/ford_3.jpg', 'carimages/ford_1.jpg', 'carimages/ford_2.jpg', 'carimages/ford_4.jpg', 'carimages/ford_5.jpg'),
(54, 'RX450h Sport', 'Lexus', 2018, 75000, 65000, 'suv', 'Hybrid Car', '3.5 Liter 24v V6', 'petrol', '8-Speed Automatic', 'awd', 25, 34, 'Black', 'Black', '123ABG', 'Cruise Control', 'Break Assist', 'Heated Seats', 'Alloy Wheels', 'carimages/1.jpg', 'carimages/2.jpg', 'carimages/3.jpg', 'carimages/4.jpg', 'carimages/5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `date_listed` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `user_id`, `car_id`, `date_listed`) VALUES
(26, 31, 50, '2021/05/30'),
(27, 31, 51, '2021/05/30'),
(28, 31, 52, '2021/05/30'),
(29, 31, 53, '2021/05/30'),
(30, 31, 54, '2021/05/30');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `type` enum('user','admin') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `first_name`, `last_name`, `email`, `password`, `phone`) VALUES
(12, 'admin', 'Michael', 'McDuffin', 'admin@mail.com', '$2y$10$rZ8.adJM5h/CGjbmWmQ9CeEgv90RNCn3Vbm8Kly.xKGIvbxnz4fv6', '0123456789'),
(25, 'admin', 'Kalina', 'Petrova', 'kalina.petrova@fontys.nl', '$2y$10$u5EOORL3dFYageBXgiUm1uJslwfm8ZSrZDIup63qL3mFfauzK2JVy', '0123476789'),
(31, 'user', 'Matei', 'Mitran', 'matei.mitran@gmail.com', '$2y$10$Av.5OrpbQ5QlPMsYPJg6u.bOxbIMzEH9B8Sd5zk4g43EQihOckEpG', '0123456789'),
(34, 'user', 'Jason', 'Statham', 'jason@mail.com', '$2y$10$Fzh9hqt0UhHbWpFbu.16GerDt3xgmsROO108.mEtcWKAGb14TxVFi', '0123456789'),
(35, 'user', 'Mary', 'Poppins', 'mary@gmail.com', '$2y$10$/ofzntCbLZVX0DUPn58cT.OW9HfYbl7xe8WGfSK648UEWmn6GWX0e', '0123456789'),
(36, 'user', 'Harry', 'Potter', 'harry@gmail.com', '$2y$10$1CXzT5kXZQowpqsbXzUCpedpUSqrqRBU25oWf16bvKLriyQr.KghG', '0123456789'),
(37, 'user', 'Andy', 'Andrew', 'andy@mail.com', '$2y$10$RHOW6r8QC.Hx1vSe0JSUB.d1rvJle888SfNi4JOOPGyUJ.2RopyYK', '0123456789'),
(38, 'admin', 'Andre', 'Postma', 'andre@mail.com', '$2y$10$4/YKb5lYFZBMknPfQk7a8uZds02NYkUkK2DU52mNE7cFEIa/r470i', '0123456789'),
(39, 'admin', 'Qin', 'Zhao', 'qin@mail.com', '$2y$10$EYR6rzKBU0.HSZ1NJs87UugI0SEJrx11bDqFRe/bDn42nObfHQzmq', '0123456789'),
(40, 'admin', 'Bert', 'Van Gestel', 'bert@mail.com', '$2y$10$l2ZusXcRSNeKrTePQn5aLuQScKznWkJK.0ox6wTW/lYXQaOeyngsy', '0123456789'),
(41, 'admin', 'Stan', 'Van Hartingsveldt', 'stan@mail.com', '$2y$10$osUhLjbSOpQkthoCMoTHdOEggKxOQnKwUa5wIdctve/.fstV/XFEG', '0123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `SECONDARY` (`admin_id`) USING BTREE;

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `foreignkey` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `listings`
--
ALTER TABLE `listings`
  ADD CONSTRAINT `listings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `listings_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
