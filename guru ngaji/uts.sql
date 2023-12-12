-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Des 2023 pada 09.26
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru_ngaji`
--

CREATE TABLE `guru_ngaji` (
  `nik` varchar(20) NOT NULL,
  `id_kecamatan` int(20) NOT NULL,
  `id_tpq` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `santri` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `guru_ngaji`
--

INSERT INTO `guru_ngaji` (`nik`, `id_kecamatan`, `id_tpq`, `nama`, `alamat`, `santri`) VALUES
('3510172212930002', 0, 0, 'ILHAM NURUDD', 'GIRI-BOYOLAGU', '10'),
('3510172212930003', 0, 0, 'MOH ZAINUDDIN', 'WONGSOREJO', '13'),
('3512172512930001', 0, 0, 'M ANDRIQ MUQORROBIN P', 'SUMBER JAMBE', '15'),
('3512172712930003', 0, 0, 'MOH BAHA\"', 'SUMBEREJO', '12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(20) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
(1234, 'BANGOREJO'),
(3684, 'GIRI'),
(4321, 'GLAGAH'),
(9874, 'KALIPURO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tpq`
--

CREATE TABLE `tpq` (
  `id_tpq` int(20) NOT NULL,
  `nama_tpq` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tpq`
--

INSERT INTO `tpq` (`id_tpq`, `nama_tpq`) VALUES
(1112, 'AL-AMIN'),
(1212, 'SYUBBANUL-WATON'),
(5050, 'AL-HIDAYAH'),
(6549, 'AL-BAROKAH');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `guru_ngaji`
--
ALTER TABLE `guru_ngaji`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_tpq` (`id_tpq`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `tpq`
--
ALTER TABLE `tpq`
  ADD PRIMARY KEY (`id_tpq`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9875;

--
-- AUTO_INCREMENT untuk tabel `tpq`
--
ALTER TABLE `tpq`
  MODIFY `id_tpq` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6550;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
