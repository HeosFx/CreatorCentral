-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 27 avr. 2023 à 15:28
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

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`username`, `postId`) VALUES
('maxime', ''),
('user3', '20'),
('user3', '19'),
('user3', '15'),
('flavian', '22'),
('flavian', '18'),
('flavian', '16'),
('flavian', '15'),
('maxime', '20'),
('maxime', '15'),
('maxime', '21');

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
(15, 'user3', '2023-04-27 12:40:11', 'Transformez votre cour pour des soirées estivales ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed accumsan a justo a vestibulum. Pellentesque vel augue at dolor porttitor varius vitae nec odio. Sed egestas magna purus, non convallis erat elementum quis. Sed ut nulla tincidunt massa euismod sollicitudin id non augue. Vivamus pellentesque lectus nec pellentesque sodales. Donec faucibus justo ac interdum fringilla. Vestibulum arcu eros, interdum vitae posuere vitae, ultrices at lectus. Pellentesque lacus nisi, laoreet vel pulvinar sit', 'uploads/user3_042723144011.jpg'),
(16, 'flavian', '2023-04-27 12:44:45', 'Recyclage de meubles', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ullamcorper turpis quis molestie suscipit. Etiam fermentum non neque in porta. Sed turpis mi, faucibus id rhoncus non, faucibus eu neque. Praesent at mauris porta, porttitor nunc ut, molestie arcu. In nec sodales mi. Nam vitae leo vitae neque tincidunt mattis et ut elit. Duis in iaculis erat. Nam rhoncus ultricies urna, cursus convallis augue iaculis hendrerit. Nunc mollis purus vitae malesuada euismod. Orci varius natoque penatib', 'uploads/flavian_042723144445.jpg'),
(17, 'flavian', '2023-04-27 12:53:20', 'Solutions rapides pour un nouveau look', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ullamcorper turpis quis molestie suscipit. Etiam fermentum non neque in porta. Sed turpis mi, faucibus id rhoncus non, faucibus eu neque. Praesent at mauris porta, porttitor nunc ut, molestie arcu. In nec sodales mi. Nam vitae leo vitae neque tincidunt mattis et ut elit. Duis in iaculis erat. Nam rhoncus ultricies urna, cursus convallis augue iaculis hendrerit. Nunc mollis purus vitae malesuada euismod. Orci varius natoque penatib', '/CreatorCentral/img/default_image.jpg'),
(18, 'maxime', '2023-04-27 13:19:15', 'Porte serviette', 'Nullam gravida odio nibh, gravida vulputate nulla ultricies sed. Nunc mollis egestas lectus, id commodo lectus iaculis ut. Proin dignissim tortor ut fringilla convallis. Suspendisse mi magna, porta id mauris ut, faucibus rhoncus libero. Aenean suscipit erat sapien, a maximus ex pharetra at. Vestibulum hendrerit sem a nulla tempus consectetur. Sed placerat iaculis mauris, et congue lacus convallis nec. Nulla ac euismod dui. In vitae neque convallis, molestie nisi sed, viverra nisi. Orci varius na', 'uploads/maxime_042723151915.jpg'),
(19, 'user1', '2023-04-27 13:00:06', 'Broderie', 'Voici ma broderie', 'uploads/user1_042723150006.jpg'),
(20, 'user2', '2023-04-27 13:03:02', 'Créez un lit personnalisé pour votre ami à quatre ', 'Vestibulum hendrerit sem a nulla tempus consectetur. Sed placerat iaculis mauris, et congue lacus convallis nec. Nulla ac euismod dui. In vitae neque convallis, molestie nisi sed, viverra nisi. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '/CreatorCentral/img/default_image.jpg'),
(21, 'user2', '2023-04-27 13:05:31', 'Cadre photo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ullamcorper turpis quis molestie suscipit. Etiam fermentum non neque in porta. Sed turpis mi, faucibus id rhoncus non, faucibus eu neque. Praesent at mauris porta, porttitor nunc ut, molestie arcu. In nec sodales mi. Nam vitae leo vitae neque tincidunt mattis et ut elit. Duis in iaculis erat. Nam rhoncus ultricies urna, cursus convallis augue iaculis hendrerit. Nunc mollis purus vitae malesuada euismod. Orci varius natoque penatib', '/CreatorCentral/img/default_image.jpg'),
(22, 'user3', '2023-04-27 13:10:23', 'Cadre photo', 'Ce cadre photo vous rendra plus beau que beau', 'uploads/user3_042723151023.jpg');

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
('flavian', '$2y$10$AvO.YawKbdGh4dU7MdsdtOGZLldrW1Nl5YcIp17TS4nDUk1tiTMDW'),
('maxime', '$2y$10$eDN7wl/7ft9ohPietZ3j1.ciGPRRUKUKSj.BaRMrbvX.F9IyHZynK'),
('user1', '$2y$10$pJV8/15H4wtKA1tA40o7U.DM2KORjXEPiqiu2ya6bP0A8DaZFI.5a'),
('user2', '$2y$10$b.k1VvxQDphBDnFoF9Yd8uPlj5esuSYBm8ZdirHSr0G3etHJrWaN6'),
('user3', '$2y$10$RVqjDIGV3.DdNUcSV3QLYeOYHVJ3TQs/vXaqNzM5QXG1MrqGfGOji');

--
-- Index pour les tables déchargées
--

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
  MODIFY `postId` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
