-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 25 avr. 2023 à 14:15
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `creatorcentral`
--
CREATE DATABASE IF NOT EXISTS `creatorcentral` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `creatorcentral`;

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `username` varchar(20) NOT NULL,
  `postId` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `postId` int(16) NOT NULL,
  `username` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `title` varchar(50) NOT NULL,
  `content` varchar(500) NOT NULL,
  `picturePath` varchar(100) NOT NULL DEFAULT '/CreatorCentral/img/default_image.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`postId`, `username`, `date`, `title`, `content`, `picturePath`) VALUES
(1, 'maxime', '2023-04-25 12:03:02', 'mazjdmlk', 'mlzkemlazklezkz', '/CreatorCentral/img/default_image.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('abcd', '$2y$10$wj9DwOErahy.5FJ4Fyshc.MCio0TfEMJBUVt722426tx7/QAp8N/6'),
('antoine', '$2y$10$hmfQ8u6M0.D4Pc6rzx4rT.jZA4hDMjB97daTDI5YwXTPGbgoM2ZDy'),
('bruh', '$2y$10$FqLSnQrtNfijLIHk0H4Ed.ZQtY3zrjwGTri.GD9RH67e8OHoeI7AS'),
('coucou', '$2y$10$d3rdvRutI9uMYSJcXedAcuT80NZOdC0GwHwXE5BfKhEo/Bw2VjYRm'),
('flavian', '$2y$10$.o9b.LLtgcrzfBi5AlDde.JDmqIVn6hJcgkdLiffLDJnoKA3O8ENS'),
('maxime', '$2y$10$Um4WqoAVsbvqDqVgo5/xBOAXr31HZwpG.kHimF4BFuoQTS5O1OM3e'),
('user', '$2y$10$8X1NaQuxhE99L1jlk2px2O0LnUaOwElyw7Mh3ZKqypCiCiIRxjnN2');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`username`,`postId`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postId`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `postId` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
