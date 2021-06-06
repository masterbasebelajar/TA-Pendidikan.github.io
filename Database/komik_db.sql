-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Bulan Mei 2021 pada 10.22
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `komik_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbaction`
--

CREATE TABLE `tbaction` (
  `idAction` int(11) NOT NULL,
  `namaAction` varchar(200) NOT NULL,
  `gambar` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `jenisAction` varchar(50) NOT NULL,
  `tipeAction` varchar(50) NOT NULL,
  `qtyAction` int(5) NOT NULL,
  `harga` int(20) NOT NULL,
  `ketAction` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbaction`
--

INSERT INTO `tbaction` (`idAction`, `namaAction`, `gambar`, `jenisAction`, `tipeAction`, `qtyAction`, `harga`, `ketAction`, `created_at`, `updated_at`) VALUES
(1, 'Avengers', 'Avengers_01_CvrA.jpg', 'Action', 'Komik Anak', 5, 50000, ' Sisakan Stok', '2021-05-21 03:16:58', '2021-05-21 03:16:58'),
(2, 'Red Strom', 'manhwa-komik-action-terbaik-Red-Storm.png', 'Action, Romantis', 'Komik Dewasa', 5, 50000, ' Tidak untuk anak-anak', '2021-05-21 08:22:05', '2021-05-21 08:22:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbcomedy`
--

CREATE TABLE `tbcomedy` (
  `idComedy` int(11) NOT NULL,
  `namaComedy` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `jenisComedy` varchar(50) NOT NULL,
  `tipeComedy` varchar(50) NOT NULL,
  `qtyComedy` int(5) NOT NULL,
  `harga` int(20) NOT NULL,
  `ketComedy` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbcomedy`
--

INSERT INTO `tbcomedy` (`idComedy`, `namaComedy`, `gambar`, `jenisComedy`, `tipeComedy`, `qtyComedy`, `harga`, `ketComedy`, `created_at`, `updated_at`) VALUES
(7, 'Mice Cartoon', 'mice-cartoon.jpeg', 'comedy', 'comic anak', 5, 50000, '-', '2021-05-20 11:28:27', '2021-05-20 11:28:27'),
(10, 'Kariage Kun', '9786020400679.jpg', 'Comedy Lucu', 'Komik Anak Anak', 2, 50000, ' -', '2021-05-21 08:21:25', '2021-05-21 08:21:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbhorror`
--

CREATE TABLE `tbhorror` (
  `idHorror` int(11) NOT NULL,
  `namaHorror` varchar(200) NOT NULL,
  `gambar` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `jenisHorror` varchar(50) NOT NULL,
  `tipeHorror` varchar(50) NOT NULL,
  `qtyHorror` int(5) NOT NULL,
  `harga` int(20) NOT NULL,
  `ketHorror` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbhorror`
--

INSERT INTO `tbhorror` (`idHorror`, `namaHorror`, `gambar`, `jenisHorror`, `tipeHorror`, `qtyHorror`, `harga`, `ketHorror`, `created_at`, `updated_at`) VALUES
(1, 'KuntilBayi', 'horror.jpg', 'Horror, Comedy', 'Komik Dewasa', 10, 10000, ' Tidak untuk anak-anak', '2021-05-21 07:36:13', '2021-05-21 07:36:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `namalengkap` varchar(128) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `akses` int(11) DEFAULT NULL,
  `isActive` int(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `namalengkap`, `username`, `password`, `email`, `akses`, `isActive`, `created_at`, `updated_at`) VALUES
(14, 'test', 'test', '$2y$10$/qAnSi/XkQeJLCS8Od6bA.0ULGvPRutb6i0N0mUy2f6tb0X67bWhy', 'testing@test.com', 1, 1, '2021-04-29 17:13:27', '2021-04-30 09:04:42'),
(15, 'test2', 'test2', '$2y$05$A.RmsVY78wAdqvrdV4OLOuZVhqyOLeyHpAyr.iMGhjf0cijEv8UqC', 'testing2@test.com', 2, 1, '2021-05-01 02:51:23', '2021-05-20 16:13:09'),
(17, 'admin komik', 'adminko', '$2y$05$6T8aLRoFy6On2cBoZXDKteKa90Bnn1UExO85je06KKOFU3Rce6gka', 'adminkomik@gmail.com', 1, 1, '2021-05-19 15:16:12', '2021-05-20 16:12:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbaction`
--
ALTER TABLE `tbaction`
  ADD PRIMARY KEY (`idAction`);

--
-- Indeks untuk tabel `tbcomedy`
--
ALTER TABLE `tbcomedy`
  ADD PRIMARY KEY (`idComedy`);

--
-- Indeks untuk tabel `tbhorror`
--
ALTER TABLE `tbhorror`
  ADD PRIMARY KEY (`idHorror`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbaction`
--
ALTER TABLE `tbaction`
  MODIFY `idAction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbcomedy`
--
ALTER TABLE `tbcomedy`
  MODIFY `idComedy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbhorror`
--
ALTER TABLE `tbhorror`
  MODIFY `idHorror` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
