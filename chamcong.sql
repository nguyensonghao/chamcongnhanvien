-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 21 Février 2016 à 16:36
-- Version du serveur :  5.6.26
-- Version de PHP :  5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `chamcong`
--

-- --------------------------------------------------------

--
-- Structure de la table `db_level`
--

CREATE TABLE IF NOT EXISTS `db_level` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Bảng danh sách các mức độ đánh giá công việc';

--
-- Contenu de la table `db_level`
--

INSERT INTO `db_level` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Chưa làm', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Làm sơ sài', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Chưa hoàn thành', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Đã có kết quả', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Hoàn thành', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Hoàn thành tốt', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'fdfdfd', '2016-02-17 03:18:34', '2016-02-17 03:18:34'),
(10, 'fdfdfd', '2016-02-17 03:18:59', '2016-02-17 03:18:59');

-- --------------------------------------------------------

--
-- Structure de la table `db_positions`
--

CREATE TABLE IF NOT EXISTS `db_positions` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `db_positions`
--

INSERT INTO `db_positions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Lập trình viên\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Kiểm thử viên', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Nhân viên kiểm soát chất lượng', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Quản lý', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `db_timekeeps`
--

CREATE TABLE IF NOT EXISTS `db_timekeeps` (
  `id` int(10) unsigned NOT NULL,
  `userId` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateCurrent` date NOT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `db_timekeeps`
--

INSERT INTO `db_timekeeps` (`id`, `userId`, `type`, `status`, `dateCurrent`, `time`, `created_at`, `updated_at`) VALUES
(15, 2, 0, '', '2015-12-02', '08:00', '2015-12-02 09:25:07', '2015-12-02 09:25:07'),
(16, 2, 1, '', '2015-12-02', '18:30', '2015-12-02 09:26:01', '2015-12-02 09:26:01'),
(17, 5, 0, '', '2015-12-03', '08:00', '2015-12-03 06:24:46', '2015-12-03 06:24:46'),
(18, 5, 1, '', '2015-12-03', '18:35', '2015-12-03 06:25:23', '2015-12-03 06:25:23'),
(19, 4, 0, '', '2015-12-04', '08:00', '2015-12-03 21:32:37', '2015-12-03 21:32:37');

-- --------------------------------------------------------

--
-- Structure de la table `db_works`
--

CREATE TABLE IF NOT EXISTS `db_works` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userId` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `noteRate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dateStart` date NOT NULL,
  `dateEnd` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `db_works`
--

INSERT INTO `db_works` (`id`, `name`, `note`, `userId`, `status`, `level`, `noteRate`, `created_at`, `updated_at`, `dateStart`, `dateEnd`) VALUES
(6, 'Hoàn thành module thanh toán cho khách hàng', 'Trong vào ngày 22/11/2015 phải hoàn thành xong module này. ', 5, 1, 0, '', '2015-11-27 08:27:49', '2015-11-27 08:27:49', '2015-11-27', '0000-00-00'),
(7, 'Kiểm tra tiến độ công việc của từng nhóm', 'Thường xuyên đôn đốc nhân viên', 2, 2, 8, 'Hoàn thành rất tốt công việc này', '2015-11-27 08:28:38', '2015-12-03 21:32:23', '2015-11-27', '0000-00-00'),
(13, 'Push code lên git', 'Push code lên git đề phòng rủi ro', 5, 1, 0, '', '2015-12-02 09:19:59', '2015-12-02 09:19:59', '2015-12-02', '0000-00-00'),
(14, 'Phô tô tài liệu báo cáo', 'Phô tô tài liệu để tiện báo cáo', 3, 2, 8, 'Hoàn thành công việc rất tốt', '2015-12-03 06:19:42', '2015-12-03 06:23:57', '2015-12-03', '0000-00-00'),
(15, 'Code module thanh toán cho website', 'Tích hợp ngân lượng cho phần thanh toán của website', 2, 1, 0, '', '2015-12-03 06:20:20', '2015-12-03 06:20:20', '2015-12-03', '0000-00-00'),
(16, 'Thêm công việc hiện tại', 'Chi tiết thêm công việc', -1, 0, 0, '', '2015-12-03 21:31:15', '2015-12-03 21:31:57', '2015-12-04', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_10_12_173941_create_users', 1),
('2015_11_10_152342_create_users_table', 1),
('2015_11_18_172927_create_db_works', 2),
('2015_11_18_173239_create_db_level', 3),
('2015_11_18_173423_create_db_timekeeps', 4),
('2015_11_20_151526_create_db_positions', 5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `token` int(11) NOT NULL,
  `lock` int(11) NOT NULL,
  `password2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `position` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Bảng người dùng bao gồm nhân viên và quản lí';

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `email`, `remember_token`, `status`, `token`, `lock`, `password2`, `created_at`, `updated_at`, `position`) VALUES
(1, 'admin', '$2y$10$kwaA4FbzrEmxuv6CdVgUXOehuAthq4yakJvVzwVXn9w9uYFDLZg8q', 'admin', 'admin@gmail.com', 'NWCwpW3VbieJsq7khM1KQF8OvwQCpx3tnCTNea9Ggwoncr25TccwCWCuVvSA', 0, 1, 0, '$2y$10$r5tguT77Tt3x/0v.WVnvo.DWWurMkfgk7MP7at1qx2ddwLmK4FADe', '2015-11-10 08:29:04', '2015-12-02 09:17:09', 0),
(2, 'nguyensonghao', '$2y$10$2F.jilHJm5LH1JeS9B9p6OMRAtqU3Kac3EaM0DfKpWjjUIQuIAQd2', 'Nguyễn Song Hào', 'nguyensonghao@gmail.com', '', 0, 0, 0, '', '2015-11-10 17:57:35', '2015-11-22 05:51:20', 2),
(3, 'tungnguyenxuan', '$2y$10$bnStA8jng0B0u0sgtWnw/u0w0fqsPltBjsEVizgurV1TtYctfEA6u', 'Nguyễn Xuân Tùng', 'nguyenxuantung@gmail.com', '', 0, 0, 0, '', '2015-11-15 02:32:26', '2015-11-15 02:32:26', 3),
(4, 'luuduccuong', '$2y$10$VfVoqKAT9UDVWul/0dsKe.k2vZJ1GZK3NuAyTLZopTuOFUkH0iGEm', 'Lưu Đức Cương', 'luuduccuong@gmail.com', '', 0, 0, 0, '', '2015-11-15 23:30:31', '2015-11-15 23:30:31', 4),
(5, 'nguyentienvu', '$2y$10$vXJpmYtn5vvZfheaSEpmtun8XGKuB2FVauBT/8z7ur/LjUfAn4bGC', 'Nguyễn Tiếng Vũ', 'nguyentienvu94@gmail.com', '', 0, 0, 0, '', '2015-11-20 10:16:37', '2015-11-20 10:16:37', 5);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `db_level`
--
ALTER TABLE `db_level`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `db_positions`
--
ALTER TABLE `db_positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `db_timekeeps`
--
ALTER TABLE `db_timekeeps`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `db_works`
--
ALTER TABLE `db_works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `db_level`
--
ALTER TABLE `db_level`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `db_positions`
--
ALTER TABLE `db_positions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `db_timekeeps`
--
ALTER TABLE `db_timekeeps`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `db_works`
--
ALTER TABLE `db_works`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
