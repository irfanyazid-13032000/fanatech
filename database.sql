-- Adminer 4.8.1 MySQL 5.7.39 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `inventories`;
CREATE TABLE `inventories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `inventories` (`id`, `code`, `name`, `price`, `stock`, `remember_token`, `created_at`, `updated_at`) VALUES
(6,	'LNV',	'Lenovo',	'90000',	30,	NULL,	'2023-10-05 09:11:38',	'2023-10-05 09:11:38'),
(7,	'SMSG',	'samsung',	'2000',	20,	NULL,	'2023-10-05 09:34:09',	'2023-10-07 07:42:18');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_reset_tokens_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(5,	'2023_05_06_064557_create_divisis_table',	1),
(6,	'2023_05_06_220122_create_absensis_table',	1),
(7,	'2023_06_12_154921_create_roles_table',	1),
(8,	'2023_06_13_032533_add_divisi_id_to_users',	1),
(9,	'2023_06_23_141851_approval',	1),
(10,	'2023_06_23_142106_approver_approval',	1),
(11,	'2023_06_23_145505_giliran_approve',	1),
(12,	'2023_07_18_142802_historyapproval',	1),
(13,	'2023_07_25_134703_invoice',	1),
(14,	'2023_07_25_135252_confirm_payment',	1),
(15,	'2023_07_27_104306_klasifikasi_kualifikasi',	1),
(16,	'2023_07_27_104635_pelatihan',	1),
(17,	'2023_07_27_104937_pendidikan',	1),
(18,	'2023_07_27_105135_personalia',	1),
(19,	'2023_07_27_105520_persyaratan_pengalaman',	1),
(20,	'2023_07_27_105752_sertifikat',	1),
(21,	'2023_07_27_105909_studi_kasus',	1),
(24,	'2023_07_27_131528_asesor',	2),
(25,	'2023_07_27_131655_tugas_asesor',	2),
(26,	'2023_07_27_160922_undangan',	3),
(27,	'2023_07_27_164155_berita_acara',	4),
(28,	'2023_07_27_171423_peserta_tes_kompetensi',	5),
(29,	'2023_07_28_093757_lampiran',	6),
(30,	'2023_07_28_100449_asesi_lampiran',	7),
(31,	'2023_10_03_144730_inventories',	8),
(33,	'2023_10_05_210634_sales',	9),
(34,	'2023_10_06_210457_sales_details',	10),
(35,	'2023_10_07_145221_purchases',	11),
(36,	'2023_10_07_153534_purchases_detail',	12);

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `purchases`;
CREATE TABLE `purchases` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `purchases` (`id`, `number`, `user_id`, `date`, `remember_token`, `created_at`, `updated_at`) VALUES
(12,	'S-2024/12/3/1',	1,	'2017-06-19',	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `purchases_details`;
CREATE TABLE `purchases_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `purchases_details` (`id`, `purchase_id`, `inventory_id`, `qty`, `price`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	7,	7,	2,	3000,	NULL,	NULL,	NULL),
(2,	8,	7,	2,	40000,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `sales`;
CREATE TABLE `sales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sales` (`id`, `number`, `user_id`, `date`, `remember_token`, `created_at`, `updated_at`) VALUES
(4,	'Sale-2023-10-06-4',	1,	'2023-10-06',	NULL,	'2023-10-06 14:14:42',	'2023-10-06 14:14:42'),
(5,	'Sale-2023-10-06-5',	1,	'2023-10-06',	NULL,	'2023-10-06 14:14:51',	'2023-10-06 14:14:51'),
(6,	'Sale-2023-10-06-6',	1,	'2023-10-06',	NULL,	'2023-10-06 14:19:50',	'2023-10-06 14:19:50'),
(8,	'Sale-2023-10-06-7',	1,	'2023-10-06',	NULL,	'2023-10-06 14:29:24',	'2023-10-06 14:29:24'),
(9,	'Sale-2023-10-06-9',	1,	'2023-10-06',	NULL,	'2023-10-06 14:30:18',	'2023-10-06 14:30:18'),
(10,	'Sale-2023-10-06-10',	1,	'2023-10-06',	NULL,	'2023-10-06 14:31:28',	'2023-10-06 14:31:28'),
(11,	'Sale-2023-10-07-11',	1,	'2023-10-07',	NULL,	'2023-10-07 07:44:11',	'2023-10-07 07:44:11');

DROP TABLE IF EXISTS `sales_details`;
CREATE TABLE `sales_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sales_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sales_details` (`id`, `sales_id`, `inventory_id`, `qty`, `price`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	10,	6,	2,	9000,	NULL,	NULL,	NULL),
(2,	11,	7,	2,	30000,	NULL,	NULL,	NULL),
(3,	11,	6,	2,	40000,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Admin',	'admin@gmail.com',	'$2y$10$AQ9KcTVwbQ1OzNNQnBuOtOo6jgFILApkMK93Aw0olwu6BjdTlE5Yy',	'Admin',	'2dZJpANsNYRbLFB0V9L2NvA7yUt42V9rD9t6M1Rjz9BMcIkuEQ3JkDaIHKd1',	'2023-07-27 04:16:28',	NULL),
(3,	'Toni',	'toni@gmail.com',	'$2y$10$UgE59vfapjVOCOUNz7b94OR38Zhf1rZm4pRIpclJc4iAlfJtuXFYy',	'sales',	'mKcTuIfHhcLYC80AkY2bm7eZAvP6JLAJtypWdz7pqN1TKVhBzy991XXsNl27',	'2023-07-27 04:16:28',	NULL),
(4,	'Yeni',	'yeni@gmail.com',	'$2y$10$nqOz5ZzfvYfE7/cYsmG.POiwCZpkAJrYCbsr0wQlTY2IHxm7Y5O4q',	'purchase',	'tRC9ZRM0QBGWowMnQ4xPGNOXvbbsGoHGoBAUIXd3mVbMzYGCDGPrT2TUX4dy',	'2023-07-27 04:16:28',	NULL),
(5,	'Doni',	'doni@gmail.com',	'$2y$10$/cgRVA1ElEUSbcGbLD4yYeq3qk5JElGwP8TcfUl1nOPtjfsIDWK2G',	'manager',	'sLQQ9nwgLoGhCQOoxx4S8IFEmWfAFh6UDc6a6EQix6bnSyddkug51R2foFvp',	'2023-10-07 14:14:08',	NULL);

-- 2023-10-07 14:33:34
