-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2026 at 04:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'ahmad', 'shahzad', 'ahmad@gmail.com', '12345'),
(2, 'ali', 'haider', 'ali@gmail.com', '$2y$10$PxnMLerQOpwYIGkWWUqg1eNKicSbm9vMN0zA9tpIXkyLQG/Wjf.tK'),
(3, 'M', 'Ali', 'dhsa@gmail.com', '$2y$10$0FyQdH.E4PPpU3vLLVycbul9XQOCTQGvBEC406.r5mO467VTy/i5C'),
(4, 'saif', 'islam', 'saif@gmail.com', '$2y$10$rOiuJjYUCXZLiFTaCKZbvuZFB6ktK3kKGrmEVzQUerA/QfA1oD82a');

-- --------------------------------------------------------

--
-- Table structure for table `contactmessages`
--

CREATE TABLE `contactmessages` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactmessages`
--

INSERT INTO `contactmessages` (`id`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(3, 'Ahmad Shahzad', 'iamahmadshahzad228576@gmail.com', '+923190222174', 'Testing', 'Testing Phase.'),
(4, 'Ahmad Shahzad', 'iamahmadshahzad228576@gmail.com', '+923190222174', 'Testing', 'kska sa akda sdjak'),
(5, 'Ahmad Shahzad', 'iamahmadshahzad228576@gmail.com', '79879796', 'jhjhk', 'gukgkhuj u j gjhgjg h tr sdy qrd p g h dbvcx');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `project_url` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `image`, `title`, `description`, `project_url`, `category`) VALUES
(5, '1771003626_p1download.png', 'Corporate Website', 'A professional corporate website built with modern responsive design and clean UI for better user experience.', 'http://localhost/company_website/index.php', 'Web Development'),
(6, '1771003589_p2.jfif', 'E-commerce Platform', 'A complete e-commerce solution with product catalog, shopping cart, and secure payment integration.', 'http://localhost/company_website/index.php', 'E-commerce'),
(7, '1771003568_p.jfif', 'Branding & Design', 'Logo, brochures, and social media graphics created for branding and marketing purposes.', 'http://localhost/company_website/index.php', 'Graphic Design');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `display_order` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `icon`, `display_order`) VALUES
(2, 'Graphic Design', 'Creative logo design, branding, brochures, and social media graphics to make your brand stand out.', 'bi bi-palette', '66'),
(3, 'Digital Marketing', 'We provide SEO, social media marketing, and paid advertising solutions to grow your business online.', 'bi bi-bar-chart-line', '44'),
(4, 'Web Development', 'We build modern, responsive, and high-performance websites using the latest technologies like HTML, CSS, JavaScript, and PHP.', 'bi bi-code-slash', '98'),
(5, 'MAD Developer', 'We provide mobile application developer for user need.', 'bi bi-code-slash', '83'),
(6, 'Mobile App Development', 'We create high-performance Android and iOS mobile applications that deliver seamless user experiences and scalable business solutions.', 'bi bi-phone', '1'),
(7, 'Cloud Solutions', 'Our cloud services provide secure data storage, server management, and scalable infrastructure to support your growing business operations.', 'bi bi-cloud', '2');

-- --------------------------------------------------------

--
-- Table structure for table `teammembers`
--

CREATE TABLE `teammembers` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `bio` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `linkedin_url` varchar(200) NOT NULL,
  `twitter_url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teammembers`
--

INSERT INTO `teammembers` (`id`, `name`, `designation`, `bio`, `photo`, `linkedin_url`, `twitter_url`) VALUES
(3, 'Ahmad Shahzad', 'Web developer', 'Ahmad are good full stack developer.', '1770789314_download.webp', 'http://localhost/company_website/admin/add-team.php', 'http://localhost/company_website/admin/add-team.php'),
(4, 'Ali Hssan', 'MAD Developer', 'Ali is professional in MAD developement.', '1770988263_download.webp', 'http://localhost:3000', 'http://localhost:3000/'),
(5, 'Saif ul Islam', 'Data Base Developer', 'Saif ul Islam is professional DB Developer.', '1770988330_download.webp', 'http://localhost:3000/team-members', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactmessages`
--
ALTER TABLE `contactmessages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teammembers`
--
ALTER TABLE `teammembers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contactmessages`
--
ALTER TABLE `contactmessages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teammembers`
--
ALTER TABLE `teammembers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
