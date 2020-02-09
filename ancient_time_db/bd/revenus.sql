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
-- Structure de la table `revenus`
--

DROP TABLE IF EXISTS `revenus`;
CREATE TABLE IF NOT EXISTS `revenus` (
  `ID_Rev` int(4) NOT NULL AUTO_INCREMENT,
  `Type_Rev` varchar(15) NOT NULL,
  `Mont_Rev` float NOT NULL,
  PRIMARY KEY (`ID_Rev`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `revenus`
--

INSERT INTO `revenus` (`ID_Rev`, `Type_Rev`, `Mont_Rev`) VALUES
(1, 'or_pack_100', 100),
(2, 'or_pack_200', 180),
(3, 'or_pack_300', 250);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
