-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2022 at 03:56 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BE15_CR11_petadoption_Gabriel`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoption`
--

CREATE TABLE `adoption` (
  `adaption_id` int(11) NOT NULL,
  `fk_animal_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `adoption_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `adoption`
--

TRUNCATE TABLE `adoption`;
--
-- Dumping data for table `adoption`
--

INSERT INTO `adoption` (`adaption_id`, `fk_animal_id`, `fk_user_id`, `adoption_date`) VALUES
(12, 3, 10, '1990-01-01'),
(13, 3, 10, '2022-03-26'),
(16, 8, 10, '2022-03-26'),
(17, 8, 10, '2022-03-26'),
(18, 8, 10, '2022-03-26'),
(19, 8, 10, '2022-03-26'),
(20, 8, 10, '2022-03-26'),
(21, 8, 10, '2022-03-26'),
(22, 8, 10, '2022-03-26'),
(23, 8, 10, '2022-03-26'),
(24, 8, 10, '2022-03-26'),
(25, 8, 10, '2022-03-26'),
(26, 8, 10, '2022-03-26'),
(27, 8, 10, '2022-03-26'),
(28, 3, 10, '2022-03-26'),
(45, 14, 10, '2022-03-29'),
(46, 14, 10, '2022-03-29'),
(47, 14, 10, '2022-03-29'),
(48, 14, 10, '2022-03-29'),
(49, 14, 10, '2022-03-29'),
(50, 14, 10, '2022-03-29'),
(51, 14, 10, '2022-03-29'),
(52, 14, 10, '2022-03-29'),
(53, 14, 10, '2022-03-29'),
(54, 14, 10, '2022-03-29'),
(55, 14, 10, '2022-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `animal_id` int(11) NOT NULL,
  `animal_name` varchar(30) NOT NULL,
  `come_from` varchar(30) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `size` enum('big','medium','small') NOT NULL,
  `age` int(11) NOT NULL,
  `breed` varchar(30) NOT NULL,
  `available` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `animals`
--

TRUNCATE TABLE `animals`;
--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`animal_id`, `animal_name`, `come_from`, `picture`, `address`, `description`, `size`, `age`, `breed`, `available`) VALUES
(3, 'Tiger', ' Africa', '624305b0582e8.jpg', 'Gasse 7', 'Der Tiger ist eine in Asien verbreitete Großkatze. Er ist aufgrund seiner Größe und des charakteristischen dunklen Streifenmusters auf goldgelbem bis rotbraunem Grund unverwechselbar.', 'small', 12, 'Tiger', 5),
(8, 'Gorilla', ' Africa', '62430ad930895.jpg', 'Gasse 7', 'Der Tiger ist eine in Asien verbreitete Großkatze. Er ist aufgrund seiner Größe und des charakteristischen dunklen Streifenmusters auf goldgelbem bis rotbraunem Grund unverwechselbar.', 'medium', 2, 'Gorilla chhe', 43),
(10, 'One horned rhino', ' Asia', '623f4566b21d1.jpg', 'Berlin', 'The expansive flat grasslands of Kaziranga National Park is fringed with jungle has a population of over 1,600 Indian one-horned rhinos, comprising over two-thirds of the world’s total.', 'big', 3, 'Rhinoceros unicornis', 2),
(11, 'Lion', ' Asia', '623f44f2b1f67.jpg', 'Barcelona', 'Today’s Asiatic lion exists only in India’s Gir National Park and the surrounding areas. The habitat in the park is dry scrub land and open deciduous forest, which could certainly be described as jungle.', 'big', 5, 'Asiatic lion', 11),
(14, 'Tiger', ' Central Africa', '62430ce53dae0.jpg', 'Berlin', 'Bengal tigers are native to India and Nepal. These stunning cats are the most common tiger, accounting for around half the world’s tiger population. ', 'big', 3, 'Bengal tiger', 4),
(15, 'Chimpanzee', ' Central Africa', '623f451dac527.jpg', 'Zagrab', 'These great apes are found in a number of habitats across Central and West Africa. Chimpanzees actually have the widest range of all great apes, living in tropical rainforests and grasslands, as well as being jungle-dwelling animals.', 'medium', 2, 'Pan troglodytes', 19),
(16, 'Jaguar', ' South America', '62430f967db2e.jpg', 'Wien', 'Jaguars are found in South and Central America, preferring wet lowland habitats, swampy savannas, and tropical rain forests. They are known to almost anything they can catch, including deer, crocodiles, snakes, monkeys, deer, sloths, tapirs, turtles, eggs, frogs and toads, and fish. ', 'medium', 11, 'Tiger', 3),
(19, 'Grilla', ' West Africa', '624306004a725.jpg', 'London', 'The expansive flat grasslands of Kaziranga National Park is fringed with jungle has a population of over 1,600 Indian one-horned rhinos, comprising over two-thirds of the world’s total.', 'big', 6, 'Gorilla chhe', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `user`
--

TRUNCATE TABLE `user`;
--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `password`, `date_of_birth`, `email`, `address`, `picture`, `status`) VALUES
(7, 'wall', 'wally', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2012-12-20', 'wall@mail.com', 'strasse 54', 'avatar.png', 'adm'),
(10, 'Some', 'Body', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2012-12-21', 'some@mail.com', 'Gasse 12', '623f1f329e9a6.jpg', 'user'),
(13, 'Top', 'Glas', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2020-10-10', 'tra@mail.com', 'Polgasse 6', '62430f61d92cb.jpg', 'user'),
(15, 'Gabriel', 'Skraba', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2010-10-10', 'tom@mail.com', 'Spengergasse', '62430bb02cefe.jpg', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoption`
--
ALTER TABLE `adoption`
  ADD PRIMARY KEY (`adaption_id`),
  ADD KEY `fk_user_id` (`fk_user_id`),
  ADD KEY `fk_animal_id` (`fk_animal_id`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animal_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoption`
--
ALTER TABLE `adoption`
  MODIFY `adaption_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoption`
--
ALTER TABLE `adoption`
  ADD CONSTRAINT `fk_animal_id` FOREIGN KEY (`fk_animal_id`) REFERENCES `animals` (`animal_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
