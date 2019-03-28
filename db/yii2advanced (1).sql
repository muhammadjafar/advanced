-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 28 Mar 2019 pada 06.56
-- Versi Server: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2advanced`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `ID` char(5) NOT NULL,
  `Nama` varchar(10) DEFAULT NULL,
  `Satuan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`ID`, `Nama`, `Satuan`) VALUES
('101', 'Kemeja', 'Helai'),
('102', 'Celana', 'Helai'),
('103', 'Kaos', 'Helai'),
('201', 'Meja', 'Buah'),
('202', 'Kursi', 'Buah'),
('203', 'Buku', 'Buah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_email` varchar(250) NOT NULL,
  `company_address` varchar(250) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `company_start_date` date NOT NULL,
  `company_created_date` datetime NOT NULL,
  `company_status` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `companies`
--

INSERT INTO `companies` (`company_id`, `company_name`, `company_email`, `company_address`, `logo`, `company_start_date`, `company_created_date`, `company_status`) VALUES
(1, 'Dita', 'dita@gmail.com', 'kahuripan', '', '2019-03-14', '2019-03-21 12:17:17', 'active'),
(2, 'fikri', 'fikrirbb@gmail.com', 'bangil', '', '2019-03-20', '2019-03-27 06:16:17', 'active'),
(3, 'jafar', 'jafar@gmail.com', 'jember', '', '2019-03-11', '2019-03-19 10:25:25', 'active'),
(4, 'yosi', 'yosi@gmail.com', 'sidoarjo', '', '2019-03-10', '2019-03-31 07:20:21', 'active'),
(5, 'rama', 'rama@gmail.com', 'jember', '', '2019-03-19', '2019-03-21 12:34:44', 'active'),
(6, 'angga', 'angga@gmail.com', 'jogja', '', '2019-03-10', '2019-03-25 13:35:35', 'active'),
(7, 'lala', 'lala@gmail.com', 'hahaha', 'uploads/lala.jpg', '2019-03-06', '2019-03-08 09:03:49', 'active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daf_buku`
--

CREATE TABLE IF NOT EXISTS `daf_buku` (
  `buku_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tahun_terbit` year(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daf_buku`
--

INSERT INTO `daf_buku` (`buku_id`, `kategori_id`, `judul`, `pengarang`, `foto`, `tahun_terbit`) VALUES
(1, 1, 'belajar yii2', 'dita', '', 2018),
(2, 3, 'halo hai', 'lulu', '', 2017);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dat_kategori_buku`
--

CREATE TABLE IF NOT EXISTS `dat_kategori_buku` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dat_kategori_buku`
--

INSERT INTO `dat_kategori_buku` (`id`, `nama`) VALUES
(1, 'ilmiah'),
(2, 'fiksi'),
(3, 'romance'),
(4, 'haha'),
(5, 'hahaha');

-- --------------------------------------------------------

--
-- Struktur dari tabel `house`
--

CREATE TABLE IF NOT EXISTS `house` (
  `id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1551775021),
('m130524_201442_init', 1551775034);

-- --------------------------------------------------------

--
-- Struktur dari tabel `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `id` int(11) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `polls`
--

CREATE TABLE IF NOT EXISTS `polls` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `polls`
--

INSERT INTO `polls` (`id`, `judul`, `question`) VALUES
(12, 'polling sleman', 'apakah penataan kota nya bagus?'),
(13, 'polling twitter', 'apakah kamu suka twitter?'),
(15, 'polling saja', 'apakah website ini membnatu?'),
(19, 'polling tanggapan kota', 'apakah kota x sudah teratur lalu lintasnya?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `polls_answer`
--

CREATE TABLE IF NOT EXISTS `polls_answer` (
  `id` int(11) NOT NULL,
  `id_poll` int(11) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `polls_answer`
--

INSERT INTO `polls_answer` (`id`, `id_poll`, `answer`) VALUES
(3, 12, 'sangat bagus'),
(4, 12, 'bagus'),
(5, 12, 'tidak bagus'),
(6, 12, 'sangat tidak bagus'),
(7, 13, 'yes'),
(8, 13, 'no'),
(11, 15, 'yes'),
(12, 15, 'no'),
(18, 15, 'maybe'),
(19, 15, 'almost'),
(20, 15, 'look'),
(26, 19, 'sudah'),
(27, 19, 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `polls_cookies`
--

CREATE TABLE IF NOT EXISTS `polls_cookies` (
  `id` int(11) NOT NULL,
  `id_poll` int(11) NOT NULL,
  `cookies` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `polls_cookies`
--

INSERT INTO `polls_cookies` (`id`, `id_poll`, `cookies`) VALUES
(16, 19, 'ebpsuu892g8rj1o06cqnm7cu56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `polls_result`
--

CREATE TABLE IF NOT EXISTS `polls_result` (
  `id` int(11) NOT NULL,
  `id_answer` int(11) NOT NULL,
  `id_polls` int(11) NOT NULL,
  `result` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `polls_result`
--

INSERT INTO `polls_result` (`id`, `id_answer`, `id_polls`, `result`) VALUES
(1, 5, 12, 3),
(2, 3, 12, 4),
(3, 8, 13, 6),
(4, 7, 13, 2),
(7, 6, 12, 2),
(8, 4, 12, 1),
(10, 12, 15, 1),
(11, 11, 15, 4),
(17, 26, 19, 4),
(18, 27, 19, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `content` varchar(250) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `title`, `deskripsi`, `content`, `date`) VALUES
(1, 13, 'hahahah', 'klsndkwekew', 'jksandkjaewk', '2019-03-14'),
(2, 45, 'sndkwjeahkjewah', 'kjhcdkshfjea', 'jsddbajhebfh', '2019-03-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `id` int(11) NOT NULL,
  `house_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `nama_lengkap` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nohape` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `nama_lengkap`, `nohape`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'dita', 'ut4yT9sWkMRiVCHmji6Pbf8foH7gUSAB', '$2y$13$193dQe42oN/Paf56FGBxkO6G.bfOl5K0k3Y8RSDrPcXCQogWyCCt.', NULL, 'ditapuspitarahmaputri13@gmail.com', 10, '', '', '', 1551775132, 1551775132),
(2, 'ditaprp', 'ZR_CuHXgV2IO49viEJdxOdBLFct53IeB', '$2y$13$c7ubWT24o8491PQgMJfPe.HgcJ0adXBVj9u76UFclHu7eF4uYdW6.', NULL, 'dita@gmail.com', 10, '', '', '', 1551775321, 1551775321),
(3, 'rama', 'Y5EVnYiui--dGJ7tj0iq0xI9w5usLQpm', '$2y$13$46gJPeM9n6G3mJMzEDs11.rtOKDHrpo0MVmZnkWKLvFL9RZkHp7BO', NULL, 'ramagafar@gmail.com', 10, '', '', '', 1551775385, 1551775385),
(4, 'rtw', 's_waX099DUtLSyS9W0gP07tTpclL_opV', '$2y$13$aHWCZA8c9MC/wBqqsHnd8uGUT9wTJ1ERgfbqRB3RBf0.r1Il9qk7m', NULL, 'rtw@gmail.com', 10, '', '', '', 1551775678, 1551775678),
(5, 'dika', '12JCoazfLEoZtIDwNOv1OBl9rAsMe5kO', '$2y$13$lJhLvN9nu.6XkG3X5Eai9.Re973Zt7XpXUeGnZBuKdIXX6GijD7vO', NULL, 'dika@gmail.com', 10, 'Dika Puspita Rahma Putri', '085655333755', 'Kahuripan nirwana AA 8 no 6', 1551776739, 1551776739),
(6, 'dprp', '8mtpVxKX3Lu6z2eAGfwaS6wogUWyn6XM', '$2y$13$axqq.24YlkBivzzj3g1BveNcN5jg67zzMLlXwCh/rZjeT/pahZaDa', NULL, 'dprp@gmail.com', 10, 'ditaaah', '087786136399', 'kahuripan', 1552519439, 1552519439),
(7, 'jafar', '-Sq2lulYAfdj0ce5wCK8quvKAwO-CkJS', '$2y$13$bhf5yWEVEGE03EiD3JHQvOVgLqajMvX654NilpdyVSLnNhgmgTtnS', NULL, 'jafar@mail.com', 10, 'jafar', '0909', 'laksdfl', 1553660993, 1553660993),
(8, 'admin', 'ZlWlJqJYicsWKdHvJsXK0W1DWLTk0ymv', '$2y$13$tkySNWJ8rDWCen4Lb3hx/esm2DKidKDmFEGERpa34mvFjK/yq5sYq', NULL, 'admin@mail.com', 10, 'admin', '090980', 'akdsfkj', 1553753707, 1553753707);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `daf_buku`
--
ALTER TABLE `daf_buku`
  ADD PRIMARY KEY (`buku_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `dat_kategori_buku`
--
ALTER TABLE `dat_kategori_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `polls_answer`
--
ALTER TABLE `polls_answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_poll` (`id_poll`);

--
-- Indexes for table `polls_cookies`
--
ALTER TABLE `polls_cookies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_poll` (`id_poll`);

--
-- Indexes for table `polls_result`
--
ALTER TABLE `polls_result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_answer` (`id_answer`),
  ADD KEY `id_polls` (`id_polls`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_id` (`house_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `daf_buku`
--
ALTER TABLE `daf_buku`
  MODIFY `buku_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dat_kategori_buku`
--
ALTER TABLE `dat_kategori_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `polls_answer`
--
ALTER TABLE `polls_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `polls_cookies`
--
ALTER TABLE `polls_cookies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `polls_result`
--
ALTER TABLE `polls_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `daf_buku`
--
ALTER TABLE `daf_buku`
  ADD CONSTRAINT `daf_buku_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `dat_kategori_buku` (`id`);

--
-- Ketidakleluasaan untuk tabel `house`
--
ALTER TABLE `house`
  ADD CONSTRAINT `house_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`);

--
-- Ketidakleluasaan untuk tabel `polls_answer`
--
ALTER TABLE `polls_answer`
  ADD CONSTRAINT `polls_answer_ibfk_1` FOREIGN KEY (`id_poll`) REFERENCES `polls` (`id`);

--
-- Ketidakleluasaan untuk tabel `polls_cookies`
--
ALTER TABLE `polls_cookies`
  ADD CONSTRAINT `polls_cookies_ibfk_1` FOREIGN KEY (`id_poll`) REFERENCES `polls` (`id`);

--
-- Ketidakleluasaan untuk tabel `polls_result`
--
ALTER TABLE `polls_result`
  ADD CONSTRAINT `polls_result_ibfk_1` FOREIGN KEY (`id_polls`) REFERENCES `polls` (`id`),
  ADD CONSTRAINT `polls_result_ibfk_2` FOREIGN KEY (`id_answer`) REFERENCES `polls_answer` (`id`);

--
-- Ketidakleluasaan untuk tabel `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`house_id`) REFERENCES `house` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
