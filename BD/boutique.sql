-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 19 avr. 2022 à 16:25
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `category`, `description`) VALUES
(1, 'Briquets', ''),
(2, 'Briquets jetables', NULL),
(3, 'Zippo', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `note` tinyint(1) NOT NULL,
  `date` datetime NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `title`, `text`, `note`, `date`, `id_user`, `id_product`) VALUES
(7, 'la', 'aa', 2, '2022-03-09 15:02:00', 2, 2),
(8, 'po', 'pooo', 5, '2022-03-09 15:19:00', 2, 2),
(9, 'mp', 'md', 4, '2022-03-09 15:49:00', 2, 2),
(10, 'tototta', 'jadore', 1, '2022-03-09 15:49:00', 2, 2),
(11, '77', 'super', 3, '2022-03-09 16:03:00', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `excl_taxe_price` double(10,2) DEFAULT NULL,
  `vat` int(2) DEFAULT NULL,
  `incl_taxe_price` double(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `payment_state` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_payment_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `excl_taxe_price`, `vat`, `incl_taxe_price`, `date`, `state`, `payment_state`, `id_user`, `id_payment_type`) VALUES
(106, NULL, NULL, 109.00, '2022-03-09', 'En attente de paiement', 'En attente', 2, NULL),
(107, NULL, NULL, 109.00, '2022-03-09', 'En attente de paiement', 'En attente', 2, NULL),
(108, NULL, NULL, 109.00, '2022-03-09', 'En attente de paiement', 'En attente', 2, NULL),
(109, NULL, NULL, 109.00, '2022-03-09', 'En attente de paiement', 'En attente', 2, NULL),
(110, NULL, NULL, 109.00, '2022-03-09', 'En attente de paiement', 'En attente', 2, NULL),
(111, NULL, NULL, 21.80, '2022-03-09', 'En attente de paiement', 'En attente', 2, NULL),
(112, 54.50, 11, 65.40, '2022-03-10', 'Confirmée', 'En attente', 2, NULL),
(113, 39.90, 8, 47.88, '2022-03-10', 'Confirmée', 'En attente', 2, NULL),
(114, 104.20, 21, 125.04, '2022-03-10', 'Confirmée', 'En attente', 2, NULL),
(115, 21.80, 4, 26.16, '2022-03-10', 'Confirmée', 'En attente', 2, NULL),
(116, 19.80, 4, 23.76, '2022-03-10', 'Confirmée', 'En attente', 2, NULL),
(117, 8.90, 2, 10.68, '2022-03-10', 'Confirmée', 'En attente', 2, NULL),
(118, 8.50, 2, 10.20, '2022-03-10', 'Confirmée', 'En attente', 2, NULL),
(119, 15.00, 3, 18.00, '2022-03-10', 'Confirmée', 'En attente', 2, NULL),
(120, 15.00, 3, 18.00, '2022-03-10', 'Confirmée', 'En attente', 2, NULL),
(121, 3.90, 1, 4.68, '2022-03-10', 'Confirmée', 'Payée', 2, NULL),
(122, 39.90, 8, 47.88, '2022-03-10', 'Confirmée', 'Payée', 2, NULL),
(123, 28.70, 6, 34.44, '2022-03-15', 'Confirmée', 'Payée', 2, NULL),
(124, 21.80, 4, 26.16, '2022-03-16', 'Confirmée', 'Payée', 2, NULL),
(125, 8.90, 2, 10.68, '2022-03-23', 'En attente de confirmation', 'En attente', 2, NULL),
(126, 19.80, 4, 23.76, '2022-03-23', 'En attente de confirmation', 'En attente', 2, NULL),
(127, 19.80, 4, 23.76, '2022-03-23', 'En attente de confirmation', 'En attente', 2, NULL),
(128, 19.80, 4, 23.76, '2022-03-23', 'En attente de confirmation', 'En attente', 2, NULL),
(129, 19.80, 4, 23.76, '2022-03-23', 'Confirmée', 'Payée', 2, NULL),
(130, 10.90, 2, 13.08, '2022-03-24', 'Confirmée', 'En attente', 2, NULL),
(131, 8.90, 2, 10.68, '2022-03-24', 'Confirmée', 'Payée', 2, NULL),
(133, 10.90, 2, 13.08, '2022-04-01', 'En attente de confirmation', 'En attente', 2, NULL),
(135, 10.90, 2, 13.08, '2022-04-01', 'En attente de confirmation', 'En attente', 2, NULL),
(136, 21.80, 4, 26.16, '2022-04-01', 'En attente de confirmation', 'En attente', 2, NULL),
(137, 21.80, 4, 26.16, '2022-04-01', 'En attente de confirmation', 'En attente', 2, NULL),
(138, 10.90, 2, 13.08, '2022-04-04', 'Confirmée', 'En attente', 2, NULL),
(139, 10.90, 2, 13.08, '2022-04-05', 'Confirmée', 'Payée', 2, NULL),
(140, 10.90, 2, 13.08, '2022-04-13', 'Confirmée', 'Payée', 2, NULL),
(141, 10.90, 2, 13.08, '2022-04-13', 'Confirmée', 'Payée', 2, NULL),
(142, 10.90, 2, 13.08, '2022-04-13', 'Confirmée', 'Payée', 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `reference` int(10) DEFAULT NULL,
  `introduction` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `material` varchar(25) NOT NULL,
  `colors` varchar(100) NOT NULL,
  `tips` text NOT NULL,
  `packaging` varchar(255) NOT NULL,
  `specificities` text NOT NULL,
  `dimensions` varchar(255) NOT NULL,
  `stock` int(10) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `score` decimal(10,0) DEFAULT NULL,
  `discount` int(2) DEFAULT NULL,
  `discount_available` tinyint(1) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `id_sub_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `title`, `brand`, `reference`, `introduction`, `description`, `material`, `colors`, `tips`, `packaging`, `specificities`, `dimensions`, `stock`, `image1`, `image2`, `image3`, `image4`, `price`, `score`, `discount`, `discount_available`, `id_category`, `id_sub_category`) VALUES
(1, 'Briquet à résistance USB intégré X4 couleurs', 'iLighter', 110000011, 'Ce briquet, très pratique, n\'est pas comme tous les autres briquets. Il ne se recharge ni via du gaz, ni via de l\'essence et est spécifiquement conçu pour allumer ...', '   Ce briquet, très pratique, n\'est pas comme tous les autres briquets. Il ne se recharge ni via du gaz, ni via de l\'essence et est spécifiquement conçu pour allumer des cigarettes. En effet, sa résistance en spirale est parfaite pour allumer en quelques secondes sa cigarette et se recharge via l\'electricité. Vous n\'avez d\'ailleurs pas besoin de câble de recharge puisque la prise USB est intégrée directement dans le briquet. Il suffit simplement de la brancher à un adaptateur secteur ou à une autre prise USB.', 'Métal, Plastique', '1 blanc, 1 gris, 1 champagne, 1 bronze', '   Ne pas exercer une pression trop forte sur le filament.\r\nSouffler régulièrement sur le filament pour éviter l\'accumulation de cendres.\r\nNe jamais essayer de nettoyer le filament à l\'aide d\'un outil.\r\nNe pas utiliser pour allumer des cigares.\r\n', 'Les briquets à résistance USB Intégré vous seront livrés dans leur emballage d\'origine.', '   Type de flamme : filament incandescent\r\nRechargeable : oui\r\nType de recharge : USB (aucun câble nécessaire, USB intégrée directement dans le briquet)\r\nPoids du briquet : 20 g\r\n', '7.8 x 2.3 x 1.2 cm', 50, 'https://i.ibb.co/MC7VCCb/briquet-a-resistance-usb-integre-1.jpg', 'https://i.ibb.co/pwnxrhM/aa-briquet-a-resistance-usb-integre-2.jpg', 'https://i.ibb.co/NtVRY55/aa-briquet-a-resistance-usb-integre-3.jpg', 'https://i.ibb.co/g3fWQvC/aa-briquet-a-resistance-usb-integre-4.jpg', 8.90, '0', 20, 1, 2, 5),
(2, 'Briquet à résistance USB slim X3 couleurs', 'iLighter', 110000012, 'Avec les briquets pour cigarette qui se rechargent via USB (câble fourni), vous n\'aurez aucun problème à allumer votre cigarette même dehors, qu\'il y ait ou non du...', 'Avec les briquets pour cigarette qui se rechargent via USB (câble fourni), vous n\'aurez aucun problème à allumer votre cigarette même dehors, qu\'il y ait ou non du vent. En effet, ce briquet original dispose d\'une résistance. C\'est cette dernière qui viendra allumer l\'extrémité de la cigarette en très peu de temps ! Ultra fin (seulement 8 mm d\'épaisseur) et disponible en plusieurs coloris (au choix), il vous sauvera très souvent la mise !', 'Métal, Plastique', '1 gris, 1 noir, 1 bleu', 'Ne pas exercer une pression trop forte sur le filament.\r\nSouffler régulièrement sur le filament pour éviter l\'accumulation de cendres.\r\nNe jamais essayer de nettoyer le filament à l\'aide d\'un outil.\r\nNe pas utiliser pour allumer des cigares.\r\n', 'Les briquets à résistance USB Slim vous seront livrés dans leur emballage d\'origine.\r\n', 'Type de flamme : filament incandescent\r\nRechargeable : oui\r\nType de recharge : USB (câble fourni)\r\nCouvercle d\'ouverture et de protection\r\nPoids du briquet : 36 g\r\n', '7.8 x 2.3 x 1.2 cm', 90, 'https://i.ibb.co/R3x68nh/briquet-usb-slim-1.jpg', 'https://i.ibb.co/ZdBXv5B/briquet-usb-slim-2.jpg', 'https://i.ibb.co/NVBsjhS/briquet-usb-slim-3.jpg', 'https://i.ibb.co/k9fRw5M/briquet-usb-slim-4.jpg', 10.90, '5', 20, 0, 1, 1),
(3, 'Briquet arc électrique Gentleman X3 couleurs', 'Gentleman', 110000013, 'Les briquets arc électrique Gentleman sont efficaces et simples d\'utilisation. Il suffit de les recharger en les branchant à une prise via un câble USB (fourni) sur un …', 'Les briquets arc électrique Gentleman sont efficaces et simples d\'utilisation. Il suffit de le recharger en le branchant à une prise via un câble USB (fourni) sur un ordinateur ou sur un adaptateur secteur (non fourni). Vous profiterez ainsi de trois briquets électriques avec un double arc électrique grâce à un allumage électronique qu\'il est possible d\'utiliser dans n\'importe quelle condition. ', 'Métal, Plastique', '1 chromé, 1 noir, 1 bleu chromé', 'Briquet arc électrique Gentleman\r\nAllumage électronique\r\nDouble arc électrique\r\nCouvercle d\'ouverture et de protection\r\nBriquet rechargeable via câble USB (inclus)\r\nPoids : 64 g', 'Les briquets arc électrique Gentleman vous seront livrés dans leur emballage d\'origine.', '', '7.5 x 3.6 x 1.3 cm', 36, 'https://i.ibb.co/0GbY8h5/briquet-arc-electrique-gentleman-1.jpg', 'https://i.ibb.co/wNXfsFB/briquet-arc-electrique-gentleman-2.jpg', 'https://i.ibb.co/jVtJRS2/briquet-arc-electrique-gentleman-3.jpg', 'https://i.ibb.co/NmwVkH8/briquet-arc-electrique-gentleman-4.jpg', 10.90, '0', 20, 0, 1, 1),
(4, 'Briquet essence rétro X2', 'iLighter', 120000011, 'Ces briquets essence rappellent le style de briquet des années 20, de style retro ils rappellent les briquets de la marque autrichienne. Son format, tout allongé, et son corps, ...', 'Ces briquets essence rappellent le style de briquet des années 20, de style retro ils rappellent le briquet de la marque autrichienne. Son format, tout allongé, et son corps, entièrement en métal, font de lui un briquet robuste.  Il fonctionne grâce à un allumage à pierre automatique à l\'ouverture, offrant une belle flamme souple. Contrairement à de nombreux autres briquets, ceux-ci se rechargent avec de l\'essence, en vente sur notre site.\r\nIls possèdent une bague permettant de réguler l\'arrivée d\'air et ainsi maîtriser la flamme qu\'il produit.\r\n', 'Métal', '1 chromé, 1 gun', 'Pour allumer le briquet, il suffit d\'ouvrir le clapet\r\nPour recharger le briquet, il suffit de retirer la \"douille\" en tirant sur la partie basse du briquet, puis de la remplir d\'essence ( attention à ne pas faire déborder l\'essence du briquet). Attendez quelques instant savant de replacer la douille dans son encoche. \r\nPour changer la pierre : dévisser la vis en laiton sous le briquet, placer une nouvelle pierre et revisser la vis.\r\n', 'CeS briquet essence old schhool vous seront livrés dans leur emballage d\'origine.', 'Allumage à pierre automatique à l\'ouverture.\r\nFlamme souple.\r\nClapet de fermeture.\r\nBague coulissante pour régler l\'ouverture de l\'entrée d\'air.\r\nVendu vide d\'essence (essence en vente sur notre site).\r\nPoids du briquet  : 60 g.', '7.8 x 2.3 x 1.2 cm', 76, 'https://i.ibb.co/NZNXGNT/briquet-essence-retro1.jpg', 'https://i.ibb.co/2Ngp6RZ/briquet-essence-retro2.jpg', 'https://i.ibb.co/WgrffSm/briquet-essence-retro3.jpg', 'https://i.ibb.co/k819rNF/briquet-essence-retro4.jpg', 15.00, '0', 20, 0, 1, 2),
(5, 'Briquet essence acier chromé poli', 'iLighter', 120000012, 'Très simple, un coton qui absorbe l\'essence, une pierre qui l\'allume. Le simple et pratique. ', 'Très simple, un coton qui absorbe l\'essence, une pierre qui l\'allume. Le simple et pratique. ', 'Métal', 'chromé', '', 'Ce briquet essence vous sera livré dans son emballage d\'origine.', 'Allumage à pierre.\r\nFlamme souple.\r\nPoids du briquet  : 60 g.\r\n', '7.8 x 2.3 x 1.2 cm', 36, 'https://i.ibb.co/txFMn3F/briquet-essence-chrome-poli1.jpg', NULL, NULL, NULL, 8.50, '0', 20, 0, 1, 2),
(6, 'Briquet Pierre Zorro Antik Dragon', 'Zorro', 120000013, 'Il est temps de sortir du lot ! En plus d’être très original, avec le dessin d’un dragon argent sur fond rouge et noir sur ses deux faces, ce briquet …', 'Il est temps de sortir du lot ! En plus d’être très original, avec le dessin d’un dragon argent sur fond rouge et noir sur ses deux faces, ce briquet répondra à vos exigences. Doté d’une flamme souple, vous pourrez le mettre en action dans quasiment toutes les circonstances grâce aux deux parties métalliques qui entourent la flamme pour résister par temps de vent. Ce briquet pas cher vous accompagnera partout !\r\n', 'Métal', 'Chromé, rouge', '', 'Ce briquet Zorro vous sera livré dans son écrin noir, avec pochette en velours noir.\r\n\r\n', 'Allumage à pierre.\r\nFlamme souple.\r\nClapet de fermeture.\r\nPoids du briquet  : 73 g.\r\n', '7.8 x 2.3 x 1.2 cm', 24, 'https://i.ibb.co/hKGLg9G/briquet-pierre-zorro-antik-dragon1.jpg', 'https://i.ibb.co/LdGjBTk/briquet-pierre-zorro-antik-dragon2.jpg', 'https://i.ibb.co/G3292TL/briquet-pierre-zorro-antik-dragon3.jpg', NULL, 29.00, '0', 20, 0, 1, 2),
(7, 'Briquet Pierre Zorro Antik Damier', 'Zorro', 120000014, 'Vous désirez un briquet à pierre, un briquet pas cher, un briquet original ? Vous êtes sur la bonne page ! En effet, le briquet Zorro Antik rassemble toutes ces …', 'Vous désirez un briquet à pierre, un briquet pas cher, un briquet original ? Vous êtes sur la bonne page ! En effet, le briquet Zorro Antik rassemble toutes ces caractéristiques. Allumage à pierre, visuel damier sur ses deux faces, il est également très pratique puisque compact et facilement utilisable, sa mèche étant protégée du vent par deux pièces métalliques.', 'Métal', 'Chromé et noir', '', 'Ce briquet Zorro vous sera livré dans son écrin noir, avec pochette en velours noir.', 'Allumage à pierre.\r\nFlamme souple.\r\nClapet de fermeture.\r\nPoids du briquet  : 74 g.\r\n', '5.1 x 4.1 x 1.5 cm', 18, 'https://i.ibb.co/z6BQyzS/briquet-pierre-zorro-antik-damier1.jpg', 'https://i.ibb.co/ypgKc36/briquet-pierre-zorro-antik-damier2.jpg', 'https://i.ibb.co/rdSXwK6/briquet-pierre-zorro-antik-damier3.jpg', NULL, 38.00, '0', 20, 0, 1, 2),
(8, 'Briquet 3 flammes avec Puncher chromé', 'iLighter', 130000011, 'Briquet puncher spécialement conçu pour allumer les cigares. Ce briquet pour cigare possède trois flammes rigides réglables en intensité avec un capot…', 'Briquet puncher spécialement conçu pour allumer les cigares. Ce briquet pour cigare possède trois flammes rigides réglables en intensité avec un capot automatique : il s\'ouvrira automatiquement quand le bouton d\'allumage électronique sera actionné. Vous trouverez sous le briquet un \"puncher\" qui permet de réaliser un trou à l\'extrémité du cigare. Entièrement chromé et brossé, ce briquet cigare possède un réservoir transparent, vous verrez ainsi s\'il faut rajouter du gaz ou pas.', 'Métal, Plastique', 'Chromé', '', 'Ce Briquet 3 Flammes avec Puncher Chromé vous sera livré dans son coffret d\'origine, soigneusement emballé et protégé.\r\n\r\n', 'Allumage électronique.\r\n3 flammes rigides (réglables en intensité).\r\nClapet de fermeture chromé.\r\nRechargeable avec du gaz en vente sur notre site.\r\nLivré vide de gaz.\r\n1 emporte-pièce situé au bas du briquet\r\nPoids : 80 g.\r\n', '7.8 x 3.2 x 2 cm', 12, 'https://i.ibb.co/jZ8p3tS/briquet-3-flammes-avec-puncher-chrome1.jpg', 'https://i.ibb.co/C8PvSkr/briquet-3-flammes-avec-puncher-chrome2.jpg', NULL, NULL, 25.50, '0', 20, 0, 1, 3),
(9, 'Briquet Winjet 4 Flammes Gun', 'Winjet', 130000012, 'Briquet puncher spécialement conçu pour allumer les cigares. Ce briquet pour cigare possède trois flammes rigides réglables en intensité avec un capot…', 'Avec ses 4 flammes torches, le briquet cigare Winjet est capable d’allumer n’importe quel cigare en un temps record. Facile à prendre en main et ergonomique, ce briquet pour cigare dispose également d’une petite fenêtre sur le côté pour vérifier le niveau de gaz. Autre élément bien pratique intégré à ce briquet tempete : un emporte-pièce situé dessous.', 'Métal', 'Gun', '', 'Ce briquet Winjet vous sera livré parfaitement emballé dans son écrin d\'origine noir.', 'Allumage électronique.\r\n4 flammes torche réglables en intensité.\r\nRechargeable avec du gaz premium ou zéro impureté.\r\nFenêtre de niveau de gaz.\r\nClapet de fermeture.\r\n1 emporte-pièces : Ø 8 mm.\r\nPoids du briquet : 110 g.\r\n', '8.5 x 3 x 2.7 cm', 34, 'https://i.ibb.co/g69Kr8Q/briquet-winjet-4-flammes-gun1.jpg', 'https://i.ibb.co/QNdNRc0/briquet-winjet-4-flammes-gun2.jpg', 'https://i.ibb.co/NTVn6zx/briquet-winjet-4-flammes-gun3.jpg', 'https://i.ibb.co/RQzMv5h/briquet-winjet-4-flammes-gun4.jpg', 29.00, '0', 20, 1, 1, 3),
(10, 'Briquet Noir Triple Jet USA', 'iLighter', 130000013, 'Briquet noir et chromé qui saura satisfaire tous les fumeurs de cigares grâce à l\'efficacité de sa flamme triple jet. Avec un allumage électronique, …', 'Briquet noir et chromé qui saura satisfaire tous les fumeurs de cigares grâce à l\'efficacité de sa flamme triple jet. Avec un allumage électronique, une flamme réglable et un emporte pièce inclus, vous ne pourrez plus vous passer de ce briquet muni aussi d\'un clapet de sécurité.', 'Métal', 'Noir, chromé', '', 'Ce briquet noir triple jet USA vous sera livré dans son étui d\'origine, soigneusement emballé et protégé.', 'Allumage électronique.\r\n3 flammes rigides.\r\nClapet de fermeture chromé.\r\nRechargeable avec du gaz.\r\n1 emporte-pièce situé au bas du briquet.\r\nPoids : 93 g.\r\n', '7.3 x 1 x 1 cm', 0, 'https://i.ibb.co/tmHwbn5/briquet-noir-triple-jet-usa1.jpg', 'https://i.ibb.co/C5GtDGN/briquet-noir-triple-jet-usa2.jpg', NULL, NULL, 25.50, '0', 20, 1, 1, 3),
(11, 'Briquets Bic maxi à pierre x5 couleurs', 'BIC\r\n', 210000011, 'BIC® Maxi Très longue durée de vie - jusqu\\\'à 3000 allumages Utilisation confortable Flamme fixe préréglée ou ...…', 'BIC® Maxi\r\nTrès longue durée de vie - jusqu\\\'à 3000 allumages.\r\nUtilisation confortable.\r\nFlamme fixe préréglée ou réglable (selon arrivage).\r\nDisponible en différentes couleurs et avec différents décors.\r\nFabriqué conformément aux standards de qualité BIC.\r\n', 'Métal, Plastique', '1 rouge, 1 orange, 1 jaune, 1 bleu, 1 magenta', '', 'Ces briquets vous seront livrés dans leur emballement d’origine.', 'Allumage à pierre.\r\nFlamme souple.\r\nNon rechargeable.\r\nPoids : 93 g.\r\n', '7.8 x 2.3 x 1.2 cm', 99, 'https://i.ibb.co/wLmTqwh/briquet-maxi-classic1.jpg', '', NULL, NULL, 6.00, '0', 2, 1, 2, 4),
(12, 'Bic mini à pierre Pastel X5 couleurs', 'BIC', 210000012, 'Mini Bic à pierre Principaux avantages : Léger, pratique Longue durée de vie Flamme fixe préréglée Disponible en différentes …', 'Mini Bic à pierre.\r\nLéger, pratique.\r\nLongue durée de vie.\r\nFlamme fixe préréglée.\r\nDisponible en différentes couleurs.\r\nFabriqué conformément aux standards de qualité BIC.\r\nMécanisme de « sécurité enfant ».\r\n', 'Métal, Plastique', '1 rouge, 1 violet, 1 jaune, 1 bleu, 1 orange', '', 'Ces briquets vous seront livrés dans leur emballement d’origine.', 'Allumage à pierre.\r\nFlamme souple.\r\nNon rechargeable.\r\nPoids : 93 g.\r\n', '7.3 x 2.5 x 2.5 cm', 138, 'https://i.ibb.co/f24xhKQ/briquet-mini-pierre-pastel1.jpg', '', NULL, NULL, 5.00, '0', 20, 1, 1, 4),
(13, 'Bic mini à pierre Gold\r\n', 'BIC', 210000013, '5 briquets Bic mini à pierre Gold Des briquets de petites tailles dignes de la marque Bic mondialement reconnue. Le contraste des couleurs et la puissance de ces briquets ...…', 'Des briquets de petites tailles dignes de la marque Bic mondialement reconnue. Le contraste des couleurs et la puissance de ces briquets illumineront vos soirées. A glisser dans une poche ou dans une sacoche, ces derniers seront se rendre utiles en toutes occasions.', 'Métal, Plastique', 'Corps noir / Tête dorée', '', 'Briquets livrés dans un conditionnement de 5 briquets.', 'Légers et pratiques.\r\nA allumage à pierre.\r\nA flamme souple fixe préréglée.\r\nFabriqués conformément aux standards de qualité BIC\r\nComprenant un mécanisme de « sécurité enfant ».\r\n', '6 x 2.2 x 1.1 cm', 119, 'https://i.ibb.co/wyxd56h/briquet-mini-bic-black-gold1.jpg', '', NULL, NULL, 5.00, '0', 20, 1, 2, 4),
(14, 'Bic slim à pierre X50 couleurs', 'BIC', 210000014, 'Mêlant simplicité et originalité, ces briquets slim pourront être transportés où bon vous semble grâce à leur petite taille.', 'Mêlant simplicité et originalité, ces briquets slim pourront être transportés où bon vous semble grâce à leur petite taille.', 'Métal, Plastique', 'Orange, jaune, bleu clair, bleu foncé, vert, rose, rouge', '', 'Briquets livrés dans une barquette Bic de 50 briquets.', 'Léger et pratique.\r\nA allumage à pierre.\r\nA flamme souple fixe préréglée.\r\nFabriqué conformément aux standards de qualité BIC.\r\nComprenant un mécanisme de « sécurité enfant ».\r\n', '7.5 x 2.2 x 1.1 cm', 80, 'https://i.ibb.co/Gkv1YqK/briquets-slim-bic-pierre-couleur1.jpg', '', NULL, NULL, 62.90, '0', 20, 1, 2, 4),
(15, 'Briquet Clipper Soft Touch Noir X48', 'Clipper', 220000011, 'Faites le plein de briquets jetables grâce à cette barquette de 48 briquets pas cher ! Le briquet Clipper ici présenté possède un toucher « Soft ..', 'Faites le plein de briquets jetables grâce à cette barquette de 48 briquets pas cher ! Le briquet Clipper ici présenté possède un toucher « Soft Touch », c’est-à-dire style velours. Avec cet achat briquet vous serez certain de ne jamais manquer de feu pour allumer vos bougies ou vos cigarette', 'Métal, Nylon', 'Noir uni', 'Allumage à pierre renouvelable : il suffira de tirer la molette du briquet pour accéder à l\'emplacement de la pierre.\r\nLa partie amovible pourra vous servir également de tasseur.', 'Barquette de 48 briquets livrés soigneusement emballés et protégés.', 'Léger et pratique.\r\nCorps du briquet en nylon (très résistant) entièrement recyclable.\r\nAllumage à pierre renouvelable.\r\nRechargeable avec du gaz.\r\nFlamme souple fixe droite ou inclinée\r\nBriquet conforme à la directive européenne pour la sécurité des enfants (Conform ISO 9994)\r\nLongue durée de vie garantie (90% moins cher qu\'un briquet classique)\r\n', '7.5 x 1.5 cm', 124, 'https://i.ibb.co/ftcyJdV/briquet-clipper-noir-soft-touch1.jpg', 'https://i.ibb.co/23BgBDC/briquet-clipper-noir-soft-touch2.jpg', 'https://i.ibb.co/4ZLK3P7/briquet-clipper-noir-soft-touch3.jpg', NULL, 39.90, '0', 20, 1, 2, 5),
(16, 'Briquet Clipper Tucan Life X48', 'Clipper', 220000012, 'Faites le plein d\'économies avec cet achat briquet Clipper par 48 ! Tous ces briquets sont rechargeables et possèdent une partie pouvant servir de tasseur de tabac. Ils sont…', 'Faites le plein d\'économies avec cet achat briquet Clipper par 48 ! Tous ces briquets sont rechargeables et possède une partie pouvant servir de tasseur de tabac. Ils sont également décorés avec de beaux toucans sur fond colorés pastels.\r\n', 'Métal, Nylon', 'Multicolores / Toucans', 'Allumage à pierre renouvelable : il suffira de tirer la molette du briquet pour accéder à l\'emplacement de la pierre.\r\nLa partie amovible pourra vous servir également de tasseur.', 'Barquette de 48 briquets Clipper livrés soigneusement emballés et protégés.', 'Léger et pratique.\r\nCorps du briquet en nylon (très résistant) entièrement recyclable.\r\nAllumage à pierre renouvelable.\r\nRechargeable avec du gaz.\r\nFlamme souple fixe droite ou inclinée\r\nBriquet conforme à la directive européenne pour la sécurité des enfants (Conform ISO 9994)\r\nLongue durée de vie garantie (90% moins cher qu\'un briquet classique)\r\n', 'longueur x diamètre(cm)\r\n7.5 x 1.5 cm', 57, 'https://i.ibb.co/gdvrLvg/briquet-clipper-tucan-life1.jpg', 'https://i.ibb.co/S5BdKQz/briquet-clipper-tucan-life2.jpg', 'https://i.ibb.co/23BgBDC/briquet-clipper-noir-soft-touch2.jpg', NULL, 49.00, '0', 20, 1, 2, 5),
(17, 'Briquet Clipper Element Skulls X48\r\n', 'Clipper', 220000013, 'Barquette de 48 briquets Clipper avec partie amovible pouvant servir à tasser le tabac lorsque l\'on roule soi-même ses cigarettes. Ces 48 briquets jetables sont tous...', 'Barquette de 48 briquets Clipper avec partie amovible pouvant servir à tasser le tabac lorsque l\'on roule soi-même ses cigarettes. Ces 48 briquets jetables sont tous décorés avec des têtes de mort sur fonds colorés.', 'Métal, Nylon', 'Multicolores / Skulls', 'Allumage à pierre renouvelable : il suffira de tirer la molette du briquet pour accéder à l\'emplacement de la pierre.\r\nLa partie amovible pourra vous servir également de tasseur.', 'Barquette de 48 briquets Clipper livrés soigneusement emballés et protégés.', 'Léger et pratique.\r\nCorps du briquet en nylon (très résistant) entièrement recyclable.\r\nAllumage à pierre renouvelable.\r\nRechargeable avec du gaz.\r\nFlamme souple fixe droite ou inclinée\r\nBriquet conforme à la directive européenne pour la sécurité des enfants (Conform ISO 9994)\r\nLongue durée de vie garantie (90% moins cher qu\'un briquet classique).', 'longueur x diamètre(cm)\r\n7.5 x 1.5 cm', 30, 'https://i.ibb.co/R0K8kyf/briquet-clipper-element-skull1.jpg', 'https://i.ibb.co/Kq8Nm4q/briquet-clipper-element-skull2.jpg', 'https://i.ibb.co/MpRZCd4/briquet-clipper-element-skull3.jpg', NULL, 49.00, '0', 20, 1, 2, 5),
(18, 'Briquet Clipper Jet Flamme Couleur X48', 'Clipper', 220000014, 'Cette barquette Briquet Clipper Jet Flamme Couleur x 48 vous sera très pratique si vous perdez souvent vos feux. Celle-ci est composée de briquets colorés ce qui ...', 'Cette barquette Briquet Clipper Jet Flamme Couleur x 48 vous sera très pratique si vous perdez souvent vos feux. Celle-ci est composée de briquets colorés ce qui sera parfait pour les retrouver facilement en un simple coup d\'oeil. Ce lot comprend des briquets de couleur noir, rose, jaune, vert, orange et bleu. Il vous est également possible d\'acquérir cette série en lot de 4 unités sur notre site.', 'Métal, Nylon', 'Noir, rose, jaune, vert, orange, bleu', 'Allumage à pierre renouvelable : il suffira de tirer la molette du briquet pour accéder à l\'emplacement de la pierre.\r\nLa partie amovible pourra vous servir également de tasseur.', 'Barquette de 48 briquets Clipper livrés soigneusement emballés et protégés.', 'Léger et pratique.\r\nCorps du briquet en nylon (très résistant) entièrement recyclable.\r\nAllumage à pierre renouvelable.\r\nRechargeable avec du gaz.\r\nFlamme souple fixe droite ou inclinée\r\nBriquet conforme à la directive européenne pour la sécurité des enfants (Conform ISO 9994)\r\nLongue durée de vie garantie (90% moins cher qu\'un briquet classique).', 'longueur x diamètre(cm)\r\n7.5 x 1.5 cm', 79, 'https://i.ibb.co/VgC3RrC/briquet-clipper-jet-flamme-couleur1.jpg', 'https://i.ibb.co/J2xZXJL/briquet-clipper-jet-flamme-couleur2.jpg', 'https://i.ibb.co/23BgBDC/briquet-clipper-noir-soft-touch2.jpg', NULL, 59.00, '0', 20, 0, 2, 5),
(19, 'Zippo Gears in Circle', 'Zippo', 310000011, 'Briquet Zippo Gears In Circle, un modèle original que nous propose l’emblématique marque américaine de briquet. Retrouvez de façon ...', 'Briquet Zippo Gears In Circle, un modèle original que nous propose l’emblématique marque américaine de briquet. Retrouvez de façon détournée, les « entrailles » d’un briquet Zippo sur un fond de Brushed Chrome. Un ingénieux système de poulies entremêlées et le logo de la marque forment ainsi le design très futuriste de ce briquet à essence. Les amateurs et passionnés apprécieront, comme toujours, cette flamme souple et résistante dans toutes les situations.\r\n\r\nUn joli cadeau à offrir sans aucune modération !', 'Métal', 'Chromé', '', 'Ce Zippo vous sera livré dans sa boite d\'origine, signée de la marque.', 'C\'est en 1932 que le premier Zippo sort de l\'usine américaine de Georges G. Blaisdell. Sans décors, il est uniforme en métal et à la particularité de résister au vent. Puis dans les années 1935 à 1940 de nombreuses entreprises et corps d\'armées y apposent leur logos et personnalisent les Zippo.\r\nParce qu\'ils sont robustes et facile d\'utilisation, ils acquièrent leur réputation mondiale durant la seconde guerre mondiale, grâce aux soldats américains. Le Zippo n\'a de cesse de se diversifier par son décor. Véritable objet de collection, ils ne connaissent pas la panne et sont garantis à vie.', 'Hauteur x largeur x épaisseur (cm)\r\n5.7 x 3.8 x 1.3 cm', 28, 'https://i.ibb.co/ydcCG5m/zippo-gears-in-circle-1.jpg', 'https://i.ibb.co/ZYpWbSF/zippo-gears-in-circle-2.jpg', NULL, NULL, 49.90, '0', 20, 0, 3, 6),
(20, 'Zippo brush chromé grand modèle ', 'Zippo', 310000012, 'Célèbre briquet Zippo chromé et en métal brossé qui pourra être gravé sur les deux faces. Très sobre et d\'une fiabilité ...', 'Célèbre briquet Zippo chromé et en métal brossé qui pourra être gravé sur les deux faces. Très sobre et d\'une fiabilité incontestable, ce zippo vous satisfera à chaque utilisation. Briquet essence rechargeable, il se fera une place dans vos poches pour ne plus en sortir. Son capot se referme sur la flamme souple pour l\'éteindre en une fraction de seconde.', 'Métal', 'Chromé', '', 'Ce Zippo vous sera livré dans sa boite d\'origine signée de la marque.', 'C\'est en 1932 que le premier Zippo sort de l\'usine américaine de Georges G. Blaisdell. Sans décors, il est uniforme en métal et à la particularité de résister au vent. Puis dans les années 1935 à 1940 de nombreuses entreprises et corps d\'armées y apposent leur logos et personnalisent les Zippo.\r\nParce qu\'ils sont robustes et facile d\'utilisation, ils acquièrent leur réputation mondiale durant la seconde guerre mondiale, grâce aux soldats américains. Le Zippo n\'a de cesse de se diversifier par son décor. Véritable objet de collection, ils ne connaissent pas la panne et sont garantis à vie.', 'Hauteur x largeur x épaisseur (cm)\r\n5,5 x 3,8 x 1,3 cm', 18, 'https://i.ibb.co/MN7hY6y/zippo-brush-chrome-grand-modele-1.jpg', 'https://i.ibb.co/Z2ZqqwN/zippo-brush-chrome-grand-modele-2.jpg', 'https://i.ibb.co/cQYS0Dc/zippo-brush-chrome-grand-modele-3.jpg', NULL, 34.90, '0', 20, 1, 3, 6),
(21, 'Zippo Eight Ball', 'Zippo', 310000013, 'Briquet Zippo Eight Ball, au style provoc’ et choc, rappelant sans aucun doute l’image de la célèbre marque de briquets américains. Reconnu mondialement...', 'Briquet Zippo Eight Ball, au style provoc’ et choc, rappelant sans aucun doute l’image de la célèbre marque de briquets américains. Reconnu mondialement pour ses caractéristiques uniques, le briquet Zippo Eight Ball Billard se dote d’une flamme souple ainsi que d’une grille de protection, pratique en cas d’intempérie. Les amateurs et collectionneurs ne manqueront pas d’avoir dans leur collection ce briquet à essence frappé d’une boule de billard n°8 et éclats de pierres en relief.\r\nUne idée de cadeau original à offrir toute l’année !', 'Métal', 'Chromé', 'Hauteur x largeur x épaisseur (cm)\r\n5.7 x 3.8 x 1.3 cm\r\n', 'Ce Zippo vous sera livré dans sa boite d\'origine, signée de la marque.', 'C\'est en 1932 que le premier Zippo sort de l\'usine américaine de Georges G. Blaisdell. Sans décors, il est uniforme en métal et à la particularité de résister au vent. Puis dans les années 1935 à 1940 de nombreuses entreprises et corps d\'armées y apposent leur logos et personnalisent les Zippo.\r\nParce qu\'ils sont robustes et facile d\'utilisation, ils acquièrent leur réputation mondiale durant la seconde guerre mondiale, grâce aux soldats américains. Le Zippo n\'a de cesse de se diversifier par son décor. Véritable objet de collection, ils ne connaissent pas la panne et sont garantis à vie.', 'Hauteur x largeur x épaisseur (cm)\r\n5.7 x 3.8 x 1.3 cm', 32, 'https://i.ibb.co/vcXC4mc/zippo-eight-ball-1.jpg', 'https://i.ibb.co/7RjGN1m/zippo-eight-ball-2.jpg', 'https://i.ibb.co/0ttvJrh/zippo-eight-ball-3.jpg', NULL, 59.00, '0', 20, 0, 3, 6),
(22, 'Zippo Armor Boxes All Over Design', 'Zippo', 310000014, 'Briquet tempete Zippo Armor High Polish Chrome avec gravure de formes géométriques sur tout son contour, tandis que la flamme rouge, célèbre logo de la ...', 'Briquet tempete Zippo Armor High Polish Chrome avec gravure de formes géométriques sur tout son contour, tandis que la flamme rouge, célèbre logo de la marque américaine fait son apparition en insert époxy sur le côté de ce beau briquet. Entièrement chromé, ce briquet Zippo fait partie des briquets tempête de luxe et il peut être un magnifique cadeau à offrir. Qui plus est, il vous sera livré dans son coffret cadeau noir et rouge.\r\n', 'Métal', 'Chromé', '', 'Ce Zippo vous sera livré dans sa boite d\'origine, signée de la marque.', 'C\'est en 1932 que le premier Zippo sort de l\'usine américaine de Georges G. Blaisdell. Sans décors, il est uniforme en métal et à la particularité de résister au vent. Puis dans les années 1935 à 1940 de nombreuses entreprises et corps d\'armées y apposent leur logos et personnalisent les Zippo.\r\nParce qu\'ils sont robustes et facile d\'utilisation, ils acquièrent leur réputation mondiale durant la seconde guerre mondiale, grâce aux soldats américains. Le Zippo n\'a de cesse de se diversifier par son décor. Véritable objet de collection, ils ne connaissent pas la panne et sont garantis à vie.', 'Hauteur x largeur x épaisseur (cm)\r\n5.7 x 3.8 x 1.3 cm', 27, 'https://i.ibb.co/3swL5p0/zippo-armor-boxes-all-over-design-1.jpg', 'https://i.ibb.co/hWMTDW9/zippo-armor-boxes-all-over-design-2.jpg', 'https://i.ibb.co/6YvFJfg/zippo-armor-boxes-all-over-design-3.jpg', 'https://i.ibb.co/KFW9y3q/zippo-armor-boxes-all-over-design-4.jpg', 169.90, '0', 20, 1, 3, 6),
(23, 'Zippo Black Ice', 'Zippo', 310000015, 'Briquet Zippo chromé gris anthracite, avec possibilité de gravure sur les deux faces pour le personnaliser. De couleur sobre et classe à la fois, ce zippo ...', 'Briquet Zippo chromé gris anthracite, avec possibilité de gravure sur les deux faces pour le personnaliser. De couleur sobre et classe à la fois, ce zippo génère une flamme souple qui s\'éteindra en refermant son capot du dessus. Pensez à le faire graver sur une ou deux faces pour le personnaliser.', 'Métal', 'Chromé gris anthracite', '', 'Ce Zippo vous sera livré dans sa boite d\'origine signée de la marque.', 'C\'est en 1932 que le premier Zippo sort de l\'usine américaine de Georges G. Blaisdell. Sans décors, il est uniforme en métal et à la particularité de résister au vent. Puis dans les années 1935 à 1940 de nombreuses entreprises et corps d\'armées y apposent leur logos et personnalisent les Zippo.\r\nParce qu\'ils sont robustes et facile d\'utilisation, ils acquièrent leur réputation mondiale durant la seconde guerre mondiale, grâce aux soldats américains. Le Zippo n\'a de cesse de se diversifier par son décor. Véritable objet de collection, ils ne connaissent pas la panne et sont garantis à vie.', 'Hauteur x largeur x épaisseur (cm)\r\n5,5 x 3,8 x 1,3 cm\r\n', 15, 'https://i.ibb.co/sgnkdnv/briquet-zippo-black-ice-1.jpg', 'https://i.ibb.co/pKLNp3F/briquet-zippo-black-ice-2.jpg', 'https://i.ibb.co/1GVD7N9/briquet-zippo-black-ice-3.jpg', NULL, 55.00, '0', 20, 0, 3, 6),
(24, 'Etui Zippo Tactique Coyotte', 'Zippo', 320000011, 'Profitez d\'un étui à briquet Zippo Tactique Coyotte...', 'Profitez d\'un étui à briquet Zippo Tactique Coyotte. L\'étui a été imaginé pour les militaires afin qu\'ils puissent accrocher leur briquet très facilement à leur équipement tactique afin de le garder en sûreté et toujours à portée de main. Avec cet achat, vous pouvez transporter votre briquet Zippo avec l\'esprit tranquille...\r\n', 'Nylon', 'Marron/vert militaire', 'Sangle en nylon 1\" et 2\" par Mil Spec style 17337.\r\nFermeture velcro à boucles et crochets 100 % nylon.\r\nBoucle de mousqueton.\r\nSystème de fixation MOLLE.\r\nCompatible avec tout sytème PALS.\r\n', 'Cet étui vous sera livré dans leur boîte cadeau d\'origine, signée de la marque.', 'C\'est en 1932 que le premier Zippo sort de l\'usine américaine de Georges G. Blaisdell. Sans décors, il est uniforme en métal et à la particularité de résister au vent. Puis dans les années 1935 à 1940 de nombreuses entreprises et corps d\'armées y apposent leur logos et personnalisent les Zippo.\r\nParce qu\'ils sont robustes et facile d\'utilisation, ils acquièrent leur réputation mondiale durant la seconde guerre mondiale, grâce aux soldats américains. Le Zippo n\'a de cesse de se diversifier par son décor. Véritable objet de collection, ils ne connaissent pas la panne et sont garantis à vie.\r\n', 'Hauteur x largeur x épaisseur (cm)\r\n5.7 x 3.8 x 1.3 cm\r\n', 23, 'https://i.ibb.co/FWB90Hx/zippo-black-crackle-et-etui-tactique-coyotte-1.jpg', 'https://i.ibb.co/BLwfBCz/zippo-black-crackle-et-etui-tactique-coyotte-2.jpg', 'https://i.ibb.co/3rr2Fmg/zippo-black-crackle-et-etui-tactique-coyotte-3.jpg', NULL, 24.90, '0', 20, 1, 3, 7),
(25, 'Zippo etui briquet cuir noir à clip ', 'Zippo', 320000012, 'Etui en cuir avec clip métallique pour ceinture.', 'Etui en cuir avec clip métallique pour ceinture.', 'Cuir', 'Noir', '', 'Cet étui Zippo vous sera livré dans son emballage d\'origine de la marque.', '', 'Hauteur x largeur x épaisseur (cm)\r\n5.7 x 3.8 x 1,5 cm', 19, 'https://i.ibb.co/w6z4tYM/zippo-etui-noir-1.jpg', 'https://i.ibb.co/kJbrPY8/zippo-etui-noir-2.jpg', 'https://i.ibb.co/3sn9G8X/zippo-etui-noir-3.jpg', NULL, 20.90, '0', 20, 0, 3, 7),
(26, 'Zippo étui briquet Harley Davidson à clip', 'Zippo', 320000013, 'Protégez votre nouveau briquet Zippo ou votre briquet Zippo fétiche en optant pour l\'option étui qui est en plus marqué du logo Harley Davidson ! Robuste et ...', 'Protégez votre nouveau briquet Zippo ou votre briquet Zippo fétiche en optant pour l\'option étui qui est en plus marqué du logo Harley Davidson ! Robuste et très belle qualité, cet étui pour briquet Zippo pourra être mis sur chacune de vos ceintures tout en restant très discret.', 'Cuir', 'Noir et logo HD en argent', '', 'Cet étui vous sera livré dans son emballage d\'origine, soigneusement emballé et protégé.', 'Convient pour un briquet Zippo\r\nRigide : oui\r\nFermeture par bouton pression\r\nPassant à l\'arrière pour ceinture avec ouverture et fermeture à clip (largeur de ceinture maximum : 3 cm)', 'Longueur x largeur x épaisseur (cm)\r\n7 x 5.7 x 3 cm', 9, 'https://i.ibb.co/HNMhF13/etui-briquet-zippo-harley-davidson-1.jpg', 'https://i.ibb.co/tqGbPnp/etui-briquet-zippo-harley-davidson-2.jpg', 'https://i.ibb.co/4fJyMdq/etui-briquet-zippo-harley-davidson-3.jpg', NULL, 24.90, '0', 20, 0, 3, 7),
(27, 'Zippo essence', 'Zippo', 330000011, 'Cette essence à briquet est un des accessoires fumeurs indispensables, au même titre que votre briquet tempête pour allumer votre clope dans n’importe quelle condition ...', 'Cette essence à briquet est un des accessoires fumeurs indispensables, au même titre que votre briquet tempête pour allumer votre clope dans n’importe quelle condition . Elle permet de recharger votre (ou vos !) précieux briquet tempête de nombreuses fois afin de ne jamais tomber à court de carburant.\r\n\r\nSpécialement conçue pour les briquets Zippo, cette recharge essence veillera au bon fonctionnement de celui-ci pour les années à venir. En effet, un briquet Zippo ne se jette pas, mieux, il se collectionne !\r\n\r\nComplètement étanche, et grâce à son bouchon verseur, vous rechargerez votre Zippo Harley Davidson, Che ou encore Rasta sans risque de fuite ou d’évaporation.\r\n\r\nVous alimenterez de même vos chaufferettes Zippo pas cher. Vous pourrez également utiliser cette essence pour éliminer les tâches de goudron, de graisse, d’huile, pour enlever les étiquettes adhésives, etc.\r\n\r\nAlors, que vous ayez offert des briquets personnalisés (graver un Zippo est possible sur ce site) ou que vous ayez vous-même un Zippo Collection, vous pourrez allumer le feu sans avoir besoin d’allumettes.', '', '', 'Recharger son briquet est très simple. Il suffit pour cela de retirer l’insert (le briquet de son boîtier), de retirer le feutre puis d’imbiber le coton en exerçant quelques courtes pressions sur la bouteille d’essence.\r\n', '', ' Liquide et vapeur très inflammables. Peut être mortel en cas d\'ingestion et de pénétration dans les voies respiratoires. Toxique pour la vie aquatique avec effet à long terme. Provoque une irritation de la peau. Peut provoquer somnolence ou vertiges.\r\n\r\nTenir à l\'écart de la chaleur, des surfaces chaudes, des étincelles, des flammes nues et d\'autres sources d\'inflammation. Ne pas fumer. Évitez le rejet dans l\'environnement. En cas d\'incendie : utiliser de la mousse, de la poudre ou du dioxyde de carbone pour l\'extinction. EN CAS D\'INGESTION : Appeler immédiatement un centre antipoison / Médecin. NE PAS provoquer de vomissements. Stocker dans un endroit bien ventilé. Conserver au frais.\r\n\r\nContient : Distillat (pétrole) hydrotraitement de distillat léger, bas point d\'ébullition, léger, hydrotraité.\r\n\r\nNuméro d\'urgence médicale 24 heures par jour 1-812-248-0585', '', 26, 'https://i.ibb.co/wWjhbzp/essence-zippo-001.jpg', '', NULL, NULL, 3.90, '0', 10, 1, 3, 8),
(28, 'Zippo Pierre', 'Zippo', 330000012, 'Etui de 6 pierres pour briquet Zippo...', 'Etui de 6 pierres pour briquet Zippo.\r\nChangement facile.', '', '', '', '', '', '', 29, 'https://i.ibb.co/K7tbzwF/pierre-zippo-002.jpg', NULL, NULL, NULL, 3.90, '0', 10, 0, 3, 8),
(29, 'Réservoir Porte clés pour essence Zippo', 'Zippo', 330000013, 'Le réservoir porte clés pour essence Zippo est un accessoire ingénieux et très pratique qui vous donne la possibilité d\'avoir toujours à porter...', 'Le réservoir porte clés pour essence Zippo est un accessoire ingénieux et très pratique qui vous donne la possibilité d\'avoir toujours à porter de main de l\'essence pour votre briquet. Accompagné aussi d\'un compartiment pour pierre et d\'un petit outil d\'aide à l\'ouverture de la vis du briquet, ce réservoir porte clés pourra s\'accrocher à vos clés, à votre sac ou même à votre ceinture.', 'Aluminium', 'Acier', '', 'Ce produit vous sera livré dans son emballage d\'origine.', 'Haute qualité d\'aluminium.\r\nParfaitement hermétique.\r\nPossède un bouchon principal et un bouchon interne.\r\nPeut recharger jusqu\'à 2 fois votre zippo\r\nIl comprend également :\r\n1 clip pivotant\r\n1 boucle de porte-clés\r\n1 compartiment pour pierre (petit embout noir dans lequel vous pourrez insérer une pierre de rechange)\r\n1 outil pour vous aider à l\'ouverture de la vis où se trouve la pierre', 'Longueur (sans la boucle) x diamètre (cm) :\r\n7 x 1.5 cm', 49, 'https://i.ibb.co/zs32mBy/reservoir-porte-cles-pour-zippo.jpg', NULL, NULL, NULL, 24.90, '0', 10, 0, 3, 8),
(32, 'ff', 'f', 54564848, 'fnfnj', ' jnfjnf', 'ioifj', 'fii', ' fijf', 'fni', ' fni', '45', 20, '6 ', '6 ', '6 ', '6 ', 56.00, NULL, 55, 1, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `products_orders`
--

CREATE TABLE `products_orders` (
  `id_product_order` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_order` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products_orders`
--

INSERT INTO `products_orders` (`id_product_order`, `id_product`, `id_order`, `quantity`) VALUES
(286, 3, 106, 10),
(287, 4, 106, 15),
(288, 5, 106, 20),
(289, 3, 107, 10),
(290, 4, 107, 15),
(291, 5, 107, 20),
(292, 3, 108, 10),
(293, 4, 108, 15),
(294, 5, 108, 20),
(295, 3, 109, 10),
(296, 4, 109, 15),
(297, 5, 109, 20),
(298, 3, 110, 10),
(299, 4, 110, 15),
(300, 5, 110, 20),
(301, 1, 111, 1),
(302, 2, 111, 2),
(303, 3, 111, 2),
(304, 5, 111, 1),
(305, 2, 112, 5),
(306, 2, 113, 1),
(307, 6, 113, 1),
(308, 2, 114, 2),
(309, 3, 114, 1),
(310, 5, 114, 2),
(311, 6, 114, 1),
(312, 10, 114, 1),
(313, 3, 115, 2),
(314, 1, 116, 1),
(315, 3, 116, 1),
(316, 1, 117, 1),
(317, 5, 118, 1),
(318, 4, 119, 1),
(319, 4, 120, 1),
(320, 28, 121, 1),
(321, 15, 122, 1),
(322, 1, 123, 2),
(323, 3, 123, 1),
(324, 2, 124, 2),
(325, 1, 125, 1),
(326, 1, 126, 1),
(327, 3, 126, 1),
(328, 1, 127, 1),
(329, 3, 127, 1),
(330, 1, 128, 1),
(331, 3, 128, 1),
(332, 1, 129, 1),
(333, 3, 129, 1),
(334, 3, 130, 1),
(335, 1, 131, 1),
(337, 3, 133, 1),
(339, 3, 135, 1),
(340, 3, 136, 2),
(341, 3, 137, 2),
(342, 3, 138, 1),
(343, 3, 139, 1),
(344, 3, 140, 1),
(345, 3, 141, 1),
(346, 3, 142, 1);

-- --------------------------------------------------------

--
-- Structure de la table `shippings`
--

CREATE TABLE `shippings` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zipcode` int(5) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `min_date` date DEFAULT NULL,
  `max_date` date DEFAULT NULL,
  `id_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `shippings`
--

INSERT INTO `shippings` (`id`, `firstname`, `lastname`, `address`, `zipcode`, `city`, `country`, `min_date`, `max_date`, `id_order`) VALUES
(1, 'Thomas', 'Serdjebi', '3 Rue Pointe à Pitre', 13006, 'marseille', 'france', NULL, NULL, NULL),
(2, 'Thomas', 'Serdjebi', '4 Rue Adrien', 13006, 'marseille', 'france', NULL, NULL, NULL),
(6, 'Thomas', 'Admin', '4 Rue Adrien', 13006, 'Marseille', 'france', NULL, NULL, NULL),
(13, 'Thomas', 'Serdjebi', '4 Rue Adrien', 13006, 'Marseille', 'france', NULL, NULL, NULL),
(14, 'Thomas', 'Serdjebi', '3 Rue Pointe à Pitre', 13006, 'Marseille', 'FRANCE', NULL, NULL, NULL),
(15, 'Thomas', 'Serdjebi', '3 Rue Pointe à Pitre', 13006, 'Marseille', 'FRANCE', NULL, NULL, NULL),
(17, 'Thomas', 'Serdjebi', '3 Rue Pointe à Pitre', 13007, 'Marseille', 'france', NULL, NULL, 106),
(18, 'Thomas', 'Serdjebi', '4 Rue Adrien', 13006, 'Marseille', 'france', NULL, NULL, 107),
(19, 'Thomas', 'Serdjebi', '4 Rue Adrien', 13006, 'Marseille', 'france', NULL, NULL, 108),
(20, 'Thomas', 'Serdjebi', '4 Rue Adrien', 13006, 'Marseille', 'france', NULL, NULL, 108),
(21, 'Thomas', 'Serdjebi', '4 Rue Adrien', 13006, 'Marseille', 'france', NULL, NULL, 109),
(22, 'Thomas', 'Serdjebi', '4 Rue Adrien', 13006, 'Marseille', 'france', NULL, NULL, 110),
(23, 'Toto', 'Toto', 'Tetet', 13003, 'marseille', 'marseille', NULL, NULL, 111),
(24, 'Stephane', 'Mathieu', 'Test', 13003, 'marseille', 'france', NULL, NULL, 112),
(25, 'Toto', 'Tata', 'Hy', 13225, 'marseille', 'france', NULL, NULL, 113),
(26, 'Ddd', 'Dd', 'Dd', 12204, 'dd', 'dd', NULL, NULL, 114),
(27, 'Dd', 'Dd', 'Ddd', 15599, 'ccc', 'france', NULL, NULL, 115),
(28, 'Tr', 'Yr', 'Ytr', 13220, 'dd', 'dd', NULL, NULL, 116),
(29, 'Dd', 'Dd', 'Dd', 15555, 'd', 'd', NULL, NULL, 117),
(30, 'Ffh', 'Uu', 'U', 13220, 'fjhfuh', 'uhf', NULL, NULL, 118),
(31, 'Knihi', 'Hifhioh', 'Io', 13220, 'ffmlk', 'pok', NULL, NULL, 119),
(32, 'Dugi', 'Jfnfj', 'Ojjfjip', 15466, 'fmff', 'fff', NULL, NULL, 120),
(33, 'Dkn', 'Fio', 'Iji', 13220, 'ff', 'fff', '2022-03-15', '2022-03-20', 121),
(34, 'Stephane', 'Mathieu', 'Ufhuhu', 13003, 'marseille', 'france', '2022-03-15', '2022-03-20', 122),
(35, 'Stephane', 'D', 'D', 13220, 'dd', 'dd', '2022-03-20', '2022-03-25', 123),
(36, 'Stephane', 'Mathieu', 'Dddhju', 13220, 'dd', 'dd', '2022-03-21', '2022-03-26', 124),
(37, 'Cdd', 'Dd', 'Fjfnj', 13003, 'dpko', 'gta', NULL, NULL, 125),
(38, 'Dff', 'Ffji', 'Fnf', 13003, 'fklfni', 'fnjf', NULL, NULL, 127),
(39, 'Fkln', 'Fl', ',jojf', 13003, 'flm,nfk', 'ff', NULL, NULL, 128),
(40, 'Stephane', 'Stephane', 'Tetet', 13003, 'marseille', 'france', '2022-03-28', '2022-04-02', 129),
(41, 'Ccvf', 'F', 'F', 13220, 'ff', 'f', NULL, NULL, 130),
(42, 'Dfjnj', 'Jfnj', 'Njfnjn', 13220, 'ff', 'f', '2022-03-29', '2022-04-03', 131),
(46, 'Test', 'Dd', 'Dd', 13003, 'df', 'f', NULL, NULL, 135),
(47, 'Toto', 'D', 'D', 13220, 'dd', 'd', NULL, NULL, 137),
(48, 'F', 'D', 'F', 13003, 'ff', 'ff', NULL, NULL, 138),
(49, 'Toto', 'Stephane', 'Tetet', 13220, 'marseille', 'france', '2022-04-10', '2022-04-15', 139),
(50, 'Toto', 'D', 'D', 13003, 'd', 'd', '2022-04-18', '2022-04-23', 140),
(51, 'Stephane', 'Stephane', 'Tetet', 13220, '444', 'f', '2022-04-18', '2022-04-23', 141),
(52, 'Admin', 'Stephane', 'D', 13003, 'd', 'ff', '2022-04-18', '2022-04-23', 142);

-- --------------------------------------------------------

--
-- Structure de la table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `sub_category` varchar(255) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `sub_category`, `id_category`) VALUES
(1, 'Briquets électriques', 1),
(2, 'Briquets essence', 1),
(3, 'Briquets cigare', 1),
(4, 'Briquet Bic', 2),
(5, 'Briquets Clipper', 2),
(6, 'Briquets Zippo', 3),
(7, 'Étui Zippo', 3),
(8, 'Accessoires Zippo', 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `number` varchar(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `firstname`, `lastname`, `password`, `address`, `number`, `date`, `role`) VALUES
(2, 'admin@gmail.com', 'admin', 'admin', '$2y$10$98scaeOzaYCjsDE9sLcZxuLnD66xQdeAwuvIMSc4a.Gu/p68nww9m', 'admin', '102030405', '2022-02-21', 'admin'),
(6, 'dd@gmail.com', 'admin', 'dd', '$2y$10$NFOzcvir55c0V/CEVpJX/O/d3RAHIAoFxfHBU9QtW1J..6yeIk7k6', 'ddd', '1978948', '2022-02-24', 'utilisateur'),
(8, 'jj@gmail.com', 'testto', 'tto', '$2y$10$YGq89NeKwSWhTDwpkdoRIe2ifTXm3igCfBcSxJMSyDLrxNEggJUCS', 'dd', '202025055', '2022-02-24', 'admin'),
(11, 'azerty@gmail.com', 'toto', 'Fjiji', '$2y$10$05ZA1TmSGgtDXFdcB97pfudcFPWUPsUCZAovvVeMSUDxSdrxcLymK', 'ddd', '789456469', '2022-03-15', 'admin'),
(12, 'aze@gmail.com', 'Test', 'Udguig', '$2y$10$8T18hJcOVcAHiR3AAkGvWuRdgaCRMQZUynXf8DGP3J8AY2WW3ylIW', 'dd,kij', '442784555', '2022-03-15', 'utilisateur'),
(13, 'azedd@gmail.com', 'Test', 'Udguig', '$2y$10$CaLfgybAPiu9lH8f2UIPb.7jFZtF2pqm15ejWfNuk.D1WjMccX4Ma', 'dd,kij', '442784555', '2022-03-15', 'utilisateur'),
(14, 'azedddd@gmail.com', 'Test', 'Udguig', '$2y$10$yo2CeTAH2KGPCI5tSWe4IOfRxbQADcPdYdH1CUAn4jpspGZaaWUtq', 'dd,kij', '0442784555', '2022-03-15', 'utilisateur'),
(15, 'jol@gmail.com', 'Testo', 'Tes', '$2y$10$P5kYaBXI1hCkgdxmf0Y6QuJgh14WvlLHAn3p4cyBuDpPlpTCe1Yx2', 'adrress', '0789562545', '2022-03-28', 'utilisateur'),
(18, 'hfh@gmail.com', 'jfbjk', 'kfnj', '$2y$10$.qU.O08pZrVinDaE7VWEgulB.gR/crd.FTjQqPz8cAUeCn75HAXPa', 'jfj', '0442784555', '2022-04-05', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_payment_type` (`id_payment_type`);

--
-- Index pour la table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_sub_category` (`id_sub_category`);

--
-- Index pour la table `products_orders`
--
ALTER TABLE `products_orders`
  ADD PRIMARY KEY (`id_product_order`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_order` (`id_order`);

--
-- Index pour la table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`);

--
-- Index pour la table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT pour la table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `products_orders`
--
ALTER TABLE `products_orders`
  MODIFY `id_product_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

--
-- AUTO_INCREMENT pour la table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_payment_type`) REFERENCES `payment_types` (`id`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`id_sub_category`) REFERENCES `sub_categories` (`id`);

--
-- Contraintes pour la table `products_orders`
--
ALTER TABLE `products_orders`
  ADD CONSTRAINT `products_orders_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `products_orders_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`);

--
-- Contraintes pour la table `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`);

--
-- Contraintes pour la table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
