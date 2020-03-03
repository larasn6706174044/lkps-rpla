-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Nov 2019 pada 05.06
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lkps`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_upload`
--

CREATE TABLE `data_upload` (
  `id` int(25) NOT NULL,
  `kode_dosen` varchar(5) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `ukuran` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_upload`
--

INSERT INTO `data_upload` (`id`, `kode_dosen`, `jenis`, `nama`, `tanggal`, `ukuran`) VALUES
(20, 'RDA', '1.a. Data Kerja Sama Tridharma', 'CV RAKA-dikonversi.pdf', '2019-11-26', 57403),
(21, 'RDA', '1.a. Data Kerja Sama Tridharma', 'CURRICULUM VITAE.docx', '2019-11-26', 177561),
(22, 'RDA', '1.a. Data Kerja Sama Tridharma', 'PA.zip', '2019-11-26', 918085),
(23, 'RDA', '2.a. Data Seleksi Mahasiswa', 'CV RAKA-dikonversi.pdf', '2019-11-27', 57403),
(24, 'RDA', '8.f.4. Data Produk/Jasa yang dihasilkan Mahasiswa yang Diadopsi oleh Industri/Masyarakat', 'Portofolio1.pdf', '2019-11-27', 87652);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(10) NOT NULL,
  `kode_dosen` varchar(5) NOT NULL,
  `nama_dosen` varchar(255) NOT NULL,
  `kelamin` varchar(2) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `kode_dosen`, `nama_dosen`, `kelamin`, `username`, `password`) VALUES
(1, 'RDA', 'Raka Daffa Arrival', 'L', 'raka', 'c20ad4d76fe97759aa27a0c99bff6710'),
(2, 'FBR', 'Feni Febriani', 'P', 'feni', 'c20ad4d76fe97759aa27a0c99bff6710');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_upload`
--
ALTER TABLE `data_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_upload`
--
ALTER TABLE `data_upload`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
