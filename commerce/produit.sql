-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 14 mai 2019 à 11:03
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `form_commerce_debut`
--

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom`, `ref`, `prix`) VALUES
(1, 'Weisshorn', '210317 729', '399.95'),
(2, 'Cevedale Pro', '210050 609', '240.95'),
(3, 'Mountain Expert Evo', '210029 309', '297.41'),
(4, 'Renegade', '310945 426', '132.90'),
(5, 'Siesto', '310551 974', '119.96'),
(6, 'Bormio', '310914 967', '127.46'),
(7, 'Renegade Lo', '320960 034', '105.00'),
(8, 'Falco VCR', '430100 972', '116.96'),
(9, 'Rocket', '430117 990', '125.96'),
(10, 'X Boulder', '430112 303', '180.00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
