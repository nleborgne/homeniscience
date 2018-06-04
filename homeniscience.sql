-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 07 Mai 2018 à 22:25
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `abonnement` (
  `ID` int(11) NOT NULL,
  `ID_domicile` int(11) NOT NULL,
  `ID_utilisateur` int(11) NOT NULL,
  `nom_abonne` varchar(50) NOT NULL,
  `date_acquisition` date NOT NULL,
  `date_expiration` date NOT NULL,
  `duree_abonnement` int(11) NOT NULL,
  `ID_type_abonnement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `abonnement`
--

INSERT INTO `abonnement` (`ID`, `ID_domicile`, `ID_utilisateur`, `nom_abonne`, `date_acquisition`, `date_expiration`, `duree_abonnement`, `ID_type_abonnement`) VALUES
(1, 1, 1, 'Martin', '2018-05-07', '2019-05-07', 365, 1),
(2, 2, 2, 'Duval', '2018-05-07', '2019-05-07', 365, 2);

-- --------------------------------------------------------

--
-- Structure de la table `cemac`
--

CREATE TABLE `cemac` (
  `ID` int(11) NOT NULL,
  `ID_piece` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `port` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cemac`
--

INSERT INTO `cemac` (`ID`, `ID_piece`, `nom`, `port`) VALUES
(1, 1, 'cemac1', 80);

-- --------------------------------------------------------

--
-- Structure de la table `cgu_accueil`
--

CREATE TABLE `cgu_accueil` (
  `ID` int(11) NOT NULL,
  `ID_type` int(11) NOT NULL,
  `date` date NOT NULL,
  `contenu` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `chat_domisep`
--

CREATE TABLE `chat_domisep` (
  `ID` int(11) NOT NULL,
  `ID_utilisateur_envoi` int(11) NOT NULL,
  `ID_parent` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `contenu` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `confidentialite`
--

CREATE TABLE `confidentialite` (
  `ID` int(11) NOT NULL,
  `nom_confidentialite` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `domicile`
--

CREATE TABLE `domicile` (
  `ID` int(11) NOT NULL,
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
  `ID_gestionnaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `domicile`
--

INSERT INTO `domicile` (`ID`, `ID_utilisateur_principal`, `nom`, `nombre_pieces`, `superficie`, `ID_type_habitation`, `numero_habitation`, `rue`, `code_postal`, `pays`, `ID_confidentialite`, `ID_gestionnaire`) VALUES
(1, 1, 'Domicile 1', 2, 200, 1, '1', 'rue du Faubourg Saint Honoré', '75008', 'Paris', 1, 1),
(2, 2, 'mon Domicile', 3, 600, 2, '5', 'rue Félix Faure', '75015', 'France', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

CREATE TABLE `equipement` (
  `ID` int(11) NOT NULL,
  `ID_piece` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `ID_type_equipement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `equipement`
--

INSERT INTO `equipement` (`ID`, `ID_piece`, `nom`, `ID_type_equipement`) VALUES
(1, 1, 'capteur luminosité', 1),
(2, 3, 'luminosité chambre enfant', 2);

-- --------------------------------------------------------

--
-- Structure de la table `forum_interne`
--

CREATE TABLE `forum_interne` (
  `ID` int(11) NOT NULL,
  `ID_domicile` int(11) NOT NULL,
  `ID_utilisateur_envoi` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `contenu` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `gestionnaire`
--

CREATE TABLE `gestionnaire` (
  `ID` int(11) NOT NULL,
  `gestionnaire` int(11) NOT NULL,
  `ID_domicile` int(11) NOT NULL,
  `ID_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

CREATE TABLE `langue` (
  `ID` int(11) NOT NULL,
  `nom_langue` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `mode_paiement`
--

CREATE TABLE `mode_paiement` (
  `ID` int(11) NOT NULL,
  `nom_paiement` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `panne`
--

CREATE TABLE `panne` (
  `ID` int(11) NOT NULL,
  `ID_equipement` int(11) NOT NULL,
  `ID_type_statut` int(11) NOT NULL,
  `date_panne` date NOT NULL,
  `date_intervention` date NOT NULL,
  `descriptif_panne` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `panne`
--

INSERT INTO `panne` (`ID`, `ID_equipement`, `ID_type_statut`, `date_panne`, `date_intervention`, `descriptif_panne`) VALUES
(1, 1, 0, '2018-04-13', '2020-01-31', 'ne marche plus'),
(2, 2, 0, '2018-05-07', '2018-05-07', 'probleme capteur');

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE `piece` (
  `ID` int(11) NOT NULL,
  `ID_domicile` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `nombre_capteurs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `piece`
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

CREATE TABLE `statistiques` (
  `ID` int(11) NOT NULL,
  `ID_equipement` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `donnee` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE `theme` (
  `ID` int(11) NOT NULL,
  `nom_theme` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_abonnement`
--

CREATE TABLE `type_abonnement` (
  `ID` int(11) NOT NULL,
  `nom_type` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_abonnement`
--

INSERT INTO `type_abonnement` (`ID`, `nom_type`) VALUES
(1, 'standard'),
(2, 'premium');

-- --------------------------------------------------------

--
-- Structure de la table `type_cgu_accueil`
--

CREATE TABLE `type_cgu_accueil` (
  `ID` int(11) NOT NULL,
  `nom_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_equipement`
--

CREATE TABLE `type_equipement` (
  `ID` int(11) NOT NULL,
  `nom_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_equipement`
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

CREATE TABLE `type_habitation` (
  `ID` int(11) NOT NULL,
  `nom_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_habitation`
--

INSERT INTO `type_habitation` (`ID`, `nom_type`) VALUES
(1, 'appartement'),
(2, 'maison');

-- --------------------------------------------------------

--
-- Structure de la table `type_statut`
--

CREATE TABLE `type_statut` (
  `ID` int(11) NOT NULL,
  `nom_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_statut`
--

INSERT INTO `type_statut` (`ID`, `nom_type`) VALUES
(0, 'en attente'),
(1, 'terminé');

-- --------------------------------------------------------

--
-- Structure de la table `type_utilisateur`
--

CREATE TABLE `type_utilisateur` (
  `ID` int(11) NOT NULL,
  `nom_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_utilisateur`
--

INSERT INTO `type_utilisateur` (`ID`, `nom_type`) VALUES
(1, 'standard'),
(2, 'principal');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID` int(11) NOT NULL,
  `ID_domicile` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `numero_fixe` varchar(50) NOT NULL,
  `numero_mobile` varchar(50) NOT NULL,
  `ID_type_utilisateur` int(11) NOT NULL,
  `ID_langue` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `ID_theme` int(11) NOT NULL,
  `ID_mode_paiement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID`, `ID_domicile`, `email`, `mot_de_passe`, `nom`, `prenom`, `adresse`, `numero_fixe`, `numero_mobile`, `ID_type_utilisateur`, `ID_langue`, `image`, `ID_theme`, `ID_mode_paiement`) VALUES
(1, 0, 'email@email.com', 'motdepasse', 'Martin', 'Jean', '1 rue du Faubourg Saint Honoré 75008 Paris', '0100000000', '0600000000', 2, 1, '', 1, 1),
(2, 0, 'jean@email.com', 'test', 'Duval', 'Marie', '182 rue Félix Faure 75015 Paris', '010000000000', '060000000000', 1, 1, '', 1, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `abonnement`
--
ALTER TABLE `abonnement`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `cemac`
--
ALTER TABLE `cemac`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `chat_domisep`
--
ALTER TABLE `chat_domisep`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `domicile`
--
ALTER TABLE `domicile`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `forum_interne`
--
ALTER TABLE `forum_interne`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `langue`
--
ALTER TABLE `langue`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `mode_paiement`
--
ALTER TABLE `mode_paiement`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `panne`
--
ALTER TABLE `panne`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `type_abonnement`
--
ALTER TABLE `type_abonnement`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `type_cgu_accueil`
--
ALTER TABLE `type_cgu_accueil`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `type_equipement`
--
ALTER TABLE `type_equipement`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `type_habitation`
--
ALTER TABLE `type_habitation`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `type_statut`
--
ALTER TABLE `type_statut`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `type_utilisateur`
--
ALTER TABLE `type_utilisateur`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `abonnement`
--
ALTER TABLE `abonnement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `cemac`
--
ALTER TABLE `cemac`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `chat_domisep`
--
ALTER TABLE `chat_domisep`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `domicile`
--
ALTER TABLE `domicile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `forum_interne`
--
ALTER TABLE `forum_interne`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `langue`
--
ALTER TABLE `langue`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `mode_paiement`
--
ALTER TABLE `mode_paiement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `panne`
--
ALTER TABLE `panne`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `theme`
--
ALTER TABLE `theme`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type_abonnement`
--
ALTER TABLE `type_abonnement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `type_cgu_accueil`
--
ALTER TABLE `type_cgu_accueil`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type_equipement`
--
ALTER TABLE `type_equipement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `type_habitation`
--
ALTER TABLE `type_habitation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `type_statut`
--
ALTER TABLE `type_statut`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `type_utilisateur`
--
ALTER TABLE `type_utilisateur`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
