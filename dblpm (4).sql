-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Des 2020 pada 08.38
-- Versi Server: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblpm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nidn` varchar(25) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `golongan` varchar(10) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(50) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama`, `golongan`, `jabatan`, `password`, `alamat`, `foto`, `level`) VALUES
('45', 'agunga', 'III/b', 'Asisten Ahli', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'pariaman', 'Dragon_info.png', 'dosen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaransk`
--

CREATE TABLE `pendaftaransk` (
  `kode` int(11) NOT NULL,
  `nidn` varchar(30) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `pangkat` varchar(20) NOT NULL,
  `golongan` varchar(10) NOT NULL,
  `berkas` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `hari` varchar(60) NOT NULL,
  `bulan` varchar(40) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `font` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftaransk`
--

INSERT INTO `pendaftaransk` (`kode`, `nidn`, `judul`, `pangkat`, `golongan`, `berkas`, `tanggal`, `hari`, `bulan`, `tahun`, `keterangan`, `font`) VALUES
(6, '45', 'makan perai', 'Asisten Ahli', 'III/b', 'buktiagung.pdf', '2020-11-18', 'Selasa dan Rabu', 'September', '2020', 'ggjg', 'red'),
(7, '45', 'dsgdfgf', 'Asisten Ahli', 'III/b', 'RAMADHAN.pdf', '2020-11-20', 'Rabu dan Kamis', 'Agustus', '2020', 'Diproses', 'green');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaranskpengabdian`
--

CREATE TABLE `pendaftaranskpengabdian` (
  `kode` int(11) NOT NULL,
  `nidn` varchar(30) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `pangkat` varchar(20) NOT NULL,
  `golongan` varchar(15) NOT NULL,
  `berkas` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `hari` varchar(60) NOT NULL,
  `bulan` varchar(30) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `tempat` text NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `font` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` varchar(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `foto` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `password`, `foto`) VALUES
('1', 'Ria Murdania', '827ccb0eea8a706c4c34a16891f84e7b', '003.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skpenelitian`
--

CREATE TABLE `skpenelitian` (
  `no` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `nidn` varchar(20) NOT NULL,
  `judul` text NOT NULL,
  `pangkat` varchar(20) NOT NULL,
  `golongan` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `hari` varchar(50) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skpenelitian`
--

INSERT INTO `skpenelitian` (`no`, `no_surat`, `nidn`, `judul`, `pangkat`, `golongan`, `tanggal`, `hari`, `bulan`, `tahun`) VALUES
(4, 'cdf', '45', 'corona 20', 'Asisten Ahli', 'III/b', '2020-11-18', 'Rabu dan Kamis', 'September', '2020'),
(5, 'njgfgx', '45', 'dsffdg', 'Asisten Ahli', 'III/b', '2020-11-18', 'Rabu dan Kamis', 'Agustus', '2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skpengabdian`
--

CREATE TABLE `skpengabdian` (
  `no` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `nidn` varchar(25) NOT NULL,
  `judul` text NOT NULL,
  `pangkat` varchar(20) NOT NULL,
  `golongan` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `hari` varchar(20) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `tempat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skpengabdian`
--

INSERT INTO `skpengabdian` (`no`, `no_surat`, `nidn`, `judul`, `pangkat`, `golongan`, `tanggal`, `hari`, `bulan`, `tahun`, `tempat`) VALUES
(2, 'gfdgfd', '45', 'dfsjhfkdshk', 'Asisten Ahli', 'III/b', '2020-11-16', 'Sabtu dan Minggu', 'Februari', '2020', 'pariaman selatan'),
(3, 'asasasas', '45', 'vdfvcxxvcxxxxxxx', 'Asisten Ahli', 'III/b', '2020-11-17', 'Selasa dan Rabu', 'Juni', '2020', 'pariaman'),
(4, 'diiik', '45', 'sssssssaaa', '', 'III/c', '2020-11-17', 'Selasa dan Kamis', 'Agustus', '', 'bukittinggi'),
(5, 'asasa', '45', 'eja ngaji aja ya ukhti', 'Asisten Ahli', 'III/b', '2020-11-18', 'Senin dan Rabu', 'Juni', '2020', 'fhfghfhiiii'),
(6, 'gdhdfjkgfgfg', '45', 'jkjhjkhk', 'Asisten Ahli', 'III/b', '2020-11-20', 'Senin dan Selasa', 'Agustus', '2020', 'hkjhk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pendaftaransk`
--
ALTER TABLE `pendaftaransk`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `skpenelitian`
--
ALTER TABLE `skpenelitian`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `skpengabdian`
--
ALTER TABLE `skpengabdian`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pendaftaransk`
--
ALTER TABLE `pendaftaransk`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `skpenelitian`
--
ALTER TABLE `skpenelitian`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `skpengabdian`
--
ALTER TABLE `skpengabdian`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
