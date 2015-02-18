-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 06 Janvier 2015 à 01:08
-- Version du serveur :  5.5.38
-- Version de PHP :  5.5.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `annonce`
--

-- --------------------------------------------------------

--
-- Structure de la table `adminM`
--

CREATE TABLE `adminM` (
  `id` int(10) NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mdp` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `adminM`
--

INSERT INTO `adminM` (`id`, `login`, `mdp`) VALUES
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `annonceM`
--

CREATE TABLE `annonceM` (
  `id` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `statut` tinyint(1) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `description` text NOT NULL,
  `images` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `annonceM`
--

INSERT INTO `annonceM` (`id`, `idUtilisateur`, `statut`, `nom`, `prenom`, `telephone`, `titre`, `prix`, `description`, `images`) VALUES
(53, 29, 10, 'BOUHERROU', 'NACER', '0652685419', 'MacBook Pro000000', 1, '000000', 'image29-1003506.jpg'),
(54, 29, 10, 'BOUHERROU', 'NACER', '0652685419', 'Site web perso', 2147483647, 'azerty', 'image29-4141287.jpg;image29-2632767.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurM`
--

CREATE TABLE `utilisateurM` (
  `id` int(10) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mdp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `utilisateurM`
--

INSERT INTO `utilisateurM` (`id`, `nom`, `mdp`, `email`) VALUES
(16, 'FrameWork', 'CakePHP', 'utilisateur_TSE_2@univ-st-etienne.fr'),
(17, 'FrameWork', 'CakePHP', 'utilisateur_TSE_2@univ-st-etienne.fr'),
(18, 'FrameWork', 'CakePHP', 'utilisateur_TSE_2@univ-st-etienne.fr'),
(19, 'FrameWork', 'CakePHP', 'utilisateur_TSE_2@univ-st-etienne.fr'),
(20, 'FrameWork', 'CakePHP', 'utilisateur_TSE_2@univ-st-etienne.fr'),
(21, 'utilisateur_TSE_2', 'utiLISATEUR', 'utilisateur_TSE_2@univ-st-etienne.fr'),
(22, 'utilisateur_TSE_2', 'utiLISATEUR', 'utilisateur_TSE_2@univ-st-etienne.fr'),
(23, 'utilisateur_TSE_2', 'utiLISATEUR', 'utilisateur_TSE_2@univ-st-etienne.fr'),
(24, 'utilisateur_TSE_2', 'utiLISATEUR', 'utilisateur_TSE_2@univ-st-etienne.fr'),
(25, 'utilisateur_TSE_2', 'utiLISATEUR', 'utilisateur_TSE_2@univ-st-etienne.fr'),
(26, 'utilisateur_TSE_2', 'utiLISATEUR', 'utilisateur_TSE_2@univ-st-etienne.fr'),
(27, 'utilisateur_TSE_2', 'utiLISATEUR', 'utilisateur_TSE_2@univ-st-etienne.fr'),
(28, 'utilisateur_TSE_2', 'utiLISATEUR', 'utilisateur_TSE_2@univ-st-etienne.fr'),
(29, 'aze', 'azerty', 'bouherrou-nass@hotmail.fr'),
(30, 'qjdnqkjs', 'qsdfgh', 'jqdbnk@qnjdqkj.d'),
(31, 'zadz', 'poiuyt', 'sbouherrou@yahoo.fr'),
(32, 'utilisateur_TSE_2', 'utiLISATEUR', 'utilisateur_TSE_2@univ-st-etienne.fr'),
(33, 'poi', 'nass25', 'samu@glu.fr'),
(34, 'd;s,fn', 'nass25', 'gfjdhgfjd@kfjd.df'),
(35, 'utilisateur_TSE_2', 'utiLISATEUR', 'utilisateur_TSE_2@univ-st-etienne.fr');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adminM`
--
ALTER TABLE `adminM`
ADD PRIMARY KEY (`id`);

--
-- Index pour la table `annonceM`
--
ALTER TABLE `annonceM`
ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurM`
--
ALTER TABLE `utilisateurM`
ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adminM`
--
ALTER TABLE `adminM`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `annonceM`
--
ALTER TABLE `annonceM`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT pour la table `utilisateurM`
--
ALTER TABLE `utilisateurM`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
