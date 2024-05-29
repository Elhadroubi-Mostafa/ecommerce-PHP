-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2024 at 12:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp(),
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`, `description`, `date_creation`, `icon`) VALUES
(2, 'fruit', 'description des fruits', '2024-04-25 15:07:35', 'fa-solid fa-lemon'),
(3, 'sport', 'sports', '2024-04-25 15:44:01', 'fa-solid fa-football'),
(5, 'livre', 'des livres', '2024-04-26 10:12:46', 'fa-solid fa-book'),
(6, 'cafe', 'description d une cafe', '2024-04-27 11:14:44', 'fa-light fa-mug-hot'),
(7, 'TV', 'description de TV', '2024-04-27 11:32:13', 'fa-solid fa-tv'),
(8, 'cosmitic', 'description de cosmitic', '2024-04-27 14:15:34', 'fa-solid fa-spa');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `discount` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date_creation` datetime NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `prix`, `discount`, `id_categorie`, `date_creation`, `description`, `image`) VALUES
(4, 'danoneccccc', 23333, 12, 3, '2024-04-28 00:00:00', 'sdfsdfsdf', '662dee4fc24cfpngtree-man-in-shirt-smiles-and-gives-thumbs-up-to-show-approval-png-image_10094381.png'),
(5, 'monada', 500, 60, 6, '2024-04-27 00:00:00', 'coca cola', '662d19759d82bdevelopper-votre-site-web-full-stack-personnalisee.png'),
(6, 'sokar', 12, 12, 2, '2024-04-27 00:00:00', 'sanida', '662d1d3653d39developpeur-informatique-freelance-developpement-web-et-logiciel.jpg'),
(7, 'zit', 76, 6, 7, '2024-04-28 00:00:00', 'hhhhhhhhhhhhhhhhhhh', '662dee322f5b2produit.jpg'),
(9, 'samsung TV', 10000, 12, 7, '2024-04-27 00:00:00', 'description de tv', '662d199e18cb9developper-votre-site-web-full-stack-personnalisee.png'),
(10, 'hidenshouldersrrrrr', 66, 26, 8, '2024-04-27 00:00:00', 'shompones', '662d1c1be96f4pngtree-man-in-shirt-smiles-and-gives-thumbs-up-to-show-approval-png-image_10094381.png'),
(11, 'lait', 4, 19, 6, '2024-04-28 00:00:00', 'ggggggggggggg', '662dee63a51ecdeveloppeur-informatique-freelance-developpement-web-et-logiciel.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`, `date_creation`) VALUES
(1, 'mostafa.elhadroubi.dev@gmail.com', '4444', '2024-04-25'),
(2, 'mostafa', '1234', '2024-04-25'),
(3, 'mohamed', '1234', '2024-04-25'),
(4, 'hossein', '2222', '2024-04-25'),
(5, 'mostafa', '1234', '2024-04-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
