-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Des 2019 pada 11.01
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hijev`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_bank`
--

CREATE TABLE `master_bank` (
  `master_bank_id` int(11) NOT NULL,
  `bank_name` varchar(7) NOT NULL,
  `account_id` varchar(20) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `scrape_url` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `auto_scrape` tinyint(1) NOT NULL,
  `scrape_interval` int(10) NOT NULL,
  `mutasi_interval` int(4) NOT NULL,
  `last_scrape_status` int(10) NOT NULL,
  `last_scrape` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_bank`
--

INSERT INTO `master_bank` (`master_bank_id`, `bank_name`, `account_id`, `account_name`, `username`, `password`, `scrape_url`, `status`, `auto_scrape`, `scrape_interval`, `mutasi_interval`, `last_scrape_status`, `last_scrape`, `created_at`) VALUES
(1, 'BNI', '871424949', 'B.E.B.A.S', 'Zaki0444', 'Dj778899', 'http://103.129.220.243/BankScrapeBasic/index.php?bank={bank_name}&no_rekening={account_id}&username={username}&password={password}&day_interval={day_interval}', 1, 1, 60, 20, 1, '2019-12-27 09:22:31', '2019-12-27 05:35:01'),
(3, 'BRI', '525501029301532', 'Dennis', 'ssudar0883', 'Bb778899', 'http://103.129.220.243/BankScrapeBasic/index.php?bank={bank_name}&no_rekening={account_id}&username={username}&password={password}&day_interval={day_interval}', 1, 1, 120, 10, 1, '2019-12-27 09:22:34', '2019-12-27 12:43:28'),
(4, 'BCA', '2951516424', 'Denis', 'mustainj0705', '251104', 'http://103.129.220.243/BankScrapeBasic/index.php?bank={bank_name}&no_rekening={account_id}&username={username}&password={password}&day_interval={day_interval}', 1, 1, 120, 28, 1, '2019-12-27 09:22:47', '2019-12-27 14:54:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `record_mutasi`
--

CREATE TABLE `record_mutasi` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(7) NOT NULL,
  `account_id` varchar(20) NOT NULL,
  `waktu` date NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jenis` varchar(2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` int(1) NOT NULL COMMENT '1: admin || 2: viewer',
  `full_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `profile_picture` text NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0: tidak aktif || 1: aktif',
  `last_login` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `role`, `full_name`, `gender`, `email`, `phone`, `profile_picture`, `jabatan`, `status`, `last_login`, `created_at`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'Super Admin', 'FEMALE', 'admin@admin.com', '085123123123', 'Screenshot_71.png', 'Manager', 1, '2019-12-27 12:33:06', '2019-12-26 10:42:51'),
(2, 'tamu', 'f8829935a87192f3f9fab79856122c0f', 2, 'Guest', 'MALE', 'guest@admin.com', '089123123123', 'Screenshot_7.png', 'OB', 1, '2019-12-27 11:11:15', '2019-12-27 09:01:47');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `master_bank`
--
ALTER TABLE `master_bank`
  ADD PRIMARY KEY (`master_bank_id`);

--
-- Indeks untuk tabel `record_mutasi`
--
ALTER TABLE `record_mutasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `master_bank`
--
ALTER TABLE `master_bank`
  MODIFY `master_bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `record_mutasi`
--
ALTER TABLE `record_mutasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
