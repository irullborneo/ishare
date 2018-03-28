-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 05. Januari 2017 jam 06:54
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
