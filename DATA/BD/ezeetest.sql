-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 01 oct. 2023 à 16:51
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
  `semestre` varchar(255) NOT NULL,
  `filliere` varchar(255) NOT NULL,
  `nom_ue` varchar(255) NOT NULL,
  `nom_ec` varchar(255) NOT NULL,
  `nom_fichier` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'on met ici le nom des cours et des document en fonction des UE et EC',
  `categorie_fichier` varchar(255) NOT NULL COMMENT 'ici on met le type de fichier cour/exercice/epreuve/corriger/etc...',
  `description_fichier` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `année_fichier` date NOT NULL,
  `chemin_fichier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `LICENCE_1`
--

INSERT INTO `LICENCE_1` (`semestre`, `filliere`, `nom_ue`, `nom_ec`, `nom_fichier`, `categorie_fichier`, `description_fichier`, `année_fichier`, `chemin_fichier`) VALUES
('', '', 'math', 'analyse', 'analyse_originale', 'cours', 'cours de l\'année', '2023-10-01', 'DATA/stat_ifri_uac_22-23_100635.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `LICENCE_2`
--

CREATE TABLE `LICENCE_2` (
  `semestre` varchar(255) NOT NULL,
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
  `semestre` varchar(255) NOT NULL,
  `filliere` varchar(255) NOT NULL,
  `nom_ue` varchar(255) NOT NULL,
  `nom_ec` varchar(255) NOT NULL,
  `nom_fichier` varchar(255) NOT NULL,
  `categorie_fichier` text NOT NULL,
  `description_fichier` text NOT NULL,
  `année_fichier` date NOT NULL,
  `chemin_fichier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `LICENCE_3`
--

INSERT INTO `LICENCE_3` (`semestre`, `filliere`, `nom_ue`, `nom_ec`, `nom_fichier`, `categorie_fichier`, `description_fichier`, `année_fichier`, `chemin_fichier`) VALUES
('', 'SI', 'math', 'analyse', 'anly.00', 'cours', 'cours essaie', '2022-10-01', '/opt/lampp/temp/php0ENqTk'),
('', 'SI', 'math', 'proba', 'anly.00', 'sss', 'qssssssssssssss', '2001-02-10', '/opt/lampp/temp/phpnPIWka'),
('www', 'www', 'ww', 'wwww', 'www', 'wwwww', 'wwwwww', '2023-10-11', 'https://drive.google.com/file/d/1h86NdogdJWmMJQTUhL21_7gORf6J7YpWJcX9dBWmcQE/view'),
('semestre 1', 'SI', 'math', 'proba', 'll', 'lll', 'cours essaie2', '2005-03-12', '/opt/lampp/temp/phpGy55H6'),
('n', 'n', 'n', 'n', 'n', 'n', 'n', '2023-10-04', 'https://drive.google.com/file/d/1dag3QfbDASrzCgpGdAEH2JD17ek6qRBk/view?usp=drive_link');

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
(73, 'Bryan_lk', 11699023, 'ia', 'bryanleke04@gmail.com', 'lk', '2023-09-29'),
(74, 'Essaie 1', 11258965, 'gl', 'katherinne.5@oresolvedm.com', 'essai', '2023-09-30');

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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;













Voici un script SQL pour créer les tables mentionnées précédemment dans votre base de données :

```sql
-- Création de la table pour les utilisateurs (USERS)
CREATE TABLE `USERS` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,  -- Stocker le mot de passe hashé
  -- Ajoutez d'autres informations de profil ici (nom, photo, etc.)
  PRIMARY KEY (`id_user`)
);

-- Création de la table pour les publications (POSTS)
CREATE TABLE `POSTS` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,  -- Référence à l'utilisateur qui a posté la publication
  `post_text` text NOT NULL,
  `post_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_post`),
  FOREIGN KEY (`user_id`) REFERENCES `USERS`(`id_user`)
);

-- Création de la table pour les commentaires (COMMENTS)
CREATE TABLE `COMMENTS` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,  -- Référence à l'utilisateur qui a commenté
  `post_id` int(11) NOT NULL,  -- Référence à la publication commentée
  `comment_text` text NOT NULL,
  `comment_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_comment`),
  FOREIGN KEY (`user_id`) REFERENCES `USERS`(`id_user`),
  FOREIGN KEY (`post_id`) REFERENCES `POSTS`(`id_post`)
);

-- Création de la table pour les likes (LIKES)
CREATE TABLE `LIKES` (
  `id_like` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,  -- Référence à l'utilisateur qui a "liké"
  `post_id` int(11) NOT NULL,  -- Référence à la publication "likée"
  `like_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_like`),
  FOREIGN KEY (`user_id`) REFERENCES `USERS`(`id_user`),
  FOREIGN KEY (`post_id`) REFERENCES `POSTS`(`id_post`)
);

-- Création de la table pour les relations d'amitié (FRIENDSHIPS)
CREATE TABLE `FRIENDSHIPS` (
  `id_friendship` int(11) NOT NULL AUTO_INCREMENT,
  `user_id1` int(11) NOT NULL,  -- Référence à l'utilisateur qui envoie la demande
  `user_id2` int(11) NOT NULL,  -- Référence à l'utilisateur qui accepte la demande
  `status` varchar(50) NOT NULL,  -- Statut de l'amitié (acceptée, en attente, rejetée, etc.)
  PRIMARY KEY (`id_friendship`),
  FOREIGN KEY (`user_id1`) REFERENCES `USERS`(`id_user`),
  FOREIGN KEY (`user_id2`) REFERENCES `USERS`(`id_user`)
);

-- Création de la table pour les notifications (NOTIFICATIONS)
CREATE TABLE `NOTIFICATIONS` (
  `id_notification` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,  -- Référence à l'utilisateur destinataire
  `notification_type` varchar(50) NOT NULL,  -- Type de notification (like, commentaire, etc.)
  `post_id` int(11),  -- Référence à la publication associée (peut être NULL pour certains types de notifications)
  `status` varchar(50) NOT NULL,  -- Statut de notification (non lu, lu)
  `notification_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_notification`),
  FOREIGN KEY (`user_id`) REFERENCES `USERS`(`id_user`),
  FOREIGN KEY (`post_id`) REFERENCES `POSTS`(`id_post`)
);

-- Créez d'autres tables si vous avez besoin de stocker des médias, des statistiques, etc.
```

N'oubliez pas d'ajuster ces tables selon vos besoins spécifiques et de mettre en œuvre des mécanismes de sécurité, tels que la validation et la protection contre les attaques SQL, pour assurer la fiabilité et la sécurité de votre application.