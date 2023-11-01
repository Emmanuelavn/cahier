-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 01 nov. 2023 à 17:03
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
-- Structure de la table `COMMENTS`
--

CREATE TABLE `COMMENTS` (
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `COMMENTS`
--

INSERT INTO `COMMENTS` (`id_comment`, `id_user`, `post_id`, `comment_text`, `comment_datetime`) VALUES
(5, 111, 204, 'ok', '2023-10-21 10:56:22'),
(6, 111, 204, 'ok', '2023-10-21 10:56:27'),
(7, 112, 205, 'oui il y a la pluis', '2023-10-21 10:58:16'),
(10, 112, 204, 'm', '2023-10-21 11:07:23'),
(11, 112, 204, '88', '2023-10-21 11:07:28'),
(12, 111, 212, 'aazazaz', '2023-10-21 17:33:02'),
(13, 111, 211, 'ok', '2023-10-22 09:12:43'),
(14, 111, 204, 'la flemme', '2023-10-22 09:12:59');

-- --------------------------------------------------------

--
-- Structure de la table `FRIENDSHIPS`
--

CREATE TABLE `FRIENDSHIPS` (
  `id_friendship` int(11) NOT NULL,
  `id_user1` int(11) NOT NULL,
  `id_user2` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `LICENCE_1`
--

CREATE TABLE `LICENCE_1` (
  `id_doc` int(11) NOT NULL,
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

INSERT INTO `LICENCE_1` (`id_doc`, `semestre`, `filliere`, `nom_ue`, `nom_ec`, `nom_fichier`, `categorie_fichier`, `description_fichier`, `année_fichier`, `chemin_fichier`) VALUES
(2, 'semestre 1', 'SI', 'math', 'proba', 'anly.00', 'sss', 'cours essaie', '2010-03-10', 'https://drive.google.com/file/d/1dag3QfbDASrzCgpGdAEH2JD17ek6qRBk/view?usp=drive_link'),
(3, 'semestre 1', 'SI', 'math', 'proba', 'anly.00', 'cour', 'cours essaie', '2030-10-10', 'https://drive.google.com/file/d/1dag3QfbDASrzCgpGdAEH2JD17ek6qRBk/view?usp=drive_link'),
(4, 'semestre 1', 'SI', 'math', 'analyse', 'anly.00', 'sss', 'qssssssssssssss', '2005-02-10', 'https://drive.google.com/file/d/1dag3QfbDASrzCgpGdAEH2JD17ek6qRBk/view?usp=drive_link'),
(5, 'semestre 2', 'si', 'math', 'proba', 'ffffffffffffffff', 'ffffffffffffffff', 'ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', '2020-02-10', 'https://drive.google.com/file/d/1TIyR9FSBOijjEmpEbWVvKNln7MYdLHmm/view?usp=drive_link'),
(6, 'semestre 2', 'SI', 'math', 'proba', 'anly.00', 'cour', 'ggggggggg', '2025-12-20', 'https://drive.google.com/file/d/1TIyR9FSBOijjEmpEbWVvKNln7MYdLHmm/view?usp=drive_link'),
(7, 'semestre 1', 'tron commun', 'ALGEBRE MATRICIELLE', 'CALCULE MATRICIELLE', 'Initiation au  calcul matriciel', 'cour', 'cour de calcule matrice pdf ', '2022-01-01', 'https://drive.google.com/file/d/1UxsdGsEpTy_sbHtKp9wCQ-e2MO5iTgRx/view?usp=drive_link'),
(8, 'semestre 1', 'tron commun', '...', '...', '....', 'epreuve', 'recceuile', '2022-01-01', 'ASSETS/document/Epreuves SI 2020-2021.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `LICENCE_2`
--

CREATE TABLE `LICENCE_2` (
  `id_doc` int(11) NOT NULL,
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
  `id_doc` int(11) NOT NULL,
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

INSERT INTO `LICENCE_3` (`id_doc`, `semestre`, `filliere`, `nom_ue`, `nom_ec`, `nom_fichier`, `categorie_fichier`, `description_fichier`, `année_fichier`, `chemin_fichier`) VALUES
(1, '', 'SI', 'math', 'analyse', 'anly.00', 'cour', 'cours essaie', '2022-10-01', '/opt/lampp/temp/php0ENqTk'),
(2, '', 'SI', 'math', 'proba', 'anly.00', 'epreuve', 'qssssssssssssss', '2001-02-10', '/opt/lampp/temp/phpnPIWka'),
(3, 'www', 'www', 'ww', 'wwww', 'www', 'document', 'wwwwww', '2023-10-11', 'https://drive.google.com/file/d/1h86NdogdJWmMJQTUhL21_7gORf6J7YpWJcX9dBWmcQE/view'),
(4, 'semestre 1', 'SI', 'math', 'proba', 'll', 'cours', 'cours essaie2', '2005-03-12', '/opt/lampp/temp/phpGy55H6'),
(5, 'n', 'n', 'n', 'n', 'n', 'n', 'n', '2023-10-04', 'https://drive.google.com/file/d/1dag3QfbDASrzCgpGdAEH2JD17ek6qRBk/view?usp=drive_link'),
(6, 'semestre 1', 'SI', 'math', 'proba', 'anly.00', 'sss', 'cours essaie', '2000-10-10', '/opt/lampp/htdocs/doc_insersion/stat_ifri_uac_22-23_100635.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `LIKES`
--

CREATE TABLE `LIKES` (
  `id_like` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `like_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `NOTIFICATIONS`
--

CREATE TABLE `NOTIFICATIONS` (
  `id_notification` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `notification_type` varchar(50) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `notification_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `POSTS`
--

CREATE TABLE `POSTS` (
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `post_text` text NOT NULL,
  `post_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `POSTS`
--

INSERT INTO `POSTS` (`id_post`, `id_user`, `post_text`, `post_datetime`) VALUES
(204, 112, 'cc', '2023-10-21 10:55:56'),
(205, 112, 'la pluis', '2023-10-21 10:58:02'),
(206, 112, 'la peche au ton dans la ville de seoule\r\n', '2023-10-21 11:17:55'),
(207, 112, 'la plage aujourd\'huit', '2023-10-21 11:19:08'),
(208, 112, 'cc', '2023-10-21 11:34:51'),
(209, 112, 'le belle journner', '2023-10-21 11:36:10'),
(210, 112, 'Bryan es a la maison', '2023-10-21 11:38:41'),
(211, 111, 'cccc', '2023-10-21 17:32:42'),
(212, 111, 'Dalem est la', '2023-10-21 17:32:55'),
(215, 112, 'cc', '2023-10-29 18:43:23');

-- --------------------------------------------------------

--
-- Structure de la table `USERS`
--

CREATE TABLE `USERS` (
  `id_user` int(11) NOT NULL,
  `nom_user` varchar(255) NOT NULL,
  `prenom_user` varchar(255) NOT NULL,
  `matricule` int(11) NOT NULL,
  `filliere` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='information utilisateurs';

--
-- Déchargement des données de la table `USERS`
--

INSERT INTO `USERS` (`id_user`, `nom_user`, `prenom_user`, `matricule`, `filliere`, `email`, `passwd`, `date_inscription`) VALUES
(111, 'Lk', 'Bryan', 11699023, 'IA', 'bryanleke04@gmail.com', 'Bryanlk0', '2023-10-04'),
(112, 'Benito', 'Avanna', 11091423, 'IA', 'avannabenito2@gmail.com', 'Benito@2005', '2023-10-04'),
(113, 'MANE', 'JuLe', 99801360, 'Im', 'vernette@yanimateds.com', 'Vernette04', '2023-10-04');

-- --------------------------------------------------------

--
-- Structure de la table `USERS_infosup`
--

CREATE TABLE `USERS_infosup` (
  `id_userinfos` int(11) NOT NULL,
  `about` text NOT NULL,
  `img_profile` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `USERS_infosup`
--

INSERT INTO `USERS_infosup` (`id_userinfos`, `about`, `img_profile`, `id_user`) VALUES
(9, 'OK', 'ASSETS/IMG/profil/blanc/L.png', 111),
(10, 'llk', 'ASSETS/IMG/profil/blanc/L.png', 111),
(11, 'llk', 'ASSETS/IMG/profil/blanc/L.png', 111);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `COMMENTS`
--
ALTER TABLE `COMMENTS`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `user_id` (`id_user`),
  ADD KEY `post_id` (`post_id`);

--
-- Index pour la table `FRIENDSHIPS`
--
ALTER TABLE `FRIENDSHIPS`
  ADD PRIMARY KEY (`id_friendship`),
  ADD KEY `user_id1` (`id_user1`),
  ADD KEY `user_id2` (`id_user2`);

--
-- Index pour la table `LICENCE_1`
--
ALTER TABLE `LICENCE_1`
  ADD PRIMARY KEY (`id_doc`);

--
-- Index pour la table `LICENCE_2`
--
ALTER TABLE `LICENCE_2`
  ADD PRIMARY KEY (`id_doc`);

--
-- Index pour la table `LICENCE_3`
--
ALTER TABLE `LICENCE_3`
  ADD PRIMARY KEY (`id_doc`);

--
-- Index pour la table `LIKES`
--
ALTER TABLE `LIKES`
  ADD PRIMARY KEY (`id_like`),
  ADD KEY `user_id` (`id_user`),
  ADD KEY `post_id` (`post_id`);

--
-- Index pour la table `NOTIFICATIONS`
--
ALTER TABLE `NOTIFICATIONS`
  ADD PRIMARY KEY (`id_notification`),
  ADD KEY `user_id` (`id_user`),
  ADD KEY `post_id` (`post_id`);

--
-- Index pour la table `POSTS`
--
ALTER TABLE `POSTS`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `user_id` (`id_user`);

--
-- Index pour la table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `USERS_infosup`
--
ALTER TABLE `USERS_infosup`
  ADD PRIMARY KEY (`id_userinfos`),
  ADD KEY `id_users` (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `COMMENTS`
--
ALTER TABLE `COMMENTS`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `FRIENDSHIPS`
--
ALTER TABLE `FRIENDSHIPS`
  MODIFY `id_friendship` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `LICENCE_1`
--
ALTER TABLE `LICENCE_1`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `LICENCE_2`
--
ALTER TABLE `LICENCE_2`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `LICENCE_3`
--
ALTER TABLE `LICENCE_3`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `LIKES`
--
ALTER TABLE `LIKES`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `NOTIFICATIONS`
--
ALTER TABLE `NOTIFICATIONS`
  MODIFY `id_notification` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `POSTS`
--
ALTER TABLE `POSTS`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT pour la table `USERS`
--
ALTER TABLE `USERS`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT pour la table `USERS_infosup`
--
ALTER TABLE `USERS_infosup`
  MODIFY `id_userinfos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `COMMENTS`
--
ALTER TABLE `COMMENTS`
  ADD CONSTRAINT `COMMENTS_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `USERS` (`id_user`),
  ADD CONSTRAINT `COMMENTS_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `POSTS` (`id_post`);

--
-- Contraintes pour la table `FRIENDSHIPS`
--
ALTER TABLE `FRIENDSHIPS`
  ADD CONSTRAINT `FRIENDSHIPS_ibfk_1` FOREIGN KEY (`id_user1`) REFERENCES `USERS` (`id_user`),
  ADD CONSTRAINT `FRIENDSHIPS_ibfk_2` FOREIGN KEY (`id_user2`) REFERENCES `USERS` (`id_user`);

--
-- Contraintes pour la table `LIKES`
--
ALTER TABLE `LIKES`
  ADD CONSTRAINT `LIKES_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `USERS` (`id_user`),
  ADD CONSTRAINT `LIKES_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `POSTS` (`id_post`);

--
-- Contraintes pour la table `NOTIFICATIONS`
--
ALTER TABLE `NOTIFICATIONS`
  ADD CONSTRAINT `NOTIFICATIONS_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `USERS` (`id_user`),
  ADD CONSTRAINT `NOTIFICATIONS_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `POSTS` (`id_post`);

--
-- Contraintes pour la table `POSTS`
--
ALTER TABLE `POSTS`
  ADD CONSTRAINT `POSTS_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `USERS` (`id_user`);

--
-- Contraintes pour la table `USERS_infosup`
--
ALTER TABLE `USERS_infosup`
  ADD CONSTRAINT `USERS_infosup_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `USERS` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
