-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27-log
-- Versão do PHP: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `brainvestfiles`
--
CREATE DATABASE `brainvestfiles` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `brainvestfiles`;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Extraindo dados da tabela `tbl_links`
--

INSERT INTO `tbl_links` (`id_link`, `user_id`, `title`, `full_link`, `short_link`, `tries`, `downs`, `created`) VALUES
(25, 1, 'Maritino', 'http://127.0.0.1/brainvest/files/uploads/84a1b7c7013f010cf6a8e9ceed1a500e/13_02_2017_03_21_42.pdf', '', 8, NULL, '2017-02-12 19:24:48'),
(24, 1, 'Batedeira', 'http://127.0.0.1/brainvest/files/uploads/dd435f5bed9b6ea5b11c2940965d3737/13_02_2017_03_20_38.pdf', '', 4, NULL, '2017-02-12 19:23:45'),
(23, 1, 'Mar', 'http://127.0.0.1/brainvest/files/uploads/b874f51c0406d2e85ae2ae3a37ad2b46/13_02_2017_03_16_46.pdf', '', 2, NULL, '2017-02-12 19:19:53'),
(22, 1, 'Sucesso', 'http://127.0.0.1/brainvest/files/uploads/9f9dc3b9f7eaf7d2154e3f2a9dc385fa/13_02_2017_03_12_47.xlsx', '', 6, NULL, '2017-02-12 19:15:53'),
(21, 1, 'Musica', 'http://127.0.0.1/brainvest/files/uploads/0f5e8b762557e6ec75e3986103da15ec/13_02_2017_03_10_35.xlsx', '', 4, NULL, '2017-02-12 19:13:42'),
(20, 1, 'Bora lÃ¡', 'http://127.0.0.1/brainvest/files/uploads/22966ea7247f5c690e1a7376bd203470/13_02_2017_02_44_17.pdf', '', 3, NULL, '2017-02-12 18:47:23'),
(19, 1, 'Matricula Unip', 'http://127.0.0.1/brainvest/files/uploads/50ea6e04368cd6e2cfb09da3f4accd1f/06_02_2017_01_53_33.pdf', 'http://127.0.0.1/?d=825c9220', 5, NULL, '2017-02-05 17:56:28'),
(26, 0, 'Morango do Nordeste', 'http://127.0.0.1/brainvest/files/uploads/ad7f7663ca3ec547590cdc88823ee336/13_02_2017_19_27_55.pdf', 'http://127.0.0.1/files/?d=05e992a8', 3, NULL, '2017-02-13 15:27:55'),
(27, 0, 'Abacate Verde', 'http://127.0.0.1/brainvest/files/uploads/394284bbd6576a35a9dc87e4a60294e0/13_02_2017_20_23_53.pdf', '', 2, NULL, '2017-02-13 16:23:53'),
(28, 0, 'MaracujÃ¡ Esverdeado', 'http://127.0.0.1/brainvest/files/uploads/8199195d73497fa2fc83daa1766cbdfd/13_02_2017_20_25_47.pdf', '', 3, NULL, '2017-02-13 16:25:47'),
(29, 0, 'Vai lÃ¡', 'http://127.0.0.1/brainvest/files/uploads/ccb984f7f25a6ba719bcc84b9d3ebbfd/13_02_2017_20_38_51.pdf', '', 8, NULL, '2017-02-13 16:38:51'),
(30, 0, 'Musica Feliz', 'http://127.0.0.1/brainvest/files/uploads/3d1a193077fc21a94b4ca32acd15b215/13_02_2017_17_46_26.pdf', '', 2, NULL, '2017-02-13 17:46:26'),
(31, 0, 'mb-forms-styles', 'http://127.0.0.1/brainvest/files/uploads/05607626ce7303da7ab39bb772c79dff/13_02_2017_17_54_16.pdf', '', 4, NULL, '2017-02-13 17:54:16'),
(32, 0, 'MBook One First', 'http://127.0.0.1/brainvest/files/uploads/e6ae3ff24acd3b89e2492fbbede132cb/13_02_2017_18_10_37.pdf', '', 4, NULL, '2017-02-13 18:10:37'),
(33, 0, 'Molin Rouge', 'http://127.0.0.1/brainvest/files/uploads/6fc7a26de737be8a60dc3eed6e1b6d66/13_02_2017_18_27_25.pdf', '', 1, NULL, '2017-02-13 18:27:25'),
(34, 0, 'Metralhadora AutomÃ¡tica', 'http://127.0.0.1/brainvest/files/uploads/cec19ad11ab4f456c0a920581d0038ca/13_02_2017_18_31_25.pdf', '', 4, NULL, '2017-02-13 18:31:25');

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
(1, 'Rafael S. Kellows', 'rafaelkellows', 'rafaelkellows@hotmail.com', '123mudar', 1, '2017-01-12 13:03:42', '2017-02-12 17:04:43', 1),
(5, 'Rafael Silva Gmail', 'rafaelkellows86', 'rafaelkellows86@gmail.com', 'HAJ0a684YS2QojE', 1, '2017-02-05 16:42:45', '2017-02-05 16:42:45', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_usr_downloads`
--

CREATE TABLE IF NOT EXISTS `tbl_usr_downloads` (
  `id_down` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `full_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id_down`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
