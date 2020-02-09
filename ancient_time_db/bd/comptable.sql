-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 09 fév. 2020 à 20:10
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
-- Structure de la table `comptable`
--

DROP TABLE IF EXISTS `comptable`;
CREATE TABLE IF NOT EXISTS `comptable` (
  `ID_Comptable` int(2) NOT NULL AUTO_INCREMENT,
  `Nom_Comptable` varchar(15) NOT NULL,
  `Prenom_Comptable` varchar(15) NOT NULL,
  `Date_Nais_Com` date NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Mot_Passe` varchar(10) NOT NULL,
  `Date_Debut` date NOT NULL,
  `Salair` float NOT NULL,
  PRIMARY KEY (`ID_Comptable`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comptable`
--

INSERT INTO `comptable` (`ID_Comptable`, `Nom_Comptable`, `Prenom_Comptable`, `Date_Nais_Com`, `Email`, `Mot_Passe`, `Date_Debut`, `Salair`) VALUES
(1, 'hababou', 'mounir', '1996-01-22', 'no_email', '000', '2020-02-08', 20000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
