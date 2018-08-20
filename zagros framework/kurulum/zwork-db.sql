-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 11 Ağu 2017, 08:21:34
-- Sunucu sürümü: 5.6.27-log
-- PHP Sürümü: 5.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `dogru_cikmaparca`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `zw_ayar`
--

CREATE TABLE IF NOT EXISTS `zw_ayar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `altad` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `grup` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deger` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `zw_dosya`
--

CREATE TABLE IF NOT EXISTS `zw_dosya` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proje_id` int(11) DEFAULT '0',
  `tip` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ad` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tarih` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `zw_icerik`
--

CREATE TABLE IF NOT EXISTS `zw_icerik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sayfa` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `ad` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `icerik` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `zw_personel`
--

CREATE TABLE IF NOT EXISTS `zw_personel` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `admin` tinyint(1) DEFAULT '0',
  `oturumID` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kullanici` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sifre` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eposta` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tarihG` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `zw_personel`
--

INSERT INTO `zw_personel` (`ID`, `admin`, `oturumID`, `kullanici`, `sifre`, `eposta`, `tarihG`) VALUES
(1, 1, '141e8e041ebd87e5481af791c4a0f815', 'zwork', '4297f44b13955235245b2497399d7a93', 'bilgi@konakhan.com.tr', '2017-06-02 18:55:43');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
