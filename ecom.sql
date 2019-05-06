-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2019 at 05:01 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(6, 'Men', NULL, '2019-03-28 18:00:00', '2019-03-28 18:00:00'),
(14, 'Women', NULL, '2019-03-29 11:40:27', '2019-03-29 11:40:27'),
(16, 'Pants', 6, '2019-03-29 11:40:41', '2019-03-29 11:40:41'),
(17, 'Shirts', 6, '2019-03-29 11:40:47', '2019-03-29 11:40:47'),
(18, 'Pants', 14, '2019-03-29 11:40:53', '2019-03-29 11:40:53'),
(20, 'Shirts', 14, '2019-03-29 11:41:05', '2019-03-29 11:41:05'),
(21, 'Children', NULL, '2019-04-22 18:00:00', '2019-04-22 18:00:00'),
(22, 'T-Shirt', 14, '2019-04-23 07:35:57', '2019-04-23 07:35:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_03_29_100052_create_roles_table', 2),
(3, '2019_03_29_100415_create_user_roles_table', 3),
(4, '2019_03_29_100600_create_tags_table', 4),
(5, '2019_03_29_100625_create_categories_table', 4),
(6, '2019_03_29_101606_create_product_statuses_table', 5),
(7, '2019_03_29_101933_create_products_table', 6),
(8, '2019_03_29_102035_create_product_categories_table', 7),
(9, '2019_03_29_102153_create_product_tags_table', 8),
(10, '2019_03_29_102254_create_product_images_table', 8),
(11, '2019_04_26_051740_create_unreg_customers_table', 9),
(12, '2019_04_26_052135_create_orders_table', 10),
(13, '2019_04_26_052832_create_order_products_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `reg_customer` int(10) UNSIGNED DEFAULT NULL,
  `unreg_customer` int(10) UNSIGNED DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `reg_customer`, `unreg_customer`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(45, 5, NULL, '01667452625', 'Muradpur, Chittagong', '2019-04-28 06:20:19', '2019-04-28 06:20:19'),
(46, 5, NULL, '01688475965', 'Muradpur, Chittagong', '2019-04-28 06:23:25', '2019-04-28 06:23:25'),
(47, NULL, 33, 'dafdsf', 'dfsdf', '2019-04-28 08:35:07', '2019-04-28 08:35:07'),
(48, NULL, 34, '01732458854', 'Nodda,Dhaka', '2019-04-28 10:16:48', '2019-04-28 10:16:48'),
(49, NULL, 35, 'ggg', 'ggg', '2019-04-28 10:20:15', '2019-04-28 10:20:15'),
(50, NULL, 37, 'qwq', 'ss', '2019-04-28 10:21:44', '2019-04-28 10:21:44'),
(51, NULL, 38, 'qsq', 'sqs', '2019-04-28 10:22:46', '2019-04-28 10:22:46'),
(52, NULL, 39, 'scs', 'scs', '2019-04-28 10:23:56', '2019-04-28 10:23:56'),
(53, 5, NULL, 'sssss', 'ssss', '2019-04-28 10:59:06', '2019-04-28 10:59:06'),
(54, NULL, 40, '0152347784', 'Kuratoli', '2019-04-28 22:49:33', '2019-04-28 22:49:33'),
(55, NULL, 41, 'dsdsdsdd', 'sdsdsd', '2019-04-29 00:03:29', '2019-04-29 00:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(48, 45, 4, 1, NULL, NULL),
(49, 45, 5, 2, NULL, NULL),
(50, 46, 5, 2, NULL, NULL),
(51, 46, 6, 1, NULL, NULL),
(52, 46, 4, 1, NULL, NULL),
(53, 47, 4, 1, NULL, NULL),
(54, 47, 5, 1, NULL, NULL),
(55, 48, 5, 2, NULL, NULL),
(56, 48, 6, 1, NULL, NULL),
(57, 49, 7, 1, NULL, NULL),
(58, 50, 7, 1, NULL, NULL),
(59, 51, 7, 1, NULL, NULL),
(60, 52, 6, 1, NULL, NULL),
(61, 53, 5, 1, NULL, NULL),
(62, 54, 9, 1, NULL, NULL),
(63, 54, 10, 1, NULL, NULL),
(64, 55, 10, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status_id` int(10) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `description`, `product_status_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, '433731', 'Shirt', 'Women Shirt. Pure cotton.', 1, 1999, 44, '2019-03-30 03:06:23', '2019-04-28 12:58:52'),
(2, '304202', 'Shirt', 'dvg fdfsdf adfsdfsd sdfdf afdafd sdfsdf a', 1, 501, 20, '2019-04-03 06:42:37', '2019-04-03 06:42:37'),
(4, '455352', 'Full Sleeve Shirt', 'pp\';ouly', 1, 1500, 50, '2019-04-22 23:29:36', '2019-04-22 23:29:36'),
(5, '905602', 'T-Shirt', 'ew1e 2r 2er', 1, 500, 50, '2019-04-23 00:37:16', '2019-04-23 00:37:16'),
(6, '896477', 'Red T-Shirt', 'It is a red T-Shirt for women', 1, 1500, 50, '2019-04-23 07:37:06', '2019-04-23 07:37:06'),
(7, '598837', 'Blue Jeans', 'dfdsf r gggw rge r', 1, 1600, 50, '2019-04-28 08:43:23', '2019-04-28 08:43:23'),
(9, '735469', 'Blue Shirt', 'Blue Men\'s Shirt. Pure Cotton.', 1, 1050, 50, '2019-04-28 21:09:58', '2019-04-28 21:09:58'),
(10, '378666', 'Black Pant', 'Black pant for men. Cutton.', 1, 1200, 50, '2019-04-28 21:11:25', '2019-04-28 21:11:25');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(3, 2, 14, NULL, NULL),
(4, 2, 20, NULL, NULL),
(7, 4, 6, NULL, NULL),
(8, 4, 17, NULL, NULL),
(10, 5, 21, '2019-04-22 18:00:10', '2019-04-22 18:00:10'),
(11, 6, 14, NULL, NULL),
(12, 6, 22, NULL, NULL),
(13, 7, 14, NULL, NULL),
(14, 7, 18, NULL, NULL),
(15, 1, 14, NULL, NULL),
(16, 1, 20, NULL, NULL),
(18, 9, 6, NULL, NULL),
(19, 9, 17, NULL, NULL),
(20, 10, 6, NULL, NULL),
(21, 10, 16, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `cover_image` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `cover_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/products/pCBmxj9z0eOQOCSvRWBoB1IesKQOjriN6HhQFqVK.jpeg', 1, '2019-03-30 03:06:24', '2019-03-30 03:06:24'),
(2, 1, 'uploads/products/E8ewKwhjlKvyy4Qi6XROdcGo3HgxQ4sGCqiDAIyT.jpeg', 0, '2019-03-30 03:06:24', '2019-03-30 03:06:24'),
(3, 1, 'uploads/products/Izx4flKABEXMMtaia6GW0YNXjrwjpUwGQlIKbrXE.jpeg', 0, '2019-03-30 03:06:24', '2019-03-30 03:06:24'),
(4, 2, 'uploads/products/x2A3nfmFzZuC8CfZWHm9pWUqfiISPGelRUjWHTsY.jpeg', 1, '2019-04-03 06:42:38', '2019-04-03 06:42:38'),
(5, 2, 'uploads/products/4MSHoslNiHcBAcNQRgJD4kKDlCBaVtIFJk7Ywob6.jpeg', 0, '2019-04-03 06:42:38', '2019-04-03 06:42:38'),
(6, 2, 'uploads/products/51NYsFFziTUrENQRyKujnEeplRMpPs67xhk7dsIQ.jpeg', 0, '2019-04-03 06:42:38', '2019-04-03 06:42:38'),
(10, 4, 'uploads/products/CwT9WB239WRhbzMCPmviLoFfJNXYYTliJaOHBlmk.jpeg', 1, '2019-04-22 23:29:37', '2019-04-22 23:29:37'),
(11, 4, 'uploads/products/TxW6SP3Lp4n1dTJ8XdjolBcqgGyhDADU5ifwFtJt.jpeg', 0, '2019-04-22 23:29:37', '2019-04-22 23:29:37'),
(12, 4, 'uploads/products/gJo10rYsyq0wenM7mAUJMrBqvlVv7cNaJIIiQ0O5.jpeg', 0, '2019-04-22 23:29:37', '2019-04-22 23:29:37'),
(13, 5, 'uploads/products/uSZCTYgM8kNvlKxSGWcNoZXuGXtmkPiD2U12E32w.jpeg', 1, '2019-04-23 00:37:16', '2019-04-23 00:37:16'),
(14, 5, 'uploads/products/1NkpW4BURxRg84D8945nocvaRrlxdcrx4K640UFi.jpeg', 0, '2019-04-23 00:37:16', '2019-04-23 00:37:16'),
(15, 5, 'uploads/products/tB7LNg10PXWwIROgWIe00P3YpdPxhzaAu2nRL2vy.jpeg', 0, '2019-04-23 00:37:16', '2019-04-23 00:37:16'),
(16, 6, 'uploads/products/ZD2qzpJL9deFlVzpXGucsiwu4T69NRyX1B55AVPD.jpeg', 1, '2019-04-23 07:37:07', '2019-04-23 07:37:07'),
(17, 6, 'uploads/products/G1jdauPSXAhB8pKxo9T5nVa6dxAsYnnrv4NnOhFz.jpeg', 0, '2019-04-23 07:37:07', '2019-04-23 07:37:07'),
(18, 6, 'uploads/products/PtxJ0Uo4qFc99W1FgWv53JokO4NzrX0tfEArwfew.jpeg', 0, '2019-04-23 07:37:07', '2019-04-23 07:37:07'),
(19, 7, 'uploads/products/qWEldMArw8Q5WOeeQVmwleIUMBBQhY4NGDat9VR0.jpeg', 1, '2019-04-28 08:43:23', '2019-04-28 08:43:23'),
(20, 7, 'uploads/products/eASfAJUcBcdQVrvrpKRYpCzB2E18mzhvFTGlM8SV.jpeg', 0, '2019-04-28 08:43:23', '2019-04-28 08:43:23'),
(21, 7, 'uploads/products/tOSmsCb6akzV1AzV1IcHa6Hcoyp51J01sethwnh3.jpeg', 0, '2019-04-28 08:43:23', '2019-04-28 08:43:23'),
(25, 9, 'uploads/products/kO9pXlN8FVdr2KZqZ902becQ9jJ7p8FEQLmJAs3G.jpeg', 1, '2019-04-28 21:09:59', '2019-04-28 21:09:59'),
(26, 9, 'uploads/products/OQl1xZF8ST4KxtjTSLqCUeV5wqVKGgaTiLPjmebY.jpeg', 0, '2019-04-28 21:09:59', '2019-04-28 21:09:59'),
(27, 9, 'uploads/products/ZR2mgO0W195vt7eVqWkRotZx70TvUfv5YQ1fcgWI.jpeg', 0, '2019-04-28 21:09:59', '2019-04-28 21:09:59'),
(28, 10, 'uploads/products/bTO0JBbEQcruKEGdB6WauCVlnEBax9RY3VitSNQ6.jpeg', 1, '2019-04-28 21:11:25', '2019-04-28 21:11:25'),
(29, 10, 'uploads/products/EIjNHSqoyjApozEIDnUr9m4274aEDWTDU5NKiZri.jpeg', 0, '2019-04-28 21:11:25', '2019-04-28 21:11:25'),
(30, 10, 'uploads/products/xUKIkKM5FOFWFOYJo0b2K0X2B5hnzMwRdnNbUpTt.jpeg', 0, '2019-04-28 21:11:26', '2019-04-28 21:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_statuses`
--

CREATE TABLE `product_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_statuses`
--

INSERT INTO `product_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'In Stock', '2019-03-28 18:00:00', '2019-03-28 18:00:00'),
(2, 'Out of Stock', '2019-03-28 18:00:00', '2019-03-28 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_tags`
--

CREATE TABLE `product_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_tags`
--

INSERT INTO `product_tags` (`id`, `product_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 6, 4, NULL, NULL),
(2, 6, 6, NULL, NULL),
(3, 7, 1, NULL, NULL),
(4, 7, 4, NULL, NULL),
(5, 1, 2, NULL, NULL),
(6, 1, 4, NULL, NULL),
(8, 9, 2, NULL, NULL),
(9, 9, 3, NULL, NULL),
(10, 10, 1, NULL, NULL),
(11, 10, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2019-03-28 18:00:00', '2019-03-28 18:00:00'),
(2, 'Customer', '2019-03-28 18:00:00', '2019-03-28 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'pant', '2019-04-23 07:33:36', '2019-04-23 07:33:36'),
(2, 'shirt', '2019-04-23 07:33:42', '2019-04-23 07:33:42'),
(3, 'men', '2019-04-23 07:33:48', '2019-04-23 07:33:48'),
(4, 'women', '2019-04-23 07:33:52', '2019-04-23 07:33:52'),
(5, 'children', '2019-04-23 07:33:57', '2019-04-23 07:33:57'),
(6, 't-shirt', '2019-04-23 07:34:13', '2019-04-23 07:34:13'),
(7, 'full sleeve', '2019-04-23 07:34:47', '2019-04-23 07:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `unreg_customers`
--

CREATE TABLE `unreg_customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unreg_customers`
--

INSERT INTO `unreg_customers` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(33, 'sfdf', 'fdf', '2019-04-28 08:35:07', '2019-04-28 08:35:07'),
(34, 'Lamim', 'lamim@gmail.com', '2019-04-28 10:16:47', '2019-04-28 10:16:47'),
(35, 'gg', 'ggg', '2019-04-28 10:20:15', '2019-04-28 10:20:15'),
(36, 'aq', 'qq', '2019-04-28 10:21:37', '2019-04-28 10:21:37'),
(37, 'aq', 'qq', '2019-04-28 10:21:44', '2019-04-28 10:21:44'),
(38, 'sqs', 'sqs', '2019-04-28 10:22:46', '2019-04-28 10:22:46'),
(39, 'scsc', 'scs', '2019-04-28 10:23:56', '2019-04-28 10:23:56'),
(40, 'Samia', 'samia@gmail.com', '2019-04-28 22:49:33', '2019-04-28 22:49:33'),
(41, 'sasas', 'asas@v.com', '2019-04-29 00:03:29', '2019-04-29 00:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `active`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'sajid', 'sajid@gmail.com', NULL, 1, '$2y$10$GF6KxEUvyX.8xPH2fOP6buzAa1y61a.tEI4YOoZilLPTptIGuaK32', NULL, 'J8xUOyFFdt6Pbwim4lubNy5TgdUWLXiGHDZayyCMk2vHBPPHHrJxSyje00AB', '2019-03-29 04:28:44', '2019-03-29 04:28:44'),
(3, 'admin', 'admin@gmail.com', NULL, 1, '$2y$10$aVsi9.7JpQqStpo/usiJh.FOHNW.4zLvy/Jmr4FGWvBRc.rVUJso2', NULL, 'RNWpUmtnq2vukLrabR2kTkT8IMto0MfGtm4AuTdJgguTXfaJxsKsIdBDSOqo', '2019-03-29 04:31:56', '2019-03-29 04:31:56'),
(4, 'ss', 'ss@g.com', NULL, 1, '$2y$10$YzOJjFj5VBc8AgxjtlYlquU9H9dvh/zX.gzmXdW8.kO2mb49eLURy', NULL, 'JpGDFqEuX31WowxO5UfyX1ipCMNNe8zsQ6zA7ZXAeuHEXYrO8mtVTWKG60EA', '2019-04-27 23:23:55', '2019-04-27 23:23:55'),
(5, 'sakib', 'sakib@gmail.com', NULL, 1, '$2y$10$ARMZYi.v62RlBHnlAzUyQuNnPXexEKJEssRHUKpQeDFD.s8iRf/C2', NULL, 'NGKkDoo6F2yLU0tCHchrmHWSDPZ8SmFcL9BmCQf9pgqxzmFOUkXlfHHMs9Oo', '2019-04-28 00:54:30', '2019-04-28 00:54:30'),
(6, 'jamal', 'jamal@gmail.com', NULL, 1, '$2y$10$8HD0PQnOBpdlkuhGH0w1Gu3xXXGAZVK7keh4b7OXewDT30igoFoQu', NULL, '1OpwlP5K32eK6yN5wUiIBqWKcSx5GckmHf3MBF9E17XiTo8rHQFlTpMPZzy1', '2019-04-28 02:55:10', '2019-04-28 02:55:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(2, 2, 2, NULL, NULL),
(3, 3, 1, NULL, NULL),
(4, 4, 2, NULL, NULL),
(5, 5, 2, NULL, NULL),
(6, 6, 2, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_reg_customer_foreign` (`reg_customer`),
  ADD KEY `orders_unreg_customer_foreign` (`unreg_customer`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_order_id_foreign` (`order_id`),
  ADD KEY `order_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_product_status_id_foreign` (`product_status_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_product_id_foreign` (`product_id`),
  ADD KEY `product_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_statuses`
--
ALTER TABLE `product_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_tags_product_id_foreign` (`product_id`),
  ADD KEY `product_tags_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unreg_customers`
--
ALTER TABLE `unreg_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_roles_user_id_foreign` (`user_id`),
  ADD KEY `user_roles_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product_statuses`
--
ALTER TABLE `product_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `unreg_customers`
--
ALTER TABLE `unreg_customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_reg_customer_foreign` FOREIGN KEY (`reg_customer`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_unreg_customer_foreign` FOREIGN KEY (`unreg_customer`) REFERENCES `unreg_customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_product_status_id_foreign` FOREIGN KEY (`product_status_id`) REFERENCES `product_statuses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD CONSTRAINT `product_tags_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
