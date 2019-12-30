-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 30, 2019 at 08:07 AM
-- Server version: 5.5.50
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(400) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `email`, `password`, `name`, `created_at`, `updated_at`, `last_login`) VALUES
(1, 'admin@gmail.com', '$2y$10$vT5S52isCRT.YIUascSExOe.E/7rbliq0NIg9491G1I9p15vO3DWq', 'Surajit Basak', '2019-12-27 15:25:47', NULL, '2019-12-29 16:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enquiry`
--

CREATE TABLE `tbl_enquiry` (
  `id` int(11) UNSIGNED NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `phno` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pack_code` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `remarks` text,
  `status` varchar(255) DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_enquiry`
--

INSERT INTO `tbl_enquiry` (`id`, `fullname`, `phno`, `email`, `pack_code`, `month`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Avijit Bsak', '9749129655', 'avijitbasak@gmail.com', 'TAN-1', 'January', 'I need to visit this place.', 'Active', '2019-12-29 16:47:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_itinerary`
--

CREATE TABLE `tbl_itinerary` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_itinerary`
--

INSERT INTO `tbl_itinerary` (`id`, `name`, `value`, `icon`) VALUES
(1, 'itn_hotel', 'Hotel', '<i class=\"fas fa-building\"></i>'),
(2, 'itn_transport', 'Transport', '<i class=\"fas fa-bus\"></i>'),
(3, 'itn_meal', 'Meal', '<i class=\"fas fa-hamburger\"></i>'),
(4, 'itn_sightseeing', 'Sightseeing', '<i class=\"fas fa-tram\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menus`
--

CREATE TABLE `tbl_menus` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `url` varchar(255) NOT NULL,
  `sequence` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_menus`
--

INSERT INTO `tbl_menus` (`id`, `name`, `url`, `sequence`, `icon`) VALUES
(1, 'Adminisrator', '#', 1, '<i class=\"nav-icon fas fa-tachometer-alt\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `rate_per` double(16,2) DEFAULT NULL,
  `nights` int(11) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `min_pax` int(11) DEFAULT NULL,
  `pack_code` varchar(255) DEFAULT NULL,
  `itn_hotel` tinyint(1) DEFAULT '0',
  `itn_transport` tinyint(1) DEFAULT '0',
  `itn_meal` tinyint(1) DEFAULT '0',
  `itn_sightseeing` tinyint(1) DEFAULT '0',
  `tag` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`id`, `title`, `description`, `image`, `rate_per`, `nights`, `days`, `min_pax`, `pack_code`, `itn_hotel`, `itn_transport`, `itn_meal`, `itn_sightseeing`, `tag`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Wonderful Darjeeling', 'Early morning at around 3:45 AM drive through primitive forests of oak, magnolia to Tiger Hill to view Sunrise', '1577562060.jpg', 8999.00, 3, 4, 4, 'TAN-1', 1, 1, 1, 1, 'Popular', 'Active', '2019-12-29 01:11:00', NULL),
(2, 'Delight Gangtok', 'Visit the borders between India and China There is no dearth of tourist attractions in Gangtok with places to', '1577568829.jpg', 7899.00, 3, 4, 4, 'TAN-2', 1, 1, 1, 1, 'Hot', 'Active', '2019-12-29 03:03:49', NULL),
(3, 'Delight Sikkim & Darjeeling', 'Early morning at around 3:45 AM drive through primitive forests of oak, magnolia to Tiger Hill to view Sunrise', '1577569144.jpg', 9999.00, 4, 5, 4, 'TAN-3', 1, 1, 1, 1, 'New', 'Active', '2019-12-29 03:09:04', NULL),
(4, 'Tour Package Explore amazing Sikkim and Darjeeling', 'Visit the borders between India and China There is no dearth of tourist attractions in Gangtok with places to', '1577569331.jpg', 10999.00, 5, 6, 4, 'TAN-4', 1, 1, 1, 1, 'Hot', 'Active', '2019-12-29 03:12:11', NULL),
(5, 'Majestic Sikkim & Darjeeling', 'Visit the borders between India and China There is no dearth of tourist attractions in Gangtok with places to', '1577569507.jpg', 12900.00, 5, 6, 4, 'TAN-5', 1, 1, 1, 1, 'Trending', 'Active', '2019-12-29 03:15:07', NULL),
(6, 'Explore Sikkim & Darjeeling', 'Explore the enticing tourist attractions of Gangtok and experience the true essence of this wonderland. Post a', '1577569557.jpg', 13499.00, 6, 7, 4, 'TAN-6', 1, 1, 1, 1, 'Trending', 'Active', '2019-12-29 03:15:57', NULL),
(7, 'Tour Package Sikkim & Darjeeling Moonson Beauty', 'places to visit like Tsomgo Lake and Baba Harbhajan Mandir. After having a lip-smacking breakfast today, get ready', '1577569677.jpg', 13999.00, 6, 7, 4, 'TAN-7', 1, 1, 1, 1, 'New', 'Active', '2019-12-29 03:17:57', NULL),
(8, 'Tour Package Scenic Beauty of Sikkim & Darjeeling', 'You can also visit the strategic pass- Nathula Pass, offshoot the Old Silk Road. However, the permit is subject to', '1577569730.jpg', 15899.00, 6, 7, 4, 'TAN-8', 1, 1, 1, 1, 'Trending', 'Active', '2019-12-29 03:18:51', NULL),
(9, 'Exotic Sikkim', 'Visit the borders between India and China There is no dearth of tourist attractions in Gangtok with places to', '1577569778.jpg', 17699.00, 7, 8, 4, 'TAN-9', 1, 1, 1, 1, 'Trending', 'Active', '2019-12-29 03:19:38', NULL),
(10, 'Heavenly Sikkim & Darjeeling', 'While on the way visit Singhik View Point, Tashi View Point & Seven sister Falls which offers entrancing', '1577569826.jpg', 18000.00, 7, 8, 4, 'TAN-10', 1, 1, 1, 1, 'Hot', 'Active', '2019-12-29 03:20:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_submenus`
--

CREATE TABLE `tbl_submenus` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `sequence` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_submenus`
--

INSERT INTO `tbl_submenus` (`id`, `name`, `menu_id`, `url`, `sequence`, `icon`) VALUES
(1, 'Package Entry', 1, 'main/packageentry', 1, '<i class=\"far fa-circle nav-icon\"></i>'),
(2, 'Enquiry Details', 1, 'main/enquiry', 2, '<i class=\"far fa-circle nav-icon\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tag`
--

CREATE TABLE `tbl_tag` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_tag`
--

INSERT INTO `tbl_tag` (`id`, `name`) VALUES
(2, 'Hot'),
(4, 'New'),
(1, 'Popular'),
(3, 'Trending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
ADD PRIMARY KEY (`id`) USING BTREE,
ADD UNIQUE KEY `email` (`email`) USING BTREE;

--
-- Indexes for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
ADD PRIMARY KEY (`id`) USING BTREE,
ADD KEY `fk_pack_code` (`pack_code`) USING BTREE;

--
-- Indexes for table `tbl_itinerary`
--
ALTER TABLE `tbl_itinerary`
ADD PRIMARY KEY (`id`) USING BTREE,
ADD KEY `name` (`value`) USING BTREE;

--
-- Indexes for table `tbl_menus`
--
ALTER TABLE `tbl_menus`
ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
ADD PRIMARY KEY (`id`) USING BTREE,
ADD KEY `fk_itinerary` (`itn_hotel`) USING BTREE,
ADD KEY `fk_status` (`status`) USING BTREE,
ADD KEY `fk_tag` (`tag`) USING BTREE,
ADD KEY `pack_code` (`pack_code`) USING BTREE;

--
-- Indexes for table `tbl_submenus`
--
ALTER TABLE `tbl_submenus`
ADD PRIMARY KEY (`id`) USING BTREE,
ADD KEY `fk_menu` (`menu_id`) USING BTREE;

--
-- Indexes for table `tbl_tag`
--
ALTER TABLE `tbl_tag`
ADD PRIMARY KEY (`id`) USING BTREE,
ADD KEY `name` (`name`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_itinerary`
--
ALTER TABLE `tbl_itinerary`
MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_menus`
--
ALTER TABLE `tbl_menus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_submenus`
--
ALTER TABLE `tbl_submenus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_tag`
--
ALTER TABLE `tbl_tag`
MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
ADD CONSTRAINT `fk_pack_code` FOREIGN KEY (`pack_code`) REFERENCES `tbl_package` (`pack_code`);

--
-- Constraints for table `tbl_package`
--
ALTER TABLE `tbl_package`
ADD CONSTRAINT `fk_tag` FOREIGN KEY (`tag`) REFERENCES `tbl_tag` (`name`);

--
-- Constraints for table `tbl_submenus`
--
ALTER TABLE `tbl_submenus`
ADD CONSTRAINT `fk_menu` FOREIGN KEY (`menu_id`) REFERENCES `tbl_menus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
