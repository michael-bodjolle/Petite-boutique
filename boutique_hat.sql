-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 18 mars 2021 à 19:22
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `boutique_hat`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `affichage_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `affichage_order`) VALUES
(1, 'Casquette', 13),
(2, 'Chapeau', 12);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produit` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `detail` text NOT NULL,
  `categorie_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_name` (`nom_produit`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom_produit`, `images`, `prix`, `detail`, `categorie_id`) VALUES
(25, 'Casquette jordan', 'casquette-jordan-jumpman-heritage86-hkNHkf.png', 23, 'casquette sport ', 1),
(22, 'Casquette nike rouge', 'nike-casquette-legacy91-bv1076e1-rouge657-homme.png', 20, 'Pour vos activiés sportives ', 1),
(23, 'Casquette de baseball', 'casquette-de-baseball-2019-coton-pour-hommes-et-femmes-casquette-ajustable-style-graffiti-avec-impre.png', 26, 'Stylisé à votre personalité', 1),
(26, 'hipster', 'casquette-de-baseball-2019-coton-pour-hommes-et-femmes-casquette-ajustable-style-graffiti-avec-impre.png', 113, 'lkkl', 1),
(27, 'dcz', 'taylormade-chapeau-storm-noir.jpg', 12, 'rfferv', 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `statut` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `prenom`, `nom`, `password`, `statut`) VALUES
(4, 'ohhhh', 'qqq', 'Michae', '$2y$15$F.bxzGJ18qoDEzHEcH0K2utrJLrjVIgkwdqSe65JlQHWpzRrbp89e', 0),
(3, 'sss', 'bo', 'bod', '$2y$15$A/pnuIS8ITxdICMaf8VbgOTlJ6FBM3dnFKRdcwuMs6yuL6JVSgIaC', 0),
(9, 'test3', 'bod', 'bo', '$2y$15$cBFXsBDPWii5g3qJ0P/PV.mFWLNF61LmqaXHK0/alwkSGgeHVgarC', 0),
(7, 'adms', 'aaaaa', 'Bodjolle', '$2y$15$zl9Hfig7rEBf.8h.YW5bE.7nIhcKrdpiZvgrfOFWyQx6wcN48LyRK', 1),
(8, 'dodo', 'ssss', 'oooo', '$2y$15$VZgwVZA80dtDnGgvavjvBuC/vyRGje2x9iyTTCIhtf1cRqc5ph/Di', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
