-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2019 at 03:23 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donation_system`
--
CREATE DATABASE IF NOT EXISTS `donation_system` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `donation_system`;

-- --------------------------------------------------------

--
-- Table structure for table `blood_list`
--

CREATE TABLE `blood_list` (
  `id` int(11) NOT NULL,
  `donator_id` int(100) DEFAULT NULL,
  `donator_name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_number` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `donator_address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `blood_group` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_date` date DEFAULT NULL,
  `donated` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blood_list`
--

INSERT INTO `blood_list` (`id`, `donator_id`, `donator_name`, `contact_number`, `donator_address`, `blood_group`, `last_date`, `donated`) VALUES
(3, 6, 'Ratul', '01852404665', 'Anderkilla, Chittagong', 'ap', '2019-08-08', 1),
(4, 8, 'kamal', '555', 'Mohammadpur, Muradpur, Chittagong', 'bp', '2019-03-04', NULL),
(5, 12, 'Raihan', '01852404045', 'Chittagong', 'bn', '2019-04-09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cloth_list`
--

CREATE TABLE `cloth_list` (
  `id` int(11) NOT NULL,
  `provider_id` int(100) DEFAULT NULL,
  `organization_name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_number` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `available_item` int(11) DEFAULT NULL,
  `size` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `available` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'yes',
  `is_delivered` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `donatedPerson` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cloth_list`
--

INSERT INTO `cloth_list` (`id`, `provider_id`, `organization_name`, `address`, `contact_number`, `quantity`, `available_item`, `size`, `available`, `is_delivered`, `donatedPerson`) VALUES
(5, 3, 'XYZ textile', 'Bahaddarhat, Chittagong', '01852404655', '15', 0, 'l', 'no', 'yes', NULL),
(7, 3, 'Test Textile', 'Chittagong', '01873569845', '5', 0, 'S', 'yes', 'yes', 'demo user'),
(8, 3, 'Afra Textile', 'Chittagong', '01852404635', '45', 0, 'm', 'yes', 'yes', NULL),
(9, 3, 'Tanha Textile', 'Chittagong', '01852404655', '65', 0, 'L', 'yes', 'yes', 'demo user'),
(10, 3, 'Abc Textile', 'Chittagong', '01850751714', '500', 490, 'm', 'yes', 'no', 'demo user'),
(11, 3, 'Test Textile', 'Chittagong', '01873569845', '400', 400, 'S', 'yes', 'no', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cloth_provider`
--

CREATE TABLE `cloth_provider` (
  `id` int(11) NOT NULL,
  `provider_id` int(100) DEFAULT NULL,
  `organization_name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `available_item` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `donatedPerson` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_donate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cloth_provider`
--

INSERT INTO `cloth_provider` (`id`, `provider_id`, `organization_name`, `quantity`, `available_item`, `donatedPerson`, `item_donate`) VALUES
(1, 3, 'Test Textile', '5', '2', 'demo user', 2),
(2, 3, 'Test Textile', '5', '0', 'demo user', 3),
(3, 3, 'Tanha Textile', '65', '15', 'demo user', 5),
(4, 3, 'Tanha Textile', '65', '0', 'demo user', 15),
(5, 3, 'Abc Textile', '500', '490', 'demo user', 10);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `event_name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_type` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_location` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_date` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_time` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_expired` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food_list`
--

CREATE TABLE `food_list` (
  `id` int(11) NOT NULL,
  `provider_id` int(100) DEFAULT NULL,
  `organization_name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_number` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `people_number` int(100) DEFAULT NULL,
  `available_item` int(100) DEFAULT NULL,
  `date` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `available` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'yes',
  `is_delivered` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `food_list`
--

INSERT INTO `food_list` (`id`, `provider_id`, `organization_name`, `address`, `contact_number`, `people_number`, `available_item`, `date`, `time`, `available`, `is_delivered`) VALUES
(2, 11, 'Damfuk Restaurant', NULL, '01852404635', 20, 0, '18-09-2019', '01:30 PM', 'yes', 'yes'),
(3, 11, 'Marrige Ceremony', 'Chandgao, Chittagong', '01852404635', 50, 0, '17-09-2019', '09:30 PM', 'yes', 'yes'),
(4, 11, 'Zaman Hotel', 'Chwak Bazar, Chittagong', '01852404655', 20, 3, '10-09-2019', '01:30 PM', 'yes', 'no'),
(5, 16, 'Zalal Hotel', 'Pathar gata, Chittagong', '01765034803', 25, 3, '25-09-2019', '08:00 PM', 'yes', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `food_provider`
--

CREATE TABLE `food_provider` (
  `id` int(11) NOT NULL,
  `time` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `item_donate` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `donatedPerson` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `organization_name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `provider_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `food_provider`
--

INSERT INTO `food_provider` (`id`, `time`, `date`, `item_donate`, `donatedPerson`, `organization_name`, `provider_id`) VALUES
(1, '19:02:12', '2019-12-26', '2', 'demo user', 'Zaman Hotel', 11),
(2, '19:16:59', '2019-12-26', '2', 'demo user', 'Zalal Hotel', 16);

-- --------------------------------------------------------

--
-- Table structure for table `money_list`
--

CREATE TABLE `money_list` (
  `id` int(11) NOT NULL,
  `provider_id` int(100) DEFAULT NULL,
  `organization_name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_number` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `available_item` int(11) DEFAULT NULL,
  `transaction` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_match` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `available` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'yes',
  `is_delivered` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `money_list`
--

INSERT INTO `money_list` (`id`, `provider_id`, `organization_name`, `address`, `contact_number`, `amount`, `available_item`, `transaction`, `transaction_match`, `available`, `is_delivered`) VALUES
(1, 15, 'Rashed', NULL, '01852404040', '20000', 13000, '#54ddf5', 'yes', 'yes', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `money_provider`
--

CREATE TABLE `money_provider` (
  `id` int(11) NOT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `donatedPerson` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` time DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `money_provider`
--

INSERT INTO `money_provider` (`id`, `provider_id`, `amount`, `donatedPerson`, `time`, `date`) VALUES
(1, 15, 2000, 'demo user', '20:06:17', '2019-12-27');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `user_id` int(100) DEFAULT NULL,
  `user_name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_number` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `request_type` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `people_number` int(100) DEFAULT NULL,
  `cause` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `blood_group` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `blood_bag` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `document` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_delivered` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `user_id`, `user_name`, `contact_number`, `address`, `request_type`, `quantity`, `size`, `amount`, `people_number`, `cause`, `blood_group`, `blood_bag`, `document`, `date`, `time`, `is_delivered`) VALUES
(14, 7, 'demo user', '0152558525', 'chittagong medical', 'for_blood', NULL, NULL, NULL, NULL, 'operation', 'op', '1', '1569941819prescription.jpg', '19-10-2019', '06:00 PM', 'no'),
(15, 7, 'demo user', '0152558525', 'Muradpur, Chittagong', 'for_cloth', '10', 'm', NULL, NULL, 'for slum people', NULL, NULL, '1569943378prescription.jpg', NULL, NULL, 'no'),
(16, 7, 'demo user', '0152558525', 'Muradpur, Chittagong', 'for_money', NULL, NULL, '10000', NULL, 'education', NULL, NULL, '1569943456prescription.jpg', NULL, NULL, 'no'),
(17, 7, 'demo user', '0152558525', 'Muradpur, Chittagong', 'for_food', NULL, NULL, NULL, 20, 'slum people', NULL, NULL, '1569943519prescription.jpg', '15-10-2019', '01:30 PM', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_type` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_number` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `organization_name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_verified` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `admin_approved` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `email`, `password`, `name`, `contact_number`, `organization_name`, `address`, `email_verified`, `admin_approved`) VALUES
(3, 'cloth_donator', 'rashu.web@gmail.com', '1234', 'rashu', '01852404635', NULL, 'Bahaddarhat, Chittagong', 'Yes', 'no'),
(5, 'admin', 'admin@mail.com', '123', 'admin', '01852454545', NULL, NULL, 'yes', 'no'),
(6, 'blood_donator', 'rashu@royex.net', '1234', 'Ratul', '01852404635', NULL, 'Anderkilla, Chittagong', 'yes', 'no'),
(7, 'user', 'user1@mail.com', '1234', 'demo user', '0152558525', NULL, 'Muradpur, Chittagong', 'yes', 'no'),
(8, 'blood_donator', 'bloodDonator1@mail.com', '1234', 'Kamal', '545055451255', NULL, 'Mohammadpur, Chittagong', 'yes', 'no'),
(9, 'user', 'user2@mail.com', '1234', 'Raihan', '01854256585', NULL, 'Khulshi, Chittagong', 'yes', 'no'),
(10, 'cloth_donator', 'tanjaberrrr@gmail.com', '1234', 'lkjlklf', '64646546', NULL, 'sdfsdf', 'Yes', 'no'),
(11, 'food_donator', 'foodDonator1@mail.com', '1234', 'Rajib', '01675485885', NULL, 'Chittagong', 'yes', 'no'),
(12, 'blood_donator', 'blood2@mail.com', '1234', 'Raihan', '01852404040', NULL, 'Chittagong', 'yes', 'no'),
(15, 'money_donator', 'rashu.pro@gmail.com', '1234', 'Rajib', '01765034803', NULL, 'chittagong', 'Yes', 'no'),
(16, 'food_donator', 'mitonshil48@gmail.com', '1234', 'miton', '01765034803', NULL, 'chittagong', 'Yes', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_list`
--
ALTER TABLE `blood_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cloth_list`
--
ALTER TABLE `cloth_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cloth_provider`
--
ALTER TABLE `cloth_provider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_list`
--
ALTER TABLE `food_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_provider`
--
ALTER TABLE `food_provider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `money_list`
--
ALTER TABLE `money_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `money_provider`
--
ALTER TABLE `money_provider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_list`
--
ALTER TABLE `blood_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cloth_list`
--
ALTER TABLE `cloth_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cloth_provider`
--
ALTER TABLE `cloth_provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_list`
--
ALTER TABLE `food_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `food_provider`
--
ALTER TABLE `food_provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `money_list`
--
ALTER TABLE `money_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `money_provider`
--
ALTER TABLE `money_provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
