-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 06, 2021 at 07:11 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nom_base_de_donnees`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `adresse` varchar(40) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `région` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telephone` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`adresse`, `ville`, `région`, `telephone`, `id_utilisateur`) VALUES
('Dakar thiaroye', 'Ziguinchor', 'Ziguinchor', 781808391, 8);

-- --------------------------------------------------------

--
-- Table structure for table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `id_incription` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `etat` enum('En attente','Validé','Refusé','Suspendu','Archivé') NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_incription`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inscription`
--

INSERT INTO `inscription` (`id_incription`, `date`, `etat`, `id_utilisateur`) VALUES
(2, '0000-00-00', 'Validé', 6),
(3, '0000-00-00', 'Validé', 9),
(4, '0000-00-00', 'Validé', 11),
(5, '0000-00-00', 'Validé', 12),
(6, '2021-02-06', 'En attente', 13),
(7, '2021-02-06', 'Validé', 15);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  `description` varchar(150) NOT NULL,
  `categorie` enum('Agroalimentaire','Artisanat','Cosmétique','Autre') NOT NULL,
  `sous_categorie` varchar(40) NOT NULL,
  `nom_dossier_images` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `quantite` int(11) NOT NULL,
  `etat` enum('Disponible','Epuisé','En rupture de stock','Archivé') NOT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom`, `description`, `categorie`, `sous_categorie`, `nom_dossier_images`, `quantite`, `etat`) VALUES
(12, 'Legumes conf', 'Legumes 100% senegalais', 'Agroalimentaire', 'Légumes', '/ecom/uploads/images/amadoungam/12/', 10, 'Disponible'),
(11, 'Huile baobab', 'Huile de baobab tres bon 0% de choresterol', 'Agroalimentaire', 'Huile', '/ecom/uploads/images/amadoungam/11/', 15, 'Disponible'),
(10, 'Chaussure pour etudiant', 'Chaussure de très bonne qualité et de couleur Maron', 'Artisanat', 'Chaussures', '/ecom/uploads/images/amadoungam/10/', 12, 'Disponible'),
(9, 'Araw', 'C tres bon', 'Agroalimentaire', 'Céréales', '/ecom/uploads/images/amadoungam/1/', 40, 'Disponible'),
(13, 'Confitures', 'Tres bon 100% naturel', 'Agroalimentaire', 'Fruits', '/ecom/uploads/images/amadoungam/13/', 15, 'Disponible'),
(14, 'Cosmetique pour corps', 'beauté 100%', 'Cosmétique', 'Pour corps', '/ecom/uploads/images/amadoungam/14/', 10, 'Disponible'),
(15, 'Sac en cuire', 'Sac 100% en cuire', 'Artisanat', 'Sac', '/ecom/uploads/images/amadoungam/15/', 10, 'Disponible'),
(16, 'Statuette homme', 'Statuette', 'Artisanat', 'Statuette', '/ecom/uploads/images/amadoungam/16/', 3, 'Disponible'),
(17, 'Habits africain', 'Habits 100% africain', 'Artisanat', 'Habits', '/ecom/uploads/images/amadoungam/17/', 15, 'Disponible'),
(18, 'Lait de beauté', 'Lait de beauté 1005 naturel', 'Cosmétique', 'Pour corps', '/ecom/uploads/images/amadoungam/18/', 14, 'Disponible'),
(19, 'Nappe traditionnel', 'Tres jolie', 'Artisanat', 'Nappes', '/ecom/uploads/images/amadoungam/19/', 14, 'Disponible'),
(20, 'teint', 'sdfgh', 'Agroalimentaire', 'cereale', '/ecom/uploads/images/dior/20/', 4, 'Disponible'),
(21, 'Arraw', 'Bonne Qualite', 'Agroalimentaire', 'cereale', '/ecom/uploads/images/dior/21/', 5, 'Disponible'),
(22, 'Gofio', 'Bonne Qualite et durable', 'Agroalimentaire', 'cereale', '/ecom/uploads/images/dior/22/', 15, 'Disponible'),
(23, 'Thierre', 'Bon Thiere du saloum', 'Agroalimentaire', 'cereale', '/ecom/uploads/images/dior/23/', 45, 'Disponible'),
(24, 'Gomme', 'Bonne qualite de gomme ', 'Agroalimentaire', 'cereale', '/ecom/uploads/images/dior/24/', 5, 'Disponible'),
(25, 'Farine', 'poudre de farine tres bonne qualite', 'Agroalimentaire', 'cereale', '/ecom/uploads/images/dior/25/', 5, 'Disponible'),
(26, 'Fonio exporte', 'Fonio exporte du mali\r\n', 'Agroalimentaire', 'cereale', '/ecom/uploads/images/dior/26/', 5, 'Disponible'),
(27, 'Thiakry', 'Thiakry du Nord', 'Agroalimentaire', 'cereale', '/ecom/uploads/images/dior/27/', 4, 'Disponible'),
(28, 'Jus De Fruits Tamarin', 'Delicieux, et de bonne qualite', 'Agroalimentaire', 'fruit', '/ecom/uploads/images/dior/28/', 5, 'Disponible'),
(29, 'Jus de fruit Varie', 'Variete de jus\r\n', 'Agroalimentaire', 'fruit', '/ecom/uploads/images/dior/29/', 12, 'Disponible'),
(30, 'Jus de fruit ', 'Bonne qualite', 'Agroalimentaire', 'fruit', '/ecom/uploads/images/dior/30/', 50, 'Disponible'),
(31, 'jus de cajou', 'Provenance de la casamance', 'Agroalimentaire', 'fruit', '/ecom/uploads/images/dior/31/', 15, 'Disponible'),
(32, 'Jus de baobab', 'Jus de baobab. Bonne Concentration\r\n', 'Agroalimentaire', 'fruit', '/ecom/uploads/images/dior/32/', 5, 'Epuisé'),
(33, 'Pack legumes', 'Presence de tous les legumes necessaires', 'Agroalimentaire', 'legume', '/ecom/uploads/images/dior/33/', 6, 'Disponible'),
(34, 'legume ', 'Legume specifique', 'Agroalimentaire', 'legume', '/ecom/uploads/images/dior/34/', 10, 'Disponible'),
(35, 'Confiture', 'Pour vos ingredients', 'Agroalimentaire', 'fruit', '/ecom/uploads/images/dior/35/', 7, 'Disponible'),
(36, 'Pot de confiture', 'Des Pots de Confitures tres delicieux', 'Agroalimentaire', 'legume', '/ecom/uploads/images/dior/36/', 15, 'Disponible'),
(37, 'Legume Frais', 'Paque de legumes frais pour vos ceremonies', 'Agroalimentaire', 'legume', '/ecom/uploads/images/dior/37/', 15, 'Disponible'),
(38, 'Huile de palme ', 'Provenance de la casamance', 'Agroalimentaire', 'huile', '/ecom/uploads/images/dior/38/', 6, 'Disponible'),
(39, 'huile de baobab', 'huile de baobab pour vos soins', 'Agroalimentaire', 'huile', '/ecom/uploads/images/dior/39/', 27, 'Disponible'),
(40, 'Huile de palme ', 'Bonne Qualite', 'Agroalimentaire', 'huile', '/ecom/uploads/images/dior/40/', 5, 'Disponible'),
(41, 'Huile de Myrrhe', 'Bonne qualite', 'Agroalimentaire', 'huile', '/ecom/uploads/images/dior/41/', 5, 'Disponible'),
(42, 'huile de ricin', 'Ricin', 'Agroalimentaire', 'huile', '/ecom/uploads/images/dior/42/', 5, 'Disponible'),
(43, 'Miel', 'Miel pour vos besoins\r\n', 'Agroalimentaire', 'autre', '/ecom/uploads/images/dior/43/', 5, 'Disponible'),
(44, 'Pot de miel', 'Miel pur', 'Agroalimentaire', 'autre', '/ecom/uploads/images/dior/44/', 16, 'Disponible'),
(45, 'Chaussure de Ngaye', 'Tres durable', 'Artisanat', 'chaussure', '/ecom/uploads/images/dior/45/', 15, 'Disponible'),
(46, 'Chaussure de femme ', 'Chaussure de classe\r\n', 'Artisanat', 'chaussure', '/ecom/uploads/images/dior/46/', 14, 'Disponible'),
(47, 'Chaussure de femme ', 'Classe', 'Artisanat', 'chaussure', '/ecom/uploads/images/dior/47/', 11, 'Disponible'),
(48, 'Chaussure traditionnel', 'purement traditionnel', 'Artisanat', 'chaussure', '/ecom/uploads/images/dior/48/', 10, 'Disponible'),
(49, 'chaussure pour homme', 'bbbb', 'Artisanat', 'chaussure', '/ecom/uploads/images/dior/49/', 7, 'Disponible'),
(50, 'Boubou traditionnel', 'Pour homme', 'Artisanat', 'habit', '/ecom/uploads/images/dior/50/', 8, 'Disponible'),
(51, 'Sac traditionnel', 'tres dure', 'Artisanat', 'sac', '/ecom/uploads/images/dior/51/', 17, 'Disponible'),
(52, 'Sac de Voyage', 'Sac a base de wax', 'Artisanat', 'sac', '/ecom/uploads/images/dior/52/', 13, 'Disponible'),
(53, 'Sac ', 'Pour eleves et etudiants', 'Agroalimentaire', 'sac', '/ecom/uploads/images/dior/53/', 12, 'Disponible'),
(54, 'Sac en cuire', 'tres bon cuire', 'Artisanat', 'sac', '/ecom/uploads/images/dior/54/', 5, 'Disponible'),
(55, 'Boubou traditionnel', 'Pour femme ', 'Artisanat', 'habit', '/ecom/uploads/images/dior/55/', 9, 'Disponible'),
(56, 'sac pour femme', 'tres jolie et dure', 'Artisanat', 'sac', '/ecom/uploads/images/dior/56/', 6, 'Disponible'),
(57, 'Sac traditionnel', 'a base de wax', 'Artisanat', 'sac', '/ecom/uploads/images/dior/57/', 9, 'Disponible'),
(58, 'sac pour Homme', 'en cuir', 'Artisanat', 'sac', '/ecom/uploads/images/dior/58/', 7, 'Disponible'),
(59, 'Nappe de table', 'decorative', 'Artisanat', 'nappe', '/ecom/uploads/images/dior/59/', 3, 'Disponible'),
(60, 'nappe Artisanale', 'Boone Qualite', 'Artisanat', 'nappe', '/ecom/uploads/images/dior/60/', 7, 'Disponible'),
(61, 'Nappe de famille', 'tres grande', 'Artisanat', 'nappe', '/ecom/uploads/images/dior/61/', 8, 'Disponible'),
(62, 'Nappe Multicolore', 'Bonne qualite', 'Artisanat', 'nappe', '/ecom/uploads/images/dior/62/', 8, 'Disponible'),
(63, 'Drap double lit', 'Jolie drap et doux', 'Artisanat', 'drap', '/ecom/uploads/images/dior/63/', 9, 'Disponible'),
(64, 'Drap double lit', 'drap decore', 'Artisanat', 'drap', '/ecom/uploads/images/dior/64/', 7, 'Disponible'),
(65, 'Drap', 'drap decore', 'Artisanat', 'drap', '/ecom/uploads/images/dior/65/', 5, 'Disponible'),
(66, 'Drap Double Couleur', 'tres doux', 'Artisanat', 'drap', '/ecom/uploads/images/dior/66/', 8, 'Disponible'),
(67, 'Drap a partie wax', 'wax', 'Artisanat', 'drap', '/ecom/uploads/images/dior/67/', 8, 'Disponible'),
(68, 'Drap', 'motif', 'Artisanat', 'drap', '/ecom/uploads/images/dior/68/', 9, 'Disponible'),
(69, 'Bijou en tissu', 'En base de wax', 'Artisanat', 'bijou', '/ecom/uploads/images/dior/69/', 8, 'Disponible'),
(70, 'Colier', 'tres joie', 'Artisanat', 'bijou', '/ecom/uploads/images/dior/70/', 5, 'Disponible'),
(71, 'Ensemble bijou', 'tres joli a bas prix', 'Artisanat', 'bijou', '/ecom/uploads/images/dior/71/', 6, 'Disponible'),
(72, 'Bijou Traditionnel', 'Bijou tres rare', 'Artisanat', 'bijou', '/ecom/uploads/images/dior/72/', 9, 'Disponible'),
(73, 'bijou artisannal', 'tres artisannal', 'Artisanat', 'bijou', '/ecom/uploads/images/dior/73/', 7, 'Disponible'),
(74, 'Bijou Traditionnel', 'pour marriage', 'Artisanat', 'bijou', '/ecom/uploads/images/dior/74/', 8, 'Disponible'),
(75, 'Bine Bine', 'Plusieurs tailles', 'Artisanat', 'bijou', '/ecom/uploads/images/dior/75/', 8, 'Disponible'),
(76, 'portrait', 'Tres inspire', 'Artisanat', 'tableau', '/ecom/uploads/images/dior/76/', 7, 'Disponible'),
(77, 'portrait feminin', 'tres inspire', 'Artisanat', 'tableau', '/ecom/uploads/images/dior/77/', 8, 'Disponible'),
(78, 'Jeu de couleur', 'Joli', 'Artisanat', 'tableau', '/ecom/uploads/images/dior/78/', 8, 'Disponible'),
(79, 'Lutte senegalaise', 'Illustraryion', 'Artisanat', 'statuette', '/ecom/uploads/images/dior/79/', 7, 'Disponible'),
(80, 'portrait sculte', 'A base de bois', 'Artisanat', 'statuette', '/ecom/uploads/images/dior/80/', 9, 'Disponible'),
(81, 'portrait traditionnel', 'tradition', 'Artisanat', 'statuette', '/ecom/uploads/images/dior/81/', 5, 'Disponible'),
(82, 'GAmme', 'tres efficace', 'Cosmétique', 'pour corps', '/ecom/uploads/images/dior/82/', 7, 'Disponible'),
(83, 'lait de beaute', 'tres efficace', 'Cosmétique', 'pour corps', '/ecom/uploads/images/dior/83/', 7, 'Disponible'),
(84, 'soin de corp', 'pour un corps lisse', 'Cosmétique', 'pour corps', '/ecom/uploads/images/dior/84/', 9, 'Disponible'),
(85, 'Lotion', 'soin de corp', 'Agroalimentaire', 'pour corps', '/ecom/uploads/images/dior/85/', 9, 'Disponible'),
(86, 'lotion de corps', 'soins de corps', 'Cosmétique', 'pour corps', '/ecom/uploads/images/dior/86/', 8, 'Disponible'),
(87, 'gamme de produit', 'tres demande', 'Cosmétique', 'pour corps', '/ecom/uploads/images/dior/87/', 8, 'Disponible'),
(88, 'produit de corps ', 'Corps', 'Cosmétique', 'pour corps', '/ecom/uploads/images/dior/88/', 8, 'Disponible'),
(89, 'Produit de Cheuveux', 'bonne pour les cheuveux', 'Cosmétique', 'pour cheuveux', '/ecom/uploads/images/dior/89/', 4, 'Disponible'),
(90, 'Champoing', 'Bon pour vos cheuveux', 'Agroalimentaire', 'pour cheuveux', '/ecom/uploads/images/dior/90/', 9, 'Disponible'),
(91, 'gamme de produit', 'Produit pour vos cheuveux', 'Cosmétique', 'pour cheuveux', '/ecom/uploads/images/dior/91/', 7, 'Disponible'),
(92, 'soin de cheuveux', 'bonnee qualite', 'Cosmétique', 'pour cheuveux', '/ecom/uploads/images/dior/92/', 8, 'Disponible'),
(97, 'Legume Frais', 'provenanc e sindian', 'Agroalimentaire', 'legume', '/ecom/uploads/images/antashop/97/', 3, 'Disponible'),
(95, 'nouvelle', 'joli', 'Artisanat', 'chaussure', '/ecom/uploads/images/dior/95/', 9, 'Disponible'),
(96, 'Chausure de femme', 'tres dure', 'Artisanat', 'chaussure', '/ecom/uploads/images/ndomi/96/', 5, 'Disponible'),
(98, 'Legume Frais', 'provenanc e sindian', 'Agroalimentaire', 'legume', '/ecom/uploads/images/antashop/98/', 3, 'Disponible');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('gestionnaire','vendeur','client','') NOT NULL,
  `prénom` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nom` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `mot_de_passe` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mail` varchar(255) NOT NULL,
  `telephone` int(12) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `type`, `prénom`, `nom`, `login`, `mot_de_passe`, `mail`, `telephone`) VALUES
(8, 'client', 'Real', 'NGAM', 'realngam', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'realngam@gmail.com', 783707285),
(7, 'gestionnaire', 'Balla', 'Gningue', 'balla', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'balla@gmail.com', 78),
(6, 'vendeur', 'Amadou', 'NGAM', 'amadoungam', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'amadoungam18@gmail.com', 783707285),
(9, 'vendeur', 'Balla', 'GNINGUE', 'dior', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'gningue2@gmail.com', 778649904),
(10, 'gestionnaire', 'balla', 'gningue', 'gest', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'bg@gmail.com', 770000000),
(11, 'vendeur', 'lat', 'nd', 'lat', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'nn@gmail.com', 3),
(12, 'vendeur', 'mamdou', 'Ndom', 'ndomi', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'mndom@gmail.com', 778649904),
(13, 'vendeur', 'Balla', 'GNINGUE', 'dio', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'g2@gmail.com', 778649904),
(15, 'vendeur', 'antashop', 'ba', 'antashop', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'antashop@gmail.com', 778649904);

-- --------------------------------------------------------

--
-- Table structure for table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `presentation` varchar(150) NOT NULL,
  `categorie` enum('Entreprise','GIE','Individuel','') NOT NULL,
  `secteur` enum('Agroalimentaire','Artisanat','Cosmétique','Autre') NOT NULL,
  `ninea` varchar(20) NOT NULL,
  `adresse` varchar(40) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendeur`
--

INSERT INTO `vendeur` (`presentation`, `categorie`, `secteur`, `ninea`, `adresse`, `id_utilisateur`) VALUES
('Application mobile de vente en ligne', 'Entreprise', 'Autre', '12548', 'Dakar thiaroye, Ziguinchor', 6),
('dynamique', 'Entreprise', 'Agroalimentaire', '5678', 'Keur massar', 9),
('fghjkl', 'Entreprise', 'Agroalimentaire', '456', 'dfghj', 11),
('dynamique', 'Entreprise', 'Artisanat', '5678', 'Keur massar', 12),
('fdsa', 'Entreprise', 'Agroalimentaire', 'trew', 'hgfd', 13),
('fdsa', 'Entreprise', 'Agroalimentaire', 'trew', 'hgfd', 13),
('fdsa', 'Entreprise', 'Agroalimentaire', 'trew', 'hgfd', 13),
('fdsa', 'Entreprise', 'Agroalimentaire', 'trew', 'hgfd', 13),
('vente de nuisette de dial dialli', 'Individuel', 'Autre', '123456', 'Keur massar', 15);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
