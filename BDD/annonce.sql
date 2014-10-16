-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 16, 2014 at 11:43 AM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `annonce`
--

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurM`
--

CREATE TABLE `utilisateurM` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mdp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `utilisateurM`
--

INSERT INTO `utilisateurM` (`id`, `nom`, `mdp`, `email`) VALUES
(16, 'FrameWork', 'CakePHP', 'utilisateur_TSE_2@univ-st-etienne.fr'),
(17, 'utilisateur_TSE_2', 'utiLISATEUR', 'utilisateur_TSE_2@univ-st-etienne.fr'),
(18, 'utilisateur_TSE_2', 'utiLISATEUR', 'utilisateur_TSE_2@univ-st-etienne.fr'),
(19, 'utilisateur_TSE_2', 'utiLISATEUR', 'utilisateur_TSE_2@univ-st-etienne.fr'),
(20, 'utilisateur_TSE_2', 'utiLISATEUR', 'utilisateur_TSE_2@univ-st-etienne.fr'),
(21, 'utilisateur_TSE_2', 'utiLISATEUR', 'utilisateur_TSE_2@univ-st-etienne.fr'),
(22, 'utilisateur_TSE_2', 'utiLISATEUR', 'utilisateur_TSE_2@univ-st-etienne.fr'),
(23, 'utilisateur_TSE_2', 'utiLISATEUR', 'utilisateur_TSE_2@univ-st-etienne.fr'),
(24, 'utilisateur_TSE_2', 'utiLISATEUR', 'utilisateur_TSE_2@univ-st-etienne.fr'),
(25, 'utilisateur_TSE_2', 'utiLISATEUR', 'utilisateur_TSE_2@univ-st-etienne.fr'),
(26, 'utilisateur_TSE_2', 'utiLISATEUR', 'utilisateur_TSE_2@univ-st-etienne.fr');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
