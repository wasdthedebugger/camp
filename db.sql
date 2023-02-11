-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2023 at 03:34 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `startacamp`
--

-- --------------------------------------------------------

--
-- Table structure for table `camps`
--

CREATE TABLE `camps` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `votes` int(11) NOT NULL,
  `image` text NOT NULL,
  `map` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `camps`
--

INSERT INTO `camps` (`id`, `username`, `title`, `content`, `date`, `votes`, `image`, `map`) VALUES
(22, 'admin', 'Homeless Man', 'We have spotted a Homeless man in Kathmandu. He is unable to get himself out of poverty as he cannot find employment. Let us all gather to help him. His location is shared below.', '2023-02-11 14:13:39', 0, 'front-view-homeless-man-with-beard-outdoors_23-2148760825[1].jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14132.119984276702!2d85.23815230083517!3d27.68546776878675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2snp!4v1676124518502!5m2!1sen!2snp\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(24, 'admin', 'Homeless children in despair', 'Our team has spotted 11 homeless children around Dwarka. If anybody would like to help them by any means. Please visit the location below.', '2023-02-10 18:15:00', 0, 'il_1080xN.1499465013_9ejt[1].jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.1920713960267!2d85.30272136468295!3d27.711355382790234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18fa35f35ec3%3A0x2825c0343cc1b738!2sOYO%20236%20Hotel%20Beli%20Nepal!5e0!3m2!1sen!2snp!4v1676124936900!5m2!1sen!2snp\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL COMMENT '0A 1T 2S',
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `role`, `content`) VALUES
(1, 'admin', 'admin', 0, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe esse reiciendis similique officia blanditiis necessitatibus earum debitis maxime quis tenetur exercitationem, laudantium recusandae, neque aspernatur, ipsa error est repellendus?'),
(2, 'user', 'user', 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe esse reiciendis similique officia blanditiis necessitatibus earum debitis maxime quis tenetur exercitationem, laudantium recusandae, neque aspernatur, ipsa error est repellendus?'),
(3, 'proton', 'proton123', 0, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe esse reiciendis similique officia blanditiis necessitatibus earum debitis maxime quis tenetur exercitationem, laudantium recusandae, neque aspernatur, ipsa error est repellendus?'),
(4, 'neutron', 'neutron123', 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe esse reiciendis similique officia blanditiis necessitatibus earum debitis maxime quis tenetur exercitationem, laudantium recusandae, neque aspernatur, ipsa error est repellendus?');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `camps`
--
ALTER TABLE `camps`
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
-- AUTO_INCREMENT for table `camps`
--
ALTER TABLE `camps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
