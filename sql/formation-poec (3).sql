-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 19 Juin 2017 à 09:56
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `formation-poec`
--

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entraineur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `couleur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `equipe`
--

INSERT INTO `equipe` (`id`, `nom`, `entraineur`, `couleur`, `logo`) VALUES
(1, 'real', 'zidane', 'noir,blanc', 'img/logo/real.png'),
(2, 'strasbourg', 'papin', 'bleu,blanc', 'img/logo/strasbourg.jpg'),
(3, 'france', 'didier', 'bleu,rouge', 'img/logo/france.png'),
(4, 'city', 'gardiola', 'bleu,blanc', ''),
(5, 'milan_ac', 'seedorf', 'rouge,noir', 'img/logo/milan_ac.jpg'),
(6, 'manchester', 'morigno', 'rouge,jaune', 'img/logo/manchester.png'),
(9, 'juvenus de turin', 'pirlo', 'noir,blanc', 'img/logo/juvenus-de-turin.jpg'),
(8, 'monaco', 'fdsgbf', 'noir,blanc', 'img/logo/monaco.png');

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `numero_maillot` int(3) NOT NULL,
  `equipe` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `joueur`
--

INSERT INTO `joueur` (`id`, `nom`, `prenom`, `age`, `numero_maillot`, `equipe`) VALUES
(36, 'alvaro', 'morata', 30, 21, '5'),
(2, 'cristino', 'ronaldo', 32, 1, '1'),
(3, 'sergio', 'ramos', 30, 1, '3'),
(54, 'DIEGO', 'Maradona', 55, 10, '5'),
(11, 'zinedine', 'zidane', 78, 10, '2'),
(35, 'TANDIA', 'MOHAMED', 44, 10, '5'),
(33, 'IKER', 'CASILLAS', 34, 1, '1'),
(41, 'Cristophe', 'dufour', 36, 16, '2'),
(32, 'LUCAS', 'VASQUEZ', 24, 14, '1'),
(37, 'KARIM', 'BENZEMA', 39, 9, '1'),
(50, 'aboubar', 'gally', 41, 5, '5'),
(49, 'DUOUR', 'DUFOUR', 41, 5, '5'),
(48, 'hhhhhhhhhhhh', 'gggggggggggggggg', 14, 3, '3'),
(51, 'fffffff', 'sssssss', 14, 2, '5'),
(52, 'KEVIN', 'PASCAL', 11, 7, '3');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `capitale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nb_habitants` int(11) NOT NULL,
  `superficie` int(11) NOT NULL,
  `langues` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `drapeau` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`id`, `nom`, `capitale`, `nb_habitants`, `superficie`, `langues`, `drapeau`) VALUES
(1, 'Italie', 'Rome', 62000000, 301336, 'italien', 'img/drapeaux/italie.png'),
(2, 'France', 'Paris', 64000000, 540000, 'français', 'img/drapeaux/france.png'),
(3, 'Roumanie', 'Bucarest', 20000000, 238391, 'roumain, hongrois', 'img/drapeaux/roumanie.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `role`) VALUES
(1, 'alfa', 'alfa', 'alfa@alfa.int', '1234', 'admin'),
(2, 'beta', 'beta', 'beta@beta.int', '1234', 'client');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
