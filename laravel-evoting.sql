-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Bulan Mei 2023 pada 02.36
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-evoting`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `kandidat`
--

CREATE TABLE `kandidat` (
  `kandidat_id` bigint(20) UNSIGNED NOT NULL,
  `nama_kandidat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_paslon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kandidat`
--

INSERT INTO `kandidat` (`kandidat_id`, `nama_kandidat`, `no_paslon`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Calon ke-1', 'Annisa & Putra', '1675548805_c1.png', '2023-02-04 22:13:25', '2023-02-04 22:13:25'),
(2, 'Calon ke-2', 'Desi & Dewi', '1675549126_c2.png', '2023-02-04 22:18:46', '2023-02-04 22:18:46'),
(3, 'Calon ke-3', 'Dimas & Putri', '1675549151_c3.png', '2023-02-04 22:19:11', '2023-02-04 22:19:11'),
(4, 'Calon ke-4', 'Yan & Permana', '1675592259_c2.png', '2023-02-05 10:17:39', '2023-02-05 10:17:39');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_01_004215_create_kandidat_table', 1),
(5, '2021_06_01_193135_create_visi_misis_table', 1),
(6, '2021_06_02_123617_create_suaras_table', 1),
(7, '2021_06_04_173845_create_tes_table', 1),
(8, '2023_01_23_122800_create_waktus_table', 1),
(9, '2023_02_04_172402_create_posters_table', 1);

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
-- Struktur dari tabel `posters`
--

CREATE TABLE `posters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posters`
--

INSERT INTO `posters` (`id`, `poster`, `created_at`, `updated_at`) VALUES
(1, '1675549243_Poster - 1.jpg', '2023-02-04 22:20:43', '2023-02-04 22:20:43'),
(2, '1675549254_Poster - 2.jpg', '2023-02-04 22:20:54', '2023-02-04 22:20:54'),
(3, '1675549264_Poster - 3.jpg', '2023-02-04 22:21:04', '2023-02-04 22:21:04'),
(4, '1675549276_Poster - 4.jpg', '2023-02-04 22:21:16', '2023-02-04 22:21:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suara`
--

CREATE TABLE `suara` (
  `suara_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kandidat_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tes`
--

CREATE TABLE `tes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` enum('admin','pemilih') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pemilih',
  `nim` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `code_unique` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `role`, `nim`, `name`, `email`, `email_verified_at`, `code_unique`, `phone_number`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '0', 'Admin', 'admin@gmail.com', '2023-02-04 21:30:31', 'nxZO4L', '085694907840', '$2y$10$yOVhg.YngWlCD2J9iQ/3ZOMJ9/3CvcVZZgUiUfHl6DrqyUGRYiBg.', NULL, 0, '2023-02-04 21:30:31', '2023-02-05 02:06:45'),
(2, 'pemilih', '100', 'A', 'deyanyan6@gmail.com', NULL, 'Rx5mW9', '089', '$2y$10$8K9j/IspRFsR050HnhuMq.Am.lDbT9PcJ0b.kDL.W4CHoVQoDdxHW', NULL, 0, '2023-04-09 00:37:29', '2023-04-09 00:44:39'),
(3, 'pemilih', '101', 'B', 'b@gmail.com', NULL, NULL, '088', NULL, NULL, 0, '2023-04-09 00:37:44', '2023-04-09 00:37:44'),
(5, 'pemilih', '181011402589', 'PUTRI SALIMAH AULIANY WIJANARKO', 'we.wears15@gmail.com', NULL, 'i5u4m5', '081', '$2y$10$PCl2xjKGyusNo.zSVrjbIu0BndnghxjayTWQ5IWOE6K5lWzCBVAyu', NULL, 0, '2023-05-03 14:13:21', '2023-05-03 14:14:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `visi_misi`
--

CREATE TABLE `visi_misi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kandidat_id` bigint(20) UNSIGNED NOT NULL,
  `visi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `misi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `visi_misi`
--

INSERT INTO `visi_misi` (`id`, `kandidat_id`, `visi`, `misi`, `created_at`, `updated_at`) VALUES
(1, 1, '<p>1. Visi ke-1</p>\r\n\r\n<p>2. Visi ke-2</p>\r\n\r\n<p>3. Visi ke-3</p>\r\n\r\n<p>4. Visi ke-4</p>\r\n\r\n<p>5. Visi ke-5</p>', '<p>1. Misi ke-1</p>\r\n\r\n<p>2. Misi ke-2</p>\r\n\r\n<p>3. Misi ke-3</p>\r\n\r\n<p>4. Misi ke-4</p>\r\n\r\n<p>5. Misi ke-5</p>', '2023-02-04 22:17:07', '2023-02-04 22:17:42'),
(2, 2, '<p>1. Visi ke-1</p>\r\n\r\n<p>2. Visi ke-2</p>\r\n\r\n<p>3. Visi ke-3</p>\r\n\r\n<p>4. Visi ke-4</p>\r\n\r\n<p>5. Visi ke-5</p>', '<p>1. Misi ke-1</p>\r\n\r\n<p>2. Misi ke-2</p>\r\n\r\n<p>3. Misi ke-3</p>\r\n\r\n<p>4. Misi ke-4</p>\r\n\r\n<p>5. Misi ke-5</p>', '2023-02-04 22:19:47', '2023-02-04 22:19:47'),
(3, 3, '<p>1. Visi ke-1</p>\r\n\r\n<p>2. Visi ke-2</p>\r\n\r\n<p>3. Visi ke-3</p>\r\n\r\n<p>4. Visi ke-4</p>\r\n\r\n<p>5. Visi ke-5</p>', '<p>1. Misi ke-1</p>\r\n\r\n<p>2. Misi ke-2</p>\r\n\r\n<p>3. Misi ke-3</p>\r\n\r\n<p>4. Misi ke-4</p>\r\n\r\n<p>5. Misi ke-5</p>', '2023-02-04 22:20:05', '2023-02-04 22:20:05'),
(4, 4, '<p>1. Visi ke - 1<br />\r\n2. Visi ke - 2<br />\r\n3. Visi ke - 3<br />\r\n4. Visi ke - 4<br />\r\n5. Visi ke - 5</p>', '<p>1. Misi ke - 1<br />\r\n2. Misi ke - 2<br />\r\n3. Misi ke - 3<br />\r\n4. Misi ke - 4<br />\r\n5. Misi ke - 5</p>', '2023-02-05 10:19:15', '2023-02-05 10:19:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktus`
--

CREATE TABLE `waktus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `jam_mulai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jam_akhir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `waktus`
--

INSERT INTO `waktus` (`id`, `tanggal_mulai`, `tanggal_akhir`, `jam_mulai`, `jam_akhir`, `created_at`, `updated_at`) VALUES
(1, '2023-05-03', '2023-05-04', '08:00', '18:00', NULL, '2023-05-03 15:18:43');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`kandidat_id`);

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
-- Indeks untuk tabel `posters`
--
ALTER TABLE `posters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `suara`
--
ALTER TABLE `suara`
  ADD PRIMARY KEY (`suara_id`),
  ADD KEY `suara_user_id_foreign` (`user_id`),
  ADD KEY `suara_kandidat_id_foreign` (`kandidat_id`);

--
-- Indeks untuk tabel `tes`
--
ALTER TABLE `tes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visi_misi_kandidat_id_foreign` (`kandidat_id`);

--
-- Indeks untuk tabel `waktus`
--
ALTER TABLE `waktus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `kandidat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `posters`
--
ALTER TABLE `posters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `suara`
--
ALTER TABLE `suara`
  MODIFY `suara_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tes`
--
ALTER TABLE `tes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `visi_misi`
--
ALTER TABLE `visi_misi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `waktus`
--
ALTER TABLE `waktus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `suara`
--
ALTER TABLE `suara`
  ADD CONSTRAINT `suara_kandidat_id_foreign` FOREIGN KEY (`kandidat_id`) REFERENCES `kandidat` (`kandidat_id`),
  ADD CONSTRAINT `suara_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD CONSTRAINT `visi_misi_kandidat_id_foreign` FOREIGN KEY (`kandidat_id`) REFERENCES `kandidat` (`kandidat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
