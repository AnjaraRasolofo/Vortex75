-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 09 mai 2025 à 13:05
-- Version du serveur : 10.11.11-MariaDB-0+deb12u1
-- Version de PHP : 8.2.28

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
-- Structure de la table `ressources`
--

CREATE TABLE `ressources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `contenu` text NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `categorie_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_publication` date DEFAULT NULL,
  `status` enum('brouillon','publie') NOT NULL DEFAULT 'brouillon',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ressources`
--

INSERT INTO `ressources` (`id`, `titre`, `slug`, `contenu`, `image`, `categorie_id`, `user_id`, `date_publication`, `status`, `created_at`, `updated_at`) VALUES
(1, 'L\'indicateur Ichimoku Kinko Hyo', 'lindicateur-ichimoku-kinko-hyo', '<p>L\'Ichimoku Kinko Hyo est un indicateur technique puissant utilisé en trading pour analyser la tendance, identifier les supports/résistances et générer des signaux de trading. Il est particulièrement efficace sur des indices de volatilité comme le VIX75 que tu trades.</p><p>&nbsp;</p><h2>Les Composantes de l\'Ichimoku</h2><p>&nbsp;</p><h3>Tenkan-Sen (Ligne de Conversion)</h3><p>&nbsp;</p><p>Considerer comme une moyenne mobile sur 9 périodes (par défaut). Le Tenkan-Sen Indique la tendance à court terme.</p><p>&nbsp;</p><h3>Kijun-Sen (Ligne Standard)</h3><p>&nbsp;</p><p>Considerer comme une moyenne mobile sur 26 périodes. Le Kijun-Sen sert de support/résistance et donne des signaux de confirmation.</p><p>&nbsp;</p><h3>Senkou Span A et B (Nuage Kumo)</h3><p>&nbsp;</p><ul><li><strong>Span A</strong> : Moyenne de Tenkan et Kijun, projetée 26 périodes en avant.</li><li><strong>Span B</strong> : Moyenne des 52 dernières périodes, projetée 26 périodes en avant.</li></ul><p>&nbsp;</p><p>Le Kumo (Nuage) représente la zone de support/résistance.</p><p>&nbsp;</p><h3>Chikou Span (Lagging Span)</h3><p>&nbsp;</p><p>Le chikou span est le prix de clôture actuel décalé 26 périodes en arrière. Il sert à valider les tendances et signaux.</p><p>&nbsp;</p><h2>Comment utiliser Ichimoku pour le Trading sur VIX75</h2><p>&nbsp;</p><h3>1. Identifier la Tendance</h3><p>&nbsp;</p><ul><li>Prix au-dessus du nuage = Tendance haussière&nbsp;</li><li>Prix en dessous du nuage = Tendance baissière&nbsp;</li><li>Prix dans le nuage = Consolidation / Incertitude&nbsp;</li></ul><p>&nbsp;</p><h3>2. Trouver des Signaux d\\\'Achat/Vente</h3><p>&nbsp;</p><p>Signal haussier :</p><ul><li>La Tenkan-Sen croise Kijun-Sen à la hausse.</li><li>Le prix franchit le nuage vers le haut.</li><li>Chikou Span est au-dessus des prix passés.</li></ul><p>Signal baissier :</p><ul><li>La Tenkan-Sen croise Kijun-Sen à la baisse.</li><li>Le prix franchit le nuage vers le bas.</li><li>Chikou Span est en dessous des prix passés.</li></ul><p>&nbsp;</p><h3>3. Définir les Stop-Loss &amp; Take-Profit</h3><p>&nbsp;</p><p>SL : Juste sous la Kijun-Sen ou sous le Kumo.</p><p>TP : En fonction des niveaux de résistance/support du Kumo.</p><h2>&nbsp;</h2><h2>Stratégie pour VIX75</h2><p>&nbsp;</p><p>Achat quand :</p><ul><li>Prix au-dessus du nuage.</li><li>Croisement haussier de Tenkan et Kijun.</li><li>Chikou Span confirme la tendance.</li></ul><p>&nbsp;Vente quand :</p><ul><li>Prix en dessous du nuage.</li><li>Croisement baissier de Tenkan et Kijun.</li><li>Chikou Span en dessous des prix.</li></ul>', 'ichimoku.jpg', 3, 1, '2024-08-08', 'publie', NULL, '2025-04-18 09:16:54'),
(2, 'les Moyennes Mobiles en Trading', 'les-moyennes-mobiles-en-trading', '<p>Les moyennes mobiles sont des indicateurs techniques essentiels pour analyser les tendances du marché. Elles permettent de lisser les variations de prix et d\\\'identifier des opportunités d’achat ou de vente.</p><p>&nbsp;</p><h2>1. Qu’est-ce qu’une moyenne mobile ?</h2><p>&nbsp;</p><p>Une moyenne mobile (MA - Moving Average) est un calcul basé sur le prix moyen d’un actif sur une période donnée. Elle aide à éliminer le \\\"bruit\\\" du marché et à détecter la tendance générale.</p><p>&nbsp;</p><p>Il existe plusieurs types de moyennes mobiles :</p><ul><li>✅ Moyenne Mobile Simple (SMA) : Calculée en faisant la moyenne des prix sur une période donnée.</li><li>✅ Moyenne Mobile Exponentielle (EMA) : Donne plus de poids aux prix récents, ce qui la rend plus réactive.</li><li>✅ Moyenne Mobile Pondérée (WMA) : Met encore plus l’accent sur les dernières valeurs.</li></ul><h2>&nbsp;</h2><h2>2. Comment utiliser les moyennes mobiles ?</h2><p>&nbsp;</p><h3>Identifier la tendance</h3><p>&nbsp;</p><ul><li>Si le prix est au-dessus de la MA, la tendance est haussière.</li><li>Si le prix est en dessous, la tendance est baissière.</li></ul><p>&nbsp;</p><h3>Les croisements de moyennes mobiles</h3><p>&nbsp;</p><ul><li><strong>Croisement haussier :</strong> Quand une moyenne mobile courte (ex: EMA 10) croise au-dessus d’une plus longue (ex: EMA 50) → Signal d’achat.</li><li><strong>Croisement baissier :</strong> Lorsque la moyenne courte passe sous la longue → Signal de vente.</li></ul><p>&nbsp;</p><h3>Utilisation comme support/résistance</h3><p>&nbsp;</p><p>Les MA peuvent aussi agir comme zones de support ou de résistance dynamiques où les prix rebondissent.</p><p>&nbsp;</p><h2>Conclusion</h2><p>Les moyennes mobiles sont des outils puissants pour analyser le marché et améliorer ses stratégies de trading. Expérimente-les sur un compte démo avant de les intégrer à ton plan de trading sur <a href=\"\\&quot;index.php\\&quot;\"><strong>Vortex75 !</strong></a></p>', 'mma.jpg', 10, 1, '2025-04-18', 'publie', NULL, '2025-04-20 20:44:05'),
(3, 'Débuter en Trading : Comprendre les Bases', 'debuter-en-trading-comprendre-les-bases', '<p>Le trading attire de plus en plus de particuliers à la recherche de revenus complémentaires ou d’indépendance financière. Mais avant de plonger dans cet univers fascinant, il est essentiel de comprendre les bases. Cet article vous guide pas à pas à travers les fondamentaux : le rôle des brokers, la notion de pip, et l’introduction au concept de Supply and Demand.&nbsp;</p><h3>1. Qu’est-ce que le trading ?&nbsp;</h3><p>Le trading consiste à acheter et vendre des actifs financiers (comme des devises, actions, indices ou matières premières) dans le but de réaliser un profit. Contrairement à l’investissement à long terme, le trading repose souvent sur des mouvements de prix à court terme.&nbsp;</p><h3>2. Le rôle du broker&nbsp;</h3><p>Pour accéder aux marchés financiers, vous avez besoin d’un broker (courtier). C’est une plateforme qui exécute vos ordres d’achat ou de vente. Les brokers peuvent être : Market Makers : Ils créent leur propre marché et sont la contrepartie de vos trades. ECN/STP : Ils transmettent vos ordres directement aux fournisseurs de liquidités (plus transparents, souvent avec des spreads plus serrés). Lorsque vous choisissez un broker, vérifiez qu’il est régulé, qu’il propose une interface simple et des frais compétitifs. Parmi les brokers populaires pour débuter : eToro, IG, XM, Exness, ou Deriv pour les indices synthétiques.&nbsp;</p><h3>3. Comprendre le pip</h3><p>Le pip (Point in Percentage) est l’unité de mesure utilisée pour exprimer la variation du prix sur les marchés, en particulier sur le Forex. Sur la plupart des paires de devises, un pip correspond à 0,0001. Exemple : Si l’EUR/USD passe de 1,1000 à 1,1010, il a bougé de 10 pips. Cette unité permet de calculer les gains ou les pertes d’un trade. Le gain dépend du nombre de pips gagnés et du lot (taille de la position) utilisé.&nbsp;</p><h3>4. Supply and Demand : une base de l’analyse technique&nbsp;</h3><p>Le concept de Supply and Demand (offre et demande) est fondamental en analyse technique. L’idée est simple : comme dans tout marché, les prix sont influencés par l’offre et la demande. Zones de supply (offre) : endroits où de nombreux vendeurs sont présents. Le prix a tendance à baisser à partir de ces zones. Zones de demand (demande) : endroits où de nombreux acheteurs sont présents. Le prix a tendance à monter à partir de ces zones. Le rôle du trader est d’identifier ces zones sur les graphiques (charts) pour prendre des décisions stratégiques : acheter en zone de demande, vendre en zone de supply.&nbsp;</p><h3>5. Conseils pour bien débuter&nbsp;</h3><ul><li>Commencez en compte démo pour vous entraîner sans risque.&nbsp;</li><li>Éduquez-vous : suivez des formations, lisez des livres, regardez des vidéos.&nbsp;</li><li>N’utilisez pas l’effet de levier sans comprendre les risques.&nbsp;</li><li>Restez discipliné et patient : le trading est une compétence qui se développe avec le temps.&nbsp;</li></ul><p>Le trading est une activité passionnante, mais exigeante. En maîtrisant les bases comme le rôle des brokers, la signification du pip, et les zones de Supply and Demand, vous posez les fondations d’une pratique solide et réfléchie.</p>', 'about.jpg', 10, 3, '2025-05-02', 'publie', '2025-05-02 09:27:07', '2025-05-02 09:30:37');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ressources`
--
ALTER TABLE `ressources`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ressources_slug_unique` (`slug`),
  ADD KEY `ressources_categorie_id_foreign` (`categorie_id`),
  ADD KEY `ressources_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ressources`
--
ALTER TABLE `ressources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ressources`
--
ALTER TABLE `ressources`
  ADD CONSTRAINT `ressources_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `ressources_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
