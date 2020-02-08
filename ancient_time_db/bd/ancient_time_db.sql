-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 08 fév. 2020 à 11:47
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

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
-- Structure de la table `achat_objet`
--

DROP TABLE IF EXISTS `achat_objet`;
CREATE TABLE IF NOT EXISTS `achat_objet` (
  `ID_Ach_Obj` int(11) NOT NULL AUTO_INCREMENT,
  `Mont_Or` float NOT NULL,
  `Date_Achat` date NOT NULL,
  `ID_J` int(4) NOT NULL,
  `ID_Obj` int(4) NOT NULL,
  PRIMARY KEY (`ID_Ach_Obj`),
  KEY `ID_J` (`ID_J`),
  KEY `ID_Obj` (`ID_Obj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `acheter_or`
--

DROP TABLE IF EXISTS `acheter_or`;
CREATE TABLE IF NOT EXISTS `acheter_or` (
  `ID_Ach_Or` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Montant` float NOT NULL,
  `Quantite` int(5) NOT NULL,
  `ID_J` int(4) NOT NULL,
  `ID_Banc` int(2) NOT NULL,
  PRIMARY KEY (`ID_Ach_Or`),
  KEY `ID_J` (`ID_J`,`ID_Banc`),
  KEY `ID_Banc` (`ID_Banc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID_Ad` int(3) NOT NULL AUTO_INCREMENT,
  `Nom_Ad` varchar(15) NOT NULL,
  `prenom_Ad` varchar(15) NOT NULL,
  `Date_Nais_Ad` date NOT NULL,
  `Email_Ad` varchar(20) NOT NULL,
  `Mot_Passe` varchar(10) NOT NULL,
  `Date_Debut` date NOT NULL,
  `Date_Fin` date NOT NULL,
  `Salair` float NOT NULL,
  `Droit_Ad` int(2) NOT NULL,
  `ID_Sad` varchar(15) NOT NULL,
  PRIMARY KEY (`ID_Ad`),
  KEY `ID_Sad` (`ID_Sad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `banque`
--

DROP TABLE IF EXISTS `banque`;
CREATE TABLE IF NOT EXISTS `banque` (
  `ID_Banc` int(2) NOT NULL AUTO_INCREMENT,
  `Nom_Banc` varchar(20) NOT NULL,
  `Num_Compt` varchar(15) NOT NULL,
  `Sold` float NOT NULL,
  PRIMARY KEY (`ID_Banc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `boss`
--

DROP TABLE IF EXISTS `boss`;
CREATE TABLE IF NOT EXISTS `boss` (
  `Num_Boss` int(3) NOT NULL AUTO_INCREMENT,
  `Nom_Boss` varchar(15) NOT NULL,
  `HP_Boss` int(2) NOT NULL,
  `Attaque_Boss` int(3) NOT NULL,
  `Special_Attaque` int(3) NOT NULL,
  `ID_Monst` int(4) NOT NULL,
  PRIMARY KEY (`Num_Boss`),
  KEY `ID_Monst` (`ID_Monst`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `bug`
--

DROP TABLE IF EXISTS `bug`;
CREATE TABLE IF NOT EXISTS `bug` (
  `id_bug` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Pos` int(11) NOT NULL,
  `ID_Rapp` int(11) NOT NULL,
  PRIMARY KEY (`id_bug`),
  KEY `ID_Pos` (`ID_Pos`,`ID_Rapp`),
  KEY `ID_Rapp` (`ID_Rapp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `ID_Class` int(11) NOT NULL AUTO_INCREMENT,
  `nomClasse` char(10) NOT NULL,
  `PV` int(11) NOT NULL,
  `laForce` int(11) NOT NULL,
  `resistance` int(11) NOT NULL,
  `PA` int(11) NOT NULL,
  `PM` int(11) NOT NULL,
  PRIMARY KEY (`ID_Class`),
  UNIQUE KEY `nomClasse` (`nomClasse`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`ID_Class`, `nomClasse`, `PV`, `laForce`, `resistance`, `PA`, `PM`) VALUES
(1, 'Giants', 600, 40, 60, 5, 4),
(2, 'Humains', 400, 100, 40, 8, 5),
(3, 'Angels', 400, 110, 35, 9, 4),
(4, 'Devils', 350, 120, 50, 8, 4),
(5, 'Fairies', 300, 120, 30, 10, 6);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
-- insertion des valeurs comptable
INSERT INTO `comptable` (`ID_Comptable`, `Nom_Comptable`, `Prenom_Comptable`, `Date_Nais_Com`, `Email`, `Mot_Passe`, `Date_Debut`, `Salair`) VALUES
(1, 'hababou', 'mounir', '1996-01-22', 'no_email', '000', now(), 20000);

--
-- Structure de la table `developpeur`
--

DROP TABLE IF EXISTS `developpeur`;
CREATE TABLE IF NOT EXISTS `developpeur` (
  `ID_Dev` int(2) NOT NULL AUTO_INCREMENT,
  `Nom_Dev` varchar(15) NOT NULL,
  `Prenom_Dev` varchar(15) NOT NULL,
  `Date_Nais_Dev` date NOT NULL,
  `Email_Dev` varchar(20) NOT NULL,
  `Mot_Passe` varchar(10) NOT NULL,
  `Date_Debut` date NOT NULL,
  `Date_Fin` date NOT NULL,
  `Salair` float NOT NULL,
  `ID_Sad` varchar(15) NOT NULL,
  PRIMARY KEY (`ID_Dev`),
  KEY `ID_Sad` (`ID_Sad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `disscussion`
--

DROP TABLE IF EXISTS `disscussion`;
CREATE TABLE IF NOT EXISTS `disscussion` (
  `ID_Disscut` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Disscut` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_Disscut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `dungion`
--

DROP TABLE IF EXISTS `dungion`;
CREATE TABLE IF NOT EXISTS `dungion` (
  `ID_Dun` int(3) NOT NULL AUTO_INCREMENT,
  `Nom_Dun` varchar(15) NOT NULL,
  `Width_Dun` float NOT NULL,
  `Height_Dun` float NOT NULL,
  `difficult_Dun` int(2) NOT NULL,
  `Duree` time NOT NULL,
  `ID_Mond` int(2) NOT NULL,
  PRIMARY KEY (`ID_Dun`),
  KEY `ID_Mond` (`ID_Mond`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `entamer`
--

DROP TABLE IF EXISTS `entamer`;
CREATE TABLE IF NOT EXISTS `entamer` (
  `ID_Disscut` int(11) NOT NULL,
  `ID_J` int(4) NOT NULL,
  PRIMARY KEY (`ID_Disscut`,`ID_J`),
  KEY `ID_Disscut` (`ID_Disscut`,`ID_J`),
  KEY `ID_J` (`ID_J`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etage`
--

DROP TABLE IF EXISTS `etage`;
CREATE TABLE IF NOT EXISTS `etage` (
  `ID_Etag` int(4) NOT NULL AUTO_INCREMENT,
  `Num_Etag` int(2) NOT NULL,
  `Difficult` int(2) NOT NULL,
  `ID_Dun` int(3) NOT NULL,
  PRIMARY KEY (`ID_Etag`),
  KEY `ID_Dun` (`ID_Dun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `ID_Event` int(4) NOT NULL AUTO_INCREMENT,
  `Nom_Event` varchar(15) NOT NULL,
  `Date_Debut_Event` date NOT NULL,
  `Date_Fin_Event` date NOT NULL,
  `Min_Level` int(3) NOT NULL,
  `ID_Mond` int(2) NOT NULL,
  PRIMARY KEY (`ID_Event`),
  KEY `ID_Mond` (`ID_Mond`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `friend_requests`
--

DROP TABLE IF EXISTS `friend_requests`;
CREATE TABLE IF NOT EXISTS `friend_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `recipient` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `friend_requests_ibfk_1` (`sender`),
  KEY `friend_requests_ibfk_2` (`recipient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `guild`
--

DROP TABLE IF EXISTS `guild`;
CREATE TABLE IF NOT EXISTS `guild` (
  `ID_Guild` int(3) NOT NULL AUTO_INCREMENT,
  `Nom_Guild` varchar(15) NOT NULL,
  `For_ce_Guild` int(2) NOT NULL,
  `ID_Mond` int(2) NOT NULL,
  `Members` text NOT NULL,
  `Admin` varchar(15) NOT NULL,
  PRIMARY KEY (`ID_Guild`),
  KEY `ID_Mond` (`ID_Mond`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `inventaire`
--

DROP TABLE IF EXISTS `inventaire`;
CREATE TABLE IF NOT EXISTS `inventaire` (
  `ID_Inv` int(11) NOT NULL AUTO_INCREMENT,
  `Date_Inv` date NOT NULL,
  PRIMARY KEY (`ID_Inv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE IF NOT EXISTS `joueur` (
  `ID_J` int(4) NOT NULL AUTO_INCREMENT,
  `Nom_J` varchar(15) DEFAULT NULL,
  `Prenom_J` varchar(15) DEFAULT NULL,
  `Date_Nais_J` date DEFAULT NULL,
  `Nom_Compt` varchar(15) DEFAULT NULL,
  `Email_J` varchar(20) DEFAULT NULL,
  `Mot_Passe` varchar(10) DEFAULT NULL,
  `Point` int(11) DEFAULT NULL,
  `Point_Rest_Repart` int(11) DEFAULT NULL,
  `Reputation` int(11) DEFAULT NULL,
  `Etat_Disscut` int(11) DEFAULT NULL,
  `Sold_Or` int(11) DEFAULT NULL,
  `PA` int(11) DEFAULT NULL,
  `PM` int(11) DEFAULT NULL,
  `ID_Ad` int(3) DEFAULT NULL,
  `ID_Liste` int(4) DEFAULT NULL,
  `ID_Guild` int(3) DEFAULT NULL,
  `ID_Class` int(11) DEFAULT NULL,
  `MainG` int(11) DEFAULT NULL,
  `MainD` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_J`),
  KEY `ID_Ad` (`ID_Ad`),
  KEY `ID_Liste` (`ID_Liste`),
  KEY `ID_Guild` (`ID_Guild`),
  KEY `ID_Class` (`ID_Class`),
  KEY `MainG` (`MainG`),
  KEY `MainD` (`MainD`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`ID_J`, `Nom_J`, `Prenom_J`, `Date_Nais_J`, `Nom_Compt`, `Email_J`, `Mot_Passe`, `Point`, `Point_Rest_Repart`, `Reputation`, `Etat_Disscut`, `Sold_Or`, `PA`, `PM`, `ID_Ad`, `ID_Liste`, `ID_Guild`, `ID_Class`, `MainG`, `MainD`) VALUES
(1, 'abdou', 'malek', NULL, 'testcompte', NULL, 'aaaa', NULL, NULL, NULL, NULL, 800, NULL, NULL, NULL, NULL, NULL, 1, 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `friends` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `ID_msg` int(11) NOT NULL AUTO_INCREMENT,
  `MSG` text NOT NULL,
  `Date_Envoi` date NOT NULL,
  `Date_Vu` date NOT NULL,
  `ID_J` int(4) NOT NULL,
  PRIMARY KEY (`ID_msg`),
  KEY `ID_J` (`ID_J`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `monde`
--

DROP TABLE IF EXISTS `monde`;
CREATE TABLE IF NOT EXISTS `monde` (
  `ID_Mond` int(2) NOT NULL AUTO_INCREMENT,
  `Nom_Mond` varchar(20) NOT NULL,
  `Width` float NOT NULL,
  `Height` float NOT NULL,
  `date_de_creation` date DEFAULT NULL,
  `Roi_Mond` varchar(15) NOT NULL,
  `ID_Dev` int(2) DEFAULT NULL,
  PRIMARY KEY (`ID_Mond`),
  KEY `ID_Dev` (`ID_Dev`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `monstre`
--

DROP TABLE IF EXISTS `monstre`;
CREATE TABLE IF NOT EXISTS `monstre` (
  `ID_Monst` int(4) NOT NULL AUTO_INCREMENT,
  `Nom_Monst` varchar(15) NOT NULL,
  `HP` int(3) NOT NULL,
  `Level` int(3) NOT NULL,
  `Attaque` int(3) NOT NULL,
  `ID_Etag` int(4) NOT NULL,
  PRIMARY KEY (`ID_Monst`),
  KEY `ID_Etag` (`ID_Etag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `npc`
--

DROP TABLE IF EXISTS `npc`;
CREATE TABLE IF NOT EXISTS `npc` (
  `id_npc` mediumint(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `image` varchar(30) NOT NULL DEFAULT '',
  `sector_id` mediumint(10) NOT NULL DEFAULT '0',
  `x` varchar(15) NOT NULL DEFAULT '',
  `y` varchar(15) NOT NULL DEFAULT '',
  `services` varchar(255) NOT NULL DEFAULT '',
  `weapons` text NOT NULL,
  `items` varchar(255) NOT NULL DEFAULT '',
  KEY `id_npc` (`id_npc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `objet`
--

DROP TABLE IF EXISTS `objet`;
CREATE TABLE IF NOT EXISTS `objet` (
  `ID_Obj` int(4) NOT NULL AUTO_INCREMENT,
  `Nom_Obj` varchar(15) NOT NULL,
  `prix_objet` double NOT NULL DEFAULT '0',
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

-- --------------------------------------------------------

--
-- Structure de la table `objet_inventair`
--

DROP TABLE IF EXISTS `objet_inventair`;
CREATE TABLE IF NOT EXISTS `objet_inventair` (
  `ID_Obj` int(4) NOT NULL,
  `ID_Inv` int(11) NOT NULL,
  PRIMARY KEY (`ID_Obj`,`ID_Inv`),
  KEY `ID_Obj` (`ID_Obj`,`ID_Inv`),
  KEY `ID_Inv` (`ID_Inv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `personnage`
--

DROP TABLE IF EXISTS `personnage`;
CREATE TABLE IF NOT EXISTS `personnage` (
  `ID_Pers` int(4) NOT NULL AUTO_INCREMENT,
  `Nom_Pers` varchar(15) NOT NULL,
  `For_ce` int(11) NOT NULL,
  `Dexterite` int(11) NOT NULL,
  `Constitution` int(11) NOT NULL,
  `Inteligence` int(11) NOT NULL,
  `ID_Class` int(11) NOT NULL,
  PRIMARY KEY (`ID_Pers`),
  KEY `ID_Class` (`ID_Class`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `position`
--

DROP TABLE IF EXISTS `position`;
CREATE TABLE IF NOT EXISTS `position` (
  `id_pos` int(11) NOT NULL AUTO_INCREMENT,
  `pos_X` float NOT NULL,
  `pos_Y` float NOT NULL,
  PRIMARY KEY (`id_pos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rapport`
--

DROP TABLE IF EXISTS `rapport`;
CREATE TABLE IF NOT EXISTS `rapport` (
  `ID_Rapp` int(11) NOT NULL AUTO_INCREMENT,
  `Titre_Rapp` varchar(50) NOT NULL,
  `Capteur` text NOT NULL,
  `Date_Rapp` date NOT NULL,
  `ID_J` int(4) NOT NULL,
  `ID_Ad` int(3) NOT NULL,
  `id_type_rap` int(11) NOT NULL,
  PRIMARY KEY (`ID_Rapp`),
  KEY `ID_J` (`ID_J`,`ID_Ad`,`id_type_rap`),
  KEY `id_type_rap` (`id_type_rap`),
  KEY `ID_Ad` (`ID_Ad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rapport_finance`
--

DROP TABLE IF EXISTS `rapport_finance`;
CREATE TABLE IF NOT EXISTS `rapport_finance` (
  `ID_Rapp` int(11) NOT NULL AUTO_INCREMENT,
  `Titre_Rapp` varchar(50) NOT NULL,
  `Date_Rapp` date NOT NULL,
  `Contenu` text NOT NULL,
  `ID_Comptable` int(2) NOT NULL,
  `ID_Sad` varchar(15) NOT NULL,
  PRIMARY KEY (`ID_Rapp`),
  KEY `ID_Comptable` (`ID_Comptable`,`ID_Sad`),
  KEY `ID_Sad` (`ID_Sad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `recuperer`
--

DROP TABLE IF EXISTS `recuperer`;
CREATE TABLE IF NOT EXISTS `recuperer` (
  `ID_Rev` int(4) NOT NULL,
  `ID_Banc` int(2) NOT NULL,
  `date` date NOT NULL,
  `montant` float NOT NULL,
  PRIMARY KEY (`ID_Rev`,`ID_Banc`),
  KEY `ID_Rev` (`ID_Rev`,`ID_Banc`),
  KEY `ID_Banc` (`ID_Banc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
-- insertion des revenus
INSERT INTO `revenus` (`ID_Rev`, `Type_Rev`, `Mont_Rev`) VALUES
(1, 'or_pack_100', 100),
(2, 'or_pack_200', 200),
(3, 'or_pack_300', 300);

--
-- Structure de la table `se_deplacer`
--

DROP TABLE IF EXISTS `se_deplacer`;
CREATE TABLE IF NOT EXISTS `se_deplacer` (
  `ID_J` int(4) NOT NULL,
  `ID_Pos` int(11) NOT NULL,
  PRIMARY KEY (`ID_J`,`ID_Pos`),
  KEY `ID_J` (`ID_J`,`ID_Pos`),
  KEY `ID_Pos` (`ID_Pos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sig_nal`
--

DROP TABLE IF EXISTS `sig_nal`;
CREATE TABLE IF NOT EXISTS `sig_nal` (
  `id_sig_nal` int(11) NOT NULL AUTO_INCREMENT,
  `ID_J` int(4) NOT NULL,
  `ID_Rapp` int(11) NOT NULL,
  PRIMARY KEY (`id_sig_nal`),
  KEY `ID_J` (`ID_J`,`ID_Rapp`),
  KEY `ID_Rapp` (`ID_Rapp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `super_admin`
--

DROP TABLE IF EXISTS `super_admin`;
CREATE TABLE IF NOT EXISTS `super_admin` (
  `ID_Sad` varchar(15) NOT NULL,
  `Mot_Passe` varchar(10) NOT NULL,
  `Droit` int(2) NOT NULL,
  PRIMARY KEY (`ID_Sad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_rapport`
--

DROP TABLE IF EXISTS `type_rapport`;
CREATE TABLE IF NOT EXISTS `type_rapport` (
  `id_type_rap` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_type_rap`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `achat_objet`
--
ALTER TABLE `achat_objet`
  ADD CONSTRAINT `achat_objet_ibfk_1` FOREIGN KEY (`ID_J`) REFERENCES `joueur` (`ID_J`),
  ADD CONSTRAINT `achat_objet_ibfk_2` FOREIGN KEY (`ID_Obj`) REFERENCES `objet` (`ID_Obj`);

--
-- Contraintes pour la table `acheter_or`
--
ALTER TABLE `acheter_or`
  ADD CONSTRAINT `acheter_or_ibfk_1` FOREIGN KEY (`ID_J`) REFERENCES `joueur` (`ID_J`),
  ADD CONSTRAINT `acheter_or_ibfk_2` FOREIGN KEY (`ID_Banc`) REFERENCES `banque` (`ID_Banc`);

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`ID_Sad`) REFERENCES `super_admin` (`ID_Sad`);

--
-- Contraintes pour la table `boss`
--
ALTER TABLE `boss`
  ADD CONSTRAINT `boss_ibfk_1` FOREIGN KEY (`ID_Monst`) REFERENCES `monstre` (`ID_Monst`);

--
-- Contraintes pour la table `bug`
--
ALTER TABLE `bug`
  ADD CONSTRAINT `bug_ibfk_1` FOREIGN KEY (`ID_Pos`) REFERENCES `position` (`id_pos`),
  ADD CONSTRAINT `bug_ibfk_2` FOREIGN KEY (`ID_Rapp`) REFERENCES `rapport` (`ID_Rapp`);

--
-- Contraintes pour la table `comptable`
--
--  ALTER TABLE `comptable`
--  ADD CONSTRAINT `comptable_ibfk_1` FOREIGN KEY (`ID_Sad`) REFERENCES `super_admin` (`ID_Sad`);

--
-- Contraintes pour la table `developpeur`
--
ALTER TABLE `developpeur`
  ADD CONSTRAINT `developpeur_ibfk_1` FOREIGN KEY (`ID_Sad`) REFERENCES `super_admin` (`ID_Sad`);

--
-- Contraintes pour la table `dungion`
--
ALTER TABLE `dungion`
  ADD CONSTRAINT `dungion_ibfk_1` FOREIGN KEY (`ID_Mond`) REFERENCES `monde` (`ID_Mond`);

--
-- Contraintes pour la table `entamer`
--
ALTER TABLE `entamer`
  ADD CONSTRAINT `entamer_ibfk_1` FOREIGN KEY (`ID_Disscut`) REFERENCES `disscussion` (`ID_Disscut`),
  ADD CONSTRAINT `entamer_ibfk_2` FOREIGN KEY (`ID_J`) REFERENCES `joueur` (`ID_J`);

--
-- Contraintes pour la table `etage`
--
ALTER TABLE `etage`
  ADD CONSTRAINT `etage_ibfk_1` FOREIGN KEY (`ID_Dun`) REFERENCES `dungion` (`ID_Dun`);

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`ID_Mond`) REFERENCES `monde` (`ID_Mond`);

--
-- Contraintes pour la table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD CONSTRAINT `friend_requests_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `joueur` (`ID_J`),
  ADD CONSTRAINT `friend_requests_ibfk_2` FOREIGN KEY (`recipient`) REFERENCES `joueur` (`ID_J`);

--
-- Contraintes pour la table `guild`
--
ALTER TABLE `guild`
  ADD CONSTRAINT `guild_ibfk_1` FOREIGN KEY (`ID_Mond`) REFERENCES `monde` (`ID_Mond`);

--
-- Contraintes pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD CONSTRAINT `joueur_ibfk_1` FOREIGN KEY (`ID_Ad`) REFERENCES `admin` (`ID_Ad`),
  ADD CONSTRAINT `joueur_ibfk_2` FOREIGN KEY (`ID_Guild`) REFERENCES `guild` (`ID_Guild`),
  ADD CONSTRAINT `joueur_ibfk_3` FOREIGN KEY (`ID_Liste`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `joueur_ibfk_4` FOREIGN KEY (`ID_Class`) REFERENCES `classe` (`ID_Class`),
  ADD CONSTRAINT `joueur_ibfk_5` FOREIGN KEY (`MainG`) REFERENCES `objet` (`ID_Obj`),
  ADD CONSTRAINT `joueur_ibfk_6` FOREIGN KEY (`MainD`) REFERENCES `objet` (`ID_Obj`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`ID_J`) REFERENCES `joueur` (`ID_J`);

--
-- Contraintes pour la table `monde`
--
ALTER TABLE `monde`
  ADD CONSTRAINT `monde_ibfk_1` FOREIGN KEY (`ID_Dev`) REFERENCES `developpeur` (`ID_Dev`);

--
-- Contraintes pour la table `monstre`
--
ALTER TABLE `monstre`
  ADD CONSTRAINT `monstre_ibfk_1` FOREIGN KEY (`ID_Etag`) REFERENCES `etage` (`ID_Etag`);

--
-- Contraintes pour la table `objet_inventair`
--
ALTER TABLE `objet_inventair`
  ADD CONSTRAINT `objet_inventair_ibfk_1` FOREIGN KEY (`ID_Inv`) REFERENCES `inventaire` (`ID_Inv`),
  ADD CONSTRAINT `objet_inventair_ibfk_2` FOREIGN KEY (`ID_Obj`) REFERENCES `objet` (`ID_Obj`);

--
-- Contraintes pour la table `personnage`
--
ALTER TABLE `personnage`
  ADD CONSTRAINT `personnage_ibfk_1` FOREIGN KEY (`ID_Class`) REFERENCES `classe` (`ID_Class`);

--
-- Contraintes pour la table `rapport`
--
ALTER TABLE `rapport`
  ADD CONSTRAINT `rapport_ibfk_1` FOREIGN KEY (`ID_J`) REFERENCES `joueur` (`ID_J`),
  ADD CONSTRAINT `rapport_ibfk_2` FOREIGN KEY (`id_type_rap`) REFERENCES `type_rapport` (`id_type_rap`),
  ADD CONSTRAINT `rapport_ibfk_3` FOREIGN KEY (`ID_Ad`) REFERENCES `admin` (`ID_Ad`);

--
-- Contraintes pour la table `rapport_finance`
--
ALTER TABLE `rapport_finance`
  ADD CONSTRAINT `rapport_finance_ibfk_1` FOREIGN KEY (`ID_Rapp`) REFERENCES `rapport` (`ID_Rapp`),
  ADD CONSTRAINT `rapport_finance_ibfk_2` FOREIGN KEY (`ID_Sad`) REFERENCES `super_admin` (`ID_Sad`);

--
-- Contraintes pour la table `recuperer`
--
ALTER TABLE `recuperer`
  ADD CONSTRAINT `recuperer_ibfk_1` FOREIGN KEY (`ID_Banc`) REFERENCES `banque` (`ID_Banc`),
  ADD CONSTRAINT `recuperer_ibfk_2` FOREIGN KEY (`ID_Rev`) REFERENCES `revenus` (`ID_Rev`);

--
-- Contraintes pour la table `revenus`
--
-- ALTER TABLE `revenus`
--  ADD CONSTRAINT `revenus_ibfk_1` FOREIGN KEY (`ID_Comptable`) REFERENCES `comptable` (`ID_Comptable`);

--
-- Contraintes pour la table `se_deplacer`
--
ALTER TABLE `se_deplacer`
  ADD CONSTRAINT `se_deplacer_ibfk_1` FOREIGN KEY (`ID_J`) REFERENCES `joueur` (`ID_J`),
  ADD CONSTRAINT `se_deplacer_ibfk_2` FOREIGN KEY (`ID_Pos`) REFERENCES `position` (`id_pos`);

--
-- Contraintes pour la table `sig_nal`
--
ALTER TABLE `sig_nal`
  ADD CONSTRAINT `sig_nal_ibfk_1` FOREIGN KEY (`ID_J`) REFERENCES `joueur` (`ID_J`),
  ADD CONSTRAINT `sig_nal_ibfk_2` FOREIGN KEY (`ID_Rapp`) REFERENCES `rapport` (`ID_Rapp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
