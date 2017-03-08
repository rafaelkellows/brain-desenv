-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17-Fev-2017 às 10:31
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `brainvestfiles`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_links`
--

CREATE TABLE IF NOT EXISTS `tbl_links` (
  `id_link` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `full_link` varchar(500) CHARACTER SET latin1 NOT NULL,
  `short_link` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tries` int(11) DEFAULT NULL,
  `downs` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id_link`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `login` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `type` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `visited` datetime NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `name`, `login`, `email`, `password`, `type`, `created`, `visited`, `active`) VALUES
(1, 'Rafael S. Kellows', 'rafaelkellows', 'rafaelkellows@hotmail.com', '123mudar', 1, '2017-01-12 13:03:42', '2017-02-17 01:20:56', 1),
(5, 'Rafael Silva Gmail', 'rafaelkellows86', 'rafaelkellows86@gmail.com', 'HAJ0a684YS2QojE', 1, '2017-02-05 16:42:45', '2017-02-05 16:42:45', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_usr_downloads`
--

CREATE TABLE IF NOT EXISTS `tbl_usr_downloads` (
  `id_down` int(11) NOT NULL AUTO_INCREMENT,
  `id_link` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id_down`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
