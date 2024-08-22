-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 22 août 2024 à 14:01
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_it_shop_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(500) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `brand`
--

INSERT INTO `brand` (`id`, `name`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `created_by`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Samung', 'Samung', 'Samung', 'description', 'keywords', 1, 0, 0, '2024-07-13 13:33:50', '2024-07-13 14:50:39'),
(2, 'Dell', 'Dell', 'Dell_Dell', '500GO SSD de mémoire 16 de RAM', 'Dell_Dell 1', 1, 0, 0, '2024-07-13 13:39:36', '2024-07-13 14:50:37'),
(3, 'HP', 'hp', 'hp', '', '', 1, 0, 0, '2024-07-23 01:32:28', '2024-07-23 01:32:28'),
(4, 'IPHONE', 'iphone', 'iphone', '', '', 1, 0, 0, '2024-07-23 01:32:51', '2024-07-23 01:32:51'),
(5, 'Lenovo', 'lenovo', 'lenovo', '', '', 1, 0, 0, '2024-07-23 01:33:11', '2024-07-23 01:33:11'),
(6, 'MAC', 'mac', 'mac', '', '', 1, 0, 0, '2024-07-23 01:33:35', '2024-07-23 01:33:35'),
(7, 'THINKPAD', 'thinkpad', 'thinkpad', '', '', 1, 0, 0, '2024-07-23 01:34:15', '2024-07-23 01:34:15');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `is_delete`, `created_at`, `updated_at`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `created_by`) VALUES
(10, 'Téléphone', 0, 0, '2024-07-18 10:27:13', '2024-07-18 10:27:13', 'Téléphone_', '#Téléphone', 'Les bons téléphone', 'Téléphone_Téléphone_', 1),
(11, 'Ordinateurs', 0, 0, '2024-07-18 10:28:29', '2024-07-18 10:28:29', 'Ordinateurs_', '#Ordinateurs', 'Ordinateurs neufs tous venus des USA', 'Ordinateurs_Ordinateurs_', 1),
(12, 'Automobile', 0, 0, '2024-07-18 10:30:58', '2024-07-18 10:30:58', '#Automobile', 'Automobile_', 'Automobile des USA, Du CANADA 🍁 et de la CHINE', 'Automobile_Automobile', 1),
(13, 'Télévison 📺', 0, 0, '2024-08-01 22:33:29', '2024-08-01 22:33:29', 'tele', 'television de haute game', 'des bonnes télévisions', '#teleecran', 1);

-- --------------------------------------------------------

--
-- Structure de la table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `color`
--

INSERT INTO `color` (`id`, `name`, `code`, `created_by`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'noir test', '#000000', 1, 0, 0, '2024-07-14 00:23:26', '2024-07-14 01:00:48'),
(2, 'rouge', '#c73333', 1, 0, 0, '2024-07-14 00:26:26', '2024-07-14 00:26:26'),
(3, 'noira', '#908989', 1, 0, 0, '2024-07-14 00:56:26', '2024-07-14 00:56:26'),
(4, 'noir', '#000000', 1, 0, 0, '2024-07-14 00:56:34', '2024-07-14 00:56:34'),
(5, 'noir', '#080808', 1, 0, 1, '2024-07-14 00:56:52', '2024-07-25 23:16:17'),
(6, 'noir', '#2b2626', 1, 0, 1, '2024-07-14 00:57:09', '2024-07-25 23:16:15'),
(7, 'noires', '#000000', 1, 0, 1, '2024-07-14 00:57:39', '2024-07-25 23:16:12');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `old_price` double NOT NULL DEFAULT 0,
  `price` double NOT NULL DEFAULT 0,
  `short_description` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `additional_information` text DEFAULT NULL,
  `shipping_returns` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:active, 1: inactive',
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 : not delete, 1:delete',
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `title`, `slug`, `sku`, `category_id`, `sub_category_id`, `brand_id`, `old_price`, `price`, `short_description`, `description`, `additional_information`, `shipping_returns`, `status`, `is_delete`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Ordinateur', 'ordinateur', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-07-14 00:02:28', '2024-07-14 00:02:28'),
(2, 'Téléphone', 'telephone', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-07-14 00:03:04', '2024-07-14 00:03:04'),
(3, 'Télévision 📺', 'television', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-07-14 00:03:19', '2024-07-14 00:03:19'),
(4, 'Machine à laver', 'machine-a-laver', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-07-15 09:18:32', '2024-07-15 09:18:32'),
(5, 'Montres', 'montres', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-07-15 09:22:50', '2024-07-15 09:22:50'),
(6, 'Montres', 'montres-6', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-07-15 09:23:25', '2024-07-15 09:23:25'),
(7, 'Voitures🚙', 'voitures', 'mng', 12, 16, 4, 10001211, 10000, 'la brève', 'dede', 'frfr', '<p>vbvb</p>', 0, 0, 1, '2024-07-15 11:19:26', '2024-08-09 16:11:48');

-- --------------------------------------------------------

--
-- Structure de la table `product_color`
--

CREATE TABLE `product_color` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `product_color`
--

INSERT INTO `product_color` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(195, 7, 4, '2024-08-22 11:45:56', '2024-08-22 11:45:56'),
(196, 7, 1, '2024-08-22 11:45:56', '2024-08-22 11:45:56'),
(197, 7, 3, '2024-08-22 11:45:56', '2024-08-22 11:45:56');

-- --------------------------------------------------------

--
-- Structure de la table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `image_extension` varchar(25) DEFAULT '100',
  `order_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image_name`, `image_extension`, `order_by`, `created_at`, `updated_at`) VALUES
(1, 7, '7_crx2poknvg23fnlcodaa.jpg', 'jpg', 1, '2024-08-22 09:41:48', '2024-08-22 09:41:48'),
(2, 7, '7_sfulgmnmnziyhm0rlvcy.jpg', 'jpg', 2, '2024-08-22 09:41:48', '2024-08-22 09:41:48'),
(3, 7, '7_wnqozw80joo4rm7uyyse.jpg', 'jpg', 3, '2024-08-22 09:41:48', '2024-08-22 09:41:48'),
(4, 7, '7_nbbyndm1cvnrsmgyxhmt.jpg', 'jpg', 4, '2024-08-22 09:41:48', '2024-08-22 09:41:48'),
(5, 7, '7_qnsyrmu4rdymufzocwm8.jpg', 'jpg', 5, '2024-08-22 09:41:48', '2024-08-22 09:41:48'),
(6, 7, '7_dj4e0xynjdydk0zfvftk.jpg', 'jpg', 1, '2024-08-22 11:45:57', '2024-08-22 11:45:57');

-- --------------------------------------------------------

--
-- Structure de la table `product_size`
--

CREATE TABLE `product_size` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `product_size`
--

INSERT INTO `product_size` (`id`, `product_id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(146, 7, 'taille 1', 100, '2024-08-22 11:45:57', '2024-08-22 11:45:57'),
(147, 7, 'taille 2', 200, '2024-08-22 11:45:57', '2024-08-22 11:45:57'),
(148, 7, 'taille 3', 300, '2024-08-22 11:45:57', '2024-08-22 11:45:57');

-- --------------------------------------------------------

--
-- Structure de la table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sub_category`
--

INSERT INTO `sub_category` (`id`, `name`, `status`, `is_delete`, `created_at`, `updated_at`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `created_by`, `category_id`) VALUES
(11, 'Voiture toyota', 0, 0, '2024-07-18 10:32:43', '2024-07-18 10:41:56', 'voiture', '#voiture', 'les bonnes voitures', 'voitures_voitures_', 1, 12),
(12, 'moto', 0, 0, '2024-07-18 10:41:15', '2024-07-18 10:41:15', '#moto', '_moto_moto', 'les motos de courses et de transport à usage commerciale', 'momo-de-course', 1, 12),
(13, 'ordinateur portable', 0, 0, '2024-07-23 01:18:59', '2024-07-23 01:18:59', 'ordiateur p', 'ordinateur p', 'les ordi', 'meta2', 1, 11),
(14, 'ordinateur fixe', 0, 0, '2024-07-23 01:19:35', '2024-07-23 01:19:35', 'ordinateur fix', 'ordi fixe', 'les ordis fixe', 'meta3', 1, 11),
(15, 'samsumg', 0, 0, '2024-07-23 01:20:31', '2024-07-23 01:20:31', 'samsumg', 'samsumg galaxie s', 'les damsungs', 'meta4', 1, 10),
(16, 'Iphone', 0, 0, '2024-07-23 01:21:04', '2024-07-23 01:21:04', 'Iphoe 15 Pro', 'Iphone 15 promax', 'les iphones', 'meta1', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(4) DEFAULT 1 COMMENT '0:customer, 1: admin',
  `status` tinyint(11) NOT NULL DEFAULT 1 COMMENT '1:actif, 0 : innactif',
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:not, 1: deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`, `status`, `is_delete`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$4x0rPwI4LLKQbkDs/Xgc4Oqo3.jpxpGeSD4n7NN1rCY6XmBFGkH4y', NULL, '0000-00-00 00:00:00', NULL, 1, 0, 0),
(4, 'utilisateur 1', 'utilisateur1@gmail.com', NULL, '$2y$10$0/B610t6pKjxNzGxtnjYi.H.r2pIQSk8qHoA.mIyuXqDo/WkwO86i', NULL, '2024-07-11 18:03:01', '2024-07-11 18:03:01', 1, 0, 0),
(5, 'utilisateur 2', 'utilisateur2@gmail.com', NULL, '$2y$10$me6NLJbF1YoFpTihfebHMuhN2P1zFDydf1RvBCzCkXgAWfhOJXzUS', NULL, '2024-07-11 18:03:31', '2024-07-11 18:03:45', 1, 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT pour la table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT pour la table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
