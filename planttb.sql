-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 08:35 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plantdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `planttb`
--

CREATE TABLE `planttb` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float DEFAULT NULL,
  `product_description` varchar(255) DEFAULT NULL,
  `product_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `planttb`
--

INSERT INTO `planttb` (`id`, `product_name`, `product_price`, `product_description`, `product_image`) VALUES
(1, 'Aloe Vera', 100, 'Aloe vera is a succulent plant species of the genus Aloe. It is widely distributed, and is considered an invasive species in many world regions.  An evergreen perennial, it originates from the Arabian Peninsula.', '../assets/aloev.jpg'),
(2, 'Bonsai', 250, 'Bonsai is the Japanese art of growing and training miniature trees in pots, developed from the traditional Chinese art form of penjing. can survive indoors where temperatures are high and stable throughout the year.', '../assets/bonsai.jpg'),
(3, 'Snake Plant', 75, 'Dracaena trifasciata is a species of flowering plant in the family Asparagaceae, native to tropical West Africa from Nigeria east to the Congo.  It is most commonly known as the snake plant among other names.', '../assets/snakep.jpg'),
(4, 'Golden Pothos', 150, 'Epipremnum aureum is a species in the arum family Araceae, native to Mo\'orea in the Society Islands of French Polynesia  known for its heart-shaped green leaves with yellow variegation the lime-green Pothos Neon.', '../assets/pothos.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `planttb`
--
ALTER TABLE `planttb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `planttb`
--
ALTER TABLE `planttb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
