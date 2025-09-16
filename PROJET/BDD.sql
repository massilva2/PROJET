-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3309
-- Généré le : mar. 30 mai 2023 à 23:11
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `image`) VALUES
(1, 'Circoncision', 'img\\circoncision.PNG'),
(2, 'Iftar', 'img\\iftar.PNG'),
(3, 'Couffins', 'img\\couffins.jpg'),
(4, 'Formation Secourisme', 'img\\formation secourisme.jpg'),
(5, 'Formation chauffeur ambillancier', 'img\\formation chauffeur ambillancier.jpg'),
(6, 'Don de sang', 'img\\don de sang.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `mssg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `email`, `sujet`, `mssg`) VALUES
(1, 'test', 'test@gmail.com', 'test', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id` int(10) NOT NULL,
  `nom` varchar(256) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `ville` varchar(256) NOT NULL,
  `numero1` int(255) NOT NULL,
  `numero2` int(255) NOT NULL,
  `typedon` varchar(255) NOT NULL,
  `groupesanguin` varchar(256) NOT NULL,
  `typecnx` varchar(256) NOT NULL,
  `dispo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id`, `nom`, `mail`, `userPassword`, `ville`, `numero1`, `numero2`, `typedon`, `groupesanguin`, `typecnx`, `dispo`) VALUES
(6, 'test', 'test@gmail.com', '$6$500iuytrdxcvbnmj$xMXOkViTB3HBQ6pDLIxCpCKGtDrqvHPziQJkTCgHMlBjX1oF4gmXk73EPakXdMQHyfU0tvHV5I4NPO/cnEsX90', 'Tizi-Ouzou', 500000000, 653234598, 'aphérèse', 'O-', 'Appel', '');

-- --------------------------------------------------------

--
-- Structure de la table `receveur`
--

CREATE TABLE `receveur` (
  `id` int(255) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `num` int(50) NOT NULL,
  `Ncard` int(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `quantite` varchar(10) NOT NULL,
  `groupage` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `receveur`
--

INSERT INTO `receveur` (`id`, `nom`, `num`, `Ncard`, `ville`, `quantite`, `groupage`) VALUES
(1, 'test', 500000000, 2147483647, 'Tizi-Ouzou', '2', 'O+'),
(2, 'test1', 653234598, 2147483647, 'Béjaïa', '1', 'O-'),
(3, 'test3', 500000000, 2147483647, 'Tizi-Ouzou', '3', 'O+');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nom` (`nom`);

--
-- Index pour la table `receveur`
--
ALTER TABLE `receveur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `receveur`
--
ALTER TABLE `receveur`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
