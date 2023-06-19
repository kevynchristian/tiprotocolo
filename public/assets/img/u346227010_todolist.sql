-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 19/06/2023 às 12:00
-- Versão do servidor: 10.6.12-MariaDB-cll-lve
-- Versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u346227010_todolist`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `atendimentos`
--

CREATE TABLE `atendimentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `desc` varchar(255) NOT NULL DEFAULT '',
  `numero_equipamento` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `atendimentos`
--

INSERT INTO `atendimentos` (`id`, `user_id`, `desc`, `numero_equipamento`, `status`, `created_at`, `updated_at`) VALUES
(38, 1, 'Desenvolver uma API RESTFULL', 'Tarefa 1', 3, '2023-06-17 17:41:31', '2023-06-17 21:18:11'),
(39, 1, '1', 'Julianny', 3, '2023-06-17 21:17:51', '2023-06-17 21:18:20'),
(40, 1, '3', 'Tarefa 2', 3, '2023-06-17 21:43:40', '2023-06-18 04:37:16'),
(41, 1, '3', 'asdf', 1, '2023-06-17 21:44:57', '2023-06-17 21:44:57'),
(42, 3, '123', 'Julianny', 1, '2023-06-17 21:46:02', '2023-06-17 21:46:10'),
(43, 4, '12352', 'Testado', 3, '2023-06-17 21:47:03', '2023-06-17 22:25:19'),
(44, 4, 'teste', 'teste', 2, '2023-06-17 22:30:15', '2023-06-17 22:35:21'),
(45, 4, 'tsete', 'teste', 3, '2023-06-17 22:32:05', '2023-06-17 22:35:26'),
(46, 4, 'test', 'tse', 1, '2023-06-17 22:33:20', '2023-06-17 22:33:20'),
(47, 4, 'teste', 'tsete', 1, '2023-06-17 22:33:23', '2023-06-17 22:33:23'),
(48, 4, '12345', 'Julianny', 1, '2023-06-17 22:37:06', '2023-06-17 22:37:06'),
(49, 4, 'Desenvolver uma API RESTFULL', 'Tarefa 2', 1, '2023-06-17 22:37:11', '2023-06-17 22:37:11'),
(50, 4, 'teste', 'teste', 1, '2023-06-17 22:41:43', '2023-06-17 22:41:43'),
(51, 1, 'Desenvolver uma API RESTFULL', 'Julianny', 3, '2023-06-18 00:43:20', '2023-06-18 00:43:35'),
(52, 5, 'Desenvolver uma API RESTFULL', 'Laravel', 3, '2023-06-18 00:45:11', '2023-06-18 00:45:27'),
(53, 6, 'Desenvolver uma API RESTFULL', 'Tarefa 22', 3, '2023-06-18 04:33:58', '2023-06-18 04:37:42'),
(54, 1, 'Laravel Sanctum', 'Tarefa 1', 3, '2023-06-18 04:35:08', '2023-06-18 04:37:14'),
(55, 1, 'Testando', 'Laravel', 3, '2023-06-18 04:36:59', '2023-06-18 04:37:18'),
(56, 6, 'tsete', 'teste', 1, '2023-06-18 04:37:28', '2023-06-18 04:37:28'),
(57, 6, 'teset', 'tsete', 1, '2023-06-18 04:37:31', '2023-06-18 04:37:31'),
(58, 3, 'Eventos', 'Estudar Vue', 2, '2023-06-18 04:40:35', '2023-06-18 04:40:39'),
(59, 11, 'Broadcasting', 'Laravel', 2, '2023-06-18 07:09:04', '2023-06-18 07:09:06'),
(60, 11, 'Events', 'Laravel', 1, '2023-06-18 07:09:26', '2023-06-18 07:09:26'),
(61, 12, 'Genaldo', 'Lembrar laboratório', 3, '2023-06-18 15:32:56', '2023-06-18 15:33:13'),
(62, 12, 'Queue', 'Laravel', 2, '2023-06-19 11:23:09', '2023-06-19 11:23:12');

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
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
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_17_021850_create_atendimentos_table', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_access_tokens`
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

--
-- Despejando dados para a tabela `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(29, 'App\\Models\\User', 4, 'JWT', '92c7d3da1e296909623031202a047659a33c01225ba2fca8746b57b3ea29e186', '[\"*\"]', NULL, NULL, '2023-06-18 03:03:34', '2023-06-18 03:03:34'),
(30, 'App\\Models\\User', 5, 'JWT', '1d945f66442961b9a2f84ba32d673da8a9edee2a2545b5d5e3a5f72dd2b3cf4c', '[\"*\"]', NULL, NULL, '2023-06-18 03:03:49', '2023-06-18 03:03:49'),
(31, 'App\\Models\\User', 5, 'JWT', 'f86f677aa590b4f6b5c7eef5745366990256ef2567b4428b932bfd07d79c04a3', '[\"*\"]', NULL, NULL, '2023-06-18 03:04:03', '2023-06-18 03:04:03'),
(33, 'App\\Models\\User', 7, 'JWT', '8ad5dc73faac2d53e8ea6a9a62667835b4a6d2599cfe584b0c179b29230e67f9', '[\"*\"]', NULL, NULL, '2023-06-18 03:04:24', '2023-06-18 03:04:24'),
(42, 'App\\Models\\User', 7, 'JWT', '6dd0b5178fccdd4d0df3e107dff25e28945077aa5362214fc58dc9ae89e9734f', '[\"*\"]', NULL, NULL, '2023-06-18 03:16:55', '2023-06-18 03:16:55'),
(54, 'App\\Models\\User', 3, 'JWT', 'f84879374d4c33fce0312fa5044939acfefb0840bb85f58e8f49687aadf01d15', '[\"*\"]', NULL, NULL, '2023-06-18 03:55:52', '2023-06-18 03:55:52'),
(57, 'App\\Models\\User', 6, 'JWT', '3bf02e459fa649728edf267145b9cde8882e12b4040acaf1d745a70358136487', '[\"*\"]', NULL, NULL, '2023-06-18 04:32:28', '2023-06-18 04:32:28'),
(59, 'App\\Models\\User', 3, 'JWT', 'dba4144e977293e5e31d6bfb04ac5267a1ec7373e93ccf0a2708b067bc903acf', '[\"*\"]', NULL, NULL, '2023-06-18 04:40:15', '2023-06-18 04:40:15'),
(60, 'App\\Models\\User', 11, 'JWT', '38f9e4041bc94e81aee744c8e4431f263254ec80e0ef6aac756cc3f0deca1336', '[\"*\"]', NULL, NULL, '2023-06-18 07:08:48', '2023-06-18 07:08:48'),
(61, 'App\\Models\\User', 12, 'JWT', 'acbed651df3f15f9fd3d1f5fbd0c95d90c982bb5d8e3408dc90f6dd8de15b89a', '[\"*\"]', NULL, NULL, '2023-06-18 15:32:36', '2023-06-18 15:32:36'),
(62, 'App\\Models\\User', 12, 'JWT', 'cbc531d1e7b6c51ae036e7bad9dd265d77f5319f0268e2ef4801122b15828191', '[\"*\"]', NULL, NULL, '2023-06-19 04:23:39', '2023-06-19 04:23:39'),
(63, 'App\\Models\\User', 12, 'JWT', 'b701fa60fac755a3c2a20b2cb89ec71ffb67c2f81efa0595ea2ee664d66f7bf6', '[\"*\"]', NULL, NULL, '2023-06-19 11:22:28', '2023-06-19 11:22:28');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `lastName`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(11, 'Yan', 'Pereira', 'yan.ti.sousa@outlook.com', NULL, '$2y$10$QYzC61eh3G7JQC0j2g0lueTHT8VIpjKykqTQNbPXzWrAo/NPSO086', NULL, '2023-06-18 07:08:40', '2023-06-18 07:08:40'),
(12, 'Yan', 'Pereira', 'yanemanuel50@outlook.com', NULL, '$2y$10$1pdxXCszCIyNKYNqxAf7dOYsyB7Otj0noF9jfHSLk8jZy8ht.Jm3y', NULL, '2023-06-18 15:32:27', '2023-06-18 15:32:27');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `atendimentos`
--
ALTER TABLE `atendimentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atendimentos`
--
ALTER TABLE `atendimentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
