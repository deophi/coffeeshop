-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Apr 2022 pada 05.35
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joe`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodatas`
--

CREATE TABLE `biodatas` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `jk` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `biodatas`
--

INSERT INTO `biodatas` (`id`, `user_id`, `nama`, `hp`, `alamat`, `jk`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin Joe', '08777777', 'Jl. Serang Pandeglang', 1, '2022-01-06 13:26:29', '2022-01-06 13:26:29'),
(2, 2, 'Pelanggan', '08753543', 'Jl. Serang Pandeglang', 2, '2022-01-07 07:32:43', '2022-01-07 07:32:43'),
(5, 5, 'Budi', '123456789', 'Jakarta', 1, '2022-03-12 15:10:09', '2022-03-12 15:10:09'),
(6, 6, 'omat', '085211121314', 'Kaduela', 1, '2022-04-19 06:38:11', '2022-04-19 06:38:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` bigint(10) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `produk_id` int(2) DEFAULT NULL,
  `jumlah` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `produk_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(26, 5, 6, 1, '2022-03-18 06:56:48', '2022-03-18 06:56:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2014_10_12_000000_create_users_table', 2),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(4, '2019_08_19_000000_create_failed_jobs_table', 2),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(6, '2021_11_14_102007_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` int(3) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(6) NOT NULL,
  `photo` text NOT NULL,
  `jenis` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `nama`, `harga`, `photo`, `jenis`, `created_at`, `updated_at`) VALUES
(1, 'Batagor Joe\'s Brother', 22000, '20223_Batagor Joes Brother.jpeg', 1, '2022-01-06 13:28:50', '2022-03-16 16:52:51'),
(5, 'Banana Pleasure Ice/Hot', 19000, '20223_Banana_Pleas_Ure.png', 2, '2022-01-15 14:55:47', '2022-03-16 17:01:05'),
(6, 'Choco banana Ice/Hot', 18000, '20223_Choco_Banana.png', 2, '2022-01-15 14:56:06', '2022-03-16 17:01:55'),
(7, 'Onion Rings', 16000, '20223_Onion Rings.jpeg', 1, '2022-03-12 15:08:22', '2022-03-16 16:53:22'),
(8, 'French Fries Original', 16000, '20223_French Fries.jpeg', 1, '2022-03-16 16:55:00', '2022-03-16 16:55:00'),
(9, 'GASUKE', 19000, '20223_GOSUKE.jpeg', 1, '2022-03-16 16:55:53', '2022-03-16 16:55:53'),
(10, 'Ice Cream Goreng Durian', 14000, '20223_Ice_Cream_Goreng_Durian.png', 1, '2022-03-16 16:56:46', '2022-03-16 16:56:46'),
(11, 'Ice Cream Goreng Vanilla', 13000, '20223_Ice_Cream_Goreng_Vanilla.png', 1, '2022-03-16 16:57:17', '2022-03-16 16:57:17'),
(12, 'Jamur Crispy Original', 13000, '20223_Jamur_Crispy.png', 1, '2022-03-16 16:57:53', '2022-03-16 16:57:53'),
(13, 'Sosis Beef Bakar', 15000, '20223_Sosis Blackpepper bakar.png', 1, '2022-03-16 16:59:14', '2022-03-16 16:59:14'),
(14, 'Tahu Walik', 21000, '20223_Tahu_Walik.png', 1, '2022-03-16 16:59:43', '2022-03-16 16:59:43'),
(15, 'Chocolate Ice/Hot', 20000, '20223_Chocolate.png', 2, '2022-03-16 17:02:51', '2022-03-16 17:02:51'),
(16, 'Cookies And Cream', 18000, '20223_Cookies_And_Cream.png', 2, '2022-03-16 17:03:39', '2022-03-16 17:03:39'),
(17, 'Es Teh Manis', 5500, '20223_Es_Teh_Manis.png', 2, '2022-03-16 17:04:30', '2022-03-16 17:04:30'),
(18, 'Essence Of Love Ice', 21000, '20223_Essence_Of_Love.png', 2, '2022-03-16 17:05:42', '2022-03-16 17:05:42'),
(19, 'Green Tea', 22000, '20223_Green_Tea.png', 2, '2022-03-16 17:06:24', '2022-03-16 17:06:24'),
(20, 'Red Velvet Ice/Hot', 18000, '20223_Red-Velvet.png', 2, '2022-03-16 17:06:59', '2022-03-16 17:06:59'),
(21, 'Taro Ice/Hot', 18000, '20223_Taro.png', 2, '2022-03-16 17:07:43', '2022-03-16 17:07:43'),
(22, 'Thai Tea Ice/Hot', 18000, '20223_Thai-Tea.png', 2, '2022-03-16 17:08:15', '2022-03-16 17:08:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekenings`
--

CREATE TABLE `rekenings` (
  `id` int(2) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `norek` bigint(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekenings`
--

INSERT INTO `rekenings` (`id`, `bank`, `norek`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'BCA', 23476500089, 'Joes Brother', '2022-02-09 04:57:48', '2022-03-12 14:23:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('FZdvJc3uyb3IfexHGegEbCCm0i2g5MHdJYfAvtj6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidllDbnlLTFBQOGpBanMzRkV5MzRnem0xMm9ZZE5Mb0dXdkRCZ2lyUSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1650352242);

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` int(1) NOT NULL,
  `wa` bigint(14) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `wa`, `created_at`, `updated_at`) VALUES
(1, 83841287700, '2022-02-09 08:36:41', '2022-03-12 14:18:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempats`
--

CREATE TABLE `tempats` (
  `id` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `photo` text NOT NULL,
  `stok` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tempats`
--

INSERT INTO `tempats` (`id`, `nama`, `photo`, `stok`, `created_at`, `updated_at`) VALUES
(2, 'Indoor', '20223_Indoor.jpeg', 10, '2022-01-15 15:06:14', '2022-03-16 17:09:58'),
(3, 'Outdoor', '20223_Outdoor.jpeg', 20, '2022-03-16 17:10:56', '2022-03-16 17:10:56'),
(4, 'Lesehan', '20223_Lesehan.jpeg', 10, '2022-03-16 17:11:27', '2022-03-16 17:11:27'),
(5, 'Taman', '20223_Taman.jpeg', 10, '2022-03-16 17:12:03', '2022-03-16 17:12:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksis`
--

CREATE TABLE `transaksis` (
  `id` int(5) NOT NULL,
  `biodata_id` bigint(20) NOT NULL,
  `tempat_id` int(2) DEFAULT NULL,
  `harga` bigint(8) NOT NULL,
  `waktu` timestamp NULL DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksis`
--

INSERT INTO `transaksis` (`id`, `biodata_id`, `tempat_id`, `harga`, `waktu`, `status`, `created_at`, `updated_at`) VALUES
(7, 2, 2, 6000, '2022-02-01 01:00:00', 1, '2022-02-01 14:06:18', '2022-02-02 06:19:38'),
(9, 2, NULL, 7000, '2022-02-04 17:00:00', 2, '2022-02-05 15:47:01', '2022-02-09 09:01:26'),
(11, 5, 2, 6000, '2022-03-21 04:00:00', 0, '2022-03-14 05:30:41', '2022-03-14 05:30:41'),
(12, 6, 2, 41000, '2022-04-23 04:00:00', 0, '2022-04-19 06:39:48', '2022-04-19 06:39:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_details`
--

CREATE TABLE `transaksi_details` (
  `id` int(7) NOT NULL,
  `transaksi_id` int(5) NOT NULL,
  `produk_id` int(2) DEFAULT NULL,
  `jumlah` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_details`
--

INSERT INTO `transaksi_details` (`id`, `transaksi_id`, `produk_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(20, 7, 1, 1, '2022-02-01 14:06:18', '2022-02-01 14:06:18'),
(22, 9, NULL, 1, '2022-02-05 15:47:01', '2022-02-05 15:47:01'),
(24, 11, 6, 1, '2022-03-14 05:30:41', '2022-03-14 05:30:41'),
(25, 12, 1, 1, '2022-04-19 06:39:48', '2022-04-19 06:39:48'),
(26, 12, 5, 1, '2022-04-19 06:39:48', '2022-04-19 06:39:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(1) NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `level`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'admin@joe.com', NULL, '$2y$10$zmlqJRrJeTmiCeHev0DUbeyrsGJuk1b6so3aKhREh.o0/8EuzdcQS', 1, NULL, NULL, NULL, NULL, 'admin.png', '2022-01-06 13:26:29', '2022-01-06 13:26:29'),
(2, 'pelanggan@gmail.com', NULL, '$2y$10$m.tXwTjnbUwNpnjzP5Iz9OnizFEjVcztVdEBEd8XV5cNrceADQUS2', 2, NULL, NULL, NULL, NULL, 'admin.png', '2022-01-07 07:32:43', '2022-02-09 09:51:45'),
(5, 'budi@gmail.com', NULL, '$2y$10$Y3qbjKF6m3tKSfKX2BT6YulI8vV/jGifvLbsTHE2bMnKjRulZlAzG', 2, NULL, NULL, NULL, NULL, 'admin.png', '2022-03-12 15:10:09', '2022-03-12 15:10:09'),
(6, 'omat@gmail.com', NULL, '$2y$10$H2vBHHYbncRrureYb2IBKufLQfoTBh2BPNKCOWMIiiEIQsGQfT2P.', 2, NULL, NULL, NULL, NULL, 'admin.png', '2022-04-19 06:38:10', '2022-04-19 06:38:10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biodatas`
--
ALTER TABLE `biodatas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biodata_id` (`user_id`,`produk_id`),
  ADD KEY `prodcrt` (`produk_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekenings`
--
ALTER TABLE `rekenings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tempats`
--
ALTER TABLE `tempats`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biodata_id` (`biodata_id`,`tempat_id`),
  ADD KEY `tmtrans` (`tempat_id`);

--
-- Indeks untuk tabel `transaksi_details`
--
ALTER TABLE `transaksi_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`,`produk_id`),
  ADD KEY `prodtrans` (`produk_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `biodatas`
--
ALTER TABLE `biodatas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `rekenings`
--
ALTER TABLE `rekenings`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tempats`
--
ALTER TABLE `tempats`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `transaksi_details`
--
ALTER TABLE `transaksi_details`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `prodcrt` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usrcrt` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `biotrans` FOREIGN KEY (`biodata_id`) REFERENCES `biodatas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tmtrans` FOREIGN KEY (`tempat_id`) REFERENCES `tempats` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_details`
--
ALTER TABLE `transaksi_details`
  ADD CONSTRAINT `prodtrans` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
