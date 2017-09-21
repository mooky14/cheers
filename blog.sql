-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 21, 2017 at 12:34 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'modo'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `token`, `role`) VALUES
(1, 'Administrateur', 'admin@localhost', '70ccd9007338d6d81dd3b6271621b9cf9a97ea00', 'FantZ2s6G4UXRRX9rvOl', 'admin'),
(2, 'Vanmerris Clément', 'clement.vanmerris@laposte.net', '', 'DBVB0qRwydU25ik9LBVhbiHcDpmhkD', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `post_id`, `date`, `seen`) VALUES
(6, 'sqfdsf', 'clement.vanmerris@laposte.net', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam libero arcu, porta at ipsum vel, aliquam pretium elit. Suspendisse et magna leo. Quisque molestie purus a lorem suscipit varius. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque orci tortor, suscipit sed luctus ut, ullamcorper sed mi. Vestibulum egestas risus vel nisi malesuada aliquam. Sed fringilla fringilla odio, nec accumsan ligula. Etiam ornare eros lorem, a condimentum nisl dictum ut. Praesent vestibulum fringilla pellentesque. Aliquam erat volutpat. Ut eros est, pharetra et mi non, ultrices pulvinar sem. Phasellus sem est, maximus aliquam laoreet id, bibendum a ante. Donec sit amet eleifend nunc.\r\n\r\nIn tincidunt ipsum sed arcu dapibus iaculis. Nunc dignissim pharetra nisi, id accumsan sapien. Praesent pulvinar enim metus, dapibus pharetra felis imperdiet a. Nam venenatis turpis a sapien congue consequat. Cras pretium ullamcorper lacus non ullamcorper. Nullam imperdiet, lectus sit amet elementum elementum, sem risus sodales sapien, non elementum tellus turpis at lacus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed lacinia elementum feugiat.\r\n\r\nMauris rhoncus, justo at ultrices posuere, sem nunc laoreet nulla, ut mollis elit urna eget nisi. Praesent fringilla ipsum dui, at blandit velit cursus in. Praesent vulputate facilisis laoreet. Donec quis sapien risus. Fusce nec sapien sed est volutpat fermentum. Quisque nec massa facilisis elit tincidunt cursus. Donec aliquam elit in erat condimentum, sed porttitor enim dictum. Mauris venenatis scelerisque leo, vitae tempus ligula varius id.\r\n\r\nNulla placerat vitae justo id maximus. Phasellus pellentesque sapien urna. Vestibulum dictum, magna eu commodo egestas, mi nibh fermentum libero, eget venenatis lacus nunc sit amet nulla. Cras interdum ex at elit egestas, at efficitur lacus ultrices. Mauris eu massa felis. Nunc sed ex vitae tellus egestas blandit. In viverra nisl non fringilla lacinia.\r\n\r\nDonec mattis orci ac odio consectetur, vel vehicula neque pellentesque. Nunc a ipsum sollicitudin, euismod justo ac, porta nisi. Nam ornare neque eget malesuada scelerisque. Nulla vitae sem urna. Nullam quis ipsum consequat ipsum vestibulum blandit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae commodo elit. In hac habitasse platea dictumst. Maecenas vitae mattis velit. Nam laoreet nisi ut lorem luctus gravida.', 3, '2017-06-16 15:32:09', 1),
(7, 'lulu', 'stanislas.lintot@gmail.com', 'fddfg', 3, '2017-09-07 11:41:11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `magasins`
--

CREATE TABLE IF NOT EXISTS `magasins` (
  `id_magasin` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `usershop` varchar(255) NOT NULL,
  `naissance` varchar(255) NOT NULL,
  `ville_magasin` varchar(255) NOT NULL,
  `postal_magasin` int(10) NOT NULL,
  `adresse_magasin` varchar(255) NOT NULL,
  `telephone_magasin` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magasins`
--

INSERT INTO `magasins` (`id_magasin`, `id_utilisateur`, `usershop`, `naissance`, `ville_magasin`, `postal_magasin`, `adresse_magasin`, `telephone_magasin`) VALUES
(10, 2, 'Bar1', '774230400', 'Rouen', 76000, '1 Boulevard Maréchal Juin', '0600000000'),
(11, 6, 'Troptoplemag', '774230400', 'Rouen', 76000, '12 impasse Duboc', '0600000000'),
(12, 2, 'Bar1', '861926400', 'Caen', 14000, '1 Boulevard Maréchal Juin', '0605070901');

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(1, 'Love.Fish', '580 Darling Street, Rozelle, NSW', -33.861034, 151.171936, 'restaurant'),
(2, 'Young Henrys', '76 Wilford Street, Newtown, NSW', -33.898113, 151.174469, 'bar'),
(3, 'Hunter Gatherer', 'Greenwood Plaza, 36 Blue St, North Sydney NSW', -33.840282, 151.207474, 'bar'),
(4, 'The Potting Shed', '7A, 2 Huntley Street, Alexandria, NSW', -33.910751, 151.194168, 'bar'),
(5, 'Nomad', '16 Foster Street, Surry Hills, NSW', -33.879917, 151.210449, 'bar'),
(6, 'Three Blue Ducks', '43 Macpherson Street, Bronte, NSW', -33.906357, 151.263763, 'restaurant'),
(7, 'Single Origin Roasters', '60-64 Reservoir Street, Surry Hills, NSW', -33.881123, 151.209656, 'restaurant'),
(8, 'Red Lantern', '60 Riley Street, Darlinghurst, NSW', -33.874737, 151.215530, 'restaurant');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `writer` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'post.png',
  `date` datetime NOT NULL,
  `posted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `writer`, `image`, `date`, `posted`) VALUES
(3, 'Le framework MaterializeCSS', 'Material Design\r\nCréé et conçu par Google, le Material Design est un langage de conception qui combine les principes classiques d''un design réussi ainsi que l''innovation et la technologie. Le but de Google et de développer une technique de conception pour une expérience utilisateur unifiée au travers de leurs produits sur n''importe quelle plateforme.\r\n\r\nMaterial est la métaphore\r\nLa métaphore du Material Design définie la relation entre l''espace et le mouvement. L''idée est que la technologie est inspirée du papier et de l''encre et est utilisée afin de faciliter la création et l''innovation. Surfaces et bords fournissent des repères visuels familiers qui permettent aux utilisateurs de comprendre rapidement la technologie au-delà du monde physique.\r\n\r\nFranc, animé, voulu\r\nLes éléments et les composants tels que grilles, typographie, couleurs et médias ne sont pas seulement plaisants à voir, il créent aussi un sens de la hiérarchie, du sens et de l''attention.\r\n\r\nLe mouvement donne du sens\r\nLe mouvement permet à l''utilisateur de faire la parallèle entre ce qu''il voit à l''écran et la vie réelle. En fournissant à la fois un retour et de la familiarité, ceci permet à l''utilisateur de s’immerger aisément dans une technologie nouvelle. Le mouvement est cohérent et continu en plus de donner à l''utilisateur des informations supplémentaires sur les élements et trasnformations.', 'admin@localhost', '3.jpg', '2017-06-16 12:21:11', 1),
(20, 'Article avec image d''un bureau', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet magna eget iaculis sollicitudin. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque mi nisi, aliquet non viverra eget, hendrerit eleifend enim. Praesent finibus tortor at scelerisque varius. Etiam malesuada eros lobortis neque ullamcorper, quis aliquet arcu ornare. Nam vulputate quam turpis, eget varius massa lacinia ut. Phasellus laoreet maximus consectetur. Nam pulvinar arcu massa, in aliquam diam tempus at. Ut ac quam cursus elit porttitor aliquam pharetra sed ligula. Nam eleifend eleifend erat, a congue nisi. Duis dapibus facilisis nulla, a gravida velit posuere vel. Suspendisse ac iaculis lacus. Integer ornare velit sapien, ac vulputate arcu ultricies nec. Suspendisse id felis sagittis, eleifend neque tempor, egestas ligula. Cras quis diam consectetur, pharetra justo facilisis, dictum ipsum. Suspendisse nec mauris a nibh iaculis convallis in sit amet justo.\r\n\r\nPhasellus purus nunc, pharetra at neque nec, semper placerat eros. Maecenas vel commodo nunc. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed ultrices mauris vel dapibus dignissim. Duis porttitor a augue at blandit. Nulla facilisi. Quisque iaculis, eros vitae egestas pulvinar, dolor sapien ultricies massa, eget imperdiet erat mi id dui. Pellentesque et pretium purus. Aenean lacinia turpis quis orci fringilla pellentesque. Praesent at dapibus justo, eget interdum nulla.\r\n\r\nPhasellus in sapien laoreet, ullamcorper orci vitae, congue erat. Donec nec pharetra mi, eu accumsan risus. Mauris vestibulum justo ultrices venenatis semper. Donec rhoncus, justo a ullamcorper tempus, leo felis varius ex, quis hendrerit velit purus et dui. Suspendisse sed nibh risus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus eros elit, tempus id lacus sit amet, vulputate porta enim. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum commodo felis lacus, vel aliquet ligula ultricies sed.\r\n\r\nEtiam condimentum felis eu nisl vestibulum suscipit. In mollis sodales leo, vitae pretium odio faucibus vel. Nulla porttitor accumsan nunc, vitae ornare tortor dignissim ac. Etiam pretium, ipsum non ultrices pharetra, tellus arcu porta nulla, ut scelerisque nunc tortor vel ligula. Quisque mi diam, fringilla nec sapien gravida, viverra cursus libero. Proin tristique lobortis enim, vel blandit sem. Donec posuere est vitae nibh suscipit, ut porttitor sem malesuada. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris at mauris at turpis egestas egestas. Aenean congue ullamcorper dolor sed varius. Integer nec malesuada est. Integer viverra mattis orci, at aliquet enim dictum nec.', 'admin@localhost', '20.jpg', '2016-01-08 20:54:46', 1),
(21, 'Salut les louslous', 'dljzpdhfgDHGIO iodhf osiichv soIDFH OIsdhf oSIDFH Oidhf ùoidshv so^duighuiopsdhfio^qSHF IOSDFH SIFH IOsdhfoi HSDOIH SDHI IHZ iodh osihdf siodhf OH DIFSUIDH FIZIUORFH sdhiof sdfhi oÂ IEHFOeifh iofozieruhfzefh ZEFH zerhg OEFH', 'admin@localhost', '21.jpg', '2017-06-14 15:55:13', 1),
(22, 'mldjgpg', 'pdkg^qdkgpolkqdp^kg', 'admin@localhost', 'post.png', '2017-06-16 08:57:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `email_utilisateur` text NOT NULL,
  `password_utilisateur` text NOT NULL,
  `nom_utilisateur` text,
  `prenom_utilisateur` text,
  `naissance_utilisateur` int(11) NOT NULL,
  `ville_utilisateur` text,
  `postal` int(10) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `telephone` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `email_utilisateur`, `password_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `naissance_utilisateur`, `ville_utilisateur`, `postal`, `adresse`, `telephone`) VALUES
(1, 'clement', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'van', 'clement', 773020800, 'rouen', NULL, NULL, '0600000000'),
(2, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test', 'test', -122605200, 'test', NULL, NULL, '0235000000'),
(5, 'Michel', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'vanmerris', 'clément', 774230400, 'Rouen', 76000, '12 impasse duboc', '0600000000'),
(6, 'jean', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'mich', 'jean', 774230400, 'Rouen', 76000, '12 impasse Duboc', '0600000001'),
(7, 'test3', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test3', 'test3', 861926400, 'bagdad', 50000, '12 rue maréchal petin', '0645894594'),
(8, 'lulu', '4ec844dae165816ebad5cb5ed77840e2484047d6', 'jakie', 'lulu', 861926400, 'Caen', 14000, '27 rue du jardin Barbetlod', '0648594632');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `magasins`
--
ALTER TABLE `magasins`
  ADD PRIMARY KEY (`id_magasin`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `magasins`
--
ALTER TABLE `magasins`
  MODIFY `id_magasin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
