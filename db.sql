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


-- Dumping database structure for project3
CREATE DATABASE IF NOT EXISTS `project3` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `project3`;

-- Dumping structure for table project3.divisi
CREATE TABLE IF NOT EXISTS `divisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL DEFAULT '0',
  `flag` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table project3.divisi: ~5 rows (approximately)
/*!40000 ALTER TABLE `divisi` DISABLE KEYS */;
INSERT INTO `divisi` (`id`, `nama`, `flag`) VALUES
	(1, 'Officer', 1),
	(2, 'Head Officer', 2),
	(3, 'Manager Umum', 3),
	(4, 'General Manager', 4),
	(5, 'Deputy General Manag', 4);
/*!40000 ALTER TABLE `divisi` ENABLE KEYS */;

-- Dumping structure for table project3.d_peminjaman
CREATE TABLE IF NOT EXISTS `d_peminjaman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_peminjaman` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `flag` tinyint(4) DEFAULT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `on_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_d_peminjaman` (`id_peminjaman`),
  CONSTRAINT `FK_d_peminjaman` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

-- Dumping data for table project3.d_peminjaman: ~4 rows (approximately)
/*!40000 ALTER TABLE `d_peminjaman` DISABLE KEYS */;
INSERT INTO `d_peminjaman` (`id`, `id_peminjaman`, `status`, `flag`, `id_karyawan`, `on_update`) VALUES
	(48, 35, 1, 2, 16, '2018-08-18 10:56:57'),
	(49, 35, 2, 3, 15, '2018-08-18 10:57:55'),
	(50, 35, NULL, 4, NULL, '2018-08-18 08:51:30'),
	(51, 36, NULL, 3, NULL, '2018-08-18 08:51:54'),
	(52, 36, NULL, 4, NULL, '2018-08-18 08:51:54');
/*!40000 ALTER TABLE `d_peminjaman` ENABLE KEYS */;

-- Dumping structure for table project3.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table project3.groups: ~3 rows (approximately)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `description`) VALUES
	(1, 'admin', 'Administrator'),
	(2, 'members', 'General User'),
	(3, 'superadmin', 'Super Admin');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Dumping structure for table project3.karyawan
CREATE TABLE IF NOT EXISTS `karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(10) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `nama_depan` varchar(10) NOT NULL,
  `nama_tengah` varchar(10) DEFAULT NULL,
  `nama_belakang` varchar(10) DEFAULT NULL,
  `tempat_lahir` varchar(15) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text,
  `tahun_masuk` year(4) DEFAULT NULL,
  `status` enum('kontrak','tetap') DEFAULT NULL,
  `lama_kontrak` int(11) NOT NULL,
  `divisi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `no_ktp` (`no_ktp`),
  UNIQUE KEY `nip` (`nip`),
  KEY `FK_KRY_DIV` (`divisi`),
  CONSTRAINT `FK_KRY_DIV` FOREIGN KEY (`divisi`) REFERENCES `divisi` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

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

-- Dumping structure for table project3.kendaraan
CREATE TABLE IF NOT EXISTS `kendaraan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_polisi` varchar(10) NOT NULL DEFAULT '0',
  `nama` varchar(10) NOT NULL DEFAULT '0',
  `warna` varchar(10) NOT NULL DEFAULT '0',
  `foto` varchar(100) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `no_polisi` (`no_polisi`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table project3.kendaraan: ~3 rows (approximately)
/*!40000 ALTER TABLE `kendaraan` DISABLE KEYS */;
INSERT INTO `kendaraan` (`id`, `no_polisi`, `nama`, `warna`, `foto`, `status`) VALUES
	(1, 'R-1089-TSU', 'Inova', 'Hitam', 'file_1517794709.png', '0'),
	(2, 'B-1090-TOP', 'Avanza', 'Silver', 'file_1517794669.jpg', '1'),
	(3, 'B-1091-TOP', 'Xenia', 'Silver', 'file_1517794568.jpg', '0'),
	(4, 'Z 1010 ASD', 'Xpander', 'Putih', 'file_1532572820.PNG', '0');
/*!40000 ALTER TABLE `kendaraan` ENABLE KEYS */;

-- Dumping structure for view project3.kry_available
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `kry_available` (
	`id` INT(11) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for table project3.login_attempts
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table project3.login_attempts: ~1 rows (approximately)
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
	(1, '192.168.43.1', 'gm@main.com', 1534556723);
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;

-- Dumping structure for table project3.peminjaman
CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `keterangan` text NOT NULL,
  `status_kembali` enum('0','1') NOT NULL DEFAULT '0',
  `id_kendaraan` int(11) NOT NULL,
  `id_peminjam` int(11) NOT NULL,
  `id_penyetuju` int(11) DEFAULT NULL,
  `on_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flag` tinyint(4) DEFAULT NULL,
  `reason` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_P_Peminjam` (`id_peminjam`),
  KEY `FK_P_Penyetuju` (`id_penyetuju`),
  KEY `FK_P_Kendaraan` (`id_kendaraan`),
  CONSTRAINT `FK_P_Kendaraan` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id`),
  CONSTRAINT `FK_P_Peminjam` FOREIGN KEY (`id_peminjam`) REFERENCES `karyawan` (`id`),
  CONSTRAINT `FK_P_Penyetuju` FOREIGN KEY (`id_penyetuju`) REFERENCES `karyawan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- Dumping data for table project3.peminjaman: ~2 rows (approximately)
/*!40000 ALTER TABLE `peminjaman` DISABLE KEYS */;
INSERT INTO `peminjaman` (`id`, `tgl_pinjam`, `tgl_kembali`, `keterangan`, `status_kembali`, `id_kendaraan`, `id_peminjam`, `id_penyetuju`, `on_update`, `flag`, `reason`) VALUES
	(35, '2018-08-20', '2018-08-25', 'Dinas Ke Bandung', '1', 1, 17, 15, '2018-08-18 10:57:55', 0, 'Di tolak'),
	(36, '2018-08-22', '2018-08-25', 'Raker Depok', '0', 2, 16, NULL, '2018-08-18 08:51:54', 3, NULL);
/*!40000 ALTER TABLE `peminjaman` ENABLE KEYS */;

-- Dumping structure for procedure project3.StatusList
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `StatusList`(IN flagParam INT(11))
BEGIN
     	 SELECT 	p.id, p.tgl_pinjam, p.tgl_kembali, p.keterangan, ke.no_polisi, ke.nama, ka.nama_depan, ka.nama_belakang, ku.nama_depan AS penyetuju
	      FROM peminjaman p
	INNER JOIN kendaraan ke
	        ON p.id_kendaraan = ke.id
	INNER JOIN karyawan ka
	        ON p.id_peminjam = ka.id
	LEFT JOIN karyawan ku
	        ON p.id_penyetuju = ku.id
	      WHERE flag = flagParam;
END//
DELIMITER ;

-- Dumping structure for table project3.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `update_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_USER_KRY` (`id_karyawan`),
  CONSTRAINT `FK_USER_KRY` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

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

-- Dumping structure for table project3.users_groups
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

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

-- Dumping structure for view project3.kry_available
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `kry_available`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kry_available` AS SELECT DISTINCT(karyawan.id)
FROM 		karyawan
INNER JOIN   divisi
ON          divisi.id = karyawan.divisi
LEFT JOIN 	peminjaman
ON 			karyawan.id = peminjaman.id_peminjam
WHERE 		peminjaman.id_peminjam IS NULL 
OR 			peminjaman.status_kembali = '1'
AND 			karyawan.id NOT IN (SELECT DISTINCT id_peminjam 
                                    FROM 		peminjaman 
                                    WHERE 	status_kembali = '0') ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
