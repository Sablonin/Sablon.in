-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Des 2021 pada 11.59
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
('BR001', 'Cat Biru', 'KG001', '26'),
('BR002', 'Cat Merah', 'KG001', '38'),
('BR003', 'Cat Kuning', 'KG001', '48'),
('BR004', 'Cat Putih', 'KG001', '48'),
('BR005', 'Cat Hitam', 'KG001', '38'),
('BR006', 'Cat Orange', 'KG001', '48'),
('BR007', 'Cat Ungu', 'KG001', '38'),
('BR008', 'Cat Hijau', 'KG001', '48'),
('BR009', 'Cotton', 'KG002', '38'),
('BR010', 'Cotton Combat', 'KG002', '48'),
('BR011', 'Cat Emas', 'KG001', '48');

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
('LG009', 'PG004', 'admin0', 'admin0', 1);

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
  `IDJabatan` int(2) NOT NULL,
  `Foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`IDPegawai`, `Nama`, `Gender`, `Tanggal`, `Alamat`, `Telepon`, `IDJabatan`, `Foto`) VALUES
('PG004', 'Farul Ahmad Wananda', 'Laki-Laki', '2002-04-04', 'Bondowoso', '089682125741', 1, '61b5d02973766.png'),
('PG005', 'Administrator', 'Laki-Laki', '2021-12-01', 'Bondowoso', '000000000001', 1, '61b5d5723c4fd.jpg');

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
('BR001', 'Cat Biru', 'KG001', 26, 'INSERT', '2021-12-12'),
('BR002', 'Cat Merah', 'KG001', 38, 'INSERT', '2021-12-12'),
('BR003', 'Cat Kuning', 'KG001', 48, 'INSERT', '2021-12-12'),
('BR004', 'Cat Putih', 'KG001', 48, 'INSERT', '2021-12-12'),
('BR005', 'Cat Hitam', 'KG001', 38, 'INSERT', '2021-12-12'),
('BR006', 'Cat Orange', 'KG001', 48, 'INSERT', '2021-12-12'),
('BR007', 'Cat Ungu', 'KG001', 38, 'INSERT', '2021-12-12'),
('BR008', 'Cat Hijau', 'KG001', 48, 'INSERT', '2021-12-12'),
('BR009', 'Cotton', 'KG002', 38, 'INSERT', '2021-12-12'),
('BR010', 'Cotton Combat', 'KG002', 48, 'INSERT', '2021-12-12'),
('BR011', 'Cat Emas', 'KG001', 48, 'INSERT', '2021-12-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan`
--

CREATE TABLE `ulasan` (
  `IDUlasan` varchar(5) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Ulasan` varchar(255) NOT NULL,
  `Foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ulasan`
--

INSERT INTO `ulasan` (`IDUlasan`, `Nama`, `Ulasan`, `Foto`) VALUES
('UN001', 'Perseus', 'Sangat menarik', '61b5cd211376e.jpg'),
('UN002', 'Poseidon', 'Sangat bagus', '61b5cd34799ab.jpg'),
('UN003', 'Hades', 'Menarik dan nyaman', '61b5cd49608c0.jpg'),
('UN004', 'Athena', 'Nyaman dan enak untuk dipandang', '61b5cd5ae8097.jpg'),
('UN005', 'Lucius', 'Enak dan nyaman dipakai', '61b5cd6de4c1a.jpg'),
('UN006', 'Reyna', 'Hasil yang maksimal', '61b5cda513540.jpg');

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
