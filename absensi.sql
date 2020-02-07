-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Feb 2020 pada 03.59
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.4

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

CREATE TABLE `access_name` (
  `access_id` int(11) NOT NULL,
  `display_name` varchar(100) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(120, 'Kelas Delete', 'Kelas-Delete', 'Hak Akses Kelas', 'Super Administrator', '2020-01-29 06:17:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_role`
--

CREATE TABLE `access_role` (
  `group_id` int(11) NOT NULL,
  `access_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `access_role`
--

INSERT INTO `access_role` (`group_id`, `access_id`) VALUES
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
(1, 109);

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_role_group`
--

CREATE TABLE `access_role_group` (
  `group_id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_by` varchar(250) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `modified_by` varchar(250) DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `access_role_group`
--

INSERT INTO `access_role_group` (`group_id`, `name`, `description`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, 'Super Administrator', 'Role Group Untuk Admin', 'Inject', '2019-10-24 05:23:00', 'Super Administrator', '2020-01-27 18:24:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_role_users`
--

CREATE TABLE `access_role_users` (
  `id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Struktur dari tabel `group_kelas`
--

CREATE TABLE `group_kelas` (
  `group_kelas_id` int(11) NOT NULL,
  `nama_group_kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `group_kelas`
--

INSERT INTO `group_kelas` (`group_kelas_id`, `nama_group_kelas`) VALUES
(1, '2010'),
(2, '2011'),
(3, '2012');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `NIGN` varchar(20) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `NUPTK` varchar(30) NOT NULL,
  `NPSN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `NIGN`, `nama`, `kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `NUPTK`, `NPSN`) VALUES
(0, '1978015', 'Joko Prasetyo', 'Laki-Laki', 'Yogyakarta', '1978-01-15', 'Kasihan, Bantul, Yogyakarta', '1978015', '1978015');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `tahun_ajaran` date NOT NULL,
  `kelas_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `tahun_ajaran`, `kelas_name`) VALUES
(1, '2020-01-01', 'A'),
(2, '2020-01-01', 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `Nis` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`Nis`, `nama`, `kelas_id`, `jenis_kelamin`, `agama`, `alamat`, `tanggal_lahir`, `tempat_lahir`, `foto`) VALUES
(2013014002, 'Chandra Susilo Subagyo', 1, 'Laki Bro', 'Islam', 'Patik, Pulung, POnonorogo, Jawa Timur, Indonesia, Bumi', '1996-11-24', 'Bumi', 'defoult.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL,
  `created_by` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modified_by` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_date`, `modified_date`, `created_by`, `modified_by`) VALUES
(1, 'Super Administrator', 'admin@admin.com', NULL, '$2y$10$jiIQfMKvjrNQHZHVFjOXC.RUrMo0cp.yuyEK7PzkBQ1fyE4q7mhkO', 'iSTtnlpmTC9YsrLllkWUqUu6eIz34G0QBIdQwP2nLz19day3IEAMLrdctrLn', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(2, 'Miftahul Yaum', 'yaum@gmail.com', NULL, '$2y$10$28uXe8b6aVXtM14uPlJwNe9wO77/FbLCqnGU6RdeqjpkmhGL1yJ0W', NULL, '2019-12-03 12:05:21', NULL, 'Super Administrator', NULL),
(3, 'Test User', 'admin@test.com', NULL, '$2y$10$jiIQfMKvjrNQHZHVFjOXC.RUrMo0cp.yuyEK7PzkBQ1fyE4q7mhkO', NULL, '2019-12-15 08:02:05', NULL, 'Super Administrator', NULL),
(4, 'Irna Setiyanningrum', 'irnasetiya123@gmail.com', NULL, '$2y$10$6JCIQT4Aqsk0KU8CxCzJs.7ThxvugM2.mFyllBX5rKQWIJWAQozZu', NULL, '2019-12-15 08:14:48', NULL, 'Super Administrator', NULL),
(5, 'cde', 'cde@email.com', NULL, '$2y$10$U3fOTJ0ViWbEE72S4N8c..zpcugbM3nicpB0KCi16rQkIWZUiRgH6', NULL, '2019-12-15 17:02:28', NULL, 'Super Administrator', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `access_name`
--
ALTER TABLE `access_name`
  ADD PRIMARY KEY (`access_id`);

--
-- Indeks untuk tabel `access_role_group`
--
ALTER TABLE `access_role_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indeks untuk tabel `access_role_users`
--
ALTER TABLE `access_role_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access_role_users_access_role_group_id_group_fk` (`group_id`);

--
-- Indeks untuk tabel `group_kelas`
--
ALTER TABLE `group_kelas`
  ADD PRIMARY KEY (`group_kelas_id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`Nis`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `access_name`
--
ALTER TABLE `access_name`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT untuk tabel `access_role_group`
--
ALTER TABLE `access_role_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `access_role_users`
--
ALTER TABLE `access_role_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
