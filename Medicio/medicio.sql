-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2021 pada 02.49
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicio`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `indeksnya` int(255) NOT NULL,
  `nomor_antrian_sekarang` int(255) NOT NULL,
  `banyak_pasien_mengantri` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `antrian`
--

INSERT INTO `antrian` (`indeksnya`, `nomor_antrian_sekarang`, `banyak_pasien_mengantri`) VALUES
(1, 0, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(255) NOT NULL,
  `nama_dokter` varchar(1000) NOT NULL,
  `jam_kerja` time(6) NOT NULL,
  `waktu_penanggung_jawab` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `jam_kerja`, `waktu_penanggung_jawab`) VALUES
(2, 'dr.AryaSaloka', '10:00:00.924000', 'shiftpagi'),
(3, 'dr.Andin', '12:00:00.310000', 'Shiftsiang'),
(4, 'dr.Risma', '22:28:00.000000', 'Shiftsiang'),
(6, 'dr.Adinda', '15:00:00.184000', 'shiftsore'),
(7, 'dr.Nino Prasetya', '16:00:00.002000', 'shiftsore'),
(8, 'dr.KimJongUn', '19:00:00.130000', 'shiftmalam'),
(9, 'dr.Hendor', '10:10:00.000000', 'shiftmalam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(255) NOT NULL,
  `nama_obat` varchar(200) NOT NULL,
  `jumlah_obat` int(200) NOT NULL,
  `harga_obat` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `jumlah_obat`, `harga_obat`) VALUES
(4, 'betadine', 120, 8000),
(13, 'bodrexin', 157, 5500),
(7, 'glutacid', 90, 7000),
(6, 'hydrocortisoe', 40, 5000),
(1, 'Konidin', 80, 7000),
(8, 'mixagrip', 67, 4000),
(3, 'neosep', 90, 5000),
(11, 'neurobion', 35, 35500),
(2, 'paracetamol', 100, 10000),
(9, 'paramex', 180, 7000),
(10, 'penicilin', 200, 12000),
(5, 'piroxicam', 60, 2500),
(14, 'tempra', 50, 40000),
(15, 'vitaminC', 210, 7500),
(12, 'vitamin_cipi', 150, 25000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(255) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `kota` varchar(500) NOT NULL,
  `no_tlp` int(100) NOT NULL,
  `umur` int(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password_enkripsi` varchar(255) NOT NULL,
  `alamat_pasien` text NOT NULL,
  `keluhan_pasien` text NOT NULL,
  `nomer_pengobatan` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `password`, `kota`, `no_tlp`, `umur`, `tgl_lahir`, `jenis_kelamin`, `email`, `password_enkripsi`, `alamat_pasien`, `keluhan_pasien`, `nomer_pengobatan`) VALUES
(1, 'arya', 'okok', 'Jombang', 2147483647, 5, '2021-05-25', 'laki', 'testwebsite0002@gmail.com', '$2y$10$SKimuQgftBN7WPRiTZTUquR/ONvBpftWob5utiEdX6iCygNdHYGxW', 'Karobelah,Mojoagung,Jombang', 'panas', 1),
(3, 'arya2', 'arya', 'malang', 2147483647, 20, '2021-05-11', 'laki', 'testwebsite0002@gmail.com', '$2y$10$2RGcb3oWhrHjhaFgE3E1GuX2crQ9DI5LE1ENG/FzKTkrb.2blu81i', 'Karobelah,Mojoagung,Jombang', 'sakit perut', 0),
(4, 'joko susilo', 'susilo5', 'Jakarta', 2147483647, 23, '1998-01-14', 'laki', 'jokokandaini@gmail.com', '$2y$10$VUuoTEFF1jh.0YAkwrF96ecJ504nIcwaa2SNtL2HFJKI7kVEt5nJC', 'Jl. Derkuku selatan no 23 RT 4 RW 7 Kecamatan Sukun Kota Malang', 'pusing', 0),
(5, 'adinda sabrina', 'ikilo9', 'malang', 885741245, 21, '2000-06-01', 'laki', 'kakardin@gmail.com', '$2y$10$i/NaB/fgvdX8T6BLCGWd8eiWtR3i5VUzf1nywE1X2tQ83Btc3kEvm', 'Jl. Dali utara rt 3 rw 2  kelurahan tanjungrejo kecamatan skun Malang', 'muntah muntah ', 0),
(6, 'amaruchul', 'amarpl22', 'Surabaya', 882665495, 22, '2000-01-01', 'laki', 'amerkill22@gmail.com', '$2y$10$2l2WFxdTxGOAQ102sDt8bu21C15ulAySmUXxRn8kKzR6VPoKPaDdK', 'Jl.kyaihasyim gang 5 rt 03 rw 05 keluarahan kedungkandang kecamatan kedungkandang kota malan', 'vertigo', 3),
(7, 'kosim ', 'kosim23', 'Gresik', 879564321, 22, '2000-06-10', 'laki', 'kosimggaga34@gmail.com', '$2y$10$980093o7TA0INpfR0/lPSeFr314ll63ml1XR2POkCTH8cYdDVI4C2', 'Jl perkutut no 21 rt 1 rw 8 kelurahan kauman kecamatan sukun kota malang', 'ada suara di otak saya', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengobatan`
--

CREATE TABLE `pengobatan` (
  `id_pengobatan` int(255) NOT NULL,
  `Pilihan_pelayanan` text NOT NULL,
  `harga_pelayanan+obat` int(200) NOT NULL,
  `tgl_berobat` date NOT NULL,
  `diagnosa_penyakit_pasien` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `nomor_ruangan` int(255) NOT NULL,
  `nama_ruangan` text NOT NULL,
  `kategori_ruangan` varchar(200) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`nomor_ruangan`, `nama_ruangan`, `kategori_ruangan`, `status`) VALUES
(1, 'Ruangan inap 1', 'Ruangan anak', 'kosong'),
(2, 'Ruangan inap 2', 'Ruangan_dewasa', 'ada'),
(3, 'Ruangan inap 3', 'Ruangan melahirkan', 'kosong'),
(4, 'Ruangan inap 4', 'Ruangan dewasa', 'ada'),
(5, 'Ruangan umum 1', 'Ruangan anak', 'kosong'),
(6, 'Ruangan umum 2', 'Ruangan dewasa', 'ada'),
(7, 'Ruangan umum 3', 'Ruangan melahirkan', 'ada');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`indeksnya`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`nama_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `pengobatan`
--
ALTER TABLE `pengobatan`
  ADD PRIMARY KEY (`id_pengobatan`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`nomor_ruangan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `antrian`
--
ALTER TABLE `antrian`
  MODIFY `indeksnya` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pengobatan`
--
ALTER TABLE `pengobatan`
  MODIFY `id_pengobatan` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `nomor_ruangan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
