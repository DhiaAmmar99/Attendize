-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 22 mars 2021 à 10:13
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `preprodica`
--

-- --------------------------------------------------------

--
-- Structure de la table `abstracts`
--

DROP TABLE IF EXISTS `abstracts`;
CREATE TABLE IF NOT EXISTS `abstracts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `speaker_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `abstracts`
--

INSERT INTO `abstracts` (`id`, `title`, `description`, `speaker_id`, `created_at`, `updated_at`) VALUES
(5, 'test 2', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', 5, '2021-02-03 13:51:59', '2021-02-03 16:51:16'),
(6, 'Abstract title', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 7, '2021-02-04 08:23:03', '2021-02-04 08:23:03'),
(7, 'Abstract', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 2, '2021-02-04 08:23:41', '2021-02-04 08:23:41');

-- --------------------------------------------------------

--
-- Structure de la table `abstracts_chair`
--

DROP TABLE IF EXISTS `abstracts_chair`;
CREATE TABLE IF NOT EXISTS `abstracts_chair` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `abstract_id` bigint(20) UNSIGNED NOT NULL,
  `chair_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `abstracts_chair_chair_id_foreign` (`chair_id`),
  KEY `abstracts_chair_abstract_id_foreign` (`abstract_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `abstracts_chair`
--

INSERT INTO `abstracts_chair` (`id`, `abstract_id`, `chair_id`, `created_at`, `updated_at`) VALUES
(11, 6, 2, '2021-02-04 08:23:03', '2021-02-04 08:23:03'),
(10, 6, 1, '2021-02-04 08:23:03', '2021-02-04 08:23:03'),
(9, 5, 2, '2021-02-03 16:51:16', '2021-02-03 16:51:16'),
(12, 7, 2, '2021-02-04 08:23:41', '2021-02-04 08:23:41');

-- --------------------------------------------------------

--
-- Structure de la table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timezone_id` int(10) UNSIGNED DEFAULT NULL,
  `date_format_id` int(10) UNSIGNED DEFAULT NULL,
  `datetime_format_id` int(10) UNSIGNED DEFAULT NULL,
  `currency_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_date` timestamp NULL DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `email_footer` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_banned` tinyint(1) NOT NULL DEFAULT '0',
  `is_beta` tinyint(1) NOT NULL DEFAULT '0',
  `stripe_access_token` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_refresh_token` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_secret_key` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_publishable_key` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_data_raw` text COLLATE utf8mb4_unicode_ci,
  `payment_gateway_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `accounts_timezone_id_foreign` (`timezone_id`),
  KEY `accounts_date_format_id_foreign` (`date_format_id`),
  KEY `accounts_datetime_format_id_foreign` (`datetime_format_id`),
  KEY `accounts_currency_id_foreign` (`currency_id`),
  KEY `accounts_payment_gateway_id_foreign` (`payment_gateway_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `accounts`
--

INSERT INTO `accounts` (`id`, `first_name`, `last_name`, `email`, `timezone_id`, `date_format_id`, `datetime_format_id`, `currency_id`, `created_at`, `updated_at`, `deleted_at`, `name`, `last_ip`, `last_login_date`, `address1`, `address2`, `city`, `state`, `postal_code`, `country_id`, `email_footer`, `is_active`, `is_banned`, `is_beta`, `stripe_access_token`, `stripe_refresh_token`, `stripe_secret_key`, `stripe_publishable_key`, `stripe_data_raw`, `payment_gateway_id`) VALUES
(1, 'admin', 'admin', 'testadmin@mail.com', 30, NULL, NULL, 2, '2020-05-11 08:04:50', '2020-05-11 08:04:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1),
(2, 'admin', 'user', 'useradmin@mail.com', 30, NULL, NULL, 2, '2020-06-10 07:11:16', '2020-06-10 07:11:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `account_payment_gateways`
--

DROP TABLE IF EXISTS `account_payment_gateways`;
CREATE TABLE IF NOT EXISTS `account_payment_gateways` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account_id` int(10) UNSIGNED NOT NULL,
  `payment_gateway_id` int(10) UNSIGNED NOT NULL,
  `config` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `account_payment_gateways_payment_gateway_id_foreign` (`payment_gateway_id`),
  KEY `account_payment_gateways_account_id_foreign` (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `affiliates`
--

DROP TABLE IF EXISTS `affiliates`;
CREATE TABLE IF NOT EXISTS `affiliates` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visits` int(11) NOT NULL,
  `tickets_sold` int(11) NOT NULL,
  `sales_volume` decimal(10,2) NOT NULL DEFAULT '0.00',
  `last_visit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `account_id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `affiliates_event_id_foreign` (`event_id`),
  KEY `affiliates_account_id_index` (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `attendees`
--

DROP TABLE IF EXISTS `attendees`;
CREATE TABLE IF NOT EXISTS `attendees` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `private_reference_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_cancelled` tinyint(1) NOT NULL DEFAULT '0',
  `has_arrived` tinyint(1) NOT NULL DEFAULT '0',
  `arrival_time` datetime DEFAULT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `reference_index` int(11) NOT NULL DEFAULT '0',
  `is_refunded` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `attendees_order_id_index` (`order_id`),
  KEY `attendees_event_id_index` (`event_id`),
  KEY `attendees_ticket_id_index` (`ticket_id`),
  KEY `attendees_private_reference_number_index` (`private_reference_number`),
  KEY `attendees_account_id_index` (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `brochure`
--

DROP TABLE IF EXISTS `brochure`;
CREATE TABLE IF NOT EXISTS `brochure` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `brochure`
--

INSERT INTO `brochure` (`id`, `first_name`, `last_name`, `job_title`, `company`, `email`, `tel`, `created_at`, `updated_at`) VALUES
(1, 'ram', 'tt', 'rr', 'yy', 'ram@tt.frm', '12345678', '2021-02-15 14:39:16', '2021-02-15 14:39:16'),
(2, 'vs', 'v', 'test', 'c', 'sehosi3389@bcpfm.com', '12345678', '2021-02-16 06:56:48', '2021-02-16 06:56:48'),
(3, 'tt', 'tt', 'tt', 'c', 'kodesov96s47@bcpfm.com', '12345678', '2021-02-16 06:58:27', '2021-02-16 06:58:27'),
(4, 'tt', 'tt', 'tt', 'c', 'kodesov96s47@bcpfm.com', '12345678', '2021-02-16 07:00:12', '2021-02-16 07:00:12');

-- --------------------------------------------------------

--
-- Structure de la table `chairs`
--

DROP TABLE IF EXISTS `chairs`;
CREATE TABLE IF NOT EXISTS `chairs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` blob NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `chairs`
--

INSERT INTO `chairs` (`id`, `firstname`, `lastname`, `email`, `country`, `organization`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Ram', 'tt', 'ramtt@gmail.com', 'test', 'ICA', 0x2f6173736574732f696d6743686169722f323032312d30312d32352d31352d32322d34355f31352d313530783135302e6a7067, 'test', '2020-12-25 11:32:41', '2021-01-25 15:22:45'),
(2, 'Djeo', 'Trank', 'Trank@gmail.com', 'test', 'ICA', 0x2f6173736574732f696d6743686169722f323032312d30312d32352d31352d32332d30345f737065616b65722d342d313530783135302e6a7067, 'test', '2020-12-25 11:32:41', '2021-01-25 15:23:04');

-- --------------------------------------------------------

--
-- Structure de la table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL,
  `capital` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `citizenship` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_sub_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso_3166_2` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `iso_3166_3` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `region_code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sub_region_code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `eea` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `countries_id_index` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `countries`
--

INSERT INTO `countries` (`id`, `capital`, `citizenship`, `country_code`, `currency`, `currency_code`, `currency_sub_unit`, `full_name`, `iso_3166_2`, `iso_3166_3`, `name`, `region_code`, `sub_region_code`, `eea`) VALUES
(4, 'Kabul', 'Afghan', '004', 'afghani', 'AFN', 'pul', 'Islamic Republic of Afghanistan', 'AF', 'AFG', 'Afghanistan', '142', '034', 0),
(8, 'Tirana', 'Albanian', '008', 'lek', 'ALL', '(qindar (pl. qindarka))', 'Republic of Albania', 'AL', 'ALB', 'Albania', '150', '039', 0),
(10, 'Antartica', 'of Antartica', '010', '', '', '', 'Antarctica', 'AQ', 'ATA', 'Antarctica', '', '', 0),
(12, 'Algiers', 'Algerian', '012', 'Algerian dinar', 'DZD', 'centime', 'People’s Democratic Republic of Algeria', 'DZ', 'DZA', 'Algeria', '002', '015', 0),
(16, 'Pago Pago', 'American Samoan', '016', 'US dollar', 'USD', 'cent', 'Territory of American', 'AS', 'ASM', 'American Samoa', '009', '061', 0),
(20, 'Andorra la Vella', 'Andorran', '020', 'euro', 'EUR', 'cent', 'Principality of Andorra', 'AD', 'AND', 'Andorra', '150', '039', 0),
(24, 'Luanda', 'Angolan', '024', 'kwanza', 'AOA', 'cêntimo', 'Republic of Angola', 'AO', 'AGO', 'Angola', '002', '017', 0),
(28, 'St John’s', 'of Antigua and Barbuda', '028', 'East Caribbean dollar', 'XCD', 'cent', 'Antigua and Barbuda', 'AG', 'ATG', 'Antigua and Barbuda', '019', '029', 0),
(31, 'Baku', 'Azerbaijani', '031', 'Azerbaijani manat', 'AZN', 'kepik (inv.)', 'Republic of Azerbaijan', 'AZ', 'AZE', 'Azerbaijan', '142', '145', 0),
(32, 'Buenos Aires', 'Argentinian', '032', 'Argentine peso', 'ARS', 'centavo', 'Argentine Republic', 'AR', 'ARG', 'Argentina', '019', '005', 0),
(36, 'Canberra', 'Australian', '036', 'Australian dollar', 'AUD', 'cent', 'Commonwealth of Australia', 'AU', 'AUS', 'Australia', '009', '053', 0),
(40, 'Vienna', 'Austrian', '040', 'euro', 'EUR', 'cent', 'Republic of Austria', 'AT', 'AUT', 'Austria', '150', '155', 1),
(44, 'Nassau', 'Bahamian', '044', 'Bahamian dollar', 'BSD', 'cent', 'Commonwealth of the Bahamas', 'BS', 'BHS', 'Bahamas', '019', '029', 0),
(48, 'Manama', 'Bahraini', '048', 'Bahraini dinar', 'BHD', 'fils (inv.)', 'Kingdom of Bahrain', 'BH', 'BHR', 'Bahrain', '142', '145', 0),
(50, 'Dhaka', 'Bangladeshi', '050', 'taka (inv.)', 'BDT', 'poisha (inv.)', 'People’s Republic of Bangladesh', 'BD', 'BGD', 'Bangladesh', '142', '034', 0),
(51, 'Yerevan', 'Armenian', '051', 'dram (inv.)', 'AMD', 'luma', 'Republic of Armenia', 'AM', 'ARM', 'Armenia', '142', '145', 0),
(52, 'Bridgetown', 'Barbadian', '052', 'Barbados dollar', 'BBD', 'cent', 'Barbados', 'BB', 'BRB', 'Barbados', '019', '029', 0),
(56, 'Brussels', 'Belgian', '056', 'euro', 'EUR', 'cent', 'Kingdom of Belgium', 'BE', 'BEL', 'Belgium', '150', '155', 1),
(60, 'Hamilton', 'Bermudian', '060', 'Bermuda dollar', 'BMD', 'cent', 'Bermuda', 'BM', 'BMU', 'Bermuda', '019', '021', 0),
(64, 'Thimphu', 'Bhutanese', '064', 'ngultrum (inv.)', 'BTN', 'chhetrum (inv.)', 'Kingdom of Bhutan', 'BT', 'BTN', 'Bhutan', '142', '034', 0),
(68, 'Sucre (BO1)', 'Bolivian', '068', 'boliviano', 'BOB', 'centavo', 'Plurinational State of Bolivia', 'BO', 'BOL', 'Bolivia, Plurinational State of', '019', '005', 0),
(70, 'Sarajevo', 'of Bosnia and Herzegovina', '070', 'convertible mark', 'BAM', 'fening', 'Bosnia and Herzegovina', 'BA', 'BIH', 'Bosnia and Herzegovina', '150', '039', 0),
(72, 'Gaborone', 'Botswanan', '072', 'pula (inv.)', 'BWP', 'thebe (inv.)', 'Republic of Botswana', 'BW', 'BWA', 'Botswana', '002', '018', 0),
(74, 'Bouvet island', 'of Bouvet island', '074', '', '', '', 'Bouvet Island', 'BV', 'BVT', 'Bouvet Island', '', '', 0),
(76, 'Brasilia', 'Brazilian', '076', 'real (pl. reais)', 'BRL', 'centavo', 'Federative Republic of Brazil', 'BR', 'BRA', 'Brazil', '019', '005', 0),
(84, 'Belmopan', 'Belizean', '084', 'Belize dollar', 'BZD', 'cent', 'Belize', 'BZ', 'BLZ', 'Belize', '019', '013', 0),
(86, 'Diego Garcia', 'Changosian', '086', 'US dollar', 'USD', 'cent', 'British Indian Ocean Territory', 'IO', 'IOT', 'British Indian Ocean Territory', '', '', 0),
(90, 'Honiara', 'Solomon Islander', '090', 'Solomon Islands dollar', 'SBD', 'cent', 'Solomon Islands', 'SB', 'SLB', 'Solomon Islands', '009', '054', 0),
(92, 'Road Town', 'British Virgin Islander;', '092', 'US dollar', 'USD', 'cent', 'British Virgin Islands', 'VG', 'VGB', 'Virgin Islands, British', '019', '029', 0),
(96, 'Bandar Seri Begawan', 'Bruneian', '096', 'Brunei dollar', 'BND', 'sen (inv.)', 'Brunei Darussalam', 'BN', 'BRN', 'Brunei Darussalam', '142', '035', 0),
(100, 'Sofia', 'Bulgarian', '100', 'lev (pl. leva)', 'BGN', 'stotinka', 'Republic of Bulgaria', 'BG', 'BGR', 'Bulgaria', '150', '151', 1),
(104, 'Yangon', 'Burmese', '104', 'kyat', 'MMK', 'pya', 'Union of Myanmar/', 'MM', 'MMR', 'Myanmar', '142', '035', 0),
(108, 'Bujumbura', 'Burundian', '108', 'Burundi franc', 'BIF', 'centime', 'Republic of Burundi', 'BI', 'BDI', 'Burundi', '002', '014', 0),
(112, 'Minsk', 'Belarusian', '112', 'Belarusian rouble', 'BYR', 'kopek', 'Republic of Belarus', 'BY', 'BLR', 'Belarus', '150', '151', 0),
(116, 'Phnom Penh', 'Cambodian', '116', 'riel', 'KHR', 'sen (inv.)', 'Kingdom of Cambodia', 'KH', 'KHM', 'Cambodia', '142', '035', 0),
(120, 'Yaoundé', 'Cameroonian', '120', 'CFA franc (BEAC)', 'XAF', 'centime', 'Republic of Cameroon', 'CM', 'CMR', 'Cameroon', '002', '017', 0),
(124, 'Ottawa', 'Canadian', '124', 'Canadian dollar', 'CAD', 'cent', 'Canada', 'CA', 'CAN', 'Canada', '019', '021', 0),
(132, 'Praia', 'Cape Verdean', '132', 'Cape Verde escudo', 'CVE', 'centavo', 'Republic of Cape Verde', 'CV', 'CPV', 'Cape Verde', '002', '011', 0),
(136, 'George Town', 'Caymanian', '136', 'Cayman Islands dollar', 'KYD', 'cent', 'Cayman Islands', 'KY', 'CYM', 'Cayman Islands', '019', '029', 0),
(140, 'Bangui', 'Central African', '140', 'CFA franc (BEAC)', 'XAF', 'centime', 'Central African Republic', 'CF', 'CAF', 'Central African Republic', '002', '017', 0),
(144, 'Colombo', 'Sri Lankan', '144', 'Sri Lankan rupee', 'LKR', 'cent', 'Democratic Socialist Republic of Sri Lanka', 'LK', 'LKA', 'Sri Lanka', '142', '034', 0),
(148, 'N’Djamena', 'Chadian', '148', 'CFA franc (BEAC)', 'XAF', 'centime', 'Republic of Chad', 'TD', 'TCD', 'Chad', '002', '017', 0),
(152, 'Santiago', 'Chilean', '152', 'Chilean peso', 'CLP', 'centavo', 'Republic of Chile', 'CL', 'CHL', 'Chile', '019', '005', 0),
(156, 'Beijing', 'Chinese', '156', 'renminbi-yuan (inv.)', 'CNY', 'jiao (10)', 'People’s Republic of China', 'CN', 'CHN', 'China', '142', '030', 0),
(158, 'Taipei', 'Taiwanese', '158', 'new Taiwan dollar', 'TWD', 'fen (inv.)', 'Republic of China, Taiwan (TW1)', 'TW', 'TWN', 'Taiwan, Province of China', '142', '030', 0),
(162, 'Flying Fish Cove', 'Christmas Islander', '162', 'Australian dollar', 'AUD', 'cent', 'Christmas Island Territory', 'CX', 'CXR', 'Christmas Island', '', '', 0),
(166, 'Bantam', 'Cocos Islander', '166', 'Australian dollar', 'AUD', 'cent', 'Territory of Cocos (Keeling) Islands', 'CC', 'CCK', 'Cocos (Keeling) Islands', '', '', 0),
(170, 'Santa Fe de Bogotá', 'Colombian', '170', 'Colombian peso', 'COP', 'centavo', 'Republic of Colombia', 'CO', 'COL', 'Colombia', '019', '005', 0),
(174, 'Moroni', 'Comorian', '174', 'Comorian franc', 'KMF', '', 'Union of the Comoros', 'KM', 'COM', 'Comoros', '002', '014', 0),
(175, 'Mamoudzou', 'Mahorais', '175', 'euro', 'EUR', 'cent', 'Departmental Collectivity of Mayotte', 'YT', 'MYT', 'Mayotte', '002', '014', 0),
(178, 'Brazzaville', 'Congolese', '178', 'CFA franc (BEAC)', 'XAF', 'centime', 'Republic of the Congo', 'CG', 'COG', 'Congo', '002', '017', 0),
(180, 'Kinshasa', 'Congolese', '180', 'Congolese franc', 'CDF', 'centime', 'Democratic Republic of the Congo', 'CD', 'COD', 'Congo, the Democratic Republic of the', '002', '017', 0),
(184, 'Avarua', 'Cook Islander', '184', 'New Zealand dollar', 'NZD', 'cent', 'Cook Islands', 'CK', 'COK', 'Cook Islands', '009', '061', 0),
(188, 'San José', 'Costa Rican', '188', 'Costa Rican colón (pl. colones)', 'CRC', 'céntimo', 'Republic of Costa Rica', 'CR', 'CRI', 'Costa Rica', '019', '013', 0),
(191, 'Zagreb', 'Croatian', '191', 'kuna (inv.)', 'HRK', 'lipa (inv.)', 'Republic of Croatia', 'HR', 'HRV', 'Croatia', '150', '039', 1),
(192, 'Havana', 'Cuban', '192', 'Cuban peso', 'CUP', 'centavo', 'Republic of Cuba', 'CU', 'CUB', 'Cuba', '019', '029', 0),
(196, 'Nicosia', 'Cypriot', '196', 'euro', 'EUR', 'cent', 'Republic of Cyprus', 'CY', 'CYP', 'Cyprus', '142', '145', 1),
(203, 'Prague', 'Czech', '203', 'Czech koruna (pl. koruny)', 'CZK', 'halér', 'Czech Republic', 'CZ', 'CZE', 'Czech Republic', '150', '151', 1),
(204, 'Porto Novo (BJ1)', 'Beninese', '204', 'CFA franc (BCEAO)', 'XOF', 'centime', 'Republic of Benin', 'BJ', 'BEN', 'Benin', '002', '011', 0),
(208, 'Copenhagen', 'Danish', '208', 'Danish krone', 'DKK', 'øre (inv.)', 'Kingdom of Denmark', 'DK', 'DNK', 'Denmark', '150', '154', 1),
(212, 'Roseau', 'Dominican', '212', 'East Caribbean dollar', 'XCD', 'cent', 'Commonwealth of Dominica', 'DM', 'DMA', 'Dominica', '019', '029', 0),
(214, 'Santo Domingo', 'Dominican', '214', 'Dominican peso', 'DOP', 'centavo', 'Dominican Republic', 'DO', 'DOM', 'Dominican Republic', '019', '029', 0),
(218, 'Quito', 'Ecuadorian', '218', 'US dollar', 'USD', 'cent', 'Republic of Ecuador', 'EC', 'ECU', 'Ecuador', '019', '005', 0),
(222, 'San Salvador', 'Salvadoran', '222', 'Salvadorian colón (pl. colones)', 'SVC', 'centavo', 'Republic of El Salvador', 'SV', 'SLV', 'El Salvador', '019', '013', 0),
(226, 'Malabo', 'Equatorial Guinean', '226', 'CFA franc (BEAC)', 'XAF', 'centime', 'Republic of Equatorial Guinea', 'GQ', 'GNQ', 'Equatorial Guinea', '002', '017', 0),
(231, 'Addis Ababa', 'Ethiopian', '231', 'birr (inv.)', 'ETB', 'cent', 'Federal Democratic Republic of Ethiopia', 'ET', 'ETH', 'Ethiopia', '002', '014', 0),
(232, 'Asmara', 'Eritrean', '232', 'nakfa', 'ERN', 'cent', 'State of Eritrea', 'ER', 'ERI', 'Eritrea', '002', '014', 0),
(233, 'Tallinn', 'Estonian', '233', 'euro', 'EUR', 'cent', 'Republic of Estonia', 'EE', 'EST', 'Estonia', '150', '154', 1),
(234, 'Tórshavn', 'Faeroese', '234', 'Danish krone', 'DKK', 'øre (inv.)', 'Faeroe Islands', 'FO', 'FRO', 'Faroe Islands', '150', '154', 0),
(238, 'Stanley', 'Falkland Islander', '238', 'Falkland Islands pound', 'FKP', 'new penny', 'Falkland Islands', 'FK', 'FLK', 'Falkland Islands (Malvinas)', '019', '005', 0),
(239, 'King Edward Point (Grytviken)', 'of South Georgia and the South Sandwich Islands', '239', '', '', '', 'South Georgia and the South Sandwich Islands', 'GS', 'SGS', 'South Georgia and the South Sandwich Islands', '', '', 0),
(242, 'Suva', 'Fijian', '242', 'Fiji dollar', 'FJD', 'cent', 'Republic of Fiji', 'FJ', 'FJI', 'Fiji', '009', '054', 0),
(246, 'Helsinki', 'Finnish', '246', 'euro', 'EUR', 'cent', 'Republic of Finland', 'FI', 'FIN', 'Finland', '150', '154', 1),
(248, 'Mariehamn', 'Åland Islander', '248', 'euro', 'EUR', 'cent', 'Åland Islands', 'AX', 'ALA', 'Åland Islands', '150', '154', 0),
(250, 'Paris', 'French', '250', 'euro', 'EUR', 'cent', 'French Republic', 'FR', 'FRA', 'France', '150', '155', 1),
(254, 'Cayenne', 'Guianese', '254', 'euro', 'EUR', 'cent', 'French Guiana', 'GF', 'GUF', 'French Guiana', '019', '005', 0),
(258, 'Papeete', 'Polynesian', '258', 'CFP franc', 'XPF', 'centime', 'French Polynesia', 'PF', 'PYF', 'French Polynesia', '009', '061', 0),
(260, 'Port-aux-Francais', 'of French Southern and Antarctic Lands', '260', 'euro', 'EUR', 'cent', 'French Southern and Antarctic Lands', 'TF', 'ATF', 'French Southern Territories', '', '', 0),
(262, 'Djibouti', 'Djiboutian', '262', 'Djibouti franc', 'DJF', '', 'Republic of Djibouti', 'DJ', 'DJI', 'Djibouti', '002', '014', 0),
(266, 'Libreville', 'Gabonese', '266', 'CFA franc (BEAC)', 'XAF', 'centime', 'Gabonese Republic', 'GA', 'GAB', 'Gabon', '002', '017', 0),
(268, 'Tbilisi', 'Georgian', '268', 'lari', 'GEL', 'tetri (inv.)', 'Georgia', 'GE', 'GEO', 'Georgia', '142', '145', 0),
(270, 'Banjul', 'Gambian', '270', 'dalasi (inv.)', 'GMD', 'butut', 'Republic of the Gambia', 'GM', 'GMB', 'Gambia', '002', '011', 0),
(275, NULL, 'Palestinian', '275', NULL, NULL, NULL, NULL, 'PS', 'PSE', 'Palestinian Territory, Occupied', '142', '145', 0),
(276, 'Berlin', 'German', '276', 'euro', 'EUR', 'cent', 'Federal Republic of Germany', 'DE', 'DEU', 'Germany', '150', '155', 1),
(288, 'Accra', 'Ghanaian', '288', 'Ghana cedi', 'GHS', 'pesewa', 'Republic of Ghana', 'GH', 'GHA', 'Ghana', '002', '011', 0),
(292, 'Gibraltar', 'Gibraltarian', '292', 'Gibraltar pound', 'GIP', 'penny', 'Gibraltar', 'GI', 'GIB', 'Gibraltar', '150', '039', 0),
(296, 'Tarawa', 'Kiribatian', '296', 'Australian dollar', 'AUD', 'cent', 'Republic of Kiribati', 'KI', 'KIR', 'Kiribati', '009', '057', 0),
(300, 'Athens', 'Greek', '300', 'euro', 'EUR', 'cent', 'Hellenic Republic', 'GR', 'GRC', 'Greece', '150', '039', 1),
(304, 'Nuuk', 'Greenlander', '304', 'Danish krone', 'DKK', 'øre (inv.)', 'Greenland', 'GL', 'GRL', 'Greenland', '019', '021', 0),
(308, 'St George’s', 'Grenadian', '308', 'East Caribbean dollar', 'XCD', 'cent', 'Grenada', 'GD', 'GRD', 'Grenada', '019', '029', 0),
(312, 'Basse Terre', 'Guadeloupean', '312', 'euro', 'EUR ', 'cent', 'Guadeloupe', 'GP', 'GLP', 'Guadeloupe', '019', '029', 0),
(316, 'Agaña (Hagåtña)', 'Guamanian', '316', 'US dollar', 'USD', 'cent', 'Territory of Guam', 'GU', 'GUM', 'Guam', '009', '057', 0),
(320, 'Guatemala City', 'Guatemalan', '320', 'quetzal (pl. quetzales)', 'GTQ', 'centavo', 'Republic of Guatemala', 'GT', 'GTM', 'Guatemala', '019', '013', 0),
(324, 'Conakry', 'Guinean', '324', 'Guinean franc', 'GNF', '', 'Republic of Guinea', 'GN', 'GIN', 'Guinea', '002', '011', 0),
(328, 'Georgetown', 'Guyanese', '328', 'Guyana dollar', 'GYD', 'cent', 'Cooperative Republic of Guyana', 'GY', 'GUY', 'Guyana', '019', '005', 0),
(332, 'Port-au-Prince', 'Haitian', '332', 'gourde', 'HTG', 'centime', 'Republic of Haiti', 'HT', 'HTI', 'Haiti', '019', '029', 0),
(334, 'Territory of Heard Island and McDonald Islands', 'of Territory of Heard Island and McDonald Islands', '334', '', '', '', 'Territory of Heard Island and McDonald Islands', 'HM', 'HMD', 'Heard Island and McDonald Islands', '', '', 0),
(336, 'Vatican City', 'of the Holy See/of the Vatican', '336', 'euro', 'EUR', 'cent', 'the Holy See/ Vatican City State', 'VA', 'VAT', 'Holy See (Vatican City State)', '150', '039', 0),
(340, 'Tegucigalpa', 'Honduran', '340', 'lempira', 'HNL', 'centavo', 'Republic of Honduras', 'HN', 'HND', 'Honduras', '019', '013', 0),
(344, '(HK3)', 'Hong Kong Chinese', '344', 'Hong Kong dollar', 'HKD', 'cent', 'Hong Kong Special Administrative Region of the People’s Republic of China (HK2)', 'HK', 'HKG', 'Hong Kong', '142', '030', 0),
(348, 'Budapest', 'Hungarian', '348', 'forint (inv.)', 'HUF', '(fillér (inv.))', 'Republic of Hungary', 'HU', 'HUN', 'Hungary', '150', '151', 1),
(352, 'Reykjavik', 'Icelander', '352', 'króna (pl. krónur)', 'ISK', '', 'Republic of Iceland', 'IS', 'ISL', 'Iceland', '150', '154', 1),
(356, 'New Delhi', 'Indian', '356', 'Indian rupee', 'INR', 'paisa', 'Republic of India', 'IN', 'IND', 'India', '142', '034', 0),
(360, 'Jakarta', 'Indonesian', '360', 'Indonesian rupiah (inv.)', 'IDR', 'sen (inv.)', 'Republic of Indonesia', 'ID', 'IDN', 'Indonesia', '142', '035', 0),
(364, 'Tehran', 'Iranian', '364', 'Iranian rial', 'IRR', '(dinar) (IR1)', 'Islamic Republic of Iran', 'IR', 'IRN', 'Iran, Islamic Republic of', '142', '034', 0),
(368, 'Baghdad', 'Iraqi', '368', 'Iraqi dinar', 'IQD', 'fils (inv.)', 'Republic of Iraq', 'IQ', 'IRQ', 'Iraq', '142', '145', 0),
(372, 'Dublin', 'Irish', '372', 'euro', 'EUR', 'cent', 'Ireland (IE1)', 'IE', 'IRL', 'Ireland', '150', '154', 1),
(376, '(IL1)', 'Israeli', '376', 'shekel', 'ILS', 'agora', 'State of Israel', 'IL', 'ISR', 'Israel', '142', '145', 0),
(380, 'Rome', 'Italian', '380', 'euro', 'EUR', 'cent', 'Italian Republic', 'IT', 'ITA', 'Italy', '150', '039', 1),
(384, 'Yamoussoukro (CI1)', 'Ivorian', '384', 'CFA franc (BCEAO)', 'XOF', 'centime', 'Republic of Côte d’Ivoire', 'CI', 'CIV', 'Côte d\'Ivoire', '002', '011', 0),
(388, 'Kingston', 'Jamaican', '388', 'Jamaica dollar', 'JMD', 'cent', 'Jamaica', 'JM', 'JAM', 'Jamaica', '019', '029', 0),
(392, 'Tokyo', 'Japanese', '392', 'yen (inv.)', 'JPY', '(sen (inv.)) (JP1)', 'Japan', 'JP', 'JPN', 'Japan', '142', '030', 0),
(398, 'Astana', 'Kazakh', '398', 'tenge (inv.)', 'KZT', 'tiyn', 'Republic of Kazakhstan', 'KZ', 'KAZ', 'Kazakhstan', '142', '143', 0),
(400, 'Amman', 'Jordanian', '400', 'Jordanian dinar', 'JOD', '100 qirsh', 'Hashemite Kingdom of Jordan', 'JO', 'JOR', 'Jordan', '142', '145', 0),
(404, 'Nairobi', 'Kenyan', '404', 'Kenyan shilling', 'KES', 'cent', 'Republic of Kenya', 'KE', 'KEN', 'Kenya', '002', '014', 0),
(408, 'Pyongyang', 'North Korean', '408', 'North Korean won (inv.)', 'KPW', 'chun (inv.)', 'Democratic People’s Republic of Korea', 'KP', 'PRK', 'Korea, Democratic People\'s Republic of', '142', '030', 0),
(410, 'Seoul', 'South Korean', '410', 'South Korean won (inv.)', 'KRW', '(chun (inv.))', 'Republic of Korea', 'KR', 'KOR', 'Korea, Republic of', '142', '030', 0),
(414, 'Kuwait City', 'Kuwaiti', '414', 'Kuwaiti dinar', 'KWD', 'fils (inv.)', 'State of Kuwait', 'KW', 'KWT', 'Kuwait', '142', '145', 0),
(417, 'Bishkek', 'Kyrgyz', '417', 'som', 'KGS', 'tyiyn', 'Kyrgyz Republic', 'KG', 'KGZ', 'Kyrgyzstan', '142', '143', 0),
(418, 'Vientiane', 'Lao', '418', 'kip (inv.)', 'LAK', '(at (inv.))', 'Lao People’s Democratic Republic', 'LA', 'LAO', 'Lao People\'s Democratic Republic', '142', '035', 0),
(422, 'Beirut', 'Lebanese', '422', 'Lebanese pound', 'LBP', '(piastre)', 'Lebanese Republic', 'LB', 'LBN', 'Lebanon', '142', '145', 0),
(426, 'Maseru', 'Basotho', '426', 'loti (pl. maloti)', 'LSL', 'sente', 'Kingdom of Lesotho', 'LS', 'LSO', 'Lesotho', '002', '018', 0),
(428, 'Riga', 'Latvian', '428', 'euro', 'EUR', 'cent', 'Republic of Latvia', 'LV', 'LVA', 'Latvia', '150', '154', 1),
(430, 'Monrovia', 'Liberian', '430', 'Liberian dollar', 'LRD', 'cent', 'Republic of Liberia', 'LR', 'LBR', 'Liberia', '002', '011', 0),
(434, 'Tripoli', 'Libyan', '434', 'Libyan dinar', 'LYD', 'dirham', 'Socialist People’s Libyan Arab Jamahiriya', 'LY', 'LBY', 'Libya', '002', '015', 0),
(438, 'Vaduz', 'Liechtensteiner', '438', 'Swiss franc', 'CHF', 'centime', 'Principality of Liechtenstein', 'LI', 'LIE', 'Liechtenstein', '150', '155', 1),
(440, 'Vilnius', 'Lithuanian', '440', 'euro', 'EUR', 'cent', 'Republic of Lithuania', 'LT', 'LTU', 'Lithuania', '150', '154', 1),
(442, 'Luxembourg', 'Luxembourger', '442', 'euro', 'EUR', 'cent', 'Grand Duchy of Luxembourg', 'LU', 'LUX', 'Luxembourg', '150', '155', 1),
(446, 'Macao (MO3)', 'Macanese', '446', 'pataca', 'MOP', 'avo', 'Macao Special Administrative Region of the People’s Republic of China (MO2)', 'MO', 'MAC', 'Macao', '142', '030', 0),
(450, 'Antananarivo', 'Malagasy', '450', 'ariary', 'MGA', 'iraimbilanja (inv.)', 'Republic of Madagascar', 'MG', 'MDG', 'Madagascar', '002', '014', 0),
(454, 'Lilongwe', 'Malawian', '454', 'Malawian kwacha (inv.)', 'MWK', 'tambala (inv.)', 'Republic of Malawi', 'MW', 'MWI', 'Malawi', '002', '014', 0),
(458, 'Kuala Lumpur (MY1)', 'Malaysian', '458', 'ringgit (inv.)', 'MYR', 'sen (inv.)', 'Malaysia', 'MY', 'MYS', 'Malaysia', '142', '035', 0),
(462, 'Malé', 'Maldivian', '462', 'rufiyaa', 'MVR', 'laari (inv.)', 'Republic of Maldives', 'MV', 'MDV', 'Maldives', '142', '034', 0),
(466, 'Bamako', 'Malian', '466', 'CFA franc (BCEAO)', 'XOF', 'centime', 'Republic of Mali', 'ML', 'MLI', 'Mali', '002', '011', 0),
(470, 'Valletta', 'Maltese', '470', 'euro', 'EUR', 'cent', 'Republic of Malta', 'MT', 'MLT', 'Malta', '150', '039', 1),
(474, 'Fort-de-France', 'Martinican', '474', 'euro', 'EUR', 'cent', 'Martinique', 'MQ', 'MTQ', 'Martinique', '019', '029', 0),
(478, 'Nouakchott', 'Mauritanian', '478', 'ouguiya', 'MRO', 'khoum', 'Islamic Republic of Mauritania', 'MR', 'MRT', 'Mauritania', '002', '011', 0),
(480, 'Port Louis', 'Mauritian', '480', 'Mauritian rupee', 'MUR', 'cent', 'Republic of Mauritius', 'MU', 'MUS', 'Mauritius', '002', '014', 0),
(484, 'Mexico City', 'Mexican', '484', 'Mexican peso', 'MXN', 'centavo', 'United Mexican States', 'MX', 'MEX', 'Mexico', '019', '013', 0),
(492, 'Monaco', 'Monegasque', '492', 'euro', 'EUR', 'cent', 'Principality of Monaco', 'MC', 'MCO', 'Monaco', '150', '155', 0),
(496, 'Ulan Bator', 'Mongolian', '496', 'tugrik', 'MNT', 'möngö (inv.)', 'Mongolia', 'MN', 'MNG', 'Mongolia', '142', '030', 0),
(498, 'Chisinau', 'Moldovan', '498', 'Moldovan leu (pl. lei)', 'MDL', 'ban', 'Republic of Moldova', 'MD', 'MDA', 'Moldova, Republic of', '150', '151', 0),
(499, 'Podgorica', 'Montenegrin', '499', 'euro', 'EUR', 'cent', 'Montenegro', 'ME', 'MNE', 'Montenegro', '150', '039', 0),
(500, 'Plymouth (MS2)', 'Montserratian', '500', 'East Caribbean dollar', 'XCD', 'cent', 'Montserrat', 'MS', 'MSR', 'Montserrat', '019', '029', 0),
(504, 'Rabat', 'Moroccan', '504', 'Moroccan dirham', 'MAD', 'centime', 'Kingdom of Morocco', 'MA', 'MAR', 'Morocco', '002', '015', 0),
(508, 'Maputo', 'Mozambican', '508', 'metical', 'MZN', 'centavo', 'Republic of Mozambique', 'MZ', 'MOZ', 'Mozambique', '002', '014', 0),
(512, 'Muscat', 'Omani', '512', 'Omani rial', 'OMR', 'baiza', 'Sultanate of Oman', 'OM', 'OMN', 'Oman', '142', '145', 0),
(516, 'Windhoek', 'Namibian', '516', 'Namibian dollar', 'NAD', 'cent', 'Republic of Namibia', 'NA', 'NAM', 'Namibia', '002', '018', 0),
(520, 'Yaren', 'Nauruan', '520', 'Australian dollar', 'AUD', 'cent', 'Republic of Nauru', 'NR', 'NRU', 'Nauru', '009', '057', 0),
(524, 'Kathmandu', 'Nepalese', '524', 'Nepalese rupee', 'NPR', 'paisa (inv.)', 'Nepal', 'NP', 'NPL', 'Nepal', '142', '034', 0),
(528, 'Amsterdam (NL2)', 'Dutch', '528', 'euro', 'EUR', 'cent', 'Kingdom of the Netherlands', 'NL', 'NLD', 'Netherlands', '150', '155', 1),
(531, 'Willemstad', 'Curaçaoan', '531', 'Netherlands Antillean guilder (CW1)', 'ANG', 'cent', 'Curaçao', 'CW', 'CUW', 'Curaçao', '019', '029', 0),
(533, 'Oranjestad', 'Aruban', '533', 'Aruban guilder', 'AWG', 'cent', 'Aruba', 'AW', 'ABW', 'Aruba', '019', '029', 0),
(534, 'Philipsburg', 'Sint Maartener', '534', 'Netherlands Antillean guilder (SX1)', 'ANG', 'cent', 'Sint Maarten', 'SX', 'SXM', 'Sint Maarten (Dutch part)', '019', '029', 0),
(535, NULL, 'of Bonaire, Sint Eustatius and Saba', '535', 'US dollar', 'USD', 'cent', NULL, 'BQ', 'BES', 'Bonaire, Sint Eustatius and Saba', '019', '029', 0),
(540, 'Nouméa', 'New Caledonian', '540', 'CFP franc', 'XPF', 'centime', 'New Caledonia', 'NC', 'NCL', 'New Caledonia', '009', '054', 0),
(548, 'Port Vila', 'Vanuatuan', '548', 'vatu (inv.)', 'VUV', '', 'Republic of Vanuatu', 'VU', 'VUT', 'Vanuatu', '009', '054', 0),
(554, 'Wellington', 'New Zealander', '554', 'New Zealand dollar', 'NZD', 'cent', 'New Zealand', 'NZ', 'NZL', 'New Zealand', '009', '053', 0),
(558, 'Managua', 'Nicaraguan', '558', 'córdoba oro', 'NIO', 'centavo', 'Republic of Nicaragua', 'NI', 'NIC', 'Nicaragua', '019', '013', 0),
(562, 'Niamey', 'Nigerien', '562', 'CFA franc (BCEAO)', 'XOF', 'centime', 'Republic of Niger', 'NE', 'NER', 'Niger', '002', '011', 0),
(566, 'Abuja', 'Nigerian', '566', 'naira (inv.)', 'NGN', 'kobo (inv.)', 'Federal Republic of Nigeria', 'NG', 'NGA', 'Nigeria', '002', '011', 0),
(570, 'Alofi', 'Niuean', '570', 'New Zealand dollar', 'NZD', 'cent', 'Niue', 'NU', 'NIU', 'Niue', '009', '061', 0),
(574, 'Kingston', 'Norfolk Islander', '574', 'Australian dollar', 'AUD', 'cent', 'Territory of Norfolk Island', 'NF', 'NFK', 'Norfolk Island', '009', '053', 0),
(578, 'Oslo', 'Norwegian', '578', 'Norwegian krone (pl. kroner)', 'NOK', 'øre (inv.)', 'Kingdom of Norway', 'NO', 'NOR', 'Norway', '150', '154', 1),
(580, 'Saipan', 'Northern Mariana Islander', '580', 'US dollar', 'USD', 'cent', 'Commonwealth of the Northern Mariana Islands', 'MP', 'MNP', 'Northern Mariana Islands', '009', '057', 0),
(581, 'United States Minor Outlying Islands', 'of United States Minor Outlying Islands', '581', 'US dollar', 'USD', 'cent', 'United States Minor Outlying Islands', 'UM', 'UMI', 'United States Minor Outlying Islands', '', '', 0),
(583, 'Palikir', 'Micronesian', '583', 'US dollar', 'USD', 'cent', 'Federated States of Micronesia', 'FM', 'FSM', 'Micronesia, Federated States of', '009', '057', 0),
(584, 'Majuro', 'Marshallese', '584', 'US dollar', 'USD', 'cent', 'Republic of the Marshall Islands', 'MH', 'MHL', 'Marshall Islands', '009', '057', 0),
(585, 'Melekeok', 'Palauan', '585', 'US dollar', 'USD', 'cent', 'Republic of Palau', 'PW', 'PLW', 'Palau', '009', '057', 0),
(586, 'Islamabad', 'Pakistani', '586', 'Pakistani rupee', 'PKR', 'paisa', 'Islamic Republic of Pakistan', 'PK', 'PAK', 'Pakistan', '142', '034', 0),
(591, 'Panama City', 'Panamanian', '591', 'balboa', 'PAB', 'centésimo', 'Republic of Panama', 'PA', 'PAN', 'Panama', '019', '013', 0),
(598, 'Port Moresby', 'Papua New Guinean', '598', 'kina (inv.)', 'PGK', 'toea (inv.)', 'Independent State of Papua New Guinea', 'PG', 'PNG', 'Papua New Guinea', '009', '054', 0),
(600, 'Asunción', 'Paraguayan', '600', 'guaraní', 'PYG', 'céntimo', 'Republic of Paraguay', 'PY', 'PRY', 'Paraguay', '019', '005', 0),
(604, 'Lima', 'Peruvian', '604', 'new sol', 'PEN', 'céntimo', 'Republic of Peru', 'PE', 'PER', 'Peru', '019', '005', 0),
(608, 'Manila', 'Filipino', '608', 'Philippine peso', 'PHP', 'centavo', 'Republic of the Philippines', 'PH', 'PHL', 'Philippines', '142', '035', 0),
(612, 'Adamstown', 'Pitcairner', '612', 'New Zealand dollar', 'NZD', 'cent', 'Pitcairn Islands', 'PN', 'PCN', 'Pitcairn', '009', '061', 0),
(616, 'Warsaw', 'Polish', '616', 'zloty', 'PLN', 'grosz (pl. groszy)', 'Republic of Poland', 'PL', 'POL', 'Poland', '150', '151', 1),
(620, 'Lisbon', 'Portuguese', '620', 'euro', 'EUR', 'cent', 'Portuguese Republic', 'PT', 'PRT', 'Portugal', '150', '039', 1),
(624, 'Bissau', 'Guinea-Bissau national', '624', 'CFA franc (BCEAO)', 'XOF', 'centime', 'Republic of Guinea-Bissau', 'GW', 'GNB', 'Guinea-Bissau', '002', '011', 0),
(626, 'Dili', 'East Timorese', '626', 'US dollar', 'USD', 'cent', 'Democratic Republic of East Timor', 'TL', 'TLS', 'Timor-Leste', '142', '035', 0),
(630, 'San Juan', 'Puerto Rican', '630', 'US dollar', 'USD', 'cent', 'Commonwealth of Puerto Rico', 'PR', 'PRI', 'Puerto Rico', '019', '029', 0),
(634, 'Doha', 'Qatari', '634', 'Qatari riyal', 'QAR', 'dirham', 'State of Qatar', 'QA', 'QAT', 'Qatar', '142', '145', 0),
(638, 'Saint-Denis', 'Reunionese', '638', 'euro', 'EUR', 'cent', 'Réunion', 'RE', 'REU', 'Réunion', '002', '014', 0),
(642, 'Bucharest', 'Romanian', '642', 'Romanian leu (pl. lei)', 'RON', 'ban (pl. bani)', 'Romania', 'RO', 'ROU', 'Romania', '150', '151', 1),
(643, 'Moscow', 'Russian', '643', 'Russian rouble', 'RUB', 'kopek', 'Russian Federation', 'RU', 'RUS', 'Russian Federation', '150', '151', 0),
(646, 'Kigali', 'Rwandan; Rwandese', '646', 'Rwandese franc', 'RWF', 'centime', 'Republic of Rwanda', 'RW', 'RWA', 'Rwanda', '002', '014', 0),
(652, 'Gustavia', 'of Saint Barthélemy', '652', 'euro', 'EUR', 'cent', 'Collectivity of Saint Barthélemy', 'BL', 'BLM', 'Saint Barthélemy', '019', '029', 0),
(654, 'Jamestown', 'Saint Helenian', '654', 'Saint Helena pound', 'SHP', 'penny', 'Saint Helena, Ascension and Tristan da Cunha', 'SH', 'SHN', 'Saint Helena, Ascension and Tristan da Cunha', '002', '011', 0),
(659, 'Basseterre', 'Kittsian; Nevisian', '659', 'East Caribbean dollar', 'XCD', 'cent', 'Federation of Saint Kitts and Nevis', 'KN', 'KNA', 'Saint Kitts and Nevis', '019', '029', 0),
(660, 'The Valley', 'Anguillan', '660', 'East Caribbean dollar', 'XCD', 'cent', 'Anguilla', 'AI', 'AIA', 'Anguilla', '019', '029', 0),
(662, 'Castries', 'Saint Lucian', '662', 'East Caribbean dollar', 'XCD', 'cent', 'Saint Lucia', 'LC', 'LCA', 'Saint Lucia', '019', '029', 0),
(663, 'Marigot', 'of Saint Martin', '663', 'euro', 'EUR', 'cent', 'Collectivity of Saint Martin', 'MF', 'MAF', 'Saint Martin (French part)', '019', '029', 0),
(666, 'Saint-Pierre', 'St-Pierrais; Miquelonnais', '666', 'euro', 'EUR', 'cent', 'Territorial Collectivity of Saint Pierre and Miquelon', 'PM', 'SPM', 'Saint Pierre and Miquelon', '019', '021', 0),
(670, 'Kingstown', 'Vincentian', '670', 'East Caribbean dollar', 'XCD', 'cent', 'Saint Vincent and the Grenadines', 'VC', 'VCT', 'Saint Vincent and the Grenadines', '019', '029', 0),
(674, 'San Marino', 'San Marinese', '674', 'euro', 'EUR ', 'cent', 'Republic of San Marino', 'SM', 'SMR', 'San Marino', '150', '039', 0),
(678, 'São Tomé', 'São Toméan', '678', 'dobra', 'STD', 'centavo', 'Democratic Republic of São Tomé and Príncipe', 'ST', 'STP', 'Sao Tome and Principe', '002', '017', 0),
(682, 'Riyadh', 'Saudi Arabian', '682', 'riyal', 'SAR', 'halala', 'Kingdom of Saudi Arabia', 'SA', 'SAU', 'Saudi Arabia', '142', '145', 0),
(686, 'Dakar', 'Senegalese', '686', 'CFA franc (BCEAO)', 'XOF', 'centime', 'Republic of Senegal', 'SN', 'SEN', 'Senegal', '002', '011', 0),
(688, 'Belgrade', 'Serb', '688', 'Serbian dinar', 'RSD', 'para (inv.)', 'Republic of Serbia', 'RS', 'SRB', 'Serbia', '150', '039', 0),
(690, 'Victoria', 'Seychellois', '690', 'Seychelles rupee', 'SCR', 'cent', 'Republic of Seychelles', 'SC', 'SYC', 'Seychelles', '002', '014', 0),
(694, 'Freetown', 'Sierra Leonean', '694', 'leone', 'SLL', 'cent', 'Republic of Sierra Leone', 'SL', 'SLE', 'Sierra Leone', '002', '011', 0),
(702, 'Singapore', 'Singaporean', '702', 'Singapore dollar', 'SGD', 'cent', 'Republic of Singapore', 'SG', 'SGP', 'Singapore', '142', '035', 0),
(703, 'Bratislava', 'Slovak', '703', 'euro', 'EUR', 'cent', 'Slovak Republic', 'SK', 'SVK', 'Slovakia', '150', '151', 1),
(704, 'Hanoi', 'Vietnamese', '704', 'dong', 'VND', '(10 hào', 'Socialist Republic of Vietnam', 'VN', 'VNM', 'Viet Nam', '142', '035', 0),
(705, 'Ljubljana', 'Slovene', '705', 'euro', 'EUR', 'cent', 'Republic of Slovenia', 'SI', 'SVN', 'Slovenia', '150', '039', 1),
(706, 'Mogadishu', 'Somali', '706', 'Somali shilling', 'SOS', 'cent', 'Somali Republic', 'SO', 'SOM', 'Somalia', '002', '014', 0),
(710, 'Pretoria (ZA1)', 'South African', '710', 'rand', 'ZAR', 'cent', 'Republic of South Africa', 'ZA', 'ZAF', 'South Africa', '002', '018', 0),
(716, 'Harare', 'Zimbabwean', '716', 'Zimbabwe dollar (ZW1)', 'ZWL', 'cent', 'Republic of Zimbabwe', 'ZW', 'ZWE', 'Zimbabwe', '002', '014', 0),
(724, 'Madrid', 'Spaniard', '724', 'euro', 'EUR', 'cent', 'Kingdom of Spain', 'ES', 'ESP', 'Spain', '150', '039', 1),
(728, 'Juba', 'South Sudanese', '728', 'South Sudanese pound', 'SSP', 'piaster', 'Republic of South Sudan', 'SS', 'SSD', 'South Sudan', '002', '015', 0),
(729, 'Khartoum', 'Sudanese', '729', 'Sudanese pound', 'SDG', 'piastre', 'Republic of the Sudan', 'SD', 'SDN', 'Sudan', '002', '015', 0),
(732, 'Al aaiun', 'Sahrawi', '732', 'Moroccan dirham', 'MAD', 'centime', 'Western Sahara', 'EH', 'ESH', 'Western Sahara', '002', '015', 0),
(740, 'Paramaribo', 'Surinamese', '740', 'Surinamese dollar', 'SRD', 'cent', 'Republic of Suriname', 'SR', 'SUR', 'Suriname', '019', '005', 0),
(744, 'Longyearbyen', 'of Svalbard', '744', 'Norwegian krone (pl. kroner)', 'NOK', 'øre (inv.)', 'Svalbard and Jan Mayen', 'SJ', 'SJM', 'Svalbard and Jan Mayen', '150', '154', 0),
(748, 'Mbabane', 'Swazi', '748', 'lilangeni', 'SZL', 'cent', 'Kingdom of Swaziland', 'SZ', 'SWZ', 'Swaziland', '002', '018', 0),
(752, 'Stockholm', 'Swedish', '752', 'krona (pl. kronor)', 'SEK', 'öre (inv.)', 'Kingdom of Sweden', 'SE', 'SWE', 'Sweden', '150', '154', 1),
(756, 'Berne', 'Swiss', '756', 'Swiss franc', 'CHF', 'centime', 'Swiss Confederation', 'CH', 'CHE', 'Switzerland', '150', '155', 1),
(760, 'Damascus', 'Syrian', '760', 'Syrian pound', 'SYP', 'piastre', 'Syrian Arab Republic', 'SY', 'SYR', 'Syrian Arab Republic', '142', '145', 0),
(762, 'Dushanbe', 'Tajik', '762', 'somoni', 'TJS', 'diram', 'Republic of Tajikistan', 'TJ', 'TJK', 'Tajikistan', '142', '143', 0),
(764, 'Bangkok', 'Thai', '764', 'baht (inv.)', 'THB', 'satang (inv.)', 'Kingdom of Thailand', 'TH', 'THA', 'Thailand', '142', '035', 0),
(768, 'Lomé', 'Togolese', '768', 'CFA franc (BCEAO)', 'XOF', 'centime', 'Togolese Republic', 'TG', 'TGO', 'Togo', '002', '011', 0),
(772, '(TK2)', 'Tokelauan', '772', 'New Zealand dollar', 'NZD', 'cent', 'Tokelau', 'TK', 'TKL', 'Tokelau', '009', '061', 0),
(776, 'Nuku’alofa', 'Tongan', '776', 'pa’anga (inv.)', 'TOP', 'seniti (inv.)', 'Kingdom of Tonga', 'TO', 'TON', 'Tonga', '009', '061', 0),
(780, 'Port of Spain', 'Trinidadian; Tobagonian', '780', 'Trinidad and Tobago dollar', 'TTD', 'cent', 'Republic of Trinidad and Tobago', 'TT', 'TTO', 'Trinidad and Tobago', '019', '029', 0),
(784, 'Abu Dhabi', 'Emirian', '784', 'UAE dirham', 'AED', 'fils (inv.)', 'United Arab Emirates', 'AE', 'ARE', 'United Arab Emirates', '142', '145', 0),
(788, 'Tunis', 'Tunisian', '788', 'Tunisian dinar', 'TND', 'millime', 'Republic of Tunisia', 'TN', 'TUN', 'Tunisia', '002', '015', 0),
(792, 'Ankara', 'Turk', '792', 'Turkish lira (inv.)', 'TRY', 'kurus (inv.)', 'Republic of Turkey', 'TR', 'TUR', 'Turkey', '142', '145', 0),
(795, 'Ashgabat', 'Turkmen', '795', 'Turkmen manat (inv.)', 'TMT', 'tenge (inv.)', 'Turkmenistan', 'TM', 'TKM', 'Turkmenistan', '142', '143', 0),
(796, 'Cockburn Town', 'Turks and Caicos Islander', '796', 'US dollar', 'USD', 'cent', 'Turks and Caicos Islands', 'TC', 'TCA', 'Turks and Caicos Islands', '019', '029', 0),
(798, 'Funafuti', 'Tuvaluan', '798', 'Australian dollar', 'AUD', 'cent', 'Tuvalu', 'TV', 'TUV', 'Tuvalu', '009', '061', 0),
(800, 'Kampala', 'Ugandan', '800', 'Uganda shilling', 'UGX', 'cent', 'Republic of Uganda', 'UG', 'UGA', 'Uganda', '002', '014', 0),
(804, 'Kiev', 'Ukrainian', '804', 'hryvnia', 'UAH', 'kopiyka', 'Ukraine', 'UA', 'UKR', 'Ukraine', '150', '151', 0),
(807, 'Skopje', 'of the former Yugoslav Republic of Macedonia', '807', 'denar (pl. denars)', 'MKD', 'deni (inv.)', 'the former Yugoslav Republic of Macedonia', 'MK', 'MKD', 'Macedonia, the former Yugoslav Republic of', '150', '039', 0),
(818, 'Cairo', 'Egyptian', '818', 'Egyptian pound', 'EGP', 'piastre', 'Arab Republic of Egypt', 'EG', 'EGY', 'Egypt', '002', '015', 0),
(826, 'London', 'British', '826', 'pound sterling', 'GBP', 'penny (pl. pence)', 'United Kingdom of Great Britain and Northern Ireland', 'GB', 'GBR', 'United Kingdom', '150', '154', 1),
(831, 'St Peter Port', 'of Guernsey', '831', 'Guernsey pound (GG2)', 'GGP (GG2)', 'penny (pl. pence)', 'Bailiwick of Guernsey', 'GG', 'GGY', 'Guernsey', '150', '154', 0),
(832, 'St Helier', 'of Jersey', '832', 'Jersey pound (JE2)', 'JEP (JE2)', 'penny (pl. pence)', 'Bailiwick of Jersey', 'JE', 'JEY', 'Jersey', '150', '154', 0),
(833, 'Douglas', 'Manxman; Manxwoman', '833', 'Manx pound (IM2)', 'IMP (IM2)', 'penny (pl. pence)', 'Isle of Man', 'IM', 'IMN', 'Isle of Man', '150', '154', 0),
(834, 'Dodoma (TZ1)', 'Tanzanian', '834', 'Tanzanian shilling', 'TZS', 'cent', 'United Republic of Tanzania', 'TZ', 'TZA', 'Tanzania, United Republic of', '002', '014', 0),
(840, 'Washington DC', 'American', '840', 'US dollar', 'USD', 'cent', 'United States of America', 'US', 'USA', 'United States', '019', '021', 0),
(850, 'Charlotte Amalie', 'US Virgin Islander', '850', 'US dollar', 'USD', 'cent', 'United States Virgin Islands', 'VI', 'VIR', 'Virgin Islands, U.S.', '019', '029', 0),
(854, 'Ouagadougou', 'Burkinabe', '854', 'CFA franc (BCEAO)', 'XOF', 'centime', 'Burkina Faso', 'BF', 'BFA', 'Burkina Faso', '002', '011', 0),
(858, 'Montevideo', 'Uruguayan', '858', 'Uruguayan peso', 'UYU', 'centésimo', 'Eastern Republic of Uruguay', 'UY', 'URY', 'Uruguay', '019', '005', 0),
(860, 'Tashkent', 'Uzbek', '860', 'sum (inv.)', 'UZS', 'tiyin (inv.)', 'Republic of Uzbekistan', 'UZ', 'UZB', 'Uzbekistan', '142', '143', 0),
(862, 'Caracas', 'Venezuelan', '862', 'bolívar fuerte (pl. bolívares fuertes)', 'VEF', 'céntimo', 'Bolivarian Republic of Venezuela', 'VE', 'VEN', 'Venezuela, Bolivarian Republic of', '019', '005', 0),
(876, 'Mata-Utu', 'Wallisian; Futunan; Wallis and Futuna Islander', '876', 'CFP franc', 'XPF', 'centime', 'Wallis and Futuna', 'WF', 'WLF', 'Wallis and Futuna', '009', '061', 0),
(882, 'Apia', 'Samoan', '882', 'tala (inv.)', 'WST', 'sene (inv.)', 'Independent State of Samoa', 'WS', 'WSM', 'Samoa', '009', '061', 0),
(887, 'San’a', 'Yemenite', '887', 'Yemeni rial', 'YER', 'fils (inv.)', 'Republic of Yemen', 'YE', 'YEM', 'Yemen', '142', '145', 0),
(894, 'Lusaka', 'Zambian', '894', 'Zambian kwacha (inv.)', 'ZMW', 'ngwee (inv.)', 'Republic of Zambia', 'ZM', 'ZMB', 'Zambia', '002', '014', 0);

-- --------------------------------------------------------

--
-- Structure de la table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol_left` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol_right` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `decimal_place` int(11) NOT NULL,
  `value` double(15,8) NOT NULL,
  `decimal_point` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thousand_point` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `currencies`
--

INSERT INTO `currencies` (`id`, `title`, `symbol_left`, `symbol_right`, `code`, `decimal_place`, `value`, `decimal_point`, `thousand_point`, `status`, `created_at`, `updated_at`) VALUES
(1, 'U.S. Dollar', '$', '', 'USD', 2, 1.00000000, '.', ',', 1, '2013-11-29 18:51:38', '2013-11-29 18:51:38'),
(2, 'Euro', '€', '', 'EUR', 2, 0.74970001, '.', ',', 1, '2013-11-29 18:51:38', '2013-11-29 18:51:38'),
(3, 'Pound Sterling', '£', '', 'GBP', 2, 0.62220001, '.', ',', 1, '2013-11-29 18:51:38', '2013-11-29 18:51:38'),
(4, 'Australian Dollar', '$', '', 'AUD', 2, 0.94790000, '.', ',', 1, '2013-11-29 18:51:38', '2013-11-29 18:51:38'),
(5, 'Canadian Dollar', '$', '', 'CAD', 2, 0.98500001, '.', ',', 1, '2013-11-29 18:51:38', '2013-11-29 18:51:38'),
(6, 'Czech Koruna', '', 'Kč ', 'CZK', 2, 19.16900063, '.', ',', 1, '2013-11-29 18:51:38', '2013-11-29 18:51:38'),
(7, 'Danish Krone', 'kr ', '', 'DKK', 2, 5.59420013, '.', ',', 1, '2013-11-29 18:51:38', '2013-11-29 18:51:38'),
(8, 'Hong Kong Dollar', '$', '', 'HKD', 2, 7.75290012, '.', ',', 1, '2013-11-29 18:51:38', '2013-11-29 18:51:38'),
(9, 'Hungarian Forint', 'Ft ', '', 'HUF', 2, 221.27000427, '.', ',', 1, '2013-11-29 18:51:38', '2013-11-29 18:51:38'),
(10, 'Israeli New Sheqel', '?', '', 'ILS', 2, 3.73559999, '.', ',', 1, '2013-11-29 18:51:38', '2013-11-29 18:51:38'),
(11, 'Japanese Yen', '¥', '', 'JPY', 2, 88.76499939, '.', ',', 1, '2013-11-29 18:51:38', '2013-11-29 18:51:38'),
(12, 'Mexican Peso', '$', '', 'MXN', 2, 12.63899994, '.', ',', 1, '2013-11-29 18:51:38', '2013-11-29 18:51:38'),
(13, 'Norwegian Krone', 'kr ', '', 'NOK', 2, 5.52229977, '.', ',', 1, '2013-11-29 18:51:38', '2013-11-29 18:51:38'),
(14, 'New Zealand Dollar', '$', '', 'NZD', 2, 1.18970001, '.', ',', 1, '2013-11-29 18:51:38', '2013-11-29 18:51:38'),
(15, 'Philippine Peso', 'Php ', '', 'PHP', 2, 40.58000183, '.', ',', 1, '2013-11-29 18:51:38', '2013-11-29 18:51:38'),
(16, 'Polish Zloty', '', 'zł', 'PLN', 2, 3.08590007, ',', '.', 1, '2013-11-29 18:51:38', '2013-11-29 18:51:38'),
(17, 'Singapore Dollar', '$', '', 'SGD', 2, 1.22560000, '.', ',', 1, '2013-11-29 18:51:38', '2013-11-29 18:51:38'),
(18, 'Swedish Krona', 'kr ', '', 'SEK', 2, 6.45870018, '.', ',', 1, '2013-11-29 18:51:38', '2013-11-29 18:51:38'),
(19, 'Swiss Franc', 'CHF ', '', 'CHF', 2, 0.92259997, '.', ',', 1, '2013-11-29 18:51:38', '2013-11-29 18:51:38'),
(20, 'Taiwan New Dollar', 'NT$', '', 'TWD', 2, 28.95199966, '.', ',', 1, '2013-11-29 18:51:38', '2013-11-29 18:51:38'),
(21, 'Thai Baht', '฿', '', 'THB', 2, 30.09499931, '.', ',', 1, '2013-11-29 18:51:38', '2013-11-29 18:51:38'),
(22, 'Ukrainian hryvnia', '₴', '', 'UAH', 2, 0.00000000, '.', ',', 1, '2015-07-22 22:25:30', '2015-07-22 22:25:30'),
(23, 'Icelandic króna', 'kr ', '', 'ISK', 2, 0.00000000, '.', ',', 1, '2015-07-22 22:25:30', '2015-07-22 22:25:30'),
(24, 'Croatian kuna', 'kn ', '', 'HRK', 2, 0.00000000, '.', ',', 1, '2015-07-22 22:25:30', '2015-07-22 22:25:30'),
(25, 'Romanian leu', 'lei ', '', 'RON', 2, 0.00000000, '.', ',', 1, '2015-07-22 22:25:30', '2015-07-22 22:25:30'),
(26, 'Bulgarian lev', 'лв.', '', 'BGN', 2, 0.00000000, '.', ',', 1, '2015-07-22 22:25:30', '2015-07-22 22:25:30'),
(27, 'Turkish lira', '₺', '', 'TRY', 2, 0.00000000, '.', ',', 1, '2015-07-22 22:25:30', '2015-07-22 22:25:30'),
(28, 'Chilean peso', '$', '', 'CLP', 2, 0.00000000, '.', ',', 1, '2015-07-22 22:25:30', '2015-07-22 22:25:30'),
(29, 'South African rand', 'R', '', 'ZAR', 2, 0.00000000, '.', ',', 1, '2015-07-22 22:25:30', '2015-07-22 22:25:30'),
(30, 'Brazilian real', 'R$', '', 'BRL', 2, 0.00000000, '.', ',', 1, '2015-07-22 22:25:30', '2015-07-22 22:25:30'),
(31, 'Malaysian ringgit', 'RM ', '', 'MYR', 2, 0.00000000, '.', ',', 1, '2015-07-22 22:25:30', '2015-07-22 22:25:30'),
(32, 'Russian ruble', '₽', '', 'RUB', 2, 0.00000000, '.', ',', 1, '2015-07-22 22:25:30', '2015-07-22 22:25:30'),
(33, 'Indonesian rupiah', 'Rp ', '', 'IDR', 2, 0.00000000, '.', ',', 1, '2015-07-22 22:25:30', '2015-07-22 22:25:30'),
(34, 'Indian rupee', '₹', '', 'INR', 2, 0.00000000, '.', ',', 1, '2015-07-22 22:25:30', '2015-07-22 22:25:30'),
(35, 'Korean won', '₩', '', 'KRW', 2, 0.00000000, '.', ',', 1, '2015-07-22 22:25:30', '2015-07-22 22:25:30'),
(36, 'Renminbi', '¥', '', 'CNY', 2, 0.00000000, '.', ',', 1, '2015-07-22 22:25:30', '2015-07-22 22:25:30');

-- --------------------------------------------------------

--
-- Structure de la table `datetime_formats`
--

DROP TABLE IF EXISTS `datetime_formats`;
CREATE TABLE IF NOT EXISTS `datetime_formats` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picker_format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `date_formats`
--

DROP TABLE IF EXISTS `date_formats`;
CREATE TABLE IF NOT EXISTS `date_formats` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picker_format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `delegates`
--

DROP TABLE IF EXISTS `delegates`;
CREATE TABLE IF NOT EXISTS `delegates` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dietary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_translation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `languages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_check` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_check` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guests` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lead` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `register_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `delegates`
--

INSERT INTO `delegates` (`id`, `first_name`, `last_name`, `job_title`, `organization`, `email_address`, `experience`, `dietary`, `language_translation`, `languages`, `first_check`, `second_check`, `guests`, `lead`, `register_id`, `created_at`, `updated_at`) VALUES
(1, 'ram', 'tt', 'dev', 'test', 'pelicag791@x1post.com', 'no', 'None', 'no', 'arabic', 'yes', 'yes', 'no', 'no', 13, '2020-12-04 12:25:51', '2020-12-04 12:25:51'),
(2, 'test', 'test', 'test', 'test', 'test@test.hht', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 14, NULL, NULL),
(3, 'v', 'v', 's', 'c', 'cilik84845@1981pc.coms', 'no', 'None', 'no', 'arabic', 'yes', 'yes', 'no', 'no', 14, '2020-12-25 14:14:00', '2020-12-25 14:14:00'),
(4, 'vs', 'v', 't', 'c', 'sehotsi3389@bcpfm.com', 'no', 'None', 'no', 'arabic', 'yes', 'yes', 'no', 'no', 15, '2020-12-25 14:22:14', '2020-12-25 14:22:14'),
(5, 'vs', 'v', 'scq', 'c', 'sebtghosi3389@bcpfm.comt', 'no', 'None', 'no', 'arabic', 'yes', 'yes', 'no', 'no', 16, '2020-12-25 14:25:08', '2020-12-25 14:25:08'),
(6, 'vs', 'v', 'c', 'c', 'sehosi338c9@bcpfm.com', 'no', 'None', 'no', 'arabic', 'yes', 'yes', 'no', 'no', 17, '2020-12-25 14:29:41', '2020-12-25 14:29:41');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_type` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'color',
  `bg_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#B23333',
  `bg_image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `on_sale_date` datetime DEFAULT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `currency_id` int(10) UNSIGNED DEFAULT NULL,
  `organiser_fee_fixed` decimal(13,2) NOT NULL DEFAULT '0.00',
  `organiser_fee_percentage` decimal(5,2) NOT NULL DEFAULT '0.00',
  `organiser_id` int(10) UNSIGNED NOT NULL,
  `venue_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `venue_name_full` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_address` varchar(355) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_address_line_1` varchar(355) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_address_line_2` varchar(355) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_state` varchar(355) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_post_code` varchar(355) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_street_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_long` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_google_place_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pre_order_display_message` text COLLATE utf8mb4_unicode_ci,
  `post_order_display_message` text COLLATE utf8mb4_unicode_ci,
  `social_share_text` text COLLATE utf8mb4_unicode_ci,
  `social_show_facebook` tinyint(1) NOT NULL DEFAULT '1',
  `social_show_linkedin` tinyint(1) NOT NULL DEFAULT '1',
  `social_show_twitter` tinyint(1) NOT NULL DEFAULT '1',
  `social_show_email` tinyint(1) NOT NULL DEFAULT '1',
  `social_show_googleplus` tinyint(1) NOT NULL DEFAULT '1',
  `location_is_manual` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `is_live` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `barcode_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'QRCODE',
  `ticket_border_color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#000000',
  `ticket_bg_color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#FFFFFF',
  `ticket_text_color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#000000',
  `ticket_sub_text_color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#999999',
  `google_tag_manager_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_show_whatsapp` tinyint(1) NOT NULL DEFAULT '1',
  `questions_collection_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'buyer',
  `checkout_timeout_after` int(11) NOT NULL DEFAULT '8',
  `is_1d_barcode_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `enable_offline_payments` tinyint(1) NOT NULL DEFAULT '0',
  `offline_payment_instructions` text COLLATE utf8mb4_unicode_ci,
  `event_image_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gala_event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workshops_event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nb_session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_stream` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_TOS` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_program` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nb_places` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `events_user_id_foreign` (`user_id`),
  KEY `events_currency_id_foreign` (`currency_id`),
  KEY `events_organiser_id_foreign` (`organiser_id`),
  KEY `events_account_id_index` (`account_id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `title`, `location`, `bg_type`, `bg_color`, `bg_image_path`, `description`, `start_date`, `end_date`, `on_sale_date`, `account_id`, `user_id`, `currency_id`, `organiser_fee_fixed`, `organiser_fee_percentage`, `organiser_id`, `venue_name`, `venue_name_full`, `location_address`, `location_address_line_1`, `location_address_line_2`, `location_country`, `location_country_code`, `location_state`, `location_post_code`, `location_street_number`, `location_lat`, `location_long`, `location_google_place_id`, `pre_order_display_message`, `post_order_display_message`, `social_share_text`, `social_show_facebook`, `social_show_linkedin`, `social_show_twitter`, `social_show_email`, `social_show_googleplus`, `location_is_manual`, `is_live`, `created_at`, `updated_at`, `deleted_at`, `barcode_type`, `ticket_border_color`, `ticket_bg_color`, `ticket_text_color`, `ticket_sub_text_color`, `google_tag_manager_code`, `social_show_whatsapp`, `questions_collection_type`, `checkout_timeout_after`, `is_1d_barcode_enabled`, `enable_offline_payments`, `offline_payment_instructions`, `event_image_position`, `gala_event`, `workshops_event`, `social_event`, `program_event`, `language`, `room`, `nb_session`, `id_stream`, `id_TOS`, `id_program`, `nb_places`) VALUES
(14, 'UAE', NULL, 'color', '#23BCBA', NULL, 'On behalf of the International Council on Archives, it is my pleasure to invite you to attend ICA Congress Abu Dhabi 2020 to be held in Abu Dhabi, United Arab Emirates, October 17 to 22 2021.  Held every four years since our inaugural session in 1950, the ICA Congress today is universally recognized as the most important forum for professionals, institutions and industries engaged with archives, records and information management.', '2020-07-09 09:00:00', '2020-07-09 11:00:00', NULL, 2, 2, 2, '0.00', '0.00', 2, 'UAE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 0, 0, '2020-09-25 15:50:45', '2021-01-25 14:31:15', NULL, 'QRCODE', '#000000', '#FFFFFF', '#000000', '#999999', NULL, 1, 'buyer', 8, 0, 0, NULL, NULL, '1', '1', '1', '1', 'EN', '2', '5', '1', '2', '2', 0),
(15, 'Program UAE', NULL, 'color', '#6078EA', NULL, 'On behalf of the International Council on Archives, it is my pleasure to invite you to attend ICA Congress Abu Dhabi 2020 to be held in Abu Dhabi, United Arab Emirates, October 17 to 22 2021.  Held every four years since our inaugural session in 1950, the ICA Congress today is universally recognized as the most important forum for professionals, institutions and industries engaged with archives, records and information management.', '2021-01-07 00:00:00', '2021-01-07 00:00:00', NULL, 2, 2, 2, '0.00', '0.00', 2, 'Program UAE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 0, 0, '2020-11-19 08:35:27', '2021-01-14 12:16:59', '2021-01-14 12:16:59', 'QRCODE', '#000000', '#FFFFFF', '#000000', '#999999', NULL, 1, 'buyer', 8, 0, 0, NULL, NULL, '0', '0', '0', '1', 'AR', '3', '5', '2', '3', '2', 10),
(19, 'EVENT TITLE', NULL, 'color', '#E35C67', NULL, 'On behalf of the International Council on Archives, it is my pleasure to invite you to attend ICA Congress Abu Dhabi 2020 to be held in Abu Dhabi, United Arab Emirates, October 17 to 22 2021.  Held every four years since our inaugural session in 1950, the ICA Congress today is universally recognized as the most important forum for professionals, institutions and industries engaged with archives, records and information management.', '2020-07-08 09:00:00', '2020-07-08 11:00:00', NULL, 2, 2, 2, '0.00', '0.00', 2, 'EVENT TITLE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 0, 1, '2020-12-04 13:12:40', '2021-01-28 14:36:39', NULL, 'QRCODE', '#000000', '#FFFFFF', '#000000', '#999999', NULL, 1, 'buyer', 8, 0, 0, NULL, NULL, '1', '0', '0', '0', 'FR', '2', '6', '2', '1', '1', 4),
(28, 'session title', NULL, 'color', '#45E0A7', NULL, 'On behalf of the International Council on Archives, it is my pleasure to invite you to attend ICA Congress Abu Dhabi 2020 to be held in Abu Dhabi, United Arab Emirates, October 17 to 22 2021.  Held every four years since our inaugural session in 1950, the ICA Congress today is universally recognized as the most important forum for professionals, institutions and industries engaged with archives, records and information management.', '2020-07-08 16:00:00', '2020-07-08 18:00:00', NULL, 2, 2, NULL, '0.00', '0.00', 2, 'first', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 0, 0, '2020-12-25 07:09:40', '2021-01-28 14:16:59', NULL, 'QRCODE', '#000000', '#FFFFFF', '#000000', '#999999', NULL, 1, 'buyer', 8, 0, 0, NULL, NULL, '0', '0', '0', '1', 'EN', '4', '4', '3', '2', '1', 4),
(29, 'Test title', NULL, 'color', '#381CE2', NULL, 'On behalf of the International Council on Archives, it is my pleasure to invite you to attend ICA Congress Abu Dhabi 2020 to be held in Abu Dhabi, United Arab Emirates, October 17 to 22 2021.  Held every four years since our inaugural session in 1950, the ICA Congress today is universally recognized as the most important forum for professionals, institutions and industries engaged with archives, records and information management.', '2020-07-09 13:00:00', '2020-07-09 15:00:00', NULL, 2, 2, NULL, '0.00', '0.00', 2, 'first', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 0, 0, '2020-12-25 07:09:40', '2021-01-25 14:15:12', NULL, 'QRCODE', '#000000', '#FFFFFF', '#000000', '#999999', NULL, 1, 'buyer', 8, 0, 0, NULL, NULL, '0', '0', '0', '1', 'FR', '3', '3', '3', '1', '2', 8),
(43, 'Metadata / description', NULL, 'color', '#B23333', NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', '2020-07-09 16:00:00', '2020-07-09 18:00:00', NULL, 2, 2, NULL, '0.00', '0.00', 2, 'Metadata / description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 0, 0, '2021-01-14 16:12:36', '2021-01-21 16:03:07', NULL, 'QRCODE', '#000000', '#FFFFFF', '#000000', '#999999', NULL, 1, 'buyer', 8, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'FR', '1', '1', '2', '1', '2', 9),
(32, 'Indigenous Matters', NULL, 'color', '#FF00B9', NULL, 'On behalf of the International Council on Archives, it is my pleasure to invite you to attend ICA Congress Abu Dhabi 2020 to be held in Abu Dhabi, United Arab Emirates, October 17 to 22 2021.  Held every four years since our inaugural session in 1950, the ICA Congress today is universally recognized as the most important forum for professionals, institutions and industries engaged with archives, records and information management.', '2021-07-10 09:00:00', '2021-07-10 11:00:00', NULL, 2, 2, NULL, '0.00', '0.00', 2, 'first', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 0, 0, '2020-12-25 07:09:40', '2021-02-04 08:44:09', NULL, 'QRCODE', '#000000', '#FFFFFF', '#000000', '#999999', NULL, 1, 'buyer', 8, 0, 0, NULL, NULL, '0', '0', '0', '1', 'FR', '3', '4', '4', '3', '3', 4),
(33, 'Changes in the profession', NULL, 'color', '#381CE2', NULL, 'On behalf of the International Council on Archives, it is my pleasure to invite you to attend ICA Congress Abu Dhabi 2020 to be held in Abu Dhabi, United Arab Emirates, October 17 to 22 2021.  Held every four years since our inaugural session in 1950, the ICA Congress today is universally recognized as the most important forum for professionals, institutions and industries engaged with archives, records and information management.', '2020-07-10 13:00:00', '2020-07-10 15:00:00', NULL, 2, 2, NULL, '0.00', '0.00', 2, 'first', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 0, 0, '2020-12-25 07:09:40', '2021-01-29 13:26:14', NULL, 'QRCODE', '#000000', '#FFFFFF', '#000000', '#999999', NULL, 1, 'buyer', 8, 0, 0, NULL, NULL, '0', '0', '0', '1', 'EN', '4', '4', '4', '2', '3', 8),
(34, 'ICA Events', NULL, 'color', '#381CE2', NULL, 'On behalf of the International Council on Archives, it is my pleasure to invite you to attend ICA Congress Abu Dhabi 2020 to be held in Abu Dhabi, United Arab Emirates, October 17 to 22 2021.  Held every four years since our inaugural session in 1950, the ICA Congress today is universally recognized as the most important forum for professionals, institutions and industries engaged with archives, records and information management.', '2020-07-10 13:00:00', '2020-07-10 15:00:00', NULL, 2, 2, NULL, '0.00', '0.00', 2, 'first', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 0, 0, '2020-12-25 07:09:40', '2021-01-25 14:33:20', NULL, 'QRCODE', '#000000', '#FFFFFF', '#000000', '#999999', NULL, 1, 'buyer', 8, 0, 0, NULL, NULL, '0', '0', '0', '1', 'FR', '4', '4', '1', '3', '3', 6),
(35, 'Digital preservation', NULL, 'color', '#381CE2', NULL, 'On behalf of the International Council on Archives, it is my pleasure to invite you to attend ICA Congress Abu Dhabi 2020 to be held in Abu Dhabi, United Arab Emirates, October 17 to 22 2021.  Held every four years since our inaugural session in 1950, the ICA Congress today is universally recognized as the most important forum for professionals, institutions and industries engaged with archives, records and information management.', '2020-07-08 16:00:00', '2020-07-08 18:00:00', NULL, 2, 2, NULL, '0.00', '0.00', 2, 'first', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 0, 0, '2020-12-25 07:09:40', '2021-01-28 14:17:21', NULL, 'QRCODE', '#000000', '#FFFFFF', '#000000', '#999999', NULL, 1, 'buyer', 8, 0, 0, NULL, NULL, '0', '0', '0', '1', 'EN', '6', '4', '3', '3', '1', 5),
(37, 'Legal & ethical matters', NULL, 'color', '#B23333', NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', '2020-07-09 09:00:00', '2020-07-09 11:00:00', NULL, 2, 2, NULL, '0.00', '0.00', 2, 'Legal & ethical matters', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 0, 0, '2021-01-14 07:47:22', '2021-01-25 13:18:46', NULL, 'QRCODE', '#000000', '#FFFFFF', '#000000', '#999999', NULL, 1, 'buyer', 8, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'AR', '2', '5', '4', '2', '2', 7),
(41, 'Changes Legal', NULL, 'color', '#B23333', NULL, 'Test', '2020-07-08 13:00:00', '2020-07-08 15:00:00', NULL, 2, 2, NULL, '0.00', '0.00', 2, 'Changes in the profession', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 0, 0, '2021-01-14 16:09:18', '2021-01-26 10:38:09', NULL, 'QRCODE', '#000000', '#FFFFFF', '#000000', '#999999', NULL, 1, 'buyer', 8, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'FR', '4', '1', '2', '2', '1', 2),
(44, 'SessionTest', NULL, 'color', '#B23333', NULL, 'TEST', '2020-07-08 09:00:00', '2020-07-08 11:00:00', NULL, 2, 2, NULL, '0.00', '0.00', 2, 'SessionTest', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 0, 0, '2021-01-29 14:50:29', '2021-02-01 09:42:24', NULL, 'QRCODE', '#000000', '#FFFFFF', '#000000', '#999999', NULL, 1, 'buyer', 8, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'EN', '4', '5', '1', '1', '1', 9);

-- --------------------------------------------------------

--
-- Structure de la table `event_access_codes`
--

DROP TABLE IF EXISTS `event_access_codes`;
CREATE TABLE IF NOT EXISTS `event_access_codes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `usage_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `event_access_codes_event_id_foreign` (`event_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `event_images`
--

DROP TABLE IF EXISTS `event_images`;
CREATE TABLE IF NOT EXISTS `event_images` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `event_images_event_id_foreign` (`event_id`),
  KEY `event_images_account_id_foreign` (`account_id`),
  KEY `event_images_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `event_images`
--

INSERT INTO `event_images` (`id`, `image_path`, `created_at`, `updated_at`, `event_id`, `account_id`, `user_id`) VALUES
(6, 'user_content/event_images/event_image-9f39c2f0c2a9a4a9ada86f023080d519.jpg', '2020-06-29 14:57:38', '2020-06-29 14:57:38', 6, 2, 2),
(3, 'user_content/event_images/event_image-1af4fb2e855b559783c089c4402fae46.jpg', '2020-06-26 08:36:14', '2020-06-26 08:36:14', 5, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `event_question`
--

DROP TABLE IF EXISTS `event_question`;
CREATE TABLE IF NOT EXISTS `event_question` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `event_question_event_id_index` (`event_id`),
  KEY `event_question_question_id_index` (`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `event_question`
--

INSERT INTO `event_question` (`id`, `event_id`, `question_id`) VALUES
(1, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `event_stats`
--

DROP TABLE IF EXISTS `event_stats`;
CREATE TABLE IF NOT EXISTS `event_stats` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `unique_views` int(11) NOT NULL DEFAULT '0',
  `tickets_sold` int(11) NOT NULL DEFAULT '0',
  `sales_volume` decimal(13,2) NOT NULL DEFAULT '0.00',
  `organiser_fees_volume` decimal(13,2) NOT NULL DEFAULT '0.00',
  `event_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `event_stats_id_index` (`id`),
  KEY `event_stats_event_id_index` (`event_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `event_stats`
--

INSERT INTO `event_stats` (`id`, `date`, `views`, `unique_views`, `tickets_sold`, `sales_volume`, `organiser_fees_volume`, `event_id`) VALUES
(1, '2020-07-02', 1, 1, 0, '0.00', '0.00', 6);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `exception` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `img_registration`
--

DROP TABLE IF EXISTS `img_registration`;
CREATE TABLE IF NOT EXISTS `img_registration` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` blob NOT NULL,
  `id_registration` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `img_registration`
--

INSERT INTO `img_registration` (`id`, `image`, `id_registration`, `created_at`, `updated_at`) VALUES
(1, 0x2f6173736574732f696d6755736572732f323032302d31322d31302d30392d31342d32345f6963612d312e706e67, 1, '2020-12-09 14:51:37', '2020-12-10 08:14:24');

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

DROP TABLE IF EXISTS `inscriptions`;
CREATE TABLE IF NOT EXISTS `inscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `registration_as` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `membership_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `membership` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dietary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_translation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `languages` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_check` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode_payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_check` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventS` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventG` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventW` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guests` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipients` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `is_sent` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `sent_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_event_id_foreign` (`event_id`),
  KEY `messages_user_id_foreign` (`user_id`),
  KEY `messages_account_id_index` (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_03_26_180116_create_users_table', 1),
(2, '2014_04_08_232044_setup_countries_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2014_11_07_132018_add_affiliates_table', 1),
(5, '2014_11_17_011806_create_failed_jobs_table', 1),
(6, '2016_03_09_221103_add_ticket_design_options', 1),
(7, '2016_03_16_193757_create_gateways_table', 1),
(8, '2016_03_16_213041_add_account_payment_id', 1),
(9, '2016_03_16_215709_add_gateway_id_accounts_table', 1),
(10, '2016_03_22_021114_add_whatsapp_share_option_events', 1),
(11, '2016_03_25_114646_organiser_page_design_update', 1),
(12, '2016_03_26_103318_create_attendees_questions', 1),
(13, '2016_03_27_223733_add_organiser_page_toggle', 1),
(14, '2016_04_03_172528_order_page_update', 1),
(15, '2016_04_03_221050_add_question_answers_table', 1),
(16, '2016_04_13_151256_add_api_key_users_table', 1),
(17, '2016_05_05_201200_remove_instructions_field_questions_table', 1),
(18, '2016_05_12_143324_fix_messages_table', 1),
(19, '2016_05_16_142730_update_questions_table', 1),
(20, '2016_05_22_041458_remove_ask_for_in_events', 1),
(21, '2016_05_25_145857_attendee_ref_fix', 1),
(22, '2016_05_28_084338_add_sort_order_tickets_table', 1),
(23, '2016_06_14_115337_add_is_refunded_column_to_attendees', 1),
(24, '2016_07_07_143106_add_1d_barcode_option_to_events_table', 1),
(25, '2016_07_08_133056_add_support_for_offline_payments', 1),
(26, '2016_09_16_221455_add_google_analytics_code_to_organiser', 1),
(27, '2016_10_22_150532_add_is_hidden_tickets_table', 1),
(28, '2018_02_26_172146_add_tax_to_organizers', 1),
(29, '2018_02_27_175149_add_taxamt_to_orders_table', 1),
(30, '2018_03_01_150711_add_taxid_to_organisers', 1),
(31, '2018_07_09_133243_additional_tax_field_rename_current_tax_fields', 1),
(32, '2018_08_16_131955_drop_coinbase_and_migs_as_defaults', 1),
(33, '2018_12_04_034523_add_event_image_position_to_events', 1),
(34, '2019_01_14_124052_create_event_access_codes_table', 1),
(35, '2019_01_14_185419_create_ticket_event_access_code_table', 1),
(36, '2019_02_13_130258_add_amounts_field_to_event_access_codes', 1),
(37, '2019_04_05_180853_change_private_reference_number_column_type', 1),
(38, '2019_04_17_171440_add_business_fields_to_order', 1),
(39, '2019_05_14_122245_add_gtm_field_to_organiser', 1),
(40, '2019_05_14_122256_add_gtm_field_to_event', 1),
(41, '2019_05_26_181318_fix_ticket_order_table_foreign_key_constraints', 1),
(42, '2019_05_27_134053_remove_event_revenue_volumes', 1),
(43, '2019_07_09_073928_retrofit_fix_script_for_stats', 1),
(44, '2019_08_19_000000_upgrade_failed_jobs_table', 1),
(45, '2019_09_04_075835_add_default_gateways', 1),
(46, '2019_09_18_082447_disable_refunds_on_stripe_sca', 1),
(47, '2019_09_18_175630_update_organisers_table_set_fields_nullable', 1),
(48, '2019_09_18_215710_update_events_table_set_nullable_fields', 1),
(49, '2019_11_07_085418_update_test_payment_gateway_refund', 1),
(50, '2019_11_12_060447_update_event_organiser_percentage_fees_allowable_length', 1),
(51, '2019_11_22_025242_update_tickets_table_set_default_value', 1),
(52, '2020_05_19_111709_create_inscriptions_table', 2),
(53, '2020_08_27_182634_create_speakers_table', 3),
(54, '2020_09_02_102859_create_sponsors_table', 4),
(55, '2020_09_02_103010_create_program_table', 4),
(56, '2020_10_19_141421_create_shuttles_table', 5),
(57, '2020_10_21_133512_create_registrations_table', 5),
(58, '2020_10_21_133922_create_delegates_table', 5),
(59, '2020_10_21_143356_create_registration_shuttle_table', 5),
(60, '2020_12_01_145742_create_registration_program', 5),
(63, '2020_12_09_102825_create_img_registration', 6),
(64, '2020_12_22_130531_create_streams', 7),
(65, '2020_12_23_095158_create_typeofsession', 8),
(66, '2020_12_23_125131_create_chairs', 9),
(70, '2020_12_25_092324_create_registration_schedule', 10),
(68, '2020_12_23_125253_create_session_speaker', 9),
(69, '2020_12_23_125319_create_session_chair', 9),
(71, '2021_02_02_202922_create__abstracts', 11),
(72, '2021_02_03_134709_create_abstracts_chair', 11),
(73, '2021_02_04_082531_create_session_abstract', 12),
(74, '2021_02_15_151144_create_brochure', 13);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account_id` int(10) UNSIGNED NOT NULL,
  `order_status_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_tax_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_address_line_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_address_line_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_address_state_province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_address_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_address_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_pdf_path` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_reference` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `booking_fee` decimal(8,2) DEFAULT NULL,
  `organiser_booking_fee` decimal(8,2) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_cancelled` tinyint(1) NOT NULL DEFAULT '0',
  `is_partially_refunded` tinyint(1) NOT NULL DEFAULT '0',
  `is_refunded` tinyint(1) NOT NULL DEFAULT '0',
  `amount` decimal(13,2) NOT NULL,
  `amount_refunded` decimal(13,2) DEFAULT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `payment_gateway_id` int(10) UNSIGNED DEFAULT NULL,
  `is_payment_received` tinyint(1) NOT NULL DEFAULT '0',
  `is_business` tinyint(1) NOT NULL DEFAULT '0',
  `taxamt` double(8,2) NOT NULL DEFAULT '0.00',
  `payment_intent` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `orders_order_status_id_foreign` (`order_status_id`),
  KEY `orders_account_id_index` (`account_id`),
  KEY `orders_event_id_index` (`event_id`),
  KEY `orders_payment_gateway_id_foreign` (`payment_gateway_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(13,2) NOT NULL,
  `unit_booking_fee` decimal(13,2) DEFAULT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `order_statuses`
--

DROP TABLE IF EXISTS `order_statuses`;
CREATE TABLE IF NOT EXISTS `order_statuses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `name`) VALUES
(5, 'Awaiting Payment'),
(1, 'Completed'),
(2, 'Refunded'),
(3, 'Partially Refunded'),
(4, 'Cancelled');

-- --------------------------------------------------------

--
-- Structure de la table `organisers`
--

DROP TABLE IF EXISTS `organisers`;
CREATE TABLE IF NOT EXISTS `organisers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmation_key` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_email_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `show_twitter_widget` tinyint(1) NOT NULL DEFAULT '0',
  `show_facebook_widget` tinyint(1) NOT NULL DEFAULT '0',
  `page_header_bg_color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#76a867',
  `page_bg_color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#EEEEEE',
  `page_text_color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#FFFFFF',
  `enable_organiser_page` tinyint(1) NOT NULL DEFAULT '1',
  `google_analytics_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_tag_manager_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `tax_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `tax_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `charge_tax` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `organisers_id_index` (`id`),
  KEY `organisers_account_id_index` (`account_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `organisers`
--

INSERT INTO `organisers` (`id`, `created_at`, `updated_at`, `deleted_at`, `account_id`, `name`, `about`, `email`, `phone`, `confirmation_key`, `facebook`, `twitter`, `logo_path`, `is_email_confirmed`, `show_twitter_widget`, `show_facebook_widget`, `page_header_bg_color`, `page_bg_color`, `page_text_color`, `enable_organiser_page`, `google_analytics_code`, `google_tag_manager_code`, `tax_name`, `tax_value`, `tax_id`, `charge_tax`) VALUES
(1, '2020-05-11 08:19:00', '2020-05-11 08:19:00', NULL, 1, 'Rtouati', NULL, 'ramzitouati1@gmail.com', NULL, 'eZ7Bdm2YRmJs9s9', NULL, NULL, NULL, 0, 0, 0, '#76a867', '#EEEEEE', '#FFFFFF', 1, NULL, NULL, NULL, '0', NULL, 0),
(2, '2020-06-10 07:11:39', '2020-06-10 10:09:01', NULL, 2, 'Admin', NULL, 'useradmin@mail.com', NULL, '90g5wA5J6n383lC', NULL, NULL, NULL, 0, 0, 0, '#76a867', '#eeeeee', '#ffffff', 1, NULL, NULL, NULL, '0', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`(250)),
  KEY `password_resets_token_index` (`token`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `payment_gateways`
--

DROP TABLE IF EXISTS `payment_gateways`;
CREATE TABLE IF NOT EXISTS `payment_gateways` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `provider_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_on_site` tinyint(1) NOT NULL,
  `can_refund` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `admin_blade_template` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `checkout_blade_template` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `payment_gateways`
--

INSERT INTO `payment_gateways` (`id`, `provider_name`, `provider_url`, `is_on_site`, `can_refund`, `name`, `default`, `admin_blade_template`, `checkout_blade_template`) VALUES
(1, 'Stripe', 'https://www.stripe.com', 1, 1, 'Stripe', 0, 'ManageAccount.Partials.Stripe', 'Public.ViewEvent.Partials.PaymentStripe'),
(2, 'Dummy/Test Gateway', 'none', 1, 1, 'Dummy', 0, '', 'Public.ViewEvent.Partials.Dummy'),
(3, 'Stripe SCA', 'https://www.stripe.com', 0, 1, 'Stripe\\PaymentIntents', 0, 'ManageAccount.Partials.StripeSCA', 'Public.ViewEvent.Partials.PaymentStripeSCA');

-- --------------------------------------------------------

--
-- Structure de la table `program`
--

DROP TABLE IF EXISTS `program`;
CREATE TABLE IF NOT EXISTS `program` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `program`
--

INSERT INTO `program` (`id`, `day`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Day1', '2021-07-08 00:00:00', '2020-09-02 08:37:58', '2021-02-01 09:10:35'),
(2, 'Day2', '2021-07-09 00:00:00', '2020-09-02 08:38:29', '2021-02-01 09:11:57'),
(3, 'Day3', '2021-07-10 00:00:00', '2020-09-02 08:39:02', '2021-02-01 09:12:02');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_type_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `is_required` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '1',
  `is_enabled` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `questions_question_type_id_foreign` (`question_type_id`),
  KEY `questions_account_id_index` (`account_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `title`, `question_type_id`, `account_id`, `is_required`, `created_at`, `updated_at`, `deleted_at`, `sort_order`, `is_enabled`) VALUES
(1, 'What is Lorem Ipsum?', 3, 2, 0, '2020-06-26 08:50:01', '2020-06-26 08:50:01', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `question_answers`
--

DROP TABLE IF EXISTS `question_answers`;
CREATE TABLE IF NOT EXISTS `question_answers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `attendee_id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `answer_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_answers_attendee_id_index` (`attendee_id`),
  KEY `question_answers_event_id_index` (`event_id`),
  KEY `question_answers_question_id_index` (`question_id`),
  KEY `question_answers_account_id_index` (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `question_options`
--

DROP TABLE IF EXISTS `question_options`;
CREATE TABLE IF NOT EXISTS `question_options` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question_options_question_id_index` (`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `question_options`
--

INSERT INTO `question_options` (`id`, `name`, `question_id`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 1);

-- --------------------------------------------------------

--
-- Structure de la table `question_ticket`
--

DROP TABLE IF EXISTS `question_ticket`;
CREATE TABLE IF NOT EXISTS `question_ticket` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question_id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question_ticket_question_id_index` (`question_id`),
  KEY `question_ticket_ticket_id_index` (`ticket_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `question_types`
--

DROP TABLE IF EXISTS `question_types`;
CREATE TABLE IF NOT EXISTS `question_types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `has_options` tinyint(1) NOT NULL DEFAULT '0',
  `allow_multiple` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `question_types`
--

INSERT INTO `question_types` (`id`, `alias`, `name`, `has_options`, `allow_multiple`) VALUES
(1, 'text', 'Single-line text box', 0, 0),
(2, 'textarea', 'Multi-line text box', 0, 0),
(3, 'dropdown', 'Dropdown (single selection)', 1, 0),
(4, 'dropdown_multiple', 'Dropdown (multiple selection)', 1, 1),
(5, 'checkbox', 'Checkbox', 1, 1),
(6, 'radio', 'Radio input', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `registrations`
--

DROP TABLE IF EXISTS `registrations`;
CREATE TABLE IF NOT EXISTS `registrations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `registration_as` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dietary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_translation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `languages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_check` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode_payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_check` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eventP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eventS` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eventG` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eventW` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guests` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lead` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `registrations`
--

INSERT INTO `registrations` (`id`, `created_at`, `updated_at`, `registration_as`, `membership_number`, `membership`, `first_name`, `last_name`, `job_title`, `organization`, `email_address`, `country`, `postal_address`, `experience`, `dietary`, `language_translation`, `languages`, `first_check`, `mode_payment`, `second_check`, `eventP`, `eventS`, `eventG`, `eventW`, `guests`, `price`, `lead`, `payment_status`, `password`) VALUES
(29, '2021-01-08 14:24:57', '2021-01-08 14:24:57', 'Mstudent', 'd5110', NULL, 'Test2021-01-08', 'Test', NULL, 'Test', 'Test1545@gmail.com', 'Albania', '1234', 'no', 'None', 'no', 'None', 'yes', 'Onsite payment', 'yes', NULL, NULL, NULL, NULL, 'no', '0', 'yes', 'Pending', NULL),
(28, '2021-01-07 10:27:28', '2021-01-07 10:27:28', 'individual', 'd5110', NULL, 'Test2021-01-07', 'Test', 'Test', 'Test', 'Test536@gmail.com', 'Albania', '1234', 'no', 'None', 'no', 'None', 'yes', 'Onsite payment', 'yes', NULL, NULL, NULL, NULL, 'no', '400', 'yes', 'Pending', NULL),
(27, '2021-01-04 14:29:29', '2021-01-04 14:29:29', 'Mstudent', 'd5110', NULL, 'Test2021-01-04', 'Test', NULL, 'Test', 'Test6114@gmail.com', 'Albania', '1234', 'no', 'None', 'no', 'None', 'yes', 'Onsite payment', 'yes', NULL, NULL, NULL, NULL, 'no', '0', 'yes', 'Pending', NULL),
(26, '2020-12-30 14:52:16', '2020-12-30 14:52:16', 'Mstudent', 'd5210', NULL, 'Test', 'test', NULL, 'test', 'gifics5aw167@faxapdf.com', 'Austria', NULL, 'no', 'None', 'no', 'None', 'yes', 'Bank Transfer', 'yes', NULL, NULL, NULL, NULL, 'no', '0', 'yes', 'Pending', NULL),
(25, '2020-12-30 14:48:37', '2020-12-30 14:48:37', 'individual', 'd5210', NULL, 'Test', 'test', 'AZERTY', 'QWERTY', 'rirete6fd5332@rika0525.com', 'Bermuda', NULL, 'no', 'None', 'no', 'None', 'yes', 'Bank Transfer', 'yes', NULL, NULL, NULL, NULL, 'no', '400', 'yes', 'Pending', NULL),
(24, '2020-12-30 14:26:10', '2020-12-30 14:26:10', 'individual', 'd5210', NULL, 'Test', 'test', 'test', 'QWERTY', 'gific545aw167@faxapdf.com', 'Australia', NULL, 'no', 'None', 'no', 'None', 'yes', 'Onsite payment', 'yes', NULL, NULL, NULL, NULL, 'no', '400', 'yes', 'Successful', NULL),
(23, '2020-12-30 14:21:12', '2020-12-30 14:21:12', 'Mstudent', 'd5210', NULL, 'Test', 'test', NULL, 'test', 'hilogoc6fd29@wonrg.com', 'Ascension Island', '123', 'no', 'None', 'no', 'None', 'yes', 'Bank Transfer', 'yes', NULL, NULL, NULL, NULL, 'no', '0', 'yes', 'Pending', NULL),
(22, '2020-12-30 14:21:12', '2020-12-30 14:21:12', 'Mstudent', 'd5210', NULL, 'Test', 'test', NULL, 'test', 'mivamag661@fironia.com', 'Ascension Island', '123', 'no', 'None', 'no', 'None', 'yes', 'Bank Transfer', 'yes', NULL, NULL, NULL, NULL, 'no', '0', 'yes', 'Pending', NULL),
(21, '2020-12-30 13:16:49', '2020-12-30 13:16:49', 'standard', NULL, NULL, 'azertyyy', 'azertys', 'MMM', 'ccc', 'wewo111no4406@58as.com', 'Andorra', 'ccra', 'no', 'None', 'no', 'None', 'yes', 'Credit Card', 'yes', NULL, NULL, NULL, NULL, 'no', '600', 'yes', 'Successful', NULL),
(20, '2020-12-30 10:42:40', '2020-12-30 10:42:40', 'individual', 'd5110', NULL, 'azertyyy', 'azertys', 'MMM', 'ccc', '522525@58as.com', 'Ukraine', 'ccra', 'no', 'None', 'no', 'None', 'yes', 'Credit Card', 'yes', NULL, NULL, NULL, NULL, 'no', '100', 'yes', 'Successful', NULL),
(19, '2020-12-30 10:16:40', '2020-12-30 10:16:40', 'individual', 'd5110', NULL, 'azertyyy', 'azertys', 'MMM', 'ccc', 'wewosaqano4406@58as.com', 'Andorra', 'ccra', 'no', 'None', 'no', 'None', 'yes', 'Credit Card', 'yes', NULL, NULL, NULL, NULL, 'no', '400', 'yes', 'Successful', NULL),
(14, '2020-12-25 14:14:00', '2020-12-25 14:14:00', 'institution', 'd5210', '3', 'c', 'c', 'cs', 'dc', 'kcodesov647@bcpfm.com', 'Antigua & Barbuda', 'c', 'no', 'None', 'no', 'None', 'yes', 'Onsite payment', 'yes', NULL, NULL, NULL, NULL, 'no', '800', 'yes', 'Successful', NULL),
(15, '2020-12-25 14:22:13', '2020-12-25 14:22:13', 'institution', 'd5210', '2', 'vs', 'v', 'sc', 'c', 'sehosi3389@bcpfm.comt', 'Andorra', 'c', 'no', 'None', 'no', 'None', 'yes', 'Bank Transfer', 'yes', NULL, NULL, NULL, NULL, 'no', '800', 'yes', 'Pending', NULL),
(16, '2020-12-25 14:25:07', '2020-12-25 14:25:07', 'institution', 'd5210', '2', 'c', 'c', 'sqc', 'dc', 'kodesovcq647@bcpfm.com', 'Antigua & Barbuda', 'c', 'no', 'None', 'no', 'None', 'yes', 'Onsite payment', 'yes', NULL, NULL, NULL, NULL, 'no', '800', 'yes', 'Successful', NULL),
(17, '2020-12-25 14:29:41', '2020-12-25 14:29:41', 'institution', 'd5210', '2', 'sqc', 'sx', 'c', 'x', 'redibas533@donmah.com', 'Antigua & Barbuda', 'c', 'no', 'None', 'no', 'None', 'yes', 'Onsite payment', 'yes', NULL, NULL, NULL, NULL, 'no', '800', 'yes', 'Pending', NULL),
(18, '2020-12-25 16:04:12', '2020-12-25 16:04:12', 'individual', 'd5210', NULL, 'vs', 'v', 'sc', 'c', 'tecstc5dsd@mvsail.cdomv', 'Andorra', 'c', 'no', 'None', 'no', 'None', 'yes', 'Onsite payment', 'yes', NULL, NULL, NULL, NULL, 'no', '400', 'yes', 'Pending', NULL),
(36, '2021-01-29 15:09:42', '2021-01-29 15:09:42', 'individual', 'd5110', NULL, 'Test2021-01-29', 'Test', 'Test', 'Test', 'Test8463@gmail.com', 'Albania', '1234', 'no', 'None', 'no', 'None', 'yes', 'Onsite payment', 'yes', NULL, NULL, NULL, NULL, 'no', '400', 'yes', 'Pending', NULL),
(31, '2021-01-12 13:24:20', '2021-01-12 13:24:20', 'standard', NULL, NULL, 'Test2021-01-12', 'Test', 'Test', 'Test', 'Test6652@gmail.com', 'Albania', '1234', 'no', 'None', 'no', 'None', 'yes', 'Onsite payment', 'yes', NULL, NULL, NULL, NULL, 'no', '600', 'yes', 'Pending', NULL),
(32, '2021-01-12 13:26:10', '2021-01-12 13:26:10', 'individual', 'd5110', NULL, 'Test2021-01-12', 'Test', 'Test', 'Test', 'Test632@gmail.com', 'Albania', '1234', 'no', 'None', 'no', 'None', 'yes', 'Onsite payment', 'yes', NULL, NULL, NULL, NULL, 'no', '400', 'yes', 'Pending', NULL),
(33, '2021-01-12 15:49:42', '2021-01-12 15:49:42', 'individual', 'd5110', NULL, 'Test2021-01-12', 'Test', 'Test', 'Test', 'Test8579@gmail.com', 'Albania', '1234', 'no', 'None', 'no', 'None', 'yes', 'Onsite payment', 'yes', NULL, NULL, NULL, NULL, 'no', '400', 'yes', 'Pending', NULL),
(34, '2021-01-12 15:52:12', '2021-01-12 15:52:12', 'Mstudent', 'd5110', NULL, 'Test2021-01-12', 'Test', NULL, 'Test', 'Test4638@gmail.com', 'Albania', '1234', 'no', 'None', 'no', 'None', 'yes', 'Onsite payment', 'yes', NULL, NULL, NULL, NULL, 'no', '0', 'yes', 'Pending', NULL),
(35, '2021-01-12 15:52:51', '2021-01-12 15:52:51', 'standard', NULL, NULL, 'Test2021-01-12', 'Test', 'Test', 'Test', 'Test3942@gmail.com', 'Albania', '1234', 'no', 'None', 'no', 'None', 'yes', 'Onsite payment', 'yes', NULL, NULL, NULL, NULL, 'no', '600', 'yes', 'Pending', NULL),
(37, '2021-01-29 15:10:12', '2021-01-29 15:10:12', 'Mstudent', 'd5110', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'None', 'no', 'None', 'yes', 'Onsite payment', 'yes', NULL, NULL, NULL, NULL, 'no', NULL, 'yes', 'Pending', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `registration_program`
--

DROP TABLE IF EXISTS `registration_program`;
CREATE TABLE IF NOT EXISTS `registration_program` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `registration_id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `registration_program_registration_id_foreign` (`registration_id`),
  KEY `registration_program_program_id_foreign` (`program_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `registration_program`
--

INSERT INTO `registration_program` (`id`, `registration_id`, `program_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2020-12-04 12:55:03', '2020-12-04 12:55:03');

-- --------------------------------------------------------

--
-- Structure de la table `registration_schedule`
--

DROP TABLE IF EXISTS `registration_schedule`;
CREATE TABLE IF NOT EXISTS `registration_schedule` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `registration_id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `registration_schedule_registration_id_foreign` (`registration_id`),
  KEY `registration_schedule_session_id_foreign` (`session_id`)
) ENGINE=MyISAM AUTO_INCREMENT=246 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `registration_schedule`
--

INSERT INTO `registration_schedule` (`id`, `registration_id`, `session_id`, `created_at`, `updated_at`, `status`) VALUES
(222, 20, 37, '2021-01-25 13:18:46', '2021-01-25 13:18:46', 1),
(221, 28, 28, '2021-01-25 12:52:12', '2021-01-25 12:52:12', 1),
(220, 32, 35, '2021-01-25 12:06:16', '2021-01-25 12:06:16', 1),
(219, 32, 37, '2021-01-25 11:59:08', '2021-01-25 11:59:08', 1),
(218, 32, 28, '2021-01-25 11:53:26', '2021-01-25 11:53:26', 1),
(235, 19, 32, '2021-01-25 14:46:21', '2021-01-25 14:46:21', 1),
(216, 15, 19, '2021-01-25 09:50:42', '2021-01-25 09:50:42', 1),
(215, 15, 28, '2021-01-25 09:46:25', '2021-01-25 09:46:25', 1),
(234, 19, 19, '2021-01-25 14:38:51', '2021-01-25 14:38:51', 1),
(213, 20, 28, '2021-01-24 16:18:00', '2021-01-24 16:18:00', 1),
(212, 32, 14, '2021-01-22 13:28:00', '2021-01-22 13:28:00', 1),
(211, 27, 34, '2021-01-22 11:28:50', '2021-01-22 11:28:50', 1),
(210, 17, 32, '2021-01-21 16:04:38', '2021-01-21 16:04:38', 1),
(209, 17, 34, '2021-01-21 16:04:00', '2021-01-21 16:04:00', 1),
(208, 17, 43, '2021-01-21 16:03:07', '2021-01-21 16:03:07', 1),
(207, 17, 29, '2021-01-21 16:01:40', '2021-01-21 16:01:40', 1),
(206, 18, 32, '2021-01-21 15:53:44', '2021-01-21 15:53:44', 1),
(205, 17, 37, '2021-01-21 15:52:12', '2021-01-21 15:52:12', 1),
(204, 18, 32, '2021-01-21 15:51:26', '2021-01-21 15:51:26', 1),
(187, 14, 28, '2021-01-21 12:05:23', '2021-01-21 12:05:23', 0),
(191, 16, 41, '2021-01-21 12:16:21', '2021-01-21 12:16:21', 0),
(190, 14, 41, '2021-01-21 12:14:29', '2021-01-21 12:14:29', 1),
(192, 18, 14, '2021-01-21 12:54:10', '2021-01-21 12:54:10', 1),
(193, 18, 14, '2021-01-21 12:56:59', '2021-01-21 12:56:59', 1),
(194, 18, 14, '2021-01-21 13:10:10', '2021-01-21 13:10:10', 1),
(195, 19, 14, '2021-01-21 13:41:58', '2021-01-21 13:41:58', 1),
(196, 18, 14, '2021-01-21 14:05:17', '2021-01-21 14:05:17', 1),
(197, 18, 14, '2021-01-21 14:16:23', '2021-01-21 14:16:23', 1),
(198, 18, 14, '2021-01-21 14:23:37', '2021-01-21 14:23:37', 1),
(199, 27, 14, '2021-01-21 14:34:46', '2021-01-21 14:34:46', 1),
(233, 20, 34, '2021-01-25 14:32:48', '2021-01-25 14:32:48', 1),
(201, 17, 14, '2021-01-21 15:13:32', '2021-01-21 15:13:32', 1),
(232, 20, 34, '2021-01-25 14:32:48', '2021-01-25 14:32:48', 1),
(203, 17, 28, '2021-01-21 15:31:12', '2021-01-21 15:31:12', 1),
(223, 20, 32, '2021-01-25 13:19:50', '2021-01-25 13:19:50', 1),
(224, 20, 35, '2021-01-25 13:23:17', '2021-01-25 13:23:17', 1),
(231, 20, 14, '2021-01-25 14:31:15', '2021-01-25 14:31:15', 1),
(226, 20, 19, '2021-01-25 14:12:40', '2021-01-25 14:12:40', 1),
(227, 19, 35, '2021-01-25 14:14:10', '2021-01-25 14:14:10', 1),
(228, 20, 29, '2021-01-25 14:15:12', '2021-01-25 14:15:12', 1),
(229, 20, 33, '2021-01-25 14:15:24', '2021-01-25 14:15:24', 1),
(230, 15, 35, '2021-01-25 14:18:18', '2021-01-25 14:18:18', 1),
(236, 23, 19, '2021-01-25 15:11:24', '2021-01-25 15:11:24', 1),
(237, 23, 32, '2021-01-25 15:11:55', '2021-01-25 15:11:55', 1),
(238, 20, 41, '2021-01-26 10:35:10', '2021-01-26 10:35:10', 1),
(239, 23, 41, '2021-01-26 10:37:13', '2021-01-26 10:37:13', 1),
(240, 23, 28, '2021-01-28 14:16:59', '2021-01-28 14:16:59', 1),
(241, 23, 35, '2021-01-28 14:17:21', '2021-01-28 14:17:21', 1),
(242, 29, 19, '2021-01-28 14:24:45', '2021-01-28 14:24:45', 1),
(243, 26, 19, '2021-01-28 14:36:39', '2021-01-28 14:36:39', 1),
(244, 15, 33, '2021-01-29 13:26:14', '2021-01-29 13:26:14', 1),
(245, 20, 44, '2021-02-01 09:42:24', '2021-02-01 09:42:24', 1);

-- --------------------------------------------------------

--
-- Structure de la table `registration_shuttle`
--

DROP TABLE IF EXISTS `registration_shuttle`;
CREATE TABLE IF NOT EXISTS `registration_shuttle` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `registration_id` bigint(20) UNSIGNED NOT NULL,
  `shuttle_id` bigint(20) UNSIGNED NOT NULL,
  `nb_places` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `registration_shuttle_registration_id_foreign` (`registration_id`),
  KEY `registration_shuttle_shuttle_id_foreign` (`shuttle_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reserved_tickets`
--

DROP TABLE IF EXISTS `reserved_tickets`;
CREATE TABLE IF NOT EXISTS `reserved_tickets` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `quantity_reserved` int(11) NOT NULL,
  `expires` datetime NOT NULL,
  `session_id` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reserved_tickets`
--

INSERT INTO `reserved_tickets` (`id`, `ticket_id`, `event_id`, `quantity_reserved`, `expires`, `session_id`, `created_at`, `updated_at`) VALUES
(6, 1, 5, 10, '2020-06-26 15:55:10', 'z64fcH7fV2yLKVGd5AYbD050OFr9gbVOFUFuSSWW', '2020-06-26 14:25:10', '2020-06-26 14:25:10'),
(8, 1, 5, 1, '2020-06-29 09:25:47', 'AS03r7LcXsrk4kX5iRQR9Vxxj0PVmtha8mo7pQvm', '2020-06-29 07:55:47', '2020-06-29 07:55:47'),
(18, 1, 5, 1, '2020-06-29 16:24:06', '7x2FB5AYLyk6OarZBGfLGQ9J4qsWnFEX7QMV1dz2', '2020-06-29 14:54:06', '2020-06-29 14:54:06'),
(22, 1, 5, 1, '2020-07-02 13:38:56', 'IB3tLzE9Zt6G5TJl2DmQVq4XQXj0rPEMyzk9nbuv', '2020-07-02 12:08:56', '2020-07-02 12:08:56');

-- --------------------------------------------------------

--
-- Structure de la table `session_chair`
--

DROP TABLE IF EXISTS `session_chair`;
CREATE TABLE IF NOT EXISTS `session_chair` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `chair_id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `session_chair_session_id_foreign` (`session_id`),
  KEY `session_chair_chair_id_foreign` (`chair_id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `session_chair`
--

INSERT INTO `session_chair` (`id`, `chair_id`, `session_id`, `created_at`, `updated_at`) VALUES
(19, 1, 19, '2021-01-25 13:43:08', '2021-01-25 13:43:08'),
(6, 2, 28, '2021-01-14 00:00:00', '2021-01-14 00:00:00'),
(37, 2, 33, '2021-01-26 10:26:28', '2021-01-26 10:26:28'),
(23, 2, 14, '2021-01-25 13:44:37', '2021-01-25 13:44:37'),
(46, 2, 41, '2021-01-26 10:38:09', '2021-01-26 10:38:09'),
(47, 1, 44, '2021-01-29 14:50:29', '2021-01-29 14:50:29'),
(45, 1, 41, '2021-01-26 10:38:09', '2021-01-26 10:38:09'),
(11, 1, 43, '2021-01-14 16:12:36', '2021-01-14 16:12:36'),
(30, 2, 35, '2021-01-25 14:02:09', '2021-01-25 14:02:09'),
(54, 2, 32, '2021-02-04 08:44:09', '2021-02-04 08:44:09'),
(53, 1, 32, '2021-02-04 08:44:09', '2021-02-04 08:44:09'),
(15, 2, 37, '2021-01-25 12:36:05', '2021-01-25 12:36:05'),
(36, 1, 33, '2021-01-26 10:26:28', '2021-01-26 10:26:28'),
(31, 2, 34, '2021-01-25 14:33:20', '2021-01-25 14:33:20'),
(18, 2, 29, '2021-01-25 12:36:58', '2021-01-25 12:36:58'),
(22, 1, 14, '2021-01-25 13:44:37', '2021-01-25 13:44:37'),
(29, 1, 35, '2021-01-25 14:02:09', '2021-01-25 14:02:09'),
(48, 2, 45, '2021-02-04 08:25:51', '2021-02-04 08:25:51');

-- --------------------------------------------------------

--
-- Structure de la table `session_speaker`
--

DROP TABLE IF EXISTS `session_speaker`;
CREATE TABLE IF NOT EXISTS `session_speaker` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `speaker_id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `session_speaker_session_id_foreign` (`session_id`),
  KEY `session_speaker_speaker_id_foreign` (`speaker_id`)
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `session_speaker`
--

INSERT INTO `session_speaker` (`id`, `speaker_id`, `session_id`, `created_at`, `updated_at`) VALUES
(84, 4, 41, '2021-01-26 10:38:09', '2021-01-26 10:38:09'),
(20, 1, 28, '2021-01-14 00:00:00', '2021-01-14 00:00:00'),
(30, 2, 19, '2021-01-25 13:43:08', '2021-01-25 13:43:08'),
(18, 4, 28, '2021-01-14 00:00:00', '2021-01-14 00:00:00'),
(17, 5, 28, '2021-01-14 00:00:00', '2021-01-14 00:00:00'),
(55, 5, 35, '2021-01-25 14:02:09', '2021-01-25 14:02:09'),
(67, 3, 33, '2021-01-26 10:26:28', '2021-01-26 10:26:28'),
(54, 4, 35, '2021-01-25 14:02:09', '2021-01-25 14:02:09'),
(53, 3, 35, '2021-01-25 14:02:08', '2021-01-25 14:02:08'),
(29, 3, 29, '2021-01-25 12:36:58', '2021-01-25 12:36:58'),
(56, 4, 34, '2021-01-25 14:33:20', '2021-01-25 14:33:20'),
(65, 1, 33, '2021-01-26 10:26:28', '2021-01-26 10:26:28'),
(26, 2, 37, '2021-01-25 12:36:05', '2021-01-25 12:36:05'),
(23, 2, 43, '2021-01-14 16:12:36', '2021-01-14 16:12:36'),
(66, 2, 33, '2021-01-26 10:26:28', '2021-01-26 10:26:28'),
(52, 2, 35, '2021-01-25 14:02:08', '2021-01-25 14:02:08'),
(37, 2, 14, '2021-01-25 13:44:37', '2021-01-25 13:44:37'),
(36, 1, 14, '2021-01-25 13:44:37', '2021-01-25 13:44:37'),
(51, 1, 35, '2021-01-25 14:02:08', '2021-01-25 14:02:08'),
(57, 5, 34, '2021-01-25 14:33:20', '2021-01-25 14:33:20'),
(101, 4, 32, '2021-02-04 08:44:09', '2021-02-04 08:44:09'),
(100, 3, 32, '2021-02-04 08:44:09', '2021-02-04 08:44:09'),
(99, 2, 32, '2021-02-04 08:44:09', '2021-02-04 08:44:09'),
(68, 4, 33, '2021-01-26 10:26:28', '2021-01-26 10:26:28'),
(69, 5, 33, '2021-01-26 10:26:28', '2021-01-26 10:26:28'),
(83, 3, 41, '2021-01-26 10:38:09', '2021-01-26 10:38:09'),
(82, 2, 41, '2021-01-26 10:38:09', '2021-01-26 10:38:09'),
(85, 1, 44, '2021-01-29 14:50:29', '2021-01-29 14:50:29'),
(86, 2, 44, '2021-01-29 14:50:29', '2021-01-29 14:50:29'),
(87, 3, 44, '2021-01-29 14:50:29', '2021-01-29 14:50:29'),
(88, 4, 44, '2021-01-29 14:50:29', '2021-01-29 14:50:29'),
(89, 1, 45, '2021-02-04 08:25:51', '2021-02-04 08:25:51'),
(90, 3, 45, '2021-02-04 08:25:51', '2021-02-04 08:25:51');

-- --------------------------------------------------------

--
-- Structure de la table `shuttles`
--

DROP TABLE IF EXISTS `shuttles`;
CREATE TABLE IF NOT EXISTS `shuttles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `places_available` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arrival_time` datetime NOT NULL,
  `departure_time` datetime NOT NULL,
  `station_departure_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `station_destination_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `shuttles`
--

INSERT INTO `shuttles` (`id`, `title`, `description`, `places_available`, `arrival_time`, `departure_time`, `station_departure_id`, `station_destination_id`, `created_at`, `updated_at`) VALUES
(1, 'title2', 'Here description', 'Abudhabi', '2020-10-29 16:43:27', '2020-10-28 16:23:00', 'ICA', 'Abudhabi Hotel Z', '2021-01-25 17:32:26', '2021-01-25 23:08:10'),
(2, 'title2', 'Here description', 'Abudhabi', '2020-10-29 14:43:27', '2020-10-28 14:23:00', 'Abudhabi Hotel X', 'ICA', '2021-01-25 17:33:51', '2021-01-25 23:06:50'),
(3, 'From Abu Dhabi to ICA', 'comfort transportation', '10', '2021-01-29 13:23:27', '2021-01-28 12:23:00', 'Abu Dhabi Hotel Y', 'ICA', '2021-01-25 23:06:21', '2021-01-25 23:06:21');

-- --------------------------------------------------------

--
-- Structure de la table `speakers`
--

DROP TABLE IF EXISTS `speakers`;
CREATE TABLE IF NOT EXISTS `speakers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `speakers`
--

INSERT INTO `speakers` (`id`, `firstname`, `lastname`, `email`, `organization`, `description`, `image`, `created_at`, `updated_at`, `country`, `facebook`, `twitter`, `linkedin`, `instagram`) VALUES
(1, 'Janes', 'Doe', 'Janedoe@gmail.com', 'TEST001', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 0x2f6173736574732f696d67537065616b65722f323032312d30312d32352d31352d32322d32375f737065616b65722d312d313530783135302e6a7067, '2020-08-27 16:42:41', '2021-02-04 14:32:03', 'Englend', 'https://www.facebook.com/', 'https://www.TWITTER.com/', 'https://www.LINKEDIN.com/', 'https://www.INSTAGRAM.com/'),
(2, 'RAM', 'tt', 'ramtt@gmail.com', 'test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen .', 0x2f6173736574732f696d67537065616b65722f323032312d30312d32352d31352d32302d34355f32322e6a7067, '2020-12-25 09:31:21', '2021-01-25 15:20:45', 'Andorra', NULL, NULL, NULL, NULL),
(3, 'ons', 'esadi', 'esadi@mail.com', 'test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 0x2f6173736574732f696d67537065616b65722f323032312d30312d32352d31352d32322d30375f31332d313530783135302e6a7067, '2020-08-28 08:55:32', '2021-01-25 15:22:07', 'test', NULL, NULL, NULL, NULL),
(4, 'wajih', 'Test', 'wajih.benyounes93@gmail.com', 'test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 0x2f6173736574732f696d67537065616b65722f323032312d30312d32352d31352d32312d34395f31352d313530783135302e6a7067, '2020-09-25 15:50:45', '2021-01-25 15:21:49', 'test', NULL, NULL, NULL, NULL),
(5, 'Mess', 'Cessy', 'sehosi3389@bcpfm.com', 'Test01', 'cs', 0x2f6173736574732f696d67537065616b65722f323032312d30312d32352d31352d32322d31395f737065616b65722d332d313530783135302e6a7067, '2021-01-14 13:23:04', '2021-01-25 15:22:19', 'Andorre', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sponsors`
--

DROP TABLE IF EXISTS `sponsors`;
CREATE TABLE IF NOT EXISTS `sponsors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sponsors`
--

INSERT INTO `sponsors` (`id`, `image`, `title`, `created_at`, `updated_at`, `description`) VALUES
(1, 'http://ica2018.com/wp-content/uploads/GenRE_220_123_zugeschnitten.jpg', 'Gen RE', '2020-09-02 08:40:19', '2020-09-02 08:40:19', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(2, 'http://ica2018.com/wp-content/uploads/LS_RGA_1-e1496045726760.jpg', 'RGA', '2020-09-02 08:41:50', '2020-09-02 08:41:50', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(3, 'http://ica2018.com/wp-content/uploads/LS_Milliman_c-300x168-e1496045706815.jpg', 'Milliman', '2020-09-02 08:42:08', '2020-09-02 08:42:08', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.'),
(4, 'http://ica2018.com/wp-content/uploads/allianz_220_123.jpg', 'Allianz', '2020-09-02 08:43:05', '2020-09-02 08:43:05', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.');

-- --------------------------------------------------------

--
-- Structure de la table `streams`
--

DROP TABLE IF EXISTS `streams`;
CREATE TABLE IF NOT EXISTS `streams` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` blob NOT NULL,
  `couleur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `streams`
--

INSERT INTO `streams` (`id`, `title`, `icon`, `couleur`, `description`, `created_at`, `updated_at`) VALUES
(1, 'FAN', 0x2f6173736574732f69636f6e732f323032312d30322d30352d31302d32362d32365f6e6f756e5f486973746f72792e737667, '#c800ff', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum', '2020-12-22 12:33:53', '2021-02-05 12:10:27'),
(2, 'VITAM', 0x2f6173736574732f69636f6e732f323032312d30322d30352d31302d33352d34315f75782e737667, '#23f64d', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum', '2020-12-22 12:58:55', '2021-02-05 11:42:44'),
(3, 'NameYT', 0x2f6173736574732f69636f6e732f323032312d30322d30352d31302d33362d35375f75782e737667, '#ff0000', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum', '2020-12-25 11:05:08', '2021-02-05 09:50:51'),
(4, 'Sustainability', 0x2f6173736574732f69636f6e732f323032312d30322d30352d31302d33372d30355f6e6f756e5f486973746f72792e737667, '#1e00ff', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum', '2021-01-04 09:24:39', '2021-02-05 11:43:03');

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `edited_by_user_id` int(10) UNSIGNED DEFAULT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(13,2) NOT NULL,
  `max_per_person` int(11) DEFAULT NULL,
  `min_per_person` int(11) DEFAULT NULL,
  `quantity_available` int(11) DEFAULT NULL,
  `quantity_sold` int(11) NOT NULL DEFAULT '0',
  `start_sale_date` datetime DEFAULT NULL,
  `end_sale_date` datetime DEFAULT NULL,
  `sales_volume` decimal(13,2) NOT NULL DEFAULT '0.00',
  `organiser_fees_volume` decimal(13,2) NOT NULL DEFAULT '0.00',
  `is_paused` tinyint(4) NOT NULL DEFAULT '0',
  `public_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `is_hidden` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `tickets_order_id_foreign` (`order_id`),
  KEY `tickets_edited_by_user_id_foreign` (`edited_by_user_id`),
  KEY `tickets_user_id_foreign` (`user_id`),
  KEY `tickets_account_id_index` (`account_id`),
  KEY `tickets_event_id_index` (`event_id`),
  KEY `tickets_public_id_index` (`public_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tickets`
--

INSERT INTO `tickets` (`id`, `created_at`, `updated_at`, `deleted_at`, `edited_by_user_id`, `account_id`, `order_id`, `event_id`, `title`, `description`, `price`, `max_per_person`, `min_per_person`, `quantity_available`, `quantity_sold`, `start_sale_date`, `end_sale_date`, `sales_volume`, `organiser_fees_volume`, `is_paused`, `public_id`, `user_id`, `sort_order`, `is_hidden`) VALUES
(1, '2020-06-26 08:52:52', '2020-06-26 08:52:52', NULL, NULL, 2, NULL, 5, 'TICKET one', '', '22.00', 30, 1, 10, 0, '2020-06-26 09:52:52', NULL, '0.00', '0.00', 0, NULL, 2, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `ticket_event_access_code`
--

DROP TABLE IF EXISTS `ticket_event_access_code`;
CREATE TABLE IF NOT EXISTS `ticket_event_access_code` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `event_access_code_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ticket_event_access_code_ticket_id_foreign` (`ticket_id`),
  KEY `ticket_event_access_code_event_access_code_id_foreign` (`event_access_code_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ticket_order`
--

DROP TABLE IF EXISTS `ticket_order`;
CREATE TABLE IF NOT EXISTS `ticket_order` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ticket_order_order_id_index` (`order_id`),
  KEY `ticket_order_ticket_id_index` (`ticket_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ticket_statuses`
--

DROP TABLE IF EXISTS `ticket_statuses`;
CREATE TABLE IF NOT EXISTS `ticket_statuses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ticket_statuses`
--

INSERT INTO `ticket_statuses` (`id`, `name`) VALUES
(1, 'Sold Out'),
(2, 'Sales Have Ended'),
(3, 'Not On Sale Yet'),
(4, 'On Sale'),
(5, 'On Sale');

-- --------------------------------------------------------

--
-- Structure de la table `timezones`
--

DROP TABLE IF EXISTS `timezones`;
CREATE TABLE IF NOT EXISTS `timezones` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `timezones`
--

INSERT INTO `timezones` (`id`, `name`, `location`) VALUES
(1, 'Pacific/Midway', '(GMT-11:00) Midway Island'),
(2, 'US/Samoa', '(GMT-11:00) Samoa'),
(3, 'US/Hawaii', '(GMT-10:00) Hawaii'),
(4, 'US/Alaska', '(GMT-09:00) Alaska'),
(5, 'US/Pacific', '(GMT-08:00) Pacific Time (US &amp; Canada)'),
(6, 'America/Tijuana', '(GMT-08:00) Tijuana'),
(7, 'US/Arizona', '(GMT-07:00) Arizona'),
(8, 'US/Mountain', '(GMT-07:00) Mountain Time (US &amp; Canada)'),
(9, 'America/Chihuahua', '(GMT-07:00) Chihuahua'),
(10, 'America/Mazatlan', '(GMT-07:00) Mazatlan'),
(11, 'America/Mexico_City', '(GMT-06:00) Mexico City'),
(12, 'America/Monterrey', '(GMT-06:00) Monterrey'),
(13, 'Canada/Saskatchewan', '(GMT-06:00) Saskatchewan'),
(14, 'US/Central', '(GMT-06:00) Central Time (US &amp; Canada)'),
(15, 'US/Eastern', '(GMT-05:00) Eastern Time (US &amp; Canada)'),
(16, 'US/East-Indiana', '(GMT-05:00) Indiana (East)'),
(17, 'America/Bogota', '(GMT-05:00) Bogota'),
(18, 'America/Lima', '(GMT-05:00) Lima'),
(19, 'America/Caracas', '(GMT-04:30) Caracas'),
(20, 'Canada/Atlantic', '(GMT-04:00) Atlantic Time (Canada)'),
(21, 'America/La_Paz', '(GMT-04:00) La Paz'),
(22, 'America/Santiago', '(GMT-04:00) Santiago'),
(23, 'Canada/Newfoundland', '(GMT-03:30) Newfoundland'),
(24, 'America/Buenos_Aires', '(GMT-03:00) Buenos Aires'),
(25, 'Greenland', '(GMT-03:00) Greenland'),
(26, 'Atlantic/Stanley', '(GMT-02:00) Stanley'),
(27, 'Atlantic/Azores', '(GMT-01:00) Azores'),
(28, 'Atlantic/Cape_Verde', '(GMT-01:00) Cape Verde Is.'),
(29, 'Africa/Casablanca', '(GMT) Casablanca'),
(30, 'Europe/Dublin', '(GMT) Dublin'),
(31, 'Europe/Lisbon', '(GMT) Lisbon'),
(32, 'Europe/London', '(GMT) London'),
(33, 'Africa/Monrovia', '(GMT) Monrovia'),
(34, 'Europe/Amsterdam', '(GMT+01:00) Amsterdam'),
(35, 'Europe/Belgrade', '(GMT+01:00) Belgrade'),
(36, 'Europe/Berlin', '(GMT+01:00) Berlin'),
(37, 'Europe/Bratislava', '(GMT+01:00) Bratislava'),
(38, 'Europe/Brussels', '(GMT+01:00) Brussels'),
(39, 'Europe/Budapest', '(GMT+01:00) Budapest'),
(40, 'Europe/Copenhagen', '(GMT+01:00) Copenhagen'),
(41, 'Europe/Ljubljana', '(GMT+01:00) Ljubljana'),
(42, 'Europe/Madrid', '(GMT+01:00) Madrid'),
(43, 'Europe/Paris', '(GMT+01:00) Paris'),
(44, 'Europe/Prague', '(GMT+01:00) Prague'),
(45, 'Europe/Rome', '(GMT+01:00) Rome'),
(46, 'Europe/Sarajevo', '(GMT+01:00) Sarajevo'),
(47, 'Europe/Skopje', '(GMT+01:00) Skopje'),
(48, 'Europe/Stockholm', '(GMT+01:00) Stockholm'),
(49, 'Europe/Vienna', '(GMT+01:00) Vienna'),
(50, 'Europe/Warsaw', '(GMT+01:00) Warsaw'),
(51, 'Europe/Zagreb', '(GMT+01:00) Zagreb'),
(52, 'Europe/Athens', '(GMT+02:00) Athens'),
(53, 'Europe/Bucharest', '(GMT+02:00) Bucharest'),
(54, 'Africa/Cairo', '(GMT+02:00) Cairo'),
(55, 'Africa/Harare', '(GMT+02:00) Harare'),
(56, 'Europe/Helsinki', '(GMT+02:00) Helsinki'),
(57, 'Europe/Istanbul', '(GMT+02:00) Istanbul'),
(58, 'Asia/Jerusalem', '(GMT+02:00) Jerusalem'),
(59, 'Europe/Kiev', '(GMT+02:00) Kyiv'),
(60, 'Europe/Minsk', '(GMT+02:00) Minsk'),
(61, 'Europe/Riga', '(GMT+02:00) Riga'),
(62, 'Europe/Sofia', '(GMT+02:00) Sofia'),
(63, 'Europe/Tallinn', '(GMT+02:00) Tallinn'),
(64, 'Europe/Vilnius', '(GMT+02:00) Vilnius'),
(65, 'Asia/Baghdad', '(GMT+03:00) Baghdad'),
(66, 'Asia/Kuwait', '(GMT+03:00) Kuwait'),
(67, 'Africa/Nairobi', '(GMT+03:00) Nairobi'),
(68, 'Asia/Riyadh', '(GMT+03:00) Riyadh'),
(69, 'Asia/Tehran', '(GMT+03:30) Tehran'),
(70, 'Europe/Moscow', '(GMT+04:00) Moscow'),
(71, 'Asia/Baku', '(GMT+04:00) Baku'),
(72, 'Europe/Volgograd', '(GMT+04:00) Volgograd'),
(73, 'Asia/Muscat', '(GMT+04:00) Muscat'),
(74, 'Asia/Tbilisi', '(GMT+04:00) Tbilisi'),
(75, 'Asia/Yerevan', '(GMT+04:00) Yerevan'),
(76, 'Asia/Kabul', '(GMT+04:30) Kabul'),
(77, 'Asia/Karachi', '(GMT+05:00) Karachi'),
(78, 'Asia/Tashkent', '(GMT+05:00) Tashkent'),
(79, 'Asia/Kolkata', '(GMT+05:30) Kolkata'),
(80, 'Asia/Kathmandu', '(GMT+05:45) Kathmandu'),
(81, 'Asia/Yekaterinburg', '(GMT+06:00) Ekaterinburg'),
(82, 'Asia/Almaty', '(GMT+06:00) Almaty'),
(83, 'Asia/Dhaka', '(GMT+06:00) Dhaka'),
(84, 'Asia/Novosibirsk', '(GMT+07:00) Novosibirsk'),
(85, 'Asia/Bangkok', '(GMT+07:00) Bangkok'),
(86, 'Asia/Jakarta', '(GMT+07:00) Jakarta'),
(87, 'Asia/Krasnoyarsk', '(GMT+08:00) Krasnoyarsk'),
(88, 'Asia/Chongqing', '(GMT+08:00) Chongqing'),
(89, 'Asia/Hong_Kong', '(GMT+08:00) Hong Kong'),
(90, 'Asia/Kuala_Lumpur', '(GMT+08:00) Kuala Lumpur'),
(91, 'Australia/Perth', '(GMT+08:00) Perth'),
(92, 'Asia/Singapore', '(GMT+08:00) Singapore'),
(93, 'Asia/Taipei', '(GMT+08:00) Taipei'),
(94, 'Asia/Ulaanbaatar', '(GMT+08:00) Ulaan Bataar'),
(95, 'Asia/Urumqi', '(GMT+08:00) Urumqi'),
(96, 'Asia/Irkutsk', '(GMT+09:00) Irkutsk'),
(97, 'Asia/Seoul', '(GMT+09:00) Seoul'),
(98, 'Asia/Tokyo', '(GMT+09:00) Tokyo'),
(99, 'Australia/Adelaide', '(GMT+09:30) Adelaide'),
(100, 'Australia/Darwin', '(GMT+09:30) Darwin'),
(101, 'Asia/Yakutsk', '(GMT+10:00) Yakutsk'),
(102, 'Australia/Brisbane', '(GMT+10:00) Brisbane'),
(103, 'Australia/Canberra', '(GMT+10:00) Canberra'),
(104, 'Pacific/Guam', '(GMT+10:00) Guam'),
(105, 'Australia/Hobart', '(GMT+10:00) Hobart'),
(106, 'Australia/Melbourne', '(GMT+10:00) Melbourne'),
(107, 'Pacific/Port_Moresby', '(GMT+10:00) Port Moresby'),
(108, 'Australia/Sydney', '(GMT+10:00) Sydney'),
(109, 'Asia/Vladivostok', '(GMT+11:00) Vladivostok'),
(110, 'Asia/Magadan', '(GMT+12:00) Magadan'),
(111, 'Pacific/Auckland', '(GMT+12:00) Auckland'),
(112, 'Pacific/Fiji', '(GMT+12:00) Fiji');

-- --------------------------------------------------------

--
-- Structure de la table `typeofsession`
--

DROP TABLE IF EXISTS `typeofsession`;
CREATE TABLE IF NOT EXISTS `typeofsession` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` blob NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `typeofsession`
--

INSERT INTO `typeofsession` (`id`, `title`, `icon`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Panels', 0x2f6173736574732f544f5369636f6e732f323032312d30312d32352d31312d34382d31365f6e6f756e5f486973746f72795f333332353833352e737667, 'TEST', '2020-12-25 11:11:14', '2021-01-25 11:48:16'),
(2, 'Paper presentations', 0x2f6173736574732f544f5369636f6e732f323032312d30312d32352d31312d34382d33355f54726163c3a92031303331312e706e67, 'TEST', '2020-12-25 11:17:02', '2021-01-25 11:48:35'),
(3, 'Workshops', 0x2f6173736574732f544f5369636f6e732f323032312d30312d32352d31312d34382d32375f6e6f756e5f486973746f72795f333332353833352e737667, 'TEST', '2021-01-04 15:06:22', '2021-01-25 11:48:27');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_registered` tinyint(1) NOT NULL DEFAULT '0',
  `is_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `is_parent` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_api_token_unique` (`api_token`),
  KEY `users_account_id_index` (`account_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `account_id`, `created_at`, `updated_at`, `deleted_at`, `first_name`, `last_name`, `phone`, `email`, `password`, `confirmation_code`, `is_registered`, `is_confirmed`, `is_parent`, `remember_token`, `api_token`) VALUES
(1, 1, '2020-05-11 08:04:50', '2020-05-11 08:04:50', NULL, 'admin', 'admin', NULL, 'testadmin@mail.com', 'testadmin', 'testadmin', 1, 0, 1, 'VdAiUVVwoXj0YWhTzCyvprqK9AAgg7yrb8iQBLrc0epNvjhstUoBYB7E7jHs', 'psvpekbMoeg4kMMfC7kWquIv5bgd1ZWsvgP6JQWszALTVmNwQUYgUPhEwE5s'),
(2, 2, '2020-06-10 07:11:16', '2020-06-10 07:11:16', NULL, 'admin', 'user', NULL, 'useradmin@mail.com', '$2y$10$Ab.E36xw.pax2IjaK5hGnOsRL5fnNLZjEIg7j3QEQIGUvKcNPIgai', 'TEWnjuwKMFcRdJmo', 1, 0, 1, 'mDY6OOdyrEM5aCcIskA0wIguoIOjxKlweKdeDoJavRTKsWD7MpvSbybalgvf', '9Uj9D0aubX2TZwQNDo9wckUriVZVAam5lowfAw7KwJmX3ff75qD63ucoWTrm');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
