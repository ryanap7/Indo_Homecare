-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Bulan Mei 2020 pada 18.50
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indo_hc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alkes`
--

CREATE TABLE `alkes` (
  `id_alkes` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `minggu` varchar(20) NOT NULL,
  `bulan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `alkes`
--

INSERT INTO `alkes` (`id_alkes`, `name`, `minggu`, `bulan`) VALUES
(3, 'A', '100', '900000'),
(4, 'B', '200', '20000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ambulance`
--

CREATE TABLE `ambulance` (
  `id_ambulance` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ambulance`
--

INSERT INTO `ambulance` (`id_ambulance`, `name`, `status`) VALUES
(2, 'Armada A', '1'),
(3, 'Armada B', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth`
--

CREATE TABLE `auth` (
  `id_auth` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img` varchar(50) NOT NULL DEFAULT 'default.png',
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `auth`
--

INSERT INTO `auth` (`id_auth`, `name`, `email`, `password`, `img`, `role`) VALUES
(1, 'Ryan', 'Ryan.Aprianto77777@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'default.png', 1),
(4, 'Ibnu Soffyan', 'ibnusoffyan@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'default.png', 2),
(5, 'Ryan', 'digitalhand@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'man.png', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(1, 'Umum'),
(2, 'Ahli'),
(3, 'ICU');

-- --------------------------------------------------------

--
-- Struktur dari tabel `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `client`
--

INSERT INTO `client` (`id_client`, `nama`, `nik`, `email`, `phone`, `alamat`, `status`) VALUES
(2, 'Test', '098974897473', 'test@gmail.com', '0989879', 'Majalengka', '1'),
(3, 'Ryan', '3210171604980021', 'satu@gmail.com', '089639626048', 'Majalengka', '1'),
(4, 'dua', '2352827328', 'dua@gmail.com', '8273562345273', 'hsgsdlhdsgsukeb dhsfbffisyuesd', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_sewa`
--

CREATE TABLE `detail_sewa` (
  `id_detail` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_sewa`
--

INSERT INTO `detail_sewa` (`id_detail`, `id_sewa`, `nama`, `qty`, `harga`) VALUES
(3, 3, 'A', 2, 900000),
(4, 3, 'B', 4, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `employees`
--

CREATE TABLE `employees` (
  `id_employee` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `id_profesi` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `status` char(1) NOT NULL,
  `img` varchar(100) NOT NULL DEFAULT 'default.png',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `employees`
--

INSERT INTO `employees` (`id_employee`, `name`, `nip`, `id_profesi`, `email`, `phone`, `address`, `status`, `img`, `date`) VALUES
(6, 'Ryan', '779768475', 3, 'Ryan.Aprianto77777@gmail.com', '089639626048', 'Blok Selasa RT/RW 02/03\r\nDesa Panjalin Kidul', '1', 'default.png', '2020-05-15'),
(7, 'Ibnu', '786794707', 5, 'ibnusoffyan@gmail.com', '09898687', 'Cirebon', '0', 'man.png', '2020-05-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_role` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hak_akses`
--

INSERT INTO `hak_akses` (`id_role`, `role`) VALUES
(1, 'Superadmin'),
(2, 'Admin'),
(3, 'Koordinator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(11) NOT NULL,
  `id_transaction` int(11) NOT NULL,
  `nama_layanan` varchar(100) NOT NULL,
  `periode` varchar(20) NOT NULL,
  `harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `id_transaction`, `nama_layanan`, `periode`, `harga`) VALUES
(19, 14, 'Perawat ICU', 'Minggu', 5860000),
(20, 15, 'Caregiver Ahli', 'Minggu', 2450000),
(21, 15, 'Caregiver Ahli', 'Bulan', 6000000),
(24, 18, 'Caregiver Ahli', 'Bulan', 6000000),
(25, 19, 'Paket Homecare D', 'Bulan', 65000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa_medis`
--

CREATE TABLE `jasa_medis` (
  `id_jasa` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `id_category` int(11) NOT NULL,
  `desc` text NOT NULL,
  `sesi` varchar(20) NOT NULL,
  `harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jasa_medis`
--

INSERT INTO `jasa_medis` (`id_jasa`, `name`, `id_category`, `desc`, `sesi`, `harga`) VALUES
(15, 'Perawat', 1, '<p>- Menemani dan menjaga pasien</p><p>- Memberi makan pasien</p><p>- Mengganti pempers</p><p>- Prosedur kebersihan pasien</p><p>- Melakukan cek-up TTV</p><p>- Melakukan tindakan  Alkes Standart</p><p>- Follow up dokter</p><p>- Lulusan min D3 Keperawatan/kebidanan</p>', 'Minggu', 2500000),
(16, 'Perawat', 1, '<p>- Menemani dan menjaga pasien</p><p>- Memberi makan pasien</p><p>- Mengganti pempers</p><p>- Prosedur kebersihan pasien</p><p>- Melakukan cek-up TTV</p><p>- Melakukan tindakan  Alkes Standart</p><p>- Follow up dokter</p><p>- Lulusan min D3 Keperawatan/kebidanan</p>', 'Bulan', 6500000),
(17, 'Perawat', 2, '<p>- Menemani dan menjaga pasien</p><p>- Memberi makan pasien</p><p>- Mengganti pempers</p><p>- Prosedur kebersihan pasien</p><p>- Melakukan tindakan Alkes(NGT, Kateter, Suction, dll)</p><p>- Melakukan tindakan medis</p><p>- Melakukan perawatan luka</p><p>- Follow up dokter</p><p>- Lulusan min D3 Keperawatan/kebidanan</p>', 'Minggu', 3050000),
(18, 'Perawat', 2, '<p>- Menemani dan menjaga pasien</p><p>- Memberi makan pasien</p><p>- Mengganti pempers</p><p>- Prosedur kebersihan pasien</p><p>- Melakukan tindakan Alkes(NGT, Kateter, Suction, dll)</p><p>- Melakukan tindakan medis</p><p>- Melakukan perawatan luka</p><p>- Follow up dokter</p><p>- Lulusan min D3 Keperawatan/kebidanan</p>', 'Bulan', 7500000),
(19, 'Perawat', 3, '<p>- Menemani dan menjaga pasien</p><p>- Memberi pemenuhan nutrisi pasien</p><p>- Melakukan prosedur kebersihan pasien</p><p>- Melakukan tindakan Alkes(NGT, Kateter, Suction, dll)</p><p>- Melakukan tindakan medis ICU</p><p>- Melakukan perawatan luka</p><p>- Follow up dokter</p><p>- Lulusan min D3 Keperawatan/kebidanan</p><p>- Pengalaman min 2 tahun</p>', 'Minggu', 5860000),
(20, 'Perawat', 3, '<p>- Menemani dan menjaga pasien</p><p>- Memberi pemenuhan nutrisi pasien</p><p>- Melakukan prosedur kebersihan pasien</p><p>- Melakukan tindakan Alkes(NGT, Kateter, Suction, dll)</p><p>- Melakukan tindakan medis ICU</p><p>- Melakukan perawatan luka</p><p>- Follow up dokter</p><p>- Lulusan min D3 Keperawatan/kebidanan</p><p>- Pengalaman min 2 tahun</p>', 'Bulan', 18000000),
(21, 'Caregiver', 1, '<p>- Menemani dan menjaga pasien</p><p>- Memberi makan pasien</p><p>- Mengganti pempers<br></p><p>- Prosedur kebersihan pasien<br></p><p>- Tidak melakukan tindakan Alkes<br></p><p>- Lulusan min SMK kesehatan/sederajat</p>', 'Minggu', 1750000),
(22, 'Caregiver', 1, '<p>- Menemani dan menjaga pasien</p><p>- Memberi makan pasien</p><p>- Mengganti pempers</p><p>- Prosedur kebersihan pasien</p><p>- Tidak melakukan tindakan Alkes</p><p>- Lulusan min SMK kesehatan/sederajat</p>', 'Bulan', 4800000),
(23, 'Caregiver', 2, '<p>- Menemani dan menjaga pasien<br></p><p>- Memberi makan pasien</p><p>- Mengganti pempers</p><p>- Prosedur kebersihan pasien</p><p>- Melakukan tindakan Alkes (NGT, Kateter, Suction, dll)</p><p>- Melakukan tindakan medis</p><p>- Melakukan pendampingan tindakan medis ICU</p><p>- Lulusan min D3 keperawatan/sederajat</p>', 'Minggu', 2450000),
(24, 'Caregiver', 2, '<p>- Menemani dan menjaga pasien<br></p><p>- Memberi makan pasien</p><p>- Mengganti pempers</p><p>- Prosedur kebersihan pasien</p><p>- Melakukan tindakan Alkes (NGT, Kateter, Suction, dll)</p><p>- Melakukan tindakan medis</p><p>- Melakukan pendampingan tindakan medis ICU</p><p>- Lulusan min D3 keperawatan/sederajat</p>', 'Bulan', 6000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `desc` text NOT NULL,
  `harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `name`, `desc`, `harga`) VALUES
(1, 'Paket Homecare A', '<p><span style=\"font-weight: bolder;\">Tim Medis</span></p><p>- Perawat Ahli</p><p>- Fisioterapi 8x Sesi</p><p><br></p><p><span style=\"font-weight: bolder;\">Alkes</span></p><p>- Suction Machine</p><p>- Patient Monitor</p><p>- Tabung Oksigen Uk.B</p><p>- Ranjang 3 crank Manual</p><p>- Syringe Pump</p>', 35000000),
(2, 'Paket Homecare B', '<p><span style=\"font-weight: bolder;\">Tim Medis</span></p><p>- Perawat Ahli</p><p>- Fisioterapi 12x Sesi</p><p><br></p><p><span style=\"font-weight: bolder;\">Alkes</span></p><p>- Suction Machine</p><p>- Patient Monitor</p><p>- Tabung Oksigen Uk.B</p><p>- Ranjang 3 crank Elektrik</p><p>- Syringe Pump</p><p>- Kasur Decubitus</p><p>- Tiang Infus +  Bad Side cabiner</p>', 40000000),
(3, 'Paket Homecare C', '<p><span style=\"font-weight: bolder;\">Tim Medis</span></p><p>- Dokter 2x Sesi</p><p>- Perawat Ahli</p><p>- Fisioterapi 8x Sesi</p><p><br></p><p><span style=\"font-weight: bolder;\">Alkes</span></p><p>- Suction Machine</p><p>- Patient Monitor</p><p>- Tabung Oksigen Uk.B</p><p>- Ranjang 3 crank Elektrik</p><p>- Syringe Pump</p><p>- B-Pap</p><p>- Kasur Decubitus</p><p>- Tiang Infus +  BSC</p>', 50000000),
(4, 'Paket Homecare D', '<p><span style=\"font-weight: bolder;\">Tim Medis</span></p><p>- Dokter 2x Sesi</p><p>- Perawat Ahli</p><p>- Fisioterapi 8x Sesi</p><p>- Terapi Wicara 8x Sesi</p><p><br></p><p><span style=\"font-weight: bolder;\">Alkes</span></p><p>- Suction Machine</p><p>- Patient Monitor</p><p>- Tabung Oksigen Uk.B</p><p>- Ranjang 3 crank Elektrik</p><p>- Syringe Pump</p><p>- Kasur Decubitus</p><p>- Tiang Infus +  BSC</p><p>- Ventilator MEK/MV-1000</p>', 65000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penunjang_medis`
--

CREATE TABLE `penunjang_medis` (
  `id_penunjang` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sesi` varchar(30) NOT NULL,
  `desc` text NOT NULL,
  `harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penunjang_medis`
--

INSERT INTO `penunjang_medis` (`id_penunjang`, `name`, `sesi`, `desc`, `harga`) VALUES
(16, 'Therapist', '1x', '<p>- Melakukan pemeriksaan penuh terhadap pasien<br></p><p>- Menegakkan diagnosis pasien</p><p>- Menjaga dan memelihara lingkungan pasien</p><p>- Membantu proses pemulihan pasien</p><p>- Meningkatkan kemampuan fungsional pasien</p><p>- Memberi edukasi dan pelatihan mandiri ke keluarga dan/atau penjaga pasien</p><p>- Memantau proses kegiatan pemulihan pasien</p><p>- Melakukan kolaborasi dengan dokter, keluarga dan/atau penjaga pasien</p><p>- Memberi pencacatan dan pelaporan kondisi pasien</p><p>- Bertanggung jawab dengan kondisi pasien</p>', 400000),
(17, 'Therapist', '8x', '<p>- Melakukan pemeriksaan penuh terhadap pasien<br></p><p>- Menegakkan diagnosis pasien</p><p>- Menjaga dan memelihara lingkungan pasien</p><p>- Membantu proses pemulihan pasien</p><p>- Meningkatkan kemampuan fungsional pasien</p><p>- Memberi edukasi dan pelatihan mandiri ke keluarga dan/atau penjaga pasien</p><p>- Memantau proses kegiatan pemulihan pasien</p><p>- Melakukan kolaborasi dengan dokter, keluarga dan/atau penjaga pasien</p><p>- Memberi pencacatan dan pelaporan kondisi pasien</p><p>- Bertanggung jawab dengan kondisi pasien   </p>', 3000000),
(18, 'Therapist', '12x', '<p>- Melakukan pemeriksaan penuh terhadap pasien<br></p><p>- Menegakkan diagnosis pasien</p><p>- Menjaga dan memelihara lingkungan pasien</p><p>- Membantu proses pemulihan pasien</p><p>- Meningkatkan kemampuan fungsional pasien</p><p>- Memberi edukasi dan pelatihan mandiri ke keluarga dan/atau penjaga pasien</p><p>- Memantau proses kegiatan pemulihan pasien</p><p>- Melakukan kolaborasi dengan dokter, keluarga dan/atau penjaga pasien</p><p>- Memberi pencacatan dan pelaporan kondisi pasien</p><p>- Bertanggung jawab dengan kondisi pasien</p>', 4000000),
(19, 'Therapist', '16x', '<p>- Melakukan pemeriksaan penuh terhadap pasien<br></p><p>- Menegakkan diagnosis pasien</p><p>- Menjaga dan memelihara lingkungan pasien</p><p>- Membantu proses pemulihan pasien</p><p>- Meningkatkan kemampuan fungsional pasien</p><p>- Memberi edukasi dan pelatihan mandiri ke keluarga dan/atau penjaga pasien</p><p>- Memantau proses kegiatan pemulihan pasien</p><p>- Melakukan kolaborasi dengan dokter, keluarga dan/atau penjaga pasien</p><p>- Memberi pencacatan dan pelaporan kondisi pasien</p><p>- Bertanggung jawab dengan kondisi pasien</p>', 4850000),
(20, 'Dokter Visite', '1x', '<p>- Invus</p><p>- Insulin</p><p>- Observasi dan Inpeksi</p><p>- Resep Obat</p><p>- Diagnosa</p><p>- Kolaborasi dengan penunjang medis lainnya</p><p>- Rujukan ke spesialis</p>', 1000000),
(21, 'Dokter Visite', '2x', '<p>- Invus</p><p>- Insulin</p><p>- Observasi dan Inpeksi</p><p>- Resep Obat</p><p>- Diagnosa</p><p>- Kolaborasi dengan penunjang medis lainnya</p><p>- Rujukan ke spesialis</p>', 1800000),
(22, 'Dokter Visite', '4x', '<p>- Invus</p><p>- Insulin</p><p>- Observasi dan Inpeksi</p><p>- Resep Obat</p><p>- Diagnosa</p><p>- Kolaborasi dengan penunjang medis lainnya</p><p>- Rujukan ke spesialis</p>', 3400000),
(23, 'Dokter Visite', '8x', '<p>- Invus</p><p>- Insulin</p><p>- Observasi dan Inpeksi</p><p>- Resep Obat</p><p>- Diagnosa</p><p>- Kolaborasi dengan penunjang medis lainnya</p><p>- Rujukan ke spesialis</p>', 6400000),
(24, 'Akupuntur', '1x', '<p>- Melakukan pemeriksaan penuh terhadap pasien</p><p>- Melakukan standar Operational Akupuntur</p><p>- Menjaga dan memelihara lingkungan pasien</p><p>- Membantu proses pemulihan pasien</p><p>- Meningkatkan kemampuan fungsional pasien</p><p>- Memberi edukasi dan pelatihan mandiri ke keluarga dan/atau penjaga pasien</p><p>- Memantau proses kegiatan pemulihan pasien</p><p>- Melakukan kolaborasi  dengan team medis lainnya, keluarga dan/atau penjaga pasien</p><p>- Memberi pencacatan dan pelaporan kondisi pasien</p><p>- Bertanggung jawab dengan kondisi pasien</p>', 400000),
(25, 'Akupuntur', '8x', '<p>- Melakukan pemeriksaan penuh terhadap pasien</p><p>- Melakukan standar Operational Akupuntur</p><p>- Menjaga dan memelihara lingkungan pasien</p><p>- Membantu proses pemulihan pasien</p><p>- Meningkatkan kemampuan fungsional pasien</p><p>- Memberi edukasi dan pelatihan mandiri ke keluarga dan/atau penjaga pasien</p><p>- Memantau proses kegiatan pemulihan pasien</p><p>- Melakukan kolaborasi  dengan team medis lainnya, keluarga dan/atau penjaga pasien</p><p>- Memberi pencacatan dan pelaporan kondisi pasien</p><p>- Bertanggung jawab dengan kondisi pasien</p>', 3000000),
(26, 'Akupuntur', '12x', '<p>- Melakukan pemeriksaan penuh terhadap pasien</p><p>- Melakukan standar Operational Akupuntur</p><p>- Menjaga dan memelihara lingkungan pasien</p><p>- Membantu proses pemulihan pasien</p><p>- Meningkatkan kemampuan fungsional pasien</p><p>- Memberi edukasi dan pelatihan mandiri ke keluarga dan/atau penjaga pasien</p><p>- Memantau proses kegiatan pemulihan pasien</p><p>- Melakukan kolaborasi  dengan team medis lainnya, keluarga dan/atau penjaga pasien</p><p>- Memberi pencacatan dan pelaporan kondisi pasien</p><p>- Bertanggung jawab dengan kondisi pasien</p>', 4200000),
(27, 'Nurse Visite', '1x', '<p>- Melakukan pemeriksaan penuh terhadap pasien</p><p>- Melakukan Treatment Full terhadap kondisi pasien</p><p>- Menjaga dan memelihara lingkungan pasien</p><p>- Membantu proses pemulihan pasien</p><p>- Memberi edukasi dan pelatihan mandiri ke keluarga dan/atau penjaga pasien</p><p>- Memantau proses kegiatan pemulihan pasien</p><p>- Melakukan kolaborasi dengan dokter, keluarga dan/atau penjaga pasien</p><p>- Memberi pencacatan dan pelaporan kondisi pasien</p><p>- Bertanggung jawab dengan kondisi pasien</p>', 450000),
(28, 'Nurse Visite', '2x', '<p>- Melakukan pemeriksaan penuh terhadap pasien</p><p>- Melakukan Treatment Full terhadap kondisi pasien</p><p>- Menjaga dan memelihara lingkungan pasien</p><p>- Membantu proses pemulihan pasien</p><p>- Memberi edukasi dan pelatihan mandiri ke keluarga dan/atau penjaga pasien</p><p>- Memantau proses kegiatan pemulihan pasien</p><p>- Melakukan kolaborasi dengan dokter, keluarga dan/atau penjaga pasien</p><p>- Memberi pencacatan dan pelaporan kondisi pasien</p><p>- Bertanggung jawab dengan kondisi pasien</p>', 750000),
(29, 'Nurse Visite', '4x', '<p>- Melakukan pemeriksaan penuh terhadap pasien</p><p>- Melakukan Treatment Full terhadap kondisi pasien</p><p>- Menjaga dan memelihara lingkungan pasien</p><p>- Membantu proses pemulihan pasien</p><p>- Memberi edukasi dan pelatihan mandiri ke keluarga dan/atau penjaga pasien</p><p>- Memantau proses kegiatan pemulihan pasien</p><p>- Melakukan kolaborasi dengan dokter, keluarga dan/atau penjaga pasien</p><p>- Memberi pencacatan dan pelaporan kondisi pasien</p><p>- Bertanggung jawab dengan kondisi pasien</p>', 1400000),
(30, 'Nurse Visite', '8x', '<p>- Melakukan pemeriksaan penuh terhadap pasien</p><p>- Melakukan Treatment Full terhadap kondisi pasien</p><p>- Menjaga dan memelihara lingkungan pasien</p><p>- Membantu proses pemulihan pasien</p><p>- Memberi edukasi dan pelatihan mandiri ke keluarga dan/atau penjaga pasien</p><p>- Memantau proses kegiatan pemulihan pasien</p><p>- Melakukan kolaborasi dengan dokter, keluarga dan/atau penjaga pasien</p><p>- Memberi pencacatan dan pelaporan kondisi pasien</p><p>- Bertanggung jawab dengan kondisi pasien</p>', 2600000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profesi`
--

CREATE TABLE `profesi` (
  `id_profesi` int(11) NOT NULL,
  `nama_bagian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profesi`
--

INSERT INTO `profesi` (`id_profesi`, `nama_bagian`) VALUES
(1, 'Dokter'),
(2, 'Perawat'),
(3, 'Caregiver'),
(4, 'Bidan'),
(5, 'Fisioterapi'),
(6, 'Okupasi Terapi'),
(7, 'Terapi Wicara'),
(8, 'Akupuntur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa_alkes`
--

CREATE TABLE `sewa_alkes` (
  `id_sewa` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `no_invoice` varchar(20) NOT NULL,
  `status` char(1) NOT NULL,
  `date` date NOT NULL,
  `date_expired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sewa_alkes`
--

INSERT INTO `sewa_alkes` (`id_sewa`, `id_client`, `no_invoice`, `status`, `date`, `date_expired`) VALUES
(3, 3, 'NMK/20.0506001', '2', '2020-05-06', '2020-06-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa_ambulance`
--

CREATE TABLE `sewa_ambulance` (
  `id_sewa` int(11) NOT NULL,
  `id_ambulance` int(11) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `status_peminjaman` char(1) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sewa_ambulance`
--

INSERT INTO `sewa_ambulance` (`id_sewa`, `id_ambulance`, `harga`, `status_peminjaman`, `date`) VALUES
(2, 2, 'Rp. 500.000', '1', '2020-05-03'),
(4, 2, 'Rp. 500.000', '1', '2020-05-03'),
(5, 3, 'Rp. 500.000', '1', '2020-05-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `no_invoice` varchar(20) NOT NULL,
  `status` char(1) NOT NULL,
  `date` date NOT NULL,
  `date_expired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`id`, `id_client`, `no_invoice`, `status`, `date`, `date_expired`) VALUES
(14, 3, 'NMK/20.0504001', '2', '2020-05-04', '2020-05-11'),
(15, 3, 'NMK/20.0504002', '2', '2020-05-04', '2020-06-03'),
(18, 4, 'NMK/20.0505001', '1', '2020-05-05', '2020-06-04'),
(19, 3, 'NMK/20.0505002', '0', '2020-05-05', '2020-06-04'),
(20, 3, 'NMK/20.0505002', '0', '2020-05-05', '2020-05-12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alkes`
--
ALTER TABLE `alkes`
  ADD PRIMARY KEY (`id_alkes`);

--
-- Indeks untuk tabel `ambulance`
--
ALTER TABLE `ambulance`
  ADD PRIMARY KEY (`id_ambulance`);

--
-- Indeks untuk tabel `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id_auth`),
  ADD KEY `role` (`role`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indeks untuk tabel `detail_sewa`
--
ALTER TABLE `detail_sewa`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_sewa` (`id_sewa`);

--
-- Indeks untuk tabel `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id_employee`),
  ADD KEY `id_profesi` (`id_profesi`);

--
-- Indeks untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`),
  ADD KEY `id_transaction` (`id_transaction`);

--
-- Indeks untuk tabel `jasa_medis`
--
ALTER TABLE `jasa_medis`
  ADD PRIMARY KEY (`id_jasa`),
  ADD KEY `id_category` (`id_category`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `penunjang_medis`
--
ALTER TABLE `penunjang_medis`
  ADD PRIMARY KEY (`id_penunjang`);

--
-- Indeks untuk tabel `profesi`
--
ALTER TABLE `profesi`
  ADD PRIMARY KEY (`id_profesi`);

--
-- Indeks untuk tabel `sewa_alkes`
--
ALTER TABLE `sewa_alkes`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_client` (`id_client`);

--
-- Indeks untuk tabel `sewa_ambulance`
--
ALTER TABLE `sewa_ambulance`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_ambulance` (`id_ambulance`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alkes`
--
ALTER TABLE `alkes`
  MODIFY `id_alkes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ambulance`
--
ALTER TABLE `ambulance`
  MODIFY `id_ambulance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `auth`
--
ALTER TABLE `auth`
  MODIFY `id_auth` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `detail_sewa`
--
ALTER TABLE `detail_sewa`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `employees`
--
ALTER TABLE `employees`
  MODIFY `id_employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `jasa_medis`
--
ALTER TABLE `jasa_medis`
  MODIFY `id_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `penunjang_medis`
--
ALTER TABLE `penunjang_medis`
  MODIFY `id_penunjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `profesi`
--
ALTER TABLE `profesi`
  MODIFY `id_profesi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `sewa_alkes`
--
ALTER TABLE `sewa_alkes`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sewa_ambulance`
--
ALTER TABLE `sewa_ambulance`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth`
--
ALTER TABLE `auth`
  ADD CONSTRAINT `auth_ibfk_1` FOREIGN KEY (`role`) REFERENCES `hak_akses` (`id_role`);

--
-- Ketidakleluasaan untuk tabel `detail_sewa`
--
ALTER TABLE `detail_sewa`
  ADD CONSTRAINT `detail_sewa_ibfk_1` FOREIGN KEY (`id_sewa`) REFERENCES `sewa_alkes` (`id_sewa`);

--
-- Ketidakleluasaan untuk tabel `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`id_profesi`) REFERENCES `profesi` (`id_profesi`);

--
-- Ketidakleluasaan untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`id_transaction`) REFERENCES `transaction` (`id`);

--
-- Ketidakleluasaan untuk tabel `jasa_medis`
--
ALTER TABLE `jasa_medis`
  ADD CONSTRAINT `jasa_medis_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);

--
-- Ketidakleluasaan untuk tabel `sewa_alkes`
--
ALTER TABLE `sewa_alkes`
  ADD CONSTRAINT `sewa_alkes_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Ketidakleluasaan untuk tabel `sewa_ambulance`
--
ALTER TABLE `sewa_ambulance`
  ADD CONSTRAINT `sewa_ambulance_ibfk_1` FOREIGN KEY (`id_ambulance`) REFERENCES `ambulance` (`id_ambulance`);

--
-- Ketidakleluasaan untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
