-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 16 avr. 2024 à 10:12
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_course`
--

-- --------------------------------------------------------
--
-- Table de Stockage des adresses e-mail des abonnés
--
DROP TABLE IF EXISTS `subscribers`;
CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

--
-- Table de Stockage des utilisaterus
--
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

--
-- Structure de la table `chauffeurs`
--

DROP TABLE IF EXISTS `chauffeurs`;
CREATE TABLE IF NOT EXISTS `chauffeurs` (
  `chauffeur_id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `telephone` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `sexe` varchar(8) COLLATE utf8mb4_general_ci NOT NULL,
  `disponible` varchar(3) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`chauffeur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Structure de la table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` int NOT NULL AUTO_INCREMENT,
  `point_depart` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `point_arrivee` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `date_heure` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `chauffeur_id` int NOT NULL,
  `statut` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`course_id`),
  KEY `chauffeur_course` (`chauffeur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO users (email, password) VALUES ('test@example.com', '$2y$10$VbNJG8S/5lNnZl8NqjQoeOx8FbyoZBSeZ.6FvQs9.YYEvf/mGFU2a'); // password: 'password'

--
-- Déchargement des données de la table `chauffeurs`
--

INSERT INTO `chauffeurs` (`chauffeur_id`, `nom`, `prenom`, `telephone`, `sexe`, `disponible`) VALUES
(1, 'DOSSOU', 'Roger Koffi', '+22960606060', 'Masculin', 'Oui'),
(2, 'DANSOU', 'Richard', '+22950505050', 'Masculin', 'Oui');

-- --------------------------------------------------------


--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `chauffeur_course` FOREIGN KEY (`chauffeur_id`) REFERENCES `chauffeurs` (`chauffeur_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
