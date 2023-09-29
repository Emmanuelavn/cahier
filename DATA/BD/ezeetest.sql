-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 29 sep. 2023 à 16:05
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
-- Base de données : `ezeetest`
--

-- --------------------------------------------------------

--
-- Structure de la table `LICENCE_1`
--

CREATE TABLE `LICENCE_1` (
  `nom_ue` varchar(255) NOT NULL,
  `nom_ec` varchar(255) NOT NULL,
  `nom_fichier` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'on met ici le nom des cours et des document en fonction des UE et EC',
  `categorie_fichier` varchar(255) NOT NULL COMMENT 'ici on met le type de fichier cour/exercice/epreuve/corriger/etc...',
  `description_fichier` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `année_fichier` date NOT NULL,
  `chemin_fichier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `LICENCE_2`
--

CREATE TABLE `LICENCE_2` (
  `filliere` varchar(255) NOT NULL,
  `nom_ue` varchar(255) NOT NULL,
  `nom_ec` varchar(255) NOT NULL,
  `nom_fichier` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `categorie_fichier` varchar(255) NOT NULL,
  `description_fichier` text NOT NULL,
  `année_fichier` date NOT NULL,
  `chemin_fichier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='tous les documents et cours de la L2';

-- --------------------------------------------------------

--
-- Structure de la table `LICENCE_3`
--

CREATE TABLE `LICENCE_3` (
  `filliere` varchar(255) NOT NULL,
  `nom_ue` varchar(255) NOT NULL,
  `nom_ec` varchar(255) NOT NULL,
  `nom_fichier` varchar(255) NOT NULL,
  `categorie_fichier` text NOT NULL,
  `description_fichier` text NOT NULL,
  `année_fichier` date NOT NULL,
  `chemin_fichier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `USERS`
--

CREATE TABLE `USERS` (
  `id_user` int(11) NOT NULL,
  `nom_user` varchar(255) NOT NULL,
  `matricule` int(11) NOT NULL,
  `filliere` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='information utilisateurs';

--
-- Déchargement des données de la table `USERS`
--

INSERT INTO `USERS` (`id_user`, `nom_user`, `matricule`, `filliere`, `email`, `passwd`, `date_inscription`) VALUES
(24, 'sondre405', 500629, 'SEiot', 'sondre405@yemenfo.com', '', '0000-00-00'),
(25, 'sondre405', 500629, 'SEiot', 'sondre405@yemenfo.com', '', '0000-00-00'),
(26, 'Bryan LEKE', 11699023, 'SI', 'sondre405@yemenfo.com', '', '0000-00-00'),
(27, 'AVANNA Benito', 111111, 'SI', 'sondre405@yemenfo.com', '', '0000-00-00'),
(28, 'AVANNA Benito', 111111, 'SI', 'sondre405@yemenfo.com', '', '0000-00-00'),
(29, 'AVANNA Benito', 111111, 'SI', 'sondre405@yemenfo.com', '', '0000-00-00'),
(30, 'AVANNA Benito', 111111, 'SI', 'sondre405@yemenfo.com', '', '2023-09-29'),
(31, 'Bryan LEKE', 11699023, 'SI', 'sondre405@yemenfo.com', '', '2023-09-29'),
(32, 'Bryan LEKE', 11699023, 'SI', 'sondre405@yemenfo.com', '', '2023-09-29'),
(33, 'Bryan LEKE', 11699023, 'SI', 'sondre405@yemenfo.com', '', '2023-09-29'),
(34, 'Bryan LEKE', 11699023, 'SI', 'sondre405@yemenfo.com', '', '2023-09-29'),
(35, 'Bryan LEKE', 11699023, 'SI', 'sondre405@yemenfo.com', '', '2023-09-29'),
(36, 'Bryan LEKE', 11699023, 'SI', 'sondre405@yemenfo.com', '', '2023-09-29'),
(37, 'Bryan LEKE', 11699023, 'SI', 'sondre405@yemenfo.com', '', '2023-09-29'),
(38, 'Bryan LEKE', 111111, 'IA', 'sondre405@yemenfo.com', '', '2023-09-29'),
(39, 'Bryan LEKE', 111111, 'IA', 'sondre405@yemenfo.com', '', '2023-09-29'),
(40, 'azerty', 0, 'IA', 'sondre405@yemenfo.com', '', '2023-09-29'),
(41, 'Bryan LEKE', 11699023, 'SI', 'bryanleke04@gmail.com', '', '2023-09-29'),
(42, 'Bryan LEKE', 11699023, 'SI', 'bryanleke04@gmail.com', '', '2023-09-29'),
(43, 'Bryan LEKE', 11699023, 'SI', 'bryanleke04@gmail.com', '', '2023-09-29'),
(44, 'Bryan LEKE', 11699023, 'SI', 'bryanleke04@gmail.com', '', '2023-09-29'),
(45, 'Bryan LEKE', 11699023, 'SI', 'bryanleke04@gmail.com', '', '2023-09-29'),
(46, 'Bryan LEKE', 11699023, 'SI', 'bryanleke04@gmail.com', '', '2023-09-29'),
(47, 'Bryan LEKE', 11699023, 'SI', 'sondre405@yemenfo.com', '', '2023-09-29'),
(48, 'Bryan LEKE', 11699023, 'SI', 'markee45@lvintager.com', '', '2023-09-29'),
(49, 'Bryan LEKE', 11699023, 'SI', 'markee45@lvintager.com', '', '2023-09-29'),
(50, 'Bryan LEKE', 11699023, 'SI', 'markee45@lvintager.com', '', '2023-09-29'),
(51, 'Bryan LEKE', 11699023, 'IA', 'markee45@lvintager.com', '', '2023-09-29'),
(52, 'Bryan LEKE', 11699023, 'IA', 'markee45@lvintager.com', '', '2023-09-29'),
(53, 'Bryan LEKE', 11699023, 'IA', 'markee45@lvintager.com', '', '2023-09-29'),
(54, 'Bryan LEKE', 11699023, 'IA', 'markee45@lvintager.com', '', '2023-09-29'),
(55, 'Bryan LEKE', 11699023, 'IA', 'markee45@lvintager.com', '', '2023-09-29'),
(56, 'Bryan LEKE', 11699023, 'IA', 'markee45@lvintager.com', '', '2023-09-29'),
(57, 'Bryan LEKE', 11699023, 'IA', 'markee45@lvintager.com', '', '2023-09-29'),
(58, 'Bryan LEKE', 11699023, 'SI', 'markee45@lvintager.com', '', '2023-09-29'),
(59, 'Bryan LEKE', 111111, 'SI', 'markee45@lvintager.com', '', '2023-09-29'),
(60, 'Bryan LEKE', 11699023, 'IA', 'markee45@lvintager.com', '', '2023-09-29');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `USERS`
--
ALTER TABLE `USERS`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
