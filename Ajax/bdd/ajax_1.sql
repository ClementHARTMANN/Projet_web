-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 29 mars 2022 à 15:29
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ajax`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `mail_admin` varchar(100) NOT NULL,
  `mdp_admin` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id_admin`, `mail_admin`, `mdp_admin`) VALUES
(1, 'admin@admin.com', '58ad983135fe15c5a8e2e15fb5b501aedcf70dc2');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `ca_id` int(11) NOT NULL DEFAULT '0',
  `ca_libelle` varchar(40) NOT NULL DEFAULT '',
  PRIMARY KEY (`ca_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`ca_id`, `ca_libelle`) VALUES
(1, 'fauteuil'),
(2, 'canap'),
(3, 'chaise'),
(4, 'armoire');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `pr_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `num_commande` int(11) NOT NULL,
  `id_revendeur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pr_id` (`pr_id`,`id_revendeur`),
  KEY `id_revendeur` (`id_revendeur`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `date`, `pr_id`, `quantite`, `num_commande`, `id_revendeur`) VALUES
(19, '2021-09-26 00:00:00', 1, 45, 1, 3),
(20, '2021-09-26 00:00:00', 8, 5, 1, 3),
(21, '2022-03-29 00:00:00', 11, 0, 2, 2),
(22, '2022-03-29 00:00:00', 10, 12, 3, 2),
(23, '2022-03-29 00:00:00', 10, 12, 4, 2),
(24, '2022-03-29 00:00:00', 12, 1, 4, 2),
(25, '2022-03-29 00:00:00', 4, 1, 109192, 2);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `pr_id` int(4) NOT NULL,
  `path` varchar(200) COLLATE utf8_bin NOT NULL,
  KEY `pr_id` (`pr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`pr_id`, `path`) VALUES
(6, '1.1.jpg'),
(6, '1.2.jpg'),
(6, '1.3.jfif'),
(7, '2.1.jfif'),
(7, '2.2.jfif'),
(7, '2.3.jfif'),
(1, '11.jfif'),
(1, '12.jpg'),
(2, '21.jfif'),
(3, '31.jpg'),
(4, '41.jfif'),
(8, '51.jpg'),
(8, '52.jfif'),
(8, '53.jfif'),
(9, '61.jfif'),
(10, '71.jfif'),
(11, '81.jfif'),
(12, '91.jpg'),
(5, '101.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `pr_id` int(11) NOT NULL DEFAULT '0',
  `pr_libelle` varchar(40) NOT NULL DEFAULT '',
  `pr_prix` decimal(18,2) NOT NULL DEFAULT '0.00',
  `pr_categorie` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pr_id`),
  KEY `pr_categorie` (`pr_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`pr_id`, `pr_libelle`, `pr_prix`, `pr_categorie`) VALUES
(1, 'Fauteuil confortable', '50.00', 1),
(2, 'fauteuil de style', '100.00', 1),
(4, 'fauteuil de style picard', '80.00', 1),
(5, 'Canap? en cuir', '800.00', 2),
(6, 'Petit canap? sympa', '450.00', 2),
(7, 'Canap? 12 places', '2000.00', 2),
(8, 'Chaise longue', '40.00', 3),
(9, 'Chaise haute', '45.00', 3),
(10, 'Petite chaise rouge', '25.00', 3),
(11, 'Chaise bancale', '120.00', 3),
(12, 'Chaise musicale', '250.00', 3);

-- --------------------------------------------------------

--
-- Structure de la table `revendeur`
--

DROP TABLE IF EXISTS `revendeur`;
CREATE TABLE IF NOT EXISTS `revendeur` (
  `id_revendeur` int(11) NOT NULL AUTO_INCREMENT,
  `nomSociete` varchar(50) COLLATE utf8_bin NOT NULL,
  `adrMagasin` varchar(200) COLLATE utf8_bin NOT NULL,
  `nomResponsable` varchar(50) COLLATE utf8_bin NOT NULL,
  `mail` varchar(40) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(36) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_revendeur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `revendeur`
--

INSERT INTO `revendeur` (`id_revendeur`, `nomSociete`, `adrMagasin`, `nomResponsable`, `mail`, `mdp`) VALUES
(2, 'Boulangerie anti-gauffre', '23 rue Gaufrette', 'clement', 'clement', '236e92bcf7c04d8d7ff3f798b537823f'),
(3, 'Tom&co', 'TOMTOMMMM', 'tom', 'tom', 'ChEh34b7da764b21d298ef307d04d8152dc5'),
(4, 'Robocop', '3 ou 4 rue de ton énorme fiakito', 'julie', 'julie', 'ChEh16f12f5e8379e22be995e505ebfc1b84');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_revendeur`) REFERENCES `revendeur` (`id_revendeur`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`pr_id`) REFERENCES `produit` (`pr_id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`pr_categorie`) REFERENCES `categorie` (`ca_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
