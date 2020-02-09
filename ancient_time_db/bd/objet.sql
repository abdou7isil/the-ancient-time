-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 09 fév. 2020 à 20:12
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
-- Base de données :  `ancient_time_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `objet`
--

DROP TABLE IF EXISTS `objet`;
CREATE TABLE IF NOT EXISTS `objet` (
  `ID_Obj` int(4) NOT NULL AUTO_INCREMENT,
  `Nom_Obj` varchar(15) NOT NULL,
  `prix_objet` double NOT NULL DEFAULT 0,
  `Etat_Obj` varchar(7) NOT NULL,
  `for_ce` int(11) NOT NULL,
  `objetPa` int(11) DEFAULT NULL,
  `objetPm` int(11) DEFAULT NULL,
  `objetPv` int(11) DEFAULT NULL,
  `objetResistance` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_Obj`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `objet`
--

INSERT INTO `objet` (`ID_Obj`, `Nom_Obj`, `prix_objet`, `Etat_Obj`, `for_ce`, `objetPa`, `objetPm`, `objetPv`, `objetResistance`) VALUES
(1, 'épée', 10, 'neuf', 70, 0, 0, 80, 15),
(2, 'arc', 8, 'neuf', 18, 2, 2, 20, 3),
(3, 'dague', 6, 'neuf', 20, 1, 2, 40, 5),
(4, 'baton', 7, 'neuf', 40, 1, 0, 60, 7),
(5, 'massue', 9, 'neuf', 80, 1, 1, 30, 5),
(6, 'bouclier_acier', 6, 'neuf', 5, 0, 0, 80, 15),
(7, 'bc_argente', 8, 'neuf', 10, 0, 0, 100, 30),
(8, 'bc_diamand', 10, 'neuf', 20, 0, 0, 120, 30);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
