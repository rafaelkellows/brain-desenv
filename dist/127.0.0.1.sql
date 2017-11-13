-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Mar-2017 às 14:20
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=51 ;

--
-- Extraindo dados da tabela `tbl_links`
--

INSERT INTO `tbl_links` (`id_link`, `user_id`, `title`, `full_link`, `short_link`, `tries`, `downs`, `created`) VALUES
(49, 1, 'Php com mySql', 'http://127.0.0.1/brainvest/files/uploads/0d9dd86ed6a2f8fc3934d6fa89c46722/28_02_2017_21_00_00.pdf', 'http://127.0.0.1/files/?d=078f2e39', 3, 0, '2017-02-28 21:00:00'),
(50, 1, 'Como fazer triÃ¢ngulos usando CSS', 'http://127.0.0.1/brainvest/files/uploads/a18140fd7049be05c28e318fe5e3f301/28_02_2017_21_28_16.pdf', 'http://127.0.0.1/files/?d=849c1ca2', 4, 0, '2017-02-28 21:28:16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_links_downloaded`
--

CREATE TABLE IF NOT EXISTS `tbl_links_downloaded` (
  `id_link_down` int(11) NOT NULL AUTO_INCREMENT,
  `id_link` int(11) NOT NULL,
  `id_down` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id_link_down`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tbl_links_downloaded`
--

INSERT INTO `tbl_links_downloaded` (`id_link_down`, `id_link`, `id_down`, `created`) VALUES
(5, 49, 37, '2017-02-28 21:00:55');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `name`, `login`, `email`, `password`, `type`, `created`, `visited`, `active`) VALUES
(1, 'Rafael S. Kellows', 'rafaelkellows', 'rafaelkellows@hotmail.com', '123mudar', 1, '2017-01-12 13:03:42', '2017-02-28 21:27:50', 1),
(5, 'Rafael Silva Gmail', 'rafaelkellows86', 'rafaelkellows86@gmail.com', '123456', 0, '2017-02-05 16:42:45', '2017-02-28 18:26:47', 1),
(6, 'Developer', 'developer', 'developer@brainvest.com', '123456', 0, '2017-02-28 18:10:49', '2017-02-28 21:28:36', 1);

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
  `downloaded` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id_down`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=40 ;

--
-- Extraindo dados da tabela `tbl_usr_downloads`
--

INSERT INTO `tbl_usr_downloads` (`id_down`, `id_link`, `user_id`, `full_link`, `short_link`, `active`, `downloaded`, `created`, `modified`) VALUES
(37, 49, 6, 'http://127.0.0.1/brainvest/files/uploads/5bcb78f137fc3d58eb8a656af856abe4/28_02_2017_21_00_05.pdf', 'http://127.0.0.1/files/?d=8c2824d4', 1, 1, '2017-02-28 21:00:05', '2017-02-28 21:00:55'),
(38, 49, 6, 'http://127.0.0.1/brainvest/files/uploads/7f88d42bf382f64693c00c54dff2cb37/28_02_2017_21_11_07.pdf', 'http://127.0.0.1/files/?d=3ad8b7fc', 1, 0, '2017-02-28 21:11:07', '0000-00-00 00:00:00'),
(39, 50, 6, 'http://127.0.0.1/brainvest/files/uploads/3839b703193c7189d99de70277c2ed7d/28_02_2017_21_28_19.pdf', 'http://127.0.0.1/files/?d=8fe9c95b', 1, 0, '2017-02-28 21:28:19', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
