-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 09, 2020 at 06:33 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ancient_time_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `achat_objet`
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
-- Table structure for table `acheter_or`
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
-- Table structure for table `admin`
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
-- Table structure for table `banque`
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
-- Table structure for table `boss`
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
-- Table structure for table `bug`
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
-- Table structure for table `classe`
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
-- Dumping data for table `classe`
--

INSERT INTO `classe` (`ID_Class`, `nomClasse`, `PV`, `laForce`, `resistance`, `PA`, `PM`) VALUES
(1, 'Giants', 600, 40, 60, 5, 4),
(2, 'Humains', 400, 100, 40, 8, 5),
(3, 'Angels', 400, 110, 35, 9, 4),
(4, 'Devils', 350, 120, 50, 8, 4),
(5, 'Fairies', 300, 120, 30, 10, 6);

-- --------------------------------------------------------

--
-- Table structure for table `comptable`
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
  `Date_Fin` date NOT NULL,
  `Salair` float NOT NULL,
  `ID_Sad` varchar(15) NOT NULL,
  PRIMARY KEY (`ID_Comptable`),
  KEY `ID_Sad` (`ID_Sad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `developpeur`
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
-- Table structure for table `disscussion`
--

DROP TABLE IF EXISTS `disscussion`;
CREATE TABLE IF NOT EXISTS `disscussion` (
  `ID_Disscut` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Disscut` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_Disscut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dungeon`
--

DROP TABLE IF EXISTS `dungeon`;
CREATE TABLE IF NOT EXISTS `dungeon` (
  `ID_Dun` int(3) NOT NULL AUTO_INCREMENT,
  `Nom_Dun` varchar(15) NOT NULL,
  `Width_Dun` float NOT NULL,
  `Height_Dun` float NOT NULL,
  `difficult_Dun` int(2) NOT NULL,
  `Duree` time NOT NULL,
  `ID_Mond` int(2) NOT NULL,
  PRIMARY KEY (`ID_Dun`),
  KEY `ID_Mond` (`ID_Mond`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dungeon`
--

INSERT INTO `dungeon` (`ID_Dun`, `Nom_Dun`, `Width_Dun`, `Height_Dun`, `difficult_Dun`, `Duree`, `ID_Mond`) VALUES
(1, 'fear', 1000, 1000, 10, '99:59:59', 2),
(2, 'valkyria', 500, 500, 10, '23:59:00', 2),
(3, 'First D', 100, 100, 1, '22:22:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `entamer`
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
-- Table structure for table `etage`
--

DROP TABLE IF EXISTS `etage`;
CREATE TABLE IF NOT EXISTS `etage` (
  `ID_Etag` int(4) NOT NULL AUTO_INCREMENT,
  `Num_Etag` int(20) NOT NULL,
  `Width` int(30) NOT NULL,
  `Height` int(30) NOT NULL,
  `Difficult` int(20) NOT NULL,
  `ID_Dun` int(3) NOT NULL,
  PRIMARY KEY (`ID_Etag`),
  KEY `ID_Dun` (`ID_Dun`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etage`
--

INSERT INTO `etage` (`ID_Etag`, `Num_Etag`, `Width`, `Height`, `Difficult`, `ID_Dun`) VALUES
(1, 1, 200, 200, 2, 2),
(2, 2, 200, 200, 4, 2),
(3, 1, 400, 400, 100, 3);

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `ID_Event` int(4) NOT NULL AUTO_INCREMENT,
  `Nom_Event` varchar(60) NOT NULL,
  `Date_Debut_Event` date NOT NULL,
  `Date_Fin_Event` date NOT NULL,
  `Min_Level` int(30) NOT NULL,
  `ID_Mond` int(30) NOT NULL,
  PRIMARY KEY (`ID_Event`),
  KEY `ID_Mond` (`ID_Mond`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`ID_Event`, `Nom_Event`, `Date_Debut_Event`, `Date_Fin_Event`, `Min_Level`, `ID_Mond`) VALUES
(1, 'The Start', '2020-02-08', '2020-02-29', 0, 1),
(2, 'first quest', '2020-02-08', '2020-02-09', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `guild`
--

DROP TABLE IF EXISTS `guild`;
CREATE TABLE IF NOT EXISTS `guild` (
  `ID_Guild` int(3) NOT NULL AUTO_INCREMENT,
  `Nom_Guild` varchar(15) NOT NULL,
  `For_ce_Guild` int(2) NOT NULL,
  `ID_Mond` int(2) NOT NULL,
  PRIMARY KEY (`ID_Guild`),
  KEY `ID_Mond` (`ID_Mond`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventaire`
--

DROP TABLE IF EXISTS `inventaire`;
CREATE TABLE IF NOT EXISTS `inventaire` (
  `ID_Inv` int(11) NOT NULL AUTO_INCREMENT,
  `Date_Inv` date NOT NULL,
  PRIMARY KEY (`ID_Inv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invitation`
--

DROP TABLE IF EXISTS `invitation`;
CREATE TABLE IF NOT EXISTS `invitation` (
  `ID_J1` int(4) NOT NULL,
  `ID_J2` int(4) NOT NULL,
  `Reponse` varchar(10) NOT NULL,
  `Date_Inv` date NOT NULL,
  KEY `ID_J1` (`ID_J1`,`ID_J2`),
  KEY `ID_J2` (`ID_J2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE IF NOT EXISTS `joueur` (
  `ID_J` int(4) NOT NULL AUTO_INCREMENT,
  `Nom_J` varchar(15) NOT NULL,
  `Prenom_J` varchar(15) NOT NULL,
  `Date_Nais_J` date NOT NULL,
  `Nom_Compt` varchar(15) NOT NULL,
  `Email_J` varchar(20) NOT NULL,
  `Mot_Passe` varchar(10) NOT NULL,
  `Point` int(11) NOT NULL,
  `Point_Rest_Repart` int(11) NOT NULL,
  `Reputation` int(11) NOT NULL,
  `Etat_Disscut` int(11) NOT NULL,
  `Sold_Or` int(11) NOT NULL,
  `PA` int(11) NOT NULL,
  `MA` int(11) NOT NULL,
  `ID_Ad` int(3) NOT NULL,
  `ID_Liste` int(4) NOT NULL,
  `ID_Guild` int(3) NOT NULL,
  `ID_Class` int(11) NOT NULL,
  `MainG` int(11) NOT NULL,
  `MainD` int(11) NOT NULL,
  PRIMARY KEY (`ID_J`),
  KEY `ID_Ad` (`ID_Ad`),
  KEY `ID_Liste` (`ID_Liste`),
  KEY `ID_Guild` (`ID_Guild`),
  KEY `ID_Class` (`ID_Class`),
  KEY `MainG` (`MainG`),
  KEY `MainD` (`MainD`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `liste_amis`
--

DROP TABLE IF EXISTS `liste_amis`;
CREATE TABLE IF NOT EXISTS `liste_amis` (
  `ID_Liste` int(4) NOT NULL AUTO_INCREMENT,
  `Nbr_Amis` int(4) NOT NULL,
  PRIMARY KEY (`ID_Liste`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
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
-- Table structure for table `monde`
--

DROP TABLE IF EXISTS `monde`;
CREATE TABLE IF NOT EXISTS `monde` (
  `ID_Mond` int(30) NOT NULL AUTO_INCREMENT,
  `Nom_Mond` varchar(20) NOT NULL,
  `Width` int(10) NOT NULL,
  `Height` int(10) NOT NULL,
  `date_de_creation` date DEFAULT NULL,
  `Roi_Mond` varchar(15) DEFAULT NULL,
  `ID_Dev` int(2) DEFAULT NULL,
  PRIMARY KEY (`ID_Mond`),
  KEY `ID_Dev` (`ID_Dev`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monde`
--

INSERT INTO `monde` (`ID_Mond`, `Nom_Mond`, `Width`, `Height`, `date_de_creation`, `Roi_Mond`, `ID_Dev`) VALUES
(1, 'Hell', 2000, 2000, '2020-02-06', 'null', NULL),
(2, 'narnia', 4000, 4000, '2020-02-07', NULL, NULL),
(6, 'sofiane', 4000, 4000, '2020-02-08', 'sss', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `monstre`
--

DROP TABLE IF EXISTS `monstre`;
CREATE TABLE IF NOT EXISTS `monstre` (
  `ID_Monst` int(4) NOT NULL AUTO_INCREMENT,
  `Nom_Monst` varchar(15) NOT NULL,
  `x` int(20) NOT NULL,
  `y` int(20) NOT NULL,
  `HP` int(3) NOT NULL,
  `Level` int(3) NOT NULL,
  `Attaque` int(3) NOT NULL,
  `ID_Etag` int(4) NOT NULL,
  PRIMARY KEY (`ID_Monst`),
  KEY `ID_Etag` (`ID_Etag`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monstre`
--

INSERT INTO `monstre` (`ID_Monst`, `Nom_Monst`, `x`, `y`, `HP`, `Level`, `Attaque`, `ID_Etag`) VALUES
(1, 'Bouloulou', 5, 5, 200, 2, 15, 2),
(2, 'lucifer', 200, 200, 10000, 100, 100, 3),
(3, 'thorus', 22, 22, 1000, 16, 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `npc`
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
-- Table structure for table `objet`
--

DROP TABLE IF EXISTS `objet`;
CREATE TABLE IF NOT EXISTS `objet` (
  `ID_Obj` int(4) NOT NULL AUTO_INCREMENT,
  `Nom_Obj` varchar(15) NOT NULL,
  `Etat_Obj` varchar(7) NOT NULL,
  `for_ce` int(11) NOT NULL,
  `ID_Sad` varchar(15) NOT NULL,
  `objetPa` int(11) DEFAULT NULL,
  `objetPm` int(11) DEFAULT NULL,
  `objetPv` int(11) DEFAULT NULL,
  `objetResistance` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_Obj`),
  KEY `ID_Sad` (`ID_Sad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `objet_inventair`
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
-- Table structure for table `personnage`
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
-- Table structure for table `position`
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
-- Table structure for table `rapport`
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
-- Table structure for table `rapport_finance`
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
-- Table structure for table `recuperer`
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
-- Table structure for table `revenus`
--

DROP TABLE IF EXISTS `revenus`;
CREATE TABLE IF NOT EXISTS `revenus` (
  `ID_Rev` int(4) NOT NULL AUTO_INCREMENT,
  `Type_Rev` varchar(15) NOT NULL,
  `Mont_Rev` float NOT NULL,
  `ID_Comptable` int(2) NOT NULL,
  PRIMARY KEY (`ID_Rev`),
  KEY `ID_Comptable` (`ID_Comptable`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `se_deplacer`
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
-- Table structure for table `sig_nal`
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
-- Table structure for table `super_admin`
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
-- Table structure for table `type_rapport`
--

DROP TABLE IF EXISTS `type_rapport`;
CREATE TABLE IF NOT EXISTS `type_rapport` (
  `id_type_rap` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_type_rap`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achat_objet`
--
ALTER TABLE `achat_objet`
  ADD CONSTRAINT `achat_objet_ibfk_1` FOREIGN KEY (`ID_J`) REFERENCES `joueur` (`ID_J`),
  ADD CONSTRAINT `achat_objet_ibfk_2` FOREIGN KEY (`ID_Obj`) REFERENCES `objet` (`ID_Obj`);

--
-- Constraints for table `acheter_or`
--
ALTER TABLE `acheter_or`
  ADD CONSTRAINT `acheter_or_ibfk_1` FOREIGN KEY (`ID_J`) REFERENCES `joueur` (`ID_J`),
  ADD CONSTRAINT `acheter_or_ibfk_2` FOREIGN KEY (`ID_Banc`) REFERENCES `banque` (`ID_Banc`);

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`ID_Sad`) REFERENCES `super_admin` (`ID_Sad`);

--
-- Constraints for table `boss`
--
ALTER TABLE `boss`
  ADD CONSTRAINT `boss_ibfk_1` FOREIGN KEY (`ID_Monst`) REFERENCES `monstre` (`ID_Monst`);

--
-- Constraints for table `bug`
--
ALTER TABLE `bug`
  ADD CONSTRAINT `bug_ibfk_1` FOREIGN KEY (`ID_Pos`) REFERENCES `position` (`id_pos`),
  ADD CONSTRAINT `bug_ibfk_2` FOREIGN KEY (`ID_Rapp`) REFERENCES `rapport` (`ID_Rapp`);

--
-- Constraints for table `comptable`
--
ALTER TABLE `comptable`
  ADD CONSTRAINT `comptable_ibfk_1` FOREIGN KEY (`ID_Sad`) REFERENCES `super_admin` (`ID_Sad`);

--
-- Constraints for table `developpeur`
--
ALTER TABLE `developpeur`
  ADD CONSTRAINT `developpeur_ibfk_1` FOREIGN KEY (`ID_Sad`) REFERENCES `super_admin` (`ID_Sad`);

--
-- Constraints for table `dungeon`
--
ALTER TABLE `dungeon`
  ADD CONSTRAINT `dungeon_ibfk_1` FOREIGN KEY (`ID_Mond`) REFERENCES `monde` (`ID_Mond`);

--
-- Constraints for table `entamer`
--
ALTER TABLE `entamer`
  ADD CONSTRAINT `entamer_ibfk_1` FOREIGN KEY (`ID_Disscut`) REFERENCES `disscussion` (`ID_Disscut`),
  ADD CONSTRAINT `entamer_ibfk_2` FOREIGN KEY (`ID_J`) REFERENCES `joueur` (`ID_J`);

--
-- Constraints for table `etage`
--
ALTER TABLE `etage`
  ADD CONSTRAINT `etage_ibfk_1` FOREIGN KEY (`ID_Dun`) REFERENCES `dungeon` (`ID_Dun`);

--
-- Constraints for table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`ID_Mond`) REFERENCES `monde` (`ID_Mond`);

--
-- Constraints for table `guild`
--
ALTER TABLE `guild`
  ADD CONSTRAINT `guild_ibfk_1` FOREIGN KEY (`ID_Mond`) REFERENCES `monde` (`ID_Mond`);

--
-- Constraints for table `invitation`
--
ALTER TABLE `invitation`
  ADD CONSTRAINT `invitation_ibfk_1` FOREIGN KEY (`ID_J1`) REFERENCES `joueur` (`ID_J`),
  ADD CONSTRAINT `invitation_ibfk_2` FOREIGN KEY (`ID_J2`) REFERENCES `joueur` (`ID_J`);

--
-- Constraints for table `joueur`
--
ALTER TABLE `joueur`
  ADD CONSTRAINT `joueur_ibfk_1` FOREIGN KEY (`ID_Ad`) REFERENCES `admin` (`ID_Ad`),
  ADD CONSTRAINT `joueur_ibfk_2` FOREIGN KEY (`ID_Guild`) REFERENCES `guild` (`ID_Guild`),
  ADD CONSTRAINT `joueur_ibfk_3` FOREIGN KEY (`ID_Liste`) REFERENCES `liste_amis` (`ID_Liste`),
  ADD CONSTRAINT `joueur_ibfk_4` FOREIGN KEY (`ID_Class`) REFERENCES `classe` (`ID_Class`),
  ADD CONSTRAINT `joueur_ibfk_5` FOREIGN KEY (`MainG`) REFERENCES `objet` (`ID_Obj`),
  ADD CONSTRAINT `joueur_ibfk_6` FOREIGN KEY (`MainD`) REFERENCES `objet` (`ID_Obj`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`ID_J`) REFERENCES `joueur` (`ID_J`);

--
-- Constraints for table `monde`
--
ALTER TABLE `monde`
  ADD CONSTRAINT `monde_ibfk_1` FOREIGN KEY (`ID_Dev`) REFERENCES `developpeur` (`ID_Dev`);

--
-- Constraints for table `monstre`
--
ALTER TABLE `monstre`
  ADD CONSTRAINT `monstre_ibfk_1` FOREIGN KEY (`ID_Etag`) REFERENCES `etage` (`ID_Etag`);

--
-- Constraints for table `objet`
--
ALTER TABLE `objet`
  ADD CONSTRAINT `objet_ibfk_1` FOREIGN KEY (`ID_Sad`) REFERENCES `super_admin` (`ID_Sad`);

--
-- Constraints for table `objet_inventair`
--
ALTER TABLE `objet_inventair`
  ADD CONSTRAINT `objet_inventair_ibfk_1` FOREIGN KEY (`ID_Inv`) REFERENCES `inventaire` (`ID_Inv`),
  ADD CONSTRAINT `objet_inventair_ibfk_2` FOREIGN KEY (`ID_Obj`) REFERENCES `objet` (`ID_Obj`);

--
-- Constraints for table `personnage`
--
ALTER TABLE `personnage`
  ADD CONSTRAINT `personnage_ibfk_1` FOREIGN KEY (`ID_Class`) REFERENCES `classe` (`ID_Class`);

--
-- Constraints for table `rapport`
--
ALTER TABLE `rapport`
  ADD CONSTRAINT `rapport_ibfk_1` FOREIGN KEY (`ID_J`) REFERENCES `joueur` (`ID_J`),
  ADD CONSTRAINT `rapport_ibfk_2` FOREIGN KEY (`id_type_rap`) REFERENCES `type_rapport` (`id_type_rap`),
  ADD CONSTRAINT `rapport_ibfk_3` FOREIGN KEY (`ID_Ad`) REFERENCES `admin` (`ID_Ad`);

--
-- Constraints for table `rapport_finance`
--
ALTER TABLE `rapport_finance`
  ADD CONSTRAINT `rapport_finance_ibfk_1` FOREIGN KEY (`ID_Rapp`) REFERENCES `rapport` (`ID_Rapp`),
  ADD CONSTRAINT `rapport_finance_ibfk_2` FOREIGN KEY (`ID_Sad`) REFERENCES `super_admin` (`ID_Sad`);

--
-- Constraints for table `recuperer`
--
ALTER TABLE `recuperer`
  ADD CONSTRAINT `recuperer_ibfk_1` FOREIGN KEY (`ID_Banc`) REFERENCES `banque` (`ID_Banc`),
  ADD CONSTRAINT `recuperer_ibfk_2` FOREIGN KEY (`ID_Rev`) REFERENCES `revenus` (`ID_Rev`);

--
-- Constraints for table `revenus`
--
ALTER TABLE `revenus`
  ADD CONSTRAINT `revenus_ibfk_1` FOREIGN KEY (`ID_Comptable`) REFERENCES `comptable` (`ID_Comptable`);

--
-- Constraints for table `se_deplacer`
--
ALTER TABLE `se_deplacer`
  ADD CONSTRAINT `se_deplacer_ibfk_1` FOREIGN KEY (`ID_J`) REFERENCES `joueur` (`ID_J`),
  ADD CONSTRAINT `se_deplacer_ibfk_2` FOREIGN KEY (`ID_Pos`) REFERENCES `position` (`id_pos`);

--
-- Constraints for table `sig_nal`
--
ALTER TABLE `sig_nal`
  ADD CONSTRAINT `sig_nal_ibfk_1` FOREIGN KEY (`ID_J`) REFERENCES `joueur` (`ID_J`),
  ADD CONSTRAINT `sig_nal_ibfk_2` FOREIGN KEY (`ID_Rapp`) REFERENCES `rapport` (`ID_Rapp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
