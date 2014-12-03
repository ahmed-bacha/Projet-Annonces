-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mer 03 Décembre 2014 à 09:35
-- Version du serveur :  5.5.38
-- Version de PHP :  5.5.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `annonce`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `annonceM`
--

INSERT INTO `annonceM` (`id`, `idUtilisateur`, `statut`, `nom`, `prenom`, `telephone`, `titre`, `prix`, `description`, `images`) VALUES
(1, 29, 10, 'BOUHERROU', 'NACER', '0652685419', 'titre 1', 123, 'description', NULL);

INSERT INTO `annonceM` (`id`, `idUtilisateur`, `statut`, `nom`, `prenom`, `telephone`, `titre`, `prix`, `description`, `images`) VALUES
(2, 29, 10, 'BOUHERROU', 'NACER', '0652685419', 'titre 2', 123, 'description', NULL);

INSERT INTO `annonceM` (`id`, `idUtilisateur`, `statut`, `nom`, `prenom`, `telephone`, `titre`, `prix`, `description`, `images`) VALUES
(3, 29, 10, 'BOUHERROU', 'NACER', '0652685419', 'titre 3', 123, 'description', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `annonceM`
--
ALTER TABLE `annonceM`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `annonceM`
--
ALTER TABLE `annonceM`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
