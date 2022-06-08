-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jun 2022 pada 10.08
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_penjualan_pulsa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_harga`
--

CREATE TABLE `daftar_harga` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_provider` int(10) UNSIGNED NOT NULL,
  `harga` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar_harga`
--

INSERT INTO `daftar_harga` (`id`, `id_provider`, `harga`, `updated_at`, `created_at`) VALUES
(1, 1, '7000', NULL, NULL),
(2, 1, '12000', NULL, NULL),
(3, 1, '22000', NULL, NULL),
(4, 1, '52000', NULL, NULL),
(5, 2, '6000', NULL, NULL),
(6, 2, '11000', NULL, NULL),
(7, 2, '21000', NULL, NULL),
(8, 2, '51000', NULL, NULL),
(9, 3, '6500', NULL, NULL),
(10, 3, '11500', NULL, NULL),
(11, 3, '12500', NULL, NULL),
(12, 3, '51500', NULL, NULL),
(13, 4, '6500', NULL, NULL),
(14, 4, '11500', NULL, NULL),
(15, 4, '12500', NULL, NULL),
(16, 4, '51500', NULL, NULL),
(17, 5, '6000', NULL, NULL),
(18, 5, '11000', NULL, NULL),
(19, 5, '21000', NULL, NULL),
(20, 5, '51000', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `no_hp` varchar(13) NOT NULL,
  `provider_id` int(10) UNSIGNED NOT NULL,
  `pulsa` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`no_hp`, `provider_id`, `pulsa`, `created_at`, `updated_at`) VALUES
('081807070672', 4, '0', '2022-06-07 12:23:59', NULL),
('082130190008', 1, '0', '2022-06-07 12:23:59', NULL),
('085878879111', 5, '0', '2022-06-07 12:23:59', NULL),
('088809399566', 2, '0', '2022-06-07 12:23:59', NULL),
('0895326375573', 3, '64500', '2022-06-07 12:23:59', '2022-06-08 01:03:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `tanggal_pembelian` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `no_hp`, `harga`, `tanggal_pembelian`) VALUES
(1, '0895326375573', '6500', '2022-06-07 16:16:26'),
(2, '0895326375573', '6500', '2022-06-07 16:16:58'),
(3, '0895326375573', '51500', '2022-06-08 08:03:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `providers`
--

CREATE TABLE `providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `providers`
--

INSERT INTO `providers` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Telkomsel', '2022-06-07 12:06:44', NULL),
(2, 'Smartfren', '2022-06-07 12:06:44', NULL),
(3, 'Tri', '2022-06-07 12:06:44', NULL),
(4, 'XL', '2022-06-07 12:06:44', NULL),
(5, 'Indosat', '2022-06-07 12:06:44', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_harga`
--
ALTER TABLE `daftar_harga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_provider` (`id_provider`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`no_hp`),
  ADD KEY `idx_provider_id` (`provider_id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_no_hp` (`no_hp`);

--
-- Indeks untuk tabel `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_harga`
--
ALTER TABLE `daftar_harga`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `daftar_harga`
--
ALTER TABLE `daftar_harga`
  ADD CONSTRAINT `daftar_harga_ibfk_1` FOREIGN KEY (`id_provider`) REFERENCES `providers` (`id`);

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `idx_provider_id` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`);

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `idx_no_hp` FOREIGN KEY (`no_hp`) REFERENCES `pelanggan` (`no_hp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
