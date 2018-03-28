-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 05. Januari 2017 jam 07:00
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ishare`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `name_file` varchar(225) NOT NULL,
  `id_type` int(3) NOT NULL,
  `id_induk` int(6) NOT NULL,
  `size` int(32) NOT NULL,
  `url` varchar(225) NOT NULL,
  `code` varchar(75) NOT NULL,
  `download` int(6) NOT NULL,
  `date_download` datetime NOT NULL,
  `download_by` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data untuk tabel `file`
--

INSERT INTO `file` (`id`, `name_file`, `id_type`, `id_induk`, `size`, `url`, `code`, `download`, `date_download`, `download_by`) VALUES
(41, '1483085896-Table12-27-2016.xls', 3, 0, 6251008, 'drive/1483085896-Table12-27-2016.xls', '3pfdvhmssSiBYrUDEFyZAM4FnvL874xjm9HJfZ7knk6AOnusaPGrwVuttof28qN64Kv7nAd5FFf', 0, '2016-12-30 15:18:16', 1),
(42, '1483087411-Table Sparepart.xlsx', 3, 0, 2499820, 'drive/1483087411-Table Sparepart.xlsx', '0IeA82OzTwjF6X6mNwZBAXlSAsZamKiU246607IaR628JKlqQjx3OsWqJsoybYeUghksz41Ecw7', 0, '2016-12-30 15:43:31', 1),
(45, '1483154189-IMG_0011.JPG', 2, 0, 4172280, 'drive/1483154189-IMG_0011.JPG', 'JLy2ijVPKa0eoOjs6c1fcNlNxAUOs3MxO7zGVgmtFtKCmeQlRtdmvGXS0PHD8ouRgjXeV5a1XEJ', 0, '2016-12-31 10:16:29', 1),
(46, '1483155677-IMG_0012.JPG', 2, 0, 4861984, 'drive/1483155677-IMG_0012.JPG', 'hKXDVBkea72wPeCegsdzjJqhjxky9Qv9686e3lCykXekMWvgLLwB7pU3akJOMvAChnzHwXhKRGO', 0, '2016-12-31 10:41:17', 1),
(47, '1483155744-IMG_0012.JPG', 2, 0, 4861984, 'drive/1483155744-IMG_0012.JPG', 'SIvJ61CMlcrXQ9WRl0CA36oIEjMlpDI62qG2IwDJcg5kHuWpVyI37imQX4lUHGDO3wIFdpx4VHA', 0, '2016-12-31 10:42:24', 1),
(48, '1483155809-IMG_0014.JPG', 2, 0, 5307792, 'drive/1483155809-IMG_0014.JPG', '5peOjnlGS3Sbm8bMQQ8rVV1DHAGjKxwXc1lyCHvx7QPTfaH70SU8oHQp6PkXP2IdGtPahU3gGxa', 0, '2016-12-31 10:43:29', 1),
(49, '1483407455-IMG_0015.JPG', 2, 51, 4339173, 'drive/1483407455-IMG_0015.JPG', 'sJqYmhXslqRUPgk0Pn6yNTmWHmSFZUQyF8YYb6uLwp8f8a5iYX5fySkVOxAHd12oKSomSgTrzLg', 0, '2017-01-03 08:37:35', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_type`
--

CREATE TABLE IF NOT EXISTS `file_type` (
  `id_type` int(3) NOT NULL AUTO_INCREMENT,
  `type` varchar(75) NOT NULL,
  `icon` varchar(225) NOT NULL,
  `color` varchar(10) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `file_type`
--

INSERT INTO `file_type` (`id_type`, `type`, `icon`, `color`) VALUES
(1, 'folder', 'asset/img/folder.png', '#BAC6C7'),
(2, 'picture', 'asset/img/pictures.png', '#0013FF'),
(3, 'document', 'asset/img/document.png', '#1FCA00'),
(4, 'compress', 'asset/img/zip.png', '#FF8000'),
(5, 'txt', 'asset/img/txt.png', '#7676CB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `folder`
--

CREATE TABLE IF NOT EXISTS `folder` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name_folder` varchar(115) NOT NULL,
  `id_type` int(3) NOT NULL,
  `id_induk` int(6) NOT NULL,
  `code` varchar(75) NOT NULL,
  `date_create` datetime NOT NULL,
  `create_by` int(4) NOT NULL,
  `date_modified` datetime NOT NULL,
  `modified_by` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data untuk tabel `folder`
--

INSERT INTO `folder` (`id`, `name_folder`, `id_type`, `id_induk`, `code`, `date_create`, `create_by`, `date_modified`, `modified_by`) VALUES
(51, 'satu', 1, 0, 'UldlB3MeRQcA9PHfpCZy0gjlkplYq7lgnY1BF7yMh5IbFZHDOreuawwzHPifTsMlIZFeCxdIAF7', '2016-12-31 10:45:32', 1, '2016-12-31 10:45:32', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(112) NOT NULL,
  `email` varchar(112) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Muhammad Khairullah', 'muhammad.khairullah@mitrasuzuki.com', 'cad4a730583d0b04d944c6c0b066717f', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
