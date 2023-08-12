-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 12 août 2023 à 11:20
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mon_formulaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `emailperso` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) NOT NULL,
  `problemetype` varchar(50) DEFAULT NULL,
  `materiel` varchar(50) DEFAULT NULL,
  `id_i_city` varchar(50) DEFAULT NULL,
  `local` varchar(100) DEFAULT NULL,
  `degre_urgence` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `objet` varchar(100) DEFAULT NULL,
  `statut` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `numero_ticket_i_city` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`id`, `email`, `emailperso`, `telephone`, `problemetype`, `materiel`, `id_i_city`, `local`, `degre_urgence`, `description`, `objet`, `statut`, `date`, `numero_ticket_i_city`) VALUES
(1, 'najibdbs@he-ferrer.eu', 'koko@gmail.com', '02/542467', 'Logiciel', '1', NULL, 'PM104', 4, ' cvfxbdf', '', 'Nouveau', '2023-08-09 21:48:31', ''),
(2, 'najibdbs@he-ferrer.eu', 'koko@gmail.com', '02/542467', 'Materiel', '2', NULL, 'PM104', 5, ' cdfd', '', 'Nouveau', '2023-08-09 22:01:16', ''),
(3, 'najibdbs@he-ferrer.eu', 'koko@gmail.com', '02/542467', 'Logiciel', '2', NULL, 'PM303', 3, ' tfgfghtf', '', 'Nouveau', '2023-08-10 12:55:22', ''),
(4, 'najibdbs@he-ferrer.eu', 'koko@gmail.com', '02/542467', 'Logiciel', '2', NULL, 'TN701', 3, ' gros problème du batiment', '', 'Nouveau', '2023-08-10 13:17:31', ''),
(5, 'najibdbs@he-ferrer.eu', 'koko@gmail.com', '02/542467', 'Materiel', '3', NULL, 'PM104', 3, 'ygiyuiyui', '', 'Nouveau', '2023-08-10 13:56:33', ''),
(6, 'najibdbs@he-ferrer.eu', 'koko@gmail.com', '02/542467', 'Logiciel', '2', NULL, 'PM104', 2, 'fgrfdgf', '', 'Nouveau', '2023-08-10 14:00:29', ''),
(7, 'najibdbs@he-ferrer.eu', 'koko@gmail.com', '02/542467', 'Logiciel', '1', NULL, 'PM104', 2, ' ghhf', '', 'Nouveau', '2023-08-10 14:00:50', ''),
(8, 'najibdbs@he-ferrer.eu', 'koko@gmail.com', '02/542467', 'Materiel', '2', NULL, 'PM104', 1, 'gdsgsgs', '', 'Nouveau', '2023-08-10 14:02:58', ''),
(9, 'najibdbs@he-ferrer.eu', 'koko@gmail.com', '02/542467', 'Materiel', '3', NULL, 'PM104', 1, 'je suis foutu ', '', 'Nouveau', '2023-08-11 11:32:08', ''),
(10, 'najibdbs@he-ferrer.eu', 'koko@gmail.com', '02/542467', 'Materiel', '2', NULL, 'PM104', 3, ' écran pété ', '', 'Nouveau', '2023-08-11 11:58:44', ''),
(11, 'najibdbs@he-ferrer.eu', 'koko@gmail.com', '02/542467', 'Materiel', '2', NULL, 'PM104', 4, ' thhth', '', 'Nouveau', '2023-08-11 12:16:14', ''),
(12, 'najibdbs@he-ferrer.eu', 'koko@gmail.com', '02/542467', 'Materiel', '2', NULL, 'PM104', 3, 'dtyrey', '', 'Nouveau', '2023-08-11 12:16:58', ''),
(13, 'najibdbs@he-ferrer.eu', 'koko@gmail.com', '02/542467', 'Materiel', '2', NULL, 'PM104', 3, ' dfgf', '', 'Nouveau', '2023-08-11 12:17:57', ''),
(14, 'najibdbs@he-ferrer.eu', 'koko@gmail.com', '02/542467', 'Logiciel', '1', NULL, 'PM104', 3, ' ere', '', 'Nouveau', '2023-08-11 12:18:39', ''),
(15, 'najib.boukhari@he-ferrer.eu', 'najib.boukhari@he-ferrer.eu', '+3222795752', 'Materiel', '3', NULL, 'PM104', 3, ' hhj', NULL, NULL, NULL, NULL),
(16, 'heffg2i@he-ferrer.eu', 'larochedunord@gmail.com', '02/55541445', 'Materiel', '3', NULL, 'TN701', 3, ' projecteur en panne', NULL, NULL, NULL, NULL),
(17, 'miloude-dh@he-ferrer.eu', 'nonparpourmoi@gmail.com', '024745', 'Logiciel', '1', NULL, 'PM104', 3, ' connexion adobe impossible', NULL, NULL, NULL, NULL),
(19, 'jean-delanoix@he-ferrer.eu', 'cacapower@gmail.com', '+3222795752', 'Materiel', '3', NULL, 'A07', 4, ' eztzetzet', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `locaux`
--

CREATE TABLE `locaux` (
  `id` int(11) NOT NULL,
  `nom_local` varchar(255) DEFAULT NULL,
  `id_site` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `locaux`
--

INSERT INTO `locaux` (`id`, `nom_local`, `id_site`) VALUES
(1, 'PM104', 1),
(2, 'PM206', 1),
(3, 'PM303', 1),
(4, 'TN701', 2),
(5, 'TN623', 2),
(6, 'TN515', 2),
(7, 'A07', 3),
(8, 'A08', 3),
(9, 'A112', 3),
(10, 'Dinant', 4),
(11, 'Edith Cavel', 4),
(12, 'Chaptal', 4),
(13, '1.1.05', 5),
(14, '2.1.04', 5),
(15, 'Secrétariat Peda', 5);

-- --------------------------------------------------------

--
-- Structure de la table `logiciels`
--

CREATE TABLE `logiciels` (
  `id_logiciel` int(11) NOT NULL,
  `nom_logiciel` varchar(255) NOT NULL,
  `id_probleme` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `logiciels`
--

INSERT INTO `logiciels` (`id_logiciel`, `nom_logiciel`, `id_probleme`) VALUES
(1, 'Connexion à icampus ou office 365', 2),
(2, 'Connexion à Adobe', 2);

-- --------------------------------------------------------

--
-- Structure de la table `materiels`
--

CREATE TABLE `materiels` (
  `id_materiel` int(11) NOT NULL,
  `nom_materiel` varchar(255) NOT NULL,
  `id_probleme` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `materiels`
--

INSERT INTO `materiels` (`id_materiel`, `nom_materiel`, `id_probleme`) VALUES
(1, 'Ordinateur', 1),
(2, 'Écran', 1),
(3, 'Projecteur', 1),
(4, 'Imprimante', 1),
(5, 'Tablette', 1);

-- --------------------------------------------------------

--
-- Structure de la table `problemes`
--

CREATE TABLE `problemes` (
  `id_probleme` int(11) NOT NULL,
  `nom_probleme` varchar(255) NOT NULL,
  `type_probleme` enum('Materiel','Logiciel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `problemes`
--

INSERT INTO `problemes` (`id_probleme`, `nom_probleme`, `type_probleme`) VALUES
(1, 'Problème matériel', 'Materiel'),
(2, 'Problème logiciel', 'Logiciel');

-- --------------------------------------------------------

--
-- Structure de la table `sites`
--

CREATE TABLE `sites` (
  `id` int(11) NOT NULL,
  `nom_site` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sites`
--

INSERT INTO `sites` (`id`, `nom_site`) VALUES
(1, 'Palais du Midi'),
(2, 'Terre_Neuve'),
(3, 'Anneessens'),
(4, 'Brugman'),
(5, 'Charles Buls');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `mot_de_passe`) VALUES
(1, 'superadmin', 'aDmin@2024');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `locaux`
--
ALTER TABLE `locaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_site` (`id_site`);

--
-- Index pour la table `logiciels`
--
ALTER TABLE `logiciels`
  ADD PRIMARY KEY (`id_logiciel`),
  ADD KEY `id_probleme` (`id_probleme`);

--
-- Index pour la table `materiels`
--
ALTER TABLE `materiels`
  ADD PRIMARY KEY (`id_materiel`),
  ADD KEY `id_probleme` (`id_probleme`);

--
-- Index pour la table `problemes`
--
ALTER TABLE `problemes`
  ADD PRIMARY KEY (`id_probleme`);

--
-- Index pour la table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `logiciels`
--
ALTER TABLE `logiciels`
  MODIFY `id_logiciel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `materiels`
--
ALTER TABLE `materiels`
  MODIFY `id_materiel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `problemes`
--
ALTER TABLE `problemes`
  MODIFY `id_probleme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `locaux`
--
ALTER TABLE `locaux`
  ADD CONSTRAINT `locaux_ibfk_1` FOREIGN KEY (`id_site`) REFERENCES `sites` (`id`);

--
-- Contraintes pour la table `logiciels`
--
ALTER TABLE `logiciels`
  ADD CONSTRAINT `logiciels_ibfk_1` FOREIGN KEY (`id_probleme`) REFERENCES `problemes` (`id_probleme`);

--
-- Contraintes pour la table `materiels`
--
ALTER TABLE `materiels`
  ADD CONSTRAINT `materiels_ibfk_1` FOREIGN KEY (`id_probleme`) REFERENCES `problemes` (`id_probleme`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
