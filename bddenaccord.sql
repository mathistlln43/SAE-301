-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 20 déc. 2023 à 20:47
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bddenaccord`
--

-- --------------------------------------------------------

--
-- Structure de la table `animer`
--

CREATE TABLE `animer` (
  `id_artiste` int(11) DEFAULT NULL,
  `id_evenement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `animer`
--

INSERT INTO `animer` (`id_artiste`, `id_evenement`) VALUES
(4, 1),
(1, 2),
(2, 2),
(3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE `artiste` (
  `id_artiste` int(11) NOT NULL,
  `nom_artiste` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `biographie` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `artiste`
--

INSERT INTO `artiste` (`id_artiste`, `nom_artiste`, `genre`, `biographie`) VALUES
(1, 'ziak', 'rap', 'liberez tout mes copains'),
(2, 'patoche', 'pop', 'chante les sardines'),
(3, 'hugo', 'phonk', 'dumdumdumdum dum dumdum'),
(4, 'les amis de la musique ', 'classique', 'Concerto joué par l\'orchestre des amis de la musique ');

-- --------------------------------------------------------

--
-- Structure de la table `asister`
--

CREATE TABLE `asister` (
  `id_compte` int(11) DEFAULT NULL,
  `id_evenement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `asister`
--

INSERT INTO `asister` (`id_compte`, `id_evenement`) VALUES
(1, 2),
(2, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id_compte` int(11) NOT NULL,
  `nom_utilisateur` varchar(255) DEFAULT NULL,
  `prenom_utilisateur` varchar(255) DEFAULT NULL,
  `motdepasse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id_compte`, `nom_utilisateur`, `prenom_utilisateur`, `motdepasse`) VALUES
(1, 'christophe', 'camembert', '$2y$10$ATvK/OP4qVwJYuc4aruejOhXT4jrj1RuscQCQ22X6xKVOaLXeiSD2'),
(2, 'vincent', 'lagaffe', '$2y$10$LdxxyeCzczMPgxnzv0O2r.VOH0OQmkPj5DufOnnZQ1D8sWLfYCQa2'),
(3, 'admin', 'adminadmin', 'adminmdp');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id_evenement` int(11) NOT NULL,
  `nom_evenement` varchar(255) DEFAULT NULL,
  `date_evenement` date DEFAULT NULL,
  `lieu` varchar(255) DEFAULT NULL,
  `heure` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `nom_evenement`, `date_evenement`, `lieu`, `heure`) VALUES
(1, 'Concert', '2023-12-16', 'Palais des spectacles 1 Avenue Charles Massot\r\n43750 Vals-prés-le-Puy', '21:10:00'),
(2, 'Concours', '2023-12-15', 'Theatre Place du Breuil Le Puy-en-Velay', '20:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `artiste`
--
ALTER TABLE `artiste`
  ADD PRIMARY KEY (`id_artiste`);

--
-- Index pour la table `asister`
--
ALTER TABLE `asister`
  ADD KEY `id_compte` (`id_compte`),
  ADD KEY `id_evenement` (`id_evenement`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id_compte`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_evenement`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `artiste`
--
ALTER TABLE `artiste`
  MODIFY `id_artiste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `id_compte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id_evenement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `asister`
--
ALTER TABLE `asister`
  ADD CONSTRAINT `asister_ibfk_1` FOREIGN KEY (`id_compte`) REFERENCES `compte` (`id_compte`),
  ADD CONSTRAINT `asister_ibfk_2` FOREIGN KEY (`id_evenement`) REFERENCES `evenement` (`id_evenement`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
