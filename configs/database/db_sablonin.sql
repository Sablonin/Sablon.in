-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Nov 2021 pada 15.14
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sablonin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses`
--

CREATE TABLE `akses` (
  `IDLevel` int(2) NOT NULL,
  `Akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akses`
--

INSERT INTO `akses` (`IDLevel`, `Akses`) VALUES
(1, 'Admin'),
(2, 'Employee');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `IDBarang` varchar(5) NOT NULL,
  `Barang` varchar(50) NOT NULL,
  `IDKategori` varchar(5) NOT NULL,
  `Stok` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`IDBarang`, `Barang`, `IDKategori`, `Stok`) VALUES
('BR001', 'Cat Biru', 'KG001', '11'),
('BR002', 'Cat Kuning', 'KG001', '17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `IDJabatan` int(2) NOT NULL,
  `Jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`IDJabatan`, `Jabatan`) VALUES
(1, 'Pemilik'),
(2, 'Pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `IDKategori` varchar(5) NOT NULL,
  `Kategori` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`IDKategori`, `Kategori`) VALUES
('KG001', 'Cat Warna'),
('KG002', 'Kain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `IDLogin` varchar(5) NOT NULL,
  `IDPegawai` varchar(5) NOT NULL,
  `Username` varchar(12) NOT NULL,
  `Password` varchar(12) NOT NULL,
  `IDLevel` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`IDLogin`, `IDPegawai`, `Username`, `Password`, `IDLevel`) VALUES
('LG001', 'PG001', 'admin1', 'admin1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `IDPegawai` varchar(5) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Tanggal` date NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Telepon` varchar(12) NOT NULL,
  `IDJabatan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`IDPegawai`, `Nama`, `Gender`, `Tanggal`, `Alamat`, `Telepon`, `IDJabatan`) VALUES
('PG001', 'Farul Ahmad Wananda', 'Laki-Laki', '2021-11-08', 'Bondowoso', '089682125741', 1),
('PG002', 'Uciha Madara', 'Laki-Laki', '2021-11-03', 'Konoha', '089682125742', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `IDRiwayat` varchar(5) NOT NULL,
  `Barang` varchar(35) NOT NULL,
  `Kategori` varchar(35) NOT NULL,
  `Stok` int(4) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`IDRiwayat`, `Barang`, `Kategori`, `Stok`, `Status`, `Time`) VALUES
('BR001', 'Cotton', 'KG001', 11, 'INSERT', '2021-11-27'),
('BR001', 'Baju', 'KG002', 12, 'INSERT', '2021-11-27'),
('BR001', 'Cat Biru', 'KG001', 16, 'INSERT', '2021-11-27'),
('BR001', 'cat', 'KG001', 12, 'INSERT', '2021-11-27'),
('BR001', 'cat', 'KG001', 12, 'INSERT', '2021-11-27'),
('BR001', 'cat', 'KG001', 12, 'INSERT', '2021-11-27'),
('BR001', 'cat', 'KG001', 16, 'INSERT', '2021-11-27'),
('BR001', 'cat', 'KG001', 18, 'INSERT', '2021-11-27'),
('BR001', 'cat', 'KG001', 12, 'INSERT', '2021-11-27'),
('BR001', 'cat', 'KG001', 12, 'INSERT', '2021-11-27'),
('BR001', 'cat', 'KG002', 12, 'INSERT', '2021-11-27'),
('BR001', 'Cat Biru', 'KG001', 11, 'INSERT', '2021-11-28'),
('BR002', 'Cat Kuning', 'KG001', 17, 'INSERT', '2021-11-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan`
--

CREATE TABLE `ulasan` (
  `IDUlasan` int(4) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Ulasan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`IDLevel`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`IDBarang`),
  ADD KEY `barang_ibfk_1` (`IDKategori`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`IDJabatan`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`IDKategori`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`IDLogin`),
  ADD KEY `IDLevel` (`IDLevel`),
  ADD KEY `login_ibfk_1` (`IDPegawai`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`IDPegawai`),
  ADD KEY `IDJabatan` (`IDJabatan`);

--
-- Indeks untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`IDUlasan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akses`
--
ALTER TABLE `akses`
  MODIFY `IDLevel` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `IDJabatan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `IDUlasan` int(4) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`IDKategori`) REFERENCES `kategori` (`IDKategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`IDPegawai`) REFERENCES `pegawai` (`IDPegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`IDLevel`) REFERENCES `akses` (`IDLevel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`IDJabatan`) REFERENCES `jabatan` (`IDJabatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
