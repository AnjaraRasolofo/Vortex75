-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 09 mai 2025 à 13:01
-- Version du serveur : 10.11.11-MariaDB-0+deb12u1
-- Version de PHP : 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vortex75`
--

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) NOT NULL,
  `company` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(8,2) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `company`, `type`, `description`, `prix`, `image`, `created_at`, `updated_at`) VALUES
(1, 'AI Gold Dust', 'Michael Prescott Burney ', 'Experts', 'AI GOLD DUST est un robot expert gratuit conçu pour XAUUSD sur le graphique H1, testé à l\'aide de données historiques sur 20 ans et validé sur six plateformes de courtiers majeures, y compris BlackBull, Darwin X, MetaQuotes Demo, FTMO, Dukascopy, et Eightcap. Avec une qualité de modélisation de 98 %, il garantit une analyse précise des données de marché et une exécution structurée des transactions.', 0.00, 'ai-gold-dust-logo-200x200-7029.png', NULL, NULL),
(2, 'Golden Thunder Basic', 'Adam Zolei', 'Expert', 'Golden Thunder Basic : l\'occasion idéale de tester gratuitement un expert en scalping pour le trading de l\'or.\r\nGolden Thunder Basic est le choix parfait pour ceux qui veulent explorer le potentiel du trading de l\'or avec ce robot scalping spécifiquement développé pour le XAUUSD. Cette version gratuite vous permet de tester les fonctions principales et la stratégie de Golden Thunder dans des conditions de marché réelles sans aucun risque. Elle offre les mêmes standards élevés que la version complète, fournissant une expérience précieuse dans les stratégies de trading sur l\'or.', 0.00, 'golden-thunder-basic-logo-200x200-8374.png', NULL, NULL),
(3, 'Stratos Bora', ' Michela Russo', 'Expert', 'Stratos Bora est un robot de trading pour le trading sur le forex. Conçu pour exploiter la puissance de l\'indicateur Ichimoku Kinko Hyo, il propose 12 stratégies pour répondre au style de chaque trader.\r\n\r\nQue vous soyez un trader chevronné ou que vous débutiez, Stratos Bora vous offre une expérience de trading transparente, vous assurant d\'être toujours à la pointe des opportunités du marché.', 0.00, 'stratos-bora-mt5-logo-200x200-5974.png', NULL, NULL),
(4, 'Stargogs Trendygridy EA', 'Lorenzo Edward Beukes', 'Expert', 'Ce robot de trading Forex est un système de trading automatisé puissant et adaptatif conçu pour fonctionner sur toutes les paires de devises et sur l\'or. Il utilise une stratégie de grille sur les marchés en tendance, ce qui lui permet de capitaliser sur les fortes variations de prix.', 0.00, 'stargogs-trendygridy-ea-logo-200x200-4191.png', NULL, NULL),
(5, 'Stratos Zephyr', 'Michela Russo', 'Expert', 'Stratos Zephyr est un robot de trading de pointe conçu pour le marché des changes, qui exploite la puissance de l\'indicateur RSI (Relative Strength Index). Avec 10 stratégies sophistiquées, Stratos Zephyr est conçu pour répondre à un large éventail de préférences de trading.\r\n\r\nQue vous soyez un trader expérimenté ou que vous débutiez sur le marché des changes, Stratos Zephyr offre une expérience de trading dynamique et intuitive, vous permettant de garder une longueur d\'avance dans le monde en constante évolution du trading sur le marché des changes.', 0.00, 'stratos-zephyr-mt5-logo-200x200-9164.png', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
