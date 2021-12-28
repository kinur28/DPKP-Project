-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2021 at 01:27 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dpkp`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `gedung`
--

CREATE TABLE `gedung` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `foto_profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_gedung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wilayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `klasifikasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_fsm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_pelatihan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `struktur_mkkg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surat_keterangan_pelatihan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_dokumentasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pelaksanaanmkkg_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`id`, `user_id`, `foto_profile`, `nama_gedung`, `alamat`, `nomor_telp`, `wilayah`, `klasifikasi`, `nama_fsm`, `tahun_pelatihan`, `struktur_mkkg`, `keterangan`, `surat_keterangan_pelatihan`, `foto_dokumentasi`, `pelaksanaanmkkg_id`, `created_at`, `updated_at`) VALUES
(1, 3, 'damkarjaksel.jpg', 'dinas jakarta selatan', 'jalan jambu raya', '081255467788', 'Jakarta Barat', 'Sedang', 'kiki nurul', '2020', 'strukturmkkg.pdf', 'Sudah', 'suratketeranganpelatihan.pdf', 'tesfotdok.pdf', 1, '2021-09-12 18:14:45', '2021-09-12 18:32:25'),
(2, 3, 'damkarjakut.jpg', 'Dinas Jakarta Utara', 'jalan jambu raya', '081255467900', 'Jakarta Utara', 'Sedang', 'Kiki amalia', '2019', 'strukturmkkg.pdf', 'Sudah', 'suratketeranganpelatihan.pdf', 'tesfotdok.pdf', 2, '2021-09-12 19:08:07', '2021-09-12 19:13:41'),
(3, 6, 'damkarjakpus.jpeg', 'Damkar Jakarta Pusat', 'jalan matraman', '081255467900', 'Jakarta Pusat', 'Tinggi', 'Budi', '2020', 'strukturmkkg.pdf', 'Sudah', 'suratketeranganpelatihan.pdf', 'tesfotdok.pdf', 3, '2021-09-13 19:23:58', '2021-09-13 19:26:19'),
(5, 7, NULL, 'Dinas Jakarta Utara', 'jl.bulak1 no.84 ciputat', '081255467776', 'Jakarta Utara', 'Tinggi', 'kikin', '2020', NULL, 'Belum', NULL, NULL, 5, '2021-12-05 13:00:35', '2021-12-05 13:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(20, '2021_06_17_152829_create_karyawan_table', 1),
(34, '2014_10_12_000000_create_users_table', 2),
(35, '2014_10_12_100000_create_password_resets_table', 2),
(36, '2019_08_19_000000_create_failed_jobs_table', 2),
(37, '2021_06_17_152829_create_pegawai_table', 2),
(38, '2021_06_30_053239_create_gedung_table', 2),
(39, '2021_08_25_213521_create_pelaksanaanmkkg_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `NIP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_tugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wilayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `user_id`, `NIP`, `nama_lengkap`, `email`, `jabatan`, `jenis_kelamin`, `tempat_tugas`, `wilayah`, `foto_profile`, `created_at`, `updated_at`) VALUES
(1, 1, '3761904300010001', 'Admin Damkar Utama', 'admindamkarutama@gmail.com', 'ketua', 'L', 'Tangerang', 'Jakarta Pusat', NULL, NULL, NULL),
(2, 3, '3761000912220789', 'kiki nurul aulia', 'kikinrlaul@gmail.com', 'Wakil', 'P', 'Jakarta', 'Jakarta Pusat', 'person2.png', '2021-09-12 17:55:55', '2021-09-12 19:42:05'),
(3, 4, '3761000912220777', 'Rizky Firdaus', 'rizkyfirdaus@gmail.com', 'Ketua', 'L', 'Jakarta', 'Jakarta Timur', NULL, '2021-09-12 17:56:25', '2021-09-12 17:56:25'),
(4, 5, '3761000912220123', 'Budi Sulaeman', 'budisulaeman@gmail.com', 'Wakil', 'L', 'Jakarta', 'Jakarta Utara', NULL, '2021-09-12 17:57:44', '2021-09-12 17:57:44'),
(5, 6, '3761000912220722', 'Rina Balerina', 'rinabalerina@gmail.com', 'Wakil', 'P', 'Jakarta', 'Jakarta Pusat', 'person.webp', '2021-09-13 19:19:12', '2021-09-13 19:31:48'),
(6, 7, '37610009122201445', 'Kiki Amalia', 'kikiamalia@gmail.com', 'Wakil', 'P', 'Seksi Pencegahan', 'Jakarta Timur', 'person2.png', '2021-09-14 20:18:44', '2021-09-14 20:41:01');

-- --------------------------------------------------------

--
-- Table structure for table `pelaksanaanmkkg`
--

CREATE TABLE `pelaksanaanmkkg` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahapan_program_kerja` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `struktur_organisasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tugas_dan_fungsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `koordinasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sarana_prasarana` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `standar_operasional_prosedur_dan_RTDK` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Pelatihan_dan_simulasi_evakuasi_kebakaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengesahan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelaksanaanmkkg`
--

INSERT INTO `pelaksanaanmkkg` (`id`, `tahapan_program_kerja`, `struktur_organisasi`, `tugas_dan_fungsi`, `koordinasi`, `sarana_prasarana`, `standar_operasional_prosedur_dan_RTDK`, `Pelatihan_dan_simulasi_evakuasi_kebakaran`, `pengesahan`, `created_at`, `updated_at`) VALUES
(1, 'Tahapan Program Kerja.pdf', 'Struktur Organisasi.pdf', 'Tugas dan Fungsi.pdf', 'Koordinasi.pdf', 'Sarana Prasarana.pdf', 'Standaroperasional prosedur .pdf', 'Pelatihan dan simulasi.pdf', 'Pengesahan.pdf', '2021-09-12 18:14:45', '2021-09-12 18:43:53'),
(2, 'Tahapan Program Kerja.pdf', 'Struktur Organisasi.pdf', 'Tugas dan Fungsi.pdf', 'Koordinasi.pdf', 'Sarana Prasarana.pdf', 'Standaroperasional prosedur .pdf', 'Pelatihan dan simulasi.pdf', 'Pengesahan.pdf', '2021-09-12 19:08:07', '2021-09-12 19:17:16'),
(3, 'Tahapan Program Kerja.pdf', 'Struktur Organisasi.pdf', NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-13 19:23:58', '2021-09-13 19:28:52'),
(4, 'Tahapan Program Kerja.pdf', '00000025863_Kiki Nurul Aulia (1).docx', NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-14 20:23:49', '2021-09-14 20:27:27'),
(5, 'Tahapan Program Kerja.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-05 13:00:35', '2021-12-06 23:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NIP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `NIP`, `foto_profile`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '3761904300010001', NULL, 'Admin Damkar Utama', 'admin', 'admindamkarutama@gmail.com', NULL, '$2y$10$ebIBkvhQGLV7cbTJw50DNuRS1bvD12Rk8RCAdbCiwduVMYGLi4a2.', NULL, NULL, NULL),
(2, '0000000000000000', NULL, 'Admin Keamanan', 'adminkeamanan', 'adminkeamanan@gmail.com', NULL, '$2y$10$LI.PHozYzVO9AzXgMPzC2Oh3wEyvJ3bjBAEtpg00Z0K3OGQFtYl/S', NULL, NULL, NULL),
(3, '3761000912220789', 'person2.png', 'kiki nurul aulia', 'userkaryawan', 'kikinrlaul@gmail.com', NULL, '$2y$10$xqKkg2yovQDUlYGvS8ExFe1cwCOccrhZTuhu6CxDGWhbX7kDuDIQS', 'jGbtkezhRuavFweFt7Mu5y8ijlc0eeYZbRVGN3I5mhf7uBS59D21H0NngIWW', '2021-09-12 17:55:55', '2021-09-12 19:42:05'),
(4, '3761000912220777', NULL, 'Rizky Firdaus', 'userkaryawan', 'rizkyfirdaus@gmail.com', NULL, '$2y$10$lpSEzIF2wH.b9ZnLUlGYV.2dcAIhQX0Mk3/wZsVz.AZQ4z7uYZnKq', '1d17BueHlsWeygJqHQkF9wIj4hyLDUfhlXkVpTfbN9Xg8OH4KxQvZl1Fd0Rt', '2021-09-12 17:56:24', '2021-09-12 18:04:58'),
(5, '3761000912220123', NULL, 'Budi Sulaeman', 'userkaryawan', 'budisulaeman@gmail.com', NULL, '$2y$10$9hqFgBps3AUptCnmgApYguXotYgMMlj2CokQ9qHQwFvJUDepc1.e.', 'BpWVsdwPmTel9MUrC6pv5UsXqsvbPLXxG5H5ag814ntTtuJHwfeAU0n1nKSk', '2021-09-12 17:57:44', '2021-09-12 18:09:16'),
(6, '3761000912220722', 'person.webp', 'Rina Balerina', 'userkaryawan', 'rinabalerina@gmail.com', NULL, '$2y$10$A4p6pBuWAx3ah7g5.vyNb.ff8VSHXWwWQ550ag5b5IYxHJnib6OuS', 'nyb1tlSZldlHWZoxMSw8MbiZCj7e0HwoTSQ5BeKo85hNsy5TRONCMCwRLdQL', '2021-09-13 19:19:12', '2021-09-13 19:38:05'),
(7, '37610009122201445', 'person2.png', 'Kiki Amalia', 'userkaryawan', 'kikiamalia@gmail.com', NULL, '$2y$10$66xyOwZIDzAZ9wC1M7VOcewMaRYKY6k7eU7Sp6MUs7eQh8WncWAjO', 'SQVOcvZ7rD3zkBMB92oUwB08ukKZBATZA80FXaY8lzvMQCegj02tSLS8dw1m', '2021-09-14 20:18:44', '2021-09-14 20:41:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pegawai_nip_unique` (`NIP`);

--
-- Indexes for table `pelaksanaanmkkg`
--
ALTER TABLE `pelaksanaanmkkg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nip_unique` (`NIP`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pelaksanaanmkkg`
--
ALTER TABLE `pelaksanaanmkkg`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
