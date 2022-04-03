-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2022 at 07:57 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpcrud`
--

-- --------------------------------------------------------

--
-- Table structure for table `animaldata`
--

CREATE TABLE `animaldata` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `lifeexpect` varchar(50) DEFAULT NULL,
  `submission` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animaldata`
--

INSERT INTO `animaldata` (`id`, `name`, `category`, `photo`, `description`, `lifeexpect`, `submission`) VALUES
(17, 'Horse', 'herbivores', 'Horse-Lifespan-683x1024.jpg', 'The horse is a domesticated, odd-toed, hoofed mammal. It belongs to the taxonomic family.', '10+ years', '03-04-2022 07:16:35am'),
(18, 'Snail', 'herbivores', 'helix-pomatia-burgundy-snail-690x518.jpg', 'A snail is in loose terms, a shelled gastropod.', '1-5 years', '03-04-2022 07:17:55am'),
(19, 'Lion', 'carnivores', 'lion-facts-786x446.jpg', 'The lion is a large cat of the genus Panthera native to Afroca and India.', '5-10 years', '03-04-2022 07:19:03am'),
(20, 'Wolf', 'carnivores', 'Eurasian_wolf_2.jpg', 'The wolf, also known as the gray wolf, is a large canine native to North America.', '10+ years', '03-04-2022 07:19:51am'),
(21, 'Dog', 'omnivores', '5484d9d1eab8ea3017b17e29.jpeg', 'The dog is a domesticated descendant of the wolf which is characterised by upturning tail.', '10+ years', '03-04-2022 07:20:53am'),
(22, 'Siberian chipmunk', 'omnivores', 'Streifenhoernchen.jpg', 'The Siberian chipmunk is native to northern Asia from central Russia  to China.', '5-10 years', '03-04-2022 07:26:42am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animaldata`
--
ALTER TABLE `animaldata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animaldata`
--
ALTER TABLE `animaldata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
