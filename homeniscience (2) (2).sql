-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 10 mai 2018 à 18:38
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `homeniscience`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnement`
--

DROP TABLE IF EXISTS `abonnement`;
CREATE TABLE IF NOT EXISTS `abonnement` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_domicile` int(11) NOT NULL,
  `ID_utilisateur` int(11) NOT NULL,
  `nom_abonne` varchar(50) NOT NULL,
  `date_acquisition` date NOT NULL,
  `date_expiration` date NOT NULL,
  `duree_abonnement` int(11) NOT NULL,
  `ID_type_abonnement` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `abonnement`
--

INSERT INTO `abonnement` (`ID`, `ID_domicile`, `ID_utilisateur`, `nom_abonne`, `date_acquisition`, `date_expiration`, `duree_abonnement`, `ID_type_abonnement`) VALUES
(1, 1, 1, 'Martin', '2018-05-07', '2019-05-07', 365, 1),
(2, 2, 2, 'Duval', '2018-05-07', '2019-05-07', 365, 2);

-- --------------------------------------------------------

--
-- Structure de la table `cemac`
--

DROP TABLE IF EXISTS `cemac`;
CREATE TABLE IF NOT EXISTS `cemac` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_piece` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `port` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cemac`
--

INSERT INTO `cemac` (`ID`, `ID_piece`, `nom`, `port`) VALUES
(1, 1, 'cemac1', 80);

-- --------------------------------------------------------

--
-- Structure de la table `cgu_accueil`
--

DROP TABLE IF EXISTS `cgu_accueil`;
CREATE TABLE IF NOT EXISTS `cgu_accueil` (
  `ID` int(11) NOT NULL,
  `ID_type` int(11) NOT NULL,
  `date` date NOT NULL,
  `contenu` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `chat_domisep`
--

DROP TABLE IF EXISTS `chat_domisep`;
CREATE TABLE IF NOT EXISTS `chat_domisep` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_utilisateur_envoi` int(11) NOT NULL,
  `ID_parent` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `contenu` varchar(8000) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `confidentialite`
--

DROP TABLE IF EXISTS `confidentialite`;
CREATE TABLE IF NOT EXISTS `confidentialite` (
  `ID` int(11) NOT NULL,
  `nom_confidentialite` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `domicile`
--

DROP TABLE IF EXISTS `domicile`;
CREATE TABLE IF NOT EXISTS `domicile` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_utilisateur_principal` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `nombre_pieces` int(11) NOT NULL,
  `superficie` int(11) NOT NULL,
  `ID_type_habitation` int(11) NOT NULL,
  `numero_habitation` char(5) NOT NULL,
  `rue` varchar(50) NOT NULL,
  `code_postal` char(5) NOT NULL,
  `pays` varchar(50) NOT NULL,
  `ID_confidentialite` int(11) NOT NULL,
  `ID_gestionnaire` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `domicile`
--

INSERT INTO `domicile` (`ID`, `ID_utilisateur_principal`, `nom`, `nombre_pieces`, `superficie`, `ID_type_habitation`, `numero_habitation`, `rue`, `code_postal`, `pays`, `ID_confidentialite`, `ID_gestionnaire`) VALUES
(1, 1, 'Domicile 1', 2, 200, 1, '1', 'rue du Faubourg Saint Honoré', '75008', 'Paris', 1, 1),
(2, 2, 'mon Domicile', 3, 600, 2, '5', 'rue Félix Faure', '75015', 'France', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

DROP TABLE IF EXISTS `equipement`;
CREATE TABLE IF NOT EXISTS `equipement` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_piece` int(11) NOT NULL,
  `ID_domicile` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `ID_type_equipement` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `equipement`
--

INSERT INTO `equipement` (`ID`, `ID_piece`, `ID_domicile`, `nom`, `ID_type_equipement`) VALUES
(1, 1, 1, 'capteur luminosité', 1),
(2, 3, 2, 'luminosité chambre enfant', 2);

-- --------------------------------------------------------

--
-- Structure de la table `forum_interne`
--

DROP TABLE IF EXISTS `forum_interne`;
CREATE TABLE IF NOT EXISTS `forum_interne` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_domicile` int(11) NOT NULL,
  `ID_utilisateur_envoi` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `contenu` varchar(8000) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `gestionnaire`
--

DROP TABLE IF EXISTS `gestionnaire`;
CREATE TABLE IF NOT EXISTS `gestionnaire` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `gestionnaire` int(11) NOT NULL,
  `ID_domicile` int(11) NOT NULL,
  `ID_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gestionnaire`
--

INSERT INTO `gestionnaire` (`ID`, `gestionnaire`, `ID_domicile`, `ID_utilisateur`) VALUES
(1, 1, 0, 1),
(2, 0, 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

DROP TABLE IF EXISTS `langue`;
CREATE TABLE IF NOT EXISTS `langue` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom_langue` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `mode_paiement`
--

DROP TABLE IF EXISTS `mode_paiement`;
CREATE TABLE IF NOT EXISTS `mode_paiement` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom_paiement` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `panne`
--

DROP TABLE IF EXISTS `panne`;
CREATE TABLE IF NOT EXISTS `panne` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_equipement` int(11) NOT NULL,
  `ID_type_statut` int(11) NOT NULL,
  `date_panne` date NOT NULL,
  `date_intervention` date NOT NULL,
  `descriptif_panne` varchar(8000) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panne`
--

INSERT INTO `panne` (`ID`, `ID_equipement`, `ID_type_statut`, `date_panne`, `date_intervention`, `descriptif_panne`) VALUES
(1, 1, 0, '2018-04-13', '2020-01-31', 'ne marche plus'),
(2, 2, 0, '2018-05-07', '2018-05-07', 'probleme capteur');

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

DROP TABLE IF EXISTS `piece`;
CREATE TABLE IF NOT EXISTS `piece` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_domicile` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `nombre_capteurs` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `piece`
--

INSERT INTO `piece` (`ID`, `ID_domicile`, `nom`, `nombre_capteurs`) VALUES
(1, 1, 'chambre', 1),
(2, 1, 'cuisine', 2),
(3, 2, 'chambre enfant', 2),
(4, 2, 'chambre parents', 3);

-- --------------------------------------------------------

--
-- Structure de la table `statistiques`
--

DROP TABLE IF EXISTS `statistiques`;
CREATE TABLE IF NOT EXISTS `statistiques` (
  `ID` int(11) NOT NULL,
  `ID_equipement` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `donnee` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom_theme` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_abonnement`
--

DROP TABLE IF EXISTS `type_abonnement`;
CREATE TABLE IF NOT EXISTS `type_abonnement` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom_type` varchar(8000) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_abonnement`
--

INSERT INTO `type_abonnement` (`ID`, `nom_type`) VALUES
(1, 'standard'),
(2, 'premium');

-- --------------------------------------------------------

--
-- Structure de la table `type_cgu_accueil`
--

DROP TABLE IF EXISTS `type_cgu_accueil`;
CREATE TABLE IF NOT EXISTS `type_cgu_accueil` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom_type` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_equipement`
--

DROP TABLE IF EXISTS `type_equipement`;
CREATE TABLE IF NOT EXISTS `type_equipement` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom_type` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_equipement`
--

INSERT INTO `type_equipement` (`ID`, `nom_type`) VALUES
(1, 'humidité'),
(2, 'luminosité'),
(3, 'présence'),
(4, 'température');

-- --------------------------------------------------------

--
-- Structure de la table `type_habitation`
--

DROP TABLE IF EXISTS `type_habitation`;
CREATE TABLE IF NOT EXISTS `type_habitation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom_type` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_habitation`
--

INSERT INTO `type_habitation` (`ID`, `nom_type`) VALUES
(1, 'appartement'),
(2, 'maison');

-- --------------------------------------------------------

--
-- Structure de la table `type_statut`
--

DROP TABLE IF EXISTS `type_statut`;
CREATE TABLE IF NOT EXISTS `type_statut` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom_type` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_statut`
--

INSERT INTO `type_statut` (`ID`, `nom_type`) VALUES
(0, 'en attente'),
(1, 'terminé');

-- --------------------------------------------------------

--
-- Structure de la table `type_utilisateur`
--

DROP TABLE IF EXISTS `type_utilisateur`;
CREATE TABLE IF NOT EXISTS `type_utilisateur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom_type` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_utilisateur`
--

INSERT INTO `type_utilisateur` (`ID`, `nom_type`) VALUES
(1, 'standard'),
(2, 'principal');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_domicile` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mot_de_passe` varchar(60) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `numero_fixe` varchar(50) NOT NULL,
  `numero_mobile` varchar(50) NOT NULL,
  `ID_type_utilisateur` int(11) NOT NULL,
  `ID_langue` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `ID_theme` int(11) NOT NULL,
  `ID_mode_paiement` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID`, `ID_domicile`, `email`, `mot_de_passe`, `nom`, `prenom`, `adresse`, `numero_fixe`, `numero_mobile`, `ID_type_utilisateur`, `ID_langue`, `image`, `ID_theme`, `ID_mode_paiement`) VALUES
(1, 0, 'email@email.com', '$2j6OjIPo8Hl2', 'Martin', 'Jean', '1 rue du Faubourg Saint Honoré 75008 Paris', '0100000000', '0600000000', 2, 1, '', 1, 1),
(2, 0, 'email2@email.com', '$2y$10$tM58QfTRzpHdEV2QPRdvJemrfF3drwLxvIrsotiHm1iE6bLvUC66W', 'Dupond', 'Pierre', '', '', '', 2, 1, '', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
