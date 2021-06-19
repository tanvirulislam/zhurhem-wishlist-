-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2021 at 11:20 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zurhem`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'superadmin@gmail.com', 'superadmin', NULL, '$2y$10$P7XKbcdy.V46KeuF1PljgOoXXfAQvqjuZkPg71AyMlNUkdcWbBXjS', 'user-photo/1619943767.png', NULL, '2021-03-24 05:29:53', '2021-05-02 02:22:47'),
(2, 'admin', 'admin@gmail.com', NULL, NULL, '$2y$10$oKyZWZD/FsdnA47iBH36hO6pWRTwXVf.kQiOUyaPlu.xY7ZE4beW6', NULL, NULL, '2021-03-24 06:14:00', '2021-03-24 06:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `category_slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'WOMEN', 'women', '1', '2021-05-02 03:12:31', '2021-05-02 05:38:43'),
(2, 'NEW IN', 'new-in', '1', '2021-05-02 05:38:05', '2021-05-02 05:38:05'),
(3, 'MEN', 'men', '1', '2021-05-02 05:38:24', '2021-05-02 05:38:24'),
(4, 'GIFTS', 'gifts', '1', '2021-05-02 05:39:03', '2021-05-02 05:39:03'),
(5, 'RUNWAY', 'runway', '1', '2021-05-02 05:39:13', '2021-05-02 05:39:13'),
(6, 'WORLD', 'world', '1', '2021-05-02 05:39:24', '2021-05-02 05:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_services`
--

CREATE TABLE `customer_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_and_cares`
--

CREATE TABLE `detail_and_cares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_and_care` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_and_cares`
--

INSERT INTO `detail_and_cares` (`id`, `product_id`, `detail_and_care`, `created_at`, `updated_at`) VALUES
(16, '18', 'Model measures: chest 38\" , height 6.1\"', '2021-05-04 07:17:04', '2021-05-04 07:17:04'),
(19, '17', 'Model measures: chest 38\" , height 6.1\"', '2021-05-04 13:20:19', '2021-05-04 13:20:19'),
(20, '17', 'Model measures: chest 38\" , height 6.1\"', '2021-05-04 13:20:19', '2021-05-04 13:20:19'),
(21, '17', 'Model measures: chest 38\" , height 6.1\"', '2021-05-04 13:20:19', '2021-05-04 13:20:19'),
(22, '17', 'Model measures: chest 38\" , height 6.1\"', '2021-05-04 13:20:19', '2021-05-04 13:20:19'),
(23, '17', 'vvvvvvv', '2021-05-04 13:20:19', '2021-05-04 13:20:19'),
(30, '27', 'Model measures: chest 38\" , height 6.1\"', '2021-05-06 12:32:19', '2021-05-06 12:32:19'),
(31, '27', 'Model measures: chest 38\" , height 6.1\"', '2021-05-06 12:32:19', '2021-05-06 12:32:19'),
(32, '27', 'Model measures: chest 38\" , height 6.1\"', '2021-05-06 12:32:19', '2021-05-06 12:32:19'),
(33, '27', 'Model measures: chest 38\" , height 6.1\"', '2021-05-06 12:32:19', '2021-05-06 12:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `product_id`, `feature`, `created_at`, `updated_at`) VALUES
(5, '17', '<p>Jacket</p>\r\n\r\n<ul>\r\n	<li>No shoulder padding for a more casual look</li>\r\n	<li>4-on-2, double-breasted closure</li>\r\n	<li>Slightly-curved peak lapel</li>\r\n	<li>Patch pockets</li>\r\n	<li>Boat-shaped breast pocket</li>\r\n	<li>Half-canvas construction</li>\r\n</ul>\r\n\r\n<p>Trousers</p>\r\n\r\n<ul>\r\n	<li>No shoulder padding for a more casual look</li>\r\n	<li>4-on-2, double-breasted closure</li>\r\n	<li>Slightly-curved peak lapel</li>\r\n	<li>Patch pockets</li>\r\n	<li>Boat-shaped breast pocket</li>\r\n	<li>Half-canvas construction</li>\r\n	<li>222</li>\r\n</ul>', '2021-05-04 05:12:00', '2021-05-04 12:35:22'),
(6, '18', '<p>wewe</p>', '2021-05-04 07:16:59', '2021-05-04 07:16:59'),
(14, '27', '<p>Jacket</p>\r\n\r\n<p>No shoulder padding for a more casual look<br />\r\n4-on-2, double-breasted closure<br />\r\nSlightly-curved peak lapel<br />\r\nPatch pockets<br />\r\nBoat-shaped breast pocket<br />\r\nHalf-canvas construction</p>\r\n\r\n<p>Trousers</p>\r\n\r\n<p>No shoulder padding for a more casual look<br />\r\n4-on-2, double-breasted closure<br />\r\nSlightly-curved peak lapel<br />\r\nPatch pockets<br />\r\nBoat-shaped breast pocket<br />\r\nHalf-canvas construction</p>', '2021-05-06 12:31:47', '2021-05-06 12:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `main_orders`
--

CREATE TABLE `main_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_total` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_orders`
--

INSERT INTO `main_orders` (`id`, `shipping_id`, `user_id`, `pin`, `order_total`, `status`, `created_at`, `updated_at`) VALUES
(29, 33, 4, 'ZURHEM-26549039', 160, 1, '2021-05-08 02:12:32', '2021-05-08 02:12:32'),
(30, 34, 4, 'ZURHEM-76778514', 160, 0, '2021-05-08 02:13:25', '2021-05-08 02:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `media_coverages`
--

CREATE TABLE `media_coverages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2021_03_18_095906_create_permission_tables', 1),
(13, '2021_03_24_112406_create_admins_table', 2),
(14, '2021_05_02_082546_create_categories_table', 3),
(15, '2021_05_02_082739_create_subcategories_table', 4),
(16, '2021_05_02_082914_create_products_table', 5),
(17, '2021_05_02_083255_create_categories_table', 6),
(18, '2021_05_02_083302_create_subcategories_table', 6),
(19, '2021_05_02_095825_create_photos_table', 7),
(20, '2021_05_02_100254_create_sizes_table', 7),
(21, '2021_05_02_100412_create_stocks_table', 7),
(22, '2021_05_03_093959_create_product_sizes_table', 8),
(23, '2021_05_03_094152_create_features_table', 8),
(24, '2021_05_03_094608_create_detail_and_cares_table', 8),
(25, '2021_05_03_094737_create_size_and_fits_table', 8),
(26, '2021_05_04_201141_create_favourites_table', 9),
(27, '2021_05_04_201331_create_customer_services_table', 9),
(28, '2021_05_04_201655_create_contacts_table', 9),
(29, '2021_05_04_202338_create_shippings_table', 9),
(30, '2021_05_04_202424_create_orders_table', 9),
(31, '2021_05_04_202506_create_main_orders_table', 9),
(32, '2021_05_04_202538_create_about_us_table', 9),
(33, '2021_05_04_202659_create_media_coverages_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1),
(1, 'App\\User', 1),
(2, 'App\\Models\\Admin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `shipping_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `order_total` double(8,2) DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `shipping_id`, `product_id`, `size`, `product_name`, `order_id`, `product_price`, `product_quantity`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(11, 4, 33, 17, 's', 'Dark Green Textured Stripe Buttonless Polo', '29', 160.00, 1, 160.00, '1', '2021-05-08 02:12:32', '2021-05-08 02:12:32'),
(12, 4, 34, 17, 'S', 'Dark Green Textured Stripe Buttonless Polo', '30', 160.00, 1, 160.00, 'pending', '2021-05-08 02:13:25', '2021-05-08 02:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.view', 'admin', 'dashboard', '2021-03-24 02:04:15', '2021-03-24 02:04:15'),
(2, 'dashboard.edit', 'admin', 'dashboard', '2021-03-24 02:04:15', '2021-03-24 02:04:15'),
(3, 'blog.create', 'admin', 'blog', '2021-03-24 02:04:15', '2021-03-24 02:04:15'),
(4, 'blog.view', 'admin', 'blog', '2021-03-24 02:04:15', '2021-03-24 02:04:15'),
(5, 'blog.edit', 'admin', 'blog', '2021-03-24 02:04:15', '2021-03-24 02:04:15'),
(6, 'blog.delete', 'admin', 'blog', '2021-03-24 02:04:15', '2021-03-24 02:04:15'),
(7, 'blog.approve', 'admin', 'blog', '2021-03-24 02:04:15', '2021-03-24 02:04:15'),
(8, 'admin.create', 'admin', 'admin', '2021-03-24 02:04:16', '2021-03-24 02:04:16'),
(9, 'admin.view', 'admin', 'admin', '2021-03-24 02:04:16', '2021-03-24 02:04:16'),
(10, 'admin.edit', 'admin', 'admin', '2021-03-24 02:04:16', '2021-03-24 02:04:16'),
(11, 'admin.delete', 'admin', 'admin', '2021-03-24 02:04:16', '2021-03-24 02:04:16'),
(12, 'admin.approve', 'admin', 'admin', '2021-03-24 02:04:16', '2021-03-24 02:04:16'),
(13, 'role.create', 'admin', 'role', '2021-03-24 02:04:16', '2021-03-24 02:04:16'),
(14, 'role.view', 'admin', 'role', '2021-03-24 02:04:16', '2021-03-24 02:04:16'),
(15, 'role.edit', 'admin', 'role', '2021-03-24 02:04:17', '2021-03-24 02:04:17'),
(16, 'role.delete', 'admin', 'role', '2021-03-24 02:04:17', '2021-03-24 02:04:17'),
(17, 'role.approve', 'admin', 'role', '2021-03-24 02:04:17', '2021-03-24 02:04:17'),
(18, 'profile.view', 'admin', 'profile', '2021-03-24 02:04:17', '2021-03-24 02:04:17'),
(19, 'profile.edit', 'admin', 'profile', '2021-03-24 02:04:17', '2021-03-24 02:04:17'),
(20, 'permission.create', 'admin', 'permission', NULL, NULL),
(21, 'permission.view', 'admin', 'permission', NULL, NULL),
(22, 'permission.edit', 'admin', 'permission', NULL, NULL),
(23, 'permission.delete', 'admin', 'permission', NULL, NULL),
(25, 'category.create', 'admin', 'category', NULL, NULL),
(26, 'category.view', 'admin', 'category', NULL, NULL),
(27, 'category.edit', 'admin', 'category', NULL, NULL),
(28, 'category.delete', 'admin', 'category', NULL, NULL),
(29, 'subcategory.create', 'admin', 'subcategory', NULL, NULL),
(30, 'subcategory.view', 'admin', 'subcategory', NULL, NULL),
(31, 'subcategory.edit', 'admin', 'subcategory', NULL, NULL),
(32, 'subcategory.delete', 'admin', 'subcategory', NULL, NULL),
(33, 'product.create', 'admin', 'product', NULL, NULL),
(34, 'product.view', 'admin', 'product', NULL, NULL),
(35, 'product.edit', 'admin', 'product', NULL, NULL),
(36, 'product.delete', 'admin', 'product', NULL, NULL),
(37, 'size.create', 'admin', 'size', NULL, NULL),
(38, 'size.view', 'admin', 'size', NULL, NULL),
(39, 'size.edit', 'admin', 'size', NULL, NULL),
(40, 'size.delete', 'admin', 'size', NULL, NULL),
(41, 'stock.create', 'admin', 'stock', NULL, NULL),
(42, 'stock.view', 'admin', 'stock', NULL, NULL),
(43, 'stock.edit', 'admin', 'stock', NULL, NULL),
(44, 'stock.delete', 'admin', 'stock', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(10, '18', 'public/upload/DSCF6873.jpg', '2021-05-04 07:17:14', '2021-05-04 07:17:14'),
(22, '17', 'public/upload/DSCF7011.jpg', '2021-05-05 17:32:17', '2021-05-05 17:32:17'),
(23, '17', 'public/upload/DSCF6873.jpg', '2021-05-05 17:32:17', '2021-05-05 17:32:17'),
(24, '17', 'public/upload/DSCF6872.jpg', '2021-05-05 17:32:17', '2021-05-05 17:32:17'),
(25, '17', 'public/upload/DSCF6869.jpg', '2021-05-05 17:32:17', '2021-05-05 17:32:17'),
(26, '17', 'public/upload/DSCF6884.jpg', '2021-05-05 17:32:17', '2021-05-05 17:32:17'),
(28, '27', 'public/upload/DSCF7011.jpg', '2021-05-06 12:33:59', '2021-05-06 12:33:59'),
(29, '27', 'public/upload/DSCF6873.jpg', '2021-05-06 12:33:59', '2021-05-06 12:33:59'),
(30, '27', 'public/upload/DSCF6872.jpg', '2021-05-06 12:33:59', '2021-05-06 12:33:59'),
(31, '27', 'public/upload/DSCF6869.jpg', '2021-05-06 12:33:59', '2021-05-06 12:33:59'),
(32, '27', 'public/upload/DSCF6884.jpg', '2021-05-06 12:33:59', '2021-05-06 12:33:59');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cloth_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_and_care` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_and_fit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `product_code`, `name`, `category_slug`, `subcategory_slug`, `product_slug`, `price`, `desc`, `cloth_name`, `size`, `detail_and_care`, `size_and_fit`, `feature`, `status`, `created_at`, `updated_at`) VALUES
(17, 'public/upload/DSCF6873.jpg', '5727673361', 'Dark Green Textured Stripe Buttonless Polo', 'men', 'suit', 'dark-green-textured-stripe-buttonless-polo', '160', '<p>Highlighted by a bold, textured green stripe, this slim tailored polo is crafted from a lightweight linen cotton blend with a buttonless collar.</p>', 'Pure Wool', NULL, NULL, NULL, NULL, '1', '2021-05-04 05:10:35', '2021-05-04 05:10:35'),
(27, 'public/upload/1620325888.jpg', '3840091940', 'Dark Green Textured Stripe Buttonless Polo', 'men', 'suit', 'dark-green-textured-stripe-buttonless-polo', '160', '<p>Highlighted by a bold, textured green stripe, this slim tailored polo is crafted from a lightweight linen-cotton blend with a buttonless collar.</p>', 'Pure Wool', NULL, NULL, NULL, NULL, '2', '2021-05-06 12:31:28', '2021-05-06 12:31:28');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size`, `created_at`, `updated_at`) VALUES
(19, '18', 'S', '2021-05-04 07:16:52', '2021-05-04 07:16:52'),
(38, '17', 'S', '2021-05-04 07:16:52', '2021-05-04 07:16:52'),
(42, '27', 'S', '2021-05-06 12:31:28', '2021-05-06 12:31:28'),
(43, '27', 'XL', '2021-05-06 12:31:28', '2021-05-06 12:31:28');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'admin', '2021-03-24 02:04:14', '2021-03-24 02:04:14'),
(2, 'admin', 'admin', '2021-03-24 02:04:14', '2021-03-24 02:04:14'),
(3, 'editor', 'admin', '2021-03-24 02:04:14', '2021-03-24 02:04:14'),
(4, 'user', 'admin', '2021-03-24 02:04:14', '2021-03-24 02:04:14'),
(5, 'test2', 'admin', '2021-03-24 02:13:05', '2021-03-24 02:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(16, 1),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(18, 3),
(19, 1),
(19, 2),
(19, 3),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `msg`, `created_at`, `updated_at`) VALUES
(1, NULL, 'mizan', 'admin@gmail.com', '01756819542', 'gg', 'ggg', '2021-05-06 01:51:03', '2021-05-06 01:51:03'),
(2, NULL, 'mizan', 'admin@gmail.com', '01756819542', 'gg', 'ggg', '2021-05-06 01:52:49', '2021-05-06 01:52:49'),
(3, NULL, 'mizan', 'admin@gmail.com', '01756819542', 'ff', 'ggg', '2021-05-06 01:53:03', '2021-05-06 01:53:03'),
(4, NULL, 'mizan', 'admin@gmail.com', '01756819542', 'ff', 'ggg', '2021-05-06 01:54:25', '2021-05-06 01:54:25'),
(5, NULL, 'mizan', 'admin@gmail.com', '01756819542', 'ff', 'ggg', '2021-05-06 01:56:25', '2021-05-06 01:56:25'),
(6, NULL, 'mizan', 'admin@gmail.com', '01756819542', 'ff', 'ggg', '2021-05-06 01:57:02', '2021-05-06 01:57:02'),
(7, NULL, 'mizan', 'admin@gmail.com', '01756819542', 'ff', 'ggg', '2021-05-06 01:57:41', '2021-05-06 01:57:41'),
(8, NULL, 'mizan', 'superadmin@gmail.com', '01756819542', 'hh', 'hh', '2021-05-06 04:00:49', '2021-05-06 04:00:49'),
(9, NULL, 'mizan', 'superadmin@gmail.com', '01756819542', 'hh', 'hh', '2021-05-06 04:11:11', '2021-05-06 04:11:11'),
(10, NULL, 'mizan', 'superadmin@gmail.com', '01756819542', 'hh', 'hh', '2021-05-06 04:11:32', '2021-05-06 04:11:32'),
(11, NULL, 'mizan', 'superadmin@gmail.com', '01756819542', 'hh', 'hh', '2021-05-06 04:12:45', '2021-05-06 04:12:45'),
(12, NULL, 'mizan', 'superadmin@gmail.com', '01756819542', 'hh', 'hh', '2021-05-06 04:15:11', '2021-05-06 04:15:11'),
(13, NULL, 'mizan', 'superadmin@gmail.com', '01756819542', 'hh', 'hh', '2021-05-06 04:16:04', '2021-05-06 04:16:04'),
(14, NULL, 'mizan', 'superadmin@gmail.com', '01756819542', 'hh', 'hh', '2021-05-06 04:16:57', '2021-05-06 04:16:57'),
(15, NULL, 'mizan', 'superadmin@gmail.com', '01756819542', 'hh', 'hh', '2021-05-06 04:17:13', '2021-05-06 04:17:13'),
(16, NULL, 'mizan', 'superadmin@gmail.com', '01756819542', 'hh', 'hh', '2021-05-06 04:18:07', '2021-05-06 04:18:07'),
(17, NULL, 'mizan', 'admin@gmail.com', '01756819542', 'ziropoint', 'hghg', '2021-05-06 06:19:15', '2021-05-06 06:19:15'),
(18, NULL, 'mizan', 'admin@gmail.com', '01756819542', 'ziropoint', 'hghg', '2021-05-06 07:04:06', '2021-05-06 07:04:06'),
(19, NULL, 'mizan', 'admin@gmail.com', '01756819542', 'ziropoint', 'hghg', '2021-05-06 07:04:50', '2021-05-06 07:04:50'),
(20, NULL, 'mizan', 'admin@gmail.com', '01756819542', 'ziropoint', 'hghg', '2021-05-06 07:04:54', '2021-05-06 07:04:54'),
(21, NULL, 'mizan', 'admin@gmail.com', '01756819542', 'ziropoint', 'hghg', '2021-05-06 07:05:24', '2021-05-06 07:05:24'),
(22, NULL, 'mizan', 'admin@gmail.com', '01756819542', 'ziropoint', 'hghg', '2021-05-06 07:05:41', '2021-05-06 07:05:41'),
(23, NULL, 'mizan', 'admin@gmail.com', '01756819542', 'ziropoint', 'hghg', '2021-05-06 07:05:51', '2021-05-06 07:05:51'),
(24, NULL, 'mizan', 'admin@gmail.com', '01756819542', 'ziropoint', 'hghg', '2021-05-06 07:07:13', '2021-05-06 07:07:13'),
(25, NULL, 'mizan', 'admin@gmail.com', '01756819542', 'ziropoint', 'uyuy', '2021-05-06 12:39:23', '2021-05-06 12:39:23'),
(26, NULL, 'mizan', 'superadmin@gmail.com', '01756819542', 'ziropoint', 'hlw', '2021-05-06 12:42:00', '2021-05-06 12:42:00'),
(27, '4', 'mizan', 'admin@gmail.com', '01756819542', 'Dhaka', 'hh', '2021-05-07 13:36:42', '2021-05-07 13:36:42'),
(28, '4', 'mizan', 'x@gmail.com', '01756819542', 'erwr', 'jhjh', '2021-05-07 13:40:25', '2021-05-07 13:40:25'),
(29, '4', 'mizan', 'x@gmail.com', '01756819542', 'Ziropoint', 'ytyt', '2021-05-07 13:45:44', '2021-05-07 13:45:44'),
(30, '4', 'mizan', 'x@gmail.com', '01756819542', 'Ziropoint', 'ytyt', '2021-05-07 13:47:54', '2021-05-07 13:47:54'),
(31, '4', 'mizan', 'tanvirul.cse.diu@gmail.com', '01756819542', 'Ziropoint', 'hjh', '2021-05-07 13:50:03', '2021-05-07 13:50:03'),
(32, '4', 'mizan', 'tanvirul.cse.diu@gmail.com', '01756819542', 'Ziropoint', 'hjh', '2021-05-07 13:51:45', '2021-05-07 13:51:45'),
(33, '4', 'mizan', 'mizan@gmail.com', '01756819542', 'ziropoint', 'dd', '2021-05-08 02:12:32', '2021-05-08 02:12:32'),
(34, '4', 'kajol', 'admin@gmail.com', '01756819542', 'Dhaka', 'bbb', '2021-05-08 02:13:25', '2021-05-08 02:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `product_id`, `size`, `created_at`, `updated_at`) VALUES
(1, NULL, 'S', '2021-05-02 04:47:04', '2021-05-02 05:01:16'),
(2, NULL, 'XL', '2021-05-02 11:16:56', '2021-05-02 11:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `size_and_fits`
--

CREATE TABLE `size_and_fits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_and_fit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `size_and_fits`
--

INSERT INTO `size_and_fits` (`id`, `product_id`, `size_and_fit`, `created_at`, `updated_at`) VALUES
(11, '18', 'Model is wearing a customized size US 38', '2021-05-04 07:17:08', '2021-05-04 07:17:08'),
(18, '17', 'Model is wearing a customized size US 38', '2021-05-04 13:21:37', '2021-05-04 13:21:37'),
(19, '17', 'women', '2021-05-04 13:21:37', '2021-05-04 13:21:37'),
(25, '27', 'Model is wearing a customized size US 38', '2021-05-06 12:33:26', '2021-05-06 12:33:26'),
(26, '27', 'Model measures: chest 38\" , height 6.1\"\"', '2021-05-06 12:33:26', '2021-05-06 12:33:26'),
(27, '27', 'Fits true to size. Take normal size', '2021-05-06 12:33:26', '2021-05-06 12:33:26'),
(28, '27', 'Slim fit jacket. Narrow through the shoulders and waist, with a regular chest Mid-rise trousers. Straight through the leg and hem', '2021-05-06 12:33:26', '2021-05-06 12:33:26'),
(29, '27', 'Size US 38: trousers have a hem width of 7.3\"', '2021-05-06 12:33:26', '2021-05-06 12:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product_id`, `stock`, `created_at`, `updated_at`) VALUES
(1, '17', '76', '2021-05-04 05:10:35', '2021-05-04 05:10:35'),
(2, '18', '33', '2021-05-04 07:16:52', '2021-05-04 07:16:52'),
(3, '19', 'mm', '2021-05-04 07:26:07', '2021-05-04 07:26:07'),
(4, '20', '11', '2021-05-04 07:42:21', '2021-05-04 07:42:21'),
(5, '21', '34', '2021-05-05 11:16:47', '2021-05-05 18:05:50'),
(6, '22', '76', '2021-05-05 11:53:10', '2021-05-05 11:53:10'),
(7, '23', '33', '2021-05-05 14:02:21', '2021-05-05 14:02:21'),
(8, '24', '33', '2021-05-05 14:03:51', '2021-05-05 14:03:51'),
(9, '25', '56', '2021-05-05 14:55:29', '2021-05-05 14:55:29'),
(10, '26', '33', '2021-05-06 12:21:18', '2021-05-06 12:21:18'),
(11, '27', '76', '2021-05-06 12:31:28', '2021-05-06 12:31:28');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcategory_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `category_slug`, `subcategory_slug`, `status`, `created_at`, `updated_at`) VALUES
(3, 'SUIT', 'men', 'suit', '1', '2021-05-02 03:53:29', '2021-05-02 05:44:25'),
(4, 'PANJABI', 'men', 'panjabi', '1', '2021-05-02 03:55:15', '2021-05-02 05:44:53'),
(5, 'DRESS', 'women', 'dress', '1', '2021-05-02 05:45:15', '2021-05-02 05:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(100) NOT NULL DEFAULT 2,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `phone`, `name`, `email`, `role_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'kamruzzaman Kajol', 'kajol@gmail.com', 2, NULL, '$2y$10$9GlZ6UZHjKS9qCpZRRiRReZHGINPxKnjd1W0C4Rx8sneI.VIHgiCS', NULL, '2021-03-24 02:04:14', '2021-03-24 02:04:14'),
(4, NULL, 'mizan', 'mizan@gmail.com', 2, NULL, '$2y$10$oTdIZo.9LcY7l8UHbOEjiu6cir2rVZg2inLAczLorid28UgM3ywxm', NULL, '2021-05-07 13:35:49', '2021-05-07 13:35:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_services`
--
ALTER TABLE `customer_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_and_cares`
--
ALTER TABLE `detail_and_cares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_orders`
--
ALTER TABLE `main_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_coverages`
--
ALTER TABLE `media_coverages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size_and_fits`
--
ALTER TABLE `size_and_fits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_services`
--
ALTER TABLE `customer_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_and_cares`
--
ALTER TABLE `detail_and_cares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `main_orders`
--
ALTER TABLE `main_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `media_coverages`
--
ALTER TABLE `media_coverages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `size_and_fits`
--
ALTER TABLE `size_and_fits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
