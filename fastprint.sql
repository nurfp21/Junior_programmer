-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Feb 2026 pada 03.15
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fastprint`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Makanan & Sembako'),
(2, 'Minuman'),
(3, 'Alat Tulis Kantor'),
(4, 'Produk Segar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(10) UNSIGNED NOT NULL,
  `nama_produk` varchar(150) NOT NULL,
  `harga` int(10) UNSIGNED NOT NULL,
  `kategori_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `kategori_id`, `status_id`) VALUES
(1, 'Beras Ramos 5 Kg', 68000, 1, 1),
(2, 'Gula Pasir 1 Kg', 14500, 1, 1),
(3, 'Minyak Goreng 1 Liter', 17000, 1, 1),
(4, 'Mie Instan Goreng', 3000, 1, 1),
(5, 'Tepung Terigu 1 Kg', 12500, 1, 2),
(6, 'Beras Ramos 5 Kg', 68000, 1, 1),
(7, 'Gula Pasir 1 Kg', 14500, 1, 1),
(8, 'Minyak Goreng 1 Liter', 17000, 1, 1),
(9, 'Mie Instan Goreng', 3000, 1, 1),
(10, 'Tepung Terigu 1 Kg', 12500, 1, 2),
(11, 'Pulpen Hitam Standard', 2500, 3, 1),
(12, 'Buku Tulis 38 Lembar', 5500, 3, 1),
(13, 'Spidol Whiteboard', 8000, 3, 1),
(14, 'Kertas HVS A4 70gsm', 52000, 3, 1),
(15, 'Stapler Besar', 32000, 3, 2),
(16, 'Telur Ayam 1 Kg', 28000, 4, 1),
(17, 'Ayam Potong 1 Kg', 36000, 4, 1),
(18, 'Sayur Bayam', 4000, 4, 1),
(19, 'Buah Apel 1 Kg', 32000, 4, 1),
(20, 'Ikan Segar', 15000, 4, 1),
(21, 'Air Mineral 600 ml', 3500, 2, 1),
(22, 'Teh Botol Sosro', 4500, 2, 1),
(23, 'Kopi Sachet', 2000, 2, 1),
(24, 'Susu UHT 1 Liter', 18500, 2, 1),
(25, 'Minuman Energi', 9000, 2, 2),
(26, 'Susu Singa', 3000, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(10) UNSIGNED NOT NULL,
  `nama_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
(1, 'bisa dijual'),
(2, 'tidak bisa dijual');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `fk_produk_kategori` (`kategori_id`),
  ADD KEY `fk_produk_status` (`status_id`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_produk_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_produk_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id_status`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
