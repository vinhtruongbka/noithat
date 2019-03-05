DROP TABLE IF EXISTS `category_relation`;
DROP TABLE IF EXISTS `product`;
DROP TABLE IF EXISTS `orders`;
DROP TABLE IF EXISTS `order_detail`;
DROP TABLE IF EXISTS `systems`;
DROP TABLE IF EXISTS `category`;
DROP TABLE IF EXISTS `banners`;

CREATE TABLE IF NOT EXISTS `category` (
  `id` bigint(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(189) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(189) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descriptions` text COLLATE utf8_unicode_ci,
  `parent` int(9) DEFAULT '0',
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'product',
  `ordering` smallint(6) DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `category_relation` (
  `id` bigint(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `cat_id` bigint(20) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'product',
  `object_id` bigint(20) NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descriptions` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordering` smallint(6) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `product` (
  `id` bigint(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `cat_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price_input` float NOT NULL,
  `price_ouput` float NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NULL,
  `phone` varchar(20) NULL,
  `address` varchar(20) NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` int NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `product_image` (
  `id` bigint(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `img_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `systems` (
  `id` bigint(20) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `adress` text COLLATE utf8_unicode_ci  NULL,
  `phone` int COLLATE utf8_unicode_ci  NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci  NULL
  `facebook` varchar(100) COLLATE utf8_unicode_ci  NULL
  `logo` varchar(100) COLLATE utf8_unicode_ci  NULL
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;