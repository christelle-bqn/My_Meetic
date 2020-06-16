-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 16 Juin 2020 à 13:36
-- Version du serveur :  5.7.30-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `my_meetup`
--

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

CREATE TABLE `groupes` (
  `id_groupe` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `permissions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `groupes`
--

INSERT INTO `groupes` (`id_groupe`, `nom`, `permissions`) VALUES
(1, 'Membre standard', ''),
(2, 'Administrateur', '(\"admin\": 1)');

-- --------------------------------------------------------

--
-- Structure de la table `loisirs`
--

CREATE TABLE `loisirs` (
  `id_loisirs` int(11) NOT NULL,
  `nom_loisirs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `loisirs`
--

INSERT INTO `loisirs` (`id_loisirs`, `nom_loisirs`) VALUES
(1, 'dance'),
(2, 'skateboard'),
(3, 'manga'),
(4, 'licorne'),
(5, 'cuisiner'),
(6, 'cinema');

-- --------------------------------------------------------

--
-- Structure de la table `loisirs_membres`
--

CREATE TABLE `loisirs_membres` (
  `id_membre` int(6) NOT NULL,
  `id_loisirs` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `loisirs_membres`
--

INSERT INTO `loisirs_membres` (`id_membre`, `id_loisirs`) VALUES
(2, 1),
(3, 1),
(1, 5),
(2, 2),
(3, 3),
(3, 4),
(4, 1),
(4, 4),
(4, 5),
(5, 2),
(5, 5),
(6, 4),
(6, 5),
(7, 2),
(7, 4),
(8, 1),
(8, 4),
(8, 5),
(9, 1),
(9, 3),
(9, 4),
(10, 1),
(10, 2),
(10, 5),
(11, 1),
(11, 3),
(11, 5),
(12, 1),
(12, 3),
(12, 4),
(12, 5),
(1, 6),
(1, 2),
(13, 1),
(13, 3),
(13, 4),
(13, 5);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id_membre` int(6) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `age` int(4) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mot_de_passe` char(64) NOT NULL,
  `statut` int(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id_membre`, `nom`, `prenom`, `date_naissance`, `age`, `genre`, `ville`, `email`, `mot_de_passe`, `statut`) VALUES
(2, 'Wayne', 'John', '1980-06-04', 39, 'Homme', 'Paris', 'john.wayne@mail.com', '$2y$10$O1r4ZrfHCt6V16ji7nK7Jep9a4wRbeCI3RY940M4Z4pHP0j.EnTry', 1),
(3, 'Arthur', 'Luke', '1987-09-17', 32, 'Agenre', 'Marseille', 'luke.arthur@mail.com', '$2y$10$HID2Ap5xZvlnYiNqiEASv.6ts6/nLWt2c/cgF4LwHYcgI5tSovSWu', 1),
(4, 'Maine', 'Emy', '1994-01-13', 26, 'Femme', 'Bordeaux', 'emy.maine@mail.com', '$2y$10$MWEMn2CqTfQh7GUbdMlL8ei1.3yTK2QNj/5KrkD/xAYzEkweZcy2G', 1),
(5, 'Smith', 'Alex', '1999-07-04', 20, 'Homme', 'Lyon', 'alex.smith@mail.com', '$2y$10$LcqZ86uvG/2sqcnRG0Ba9uSHRJB8RQ5VjYm2POoVjSl6zRQmhXLj2', 1),
(6, 'Saint', 'Ally', '1977-11-08', 42, 'Femme', 'Paris', 'ally.saint@mail.com', '$2y$10$2qDcTC9tRkc33yRNP/Dv7O3j6xenJb2O8Kpax9Jo0S79v1V1BegBC', 1),
(7, 'Hill', 'Danny', '2002-01-04', 18, 'Homme', 'Marseille', 'danny.hill@mail.com', '$2y$10$8d/S2SrN1.tOPqhyUuEsw.aHRwT3qMW9db1ywfiOLI8GOYrNg5q/u', 1),
(8, 'Fetcher', 'Jessica', '1989-04-06', 30, 'Femme', 'Paris', 'jessica.fetcher@mail.com', '$2y$10$9BqUxNNnknnPMX5wuMzWj.OnBUH7788HdTgYLMEbilWzSXpuBMT/q', 1),
(9, 'Park', 'Rachel', '1994-03-15', 25, 'Femme', 'Paris', 'rachel.park@mail.com', '$2y$10$eFGg/bIRgEJCPgGUp9J5auYucQYfjUx9bCxeiSzRR0G6xR3YfpvX6', 1),
(10, 'Richard', 'Matthew', '1984-12-02', 35, 'Homme', 'Paris', 'matthew.richard@mail.com', '$2y$10$CoMut.Jcrpej30.aPU0ve.6ek1xTKTOKo6PS0ZM8LnA7Y4qUOjEGa', 1),
(11, 'Kay', 'Nolan', '1978-09-05', 41, 'Homme', 'Paris', 'nolan.park@mail.com', '$2y$10$YJUf0VVwDEycn1njJZ6pE.1wE.sBbNrTG5V9xST0hE68X2LjFoYAO', 1),
(12, 'Dean', 'Lily', '1998-05-26', 21, 'Femme', 'Paris', 'lily.dean@mail.com', '$2y$10$PawpBWAnPeajDuglGaIiLOleV1shFkhKo0kKf2ypy6AlggSgk4kDK', 1),
(13, 'Lara', 'Merwan', '1997-09-11', 22, 'Homme', 'Paris', 'merwan.lara@mail.fr', '$2y$10$bTlor.XcMO.WinLDHEHYbuhN7Br.Jw1Bvc0yrkRxK9GpBJOiZA6.K', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `groupes`
--
ALTER TABLE `groupes`
  ADD PRIMARY KEY (`id_groupe`);

--
-- Index pour la table `loisirs`
--
ALTER TABLE `loisirs`
  ADD PRIMARY KEY (`id_loisirs`);

--
-- Index pour la table `loisirs_membres`
--
ALTER TABLE `loisirs_membres`
  ADD KEY `id_perso` (`id_membre`),
  ADD KEY `id_loisirs` (`id_loisirs`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id_membre`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `id_groupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `loisirs`
--
ALTER TABLE `loisirs`
  MODIFY `id_loisirs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id_membre` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
