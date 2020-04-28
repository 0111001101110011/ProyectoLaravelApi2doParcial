-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2020 a las 01:45:00
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `teclados`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `armar`
--

CREATE TABLE `armar` (
  `id` int(11) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `modelo_switches` varchar(20) NOT NULL,
  `material_keycaps` varchar(20) NOT NULL,
  `color_keycaps` varchar(20) NOT NULL,
  `material_carcasa` varchar(20) NOT NULL,
  `color_carcasa` varchar(20) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `fecha_hora` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `armar`
--

INSERT INTO `armar` (`id`, `id_user`, `estado`, `modelo_switches`, `material_keycaps`, `color_keycaps`, `material_carcasa`, `color_carcasa`, `ubicacion`, `fecha_hora`, `created_at`, `updated_at`) VALUES
(7, 5, 'Pendiente', 'Gateron Blue', 'ABS', 'Azul', 'Acrílico', 'Negro<', 'Guasave, Sinaloa', '2020-04-12 00:13:08', '2020-04-12 07:13:08', '2020-04-13 09:44:24'),
(8, 7, 'Terminado', 'Gateron White', 'PBT', 'Negro', 'Plástico', 'Rojo', 'Marte, Tlaxcala', '2020-04-12 00:13:08', '2020-04-12 07:13:08', '2020-04-14 14:14:41'),
(11, 15, 'En proceso', 'Gateron Blue', 'ABS', 'Azul', 'Acrílico', 'Rojo', 'Guadalajara, Jalisco', '2020-04-12 20:45:51', '2020-04-13 10:45:51', '2020-04-13 10:45:51'),
(12, 35, 'Pendiente', 'Gateron Blue', 'ABS', 'Azul', 'Acrílico', 'Negro<', 'Cancún, Quintana Roo', '2020-04-13 18:03:15', '2020-04-14 08:03:15', '2020-04-14 08:03:15'),
(13, 99, 'Pendiente', 'Gateron Blue', 'PBT', 'Azul', 'Aluminio', 'Morado', 'Tequila, Jalisco', '2020-04-13 23:06:57', '2020-04-14 13:06:57', '2020-04-14 13:06:57'),
(15, 66, 'Pendiente', 'Gateron Blue', 'PBT', 'Azul', 'Aluminio', 'Rojo', 'Arabia, Saudita', '2020-04-13 23:32:43', '2020-04-14 13:32:43', '2020-04-14 13:32:43'),
(16, 44, 'Terminado', 'Gateron Blue', 'PBT', 'Rojo', 'Aluminio', 'Rojo', 'Moscú, Rusia', '2020-04-13 23:39:51', '2020-04-14 13:39:51', '2020-04-14 13:39:51'),
(17, 11, 'Terminado', 'Cherry MX Red', 'PBT', 'Rojo', 'Aluminio', 'Rojo', 'Chernobyl, Pripiat', '2020-04-13 23:44:08', '2020-04-14 13:44:08', '2020-04-14 13:44:08'),
(18, 8, 'Terminado', 'Cherry MX Red', 'PBT', 'Rojo', 'Aluminio', 'Rojo', 'Chernobyl, Pripiat', '2020-04-14 00:00:45', '2020-04-14 14:00:45', '2020-04-14 14:00:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(7, '2016_06_01_000004_create_oauth_clients_table', 2),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modificar`
--

CREATE TABLE `modificar` (
  `id` int(11) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `mantenimiento` varchar(10) NOT NULL,
  `modelo_switches` varchar(20) NOT NULL,
  `material_keycaps` varchar(20) NOT NULL,
  `color_keycaps` varchar(20) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `fecha_hora` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modificar`
--

INSERT INTO `modificar` (`id`, `id_user`, `estado`, `mantenimiento`, `modelo_switches`, `material_keycaps`, `color_keycaps`, `ubicacion`, `fecha_hora`, `created_at`, `updated_at`) VALUES
(2, 47, 'Pendiente', 'Sí', 'Gateron Blue', 'ABS', 'Azul', 'Navojoa, Sonora', '2020-04-12 22:59:40', '2020-04-13 12:59:40', '2020-04-14 08:01:58'),
(3, 55, 'Terminado', 'Sí', 'Gateron Blue', 'ABS', 'Azul', 'Navojoa, Sonora', '2020-04-12 23:26:37', '2020-04-13 13:26:37', '2020-04-14 12:41:57'),
(4, 37, 'Terminado', 'No', 'Kailh BOX White', 'ABS', 'Negro', 'Allá', '2020-04-13 22:38:18', '2020-04-14 12:38:18', '2020-04-14 12:38:18'),
(5, 77, 'Terminado', 'Sí', 'Gateron Blue', 'PBT', 'Verde', 'Guayparime, Sinaloa', '2020-04-13 23:15:51', '2020-04-14 13:15:51', '2020-04-14 13:15:51'),
(6, 77, 'Terminado', 'Sí', 'Gateron Blue', 'PBT', 'Verde', 'Guayparime, Sinaloa', '2020-04-13 23:16:02', '2020-04-14 13:16:02', '2020-04-14 13:16:02'),
(8, 88, 'Terminado', 'No', 'Gateron Pink', 'PBT', 'Negro', 'El Muro, María', '2020-04-13 23:36:57', '2020-04-14 13:36:57', '2020-04-14 16:05:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('134b89893c969846e2253282a9a076e2482b22a6845604de129b3a60ded9fc9cd317e22e3d2e152a', 8, 2, NULL, '[]', 0, '2020-04-14 12:36:12', '2020-04-14 12:36:12', '2021-04-14 05:36:12'),
('15fea33d934cee05c293e1c8381afdb29f361f4ee28f40cfde3dc5fed1b6340d77aaa98b5ec0cf30', 1, 2, NULL, '[]', 0, '2020-04-11 11:14:18', '2020-04-11 11:14:18', '2021-04-11 04:14:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', '9VkU2olk8b7DQwcEtU2ewAVs3azLI7F5fU40gtnd', 'http://localhost', 1, 0, 0, '2020-04-11 11:12:02', '2020-04-11 11:12:02'),
(2, NULL, 'Laravel Password Grant Client', '4dx71cJWmO6Z4DF5NXaQSXScNCn6NEvEMss3sV1l', 'http://localhost', 0, 1, 0, '2020-04-11 11:12:02', '2020-04-11 11:12:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-04-11 11:12:02', '2020-04-11 11:12:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('58bf4d8a5fef10924fde10b6de4834d790feb8b7446a95185b5d4f6469cf4821fbda29445dc0c6c8', '15fea33d934cee05c293e1c8381afdb29f361f4ee28f40cfde3dc5fed1b6340d77aaa98b5ec0cf30', 0, '2021-04-11 04:14:18'),
('5b2d6ed74133addd7496f6f579aa83e53d976c0b81cb35967203c1ccce4e54b604deece3cff2cbb8', '134b89893c969846e2253282a9a076e2482b22a6845604de129b3a60ded9fc9cd317e22e3d2e152a', 0, '2021-04-14 05:36:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Gabriel', 'gapm55@gmail.com', NULL, '$2y$10$mEHEb1q7/J2UiiWcoOBbkOTMELlNI3/udKnKbqzN0DwRjZd3EiNKm', NULL, '2020-04-11 10:09:23', '2020-04-14 08:42:25'),
(5, 'admin', 'Gabriel', 'ratedmy55@gmail.com', NULL, 'ratedmy55', NULL, NULL, NULL),
(6, 'usuario', 'Gabriel', '01110011@gmail.com', NULL, '$2y$10$x17LQ4V8O0WyLNpZWavF0OZBlurg5d80KwPEClY8FyyaELXdO4KCO', NULL, '2020-04-14 07:53:54', '2020-04-14 07:53:54'),
(7, 'Usuario', 'Juan', 'g935@gmail.com', NULL, '$2y$10$lVSp9WVyASdRCB0FCnmyN.sJVMdpcryriZ79rP7ZxIPnRwuWewYri', NULL, '2020-04-14 08:13:43', '2020-04-14 10:29:47'),
(8, 'Usuario', 'xd', 'xd@gmail.com', NULL, '$2y$10$0Cye2J4ouKKAkDCd0e3YFOxIl6t/f62Gqu8r8kAvswjAwY5KNUNRm', NULL, '2020-04-14 08:22:36', '2020-04-14 08:22:36');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `armar`
--
ALTER TABLE `armar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modificar`
--
ALTER TABLE `modificar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indices de la tabla `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `armar`
--
ALTER TABLE `armar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `modificar`
--
ALTER TABLE `modificar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
