-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 24 Feb 2020 pada 08.45
-- Versi server: 5.7.26
-- Versi PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_name`
--

DROP TABLE IF EXISTS `access_name`;
CREATE TABLE IF NOT EXISTS `access_name` (
  `access_id` int(11) NOT NULL AUTO_INCREMENT,
  `display_name` varchar(100) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`access_id`)
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `access_name`
--

INSERT INTO `access_name` (`access_id`, `display_name`, `name`, `description`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 'Role', 'Role-View', NULL, 'Inject', NULL, NULL, NULL),
(2, 'Role Add', 'Role-Add', NULL, NULL, NULL, NULL, NULL),
(3, 'Role Edit', 'Role-Edit', NULL, NULL, NULL, NULL, NULL),
(4, 'Role Delete', 'Role-Delete', NULL, NULL, NULL, NULL, NULL),
(5, 'User', 'User-View', NULL, NULL, NULL, NULL, NULL),
(6, 'User Add', 'User-Add', NULL, NULL, NULL, NULL, NULL),
(7, 'User Edit', 'User-Edit', NULL, NULL, NULL, NULL, NULL),
(8, 'User Delete', 'User-Delete', NULL, NULL, NULL, NULL, NULL),
(9, 'Permission', 'Permission-View', NULL, NULL, NULL, NULL, NULL),
(10, 'Permission Add', 'Permission-Add', NULL, NULL, NULL, NULL, NULL),
(11, 'Permission Edit', 'Permission-Edit', NULL, NULL, NULL, NULL, NULL),
(12, 'Permission Delete', 'Permission-Delete', NULL, NULL, NULL, 'Super Administrator', '2020-01-07 07:19:01'),
(109, 'Siswa View', 'Siswa-View', 'Hak Akses Siswa', 'Super Administrator', '2020-01-28 04:43:55', NULL, NULL),
(110, 'Siswa Add', 'Siswa-Add', 'Hak Akses Siswa', 'Super Administrator', '2020-01-28 04:43:55', NULL, NULL),
(111, 'Siswa Edit', 'Siswa-Edit', 'Hak Akses Siswa', 'Super Administrator', '2020-01-28 04:43:55', NULL, NULL),
(112, 'Siswa Delete', 'Siswa-Delete', 'Hak Akses Siswa', 'Super Administrator', '2020-01-28 04:43:55', NULL, NULL),
(113, 'Guru View', 'Guru-View', 'Hak Akses Guru', 'Super Administrator', '2020-01-29 04:27:09', NULL, NULL),
(114, 'Guru Add', 'Guru-Add', 'Hak Akses Guru', 'Super Administrator', '2020-01-29 04:27:09', NULL, NULL),
(115, 'Guru Edit', 'Guru-Edit', 'Hak Akses Guru', 'Super Administrator', '2020-01-29 04:27:09', NULL, NULL),
(116, 'Guru Delete', 'Guru-Delete', 'Hak Akses Guru', 'Super Administrator', '2020-01-29 04:27:09', NULL, NULL),
(117, 'Kelas View', 'Kelas-View', 'Hak Akses Kelas', 'Super Administrator', '2020-01-29 06:17:48', NULL, NULL),
(118, 'Kelas Add', 'Kelas-Add', 'Hak Akses Kelas', 'Super Administrator', '2020-01-29 06:17:48', NULL, NULL),
(119, 'Kelas Edit', 'Kelas-Edit', 'Hak Akses Kelas', 'Super Administrator', '2020-01-29 06:17:48', NULL, NULL),
(120, 'Kelas Delete', 'Kelas-Delete', 'Hak Akses Kelas', 'Super Administrator', '2020-01-29 06:17:48', NULL, NULL),
(121, 'Tahun View', 'Tahun-View', 'Hak Akses Tahun', 'Super Administrator', '2020-02-20 05:12:16', NULL, NULL),
(122, 'Tahun Add', 'Tahun-Add', 'Hak Akses Tahun', 'Super Administrator', '2020-02-20 05:12:16', NULL, NULL),
(123, 'Tahun Edit', 'Tahun-Edit', 'Hak Akses Tahun', 'Super Administrator', '2020-02-20 05:12:16', NULL, NULL),
(124, 'Tahun Delete', 'Tahun-Delete', 'Hak Akses Tahun', 'Super Administrator', '2020-02-20 05:12:16', NULL, NULL),
(125, 'Absensi View', 'Absensi-View', 'Hak Akses Untuk Absensi', 'Super Administrator', '2020-02-24 03:14:42', NULL, NULL),
(126, 'Absensi Add', 'Absensi-Add', 'Hak Akses Untuk Absensi', 'Super Administrator', '2020-02-24 03:14:42', NULL, NULL),
(127, 'Absensi Edit', 'Absensi-Edit', 'Hak Akses Untuk Absensi', 'Super Administrator', '2020-02-24 03:14:42', NULL, NULL),
(128, 'Absensi Delete', 'Absensi-Delete', 'Hak Akses Untuk Absensi', 'Super Administrator', '2020-02-24 03:14:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_role`
--

DROP TABLE IF EXISTS `access_role`;
CREATE TABLE IF NOT EXISTS `access_role` (
  `group_id` int(11) NOT NULL,
  `access_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `access_role`
--

INSERT INTO `access_role` (`group_id`, `access_id`) VALUES
(1, 125),
(1, 124),
(1, 123),
(1, 122),
(1, 121),
(1, 120),
(1, 119),
(1, 118),
(1, 117),
(1, 116),
(1, 115),
(1, 114),
(1, 113),
(1, 112),
(1, 111),
(1, 110),
(1, 109),
(1, 8),
(1, 7),
(1, 6),
(1, 5),
(1, 4),
(1, 3),
(1, 2),
(1, 1),
(1, 12),
(1, 11),
(1, 10),
(1, 9),
(1, 126);

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_role_group`
--

DROP TABLE IF EXISTS `access_role_group`;
CREATE TABLE IF NOT EXISTS `access_role_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_by` varchar(250) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `modified_by` varchar(250) DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `access_role_group`
--

INSERT INTO `access_role_group` (`group_id`, `name`, `description`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 'Super Administrator', 'Role Group Untuk Admin', 'Inject', '2019-10-24 05:23:00', 'Super Administrator', '2020-02-24 03:27:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_role_users`
--

DROP TABLE IF EXISTS `access_role_users`;
CREATE TABLE IF NOT EXISTS `access_role_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `access_role_users_access_role_group_id_group_fk` (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `access_role_users`
--

INSERT INTO `access_role_users` (`id`, `group_id`, `users_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 4),
(5, 4, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_hadir`
--

DROP TABLE IF EXISTS `daftar_hadir`;
CREATE TABLE IF NOT EXISTS `daftar_hadir` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Nis` int(10) NOT NULL,
  `status` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `petugas` varchar(255) NOT NULL,
  `tanggal_absen` date NOT NULL,
  `jam_absen` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftar_hadir`
--

INSERT INTO `daftar_hadir` (`id`, `Nis`, `status`, `keterangan`, `petugas`, `tanggal_absen`, `jam_absen`) VALUES
(1, 2019201106, '2', 'sakit', 'Super Administrator', '2020-02-24', '00:00:00'),
(2, 2019201105, '1', 'hadir', 'Super Administrator', '2020-02-24', '00:00:00'),
(3, 2019201104, '1', 'hadir', 'Super Administrator', '2020-02-23', '00:00:00'),
(4, 2019201103, '1', 'hadir', 'Super Administrator', '2020-02-24', '12:00:55'),
(5, 2019201104, '2', 'tanpa keterangan', 'Super Administrator', '2020-02-24', '12:22:22'),
(6, 2019201102, '2', 'tl', 'Super Administrator', '2020-02-24', '12:22:30'),
(7, 2019201101, '2', 'izin', 'Super Administrator', '2020-02-24', '12:22:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `group_kelas`
--

DROP TABLE IF EXISTS `group_kelas`;
CREATE TABLE IF NOT EXISTS `group_kelas` (
  `group_kelas_id` int(11) NOT NULL,
  `nama_group_kelas` varchar(20) NOT NULL,
  PRIMARY KEY (`group_kelas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `group_kelas`
--

INSERT INTO `group_kelas` (`group_kelas_id`, `nama_group_kelas`) VALUES
(1, 'X'),
(2, 'XI'),
(3, 'XII');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

DROP TABLE IF EXISTS `guru`;
CREATE TABLE IF NOT EXISTS `guru` (
  `NIGN` int(20) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `kelamin` varchar(20) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `NUPTK` int(30) NOT NULL,
  `NPSN` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`NIGN`, `nama`, `kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `NUPTK`, `NPSN`) VALUES
(1978015, 'Joko Prasetyo', 'Laki-Laki', '', 'Yogyakarta', '1978-01-15', 'Kasihan, Bantul, Yogyakarta', 1978015, 1978015),
(222222222, 'chandra', 'laki-Laki', 'Islam', 'Ponorogo', '1996-02-02', 'Yogyakarta', 333333, 4444444);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

DROP TABLE IF EXISTS `kelas`;
CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `group_kelas_id` int(11) NOT NULL,
  `tahunajaran_id` int(10) NOT NULL,
  `kelas_name` varchar(10) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `group_kelas_id`, `tahunajaran_id`, `kelas_name`) VALUES
(1, 1, 13, 'D'),
(3, 1, 13, 'A'),
(4, 1, 13, 'C'),
(5, 1, 13, 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

DROP TABLE IF EXISTS `siswa`;
CREATE TABLE IF NOT EXISTS `siswa` (
  `Nis` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`Nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`Nis`, `nama`, `kelas_id`, `jenis_kelamin`, `agama`, `alamat`, `tanggal_lahir`, `tempat_lahir`, `foto`) VALUES
(2019201101, 'REFKY SATRIA BIMA', 1, 'laki-laki', 'Islam', 'GODEAN', '1997-10-29', 'METRO', 'foto.jpg'),
(2019201102, 'Dani Prasetya', 1, 'laki-laki', 'Islam', 'Jakarta', '2000-10-20', 'METRO', 'foto.jpg'),
(2019201103, 'Indah Nurlita', 1, 'perempuan', 'Islam', 'Yogyakarta', '2001-03-20', 'METRO', 'foto.jpg'),
(2019201104, 'Siti Anisa', 1, 'laki-laki', 'Islam', 'Godean', '2001-07-04', 'METRO', 'foto.jpg'),
(2019201105, 'Edo Prasetys', 1, 'laki-laki', 'Islam', 'Jakarta', '2002-05-01', 'METRO', 'foto.jpg'),
(2019201106, 'Ahmad Mutaqin', 3, 'laki-laki', 'Islam', 'Yogyakarta', '2002-07-17', 'Solo', 'foto.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahunajaran`
--

DROP TABLE IF EXISTS `tahunajaran`;
CREATE TABLE IF NOT EXISTS `tahunajaran` (
  `tahun_id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(10) NOT NULL,
  PRIMARY KEY (`tahun_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tahunajaran`
--

INSERT INTO `tahunajaran` (`tahun_id`, `tahun`) VALUES
(1, '2001'),
(2, '2002'),
(3, '2003'),
(4, '2004'),
(5, '2005'),
(6, '2006'),
(7, '2007'),
(8, '2008'),
(9, '2009'),
(10, '2010'),
(11, '2011'),
(12, '2012'),
(13, '2013'),
(14, '2014'),
(15, '2015'),
(16, '2016'),
(17, '2017'),
(18, '2018'),
(19, '2019'),
(20, '2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL,
  `created_by` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_date`, `modified_date`, `created_by`, `modified_by`) VALUES
(1, 'Super Administrator', 'admin@admin.com', NULL, '$2y$10$jiIQfMKvjrNQHZHVFjOXC.RUrMo0cp.yuyEK7PzkBQ1fyE4q7mhkO', 'iSTtnlpmTC9YsrLllkWUqUu6eIz34G0QBIdQwP2nLz19day3IEAMLrdctrLn', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(2, 'Miftahul Yaum', 'yaum@gmail.com', NULL, '$2y$10$28uXe8b6aVXtM14uPlJwNe9wO77/FbLCqnGU6RdeqjpkmhGL1yJ0W', NULL, '2019-12-03 12:05:21', NULL, 'Super Administrator', NULL),
(3, 'Test User', 'admin@test.com', NULL, '$2y$10$jiIQfMKvjrNQHZHVFjOXC.RUrMo0cp.yuyEK7PzkBQ1fyE4q7mhkO', NULL, '2019-12-15 08:02:05', NULL, 'Super Administrator', NULL),
(4, 'Irna Setiyanningrum', 'irnasetiya123@gmail.com', NULL, '$2y$10$6JCIQT4Aqsk0KU8CxCzJs.7ThxvugM2.mFyllBX5rKQWIJWAQozZu', NULL, '2019-12-15 08:14:48', NULL, 'Super Administrator', NULL),
(5, 'cde', 'cde@email.com', NULL, '$2y$10$U3fOTJ0ViWbEE72S4N8c..zpcugbM3nicpB0KCi16rQkIWZUiRgH6', NULL, '2019-12-15 17:02:28', NULL, 'Super Administrator', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
