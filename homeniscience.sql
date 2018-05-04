-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 25 Avril 2018 à 15:57
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
  `ID_confidentialite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

CREATE TABLE `equipement` (
  `ID` int(11) NOT NULL,
  `ID_piece` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `ID_type_equipement` int(11) NOT NULL,
  `consommation` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Structure de la table `type_habitation`
--

CREATE TABLE `type_habitation` (
  `ID` int(11) NOT NULL,
  `nom_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_statut`
--

CREATE TABLE `type_statut` (
  `ID` int(11) NOT NULL,
  `nom_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_utilisateur`
--

CREATE TABLE `type_utilisateur` (
  `ID` int(11) NOT NULL,
  `nom_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `ID_type_abonnement` int(11) NOT NULL,
  `ID_langue` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `ID_theme` int(11) NOT NULL,
  `ID_mode_paiement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Index pour la table `theme`
--
ALTER TABLE `theme`
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `cemac`
--
ALTER TABLE `cemac`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `chat_domisep`
--
ALTER TABLE `chat_domisep`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `domicile`
--
ALTER TABLE `domicile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `theme`
--
ALTER TABLE `theme`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type_cgu_accueil`
--
ALTER TABLE `type_cgu_accueil`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type_equipement`
--
ALTER TABLE `type_equipement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type_habitation`
--
ALTER TABLE `type_habitation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type_statut`
--
ALTER TABLE `type_statut`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type_utilisateur`
--
ALTER TABLE `type_utilisateur`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
