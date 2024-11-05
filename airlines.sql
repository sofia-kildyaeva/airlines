-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 05 2024 г., 22:26
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `airlines`
--

-- --------------------------------------------------------

--
-- Структура таблицы `airports`
--

CREATE TABLE `airports` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `airports`
--

INSERT INTO `airports` (`id`, `title`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'Внуково', 1, '2022-12-23 04:11:29', '2022-12-23 04:11:29'),
(2, 'Шереметьево', 1, '2022-12-23 04:11:38', '2022-12-23 04:11:38'),
(3, 'Домодедово', 1, '2022-12-23 04:11:45', '2022-12-23 04:11:45'),
(4, 'Стригино', 2, '2022-12-23 04:12:10', '2022-12-23 04:12:14'),
(5, 'Пулково-1', 3, '2022-12-23 04:12:37', '2022-12-23 04:12:37'),
(6, 'Пулково-2', 3, '2022-12-23 04:12:48', '2022-12-23 04:12:48'),
(7, 'Адлер', 5, '2022-12-23 04:14:49', '2022-12-23 04:14:49'),
(8, 'Шарль-де-Голль', 4, '2022-12-23 04:15:16', '2022-12-23 04:15:16');

-- --------------------------------------------------------

--
-- Структура таблицы `airs`
--

CREATE TABLE `airs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `count_seat` int NOT NULL DEFAULT '0',
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `airs`
--

INSERT INTO `airs` (`id`, `title`, `count_seat`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Су-134', 25, 12000.00, '2022-12-23 04:08:14', '2022-12-23 04:08:14'),
(2, 'ИЛ-62', 30, 10000.00, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(3, 'Боинг-777', 15, 14000.00, '2022-12-23 04:10:24', '2022-12-23 04:10:24'),
(4, 'А320', 25, 13000.00, '2022-12-23 04:11:00', '2022-12-23 04:11:00');

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `title`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Москва', '/storage/public/img/LfO6aGHRU66rFwOEME6moDBFhCg5Hl7a2CdQRr28.jpg', '2022-12-23 04:02:22', '2022-12-23 04:02:22'),
(2, 'Нижний Новгород', '/storage/public/img/g7pUOX5uKRA8Seb9wZPBXAqsVuEe0PscHOQNUeq6.jpg', '2022-12-23 04:02:39', '2022-12-23 04:02:39'),
(3, 'Санкт-Петербург', '/storage/public/img/ozJNVFbDMnsOGpHuAwKTMFxPyXboJPo5AKkfCZV5.jpg', '2022-12-23 04:03:07', '2022-12-23 04:03:07'),
(4, 'Париж', '/storage/public/img/AWPCsjebQf0il40MCQLTu8cW6Q0OSlxXXBsoweIs.jpg', '2022-12-23 04:03:46', '2022-12-23 04:03:46'),
(5, 'Сочи', '/storage/public/img/T0UtNayqfdVWzd9tC1KATqeqmM5AjbABEwBCCriw.jpg', '2022-12-23 04:04:13', '2022-12-23 04:04:13');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `flights`
--

CREATE TABLE `flights` (
  `id` bigint UNSIGNED NOT NULL,
  `fromCity_id` bigint UNSIGNED NOT NULL,
  `toCity_id` bigint UNSIGNED NOT NULL,
  `date_from` date NOT NULL,
  `time_from` time NOT NULL,
  `date_to` date NOT NULL,
  `time_to` time NOT NULL,
  `time_way` time NOT NULL,
  `percent_price` double(8,2) NOT NULL DEFAULT '0.00',
  `air_id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'готов',
  `fromAirport_id` bigint UNSIGNED NOT NULL,
  `toAirport_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `flights`
--

INSERT INTO `flights` (`id`, `fromCity_id`, `toCity_id`, `date_from`, `time_from`, `date_to`, `time_to`, `time_way`, `percent_price`, `air_id`, `status`, `fromAirport_id`, `toAirport_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2022-12-26', '06:25:00', '2022-12-27', '05:20:00', '22:55:00', 40.00, 3, 'готов', 2, 8, '2022-12-23 04:16:17', '2022-12-23 04:16:17'),
(2, 2, 1, '2022-12-28', '07:00:00', '2022-12-28', '11:00:00', '04:00:00', 15.00, 2, 'готов', 4, 1, '2022-12-23 04:17:41', '2022-12-23 04:17:41'),
(3, 1, 5, '2022-12-30', '06:15:00', '2022-12-31', '04:25:00', '22:10:00', 27.00, 1, 'готов', 2, 7, '2022-12-23 04:18:50', '2022-12-23 04:18:50'),
(4, 1, 2, '2022-12-27', '18:00:00', '2022-12-27', '22:45:00', '04:45:00', 18.00, 1, 'готов', 1, 4, '2022-12-23 04:19:54', '2022-12-23 04:19:54'),
(5, 1, 4, '2022-12-26', '03:20:00', '2022-12-26', '23:40:00', '20:20:00', 36.00, 4, 'готов', 1, 8, '2022-12-23 04:21:04', '2022-12-23 04:22:56'),
(6, 1, 5, '2022-12-30', '01:20:00', '2022-12-30', '21:10:00', '19:50:00', 35.00, 4, 'готов', 3, 7, '2022-12-23 04:29:07', '2022-12-23 04:29:07');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2022_12_15_055138_create_cities_table', 1),
(16, '2022_12_15_055332_create_airports_table', 1),
(17, '2022_12_15_055448_create_airs_table', 1),
(18, '2022_12_15_055528_create_seats_table', 1),
(19, '2022_12_15_055624_create_flights_table', 1),
(20, '2022_12_15_055650_create_tikets_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `seats`
--

CREATE TABLE `seats` (
  `id` bigint UNSIGNED NOT NULL,
  `air_id` bigint UNSIGNED NOT NULL,
  `seat` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `seats`
--

INSERT INTO `seats` (`id`, `air_id`, `seat`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-12-23 04:08:14', '2022-12-23 04:08:14'),
(2, 1, 2, '2022-12-23 04:08:14', '2022-12-23 04:08:14'),
(3, 1, 3, '2022-12-23 04:08:14', '2022-12-23 04:08:14'),
(4, 1, 4, '2022-12-23 04:08:14', '2022-12-23 04:08:14'),
(5, 1, 5, '2022-12-23 04:08:14', '2022-12-23 04:08:14'),
(6, 1, 6, '2022-12-23 04:08:14', '2022-12-23 04:08:14'),
(7, 1, 7, '2022-12-23 04:08:14', '2022-12-23 04:08:14'),
(8, 1, 8, '2022-12-23 04:08:14', '2022-12-23 04:08:14'),
(9, 1, 9, '2022-12-23 04:08:14', '2022-12-23 04:08:14'),
(10, 1, 10, '2022-12-23 04:08:14', '2022-12-23 04:08:14'),
(11, 1, 11, '2022-12-23 04:08:14', '2022-12-23 04:08:14'),
(12, 1, 12, '2022-12-23 04:08:14', '2022-12-23 04:08:14'),
(13, 1, 13, '2022-12-23 04:08:14', '2022-12-23 04:08:14'),
(14, 1, 14, '2022-12-23 04:08:14', '2022-12-23 04:08:14'),
(15, 1, 15, '2022-12-23 04:08:14', '2022-12-23 04:08:14'),
(16, 1, 16, '2022-12-23 04:08:14', '2022-12-23 04:08:14'),
(17, 1, 17, '2022-12-23 04:08:14', '2022-12-23 04:08:14'),
(18, 1, 18, '2022-12-23 04:08:14', '2022-12-23 04:08:14'),
(19, 1, 19, '2022-12-23 04:08:14', '2022-12-23 04:08:14'),
(20, 1, 20, '2022-12-23 04:08:14', '2022-12-23 04:08:14'),
(21, 1, 21, '2022-12-23 04:08:14', '2022-12-23 04:08:14'),
(22, 1, 22, '2022-12-23 04:08:14', '2022-12-23 04:08:14'),
(23, 1, 23, '2022-12-23 04:08:14', '2022-12-23 04:08:14'),
(24, 1, 24, '2022-12-23 04:08:14', '2022-12-23 04:08:14'),
(25, 1, 25, '2022-12-23 04:08:14', '2022-12-23 04:08:14'),
(26, 2, 1, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(27, 2, 2, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(28, 2, 3, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(29, 2, 4, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(30, 2, 5, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(31, 2, 6, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(32, 2, 7, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(33, 2, 8, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(34, 2, 9, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(35, 2, 10, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(36, 2, 11, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(37, 2, 12, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(38, 2, 13, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(39, 2, 14, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(40, 2, 15, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(41, 2, 16, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(42, 2, 17, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(43, 2, 18, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(44, 2, 19, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(45, 2, 20, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(46, 2, 21, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(47, 2, 22, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(48, 2, 23, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(49, 2, 24, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(50, 2, 25, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(51, 2, 26, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(52, 2, 27, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(53, 2, 28, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(54, 2, 29, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(55, 2, 30, '2022-12-23 04:09:44', '2022-12-23 04:09:44'),
(56, 3, 1, '2022-12-23 04:10:24', '2022-12-23 04:10:24'),
(57, 3, 2, '2022-12-23 04:10:24', '2022-12-23 04:10:24'),
(58, 3, 3, '2022-12-23 04:10:24', '2022-12-23 04:10:24'),
(59, 3, 4, '2022-12-23 04:10:24', '2022-12-23 04:10:24'),
(60, 3, 5, '2022-12-23 04:10:24', '2022-12-23 04:10:24'),
(61, 3, 6, '2022-12-23 04:10:24', '2022-12-23 04:10:24'),
(62, 3, 7, '2022-12-23 04:10:24', '2022-12-23 04:10:24'),
(63, 3, 8, '2022-12-23 04:10:24', '2022-12-23 04:10:24'),
(64, 3, 9, '2022-12-23 04:10:24', '2022-12-23 04:10:24'),
(65, 3, 10, '2022-12-23 04:10:24', '2022-12-23 04:10:24'),
(66, 3, 11, '2022-12-23 04:10:24', '2022-12-23 04:10:24'),
(67, 3, 12, '2022-12-23 04:10:24', '2022-12-23 04:10:24'),
(68, 3, 13, '2022-12-23 04:10:24', '2022-12-23 04:10:24'),
(69, 3, 14, '2022-12-23 04:10:24', '2022-12-23 04:10:24'),
(70, 3, 15, '2022-12-23 04:10:24', '2022-12-23 04:10:24'),
(71, 4, 1, '2022-12-23 04:11:00', '2022-12-23 04:11:00'),
(72, 4, 2, '2022-12-23 04:11:00', '2022-12-23 04:11:00'),
(73, 4, 3, '2022-12-23 04:11:00', '2022-12-23 04:11:00'),
(74, 4, 4, '2022-12-23 04:11:00', '2022-12-23 04:11:00'),
(75, 4, 5, '2022-12-23 04:11:00', '2022-12-23 04:11:00'),
(76, 4, 6, '2022-12-23 04:11:00', '2022-12-23 04:11:00'),
(77, 4, 7, '2022-12-23 04:11:00', '2022-12-23 04:11:00'),
(78, 4, 8, '2022-12-23 04:11:00', '2022-12-23 04:11:00'),
(79, 4, 9, '2022-12-23 04:11:00', '2022-12-23 04:11:00'),
(80, 4, 10, '2022-12-23 04:11:00', '2022-12-23 04:11:00'),
(81, 4, 11, '2022-12-23 04:11:00', '2022-12-23 04:11:00'),
(82, 4, 12, '2022-12-23 04:11:00', '2022-12-23 04:11:00'),
(83, 4, 13, '2022-12-23 04:11:00', '2022-12-23 04:11:00'),
(84, 4, 14, '2022-12-23 04:11:00', '2022-12-23 04:11:00'),
(85, 4, 15, '2022-12-23 04:11:00', '2022-12-23 04:11:00'),
(86, 4, 16, '2022-12-23 04:11:00', '2022-12-23 04:11:00'),
(87, 4, 17, '2022-12-23 04:11:00', '2022-12-23 04:11:00'),
(88, 4, 18, '2022-12-23 04:11:00', '2022-12-23 04:11:00'),
(89, 4, 19, '2022-12-23 04:11:00', '2022-12-23 04:11:00'),
(90, 4, 20, '2022-12-23 04:11:00', '2022-12-23 04:11:00'),
(91, 4, 21, '2022-12-23 04:11:00', '2022-12-23 04:11:00'),
(92, 4, 22, '2022-12-23 04:11:00', '2022-12-23 04:11:00'),
(93, 4, 23, '2022-12-23 04:11:00', '2022-12-23 04:11:00'),
(94, 4, 24, '2022-12-23 04:11:00', '2022-12-23 04:11:00'),
(95, 4, 25, '2022-12-23 04:11:00', '2022-12-23 04:11:00');

-- --------------------------------------------------------

--
-- Структура таблицы `tikets`
--

CREATE TABLE `tikets` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `fio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `passport` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flight_id` bigint UNSIGNED NOT NULL,
  `seat` int NOT NULL DEFAULT '0',
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'оформлен',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tikets`
--

INSERT INTO `tikets` (`id`, `user_id`, `fio`, `birthday`, `passport`, `certificate`, `flight_id`, `seat`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Иванов Иван Иванович', '2000-12-12', '2216123456', NULL, 1, 2, 19600.00, 'оформлен', '2022-12-23 04:30:53', '2022-12-23 04:30:53'),
(2, 1, 'Иванова Мария Ивановна', '2000-12-12', '2216123456', NULL, 1, 3, 19600.00, 'оформлен', '2022-12-23 04:38:45', '2022-12-23 04:38:45'),
(3, 1, 'Иванова Мария Ивановна', '2009-12-30', '2216123456', NULL, 3, 7, 15240.00, 'оформлен', '2022-12-23 05:52:59', '2022-12-23 05:52:59'),
(7, 2, 'Романов Вадим Николаевич', '1980-02-08', '2214567890', NULL, 5, 18, 17680.00, 'оформлен', '2022-12-23 06:09:01', '2022-12-23 06:09:01'),
(8, 2, 'Романов Вадим Николаевич', '1980-02-08', '2214567890', NULL, 5, 1, 17680.00, 'оформлен', '2022-12-23 06:10:21', '2022-12-23 06:10:21'),
(9, 2, 'Романов Вадим Николаевич', '1980-02-08', '2214567890', NULL, 2, 12, 11500.00, 'оформлен', '2022-12-23 06:16:30', '2022-12-23 06:16:30'),
(10, 1, 'Иванов Иван Иванович', '2022-12-20', '123445443454', NULL, 4, 16, 14160.00, 'оформлен', '2022-12-24 04:24:10', '2022-12-24 04:24:10'),
(11, 1, 'Иванов Иван Иванович', '1980-12-12', '123445443454', NULL, 4, 10, 14160.00, 'оформлен', '2022-12-24 04:36:41', '2022-12-24 04:36:41'),
(12, 1, 'Иванов Иван Иванович', '2000-12-12', '2217123456', NULL, 6, 16, 17550.00, 'оформлен', '2022-12-25 08:29:47', '2022-12-25 08:29:47'),
(13, 1, 'Иванов Иван Иванович', '2000-12-12', '2217123456', NULL, 6, 16, 17550.00, 'оформлен', '2022-12-25 08:30:08', '2022-12-25 08:30:08');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `fio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `passport` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fio`, `birthday`, `passport`, `email`, `phone`, `login`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Иванов Иван Иванович', '2000-12-12', '2216123456', 'ivan@mail.ru', '12345678912', 'ivan', 'e10adc3949ba59abbe56e057f20f883e', 'user', NULL, '2022-12-23 03:59:44', '2022-12-23 03:59:44'),
(2, 'Романов Вадим Иванович', '1980-02-08', '2214567890', 'vadim@mail.ru', '89101234567', 'vadim', 'e10adc3949ba59abbe56e057f20f883e', 'user', NULL, '2022-12-23 06:05:03', '2022-12-25 11:06:31'),
(3, 'Админ', '1212-12-12', '1212121212', 'admin@mail.ru', '12345678901', 'airlines', '8c09869aa2bd1e3de45d9453394a585a', 'admin', NULL, '2022-12-25 11:08:35', '2022-12-25 11:08:35'),
(5, 'Романов Роман Романович', '2000-01-01', '2270322665', 'roman@mail.ru', '8951236589', 'roman', 'e10adc3949ba59abbe56e057f20f883e', 'user', NULL, '2024-09-20 09:39:26', '2024-09-20 09:39:26');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `airports_title_unique` (`title`),
  ADD KEY `airports_city_id_foreign` (`city_id`);

--
-- Индексы таблицы `airs`
--
ALTER TABLE `airs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cities_title_unique` (`title`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flights_fromcity_id_foreign` (`fromCity_id`),
  ADD KEY `flights_tocity_id_foreign` (`toCity_id`),
  ADD KEY `flights_air_id_foreign` (`air_id`),
  ADD KEY `flights_fromairport_id_foreign` (`fromAirport_id`),
  ADD KEY `flights_toairport_id_foreign` (`toAirport_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seats_air_id_foreign` (`air_id`);

--
-- Индексы таблицы `tikets`
--
ALTER TABLE `tikets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tikets_user_id_foreign` (`user_id`),
  ADD KEY `tikets_flight_id_foreign` (`flight_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_passport_unique` (`passport`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_login_unique` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `airports`
--
ALTER TABLE `airports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `airs`
--
ALTER TABLE `airs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `flights`
--
ALTER TABLE `flights`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `seats`
--
ALTER TABLE `seats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT для таблицы `tikets`
--
ALTER TABLE `tikets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `airports`
--
ALTER TABLE `airports`
  ADD CONSTRAINT `airports_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `flights_air_id_foreign` FOREIGN KEY (`air_id`) REFERENCES `airs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flights_fromairport_id_foreign` FOREIGN KEY (`fromAirport_id`) REFERENCES `airports` (`id`),
  ADD CONSTRAINT `flights_fromcity_id_foreign` FOREIGN KEY (`fromCity_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `flights_toairport_id_foreign` FOREIGN KEY (`toAirport_id`) REFERENCES `airports` (`id`),
  ADD CONSTRAINT `flights_tocity_id_foreign` FOREIGN KEY (`toCity_id`) REFERENCES `cities` (`id`);

--
-- Ограничения внешнего ключа таблицы `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_air_id_foreign` FOREIGN KEY (`air_id`) REFERENCES `airs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tikets`
--
ALTER TABLE `tikets`
  ADD CONSTRAINT `tikets_flight_id_foreign` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tikets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
