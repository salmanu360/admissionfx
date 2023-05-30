-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 30, 2023 at 12:04 PM
-- Server version: 10.3.39-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admissionfx_onlinevisa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mr Mithun Gupta', 'zheaney', 'admin@gmail.com', '2023-02-03 06:31:22', '$2y$10$SeB1ku9/QN3tS4vEfQLLAuqe7.5YnOeXkmTpw.sATYeAOYlhYlaBW', 'uploads/admin/profile/1683703781-img.jpeg', 'active', '7HIEfXmJCOwvvNJ1hmJ1jrvaJyLMgpojwG9kj70UXGL2QQLbA6OJuk6VhR8k', '2023-02-03 00:53:32', '2023-05-10 07:29:41');

-- --------------------------------------------------------

--
-- Table structure for table `assign_recruiter_to_rms`
--

CREATE TABLE `assign_recruiter_to_rms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `recruiter_id` bigint(20) UNSIGNED NOT NULL,
  `recruiter_name` varchar(255) NOT NULL,
  `rm_id` int(11) NOT NULL,
  `rm_name` varchar(255) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_by_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_recruiter_to_rms`
--

INSERT INTO `assign_recruiter_to_rms` (`id`, `recruiter_id`, `recruiter_name`, `rm_id`, `rm_name`, `created_by`, `created_by_name`, `created_at`, `updated_at`) VALUES
(11, 20, 'Contreras and Cunningham Traders', 43, 'salmanrm2', 1, 'Mr Mithun Gupta', '2023-04-07 17:16:22', '2023-04-07 17:16:22'),
(12, 22, 'Sullivan and Roberson Inc', 43, 'salmanrm2', 1, 'Mr Mithun Gupta', '2023-04-07 17:16:22', '2023-04-07 17:16:22'),
(13, 18, 'Harmon Bass Inc', 42, 'salman RM', 1, 'Mr Mithun Gupta', '2023-04-07 18:00:22', '2023-04-07 18:00:22'),
(15, 1, 'Web Developer', 42, 'salman RM', 1, 'Mr Mithun Gupta', '2023-04-10 00:50:46', '2023-04-10 00:50:46'),
(16, 10, 'Moody Roth LLC', 42, 'salman RM', 1, 'Mr Mithun Gupta', '2023-04-10 00:50:46', '2023-04-10 00:50:46'),
(17, 25, 'Burks and Melton Associates', 43, 'salmanrm2', 1, 'Mr Mithun Gupta', '2023-04-21 02:01:47', '2023-04-21 02:01:47'),
(18, 8, 'Olsen and Holloway Inc.', 70, 'Mithun Gupta', 1, 'Mr Mithun Gupta', '2023-04-21 03:50:34', '2023-04-28 20:28:07'),
(20, 16, 'Butler and Dennis LLC', 43, 'salmanrm2', 1, 'Mr Mithun Gupta', '2023-04-21 03:55:14', '2023-04-21 03:58:42'),
(22, 44, 'Mera new company', 70, 'Mithun Gupta', 1, 'Mr Mithun Gupta', '2023-04-21 17:42:30', '2023-04-21 17:42:30'),
(23, 41, 'Dickson Knowles Co', 70, 'Mithun Gupta', 1, 'Mr Mithun Gupta', '2023-04-21 17:42:30', '2023-04-21 17:42:30'),
(24, 41, 'Dickson Knowles Co', 70, 'Mithun Gupta', 1, 'Mr Mithun Gupta', '2023-04-25 05:16:52', '2023-04-28 14:45:07'),
(25, 35, 'Bolton and Middleton Associates', 70, 'Mithun Gupta', 1, 'Mr Mithun Gupta', '2023-04-28 14:43:29', '2023-04-28 14:43:29');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `state_id`, `name`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 248, 11, 'Munich', 'munich', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(6, 248, 13, 'Berlin', 'berlin', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(7, 248, 15, 'Hanover', 'hanover', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(8, 248, 16, 'Rome', 'rome', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(9, 248, 17, 'Alboraya', 'alboraya', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(10, 248, 18, 'Apeldoorn', 'apeldoorn', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(11, 248, 19, 'Kolding', 'kolding', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(12, 248, 20, 'Riga', 'riga', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(13, 248, 21, 'Kaunas', 'kaunas', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(14, 248, 22, 'Budapest', 'budapest', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(15, 248, 24, 'Zagreb', 'zagreb', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(16, 248, 26, 'Montpellier', 'montpellier', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(17, 248, 27, 'Dublin', 'dublin', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(18, 248, 28, 'Leysin', 'leysin', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(19, 248, 29, 'Naples', 'naples', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(20, 159, 30, 'Lincoln', 'lincoln', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(21, 211, 31, 'Lucerne', 'lucerne', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(22, 211, 32, 'Weggis', 'weggis', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(23, 211, 33, 'Montreux', 'montreux', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(24, 232, 34, 'San fransisco', 'san-fransisco', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(25, 232, 35, 'Castleton ', 'castleton', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(26, 232, 36, 'Honolulu', 'honolulu', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(27, 232, 34, 'Belmont', 'belmont', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(28, 232, 37, 'Charleston ', 'charleston', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(29, 232, 38, 'Billings', 'billings', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(30, 232, 39, 'Las Vegas', 'las-vegas', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(31, 232, 40, 'Spokane', 'spokane', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(32, 232, 41, 'Madison', 'madison', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(33, 232, 43, 'Oneonta', 'oneonta', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(34, 232, 43, 'Erie county ', 'erie-county', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(35, 232, 34, 'LA', 'la', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(36, 232, 40, 'Washington', 'washington', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(37, 232, 42, 'Dudley', 'dudley', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(38, 232, 43, 'Paul smiths', 'paul-smiths', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(39, 232, 44, 'Aberdeen', 'aberdeen', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(40, 232, 40, 'Shoreline', 'shoreline', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(41, 231, 45, 'Buckingham', 'buckingham', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(42, 231, 45, 'London', 'london', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(43, 231, 45, 'Lancaster', 'lancaster', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(44, 231, 45, 'Oxford', 'oxford', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(45, 13, 46, 'Marine Parade', 'marine-parade', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(46, 13, 47, 'Adelaide', 'adelaide', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(47, 13, 48, 'Churchill Ave', 'churchill-ave', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(48, 13, 49, 'Melbourne', 'melbourne', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(49, 13, 50, 'sydney', 'sydney', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(50, 13, 51, 'Currie St', 'currie-st', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(51, 13, 52, 'Brisbane', 'brisbane', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(52, 13, 53, 'Gold Coast', 'gold-coast', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(53, 13, 54, 'Cairns', 'cairns', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(54, 13, 55, 'Melbourne', 'melbourne', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(55, 13, 56, 'Sydney', 'sydney', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(56, 38, 57, 'Vancouver', 'vancouver', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(57, 38, 57, 'Langley', 'langley', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(58, 38, 57, 'Fredericton', 'fredericton', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(59, 38, 58, 'Fredericton', 'fredericton', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(60, 38, 59, 'Edmonton', 'edmonton', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(61, 38, 60, 'Saskatoon', 'saskatoon', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(62, 38, 61, 'North Bay', 'north-bay', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(63, 38, 58, 'Moncton', 'moncton', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(64, 38, 62, 'Montreal', 'montreal', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(65, 38, 57, 'Nanaimo', 'nanaimo', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(66, 38, 57, 'Vancouver', 'vancouver', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(67, 38, 61, 'Toronto', 'toronto', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(68, 38, 61, 'Brampton', 'brampton', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(69, 38, 61, 'Hamilton', 'hamilton', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(70, 38, 61, 'Vaughan', 'vaughan', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(71, 38, 57, 'Victoria', 'victoria', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(72, 38, 57, 'Terrace', 'terrace', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(73, 38, 59, 'Vermilion', 'vermilion', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(74, 38, 57, 'Dawson Creek', 'dawson-creek', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(75, 38, 57, 'Castlegar', 'castlegar', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(76, 38, 61, 'Mississauga', 'mississauga', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(77, 38, 57, 'Kelowna', 'kelowna', 1, '2023-04-14 09:28:52', '2023-04-14 09:28:52', NULL),
(78, NULL, 26, 'Test city', 'test-city', 1, '2023-04-30 08:24:57', '2023-04-30 08:24:57', NULL),
(79, NULL, 67, 'City 2', 'city-2', 1, '2023-04-30 08:26:41', '2023-04-30 08:58:03', '2023-04-30 08:58:03'),
(80, NULL, 69, 'Raigardh', 'raigardh', 0, '2023-04-30 08:54:52', '2023-04-30 08:57:53', '2023-04-30 08:57:53');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `state_id` bigint(20) DEFAULT NULL,
  `city_id` bigint(20) DEFAULT NULL,
  `campus` varchar(255) NOT NULL,
  `intake` varchar(255) DEFAULT NULL,
  `level_of_edu` text NOT NULL,
  `application_fee` varchar(100) DEFAULT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_featured` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_by_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `name`, `slug`, `image`, `country_id`, `state_id`, `city_id`, `campus`, `intake`, `level_of_edu`, `application_fee`, `description`, `status`, `is_featured`, `created_at`, `updated_at`, `created_by`, `created_by_name`) VALUES
(78, 'Ascent College Of Technology', 'ascent-college-of-technology', NULL, 253, NULL, NULL, 'Montreal', NULL, 'Graduate', NULL, 'Artificial intelligence and Machine Learning (AIML) is reshaping business — though not at the blistering pace many assume. True, AI is now guiding decisions on everything from crop harvests to bank loans, and once pie-in-the-sky prospects such as totally automated customer service are on the horizon. The technologies that enable AI, like development platforms, vast processing power and data storage, are advancing rapidly and becoming increasingly affordable. The time seems ripe for companies to capitalize on AIML. It is estimated that AIML will add $13 trillion to the global economy over the next decade (Source: Building the AI Powered organization, HBR, July- August 2019 issue). With the increasing pace of adoption, AIML would become ubiquitous, spreading across every aspect of business and our daily lives. The increased adoption of AIML is likely to bring in security challenges.\r\n\r\nFor us at Ascent College of Technology Inc. | Collège de Technologie Ascent Inc, it made perfect sense that the next generation of our labour force would be needed in the areas of Artificial Intelligence and Machine Learning for developing applications. As this AI-based digital transformation takes shape, and this increased adoption would in parallel cause cyber security threats to rise, it became clear the market will require trained resources that have expertise in Network Security and Ethical Cyber Piracy (NSECP) as well. The paradox is that AIML would be used in NSECP to protect organizations from emerging threats.\r\n\r\nEureka! This made perfect sense to launch a cutting-edge college offering IT-specialized programs in the emerging areas of AIML and NSECP.\r\n\r\nOur College is promoted by professionals with vast experience in Collegial studies who are passionate to ensure the success of their students.', 1, 0, '2023-04-29 09:29:37', '2023-04-29 09:29:37', NULL, NULL),
(12, 'Lincoln University', 'lincoln-university', NULL, 272, NULL, NULL, 'Canterbury', NULL, 'Graduate', NULL, 'Lincoln University, we\'ve been leading land and primary industry-based education and research for more than 140 years. Lincoln University, the nation\'s first degree-granting Historically Black College and University (HBCU), educates and empowers students to lead their communities and change the world. Our campus sits in Lincoln township, a friendly and thriving village in the heart of New Zealand\'s stunning Canterbury region. Lincoln also has a QS Five Stars rating and ranks in the top 100 in the subject areas of Agriculture and Forestry. Lincoln is in the 601-680 bracket in the 2021 Times Higher Education (THE) world university rankings, and is ranked in the top 110 in the Asia-Pacific region rankings.\r\n\r\nUniversity of Lincoln is one of the top Public universities in Lincoln, United Kingdom. It is ranked #801-1000 in QS Global World Rankings 2021.', 1, 0, '2023-04-28 07:32:28', '2023-04-28 07:32:28', NULL, NULL),
(13, 'Eie Institute Of Education', 'eie-institute-of-education', NULL, 248, NULL, NULL, 'St. Julians', NULL, 'Graduate', NULL, 'The eie Institute of Education is a Higher Education Institution licensed by the Malta Further & Higher Education Authority (License No: 2005-TC-001). The Institute developed a range of flexible learning programs in partnership with leading institutes and universities worldwide. It offers qualifications (EQF Levels 5 - 7) which blend with the flexibility and versatility that most people require in their busy lives. The Institute has collaborated with several international universities and educational organizations for the past 22 years and is also an accredited study center of other reputable awarding bodies.', 1, 0, '2023-04-29 05:00:19', '2023-04-29 05:00:19', NULL, NULL),
(14, 'Transport And Telecommunication Institute', 'transport-and-telecommunication-institute', NULL, 248, NULL, NULL, 'Riga', NULL, 'Graduate', NULL, 'Transport and Telecommunication Institute (Transporta un sakaru instituts, TSI) is a modern university of applied sciences with a centennial history. It is the only private technical higher educational institution in Latvia.\r\n\r\nTSI is the university-successor of the legendary RKIIGA (Riga Red-Banner Civil Aviation Institute) and RAU (Riga Aviation University). In the present-day appearance, TSI was established in 1999.  \r\n\r\nAll study programs are provided in two languages, Latvian and English. The Institute has received permanent accreditation in Latvia as a higher education institution. \r\n\r\nSince 2003, TSI has been successfully operating the Latgalian branch in Daugavpils � the second largest town in Latvia.\r\n\r\nTSI provides academic study programs in the following directions: transport and logistics, aviation, computer sciences and networks, electronics and robotics, management, and business.\r\n\r\nTSI conducts diversified research scientific work. According to the results of expert evaluation, the Transport and Telecommunication Institute is the only one among private colleges included in the list of leading scientific institutions in Latvia.\r\n\r\nThe total amount of institute graduates � more than 8900.\r\n\r\nCurrent amount of students � more than 2600. \r\n\r\nTSI is proud of its international environment � there are students from Kazakhstan, Uzbekistan, Ukraine, Azerbaijan, Estonia, Lithuania, UK, Spain, Turkey, Russia, Belarus, Moldova, India, Egypt, Peru, and other countries. \r\n\r\nThe most popular education directions for foreign students are IT, logistics, and aviation.', 1, 0, '2023-04-29 05:02:01', '2023-04-29 05:02:01', NULL, NULL),
(15, 'Ecotur College', 'ecotur-college', NULL, 284, NULL, NULL, 'Valencia', NULL, 'Graduate', NULL, 'description', 1, 0, '2023-04-29 05:04:15', '2023-04-29 05:04:15', NULL, NULL),
(16, 'Swiss School Of Managemnet ( Ssm )', 'swiss-school-of-managemnet-ssm', NULL, 265, NULL, NULL, 'Barcelona', NULL, 'Graduate', NULL, 'description', 1, 0, '2023-04-29 05:05:31', '2023-04-29 05:05:31', NULL, NULL),
(17, 'University Of Pecs', 'university-of-pecs', NULL, 248, NULL, NULL, 'Budapest, Hungary, Europe', NULL, 'Graduate', NULL, '', 1, 0, '2023-04-29 05:06:53', '2023-04-29 05:06:53', NULL, NULL),
(18, 'Duna International College', 'duna-international-college', NULL, 248, NULL, NULL, 'Hungary', NULL, 'Graduate', NULL, 'Duna is an international college in Budapest-Hungary in the heart of Europe, established in 2010. The College was established and operates in association with prominent university professors from Hungarian state universities. Duna College runs preparatory programs for the applicants who wish to continue their studies at our partner universities in Hungary, Slovakia, Czech Republic, Italy, the UK, the USA and Canada in 2 different pathways called DRC and TRC. \r\n\r\nOur campus is located in Budapest; one of the most beautiful capitals is Europe. The College welcomes students from all around the world. This international campus was established to create a difference and comprehensiveness in education and training. Hundreds of students come to Hungary to study in different fields every year. These students have different academic backgrounds and our college provides preparatory courses to prepare these applicants for their future studies and to equip them with new study disciplines. Applicants who join our training programs will have the opportunity to get accepted into different universities.\r\n\r\nWe train not just to prepare applicants to get accepted at universities and pass their entrance exams; we wish to create an accurate path of success and progress in life. We provide a wide range of possibilities in higher education along with new trends in teaching and learning that forms the structure and principles of our training plan.', 1, 0, '2023-04-29 05:19:28', '2023-04-29 05:19:28', NULL, NULL),
(19, 'Avicenna International College', 'avicenna-international-college', NULL, 248, NULL, NULL, 'Budapest', NULL, 'Graduate', NULL, 'description', 1, 0, '2023-04-29 05:28:39', '2023-04-29 05:28:39', NULL, NULL),
(20, 'High Skilled Education & Training Australia Pvt. Ltd.', 'high-skilled-education-training-australia-pvt-ltd', NULL, 249, NULL, NULL, 'Melton', NULL, 'Graduate', NULL, 'High Skilled Training and Education Australia provides nationally accredited training for international students which is designed with a flexible approach to ensure the specific training needs of all our learners are met effectively and efficiently.', 1, 0, '2023-04-29 05:57:20', '2023-04-29 05:57:20', NULL, NULL),
(21, 'Western Sydney Technology College', 'western-sydney-technology-college', NULL, 249, NULL, NULL, 'Parramatta', NULL, 'Graduate', NULL, 'description', 1, 0, '2023-04-29 05:58:45', '2023-04-29 05:58:45', NULL, NULL),
(22, 'Elite Education Institute', 'elite-education-institute', NULL, 249, NULL, NULL, 'Haymarket', NULL, 'Graduate', NULL, 'description', 1, 0, '2023-04-29 06:00:08', '2023-04-29 06:00:08', NULL, NULL),
(23, 'University Of Winchester', 'university-of-winchester', NULL, 292, NULL, NULL, 'Winchester', NULL, 'Graduate', NULL, 'description', 1, 0, '2023-04-29 06:04:56', '2023-04-29 06:04:56', NULL, NULL),
(24, 'University Of Chichester', 'university-of-chichester', NULL, 292, NULL, NULL, 'Chichester', NULL, 'Graduate', NULL, 'description', 1, 0, '2023-04-29 06:06:08', '2023-04-29 06:06:08', NULL, NULL),
(25, 'Richmond University', 'richmond-university', NULL, 292, NULL, NULL, 'Richmond', NULL, 'Graduate', NULL, 'description', 1, 0, '2023-04-29 06:07:05', '2023-04-29 06:07:05', NULL, NULL),
(26, 'De Montfort University', 'de-montfort-university', NULL, 292, NULL, NULL, 'Leicester', NULL, 'Graduate', NULL, 'description', 1, 0, '2023-04-29 06:08:14', '2023-04-29 06:08:14', NULL, NULL),
(27, 'Abertay University', 'abertay-university', NULL, 292, NULL, NULL, 'Dundee', NULL, 'Graduate', NULL, 'Abertay has been instrumental in building the city of Dundee’s place as a global hub for computing and gaming, a perfect example of a university and business working together for the common good. Students recognise the excellence of teaching more widely across the university, placing it close to the top of the tree among universities across the UK for the second successive year. It achieves all this while at the same time being the most socially inclusive university in Scotland. Truly, a modern university.', 1, 0, '2023-04-29 06:09:24', '2023-04-29 06:09:24', NULL, NULL),
(28, 'Birmingham City University', 'birmingham-city-university', NULL, 292, NULL, NULL, 'West Midland', NULL, 'Graduate', NULL, 'We put ?270 million into the regional economy and support thousands of jobs in the area. We\'re investing ?340 million in our estate, including a major expansion of our city centre campus at Eastside, providing students with an enviable range of facilities.We put ?270 million into the regional economy and support thousands of jobs in the area. We\'re investing ?340 million in our estate, including a major expansion of our city centre campus at Eastside, providing students with an enviable range of facilities.', 1, 0, '2023-04-29 06:10:23', '2023-04-29 06:10:23', NULL, NULL),
(29, 'Shoreline Community College', 'shoreline-community-college', NULL, 232, NULL, NULL, 'Washington', NULL, 'Graduate', NULL, 'Founded in 1964, Shoreline Community College offers more than 100 rigorous academic and professional/technical degrees and certificates to meet the lifelong learning needs of its diverse students and communities. Dedicated faculty and staff are committed to the educational success of its 10,000+ students who hail from across the United States and over 50 countries.', 1, 0, '2023-04-29 06:11:35', '2023-04-29 06:11:35', NULL, NULL),
(30, 'Paul Smiths College', 'paul-smiths-college', NULL, 232, NULL, NULL, 'New York', NULL, 'Graduate', NULL, 'Paul Smith\'s College is the only four-year college situated within the boundaries of the world-famous Adirondacks. The college\'s 14,000-acre property is an excellent location for an institution that specializes in college degrees on fisheries and wildlife science.\r\n\r\nStudents at Paul Smith\'s College experience a hands-on education that combines proven career training with a meaningful exploration of self, society, and the earth. Paul Smith\'s College has around 900 students with a tight-knit, supportive and �green� community. PSC prides itself with having nine out of 10 students landing a job within six months after graduation.\r\n\r\nThe success of Paul Smith College is said to be a result of their formula: academics + faculty + location, equivalent to a college experience you can\'t get anywhere else.', 1, 0, '2023-04-29 06:13:44', '2023-04-29 06:13:44', NULL, NULL),
(31, 'Mentora College', 'mentora-college', NULL, 232, NULL, NULL, 'Washington, D.C.', NULL, 'Graduate', NULL, 'Description', 1, 0, '2023-04-29 06:16:41', '2023-04-29 06:16:41', NULL, NULL),
(32, 'Los Angeles Mission College', 'los-angeles-mission-college', NULL, 232, NULL, NULL, 'California', NULL, 'Graduate', NULL, 'Los Angeles Mission College is committed to the success of its students. The College, which awards associate degrees and certificates, provides accessible, affordable, high-quality learning opportunities in a culturally and intellectually supportive environment by:\r\n\r\nProviding services and programs in basic skills, general education, career, and technical education, and for transfer;\r\nEducating students to become critical thinkers and lifelong learners;\r\nEnsuring that all programs and services are continuously evaluated and improved to support student learning and achievement; and\r\nMaking traditional and distance education learning opportunities available to enhance the health and wellness of the diverse communities it serves.\r\nLos Angeles Mission College is committed to maintaining high academic standards, promoting student success, and creating opportunities for lifelong learning. The College will inspire students to become informed, active citizens who recognize and appreciate the common humanity of all people through diverse curricula and cultural, academic, and artistic events. \r\n\r\nThe college will practice an honest, collegial, and inclusive decision-making process that respects the diversity and interdependence of the college, student body, and community LAMC is privileged to serve.', 1, 0, '2023-04-29 06:17:54', '2023-04-29 06:17:54', NULL, NULL),
(33, 'Keck Graduate Institute', 'keck-graduate-institute', NULL, 232, NULL, NULL, 'California', NULL, 'Graduate', NULL, 'KGI offers innovative postgraduate degrees and certificates that integrate life and health sciences, business, engineering, pharmacy, medicine, and genetics. With a focus on team projects and hands-on industry experiences, KGI provides pathways for students to become leaders within healthcare and the applied life sciences. KGI consists of three schools: Henry E. Riggs School of Applied Life Sciences, School of Community Medicine, and School of Pharmacy and Health Science.', 1, 0, '2023-04-29 06:18:48', '2023-04-29 06:18:48', NULL, NULL),
(34, 'Hartwick College', 'hartwick-college', NULL, 232, NULL, NULL, 'New York', NULL, 'Graduate', NULL, 'description', 1, 0, '2023-04-29 06:19:56', '2023-04-29 06:19:56', NULL, NULL),
(35, 'Hanover College', 'hanover-college', NULL, 232, NULL, NULL, 'Indiana', NULL, 'Graduate', NULL, 'Nestled in 650 acres of a wooded campus and located on the banks of the scenic Ohio River, Hanover College is a private, liberal arts institution where brains and beauty truly intersect. Our rigorous interdisciplinary academic program with 34 majors attracts the best and the brightest from across the region and beyond.Our students start companies, create social movements and examine wildlife in the wild ? and that?s just while they?re here. After they leave, they join a powerful alumni network of high achievers with connections to jobs in every field.A typical Hanover student is usually in the top 20% of their graduating high school class, with a well-rounded history of extracurricular activities in the service, sports, and academic arena. But their Hanover experience, however, is anything but a typical college experience.At Hanover, students can design their own major, start their own club or organization, and spend May Term immersed in a single course ? often abroad. Hanover students leave here with a professional resume, already full of authentic work from their undergraduate internship, combined with practical meets technical experience in their chosen field.', 1, 0, '2023-04-29 06:22:33', '2023-04-29 06:22:33', NULL, NULL),
(36, 'Glasgow Caledonian New York College (gcnyc)', 'glasgow-caledonian-new-york-college-gcnyc', NULL, 232, NULL, NULL, 'New York', NULL, 'Graduate', NULL, 'Glasgow Caledonian New York College (GCNYC) is New York City’s Graduate School for the Common Good. Our three Master of Science degrees explore business and organizational issues through the lenses of sustainability, social impact, justice, and equity. Founded by Glasgow Caledonian University, which has more than 20,000 students worldwide, GCNYC shares a commitment to people, planet and profitability with a smaller, tight-knit community of students, faculty and staff. The College is located in the heart of historic SoHo in a newly renovated, gallery-esque space and serves as a vibrant hub for industry professionals motivated by the Common Good. GCNYC is chartered by the New York State Department of Education and is a candidate for accreditation by the Middle States Commission for Higher Education.', 1, 0, '2023-04-29 06:33:10', '2023-04-29 06:33:10', NULL, NULL),
(37, 'Fox Valley Technical College', 'fox-valley-technical-college', NULL, 232, NULL, NULL, 'Wisconsin', NULL, 'Graduate', NULL, 'Fox Valley Technical College®, a 2-year public college in Appleton and Oshkosh, Wisconsin, has been the college of choice in this community for over 100 years. You get high-tech occupational training for the workplace of today, whether you’re preparing for a new career or sharpening your job skills. With over 200 programs to choose from, you can put your career on the fast track.', 1, 0, '2023-04-29 06:34:06', '2023-04-29 06:34:06', NULL, NULL),
(38, 'Edgewood College', 'edgewood-college', NULL, 232, NULL, NULL, 'Wisconsin', NULL, 'Graduate', NULL, 'Edgewood College is a private Dominican liberal arts college located in Madison, Wisconsin. The college is dedicated to liberal arts programs and has a curriculum that�s composed mostly of education, business, and art therapy courses. There are also programs for nursing and information technology at Edgewood. \r\n\r\nEdgewood College is known for being a student-friendly campus. Being a liberal institution, learning and education are promoted not only inside the classroom but also outside. As a Catholic school, Edgewood College also aims to partner with the community in pursuit of a just and compassionate society.', 1, 0, '2023-04-29 06:35:34', '2023-04-29 06:35:34', NULL, NULL),
(39, 'Community Colleges Of Spokane', 'community-colleges-of-spokane', NULL, 232, NULL, NULL, 'Washington', NULL, 'Graduate', NULL, 'We are a community college district made up of two accredited colleges, Spokane Community College (SCC) and Spokane Falls Community College (SFCC).', 1, 0, '2023-04-29 06:36:40', '2023-04-29 06:36:40', NULL, NULL),
(40, 'Community College Of Philadelphia', 'community-college-of-philadelphia', NULL, 232, NULL, NULL, 'Pennsylvania', NULL, 'Graduate', NULL, 'The Community College of Philadelphia (CCP) is a public community college with campuses throughout Philadelphia, Pennsylvania. The college was founded in 1965 and is accredited by the Middle States Commission on Higher Education. It offers over 100 associate degree and certificate programs through its four locations.', 1, 0, '2023-04-29 06:37:38', '2023-04-29 06:37:38', NULL, NULL),
(41, 'Community College Of Philadelphia', 'community-college-of-philadelphia', NULL, 232, NULL, NULL, 'Iowa', NULL, 'Graduate', NULL, 'The Community College of Philadelphia (CCP) is a public community college with campuses throughout Philadelphia, Pennsylvania. The college was founded in 1965 and is accredited by the Middle States Commission on Higher Education. It offers over 100 associate degree and certificate programs through its four locations.', 1, 0, '2023-04-29 06:39:52', '2023-04-29 06:39:52', NULL, NULL),
(42, 'Whitworth University', 'whitworth-university', NULL, 232, NULL, NULL, 'Washington', NULL, 'Graduate', NULL, 'Students come to Whitworth University not just to be taught, but to learn. They come for an education. And we recognize that a sound education is not limited to the classroom or to formal educational activities; there is another side to the curriculum. The student-life program is the \"other side\" of this educational process. It is an opportunity to deal with questions like these: \"Who am I, and what are my gifts?\" \"How do I develop durable, trustworthy relationships?\" \"How do I grow spiritually, and how can I find ways to express my faith in service to others?\"', 1, 0, '2023-04-29 06:40:57', '2023-04-29 06:40:57', NULL, NULL),
(43, 'University Of Charleston', 'university-of-charleston', NULL, 232, NULL, NULL, 'West Virginia', NULL, 'Graduate', NULL, 'Since 1888, the University of Charleston has grown and expanded to meet the educational needs of students from across the nation and around the world. The University of Charleston is an independent, co-educational residential university with two principal locations in West Virginia � the main campus in the state capital of Charleston and the second location in Beckley. The university also has a strong online presence.\r\n\r\nUC was founded in 1888 as Barboursville Seminary. In 1901, the school was renamed Morris Harvey College and in 1947 moved to its present location. In 1978, Morris Harvey became the University of Charleston.\r\n\r\nWe are Charleston�s University not just because our riverfront location is directly across from the WV state capitol complex and the city of Charleston, but because UC students are welcomed as part of the community. Students can take advantage of all our location offers, including opportunities for internships and community service.\r\n\r\nOur history is rich with interesting milestones (the campus buildings were literally ferried across the river to our current location in 1947, for example). Our mission is one of preparation for a lifetime of striving to do more and do better. And our leadership provides a strong vision for making UC the best it can be for its students, faculty and staff, and surrounding community.', 1, 0, '2023-04-29 06:42:17', '2023-04-29 06:42:17', NULL, NULL),
(44, 'Toronto International College', 'toronto-international-college', NULL, 253, 7, 3, 'Toronto', NULL, 'Graduate', NULL, 'Started in 2000, The Toronto International College (TIC) is a leading private school situated in the provincial capital city of Ontario. The institution is registered with the Ontario Ministry of Education which allows the school to grant credits and diplomas to its students. The institute offers higher secondary school (9-12 grade) education to nurture and prepare its students for future challenges. The school provides students with a multicultural learning experience and it boasts of having a modern infrastructure with highly qualified, domain-expert teachers. TIC offers quality ESL (English as a Second Language), EAP (English for Academic Purpose), UP (University Preparation), GP (Graduate Preparation), AP (Advanced Placement Program), IELTS, and Pathway programs to both domestic and international students. TIC provides its students with both school residences (subject to availability) and homestay services. The college also offers full CAD$ 4000 and partial CAD$2000 or CAD$1000 scholarships to its students. This is offered to those candidates who are registered in a 1-year course at TIC and have minimum 85% GPA.', 1, 0, '2023-04-29 06:44:26', '2023-04-29 06:45:58', NULL, NULL),
(45, 'Beacon School', 'beacon-school', NULL, 253, NULL, NULL, 'Mississauga', NULL, 'Graduate', NULL, 'Since 2003 Beaconhouse has operated Ministry of Education inspected high schools focused on helping students obtain the Ontario high school credits they need for their Ontario Secondary School Diploma (OSSD). Our founders’ vision was to provide an alternate school to students offering a small classroom setting.  Working with small groups of students, we have been successful in enabling them to meet the high expectations of admissions into the best universities and colleges. We specialize in helping students get the university and college offers they seek. How do we do this? Our students have success in getting university offers because we provide the flexibility and choice they need. Students can choose to study part-time or full time with us with small, flexible classes and the focused assistance required to excel academically.', 1, 0, '2023-04-29 06:45:43', '2023-04-29 06:45:43', NULL, NULL),
(46, 'Rutherford Private School', 'rutherford-private-school', NULL, 253, NULL, NULL, 'Toronto', NULL, 'Graduate', NULL, 'description', 1, 0, '2023-04-29 06:49:46', '2023-04-29 06:49:46', NULL, NULL),
(47, 'Academy Of Learning', 'academy-of-learning', NULL, 253, NULL, NULL, 'Toronto', NULL, 'Graduate', NULL, 'The secret of our students? success comes from training with Academy of Learning Career College?s exclusive Integrated Learning? System. Available only at Academy of Learning Career College, the Integrated Learning? System has helped our graduates successfully complete over one million training courses.To improve the lives of under-served students and the communities in which they live. Globally, our flexible, supportive environment empowers dedicated students to achieve their goals.', 1, 0, '2023-04-29 06:50:50', '2023-04-29 06:50:50', NULL, NULL),
(48, 'Toronto School Of Management', 'toronto-school-of-management', NULL, 253, NULL, NULL, 'Toronto', NULL, 'Graduate', NULL, 'Toronto School of Management (TSoM) is an innovative college offering a broad range of career-focused programs in business, hospitality and tourism, big data, cybersecurity and accounting. We provide relevant programs which ensure our students meet the demands of today?s ever-changing job market.', 1, 0, '2023-04-29 06:51:38', '2023-04-29 06:51:38', NULL, NULL),
(49, 'Vocational Learning College', 'vocational-learning-college', NULL, 253, NULL, NULL, 'lavel', NULL, 'Graduate', NULL, 'description', 1, 0, '2023-04-29 06:53:08', '2023-04-29 06:53:08', NULL, NULL),
(50, 'Veritas College', 'veritas-college', NULL, 253, NULL, NULL, 'Quebec', NULL, 'Graduate', NULL, 'Veritas College International (VCI) offers three different kinds of programs that cover different levels of needs in ministry training:\r\n\r\nFoundation courses are starting points for ordinary church members, ministry leaders or pastors to learn how to interpret the Bible and apply it in their local ministry. They lead to higher skills in practical ministry. These programs are offered by members of the VCI network around the world.\r\n\r\nThe range of certificate and diploma programs go from introductory to graduate level. These programs are administered from Perth, Western Australia, where they have government accreditation.\r\n\r\nDegree programs include the Master of Arts in Biblical Ministry, M.Div and Doctor of Ministry. These programs are administered from VCI Graduate School in San Antonio, Texas, United States of America.', 1, 0, '2023-04-29 06:54:16', '2023-04-29 06:54:16', NULL, NULL),
(51, 'Taylor Pro Training', 'taylor-pro-training', NULL, 253, NULL, NULL, 'Kelowna', NULL, 'Graduate', NULL, 'Since 2003, Taylor Pro Training has been providing exceptional training to students throughout the Okanagan Valley. It takes pride in its formidable lineup of Driver Training programs and academic courses developed with painstaking care, expertise, and being closely attuned to the steadily growing market demand.\r\n\r\nEducation at Taylor Pro is employment-focused, meaning it helps you build a steady career from day one of studying with us.\r\n\r\nAside from driver training and training packages for instructors and employers, Taylor Pro Training also offers diploma courses in Addictions and Community Support, Social Services Support, Business Administration, Office Administration, Hospitality Management, and a Certificate Course in Hospitality and Management. \r\n\r\nTaylor Pro Training believes that studying with them allows the students to enter a niche or specialized focused area in the workforce.\r\n\r\nAside from that, the students will also benefit from smaller classes that allows for dedicated mentoring.\r\n\r\nTaylor Pro Training\'s program offerings open doors for a career in the trades and other in-demand industries.', 1, 0, '2023-04-29 06:55:48', '2023-04-29 06:55:48', NULL, NULL),
(52, 'Selkirk College', 'selkirk-college', NULL, 253, NULL, NULL, 'Castlegar', NULL, 'Graduate', NULL, 'At Selkirk College, with classrooms and communities nestled within the welcoming West Kootenay and Boundary regions of British Columbia, students feel like home.\r\n\r\nSince 1966, Selkirk College has been providing innovative and unique learning opportunities through 60+ nationally recognized programs. Selkirk International is committed to welcoming students from around the world and providing opportunities for all Selkirk College students to have an international experience as a part of their studies.\r\n\r\nAt Selkirk College, Canadian and international students study side by side in over 60 different programs. Selkirk College is located in the Kootenays, a spectacular region of rivers, lakes, waterfalls, beaches, mineral hot springs, alpine meadows, and snow-capped mountains that is home to four of British Columbia\'s seven national parks.', 1, 0, '2023-04-29 06:57:54', '2023-04-29 06:57:54', NULL, NULL),
(53, 'Q College', 'q-college', NULL, 253, NULL, NULL, 'Victoria', NULL, 'Graduate', NULL, 'Q College offers courses that are designed to provide the skills necessary to succeed in an evolving landscape. Its programs may either be taught full-time or part-time and can also be tailored with flexible scheduling at the campus or at your place.\r\n\r\nIt is Q College’s mission to maintain a high quality standard which is important for the students’ future success. It continues to develop innovative and flexible educational approaches to serve the needs of its students.\r\n\r\nIts instructors are some of the best in their fields and currently work in the industry. All courses are 100% instructor-led, with incredibly small class sizes and a practical, hands-on approach to learning. It cares about our students’ success, and its unique and effective approach to learning speaks for itself.', 1, 0, '2023-04-29 06:59:03', '2023-04-29 06:59:03', NULL, NULL),
(54, 'Parkland College', 'parkland-college', NULL, 253, NULL, NULL, 'Saskatchewan', NULL, 'Graduate', NULL, 'The Parkland College was founded by the Province of Saskatchewan in 1971 as Parkland Regional College (1973-2008). It was renamed Parkland College (2008). The college primarily serves the education and training needs of communities and industry partners in east central Saskatchewan and western Manitoba. The college is in a coalition with Cumberland College (Saskatchewan), which is located in Northeast Saskatchewan. Parkland College offers adult basic education (ABE) and work essential skills training; college programming (business and industry; health care; computer training; general interest); and university programming. The college provides career counselling to students and other support services to help them be successful.', 1, 0, '2023-04-29 07:00:08', '2023-04-29 07:00:08', NULL, NULL),
(55, 'Northern Lights College', 'northern-lights-college', NULL, 253, NULL, NULL, 'British Columbia', NULL, 'Graduate', NULL, 'Northern Lights College serves an area covering more than 324,000 square kilometres in northern British Columbia.\r\n\r\nNLC opened in 1975, and has campus locations in Chetwynd, Dawson Creek, Fort Nelson, Fort St. John, and Tumbler Ridge, along with access centres in Atlin and Dease Lake.\r\n\r\nNLC is a member of British Columbia Colleges (BC Colleges), a provincial group comprised of 11 colleges from throughout the Province of British Columbia. BC Colleges has a unique regional advantage and a long history of collaboration with industry, employers, communities and policy makers. This collaborative approach allows BC Colleges to graduate highly skilled workers who are equipped to support their families, build healthier communities and power the economy in all regions of British Columbia.', 1, 0, '2023-04-29 07:01:32', '2023-04-29 07:01:32', NULL, NULL),
(56, 'Multihexa College', 'multihexa-college', NULL, 253, NULL, NULL, 'Quebec', NULL, 'Graduate', NULL, 'Multihexa has trained thousands of students, especially in the field of IT and technology. Since its founding in 1986, Multihexa College has produced 5,000 graduates throughout Quebec.\r\n\r\nMultihexa College assures interested students of its hands-on training for work-based skills development. The College is located in a building in which 10 companies operate in IT including the multinational CGI. It is the largest concentration of IT companies in Saguenay and one of the largest in Quebec. In order to provide the best services to their clients, these companies hire more than 1,000 people.\r\n\r\nThis allows Multihexa College to provide quality internships to students and a very strong job opportunity.\r\n\r\nThe two courses it offers can be accomplished for 1 to 2 years and affords flexibility in IT training and even basic French-language education since the campus is located in a French-speaking region.\r\n\r\nIts value proposition is:\r\n\r\nHands-on training for work-based skills development\r\nThe best teachers in the industry sharing their expertise in the field\r\nAffordable price, meaning more value for the money invested\r\nPrograms approved by the Quebec Ministry of Education\r\nHigher Education guarantees greater competence', 1, 0, '2023-04-29 07:02:33', '2023-04-29 07:02:33', NULL, NULL),
(57, 'Matrix College', 'matrix-college', NULL, 253, NULL, NULL, 'Montreal', NULL, 'Graduate', NULL, 'Matrix College is a licensed private college offering specialized post-secondary level programs in Business and Technology. It offers an extensive array of vendor-authorized and vendor-independent IT training in-demand courses like SAP, Cisco, and VMware certifications. The college is committed to make sure that every student has a quality educational experience at an affordable price. All efforts are focused on the success and satisfaction of students.Matrix College back up their training with a 100% Student Satisfaction Guarantee. When students select courses from Matrix College, they are assured of the best possible learning experience with the best instructors in the industry.Montreal is located the beautiful province of Quebec, Canada\'s hidden gem. It\'s a vibrant and multicultural city that blends North American modernity and European charm. Montreal boasts of being a bilingual city, where both French and English are used interchangeably.', 1, 0, '2023-04-29 07:10:24', '2023-04-29 07:10:24', NULL, NULL),
(58, 'Lester B Pearson United World College', 'lester-b-pearson-united-world-college', NULL, 253, NULL, NULL, 'British Columbia', NULL, 'Graduate', NULL, 'Pearson College UWC is located southwest of Victoria, B.C. and is Canada’s most international school and the country’s only United World College — a movement encompassing 18 global schools dedicated to uniting cultures and countries around the world through education. Pearson is a two-year, pre-university school for students from over 150 countries who live, study and learn together pursuing the International Baccalaureate and an outdoor-oriented experiential education. More than 4,200 students have graduated from the College — its alumni are determined to make a difference in the lives of others and the world.\r\n\r\nThe College was named in honor of the late Canadian Prime Minister and Canada’s only Nobel Peace Laureate (awarded in 1957), Lester B. Pearson. Prime Minister Pearson initiated the work to found a United World College “of the Pacific” as a way of extending the promotion of peace and understanding in the world. Modern workshops and laboratories are among the amenities at Pearson Electrotechnology Centre that give students the chance to gain practical, hands-on experience.', 1, 0, '2023-04-29 07:11:15', '2023-04-29 07:11:15', NULL, NULL),
(59, 'Lakeland College', 'lakeland-college', NULL, 253, NULL, NULL, 'Vermilion', NULL, 'Graduate', NULL, 'Lakeland College was opened in 1913 with only 34 students enrolled. Today, it has campuses in Vermilion and Lloydminster, with over 60 programs, and more than 7,000 full-time and part-time students - but Lakeland is as tight-knit as ever.\r\n\r\nThe reason for Lakeland’s success is its people-centred culture. Lakeland College\'s mission is to inspire lifelong learning and leadership through experience, excellence, and innovation and our vision is to transform the future through innovative learning. Lakeland\'s values include learner success, integrity, respect, community, excellence, and innovation.\r\n\r\nAt Lakeland College:\r\n\r\nStudents are supported and engaged with their learning and, as a result, are better prepared for the labour market or further learning.\r\nStudents have access to training that strongly aligns with labour market needs. Research efforts support economic innovation.\r\nLakeland ensures that all resources are in place to engage community partners in educational pursuits and to provide information to prospective, current, and past students.\r\nLakeland ensures that all resources (staff, budget, and infrastructure) are focused on providing a stable and meaningful learning experience for students.', 1, 0, '2023-04-29 07:12:54', '2023-04-29 07:12:54', NULL, NULL),
(60, 'Great Plains College', 'great-plains-college', NULL, 253, NULL, NULL, 'Saskatchewan', NULL, 'Graduate', NULL, 'Great Plains College is at the leading edge of Saskatchewan’s regional college system. The college is focused on meeting the needs of learners, employers and communities in western Saskatchewan. We are working to build stronger leaders, careers, partnerships and communities. Our decentralized campuses are located in Kindersley, Swift Current and Warman with additional programming at locations in Biggar, Maple Creek and Martensville. Throughout our locations, we offer a number of post-secondary certificate, diploma and degree programs as well as university courses, safety training, Adult Basic Education and English language training. The college strives to provide for the distinct needs of our service area by challenging everyone to continually build a responsive, innovative and results-orientated institution. Great Plains College was the first regional college in Saskatchewan to introduce a health and dental plan for its students and also proudly boasts one of the strongest scholarship programs in the province.', 1, 0, '2023-04-29 07:19:39', '2023-04-29 07:19:39', NULL, NULL),
(61, 'Granville College', 'granville-college', NULL, 253, NULL, NULL, 'British Columbia', NULL, 'Graduate', NULL, 'Granville College is registered and designated by the Private Training Institutions Branch (PTIB) of British Columbia.\r\nThrough the process, the institution and its Diploma Program are evaluated and recognized for quality assurance and, if successful, the institution is awarded a designation certificate. As a result, students can be confident that an institution and its educational Diploma Program meet criteria and standards established by the PTIB. Granville College meets the PTIB college designation standards.', 1, 0, '2023-04-29 07:20:42', '2023-04-29 07:20:42', NULL, NULL),
(62, 'Flair College Of Management And Technology', 'flair-college-of-management-and-technology', NULL, 253, NULL, NULL, 'Ontario', NULL, 'Graduate', NULL, 'description', 1, 0, '2023-04-29 07:21:57', '2023-04-29 07:21:57', NULL, NULL),
(63, 'Eton College', 'eton-college', NULL, 253, NULL, NULL, 'Vancouver', NULL, 'Graduate', NULL, 'Noted for its excellence in training and student outcome, Eton College Canada is a specialist in Business Management, Tourism Management, Hospitality Management, Flight Attendant Preparation, and Communication training for students seeking professional careers and/or advanced education in these areas. \r\n\r\nMany of Eton College’s graduates have successfully transitioned into steady careers with top employer brands in Tourism, Hospitality, and Business in Canada and abroad. Our graduates are also eligible to transfer their credits earned at Eton to reputable colleges and universities in Canada and around the world.\r\n\r\nOur main campus is centrally located in spectacular Vancouver, British Columbia, close to the Olympic Village and the scenic surroundings of False Creek.\r\n\r\nEton College Canada’s designation with the Private Training Institutions Branch (PTIB) of British Columbia and its Education Quality Assurance designation by the Province of British Columbia (BC EQA) make it a primary choice for post-secondary institution career and academic studies. Its hallmark of success is outstanding student care, a nurturing and respectful multicultural learning environment, a highly qualified team of instructors and staff, and programs that meet the highest accreditation standards.', 1, 0, '2023-04-29 07:22:56', '2023-04-29 07:22:56', NULL, NULL),
(64, 'Cumberland College', 'cumberland-college', NULL, 253, NULL, NULL, 'Saskatchewan', NULL, 'Graduate', NULL, 'Cumberland College is a post-secondary college based in Nipawin, Saskatchewan. The college, established in 1975, provides training for the community of Northeast Saskatchewan. Cumberland College’s main campus is in Nipawin, with other campuses located in Melfort, Tisdale, and Hudson Bay. Cumberland College is affiliated with the University of Saskatchewan and the University of Regina.\r\n\r\nThrough this partnership, the college offers a number of university courses. Cumberland College also offers a variety of skills training programs and high school courses to help prepare students for the labour market or for future opportunities.\r\n\r\nThe college’s mission is to provide lifelong learning opportunities to its students and community through networks of partners. The school values innovation and ethical stewardship and strives to create a learning environment that is accessible, focused on learning, and engages the Saskatchewan community as a whole.', 1, 0, '2023-04-29 07:24:11', '2023-04-29 07:24:11', NULL, NULL),
(65, 'College St.michel', 'college-stmichel', NULL, 253, NULL, NULL, 'Quebec', NULL, 'Graduate', NULL, 'Flair College believes in honoring the legacy of innovation and creativity: delivering relevant programs in high de-mend career pathways. Flair College has been a pioneer and a leader in the regional Culinary Arts training Industry and has ventured successfully into the training of Business Studies, Language training and is continuously growing to add on the programs that will address the need of affordable comprehensive college experience with opportunity of development of the mind, body and spirit in an inclusive atmosphere providing world-class hands-on experiential learning experience in a caring, supportive and nurturing environment. Flair College is registered as a private career college under the private career colleges act, 2005 and each of its pro-grams is approved as a vocational program abiding by provincial regulations. Flair College is one of the very few colleges in GTA which offers practice focused environment to its learners. Flair College offers a blend of theoretical and experiential learnings where students gain the skills and knowledge re-quire for a successful career in today’s business world. The success of the students of FCMT comes from outstanding instructions, personal attention, and commitment to excellence. At Flair College, we are extremely passionate about providing expertly trained graduates for the rapidly growing Business skills, food and hospitality industry worldwide. Some of the absolute advantages of learning at Flair College are small class sizes, dedicated, passionate and internationally trained Chef and Business instructors, a delicate blend of theory and hands-on professional training etc.Our students have another comparative advantage of studying in a heterogeneous learning environment where lo-Cal and international students share their passion for subjects through celebrating diversity and amalgamation of different cultures, which is very important for the world industry landscape.', 1, 0, '2023-04-29 07:25:35', '2023-04-29 07:25:35', NULL, NULL),
(68, 'College Avalon', 'college-avalon', NULL, 253, NULL, NULL, 'Quebec', NULL, 'Graduate', NULL, 'Avalon College, established in 1995, has two campuses, one in Quebec City and the other in Montreal, both cities being home to major university centers, leading colleges and innovative companies.Our team has years of experience in education and demonstrates exceptional leadership in helping students succeed in the business world.Building on 25 years of experience and success, College Avalon has expanded its service offerings to include corporate training specifically designed to foster personal growth and employability in a rapidly changing world.', 1, 0, '2023-04-29 07:47:10', '2023-04-29 07:47:10', NULL, NULL),
(69, 'Coast Mountain College', 'coast-mountain-college', NULL, 253, NULL, NULL, 'Terrace', NULL, 'Graduate', NULL, 'Coast Mountain College (previously known as Northwest Community College) is a publicly funded, government accredited, public post-secondary educational institution. Founded in 1975, the College serves 11 communities in the spectacularly beautiful Northwestern region of British Columbia, Canada. It is a student-centred college offering a full range of academic degree, diploma, and certificate programmes in Arts, Business, Health, and Science for international students—all of which provide excellent exposure to Canadian life and culture.\r\n\r\nIt is also known to offer:\r\n\r\nQuality instruction \r\nTransfer credits to university programmes\r\nSmall class sizes and individual attention\r\nExposure to Canadian life and culture\r\nEasy transfer from language training to other post-secondary programmes\r\nCombined English language/career programmes available for groups of 12 or more students\r\nIn as little as two years, students can complete an associate degree in Arts or Science. For those who wish to continue their studies, all associate degree courses are equivalent to university courses and can be transferred to other post-secondary institutions.\r\n\r\nBusiness Administration one-year certificate and two-year diploma programmes offer well-rounded business education and a solid background for a wide range of professional career choices and further educational opportunities.\r\n\r\nThe Applied Coastal Ecology programme delivers the applied biological & ecological skills needed to work in coastal ecosystems.\r\n\r\nWith many options of programmes, Coast Mountain College provides quality learning experiences that help prepare students for a successful future.', 1, 0, '2023-04-29 07:48:46', '2023-04-29 07:48:46', NULL, NULL),
(67, 'College National', 'college-national', NULL, 253, NULL, NULL, 'Quebec', NULL, 'Graduate', NULL, 'College National de Science et Technologie (College National of Science and Technology) is a private college located in Montreal, the largest city in the Canadian province of Quebec., established in 2019 and recognized by the Quebec Ministry of Education as: DLI O266212673772\r\nThe college?s mission is to provide quality post-secondary education to local and international students; to prepare them for successful careers; to help and nurture them to reach their full potential.', 1, 0, '2023-04-29 07:26:39', '2023-04-29 07:26:39', NULL, NULL);
INSERT INTO `colleges` (`id`, `name`, `slug`, `image`, `country_id`, `state_id`, `city_id`, `campus`, `intake`, `level_of_edu`, `application_fee`, `description`, `status`, `is_featured`, `created_at`, `updated_at`, `created_by`, `created_by_name`) VALUES
(70, 'Cegep Marie-victorin', 'cegep-marie-victorin', NULL, 253, NULL, NULL, 'Quebec', NULL, 'Graduate', NULL, 'Coast Mountain College (previously known as Northwest Community College) is a publicly funded, government accredited, public post-secondary educational institution. Founded in 1975, the College serves 11 communities in the spectacularly beautiful Northwestern region of British Columbia, Canada. It is a student-centred college offering a full range of academic degree, diploma, and certificate programmes in Arts, Business, Health, and Science for international students—all of which provide excellent exposure to Canadian life and culture.\r\n\r\nIt is also known to offer:\r\n\r\nQuality instruction \r\nTransfer credits to university programmes\r\nSmall class sizes and individual attention\r\nExposure to Canadian life and culture\r\nEasy transfer from language training to other post-secondary programmes\r\nCombined English language/career programmes available for groups of 12 or more students\r\nIn as little as two years, students can complete an associate degree in Arts or Science. For those who wish to continue their studies, all associate degree courses are equivalent to university courses and can be transferred to other post-secondary institutions.\r\n\r\nBusiness Administration one-year certificate and two-year diploma programmes offer well-rounded business education and a solid background for a wide range of professional career choices and further educational opportunities.\r\n\r\nThe Applied Coastal Ecology programme delivers the applied biological & ecological skills needed to work in coastal ecosystems.\r\n\r\nWith many options of programmes, Coast Mountain College provides quality learning experiences that help prepare students for a successful future.', 1, 0, '2023-04-29 07:51:34', '2023-04-29 07:51:34', NULL, NULL),
(71, 'Cegep Gim-college', 'cegep-gim-college', NULL, 253, NULL, NULL, 'Quebec', NULL, 'Graduate', NULL, 'Located in Québec, a French-speaking province of Canada, the Cégep de la Gaspésie et des Îles is a bilingual (French and English) public institution of higher learning with a student population of approximately 3000. The Cegep’s slogan, \"study in a unique natural environment\", was chosen because 4 of its 5 campuses are located in a remote region named Gaspésie-Îles-de-la-Madeleine. It allows students to enjoy an exceptional natural setting. Indeed, according to National Geographic magazine, Gaspésie-Îles-de-la-Madeleine region is one of the top 20 destinations to visit in the world. Student success is an institutional priority. From day one of their college education, students have access to various academic support measures including personal academic counselling, a guidance service and teacher-student tutoring. A range of adapted services is also available for students with physical, sensory, neurological, or organic impairment; as well as those with learning disorders or mental health problems. These measures have helped our Cegep achieve a first semester success rate of 84.7% compared to the Quebec college average of 81%.', 1, 0, '2023-04-29 07:54:40', '2023-04-29 07:54:40', NULL, NULL),
(72, 'College Of The Rockies', 'college-of-the-rockies', NULL, 253, NULL, NULL, 'Cranbrook', NULL, 'Graduate', NULL, 'We serve a regional population of close to 83,000 people, guided by our Mission, Vision, and Values, and through the leadership of our President and Board of Governors. Each year, we provide instruction in a wide variety of programs to approximately 2100 full-time equivalent (FTE) students, including close to 200 international (FTE) students from more than 30 countries.\r\n\r\nOur commitment to providing relevant and quality education is unwavering. Our state of the art campuses and facilities are meeting the East Kootenay’s steadily growing demand for skilled workers and employees.\r\n\r\nCranbrook is home to two campuses: Our main campus houses the majority of our administrative departments and student services, and our Gold Creek campus offers a variety of trades programs.\r\n\r\nThe programs, courses, and services offered by our five regional campuses are as diverse as the communities and people they serve. A few have their own “signature” programs – something unique and special – and most provide courses in Adult Basic Education.\r\n\r\nAll of our campuses respond to the needs of their communities by offering continuing education courses and access to online learning.', 1, 0, '2023-04-29 07:58:31', '2023-04-29 07:58:31', NULL, NULL),
(73, 'Canadian College Of Technology & Business', 'canadian-college-of-technology-business', NULL, 253, NULL, NULL, 'Vancouver', NULL, 'Graduate', NULL, 'At the Canadian College of Technology and Business (CCTB), your success is our goal. Through our range of IT, hospitality and business-focused programs, we provide our students with the highest quality training, preparing them for a rewarding career in an increasingly digitalized world. The Canadian College of Technology and Business is an educational institution specializing in career development, certification and technical training in business and information systems. Our institute provides and upholds quality education and training of the highest standard based on trending in-demand skills and knowledge. We enable students to smoothly transition into IT and business industry and empower them to become successful professionals.', 1, 0, '2023-04-29 08:02:56', '2023-04-29 08:02:56', NULL, NULL),
(74, 'Canadian College', 'canadian-college', NULL, 253, NULL, NULL, 'British Columbia', NULL, 'Graduate', NULL, 'The Canadian College, which is located in the heart of Vancouver, offers several internationally recognized certificates and diplomas. It takes great pride in the services it does and the talented people who work with it. It is always looking for highly skilled, driven people who value a collaborative, open environment and a flexible, professional culture.', 1, 0, '2023-04-29 08:04:12', '2023-04-29 08:04:12', NULL, NULL),
(75, 'Cambria College', 'cambria-college', NULL, 253, NULL, NULL, 'Victoria', NULL, 'Graduate', NULL, 'The Canadian College, which is located in the heart of Vancouver, offers several internationally recognized certificates and diplomas. It takes great pride in the services it does and the talented people who work with it. It is always looking for highly skilled, driven people who value a collaborative, open environment and a flexible, professional culture.', 1, 0, '2023-04-29 08:07:22', '2023-04-29 08:07:22', NULL, NULL),
(76, 'Brescia University College', 'brescia-university-college', NULL, 253, NULL, NULL, 'Ontario', NULL, 'Graduate', NULL, 'Brescia University College is Canada’s only women’s university. The University was founded in 1919 by the Ursuline Sisters, strong women of faith committed to social justice, community service and the development of women. While our roots are in the Catholic faith, we are open to, and embrace, women of all faiths and backgrounds. For over a century, the university experience at Brescia challenges students to lead with wisdom, justice and compassion. The student-centered institution is committed to educating women through preparing its students for life-long leadership. Brescia has an average class size of 29 students, a 14:1 student/faculty ratio and an emphasis on academic excellence. Brescia is affiliated with Western University, the third-largest university in the province. Our students benefit from a small, supportive atmosphere at Brescia while having access to resources at Western. Upon graduation, students receive their degree from Western.', 1, 0, '2023-04-29 08:20:03', '2023-04-29 08:20:03', NULL, NULL),
(77, 'Avalon Community College', 'avalon-community-college', NULL, 253, NULL, NULL, 'Nanaimo', NULL, 'Graduate', NULL, 'We are excited to be opening a new community college on beautiful Vancouver Island in British Columbia, Canada. Please stay tuned for more information about our progress and about the programs we will be offering to students who wish to continue with their learning journey.', 1, 0, '2023-04-29 09:19:52', '2023-04-29 09:19:52', NULL, NULL),
(79, 'University Of Sasketchwan', 'university-of-sasketchwan', NULL, 253, NULL, NULL, 'Saskatchewan', NULL, 'Graduate', NULL, 'The University of Saskatchewan\'s (USask) main campus is located in the vibrant city of Saskatoon on Treaty 6 territory and the traditional homeland of the Métis.\r\n\r\nUSask is one of the top research-intensive, medical doctoral universities in Canada, and is home to world-leading research in areas of global importance, such as water and food security and infectious diseases. Study and discovery is enhanced by our outstanding facilities, including the Canadian Light Source synchrotron, VIDO-InterVac, the Global Institute for Food Security, the Global Institute for Water Security and the Sylvia Fedoruk Canadian Centre for Nuclear Innovation.', 1, 0, '2023-04-29 09:51:16', '2023-04-29 09:51:16', NULL, NULL),
(80, 'Providence University', 'providence-university', NULL, 253, NULL, NULL, 'Outterburne', NULL, 'Graduate', NULL, 'A Christian academic community in the evangelical tradition, Providence teaches people to grow in knowledge and character for leadership and service. To be identified among Canada’s foremost Christian universities as a learning community that transforms students into leaders of character, knowledge, and faith, to serve Christ in a changing world. We are working to achieve academic excellence and to offer our students the best educational experience possible. We have set in place processes to continually examine and improve our programming and reporting and will continue our efforts in the areas of institutional assessment, institutional research, and accreditation. At Providence, we value Christ first, diversity of thought, community, exploration, and academic excellence.', 1, 0, '2023-04-29 09:52:13', '2023-04-29 09:52:13', NULL, NULL),
(81, 'Trinity Western University', 'trinity-western-university', NULL, 253, NULL, NULL, 'Langley Township', NULL, 'Graduate', NULL, 'Founded in 1962 by dedicated people with an extraordinary vision, Trinity Western University (TWU) has grown over the years to become Canada?s premier Christian university and the largest liberal arts university in the country.Everything we do is rooted in our commitment to providing a whole-person education?one that develops godly Christian leaders who will find and fulfill their purpose in life and use their future careers to create lasting positive change in the world around them.In addition to robust academic programs, we have always strived to provide the kind of nurturing campus community, life-changing service and research opportunities, unforgettable friendships, and meaningful faith explorations that will shape students in ways they never could have imagined. Trinity Western is chartered by the Province of British Columbia to grant baccalaureate, master?s, and doctoral degrees. TWU offers 48 undergraduate degrees and 19 graduate degrees, including programs in business administration, nursing, counselling psychology, education, computing science, theology, and many more. We also offer continuing education, degree completion, and leadership development through our certificate and online learning programs. No matter what program you choose, our chief goal is to support, inspire, and equip you for success and personal growth.Our mission is to develop godly Christian leaders: positive, goal-oriented university graduates with thoroughly Christian minds; growing disciples of Jesus Christ who glorify God through fulfilling the Great Commission, serving God and people in the various marketplaces of life. We?re passionately committed to helping you discover how to be fully and faithfully present in the world and to play a vital role in God?s work of healing, hope, and renewal.', 1, 0, '2023-04-29 09:57:38', '2023-04-29 09:57:38', NULL, NULL),
(82, 'University Of Northern British Columbia', 'university-of-northern-british-columbia', NULL, 253, NULL, NULL, 'Prince George', NULL, 'Graduate', NULL, 'Located in the spectacular landscape of northern British Columbia, UNBC is one of Canada’s best small universities. We have a passion for teaching, discovery, people, the environment, and the North. UNBC provides outstanding undergraduate and graduate learning opportunities that explore cultures, health, economies, sciences, and the environment. As one of BC’s research-intensive universities, we bring the excitement of new knowledge to our students, and the outcomes of our teaching and research to the world. In addition to fostering and celebrating academic excellence, UNBC is a welcoming place, with a learning environment that is friendly, inclusive, and supportive. UNBC is a university both in and for the North. This mission has instilled a strong sense of ownership, purpose, and adventure among our students, alumni, faculty, staff, and the communities we serve. We are also Canada’s Green University™, leading the way to a more sustainable future for all.', 1, 0, '2023-04-29 09:59:22', '2023-04-29 09:59:22', NULL, NULL),
(83, 'St. Thomas University', 'st-thomas-university', NULL, 253, NULL, NULL, 'Fredericton', NULL, 'Graduate', NULL, 'We believe smaller is better. Our small size is the reason we are able to give each one of our students a big university experience full of opportunity.\r\n\r\nLocated in Fredericton, New Brunswick, St. Thomas University is a small, primarily undergraduate university dedicated to excellence in liberal arts education.\r\n\r\nThe origin of St. Thomas University dates back to 1910. At that time, the Most Reverend Thomas F. Barry, Bishop of Chatham, invited the Basilian Fathers of Toronto to assume charge of an institution in Chatham, New Brunswick, providing education for boys at the secondary and junior college levels. The institution was called St. Thomas College.\r\n\r\nThe Basilian Fathers remained at St. Thomas until 1923. That year the school was placed under the direction of the clergy of the Diocese of Chatham. In 1938, the Diocese of Chatham became the Diocese of Bathurst. In 1959, a section of Northumberland County, including within its territorial limits St. Thomas College, was transferred from the Diocese of Bathurst to the Diocese of Saint John.\r\n\r\nFrom 1910 until 1934, St. Thomas College retained its original status as a High School and Junior College. It became a degree-granting institution upon receipt of a University Charter on March 9, 1934.', 1, 0, '2023-04-29 10:01:09', '2023-04-29 10:01:09', NULL, NULL),
(84, 'Nipissing University', 'nipissing-university', NULL, 253, NULL, NULL, 'North bay', NULL, 'Graduate', NULL, 'While the roots of Nipissing University extend back to the 1900s with the North Bay Normal School, Nipissing University College was formed in 1967 as an affiliate of Laurentian University. Nipissing University received its charter as an independent University in 1992. \r\n\r\nToday, Nipissing is proud to be a primarily undergraduate university with a reputation for excellence in teacher education, arts, science and professional programs. Students will find themselves in a high-quality academic environment that is student-focused and based on personal teaching practices, innovative approaches to learning, and a growing research culture.\r\n\r\nNipissing is committed to playing a positive role in the educational, social, cultural, and economic life in all of the communities it serves.', 1, 0, '2023-04-29 10:02:14', '2023-04-29 10:02:14', NULL, NULL),
(85, 'Crandall University', 'crandall-university', NULL, 253, NULL, NULL, 'Moncton', NULL, 'Graduate', NULL, 'Welcome to Crandall University! I graduated from Crandall in the 1980s and my years at Crandall profoundly shaped me, encouraged me, and prepared me for a career and a life of service.\r\n\r\nIn spite of our growing number of students from Canada, online, and around the world, at Crandall we work hard to make sure that we preserve a sense of family for our students. At many of the larger universities in Canada, classrooms are filled with hundreds of students. At Crandall our classes are small; you get to know your professors, who are able to guide you through your program as you prepare for advanced study or your career.\r\n\r\nWe’ve worked hard to recruit excellent professors. Our instructors have earned advanced degrees at some of the world’s most prestigious research universities including Notre Dame, Columbia, and Harvard in the US; Toronto, UBC, McMaster, Western, and Queens in Canada; and a variety of universities in the UK including Oxford, Durham, St. Andrew’s, and Wales. Our professors have traveled and lectured widely. They have published extensively, and have worked in some pretty exciting roles prior to joining our team.\r\n\r\nCrandall’s mission is to “transform lives through quality university education firmly rooted in the Christian faith.” We’ve been able to achieve this mission largely as a result of our ability to attract highly-qualified Christian faculty and staff. They are fantastic; you will love them and they will love you too!\r\n\r\nI hope that you will contact our Admissions Office and set up a date to visit our beautiful campus. I’m confident you’ll be impressed by the quality educational and community experience we offer – both inside and outside the classroom. I look forward to meeting you!', 1, 0, '2023-04-29 10:03:26', '2023-04-29 10:03:26', NULL, NULL),
(86, 'University Canada West', 'university-canada-west', NULL, 253, NULL, NULL, 'Vancouver', NULL, 'Graduate', NULL, 'University Canada West is a contemporary independent university located in the heart of vibrant Vancouver. Established in 2004, UCW offers a range of career-focused programs including the Bachelor of Commerce, Bachelor of Arts in Business Communication, Associate of Arts and Master of Business Administration. Courses are offered at our downtown Vancouver campus and online too. Offering courses online brings flexibility to education, allowing those who may not have otherwise had the opportunity to gain respected qualifications.', 1, 0, '2023-04-29 10:05:14', '2023-04-29 10:05:14', NULL, NULL),
(87, 'mark champman', 'mark champman', NULL, 5, 7, 5, 'campus', '9/29/2023', 'matric', '10/3/1954', 'nothing', 1, 1, '2023-05-10 08:26:53', '2023-05-10 08:26:53', NULL, NULL),
(88, 'mark champman', 'mark champman', NULL, 5, 7, 5, 'campus', '9/29/2023', 'matric', '10/3/1954', 'nothing', 1, 1, '2023-05-10 08:28:19', '2023-05-10 08:28:19', NULL, NULL),
(89, 'mark champman', 'mark champman', NULL, 5, 7, 5, 'campus', '9/29/2023', 'matric', '20000', 'nothing', 1, 1, '2023-05-10 09:05:30', '2023-05-10 09:05:30', NULL, NULL),
(90, 'Erich Lynn', 'erich-lynn', 'uploads/college/1683889443-img.png', 25, 1, 3, 'Ut temporibus repreh', 'Ipsum fugiat est', 'Rem sit veniam har', 'Asperiores adipisici', 'Dicta laboriosam qu', 1, 1, '2023-05-12 11:04:03', '2023-05-12 11:04:03', NULL, NULL),
(91, 'mark champman', 'mark champman', NULL, 5, 7, 5, 'campus', '9/29/2023', 'matric', '20000', 'nothing', 1, 1, '2023-05-12 11:43:43', '2023-05-12 11:43:43', 1, 'Mr Mithun Gupta'),
(92, 'Keiko Tyson', 'keiko-tyson', 'uploads/college/1683923030-img.png', 105, 2, 3, 'Dolorum perferendis', '1977-12-21', 'Et vel vero veniam', 'Obcaecati accusantiu', 'Enim qui sit maxime', 1, 1, '2023-05-12 20:23:50', '2023-05-12 20:23:50', 132, 'Pratt and Spears Trading'),
(93, 'mark champman', 'mark champman', NULL, 5, 7, 5, 'campus', '9/29/2023', 'matric', '20000', 'nothing', 1, 1, '2023-05-13 19:30:41', '2023-05-13 19:30:41', 132, 'Pratt and Spears Trading');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', 'afghanistan', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(2, 'Albania', 'albania', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(3, 'Algeria', 'algeria', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(4, 'American Samoa', 'american-samoa', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(5, 'Andorra', 'andorra', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(6, 'Angola', 'angola', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(7, 'Anguilla', 'anguilla', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(8, 'Antarctica', 'antarctica', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(9, 'Antigua and Barbuda', 'antigua-and-barbuda', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(10, 'Argentina', 'argentina', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(11, 'Armenia', 'armenia', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(12, 'Aruba', 'aruba', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(14, 'Austria', 'austria', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(15, 'Azerbaijan', 'azerbaijan', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(16, 'Bahamas', 'bahamas', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(17, 'Bahrain', 'bahrain', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(19, 'Barbados', 'barbados', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(20, 'Belarus', 'belarus', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(22, 'Belize', 'belize', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(23, 'Benin', 'benin', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(24, 'Bermuda', 'bermuda', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(25, 'Bhutan', 'bhutan', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(26, 'Bolivia', 'bolivia', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(27, 'Bosnia and Herzegovina', 'bosnia-and-herzegovina', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(28, 'Botswana', 'botswana', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(29, 'Bouvet Island', 'bouvet-island', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(30, 'Brazil', 'brazil', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(31, 'British Indian Ocean Territory', 'british-indian-ocean-territory', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(32, 'Brunei Darussalam', 'brunei-darussalam', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(33, 'Bulgaria', 'bulgaria', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(34, 'Burkina Faso', 'burkina-faso', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(35, 'Burundi', 'burundi', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(37, 'Cameroon', 'cameroon', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(39, 'Cape Verde', 'cape-verde', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(40, 'Cayman Islands', 'cayman-islands', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(41, 'Central African Republic', 'central-african-republic', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(42, 'Chad', 'chad', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(43, 'Chile', 'chile', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(44, 'China', 'china', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(45, 'Christmas Island', 'christmas-island', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(46, 'Cocos (Keeling) Islands', 'cocos-keeling-islands', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(47, 'Colombia', 'colombia', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(48, 'Comoros', 'comoros', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(49, 'Democratic Republic of the Congo', 'democratic-republic-of-the-congo', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(50, 'Republic of Congo', 'republic-of-congo', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(51, 'Cook Islands', 'cook-islands', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(52, 'Costa Rica', 'costa-rica', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(53, 'Croatia (Hrvatska)', 'croatia-hrvatska', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(54, 'Cuba', 'cuba', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(55, 'Cyprus', 'cyprus', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(58, 'Djibouti', 'djibouti', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(59, 'Dominica', 'dominica', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(60, 'Dominican Republic', 'dominican-republic', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(61, 'East Timor', 'east-timor', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(62, 'Ecuador', 'ecuador', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(64, 'El Salvador', 'el-salvador', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(65, 'Equatorial Guinea', 'equatorial-guinea', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(66, 'Eritrea', 'eritrea', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(67, 'Estonia', 'estonia', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(68, 'Ethiopia', 'ethiopia', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(69, 'Falkland Islands (Malvinas)', 'falkland-islands-malvinas', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(70, 'Faroe Islands', 'faroe-islands', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(71, 'Fiji', 'fiji', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(74, 'France, Metropolitan', 'france-metropolitan', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(75, 'French Guiana', 'french-guiana', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(76, 'French Polynesia', 'french-polynesia', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(77, 'French Southern Territories', 'french-southern-territories', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(78, 'Gabon', 'gabon', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(79, 'Gambia', 'gambia', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(80, 'Georgia', 'georgia', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(82, 'Ghana', 'ghana', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(83, 'Gibraltar', 'gibraltar', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(84, 'Guernsey', 'guernsey', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(86, 'Greenland', 'greenland', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(87, 'Grenada', 'grenada', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(88, 'Guadeloupe', 'guadeloupe', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(89, 'Guam', 'guam', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(90, 'Guatemala', 'guatemala', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(91, 'Guinea', 'guinea', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(92, 'Guinea-Bissau', 'guinea-bissau', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(93, 'Guyana', 'guyana', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(94, 'Haiti', 'haiti', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(95, 'Heard and Mc Donald Islands', 'heard-and-mc-donald-islands', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(96, 'Honduras', 'honduras', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(101, 'Isle of Man', 'isle-of-man', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(102, 'Indonesia', 'indonesia', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(103, 'Iran (Islamic Republic of)', 'iran-islamic-republic-of', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(104, 'Iraq', 'iraq', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(105, 'Ireland', 'ireland', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(106, 'Israel', 'israel', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(108, 'Ivory Coast', 'ivory-coast', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(109, 'Jersey', 'jersey', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(110, 'Jamaica', 'jamaica', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(112, 'Jordan', 'jordan', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(113, 'Kazakhstan', 'kazakhstan', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(114, 'Kenya', 'kenya', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(115, 'Kiribati', 'kiribati', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(116, 'Korea, Democratic People\'s Republic of', 'korea-democratic-people-s-republic-of', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(117, 'Korea, Republic of', 'korea-republic-of', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(118, 'Kosovo', 'kosovo', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(119, 'Kuwait', 'kuwait', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(120, 'Kyrgyzstan', 'kyrgyzstan', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(121, 'Lao People\'s Democratic Republic', 'lao-people-s-democratic-republic', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(123, 'Lebanon', 'lebanon', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(124, 'Lesotho', 'lesotho', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(125, 'Liberia', 'liberia', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(126, 'Libyan Arab Jamahiriya', 'libyan-arab-jamahiriya', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(127, 'Liechtenstein', 'liechtenstein', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(128, 'Lithuania', 'lithuania', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(129, 'Luxembourg', 'luxembourg', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(130, 'Macau', 'macau', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(131, 'North Macedonia', 'north-macedonia', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(132, 'Madagascar', 'madagascar', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(133, 'Malawi', 'malawi', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(135, 'Maldives', 'maldives', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(136, 'Mali', 'mali', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(138, 'Marshall Islands', 'marshall-islands', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(139, 'Martinique', 'martinique', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(140, 'Mauritania', 'mauritania', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(141, 'Mauritius', 'mauritius', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(142, 'Mayotte', 'mayotte', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(143, 'Mexico', 'mexico', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(144, 'Micronesia, Federated States of', 'micronesia-federated-states-of', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(145, 'Moldova, Republic of', 'moldova-republic-of', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(146, 'Monaco', 'monaco', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(147, 'Mongolia', 'mongolia', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(148, 'Montenegro', 'montenegro', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(149, 'Montserrat', 'montserrat', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(150, 'Morocco', 'morocco', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(151, 'Mozambique', 'mozambique', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(152, 'Myanmar', 'myanmar', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(153, 'Namibia', 'namibia', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(154, 'Nauru', 'nauru', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(155, 'Nepal', 'nepal', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(157, 'Netherlands Antilles', 'netherlands-antilles', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(158, 'New Caledonia', 'new-caledonia', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(160, 'Nicaragua', 'nicaragua', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(161, 'Niger', 'niger', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(162, 'Nigeria', 'nigeria', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(163, 'Niue', 'niue', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(164, 'Norfolk Island', 'norfolk-island', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(165, 'Northern Mariana Islands', 'northern-mariana-islands', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(167, 'Oman', 'oman', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(168, 'Pakistan', 'pakistan', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(169, 'Palau', 'palau', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(170, 'Palestine', 'palestine', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(171, 'Panama', 'panama', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(172, 'Papua New Guinea', 'papua-new-guinea', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(173, 'Paraguay', 'paraguay', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(174, 'Peru', 'peru', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(176, 'Pitcairn', 'pitcairn', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(179, 'Puerto Rico', 'puerto-rico', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(180, 'Qatar', 'qatar', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(181, 'Reunion', 'reunion', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(182, 'Romania', 'romania', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(183, 'Russian Federation', 'russian-federation', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(184, 'Rwanda', 'rwanda', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(185, 'Saint Kitts and Nevis', 'saint-kitts-and-nevis', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(186, 'Saint Lucia', 'saint-lucia', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(187, 'Saint Vincent and the Grenadines', 'saint-vincent-and-the-grenadines', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(188, 'Samoa', 'samoa', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(189, 'San Marino', 'san-marino', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(190, 'Sao Tome and Principe', 'sao-tome-and-principe', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(192, 'Senegal', 'senegal', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(193, 'Serbia', 'serbia', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(194, 'Seychelles', 'seychelles', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(195, 'Sierra Leone', 'sierra-leone', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(199, 'Solomon Islands', 'solomon-islands', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(200, 'Somalia', 'somalia', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(202, 'South Georgia South Sandwich Islands', 'south-georgia-south-sandwich-islands', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(203, 'South Sudan', 'south-sudan', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(206, 'St. Helena', 'st-helena', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(207, 'St. Pierre and Miquelon', 'st-pierre-and-miquelon', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(208, 'Sudan', 'sudan', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(209, 'Suriname', 'suriname', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(210, 'Svalbard and Jan Mayen Islands', 'svalbard-and-jan-mayen-islands', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(211, 'Swaziland', 'swaziland', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(212, 'Sweden', 'sweden', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(214, 'Syrian Arab Republic', 'syrian-arab-republic', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(215, 'Taiwan', 'taiwan', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(216, 'Tajikistan', 'tajikistan', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(217, 'Tanzania, United Republic of', 'tanzania-united-republic-of', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(219, 'Togo', 'togo', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(220, 'Tokelau', 'tokelau', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(221, 'Tonga', 'tonga', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(222, 'Trinidad and Tobago', 'trinidad-and-tobago', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(223, 'Tunisia', 'tunisia', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(225, 'Turkmenistan', 'turkmenistan', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(226, 'Turks and Caicos Islands', 'turks-and-caicos-islands', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(227, 'Tuvalu', 'tuvalu', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(228, 'Uganda', 'uganda', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(229, 'Ukraine', 'ukraine', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(230, 'United Arab Emirates', 'united-arab-emirates', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(232, 'United States', 'united-states', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(233, 'United States minor outlying islands', 'united-states-minor-outlying-islands', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(234, 'Uruguay', 'uruguay', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(235, 'Uzbekistan', 'uzbekistan', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(236, 'Vanuatu', 'vanuatu', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(237, 'Vatican City State', 'vatican-city-state', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(238, 'Venezuela', 'venezuela', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(240, 'Virgin Islands (British)', 'virgin-islands-british', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(241, 'Virgin Islands (U.S.)', 'virgin-islands-u-s', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(242, 'Wallis and Futuna Islands', 'wallis-and-futuna-islands', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(243, 'Western Sahara', 'western-sahara', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(244, 'Yemen', 'yemen', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(245, 'Zambia', 'zambia', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(246, 'Zimbabwe', 'zimbabwe', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(248, 'Europe', 'europe', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(249, 'Australia', 'australia', 1, '2023-02-11 02:43:57', '2023-03-20 03:23:36'),
(250, 'Bangladesh', 'bangladesh', 1, '2023-02-11 02:46:10', '2023-03-20 03:24:50'),
(251, 'Belgium', 'belgium', 1, '2023-02-11 02:46:30', '2023-03-20 03:27:18'),
(252, 'Cambodia', 'cambodia', 1, '2023-02-11 02:46:41', '2023-02-11 02:46:41'),
(253, 'Canada', 'canada', 1, '2023-02-11 02:47:02', '2023-02-11 02:47:02'),
(254, 'Czech Republic', 'czech-republic', 1, '2023-02-11 02:47:40', '2023-02-11 02:47:40'),
(255, 'Denmark', 'denmark', 1, '2023-02-11 02:47:59', '2023-02-11 02:47:59'),
(256, 'Dubai', 'dubai', 1, '2023-02-11 02:48:07', '2023-02-11 02:48:07'),
(257, 'Egypt', 'egypt', 1, '2023-02-11 02:48:31', '2023-02-11 02:48:31'),
(258, 'Finland', 'finland', 1, '2023-02-11 02:48:54', '2023-02-11 02:48:54'),
(259, 'France', 'france', 1, '2023-02-11 02:49:12', '2023-02-11 02:49:12'),
(260, 'Germany', 'germany', 1, '2023-02-11 02:49:21', '2023-02-11 02:49:21'),
(261, 'Greece', 'greece', 1, '2023-02-11 02:49:29', '2023-02-11 02:49:29'),
(262, 'Hong Kong', 'hong-kong', 1, '2023-02-11 02:49:37', '2023-02-11 02:49:37'),
(263, 'Hungary', 'hungary', 1, '2023-02-11 02:49:45', '2023-02-11 02:49:45'),
(264, 'Iceland', 'iceland', 1, '2023-02-11 02:49:55', '2023-02-11 02:49:55'),
(265, 'Italy', 'italy', 1, '2023-02-11 02:50:09', '2023-02-11 02:50:09'),
(266, 'Japan', 'japan', 1, '2023-02-11 02:50:18', '2023-02-11 02:50:18'),
(267, 'Latvia', 'latvia', 1, '2023-02-11 02:50:31', '2023-02-11 02:50:31'),
(268, 'Luxembourg', 'luxembourg', 1, '2023-02-11 02:56:03', '2023-02-11 02:56:03'),
(269, 'Malaysia', 'malaysia', 1, '2023-02-11 02:56:13', '2023-02-11 02:56:13'),
(270, 'Malta', 'malta', 1, '2023-02-11 02:56:22', '2023-02-11 02:56:22'),
(271, 'Netherlands', 'netherlands', 1, '2023-02-11 02:56:32', '2023-02-11 02:56:32'),
(272, 'New Zealand', 'new-zealand', 1, '2023-02-11 02:56:54', '2023-02-11 02:56:54'),
(273, 'Norway', 'norway', 1, '2023-02-11 02:57:02', '2023-03-20 03:26:15'),
(274, 'Philippines', 'philippines', 1, '2023-02-11 02:57:23', '2023-03-20 03:26:11'),
(275, 'Poland', 'poland', 1, '2023-02-11 02:57:30', '2023-03-20 03:26:08'),
(276, 'Portugal', 'portugal', 1, '2023-02-11 02:57:43', '2023-03-20 03:26:50'),
(277, 'Russia', 'russia', 1, '2023-02-11 02:57:51', '2023-03-20 03:26:01'),
(278, 'Saudi Arabia', 'saudi-arabia', 1, '2023-02-11 02:58:05', '2023-03-20 03:25:58'),
(279, 'Singapore', 'singapore', 1, '2023-02-11 02:58:29', '2023-03-20 03:25:55'),
(280, 'Slovakia', 'slovakia', 1, '2023-02-11 02:58:42', '2023-03-20 03:23:47'),
(281, 'Slovenia', 'slovenia', 1, '2023-02-11 02:58:50', '2023-03-20 03:24:15'),
(282, 'South Africa', 'south-africa', 1, '2023-02-11 02:59:00', '2023-03-20 03:24:23'),
(283, 'South Korea', 'south-korea', 1, '2023-02-11 02:59:12', '2023-03-20 03:25:22'),
(284, 'Spain', 'spain', 1, '2023-02-11 02:59:32', '2023-03-20 03:25:34'),
(285, 'Sri Lanka', 'sri-lanka', 1, '2023-02-11 02:59:44', '2023-03-20 03:25:11'),
(286, 'Sweden', 'sweden', 1, '2023-02-11 02:59:53', '2023-03-20 03:25:00'),
(287, 'Switzerland', 'switzerland', 1, '2023-02-11 03:00:03', '2023-03-20 03:23:27'),
(288, 'Thailand', 'thailand', 1, '2023-02-11 03:00:12', '2023-03-20 03:23:21'),
(289, 'Turkey', 'turkey', 1, '2023-02-11 03:00:22', '2023-03-20 03:23:13'),
(290, 'UAE', 'uae', 1, '2023-02-11 03:00:29', '2023-03-20 03:23:04'),
(291, 'USA', 'usa', 1, '2023-02-11 03:00:35', '2023-03-20 03:22:54'),
(292, 'United Kingdom', 'united-kingdom', 1, '2023-02-11 03:00:47', '2023-03-20 03:22:48'),
(293, 'Vietnam', 'vietnam', 1, '2023-02-11 03:00:56', '2023-04-29 09:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `college_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `intake` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `duration` varchar(255) NOT NULL,
  `tuition_fee` decimal(10,2) NOT NULL,
  `application_fee` decimal(10,2) NOT NULL,
  `tags` longtext NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `requirement` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_by_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `college_id`, `name`, `slug`, `intake`, `description`, `duration`, `tuition_fee`, `application_fee`, `tags`, `status`, `requirement`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `created_by_name`) VALUES
(12, 13, 'Undergraduate Higher Diploma in Tourism & Hospitality Management (MQF Level 5)', 'undergraduate-higher-diploma-in-tourism-hospitality-management-mqf-level-5-visa-online', '2023-09-29', 'The objective of the Level 4/5 Diploma in Tourism and Hospitality Management qualification is to enable learners’ development as managers within the tourism and hospitality industry, with a lifelong-learning orientation. It enables learners to critically apply contemporary knowledge and theories to the management of complex problems. Successful completion of this qualification will equip learners with the specialist skills and technical terminology to develop their management skills and to progress to further study or employment.\r\n\r\nThe Level 4 modules and assignments of this course are equivalent to the first year of a University Degree and the Level 5 modules and assignments are equivalent to the second year of a University Degree.\r\n\r\nThis course is made up of 6 Level 4 modules (60 ECTS) and 6 level 5 modules (60 ECTS). Each level also includes 6 written assignments. If a student decides to only study at Level 4 they will receive 60 ECTS (120 UK credits) and can apply for an exemption from the first year of a university Degree course. Each module consists of approximately 80 guided learning hours of material with an additional 30-50 hours of optional learning material. These materials comprise recommended exercises, recommended readings and internet resources.\r\n\r\nDELIVERY - LECTURE BASED OR ONLINE\r\n\r\nThis Diploma is a lecture based course held at eie Institute of Education in Valletta with fixed starting dates throughout the Academic year.\r\n\r\nThe course is also offered on an Online basis for students who require flexibility to study. Online courses may be started any time throughout the year. On application, kindly indicate your preferred system of studies.', '2 Years', 15000.00, 0.00, '#university', 1, 'Required Documents:\r\n10th Marklist\r\n12th Marklist/Equivalent\r\nPassport Copy\r\n\r\nTo enrol onto the Level 4 course, you must be at least 18 years of age and have a full secondary education. Before enrolling onto the Level 5 course, you must have attained a Level 4 or equivalent.', '2023-04-29 11:48:49', '2023-04-29 11:48:49', NULL, NULL, NULL),
(11, 12, 'Bachelor of Agribusiness and Food Marketing', 'bachelor-of-agribusiness-and-food-marketing-visa-online', '2023-09-29', 'You??ll be a strong candidate for fantastic roles in food marketing and food communications; product development and innovation; logistics and supply chain management; processed food and beverage marketing; business development in the dairy, meat, wine, horticulture and arable industries; customer service; sales; and sales management.', '0', 31800.00, 0.00, '#university', 1, 'Requirement', '2023-04-29 11:46:17', '2023-04-29 11:46:17', NULL, NULL, NULL),
(10, 12, 'Bachelor of Agriculture', 'bachelor-of-agriculture-visa-online', '2023-09-29', 'You??ll be strongly positioned for a career in Professional Accounting, Banking and Rural Banking, Rural Accounting, Financial Consulting, Stock Broking, Investment Analysis, Auditing, Business Advisory, Insurance and Financial Control.', '0', 29100.00, 0.00, '#university', 1, 'Requirement', '2023-04-29 11:45:25', '2023-04-29 11:45:25', NULL, NULL, NULL),
(9, 12, 'Bachelor of Commerce in Marketing', 'bachelor-of-commerce-in-marketing-visa-online', '2023-09-29', 'You??ll be strongly positioned for a career in Professional Accounting, Banking and Rural Banking, Rural Accounting, Financial Consulting, Stock Broking, Investment Analysis, Auditing, Business Advisory, Insurance and Financial Control.', '0', 6768.00, 50.00, '#university', 1, 'Requirement', '2023-04-29 11:44:22', '2023-04-29 11:44:22', NULL, NULL, NULL),
(13, 13, 'Undergraduate Higher Diploma in Business Administration (MQF Level 5)', 'undergraduate-higher-diploma-in-business-administration-mqf-level-5-visa-online', '2023-09-29', 'The objective of the Level 4/5 Diploma in Business Management qualification is to provide learners with an excellent foundation for a career in a range of organizations. It designed to ensure that each learner is ‘business ready’: a confident, independent thinker with a detailed knowledge of business and management, and equipped with the skills to adapt rapidly to change.\r\n\r\nThe content of the qualification is focused on people management, managing projects, marketing, finance for managers, business law, business ethics and social responsibility.\r\n\r\nThe qualification is ideal for those who have started, or are planning to move into, a career in private or public sector business. Successful completion of the Level 5 Diploma in Business Management qualification will provide learners with the opportunity to progress to further study or employment.\r\n\r\nThe Level 4 modules and assignments of this course are equivalent to the first year of a University Degree and the Level 5 modules and assignments are equivalent to the second year of a University Degree.\r\n\r\nThis course is made up of 6 Level 4 modules (60 ECTS) and 6 level 5 modules (60 ECTS). Each level also includes 6 written assignments. If a student decides to only study at Level 4 they will receive 60 ECTS (120 UK credits) and can apply for an exemption from the first year of a university Degree course. Each module consists of approximately 80 guided learning hours of material with an additional 30-50 hours of optional learning material. These materials comprise recommended exercises, recommended readings and internet resources.\r\n\r\nDELIVERY - LECTURE BASED OR ONLINE\r\n\r\nThis Diploma is a lecture based course held at eie Institute of Education in Valletta with fixed starting dates throughout the Academic year.\r\n\r\nThe course is also offered on an Online basis for students who require flexibility to study. Online courses may be started any time throughout the year. On application, kindly indicate your preferred system of studies.', '2 Years', 15000.00, 0.00, '#university', 1, 'Required Documents:\r\n10th Marklist\r\n12th Marklist/Equivalent\r\nPassport Copy\r\n\r\nTo enrol onto the Level 4 course, you must be at least 18 years of age and have a full secondary education. Before enrolling onto the Level 5 course, you must have attained a Level 4 or equivalent.', '2023-04-29 11:51:04', '2023-04-29 11:51:04', NULL, NULL, NULL),
(14, 13, 'Undergraduate Higher Diploma in Accountancy and Finance (MQF Level 5)', 'undergraduate-higher-diploma-in-accountancy-and-finance-mqf-level-5-visa-online', '2023-09-29', 'Accounting and Finance are at the very heart of business operations. From banking to manufacturing, from huge service industries to micro businesses, the ability to manage, plan and account for money is still the ultimate measure of business success and the key driver of growth.\r\n\r\nThe objective of the Level 4 Diploma in Accounting and Business qualification is to provide learners with an understanding of accounting and business in the broader business context, and to provide them with the practical, industry-focused skills to manage business finances, budgets and cash flow effectively, and to play a key role in business growth.\r\n\r\nThe objective of the Level 5 Diploma in Accounting and Business qualification is to provide learners with the knowledge and skills required by a middle manager in an organisation that may be involved in financial management, financial planning and control, financial reporting, taxation and people management.\r\n\r\nThe Level 4 modules and assignments of this course are equivalent to the first year of a University Degree and the Level 5 modules and assignments are equivalent to the second year of a University Degree.\r\n\r\nThis course is made up of 6 Level 4 modules (60 ECTS) and 6 level 5 modules (60 ECTS), for a total of 120 ECTS for both levels. Each level also includes 6 written assignments. If a student decides to only study at Level 4 they will receive 60 ECTS (120 UK credits) and can apply for an exemption from the first year of a university Degree course. \r\n\r\nDELIVERY - LECTURE BASED OR ONLINE \r\n\r\nThis Diploma is a lecture based course held at eie Institute of Education in Valletta with fixed starting dates throughout the Academic year. \r\n\r\nThe course is also offered on an Online basis for students who require flexibility to study. Online courses may be started any time throughout the year. On application, kindly indicate your preferred system of studies.', '2 Years', 15000.00, 0.00, '#university', 1, 'Required Documents:\r\n10th Marklist\r\n12th Marklist/Equivalent\r\nPassport Copy\r\n\r\nTo enrol onto the Level 4 course, you must be at least 18 years of age and have a full secondary education together with an accounting background at Level 3 or A Level standard. Before enrolling onto the Level 5 course, you must have attained a Level 4 or equivalent in the same subject.', '2023-04-29 11:52:12', '2023-04-29 11:52:12', NULL, NULL, NULL),
(15, 14, 'Masters in Transport and Logistics', 'masters-in-transport-and-logistics-visa-online', '2023-09-29', 'The MSc in Logistics and Transport aims to prepare students for leading management positions within: the logistics functions of manufacturers and distributors of all kinds; transport companies and other logistics service providers and; public organizations involved in the regulation and planning of transport and logistics within regional, national and international contexts.', '0', 12102.00, 0.00, '#university', 1, 'Requirement', '2023-04-29 11:53:28', '2023-04-29 11:53:28', NULL, NULL, NULL),
(16, 14, 'Masters in Social Sciences in Management', 'masters-in-social-sciences-in-management-visa-online', '2023-09-29', 'The Master\'s program is designed to help students develop a rational analytical approach to solving business problems and to affecting the internal change within the business by using modern management technologies, that allow to acquire the competencies to operate as manager or as entrepreneur, making our graduates employable. The top priorities for today\'s managers are ability to manage change, as well ensure company\'s development and financial stability, that increase the demand of such professionals for today\'s Latvian labormarket. In response to market demand two new specializations have been implemented:\"Business and Change Management\" and \"Business and Financial Management\".', '0', 3500.00, 100.00, '#university', 1, 'Requirement', '2023-04-29 11:54:48', '2023-04-29 11:54:48', NULL, NULL, NULL),
(17, 14, 'Masters in Management of Information systems', 'masters-in-management-of-information-systems-visa-online', '2023-09-29', 'Master\'s degree programme in Management Information Systems (MIS) cover both business and technology skills and is targeted on preparation of world-class specialists with deep knowledge in modern information and communication technology and utilization of technology in various contexts.Obtained knowledge and skills allows you to become a valuable link between developers of technology and users (community and business). The programme focuses on management of information systems, aspects of change management and use of technology During classes students are having lectures, practical assignments and case studies provided and supervised by best local and international professors and specialists. Joining the programme today allows you to get international experience provided by invited professors from University of Deusto (Spain), Tokyo University of Electro-Communications (Japan), University of Thessaly (Greece), etc. Upon successful completion of the study programme, you will be able to identify business problems, provide solutions on modern information and communication technologies base, manage and evaluate IT projects.', '0', 3200.00, 100.00, '#university', 1, 'Requirement', '2023-04-29 11:55:53', '2023-04-29 11:55:53', NULL, NULL, NULL),
(18, 18, 'General Business Preparation & German Language', 'general-business-preparation-german-language-visa-online', '2023-09-29', 'Sprechen Sie Deutsch? Only ein bisschen? Then this course is for you!\r\n\r\nThe German Language Course is a quite recent development in our institution.\r\n\r\nThis course involves IT and Marketing in English language with basic German language lessons.', '1 year', 5650.00, 0.00, '#university', 1, 'Required documents\r\nThe scanned image of the applicant’s passport. The passport must bear the signature of the applicant.\r\nScanned photo of the applicant – colour photo.\r\nCompleted, signed declaration form of the College \r\nThis declaration must be signed and stamped by the agent. in PDF format\r\nOfficial English translation of high school diploma or evidence of graduation in PDF format.\r\nOfficial English translation of high school transcript of records in PDF format.\r\nSigned and fingerprint verified Farsi Declaration Form (only in case of Iranian students) in PDF format.\r\nOfficial English translation of the Birth Certificate in PDF format\r\nApplicants over 24 years old need to complete the online CV form. \r\n\r\nRemarks:\r\n\r\nPlease note that each page must be scanned separately and in PDF format.\r\nAll the required documents must be properly scanned, in a high quality. Poor quality photos taken with mobile phones are not accepted at all.\r\nRecommended level of English language proficiency for the applicants are: Intermediate, B1 or IELTS: 3.5', '2023-04-29 11:59:55', '2023-04-29 12:00:50', NULL, NULL, NULL),
(19, 18, 'Pre-PhD', 'pre-phd-visa-online', '2023-09-29', 'Postgraduate certificate in Pre-Doctoral Studies\r\nPreparation for success in doctoral studies at leading universities worldwide.\r\n\r\nThe course is designed to effectively improve your English in key skills, preparing students to study at the doctorate level. If your research ideas are not yet firm enough to undertake doctoral studies and you feel that you need to improve your language and research skills, this course if for you.\r\n\r\nAs well as being academic, the course helps students to understand very well the practical aspects of doctoral studies, for example how to engage with supervisors, how to prepare research design, and what to expect as a PhD student.\r\n\r\nThe course contents covers the following topics which are crucially required for a PhD scholar:\r\n\r\nMarketing management\r\nGeneral English language\r\nBusiness English\r\nIT', '1 year', 5650.00, 0.00, '#university', 1, 'Required documents\r\nThe scanned image of the applicant’s passport. The passport must bear the signature of the applicant.\r\nScanned photo of the applicant – colour photo.\r\nCompleted, signed declaration form of the College \r\nThis declaration must be signed and stamped by the agent. in PDF format\r\nOfficial English translation of high school diploma or evidence of graduation in PDF format.\r\nOfficial English translation of high school transcript of records in PDF format.\r\nSigned and fingerprint verified Farsi Declaration Form (only in case of Iranian students) in PDF format.\r\nOfficial English translation of the Birth Certificate in PDF format\r\nApplicants over 24 years old need to complete the online CV form. \r\n\r\nRemarks:\r\n\r\nPlease note that each page must be scanned separately and in PDF format.\r\nAll the required documents must be properly scanned, in a high quality. Poor quality photos taken with mobile phones are not accepted at all.\r\nRecommended level of English language proficiency for the applicants are: Intermediate, B1 or IELTS: 3.5', '2023-04-29 12:01:58', '2023-04-29 12:01:58', NULL, NULL, NULL),
(20, 18, 'Pre-Master\'s', 'pre-masters-visa-online', '2023-09-29', 'After finishing a Bachelor’s degree course and receiving a diploma, it becomes clear to everyone, that it is not at all easy. It takes a great deal of energy to succeed and to achieve this educational certificate.\r\n\r\nIf one decides to continue studying and wishes to complete a Master’s degree course abroad as well, the task becomes even more complex by undertaking the difficulties given by the language barriers, the new environment etc.\r\n\r\nDuna International College can help those, who desire to make their studies more adventurous and wish to study away from home experiencing new situations, a new way of life and a new culture. By choosing our Pre-Master\'s and receiving a proper preparation in English, IT & Data Mining, Management and Mathematics, these subjects will become much easier and understandable and the strong foundation for further studies will be provided.\r\n\r\nAppropriate for all postgraduate applicants in order to improve their teamwork and management skills proficiency along with fundamental science studies.', '1 year', 5650.00, 0.00, '#university', 1, 'Required documents\r\nThe scanned image of the applicant’s passport. The passport must bear the signature of the applicant.\r\nScanned photo of the applicant – colour photo.\r\nCompleted, signed declaration form of the College \r\nThis declaration must be signed and stamped by the agent. in PDF format\r\nOfficial English translation of high school diploma or evidence of graduation in PDF format.\r\nOfficial English translation of high school transcript of records in PDF format.\r\nSigned and fingerprint verified Farsi Declaration Form (only in case of Iranian students) in PDF format.\r\nOfficial English translation of the Birth Certificate in PDF format\r\nApplicants over 24 years old need to complete the online CV form. \r\n\r\nRemarks:\r\n\r\nPlease note that each page must be scanned separately and in PDF format.\r\nAll the required documents must be properly scanned, in a high quality. Poor quality photos taken with mobile phones are not accepted at all.\r\nRecommended level of English language proficiency for the applicants are: Intermediate, B1 or IELTS: 3.5', '2023-04-29 12:03:07', '2023-04-29 12:03:07', NULL, NULL, NULL),
(21, 19, 'Business Foundation Program (BFP)', 'business-foundation-program-bfp-visa-online', '2023-09-29', 'Avicenna Business Foundation Program (BFP) is designed for those international students who have finished high school and would like to continue their studies in Europe in the English language-based university. BFP will provide a strong basis in general and academic English for the students and also offer some understanding of basic business-related subjects. Our graduates can apply to any European or North American university.\r\n\r\nBusiness administration, economics, banking, marketing, international relations, law and IT in marketing are among the fields of study that the graduates of Business Foundation Program (BFP) can choose to continue their studies in one of the English language European universities.\r\n\r\nUpon completion of BFP, the Admission Department of AIC will help the graduates to find the best possible option in one of the European and UK universities.', '1 Year', 5900.00, 0.00, '#university', 1, 'International and Hungarian students are welcome to apply to study Business Foundation Program (BFP) at Avicenna International College. Applicants must hold a valid high school diploma. A Level and IB graduates are encouraged to apply for Avicenna Scholarship Plan. Students can combine this course with NCUK IFY – Business Stream when they plan to prepare for any NCUK universities at AIC.', '2023-04-29 12:04:33', '2023-04-29 12:04:33', NULL, NULL, NULL),
(22, 19, 'Avicenna Medical Foundation Program', 'avicenna-medical-foundation-program-visa-online', '2023-09-29', 'Medicine – Dentistry – Pharmacy – Veterinary – Nursing – Physiotherapy – Biomedical Sciences\r\n\r\nAvicenna Medical Foundation Program (AMFP) is a well-structured and comprehensive program designed for those international students who have completed their high school studies outside the UK and wish to continue their further studies in a medically related field in British or other European universities.\r\n\r\nAMFP will prepare students for successful entry to European universities. It also ensures that students learn to become independent, organized, disciplined and inquiring individuals when joining their future higher education centers.\r\n\r\nAMFP is a complex program which offers strong support in general and academic English for those who did not study in English. It also offers medical science subjects which specifically are important in the first two years of medical studies. The subjects are taught in considerable depth with specific attention to medical relevance. AMFP students are encouraged to learn about scientific inquiries and research. Laboratory practice is part of the AMFP education.\r\n\r\nContinuous assessment, mid-year and final examinations, essay, and research papers are part of the program and requirement for successful completion of AMFP.\r\n\r\nAMFP essentially is a two-year program. Those who are fluent in English and have a stronger background in sciences or have graduated from an international school with IB or A Level may complete the program in one year.', '2 years', 7900.00, 0.00, '#university', 1, 'International students can apply to AMFP throughout the year. Applicants will submit their completed application form to the Admission Department of AIC. All applications are given full attention and review. Qualified applicants will be notified about the decision of AIC on their application in due time.\r\n\r\nAll applicants, at the time of application, must comply with the following requirements:\r\n\r\nTo be a minimum of 17 years.\r\n\r\nTo have completed a national or international high school program (minimum 12 years) or to be in the last year of high school studies. College or university degree holders are encouraged to apply too.\r\n\r\nTo hold an authentic, certifiable national high school diploma or IB or A Level.\r\n\r\nTo provide an IELTS certificate of a minimum of 5.5 or achieve a score of a minimum of 55% in APT (English).\r\n\r\nTo participate in APT (science) including the written and interview components and achieve a minimum score of 55%.\r\n\r\nTo provide all the required documents at the time of application.\r\n\r\nTo pay all the relevant fees at the time of application/admission according to the rules and regulations.\r\n\r\nRequirements for Graduation\r\nThose students who successfully complete the requirements of AMFP will be awarded the official “Certificate of Completion” of AMFP together with Europass compatible copy of transcripts.\r\n\r\nThose students will be granted the “Certificate of Completion” of AMFP who\r\n\r\nHave attended the classes regularly.\r\n\r\nHave successfully passed all the required exams (including the semi-finals and the final exam) with a minimum score of 70% in each subject.\r\n\r\nHave provided the Essay and other research assignments.\r\n\r\nAwards and Certificates\r\nThose who have met all the requirements and prerequisites of AMFP will be awarded the “Certificate of Completion” duly signed and sealed by the college authorities and the concerned ministries in Hungary.\r\n\r\nThose who cannot complete all the requirements of AMFP will be able to request a certificate of attendance and certificate which indicates the credits taken at AIC.', '2023-04-29 12:05:29', '2023-04-29 12:05:29', NULL, NULL, NULL),
(23, 19, 'International Foundation Year (IFY) – NCUK : Engineering Stream', 'international-foundation-year-ify-ncuk-engineering-stream-visa-online', '2023-09-29', 'Engineering related fields of study are very specific in the modern UK and European universities. NCUK – IFY Engineering Stream is an excellent program for those who would like to continue their studies in engineering/physics/computer science-related fields in an English speaking environment especially in the UK. Our successful students are guaranteed admission to any of the designated Partner universities of NCUK.', '1 Year', 7900.00, 0.00, '#university', 1, 'International and Hungarian students are welcome to apply to study IFY – Engineering Stream at Avicenna International College. Applicants must hold a valid high school diploma. A-Level and IB graduates are encouraged to apply for the Avicenna Scholarship Program when they plan to prepare for any NCUK universities at AIC.', '2023-04-29 12:07:23', '2023-04-29 12:07:23', NULL, NULL, NULL),
(24, 21, 'ICT60220 Advance Diploma of Information Technology (Telecommunication Networking Engineer & Cyber Security)', 'ict60220-advance-diploma-of-information-technology-telecommunication-networking-engineer-cyber-security-visa-online', '2023-09-29', 'This qualification reflects the role of individuals in a variety of information and communications technology (ICT) roles who have significant experience in specialist technical skills or managerial business and people management skills. Individuals in these roles carry out complex tasks in a specialist field, working independently, leading a team, or strategic business direction. They apply their skills across various industries and business functions or as a business owner (sole traders/contractors).\r\n\r\nThe skills required for these roles may include, but are not restricted to:\r\n\r\nAdvanced data management information: creating, designing, and monitoring complex systems that store data and optimizing\r\norganizational knowledge management\r\nCyber security: protecting sensitive data and information through security architecture and developing disaster recovery and\r\ncontingency plans\r\nFull-stack web development: building advanced user interfaces, developing representational state transfer application program\r\ninterfaces (REST APIs), and designing user experience solutions\r\nFurther programming: applying advanced ICT languages to maintain security and manage data\r\nIT strategy and organizational development: managing and communicating strategic ICT business solutions\r\nSystems development and analysis: modeling and testing data objects, data processes, and preferred ICT system solutions\r\nTelecommunications network engineering: managing logistics, organizational specifications, regulations, and legislative\r\nrequirements across network projects.', '76 Weeks', 12530.00, 0.00, '#university', 1, 'Be at least 18 years of age and have completed the equivalent of Year 12.\r\nHave an IELTS* score of 5.5 (test results must be no more than 2 years old). English language competence can also be\r\ndemonstrated through documented evidence of any of the following:\r\n\r\n•Successfully completed a Certificate IV level course in an Australian RTO; or\r\n•Successful completion of an English Placement Test\r\n\r\n*Note that other English language tests such as PTE and TOEFL can be accepted. Students are required to provide their results so that it can be confirmed they are equivalent to IELTS 5.5.', '2023-04-29 12:33:13', '2023-04-29 12:33:13', NULL, NULL, NULL),
(25, 21, 'BSB50120 Diploma of Business (Operations)', 'bsb50120-diploma-of-business-operations-visa-online', '2023-09-29', 'This qualification reflects the role of individuals in a variety of Business Services job roles. These individuals may have frontline management accountabilities. Individuals in these roles carry out moderately complex tasks in a specialist field of expertise that requires business operations skills. They may possess substantial experience in a range of settings, but seek to further develop their skills across a wide range of business functions.', '52 weeks', 8250.00, 0.00, '#university', 1, 'Be at least 18 years of age and have completed Year 12 or equivalent.\r\nParticipate in a course entry interview to determine suitability for the course and student needs.\r\nHave language, literacy, and numeracy (LLN) skills to complete the course, such as reading materials relevant to the course, participating in discussions and roleplays, and applying numerical concepts such as time management.\r\n\r\nThis will be tested through an LLN assessment as part of the course entry process. To enter the course, students will need to achieve ACSF level 3 for reading, writing, numeracy, and oral communication', '2023-04-29 12:36:27', '2023-04-29 12:36:27', NULL, NULL, NULL),
(26, 21, 'BSB60120 Advanced Diploma of Business', 'bsb60120-advanced-diploma-of-business-visa-online', '2023-09-29', 'This qualification reflects the role of individuals in a variety of Business Services job roles. These individuals may have general management accountabilities. Individuals in these roles carry out complex tasks in a specialist field of expertise. They may undertake technical research and analysis, and will often contribute to setting the strategic direction for a work area.\r\n\r\nThe qualification is suited to individuals who are responsible for the supervision and leadership of a team or work area (including by managing staff performance and making staffing decisions).', '52 weeks', 8250.00, 0.00, '#university', 1, 'Western Sydney Technology College has the following entry requirements.  Domestic / Online  students must:\r\nBe at least 18 years of age and have completed Year 12 or equivalent.\r\nParticipate in a course entry interview to determine suitability for the course and student needs.\r\nHave language, literacy, and numeracy (LLN) skills to complete the course, such as reading materials relevant to the course participating in discussions and roleplays, and applying numerical concepts such as time management.  This will be tested through an LLN assessment as part of the course entry process.  To enter the course, students will need to achieve ACSF level 3 for reading, writing, numeracy, and oral communication. Successfully completed a Certificate IV\r\nHave completed a Diploma or Advanced Diploma from BSB Training Package (current or superseded equivalent versions) \r\nHave two years equivalent full-time relevant workplace experience in an operational or leadership role in an enterprise.', '2023-04-29 12:38:41', '2023-04-29 12:38:41', NULL, NULL, NULL),
(27, 22, 'Graduate Certificate in Business', 'graduate-certificate-in-business-visa-online', '2023-09-29', 'The Graduate Certificate in Business is appropriate for students who wish to improve and develop their foundation\r\nknowledge in a range of business disciplines, including Accounting, Research Methods, Professional\r\nEthics, Management, and also for those wanting to improve their understanding of the application of theory and\r\npractice in the global business environment. This course provides a sound basis for individuals seeking to expand\r\ntheir expertise, build their professional excellence or enhance their leadership capabilities. This course prepares\r\nstudents to move into and access supervisory and entry level management roles in all industries. Students have a choice\r\nin the units of study they choose to pursue to deepen their understanding in the business disciplines offered.', '26 weeks', 9000.00, 0.00, '#university', 1, '1.Students must be 18 years of age before commencement of the designated study period.\r\n3.2.Applicants must have completed a recognised Bachelor\'s degree, or an equivalent or higher qualification.\r\n3.3.The English proficiency requirement for international students or local applicants with international qualifications is:\r\nAcademic IELTS: 6.5 overall with no individual band below 6.0; or TOEFL internet based: 85 or more; or Pearson Test of\r\nEnglish (PTE): 61 or more; or Cambridge English C1 Advanced and Cambridge English C2 Proficiency Scale (formerly CAE\r\nand CPE): 176 or more.\r\n3.4.Applicants must attend a personal interview prior to receiving a Letter of Offer. The personal interview will be held with the\r\napplicant and a senior member of EEI staff. This interview may be conducted in person, or by phone, or utilizing other\r\navailable technology. The purpose of the interview is to ensure the applicant has a high chance of success in their chosen\r\nAward Course based on identified and potential academic skills, personal resilience, resources, motivation and commitment.\r\n3.5.International students have a visa requirement. To obtain a student visa to study in Australia, international students must\r\nenroll full-time and on campus. Australian student visa regulations also require international students studying on student visas\r\nto complete the course within the standard full-time duration. Students can extend their courses only in exceptional\r\ncircumstances.', '2023-04-29 12:45:04', '2023-04-29 12:45:04', NULL, NULL, NULL),
(28, 22, 'Diploma of Business', 'diploma-of-business-visa-online', '2023-09-01', 'This course is accredited by the Tertiary Education Quality and Standards Agency (TEQSA). This course is designed\r\nfor student wishing to pursue accounting or business careers in a domestic and international context. Students\r\nwill gain an understanding of key areas of business including economics, accounting, finance, business\r\nmanagement and marketing. The Diploma of Business, CRICOS Code: 084214B, is equivalent to the first year of\r\nthe Bachelor of Business degree. To qualify for award of the Diploma of Business, a candidate must complete 8\r\nunits study with aggregated 48 credit points (i.e., 6 credit points for each unit).', '1 Year', 18000.00, 0.00, '#university', 1, '2.1.Students must be 18 years of age before commencement of the designated study period.\r\n2.2.The minimum entry requirement for all students is an Australian Year 12 senior secondary school certificate or its\r\ninternational equivalent and the conditions consistent with the requirements for Subclass 500 visas in the case of\r\ninternational students.\r\n2.3.Completion of AQF Level 4 study\r\nIf a student completes an Australian Certificate IV in vocational study (AQF Level 4), they will be able to enrol in an\r\nundergraduate course at EEI.\r\n2.4.English Language Proficiency\r\nThe language of instruction is English. All students are required to demonstrate a minimum level of proficiency in English\r\nlanguage to qualify for admission. For students enrolling onshore, students from Australian local institutes, an Australian\r\nYear 12 senior secondary school certificate is required.\r\nFor students enrolling from non-English speaking countries, a condition of admission is evidence of an IELTS\r\n(Academic) test with a minimum score of 6.0 with no sub-band scores less than 5.5. Students with IELTS (Academic)\r\n5.0 may enroll after successful completion of the English for Academic Purposes EAP2 program authorised at a\r\nTEQSA/ASQA accredited ELT Centre if approved by the Institute. Successful completion of the EAP program requires a\r\npass mark in all assessment tasks.\r\nWhen an IELTS score is used to demonstrate English proficiency, that score must have been attained within two years\r\nof the date of application for admission.\r\n2.5.Applicants must attend a personal interview prior to receiving a Letter of Offer. The personal interview will be held\r\nwith the applicant and a senior member of EEI staff. This interview may be conducted in person, or by phone, or\r\nutilizing other available technology. The purpose of the interview is to ensure the applicant has a high chance of\r\nsuccess in their chosen Award Course based on identified and potential academic skills, personal resilience, resources,\r\nmotivation and commitment.\r\n2.6.International students have a visa requirement. To obtain a student visa to study in Australia, international\r\nstudents must enroll full-time and on campus. Australian student visa regulations also require international students\r\nstudying on student visas to complete the course within the standard full-time duration. Students can extend their\r\ncourses only in exceptional circumstances.', '2023-05-01 05:35:40', '2023-05-01 05:35:40', NULL, NULL, NULL),
(29, 22, 'Bachelor of Business (Professional Accounting)', 'bachelor-of-business-professional-accounting-visa-online', '2023-09-01', 'The Bachelor of Business (Professional Accounting), CRICOS Code: 084217K, degree is designed to provide a rigorous\r\naccounting education with comprehensive exposure to accounting theories and professional practice. The degree\r\nprovides students with systematic training in accounting and business management for them to enter into accounting\r\nprofession. For developing students\' competencies in business-oriented knowledge and perspectives, the core\r\nprofessional areas of accounting, economics, finance and law is integrated with the exploration of broad commercial\r\ncontext relating to the management and conduct of business. Hence, the graduates will not only be professionally\r\ncompetent in the theoretical and technical aspects of accounting profession, but also have well developed analytical\r\nand communication skills necessary to equip them for leadership roles in their professional and business lives. By\r\ncompleting this degree, students will be able to engage in profession of auditing, taxation services, commercial\r\naccounting, public accounting, not-for-profit or government accounting, and financial services, etc. The Bachelor of\r\nBusiness (Professional Accounting) degree is accredited by Certificated Practicing Accountant, Australia (CPA), Institute\r\nof Chartered Accountants in Australia (ICAA), and Institute of Public Accountants (IPA).', '3 Years', 54000.00, 0.00, '#university', 1, '2.1.Students must be 18 years of age before commencement of the designated study period.\r\n2.2.The minimum entry requirement for all students is an Australian Year 12 senior secondary school certificate or its\r\ninternational equivalent and the conditions consistent with the requirements for Subclass 500 visas in the case of\r\ninternational students.\r\n2.3.Completion of AQF Level 4 study\r\nIf a student completes an Australian Certificate IV in vocational study (AQF Level 4), they will be able to enrol in an\r\nundergraduate course at EEI.\r\n2.4.English Language Proficiency\r\nThe language of instruction is English. All students are required to demonstrate a minimum level of proficiency in English\r\nlanguage to qualify for admission. For students enrolling onshore, students from Australian local institutes, an Australian\r\nYear 12 senior secondary school certificate is required.\r\nFor students enrolling from non-English speaking countries, a condition of admission is evidence of an IELTS\r\n(Academic) test with a minimum score of 6.0 with no sub-band scores less than 5.5. Students with IELTS (Academic)\r\n5.0 may enroll after successful completion of the English for Academic Purposes EAP2 program authorised at a\r\nTEQSA/ASQA accredited ELT Centre if approved by the Institute. Successful completion of the EAP program requires a\r\npass mark in all assessment tasks.\r\nWhen an IELTS score is used to demonstrate English proficiency, that score must have been attained within two years\r\nof the date of application for admission.\r\n2.5.Applicants must attend a personal interview prior to receiving a Letter of Offer. The personal interview will be held\r\nwith the applicant and a senior member of EEI staff. This interview may be conducted in person, or by phone, or\r\nutilizing other available technology. The purpose of the interview is to ensure the applicant has a high chance of\r\nsuccess in their chosen Award Course based on identified and potential academic skills, personal resilience, resources,\r\nmotivation and commitment.\r\n2.6.International students have a visa requirement. To obtain a student visa to study in Australia, international\r\nstudents must enroll full-time and on campus. Australian student visa regulations also require international students\r\nstudying on student visas to complete the course within the standard full-time duration. Students can extend their\r\ncourses only in exceptional circumstances', '2023-05-01 05:37:13', '2023-05-01 05:37:13', NULL, NULL, NULL),
(30, 26, 'Visual Effects BSc (Hons)', 'visual-effects-bsc-hons-visa-online', '2023-09-01', 'Visual Effects BSc has been developed in consultation with the industry to deliver skills relative to the production of visual effects (VFX) across a range of contemporary media. The use of VFX is commonplace within broadcast productions, film and animation, video games, and in advertising. This is reflected in the scope of this course as it pulls from a number of disciplines including film, special effects, animation and 3D, to complement the interdisciplinarity of the subject.\r\n\r\nThis course also encourages you to develop your creative flair and understanding of industry-standard software to create your own 3D content for use in film and television projects.\r\n\r\nAs an integral part of the multibillion-pound film and television industry, studying the creative and technical skills used in VFX can open up extensive career prospects.', '4 years', 15750.00, 0.00, '#university', 1, 'A typical offer is 104 UCAS points from at least two A-levels, or equivalent or\r\nBTEC National Diploma/ Extended Diploma at DMM\r\nPlus five GCSEs at grade 4 or above, including English and Maths or equivalent.\r\n\r\nAlternative qualifications include:\r\n\r\nPass in the QAA accredited Access to HE. English GCSE required as a separate qualification as equivalency is not accepted within the Access qualification.\r\nWe will normally require students to have had a break from full-time education before undertaking the Access course or\r\nInternational Baccalaureate: 24+ points or\r\nT Levels Merit.\r\nIf English is not your first language then an IELTS score of 6.0 overall with a minimum of 5.5 in each component (or equivalent) is essential.', '2023-05-01 05:40:06', '2023-05-01 05:40:06', NULL, NULL, NULL),
(31, 26, 'Textile Design BA (Hons)', 'textile-design-ba-hons-visa-online', '2023-09-01', 'This course explores the fabric of the world around us - from wallpaper and soft furnishings to transport upholstery and luxury fashion. The curriculum will give you the practical, digital and professional skills required to become a designer in the contemporary global textile market.\r\n\r\nYou can specialise in one of four areas – mixed media, print, knit or weave – and will explore the key applications of fashion, interior and lifestyle.\r\n\r\nMixed media focuses on creating contemporary collections using embroidery and embellishment to build up surfaces.\r\nPrint explores the translation of imagery onto textile surfaces with the inventive use of screen printing and dyeing processes.\r\nKnit and weave concentrate on developing innovative textile structures through yarn and fibres.\r\nEmployability skills are embedded into the curriculum, alongside opportunities to work on live briefs set by industry experts and take part in prestigious competitions. Our expert teaching team will encourage you to take dynamic approaches to textile design that will influence the future of the industry and you will graduate as a forward-thinking, responsible designer.', '4 years', 15250.00, 0.00, '#university', 1, 'Art and Design Foundation or\r\n112 points from at least 2 A ‘levels \r\n BTEC Extended Diploma DMM\r\nInternational Baccalaureate: 26+ Points or\r\nT Levels Merit\r\nPlus five GCSEs grades 9-4 including English Language or Literature at grade 4 or above.\r\n\r\nPass Access with 30 Level 3 credits at Merit and GCSE English (Language or Literature) at grade 4 or above\r\nIELTS score of 6.0 overall with 5.5 in each band (or equivalent)', '2023-05-01 05:41:57', '2023-05-01 05:41:57', NULL, NULL, NULL),
(32, 26, 'Speech and Language Therapy BSc (Hons)', 'speech-and-language-therapy-bsc-hons-visa-online', '2023-09-01', 'Speech and language therapists work collaboratively with children and adults of all ages who are experiencing challenges with speech, language and communication and/or eating, drinking and swallowing. We work closely with parents, carers and families, as well as many other professionals, to identify, assess and offer support to people in many, different ways. Speech and language therapy really is a rich and varied profession.\r\n\r\nAt DMU, you’ll study a wide range of topics across the three-year programme – including phonetics and phonology, psychology, medical sciences, linguistics and language development. As the course progresses, you’ll learn more about communication disabilities, evidence-based practice and intervention and have opportunities to develop your own focus in your final year dissertation project.', '3 Years', 15750.00, 0.00, '#university', 1, 'Pass in the QAA Access to HE Diploma ‘Science’ or ‘Medicine and Healthcare’ with 45 credits at Distinction\r\nEnglish, Maths and Science GCSE required at grade C/4 as separate qualifications. Equivalency not accepted within the Access qualification.\r\n\r\nWe will normally require students to have had a break from full-time education before undertaking the Access course.\r\n\r\nInternational Baccalaureate: 30+ points\r\nIf English is not your first language an average IELTS score of 8.0 (with no component below 7.5) when you start the course is essential.', '2023-05-01 05:52:18', '2023-05-01 05:52:18', NULL, NULL, NULL),
(33, 27, 'MSc Water and Environmental Management', 'msc-water-and-environmental-management', '2023-09-01', 'Our MSc in Water and Environmental Management gives you the technical skills to manage pollution, alongside a detailed understanding of the urban aquatic environment. Emphasis is on the practical application of water and environmental management within industry. We aim to prepare you for a management career in the water and environmental sectors.\r\n\r\nWhen you graduate, you’ll be equipped to embrace the challenges around water problems caused by expanding urban areas worldwide.\r\n\r\nYou’ll deepen your research skills and techniques by completing a dissertation on a topic you want to explore further, supported by our academic staff.', '3 Years', 15000.00, 0.00, '#university', 1, 'The equivalent of a lower second class (2:2) honours degree in Engineering or Science.\r\nApplicants with non-standard qualifications will be considered on an individual basis, determined by prior study, work experience, professional qualifications, and references.\r\n\r\nIELTS - overall score of 6.0 with no band lower than 5.5\r\n\r\nTOEFL - overall score of 78 (individual elements: L-17, R-18, S-20, W-17)', '2023-05-01 05:56:58', '2023-05-11 12:29:43', NULL, NULL, NULL),
(34, 27, 'MSc Strategic Organisational Learning', 'msc-strategic-organisational-learning', '2023-09-01', 'This one-year programme, delivered in partnership with Al-Maktoum College of Higher Education, will teach you the fundamental concepts of organisational learning, learning organisations, individual, team and machine learning.', '1 Year', 15000.00, 0.00, '#university', 1, 'A good (at least a lower second class Honours degree or equivalent) first degree\r\n\r\nIELTS - overall score of 6.0 with no band lower than 5.5\r\n\r\nTOEFL - overall score of 78 (individual elements: L-17, R-18, S-20, W-17)', '2023-05-01 05:57:56', '2023-05-11 12:29:34', NULL, NULL, NULL);
INSERT INTO `courses` (`id`, `college_id`, `name`, `slug`, `intake`, `description`, `duration`, `tuition_fee`, `application_fee`, `tags`, `status`, `requirement`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `created_by_name`) VALUES
(35, 86, 'Professional Masters in Games Development (MProf)', 'professional-masters-in-games-development-mprof', '2023-09-01', 'The Centre for Excellence in Computer Games Education at Abertay offers this unique, world-renowned programme. It’ll give you a skillset that encompasses far more than basic technical excellence. The result offers an unparalleled opportunity for subsequent employment in leading creative and technological industries - specifically within the fields of coding, digital art, game design and audio - as demanded by the multi-billion pound games industry.\r\n\r\nGet set to develop core skills through applied project work, supported by experienced games industry practitioners. Enhance your skills in interdisciplinary communication and collaboration through teamwork with students and staff from other areas of games development.\r\n\r\nYou’ll apply developing technologies and practices, specific to your own discipline, across projects that demonstrate your work to leading industry figures. In addition, you\'ll be encouraged to nurture relationships with fellow developers, industry professionals and companies through your demonstrable skill in the creation of games, mentorships and published research.', '1 year', 17000.00, 0.00, '#university', 1, 'Applicants will typically require a Bachelor of Arts / Science / Commerce / Professional Subject with a minimum GPA of 3.3 (4-point scale) or 60-69% in Art, Code, Design, Game Production or Audio. Applicants will also be required to have undertaken Independent Research. We will also consider applicants with a GPA of 2.9 (4-point scale) or 55-65% if there is sufficient evidence of ability demonstrated in the Portfolio of Evidence supporting their application.\r\n\r\nAll applicants must submit a personal statement that includes a Portfolio of Evidence (PoE) for review as part of their application.\r\n\r\nThe purpose of the Portfolio of Evidence is to allow the Programme Team to determine whether there is satisfactory evidence of ability - or potential ability - within at least one key computer games development role. These key roles* are Programming, Game Design, Art and Animation (preferably digital), Software, Project or Team Management, Digital Audio and Sound Design.\r\n\r\nContent provided must be digital, preferably directing the Programme Team to external websites, galleries, testimonials or other bodies of work that can be viewed remotely - rather than any physical submission.\r\n\r\nOf particular interest are references to:\r\n\r\nAn academic or similar qualification in a game related area\r\n\r\nProfessional Industry experience\r\n\r\nProfessional Accreditation\r\n\r\nSelf-directed work in a game related discipline\r\n\r\nTestimonials from professional developers\r\n\r\n* Please note that experience in Quality Assurance (QA) or Marketing are not considered as key roles within this context, as there would be no appropriate opportunity to focus upon them in the programme.\r\n\r\nIELTS - overall score of 6.0 with no band lower than 5.5\r\n\r\nTOEFL - overall score of 78 (individual elements: L-17, R-18, S-20, W-17)', '2023-05-01 06:00:03', '2023-05-11 12:29:25', NULL, NULL, NULL),
(39, 1, 'course name', 'course name', '2/18/2023', 'description', '2', 200.00, 933.00, 'tags', 1, '1', '2023-05-12 11:44:06', '2023-05-12 11:44:06', NULL, 1, 'Mr Mithun Gupta'),
(38, 13, 'Test course', 'test-course-visa-online', '2023-05-11', 'desc', '23', 433.00, 54.00, 'tags', 1, 'entry af', '2023-05-11 12:25:45', '2023-05-11 12:26:26', '2023-05-11 12:26:26', NULL, NULL),
(40, 64, 'Berk Rasmussen', 'berk-rasmussen', '1990-01-17', 'Obcaecati est quaera', 'Ducimus quam est re', 29.00, 3.00, 'Elit elit et tempo', 1, 'Vel sit dolores num', '2023-05-12 20:23:20', '2023-05-12 20:23:20', NULL, 132, 'Pratt and Spears Trading'),
(41, 1, 'course name', 'course name', '2/18/2023', 'description', '2', 200.00, 933.00, 'tags', 1, '1', '2023-05-13 19:31:04', '2023-05-13 19:31:04', NULL, 132, 'Pratt and Spears Trading');

-- --------------------------------------------------------

--
-- Table structure for table `c_s_v_uploads`
--

CREATE TABLE `c_s_v_uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `c_s_v_uploads`
--

INSERT INTO `c_s_v_uploads` (`id`, `file`, `created_by`, `created_name`, `created_at`, `updated_at`) VALUES
(1, 'uploads/CSVFiles\\course972-file.csv', '1', 'Mr Mithun Gupta', '2023-05-10 08:02:54', '2023-05-10 08:02:54'),
(2, NULL, '1', 'Mr Mithun Gupta', '2023-05-10 08:26:53', '2023-05-10 08:26:53'),
(3, 'uploads/CSVFiles\\college886-file.csv', '1', 'Mr Mithun Gupta', '2023-05-10 08:28:19', '2023-05-10 08:28:19'),
(4, 'uploads/CSVFiles\\college784-file.csv', '1', 'Mr Mithun Gupta', '2023-05-10 09:05:30', '2023-05-10 09:05:30'),
(5, 'uploads/CSVFiles\\recruiter803-file.csv', '1', 'Mr Mithun Gupta', '2023-05-10 09:18:27', '2023-05-10 09:18:27'),
(6, 'uploads/CSVFiles\\student799-file.csv', '1', 'Mr Mithun Gupta', '2023-05-10 09:51:02', '2023-05-10 09:51:02'),
(7, 'uploads/CSVFiles\\student348-file.csv', '1', 'Mr Mithun Gupta', '2023-05-10 09:52:42', '2023-05-10 09:52:42'),
(8, 'uploads/CSVFiles\\student547-file.csv', '1', 'Mr Mithun Gupta', '2023-05-11 06:33:29', '2023-05-11 06:33:29'),
(9, 'uploads/CSVFiles/student284-file.csv', '1', 'Mr Mithun Gupta', '2023-05-12 11:38:11', '2023-05-12 11:38:11'),
(10, 'uploads/CSVFiles/student746-file.csv', '1', 'Mr Mithun Gupta', '2023-05-12 11:38:53', '2023-05-12 11:38:53'),
(11, 'uploads/CSVFiles/recruiter594-file.csv', '1', 'Mr Mithun Gupta', '2023-05-12 11:40:39', '2023-05-12 11:40:39'),
(12, 'uploads/CSVFiles/college245-file.csv', '1', 'Mr Mithun Gupta', '2023-05-12 11:43:43', '2023-05-12 11:43:43'),
(13, 'uploads/CSVFiles/course823-file.csv', '1', 'Mr Mithun Gupta', '2023-05-12 11:44:06', '2023-05-12 11:44:06'),
(14, 'uploads/CSVFiles/college427-file.csv', '132', 'Pratt and Spears Trading', '2023-05-13 19:30:41', '2023-05-13 19:30:41'),
(15, 'uploads/CSVFiles/course533-file.csv', '132', 'Pratt and Spears Trading', '2023-05-13 19:31:04', '2023-05-13 19:31:04'),
(16, 'uploads/CSVFiles/recruiter600-file.csv', '132', 'Pratt and Spears Trading', '2023-05-13 19:31:25', '2023-05-13 19:31:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `grading_schemes`
--

CREATE TABLE `grading_schemes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `create_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grading_schemes`
--

INSERT INTO `grading_schemes` (`id`, `name`, `create_date`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'Primary Education', '2015-12-14', 1, '2023-04-03 00:14:01', '2023-04-28 03:53:44'),
(4, 'CBSE', '1977-03-01', 1, '2023-04-05 22:52:51', '2023-04-28 03:53:31'),
(6, 'Secondary Scale 0-100 (Passing Grade - 40)', '1977-01-31', 1, '2023-04-05 22:53:05', '2023-04-28 03:52:49'),
(7, 'Other', '2023-04-28', 1, '2023-04-28 03:54:07', '2023-04-28 03:54:07');

-- --------------------------------------------------------

--
-- Table structure for table `highest_level_education`
--

CREATE TABLE `highest_level_education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `create_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `highest_level_education`
--

INSERT INTO `highest_level_education` (`id`, `name`, `create_date`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'Grade 3', '2003-12-25', 1, '2023-04-03 00:45:14', '2023-04-28 03:55:46'),
(3, 'Grade 4', '1978-11-10', 1, '2023-04-02 13:03:37', '2023-04-28 03:55:55'),
(5, 'Grade 12th or equivalent', '1988-11-14', 1, '2023-04-05 22:54:08', '2023-04-28 03:55:35'),
(6, 'Grade 1', '2012-04-29', 1, '2023-04-05 22:54:20', '2023-04-28 03:55:24'),
(7, 'Graduation', '2023-04-28', 1, '2023-04-28 03:56:08', '2023-04-28 03:56:08'),
(8, 'Diploma', '2023-04-28', 1, '2023-04-28 03:56:28', '2023-04-28 03:56:28');

-- --------------------------------------------------------

--
-- Table structure for table `lead_statuses`
--

CREATE TABLE `lead_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_by_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead_statuses`
--

INSERT INTO `lead_statuses` (`id`, `name`, `created_date`, `created_by`, `created_by_name`, `created_at`, `updated_at`) VALUES
(1, 'New', '1998-03-04', '1', 'Mr Mithun Gupta', '2023-04-08 04:20:04', '2023-04-08 11:32:33'),
(3, 'Draft', '2003-03-09', '1', 'Mr Mithun Gupta', '2023-04-08 04:21:46', '2023-04-08 11:32:24'),
(4, 'Process', '1998-10-30', '1', 'Mr Mithun Gupta', '2023-04-07 16:36:51', '2023-04-08 11:32:42'),
(5, 'Completed', '2023-04-08', '1', 'Mr Mithun Gupta', '2023-04-08 11:32:53', '2023-04-08 11:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_20_122024_create_sessions_table', 1),
(6, '2022_05_20_124158_create_password_resets_admin_table', 1),
(7, '2022_05_20_124457_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mou_detail`
--

CREATE TABLE `mou_detail` (
  `id` int(11) NOT NULL,
  `recruiter_id` int(11) NOT NULL,
  `reference_id` varchar(255) DEFAULT NULL,
  `signature_image` varchar(255) DEFAULT NULL,
  `mou_agreement_file` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mou_detail`
--

INSERT INTO `mou_detail` (`id`, `recruiter_id`, `reference_id`, `signature_image`, `mou_agreement_file`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 102, NULL, NULL, 'ibkaran05@gmail.com645804d85a030.pdf', 102, '2023-05-08 01:36:48', '2023-05-08 08:36:48'),
(2, 102, NULL, NULL, 'ibkaran05@gmail.com64648cbe0f773.pdf', 102, '2023-05-17 13:43:50', '2023-05-17 08:13:50'),
(3, 138, NULL, NULL, 'Wood and Chaney Inc64648ea90eade.pdf', 138, '2023-05-17 13:52:01', '2023-05-17 08:22:01'),
(4, 139, NULL, NULL, 'Hester and Sellers LLC64648fba44ae0.pdf', 139, '2023-05-17 13:56:34', '2023-05-17 08:26:34'),
(5, 139, NULL, NULL, 'Hester and Sellers LLC6464901680e99.pdf', 139, '2023-05-17 13:58:06', '2023-05-17 08:28:06'),
(6, 139, NULL, NULL, 'Hester and Sellers LLC64649024d88bc.pdf', 139, '2023-05-17 13:58:20', '2023-05-17 08:28:20'),
(7, 139, NULL, NULL, 'Hester and Sellers LLC6464911d9561b.pdf', 139, '2023-05-17 14:02:29', '2023-05-17 08:32:29'),
(8, 139, NULL, NULL, 'Hester and Sellers LLC6464916221d0d.pdf', 139, '2023-05-17 14:03:38', '2023-05-17 08:33:38'),
(9, 139, NULL, NULL, 'Hester and Sellers LLC64649170c7241.pdf', 139, '2023-05-17 14:03:52', '2023-05-17 08:33:52'),
(10, 139, NULL, NULL, 'Hester and Sellers LLC646491b7f2c54.pdf', 139, '2023-05-17 14:05:04', '2023-05-17 08:35:04'),
(11, 139, NULL, NULL, 'Hester and Sellers LLC646491bb7df87.pdf', 139, '2023-05-17 14:05:07', '2023-05-17 08:35:07'),
(12, 102, NULL, NULL, 'ibkaran05@gmail.com6464bbad44aa5.pdf', 102, '2023-05-17 17:04:05', '2023-05-17 11:34:05'),
(13, 102, NULL, NULL, 'ibkaran05@gmail.com6464bbcb9047b.pdf', 102, '2023-05-17 17:04:35', '2023-05-17 11:34:35'),
(14, 102, NULL, NULL, 'ibkaran05@gmail.com6464bbd0eb68a.pdf', 102, '2023-05-17 17:04:40', '2023-05-17 11:34:40'),
(15, 102, NULL, NULL, 'ibkaran05@gmail.com6464bc3cbef18.pdf', 102, '2023-05-17 17:06:28', '2023-05-17 11:36:28'),
(16, 139, NULL, NULL, 'Hester and Sellers LLC6464bcef2e739.pdf', 139, '2023-05-17 17:09:27', '2023-05-17 11:39:27'),
(17, 102, NULL, NULL, 'ibkaran05@gmail.com6464bd502573d.pdf', 102, '2023-05-17 17:11:04', '2023-05-17 11:41:04'),
(18, 139, NULL, NULL, 'Hester and Sellers LLC6464ef6d83dba.pdf', 139, '2023-05-17 20:44:53', '2023-05-17 15:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('18ddf2b1-6c77-46a4-be84-2cadff60b665', 'App\\Notifications\\Recruiter\\LeadNotification', 'App\\Models\\User', 70, '{\"name\":\"ibkaran05@gmail.com\",\"email\":\"ibkaran05@gmail.com\",\"phone\":null,\"role\":\"recruiter\",\"lead_name\":\"vusegu@mailinator.com\",\"lead_email\":\"vusegu@mailinator.com\",\"action\":\"Add Lead\"}', NULL, '2023-05-02 19:14:51', '2023-05-02 19:14:51'),
('1fb44cf1-3382-4232-8381-cae9dfa678b3', 'App\\Notifications\\RM\\LeadAssignNotification', 'App\\Models\\User', 2, '{\"name\":\"salman RM\",\"email\":\"rm@gmail.com\",\"phone\":null,\"role\":\"rm\",\"lead_name\":\"zohaibkhan4822+1@gmail.com\",\"lead_email\":\"zohaibkhan4822+1@gmail.com\",\"action\":\"Lead Assign\"}', NULL, '2023-04-26 06:30:10', '2023-04-26 06:30:10'),
('36bd308d-c8c9-47a4-a5c2-dc4c6742c3cd', 'App\\Notifications\\Recruiter\\LeadNotification', 'App\\Models\\User', 43, '{\"name\":\"ibkaran05@gmail.com\",\"email\":\"ibkaran05@gmail.com\",\"phone\":null,\"role\":\"recruiter\",\"lead_name\":\"vusegu@mailinator.com\",\"lead_email\":\"vusegu@mailinator.com\",\"action\":\"Add Lead\"}', NULL, '2023-05-02 19:14:50', '2023-05-02 19:14:50'),
('c5c187f6-d47a-4b52-b58e-fe99a5d28b69', 'App\\Notifications\\Recruiter\\LeadNotification', 'App\\Models\\Admin', 1, '{\"name\":\"recruiter\",\"email\":\"recruiter@gmail.com\",\"phone\":null,\"role\":\"recruiter\",\"lead_name\":\"zohaibkhan4822+1@gmail.com\",\"lead_email\":\"zohaibkhan4822+1@gmail.com\",\"action\":\"Add Lead\"}', NULL, '2023-04-26 06:05:26', '2023-04-26 06:05:26'),
('cb73b9cf-cd34-4b5b-95f8-ef95a4302247', 'App\\Notifications\\Recruiter\\LeadNotification', 'App\\Models\\User', 42, '{\"name\":\"recruiter\",\"email\":\"recruiter@gmail.com\",\"phone\":null,\"role\":\"recruiter\",\"lead_name\":\"zohaibkhan4822+1@gmail.com\",\"lead_email\":\"zohaibkhan4822+1@gmail.com\",\"action\":\"Add Lead\"}', NULL, '2023-04-26 06:05:27', '2023-04-26 06:05:27'),
('e1afae8a-496a-4c8d-be30-1e36b34a484d', 'App\\Notifications\\Recruiter\\LeadNotification', 'App\\Models\\User', 70, '{\"name\":\"recruiter\",\"email\":\"recruiter@gmail.com\",\"phone\":null,\"role\":\"recruiter\",\"lead_name\":\"zohaibkhan4822+1@gmail.com\",\"lead_email\":\"zohaibkhan4822+1@gmail.com\",\"action\":\"Add Lead\"}', NULL, '2023-04-26 06:05:29', '2023-04-26 06:05:29'),
('e55e0307-d2da-4a98-805d-74e4d9b104f1', 'App\\Notifications\\Recruiter\\LeadNotification', 'App\\Models\\User', 42, '{\"name\":\"ibkaran05@gmail.com\",\"email\":\"ibkaran05@gmail.com\",\"phone\":null,\"role\":\"recruiter\",\"lead_name\":\"vusegu@mailinator.com\",\"lead_email\":\"vusegu@mailinator.com\",\"action\":\"Add Lead\"}', NULL, '2023-05-02 19:14:49', '2023-05-02 19:14:49'),
('edc67ba0-578b-4567-b9d3-1190efa721bf', 'App\\Notifications\\Recruiter\\LeadNotification', 'App\\Models\\Admin', 1, '{\"name\":\"ibkaran05@gmail.com\",\"email\":\"ibkaran05@gmail.com\",\"phone\":null,\"role\":\"recruiter\",\"lead_name\":\"vusegu@mailinator.com\",\"lead_email\":\"vusegu@mailinator.com\",\"action\":\"Add Lead\"}', NULL, '2023-05-02 19:14:47', '2023-05-02 19:14:47'),
('f094991b-a278-4084-8a68-ace8ba757033', 'App\\Notifications\\Recruiter\\LeadNotification', 'App\\Models\\User', 43, '{\"name\":\"recruiter\",\"email\":\"recruiter@gmail.com\",\"phone\":null,\"role\":\"recruiter\",\"lead_name\":\"zohaibkhan4822+1@gmail.com\",\"lead_email\":\"zohaibkhan4822+1@gmail.com\",\"action\":\"Add Lead\"}', NULL, '2023-04-26 06:05:28', '2023-04-26 06:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mithungupta781@gmail.com', '$2y$10$n9FbuB.gadyk1DonExsY1umalWw4GkdK9S.w8RdcDjp5GNtgoKm9m', '2023-02-03 23:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets_admin`
--

CREATE TABLE `password_resets_admin` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'delete', '2023-04-05 01:12:23', '2023-04-05 01:31:30'),
(4, 'update', '2023-04-05 01:31:46', '2023-04-05 01:31:46'),
(5, 'create', '2023-04-05 01:31:55', '2023-04-05 01:31:55'),
(6, 'user list', '2023-04-05 02:30:13', '2023-04-05 02:30:13'),
(7, 'student create', '2023-04-05 02:30:32', '2023-04-04 14:20:57'),
(8, 'recruiter add', '2023-04-04 14:20:45', '2023-04-04 14:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(14, 'App\\Models\\User', 127, 'API Token', 'e761acdbfa818d0df9e16b251634a148d359efaac5c0f98c62efe819214662a6', '[\"*\"]', NULL, '2023-05-09 13:01:59', '2023-05-09 13:01:59'),
(16, 'App\\Models\\User', 127, 'API Token', '4dc6a7605bafda76a1fb43e3fd31ae6f926a4ca08690db357562f4c41ac1b069', '[\"*\"]', NULL, '2023-05-10 11:54:23', '2023-05-10 11:54:23'),
(17, 'App\\Models\\User', 127, 'API Token', '3a01ccda48aeae24a97ccedafd1ef3bb332c621ee0c902fc8d558cdb0fba797e', '[\"*\"]', NULL, '2023-05-10 12:42:23', '2023-05-10 12:42:23'),
(18, 'App\\Models\\User', 127, 'API Token', '8cb0eb489a7c15ba3f10ba0bc8722dba56ec5f2e16d8305fdbf77bcec4ba6097', '[\"*\"]', NULL, '2023-05-10 13:05:31', '2023-05-10 13:05:31'),
(24, 'App\\Models\\User', 127, 'API Token', 'b46a4bc107cc8af469d561bd61495846a2e9ea73365526ed35617da1c7aed0f6', '[\"*\"]', NULL, '2023-05-13 11:06:34', '2023-05-13 11:06:34'),
(25, 'App\\Models\\User', 127, 'API Token', '5dda4c6324f8f965e4e1ed902e544082c7df3237af236a1bb5a34d026d8b981a', '[\"*\"]', NULL, '2023-05-13 11:06:50', '2023-05-13 11:06:50'),
(52, 'App\\Models\\User', 80, 'API Token', 'c0a8e2314f359ac18a99f21426310c57932bb718b582567a025ceba5cc0db2a9', '[\"*\"]', '2023-05-23 10:11:39', '2023-05-23 09:55:25', '2023-05-23 10:11:39'),
(53, 'App\\Models\\User', 80, 'API Token', 'f048f06862170fb7d7e7c292e336c219537c356631c567d09bd281c35f6d7394', '[\"*\"]', '2023-05-23 10:00:06', '2023-05-23 09:59:47', '2023-05-23 10:00:06'),
(54, 'App\\Models\\User', 80, 'API Token', '420d01b9a93f65654aff21cf21d3e49779070a35515eb93883e3f53d2debd491', '[\"*\"]', '2023-05-23 11:16:28', '2023-05-23 10:18:47', '2023-05-23 11:16:28'),
(55, 'App\\Models\\User', 80, 'API Token', '5a2d2331a7bc73977972a2ae24941fb4db6bf7f2a5731243258fb1ee6eb7ad8b', '[\"*\"]', NULL, '2023-05-23 11:27:43', '2023-05-23 11:27:43'),
(56, 'App\\Models\\User', 80, 'API Token', '96872660d8b9021a3906a42771d406b044ddb292cae82cd0d66e410390c220f1', '[\"*\"]', NULL, '2023-05-23 11:56:23', '2023-05-23 11:56:23'),
(57, 'App\\Models\\User', 80, 'API Token', '91211123cd6bec23d30f7281010855a495a78942bb5eb2f9f5cd0c181629f942', '[\"*\"]', NULL, '2023-05-24 10:41:45', '2023-05-24 10:41:45'),
(58, 'App\\Models\\User', 80, 'API Token', 'cb9e7bafdba3f6cab16b1b24de64164634ffc3e533bf5b45c1e6fb2e7853be95', '[\"*\"]', NULL, '2023-05-24 11:10:38', '2023-05-24 11:10:38'),
(59, 'App\\Models\\User', 80, 'API Token', 'c362e76ddd134774514019182d7cf6c2a11aa3cbe3d1af9743e57d23999facbd', '[\"*\"]', NULL, '2023-05-24 11:44:40', '2023-05-24 11:44:40'),
(60, 'App\\Models\\User', 80, 'API Token', '931776c39c2c13c35264354e1287283a7bba24178207485f7998b8ef52ac1b48', '[\"*\"]', NULL, '2023-05-25 10:07:40', '2023-05-25 10:07:40'),
(61, 'App\\Models\\User', 80, 'API Token', 'd93cb634054d1b656192cbe808ed366cf32ea30522a5b0ea77dc44c53826d04c', '[\"*\"]', '2023-05-25 11:28:54', '2023-05-25 10:33:02', '2023-05-25 11:28:54'),
(62, 'App\\Models\\User', 80, 'API Token', '0095f2c57697c74047dcafc6bd1aeec447ea2bd2ce3b228ab077413d045a0e2f', '[\"*\"]', '2023-05-25 12:16:15', '2023-05-25 11:57:37', '2023-05-25 12:16:15'),
(63, 'App\\Models\\User', 80, 'API Token', '8db520bf76e43a9df9e1890a7054e676d75db7aa71273b35569ad124d4868152', '[\"*\"]', NULL, '2023-05-25 12:25:14', '2023-05-25 12:25:14'),
(64, 'App\\Models\\User', 80, 'API Token', '0f07985a59b443d72d195051834d961f6e5de82359956945d00fc92fc594f1e5', '[\"*\"]', '2023-05-25 13:09:23', '2023-05-25 12:35:23', '2023-05-25 13:09:23'),
(65, 'App\\Models\\User', 80, 'API Token', '144e73cfd47297a74322110d36d7391e6e9c6135ac04a99b5de0e1d4fe37a86e', '[\"*\"]', NULL, '2023-05-26 09:33:49', '2023-05-26 09:33:49'),
(66, 'App\\Models\\User', 80, 'API Token', '5f6a8221d5cfe8ef6d82f24840a00b481ce33fef33ae8483b58fee036c9c5955', '[\"*\"]', NULL, '2023-05-26 10:57:52', '2023-05-26 10:57:52'),
(67, 'App\\Models\\User', 80, 'API Token', 'f07fb25c011ee412472f5c90d4a3f1a7d8094761f418378ef8b094a74be4f75a', '[\"*\"]', NULL, '2023-05-26 11:13:06', '2023-05-26 11:13:06'),
(68, 'App\\Models\\User', 80, 'API Token', '64329390325b5f6bee5f7d308280c2044010aff0a52b78ebd55be50936e61949', '[\"*\"]', NULL, '2023-05-26 11:43:01', '2023-05-26 11:43:01'),
(69, 'App\\Models\\User', 80, 'API Token', 'b14ef7a7d87f66815fe9774ebd05a9525e8585e2c88debfbbe75ece8e5f6e032', '[\"*\"]', '2023-05-27 14:08:17', '2023-05-27 08:17:39', '2023-05-27 14:08:17'),
(70, 'App\\Models\\User', 80, 'API Token', '12a4ee769b8b9df3e02ccf6af2b71f2198434b741db22fd606227e38b2dfd46f', '[\"*\"]', '2023-05-29 09:08:12', '2023-05-29 09:06:36', '2023-05-29 09:08:12');

-- --------------------------------------------------------

--
-- Table structure for table `recruiters`
--

CREATE TABLE `recruiters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `company_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedIn` varchar(255) DEFAULT NULL,
  `student_source` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postal_zip` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `skype` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `referred` varchar(255) DEFAULT NULL,
  `recruiting_from_date` varchar(255) DEFAULT NULL,
  `services` longtext DEFAULT NULL,
  `students_from` varchar(255) DEFAULT NULL,
  `institute` longtext DEFAULT NULL,
  `associations` varchar(255) DEFAULT NULL,
  `recruiting_from_country` varchar(255) DEFAULT NULL,
  `students_per_year` varchar(255) DEFAULT NULL,
  `service_fee` varchar(255) DEFAULT NULL,
  `refer_student_bureau` varchar(255) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `reference_name` varchar(255) DEFAULT NULL,
  `reference_institution` varchar(255) DEFAULT NULL,
  `reference_institution_email` varchar(255) DEFAULT NULL,
  `reference_institution_contact` varchar(255) DEFAULT NULL,
  `reference_institution_website` varchar(255) DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `business_certificate` varchar(255) DEFAULT NULL,
  `declare_confirm` varchar(255) DEFAULT NULL,
  `terms_conditions` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_by_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recruiters`
--

INSERT INTO `recruiters` (`id`, `unique_id`, `user_id`, `company_name`, `email`, `password`, `website`, `facebook`, `instagram`, `twitter`, `linkedIn`, `student_source`, `first_name`, `last_name`, `address`, `city`, `state`, `country`, `postal_zip`, `phone`, `mobile`, `skype`, `whatsapp`, `referred`, `recruiting_from_date`, `services`, `students_from`, `institute`, `associations`, `recruiting_from_country`, `students_per_year`, `service_fee`, `refer_student_bureau`, `comments`, `reference_name`, `reference_institution`, `reference_institution_email`, `reference_institution_contact`, `reference_institution_website`, `company_logo`, `business_certificate`, `declare_confirm`, `terms_conditions`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `created_by_name`) VALUES
(1, NULL, NULL, 'Web Developer', 'developer@gmail.com', NULL, 'https://admissionfx.com/', 'https://admissionfx.com/', 'https://admissionfx.com/', 'https://admissionfx.com/', 'https://admissionfx.com/', 'Belgium', 'Web', 'developer', 'st #01', 'City 01', 'state 01', 'Ethiopia', '234555', '03059550279', '03059550279', 'aass1122', '03059550279', 'asd asd asd', NULL, 'asd  asd asd asd asd asd asd asd', 'canada america other', 'asd asd asd asd asd asd asd asd asd asd asd asd asd', 'asd fgh zxc bnm', 'Congo, The Democratic Republic of The', '1-5', '200-500', '21-50', 'asds kjlkjlk asdasd wrwerw ioiioi', 'Web developer', 'softwarehouse', 'software@gmail.com', '0343857658', 'https://admissionfx.com/', '2023-03-28-wKVK64223fd47d6bf.eeessse.PNG', '2023-03-28-wKVK64223fd47d8ec.ag.PNG', '1', '1', 1, '2023-03-27 19:46:04', '2023-03-27 19:46:04', NULL, NULL, ''),
(8, NULL, NULL, 'Olsen and Holloway Inc.', 'fajohapa@mailinator.com', '12345', 'https://www.cup.mobi', 'Sopoline Stanton', 'Illo Nam eiusmod nos', 'Facilis et quia nost', 'Qui libero aute dolo', 'Belize', 'Coby', 'Sullivan', 'Pariatur Culpa et f', 'Elit ad non laborio', 'Do mollit dolores ip', 'Bahamas', '87757', '+1 (621) 467-7419', '+1 (989) 342-2213', 'Cupiditate pariatur', 'Quia voluptatem dic', 'Ebony Flynn', NULL, 'Eius voluptatum comm', 'america', 'Cum corporis dicta i', 'Rem delectus magni', 'Qatar', '1-5', '2500+', '1-5', 'Minus necessitatibus', 'Montana Martinez', 'Remedios Eaton', 'vicopy@mailinator.com', '33', 'https://www.zev.ca', '2023-03-28-j9Wg64226a7a72060.632c21b24ed73.png', '2023-03-28-j9Wg64226a7a72af1.1.docx', '1', '1', 1, '2023-03-27 22:48:02', '2023-03-30 14:35:40', NULL, NULL, ''),
(9, NULL, NULL, 'BitCoderLabs pvt Ltd', 'bitcoder@gmail.com', '$2y$10$QEo9KUQm4iBJF7cQT9vjS.nKQrVwwik3zAOdkcFkk6AaVH0z94u0m', 'http://website.com', 'https://admissionfx.com/', 'https://admissionfx.com/', 'https://admissionfx.com/', 'https://admissionfx.com/', 'Congo, The Democratic Republic of The', 'BitCoder', 'Labs', 'IT park Peshawar', 'Peshawar', 'kpk', 'Pakistan', '24000', '5346765667', '13123123', '13sdasd', 'asdasd34234', NULL, NULL, 'wqewqeqwe', 'canada', 'qweqwea', 'asdasdasd', 'Cape Verde', '51-250', '2500+', '251+', 'asdasdd', 'asdasdas', 'asdasdasd', 'asdasd', NULL, 'asdasdasd', NULL, NULL, '1', '1', 1, '2023-03-31 00:57:28', '2023-03-31 15:07:56', NULL, NULL, ''),
(10, '64272e0a392ea', NULL, 'Moody Roth LLC', 'janigisuqu@mailinator.com', 'xJYEFbGOzq', 'https://www.lesicaloxip.info', 'Vladimir Knox', 'Est labore consequun', 'Sit aliquam assumend', 'Quia tempor ab ipsum', 'Poland', 'Ciara', 'Caldwell', 'Earum illo ad autem', 'Vel id quaerat odio', 'Rerum facilis hic si', 'Western Sahara', '17560', '+1 (289) 172-5131', '+1 (161) 916-2719', 'Est vel autem a duci', 'Dicta ipsum rem pla', 'Joan Barlow', NULL, 'Non quas iure ullamc', 'america other', 'Quidem voluptatibus', 'Ut ab dolorum ab cul', 'Argentina', '6-20', '1000-2500', '6-20', 'Incididunt quidem qu', 'Nicole York', 'Clayton Foster', 'begofiqa@mailinator.com', '76', 'https://www.pocyfyfyr.net', NULL, NULL, '1', '1', 1, '2023-03-31 13:31:30', '2023-03-31 13:31:30', NULL, NULL, ''),
(11, '6428892b0570a', NULL, 'Bruce and Levy Plc', 'gicukejuni@mailinator.com', NULL, 'https://www.qewo.com.au', 'Zeus Acevedo', 'Accusamus obcaecati', 'Dolore nemo obcaecat', 'Labore irure atque v', 'Holy See (Vatican City State)', 'Kato', 'Berg', 'Dolor alias nemo rem', 'Ab tempora pariatur', 'Rerum do consequatur', 'Belarus', '74719', '+1 (282) 379-8893', '+1 (446) 731-8869', 'Molestias eu ea iure', 'Deleniti beatae ea n', 'Macon Valencia', NULL, 'Ad corrupti sed dol', 'canada other', 'Maiores id adipisci', 'Omnis unde iusto por', 'Somalia', '6-20', '0-200', '21-50', 'Recusandae Iure tot', 'Carson Madden', 'Wallace Oliver', 'koxuvuqaqo@mailinator.com', '36', 'https://www.bewybiji.biz', NULL, NULL, '1', '1', 1, '2023-04-01 14:12:35', '2023-04-01 14:12:35', NULL, NULL, ''),
(12, '642897d2beb09', NULL, 'Lawson', 'qiqeqyse@mailinator.com', NULL, 'https://www.cypuqud.info', 'Rama Wolf', 'Itaque officia volup', 'Ea consequatur est', 'Officia quas quos am', 'Ghana', 'Deborah', 'Andrews', 'Est ut anim ad iste', 'Voluptatem eligendi', 'Eveniet optio exce', 'Malawi', '14490', '+1 (873) 835-7213', '+1 (482) 743-9233', 'Aperiam error volupt', 'Porro pariatur Exce', 'Jasper Morales', NULL, 'Enim velit ipsum eni', 'other', 'Voluptatibus minim v', 'Repudiandae ducimus', 'Armenia', '1-5', '200-500', '51-250', 'Consequat Cupidatat', 'Steel Underwood', 'Keaton Hoover', 'vymoquw@mailinator.com', '16', 'https://www.fyw.net', NULL, NULL, '1', '1', 1, '2023-04-01 15:15:06', '2023-04-06 02:12:18', NULL, NULL, ''),
(13, 'UB001', NULL, 'Case and Huff Trading', 'kiku@mailinator.com', NULL, 'https://www.zufazix.ca', 'Palmer Watts', 'Culpa et ut volupta', 'Excepturi qui natus', 'Omnis proident perf', 'Bahrain', 'Aristotle', 'Fitzgerald', 'Adipisicing ut accus', 'Nemo voluptatem qua', 'Deserunt vel et veri', 'Hungary', '90315', '+1 (355) 728-4389', '+1 (759) 245-2806', 'Et enim magni Nam au', 'Unde vero non et eni', 'Palmer Downs', NULL, 'Ipsum pariatur Cons', 'canada america other', 'Voluptatem Magnam l', 'In atque duis praese', 'Timor-leste', '1-5', '200-500', '6-20', 'Amet occaecat volup', 'Nathaniel Eaton', 'Britanni Mcmahon', 'tefocekaxa@mailinator.com', '6', 'https://www.kohimaho.org.uk', NULL, NULL, '1', '1', 1, '2023-04-02 03:53:47', '2023-04-06 02:11:45', '2023-04-06 02:11:45', NULL, ''),
(14, 'UB002', NULL, 'Bird and Cantrell Associates', 'kysujyt@mailinator.com', NULL, 'https://www.rojiwyjyzap.ws', 'Belle Cooke', 'Temporibus excepturi', 'Vel sint architecto', 'Laborum Quo reprehe', 'Sierra Leone', 'Keefe', 'Webb', 'Dolor vel explicabo', 'Et optio cumque por', 'Nemo maiores in opti', 'Marshall Islands', '95230', '+1 (624) 809-7702', '+1 (368) 324-3458', 'Laboriosam veniam', 'Facere molestiae con', 'Amelia Roy', NULL, 'Duis ratione ad inve', 'canada', 'Nihil mollit iusto f', 'Veniam aperiam tota', 'Colombia', '251+', '200-500', '51-250', 'Commodo dolorem labo', 'Jasmine Fuentes', 'Clarke Wheeler', 'ficete@mailinator.com', '50', 'https://www.gilenev.cm', NULL, NULL, '1', '1', 1, '2023-04-02 03:54:04', '2023-04-02 03:54:04', NULL, NULL, ''),
(15, 'UB006', 1, 'Wooten and Mosley Traders', 'qetati@mailinator.com', '$2y$10$J7mQlZilnYBi5KQWFa1elOPEDz1pcebZPGP8gj7aWDHe51dVyFyjO', 'https://www.pubypezolefegyg.cc', 'Garrison Price', 'Illo doloremque cons', 'Qui maxime velit di', 'Rerum nesciunt id', 'Ukraine', 'Clinton', 'Alexander', 'Quia voluptatem Con', 'Quam aperiam facilis', 'Aut laboris deserunt', 'Falkland Islands (Malvinas)', '85531', '+1 (263) 839-8688', '+1 (834) 539-2295', 'Commodo quia qui lor', 'Quia molestias dolor', 'Xerxes Stuart', NULL, 'Dolorem nisi quia ex', 'america other', 'Sunt quis do velit', 'Impedit repellendus', 'Korea, Republic of', '6-20', '1000-2500', '51-250', 'Laudantium nesciunt', 'Caldwell Williamson', 'Jerry Duffy', 'hexeb@mailinator.com', '77', 'https://www.wyqonehe.com', NULL, NULL, '1', '1', 1, '2023-04-04 03:19:54', '2023-04-06 02:11:10', '2023-04-06 02:11:10', NULL, ''),
(16, 'UB007', 28, 'Butler and Dennis LLC', 'mynowy@mailinator.com', '$2y$10$xdjkok..7t3wWpHrE/zJCujs7bmcno1ccGHTaMmBcw0oeSZlf13Lq', 'https://www.giqerehisomeg.org', 'Sean Jacobs', 'Sed dolor illo aut o', 'Deleniti amet labor', 'Odio nulla dolore vo', 'Aruba', 'Boris', 'Prince', 'Nobis eaque fugit e', 'Nihil odio qui rerum', 'Culpa sit sed faci', 'Argentina', '52079', '+1 (501) 802-8116', '+1 (618) 332-4144', 'Ab qui aspernatur te', 'Ut ea corporis itaqu', 'Flavia Petty', NULL, 'Aut quia pariatur E', 'canada other', 'Officiis sint exerci', 'Voluptatem ad culpa', 'Niue', '251+', '2500+', '51-250', 'Molestias Nam est do', 'Chiquita Barnett', 'Hector Noble', 'hyga@mailinator.com', '84', 'https://www.hopunuxof.mobi', NULL, NULL, '1', '1', 1, '2023-04-04 04:17:41', '2023-04-21 03:56:08', NULL, NULL, ''),
(17, 'UB008', 30, 'Mills and Donovan Trading', 'wadyj@mailinator.com', NULL, 'https://www.voqagudevoqywa.co.uk', 'Ariana Woodward', 'Corporis omnis recus', 'Praesentium et incid', 'Reprehenderit eaque', 'Cape Verde', 'Yasir', 'Lopez', 'Duis non dignissimos', 'Ea omnis irure tempo', 'Odio cumque reiciend', 'Liechtenstein', '35064', '+1 (398) 782-1471', '+1 (308) 813-8718', 'Recusandae Dolores', 'Culpa cumque aut qu', 'Alan Garrison', NULL, 'Iure doloremque temp', 'canada america other', 'Reiciendis cum sint', 'Qui illum omnis vol', 'Netherlands Antilles', '1-5', '0-200', '251+', 'Sed impedit volupta', 'Ulric Turner', 'Martena Barry', 'gekovibyt@mailinator.com', '60', 'https://www.devanarodiraw.net', NULL, NULL, '1', '1', 1, '2023-04-06 00:55:39', '2023-04-06 00:55:39', NULL, NULL, ''),
(18, 'UB009', 31, 'Harmon Bass Inc', 'fyryvoxus@mailinator.com', NULL, 'https://www.goxobilezygy.mobi', 'Brielle Washington', 'Doloremque eligendi', 'Eius iste et atque s', 'Eiusmod anim tenetur', 'Svalbard and Jan Mayen', 'Ruby', 'Frost', 'Non qui vel unde nih', 'Illo nisi officia od', 'Ullam esse est ex d', 'Moldova, Republic of', '14602', '+1 (328) 729-5623', '+1 (516) 924-2804', 'Id hic dolorem est', 'Doloribus error veli', 'Dale Burch', NULL, 'Ducimus ut aut corr', 'canada america other', 'Non omnis accusantiu', 'Qui beatae id iste q', 'Liechtenstein', '251+', '200-500', '21-50', 'Et labore quia digni', 'Gisela Hartman', 'Velma Turner', 'sozef@mailinator.com', '78', 'https://www.hugysygon.org', NULL, NULL, '1', '1', 1, '2023-04-06 01:58:00', '2023-04-06 01:58:01', NULL, 30, 'wadyj@mailinator.com'),
(19, 'UB010', 32, 'Barnes and Langley Inc', 'wuzunymyni@mailinator.com', NULL, 'https://www.tufefovow.info', 'Helen Bernard', 'Explicabo Optio la', 'Et sed magnam simili', 'Obcaecati eos ea pa', 'Tuvalu', 'Harlan', 'Thomas', 'Sed repellendus Tot', 'Animi dignissimos m', 'Laudantium incididu', 'Papua New Guinea', '89910', '+1 (272) 744-4656', '+1 (655) 412-7074', 'Reprehenderit ut eve', 'Eu do iste dolorem f', 'Jordan William', NULL, 'Reprehenderit qui v', 'canada america other', 'Et assumenda blandit', 'Quae quae sed placea', 'Cyprus', '21-50', '0-200', '251+', 'Consectetur architec', 'Dylan Hendrix', 'Colin Pitts', 'fyfeviqifo@mailinator.com', '30', 'https://www.feruzefyfup.in', NULL, NULL, '1', '1', 1, '2023-04-06 01:59:49', '2023-04-11 23:52:24', NULL, 30, 'wadyj@mailinator.com'),
(20, 'UB011', 33, 'Contreras and Cunningham Traders', 'fifuwykoxi@mailinator.com', NULL, 'https://www.fizyjypur.info', 'Reece Hunter', 'Omnis sit et sunt v', 'Id est molestiae ma', 'Odio eaque excepturi', 'Mozambique', 'Blossom', 'Small', 'Ipsum nihil quis nos', 'Sit sed irure volup', 'Dolore magna debitis', 'Anguilla', '77963', '+1 (582) 552-5555', '+1 (645) 304-3699', 'Quisquam qui dolor d', 'Sit facilis labore', 'Maris Jenkins', NULL, 'Quo numquam in culpa', 'canada other', 'Cupidatat maxime tem', 'Tempore quia magni', 'Myanmar', '251+', '0-200', '1-5', 'Cupiditate voluptatu', 'Carson Kent', 'Jameson Miller', 'mibeqapej@mailinator.com', '33', 'https://www.pub.org', NULL, NULL, '1', '1', 1, '2023-04-06 02:04:58', '2023-04-11 15:50:59', NULL, 30, 'wadyj@mailinator.com'),
(25, 'UB019', 44, 'Burks and Melton Associates', 'jepufupys@mailinator.com', '$2y$10$ioaxY6yTc2KjOTCIL9kkUuCb5QXO9//CqTJBROnj/OuzsFwEW39py', 'https://www.qajed.biz', 'Brendan Dotson', 'Est fuga Mollit sus', 'In officiis deserunt', 'Iste laudantium con', 'Gabon', 'Lacy', 'Herrera', 'Fugiat ullam eum in', 'Do quia facere odio', 'Distinctio Dolor vo', 'Israel', '33468', '+1 (643) 317-8664', '+1 (144) 337-3781', 'Obcaecati sint sit', 'Minus facere ipsum', 'Jonas Gardner', NULL, 'Facilis libero est n', 'america', 'Rerum eaque sed sed', 'Optio rerum ut cons', 'Armenia', '21-50', '200-500', '1-5', 'Nemo nihil doloribus', 'Keane Mcconnell', 'Regan Freeman', 'cecisyfe@mailinator.com', '52', 'https://www.cerewucobuwe.ca', NULL, NULL, '1', '1', 1, '2023-04-11 15:52:33', '2023-04-18 13:18:52', NULL, 33, 'quhodo@mailinator.com'),
(22, 'UB013', 35, 'Sullivan and Roberson Inc', 'befihybawe@mailinator.com', NULL, 'https://www.wocozynoxuzes.info', 'Timon Shepard', 'Esse dolor labore re', 'Aute unde ut reicien', 'Illo quo eos amet v', 'Guinea', 'Wyoming', 'Morse', 'Quo sed maiores dign', 'Excepteur sapiente e', 'Saepe voluptatum dol', 'Slovakia', '15420', '+1 (796) 556-8872', '+1 (487) 957-8643', 'Amet laborum vel et', 'Sunt nesciunt repu', 'Ingrid Vega', NULL, 'Incididunt sapiente', 'america', 'Sunt dolore explicab', 'Ad minim ut et nihil', 'Antigua and Barbuda', '1-5', '1000-2500', '1-5', 'Exercitation sunt i', 'Scarlett Kinney', 'Craig Johnston', 'fimozohiq@mailinator.com', '54', 'https://www.zutadekoxixo.com', NULL, NULL, '1', '1', 1, '2023-04-05 22:42:49', '2023-04-05 22:42:49', NULL, 1, 'Mr Mithun Gupta'),
(23, 'UB014', 36, 'Cooper and Kirby Traders', 'nejim@mailinator.com', NULL, 'https://www.kyrihexotelined.ca', 'Nissim Johnson', 'Optio eveniet mole', 'Ex expedita sint vel', 'Omnis repudiandae au', 'Albania', 'Hilary', 'Massey', 'Ipsum ea cillum tot', 'Nostrud quis esse p', 'Consectetur qui tota', 'Ecuador', '12307', '+1 (381) 978-8849', '+1 (675) 714-2731', 'Nostrum perferendis', 'Est id ut expedita a', 'Kiona Santiago', NULL, 'Laboriosam ut imped', 'canada other', 'Eius quidem facere a', 'Enim incididunt rem', 'Bahamas', '21-50', '200-500', '6-20', 'Eu ex fugiat adipis', 'Ezekiel Cardenas', 'Ray Mccarty', 'tyripuvy@mailinator.com', '59', 'https://www.kyjuhyzumuqi.info', NULL, NULL, '1', '1', 1, '2023-04-05 22:47:49', '2023-04-05 22:48:17', '2023-04-05 22:48:17', 35, 'befihybawe@mailinator.com'),
(24, 'UB015', 37, 'Barnett and Manning Associates', 'heqipapak@mailinator.com', NULL, 'https://www.budydurivi.ca', 'Reagan Stafford', 'Corporis non labore', 'Nam ad reprehenderit', 'Nemo dolor mollit co', 'Bahamas', 'Jaquelyn', 'Payne', 'Officiis iure molest', 'Hic quis magnam sed', 'Neque dolor ut labor', 'Zambia', '52345', '+1 (531) 554-1592', '+1 (526) 846-4129', 'Magnam ullamco liber', 'Soluta commodo conse', 'Hu Kerr', NULL, 'Voluptate sint aspe', 'canada america', 'Voluptates et labore', 'Minim officiis quo v', 'Austria', '6-20', '2500+', '51-250', 'Nemo dolor ad dolore', 'Kellie Mays', 'Joelle Branch', 'pizad@mailinator.com', '96', 'https://www.lat.ws', NULL, NULL, '1', '1', 1, '2023-04-05 22:48:26', '2023-04-05 22:48:26', NULL, 35, 'befihybawe@mailinator.com'),
(26, 'UB021', 46, 'Carpenter and Dotson Co', 'salman.u360+rec@gmail.com', NULL, 'https://www.vofa.ca', 'Nomlanga Olsen', 'In quibusdam ut aute', 'Vel officia et tempo', 'Dolores omnis aperia', 'Malaysia', 'Lillith', 'Conway', 'Minus quia proident', 'Quae inventore odit', 'Voluptatibus duis do', 'Nicaragua', '42299', '234234', '234', 'Dolore sed voluptate', 'Vero recusandae Exc', 'Ishmael Donovan', NULL, 'Impedit rem volupta', 'canada', 'Doloremque iusto a e', 'Dolorum impedit con', 'Cook Islands', '1-5', '2500+', '6-20', 'Assumenda tempor des', 'Uta Harris', 'Erica Murphy', 'kitadaf@mailinator.com', '95', 'https://www.koviqejimycoku.me', '2023-04-19-Ccvo6440055923f51.632c21b24ed73.png', '2023-04-19-Ccvo64400559244cc.1.docx', '1', '1', 0, '2023-04-19 09:44:33', '2023-04-19 09:44:33', NULL, 1, 'Mr Mithun Gupta'),
(27, 'UB022', 47, 'Carpenter and Dotson Co', 'salman.u360+rec@gmail.com', NULL, 'https://www.vofa.ca', 'Nomlanga Olsen', 'In quibusdam ut aute', 'Vel officia et tempo', 'Dolores omnis aperia', 'Malaysia', 'Lillith', 'Conway', 'Minus quia proident', 'Quae inventore odit', 'Voluptatibus duis do', 'Nicaragua', '42299', '234234', '234', 'Dolore sed voluptate', 'Vero recusandae Exc', 'Ishmael Donovan', NULL, 'Impedit rem volupta', 'canada', 'Doloremque iusto a e', 'Dolorum impedit con', 'Cook Islands', '1-5', '2500+', '6-20', 'Assumenda tempor des', 'Uta Harris', 'Erica Murphy', 'kitadaf@mailinator.com', '95', 'https://www.koviqejimycoku.me', '2023-04-19-c347644005795a727.632c21b24ed73.png', '2023-04-19-c347644005795a8d6.1.docx', '1', '1', 0, '2023-04-19 09:45:05', '2023-04-19 09:45:05', NULL, 1, 'Mr Mithun Gupta'),
(28, 'UB023', 48, 'Carpenter and Dotson Co', 'salman.u360+rec@gmail.com', NULL, 'https://www.vofa.ca', 'Nomlanga Olsen', 'In quibusdam ut aute', 'Vel officia et tempo', 'Dolores omnis aperia', 'Malaysia', 'Lillith', 'Conway', 'Minus quia proident', 'Quae inventore odit', 'Voluptatibus duis do', 'Nicaragua', '42299', '234234', '234', 'Dolore sed voluptate', 'Vero recusandae Exc', 'Ishmael Donovan', NULL, 'Impedit rem volupta', 'canada', 'Doloremque iusto a e', 'Dolorum impedit con', 'Cook Islands', '1-5', '2500+', '6-20', 'Assumenda tempor des', 'Uta Harris', 'Erica Murphy', 'kitadaf@mailinator.com', '95', 'https://www.koviqejimycoku.me', '2023-04-19-ph2w6440059e4191b.632c21b24ed73.png', '2023-04-19-ph2w6440059e41ab7.1.docx', '1', '1', 0, '2023-04-19 09:45:42', '2023-04-19 09:45:42', NULL, 1, 'Mr Mithun Gupta'),
(29, 'UB024', 49, 'Bond Ingram Traders', 'salman.u360+rec1@gmail.com', NULL, 'https://www.boxonoqafido.ws', 'Medge Lawson', 'Amet voluptates sed', 'Quia et asperiores m', 'Quisquam eum soluta', 'Guatemala', 'Owen', 'Mcbride', 'Facere cupiditate lo', 'Facilis tempora aute', 'Expedita corporis en', 'Bulgaria', '81177', '34234', '234234', 'Fuga Amet veritati', 'Illum atque accusam', 'Raven Cantrell', NULL, 'Obcaecati et facere', 'canada other', 'Sed nostrud quis lab', 'Voluptatem cumque am', 'Nigeria', '6-20', '500-1000', '251+', 'Ullamco ipsam veniam', 'Leah Mccray', 'Kaden Bridges', 'gyhusi@mailinator.com', '58', 'https://www.dopexidonazegak.net', '2023-04-19-qsKZ64400d6fdffd0.632c21b24ed73.png', '2023-04-19-qsKZ64400d6fe05c2.1.docx', '1', '1', 0, '2023-04-19 10:19:03', '2023-04-19 10:19:04', NULL, 1, 'Mr Mithun Gupta'),
(30, 'UB025', 50, 'Bond Ingram Traders', 'salman.u360+rec1@gmail.com', NULL, 'https://www.boxonoqafido.ws', 'Medge Lawson', 'Amet voluptates sed', 'Quia et asperiores m', 'Quisquam eum soluta', 'Guatemala', 'Owen', 'Mcbride', 'Facere cupiditate lo', 'Facilis tempora aute', 'Expedita corporis en', 'Bulgaria', '81177', '34234', '234234', 'Fuga Amet veritati', 'Illum atque accusam', 'Raven Cantrell', NULL, 'Obcaecati et facere', 'canada other', 'Sed nostrud quis lab', 'Voluptatem cumque am', 'Nigeria', '6-20', '500-1000', '251+', 'Ullamco ipsam veniam', 'Leah Mccray', 'Kaden Bridges', 'gyhusi@mailinator.com', '58', 'https://www.dopexidonazegak.net', '2023-04-19-yS3y64400ef8773b1.632c21b24ed73.png', '2023-04-19-yS3y64400ef877c8f.1.docx', '1', '1', 0, '2023-04-19 10:25:36', '2023-04-19 10:25:36', NULL, 1, 'Mr Mithun Gupta'),
(31, 'UB026', 51, 'Bond Ingram Traders', 'salman.u360+rec1@gmail.com', NULL, 'https://www.boxonoqafido.ws', 'Medge Lawson', 'Amet voluptates sed', 'Quia et asperiores m', 'Quisquam eum soluta', 'Guatemala', 'Owen', 'Mcbride', 'Facere cupiditate lo', 'Facilis tempora aute', 'Expedita corporis en', 'Bulgaria', '81177', '34234', '234234', 'Fuga Amet veritati', 'Illum atque accusam', 'Raven Cantrell', NULL, 'Obcaecati et facere', 'canada other', 'Sed nostrud quis lab', 'Voluptatem cumque am', 'Nigeria', '6-20', '500-1000', '251+', 'Ullamco ipsam veniam', 'Leah Mccray', 'Kaden Bridges', 'gyhusi@mailinator.com', '58', 'https://www.dopexidonazegak.net', '2023-04-19-NmEq64400f6ecf91a.632c21b24ed73.png', '2023-04-19-NmEq64400f6ecfb40.1.docx', '1', '1', 0, '2023-04-19 10:27:34', '2023-04-19 10:27:34', NULL, 1, 'Mr Mithun Gupta'),
(32, 'UB027', 52, 'Bond Ingram Traders', 'salman.u360+rec1@gmail.com', NULL, 'https://www.boxonoqafido.ws', 'Medge Lawson', 'Amet voluptates sed', 'Quia et asperiores m', 'Quisquam eum soluta', 'Guatemala', 'Owen', 'Mcbride', 'Facere cupiditate lo', 'Facilis tempora aute', 'Expedita corporis en', 'Bulgaria', '81177', '34234', '234234', 'Fuga Amet veritati', 'Illum atque accusam', 'Raven Cantrell', NULL, 'Obcaecati et facere', 'canada other', 'Sed nostrud quis lab', 'Voluptatem cumque am', 'Nigeria', '6-20', '500-1000', '251+', 'Ullamco ipsam veniam', 'Leah Mccray', 'Kaden Bridges', 'gyhusi@mailinator.com', '58', 'https://www.dopexidonazegak.net', '2023-04-19-7oCn6440100e4a455.632c21b24ed73.png', '2023-04-19-7oCn6440100e4a6b9.1.docx', '1', '1', 0, '2023-04-19 10:30:14', '2023-04-19 10:30:14', NULL, 1, 'Mr Mithun Gupta'),
(33, 'UB029', 54, 'Sheppard Harding Associates', 'faha@mailinator.com', NULL, 'https://www.qogylozimigewir.us', 'Tara Howard', 'Aliqua Quam mollit', 'Do excepturi id dese', 'Est repudiandae repr', 'Sao Tome and Principe', 'Scarlet', 'Glenn', 'Cumque molestiae rep', 'Qui voluptatum aperi', 'Voluptatem tenetur q', 'Turks and Caicos Islands', '39953', '+1 (268) 754-5654', '+1 (326) 918-3162', 'Eligendi quis non qu', 'Minus laborum Exped', 'Jerry Woodward', NULL, 'Ut doloremque animi', 'america', 'Vel ipsam in adipisi', 'Asperiores dolorum a', 'Macao', '51-250', '200-500', '251+', 'Sunt qui pariatur', 'Beck Frederick', 'Chester Martin', 'kypuge@mailinator.com', '35', 'https://www.zilo.co.uk', NULL, NULL, '1', '1', 0, '2023-04-19 12:48:10', '2023-04-19 12:48:10', NULL, NULL, 'Sheppard Harding Associates'),
(34, 'UB030', 55, 'Bradshaw Horton Trading', 'bixuvyl@mailinator.com', NULL, 'https://www.nupixesojas.co', 'Margaret Pierce', 'Est rerum irure vel', 'Quasi labore sint n', 'Commodi sunt magnam', 'Netherlands', 'Lucy', 'Berger', 'Rem vitae consequatu', 'Aut beatae unde quid', 'Qui sed duis tempore', 'Kuwait', '53530', '+1 (538) 995-3368', '+1 (662) 629-1038', 'Lorem dolor sint dol', 'Sunt sint et velit', 'Scarlett Kline', NULL, 'Facilis rerum evenie', 'canada other', 'Est est aut rerum e', 'Iste dolore voluptat', 'Philippines', '6-20', '500-1000', '1-5', 'Consequatur iure ape', 'Sydney Perez', 'Lev Petersen', 'cecyb@mailinator.com', '92', 'https://www.rifuzym.biz', NULL, NULL, '1', '1', 1, '2023-04-19 12:48:50', '2023-04-26 00:12:25', NULL, NULL, 'Bradshaw Horton Trading'),
(35, 'UB031', 56, 'Bolton and Middleton Associates', 'nebikefy@mailinator.com', '$2y$10$imniWHlgPhRSgOhJmuadi.u7EIMu9.hvShXprrSMLo3z2P61fwKNa', 'https://www.hoviwegomuraza.org.uk', 'Dominique Hardy', 'Officia aut voluptat', 'Consequatur est mol', 'Et mollitia qui et e', 'Syrian Arab Republic', 'Teegan', 'Moody', 'Ad dolor occaecat ut', 'Sint qui non fugit', 'Exercitation consequ', 'Kyrgyzstan', '30792', '2131', '123', 'Et quia commodo moll', 'Autem nihil irure la', 'Bruce Fox', NULL, 'Inventore earum magn', 'canada', 'Aute voluptates quis', 'Enim repellendus Re', 'Cambodia', '21-50', '500-1000', '1-5', 'Expedita illo perfer', 'Sasha Harvey', 'Nasim Mccormick', 'maqi@mailinator.com', '52', 'https://www.wodudepaxixigun.mobi', '2023-04-20-zKhh644108bc152f0.632c21b24ed73.png', '2023-04-20-zKhh644108bc158c6.1.docx', '1', '1', 0, '2023-04-20 04:11:16', '2023-04-21 00:42:16', NULL, NULL, 'Bolton and Middleton Associates'),
(36, 'UB032', 57, 'Jordan Mack Trading', 'salman.u360+recweb@gmail.com', NULL, 'https://www.jacyza.biz', 'Venus Barlow', 'Enim natus consequat', 'Et nemo reprehenderi', 'Harum aliqua Ullam', 'Rwanda', 'Hadley', 'Reilly', 'Ut consequat Ad lab', 'Laboris consequatur', 'Laudantium iure und', 'Greece', '15547', '24324234', '1333', 'Cupiditate facere se', 'Dicta sequi anim vol', 'Jackson Levine', NULL, 'Et repudiandae dolor', 'america', 'Ut consequatur hic', 'Quae quos qui quas n', 'Kiribati', '1-5', '1000-2500', '21-50', 'Obcaecati consequat', 'Maggy Middleton', 'Kelly Koch', 'diwifyho@mailinator.com', '81', 'https://www.ducogod.ca', '2023-04-20-GSsB644108e643731.632c21b24ed73.png', '2023-04-26-iMpq64491849956d4.Screenshot (29).png', '1', '1', 1, '2023-04-20 04:11:58', '2023-04-26 06:55:45', NULL, 1, 'Mr Mithun Gupta'),
(37, 'UB033', 58, 'Dixon Calhoun Co', 'salman.u360+recweb1@gmail.com', '$2y$10$IfB86AULWigojqrDvfwb9enOBuMWRtCJZ32WoFehQ/3z6IDRu1rAe', 'https://www.hyrisu.com', 'Unity York', 'Sint quam qui dicta', 'Ipsum ut dicta est', 'Sint pariatur Pari', 'Venezuela', 'Guinevere', 'Morrow', 'Quae quod dolores ut', 'Dolorem quos et ut s', 'Quia reprehenderit l', 'Svalbard and Jan Mayen', '39738', '4234', '234', 'Dignissimos vitae do', 'Nulla sunt natus ill', 'Elijah Clarke', NULL, 'Consequatur nesciunt', 'canada', 'Eos id duis qui exer', 'Blanditiis dolor ame', 'Jordan', '21-50', '2500+', '51-250', 'Ea blanditiis tenetu', 'Unity Morrison', 'Sade Ellison', 'jusyhekuk@mailinator.com', '100', 'https://www.tujapykus.me.uk', '2023-04-20-4MaB64411a34d21a9.632c21b24ed73.png', '2023-04-20-4MaB64411a34d2456.1.docx', '1', '1', 0, '2023-04-20 05:25:48', '2023-04-21 16:58:43', NULL, NULL, 'Dixon Calhoun Co'),
(43, 'UB043', 68, 'dfkjgnvK', 'ggn@gmail.com', NULL, 'fn', 'jknjk', 'jn', 'kjn', 'nk', 'Albania', 'nkjn', 'kjn', 'kjn', 'kn', 'knk', 'Afghanistan', 'nkj', 'nk', 'nk', 'nk', 'nk', 'nk', NULL, 'nkn', 'canada', 'kn', 'kn', 'Afghanistan', '1-5', '0-200', '51-250', 'mjnkn', 'knmk', 'nm', 'n mk', '76878979881', 'nk', NULL, NULL, '1', '1', 0, '2023-04-21 07:23:43', '2023-04-21 14:28:32', '2023-04-21 14:28:32', 1, 'Mr Mithun Gupta'),
(44, 'UB044', 69, 'Mera new company', 'mithungupta781@gmail.com', '$2y$10$CpKYUy/zER0v08q18mnY0.6egKzy81M3q0g.spra6L4zX.r7GY0kS', 'infobirth', 'sjkfn', 'kjnk', 'kjn', 'kjn', 'India', 'Mithun', 'Gupta', 'Delhi', 'Delhi', 'Delhi', 'India', '201201', '9817876678', '9717686676', 'jji', 'jjkn', 'jnknk', NULL, 'jkfbjkkjnkm', 'america', 'knklnlk', 'knlklkl', 'India', '6-20', '200-500', '21-50', 'kjfbhijngvkfnmkl', 'Akash', 'Toyoti', 'abc@gmail.com', '87348348', 'djfbkj', '2023-04-21-hhQt6442ebe43669f.delete-user-15.jpg', '2023-04-21-hhQt6442ebe43694a.delete-user-16.jpg', '1', '1', 0, '2023-04-21 14:32:44', '2023-04-28 00:01:24', NULL, NULL, 'Mera new company'),
(42, 'UB042', 67, 'Infobirth', 'mithungupta781@gmail.com', '$2y$10$JlNffbCWFyH5Wj6SOMNO1.upoDOyjo8Ma7s3SwChwuEFG/xAV48DC', 'infobirth.com', '#', '#', '#', '#', 'India', 'Mithun', 'Gupta', 'Delhi', 'Delhi', 'Delhi', 'India', '201301', '9717860026', '9717850025', '#', '#', 'Rajan Arya', NULL, 'Visa', 'canada', 'jfijjkkjkj', 'kjbjkbk', 'India', '1-5', '500-1000', '51-250', 'no comments', 'Rajan Arya', 'Govinada Tutor', 'omkar@gmail.com', '3744657856875', '#', '2023-04-21-sVWj64426cf1c3239.delete-user-16.jpg', '2023-04-21-sVWj64426cf1c34cf.g-8.png', '1', '1', 1, '2023-04-21 05:31:05', '2023-04-21 14:30:39', '2023-04-21 14:30:39', 1, 'Mr Mithun Gupta'),
(41, 'UB040', 65, 'Dickson Knowles Co', 'salman.u360+rec1@gmail.com', NULL, 'https://www.tebavojyl.me', 'Grant Riley', 'Aspernatur maxime so', 'Dolores est aut repr', 'Quis consequatur ut', 'Swaziland', 'Quemby', 'Tucker', 'Dicta sequi tenetur', 'Eaque quod perferend', 'Officiis nulla sint', 'Japan', '88109', '24', '234234', 'Nihil elit veniam', 'Inventore ratione Na', 'Debra Kramer', NULL, 'Autem fugiat veniam', 'america', 'Ad deleniti repudian', 'Ullam id sit et culp', 'Germany', '51-250', '200-500', '1-5', 'Qui unde labore duis', 'Brielle Park', 'Portia Curtis', 'juvuqina@mailinator.com', '11', 'https://www.dubexux.tv', '2023-04-21-xZJg64425d797782c.632c21b24ed73.png', '2023-04-21-xZJg64425d7977e81.1.docx', '1', '1', 0, '2023-04-21 04:25:05', '2023-04-21 16:37:32', NULL, NULL, 'Dickson Knowles Co'),
(45, 'UB052', 80, '360techsolution', 'recruiter@gmail.com', NULL, 'www.google.com', 'abc', 'abc', 'abc', 'abc', 'India', 'Zohaib', 'khan', 'B/34, Bagh-e-Korangi, Sector 10, karachi', 'karachi', 'sindh', 'Pakistan', '75230', '+923062228262', '03062228262', 'abc', 'abc', 'no', NULL, 'abc', 'other', 'abc', 'abc', 'Pakistan', '21-50', '200-500', '21-50', 'abc', NULL, NULL, NULL, NULL, NULL, '2023-04-25-7lvO6447ae6a3c309.8b167af653c2399dd93b952a48740620.jpg', '2023-04-25-7lvO6447ae6a3c9d5.1-18387_orange-play-button-png-transparent-png.png', '1', '1', 0, '2023-04-25 05:11:46', '2023-04-25 05:11:46', NULL, NULL, '360techsolution'),
(46, 'UB055', 83, '360techsolution', 'zohaibkhan4822@gmail.com', '$2y$10$FdGVcWgS0LgmZ0LvFdaeduoNoWFuwi7dHToUIguxwTUqEPdayVdkq', 'www.google.com', 'abc', 'abc', 'abc', 'abc', 'India', 'zohaib', 'khan', 'B/34, Bagh-e-Korangi, Sector 10, karachi', 'karachi', 'sindh', 'Pakistan', '75230', '+923062228262', '03062228262', 'abc', 'abc', 'no', NULL, 'abc', 'other', 'abc', 'abc', 'Pakistan', '6-20', '200-500', '21-50', 'abc', NULL, NULL, NULL, NULL, NULL, '2023-04-25-T2VO6447c41a827b7.8b167af653c2399dd93b952a48740620.jpg', '2023-04-25-T2VO6447c41a83c0b.1-18387_orange-play-button-png-transparent-png.png', '1', '1', 1, '2023-04-25 06:44:18', '2023-04-26 03:30:51', NULL, NULL, '360techsolution'),
(47, 'UB059', 102, 'ib karan', 'ibkaran05@gmail.com', NULL, 'https://universitybureau.com/', NULL, NULL, NULL, NULL, 'Albania', 'karan', 'rawat', 'C-127, 3rd Floor, Sec-2', 'Noida', 'UP', 'Albania', '201301', '09355500077', '104', 'fghd', 'fdhjfj', 'no', NULL, 'mhy', 'canada america', 'dff', 'safsd', 'Albania', '51-250', '500-1000', '6-20', NULL, 'gfnjhhf', 'ngfn', 'dfhbfg', '1', 'hksjhk', NULL, NULL, '1', '1', 1, '2023-05-02 06:57:05', '2023-05-09 07:21:03', NULL, 1, 'Mr Mithun Gupta'),
(48, 'UB116', NULL, 'Buckner Holcomb Traders', 'tivaj@mailinator.com', '$2y$10$GkAQ2vv/396mDEcez2gOi.pNBl1RtRw44rLzs8ywpS/0Z4o6q5HYW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-05-09 07:00:11', '2023-05-09 08:03:28', '2023-05-09 08:03:28', 1, 'Mr Mithun Gupta'),
(49, 'UB119', NULL, 'Roach and Sharpe Associates', 'dixy@mailinator.com', '$2y$10$O66cYtgV1JQQ.a21kR7EoutC4lkHHmviFhBDYyUk.J33UWrlfOdpC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-05-09 07:08:44', '2023-05-09 08:06:00', '2023-05-09 08:06:00', 1, 'Mr Mithun Gupta'),
(50, 'UB120', NULL, 'Vazquez and Livingston Inc', 'gomawig@mailinator.com', '$2y$10$18ZImoDi/NtoGSqx3ett9eIq31tbw3dk.FSOv2uUmlkE4nkrRdqDG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-05-09 07:12:39', '2023-05-09 08:06:07', '2023-05-09 08:06:07', 1, 'Mr Mithun Gupta'),
(51, 'UB122', 141, 'Lamb and Alston LLC', 'hohu@mailinator.com', '$2y$10$Q.39isN10Zlt4n1hxLeePOhWw6fdkdWqsLrEneDPIIT49FqUEmbWW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-05-09 08:06:53', '2023-05-09 08:22:06', NULL, 1, 'Mr Mithun Gupta'),
(52, 'UB124', NULL, 'Mera new company', 'abc@gmail.com', NULL, 'https://google.com', 'https://facebook.com', 'https://instagram.com', 'https://twitter.com', 'https://linkedln.com', 'teacher', 'Mark', 'Robinson', 'London', 'London', 'London', 'UK', '23453', '098765432', '876543655', '754287423123', '81373173', 'jnknk', '12/12/2022', 'jadlajsldka', 'sjkdfhjsdhf', 'cambridge', 'asdjalksdjka', 'London', '10000', '34222', 'asdjkkand', 'no comments', 'Teacher', 'aljdlaskjdas', 'abc@gmail.com', '7865435678', 'https://abc.com.uk', NULL, NULL, NULL, NULL, 0, '2023-05-10 09:18:27', '2023-05-17 08:20:14', '2023-05-17 08:20:14', NULL, NULL),
(53, 'UB082', 136, 'Mera new company', 'abc@gmail.com', '$2y$10$oXXaBiDFXZF/jT9d7PjoGOhsNc9CNJ/2WdZl.hGxc2h8NwzxAW9iy', 'https://google.com', 'https://facebook.com', 'https://instagram.com', 'https://twitter.com', 'https://linkedln.com', 'teacher', 'Mark', 'Robinson', 'London', 'London', 'London', 'UK', '23453', '98765432', '876543655', '7.54287E+11', '81373173', 'jnknk', '12/12/2022', 'jadlajsldka', 'sjkdfhjsdhf', 'cambridge', 'asdjalksdjka', 'London', '10000', '34222', 'asdjkkand', 'no comments', 'Teacher', 'aljdlaskjdas', 'abc@gmail.com', '7865435678', 'https://abc.com.uk', NULL, NULL, NULL, NULL, 0, '2023-05-12 11:40:39', '2023-05-17 08:20:26', '2023-05-17 08:20:26', 1, 'Mr Mithun Gupta'),
(54, 'UB083', 137, 'Mera new company', 'abc@gmail.com', '$2y$10$e6R1nZ82yEL1df7IvbtFauOvTI.bzEo43FCGRdeBWeazfleoHAodC', 'https://google.com', 'https://facebook.com', 'https://instagram.com', 'https://twitter.com', 'https://linkedln.com', 'teacher', 'Mark', 'Robinson', 'London', 'London', 'London', 'UK', '23453', '98765432', '876543655', '7.54287E+11', '81373173', 'jnknk', '12/12/2022', 'jadlajsldka', 'sjkdfhjsdhf', 'cambridge', 'asdjalksdjka', 'London', '10000', '34222', 'asdjkkand', 'no comments', 'Teacher', 'aljdlaskjdas', 'abc@gmail.com', '7865435678', 'https://abc.com.uk', NULL, NULL, NULL, NULL, 0, '2023-05-13 19:31:25', '2023-05-13 19:31:25', NULL, 132, 'Pratt and Spears Trading'),
(55, 'UB084', 138, 'Wood and Chaney Inc', 'rec1122@rec.com', '$2y$10$/K6AahOh27O5ADMwH7Ny5uB9Xyg8YYYl44.W1Keqf7gO7ia8ac0lK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-05-17 08:21:18', '2023-05-17 08:21:18', NULL, 1, 'Mr Mithun Gupta'),
(56, 'UB085', 139, 'Hester and Sellers LLC', 'newrec@rec.com', '$2y$10$N6/YaTrvKP/OTWl1hJOdT.cTOGrB2fUVIpqiKiKqZR5oawa2XyyYq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2023-05-17 08:26:01', '2023-05-17 08:26:01', NULL, 1, 'Mr Mithun Gupta');

--
-- Triggers `recruiters`
--
DELIMITER $$
CREATE TRIGGER `id_store` BEFORE INSERT ON `recruiters` FOR EACH ROW BEGIN
                    INSERT INTO sequence_tbls VALUES (NULL);
                    SET NEW.unique_id = CONCAT("UB", LPAD(LAST_INSERT_ID(), 3, "0"));
                END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `recruiter_marketings`
--

CREATE TABLE `recruiter_marketings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `recruiter_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recruiter_marketings`
--

INSERT INTO `recruiter_marketings` (`id`, `recruiter_id`, `name`, `created_at`, `updated_at`) VALUES
(11, 1, 'Newspaper and Magazine Advertising', '2023-03-27 19:50:32', '2023-03-27 19:50:32'),
(22, 10, 'Other', '2023-03-31 13:31:30', '2023-03-31 13:31:30'),
(20, 10, 'Sub-Agent Network', '2023-03-31 13:31:30', '2023-03-31 13:31:30'),
(21, 10, 'Newspaper and Magazine Advertising', '2023-03-31 13:31:30', '2023-03-31 13:31:30'),
(19, 8, 'Other', '2023-03-30 13:18:17', '2023-03-30 13:18:17'),
(18, 8, 'Education Fairs', '2023-03-30 13:18:17', '2023-03-30 13:18:17'),
(47, 11, 'Newspaper and Magazine Advertising', '2023-04-04 02:06:10', '2023-04-04 02:06:10'),
(46, 11, 'Workshops', '2023-04-04 02:06:10', '2023-04-04 02:06:10'),
(45, 11, 'Education Fairs', '2023-04-04 02:06:10', '2023-04-04 02:06:10'),
(28, 12, 'Education Fairs', '2023-04-01 15:15:06', '2023-04-01 15:15:06'),
(29, 12, 'Workshops', '2023-04-01 15:15:06', '2023-04-01 15:15:06'),
(30, 12, 'Newspaper and Magazine Advertising', '2023-04-01 15:15:06', '2023-04-01 15:15:06'),
(31, 12, 'Sint', '2023-04-01 15:15:06', '2023-04-01 15:15:06'),
(32, 13, 'Education Fairs', '2023-04-02 13:09:36', '2023-04-02 13:09:36'),
(33, 15, 'Workshops', '2023-04-02 13:16:22', '2023-04-02 13:16:22'),
(34, 15, 'Sub-Agent Network', '2023-04-02 13:16:22', '2023-04-02 13:16:22'),
(35, 15, 'Newspaper and Magazine Advertising', '2023-04-02 13:16:22', '2023-04-02 13:16:22'),
(36, 15, 'Other', '2023-04-02 13:16:22', '2023-04-02 13:16:22'),
(37, 15, 'Ipsum', '2023-04-02 13:16:22', '2023-04-02 13:16:22'),
(38, 16, 'Education Fairs', '2023-04-03 14:38:46', '2023-04-03 14:38:46'),
(39, 16, 'Newspaper and Magazine Advertising', '2023-04-03 14:38:46', '2023-04-03 14:38:46'),
(40, 16, 'Other', '2023-04-03 14:38:46', '2023-04-03 14:38:46'),
(41, 17, 'Education Fairs', '2023-04-03 14:51:47', '2023-04-03 14:51:47'),
(42, 17, 'Workshops', '2023-04-03 14:51:47', '2023-04-03 14:51:47'),
(43, 17, 'Sub-Agent Network', '2023-04-03 14:51:47', '2023-04-03 14:51:47'),
(44, 17, 'In', '2023-04-03 14:51:47', '2023-04-03 14:51:47'),
(48, 11, 'Other', '2023-04-04 02:06:10', '2023-04-04 02:06:10'),
(49, 22, 'Sub-Agent Network', '2023-04-05 22:42:49', '2023-04-05 22:42:49'),
(54, 23, 'Newspaper and Magazine Advertising', '2023-04-05 22:48:06', '2023-04-05 22:48:06'),
(53, 23, 'Workshops', '2023-04-05 22:48:06', '2023-04-05 22:48:06'),
(55, 23, 'Other', '2023-04-05 22:48:06', '2023-04-05 22:48:06'),
(56, 24, 'Sub-Agent Network', '2023-04-05 22:48:26', '2023-04-05 22:48:26'),
(57, 25, 'Workshops', '2023-04-11 15:52:33', '2023-04-11 15:52:33'),
(58, 25, 'Newspaper and Magazine Advertising', '2023-04-11 15:52:33', '2023-04-11 15:52:33'),
(59, 26, 'Workshops', '2023-04-19 09:44:33', '2023-04-19 09:44:33'),
(60, 26, 'Sub-Agent Network', '2023-04-19 09:44:33', '2023-04-19 09:44:33'),
(61, 27, 'Workshops', '2023-04-19 09:45:05', '2023-04-19 09:45:05'),
(62, 27, 'Sub-Agent Network', '2023-04-19 09:45:05', '2023-04-19 09:45:05'),
(63, 28, 'Workshops', '2023-04-19 09:45:42', '2023-04-19 09:45:42'),
(64, 28, 'Sub-Agent Network', '2023-04-19 09:45:42', '2023-04-19 09:45:42'),
(65, 29, 'Workshops', '2023-04-19 10:19:03', '2023-04-19 10:19:03'),
(66, 30, 'Workshops', '2023-04-19 10:25:36', '2023-04-19 10:25:36'),
(67, 31, 'Workshops', '2023-04-19 10:27:34', '2023-04-19 10:27:34'),
(68, 32, 'Workshops', '2023-04-19 10:30:14', '2023-04-19 10:30:14'),
(69, 33, 'Education Fairs', '2023-04-19 12:48:10', '2023-04-19 12:48:10'),
(70, 33, 'Workshops', '2023-04-19 12:48:10', '2023-04-19 12:48:10'),
(71, 33, 'Newspaper and Magazine Advertising', '2023-04-19 12:48:10', '2023-04-19 12:48:10'),
(72, 34, 'Workshops', '2023-04-19 12:48:50', '2023-04-19 12:48:50'),
(73, 35, 'Sub-Agent Network', '2023-04-20 04:11:16', '2023-04-20 04:11:16'),
(86, 36, 'Workshops', '2023-04-26 06:55:45', '2023-04-26 06:55:45'),
(75, 37, 'Education Fairs', '2023-04-20 05:25:48', '2023-04-20 05:25:48'),
(76, 38, 'Sub-Agent Network', '2023-04-20 05:32:40', '2023-04-20 05:32:40'),
(77, 39, 'Sub-Agent Network', '2023-04-20 05:33:33', '2023-04-20 05:33:33'),
(78, 40, 'Sub-Agent Network', '2023-04-20 05:34:51', '2023-04-20 05:34:51'),
(79, 41, 'Sub-Agent Network', '2023-04-21 04:25:05', '2023-04-21 04:25:05'),
(80, 42, 'Workshops', '2023-04-21 05:31:05', '2023-04-21 05:31:05'),
(81, 43, 'Education Fairs', '2023-04-21 07:23:43', '2023-04-21 07:23:43'),
(82, 44, 'Online Advertising', '2023-04-21 14:32:44', '2023-04-21 14:32:44'),
(83, 45, 'Education Fairs', '2023-04-25 05:11:46', '2023-04-25 05:11:46'),
(84, 45, 'Workshops', '2023-04-25 05:11:46', '2023-04-25 05:11:46'),
(85, 46, 'Education Fairs', '2023-04-25 06:44:18', '2023-04-25 06:44:18'),
(87, 47, 'Education Fairs', '2023-05-02 06:57:05', '2023-05-02 06:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `recruiter_notes`
--

CREATE TABLE `recruiter_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `recruiter_id` int(11) NOT NULL,
  `notes` longtext DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_by_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recruiter_notes`
--

INSERT INTO `recruiter_notes` (`id`, `recruiter_id`, `notes`, `created_by`, `created_by_name`, `created_at`, `updated_at`) VALUES
(1, 53, 'Add Notes for this recruiter', 1, 'Mr Mithun Gupta', '2023-05-12 07:23:19', '2023-05-12 07:23:19'),
(2, 53, 'Add Notes for this recruiter 2nd time', 1, 'Mr Mithun Gupta', '2023-05-12 07:26:42', '2023-05-12 07:26:42'),
(3, 52, 'this is your notes', 1, 'Mr Mithun Gupta', '2023-05-12 07:49:31', '2023-05-12 07:49:31'),
(4, 53, 'this notes add by rm', 143, 'Garcia and Wells Inc', '2023-05-12 08:04:42', '2023-05-12 08:04:42'),
(5, 46, 'this is notes add by rm', 143, 'Garcia and Wells Inc', '2023-05-12 08:05:06', '2023-05-12 08:05:06'),
(6, 52, 'The new notes add by rm manager', 132, 'Pratt and Spears Trading', '2023-05-12 11:32:02', '2023-05-12 11:32:02'),
(7, 51, 'Non nostrud cupidita Non nostrud cupidita Non nostrud cupidita\r\nNon nostrud cupidita Non nostrud cupidita Non nostrud cupidita', 1, 'Mr Mithun Gupta', '2023-05-12 11:41:11', '2023-05-12 11:41:11'),
(8, 53, 'notes to abc test by salman', 1, 'Mr Mithun Gupta', '2023-05-12 18:17:26', '2023-05-12 18:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `recruiter_passwords`
--

CREATE TABLE `recruiter_passwords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `recruiter_password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recruiter_passwords`
--

INSERT INTO `recruiter_passwords` (`id`, `user_id`, `recruiter_password`, `created_at`, `updated_at`) VALUES
(1, 28, 'password', '2023-04-02 01:52:10', '2023-04-21 03:57:13'),
(2, 17, 'r067Iwr1mu', '2023-04-01 14:12:35', '2023-04-01 14:12:35'),
(3, 20, 'aK8wQ0BWN4', '2023-04-01 15:15:06', '2023-04-01 15:15:06'),
(4, 27, '0iJ7odWdyY', '2023-04-02 13:09:36', '2023-04-02 13:09:36'),
(5, 30, '0yBrnYoa49', '2023-04-02 13:16:22', '2023-04-02 13:16:22'),
(6, 32, 'nBFs2KbcbF', '2023-04-03 14:38:46', '2023-04-03 14:38:46'),
(7, 33, 'K7x4CrGjiN', '2023-04-03 14:51:47', '2023-04-03 14:51:47'),
(8, 35, '0lFWNwInQF', '2023-04-05 22:42:49', '2023-04-05 22:42:49'),
(9, 36, 'xaJRnoalIk', '2023-04-05 22:47:49', '2023-04-05 22:47:49'),
(10, 37, '7hLWRL7EPq', '2023-04-05 22:48:26', '2023-04-05 22:48:26'),
(11, 44, NULL, '2023-04-11 15:52:33', '2023-04-18 23:56:04'),
(12, 46, '12345', '2023-04-19 09:44:33', '2023-04-26 03:27:51'),
(13, 47, 'YtF0lOjwSh', '2023-04-19 09:45:05', '2023-04-19 09:45:05'),
(14, 48, 'lB9PuPyKmg', '2023-04-19 09:45:42', '2023-04-19 09:45:42'),
(15, 49, 'cmlefTwr9J', '2023-04-19 10:19:04', '2023-04-19 10:19:04'),
(16, 50, 'qVxMfMjTMv', '2023-04-19 10:25:36', '2023-04-19 10:25:36'),
(17, 51, 'xzgkIySTKy', '2023-04-19 10:27:34', '2023-04-19 10:27:34'),
(18, 52, 'cLoPRU05eS', '2023-04-19 10:30:14', '2023-04-19 10:30:14'),
(19, 54, 'E3odpAWLMs', '2023-04-19 12:48:10', '2023-04-19 12:48:10'),
(20, 55, 'password', '2023-04-19 12:48:50', '2023-04-20 00:34:29'),
(21, 56, 'G88In7uUfO', '2023-04-20 04:11:16', '2023-04-20 04:11:16'),
(22, 57, 'password', '2023-04-20 04:11:58', '2023-05-06 08:44:55'),
(23, 58, '45AXorXrFc', '2023-04-20 05:25:49', '2023-04-20 05:25:49'),
(24, 59, 'ThJIvTGN3S', '2023-04-20 05:32:40', '2023-04-20 05:32:40'),
(25, 60, 'hOCvuYlRx8', '2023-04-20 05:33:33', '2023-04-20 05:33:33'),
(26, 61, 'NjMQWMpyFD', '2023-04-20 05:34:52', '2023-04-20 05:34:52'),
(27, 65, 'HaeTu74Qqp', '2023-04-21 04:25:05', '2023-04-21 04:25:05'),
(28, 67, '9sEFh7eUzH', '2023-04-21 05:31:05', '2023-04-21 05:31:05'),
(29, 68, 'GkHxCdLJjy', '2023-04-21 07:23:43', '2023-04-21 07:23:43'),
(30, 69, 'password', '2023-04-21 14:32:44', '2023-04-28 00:01:24'),
(31, 80, NULL, '2023-04-25 05:11:46', '2023-05-27 17:15:36'),
(32, 83, 'Kuchnahi021!', '2023-04-25 06:44:18', '2023-04-26 03:30:51'),
(33, 102, 'password', '2023-05-02 06:57:05', '2023-05-09 08:19:42'),
(34, 124, 'password', '2023-05-08 20:29:28', '2023-05-08 20:30:08'),
(35, 136, NULL, '2023-05-12 11:40:39', '2023-05-13 04:56:17'),
(36, 137, 'password', '2023-05-13 19:31:25', '2023-05-13 19:31:25'),
(37, 138, 'rec1122', '2023-05-17 08:21:18', '2023-05-17 08:21:18'),
(38, 139, 'newrec', '2023-05-17 08:26:01', '2023-05-17 08:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'application', '2023-04-01 23:59:46', '2023-04-02 01:07:53'),
(4, 'recruiter', '2023-04-01 23:59:58', '2023-04-02 01:07:36'),
(6, 'student', '2023-04-01 13:49:24', '2023-04-01 13:49:24'),
(7, 'rm', '2023-04-02 22:36:42', '2023-04-03 14:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `permission_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`id`, `role_id`, `role_name`, `permission_id`, `permission_name`, `created_at`, `updated_at`) VALUES
(3, 8, 'rm', 4, 'update', '2023-04-05 02:22:10', '2023-04-05 02:22:10'),
(9, 4, 'recruiter', 6, 'user list', '2023-04-04 14:21:43', '2023-04-04 14:21:43'),
(10, 4, 'recruiter', 8, 'recruiter add', '2023-04-04 14:21:43', '2023-04-04 14:21:43'),
(11, 3, 'application', 2, 'delete', '2023-04-04 14:21:53', '2023-04-04 14:21:53'),
(12, 3, 'application', 4, 'update', '2023-04-04 14:21:53', '2023-04-04 14:21:53'),
(13, 3, 'application', 5, 'create', '2023-04-04 14:21:53', '2023-04-04 14:21:53'),
(14, 6, 'student', 2, 'delete', '2023-04-04 14:22:06', '2023-04-04 14:22:06'),
(15, 6, 'student', 4, 'update', '2023-04-04 14:22:06', '2023-04-04 14:22:06'),
(16, 6, 'student', 5, 'create', '2023-04-04 14:22:06', '2023-04-04 14:22:06'),
(17, 6, 'student', 7, 'student create', '2023-04-04 14:22:06', '2023-04-04 14:22:06'),
(18, 7, 'rm', 6, 'user list', '2023-04-04 14:24:03', '2023-04-04 14:24:03'),
(19, 8, 'admin', 2, 'delete', '2023-04-21 15:02:33', '2023-04-21 15:02:33'),
(20, 8, 'admin', 4, 'update', '2023-04-21 15:02:33', '2023-04-21 15:02:33'),
(21, 8, 'admin', 5, 'create', '2023-04-21 15:02:33', '2023-04-21 15:02:33'),
(22, 8, 'admin', 6, 'user list', '2023-04-21 15:02:33', '2023-04-21 15:02:33'),
(23, 8, 'admin', 7, 'student create', '2023-04-21 15:02:33', '2023-04-21 15:02:33'),
(24, 8, 'admin', 8, 'recruiter add', '2023-04-21 15:02:33', '2023-04-21 15:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `sequence_tbls`
--

CREATE TABLE `sequence_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sequence_tbls`
--

INSERT INTO `sequence_tbls` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50),
(51),
(52),
(53),
(54),
(55),
(56),
(57),
(58),
(59),
(60),
(61),
(62),
(63),
(64),
(65),
(66),
(67),
(68),
(69),
(70),
(71),
(72),
(73),
(74),
(75),
(76),
(77),
(78),
(79),
(80),
(81),
(82),
(83),
(84),
(85);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `signatures`
--

CREATE TABLE `signatures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` longtext DEFAULT NULL,
  `file` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `signatures`
--

INSERT INTO `signatures` (`id`, `image`, `file`, `created_at`, `updated_at`) VALUES
(1, 'uploads/signature/sig643ef11c02e7a.png', NULL, '2023-04-18 14:05:56', '2023-04-18 14:05:56'),
(2, 'uploads/signature/sig6440d634d586f.png', NULL, '2023-04-20 00:35:40', '2023-04-20 00:35:40'),
(3, 'uploads/signature/sig64466f322e086.png', NULL, '2023-04-24 06:29:46', '2023-04-24 06:29:46'),
(4, 'uploads/signature/sig644670e693eae.png', NULL, '2023-04-24 06:37:02', '2023-04-24 06:37:02'),
(5, 'uploads/signature/sig64469c74bcff6.png', NULL, '2023-04-24 09:42:52', '2023-04-24 09:42:52'),
(6, 'uploads/signature/sig6446a26e90cac.png', NULL, '2023-04-24 10:08:22', '2023-04-24 10:08:22'),
(7, 'uploads/signature/sig6448ba5061f8e.png', NULL, '2023-04-26 00:14:48', '2023-04-26 00:14:48'),
(8, 'uploads/signature/sig6448ba6107f04.png', NULL, '2023-04-26 00:15:05', '2023-04-26 00:15:05'),
(9, 'uploads/signature/sig6448bb643f9e9.png', NULL, '2023-04-26 00:19:24', '2023-04-26 00:19:24'),
(10, 'uploads/signature/sig6448c263e496a.png', NULL, '2023-04-26 00:49:15', '2023-04-26 00:49:15'),
(11, 'uploads/signature/sig6448c5a490af9.png', NULL, '2023-04-26 01:03:08', '2023-04-26 01:03:08'),
(12, 'uploads/signature/sig6448d689cde6f.png', NULL, '2023-04-26 02:15:13', '2023-04-26 02:15:13'),
(13, 'uploads/signature/sig6448fb6279cd2.png', NULL, '2023-04-26 04:52:26', '2023-04-26 04:52:26'),
(14, 'uploads/signature/sig6450b8e90b4c5.png', NULL, '2023-05-02 07:16:57', '2023-05-02 07:16:57'),
(15, 'uploads/signature/sig645400a133673.png', NULL, '2023-05-04 18:59:45', '2023-05-04 18:59:45'),
(16, 'uploads/signature/sig6456aea19e840.png', NULL, '2023-05-06 19:46:41', '2023-05-06 19:46:41'),
(17, 'uploads/signature/sig6456aeb5030f5.png', NULL, '2023-05-06 19:47:01', '2023-05-06 19:47:01'),
(18, 'uploads/signature/sig6456aeb529f32.png', NULL, '2023-05-06 19:47:01', '2023-05-06 19:47:01'),
(19, 'uploads/signature/sig6456aeb5c7925.png', NULL, '2023-05-06 19:47:01', '2023-05-06 19:47:01'),
(20, 'uploads/signature/sig6456aeb61b665.png', NULL, '2023-05-06 19:47:02', '2023-05-06 19:47:02'),
(21, 'uploads/signature/sig64577b12dbed9.png', NULL, '2023-05-07 10:18:58', '2023-05-07 10:18:58'),
(22, 'uploads/signature/sig64577b1319f00.png', NULL, '2023-05-07 10:18:59', '2023-05-07 10:18:59'),
(23, 'uploads/signature/sig64577b13aa0c4.png', NULL, '2023-05-07 10:18:59', '2023-05-07 10:18:59'),
(24, 'uploads/signature/sig64577b13c0b49.png', NULL, '2023-05-07 10:18:59', '2023-05-07 10:18:59'),
(25, 'uploads/signature/sig64577b1406404.png', NULL, '2023-05-07 10:19:00', '2023-05-07 10:19:00'),
(26, 'uploads/signature/sig64577b14158a7.png', NULL, '2023-05-07 10:19:00', '2023-05-07 10:19:00'),
(27, 'uploads/signature/sig64577b1480ffb.png', NULL, '2023-05-07 10:19:00', '2023-05-07 10:19:00'),
(28, 'uploads/signature/sig64577b611e9dd.png', NULL, '2023-05-07 10:20:17', '2023-05-07 10:20:17'),
(29, 'uploads/signature/sig64577b6274681.png', NULL, '2023-05-07 10:20:18', '2023-05-07 10:20:18'),
(30, 'uploads/signature/sig64577b6299749.png', NULL, '2023-05-07 10:20:18', '2023-05-07 10:20:18'),
(31, 'uploads/signature/sig64577b6ae775c.png', NULL, '2023-05-07 10:20:26', '2023-05-07 10:20:26'),
(32, 'uploads/signature/sig6458079e6f92f.png', NULL, '2023-05-07 20:18:38', '2023-05-07 20:18:38'),
(33, 'uploads/signature/sig64580877f41b6.png', NULL, '2023-05-07 20:22:16', '2023-05-07 20:22:16'),
(34, 'uploads/signature/sig645808cd1edbe.png', NULL, '2023-05-07 20:23:41', '2023-05-07 20:23:41'),
(35, 'uploads/signature/sig64580c7a9a605.png', NULL, '2023-05-07 20:39:22', '2023-05-07 20:39:22'),
(36, 'uploads/signature/sig64580f75f37d0.png', NULL, '2023-05-07 20:52:05', '2023-05-07 20:52:05'),
(37, 'uploads/signature/sig6458a2a96686b.png', NULL, '2023-05-08 07:20:09', '2023-05-08 07:20:09'),
(38, 'uploads/signature/sig6459573b8b99d.png', NULL, '2023-05-08 20:10:35', '2023-05-08 20:10:35'),
(39, 'uploads/signature/sig6459cf366ad6a.png', NULL, '2023-05-09 04:42:30', '2023-05-09 04:42:30'),
(40, 'uploads/signature/sig645b6325db045.png', NULL, '2023-05-10 09:25:57', '2023-05-10 09:25:57'),
(41, 'uploads/signature/sig6463c89bbf423.png', NULL, '2023-05-16 18:16:59', '2023-05-16 18:16:59'),
(42, 'uploads/signature/sig6463d6f2dfb14.png', NULL, '2023-05-16 19:18:10', '2023-05-16 19:18:10'),
(43, 'uploads/signature/sig6463d7fd58837.PNG', NULL, '2023-05-16 19:22:37', '2023-05-16 19:22:37'),
(44, 'uploads/signature/sig6463d89dc192a.png', NULL, '2023-05-16 19:25:17', '2023-05-16 19:25:17'),
(45, 'uploads/signature/sig6463e19555314.png', NULL, '2023-05-16 20:03:33', '2023-05-16 20:03:33'),
(46, 'uploads/signature/sig64648ea883be7.png', NULL, '2023-05-17 08:22:00', '2023-05-17 08:22:00'),
(47, 'uploads/signature/sig64649015cd078.png', NULL, '2023-05-17 08:28:05', '2023-05-17 08:28:05'),
(48, 'uploads/signature/sig6464902453900.png', NULL, '2023-05-17 08:28:20', '2023-05-17 08:28:20'),
(49, 'uploads/signature/sig64649160dbe11.png', NULL, '2023-05-17 08:33:36', '2023-05-17 08:33:36'),
(50, 'uploads/signature/sig6464917043246.png', NULL, '2023-05-17 08:33:52', '2023-05-17 08:33:52'),
(51, 'uploads/signature/sig646491b4f367d.png', NULL, '2023-05-17 08:35:00', '2023-05-17 08:35:00'),
(52, 'uploads/signature/sig6464bbcb04f52.png', NULL, '2023-05-17 11:34:35', '2023-05-17 11:34:35'),
(53, 'uploads/signature/sig6464bc1294cc7.jpg', NULL, '2023-05-17 11:35:46', '2023-05-17 11:35:46'),
(54, 'uploads/signature/sig6464bc3c2ef27.png', NULL, '2023-05-17 11:36:28', '2023-05-17 11:36:28'),
(55, 'uploads/signature/sig6464ef6f474dc.png', NULL, '2023-05-17 15:14:55', '2023-05-17 15:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 296, 'Delhi', 'delhi', 1, '2023-03-18 05:36:50', '2023-04-29 11:23:37', NULL),
(2, 253, 'Vancouver', 'vancouver', 1, '2023-03-18 05:36:50', '2023-04-29 11:23:54', NULL),
(11, 248, 'Munich', 'munich', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(13, 248, 'Berlin', 'berlin', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(15, 248, 'Hanover', 'hanover', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(16, 248, 'Rome', 'rome', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(17, 248, 'Alboraya', 'alboraya', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(18, 248, 'Apeldoorn', 'apeldoorn', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(19, 248, 'Kolding', 'kolding', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(20, 248, 'Riga', 'riga', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(21, 248, 'Kaunas', 'kaunas', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(22, 248, 'Budapest', 'budapest', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(24, 248, 'Zagreb', 'zagreb', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(25, 248, 'Pori', 'pori', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(26, 248, 'Montpellier', 'montpellier', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(27, 248, 'Dublin', 'dublin', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(28, 248, 'Leysin', 'leysin', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(29, 248, 'Naples', 'naples', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(30, 159, 'Lincoln', 'lincoln', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(31, 213, 'Lucerne', 'lucerne', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(32, 213, 'Weggis', 'weggis', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(33, 213, 'Montreux', 'montreux', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(34, 232, 'California', 'california', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(35, 232, 'Vermont', 'vermont', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(36, 232, 'Hawaii', 'hawaii', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(37, 232, 'West Virginia', 'west-virginia', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(38, 232, 'Montana', 'montana', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(39, 232, 'Nevada', 'nevada', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(40, 232, 'Washington', 'washington', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(41, 232, 'Wisconsin', 'wisconsin', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(42, 232, 'Massachusetts', 'massachusetts', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(43, 232, 'New York', 'new-york', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(44, 232, 'South Dakota', 'south-dakota', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(45, 231, 'England', 'england', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(46, 13, 'Southport', 'southport', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(47, 13, 'South Australia', 'south-australia', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(48, 13, 'Tasmania', 'tasmania', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(49, 13, 'Victoria', 'victoria', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(50, 13, 'New South Wales', 'new-south-wales', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(51, 13, 'Adelaide SA', 'adelaide-sa', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(52, 13, 'Brisbane', 'brisbane', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(53, 13, 'Gold Coast', 'gold-coast', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(54, 13, 'Cairns', 'cairns', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(55, 13, 'Melbourne', 'melbourne', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(56, 13, 'Sydney', 'sydney', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(57, 38, 'British Columbia', 'british-columbia', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(58, 38, 'New Brunswick', 'new-brunswick', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(59, 38, 'Alberta', 'alberta', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(60, 38, 'Saskatchewan', 'saskatchewan', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(61, 38, 'Ontario', 'ontario', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(62, 38, 'Quebec', 'quebec', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(63, 38, 'Scarborough', 'scarborough', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(64, 38, 'Montreal', 'montreal', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(65, 44, 'California', 'california', 1, '2023-03-18 05:36:50', '2023-03-18 05:36:50', NULL),
(66, 6, 'Toronto', 'toronto', 1, '2023-03-18 05:42:05', '2023-04-14 05:36:38', '2023-04-14 05:36:38'),
(67, 6, 'Montreal', 'montreal', 1, '2023-03-18 05:42:43', '2023-03-18 05:42:43', NULL),
(68, 17, 'Sdfasdf', 'sdfasdf', 1, '2023-03-21 01:13:31', '2023-03-21 06:10:12', '2023-03-21 06:10:12'),
(69, 296, 'Noida', 'noida', 1, '2023-03-21 06:10:01', '2023-04-29 11:24:41', NULL),
(70, 1, 'State test', 'state-test', 1, '2023-04-30 08:27:34', '2023-04-30 08:27:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `birth_date` varchar(255) DEFAULT NULL,
  `first_language` varchar(255) DEFAULT NULL,
  `country_citizenship` varchar(255) DEFAULT NULL,
  `passport_number` varchar(255) DEFAULT NULL,
  `passport_expiry_date` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postal_zip` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `emergency_contact_name` varchar(255) DEFAULT NULL,
  `emergency_contact_relation` varchar(255) DEFAULT NULL,
  `emergency_contact_email` varchar(255) DEFAULT NULL,
  `emergency_contact_phone` varchar(255) DEFAULT NULL,
  `country_edu` varchar(255) DEFAULT NULL,
  `high_level_edu` varchar(255) DEFAULT NULL,
  `grading_scheme` varchar(255) DEFAULT NULL,
  `country_institute` varchar(255) DEFAULT NULL,
  `institute_name` varchar(255) DEFAULT NULL,
  `level_education` varchar(255) DEFAULT NULL,
  `lan_institute` varchar(255) DEFAULT NULL,
  `institute_from` varchar(255) DEFAULT NULL,
  `institute_to` varchar(255) DEFAULT NULL,
  `degree_name` varchar(255) DEFAULT NULL,
  `graduation_date` varchar(255) DEFAULT NULL,
  `institute_confirmation` varchar(255) DEFAULT NULL,
  `physical_certificate` varchar(255) DEFAULT NULL,
  `visa_country_refusal` varchar(255) DEFAULT NULL,
  `visa_country_refusal_detail` varchar(255) DEFAULT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `ielts` varchar(255) DEFAULT NULL,
  `grade_10` varchar(255) DEFAULT NULL,
  `grade_12` varchar(255) DEFAULT NULL,
  `bachelor_mark_sheet` varchar(255) DEFAULT NULL,
  `bachelor_certificate` varchar(255) DEFAULT NULL,
  `master_mark_sheet` varchar(255) DEFAULT NULL,
  `master_certificate` varchar(255) DEFAULT NULL,
  `lors` varchar(255) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `work_experience` longtext DEFAULT NULL,
  `moi` varchar(255) DEFAULT NULL,
  `personal_statement` varchar(255) DEFAULT NULL,
  `diploma_mark_sheet` varchar(255) DEFAULT NULL,
  `diploma_certificate` varchar(255) DEFAULT NULL,
  `other_certificate` longtext DEFAULT NULL,
  `application_team` int(11) DEFAULT NULL,
  `application_team_name` varchar(255) DEFAULT NULL,
  `application_team_comment` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `intake` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `lead_status` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_by_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `unique_id`, `user_id`, `first_name`, `middle_name`, `last_name`, `birth_date`, `first_language`, `country_citizenship`, `passport_number`, `passport_expiry_date`, `marital_status`, `gender`, `address`, `city`, `state`, `country`, `postal_zip`, `email`, `contact_no`, `emergency_contact_name`, `emergency_contact_relation`, `emergency_contact_email`, `emergency_contact_phone`, `country_edu`, `high_level_edu`, `grading_scheme`, `country_institute`, `institute_name`, `level_education`, `lan_institute`, `institute_from`, `institute_to`, `degree_name`, `graduation_date`, `institute_confirmation`, `physical_certificate`, `visa_country_refusal`, `visa_country_refusal_detail`, `passport`, `ielts`, `grade_10`, `grade_12`, `bachelor_mark_sheet`, `bachelor_certificate`, `master_mark_sheet`, `master_certificate`, `lors`, `resume`, `work_experience`, `moi`, `personal_statement`, `diploma_mark_sheet`, `diploma_certificate`, `other_certificate`, `application_team`, `application_team_name`, `application_team_comment`, `status`, `intake`, `created_at`, `updated_at`, `deleted_at`, `password`, `lead_status`, `created_by`, `created_by_name`) VALUES
(3, 'UB003', NULL, 'Winifred', 'Hyacinth Salazar', 'Reynolds', NULL, 'Autem dolores qui la', 'Quis est architecto', '964', NULL, 'married', 'male', 'Eum consequatur In', 'Minim ut laudantium', 'Velit aut ut qui dol', 'Voluptas quo aute ni', '53663', 'nyjiposip@mailinator.com', '369', 'Cairo Gould', 'Laudantium aut vel', 'pogerira@mailinator.com', '569', 'Exercitation anim do', 'Aliqua Omnis volupt', 'Nisi quia quod aut f', 'Sint laborum volupta', 'Lacy Clemons', 'Sunt dolore odio et', 'Libero magnam minim', NULL, NULL, 'Evelyn Tucker', NULL, 'sure', 'applicable', 'refused', 'Enim est odio nisi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-04-02 21:55:23', '2023-04-02 21:55:23', NULL, NULL, 1, 0, ''),
(4, 'UB004', NULL, 'Neve', 'Serena Phelps', 'Rhodes', NULL, 'Voluptates natus eum', 'Occaecat ullamco cum', '6753423423', NULL, 'single', 'female', 'Eum consequatur In', 'Minim ut laudantium', 'Velit aut ut qui dol', 'Voluptas quo aute ni', '53663', 'nyjiposip@mailinator.com', '369', 'Cairo Gould', 'Laudantium aut vel', 'pogerira@mailinator.com', '569', 'Exercitation anim do', 'Aliqua Omnis volupt', 'Nisi quia quod aut f', 'Sint laborum volupta', 'Lacy Clemons', 'Sunt dolore odio et', 'Libero magnam minim', NULL, NULL, 'Evelyn Tucker', NULL, 'sure', 'applicable', 'refused', 'Enim est odio nisi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-04-02 21:57:02', '2023-04-03 01:02:18', NULL, '$2y$10$2A1hwwkJ4JMWS1N2CAgoquJbJdjqYqIQc8lEsLO8SrAopvsMjP1R2', 1, 0, ''),
(5, 'UB005', NULL, 'Basil', 'Jacob Moses', 'Reilly', NULL, 'Et nihil unde quos d', 'Similique quis dolor', '9323456789776', NULL, 'single', 'male', 'Harum id facilis qui', 'Odio veniam amet u', 'Sint tenetur est fug', 'Vel excepteur in aut', '80824', 'wabeju@mailinator.com', '698', 'Nehru Swanson', 'Voluptas ut omnis ma', 'gumotumej@mailinator.com', '874', 'Omnis voluptate nost', 'Eiusmod velit deleni', 'Culpa dolor perspic', 'At aliquip possimus', 'Ima Hines', 'Incidunt aspernatur', 'Quia velit dolor dis', NULL, NULL, 'Lyle Vega', NULL, 'not sure', 'notapplicable', 'refused', 'Ipsam Nam consequatu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-04-03 01:06:23', '2023-04-03 01:06:23', NULL, NULL, 1, 0, ''),
(6, 'UB006', NULL, 'Susan', 'Noelle Vincent', 'Greene', NULL, 'Nostrud eu id quis c', 'Dolor architecto odi', '21345678', NULL, 'single', 'female', 'Soluta commodi aperi', 'Totam unde autem eum', 'Minim animi qui qui', 'Alias voluptatem si', '15975', 'ryvut@mailinator.com', '452', 'Abraham Cole', 'Quibusdam totam repu', 'xiremo@mailinator.com', '506', 'Ut perspiciatis sim', 'Aspernatur enim expl', 'Eu sit quos assumen', 'Exercitation ullamco', 'Ria Walter', 'Duis officia omnis e', 'Aute et quam quisqua', NULL, NULL, 'Garrison Glover', NULL, 'not sure', 'applicable', 'refused', 'Tenetur ipsam accusa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, 'Kaufman and Roberson Co', NULL, 1, NULL, '2023-04-02 13:08:45', '2023-04-06 02:31:12', NULL, '$2y$10$tNQcw3RIooscB/xpwImWaOR/740.GYEetn3cyXnnPMGB13lR1We8q', 1, 0, ''),
(7, 'UB007', NULL, 'Medge', 'Hedda Henry', 'Sanders', NULL, 'Numquam commodo labo', 'Esse et irure except', '534', NULL, 'married', 'male', 'Sed omnis quia non m', 'Enim sit similique', 'Explicabo Est even', 'Distinctio Ut repel', '27508', 'lotyzewa@mailinator.com', '733', 'Merritt Chase', 'Eum libero quos at d', 'balad@mailinator.com', '132', 'Quo amet blanditiis', 'Sunt nisi molestiae', 'Quos dolor cillum cu', 'Est do est debitis t', 'Dante Johns', 'Et quos impedit est', 'Aut vitae consequunt', NULL, NULL, 'Cody Mcconnell', NULL, 'sure', 'applicable', 'notrefused', 'Culpa id eligendi d', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-04-02 13:10:38', '2023-04-02 13:10:38', NULL, NULL, 1, 0, ''),
(8, 'UB008', NULL, 'Wesley', 'Phillip Herrera', 'Cortez', NULL, 'Rerum sed aliquip co', 'Enim minima lorem ac', '812', NULL, 'married', 'male', 'Qui elit commodi ve', 'Iste sed iusto dolor', 'Fuga Voluptatem Ma', 'Amet voluptatem cup', '70745', 'zosej@mailinator.com', '44', 'Valentine Finley', 'Sit consequuntur no', 'pemojan@mailinator.com', '429', 'Similique debitis ea', 'Nisi molestias dolor', 'Aut iusto deleniti n', 'Ipsum ipsa atque sa', 'Philip Franklin', 'Aut impedit officia', 'Et magni labore sint', NULL, NULL, 'Porter Rivera', NULL, 'not sure', 'notapplicable', 'notrefused', 'Aut dicta aperiam cu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-04-02 13:11:58', '2023-04-02 13:11:58', NULL, NULL, 1, 0, ''),
(9, 'UB012', 34, 'Callum', 'Georgia Sullivan', 'Hahn', NULL, 'Laborum Dolore quid', 'Nam deleniti et reru', '289', NULL, 'separated', 'female', 'Architecto id quibu', 'Accusantium id conse', 'Quia id aut quas ten', 'Totam quis aut in no', '18993', 'picadex@mailinator.com', '771', 'Alma Yang', 'Irure in veritatis e', 'tycyde@mailinator.com', '479', 'Cillum laudantium f', 'Et aute sapiente nih', 'Facilis quia ea duci', 'Accusamus soluta eum', 'Sacha Forbes', 'Amet excepteur fugi', 'Sequi voluptate rati', NULL, NULL, 'Harrison Guerrero', NULL, 'sure', 'notapplicable', 'refused', 'sdf', '2023-04-04-pRD1642bdf39db1c5.1.docx', '2023-04-04-pRD1642bdf39db70d.632c21b24ed73.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-04-04 02:56:33', '2023-04-05 00:29:29', NULL, '$2y$10$zZbE94SwdHs/SGMrV7kAc.YNbL.J0HJVcirfjOPbae93ttnqD3DHq', 1, 0, ''),
(10, 'UB012', 34, 'Chase', 'Kiara Gill', 'Mccarthy', NULL, 'Soluta non tempore', 'Eum minim sunt cill', '102', NULL, 'single', 'male', 'Ratione atque eligen', 'Dolores dolore volup', 'Ut quis recusandae', 'Magnam mollit nemo n', '85919', 'dyveh@mailinator.com', '504', 'Nathan Kane', 'Modi aliqua Distinc', 'terovenufi@mailinator.com', '443', 'Minim do at eos aspe', 'Voluptatem dolores c', 'Dolor dolor ut cum c', 'Dicta corporis iusto', 'Britanni Nicholson', 'Esse consequuntur q', 'Et esse maxime porr', NULL, NULL, 'Raja Howell', NULL, 'not sure', 'applicable', 'refused', 'Id vel ex et magna o', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Application Team', NULL, 1, NULL, '2023-04-06 02:33:58', '2023-05-15 20:42:14', NULL, NULL, 4, 1, 'Mr Mithun Gupta'),
(13, 'UB018', 40, 'Odessa', 'Justina Tanner', 'Stout', NULL, 'Dolor quis dolorem q', 'Cupiditate illo dign', '369', NULL, 'married', 'male', 'Inventore quia ut ut', 'Accusamus non consec', 'Non sit magnam assu', 'Sint sit est id te', '94731', 'lacoqeqid@mailinator.com', '957', 'Eleanor Knox', 'Repudiandae enim del', 'hynegy@mailinator.com', '995', 'Dignissimos excepteu', 'Laborum Rerum atque', 'Quos sunt nemo ut od', 'Velit sit a offici', 'Ina Boyer', 'Incidunt quo ipsum', 'Eius ad eveniet a p', NULL, NULL, 'Jeanette Gilmore', NULL, 'not sure', 'applicable', 'refused', 'Animi sunt esse an', '2023-04-08-i6wL6431cba024fce.mig-ss.pdf', NULL, NULL, '2023-04-08-EacS1818Fi6431cba0261a2.issb-test-book-pdf.pdf', NULL, NULL, NULL, NULL, NULL, '2023-04-08-EacS1818Fi6431cba026837.Intelligence Test.pdf', NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Application Team', 'moi', 1, NULL, '2023-04-05 22:52:36', '2023-04-11 03:20:07', NULL, NULL, 5, 1, 'Mr Mithun Gupta'),
(12, 'UB017', 39, 'Axel', 'Reese Koch', 'Whitney', NULL, 'Sunt dolores dolorib', 'Quas pariatur Alias', '230', NULL, 'married', 'female', 'Et officiis illo ius', 'Sunt eos cupidatat n', 'Non corporis aliquip', 'Rerum voluptatem duc', '58070', 'diqekaca@mailinator.com', '36', 'Graiden Gonzales', 'Qui anim sequi vel n', 'laveqybymy@mailinator.com', '126', 'Soluta in ipsam recu', 'Consequatur et velit', 'Numquam qui odio id', 'Ut mollit et aut seq', 'Sigourney Fuller', 'Et voluptas reprehen', 'Reiciendis optio qu', NULL, NULL, 'Norman Estrada', NULL, 'sure', 'notapplicable', 'notrefused', 'Dolor veritatis modi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-04-05 22:51:43', '2023-04-05 22:51:43', NULL, NULL, 1, 35, 'befihybawe@mailinator.com'),
(15, 'UB020', 45, 'Leonard', 'Mona Bowman', 'Ross', NULL, 'Saepe nostrud saepe', 'Luxembourg', '408', NULL, 'separated', 'male', 'Corporis id aliquam', 'Salman test', 'Noida', 'Sweden', '83487', 'dococuhifi@mailinator.com', '97', 'Lydia Irwin', 'Qui odio soluta saep', 'zidizez@mailinator.com', '661', 'Denmark', 'Jaquelyn Ramsey', 'Eagan', 'South Africa', 'Xyla Gilliam', 'Dominique', 'Veniam elit qui vo', NULL, NULL, 'Odessa Oliver', NULL, 'not sure', 'notapplicable', 'notrefused', 'Impedit Nam vitae c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-13-g38t6437d699afef0.Rawalpindi 144-1.pdf,2023-04-13-g38t6437d699b01c6.Shikwa_JawabeShikwa.pdf', NULL, NULL, NULL, NULL, '2023-04-13-g38t6437d699b033f.Intelligence test 500.PDF-1-1-1.pdf,2023-04-13-g38t6437d699b091c.Interviewing skills workshop.pdf,2023-04-13-g38t6437d699b0b97.ISSB-Urdu-SCT-Samples-1.pdf', 2, 'Application Team', NULL, 1, '2014-08-07', '2023-04-13 04:46:57', '2023-04-13 05:40:10', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(17, 'UB037', 62, 'Myles', 'Upton Dickson', 'Sherman', NULL, 'Est et eum voluptat', 'USA', '470', NULL, 'separated', 'female', 'In ea expedita accus', 'City one name', 'Montreal', 'Greece', '28141', 'salman.u360+webstu1@gmail.com', '952', 'Indigo Moss', 'In eligendi est dolo', 'qicucemyho@mailinator.com', '68', 'Latvia', 'Jaquelyn Ramsey', 'Eagan', 'Netherlands', 'Quemby Barker', 'Whilemina Hall', 'Rerum unde quis aut', NULL, NULL, 'Flynn Skinner', NULL, 'sure', 'applicable', 'notrefused', 'Inventore laboriosam', '2023-04-20-YGnV64411f1adef4d.632c21b24ed73.png', '2023-04-20-YGnV64411f1adf7ad.1.docx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-20-YGnV64411f1adfbce.1.docx,2023-04-20-YGnV64411f1adfefc.632c21b24ed73.png', NULL, NULL, NULL, NULL, '2023-04-20-YGnV64411f1ae0233.1.docx,2023-04-20-YGnV64411f1ae05a9.632c21b24ed73.png', NULL, NULL, NULL, 1, '1970-08-13', '2023-04-20 05:46:42', '2023-04-21 04:32:16', NULL, NULL, 1, NULL, 'Myles'),
(18, 'UB038', 63, 'Nina', 'Tanner Weaver', 'Terrell', NULL, 'Voluptatibus rerum p', 'Belgium', '594', NULL, 'single', 'male', 'Qui consectetur nos', 'City one name', 'Noida', 'Egypt', '50453', 'salman.u360+webstu2@gmail.com', '819', 'Steel Dale', 'Sed aspernatur a lab', 'zucu@mailinator.com', '610', 'Canada', 'Mullins', 'Beverly Contreras', 'Malta', 'Mufutau Blackburn', 'Mullins', 'Duis culpa qui veri', NULL, NULL, 'Natalie Chavez', NULL, 'not sure', 'notapplicable', 'notrefused', 'Mollit deserunt dele', '2023-04-20-TMTo64412007e74e9.632c21b24ed73.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-20-TMTo64412007e7711.632c21b24ed73.png', NULL, NULL, NULL, 1, '2006-03-21', '2023-04-20 05:50:39', '2023-04-21 04:27:32', NULL, NULL, 1, NULL, 'Nina'),
(20, 'UB041', 66, 'Vincent', 'Vera Ingram', 'Ray', NULL, 'Aute et aut ea recus', 'South Korea', '626', NULL, 'married', 'female', 'In tempore enim mag', 'City one name', 'Montreal', 'Iceland', '26393', 'salman.u360+321@gmail.com', '884', 'Bell Moon', 'Adipisci lorem sed i', 'jyxegifad@mailinator.com', '530', 'Greece', 'Jaquelyn Ramsey', 'Eagan', 'Czech Republic', 'Roanna Knowles', 'Dominique', 'Adipisicing distinct', NULL, NULL, 'Sybill Lloyd', NULL, 'not sure', 'applicable', 'refused', 'Dolores et saepe sun', '2023-04-21-KI1K64425dcc2b926.632c21b24ed73.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-21-KI1K64425dcc2bb13.632c21b24ed73.png', NULL, NULL, NULL, 0, '1970-10-01', '2023-04-21 04:26:28', '2023-04-21 11:49:43', NULL, NULL, 1, NULL, 'Vincent'),
(32, 'UB058', 101, 'zohaib', 'abc', 'khan', NULL, 'urdu', 'pakistan', '11223344', NULL, 'single', 'male', 'B/34, Bagh-e-Korangi, Sector 10, karachi', 'karachi', 'sindh', 'pakistan', '75230', 'zohaibkhan4822+1@gmail.com', '777777777777777', NULL, NULL, NULL, NULL, 'pakistan', 'bachelor', 'GPA', 'pakistan', 'abc', 'bachelor', 'english', NULL, NULL, 'Bachelor of Science in Computer Science (BS-CS)', NULL, 'sure', 'applicable', 'notrefused', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Application Team', NULL, 0, NULL, '2023-04-26 06:05:24', '2023-04-26 06:30:08', NULL, NULL, 1, 80, 'recruiter'),
(33, 'UB060', 103, 'Pamela', 'Maile Molina', 'Lindsay', NULL, 'Accusantium aut in n', 'Eritrea', '110', NULL, 'single', 'male', 'Aspernatur praesenti', 'Montpellier', 'Montreal', 'Sierra Leone', '73726', 'shayanahmad235@gmail.com', '123', 'Buffy Goff', 'Ut quae quia quis at', 'tiqyf@mailinator.com', '485', 'Nauru', 'Graduation', 'Secondary Scale 0-100 (Passing Grade - 40)', 'Turks and Caicos Islands', 'Cheyenne Gonzalez', 'Grade 1', 'Et a asperiores qui', NULL, NULL, 'Kimberley Odonnell', NULL, 'sure', 'applicable', 'notrefused', 'Optio incididunt qu', '2023-05-02-pUp764514d21c4038._passive_voice_.pdf,2023-05-02-pUp764514d21c930a.01. Computer Operator (BPS-12).pdf,2023-05-02-pUp764514d21ca2c0.02. Senior Data Entry Operator, Key Punch Operator (BPS-12).pdf', '2023-05-02-pUp764514d21cad02._Everyday Science MCQs for CCE 2018-1.pdf,2023-05-02-pUp764514d21cbcd7._passive_voice_.pdf,2023-05-02-pUp764514d21cc60f.01. Computer Operator (BPS-12).pdf', '2023-05-02-pUp764514d21ccf66.100-Computer-Questions-English.pdf,2023-05-02-pUp764514d21ce102.111ISSB VERBAL1 INTELLIGENCE,,,-1-1 1.pdf', '2023-05-02-pUp764514d21cef85.01. Computer Operator (BPS-12).pdf,2023-05-02-pUp764514d21cfc95.CSS Essay- Emergence of Street Power and its Challenges to Democracy in Pakistan.pdf,2023-05-02-pUp764514d21d092b.css-everyday-science-2009.pdf', '2023-05-02-pUp764514d21d1283.01. Computer Operator (BPS-12).pdf,2023-05-02-pUp764514d21d2a28.css-everyday-science-2009.pdf,2023-05-02-pUp764514d21d374c.css-everyday-science-2010.pdf', '2023-05-02-pUp764514d21d41de.Guidline.pdf', '2023-05-02-pUp764514d21d53ac.ISSB INITIAL INTELLIGENCE.pdf,2023-05-02-pUp764514d21d6a71.ISSB Intelligence Test 1 Online Preparation Computerized Initial Test For Pak Army PAF Navy Joining-1.pdf', '2023-05-02-pUp764514d21d78fb.ISSB-English-SCT-Samples.pdf,2023-05-02-pUp764514d21d8744.ISSB-English-SCT-Samples-1.pdf,2023-05-02-pUp764514d21d96cd.ISSB-General-Knowledge-Islamic-Questions-2(1).pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1975-10-29', '2023-05-03 06:19:21', '2023-05-03 06:19:22', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(34, 'UB061', 104, 'Kane', 'Ora Boyd', 'Humphrey', NULL, 'Ad minus tempor dist', 'Czech Republic', '492', NULL, 'married', 'male', 'Enim dolore sint fa', 'Oxford', 'Leysin', 'East Timor', '20095', 'cudetuluw@mailinator.com', '741', 'Yeo Campos', 'Voluptas et lorem vo', 'hyzynurop@mailinator.com', '223', 'Finland', 'Graduation', 'CBSE', 'Sweden', 'Acton Tucker', 'Grade 4', 'Beatae laboriosam v', NULL, NULL, 'Trevor Melendez', NULL, 'not sure', 'applicable', 'notrefused', 'Proident incidunt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-02-32QV645150e3cb948.Everyday Science 2014.pdf,2023-05-02-32QV645150e3cc6c7.Everyday Science 2015.pdf', '2023-05-02-32QV645150e3ccfa0.Islamiat CSS MCQs.pdf,2023-05-02-32QV645150e3cd7ee.ISSB Intelligence Test 1 Online Preparation Computerized Initial Test For Pak Army PAF Navy Joining-1.pdf,2023-05-02-32QV645150e3ce3ce.ISSB MOTTO of different forces-1.pdf', '2023-05-02-32QV645150e3ceaab.02. Senior Data Entry Operator, Key Punch Operator (BPS-12).pdf', '2023-05-02-32QV645150e3cf3f4.02. Senior Data Entry Operator, Key Punch Operator (BPS-12).pdf', '2023-05-02-32QV645150e3cfe4c.DOC-20190910-WA0023.pdf,2023-05-02-32QV645150e3d0ab2.DOC-20190910-WA0024.pdf', '2023-05-02-32QV645150e3d1622.ISSB-Urdu-SCT-Samples-1.pdf,2023-05-02-32QV645150e3d2353.ISSB-WAT-Solved-Sample.pdf', '2023-05-02-32QV645150e3d2dd8._Everyday Science MCQs for CCE 2018-1.pdf', '2023-05-02-32QV645150e3d3a33.World Organizations General Knowledge MCQs-1.pdf,2023-05-02-32QV645150e3d419a.WT_Holy Quran MCQs-1.pdf,2023-05-02-32QV645150e3d498e.اپنی ویب سائیٹ بنائیں.pdf,2023-05-02-32QV645150e3d50dd.آٹھواں پارہ.pdf', NULL, NULL, NULL, 0, '2002-05-02', '2023-05-03 06:35:23', '2023-05-03 06:35:24', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(35, 'UB062', NULL, 'Samantha', 'Glenna Huff', 'Mcgowan', NULL, 'Voluptas ea voluptat', 'Odio dolor et corrup', '921', NULL, 'separated', 'female', 'Et in inventore ut e', 'Et accusamus minim d', 'Itaque doloremque au', 'Omnis numquam tempor', '58691', 'cyka@mailinator.com', '966', 'Garth Hamilton', 'Est laborum pariatur', 'quzotykyxa@mailinator.com', '694', 'Voluptatem dolore d', 'Ea sed voluptas dist', 'Consequatur excepte', 'Asperiores ducimus', 'Penelope Parks', 'Id dolorem aspernat', 'Quos sint id volup', NULL, NULL, 'Drew Dixon', NULL, 'not sure', 'notapplicable', 'refused', 'Id aliquip officia', '2023-05-05-rimx6453f9cd0b389.5-3-2023.docx,2023-05-05-rimx6453f9cd14507.5-4-2023.docx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2023-05-05 07:00:37', '2023-05-05 07:00:37', NULL, NULL, 1, 102, 'ibkaran05@gmail.com'),
(36, 'UB063', NULL, 'Abbot', 'Bell Pate', 'Hunt', NULL, 'Expedita ducimus pl', 'Perferendis exercita', '114', NULL, 'married', 'male', 'Vitae quibusdam impe', 'Eos qui rerum omnis', 'Repudiandae ullamco', 'Ut omnis ut cum nobi', '54941', 'noqolipy@mailinator.com', '995', 'Bree Nielsen', 'Labore dolore laudan', 'felajysota@mailinator.com', '171', 'Minim officia labori', 'Vitae animi natus s', 'Et ad quis qui enim', 'Animi facere minim', 'May Cole', 'At autem modi sunt', 'Culpa culpa esse om', NULL, NULL, 'Damon Rollins', NULL, 'sure', 'applicable', 'notrefused', 'Laboris sint animi', '2023-05-05-qMIp6453fbb59bbbf.CIMS Project Notes.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2023-05-05 07:08:45', '2023-05-05 07:08:45', NULL, NULL, 1, 102, 'ibkaran05@gmail.com'),
(37, 'UB064', 107, 'Slade', 'Holly Michael', 'Mcconnell', NULL, 'Minima dignissimos n', 'Accusantium consequa', '71', NULL, 'single', 'female', 'Laboris impedit eu', 'Quasi vel excepturi', 'Quia voluptas aliqui', 'Molestiae quisquam d', '11484', 'pemor@mailinator.com', '405', 'Reese Nicholson', 'Labore commodo tenet', 'qoqohowow@mailinator.com', '719', 'Officia anim aliquip', 'Nisi ut ut voluptas', 'Commodi labore iusto', 'Sint ipsam harum qu', 'Colorado Ware', 'Debitis adipisci sed', 'Nostrud sed aspernat', NULL, NULL, 'Silas Jones', NULL, 'sure', 'notapplicable', 'refused', 'Doloribus nemo ad ex', '2023-05-05-PaOC6453fca8ad40d.CIMS Project Notes.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2023-05-05 07:12:48', '2023-05-05 07:13:02', NULL, NULL, 1, 102, 'ibkaran05@gmail.com'),
(38, 'UB067', 108, 'Leslie', 'Stuart Johns', 'Vaughan', NULL, 'Do fugit ipsa hic', 'Finland', '533', NULL, 'married', 'female', 'Voluptatem et sed qu', 'Melbourne', 'Delhi', 'Syrian Arab Republic', '17552', 'dusisutawi@mailinator.com', '676', 'Sharon Swanson', 'Alias dolorem exerci', 'wygigivaw@mailinator.com', '130', 'Sweden', 'Grade 1', 'Other', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrefused', 'Quia aspernatur pari', '2023-05-05-bU4g645410cc4d002.02. Senior Data Entry Operator, Key Punch Operator (BPS-12).pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2013-06-19', '2023-05-05 08:38:44', '2023-05-05 08:38:44', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(39, 'UB068', 109, 'Caleb', 'Chantale Gill', 'Maxwell', NULL, 'Dolorum veniam maio', 'Falkland Islands (Malvinas)', '949', NULL, 'separated', 'male', 'Dolores quo voluptat', 'Victoria', 'Wisconsin', 'Antarctica', '49695', 'zeqez@mailinator.com', '42', 'Brett Cooke', 'Quisquam similique q', 'xedawok@mailinator.com', '248', 'Tunisia', 'Grade 3', 'Other', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Lorem velit molestia', NULL, '2023-05-05-r6Oy645411b11fdb7.01. Computer Operator (BPS-12).pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1978-09-13', '2023-05-05 08:42:33', '2023-05-05 08:42:33', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(40, 'UB069', 110, 'Gavin', 'Doris Williams', 'Leon', NULL, 'Et velit eius offici', 'Democratic Republic of the Congo', '210', NULL, 'married', 'female', 'Ullam nostrum in tot', 'Charleston', 'Munich', 'Libyan Arab Jamahiriya', '97704', 'kese@mailinator.com', '822', 'Camilla Vance', 'Esse nemo nihil elig', 'tamedumude@mailinator.com', '922', 'Thailand', 'Graduation', 'Secondary Scale 0-100 (Passing Grade - 40)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Voluptate rem dicta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-05-ejmh6454124f9c643.2nd Merit Lists DVM 20-9-19.pdf', NULL, NULL, NULL, 0, '2013-04-02', '2023-05-05 08:45:11', '2023-05-05 08:45:11', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(41, 'UB070', 111, 'Rashad', 'Colorado Jennings', 'Duran', NULL, 'Asperiores sint quib', 'Tonga', '489', NULL, 'single', 'female', 'Lorem dicta est omni', 'Fredericton', 'New Brunswick', 'Uzbekistan', '13531', 'pyjos@mailinator.com', '383', 'Murphy Glenn', 'Eiusmod eaque maxime', 'caqo@mailinator.com', '603', 'Argentina', 'Grade 3', 'Other', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Officiis culpa cumq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-05-HiZq645413a51e799.03. Surveillance Operator (BS-09).pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1991-12-01', '2023-05-05 08:50:53', '2023-05-05 08:50:53', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(42, 'UB072', 112, 'Rose', 'Quentin Estes', 'Dale', NULL, 'Pariatur Rerum even', 'Guam', '77', NULL, 'married', 'male', 'Aut excepturi ut nem', 'Honolulu', 'Pori', 'Malta', '43696', 'kive@mailinator.com', '529', 'Ferris Cervantes', 'Maxime laboriosam e', 'meci@mailinator.com', '704', 'Russian Federation', 'Grade 4', 'CBSE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Nihil delectus quae', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2014-02-14', '2023-05-05 08:54:16', '2023-05-05 08:54:17', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(43, 'UB074', 113, 'Basia', 'TaShya Lucas', 'Berry', NULL, 'Exercitationem enim', 'Haiti', '237', NULL, 'separated', 'male', 'Eveniet ut et minim', 'Kolding', 'Brisbane', 'Mauritius', '39364', 'daloroni@mailinator.com', '10', 'Maxwell Mckenzie', 'Cupidatat qui volupt', 'sacino@mailinator.com', '539', 'Aruba', 'Grade 4', 'CBSE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Accusantium nihil la', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2000-01-19', '2023-05-05 08:56:08', '2023-05-05 08:56:08', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(44, 'UB075', 114, 'Dora', 'Lesley Romero', 'Chase', NULL, 'Nostrud veniam et q', 'Fiji', '341', NULL, 'married', 'female', 'Eaque proident quae', 'Washington', 'Vermont', 'Bangladesh', '37544', 'vyxyhafol@mailinator.com', '770', 'Amethyst Montoya', 'Enim ullamco commodo', 'lukaz@mailinator.com', '362', 'Bahamas', 'Grade 3', 'Primary Education', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Hic officiis dolorum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2007-03-01', '2023-05-05 08:58:51', '2023-05-05 08:58:52', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(45, 'UB076', 115, 'Kiara', 'Hedda Sanchez', 'Wheeler', NULL, 'Ea in aut quae duis', 'USA', '176', NULL, 'separated', 'female', 'Ipsum fuga Non cons', 'Hanover', 'Lucerne', 'Cook Islands', '95972', 'geloxih@mailinator.com', '558', 'Quon Horton', 'Consequatur Lorem o', 'limis@mailinator.com', '455', 'Syrian Arab Republic', 'Grade 3', 'Other', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Voluptate exercitati', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1976-12-02', '2023-05-05 09:07:59', '2023-05-05 09:08:00', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(46, 'UB077', 116, 'Lane', 'Chastity Palmer', 'Dalton', NULL, 'Fugiat nisi consecte', 'Puerto Rico', '701', NULL, 'single', 'female', 'Anim velit id illo e', 'Melbourne', 'Kolding', 'Republic of Congo', '10727', 'zowatyh@mailinator.com', '133', 'Barbara Snyder', 'Eum consectetur veli', 'baje@mailinator.com', '77', 'Hong Kong', 'Grade 1', 'Other', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Voluptas earum odio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2014-10-12', '2023-05-05 09:13:57', '2023-05-05 09:13:57', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(47, 'UB078', 117, 'Zelenia', 'Kimberley Sullivan', 'Gillespie', NULL, 'Numquam totam atque', 'Macau', '866', NULL, 'single', 'female', 'Quaerat fugiat iusto', 'Terrace', 'Brisbane', 'Guyana', '25280', 'xuro@mailinator.com', '239', 'Hermione Patrick', 'Et nihil quis beatae', 'myqylofyj@mailinator.com', '471', 'Angola', 'Grade 12th or equivalent', 'Secondary Scale 0-100 (Passing Grade - 40)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Ipsa maxime cillum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2014-09-14', '2023-05-05 09:16:29', '2023-05-05 09:16:30', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(48, 'UB079', 118, 'Tobias', 'Roanna Knapp', 'Petersen', NULL, 'Exercitation qui vel', 'Sao Tome and Principe', '322', NULL, 'separated', 'female', 'Vel nihil voluptate', 'Erie county', 'Lincoln', 'Oman', '34090', 'vonucuw@mailinator.com', '18', 'Jessica French', 'Aute obcaecati ducim', 'nipu@mailinator.com', '866', 'United Kingdom', 'Grade 4', 'Primary Education', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrefused', 'Exercitationem tempo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1979-09-15', '2023-05-06 07:30:40', '2023-05-06 07:30:40', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(49, 'UB080', 119, 'Luke', 'Bell Downs', 'Meyer', NULL, 'Ut officia odio dese', 'Isle of Man', '924', NULL, 'married', 'female', 'Sapiente non sunt v', 'Kaunas', 'Montpellier', 'Myanmar', '27381', 'dypeba@mailinator.com', '890', 'Dana Mcfadden', 'Ex laboriosam vitae', 'jebah@mailinator.com', '632', 'Tunisia', 'Grade 1', 'Primary Education', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrefused', 'Laborum Tempore es', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2004-01-01', '2023-05-06 07:43:28', '2023-05-06 07:43:28', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(50, 'UB081', NULL, 'Cole', 'Hakeem Koch', 'Watson', NULL, 'Ex alias excepteur q', 'French Southern Territories', '20', NULL, 'separated', 'male', 'Distinctio Duis id', 'Fredericton', 'New York', 'Mali', '76398', 'joqybal@mailinator.com', '167', 'Shellie Casey', 'Qui omnis laudantium', 'wolibowi@mailinator.com', '97', 'New Zealand', 'Diploma', 'Primary Education', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Nisi aut officia asp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1996-12-19', '2023-05-06 07:44:28', '2023-05-06 07:44:28', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(51, 'UB082', NULL, 'Amaya', 'Nadine Cantrell', 'Franco', NULL, 'Voluptatem Amet ob', 'Serbia', '365', NULL, 'married', 'female', 'Dolor est sit pari', 'Test city', 'West Virginia', 'Azerbaijan', '39183', 'dadupy@mailinator.com', '465', 'Yardley Santiago', 'Illum esse at sit', 'samalo@mailinator.com', '903', 'Mongolia', 'Grade 12th or equivalent', 'Other', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Soluta officia Nam e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-07-02', '2023-05-06 07:56:50', '2023-05-06 07:56:50', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(52, 'UB083', NULL, 'Rhonda', 'Amery Hood', 'Richards', NULL, 'Fugit sed consequat', 'East Timor', '404', NULL, 'married', 'female', 'Hic iste labore vel', 'Leysin', 'California', 'Andorra', '32017', 'holyca@mailinator.com', '461', 'Emmanuel Carter', 'Qui odio nulla dolor', 'zudifuhib@mailinator.com', '862', 'Democratic Republic of the Congo', 'Grade 4', 'Primary Education', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Ea iure aut magna su', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2019-12-02', '2023-05-06 07:57:46', '2023-05-06 07:57:46', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(53, 'UB084', 120, 'Shea', 'Cain Reed', 'Singleton', NULL, 'Elit quidem lorem q', 'Korea, Republic of', '731', NULL, 'married', 'female', 'Lorem cum qui quod a', 'Lincoln', 'South Australia', 'Saudi Arabia', '63926', 'pifuxuqywy@mailinator.com', '100', 'Teagan Decker', 'Culpa ipsam deserun', 'qozov@mailinator.com', '920', 'Morocco', 'Graduation', 'CBSE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Quo elit maiores qu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1971-04-30', '2023-05-06 07:59:26', '2023-05-06 07:59:27', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(54, 'UB085', 121, 'Kessie', 'Yolanda Carter', 'Kane', NULL, 'Voluptas sit ducimu', 'Honduras', '913', NULL, 'separated', 'male', 'Saepe incidunt volu', 'Vancouver', 'Montreux', 'San Marino', '21629', 'hylocijymo@mailinator.com', '597', 'Jason Cannon', 'Cillum sapiente est', 'jicomic@mailinator.com', '861', 'Italy', 'Grade 1', 'Other', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aut quia non sit lab', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2007-11-19', '2023-05-06 08:04:21', '2023-05-06 08:04:21', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(55, 'UB086', NULL, 'Keane', 'Moana Knox', 'Kirkland', NULL, 'Quis culpa amet re', 'Brazil', '565', NULL, 'married', 'female', 'Accusamus voluptas s', 'Adelaide', 'Victoria', 'Saint Vincent and the Grenadines', '44847', 'lypuju@mailinator.com', '652', 'Angelica Ratliff', 'Aut enim libero cons', 'bovyxewu@mailinator.com', '834', 'Ecuador', 'Grade 4', 'Primary Education', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Possimus iure conse', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1970-11-25', '2023-05-06 08:05:11', '2023-05-06 08:05:11', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(56, 'UB087', 122, 'Jessamine', 'Avram Benson', 'Nieves', NULL, 'Est culpa consequat', 'India', '199', NULL, 'married', 'male', 'Ad iste facere anim', 'Aberdeen', 'Adelaide SA', 'Turks and Caicos Islands', '72606', 'gixaqem@mailinator.com', '729', 'Kamal Webb', 'Duis est repudiandae', 'giqyzax@mailinator.com', '1000', 'Solomon Islands', 'Grade 1', 'Primary Education', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrefused', 'Dolore lorem volupta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1971-08-20', '2023-05-06 08:06:24', '2023-05-06 08:06:24', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(57, 'UB088', NULL, 'Tanisha', 'Martha Key', 'Tyler', NULL, 'Aut illo consectetur', 'United Kingdom', '389', NULL, 'single', 'female', 'Odit officia esse q', 'Cairns', 'State test', 'Isle of Man', '72020', 'sulezusojy@mailinator.com', '523', 'Lysandra Rivera', 'Delectus provident', 'zovymesa@mailinator.com', '41', 'Bulgaria', 'Grade 12th or equivalent', 'Secondary Scale 0-100 (Passing Grade - 40)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Maiores odio distinc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1984-06-30', '2023-05-06 23:13:37', '2023-05-06 23:13:37', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(58, 'UB089', NULL, 'Ross', 'Idona Slater', 'Dudley', NULL, 'Adipisicing reprehen', 'Lithuania', '517', NULL, 'single', 'female', 'Officia quos adipisi', 'Cairns', 'California', 'Uruguay', '62968', 'sycabajysa@mailinator.com', '739', 'Kaye Rivas', 'Tenetur nulla necess', 'hohusin@mailinator.com', '151', 'American Samoa', 'Graduation', 'CBSE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Velit asperiores in', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2013-02-28', '2023-05-06 23:20:29', '2023-05-06 23:20:29', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(59, 'UB090', NULL, 'Quincy', 'Yuri Vinson', 'Ray', NULL, 'Aut illum saepe cum', 'Kiribati', '130', NULL, 'single', 'female', 'Aliquid eius qui quo', 'Saskatoon', 'State test', 'Puerto Rico', '38113', 'risuwamira@mailinator.com', '103', 'Nina Yates', 'Velit voluptas dolor', 'cesy@mailinator.com', '797', 'Netherlands', 'Grade 3', 'Other', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrefused', 'Quia sit quasi sit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1971-05-15', '2023-05-06 23:21:34', '2023-05-06 23:21:34', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(60, 'UB091', NULL, 'Barry', 'Rebecca Walls', 'Robinson', NULL, 'Sit eaque eos vero', 'Bolivia', '836', NULL, 'single', 'female', 'Quam est porro elige', 'Castlegar', 'Montreux', 'Tonga', '32656', 'jokal@mailinator.com', '459', 'Gemma Sullivan', 'Eos ipsa dolore ips', 'vacy@mailinator.com', '162', 'USA', 'Graduation', 'Primary Education', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrefused', 'Nostrud voluptatibus', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-01-25', '2023-05-06 23:22:39', '2023-05-06 23:22:39', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(61, 'UB092', NULL, 'Grady', 'Channing Bradford', 'Delaney', NULL, 'Magni et nulla fugia', 'Malta', '592', NULL, 'single', 'female', 'Eos sed ea tempora q', 'Oneonta', 'Montreal', 'Virgin Islands (U.S.)', '13978', 'jukew@mailinator.com', '572', 'Meghan Copeland', 'Sed et beatae sint m', 'zuweru@mailinator.com', '982', 'Taiwan', 'Grade 3', 'CBSE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrefused', 'Et veniam earum obc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2003-04-28', '2023-05-06 23:25:13', '2023-05-06 23:25:13', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(62, 'UB093', NULL, 'August', 'Lois Brooks', 'Stein', NULL, 'Vitae in commodi vit', 'Singapore', '742', NULL, 'single', 'female', 'Corporis ea magnam q', 'Montreux', 'Nevada', 'Trinidad and Tobago', '95837', 'mywekef@mailinator.com', '519', 'Zenia Hernandez', 'Esse debitis archit', 'qaqal@mailinator.com', '161', 'Guernsey', 'Grade 4', 'Secondary Scale 0-100 (Passing Grade - 40)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Doloremque sapiente', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1986-05-17', '2023-05-06 23:26:07', '2023-05-06 23:26:07', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(63, 'UB094', 123, 'Rajah', 'Buckminster Brooks', 'Butler', NULL, 'Est accusamus numqua', 'Ethiopia', '363', NULL, 'married', 'female', 'Recusandae Dolores', 'Churchill Ave', 'British Columbia', 'Mauritius', '35974', 'masoxydep@mailinator.com', '417', 'Fiona Shaw', 'Inventore sed id lib', 'misafineg@mailinator.com', '235', 'Western Sahara', 'Grade 1', 'Primary Education', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Quis duis unde dolor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-04-28', '2023-05-06 23:31:54', '2023-05-06 23:31:54', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(64, 'UB095', NULL, 'Georgia', 'Quinn Salazar', 'Hutchinson', NULL, 'Dolorem quos animi', 'Indonesia', '923', NULL, 'separated', 'female', 'Sunt magna nesciunt', 'Hanover', 'Kolding', 'Slovenia', '96054', 'debedi@mailinator.com', '818', 'Brenna Rush', 'Nulla velit invento', 'hazyraxer@mailinator.com', '376', 'Spain', 'Grade 4', 'CBSE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrefused', 'Fuga Quae culpa fu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1994-08-29', '2023-05-06 23:44:29', '2023-05-06 23:44:29', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(65, 'UB096', NULL, 'Shelley', 'Camille Cochran', 'Sutton', NULL, 'Laborum minima est a', 'Barbados', '614', NULL, 'separated', 'female', 'Vero et sint ipsa f', 'Brisbane', 'Montreal', 'Maldives', '26917', 'ganuhal@mailinator.com', '49', 'Kaye Calderon', 'Dolores accusamus ad', 'vutuxoha@mailinator.com', '35', 'Monaco', 'Grade 3', 'Primary Education', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrefused', 'Quibusdam a qui enim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2018-08-19', '2023-05-06 23:47:33', '2023-05-06 23:47:33', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(66, 'UB097', NULL, 'Penelope', 'Azalia Cline', 'Navarro', NULL, 'Quas quam molestiae', 'South Georgia South Sandwich Islands', '293', NULL, 'married', 'male', 'Fugiat culpa minus', 'Dublin', 'Southport', 'Bulgaria', '37694', 'lehuqy@mailinator.com', '555', 'Phyllis Sutton', 'Omnis minim ut et qu', 'toxupu@mailinator.com', '582', 'Spain', 'Grade 1', 'CBSE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Assumenda placeat b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2007-03-21', '2023-05-06 23:48:23', '2023-05-06 23:48:23', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(67, 'UB098', NULL, 'Macy', 'Kenyon Mcpherson', 'Horton', NULL, 'Ipsa possimus labo', 'French Polynesia', '914', NULL, 'married', 'female', 'Accusantium dolor cu', 'Oneonta', 'Alberta', 'Reunion', '49558', 'tylyp@mailinator.com', '560', 'Willa Jacobson', 'Harum error velit co', 'xojy@mailinator.com', '718', 'Gibraltar', 'Graduation', 'CBSE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Quia aut expedita il', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-02-16', '2023-05-06 23:50:08', '2023-05-06 23:50:08', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(68, 'UB099', NULL, 'Reese', 'Julie Luna', 'Rosa', NULL, 'Minim ducimus quo c', 'Malawi', '279', NULL, 'married', 'female', 'Enim occaecat conseq', 'Kolding', 'Rome', 'Suriname', '13299', 'fuvetaw@mailinator.com', '610', 'Arsenio Gibson', 'Blanditiis accusamus', 'pomyxiceno@mailinator.com', '331', 'Virgin Islands (U.S.)', 'Grade 3', 'Secondary Scale 0-100 (Passing Grade - 40)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Nobis incididunt sit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2015-09-24', '2023-05-06 23:51:08', '2023-05-06 23:51:08', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(69, 'UB100', NULL, 'Zephr', 'Clementine Reynolds', 'Gibbs', NULL, 'Do consectetur sed', 'Seychelles', '971', NULL, 'married', 'female', 'Quia a Nam ad culpa', 'Montreal', 'Montreal', 'Fiji', '88033', 'lulu@mailinator.com', '342', 'Rafael Clark', 'Maiores proident eo', 'hokero@mailinator.com', '163', 'Bulgaria', 'Grade 12th or equivalent', 'Primary Education', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrefused', 'Aperiam nulla aperia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2019-10-17', '2023-05-06 23:54:03', '2023-05-06 23:54:03', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(70, 'UB101', 124, 'Zelenia', 'Callie Tran', 'Snyder', NULL, 'Qui magnam dolor eos', 'New Caledonia', '351', NULL, 'single', 'female', 'Nobis reprehenderit', 'Spokane', 'Noida', 'Ecuador', '17771', 'nydy@mailinator.com', '782', 'Ishmael Collier', 'Praesentium obcaecat', 'toresahi@mailinator.com', '981', 'UAE', 'Grade 1', 'CBSE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrefused', 'Natus quos ipsum vol', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2009-06-26', '2023-05-06 23:55:24', '2023-05-06 23:55:24', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(71, 'UB102', NULL, 'Jason', 'Venus Rios', 'Dalton', NULL, 'Hic occaecat beatae', 'Lao People\'s Democratic Republic', '778', NULL, 'single', 'female', 'Quaerat quaerat ut s', 'Zagreb', 'California', 'Vatican City State', '45948', 'hafupegy@mailinator.com', '802', 'Samson Hester', 'Quia vero itaque pra', 'mudawasuly@mailinator.com', '148', 'Croatia (Hrvatska)', 'Diploma', 'Secondary Scale 0-100 (Passing Grade - 40)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Ab ut assumenda faci', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1995-04-09', '2023-05-07 00:01:38', '2023-05-07 00:01:38', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(72, 'UB103', 125, 'Christen', 'Macy Aguirre', 'Singleton', NULL, 'Pariatur Voluptatem', 'Panama', '190', NULL, 'single', 'male', 'Tempora labore corpo', 'Adelaide', 'New York', 'Central African Republic', '40697', 'mequkekax@mailinator.com', '411', 'Lavinia Hill', 'Quia rerum deleniti', 'jufowuk@mailinator.com', '418', 'Nepal', 'Grade 12th or equivalent', 'Secondary Scale 0-100 (Passing Grade - 40)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Non totam dolorem se', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1984-06-27', '2023-05-07 00:02:50', '2023-05-07 00:02:50', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(73, 'UB104', NULL, 'Vance', 'Whitney Fields', 'Noel', NULL, 'At consequuntur quod', 'French Guiana', '267', NULL, 'single', 'male', 'Magni quod dolore ap', 'Belmont', 'Cairns', 'Heard and Mc Donald Islands', '26137', 'rajyxirali@mailinator.com', '437', 'Kenyon Guzman', 'Amet aliquam dolor', 'wupataq@mailinator.com', '142', 'Tokelau', 'Grade 4', 'Other', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Hic in voluptatibus', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1983-09-18', '2023-05-07 06:03:11', '2023-05-07 06:03:11', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(74, 'UB105', NULL, 'Alexis', 'Jin Ortiz', 'Brooks', NULL, 'Neque vero odio esse', 'Venezuela', '974', NULL, 'single', 'male', 'Irure pariatur Labo', 'Montreux', 'Hanover', 'Eritrea', '90358', 'nasaqy@mailinator.com', '709', 'Dillon Kennedy', 'Ut dolor quae sapien', 'myna@mailinator.com', '117', 'Australia', 'Graduation', 'Secondary Scale 0-100 (Passing Grade - 40)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrefused', 'Impedit excepturi d', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2007-08-09', '2023-05-07 06:29:26', '2023-05-07 06:29:26', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(75, 'UB106', 126, 'Armand', 'Anthony Peterson', 'Waters', NULL, 'Quisquam aut exercit', 'Romania', '810', NULL, 'single', 'male', 'Tempore impedit in', 'Charleston', 'Montreux', 'Antarctica', '52965', 'vakubivype@mailinator.com', '257', 'Evan Holman', 'Dolore molestiae rat', 'bekefi@mailinator.com', '201', 'Mayotte', 'Grade 3', 'CBSE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrefused', 'Officia aperiam sed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1979-10-08', '2023-05-07 06:30:51', '2023-05-07 06:30:52', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(76, 'UB107', 127, 'Leonard', 'Dean Blackwell', 'Wooten', NULL, 'Non aliquam eius qui', 'Suriname', '307', NULL, 'married', 'female', 'Id dignissimos autem', 'Vermilion', 'Munich', 'Panama', '92810', 'qaqoqa@mailinator.com', '922', 'Evangeline Lucas', 'Voluptate dolore pra', 'nedaro@mailinator.com', '668', 'Austria', 'Diploma', 'Other', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrefused', 'Rerum et tenetur asp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1977-08-27', '2023-05-07 06:32:09', '2023-05-07 06:32:09', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(77, 'UB108', 128, 'Maile', 'Florence Good', 'Savage', NULL, 'Nesciunt autem corr', 'Sudan', '7', NULL, 'married', 'male', 'Quasi labore molesti', 'Terrace', 'Quebec', 'Kiribati', '81584', 'zelyzunuv@mailinator.com', '722', 'Sybill Buckley', 'Dolorum dignissimos', 'heci@mailinator.com', '84', 'Iceland', 'Diploma', 'Primary Education', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'In amet vel atque i', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-06-08', '2023-05-07 06:35:08', '2023-05-07 06:35:09', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(78, 'UB109', 129, 'Skyler', 'Carla Hinton', 'Floyd', NULL, 'Nesciunt ad facilis', 'Somalia', '136', NULL, 'separated', 'female', 'Voluptas non aut nem', 'Rome', 'Munich', 'Niue', '41023', 'zexyh@mailinator.com', '507', 'April Gregory', 'Sunt perferendis exe', 'wute@mailinator.com', '803', 'Bangladesh', 'Graduation', 'Secondary Scale 0-100 (Passing Grade - 40)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Est perferendis fugi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1972-11-24', '2023-05-07 07:05:40', '2023-05-07 07:05:40', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(79, 'UB110', NULL, 'Kitra', 'Rowan Clayton', 'Branch', NULL, 'Culpa deleniti et m', 'Virgin Islands (British)', '693', NULL, 'married', 'female', 'Aliquip non ut proid', 'Vaughan', 'Sydney', 'Niue', '79303', 'zezymuc@mailinator.com', '830', 'Deirdre Rosario', 'Non eaque autem temp', 'fyruw@mailinator.com', '100', 'Djibouti', 'Grade 1', 'Secondary Scale 0-100 (Passing Grade - 40)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Temporibus et mollit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1978-06-24', '2023-05-07 07:30:38', '2023-05-07 07:30:38', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(80, 'UB111', 130, 'Ryder', 'Nell Galloway', 'Kirby', NULL, 'Non in ut nihil cons', 'Mauritania', '157', NULL, 'married', 'male', 'Aut voluptatem sint', 'Victoria', 'Delhi', 'Kenya', '41895', 'gimewucyv@mailinator.com', '592', 'Aileen Larsen', 'Iure aute sunt aut a', 'jika@mailinator.com', '928', 'Brazil', 'Grade 1', 'CBSE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrefused', 'Nulla omnis est opt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1985-09-13', '2023-05-07 07:31:44', '2023-05-07 07:31:45', NULL, NULL, 1, 1, 'Mr Mithun Gupta');
INSERT INTO `students` (`id`, `unique_id`, `user_id`, `first_name`, `middle_name`, `last_name`, `birth_date`, `first_language`, `country_citizenship`, `passport_number`, `passport_expiry_date`, `marital_status`, `gender`, `address`, `city`, `state`, `country`, `postal_zip`, `email`, `contact_no`, `emergency_contact_name`, `emergency_contact_relation`, `emergency_contact_email`, `emergency_contact_phone`, `country_edu`, `high_level_edu`, `grading_scheme`, `country_institute`, `institute_name`, `level_education`, `lan_institute`, `institute_from`, `institute_to`, `degree_name`, `graduation_date`, `institute_confirmation`, `physical_certificate`, `visa_country_refusal`, `visa_country_refusal_detail`, `passport`, `ielts`, `grade_10`, `grade_12`, `bachelor_mark_sheet`, `bachelor_certificate`, `master_mark_sheet`, `master_certificate`, `lors`, `resume`, `work_experience`, `moi`, `personal_statement`, `diploma_mark_sheet`, `diploma_certificate`, `other_certificate`, `application_team`, `application_team_name`, `application_team_comment`, `status`, `intake`, `created_at`, `updated_at`, `deleted_at`, `password`, `lead_status`, `created_by`, `created_by_name`) VALUES
(81, 'UB112', 131, 'Colby', 'Daquan Houston', 'Hendrix', NULL, 'Molestiae libero sun', 'Namibia', '36', NULL, 'separated', 'female', 'Dolore non eos ipsa', 'Toronto', 'Nevada', 'Saudi Arabia', '72955', 'bepykizy@mailinator.com', '37', 'Molly Blair', 'Alias consectetur h', 'qyseda@mailinator.com', '779', 'United Arab Emirates', 'Diploma', 'Primary Education', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'refused', 'Ut ab earum ut quis', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2012-10-13', '2023-05-07 07:33:40', '2023-05-07 07:33:40', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(82, 'UB113', 132, 'Dawn', 'Joelle Horton', 'Poole', NULL, 'Aute molestias dolor', 'Hungary', '752', NULL, 'single', 'male', 'Perspiciatis est d', 'Shoreline', 'Wisconsin', 'Spain', '36775', 'xypydosaq@mailinator.com', '745', 'Kaden Velasquez', 'Alias in consequatur', 'vitor@mailinator.com', '912', 'Bosnia and Herzegovina', 'Grade 3', 'CBSE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'notrefused', 'Aute consectetur Na', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-12-27', '2023-05-07 07:36:47', '2023-05-07 07:36:47', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(83, 'UB118', NULL, 'Lee and Dixon Plc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'xifydadex@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2023-05-09 07:05:58', '2023-05-09 07:05:58', NULL, '$2y$10$7BT5nBPDXDRwlHmNPKfzTee.isX9yNDorVna.pKRB0kU0NISKN0bi', 1, 1, 'Mr Mithun Gupta'),
(85, 'UB123', 142, 'Myers Harmon Trading', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rytiv@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2023-05-09 08:07:40', '2023-05-09 08:23:30', NULL, '$2y$10$6wtt.KTzUsotv1XCBlj5fe6QF0cUOBsvHst2KD0m1WP1.Qh1Ebbza', 1, 1, 'Mr Mithun Gupta'),
(86, 'UB125', NULL, 'Winifred', 'Hyacinth Salazar', 'Reynolds', '3/5/1990', 'Autem dolores qui la', 'Quis est architecto', '96442', '3/13/1986', 'married', 'male', 'Eum consequatur In', 'Minim ut laudantium', 'Velit aut ut qui dol', 'Voluptas quo aute ni', '53663', 'nyjiposip@mailinator.com', '369', 'Cairo Gould', 'Laudantium aut vel', 'pogerira@mailinator.com', '569', 'Exercitation anim do', 'Aliqua Omnis volupt', 'Nisi quia quod aut f', 'Sint laborum volupta', 'Lacy Clemons', 'Sunt dolore odio et', 'Libero magnam minim', '12/12/1991', '11/23/1994', 'Evelyn Tucker', '4/29/2014', 'sure', 'applicable', 'refused', 'Enim est odio nisi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'NULL', '2023-05-10 09:51:02', '2023-05-10 09:51:02', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(87, 'UB126', NULL, 'Winifred', 'Hyacinth Salazar', 'Reynolds', '3/5/1990', 'Autem dolores qui la', 'Quis est architecto', '96442', '3/13/1986', 'married', 'male', 'Eum consequatur In', 'Minim ut laudantium', 'Velit aut ut qui dol', 'Voluptas quo aute ni', '53663', 'nyjiposip@mailinator.com', '369', 'Cairo Gould', 'Laudantium aut vel', 'pogerira@mailinator.com', '569', 'Exercitation anim do', 'Aliqua Omnis volupt', 'Nisi quia quod aut f', 'Sint laborum volupta', 'Lacy Clemons', 'Sunt dolore odio et', 'Libero magnam minim', '12/12/1991', '11/23/1994', 'Evelyn Tucker', '4/29/2014', 'sure', 'applicable', 'refused', 'Enim est odio nisi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'NULL', '2023-05-10 09:52:42', '2023-05-10 09:52:42', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(88, 'UB127', NULL, 'Winifred', 'Hyacinth Salazar', 'Reynolds', '3/5/1990', 'Autem dolores qui la', 'Quis est architecto', '96442', '3/13/1986', 'married', 'male', 'Eum consequatur In', 'Minim ut laudantium', 'Velit aut ut qui dol', 'Voluptas quo aute ni', '53663', 'nyjiposip@mailinator.com', '369', 'Cairo Gould', 'Laudantium aut vel', 'pogerira@mailinator.com', '569', 'Exercitation anim do', 'Aliqua Omnis volupt', 'Nisi quia quod aut f', 'Sint laborum volupta', 'Lacy Clemons', 'Sunt dolore odio et', 'Libero magnam minim', '12/12/1991', '11/23/1994', 'Evelyn Tucker', '4/29/2014', 'sure', 'applicable', 'refused', 'Enim est odio nisi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', '2023-05-11 06:33:28', '2023-05-11 06:33:28', NULL, NULL, 1, 1, 'Mr Mithun Gupta'),
(89, 'UB079', 133, 'Winifred', 'Hyacinth Salazar', 'Reynolds', '3/5/1990', 'Autem dolores qui la', 'Quis est architecto', '96442', '3/13/1986', 'married', 'male', 'Eum consequatur In', 'Minim ut laudantium', 'Velit aut ut qui dol', 'Voluptas quo aute ni', '53663', 'nyjiposip@mailinator.com', '369', 'Cairo Gould', 'Laudantium aut vel', 'pogerira@mailinator.com', '569', 'Exercitation anim do, Exercitation anim do, Exercitation', 'Aliqua Omnis volupt, Aliqua Omnis volupt, Aliqua Omnis volupt', 'Nisi quia quod aut f, Nisi quia quod aut f, Nisi quia quod aut f', 'Sint laborum volupta', 'Lacy Clemons', 'Sunt dolore odio et', 'Libero magnam minim', '12/12/1991', '11/23/1994', 'Evelyn Tucker', '4/29/2014', 'sure', 'applicable', 'refused', 'Enim est odio nisi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '3/7/1901', '2023-05-12 11:37:30', '2023-05-12 11:37:30', NULL, '$2y$10$1UMQlOiuwYX8EYqWRzlpu.37.wM7o9/WQxRcCPaq83MQPD.W81iw2', 1, 1, 'Mr Mithun Gupta'),
(90, 'UB080', 134, 'Winifred', 'Hyacinth Salazar', 'Reynolds', '3/5/1990', 'Autem dolores qui la', 'Quis est architecto', '96442', '3/13/1986', 'married', 'male', 'Eum consequatur In', 'Minim ut laudantium', 'Velit aut ut qui dol', 'Voluptas quo aute ni', '53663', 'nyjiposip@mailinator.com', '369', 'Cairo Gould', 'Laudantium aut vel', 'pogerira@mailinator.com', '569', 'Exercitation anim do, Exercitation anim do, Exercitation', 'Aliqua Omnis volupt, Aliqua Omnis volupt, Aliqua Omnis volupt', 'Nisi quia quod aut f, Nisi quia quod aut f, Nisi quia quod aut f', 'Sint laborum volupta', 'Lacy Clemons', 'Sunt dolore odio et', 'Libero magnam minim', '12/12/1991', '11/23/1994', 'Evelyn Tucker', '4/29/2014', 'sure', 'applicable', 'refused', 'Enim est odio nisi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '3/7/1901', '2023-05-12 11:38:11', '2023-05-12 11:38:11', NULL, '$2y$10$dM9wbowvdrMGtZBIQWF6peA39MY.YsbVm9zklkCNzq13Bp8FaIvoW', 1, 1, 'Mr Mithun Gupta'),
(91, 'UB081', 135, 'Winifred', 'Hyacinth Salazar', 'Reynolds', '3/5/1990', 'Autem dolores qui la', 'Quis est architecto', '96442', '3/13/1986', 'married', 'male', 'Eum consequatur In', 'Minim ut laudantium', 'Velit aut ut qui dol', 'Voluptas quo aute ni', '53663', 'nyjiposip@mailinator.com', '369', 'Cairo Gould', 'Laudantium aut vel', 'pogerira@mailinator.com', '569', 'Exercitation anim do, Exercitation anim do, Exercitation', 'Aliqua Omnis volupt, Aliqua Omnis volupt, Aliqua Omnis volupt', 'Nisi quia quod aut f, Nisi quia quod aut f, Nisi quia quod aut f', 'Sint laborum volupta', 'Lacy Clemons', 'Sunt dolore odio et', 'Libero magnam minim', '12/12/1991', '11/23/1994', 'Evelyn Tucker', '4/29/2014', 'sure', 'applicable', 'refused', 'Enim est odio nisi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '3/7/1901', '2023-05-12 11:38:53', '2023-05-12 11:38:53', NULL, '$2y$10$yHL4GmSJYfM1toVk0t95Ke5DvsfiIRzxTYW4foLCR9CxAwAOvrPKK', 1, 1, 'Mr Mithun Gupta');

--
-- Triggers `students`
--
DELIMITER $$
CREATE TRIGGER `id_stores` BEFORE INSERT ON `students` FOR EACH ROW BEGIN
                    INSERT INTO sequence_tbls VALUES (NULL);
                    SET NEW.unique_id = CONCAT("UB", LPAD(LAST_INSERT_ID(), 3, "0"));
                END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student_applications`
--

CREATE TABLE `student_applications` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `application_fee` varchar(255) DEFAULT NULL,
  `application_fee_status` int(11) NOT NULL DEFAULT 0,
  `visa_fee` varchar(255) DEFAULT NULL,
  `visa_fee_status` int(11) DEFAULT 0,
  `payment_date` date DEFAULT NULL,
  `pay_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_applications`
--

INSERT INTO `student_applications` (`id`, `student_id`, `college_id`, `course_id`, `application_fee`, `application_fee_status`, `visa_fee`, `visa_fee_status`, `payment_date`, `pay_status`, `created_at`, `updated_at`) VALUES
(1, 18, 12, 11, NULL, 1, '$321', 1, '2023-05-03', 1, '2023-05-04 07:54:35', '2023-05-04 07:54:35'),
(2, 10, 12, 9, '$321', 1, '$123', 1, '2023-05-04', 1, '2023-05-04 07:58:05', '2023-05-04 07:58:05'),
(9, 3, 27, 33, '$123', 1, NULL, 1, '2023-05-03', 1, '2023-05-03 20:35:59', '2023-05-03 20:35:59'),
(10, 8, 14, 36, '200', 1, '100', 1, '2023-05-04', 1, '2023-05-04 05:22:25', '2023-05-04 05:22:25'),
(11, 33, 12, 9, '34', 1, '33', 1, NULL, 1, '2023-05-04 05:22:43', '2023-05-04 05:22:43'),
(12, 5, 14, 36, '$123', 1, '$123', 1, '2023-05-06', 1, '2023-05-04 07:01:46', '2023-05-04 07:01:46'),
(13, 20, 12, 11, NULL, 0, '$321', 1, '2023-05-06', 1, '2023-05-04 07:01:58', '2023-05-04 07:01:58'),
(15, 6, 27, 33, '$432', 1, NULL, 0, '2023-05-06', 1, '2023-05-05 10:20:49', '2023-05-05 10:20:49'),
(18, 5, 27, 33, '$500', 1, NULL, 0, NULL, 1, '2023-05-08 07:53:04', '2023-05-08 07:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `student_applies`
--

CREATE TABLE `student_applies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `recruiter_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_applies`
--

INSERT INTO `student_applies` (`id`, `student_id`, `recruiter_id`, `created_by`, `course_id`, `college_id`, `created_at`, `updated_at`) VALUES
(1, 4, 102, NULL, 11, 12, '2023-05-04 19:13:23', '2023-05-04 19:13:23'),
(2, 6, 102, NULL, 10, 12, '2023-05-04 19:13:32', '2023-05-04 19:13:32'),
(3, 3, 102, NULL, 9, 12, '2023-05-04 19:13:40', '2023-05-04 19:13:40'),
(7, 18, NULL, 1, 35, 27, '2023-05-07 07:41:54', '2023-05-07 07:41:54'),
(8, 12, NULL, 1, 33, 27, '2023-05-07 07:43:37', '2023-05-07 07:43:37'),
(9, 12, NULL, 1, 16, 14, '2023-05-07 08:02:49', '2023-05-07 08:02:49'),
(10, 5, 102, NULL, 35, 86, '2023-05-07 10:10:27', '2023-05-07 10:10:27'),
(11, 5, NULL, 1, 33, 27, '2023-05-08 07:53:04', '2023-05-08 07:53:04'),
(12, 6, NULL, 102, 12, 13, '2023-05-12 11:33:19', '2023-05-12 11:33:19'),
(13, 20, NULL, 136, 20, 18, '2023-05-12 11:45:11', '2023-05-12 11:45:11'),
(14, 8, NULL, 136, 18, 18, '2023-05-12 11:46:59', '2023-05-12 11:46:59'),
(15, 67, NULL, 136, 13, 13, '2023-05-12 11:49:58', '2023-05-12 11:49:58'),
(16, 9, NULL, 1, 20, 18, '2023-05-13 19:20:25', '2023-05-13 19:20:25'),
(17, 20, NULL, 1, 34, 27, '2023-05-13 19:20:40', '2023-05-13 19:20:40'),
(18, 12, NULL, 102, 24, 21, '2023-05-13 19:29:27', '2023-05-13 19:29:27'),
(19, 4, NULL, 1, 11, 12, '2023-05-16 11:45:51', '2023-05-16 11:45:51'),
(20, 17, NULL, 102, 34, 27, '2023-05-16 18:05:06', '2023-05-16 18:05:06'),
(21, 4, NULL, 139, 12, 13, '2023-05-29 18:23:18', '2023-05-29 18:23:18');

-- --------------------------------------------------------

--
-- Table structure for table `student_eduction_histories`
--

CREATE TABLE `student_eduction_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `country_education` varchar(255) DEFAULT NULL,
  `highest_level_edu` varchar(255) DEFAULT NULL,
  `grading_scheme` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_eduction_histories`
--

INSERT INTO `student_eduction_histories` (`id`, `student_id`, `country_education`, `highest_level_edu`, `grading_scheme`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 59, 'Afghanistan', 'Grade 3', 'Primary Education', '1', '2023-05-07 08:07:37', '2023-05-07 08:07:37'),
(2, 59, 'Belarus', 'Grade 1', 'Secondary Scale 0-100 (Passing Grade - 40)', '1', '2023-05-07 08:07:37', '2023-05-07 08:07:37'),
(10, 60, 'Benin', 'Graduation', 'Secondary Scale 0-100 (Passing Grade - 40)', '1', '2023-05-08 10:51:27', '2023-05-08 10:51:27'),
(11, 60, 'Afghanistan', 'Grade 3', 'Primary Education', '1', '2023-05-08 11:14:20', '2023-05-08 11:14:20'),
(12, 61, 'Afghanistan', 'Grade 3', 'Primary Education', '1', '2023-05-08 11:21:47', '2023-05-08 11:21:47'),
(13, 61, 'Belize', 'Grade 12th or equivalent', 'Other', '1', '2023-05-08 11:21:48', '2023-05-08 11:21:48');

-- --------------------------------------------------------

--
-- Table structure for table `student_notes`
--

CREATE TABLE `student_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `notes` longtext DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_by_name` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '''1''=''eligible'',''0''=''not-eligible''',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_notes`
--

INSERT INTO `student_notes` (`id`, `student_id`, `notes`, `created_by`, `created_by_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 96, 'Rerum adipisicing is Rerum adipisicing is\r\nRerum adipisicing is\r\nRerum adipisicing is\r\nRerum adipisicing is', 1, 'Mr Mithun Gupta', 1, '2023-05-16 08:00:25', '2023-05-16 08:00:25'),
(2, 96, 'Nostrud quas perspic Nostrud quas perspic Nostrud quas perspic\r\nNostrud quas perspic\r\nNostrud quas perspicNostrud quas perspicNostrud quas perspic', 1, 'Mr Mithun Gupta', 1, '2023-05-16 08:00:57', '2023-05-16 08:00:57'),
(3, 96, 'Distinctio Sed repeDistinctio Sed repeDistinctio Sed repeDistinctio Sed repeDistinctio Sed repeDistinctio Sed repeDistinctio Sed repeDistinctio Sed repeDistinctio Sed repe', 1, 'Mr Mithun Gupta', 0, '2023-05-16 08:11:43', '2023-05-16 08:11:43'),
(4, 95, 'Eius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque id', 1, 'Mr Mithun Gupta', 0, '2023-05-16 08:19:21', '2023-05-16 08:19:21'),
(5, 94, 'Eius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque idEius ipsum atque id', 1, 'Mr Mithun Gupta', 1, '2023-05-16 08:19:47', '2023-05-16 08:19:47'),
(6, 10, 'Exercitationem vero Exercitationem vero Exercitationem vero Exercitationem vero Exercitationem vero Exercitationem vero', 2, 'Application Team', 1, '2023-05-15 20:22:14', '2023-05-15 20:22:14'),
(7, 13, 'Omnis dolore numquam Omnis dolore numquam Omnis dolore numquam Omnis dolore numquam Omnis dolore numquam Omnis dolore numquam Omnis dolore numquam Omnis dolore numquam Omnis dolore numquam Omnis dolore numquam', 2, 'Application Team', 0, '2023-05-15 20:22:33', '2023-05-15 20:22:33'),
(8, 91, 'Voluptatem obcaecati Voluptatem obcaecati Voluptatem obcaecati Voluptatem obcaecati Voluptatem obcaecati Voluptatem obcaecati Voluptatem obcaecati Voluptatem obcaecati Voluptatem obcaecati Voluptatem obcaecati Voluptatem obcaecati Voluptatem obcaecati Voluptatem obcaecati Voluptatem obcaecati Voluptatem obcaecati', 1, 'Mr Mithun Gupta', 1, '2023-05-15 20:24:48', '2023-05-15 20:24:48'),
(9, 90, 'Quia minima consecte Quia minima consecte Quia minima consecte Quia minima consecte Quia minima consecte Quia minima consecte Quia minima consecte', 1, 'Mr Mithun Gupta', 0, '2023-05-15 20:25:14', '2023-05-15 20:25:14'),
(10, 91, 'eligible student', 1, 'Mr Mithun Gupta', 1, '2023-05-16 11:06:52', '2023-05-16 11:06:52'),
(11, 91, 'not eligible', 1, 'Mr Mithun Gupta', 1, '2023-05-16 11:08:23', '2023-05-16 11:08:23'),
(12, 90, 'eligible', 1, 'Mr Mithun Gupta', 1, '2023-05-16 17:57:25', '2023-05-16 17:57:25'),
(13, 90, 'not eligible', 1, 'Mr Mithun Gupta', 0, '2023-05-16 17:58:00', '2023-05-16 17:58:00'),
(14, 15, 'Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa', 2, 'Application Team', 1, '2023-05-16 17:59:26', '2023-05-16 17:59:26'),
(15, 32, 'Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa Sed porro qui accusa', 2, 'Application Team', 0, '2023-05-16 17:59:46', '2023-05-16 17:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `student_passwords`
--

CREATE TABLE `student_passwords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `student_password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_passwords`
--

INSERT INTO `student_passwords` (`id`, `user_id`, `student_password`, `created_at`, `updated_at`) VALUES
(1, 24, 'ajLpoRFCYW', '2023-04-02 21:57:02', '2023-04-02 21:57:02'),
(2, 25, 'jLkNJOET8G', '2023-04-03 01:06:23', '2023-04-03 01:06:23'),
(3, 26, 'PDUk0F1aAK', '2023-04-02 13:08:45', '2023-04-02 13:08:45'),
(4, 28, '2hVgNAZAsf', '2023-04-02 13:10:38', '2023-04-02 13:10:38'),
(5, 29, 'GP7Hguewyf', '2023-04-02 13:11:58', '2023-04-02 13:11:58'),
(6, 34, 'DlQ5bMU27G', '2023-04-04 02:56:33', '2023-04-04 02:56:33'),
(7, 38, 'RKBqvtwpDZ', '2023-04-05 22:49:43', '2023-04-05 22:49:43'),
(8, 39, 'Jv7qLm39QF', '2023-04-05 22:51:43', '2023-04-05 22:51:43'),
(9, 40, 'xI6nhm4IEs', '2023-04-05 22:52:36', '2023-04-05 22:52:36'),
(10, 45, 'password', '2023-04-13 04:46:57', '2023-04-18 13:07:28'),
(11, 53, 'password', '2023-04-19 12:47:39', '2023-04-21 15:10:21'),
(12, 62, 'Cs7RB9OHhy', '2023-04-20 05:46:43', '2023-04-20 05:46:43'),
(13, 63, 'Eo45L6U4sa', '2023-04-20 05:50:40', '2023-04-20 05:50:40'),
(14, 64, '0CZc8mXjYO', '2023-04-20 05:52:20', '2023-04-20 05:52:20'),
(15, 66, 'yzL8gu314f', '2023-04-21 04:26:28', '2023-04-21 04:26:28'),
(16, 73, 'uY70ldJQPy', '2023-04-25 03:31:51', '2023-04-25 03:31:51'),
(17, 79, 'Fdqle8lpMr', '2023-04-25 04:29:00', '2023-04-25 04:29:00'),
(18, 81, 'fnwZD5AtHE', '2023-04-25 05:15:26', '2023-04-25 05:15:26'),
(19, 82, 'QIxkWOHgWs', '2023-04-25 05:33:52', '2023-04-25 05:33:52'),
(20, 84, 'aVTfiYCLPj', '2023-04-25 06:47:50', '2023-04-25 06:47:50'),
(21, 101, 'yxLI12hvDh', '2023-04-26 06:05:29', '2023-04-26 06:05:29'),
(22, 103, 'fwBKl3eJBU', '2023-05-02 19:11:06', '2023-05-02 19:11:06'),
(23, 104, 'fYIhg2qCmN', '2023-05-02 19:14:51', '2023-05-02 19:14:51'),
(24, 105, 'mG9FN2qhDY', '2023-05-04 19:16:41', '2023-05-04 19:16:41'),
(25, 106, 'RJbbkRT3aT', '2023-05-04 21:06:24', '2023-05-04 21:06:24'),
(26, 107, 'CUGpcimIDR', '2023-05-06 18:37:35', '2023-05-06 18:37:35'),
(27, 108, '1Q95lZhpfR', '2023-05-06 18:39:42', '2023-05-06 18:39:42'),
(28, 109, 'AmLwuirX9t', '2023-05-06 19:15:38', '2023-05-06 19:15:38'),
(29, 110, 'SbUn3KVWMT', '2023-05-06 19:18:21', '2023-05-06 19:18:21'),
(30, 111, '0piDlgAFy9', '2023-05-07 07:55:56', '2023-05-07 07:55:56'),
(31, 112, 'YbycwpsyvB', '2023-05-07 08:07:37', '2023-05-07 08:07:37'),
(32, 113, 'w3gsjLcXW6', '2023-05-07 10:07:37', '2023-05-07 10:07:37'),
(33, 123, 'Ec2hbsndN1', '2023-05-08 11:21:48', '2023-05-08 11:21:48'),
(34, 125, 'password', '2023-05-08 20:29:40', '2023-05-08 20:30:38'),
(35, 133, 'password', '2023-05-12 11:37:30', '2023-05-12 11:37:30'),
(36, 134, 'password', '2023-05-12 11:38:11', '2023-05-12 11:38:11'),
(37, 135, 'password', '2023-05-12 11:38:53', '2023-05-12 11:38:53');

-- --------------------------------------------------------

--
-- Table structure for table `student_pending_documents`
--

CREATE TABLE `student_pending_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `pending_document` varchar(255) DEFAULT NULL,
  `lead_status` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_by_name` varchar(255) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_pending_documents`
--

INSERT INTO `student_pending_documents` (`id`, `student_id`, `pending_document`, `lead_status`, `comment`, `created_by`, `created_by_name`, `created_date`, `created_at`, `updated_at`) VALUES
(1, 13, 'moi', '4', NULL, 2, 'Application Team', NULL, '2023-04-11 02:27:46', '2023-04-11 02:27:46'),
(2, 10, 'diploma_mark_sheet', '3', NULL, 2, 'Application Team', NULL, '2023-04-11 03:10:17', '2023-04-11 03:10:17'),
(3, 10, 'passport', '4', NULL, 2, 'Application Team', NULL, '2023-04-11 03:19:34', '2023-04-11 03:19:34'),
(4, 13, 'grade_12', '4', NULL, 2, 'Application Team', NULL, '2023-04-10 15:38:13', '2023-04-10 15:38:13'),
(5, 10, 'grade_10', '3', 'comment test by salman', 2, 'Application Team', NULL, '2023-04-10 22:49:20', '2023-04-10 22:49:20'),
(6, 10, 'ielts', '3', 'complete', 2, 'Application Team', NULL, '2023-04-10 23:56:32', '2023-04-10 23:56:32'),
(7, 10, 'passport', '1', 'pending document', 2, 'Application Team', NULL, '2023-04-10 23:56:54', '2023-04-10 23:56:54'),
(8, 10, 'bachelor_certificate', '3', 'test another data', 2, 'Application Team', NULL, '2023-04-11 04:10:24', '2023-04-11 04:10:24'),
(9, 10, 'passport', '1', NULL, 2, 'Application Team', NULL, '2023-04-13 05:49:40', '2023-04-13 05:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `role` enum('manager','application','recruiter','student','rm') NOT NULL DEFAULT 'student',
  `status` tinyint(4) DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Application Team', 'app@gmail.com', '2023-02-03 06:23:32', '$2y$10$1gY8f9s8Cy0G.Z1nJEqej.lbHLD32PQxbjW1isXhTtr4NV8uzU22C', 'uploads/application/profile/1681842351-img.png', 'application', 1, 'dYK0RfVqUM4H3jFYlYEDcnLOnWmrouuCxaxtB64cRoJWCFbamqSnsNtL1TUX', '2023-02-03 06:23:32', '2023-05-06 18:22:48'),
(5, 'Eddie Ratke MD', 'jeramy.rosenbaum@example.com', '2023-02-03 06:23:32', '$2y$10$eD/xPnl5kN/8Vbv1XYW3mOBQmhif1l0D/8Sprcc6x./Ze0McOrv2C', NULL, 'recruiter', 1, 'YgTQnKWAMS', '2023-02-03 06:23:32', '2023-04-01 14:33:49'),
(6, 'Mithun Gupta', 'user@gmail.com', '2023-02-04 05:24:47', '$2y$10$N/80KrW4DbPtiuu4gHNIy.nrOOZQRLjm6F6bZjFqacQu5BTq.nhY.', NULL, 'recruiter', 1, NULL, '2023-02-03 13:17:18', '2023-04-03 03:08:35'),
(8, 'Mihir Mehra', 'mihirmehrajio@gmail.com', NULL, '$2y$10$YdhZJuRvoBJI8bwF751NvercNjHjr1x41MR8ELrISD7e1buFii9rG', NULL, 'student', 1, NULL, '2023-02-20 01:50:13', '2023-02-20 01:50:13'),
(10, 'bitcoder@gmail.com', 'bitcoder@gmail.com', NULL, '$2y$10$QEo9KUQm4iBJF7cQT9vjS.nKQrVwwik3zAOdkcFkk6AaVH0z94u0m', NULL, 'recruiter', 1, NULL, '2023-03-31 00:57:28', '2023-03-31 15:07:56'),
(16, 'Sonu Kumar', 'liwe@mailinator.com', NULL, '$2y$10$9LN2UfJiBgROIKQ6iOV/KeN1nxSaBDVB55BmdSpYNwmtIIrqy1eFG', 'uploads/application/profile/1681972467-img.png', 'application', 1, NULL, '2023-04-01 14:11:12', '2023-04-23 06:35:29'),
(17, 'gicukejuni@mailinator.com', 'gicukejuni@mailinator.com', NULL, '$2y$10$f/JeM8tNcS3VeRyrNdBi/.Zh60KI9FCV/f8dAPH5BWLiJLiBTAA6m', NULL, 'recruiter', 1, NULL, '2023-04-01 14:12:35', '2023-04-01 14:12:35'),
(18, 'bitcoder', 'bitcoder@gmail.com', NULL, '$2y$10$vyOnn3MiSttGSaQJyYRtUuW..DPZmtrngIzffKvhjhauwNXsRVnrS', NULL, 'student', 1, NULL, '2023-04-01 14:16:22', '2023-04-01 14:33:14'),
(20, 'qiqeqyse@mailinator.com', 'qiqeqyse@mailinator.com', NULL, '$2y$10$q7RxrGPPeaXXJpgscyDjBOLIa63teT60ItIkJh7eQ/NeVY4Pk.jhW', NULL, 'recruiter', 1, NULL, '2023-04-01 15:15:06', '2023-04-01 15:15:06'),
(21, 'kiku@mailinator.com', 'kiku@mailinator.com', NULL, '$2y$10$HbT90rpsseeUkznRLQKh2.GnHet2nWevPgP.oML.nGPO4UdDJEGrO', NULL, 'recruiter', 1, NULL, '2023-04-02 03:53:48', '2023-04-02 03:53:48'),
(22, 'kysujyt@mailinator.com', 'kysujyt@mailinator.com', NULL, '$2y$10$9Xqv6MW52kRbwrSbqeKMX.CM1i7wkw6F2oyJFhQ5Kd5WFaeKo92tm', NULL, 'recruiter', 1, NULL, '2023-04-02 03:54:04', '2023-04-02 03:54:04'),
(24, 'nyjiposip@mailinator.com', 'nyjiposip@mailinator.com', NULL, '$2y$10$2A1hwwkJ4JMWS1N2CAgoquJbJdjqYqIQc8lEsLO8SrAopvsMjP1R2', NULL, 'student', 1, NULL, '2023-04-02 21:57:02', '2023-04-03 01:02:18'),
(25, 'wabeju', 'wabeju@mailinator.com', NULL, '$2y$10$4PDyauPJ7yYy43y.8DXO2.xoJhldnmgEZx/Ch7GuEozoofntkRGHO', NULL, 'student', 1, NULL, '2023-04-03 01:06:23', '2023-04-02 22:32:16'),
(26, 'ryvut@mailinator.com', 'ryvut@mailinator.com', NULL, '$2y$10$zo53j2a2Ipu5VLZoyfYvxObwIL5m9DtchUs.lMjJngLNqfaVyN3OC', NULL, 'student', 1, NULL, '2023-04-02 13:08:45', '2023-04-02 13:08:45'),
(27, 'xivelemu@mailinator.com', 'xivelemu@mailinator.com', NULL, '$2y$10$jiiMEj3xxy3DLGuwusmSdum6xil4dVIr8vaqhGwRTQJLpRoV9i86.', NULL, 'recruiter', 1, NULL, '2023-04-02 13:09:36', '2023-04-02 13:09:36'),
(28, 'lotyzewa@mailinator.com', 'lotyzewa@mailinator.com', NULL, '$2y$10$/HBAhpuKerFAOyQwuhXipOgRZNBmdwtr5q1cBPS6Q4fvMl4MnjkzG', NULL, 'recruiter', 1, NULL, '2023-04-02 13:10:38', '2023-04-21 03:57:13'),
(29, 'zosej@mailinator.com', 'zosej@mailinator.com', NULL, '$2y$10$l435NcXCJ2N5GECFMRRM2epzWbijdLPzGgK47zhB6mjvMqVw1C1hG', NULL, 'student', 1, NULL, '2023-04-02 13:11:58', '2023-04-02 13:11:58'),
(30, 'furu@mailinator.com', 'furu@mailinator.com', NULL, '$2y$10$pGDBK95BeE9gAKv2JPuHoeSjK4brPV4/.HX7i5S2nTmifhE5xAW1i', NULL, 'recruiter', 1, NULL, '2023-04-02 13:16:22', '2023-04-02 13:16:22'),
(32, 'xunux@mailinator.com', 'xunux@mailinator.com', NULL, '$2y$10$CSFvCFotQ1ynxQhaNP1V7.us2ZGmZEUvshS3fu1.YyAMCtRlwgu/a', NULL, 'recruiter', 1, NULL, '2023-04-03 14:38:46', '2023-04-03 14:38:46'),
(33, 'quhodo@mailinator.com', 'quhodo@mailinator.com', NULL, '$2y$10$3t.drgMWWauOcTVGs5TOtOoK30vyFcDyFSuLOSL4LVDgdN.aKi6ja', NULL, 'recruiter', 1, NULL, '2023-04-03 14:51:47', '2023-04-03 14:51:47'),
(34, 'picadex@mailinator.com', 'picadex@mailinator.com', NULL, '$2y$10$3OJVGVwF3q7N8O.E9Agy0ODmIFS7urV42PnMi38KrMa332vwzAzgG', NULL, 'student', 1, NULL, '2023-04-04 02:56:33', '2023-04-04 02:56:33'),
(35, 'befihybawe@mailinator.com', 'befihybawe@mailinator.com', NULL, '$2y$10$mYj8EdbB5TeemkXbtTf8LeuuLwehOTYeHPVBcImCX/0r1aIjrRSzS', NULL, 'recruiter', 1, NULL, '2023-04-05 22:42:49', '2023-04-05 22:42:49'),
(36, 'nejim@mailinator.com', 'nejim@mailinator.com', NULL, '$2y$10$V997pMp6t5v1Gfpdg.wl9OrrJhykXX7Om3QCimwHgR8PSkXz/fOSK', NULL, 'recruiter', 1, NULL, '2023-04-05 22:47:49', '2023-04-05 22:47:49'),
(37, 'heqipapak@mailinator.com', 'heqipapak@mailinator.com', NULL, '$2y$10$VnV4.7K2rmDecC8jQcI7TeTXHPFWsFOdlCa/DiJK2CnhpKi.cT5LC', NULL, 'recruiter', 1, NULL, '2023-04-05 22:48:26', '2023-04-05 22:48:26'),
(38, 'cakyqof@mailinator.com', 'cakyqof@mailinator.com', NULL, '$2y$10$5q56/3foLjg3K1KSfeCnKOCmqy/.XIuGc/wzEelIkJMwso4XsXXtq', NULL, 'student', 1, NULL, '2023-04-05 22:49:43', '2023-04-05 22:49:43'),
(39, 'diqekaca@mailinator.com', 'diqekaca@mailinator.com', NULL, '$2y$10$Jh/NedybqrgYd3SWyOxB4OGHZ34.iToG45yJEjb6Yw8KZ69YilR6S', NULL, 'student', 1, NULL, '2023-04-05 22:51:43', '2023-04-05 22:51:43'),
(40, 'lacoqeqid@mailinator.com', 'lacoqeqid@mailinator.com', NULL, '$2y$10$3c/Swsq8TH2StnWlJR9UneXRmLqiXDajnQGD2kbCSKC2AGXaO9rzK', NULL, 'student', 1, NULL, '2023-04-05 22:52:36', '2023-04-05 22:52:36'),
(42, 'salman RM', 'rm@gmail.com', NULL, '$2y$10$dmTDEu5I9GgnvwrdEgS.5O44RE78C9M9i.mZpOGfSAFj1RvXUShZW', NULL, 'rm', 1, NULL, '2023-04-06 23:03:39', '2023-04-28 09:07:28'),
(43, 'salmanrm2', 'salmanrm2@gmail.com', NULL, '$2y$10$j8KyH9Kxu12VVzDXfUDIIOnrvXv4d3QHywUFyH23opu27g4XkNAHW', 'uploads/RM/profile/1681904893-img.png', 'rm', 1, NULL, '2023-04-07 01:16:29', '2023-04-19 06:18:13'),
(44, 'jepufupys@mailinator.com', 'jepufupys@mailinator.com', NULL, '$2y$10$Ni7Va8vR4g.TOX11ZTLM7uq4c6X6hVrxNYadNE4fdvaG1sN2xADWC', 'uploads/recruiters/profile/1681881964-img.png', 'recruiter', 1, NULL, '2023-04-11 15:52:33', '2023-04-18 23:56:04'),
(45, 'dococuhifi@mailinator.com', 'dococuhifi@mailinator.com', NULL, '$2y$10$JMqbtppW.ClrPyYt7thqCepMZr7d5ZsCOVK2pftnUzDNJtMMgPEB2', 'uploads/students/profile/1681842983-img.png', 'student', 1, NULL, '2023-04-13 04:46:57', '2023-04-18 13:07:28'),
(46, 'salman.u360+rec@gmail.com', 'salman.u360+rec@gmail.com', NULL, '$2y$10$kshrmAnWiyzqmVodooWYwe4R0aNz28pTwsdWmLdJA8lKDtMpBuUVq', NULL, 'recruiter', 1, NULL, '2023-04-19 09:44:33', '2023-04-19 09:44:33'),
(47, 'salman.u360+rec@gmail.com', 'salman.u360+rec@gmail.com', NULL, '$2y$10$gqcgJo83BeuRPdevjSv9z.ZtfXoFPDTXfnFjKseEXE/hVfDcZkS6q', NULL, 'recruiter', 1, NULL, '2023-04-19 09:45:05', '2023-04-19 09:45:05'),
(48, 'salman.u360+rec@gmail.com', 'salman.u360+rec@gmail.com', NULL, '$2y$10$L4nguEcOcdRSUS2vSy1Gz..CHK9FnMGk6FibmgTxyHhbIGb2yOvWG', NULL, 'recruiter', 1, NULL, '2023-04-19 09:45:42', '2023-04-19 09:45:42'),
(49, 'salman.u360+rec1@gmail.com', 'salman.u360+rec1@gmail.com', NULL, '$2y$10$JParQlyLA61ZcJ4xtI6fUuAeFUQmp./LRC/XWewmaFR41RNJxHi3a', NULL, 'recruiter', 1, NULL, '2023-04-19 10:19:04', '2023-04-19 10:19:04'),
(50, 'salman.u360+rec1@gmail.com', 'salman.u360+rec1@gmail.com', NULL, '$2y$10$nkp9H9ApFTKjkZ/LKu6nteqePMUy21r2MUyJq8cqRZE2Z2PquOVl6', NULL, 'recruiter', 1, NULL, '2023-04-19 10:25:36', '2023-04-19 10:25:36'),
(51, 'salman.u360+rec1@gmail.com', 'salman.u360+rec1@gmail.com', NULL, '$2y$10$/5TwIxnpxgTajE2scK89z.9mVdTujoJM8zgBF4jOVldJ5uJsMdYCi', NULL, 'recruiter', 1, NULL, '2023-04-19 10:27:34', '2023-04-19 10:27:34'),
(52, 'salman.u360+rec1@gmail.com', 'salman.u360+rec1@gmail.com', NULL, '$2y$10$bLjcZn3BUmMba2tcvGKtSeSZofeC/LepJ9EGms6GaEnpqXAJfpl5a', NULL, 'recruiter', 1, NULL, '2023-04-19 10:30:14', '2023-04-19 10:30:14'),
(53, 'pyfukucab@mailinator.com', 'pyfukucab@mailinator.com', NULL, '$2y$10$/vGCfRlazb.scYwwXO1a.eLo4X7rLbyB8I3HN/2Qthbfyo4tq6tP.', NULL, 'student', 1, NULL, '2023-04-19 12:47:39', '2023-04-21 15:10:21'),
(54, 'faha@mailinator.com', 'faha@mailinator.com', NULL, '$2y$10$Wa7XM1BGaW5PVqbOpE35fOcGR9JwwiCYL.k.5URL7nSkf5b8GI296', NULL, 'recruiter', 1, NULL, '2023-04-19 12:48:10', '2023-04-19 12:48:10'),
(55, 'bixuvyl@mailinator.com', 'bixuvyl@mailinator.com', NULL, '$2y$10$/0U4J27.AbaWGxQK9egJCedOm1nNqWZps0vE730ioLh3zHQ4uJvgm', NULL, 'recruiter', 1, NULL, '2023-04-19 12:48:50', '2023-04-20 00:34:29'),
(56, 'nebikefy@mailinator.com', 'nebikefy@mailinator.com', NULL, '$2y$10$imniWHlgPhRSgOhJmuadi.u7EIMu9.hvShXprrSMLo3z2P61fwKNa', NULL, 'recruiter', 1, NULL, '2023-04-20 04:11:16', '2023-04-21 00:42:16'),
(57, 'salman.u360+recweb@gmail.com', 'salman.u360+recweb@gmail.com', NULL, '$2y$10$GtMVncQpHh1KPN4o9aeAHecnqxlSpKcd5TTS96FwK34v2jPob1B/y', NULL, 'recruiter', 1, NULL, '2023-04-20 04:11:58', '2023-05-06 08:44:55'),
(58, 'salman.u360+recweb1@gmail.com', 'salman.u360+recweb1@gmail.com', NULL, '$2y$10$IfB86AULWigojqrDvfwb9enOBuMWRtCJZ32WoFehQ/3z6IDRu1rAe', NULL, 'recruiter', 1, NULL, '2023-04-20 05:25:49', '2023-04-21 16:58:43'),
(62, 'salman.u360+webstu1@gmail.com', 'salman.u360+webstu1@gmail.com', NULL, '$2y$10$KRqmGMPq55Zuz5hmeYLpjOKQTcR0fp5jYqTmMxOGQPnWAkF1jGvqO', NULL, 'student', 1, NULL, '2023-04-20 05:46:43', '2023-04-20 05:46:43'),
(63, 'salman.u360+webstu2@gmail.com', 'salman.u360+webstu2@gmail.com', NULL, '$2y$10$2bIbtBjd5uMylcKbyXQwheqFUWLWmtJki5pksOJrRWMu2aS73YYly', NULL, 'student', 1, NULL, '2023-04-20 05:50:40', '2023-04-20 05:50:40'),
(64, 'salman.u360+stuweb3@gmail.com', 'salman.u360+stuweb3@gmail.com', NULL, '$2y$10$Ge5zXpQcZi8Ow/nQidYNMua1T7OjbB20it1wMRmG8zfrwkuNQTbNm', NULL, 'student', 1, NULL, '2023-04-20 05:52:20', '2023-04-20 05:52:20'),
(65, 'salman.u360+rec1@gmail.com', 'salman.u360+rec1@gmail.com', NULL, '$2y$10$zrYYrhBAdWQydIZ7HW4h4OuXm5ZDGHpzMqmvqDtWYEgDcaR4OLYd2', NULL, 'recruiter', 1, NULL, '2023-04-21 04:25:05', '2023-04-21 04:25:05'),
(66, 'salman.u360+321@gmail.com', 'salman.u360+321@gmail.com', NULL, '$2y$10$gmgYTP20siytznYJDR81CeVe/Kj8FmjPgP9gfxJgncT8eXHMgE176', NULL, 'student', 1, NULL, '2023-04-21 04:26:28', '2023-04-21 04:26:28'),
(69, 'mithungupta781@gmail.com', 'mithungupta781@gmail.com', NULL, '$2y$10$CpKYUy/zER0v08q18mnY0.6egKzy81M3q0g.spra6L4zX.r7GY0kS', NULL, 'recruiter', 1, NULL, '2023-04-21 14:32:44', '2023-04-28 00:01:24'),
(70, 'Mithun Gupta', 'upscale1001@gmail.com', NULL, '$2y$10$VQlTjdkcyMjT2tq2kST9xeUloYetpWw9C0hahfyqz37VrFDSsoFBa', 'uploads/RM/profile/1682117974-img.png', 'rm', 1, NULL, '2023-04-21 17:21:57', '2023-04-28 14:36:20'),
(71, 'Chandan Gupta', 'chandan@gmail.com', NULL, '$2y$10$gC5yq4WZpuXaYW91bctoN..wY9U4.kJYOMgQXH4dPCjFiX6/nVnTi', NULL, 'application', 1, NULL, '2023-04-23 07:34:17', '2023-04-23 07:34:17'),
(80, 'recruiter', 'recruiter@gmail.com', NULL, '$2a$10$IJ9eUktog.oCCO8eJ9XzU.3z5oMvtFAQePfHcBI9ubOvbFIGIuD..', NULL, 'recruiter', 1, NULL, '2023-04-25 05:11:46', '2023-05-27 17:15:36'),
(83, 'zohaibkhan4822@gmail.com', 'zohaibkhan4822@gmail.com', NULL, '$2y$10$FdGVcWgS0LgmZ0LvFdaeduoNoWFuwi7dHToUIguxwTUqEPdayVdkq', NULL, 'recruiter', 1, NULL, '2023-04-25 06:44:18', '2023-04-26 03:30:51'),
(101, 'zohaibkhan4822+1@gmail.com', 'zohaibkhan4822+1@gmail.com', NULL, '$2y$10$ji.h/n.TXbgixnYupU7ZwOM/OrbZqL1goYesaMX2ABA08uC/1sg2a', NULL, 'student', 1, NULL, '2023-04-26 06:05:24', '2023-04-26 06:05:24'),
(102, 'ibkaran05@gmail.com', 'ibkaran05@gmail.com', NULL, '$2y$10$0d823A8fatY/5Q/eCwZ61eJy5Cz4GVcrm2aUQnD6OSaJTpodkbcqy', NULL, 'recruiter', 1, NULL, '2023-05-02 06:57:05', '2023-05-09 08:19:42'),
(103, 'doryvebozy@mailinator.com', 'doryvebozy@mailinator.com', NULL, '$2y$10$T/oPoj3zCx7aOKREq3zsneYcAD.1vPmLQyVc.XpN90b1ff2SY64JG', NULL, 'student', 1, NULL, '2023-05-02 19:11:06', '2023-05-02 19:11:06'),
(104, 'vusegu@mailinator.com', 'vusegu@mailinator.com', NULL, '$2y$10$rs/MeaWqL4OjOVWJANcaf.Dk64AL8KBASoSGnsQDMZ914BL/uNMhm', NULL, 'student', 1, NULL, '2023-05-02 19:14:45', '2023-05-02 19:14:45'),
(105, 'jelular@mailinator.com', 'jelular@mailinator.com', NULL, '$2y$10$tfLn0zbhOpPGPnzdeQtMceDQKVlTh/L1TQ0PQUWrY.sFItq8OHkdC', NULL, 'student', 1, NULL, '2023-05-04 19:16:41', '2023-05-04 19:16:41'),
(106, 'qymakud@mailinator.com', 'qymakud@mailinator.com', NULL, '$2y$10$IvQcg5F940Scfn0C1DVrBOnJbLT0h9mfgVF.q4TFwPI9EgQqHrTyC', NULL, 'student', 1, NULL, '2023-05-04 21:06:24', '2023-05-04 21:06:24'),
(107, 'badotypole@mailinator.com', 'badotypole@mailinator.com', NULL, '$2y$10$x3.U84FrB8y6So7yZuFOAOgWfhSXGfaVI66PVBU/n0DPJKeopbU.6', NULL, 'student', 1, NULL, '2023-05-06 18:37:35', '2023-05-06 18:37:35'),
(108, 'zofi@mailinator.com', 'zofi@mailinator.com', NULL, '$2y$10$IJrkMqP.STmd5FGWgHHps.19fRm4HrWo.t7fPlN0Dzf69nrexO4qy', NULL, 'student', 1, NULL, '2023-05-06 18:39:42', '2023-05-06 18:39:42'),
(109, 'cijo@mailinator.com', 'cijo@mailinator.com', NULL, '$2y$10$i3VH.QQ0oH2qvV39u8S8mekiAL10WwdRBmdyxPB8eQy7e6ynwl79C', NULL, 'student', 1, NULL, '2023-05-06 19:15:38', '2023-05-06 19:15:38'),
(110, 'nycuvoka@mailinator.com', 'nycuvoka@mailinator.com', NULL, '$2y$10$65nBbe4hyZP1fSWkkiibXe6lzj5GywdLmFT/kRmfNwfq.D2F2MrXy', NULL, 'student', 1, NULL, '2023-05-06 19:18:21', '2023-05-06 19:18:21'),
(111, 'rori@mailinator.com', 'rori@mailinator.com', NULL, '$2y$10$l1/5AbrDocJG/8dsdIyz4eaBxzW9wNUtCX0xMKrGWyGVEltkRoIOS', NULL, 'student', 1, NULL, '2023-05-07 07:55:56', '2023-05-07 07:55:56'),
(112, 'viralo@mailinator.com', 'viralo@mailinator.com', NULL, '$2y$10$XqfFCWUsP.KlblH2xNnhv./tEg5S7nINyeCTbiQwy/aHe2YX8bOMK', NULL, 'student', 1, NULL, '2023-05-07 08:07:37', '2023-05-07 08:07:37'),
(113, 'hyce@mailinator.com', 'hyce@mailinator.com', NULL, '$2y$10$bbuyhj84fNCTmTamkFavM.sciPr/x7F2GtUEM.CKORwfvfeySgJuu', NULL, 'student', 1, NULL, '2023-05-07 10:07:37', '2023-05-07 10:07:37'),
(123, 'mucecy@mailinator.com', 'mucecy@mailinator.com', NULL, '$2y$10$ZvJXp9T1zDXlTUeGO92E2OJHnrvYrfRBwxG8BB7jOYHWRQc/0.D7W', NULL, 'student', 1, NULL, '2023-05-08 11:21:48', '2023-05-08 11:21:48'),
(124, 'Robinson Petty Traders', 'pygufucu@mailinator.com', NULL, '$2y$10$CGRsHroK0Bsq/KuOYrwth.C7D7kbqqsJVn23wgsp7Y31ujB218vOm', NULL, 'recruiter', 1, NULL, '2023-05-08 20:29:27', '2023-05-08 20:30:08'),
(125, 'Green and Preston LLC', 'kiqon@mailinator.com', NULL, '$2y$10$NQ2hCuLUAm1Ld9pknDg6LO6w1p1xU/0zPPIcGKYUZaqs6cv8x4S9C', NULL, 'student', 1, NULL, '2023-05-08 20:29:40', '2023-05-08 20:30:38'),
(126, 'test', 'test@gmail.com', NULL, '$2y$10$p9vnG338fWTbdGOhpDH55u.ZV30Q9mNYxIfX4fIHXQg/fW8m6GDHe', NULL, 'student', 1, NULL, '2023-05-09 11:04:34', '2023-05-09 11:04:34'),
(127, 'Demo Test', 'demotest@gmail.com', NULL, '$2y$10$ONqde5A4em4NtD5cn7niw.lElcHiK9WrtikhYMMVdSU32E8tPMD6m', NULL, 'student', 1, NULL, '2023-05-09 12:31:14', '2023-05-09 12:31:14'),
(128, 'hello', 'hello@gmail.com', NULL, '$2y$10$jRIBZv5UNsiF1eQq.a/D.eN/YGwnS0o8Yo9snW4/zgUbenX7a/Ope', NULL, 'student', 1, NULL, '2023-05-09 12:44:16', '2023-05-09 12:44:16'),
(129, 'Ahsan Ali', 'ahsan45@gmail.com', NULL, '$2y$10$BbU9KoaNlIqc/qy/Z4.8mOo33vxLqPdHI6iVbe3Vmzlud0z64J0UW', NULL, 'student', 1, NULL, '2023-05-09 12:55:59', '2023-05-09 12:55:59'),
(130, 'Ahsan Ali', 'ahsan4@gmail.com', NULL, '$2y$10$SFdTV04k9/iobLYje/BwROa7KZQrMpgJ/hMg6wuq8wl2962mHd8A6', NULL, 'student', 1, NULL, '2023-05-09 12:57:33', '2023-05-09 12:57:33'),
(131, 'Zohaib', 'zohaib123@gmail.com', NULL, '$2y$10$/ubpilw4A/E1XTKhYtnMB.RH9I1W8FNFKEZtNXwgoc19DCTxIeRCK', NULL, 'student', 1, NULL, '2023-05-09 13:05:45', '2023-05-09 13:05:45'),
(132, 'Pratt and Spears Trading', 'rm1122@rm.com', NULL, '$2y$10$vPePQFmTNXBfcf69tNmH/eEFtMT9NbZlcYMw4W4egukKpvVMWKYji', NULL, 'rm', 1, NULL, '2023-05-11 10:52:54', '2023-05-11 10:52:54'),
(133, 'nyjiposip@mailinator.com', 'nyjiposip@mailinator.com', NULL, '$2y$10$trUdcPahFTKvsNQd5mOxg.59leJPmQVgKe.91W1ZinXnclwncEFli', NULL, 'student', 1, NULL, '2023-05-12 11:37:30', '2023-05-12 11:37:30'),
(134, 'nyjiposip@mailinator.com', 'nyjiposip@mailinator.com', NULL, '$2y$10$9XhugVW2LwdOM8tTFYcTduvW0eH36eZAF5T4/AhZf.u4AbnwEhgwK', NULL, 'student', 1, NULL, '2023-05-12 11:38:11', '2023-05-12 11:38:11'),
(135, 'nyjiposip@mailinator.com', 'nyjiposip@mailinator.com', NULL, '$2y$10$fXK1G0ZC5dy3hvPc3KF5/.BRVJEAME1AS6YG9FS.SDqzSps0xWwxy', NULL, 'student', 1, NULL, '2023-05-12 11:38:53', '2023-05-12 11:38:53'),
(138, 'Wood and Chaney Inc', 'rec1122@rec.com', NULL, '$2y$10$ROdvf90at37GvBpSfVm3jOtk0UkWKcZA8mx6uGPUZpbOS9RT4phBW', NULL, 'recruiter', 1, NULL, '2023-05-17 08:21:18', '2023-05-17 08:21:18'),
(139, 'Hester and Sellers LLC', 'newrec@rec.com', NULL, '$2y$10$nQ4PnHz0BB9bvdOpFTtIoeBHmwgDR6atCXQDwxZ61wCIjA0bovfcS', NULL, 'recruiter', 1, NULL, '2023-05-17 08:26:01', '2023-05-17 08:26:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_recruiter_to_rms`
--
ALTER TABLE `assign_recruiter_to_rms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_s_v_uploads`
--
ALTER TABLE `c_s_v_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grading_schemes`
--
ALTER TABLE `grading_schemes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `highest_level_education`
--
ALTER TABLE `highest_level_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_statuses`
--
ALTER TABLE `lead_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mou_detail`
--
ALTER TABLE `mou_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_resets_admin`
--
ALTER TABLE `password_resets_admin`
  ADD KEY `password_resets_admin_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `recruiters`
--
ALTER TABLE `recruiters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruiter_marketings`
--
ALTER TABLE `recruiter_marketings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruiter_notes`
--
ALTER TABLE `recruiter_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruiter_passwords`
--
ALTER TABLE `recruiter_passwords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sequence_tbls`
--
ALTER TABLE `sequence_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `signatures`
--
ALTER TABLE `signatures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_applications`
--
ALTER TABLE `student_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_applies`
--
ALTER TABLE `student_applies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_eduction_histories`
--
ALTER TABLE `student_eduction_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_notes`
--
ALTER TABLE `student_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_passwords`
--
ALTER TABLE `student_passwords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_pending_documents`
--
ALTER TABLE `student_pending_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assign_recruiter_to_rms`
--
ALTER TABLE `assign_recruiter_to_rms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `c_s_v_uploads`
--
ALTER TABLE `c_s_v_uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grading_schemes`
--
ALTER TABLE `grading_schemes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `highest_level_education`
--
ALTER TABLE `highest_level_education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lead_statuses`
--
ALTER TABLE `lead_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mou_detail`
--
ALTER TABLE `mou_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `recruiters`
--
ALTER TABLE `recruiters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `recruiter_marketings`
--
ALTER TABLE `recruiter_marketings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `recruiter_notes`
--
ALTER TABLE `recruiter_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `recruiter_passwords`
--
ALTER TABLE `recruiter_passwords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sequence_tbls`
--
ALTER TABLE `sequence_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `signatures`
--
ALTER TABLE `signatures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `student_applications`
--
ALTER TABLE `student_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `student_applies`
--
ALTER TABLE `student_applies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `student_eduction_histories`
--
ALTER TABLE `student_eduction_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student_notes`
--
ALTER TABLE `student_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student_passwords`
--
ALTER TABLE `student_passwords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `student_pending_documents`
--
ALTER TABLE `student_pending_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
