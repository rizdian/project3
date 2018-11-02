-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.33-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping data for table project3.divisi: ~5 rows (approximately)
/*!40000 ALTER TABLE `divisi` DISABLE KEYS */;
INSERT INTO `divisi` (`id`, `nama`, `flag`) VALUES
	(1, 'Officer', 1),
	(2, 'Head Officer', 2),
	(3, 'Manager Umum', 3),
	(4, 'General Manager', 4),
	(5, 'Deputy General Manag', 4);
/*!40000 ALTER TABLE `divisi` ENABLE KEYS */;

-- Dumping data for table project3.d_peminjaman: ~4 rows (approximately)
/*!40000 ALTER TABLE `d_peminjaman` DISABLE KEYS */;
INSERT INTO `d_peminjaman` (`id`, `id_peminjaman`, `status`, `flag`, `id_karyawan`, `on_update`) VALUES
	(48, 35, 1, 2, 16, '2018-08-18 10:56:57'),
	(49, 35, 2, 3, 15, '2018-08-18 10:57:55'),
	(50, 35, NULL, 4, NULL, '2018-08-18 08:51:30'),
	(51, 36, NULL, 3, NULL, '2018-08-18 08:51:54'),
	(52, 36, NULL, 4, NULL, '2018-08-18 08:51:54');
/*!40000 ALTER TABLE `d_peminjaman` ENABLE KEYS */;

-- Dumping data for table project3.groups: ~3 rows (approximately)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `description`) VALUES
	(1, 'admin', 'Administrator'),
	(2, 'members', 'General User'),
	(3, 'superadmin', 'Super Admin');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Dumping data for table project3.karyawan: ~6 rows (approximately)
/*!40000 ALTER TABLE `karyawan` DISABLE KEYS */;
INSERT INTO `karyawan` (`id`, `nip`, `no_ktp`, `nama_depan`, `nama_tengah`, `nama_belakang`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `tahun_masuk`, `status`, `lama_kontrak`, `divisi`) VALUES
	(13, '17-12-3-01', '4758125', 'Rizdian', 'Dinata', 'As-sabar', 'Depok', '2010-01-01', 'Jalan Lngast', '2017', 'tetap', 0, 5),
	(14, '17-12-3-02', '78945689', 'Muhammad', '', 'Randi', 'Bogor', '2017-12-01', 'asdasd', '2017', 'tetap', 0, 4),
	(15, '17-12-3-03', '123456789', 'Muhammad', 'Lutfi', 'Fahreza', 'Bogor', '2017-12-01', 'AsdAsd1', '2017', 'kontrak', 5, 3),
	(16, '17-12-3-04', '123456789123', 'Rosid', 'Tes', 'Tes2', 'Bogor', '2017-12-01', 'Goo', '2017', 'kontrak', 3, 2),
	(17, '17-12-3-05', '132456789456', 'yusuf', '', 'Maulana', 'Bogor', '2017-12-01', 'Jalan Bogor Rakja', '2017', 'kontrak', 1, 1),
	(18, '46789132', '98765431', 'Hizaz', 'Ahamd', 'Zaelani', 'Jakarta', '2018-01-01', 'asdfghjkl', '2017', 'tetap', 0, 4),
	(19, '020105', '4578946321', 'Lutfi', '-', 'M', 'Depok', '1899-11-22', 'Depok Raya', '2018', 'tetap', 0, 3);
/*!40000 ALTER TABLE `karyawan` ENABLE KEYS */;

-- Dumping data for table project3.kendaraan: ~3 rows (approximately)
/*!40000 ALTER TABLE `kendaraan` DISABLE KEYS */;
INSERT INTO `kendaraan` (`id`, `no_polisi`, `nama`, `warna`, `foto`, `status`) VALUES
	(1, 'R-1089-TSU', 'Inova', 'Hitam', 'file_1517794709.png', '0'),
	(2, 'B-1090-TOP', 'Avanza', 'Silver', 'file_1517794669.jpg', '1'),
	(3, 'B-1091-TOP', 'Xenia', 'Silver', 'file_1517794568.jpg', '0'),
	(4, 'Z 1010 ASD', 'Xpander', 'Putih', 'file_1532572820.PNG', '0');
/*!40000 ALTER TABLE `kendaraan` ENABLE KEYS */;

-- Dumping data for table project3.login_attempts: ~1 rows (approximately)
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
	(1, '192.168.43.1', 'gm@main.com', 1534556723);
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;

-- Dumping data for table project3.peminjaman: ~2 rows (approximately)
/*!40000 ALTER TABLE `peminjaman` DISABLE KEYS */;
INSERT INTO `peminjaman` (`id`, `tgl_pinjam`, `tgl_kembali`, `keterangan`, `status_kembali`, `id_kendaraan`, `id_peminjam`, `id_penyetuju`, `on_update`, `flag`, `reason`) VALUES
	(35, '2018-08-20', '2018-08-25', 'Dinas Ke Bandung', '1', 1, 17, 15, '2018-08-18 10:57:55', 0, 'Di tolak'),
	(36, '2018-08-22', '2018-08-25', 'Raker Depok', '0', 2, 16, NULL, '2018-08-18 08:51:54', 3, NULL);
/*!40000 ALTER TABLE `peminjaman` ENABLE KEYS */;

-- Dumping data for table project3.users: ~8 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `id_karyawan`, `update_on`) VALUES
	(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1534556998, 1, 'Admin', 'istrator', 'ADMIN', '0', NULL, '2017-12-21 05:10:36'),
	(7, '::1', 'officer@mail.com', '$2y$08$iSrioKsADqPGRnPQKU2SrOlL9OBgoYSj8W/hfaigoYxcaGZa4I6qq', NULL, 'officer@mail.com', NULL, NULL, NULL, NULL, 1514364582, 1534557069, 1, 'yusuf', 'Maulana', NULL, NULL, 17, NULL),
	(8, '::1', 'headofficer@mail.com', '$2y$08$cu8nbYd/bIpzqiBVW2iTHOdF6X8QoF9I0Oi8lClnDkWx7Ql3immrS', NULL, 'headofficer@mail.com', NULL, NULL, NULL, NULL, 1514364609, 1534564571, 1, 'Rosid', 'Tes2', NULL, NULL, 16, '2017-12-27 09:53:01'),
	(10, '::1', 'managerumum@mail.com', '$2y$08$gqz2QSmmy7KLgVaa4RY/9.A55bjurUUBHyQxOFpsYZQ2dyS4Fzk1.', NULL, 'managerumum@mail.com', NULL, NULL, NULL, NULL, 1514364722, 1534564629, 1, 'Muhammad', 'Fahreza', NULL, NULL, 15, '2017-12-27 09:53:07'),
	(11, '::1', 'gm@mail.com', '$2y$08$OfopqEBIdhX6P38s12jlkuDX2VtsucVKAtt8Bmebm34kmGwDED5SW', NULL, 'gm@mail.com', NULL, NULL, NULL, NULL, 1514364739, 1534564687, 1, 'Muhammad', 'Randi', NULL, NULL, 14, '2017-12-27 09:53:12'),
	(12, '::1', 'depgm@mail.com', '$2y$08$TDq332LzQZ0mNH62KEHTEOFYsYFNpAU/5RJlmGPW2zqqJKJfYX/dy', NULL, 'depgm@mail.com', NULL, NULL, NULL, NULL, 1514364759, NULL, 1, 'Rizdian', 'As-sabar', NULL, NULL, 13, '2017-12-27 09:53:17'),
	(13, '::1', 'hizaz@mail.com', '$2y$08$wv0l6jYXc0BxWimU0TOxTOTU1aA04CPJ2Vm6QbreB7TNLdvyMdZkO', NULL, 'hizaz@mail.com', NULL, NULL, NULL, NULL, 1532572776, NULL, 1, 'Hizaz', 'Zaelani', NULL, NULL, 18, '2018-07-26 04:39:54'),
	(14, '::1', 'lutfi@mail.com', '$2y$08$tRk4WMRfewVFGa1iQ/RWSOvEEJOdDt1geAH8J4gxHbjio.Q.RwKWm', NULL, 'lutfi@mail.com', NULL, NULL, NULL, NULL, 1532573111, NULL, 1, 'Lutfi', 'M', NULL, NULL, 19, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping data for table project3.users_groups: ~8 rows (approximately)
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
	(16, 1, 1),
	(17, 1, 2),
	(18, 1, 3),
	(27, 7, 2),
	(33, 8, 1),
	(34, 10, 1),
	(35, 11, 1),
	(36, 12, 1),
	(38, 13, 1),
	(39, 14, 2);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
