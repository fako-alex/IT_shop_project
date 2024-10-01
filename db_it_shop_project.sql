-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 25 sep. 2024 à 11:53
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
(1, 'Samung', 'Samung', 'Samung', 'description', 'keywords', 1, 0, 1, '2024-07-13 13:33:50', '2024-09-23 22:40:22'),
(2, 'Dell', 'Dell', 'Dell_Dell', '500GO SSD de mémoire 16 de RAM', 'Dell_Dell 1', 1, 0, 1, '2024-07-13 13:39:36', '2024-09-23 22:40:25'),
(3, 'HP', 'hp', 'hp', '', '', 1, 0, 1, '2024-07-23 01:32:28', '2024-09-23 22:40:24'),
(4, 'IPHONE', 'iphone', 'iphone', '', '', 1, 0, 1, '2024-07-23 01:32:51', '2024-09-23 22:40:27'),
(5, 'Lenovo', 'lenovo', 'lenovo', '', '', 1, 0, 1, '2024-07-23 01:33:11', '2024-09-23 22:40:28'),
(6, 'MAC', 'mac', 'mac', '', '', 1, 0, 1, '2024-07-23 01:33:35', '2024-09-23 22:40:29'),
(7, 'THINKPAD', 'thinkpad', 'thinkpad', '', '', 1, 0, 0, '2024-07-23 01:34:15', '2024-09-23 22:40:31'),
(8, 'Asus', 'asus', 'Asus', 'Asus laptops', 'asus, electronics, laptops', 1, 0, 0, '2024-09-24 00:42:37', '2024-09-24 00:42:37'),
(9, 'Dell', 'dell', 'Dell', 'Dell laptops', 'dell, electronics, laptops', 1, 0, 0, '2024-09-24 00:42:37', '2024-09-24 00:42:37'),
(10, 'HP', 'hp', 'HP', 'HP laptops', 'hp, electronics, laptops', 1, 0, 0, '2024-09-24 00:42:37', '2024-09-24 00:42:37'),
(11, 'Reebok', 'reebok', 'Reebok', 'Reebok sportswear', 'reebok, sports, fashion', 1, 0, 0, '2024-09-24 00:42:37', '2024-09-24 00:42:37'),
(12, 'Under Armour', 'under-armour', 'Under Armour', 'Under Armour sportswear', 'under armour, sports, fashion', 1, 0, 0, '2024-09-24 00:42:37', '2024-09-24 00:42:37'),
(13, 'Canon', 'canon', 'Canon', 'Canon cameras', 'canon, electronics, cameras', 1, 0, 0, '2024-09-24 00:42:37', '2024-09-24 00:42:37'),
(14, 'Nikon', 'nikon', 'Nikon', 'Nikon cameras', 'nikon, electronics, cameras', 1, 0, 0, '2024-09-24 00:42:37', '2024-09-24 00:42:37'),
(15, 'Lenovo', 'lenovo', 'Lenovo', 'Lenovo laptops', 'lenovo, electronics, laptops', 1, 0, 0, '2024-09-24 00:42:37', '2024-09-24 00:42:37'),
(16, 'Microsoft', 'microsoft', 'Microsoft', 'Microsoft software', 'microsoft, electronics, software', 1, 0, 0, '2024-09-24 00:42:37', '2024-09-24 00:42:37'),
(17, 'Google', 'google', 'Google', 'Google products', 'google, electronics, software', 1, 0, 0, '2024-09-24 00:42:37', '2024-09-24 00:42:37'),
(18, 'Panasonic', 'panasonic', 'Panasonic', 'Panasonic electronics', 'panasonic, electronics, tv', 1, 0, 0, '2024-09-24 00:42:37', '2024-09-24 00:42:37'),
(19, 'Bosch', 'bosch', 'Bosch', 'Bosch appliances', 'bosch, electronics, appliances', 1, 0, 0, '2024-09-24 00:42:37', '2024-09-24 00:42:37'),
(20, 'Philips', 'philips', 'Philips', 'Philips electronics', 'philips, electronics, appliances', 1, 0, 0, '2024-09-24 00:42:37', '2024-09-24 00:42:37'),
(21, 'Puma', 'puma', 'Puma', 'Puma sportswear', 'puma, sports, fashion', 1, 0, 0, '2024-09-24 00:42:37', '2024-09-24 00:42:37'),
(22, 'LG', 'lg', 'LG', 'LG electronics', 'lg, electronics, tv', 1, 0, 0, '2024-09-24 00:42:37', '2024-09-24 00:42:37'),
(23, 'Sony', 'sony', 'Sony', 'Sony electronics', 'sony, electronics, tv', 1, 0, 0, '2024-09-24 00:42:37', '2024-09-24 00:42:37'),
(24, 'Adidas', 'adidas', 'Adidas', 'Adidas sportswear', 'adidas, sports, fashion', 1, 0, 0, '2024-09-24 00:42:37', '2024-09-24 00:42:37'),
(25, 'Nike', 'nike', 'Nike', 'Nike sportswear', 'nike, sports, fashion', 1, 0, 0, '2024-09-24 00:42:37', '2024-09-24 00:42:37'),
(26, 'Samsung', 'samsung', 'Samsung', 'Samsung products', 'samsung, electronics, phones', 1, 1, 0, '2024-09-24 00:42:37', '2024-09-24 00:42:37'),
(27, 'Apple', 'apple', 'Apple', 'Apple products', 'apple, electronics, phones', 1, 1, 0, '2024-09-24 00:42:37', '2024-09-24 00:42:37'),
(28, 'Stephen Covey', 'Stephen-Covey', 'Stephen Covey', 'Stephen Covey', '', 1, 0, 0, '2024-09-23 22:59:42', '2024-09-23 22:59:42');

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
(10, 'Téléphone', 0, 0, '2024-07-18 10:27:13', '2024-09-23 21:00:35', 'Téléphone_', 'Téléphone', 'Les bons téléphone', 'Téléphone_Téléphone_', 1),
(11, 'Ordinateurs', 0, 0, '2024-07-18 10:28:29', '2024-09-23 21:00:39', 'Ordinateurs_', 'Ordinateurs', 'Ordinateurs neufs tous venus des USA', 'Ordinateurs_Ordinateurs_', 1),
(12, 'Automobile', 0, 0, '2024-07-18 10:30:58', '2024-09-23 21:00:43', 'Automobile', 'Automobile_', 'Automobile des USA, Du CANADA 🍁 et de la CHINE', 'Automobile_Automobile', 1),
(13, 'Télévison 📺', 0, 0, '2024-08-01 22:33:29', '2024-09-23 21:00:46', 'tele', 'television de haute game', 'des bonnes télévisions', '#teleecran', 1),
(14, 'Accessoires', 0, 0, '2024-09-06 15:14:00', '2024-09-23 21:00:48', 'accessoires', 'les accessoires', 'Des accessoires de tous les genres.', 'accessoires', 1),
(15, 'Imprimante', 0, 0, '2024-09-06 15:15:20', '2024-09-23 21:00:50', 'Imprimante', 'imprimante', 'Des Imprimante  de tous types', 'imprimante', 1),
(16, 'Antivirus', 0, 0, '2024-09-06 15:16:59', '2024-09-23 21:00:52', 'antivirus', 'Antivirus', 'Des Antivirus d\'une validité d\'un an minimum', 'Antivirus', 1),
(17, 'Cartouche d\'ancre', 0, 0, '2024-09-06 15:18:16', '2024-09-23 21:00:55', 'cartouche d\'ancre', 'Cartouche d\'ancre', 'des Cartouche d\'ancre de tous les types d\'appareils', 'Cartouche d\'ancre', 1),
(18, 'Électronique', 0, 0, '2024-09-23 21:00:19', '2024-09-23 21:00:19', 'élements_électronique', 'élements_électronique_2024', 'Tous les élements électronique que nous vendons sont de très bonne qualité', 'électronique 2.0', 1),
(19, 'Mode', 0, 0, '2024-09-23 21:01:55', '2024-09-23 21:01:55', 'Mode', 'La Mode du moment', 'Tous les éléments de Mode en 2024', 'Mode 2.0', 1),
(20, 'Maison et Jardin', 0, 0, '2024-09-23 21:04:01', '2024-09-23 21:04:01', 'Maison_et_Jardin', 'Tous_accessoires_de_maisons_et_de_jardins', 'Tous accessoires de maisons et de jardins de bonne qualité et à des coups moyens', 'Tous accessoires de maisons et de jardins', 1),
(21, 'Beauté et Soins Personnels', 0, 0, '2024-09-23 21:07:08', '2024-09-23 21:07:08', 'Beauté_et_Soins_Personnels', 'Beauté et Soins Personnels : Conseils, Astuces et Produits pour votre Bien-Être', 'Exemple pour un torréfacteur artisanal :\r\nMeta description : \"Le Comptoir du Lys parvient à communiquer rapidement son identité de torréfacteur artisanal. Les termes ‘Artisan Torréfacteur’ positionnent clairement l’entreprise. La mention des cafés en grains et moulus, ainsi que des thés, élargit l’offre tout en restant dans le domaine de l’épicerie fine.\"1\r\nExemple pour une boutique de montres en ligne :\r\nMeta description : \"La marque Montres and Co fait appel à l’émotion pour capter l’attention de l’internaute, qui recherche la montre de ses rêves. Elle met aussi en avant la variété de choix sur sa boutique, avec plus de 50 marques de montres, et cite les plus recherchées.\"2\r\nExemple pour un site vitrine :\r\nMeta description : “Découvrez nos services de conseil en bien-être et relaxation. Nous proposons des séances de méditation, des conseils nutritionnels et des astuces pour une vie plus équilibrée. Rejoignez notre communauté bienveillante !” (Imaginons que ce soit pour un site dédié au bien-être)3\r\nN’oubliez pas d’utiliser des mots-clés pertinents, d’être concis et d’inciter les internautes à cliquer sur votre page. Si vous avez besoin d’autres exemples ou d’aide supplémentaire, n’hésitez pas à me le faire savoir ! 😊', 'Beauté-et-Soins-Personnels', 1),
(22, 'Sport et Loisirs', 0, 0, '2024-09-23 21:09:48', '2024-09-23 21:09:48', 'sport-loisirs', 'Sport et Loisirs : Activités, Équipements et Bien-Être', 'Découvrez nos activités sportives et de loisirs pour tous les âges ! Trouvez des équipements de qualité et des conseils pour rester en forme. Profitez du bien-être que le sport peut apporter.', 'sport, loisirs, activités, équipements, bien-être', 1),
(23, 'Automobile', 0, 0, '2024-09-23 21:12:57', '2024-09-23 21:12:57', 'automobile 2024', 'Guide de l’Automobile : Conseils, Achat, Entretien et Actualités', 'Découvrez tout sur l’automobile : conseils pour l’achat, entretien des véhicules, dernières actualités du secteur automobile. Restez informé(e) et prenez la route en toute confiance !', 'automobile, voiture, achat, entretien, actualités', 1),
(24, 'Alimentation et Boissons', 0, 0, '2024-09-23 21:15:21', '2024-09-23 21:15:21', 'alimentation-boissons', 'Recettes gourmandes : Cuisine, Vins et Gastronomie', 'Explorez notre univers culinaire ! Découvrez des recettes savoureuses, des conseils pour accorder vins et plats, et des articles sur la gastronomie. Devenez un expert en alimentation et boissons.', 'recettes, cuisine, vins, gastronomie, alimentation', 1),
(25, 'Jeux et Jouets', 0, 0, '2024-09-23 21:17:55', '2024-09-23 21:17:55', 'Jeux_Jouets', 'Jeux et Jouets pour Enfants : Découvrez nos Sélections Ludiques', 'Trouvez les meilleurs jeux et jouets pour vos enfants ! Des jouets éducatifs aux jeux de société en passant par les peluches, explorez notre sélection ludique. Offrez des moments de bonheur à vos petits !', 'jeux, jouets, enfants, éducatif, peluches', 1),
(26, 'Livres et Médias', 0, 0, '2024-09-23 21:19:45', '2024-09-23 21:19:45', 'Livres-Médias', 'Actualités Littéraires : Critiques, Auteurs et Nouveautés', 'Découvrez les dernières critiques de livres, les interviews d’auteurs et les actualités littéraires. Restez informé(e) sur les sorties de romans, essais et autres médias culturels.', 'livres, médias, actualités, critiques, auteurs', 1),
(27, 'Animaux de Compagnie', 0, 0, '2024-09-23 21:21:21', '2024-09-23 21:21:21', 'animaux-de-compagnie', 'Conseils pour les Amoureux des Animaux : Santé, Éducation et Bonheur', 'Découvrez nos articles sur la santé des animaux, l’éducation des chiens et chats, et des astuces pour le bonheur de vos compagnons à quatre pattes. Soyez un propriétaire informé et bienveillant !', 'animaux, compagnie, santé, éducation, bonheur', 1),
(28, 'Electronics', 0, 0, '2024-09-24 00:48:57', '2024-09-24 00:48:57', 'electronics', 'Electronics', 'Shop the latest electronics', 'electronics, gadgets, devices', 1),
(29, 'Fashion', 0, 0, '2024-09-24 00:48:57', '2024-09-24 00:48:57', 'fashion', 'Fashion', 'Discover the latest fashion trends', 'clothing, fashion, apparel', 1),
(30, 'Home & Garden', 0, 0, '2024-09-24 00:48:57', '2024-09-24 00:48:57', 'home-garden', 'Home & Garden', 'Furnish your home and garden', 'furniture, home, garden', 1),
(31, 'Beauty & Health', 0, 0, '2024-09-24 00:48:57', '2024-09-24 00:48:57', 'beauty-health', 'Beauty & Health', 'Beauty and health products', 'beauty, health, skincare', 1),
(32, 'Sports', 0, 0, '2024-09-24 00:48:57', '2024-09-24 00:48:57', 'sports', 'Sports', 'Gear up for sports', 'sports, fitness, exercise', 1),
(33, 'Toys & Hobbies', 0, 0, '2024-09-24 00:48:57', '2024-09-24 00:48:57', 'toys-hobbies', 'Toys & Hobbies', 'Toys and hobbies for all ages', 'toys, hobbies, games', 1),
(34, 'Automotive', 0, 0, '2024-09-24 00:48:57', '2024-09-24 00:48:57', 'automotive', 'Automotive', 'Everything for your car', 'automotive, car, vehicle', 1),
(35, 'Books', 1, 0, '2024-09-24 00:48:57', '2024-09-24 00:48:57', 'books', 'Books', 'Explore a wide range of books', 'books, literature, reading', 1),
(36, 'Music', 1, 0, '2024-09-24 00:48:57', '2024-09-24 00:48:57', 'music', 'Music', 'Discover music and instruments', 'music, instruments, audio', 1),
(37, 'Office Supplies', 1, 0, '2024-09-24 00:48:57', '2024-09-24 00:48:57', 'office-supplies', 'Office Supplies', 'Everything you need for the office', 'office, supplies, stationery', 1),
(38, 'Jewelry & Watches', 1, 0, '2024-09-24 00:48:57', '2024-09-24 00:48:57', 'jewelry-watches', 'Jewelry & Watches', 'Elegant jewelry and watches', 'jewelry, watches, accessories', 1),
(39, 'Baby & Kids', 1, 0, '2024-09-24 00:48:57', '2024-09-24 00:48:57', 'baby-kids', 'Baby & Kids', 'Products for babies and kids', 'baby, kids, children', 1),
(40, 'Grocery', 1, 0, '2024-09-24 00:48:57', '2024-09-24 00:48:57', 'grocery', 'Grocery', 'Daily groceries and essentials', 'grocery, food, essentials', 1),
(41, 'Pet Supplies', 1, 0, '2024-09-24 00:48:57', '2024-09-24 00:48:57', 'pet-supplies', 'Pet Supplies', 'Everything for your pets', 'pets, supplies, animals', 1),
(42, 'Movies & Entertainment', 1, 0, '2024-09-24 00:48:57', '2024-09-24 00:48:57', 'movies-entertainment', 'Movies & Entertainment', 'Movies, games, and more', 'movies, entertainment, games', 1),
(43, 'Art & Craft', 1, 0, '2024-09-24 00:48:57', '2024-09-24 00:48:57', 'art-craft', 'Art & Craft', 'Art and craft supplies', 'art, craft, supplies', 1),
(44, 'Travel', 1, 0, '2024-09-24 00:48:57', '2024-09-24 00:48:57', 'travel', 'Travel', 'Travel essentials and accessories', 'travel, luggage, accessories', 1),
(45, 'Computers & Accessories', 1, 0, '2024-09-24 00:48:57', '2024-09-24 00:48:57', 'computers-accessories', 'Computers & Accessories', 'Computers and related accessories', 'computers, accessories, tech', 1),
(46, 'Outdoor', 1, 0, '2024-09-24 00:48:57', '2024-09-24 00:48:57', 'outdoor', 'Outdoor', 'Outdoor gear and equipment', 'outdoor, camping, gear', 1),
(47, 'Gifts', 1, 0, '2024-09-24 00:48:57', '2024-09-24 00:48:57', 'gifts', 'Gifts', 'Gifts for every occasion', 'gifts, presents, occasions', 1);

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
(5, 'noir', '#080808', 1, 0, 0, '2024-07-14 00:56:52', '2024-07-25 23:16:17'),
(6, 'noir', '#2b2626', 1, 0, 0, '2024-07-14 00:57:09', '2024-07-25 23:16:15'),
(7, 'noires', '#000000', 1, 0, 0, '2024-07-14 00:57:39', '2024-07-25 23:16:12'),
(8, 'rouge', '#e70d0d', 1, 0, 0, '2024-09-23 22:03:32', '2024-09-23 22:03:32'),
(9, 'vert', '#29f5cc', 1, 0, 0, '2024-09-23 22:03:54', '2024-09-23 22:03:54'),
(10, 'jaune', '#dbdf07', 1, 0, 0, '2024-09-23 22:04:11', '2024-09-23 22:04:11'),
(11, 'Red', '#FF0000', 1, 0, 0, '2024-09-24 00:46:03', '2024-09-24 00:46:03'),
(12, 'Green', '#008000', 1, 0, 0, '2024-09-24 00:46:03', '2024-09-24 00:46:03'),
(13, 'Blue', '#0000FF', 1, 0, 0, '2024-09-24 00:46:03', '2024-09-24 00:46:03'),
(14, 'Yellow', '#FFFF00', 1, 0, 0, '2024-09-24 00:46:03', '2024-09-24 00:46:03'),
(15, 'Black', '#000000', 1, 0, 0, '2024-09-24 00:46:03', '2024-09-24 00:46:03'),
(16, 'White', '#FFFFFF', 1, 0, 0, '2024-09-24 00:46:03', '2024-09-24 00:46:03'),
(17, 'Purple', '#800080', 1, 0, 0, '2024-09-24 00:46:03', '2024-09-24 00:46:03'),
(18, 'Orange', '#FFA500', 1, 0, 0, '2024-09-24 00:46:03', '2024-09-24 00:46:03'),
(19, 'Pink', '#FFC0CB', 1, 0, 0, '2024-09-24 00:46:03', '2024-09-24 00:46:03'),
(20, 'Brown', '#A52A2A', 1, 0, 0, '2024-09-24 00:46:03', '2024-09-24 00:46:03'),
(21, 'Gray', '#808080', 1, 0, 0, '2024-09-24 00:46:03', '2024-09-24 00:46:03'),
(22, 'Cyan', '#00FFFF', 1, 0, 0, '2024-09-24 00:46:03', '2024-09-24 00:46:03'),
(23, 'Magenta', '#FF00FF', 1, 0, 0, '2024-09-24 00:46:03', '2024-09-24 00:46:03'),
(24, 'Maroon', '#800000', 1, 0, 0, '2024-09-24 00:46:03', '2024-09-24 00:46:03'),
(25, 'Olive', '#808000', 1, 0, 0, '2024-09-24 00:46:03', '2024-09-24 00:46:03'),
(26, 'Navy', '#000080', 1, 1, 0, '2024-09-24 00:46:03', '2024-09-24 00:46:03'),
(27, 'Teal', '#008080', 1, 1, 0, '2024-09-24 00:46:03', '2024-09-24 00:46:03'),
(28, 'Lavender', '#E6E6FA', 1, 1, 0, '2024-09-24 00:46:03', '2024-09-24 00:46:03'),
(29, 'Beige', '#F5F5DC', 1, 1, 0, '2024-09-24 00:46:03', '2024-09-24 00:46:03'),
(30, 'Turquoise', '#40E0D0', 1, 1, 0, '2024-09-24 00:46:03', '2024-09-24 00:46:03');

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
(1, 'Ordinateur', 'ordinateur', 'sku 1', 1, 1, 1, 8000, 500, 'short description 1', 'description 1', 'information 1', 'test 1', 0, 0, 1, '2024-07-14 00:02:28', '2024-07-14 00:02:28'),
(2, 'Téléphone', 'telephone', 'sku 2', 2, 2, 3, 80000, 5000, 'short description 2', 'description 2', 'information 2', 'teste 2', 0, 0, 1, '2024-07-14 00:03:04', '2024-07-14 00:03:04'),
(3, 'Télévision 📺', 'television', 'sku 3', 3, 3, 5, 800000, 50000, 'short description 3', 'description 3', 'information 3', 'teste 3', 0, 0, 1, '2024-07-14 00:03:19', '2024-07-14 00:03:19'),
(4, 'Machine à laver', 'machine-a-laver', 'sku 4', 4, 4, 6, 8000000, 500000, 'short description 4', 'description 4', 'information 4', 'teste 4', 0, 0, 1, '2024-07-15 09:18:32', '2024-07-15 09:18:32'),
(5, 'Montres', 'montres', 'sku 5', 5, 5, 7, 80000000, 5000000, 'short description 5', 'description 5', 'information 5', 'teste 5', 0, 0, 1, '2024-07-15 09:22:50', '2024-07-15 09:22:50'),
(6, 'Samsung 📱', 'montres-6', 'samsung_phone', 13, 25, 1, 80000, 20000, 'brève description du produit', 'description du produit', 'information supplémentaire du produit', 'Informations de retour du produit', 0, 0, 1, '2024-07-15 09:23:25', '2024-09-10 21:08:16'),
(7, 'Voitures🚙', 'voitures', 'mng', 12, 23, 4, 10001211, 10000, 'la brève', 'dede', 'frfrs', 'teste 6', 0, 0, 1, '2024-07-15 11:19:26', '2024-09-08 21:06:56'),
(8, 'toyota carina 2', 'toyota-carina-2', 'toyota_carina_2', 12, 11, 2, 85000000, 1400000, 'brève description de&nbsp;toyota carina v3', 'description de&nbsp;toyota carina v3', 'informations supplémentaire de description de&nbsp;toyota carina v3', 'retour le 24/12/2024', 0, 0, 1, '2024-09-10 21:11:55', '2024-09-10 21:15:14'),
(9, 'iPhone 14 Pro', 'iphone-14-pro', NULL, 6, 6, 8, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:11:03', '2024-09-23 22:11:03'),
(10, 'Samsung Galaxy Tab S8', 'samsung-galaxy-tab-s8', NULL, 7, 7, 9, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:11:25', '2024-09-23 22:11:25'),
(11, 'MacBook Air M2', 'macbook-air-m2', NULL, 8, 8, 10, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:11:42', '2024-09-23 22:11:42'),
(12, 'Sony Bravia 55\" OLED TV', 'sony-bravia-55-oled-tv', NULL, 9, 9, 1, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:11:55', '2024-09-23 22:11:55'),
(13, 'Logitech MX Master 3', 'logitech-mx-master-3', NULL, 10, 10, 2, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:12:10', '2024-09-23 22:12:10'),
(14, 'T-shirt en coton pour hommes', 't-shirt-en-coton-pour-hommes', 'T-CO', 11, 67, 22, 1200000, 1400000, '&nbsp;Livraison standard sous 3 à 5 jours ouvrables. Retours acceptés sous 14 jours si le produit est en parfait état.', '<li>Format: Broché, 96 pages</li><li>Illustrations: Illustré par l\'auteur lui-même</li><li>Langue: Français</li><li>Dimensions: 12 x 18 cm</li>', '&nbsp;Livraison standard sous 3 à 5 jours ouvrables. Retours acceptés sous 14 jours si le produit est en parfait état.', 'Un conte intemporel sur l’amour, l’amitié, et les grandes leçons de la vie.', 0, 0, 1, '2024-09-23 22:12:25', '2024-09-25 09:41:28'),
(15, 'Robe d\'été en soie', 'robe-dete-en-soie', NULL, 12, 12, 4, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:12:36', '2024-09-23 22:12:36'),
(16, 'Sneakers Nike Air Max', 'sneakers-nike-air-max', NULL, 13, 13, 5, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:12:49', '2024-09-23 22:12:49'),
(17, 'Sac à dos en cuir', 'sac-a-dos-en-cuir', NULL, 12, 14, 6, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:13:00', '2024-09-23 22:13:00'),
(18, 'Bracelet en argent', 'bracelet-en-argent', 'B-ARGENT', 11, 15, 7, 1200000, 1400000, '<li>Format: Broché, 96 pages</li><li>Illustrations: Illustré par l\'auteur lui-même</li><li>Langue: Français</li><li>Dimensions: 12 x 18 cm</li>', 'Le Petit Prince\" d\'Antoine de Saint-Exupéry', '&nbsp;Livraison standard sous 3 à 5 jours ouvrables. Retours acceptés sous 14 jours si le produit est en parfait état.', '&nbsp;Livraison standard sous 3 à 5 jours ouvrables. Retours acceptés sous 14 jours si le produit est en parfait état.', 0, 0, 1, '2024-09-23 22:13:11', '2024-09-25 09:49:32'),
(19, 'Lunettes de soleil Ray-Ban', 'lunettes-de-soleil-ray-ban', NULL, 10, 1, 8, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:13:23', '2024-09-23 22:13:23'),
(20, 'Montre Rolex Submariner', 'montre-rolex-submariner', NULL, 9, 1, 9, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:13:39', '2024-09-23 22:13:39'),
(21, 'Legging de sport', 'legging-de-sport', NULL, 8, 2, 10, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:13:51', '2024-09-23 22:13:51'),
(22, 'Boîte de rangement pliable', 'boite-de-rangement-pliable', NULL, 7, 3, 1, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:14:07', '2024-09-23 22:14:07'),
(23, 'Rideaux de douche', 'rideaux-de-douche', NULL, 6, 3, 2, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:14:19', '2024-09-23 22:14:19'),
(24, 'Batterie de cuisine en acier inoxydable', 'batterie-de-cuisine-en-acier-inoxydable', NULL, 5, 3, 3, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:14:29', '2024-09-23 22:14:29'),
(25, 'Perceuse sans fil Bosch', 'perceuse-sans-fil-bosch', NULL, 4, 3, 4, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:14:46', '2024-09-23 22:14:46'),
(26, 'Draps en coton égyptien', 'draps-en-coton-egyptien', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:14:56', '2024-09-23 22:14:56'),
(27, 'Réfrigérateur Samsung', 'refrigerateur-samsung', 'RS OK  7HAB EFF', 33, 15, 12, 1200000, 10000, '&nbsp;Livraison standard sous 3 à 5 jours ouvrables. Retours acceptés sous 14 jours si le produit est en parfait état.', '<li>Format: Broché, 96 pages</li><li>Illustrations: Illustré par l\'auteur lui-même</li><li>Langue: Français</li><li>Dimensions: 12 x 18 cm</li>', '<li>Format: Broché, 320 pages</li><li>Auteur: J.K. Rowling</li><li>Illustrations: Illustrations en couverture de Jean-Claude Götting</li><li>Langue: Français</li>', '\"Le Petit Prince\" est un conte philosophique et poétique écrit par Antoine de Saint-Exupéry. Ce livre raconte l’histoire d’un jeune prince qui voyage de planète en planète et fait des rencontres, chacune pleine de sens. L’œuvre aborde des thèmes tels que l\'amitié, l\'amour, et la perte, et est appréciée par des lecteurs de tout âge.', 0, 0, 1, '2024-09-23 22:15:06', '2024-09-24 15:25:37'),
(28, 'Baume à barbe', 'baume-a-barbe', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:15:20', '2024-09-23 22:15:20'),
(29, 'Dentifrice blanchissant', 'dentifrice-blanchissant', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:15:33', '2024-09-23 22:15:33'),
(30, 'Rasoir électrique Philips', 'rasoir-electrique-philips', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:15:43', '2024-09-23 22:15:43'),
(31, 'Brosse à maquillage', 'brosse-a-maquillage', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:15:54', '2024-09-23 22:15:54'),
(32, 'Parfum Chanel N°5', 'parfum-chanel-n5', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:16:05', '2024-09-23 22:16:05'),
(33, 'Shampooing nourrissant', 'shampooing-nourrissant', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:16:22', '2024-09-23 22:16:22'),
(34, 'T-shirt de sport anti-transpiration', 't-shirt-de-sport-anti-transpiration', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:16:45', '2024-09-23 22:16:45'),
(35, 'Tapis de course pliant', 'tapis-de-course-pliant', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:16:57', '2024-09-23 22:16:57'),
(36, 'Tente 4 places', 'tente-4-places', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:17:07', '2024-09-23 22:17:07'),
(37, 'Vélo de route', 'velo-de-route', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:17:18', '2024-09-23 22:17:18'),
(38, 'Ballon de football', 'ballon-de-football', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:17:28', '2024-09-23 22:17:28'),
(39, 'Lunettes de natation', 'lunettes-de-natation', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:17:54', '2024-09-23 22:17:54'),
(40, 'Raquette de tennis', 'raquette-de-tennis', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:18:05', '2024-09-23 22:18:05'),
(41, 'Canne à pêche télescopique', 'canne-a-peche-telescopique', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:18:15', '2024-09-23 22:18:15'),
(42, 'Extincteur de voiture', 'extincteur-de-voiture', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:18:27', '2024-09-23 22:18:27'),
(43, 'Huile moteur synthétique', 'huile-moteur-synthetique', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:18:42', '2024-09-23 22:18:42'),
(44, 'Clé à molette', 'cle-a-molette', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:18:53', '2024-09-23 22:18:53'),
(45, 'Cire de voiture', 'cire-de-voiture', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:19:05', '2024-09-23 22:19:05'),
(46, 'Autoradio Bluetooth', 'autoradio-bluetooth', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:19:17', '2024-09-23 22:19:17'),
(47, 'Pneus Michelin', 'pneus-michelin', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:19:29', '2024-09-23 22:19:29'),
(48, 'Housses de siège', 'housses-de-siege', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:19:40', '2024-09-23 22:19:40'),
(49, 'Filtre à air', 'filtre-a-air', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:19:49', '2024-09-23 22:19:49'),
(50, 'Pommes biologiques', 'pommes-biologiques', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:20:07', '2024-09-23 22:20:07'),
(51, 'Saumon fumé', 'saumon-fume', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:20:18', '2024-09-23 22:20:18'),
(52, 'Fromage Brie', 'fromage-brie', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:20:30', '2024-09-23 22:20:30'),
(53, 'Vin rouge Bordeaux', 'vin-rouge-bordeaux', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:20:40', '2024-09-23 22:20:40'),
(54, 'Riz complet bio', 'riz-complet-bio', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:20:51', '2024-09-23 22:20:51'),
(55, 'Chocolat noir', 'chocolat-noir', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:21:02', '2024-09-23 22:21:02'),
(56, 'Croissants', 'croissants', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:21:10', '2024-09-23 22:21:10'),
(57, 'Sauce tomate maison', 'sauce-tomate-maison', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:21:21', '2024-09-23 22:21:21'),
(58, 'Purée de carottes pour bébés', 'puree-de-carottes-pour-bebes', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:21:31', '2024-09-23 22:21:31'),
(59, 'Monopoly', 'monopoly', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:21:48', '2024-09-23 22:21:48'),
(60, 'Puzzle 1000 pièces', 'puzzle-1000-pieces', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:21:58', '2024-09-23 22:21:58'),
(61, 'Ours en peluche géant', 'ours-en-peluche-geant', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:22:08', '2024-09-23 22:22:08'),
(62, 'Nintendo Switch', 'nintendo-switch', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:22:19', '2024-09-23 22:22:19'),
(63, 'LEGO Star Wars', 'lego-star-wars', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:22:29', '2024-09-23 22:22:29'),
(64, 'Balançoire de jardin', 'balancoire-de-jardin', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:22:39', '2024-09-23 22:22:39'),
(65, 'Jeu de cartes Uno', 'jeu-de-cartes-uno', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:22:49', '2024-09-23 22:22:49'),
(66, 'Camion à benne télécommandé', 'camion-a-benne-telecommande', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 1, '2024-09-23 22:22:59', '2024-09-23 22:22:59'),
(67, 'Jouet d\'éveil musical', 'jouet-deveil-musical', 'AUD-CAS', 14, 37, 12, 1200000, 14000, 'Le Petit Prince\" d\'Antoine de Saint-Exupéry', '<li>Format: Broché, 96 pages</li><li>Illustrations: Illustré par l\'auteur lui-même</li><li>Langue: Français</li><li>Dimensions: 12 x 18 cm</li>', '\"Le Petit Prince\" est un conte philosophique et poétique écrit par Antoine de Saint-Exupéry. Ce livre raconte l’histoire d’un jeune prince qui voyage de planète en planète et fait des rencontres, chacune pleine de sens. L’œuvre aborde des thèmes tels que l\'amitié, l\'amour, et la perte, et est appréciée par des lecteurs de tout âge.', '\"Le Petit Prince\" est un conte philosophique et poétique écrit par Antoine de Saint-Exupéry. Ce livre raconte l’histoire d’un jeune prince qui voyage de planète en planète et fait des rencontres, chacune pleine de sens. L’œuvre aborde des thèmes tels que l\'amitié, l\'amour, et la perte, et est appréciée par des lecteurs de tout âge.', 0, 0, 1, '2024-09-23 22:23:14', '2024-09-24 15:37:26'),
(68, 'Le Petit Prince\" d\'Antoine de Saint-Exupéry', 'le-petit-prince-dantoine-de-saint-exupery', 'LPPR-001', 26, 111, 11, 75000, 6000, 'Un conte intemporel sur l’amour, l’amitié, et les grandes leçons de la vie.', '\"Le Petit Prince\" est un conte philosophique et poétique écrit par Antoine de Saint-Exupéry. Ce livre raconte l’histoire d’un jeune prince qui voyage de planète en planète et fait des rencontres, chacune pleine de sens. L’œuvre aborde des thèmes tels que l\'amitié, l\'amour, et la perte, et est appréciée par des lecteurs de tout âge.', '<li>Format: Broché, 96 pages</li><li>Illustrations: Illustré par l\'auteur lui-même</li><li>Langue: Français</li><li>Dimensions: 12 x 18 cm</li>', '&nbsp;Livraison standard sous 3 à 5 jours ouvrables. Retours acceptés sous 14 jours si le produit est en parfait état.', 0, 0, 1, '2024-09-23 22:23:30', '2024-09-24 15:16:14'),
(69, 'Harry Potter et la Pierre Philosophale', 'harry-potter-et-la-pierre-philosophale', 'HP-PHIL-001', 29, 44, 12, 7500, 7500, 'Le début de la saga légendaire de Harry Potter, où le jeune sorcier découvre son destin.', '\"Harry Potter et la Pierre Philosophale\" est le premier tome de la célèbre saga de J.K. Rowling. Il raconte les aventures de Harry, un jeune garçon qui découvre qu\'il est un sorcier et qu\'il doit rejoindre l\'école de magie de Poudlard. Ce roman est un incontournable pour les jeunes lecteurs et les passionnés de magie et de fantastique.', '<li>Format: Broché, 320 pages</li><li>Auteur: J.K. Rowling</li><li>Illustrations: Illustrations en couverture de Jean-Claude Götting</li><li>Langue: Français</li>', 'Livraison en 3 à 7 jours ouvrables. Retours acceptés dans les 14 jours si le produit est non utilisé et en parfait état.', 0, 0, 1, '2024-09-23 22:23:45', '2024-09-24 15:10:56'),
(70, 'La Cuisine italienne', 'la-cuisine-italienne', 'CUISINE-ITA-001', 20, 109, 20, 13000, 10500, 'Découvrez les secrets de la cuisine italienne avec des recettes authentiques et savoureuses.', '\"La Cuisine italienne\" est un ouvrage incontournable pour les amateurs de cuisine. Ce livre vous plonge au cœur des traditions culinaires italiennes avec des recettes authentiques et savoureuses, allant des pâtes aux desserts raffinés, en passant par des plats régionaux emblématiques.', '<li>Format: Relié, 250 pages</li><li>Auteur: Gino D\'Acampo</li><li>Inclus des sections sur les vins italiens et des techniques de cuisine détaillées.</li>', 'Livraison sous 3 à 5 jours ouvrables. Retours acceptés sous 7 jours après réception si le livre est endommagé.', 0, 0, 1, '2024-09-23 22:23:56', '2024-09-24 15:06:24'),
(71, 'Livre audio \"L\'Alchimiste\"', 'livre-audio-lalchimiste', 'ALCHIMISTE-LIV-AUDIO-001', 26, 37, 23, 90000, 75000, 'Livre audio de Paulo Coelho, \"L\'Alchimiste\" est une quête spirituelle intemporelle, narrée avec passion.', '\"L\'Alchimiste\" de Paulo Coelho, dans sa version audio, raconte l\'aventure épique de Santiago, un jeune berger qui part en quête de son rêve, apprenant des leçons profondes sur la vie et l\'amour tout au long du voyage. Une œuvre profondément philosophique et inspirante.', '<li>Format: MP3, durée totale de 5h30.</li><li>Narrateur: Raphaël Enthoven</li><li>Disponible en téléchargement immédiat après l\'achat.</li>', 'Livraison sous 2 à 4 jours ouvrables. Retours acceptés sous 10 jours après réception si le produit est défectueux ou non conforme.', 0, 0, 1, '2024-09-23 22:24:10', '2024-09-24 15:00:46'),
(72, 'Bande dessinée \"Astérix\"', 'bande-dessinee-asterix', 'SKU : BD-ASTERIX', 26, 49, 19, 4500, 3500, 'Les aventures drôles et captivantes d\'Astérix et Obélix, des Gaulois intrépides qui déjouent les Romains avec humour et courage.', '<strong>\"Astérix\"</strong> est une série de bande dessinée française, créée par René Goscinny (scénario) et Albert Uderzo (dessin), qui raconte les aventures d\'un petit village gaulois qui résiste encore et toujours à l\'envahisseur romain. Astérix, accompagné de son fidèle ami Obélix, traverse différentes époques et cultures dans des aventures remplies d\'humour et de références historiques, tout en étant armé de la potion magique du druide Panoramix.', '<li><strong>Langue</strong> : Français</li><li><strong>Format</strong> : Relié</li><li><strong>Nombre de pages</strong> : 48 pages</li><li><strong>Dimensions</strong> : 29.5 x 22.5 cm</li><li><strong>Éditeur</strong> : Les Éditions Albert René</li><li><strong>Genre</strong> : Aventure, Humour</li><li><strong>Public cible</strong> : Tous âges</li><li><strong>Date de première publication</strong> : 1961</li>', '<li><strong>Expédition</strong> : Votre commande sera expédiée sous 2 à 4 jours ouvrables. Le délai de livraison est estimé entre 5 à 7 jours ouvrables.</li><li><strong>Retours</strong> : Les retours sont acceptés dans les 7 jours suivant la réception du produit, à condition que le livre soit en bon état et non endommagé.</li>', 0, 0, 1, '2024-09-23 22:24:23', '2024-09-24 14:56:42'),
(73, 'Album \"Thriller\" de Michael Jackson', 'lbum-thriller-de-michael-jackson', 'ALB-THRILLER-MJ', 26, 108, 25, 15000, 12000, 'Le légendaire album <strong>\"Thriller\"</strong> de Michael Jackson, avec des titres emblématiques qui ont redéfini la musique pop.', '<strong>\"Thriller\"</strong> est l\'album légendaire de Michael Jackson, sorti en 1982. Il a marqué l\'histoire de la musique avec des hits comme <strong>\"Billie Jean\"</strong>, <strong>\"Beat It\"</strong>, et bien sûr, <strong>\"Thriller\"</strong>. Cet album est un mélange parfait de pop, funk, et rock, faisant de Michael Jackson le \"Roi de la Pop\". Il est l\'un des albums les plus vendus de tous les temps, avec plus de 66 millions de copies vendues à travers le monde.', '<li><strong>Format</strong> : CD, vinyle ou numérique</li><li><strong>Label</strong> : Epic Records</li><li><strong>Langue</strong> : Anglais</li><li><strong>Date de sortie</strong> : 30 novembre 1982</li><li><strong>Genre</strong> : Pop, Rock, Funk</li><li><strong>Durée totale</strong> : 42:19</li><li><strong>Producteurs</strong> : Quincy Jones, Michael Jackson</li>', '<li><ul><li><strong>Expédition</strong> : Votre commande sera expédiée sous 2 à 4 jours ouvrables. Le délai de livraison est de 5 à 10 jours ouvrables en fonction de votre région.</li><li><strong>Retours</strong> : Les retours sont acceptés dans les 10 jours suivant la réception du produit. Les articles doivent être en parfait état et dans leur emballage d\'origine.</li></ul></li><li><p></p></li>', 0, 0, 1, '2024-09-23 22:24:34', '2024-09-24 14:52:16'),
(74, 'Coffret DVD \"Game of Thrones\"', 'coffret-dvd-game-of-thrones', 'coffret-dvd-game-of-thrones', 25, 98, 12, 1200000, 1400000, '<ul style=\"display: flex; flex-direction: column; gap: 12px; margin: 12px 0px 0px; padding-inline-start: 24px; color: rgba(0, 0, 0, 0.894); font-family: SegoeUIVariable, SegoeUI, &quot;Segoe UI&quot;, &quot;Helvetica Neue&quot;, Helvetica, &quot;Microsoft YaHei&quot;, &quot;Meiryo UI&quot;, Meiryo, &quot;Arial Unicode MS&quot;, sans-serif; font-size: 14px; background-color: rgb(243, 243, 243);\"><li>Explication : Le Meta Titre est le titre principal de la page qui apparaît dans les résultats de recherche. Il doit être attractif, contenir le mot-clé principal (“Coffret DVD Game of Thrones” ici) et inciter au clic.</li></ul>', '<span style=\"color: rgba(0, 0, 0, 0.894); font-family: SegoeUIVariable, SegoeUI, &quot;Segoe UI&quot;, &quot;Helvetica Neue&quot;, Helvetica, &quot;Microsoft YaHei&quot;, &quot;Meiryo UI&quot;, Meiryo, &quot;Arial Unicode MS&quot;, sans-serif; font-size: 14px; background-color: rgb(243, 243, 243);\">Plongez dans l’univers de Westeros avec le coffret DVD Game of Thrones. Retrouvez les intrigues, les batailles épiques et les personnages emblématiques de cette série culte. Un must-have pour tous les fans !</span>', '<span style=\"color: rgba(0, 0, 0, 0.894); font-family: SegoeUIVariable, SegoeUI, &quot;Segoe UI&quot;, &quot;Helvetica Neue&quot;, Helvetica, &quot;Microsoft YaHei&quot;, &quot;Meiryo UI&quot;, Meiryo, &quot;Arial Unicode MS&quot;, sans-serif; font-size: 14px; background-color: rgb(243, 243, 243);\">Exemple de Meta Description : “Plongez dans l’univers de Westeros avec le coffret DVD Game of Thrones.&nbsp;</span><span style=\"color: rgba(0, 0, 0, 0.894); font-family: SegoeUIVariable, SegoeUI, &quot;Segoe UI&quot;, &quot;Helvetica Neue&quot;, Helvetica, &quot;Microsoft YaHei&quot;, &quot;Meiryo UI&quot;, Meiryo, &quot;Arial Unicode MS&quot;, sans-serif; font-size: 14px; background-color: rgb(243, 243, 243);\">Exemple de Meta Description : “Plongez dans l’univers de Westeros avec le coffret DVD Game of Thrones.&nbsp;</span>', '<span style=\"color: rgba(0, 0, 0, 0.894); font-family: SegoeUIVariable, SegoeUI, &quot;Segoe UI&quot;, &quot;Helvetica Neue&quot;, Helvetica, &quot;Microsoft YaHei&quot;, &quot;Meiryo UI&quot;, Meiryo, &quot;Arial Unicode MS&quot;, sans-serif; font-size: 14px; background-color: rgb(243, 243, 243);\">Exemple de Meta Description : “Plongez dans l’univers de Westeros avec le coffret DVD Game of Thrones.&nbsp;</span>', 0, 0, 1, '2024-09-23 22:24:46', '2024-09-24 14:47:04'),
(75, '\"Une Brève Histoire du Temps\" de Stephen Hawking', 'une-breve-histoire-du-temps-de-stephen-hawking', 'BOK-BRHT-HAWK', 26, 44, 28, 18500, 17000, 'Un classique de la vulgarisation scientifique où Stephen Hawking explique les mystères de l\'univers dans un langage accessible à tous.', '<strong>\"Une Brève Histoire du Temps\"</strong> est un ouvrage phare de la science populaire, écrit par le célèbre physicien Stephen Hawking. Ce livre explore les concepts de la cosmologie, y compris la nature du temps, les trous noirs, le Big Bang, et la théorie des cordes. Accessible aux non-scientifiques, ce livre tente de répondre à certaines des plus grandes questions de l\'univers.', '<li><strong>Format</strong> : Couverture souple, 240 pages</li><li><strong>Langue</strong> : Français</li><li><strong>Éditeur</strong> : Éditions Flammarion</li><li><strong>ISBN</strong> : 978-2-08-070252-1</li><li><strong>Dimensions</strong> : 13 x 20 x 1.5 cm</li><li><strong>Poids</strong> : 0.3 kg</li>', '<li><strong>Expédition</strong> : Les commandes sont traitées sous 2 à 3 jours ouvrables. La livraison standard prend 5 à 7 jours ouvrables en fonction de votre emplacement.</li><li><strong>Retours</strong> : Les retours sont acceptés dans un délai de 15 jours après réception. Les articles doivent être dans leur état d\'origine, non utilisés et dans leur emballage d\'origine.</li>', 0, 0, 1, '2024-09-23 22:25:00', '2024-09-23 23:15:34'),
(76, '\"Les 7 Habitudes des gens très efficaces\"', 'les-7-habitudes-des-gens-tres-efficaces', 'BOK  7HAB EFF', 26, 49, 28, 10000, 18500, 'Un guide intemporel pour développer des habitudes qui mènent à une vie plus efficace, écrit par l\'expert en leadership Stephen R. Covey.', '<strong>\"Les 7 Habitudes des gens très efficaces\"</strong> est un livre de référence dans le domaine du développement personnel. Écrit par Stephen R. Covey, il offre des principes universels pour améliorer son efficacité personnelle et professionnelle. Covey propose une approche basée sur des habitudes fondamentales qui permettent d’atteindre des résultats significatifs et durables.', '<li><strong>Format</strong> : Couverture souple, 372 pages</li><li><strong>Langue</strong> : Français</li><li><strong>Éditeur</strong> : Éditions First</li><li><strong>ISBN</strong> : 978-2-226-32457-7</li><li><strong>Dimensions</strong> : 15 x 22 x 2.5 cm</li><li><strong>Poids</strong> : 0.45 kg</li>', '<li><strong>Expédition</strong> : Les commandes sont traitées sous 2 à 3 jours ouvrables. La livraison standard prend 5 à 7 jours ouvrables en fonction de votre emplacement.</li><li><strong>Retours</strong> : Les retours sont acceptés dans un délai de 15 jours après réception. Les articles doivent être dans leur état d\'origine, non utilisés et dans leur emballage d\'origine.</li>', 0, 0, 1, '2024-09-23 22:25:16', '2024-09-23 23:11:02');

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
(231, 7, 4, '2024-09-08 21:06:56', '2024-09-08 21:06:56'),
(232, 7, 1, '2024-09-08 21:06:56', '2024-09-08 21:06:56'),
(233, 7, 3, '2024-09-08 21:06:56', '2024-09-08 21:06:56'),
(234, 6, 4, '2024-09-10 21:08:16', '2024-09-10 21:08:16'),
(235, 6, 1, '2024-09-10 21:08:16', '2024-09-10 21:08:16'),
(236, 6, 2, '2024-09-10 21:08:16', '2024-09-10 21:08:16'),
(239, 8, 4, '2024-09-10 23:36:04', '2024-09-10 23:36:04'),
(240, 8, 2, '2024-09-10 23:36:04', '2024-09-10 23:36:04'),
(241, 76, 15, '2024-09-23 23:11:02', '2024-09-23 23:11:02'),
(242, 76, 20, '2024-09-23 23:11:02', '2024-09-23 23:11:02'),
(243, 76, 22, '2024-09-23 23:11:02', '2024-09-23 23:11:02'),
(244, 75, 20, '2024-09-23 23:15:34', '2024-09-23 23:15:34'),
(245, 75, 22, '2024-09-23 23:15:34', '2024-09-23 23:15:34'),
(246, 75, 10, '2024-09-23 23:15:34', '2024-09-23 23:15:34'),
(247, 74, 13, '2024-09-24 14:47:04', '2024-09-24 14:47:04'),
(248, 74, 10, '2024-09-24 14:47:04', '2024-09-24 14:47:04'),
(249, 74, 8, '2024-09-24 14:47:04', '2024-09-24 14:47:04'),
(250, 73, 10, '2024-09-24 14:52:16', '2024-09-24 14:52:16'),
(251, 72, 13, '2024-09-24 14:56:42', '2024-09-24 14:56:42'),
(252, 72, 20, '2024-09-24 14:56:42', '2024-09-24 14:56:42'),
(253, 71, 4, '2024-09-24 15:00:46', '2024-09-24 15:00:46'),
(254, 71, 5, '2024-09-24 15:00:46', '2024-09-24 15:00:46'),
(255, 71, 6, '2024-09-24 15:00:46', '2024-09-24 15:00:46'),
(256, 71, 1, '2024-09-24 15:00:46', '2024-09-24 15:00:46'),
(257, 71, 3, '2024-09-24 15:00:46', '2024-09-24 15:00:46'),
(258, 71, 7, '2024-09-24 15:00:46', '2024-09-24 15:00:46'),
(259, 70, 22, '2024-09-24 15:06:24', '2024-09-24 15:06:24'),
(260, 70, 21, '2024-09-24 15:06:24', '2024-09-24 15:06:24'),
(261, 69, 4, '2024-09-24 15:10:56', '2024-09-24 15:10:56'),
(262, 69, 1, '2024-09-24 15:10:56', '2024-09-24 15:10:56'),
(263, 69, 11, '2024-09-24 15:10:56', '2024-09-24 15:10:56'),
(264, 68, 13, '2024-09-24 15:16:14', '2024-09-24 15:16:14'),
(265, 68, 20, '2024-09-24 15:16:14', '2024-09-24 15:16:14'),
(266, 68, 5, '2024-09-24 15:16:14', '2024-09-24 15:16:14'),
(267, 68, 1, '2024-09-24 15:16:14', '2024-09-24 15:16:14'),
(268, 68, 25, '2024-09-24 15:16:14', '2024-09-24 15:16:14'),
(277, 27, 1, '2024-09-24 15:29:02', '2024-09-24 15:29:02'),
(278, 27, 7, '2024-09-24 15:29:02', '2024-09-24 15:29:02'),
(279, 27, 18, '2024-09-24 15:29:02', '2024-09-24 15:29:02'),
(280, 27, 9, '2024-09-24 15:29:02', '2024-09-24 15:29:02'),
(281, 67, 21, '2024-09-24 15:37:26', '2024-09-24 15:37:26'),
(282, 67, 12, '2024-09-24 15:37:26', '2024-09-24 15:37:26'),
(283, 67, 10, '2024-09-24 15:37:26', '2024-09-24 15:37:26'),
(284, 14, 4, '2024-09-25 09:41:28', '2024-09-25 09:41:28'),
(285, 14, 25, '2024-09-25 09:41:28', '2024-09-25 09:41:28'),
(286, 14, 18, '2024-09-25 09:41:28', '2024-09-25 09:41:28'),
(287, 18, 21, '2024-09-25 09:49:32', '2024-09-25 09:49:32'),
(288, 18, 12, '2024-09-25 09:49:32', '2024-09-25 09:49:32'),
(289, 18, 10, '2024-09-25 09:49:32', '2024-09-25 09:49:32'),
(290, 18, 25, '2024-09-25 09:49:32', '2024-09-25 09:49:32');

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
(35, 7, '7_py0ibhhq8wzaxwcm1gow.jpg', 'jpg', 1, '2024-09-02 21:44:01', '2024-09-03 22:48:07'),
(38, 7, '7_c5atxaihgmt7bcjrolgx.jpg', 'jpg', 2, '2024-09-02 23:20:34', '2024-09-03 22:48:07'),
(42, 7, '7_944nozhgwumvtzfk5q7m.jpg', 'jpg', 3, '2024-09-02 23:27:29', '2024-09-03 22:47:46'),
(43, 7, '7_lbxop6rw6cyib5g676wd.jpg', 'jpg', 4, '2024-09-02 23:27:29', '2024-09-03 22:47:46'),
(47, 6, '6_clhdbagy6a2eihvi4zk9.jpg', 'jpg', 1, '2024-09-10 21:08:16', '2024-09-10 21:08:16'),
(48, 6, '6_4y9sshsdedn9mhevaf7d.jpg', 'jpg', 2, '2024-09-10 21:08:16', '2024-09-10 21:08:16'),
(49, 6, '6_whjrfe78dfptyza7onso.jpg', 'jpg', 3, '2024-09-10 21:08:16', '2024-09-10 21:08:16'),
(50, 6, '6_bpmetrceboeibtgj2bkg.jpg', 'jpg', 4, '2024-09-10 21:08:16', '2024-09-10 21:08:16'),
(51, 6, '6_pc8hph0dphdtnixhdwjr.jpg', 'jpg', 5, '2024-09-10 21:08:16', '2024-09-10 21:08:16'),
(52, 8, '8_luoy6ymx0pph3dlsmlif.jpg', 'jpg', 2, '2024-09-10 21:15:14', '2024-09-10 23:36:18'),
(53, 8, '8_1eeqdictoai8tlkbfrmc.jpg', 'jpg', 1, '2024-09-10 23:36:04', '2024-09-10 23:36:04'),
(54, 76, '76_yz1gdhwlqswxcmayslur.jfif', 'jfif', 1, '2024-09-23 23:11:02', '2024-09-23 23:11:02'),
(55, 76, '76_qdbcotqbimt98nv2fntf.jfif', 'jfif', 2, '2024-09-23 23:11:02', '2024-09-23 23:11:02'),
(56, 76, '76_nligsorreduinyfvywmy.jfif', 'jfif', 3, '2024-09-23 23:11:02', '2024-09-23 23:11:02'),
(57, 75, '75_4qzsznxhrels93vnm6dt.jfif', 'jfif', 1, '2024-09-23 23:15:34', '2024-09-23 23:15:34'),
(58, 75, '75_zp0uobg7h2fo5plnefiz.jfif', 'jfif', 2, '2024-09-23 23:15:34', '2024-09-23 23:15:34'),
(59, 75, '75_wei5pb0sdi5zt9uqhjun.jfif', 'jfif', 3, '2024-09-23 23:15:34', '2024-09-23 23:15:34'),
(60, 75, '75_lldqfl77oqzfylusj72j.jfif', 'jfif', 4, '2024-09-23 23:15:34', '2024-09-23 23:15:34'),
(61, 75, '75_f95yljhvcjbug5ppfoz4.jfif', 'jfif', 5, '2024-09-23 23:15:34', '2024-09-23 23:15:34'),
(62, 74, '74_dsg8pu6ytdk9eqhoqcee.jfif', 'jfif', 1, '2024-09-24 14:47:04', '2024-09-24 14:47:04'),
(63, 74, '74_vezrox88l9jmvuoamyku.jfif', 'jfif', 2, '2024-09-24 14:47:04', '2024-09-24 14:47:04'),
(64, 74, '74_bmgpdqzuwaivgyhlimhf.jfif', 'jfif', 3, '2024-09-24 14:47:04', '2024-09-24 14:47:04'),
(65, 73, '73_wylpszzcqlh8ecoupmt2.jfif', 'jfif', 1, '2024-09-24 14:52:16', '2024-09-24 14:52:16'),
(66, 73, '73_5k86yu2bt7owzirqadsc.jfif', 'jfif', 2, '2024-09-24 14:52:16', '2024-09-24 14:52:16'),
(67, 73, '73_p5vkd0hzt5feo0usycsk.jfif', 'jfif', 3, '2024-09-24 14:52:16', '2024-09-24 14:52:16'),
(68, 72, '72_dpydjhdk8dlqkttpkeyo.jfif', 'jfif', 1, '2024-09-24 14:56:42', '2024-09-24 14:56:42'),
(69, 72, '72_am82i3khh6b4owarzgrt.jfif', 'jfif', 2, '2024-09-24 14:56:42', '2024-09-24 14:56:42'),
(70, 72, '72_tocktt0lu3efbb43ktva.jfif', 'jfif', 3, '2024-09-24 14:56:42', '2024-09-24 14:56:42'),
(71, 71, '71_ynsrisx0g8viunfmw3y5.jfif', 'jfif', 1, '2024-09-24 15:00:46', '2024-09-24 15:00:46'),
(72, 71, '71_opjrssvos2v64syeqmkh.jfif', 'jfif', 2, '2024-09-24 15:00:46', '2024-09-24 15:00:46'),
(73, 71, '71_x41ae3v8ussu9frvmfrj.jfif', 'jfif', 3, '2024-09-24 15:00:46', '2024-09-24 15:00:46'),
(74, 70, '70_gadiuwb68osvitvbpbny.jfif', 'jfif', 1, '2024-09-24 15:06:24', '2024-09-24 15:06:24'),
(75, 70, '70_ffmxeeuwwbvandjgl7kb.jfif', 'jfif', 2, '2024-09-24 15:06:24', '2024-09-24 15:06:24'),
(76, 70, '70_go1ieahyvec10vkliupb.jfif', 'jfif', 3, '2024-09-24 15:06:24', '2024-09-24 15:06:24'),
(77, 69, '69_tkufloho0o1zpsucwu55.jfif', 'jfif', 1, '2024-09-24 15:10:56', '2024-09-24 15:10:56'),
(78, 69, '69_a4laevhanhaveybko0ej.jfif', 'jfif', 2, '2024-09-24 15:10:56', '2024-09-24 15:10:56'),
(79, 68, '68_vfcg1reiw5dyhcxwdujh.jfif', 'jfif', 1, '2024-09-24 15:16:14', '2024-09-24 15:16:14'),
(80, 68, '68_bte13odkmgoyfxqmmjge.jfif', 'jfif', 2, '2024-09-24 15:16:14', '2024-09-24 15:16:14'),
(81, 68, '68_yhka4vim4nroefoegucq.jfif', 'jfif', 3, '2024-09-24 15:16:14', '2024-09-24 15:16:14'),
(82, 27, '27_ec2bcyquodrjpovetxdu.png', 'png', 1, '2024-09-24 15:25:37', '2024-09-24 15:25:37'),
(83, 27, '27_kbneznj8p26eywopymod.png', 'png', 2, '2024-09-24 15:25:37', '2024-09-24 15:25:37'),
(84, 27, '27_ezbob2qdk0icrbvdwmaa.png', 'png', 3, '2024-09-24 15:25:37', '2024-09-24 15:25:37'),
(85, 27, '27_jlinwvf4a88aegnhsb8l.png', 'png', 4, '2024-09-24 15:25:37', '2024-09-24 15:25:37'),
(86, 67, '67_3zqyefhrhohq67z0boyg.png', 'png', 1, '2024-09-24 15:37:26', '2024-09-24 15:37:26'),
(87, 67, '67_1knvucx5scrjsop7dw56.png', 'png', 2, '2024-09-24 15:37:26', '2024-09-24 15:37:26'),
(88, 14, '14_30otkcdidq8ebws4a5xa.png', 'png', 1, '2024-09-25 09:41:28', '2024-09-25 09:41:28'),
(89, 14, '14_enqahwitlhbs8n8s1k2l.png', 'png', 2, '2024-09-25 09:41:28', '2024-09-25 09:41:28'),
(90, 18, '18_gbn4legmfoqgjcunkhdi.jfif', 'jfif', 1, '2024-09-25 09:49:32', '2024-09-25 09:49:32'),
(91, 18, '18_8locrby1mbjuqxjahcvs.jfif', 'jfif', 2, '2024-09-25 09:49:32', '2024-09-25 09:49:32'),
(92, 18, '18_myr1zhd8uifrlae3exzw.jfif', 'jfif', 3, '2024-09-25 09:49:32', '2024-09-25 09:49:32');

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
(178, 7, 'taille 1', 100, '2024-09-08 21:06:56', '2024-09-08 21:06:56'),
(179, 7, 'taille 2', 200, '2024-09-08 21:06:56', '2024-09-08 21:06:56'),
(180, 7, 'taille 3', 300, '2024-09-08 21:06:56', '2024-09-08 21:06:56'),
(181, 6, 'montre a', 60000, '2024-09-10 21:08:16', '2024-09-10 21:08:16'),
(182, 6, 'montre b', 70000, '2024-09-10 21:08:16', '2024-09-10 21:08:16'),
(183, 6, 'montre c', 8750000, '2024-09-10 21:08:16', '2024-09-10 21:08:16'),
(187, 8, 'toyota carina v1', 150000000, '2024-09-10 23:36:04', '2024-09-10 23:36:04'),
(188, 8, 'Toyota  carina v2', 251000000000000, '2024-09-10 23:36:04', '2024-09-10 23:36:04'),
(189, 8, 'toyota carina v3', 0, '2024-09-10 23:36:04', '2024-09-10 23:36:04'),
(190, 76, 'Livres Grand format', 8500, '2024-09-23 23:11:02', '2024-09-23 23:11:02'),
(191, 76, 'Livres petit format', 5000, '2024-09-23 23:11:02', '2024-09-23 23:11:02'),
(192, 74, 'Game A', 550000, '2024-09-24 14:47:04', '2024-09-24 14:47:04'),
(193, 74, 'Game B', 45000, '2024-09-24 14:47:04', '2024-09-24 14:47:04'),
(194, 70, 'patte de spaghetti 🍝', 13000, '2024-09-24 15:06:24', '2024-09-24 15:06:24'),
(195, 70, '🍅  de manioc', 45000, '2024-09-24 15:06:24', '2024-09-24 15:06:24');

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
(11, 'Voiture toyota', 0, 0, '2024-07-18 10:32:43', '2024-07-18 10:41:56', 'voiture', 'voiture', 'les bonnes voitures', 'voitures_voitures_', 1, 12),
(12, 'moto', 0, 0, '2024-07-18 10:41:15', '2024-07-18 10:41:15', 'moto', '_moto_moto', 'les motos de courses et de transport à usage commerciale', 'momo-de-course', 1, 12),
(13, 'ordinateur portable', 0, 0, '2024-07-23 01:18:59', '2024-07-23 01:18:59', 'ordiateur p', 'ordinateur p', 'les ordi', 'meta2', 1, 11),
(14, 'ordinateur fixe', 0, 0, '2024-07-23 01:19:35', '2024-07-23 01:19:35', 'ordinateur fix', 'ordi fixe', 'les ordis fixe', 'meta3', 1, 11),
(15, 'samsumg', 0, 0, '2024-07-23 01:20:31', '2024-07-23 01:20:31', 'samsumg', 'samsumg galaxie s', 'les damsungs', 'meta samsung', 1, 10),
(16, 'Iphone', 0, 0, '2024-07-23 01:21:04', '2024-07-23 01:21:04', 'Iphoe 15 Pro', 'Iphone 15 promax', 'les iphones', 'meta1', 1, 1),
(17, 'Motorola', 0, 0, '2024-09-06 15:20:11', '2024-09-06 15:20:11', 'motorola', 'Motorola', 'Motorola verison 32 GO de Stockage et 8GO de RAM.', 'Motorola', 1, 10),
(18, 'Techno', 0, 0, '2024-09-06 15:21:39', '2024-09-06 15:21:39', 'techno', 'Techno', 'Tous les Techno avec 32GO, 128GO, 256GO, 512GO, 1T de stockage.', 'Techno', 1, 10),
(19, 'Dell', 0, 0, '2024-09-06 15:22:11', '2024-09-06 15:22:11', 'dell', 'Dell', 'Dell', 'Dell', 1, 11),
(20, 'Lenovo', 0, 0, '2024-09-06 15:22:48', '2024-09-06 15:22:48', 'lenovo', 'lenovo', 'lenovo', 'lenovo', 1, 11),
(21, 'ACCER', 0, 0, '2024-09-06 15:23:23', '2024-09-06 15:23:23', 'accer', 'accer', 'accer', 'accer', 1, 11),
(22, 'ASUS', 0, 0, '2024-09-06 15:24:14', '2024-09-06 15:24:14', 'asus', 'asus', 'asus', 'asus', 1, 11),
(23, 'BMW', 0, 0, '2024-09-06 15:24:45', '2024-09-06 15:24:45', 'bmw', 'bmw', 'bmw', 'bmw', 1, 12),
(24, 'Voiture Xiaomi', 0, 0, '2024-09-06 15:26:22', '2024-09-06 15:26:22', 'Xiaomi', 'xiaomi V', 'Xiaomi v', 'xiaomi v', 1, 12),
(25, 'TOUNDRA', 0, 0, '2024-09-06 15:27:03', '2024-09-06 15:27:03', 'toundra', 'toundra', 'toundra', 'toundra', 1, 12),
(26, 'TLC', 0, 0, '2024-09-06 15:27:40', '2024-09-06 15:27:40', 'tlc', 'tlc', 'Télévision tlc', 'tlc tv', 1, 13),
(27, 'SAMSUNG TV', 0, 0, '2024-09-06 15:28:25', '2024-09-06 15:28:25', 'tele samsung', 'tele samsung', 'tele samsung', 'tele samsung', 1, 13),
(28, 'KASPERSKY', 0, 0, '2024-09-06 15:29:11', '2024-09-06 15:29:11', 'Kaspersky', 'Kaspersky', 'Kaspersky', 'Kaspersky', 1, 16),
(29, 'AVAST SECURITY', 0, 0, '2024-09-06 15:29:45', '2024-09-06 15:29:45', 'avast security', 'avast security', 'avast security', 'avast security', 1, 16),
(30, 'CAMON', 0, 0, '2024-09-06 15:30:35', '2024-09-06 15:30:35', 'camon', 'camon', 'ancre camon de toutes les couleurs', 'ancre camon', 1, 17),
(31, 'Téléphones intelligents', 0, 0, '2024-09-23 21:24:07', '2024-09-23 21:24:07', 'Téléphones-intelligents', 'Guide des Téléphones Intelligents : Comparaisons, Avis et Astuces', 'Découvrez les dernières comparaisons entre les modèles de téléphones intelligents, lisez nos avis sur les fonctionnalités et trouvez des astuces pour optimiser l’utilisation de votre smartphone. Restez connecté(e) avec style !', 'téléphones, intelligents, comparaisons, avis, astuces', 1, 18),
(32, 'Tablettes', 0, 0, '2024-09-23 21:24:48', '2024-09-23 21:24:48', 'Tablettes', 'Tablettes', '', '', 1, 18),
(33, 'Ordinateurs portables', 0, 0, '2024-09-23 21:25:12', '2024-09-23 21:25:12', 'Ordinateurs-portables', 'Ordinateurs portables', '', '', 1, 0),
(34, 'Téléviseurs', 0, 0, '2024-09-23 21:25:31', '2024-09-23 21:25:31', 'Téléviseurs', 'Téléviseurs', '', '', 1, 0),
(35, 'Accessoires', 0, 0, '2024-09-23 21:25:56', '2024-09-23 21:25:56', 'Accessoires', 'Accessoires', '', '', 1, 18),
(36, 'Appareils photo', 0, 0, '2024-09-23 21:26:17', '2024-09-23 21:26:17', 'Appareils photo', 'Appareils photo', '', '', 1, 18),
(37, 'Audio et Casques', 0, 0, '2024-09-23 21:26:38', '2024-09-23 21:26:38', 'Audio et Casques', 'Audio et Casques', '', '', 1, 18),
(38, 'Montres connectées', 0, 0, '2024-09-23 21:26:58', '2024-09-23 21:26:58', 'Montres connectées', 'Montres connectées', '', '', 1, 18),
(39, 'Consoles de jeux', 0, 0, '2024-09-23 21:27:23', '2024-09-23 21:27:23', 'Consoles de jeux', 'Consoles de jeux', '', '', 1, 18),
(40, 'Drones', 0, 0, '2024-09-23 21:27:50', '2024-09-23 21:27:50', 'Drones', 'Drones', '', '', 1, 18),
(41, 'Vêtements pour hommes', 0, 0, '2024-09-23 21:28:39', '2024-09-23 21:28:39', 'Vêtements pour hommes', 'Vêtements pour hommes', '', '', 1, 19),
(42, 'Vêtements pour femmes', 0, 0, '2024-09-23 21:29:02', '2024-09-23 21:29:02', 'Vêtements pour femmes', 'Vêtements pour femmes', '', '', 1, 19),
(43, 'Chaussures', 0, 0, '2024-09-23 21:29:23', '2024-09-23 21:29:23', 'Chaussures', 'Chaussures', '', '', 1, 19),
(44, 'Accessoires', 0, 0, '2024-09-23 21:30:18', '2024-09-23 21:30:18', 'Accessoires-de-mode', 'Accessoires', '', '', 1, 19),
(45, 'Bijoux', 0, 0, '2024-09-23 21:30:40', '2024-09-23 21:30:40', 'Bijoux', 'Bijoux', '', '', 1, 19),
(46, 'Sacs à main', 0, 0, '2024-09-23 21:31:00', '2024-09-23 21:31:00', 'Sacs à main', 'Sacs à main', '', '', 1, 19),
(47, 'Meubles', 0, 0, '2024-09-23 21:31:41', '2024-09-23 21:31:41', 'Meubles', 'Meubles', '', '', 1, 20),
(48, 'Électroménager', 0, 0, '2024-09-23 21:32:03', '2024-09-23 21:32:03', 'Électroménager', 'Électroménager', '', '', 1, 20),
(49, 'Décoration', 0, 0, '2024-09-23 21:32:21', '2024-09-23 21:32:21', 'Décoration', 'Décoration', '', '', 1, 20),
(50, 'Linge de maison', 0, 0, '2024-09-23 21:32:52', '2024-09-23 21:32:52', 'Linge-de-maison', 'Linge de maison', '', '', 1, 20),
(51, 'Jardinage', 0, 0, '2024-09-23 21:33:08', '2024-09-23 21:33:08', 'Jardinage', 'Jardinage', '', '', 1, 0),
(52, 'Éclairage', 0, 0, '2024-09-23 21:33:34', '2024-09-23 21:33:34', 'Éclairage', 'Éclairage', '', '', 1, 20),
(53, 'Outils de bricolage', 0, 0, '2024-09-23 21:33:55', '2024-09-23 21:33:55', 'Outils de bricolage', 'Outils de bricolage', '', '', 1, 20),
(54, 'Ustensiles de cuisine', 0, 0, '2024-09-23 21:34:25', '2024-09-23 21:34:25', 'Ustensiles-de-cuisine', 'Ustensiles de cuisine', '', '', 1, 20),
(55, 'Accessoires de salle de bain', 0, 0, '2024-09-23 21:35:24', '2024-09-23 21:35:24', 'Accessoires-de-salle-de-bain', 'Accessoires de salle de bain', '', '', 1, 20),
(56, 'Rangement', 0, 0, '2024-09-23 21:35:44', '2024-09-23 21:35:44', 'Rangement', 'Rangement', '', '', 1, 20),
(57, 'Soins de la peau', 0, 0, '2024-09-23 21:36:24', '2024-09-23 21:36:24', 'Soins-de-la-peau', 'Soins de la peau', '', '', 1, 21),
(58, 'Maquillage', 0, 0, '2024-09-23 21:36:44', '2024-09-23 21:36:44', 'Maquillage', 'Maquillage', '', '', 1, 21),
(59, 'Soins capillaires', 0, 0, '2024-09-23 21:37:14', '2024-09-23 21:37:14', 'Soins-capillaires', 'Soins capillaires', '', '', 1, 21),
(60, 'Parfums', 0, 0, '2024-09-23 21:37:36', '2024-09-23 21:37:36', 'Parfums', 'Parfums', '', '', 1, 21),
(61, 'Produits pour le bain', 0, 0, '2024-09-23 21:38:25', '2024-09-23 21:38:25', 'Produits-pour-le-bain', 'Produits pour le bain', '', '', 1, 21),
(62, 'Accessoires de beauté', 0, 0, '2024-09-23 21:38:57', '2024-09-23 21:38:57', 'Accessoires-de-beauté', 'Accessoires de beauté', '', '', 1, 21),
(63, 'Soins des ongles', 0, 0, '2024-09-23 21:39:26', '2024-09-23 21:39:26', 'Soins-des-ongles', 'Soins des ongles', '', '', 1, 21),
(64, 'Produits de rasage', 0, 0, '2024-09-23 21:39:50', '2024-09-23 21:39:50', 'Produits-de-rasage', 'Produits de rasage', '', '', 1, 21),
(65, 'Hygiène dentaire', 0, 0, '2024-09-23 21:40:15', '2024-09-23 21:40:15', 'Hygiène-dentaire', 'Hygiène dentaire', '', '', 1, 21),
(66, 'Soins pour hommes', 0, 0, '2024-09-23 21:40:41', '2024-09-23 21:40:41', 'Soins-pour-hommes', 'Soins pour hommes', '', '', 1, 22),
(67, 'Vêtements de sport', 0, 0, '2024-09-23 21:41:10', '2024-09-23 21:41:10', 'Vêtements-de-sport', 'Vêtements de sport', '', '', 1, 22),
(68, 'Équipement de fitness', 0, 0, '2024-09-23 21:41:38', '2024-09-23 21:41:38', 'Équipement-de-fitness', 'Équipement de fitness', '', '', 1, 22),
(69, 'Articles de camping', 0, 0, '2024-09-23 21:42:06', '2024-09-23 21:42:06', 'Articles-de-camping', 'Articles de camping', '', '', 1, 22),
(70, 'Cyclisme', 0, 0, '2024-09-23 21:42:37', '2024-09-23 21:42:37', 'Cyclisme', 'Cyclisme', '', '', 1, 23),
(71, 'Sports d\'équipe', 0, 0, '2024-09-23 21:43:01', '2024-09-23 21:43:01', 'Sports d\'équipe', 'Sports d\'équipe', '', '', 1, 22),
(72, 'Yoga et Pilates', 0, 0, '2024-09-23 21:43:23', '2024-09-23 21:43:23', 'Yoga et Pilates', 'Yoga et Pilates', '', '', 1, 22),
(73, 'Accessoires de natation', 0, 0, '2024-09-23 21:43:55', '2024-09-23 21:43:55', 'Accessoires-de-natation', 'Accessoires de natation', '', '', 1, 22),
(74, 'Sports de raquette', 0, 0, '2024-09-23 21:44:17', '2024-09-23 21:44:17', 'Sports de raquette', 'Sports de raquette', '', '', 1, 22),
(75, 'Randonnée', 0, 0, '2024-09-23 21:44:36', '2024-09-23 21:44:36', 'Randonnée', 'Randonnée', '', '', 1, 0),
(76, 'Pêche', 0, 0, '2024-09-23 21:44:55', '2024-09-23 21:44:55', 'Pêche', 'Pêche', '', '', 1, 22),
(77, 'Pièces détachées', 0, 0, '2024-09-23 21:45:20', '2024-09-23 21:45:20', 'Pièces détachées', 'Pièces détachées', '', '', 1, 23),
(78, 'Accessoires intérieurs', 0, 0, '2024-09-23 21:45:42', '2024-09-23 21:45:42', 'Accessoires intérieurs', 'Accessoires intérieurs', '', '', 1, 23),
(79, 'Pneus', 0, 0, '2024-09-23 21:46:03', '2024-09-23 21:46:03', 'Pneus', 'Pneus', '', '', 1, 23),
(80, 'Électronique embarquée', 0, 0, '2024-09-23 21:46:27', '2024-09-23 21:46:27', 'Électronique-embarquée', 'Électronique embarquée', '', '', 1, 23),
(81, 'Produits d\'entretien', 0, 0, '2024-09-23 21:46:46', '2024-09-23 21:46:46', 'Produits d\'entretien', 'Produits d\'entretien', '', '', 1, 23),
(82, 'GPS et navigation', 0, 0, '2024-09-23 21:47:05', '2024-09-23 21:47:05', 'GPS et navigation', 'GPS et navigation', '', '', 1, 23),
(83, 'Outils de réparation', 0, 0, '2024-09-23 21:47:23', '2024-09-23 21:47:23', 'Outils de réparation', 'Outils de réparation', '', '', 1, 23),
(84, 'Accessoires extérieurs', 0, 0, '2024-09-23 21:48:16', '2024-09-23 21:48:16', 'Accessoires-extérieurs', 'Accessoires extérieurs', '', '', 1, 23),
(85, 'Fruits et légumes', 0, 0, '2024-09-23 21:48:37', '2024-09-23 21:48:37', 'Fruits et légumes', 'Fruits et légumes', '', '', 1, 24),
(86, 'Viandes et Poissons', 0, 0, '2024-09-23 21:49:06', '2024-09-23 21:49:06', 'Viandes-et-Poissons', 'Viandes et Poissons', '', '', 1, 24),
(87, 'Produits laitiers', 0, 0, '2024-09-23 21:49:29', '2024-09-23 21:49:29', 'Produits-laitiers', 'Produits laitiers', '', '', 1, 24),
(88, 'Boissons alcoolisées', 0, 0, '2024-09-23 21:49:53', '2024-09-23 21:49:53', 'Boissons-alcoolisées', 'Boissons alcoolisées', '', '', 1, 25),
(89, 'Boissons non alcoolisées', 0, 0, '2024-09-23 21:50:24', '2024-09-23 21:50:24', 'Boissons-non-alcoolisées', 'Boissons non alcoolisées', '', '', 1, 24),
(90, 'Produits bio', 0, 0, '2024-09-23 21:50:42', '2024-09-23 21:50:42', 'Produits bio', 'Produits bio', '', '', 1, 25),
(91, 'Épicerie fine', 0, 0, '2024-09-23 21:50:59', '2024-09-23 21:50:59', 'Épicerie fine', 'Épicerie fine', '', '', 1, 24),
(92, 'Pâtisseries', 0, 0, '2024-09-23 21:51:17', '2024-09-23 21:51:17', 'Pâtisseries', 'Pâtisseries', '', '', 1, 24),
(93, 'Condiments et sauces', 0, 0, '2024-09-23 21:51:38', '2024-09-23 21:51:38', 'Condiments et sauces', 'Condiments et sauces', '', '', 1, 24),
(94, 'Nourriture pour bébés', 0, 0, '2024-09-23 21:54:29', '2024-09-23 21:54:29', 'Nourriture-pour-bébés', 'Nourriture pour bébés', '', '', 1, 24),
(95, 'Jeux de société', 0, 0, '2024-09-23 21:54:50', '2024-09-23 21:54:50', 'Jeux de société', 'Jeux de société', '', '', 1, 25),
(96, 'Jouets éducatifs', 0, 0, '2024-09-23 21:55:09', '2024-09-23 21:55:09', 'Jouets éducatifs', 'Jouets éducatifs', '', '', 1, 25),
(97, 'Peluches', 0, 0, '2024-09-23 21:55:29', '2024-09-23 21:55:29', 'Peluches', 'Peluches', '', '', 1, 25),
(98, 'Jeux vidéo', 0, 0, '2024-09-23 21:55:48', '2024-09-23 21:55:48', 'Jeux vidéo', 'Jeux vidéo', '', '', 1, 25),
(99, 'Puzzles', 0, 0, '2024-09-23 21:56:06', '2024-09-23 21:56:06', 'Puzzles', 'Puzzles', '', '', 1, 25),
(100, 'Jouets de construction', 0, 0, '2024-09-23 21:56:28', '2024-09-23 21:56:28', 'Jouets de construction', 'Jouets de construction', '', '', 1, 25),
(101, 'Jeux de cartes', 0, 0, '2024-09-23 21:56:54', '2024-09-23 21:56:54', 'Jeux de cartes', 'Jeux de cartes', '', '', 1, 25),
(102, 'Jouets pour bébés', 0, 0, '2024-09-23 21:57:12', '2024-09-23 21:57:12', 'Jouets pour bébés', 'Jouets pour bébés', '', '', 1, 25),
(103, 'Romans', 0, 0, '2024-09-23 21:57:34', '2024-09-23 21:57:34', 'Romans', 'Romans', '', '', 1, 26),
(104, 'Livres pour enfants', 0, 0, '2024-09-23 21:57:50', '2024-09-23 21:57:50', 'Livres pour enfants', 'Livres pour enfants', '', '', 1, 26),
(105, 'Livres de cuisine', 0, 0, '2024-09-23 21:58:05', '2024-09-23 21:58:05', 'Livres de cuisine', 'Livres de cuisine', '', '', 1, 26),
(106, 'Bandes dessinées', 0, 0, '2024-09-23 21:58:23', '2024-09-23 21:58:23', 'Bandes dessinées', 'Bandes dessinées', '', '', 1, 26),
(107, 'Musique', 0, 0, '2024-09-23 21:58:41', '2024-09-23 21:58:41', 'Musique', 'Musique', '', '', 1, 26),
(108, 'Films et séries TV', 0, 0, '2024-09-23 21:58:57', '2024-09-23 21:58:57', 'Films et séries TV', 'Films et séries TV', '', '', 1, 26),
(109, 'Guides de voyage', 0, 0, '2024-09-23 21:59:16', '2024-09-23 21:59:16', 'Guides de voyage', 'Guides de voyage', '', '', 1, 26),
(110, 'Livres scientifiques', 0, 0, '2024-09-23 21:59:35', '2024-09-23 21:59:35', 'Livres scientifiques', 'Livres scientifiques', '', '', 1, 26),
(111, 'Livres de développement personnel', 0, 0, '2024-09-23 21:59:53', '2024-09-23 21:59:53', 'Livres de développement personnel', 'Livres de développement personnel', '', '', 1, 26),
(112, 'Nourriture pour chiens', 0, 0, '2024-09-23 22:00:21', '2024-09-23 22:00:21', 'Nourriture pour chiens', 'Nourriture pour chiens', '', '', 1, 27),
(113, 'Nourriture pour chats', 0, 0, '2024-09-23 22:00:40', '2024-09-23 22:00:40', 'Nourriture pour chats', 'Nourriture pour chats', '', '', 1, 27),
(114, 'Accessoires pour chiens', 0, 0, '2024-09-23 22:00:57', '2024-09-23 22:00:57', 'Accessoires pour chiens', 'Accessoires pour chiens', '', '', 1, 27),
(115, 'Accessoires pour chats', 0, 0, '2024-09-23 22:01:14', '2024-09-23 22:01:14', 'Accessoires pour chats', 'Accessoires pour chats', '', '', 1, 27),
(116, 'Jouets pour animaux', 0, 0, '2024-09-23 22:01:31', '2024-09-23 22:01:31', 'Jouets pour animaux', 'Jouets pour animaux', '', '', 1, 27),
(117, 'Hygiène et soins', 0, 0, '2024-09-23 22:01:48', '2024-09-23 22:01:48', 'Hygiène et soins', 'Hygiène et soins', '', '', 1, 27),
(118, 'Aquariophilie', 0, 0, '2024-09-23 22:02:04', '2024-09-23 22:02:04', 'Aquariophilie', 'Aquariophilie', '', '', 1, 27),
(119, 'Reptiles', 0, 0, '2024-09-23 22:02:20', '2024-09-23 22:02:20', 'Reptiles', 'Reptiles', '', '', 1, 27);

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
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$4x0rPwI4LLKQbkDs/Xgc4Oqo3.jpxpGeSD4n7NN1rCY6XmBFGkH4y', 'rjCkWAwGTybQGgfkMFsdNY3mfkC4U3AkHVnczP3fOu1mdg6WM7BdpshDaNRg', '0000-00-00 00:00:00', NULL, 1, 0, 0),
(4, 'utilisateur 1', 'utilisateur1@gmail.com', NULL, '$2y$10$0/B610t6pKjxNzGxtnjYi.H.r2pIQSk8qHoA.mIyuXqDo/WkwO86i', NULL, '2024-07-11 18:03:01', '2024-09-08 19:08:08', 1, 0, 0),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT pour la table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

--
-- AUTO_INCREMENT pour la table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT pour la table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT pour la table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
