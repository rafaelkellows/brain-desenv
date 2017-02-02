-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02-Fev-2017 às 18:09
-- Versão do servidor: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmontblanc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `wp_commentmeta`
--

CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `wp_comments`
--

CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Extraindo dados da tabela `wp_comments`
--

INSERT INTO `wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'Um comentarista do WordPress', 'wapuu@wordpress.example', 'https://wordpress.org/', '', '2017-02-01 22:59:10', '2017-02-02 00:59:10', 'Olá, isso é um comentário.\nPara começar a moderar, editar e deletar comentários, visite a tela de Comentários no painel.\nAvatares de comentaristas vêm a partir do <a href="https://gravatar.com">Gravatar</a>.', 0, '1', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `wp_links`
--

CREATE TABLE `wp_links` (
  `link_id` bigint(20) UNSIGNED NOT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `wp_options`
--

CREATE TABLE `wp_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'yes'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Extraindo dados da tabela `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://127.0.0.1/edsa-mb/', 'yes'),
(2, 'home', 'http://127.0.0.1/edsa-mb/', 'yes'),
(3, 'blogname', 'MontBlanc', 'yes'),
(4, 'blogdescription', 'asset management', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'rafaelkellows@hotmail.com', 'yes'),
(7, 'start_of_week', '0', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '1', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'j \\d\\e F \\d\\e Y', 'yes'),
(24, 'time_format', 'H:i', 'yes'),
(25, 'links_updated_date_format', 'j \\d\\e F \\d\\e Y, H:i', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%year%/%monthnum%/%day%/%postname%/', 'yes'),
(29, 'rewrite_rules', 'a:208:{s:11:"^wp-json/?$";s:22:"index.php?rest_route=/";s:14:"^wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:21:"^index.php/wp-json/?$";s:22:"index.php?rest_route=/";s:24:"^index.php/wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:47:"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:42:"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:23:"category/(.+?)/embed/?$";s:46:"index.php?category_name=$matches[1]&embed=true";s:35:"category/(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:17:"category/(.+?)/?$";s:35:"index.php?category_name=$matches[1]";s:44:"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:39:"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:20:"tag/([^/]+)/embed/?$";s:36:"index.php?tag=$matches[1]&embed=true";s:32:"tag/([^/]+)/page/?([0-9]{1,})/?$";s:43:"index.php?tag=$matches[1]&paged=$matches[2]";s:14:"tag/([^/]+)/?$";s:25:"index.php?tag=$matches[1]";s:45:"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:40:"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:21:"type/([^/]+)/embed/?$";s:44:"index.php?post_format=$matches[1]&embed=true";s:33:"type/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?post_format=$matches[1]&paged=$matches[2]";s:15:"type/([^/]+)/?$";s:33:"index.php?post_format=$matches[1]";s:37:"cpo_slide/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:47:"cpo_slide/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:67:"cpo_slide/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:62:"cpo_slide/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:62:"cpo_slide/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:43:"cpo_slide/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:26:"cpo_slide/([^/]+)/embed/?$";s:42:"index.php?cpo_slide=$matches[1]&embed=true";s:30:"cpo_slide/([^/]+)/trackback/?$";s:36:"index.php?cpo_slide=$matches[1]&tb=1";s:38:"cpo_slide/([^/]+)/page/?([0-9]{1,})/?$";s:49:"index.php?cpo_slide=$matches[1]&paged=$matches[2]";s:45:"cpo_slide/([^/]+)/comment-page-([0-9]{1,})/?$";s:49:"index.php?cpo_slide=$matches[1]&cpage=$matches[2]";s:34:"cpo_slide/([^/]+)(?:/([0-9]+))?/?$";s:48:"index.php?cpo_slide=$matches[1]&page=$matches[2]";s:26:"cpo_slide/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:36:"cpo_slide/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:56:"cpo_slide/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:51:"cpo_slide/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:51:"cpo_slide/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:32:"cpo_slide/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:39:"cpo_feature/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:49:"cpo_feature/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:69:"cpo_feature/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"cpo_feature/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"cpo_feature/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:45:"cpo_feature/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:28:"cpo_feature/([^/]+)/embed/?$";s:44:"index.php?cpo_feature=$matches[1]&embed=true";s:32:"cpo_feature/([^/]+)/trackback/?$";s:38:"index.php?cpo_feature=$matches[1]&tb=1";s:40:"cpo_feature/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?cpo_feature=$matches[1]&paged=$matches[2]";s:47:"cpo_feature/([^/]+)/comment-page-([0-9]{1,})/?$";s:51:"index.php?cpo_feature=$matches[1]&cpage=$matches[2]";s:36:"cpo_feature/([^/]+)(?:/([0-9]+))?/?$";s:50:"index.php?cpo_feature=$matches[1]&page=$matches[2]";s:28:"cpo_feature/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:38:"cpo_feature/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:58:"cpo_feature/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"cpo_feature/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"cpo_feature/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:34:"cpo_feature/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:42:"portfolio-item/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:52:"portfolio-item/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:72:"portfolio-item/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:67:"portfolio-item/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:67:"portfolio-item/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:48:"portfolio-item/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:31:"portfolio-item/([^/]+)/embed/?$";s:46:"index.php?cpo_portfolio=$matches[1]&embed=true";s:35:"portfolio-item/([^/]+)/trackback/?$";s:40:"index.php?cpo_portfolio=$matches[1]&tb=1";s:43:"portfolio-item/([^/]+)/page/?([0-9]{1,})/?$";s:53:"index.php?cpo_portfolio=$matches[1]&paged=$matches[2]";s:50:"portfolio-item/([^/]+)/comment-page-([0-9]{1,})/?$";s:53:"index.php?cpo_portfolio=$matches[1]&cpage=$matches[2]";s:39:"portfolio-item/([^/]+)(?:/([0-9]+))?/?$";s:52:"index.php?cpo_portfolio=$matches[1]&page=$matches[2]";s:31:"portfolio-item/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:41:"portfolio-item/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:61:"portfolio-item/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:56:"portfolio-item/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:56:"portfolio-item/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:37:"portfolio-item/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:35:"service/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:45:"service/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:65:"service/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"service/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"service/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:41:"service/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:24:"service/([^/]+)/embed/?$";s:44:"index.php?cpo_service=$matches[1]&embed=true";s:28:"service/([^/]+)/trackback/?$";s:38:"index.php?cpo_service=$matches[1]&tb=1";s:36:"service/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?cpo_service=$matches[1]&paged=$matches[2]";s:43:"service/([^/]+)/comment-page-([0-9]{1,})/?$";s:51:"index.php?cpo_service=$matches[1]&cpage=$matches[2]";s:32:"service/([^/]+)(?:/([0-9]+))?/?$";s:50:"index.php?cpo_service=$matches[1]&page=$matches[2]";s:24:"service/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:34:"service/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:54:"service/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:49:"service/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:49:"service/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:30:"service/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:36:"cpo_team/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:46:"cpo_team/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:66:"cpo_team/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:61:"cpo_team/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:61:"cpo_team/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:42:"cpo_team/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:25:"cpo_team/([^/]+)/embed/?$";s:41:"index.php?cpo_team=$matches[1]&embed=true";s:29:"cpo_team/([^/]+)/trackback/?$";s:35:"index.php?cpo_team=$matches[1]&tb=1";s:37:"cpo_team/([^/]+)/page/?([0-9]{1,})/?$";s:48:"index.php?cpo_team=$matches[1]&paged=$matches[2]";s:44:"cpo_team/([^/]+)/comment-page-([0-9]{1,})/?$";s:48:"index.php?cpo_team=$matches[1]&cpage=$matches[2]";s:33:"cpo_team/([^/]+)(?:/([0-9]+))?/?$";s:47:"index.php?cpo_team=$matches[1]&page=$matches[2]";s:25:"cpo_team/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:35:"cpo_team/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:55:"cpo_team/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:50:"cpo_team/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:50:"cpo_team/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:31:"cpo_team/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:43:"cpo_testimonial/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:53:"cpo_testimonial/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:73:"cpo_testimonial/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:68:"cpo_testimonial/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:68:"cpo_testimonial/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:49:"cpo_testimonial/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:32:"cpo_testimonial/([^/]+)/embed/?$";s:48:"index.php?cpo_testimonial=$matches[1]&embed=true";s:36:"cpo_testimonial/([^/]+)/trackback/?$";s:42:"index.php?cpo_testimonial=$matches[1]&tb=1";s:44:"cpo_testimonial/([^/]+)/page/?([0-9]{1,})/?$";s:55:"index.php?cpo_testimonial=$matches[1]&paged=$matches[2]";s:51:"cpo_testimonial/([^/]+)/comment-page-([0-9]{1,})/?$";s:55:"index.php?cpo_testimonial=$matches[1]&cpage=$matches[2]";s:40:"cpo_testimonial/([^/]+)(?:/([0-9]+))?/?$";s:54:"index.php?cpo_testimonial=$matches[1]&page=$matches[2]";s:32:"cpo_testimonial/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:42:"cpo_testimonial/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:62:"cpo_testimonial/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:57:"cpo_testimonial/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:57:"cpo_testimonial/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:38:"cpo_testimonial/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:38:"cpo_client/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:48:"cpo_client/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:68:"cpo_client/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"cpo_client/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:63:"cpo_client/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:44:"cpo_client/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:27:"cpo_client/([^/]+)/embed/?$";s:43:"index.php?cpo_client=$matches[1]&embed=true";s:31:"cpo_client/([^/]+)/trackback/?$";s:37:"index.php?cpo_client=$matches[1]&tb=1";s:39:"cpo_client/([^/]+)/page/?([0-9]{1,})/?$";s:50:"index.php?cpo_client=$matches[1]&paged=$matches[2]";s:46:"cpo_client/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?cpo_client=$matches[1]&cpage=$matches[2]";s:35:"cpo_client/([^/]+)(?:/([0-9]+))?/?$";s:49:"index.php?cpo_client=$matches[1]&page=$matches[2]";s:27:"cpo_client/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:"cpo_client/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:"cpo_client/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"cpo_client/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"cpo_client/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:"cpo_client/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:48:".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$";s:18:"index.php?feed=old";s:20:".*wp-app\\.php(/.*)?$";s:19:"index.php?error=403";s:18:".*wp-register.php$";s:23:"index.php?register=true";s:32:"feed/(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:27:"(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:8:"embed/?$";s:21:"index.php?&embed=true";s:20:"page/?([0-9]{1,})/?$";s:28:"index.php?&paged=$matches[1]";s:41:"comments/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:36:"comments/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:17:"comments/embed/?$";s:21:"index.php?&embed=true";s:44:"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:39:"search/(.+)/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:20:"search/(.+)/embed/?$";s:34:"index.php?s=$matches[1]&embed=true";s:32:"search/(.+)/page/?([0-9]{1,})/?$";s:41:"index.php?s=$matches[1]&paged=$matches[2]";s:14:"search/(.+)/?$";s:23:"index.php?s=$matches[1]";s:47:"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:42:"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:23:"author/([^/]+)/embed/?$";s:44:"index.php?author_name=$matches[1]&embed=true";s:35:"author/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?author_name=$matches[1]&paged=$matches[2]";s:17:"author/([^/]+)/?$";s:33:"index.php?author_name=$matches[1]";s:69:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:45:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$";s:74:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]";s:39:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$";s:63:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]";s:56:"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:51:"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:32:"([0-9]{4})/([0-9]{1,2})/embed/?$";s:58:"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true";s:44:"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]";s:26:"([0-9]{4})/([0-9]{1,2})/?$";s:47:"index.php?year=$matches[1]&monthnum=$matches[2]";s:43:"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:38:"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:19:"([0-9]{4})/embed/?$";s:37:"index.php?year=$matches[1]&embed=true";s:31:"([0-9]{4})/page/?([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&paged=$matches[2]";s:13:"([0-9]{4})/?$";s:26:"index.php?year=$matches[1]";s:58:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:68:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:88:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:83:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:83:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:64:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:53:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/embed/?$";s:91:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&embed=true";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/trackback/?$";s:85:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&tb=1";s:77:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:97:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]";s:72:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:97:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]";s:65:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/page/?([0-9]{1,})/?$";s:98:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&paged=$matches[5]";s:72:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/comment-page-([0-9]{1,})/?$";s:98:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&cpage=$matches[5]";s:61:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)(?:/([0-9]+))?/?$";s:97:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&page=$matches[5]";s:47:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:57:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:77:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:72:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:72:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:53:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&cpage=$matches[4]";s:51:"([0-9]{4})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&cpage=$matches[3]";s:38:"([0-9]{4})/comment-page-([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&cpage=$matches[2]";s:27:".?.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:".?.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:".?.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:16:"(.?.+?)/embed/?$";s:41:"index.php?pagename=$matches[1]&embed=true";s:20:"(.?.+?)/trackback/?$";s:35:"index.php?pagename=$matches[1]&tb=1";s:40:"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:35:"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:28:"(.?.+?)/page/?([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&paged=$matches[2]";s:35:"(.?.+?)/comment-page-([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&cpage=$matches[2]";s:24:"(.?.+?)(?:/([0-9]+))?/?$";s:47:"index.php?pagename=$matches[1]&page=$matches[2]";}', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:1:{i:0;s:39:"cpo-content-types/cpo-content-types.php";}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'comment_max_links', '2', 'yes'),
(37, 'gmt_offset', '0', 'yes'),
(38, 'default_email_category', '1', 'yes'),
(39, 'recently_edited', '', 'no'),
(40, 'template', 'allegiant', 'yes'),
(41, 'stylesheet', 'allegiant', 'yes'),
(42, 'comment_whitelist', '1', 'yes'),
(43, 'blacklist_keys', '', 'no'),
(44, 'comment_registration', '0', 'yes'),
(45, 'html_type', 'text/html', 'yes'),
(46, 'use_trackback', '0', 'yes'),
(47, 'default_role', 'subscriber', 'yes'),
(48, 'db_version', '38590', 'yes'),
(49, 'uploads_use_yearmonth_folders', '1', 'yes'),
(50, 'upload_path', '', 'yes'),
(51, 'blog_public', '1', 'yes'),
(52, 'default_link_category', '2', 'yes'),
(53, 'show_on_front', 'posts', 'yes'),
(54, 'tag_base', '', 'yes'),
(55, 'show_avatars', '1', 'yes'),
(56, 'avatar_rating', 'G', 'yes'),
(57, 'upload_url_path', '', 'yes'),
(58, 'thumbnail_size_w', '150', 'yes'),
(59, 'thumbnail_size_h', '150', 'yes'),
(60, 'thumbnail_crop', '1', 'yes'),
(61, 'medium_size_w', '300', 'yes'),
(62, 'medium_size_h', '300', 'yes'),
(63, 'avatar_default', 'mystery', 'yes'),
(64, 'large_size_w', '1024', 'yes'),
(65, 'large_size_h', '1024', 'yes'),
(66, 'image_default_link_type', 'none', 'yes'),
(67, 'image_default_size', '', 'yes'),
(68, 'image_default_align', '', 'yes'),
(69, 'close_comments_for_old_posts', '0', 'yes'),
(70, 'close_comments_days_old', '14', 'yes'),
(71, 'thread_comments', '1', 'yes'),
(72, 'thread_comments_depth', '5', 'yes'),
(73, 'page_comments', '0', 'yes'),
(74, 'comments_per_page', '50', 'yes'),
(75, 'default_comments_page', 'newest', 'yes'),
(76, 'comment_order', 'asc', 'yes'),
(77, 'sticky_posts', 'a:0:{}', 'yes'),
(78, 'widget_categories', 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:5:"count";i:0;s:12:"hierarchical";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(79, 'widget_text', 'a:5:{i:2;a:2:{s:5:"title";s:12:"Encontre-nos";s:4:"text";s:210:"<p><strong>Endereço</strong><br />Av. Paulista, 123456<br />São Paulo, SP, CEP: 01311-300</p><p><strong>Horário</strong><br />Segunda&mdash;sexta: 9h&ndash;17h<br />Sábados &amp; domingos: 11h&ndash;15h</p>";}i:3;a:2:{s:5:"title";s:15:"Sobre este site";s:4:"text";s:86:"Este pode ser um bom lugar para se apresentar, falar do seu site ou incluir créditos.";}i:4;a:2:{s:5:"title";s:12:"Encontre-nos";s:4:"text";s:210:"<p><strong>Endereço</strong><br />Av. Paulista, 123456<br />São Paulo, SP, CEP: 01311-300</p><p><strong>Horário</strong><br />Segunda&mdash;sexta: 9h&ndash;17h<br />Sábados &amp; domingos: 11h&ndash;15h</p>";}i:5;a:2:{s:5:"title";s:15:"Sobre este site";s:4:"text";s:86:"Este pode ser um bom lugar para se apresentar, falar do seu site ou incluir créditos.";}s:12:"_multiwidget";i:1;}', 'yes'),
(80, 'widget_rss', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(81, 'uninstall_plugins', 'a:0:{}', 'no'),
(82, 'timezone_string', 'America/Sao_Paulo', 'yes'),
(83, 'page_for_posts', '0', 'yes'),
(84, 'page_on_front', '0', 'yes'),
(85, 'default_post_format', '0', 'yes'),
(86, 'link_manager_enabled', '0', 'yes'),
(87, 'finished_splitting_shared_terms', '1', 'yes'),
(88, 'site_icon', '19', 'yes'),
(89, 'medium_large_size_w', '768', 'yes'),
(90, 'medium_large_size_h', '0', 'yes'),
(91, 'initial_db_version', '38590', 'yes'),
(92, 'wp_user_roles', 'a:5:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:61:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;}}s:6:"editor";a:2:{s:4:"name";s:6:"Editor";s:12:"capabilities";a:34:{s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;}}s:6:"author";a:2:{s:4:"name";s:6:"Author";s:12:"capabilities";a:10:{s:12:"upload_files";b:1;s:10:"edit_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:4:"read";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:22:"delete_published_posts";b:1;}}s:11:"contributor";a:2:{s:4:"name";s:11:"Contributor";s:12:"capabilities";a:5:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}}', 'yes'),
(93, 'fresh_site', '0', 'yes'),
(94, 'WPLANG', 'pt_BR', 'yes'),
(95, 'widget_search', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(96, 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(97, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(98, 'widget_archives', 'a:2:{i:2;a:3:{s:5:"title";s:0:"";s:5:"count";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(99, 'widget_meta', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(100, 'sidebars_widgets', 'a:7:{s:19:"wp_inactive_widgets";a:4:{i:0;s:6:"text-2";i:1;s:6:"text-3";i:2;s:6:"text-4";i:3;s:6:"text-5";}s:15:"primary-widgets";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:17:"secondary-widgets";a:0:{}s:16:"footer-widgets-1";a:0:{}s:16:"footer-widgets-2";N;s:16:"footer-widgets-3";N;s:13:"array_version";i:3;}', 'yes'),
(101, 'widget_pages', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(102, 'widget_calendar', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(103, 'widget_tag_cloud', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(104, 'widget_nav_menu', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(105, 'cron', 'a:4:{i:1486083552;a:3:{s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1486085573;a:1:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1486086866;a:1:{s:30:"wp_scheduled_auto_draft_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}s:7:"version";i:2;}', 'yes'),
(106, 'theme_mods_twentyseventeen', 'a:2:{s:18:"custom_css_post_id";i:-1;s:16:"sidebars_widgets";a:2:{s:4:"time";i:1485999220;s:4:"data";a:4:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:9:"sidebar-2";a:0:{}s:9:"sidebar-3";a:0:{}}}}', 'yes'),
(155, '_site_transient_update_core', 'O:8:"stdClass":4:{s:7:"updates";a:1:{i:0;O:8:"stdClass":10:{s:8:"response";s:6:"latest";s:8:"download";s:64:"http://downloads.wordpress.org/release/pt_BR/wordpress-4.7.2.zip";s:6:"locale";s:5:"pt_BR";s:8:"packages";O:8:"stdClass":5:{s:4:"full";s:64:"http://downloads.wordpress.org/release/pt_BR/wordpress-4.7.2.zip";s:10:"no_content";b:0;s:11:"new_bundled";b:0;s:7:"partial";b:0;s:8:"rollback";b:0;}s:7:"current";s:5:"4.7.2";s:7:"version";s:5:"4.7.2";s:11:"php_version";s:5:"5.2.4";s:13:"mysql_version";s:3:"5.0";s:11:"new_bundled";s:3:"4.7";s:15:"partial_version";s:0:"";}}s:12:"last_checked";i:1486043717;s:15:"version_checked";s:5:"4.7.2";s:12:"translations";a:0:{}}', 'no'),
(156, '_site_transient_update_themes', 'O:8:"stdClass":4:{s:12:"last_checked";i:1486043719;s:7:"checked";a:4:{s:9:"allegiant";s:5:"1.0.8";s:13:"twentyfifteen";s:3:"1.7";s:15:"twentyseventeen";s:3:"1.1";s:13:"twentysixteen";s:3:"1.3";}s:8:"response";a:0:{}s:12:"translations";a:3:{i:0;a:7:{s:4:"type";s:5:"theme";s:4:"slug";s:13:"twentyfifteen";s:8:"language";s:5:"pt_BR";s:7:"version";s:3:"1.7";s:7:"updated";s:19:"2016-12-04 18:11:06";s:7:"package";s:76:"http://downloads.wordpress.org/translation/theme/twentyfifteen/1.7/pt_BR.zip";s:10:"autoupdate";b:1;}i:1;a:7:{s:4:"type";s:5:"theme";s:4:"slug";s:15:"twentyseventeen";s:8:"language";s:5:"pt_BR";s:7:"version";s:3:"1.0";s:7:"updated";s:19:"2016-12-27 20:01:33";s:7:"package";s:78:"http://downloads.wordpress.org/translation/theme/twentyseventeen/1.0/pt_BR.zip";s:10:"autoupdate";b:1;}i:2;a:7:{s:4:"type";s:5:"theme";s:4:"slug";s:13:"twentysixteen";s:8:"language";s:5:"pt_BR";s:7:"version";s:3:"1.3";s:7:"updated";s:19:"2016-12-04 18:16:45";s:7:"package";s:76:"http://downloads.wordpress.org/translation/theme/twentysixteen/1.3/pt_BR.zip";s:10:"autoupdate";b:1;}}}', 'no'),
(165, '_site_transient_timeout_theme_roots', '1486055464', 'no'),
(166, '_site_transient_theme_roots', 'a:4:{s:9:"allegiant";s:7:"/themes";s:13:"twentyfifteen";s:7:"/themes";s:15:"twentyseventeen";s:7:"/themes";s:13:"twentysixteen";s:7:"/themes";}', 'no'),
(157, '_site_transient_update_plugins', 'O:8:"stdClass":4:{s:12:"last_checked";i:1486043718;s:8:"response";a:0:{}s:12:"translations";a:0:{}s:9:"no_update";a:3:{s:19:"akismet/akismet.php";O:8:"stdClass":6:{s:2:"id";s:2:"15";s:4:"slug";s:7:"akismet";s:6:"plugin";s:19:"akismet/akismet.php";s:11:"new_version";s:3:"3.2";s:3:"url";s:38:"https://wordpress.org/plugins/akismet/";s:7:"package";s:53:"http://downloads.wordpress.org/plugin/akismet.3.2.zip";}s:39:"cpo-content-types/cpo-content-types.php";O:8:"stdClass":6:{s:2:"id";s:5:"58895";s:4:"slug";s:17:"cpo-content-types";s:6:"plugin";s:39:"cpo-content-types/cpo-content-types.php";s:11:"new_version";s:5:"1.1.0";s:3:"url";s:48:"https://wordpress.org/plugins/cpo-content-types/";s:7:"package";s:59:"http://downloads.wordpress.org/plugin/cpo-content-types.zip";}s:9:"hello.php";O:8:"stdClass":6:{s:2:"id";s:4:"3564";s:4:"slug";s:11:"hello-dolly";s:6:"plugin";s:9:"hello.php";s:11:"new_version";s:3:"1.6";s:3:"url";s:42:"https://wordpress.org/plugins/hello-dolly/";s:7:"package";s:57:"http://downloads.wordpress.org/plugin/hello-dolly.1.6.zip";}}}', 'no'),
(119, '_site_transient_timeout_browser_844f7ae4d251b2e6e152fdd13ef479f6', '1486603973', 'no'),
(120, '_site_transient_browser_844f7ae4d251b2e6e152fdd13ef479f6', 'a:9:{s:8:"platform";s:7:"Windows";s:4:"name";s:6:"Chrome";s:7:"version";s:12:"55.0.2883.87";s:10:"update_url";s:28:"http://www.google.com/chrome";s:7:"img_src";s:49:"http://s.wordpress.org/images/browsers/chrome.png";s:11:"img_src_ssl";s:48:"https://wordpress.org/images/browsers/chrome.png";s:15:"current_version";s:2:"18";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'no'),
(130, 'can_compress_scripts', '1', 'no'),
(163, '_transient_timeout_dash_01e18dead815ce736e3b9cccfbd773a5', '1486096825', 'no'),
(164, '_transient_dash_01e18dead815ce736e3b9cccfbd773a5', '<div class="rss-widget"><p><strong>Erro de RSS:</strong> WP HTTP Error: No working transports found</p></div><div class="rss-widget"><p><strong>Erro de RSS:</strong> WP HTTP Error: No working transports found</p></div><div class="rss-widget"><ul></ul></div>', 'no'),
(135, '_transient_timeout_plugin_slugs', '1486085639', 'no'),
(136, '_transient_plugin_slugs', 'a:3:{i:0;s:19:"akismet/akismet.php";i:1;s:39:"cpo-content-types/cpo-content-types.php";i:2;s:9:"hello.php";}', 'no'),
(142, 'current_theme', 'Allegiant', 'yes'),
(143, 'theme_mods_allegiant', 'a:6:{i:0;b:0;s:18:"custom_css_post_id";i:-1;s:18:"nav_menu_locations";a:3:{s:8:"top_menu";i:0;s:11:"footer_menu";i:2;s:9:"main_menu";i:2;}s:17:"background_preset";s:7:"default";s:21:"background_position_x";s:6:"center";s:15:"background_size";s:4:"auto";}', 'yes'),
(144, 'theme_switched', '', 'yes'),
(145, 'recently_activated', 'a:0:{}', 'yes'),
(146, 'cpotheme_settings', 'a:8:{s:17:"general_editlinks";b:1;s:12:"general_logo";s:84:"http://127.0.0.1/edsa-mb/wp-content/uploads/2017/02/logoMontBlanc-e1485999728303.png";s:18:"general_logo_width";i:300;s:17:"general_texttitle";b:0;s:13:"home_features";s:22:"OUR STRATEGIC APPROACH";s:13:"home_services";s:12:"OUR SOLUTION";s:12:"home_tagline";s:0:"";s:10:"home_posts";b:0;}', 'yes'),
(150, 'nav_menu_options', 'a:1:{s:8:"auto_add";a:0:{}}', 'yes'),
(162, 'cpo_service_category_children', 'a:0:{}', 'yes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `wp_postmeta`
--

CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Extraindo dados da tabela `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 4, '_wp_attached_file', '2017/02/espresso.jpg'),
(3, 4, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:2000;s:6:"height";i:1200;s:4:"file";s:20:"2017/02/espresso.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"espresso-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:20:"espresso-300x180.jpg";s:5:"width";i:300;s:6:"height";i:180;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:20:"espresso-768x461.jpg";s:5:"width";i:768;s:6:"height";i:461;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:21:"espresso-1024x614.jpg";s:5:"width";i:1024;s:6:"height";i:614;s:9:"mime-type";s:10:"image/jpeg";}s:32:"twentyseventeen-thumbnail-avatar";a:4:{s:4:"file";s:20:"espresso-100x100.jpg";s:5:"width";i:100;s:6:"height";i:100;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(4, 4, '_starter_content_theme', 'twentyseventeen'),
(5, 4, '_customize_draft_post_name', 'espresso'),
(6, 5, '_wp_attached_file', '2017/02/sandwich.jpg'),
(7, 5, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:2000;s:6:"height";i:1200;s:4:"file";s:20:"2017/02/sandwich.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"sandwich-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:20:"sandwich-300x180.jpg";s:5:"width";i:300;s:6:"height";i:180;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:20:"sandwich-768x461.jpg";s:5:"width";i:768;s:6:"height";i:461;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:21:"sandwich-1024x614.jpg";s:5:"width";i:1024;s:6:"height";i:614;s:9:"mime-type";s:10:"image/jpeg";}s:32:"twentyseventeen-thumbnail-avatar";a:4:{s:4:"file";s:20:"sandwich-100x100.jpg";s:5:"width";i:100;s:6:"height";i:100;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(8, 5, '_starter_content_theme', 'twentyseventeen'),
(9, 5, '_customize_draft_post_name', 'sandwich'),
(10, 6, '_wp_attached_file', '2017/02/coffee.jpg'),
(11, 6, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:2000;s:6:"height";i:1200;s:4:"file";s:18:"2017/02/coffee.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:18:"coffee-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:18:"coffee-300x180.jpg";s:5:"width";i:300;s:6:"height";i:180;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:18:"coffee-768x461.jpg";s:5:"width";i:768;s:6:"height";i:461;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:19:"coffee-1024x614.jpg";s:5:"width";i:1024;s:6:"height";i:614;s:9:"mime-type";s:10:"image/jpeg";}s:32:"twentyseventeen-thumbnail-avatar";a:4:{s:4:"file";s:18:"coffee-100x100.jpg";s:5:"width";i:100;s:6:"height";i:100;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(12, 6, '_starter_content_theme', 'twentyseventeen'),
(13, 6, '_customize_draft_post_name', 'coffee'),
(14, 7, '_customize_draft_post_name', 'pagina-inicial'),
(15, 8, '_thumbnail_id', '5'),
(16, 8, '_customize_draft_post_name', 'sobre'),
(17, 9, '_thumbnail_id', '4'),
(18, 9, '_customize_draft_post_name', 'contato'),
(19, 10, '_thumbnail_id', '6'),
(20, 10, '_customize_draft_post_name', 'blog'),
(21, 11, '_thumbnail_id', '4'),
(22, 11, '_customize_draft_post_name', 'uma-secao-de-pagina-inicial'),
(23, 13, '_wp_trash_meta_status', 'publish'),
(24, 13, '_wp_trash_meta_time', '1485999317'),
(25, 15, '_wp_attached_file', '2017/02/download.png'),
(26, 15, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1024;s:6:"height";i:255;s:4:"file";s:20:"2017/02/download.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"download-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:19:"download-300x75.png";s:5:"width";i:300;s:6:"height";i:75;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:20:"download-768x191.png";s:5:"width";i:768;s:6:"height";i:191;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:21:"download-1024x255.png";s:5:"width";i:1024;s:6:"height";i:255;s:9:"mime-type";s:9:"image/png";}s:9:"portfolio";a:4:{s:4:"file";s:20:"download-600x255.png";s:5:"width";i:600;s:6:"height";i:255;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(27, 15, '_edit_lock', '1485999303:1'),
(28, 16, '_wp_attached_file', '2017/02/logoMontBlanc-e1485999728303.png'),
(29, 16, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:714;s:6:"height";i:135;s:4:"file";s:40:"2017/02/logoMontBlanc-e1485999728303.png";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:40:"logoMontBlanc-e1485999728303-150x135.png";s:5:"width";i:150;s:6:"height";i:135;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:39:"logoMontBlanc-e1485999728303-300x57.png";s:5:"width";i:300;s:6:"height";i:57;s:9:"mime-type";s:9:"image/png";}s:12:"medium_large";a:4:{s:4:"file";s:25:"logoMontBlanc-768x191.png";s:5:"width";i:768;s:6:"height";i:191;s:9:"mime-type";s:9:"image/png";}s:5:"large";a:4:{s:4:"file";s:26:"logoMontBlanc-1024x255.png";s:5:"width";i:1024;s:6:"height";i:255;s:9:"mime-type";s:9:"image/png";}s:9:"portfolio";a:4:{s:4:"file";s:40:"logoMontBlanc-e1485999728303-600x135.png";s:5:"width";i:600;s:6:"height";i:135;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(30, 16, '_edit_lock', '1486000318:1'),
(31, 16, '_wp_attachment_backup_sizes', 'a:7:{s:9:"full-orig";a:3:{s:5:"width";i:1024;s:6:"height";i:255;s:4:"file";s:17:"logoMontBlanc.png";}s:18:"full-1485999728303";a:3:{s:5:"width";i:1024;s:6:"height";i:255;s:4:"file";s:32:"logoMontBlanc-e1485999684973.png";}s:14:"thumbnail-orig";a:4:{s:4:"file";s:25:"logoMontBlanc-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:11:"medium-orig";a:4:{s:4:"file";s:24:"logoMontBlanc-300x75.png";s:5:"width";i:300;s:6:"height";i:75;s:9:"mime-type";s:9:"image/png";}s:17:"medium_large-orig";a:4:{s:4:"file";s:25:"logoMontBlanc-768x191.png";s:5:"width";i:768;s:6:"height";i:191;s:9:"mime-type";s:9:"image/png";}s:10:"large-orig";a:4:{s:4:"file";s:26:"logoMontBlanc-1024x255.png";s:5:"width";i:1024;s:6:"height";i:255;s:9:"mime-type";s:9:"image/png";}s:14:"portfolio-orig";a:4:{s:4:"file";s:25:"logoMontBlanc-600x255.png";s:5:"width";i:600;s:6:"height";i:255;s:9:"mime-type";s:9:"image/png";}}'),
(32, 16, '_edit_last', '1'),
(33, 18, '_wp_attached_file', '2017/02/icon.png'),
(34, 18, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:80;s:6:"height";i:80;s:4:"file";s:16:"2017/02/icon.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(35, 19, '_wp_attached_file', '2017/02/cropped-icon.png'),
(36, 19, '_wp_attachment_context', 'site-icon'),
(37, 19, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:512;s:6:"height";i:512;s:4:"file";s:24:"2017/02/cropped-icon.png";s:5:"sizes";a:7:{s:9:"thumbnail";a:4:{s:4:"file";s:24:"cropped-icon-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:24:"cropped-icon-300x300.png";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:9:"image/png";}s:9:"portfolio";a:4:{s:4:"file";s:24:"cropped-icon-512x400.png";s:5:"width";i:512;s:6:"height";i:400;s:9:"mime-type";s:9:"image/png";}s:13:"site_icon-270";a:4:{s:4:"file";s:24:"cropped-icon-270x270.png";s:5:"width";i:270;s:6:"height";i:270;s:9:"mime-type";s:9:"image/png";}s:13:"site_icon-192";a:4:{s:4:"file";s:24:"cropped-icon-192x192.png";s:5:"width";i:192;s:6:"height";i:192;s:9:"mime-type";s:9:"image/png";}s:13:"site_icon-180";a:4:{s:4:"file";s:24:"cropped-icon-180x180.png";s:5:"width";i:180;s:6:"height";i:180;s:9:"mime-type";s:9:"image/png";}s:12:"site_icon-32";a:4:{s:4:"file";s:22:"cropped-icon-32x32.png";s:5:"width";i:32;s:6:"height";i:32;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(38, 17, '_wp_trash_meta_status', 'publish'),
(39, 17, '_wp_trash_meta_time', '1486000217'),
(40, 20, '_edit_last', '1'),
(41, 20, '_edit_lock', '1486000843:1'),
(42, 21, '_wp_attached_file', '2017/02/slide-01-1.jpg'),
(43, 21, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1903;s:6:"height";i:801;s:4:"file";s:22:"2017/02/slide-01-1.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:22:"slide-01-1-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:22:"slide-01-1-300x126.jpg";s:5:"width";i:300;s:6:"height";i:126;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:22:"slide-01-1-768x323.jpg";s:5:"width";i:768;s:6:"height";i:323;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:23:"slide-01-1-1024x431.jpg";s:5:"width";i:1024;s:6:"height";i:431;s:9:"mime-type";s:10:"image/jpeg";}s:9:"portfolio";a:4:{s:4:"file";s:22:"slide-01-1-600x400.jpg";s:5:"width";i:600;s:6:"height";i:400;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(44, 20, '_thumbnail_id', '21'),
(45, 22, '_edit_last', '1'),
(46, 22, '_edit_lock', '1486000683:1'),
(47, 23, '_wp_attached_file', '2017/02/slide-02.jpg'),
(48, 23, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1903;s:6:"height";i:813;s:4:"file";s:20:"2017/02/slide-02.jpg";s:5:"sizes";a:5:{s:9:"thumbnail";a:4:{s:4:"file";s:20:"slide-02-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:20:"slide-02-300x128.jpg";s:5:"width";i:300;s:6:"height";i:128;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:20:"slide-02-768x328.jpg";s:5:"width";i:768;s:6:"height";i:328;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:21:"slide-02-1024x437.jpg";s:5:"width";i:1024;s:6:"height";i:437;s:9:"mime-type";s:10:"image/jpeg";}s:9:"portfolio";a:4:{s:4:"file";s:20:"slide-02-600x400.jpg";s:5:"width";i:600;s:6:"height";i:400;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(49, 24, '_edit_last', '1'),
(50, 24, '_edit_lock', '1486000794:1'),
(51, 24, '_wp_page_template', 'default'),
(52, 24, 'layout_sidebar', 'none'),
(53, 27, '_menu_item_type', 'post_type'),
(54, 27, '_menu_item_menu_item_parent', '0'),
(55, 27, '_menu_item_object_id', '24'),
(56, 27, '_menu_item_object', 'page'),
(57, 27, '_menu_item_target', ''),
(58, 27, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(59, 27, '_menu_item_xfn', ''),
(60, 27, '_menu_item_url', ''),
(61, 26, '_wp_trash_meta_status', 'publish'),
(62, 26, '_wp_trash_meta_time', '1486001021'),
(63, 28, '_wp_trash_meta_status', 'publish'),
(64, 28, '_wp_trash_meta_time', '1486001058'),
(74, 33, '_menu_item_type', 'post_type'),
(66, 31, '_menu_item_type', 'post_type'),
(67, 31, '_menu_item_menu_item_parent', '0'),
(68, 31, '_menu_item_object_id', '2'),
(69, 31, '_menu_item_object', 'page'),
(70, 31, '_menu_item_target', ''),
(71, 31, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(72, 31, '_menu_item_xfn', ''),
(73, 31, '_menu_item_url', ''),
(75, 33, '_menu_item_menu_item_parent', '0'),
(76, 33, '_menu_item_object_id', '2'),
(77, 33, '_menu_item_object', 'page'),
(78, 33, '_menu_item_target', ''),
(79, 33, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(80, 33, '_menu_item_xfn', ''),
(81, 33, '_menu_item_url', ''),
(82, 34, '_menu_item_type', 'post_type'),
(83, 34, '_menu_item_menu_item_parent', '0'),
(84, 34, '_menu_item_object_id', '30'),
(85, 34, '_menu_item_object', 'page'),
(86, 34, '_menu_item_target', ''),
(87, 34, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(88, 34, '_menu_item_xfn', ''),
(89, 34, '_menu_item_url', ''),
(90, 29, '_wp_trash_meta_status', 'publish'),
(91, 29, '_wp_trash_meta_time', '1486001154'),
(92, 35, '_wp_trash_meta_status', 'publish'),
(93, 35, '_wp_trash_meta_time', '1486044354'),
(94, 36, '_edit_last', '1'),
(95, 36, '_edit_lock', '1486044473:1'),
(96, 37, '_edit_last', '1'),
(97, 37, '_edit_lock', '1486046913:1'),
(98, 38, '_edit_last', '1'),
(99, 38, '_edit_lock', '1486046940:1'),
(100, 39, '_edit_last', '1'),
(101, 39, '_edit_lock', '1486047028:1'),
(102, 40, '_wp_trash_meta_status', 'publish'),
(103, 40, '_wp_trash_meta_time', '1486047216'),
(104, 41, '_wp_trash_meta_status', 'publish'),
(105, 41, '_wp_trash_meta_time', '1486048777'),
(106, 42, '_edit_last', '1'),
(107, 42, '_edit_lock', '1486055037:1'),
(108, 43, '_edit_last', '1'),
(109, 43, '_edit_lock', '1486054979:1'),
(110, 44, '_edit_last', '1'),
(111, 44, '_edit_lock', '1486054790:1'),
(112, 45, '_edit_last', '1'),
(113, 45, '_edit_lock', '1486054748:1'),
(114, 46, '_edit_last', '1'),
(115, 46, '_edit_lock', '1486054640:1'),
(116, 47, '_edit_last', '1'),
(117, 47, '_edit_lock', '1486054608:1'),
(118, 48, '_wp_trash_meta_status', 'publish'),
(119, 48, '_wp_trash_meta_time', '1486049070'),
(120, 50, '_wp_trash_meta_status', 'publish'),
(121, 50, '_wp_trash_meta_time', '1486049295'),
(122, 47, 'service_featured', '1'),
(123, 47, 'service_icon', 'fontawesome-&amp;#xf012'),
(124, 46, 'service_featured', '1'),
(125, 46, 'service_icon', 'fontawesome-&amp;#xf08e'),
(126, 51, '_wp_trash_meta_status', 'publish'),
(127, 51, '_wp_trash_meta_time', '1486053737'),
(128, 42, 'service_featured', '1'),
(129, 42, 'service_icon', 'fontawesome-&amp;#xf0c0'),
(130, 45, 'service_featured', '1'),
(131, 45, 'service_icon', 'fontawesome-&amp;#xf0e8'),
(132, 44, 'service_featured', '1'),
(133, 44, 'service_icon', 'fontawesome-&amp;#xf029'),
(134, 43, 'service_featured', '1'),
(135, 43, 'service_icon', 'fontawesome-&amp;#xf155');

-- --------------------------------------------------------

--
-- Estrutura da tabela `wp_posts`
--

CREATE TABLE `wp_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Extraindo dados da tabela `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2017-02-01 22:59:10', '2017-02-02 00:59:10', 'Bem-vindo ao WordPress. Esse é o seu primeiro post. Edite-o ou exclua-o, e então comece a escrever!', 'Olá, mundo!', '', 'publish', 'open', 'open', '', 'ola-mundo', '', '', '2017-02-01 22:59:10', '2017-02-02 00:59:10', '', 0, 'http://127.0.0.1/edsa-mb/?p=1', 0, 'post', '', 1),
(2, 1, '2017-02-01 22:59:10', '2017-02-02 00:59:10', 'Esta é uma página de exemplo. É diferente de um post porque ela ficará em um local e será exibida na navegação do seu site (na maioria dos temas). A maioria das pessoas começa com uma página de introdução aos potenciais visitantes do site. Ela pode ser assim:\n\n<blockquote>Olá! Eu sou um bike courrier de dia, ator amador à noite e este é meu blog. Eu moro em São Paulo, tenho um cachorro chamado Tonico e eu gosto de caipirinhas. (E de ser pego pela chuva.)</blockquote>\n\nou assim:\n\n<blockquote>A XYZ foi fundada em 1971 e desde então vem proporcionando produtos de qualidade a seus clientes. Localizada em Valinhos, XYZ emprega mais de 2.000 pessoas e faz várias contribuições para a comunidade local.</blockquote>\nComo um novo usuário do WordPress, você deve ir até o <a href="http://127.0.0.1/brainvest/montblanc/wp-admin/">seu painel</a> para excluir essa página e criar novas páginas com seu próprio conteúdo. Divirta-se!', 'Página de Exemplo', '', 'publish', 'closed', 'open', '', 'pagina-exemplo', '', '', '2017-02-01 22:59:10', '2017-02-02 00:59:10', '', 0, 'http://127.0.0.1/edsa-mb/?page_id=2', 0, 'page', '', 0),
(3, 1, '2017-02-01 23:32:53', '0000-00-00 00:00:00', '', 'Rascunho automático', '', 'auto-draft', 'open', 'open', '', '', '', '', '2017-02-01 23:32:53', '0000-00-00 00:00:00', '', 0, 'http://127.0.0.1/edsa-mb/?p=3', 0, 'post', '', 0),
(4, 1, '2017-02-01 23:33:03', '0000-00-00 00:00:00', '', 'Espresso', '', 'auto-draft', 'open', 'closed', '', '', '', '', '2017-02-01 23:33:03', '0000-00-00 00:00:00', '', 0, 'http://127.0.0.1/edsa-mb/wp-content/uploads/2017/02/espresso.jpg', 0, 'attachment', 'image/jpeg', 0),
(5, 1, '2017-02-01 23:33:04', '0000-00-00 00:00:00', '', 'Sandwich', '', 'auto-draft', 'open', 'closed', '', '', '', '', '2017-02-01 23:33:04', '0000-00-00 00:00:00', '', 0, 'http://127.0.0.1/edsa-mb/wp-content/uploads/2017/02/sandwich.jpg', 0, 'attachment', 'image/jpeg', 0),
(6, 1, '2017-02-01 23:33:05', '0000-00-00 00:00:00', '', 'Coffee', '', 'auto-draft', 'open', 'closed', '', '', '', '', '2017-02-01 23:33:05', '0000-00-00 00:00:00', '', 0, 'http://127.0.0.1/edsa-mb/wp-content/uploads/2017/02/coffee.jpg', 0, 'attachment', 'image/jpeg', 0),
(7, 1, '2017-02-01 23:33:06', '0000-00-00 00:00:00', 'Bem-vindo(a) ao seu site! Está é sua página inicial, que é a página que a maioria dos visitantes vai ver quando acessarem o seu site pela primeira vez.', 'Página inicial', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2017-02-01 23:33:06', '0000-00-00 00:00:00', '', 0, 'http://127.0.0.1/edsa-mb/?page_id=7', 0, 'page', '', 0),
(8, 1, '2017-02-01 23:33:06', '0000-00-00 00:00:00', 'Você pode ser um artista que queira se apresentar aqui, ou talvez queira descrever a missão da sua empresa.', 'Sobre', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2017-02-01 23:33:06', '0000-00-00 00:00:00', '', 0, 'http://127.0.0.1/edsa-mb/?page_id=8', 0, 'page', '', 0),
(9, 1, '2017-02-01 23:33:06', '0000-00-00 00:00:00', 'Esta é uma página com algumas informações básicas de contato, como um endereço e número de telefone. Você também pode experimentar usar um plugin para adicionar um formulário de contato.', 'Contato', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2017-02-01 23:33:06', '0000-00-00 00:00:00', '', 0, 'http://127.0.0.1/edsa-mb/?page_id=9', 0, 'page', '', 0),
(10, 1, '2017-02-01 23:33:06', '0000-00-00 00:00:00', '', 'Blog', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2017-02-01 23:33:06', '0000-00-00 00:00:00', '', 0, 'http://127.0.0.1/edsa-mb/?page_id=10', 0, 'page', '', 0),
(11, 1, '2017-02-01 23:33:06', '0000-00-00 00:00:00', 'Este é um exemplo de seção de página inicial. Seções de página inicial podem ser qualquer outra página que não a página inicial em si, incluindo a página que exibe seus últimos posts do blog.', 'Uma seção de página inicial', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2017-02-01 23:33:06', '0000-00-00 00:00:00', '', 0, 'http://127.0.0.1/edsa-mb/?page_id=11', 0, 'page', '', 0),
(12, 1, '2017-02-01 23:33:07', '0000-00-00 00:00:00', '{\n    "widget_text[2]": {\n        "starter_content": true,\n        "value": {\n            "encoded_serialized_instance": "YToyOntzOjU6InRpdGxlIjtzOjEyOiJFbmNvbnRyZS1ub3MiO3M6NDoidGV4dCI7czoyMTA6IjxwPjxzdHJvbmc+RW5kZXJlw6dvPC9zdHJvbmc+PGJyIC8+QXYuIFBhdWxpc3RhLCAxMjM0NTY8YnIgLz5Tw6NvIFBhdWxvLCBTUCwgQ0VQOiAwMTMxMS0zMDA8L3A+PHA+PHN0cm9uZz5Ib3LDoXJpbzwvc3Ryb25nPjxiciAvPlNlZ3VuZGEmbWRhc2g7c2V4dGE6IDloJm5kYXNoOzE3aDxiciAvPlPDoWJhZG9zICZhbXA7IGRvbWluZ29zOiAxMWgmbmRhc2g7MTVoPC9wPiI7fQ==",\n            "title": "Encontre-nos",\n            "is_widget_customizer_js_value": true,\n            "instance_hash_key": "b067f166b6f790761eebf8d9f5d3d87f"\n        },\n        "type": "option",\n        "user_id": 1\n    },\n    "widget_search[3]": {\n        "starter_content": true,\n        "value": {\n            "encoded_serialized_instance": "YToxOntzOjU6InRpdGxlIjtzOjU6IkJ1c2NhIjt9",\n            "title": "Busca",\n            "is_widget_customizer_js_value": true,\n            "instance_hash_key": "50eb285bf24e0ee611a81f541d7dc729"\n        },\n        "type": "option",\n        "user_id": 1\n    },\n    "widget_text[3]": {\n        "starter_content": true,\n        "value": {\n            "encoded_serialized_instance": "YToyOntzOjU6InRpdGxlIjtzOjE1OiJTb2JyZSBlc3RlIHNpdGUiO3M6NDoidGV4dCI7czo4NjoiRXN0ZSBwb2RlIHNlciB1bSBib20gbHVnYXIgcGFyYSBzZSBhcHJlc2VudGFyLCBmYWxhciBkbyBzZXUgc2l0ZSBvdSBpbmNsdWlyIGNyw6lkaXRvcy4iO30=",\n            "title": "Sobre este site",\n            "is_widget_customizer_js_value": true,\n            "instance_hash_key": "9ae0ef6f0deeb4edaffdc4936d2c4b38"\n        },\n        "type": "option",\n        "user_id": 1\n    },\n    "sidebars_widgets[sidebar-1]": {\n        "starter_content": true,\n        "value": [\n            "text-2",\n            "search-3",\n            "text-3"\n        ],\n        "type": "option",\n        "user_id": 1\n    },\n    "widget_text[4]": {\n        "starter_content": true,\n        "value": {\n            "encoded_serialized_instance": "YToyOntzOjU6InRpdGxlIjtzOjEyOiJFbmNvbnRyZS1ub3MiO3M6NDoidGV4dCI7czoyMTA6IjxwPjxzdHJvbmc+RW5kZXJlw6dvPC9zdHJvbmc+PGJyIC8+QXYuIFBhdWxpc3RhLCAxMjM0NTY8YnIgLz5Tw6NvIFBhdWxvLCBTUCwgQ0VQOiAwMTMxMS0zMDA8L3A+PHA+PHN0cm9uZz5Ib3LDoXJpbzwvc3Ryb25nPjxiciAvPlNlZ3VuZGEmbWRhc2g7c2V4dGE6IDloJm5kYXNoOzE3aDxiciAvPlPDoWJhZG9zICZhbXA7IGRvbWluZ29zOiAxMWgmbmRhc2g7MTVoPC9wPiI7fQ==",\n            "title": "Encontre-nos",\n            "is_widget_customizer_js_value": true,\n            "instance_hash_key": "b067f166b6f790761eebf8d9f5d3d87f"\n        },\n        "type": "option",\n        "user_id": 1\n    },\n    "sidebars_widgets[sidebar-2]": {\n        "starter_content": true,\n        "value": [\n            "text-4"\n        ],\n        "type": "option",\n        "user_id": 1\n    },\n    "widget_text[5]": {\n        "starter_content": true,\n        "value": {\n            "encoded_serialized_instance": "YToyOntzOjU6InRpdGxlIjtzOjE1OiJTb2JyZSBlc3RlIHNpdGUiO3M6NDoidGV4dCI7czo4NjoiRXN0ZSBwb2RlIHNlciB1bSBib20gbHVnYXIgcGFyYSBzZSBhcHJlc2VudGFyLCBmYWxhciBkbyBzZXUgc2l0ZSBvdSBpbmNsdWlyIGNyw6lkaXRvcy4iO30=",\n            "title": "Sobre este site",\n            "is_widget_customizer_js_value": true,\n            "instance_hash_key": "9ae0ef6f0deeb4edaffdc4936d2c4b38"\n        },\n        "type": "option",\n        "user_id": 1\n    },\n    "widget_search[4]": {\n        "starter_content": true,\n        "value": {\n            "encoded_serialized_instance": "YToxOntzOjU6InRpdGxlIjtzOjU6IkJ1c2NhIjt9",\n            "title": "Busca",\n            "is_widget_customizer_js_value": true,\n            "instance_hash_key": "50eb285bf24e0ee611a81f541d7dc729"\n        },\n        "type": "option",\n        "user_id": 1\n    },\n    "sidebars_widgets[sidebar-3]": {\n        "starter_content": true,\n        "value": [\n            "text-5",\n            "search-4"\n        ],\n        "type": "option",\n        "user_id": 1\n    },\n    "nav_menus_created_posts": {\n        "starter_content": true,\n        "value": [\n            4,\n            5,\n            6,\n            7,\n            8,\n            9,\n            10,\n            11\n        ],\n        "type": "option",\n        "user_id": 1\n    },\n    "nav_menu[-1]": {\n        "starter_content": true,\n        "value": {\n            "name": "Top Menu"\n        },\n        "type": "nav_menu",\n        "user_id": 1\n    },\n    "nav_menu_item[-1]": {\n        "starter_content": true,\n        "value": {\n            "type": "custom",\n            "title": "P\\u00e1gina inicial",\n            "url": "http://127.0.0.1/brainvest/montblanc",\n            "position": 0,\n            "nav_menu_term_id": -1,\n            "object_id": 0\n        },\n        "type": "nav_menu_item",\n        "user_id": 1\n    },\n    "nav_menu_item[-2]": {\n        "starter_content": true,\n        "value": {\n            "type": "post_type",\n            "object": "page",\n            "object_id": 8,\n            "position": 1,\n            "nav_menu_term_id": -1,\n            "title": "Sobre"\n        },\n        "type": "nav_menu_item",\n        "user_id": 1\n    },\n    "nav_menu_item[-3]": {\n        "starter_content": true,\n        "value": {\n            "type": "post_type",\n            "object": "page",\n            "object_id": 10,\n            "position": 2,\n            "nav_menu_term_id": -1,\n            "title": "Blog"\n        },\n        "type": "nav_menu_item",\n        "user_id": 1\n    },\n    "nav_menu_item[-4]": {\n        "starter_content": true,\n        "value": {\n            "type": "post_type",\n            "object": "page",\n            "object_id": 9,\n            "position": 3,\n            "nav_menu_term_id": -1,\n            "title": "Contato"\n        },\n        "type": "nav_menu_item",\n        "user_id": 1\n    },\n    "twentyseventeen::nav_menu_locations[top]": {\n        "starter_content": true,\n        "value": -1,\n        "type": "theme_mod",\n        "user_id": 1\n    },\n    "nav_menu[-5]": {\n        "starter_content": true,\n        "value": {\n            "name": "Social Links Menu"\n        },\n        "type": "nav_menu",\n        "user_id": 1\n    },\n    "nav_menu_item[-5]": {\n        "starter_content": true,\n        "value": {\n            "title": "Yelp",\n            "url": "https://www.yelp.com",\n            "position": 0,\n            "nav_menu_term_id": -5,\n            "object_id": 0\n        },\n        "type": "nav_menu_item",\n        "user_id": 1\n    },\n    "nav_menu_item[-6]": {\n        "starter_content": true,\n        "value": {\n            "title": "Facebook",\n            "url": "https://www.facebook.com/wordpress",\n            "position": 1,\n            "nav_menu_term_id": -5,\n            "object_id": 0\n        },\n        "type": "nav_menu_item",\n        "user_id": 1\n    },\n    "nav_menu_item[-7]": {\n        "starter_content": true,\n        "value": {\n            "title": "Twitter",\n            "url": "https://twitter.com/wordpress",\n            "position": 2,\n            "nav_menu_term_id": -5,\n            "object_id": 0\n        },\n        "type": "nav_menu_item",\n        "user_id": 1\n    },\n    "nav_menu_item[-8]": {\n        "starter_content": true,\n        "value": {\n            "title": "Instagram",\n            "url": "https://www.instagram.com/explore/tags/wordcamp/",\n            "position": 3,\n            "nav_menu_term_id": -5,\n            "object_id": 0\n        },\n        "type": "nav_menu_item",\n        "user_id": 1\n    },\n    "nav_menu_item[-9]": {\n        "starter_content": true,\n        "value": {\n            "title": "Email",\n            "url": "mailto:wordpress@example.com",\n            "position": 4,\n            "nav_menu_term_id": -5,\n            "object_id": 0\n        },\n        "type": "nav_menu_item",\n        "user_id": 1\n    },\n    "twentyseventeen::nav_menu_locations[social]": {\n        "starter_content": true,\n        "value": -5,\n        "type": "theme_mod",\n        "user_id": 1\n    },\n    "show_on_front": {\n        "starter_content": true,\n        "value": "page",\n        "type": "option",\n        "user_id": 1\n    },\n    "page_on_front": {\n        "starter_content": true,\n        "value": 7,\n        "type": "option",\n        "user_id": 1\n    },\n    "page_for_posts": {\n        "starter_content": true,\n        "value": 10,\n        "type": "option",\n        "user_id": 1\n    },\n    "twentyseventeen::panel_1": {\n        "starter_content": true,\n        "value": 11,\n        "type": "theme_mod",\n        "user_id": 1\n    },\n    "twentyseventeen::panel_2": {\n        "starter_content": true,\n        "value": 8,\n        "type": "theme_mod",\n        "user_id": 1\n    },\n    "twentyseventeen::panel_3": {\n        "starter_content": true,\n        "value": 10,\n        "type": "theme_mod",\n        "user_id": 1\n    },\n    "twentyseventeen::panel_4": {\n        "starter_content": true,\n        "value": 9,\n        "type": "theme_mod",\n        "user_id": 1\n    }\n}', '', '', 'auto-draft', 'closed', 'closed', '', 'cf2621db-c41b-4bac-b169-cefb7892da1d', '', '', '2017-02-01 23:33:07', '0000-00-00 00:00:00', '', 0, 'http://127.0.0.1/edsa-mb/?p=12', 0, 'customize_changeset', '', 0),
(13, 1, '2017-02-01 23:35:17', '2017-02-02 01:35:17', '{\n    "cpotheme_settings[general_editlinks]": {\n        "value": true,\n        "type": "option",\n        "user_id": 1\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '1a59452b-3b3f-4760-b4ad-ed4fd0d3902b', '', '', '2017-02-01 23:35:17', '2017-02-02 01:35:17', '', 0, 'http://127.0.0.1/edsa-mb/2017/02/01/1a59452b-3b3f-4760-b4ad-ed4fd0d3902b/', 0, 'customize_changeset', '', 0),
(14, 1, '2017-02-01 23:36:03', '0000-00-00 00:00:00', '{\n    "blogdescription": {\n        "value": "asset management",\n        "type": "option",\n        "user_id": 1\n    },\n    "cpotheme_settings[general_logo]": {\n        "value": "http://127.0.0.1/brainvest/montblanc/wp-content/uploads/2017/02/download.png",\n        "type": "option",\n        "user_id": 1\n    }\n}', '', '', 'auto-draft', 'closed', 'closed', '', 'bacde12b-eef8-4570-ac32-76d01d64b79b', '', '', '2017-02-01 23:36:54', '2017-02-02 01:36:54', '', 0, 'http://127.0.0.1/edsa-mb/?p=14', 0, 'customize_changeset', '', 0),
(15, 1, '2017-02-01 23:36:37', '2017-02-02 01:36:37', '', 'download', '', 'inherit', 'open', 'closed', '', 'download', '', '', '2017-02-01 23:36:37', '2017-02-02 01:36:37', '', 0, 'http://127.0.0.1/edsa-mb/wp-content/uploads/2017/02/download.png', 0, 'attachment', 'image/png', 0),
(16, 1, '2017-02-01 23:39:01', '2017-02-02 01:39:01', '', 'logoMontBlanc', '', 'inherit', 'open', 'closed', '', 'logomontblanc', '', '', '2017-02-01 23:42:13', '2017-02-02 01:42:13', '', 0, 'http://127.0.0.1/edsa-mb/wp-content/uploads/2017/02/logoMontBlanc.png', 0, 'attachment', 'image/png', 0),
(17, 1, '2017-02-01 23:50:16', '2017-02-02 01:50:16', '{\n    "cpotheme_settings[general_logo]": {\n        "value": "http://127.0.0.1/brainvest/montblanc/wp-content/uploads/2017/02/logoMontBlanc-e1485999728303.png",\n        "type": "option",\n        "user_id": 1\n    },\n    "cpotheme_settings[general_logo_width]": {\n        "value": "300",\n        "type": "option",\n        "user_id": 1\n    },\n    "cpotheme_settings[general_texttitle]": {\n        "value": false,\n        "type": "option",\n        "user_id": 1\n    },\n    "blogdescription": {\n        "value": "asset management",\n        "type": "option",\n        "user_id": 1\n    },\n    "site_icon": {\n        "value": 19,\n        "type": "option",\n        "user_id": 1\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '3285bbe6-5f3c-4c3f-846d-14983692f991', '', '', '2017-02-01 23:50:16', '2017-02-02 01:50:16', '', 0, 'http://127.0.0.1/edsa-mb/?p=17', 0, 'customize_changeset', '', 0),
(18, 1, '2017-02-01 23:49:36', '2017-02-02 01:49:36', '', 'icon', '', 'inherit', 'open', 'closed', '', 'icon', '', '', '2017-02-01 23:49:36', '2017-02-02 01:49:36', '', 0, 'http://127.0.0.1/edsa-mb/wp-content/uploads/2017/02/icon.png', 0, 'attachment', 'image/png', 0),
(19, 1, '2017-02-01 23:49:50', '2017-02-02 01:49:50', 'http://127.0.0.1/edsa-mb/wp-content/uploads/2017/02/cropped-icon.png', 'cropped-icon.png', '', 'inherit', 'open', 'closed', '', 'cropped-icon-png', '', '', '2017-02-01 23:49:50', '2017-02-02 01:49:50', '', 0, 'http://127.0.0.1/edsa-mb/wp-content/uploads/2017/02/cropped-icon.png', 0, 'attachment', 'image/png', 0),
(20, 1, '2017-02-01 23:56:26', '2017-02-02 01:56:26', '', '“Mountains have a way of dealing with overconfidence”, said Nemann Buhl.', '', 'publish', 'closed', 'closed', '', 'and-we-believe', '', '', '2017-02-02 00:00:43', '2017-02-02 02:00:43', '', 0, 'http://127.0.0.1/edsa-mb/?post_type=cpo_slide&#038;p=20', 1, 'cpo_slide', '', 0),
(24, 1, '2017-02-02 00:01:54', '2017-02-02 02:01:54', '<span style="font-weight: 400;">About Us</span>', 'About Us', '', 'publish', 'closed', 'closed', '', 'about-us', '', '', '2017-02-02 00:01:54', '2017-02-02 02:01:54', '', 0, 'http://127.0.0.1/edsa-mb/?page_id=24', 1, 'page', '', 0),
(21, 1, '2017-02-01 23:55:44', '2017-02-02 01:55:44', '', 'slide-01', '', 'inherit', 'open', 'closed', '', 'slide-01', '', '', '2017-02-01 23:55:44', '2017-02-02 01:55:44', '', 20, 'http://127.0.0.1/edsa-mb/wp-content/uploads/2017/02/slide-01-1.jpg', 0, 'attachment', 'image/jpeg', 0),
(22, 1, '2017-02-01 23:59:58', '2017-02-02 01:59:58', '', 'THAT TO REACH THE TOP, WE MUST HAVE A SMART STRATEGY AND, MOST IMPORTANT OF ALL, HUMILITY.', '', 'publish', 'closed', 'closed', '', 'that-to-reach-the-top-we-must-have-a-smart-strategy-and-most-important-of-all-humility', '', '', '2017-02-02 00:00:14', '2017-02-02 02:00:14', '', 0, 'http://127.0.0.1/edsa-mb/?post_type=cpo_slide&#038;p=22', 2, 'cpo_slide', '', 0),
(23, 1, '2017-02-01 23:59:53', '2017-02-02 01:59:53', '', 'slide-02', '', 'inherit', 'open', 'closed', '', 'slide-02', '', '', '2017-02-01 23:59:53', '2017-02-02 01:59:53', '', 22, 'http://127.0.0.1/edsa-mb/wp-content/uploads/2017/02/slide-02.jpg', 0, 'attachment', 'image/jpeg', 0),
(25, 1, '2017-02-02 00:01:54', '2017-02-02 02:01:54', '<span style="font-weight: 400;">About Us</span>', 'About Us', '', 'inherit', 'closed', 'closed', '', '24-revision-v1', '', '', '2017-02-02 00:01:54', '2017-02-02 02:01:54', '', 24, 'http://127.0.0.1/edsa-mb/2017/02/02/24-revision-v1/', 0, 'revision', '', 0),
(26, 1, '2017-02-02 00:03:41', '2017-02-02 02:03:41', '{\n    "allegiant::nav_menu_locations[top_menu]": {\n        "value": -1789261878,\n        "type": "theme_mod",\n        "user_id": 1\n    },\n    "allegiant::nav_menu_locations[footer_menu]": {\n        "value": -1789261878,\n        "type": "theme_mod",\n        "user_id": 1\n    },\n    "nav_menu[-1789261878]": {\n        "value": {\n            "name": "Menu",\n            "description": "",\n            "parent": 0,\n            "auto_add": false\n        },\n        "type": "nav_menu",\n        "user_id": 1\n    },\n    "nav_menu_item[-811659132]": {\n        "value": {\n            "object_id": 24,\n            "object": "page",\n            "menu_item_parent": 0,\n            "position": 1,\n            "type": "post_type",\n            "title": "About Us",\n            "url": "http://127.0.0.1/brainvest/montblanc/about-us/",\n            "target": "",\n            "attr_title": "",\n            "description": "",\n            "classes": "",\n            "xfn": "",\n            "status": "publish",\n            "original_title": "About Us",\n            "nav_menu_term_id": -1789261878,\n            "_invalid": false,\n            "type_label": "P\\u00e1gina"\n        },\n        "type": "nav_menu_item",\n        "user_id": 1\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '286ce79c-d274-4d7f-9440-f41eb626a98c', '', '', '2017-02-02 00:03:41', '2017-02-02 02:03:41', '', 0, 'http://127.0.0.1/edsa-mb/2017/02/02/286ce79c-d274-4d7f-9440-f41eb626a98c/', 0, 'customize_changeset', '', 0),
(27, 1, '2017-02-02 00:03:41', '2017-02-02 02:03:41', ' ', '', '', 'publish', 'closed', 'closed', '', '27', '', '', '2017-02-02 00:03:41', '2017-02-02 02:03:41', '', 0, 'http://127.0.0.1/edsa-mb/2017/02/02/27/', 1, 'nav_menu_item', '', 0),
(28, 1, '2017-02-02 00:04:18', '2017-02-02 02:04:18', '{\n    "allegiant::nav_menu_locations[top_menu]": {\n        "value": 0,\n        "type": "theme_mod",\n        "user_id": 1\n    },\n    "allegiant::nav_menu_locations[main_menu]": {\n        "value": 2,\n        "type": "theme_mod",\n        "user_id": 1\n    }\n}', '', '', 'trash', 'closed', 'closed', '', 'a889c195-ab57-4b9d-b510-8eef64049c81', '', '', '2017-02-02 00:04:18', '2017-02-02 02:04:18', '', 0, 'http://127.0.0.1/edsa-mb/2017/02/02/a889c195-ab57-4b9d-b510-8eef64049c81/', 0, 'customize_changeset', '', 0),
(29, 1, '2017-02-02 00:05:54', '2017-02-02 02:05:54', '{\n    "nav_menu_item[-142158266]": {\n        "value": {\n            "object_id": 2,\n            "object": "page",\n            "menu_item_parent": 0,\n            "position": 2,\n            "type": "post_type",\n            "title": "Our Services",\n            "url": "http://127.0.0.1/brainvest/montblanc/pagina-exemplo/",\n            "target": "",\n            "attr_title": "",\n            "description": "",\n            "classes": "",\n            "xfn": "",\n            "status": "publish",\n            "original_title": "P\\u00e1gina de Exemplo",\n            "nav_menu_term_id": 2,\n            "_invalid": false,\n            "type_label": "P\\u00e1gina"\n        },\n        "type": "nav_menu_item",\n        "user_id": 1\n    },\n    "nav_menus_created_posts": {\n        "value": [\n            30\n        ],\n        "type": "option",\n        "user_id": 1\n    },\n    "nav_menu_item[-1955947251]": {\n        "value": {\n            "object_id": 2,\n            "object": "page",\n            "menu_item_parent": 0,\n            "position": 3,\n            "type": "post_type",\n            "title": "Our Solutions",\n            "url": "http://127.0.0.1/brainvest/montblanc/pagina-exemplo/",\n            "target": "",\n            "attr_title": "",\n            "description": "",\n            "classes": "",\n            "xfn": "",\n            "status": "publish",\n            "original_title": "P\\u00e1gina de Exemplo",\n            "nav_menu_term_id": 2,\n            "_invalid": false,\n            "type_label": "P\\u00e1gina"\n        },\n        "type": "nav_menu_item",\n        "user_id": 1\n    },\n    "nav_menu_item[-76583092]": {\n        "value": {\n            "object_id": 30,\n            "object": "page",\n            "menu_item_parent": 0,\n            "position": 4,\n            "type": "post_type",\n            "title": "Contact Us",\n            "url": "http://127.0.0.1/brainvest/montblanc/?page_id=30",\n            "target": "",\n            "attr_title": "",\n            "description": "",\n            "classes": "",\n            "xfn": "",\n            "status": "publish",\n            "original_title": "Contact Us",\n            "nav_menu_term_id": 2,\n            "_invalid": false,\n            "type_label": "P\\u00e1gina"\n        },\n        "type": "nav_menu_item",\n        "user_id": 1\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '19d78de4-2052-4130-a1a8-412a2dbc209d', '', '', '2017-02-02 00:05:54', '2017-02-02 02:05:54', '', 0, 'http://127.0.0.1/edsa-mb/?p=29', 0, 'customize_changeset', '', 0),
(30, 1, '2017-02-02 00:05:54', '2017-02-02 02:05:54', '', 'Contact Us', '', 'publish', 'closed', 'closed', '', 'contact-us', '', '', '2017-02-02 00:05:54', '2017-02-02 02:05:54', '', 0, 'http://127.0.0.1/edsa-mb/?page_id=30', 0, 'page', '', 0),
(31, 1, '2017-02-02 00:05:54', '2017-02-02 02:05:54', '', 'Our Services', '', 'publish', 'closed', 'closed', '', 'our-services', '', '', '2017-02-02 00:05:54', '2017-02-02 02:05:54', '', 0, 'http://127.0.0.1/edsa-mb/2017/02/02/our-services/', 2, 'nav_menu_item', '', 0),
(32, 1, '2017-02-02 00:05:54', '2017-02-02 02:05:54', '', 'Contact Us', '', 'inherit', 'closed', 'closed', '', '30-revision-v1', '', '', '2017-02-02 00:05:54', '2017-02-02 02:05:54', '', 30, 'http://127.0.0.1/edsa-mb/2017/02/02/30-revision-v1/', 0, 'revision', '', 0),
(33, 1, '2017-02-02 00:05:54', '2017-02-02 02:05:54', '', 'Our Solutions', '', 'publish', 'closed', 'closed', '', 'our-solutions', '', '', '2017-02-02 00:05:54', '2017-02-02 02:05:54', '', 0, 'http://127.0.0.1/edsa-mb/2017/02/02/our-solutions/', 3, 'nav_menu_item', '', 0),
(34, 1, '2017-02-02 00:05:54', '2017-02-02 02:05:54', ' ', '', '', 'publish', 'closed', 'closed', '', '34', '', '', '2017-02-02 00:05:54', '2017-02-02 02:05:54', '', 0, 'http://127.0.0.1/edsa-mb/2017/02/02/34/', 4, 'nav_menu_item', '', 0),
(35, 1, '2017-02-02 12:05:54', '2017-02-02 14:05:54', '{\n    "cpotheme_settings[general_logo]": {\n        "value": "http://127.0.0.1/edsa-mb/wp-content/uploads/2017/02/logoMontBlanc-e1485999728303.png",\n        "type": "option",\n        "user_id": 1\n    }\n}', '', '', 'trash', 'closed', 'closed', '', 'a0e96f53-6732-4370-af82-39342e4d4b72', '', '', '2017-02-02 12:05:54', '2017-02-02 14:05:54', '', 0, 'http://127.0.0.1/edsa-mb/?p=35', 0, 'customize_changeset', '', 0),
(36, 1, '2017-02-02 12:09:36', '2017-02-02 14:09:36', 'Willingness to develop and invest in differentiated asset classes and in opportunities normally out of the sight of investors', 'INVESTMENT STRATEGY', '', 'publish', 'closed', 'closed', '', 'investment-strategy', '', '', '2017-02-02 12:09:36', '2017-02-02 14:09:36', '', 0, 'http://127.0.0.1/edsa-mb/?post_type=cpo_feature&#038;p=36', 1, 'cpo_feature', '', 0),
(37, 1, '2017-02-02 12:10:37', '2017-02-02 14:10:37', 'Dynamic, fast, and hands-on evaluation process of searching and developing investment opportunities', 'EVALUATION PROCESS', '', 'publish', 'closed', 'closed', '', 'evaluation-process', '', '', '2017-02-02 12:10:37', '2017-02-02 14:10:37', '', 0, 'http://127.0.0.1/edsa-mb/?post_type=cpo_feature&#038;p=37', 2, 'cpo_feature', '', 0),
(38, 1, '2017-02-02 12:51:12', '2017-02-02 14:51:12', 'Disciplined asset allocation with a focus on innovative, unique and opportunistic strategies', 'ASSET ALLOCATION', '', 'publish', 'closed', 'closed', '', 'asset-allocation', '', '', '2017-02-02 12:51:12', '2017-02-02 14:51:12', '', 0, 'http://127.0.0.1/edsa-mb/?post_type=cpo_feature&#038;p=38', 3, 'cpo_feature', '', 0),
(39, 1, '2017-02-02 12:51:56', '2017-02-02 14:51:56', 'Actively participates in the investment committees or board of directors of all assets in the portfolio', 'INVESTMENT GUARANTEE', '', 'publish', 'closed', 'closed', '', 'investment-guarantee', '', '', '2017-02-02 12:51:56', '2017-02-02 14:51:56', '', 0, 'http://127.0.0.1/edsa-mb/?post_type=cpo_feature&#038;p=39', 4, 'cpo_feature', '', 0),
(40, 1, '2017-02-02 12:53:36', '2017-02-02 14:53:36', '{\n    "cpotheme_settings[home_features]": {\n        "value": "OUR STRATEGIC APPROACH",\n        "type": "option",\n        "user_id": 1\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '2ab2ea9a-110a-4ef1-9943-28a9363f76fd', '', '', '2017-02-02 12:53:36', '2017-02-02 14:53:36', '', 0, 'http://127.0.0.1/edsa-mb/2017/02/02/2ab2ea9a-110a-4ef1-9943-28a9363f76fd/', 0, 'customize_changeset', '', 0),
(41, 1, '2017-02-02 13:19:37', '2017-02-02 15:19:37', '{\n    "cpotheme_settings[home_services]": {\n        "value": "OUR SOLUTION",\n        "type": "option",\n        "user_id": 1\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '07a6de9a-b818-4581-9dbe-50971fad1ec1', '', '', '2017-02-02 13:19:37', '2017-02-02 15:19:37', '', 0, 'http://127.0.0.1/edsa-mb/2017/02/02/07a6de9a-b818-4581-9dbe-50971fad1ec1/', 0, 'customize_changeset', '', 0),
(42, 1, '2017-02-02 13:20:43', '2017-02-02 15:20:43', 'Swiss Company investing exclusively in US multifamily housing. Focus on assets for medium/low income population in markets with employment growth ​and limited offer', 'VARIA U.S. PROPERTIES AG', '', 'publish', 'closed', 'closed', '', 'varia-u-s-properties-ag', '', '', '2017-02-02 15:06:03', '2017-02-02 17:06:03', '', 0, 'http://127.0.0.1/edsa-mb/?post_type=cpo_service&#038;p=42', 0, 'cpo_service', '', 0),
(43, 1, '2017-02-02 13:21:02', '2017-02-02 15:21:02', 'Acquisition of Hotel properties (5 and 4 star hotels). ​Structure SICAV – SIF. Domicile Luxembourg', 'AINA INVESTMENT FUND', '', 'publish', 'closed', 'closed', '', 'aina-investment-fund', '', '', '2017-02-02 15:03:33', '2017-02-02 17:03:33', '', 0, 'http://127.0.0.1/edsa-mb/?post_type=cpo_service&#038;p=43', 0, 'cpo_service', '', 0),
(44, 1, '2017-02-02 13:21:18', '2017-02-02 15:21:18', 'Early-stage capital-efficient software companies in and around the Internet, primarily in these focus areas: Cybersecurity, Cloud Computing, SaaS ​(Software-as-a-Service), Big Data and Internet of Things, mostly deep-technology B2B portfolio companies.', 'YL VENTURES', '', 'publish', 'closed', 'closed', '', 'yl-ventures', '', '', '2017-02-02 15:02:01', '2017-02-02 17:02:01', '', 0, 'http://127.0.0.1/edsa-mb/?post_type=cpo_service&#038;p=44', 0, 'cpo_service', '', 0),
(45, 1, '2017-02-02 13:21:34', '2017-02-02 15:21:34', 'New player in the market and is a result of the combination of a team of experienced professionals (involved in the project since 2008) supported by a group of unique investors\r\n• Project is ready to be launched.', 'NOVOCIM', '', 'publish', 'closed', 'closed', '', 'novocim', '', '', '2017-02-02 15:01:14', '2017-02-02 17:01:14', '', 0, 'http://127.0.0.1/edsa-mb/?post_type=cpo_service&#038;p=45', 0, 'cpo_service', '', 0),
(46, 1, '2017-02-02 13:21:50', '2017-02-02 15:21:50', 'Investment in the underserved, fundamentally strong Mountain West region in Seed &amp; Series A companies with outsized potential for returns.', 'VENTURE CAPITAL', '', 'publish', 'closed', 'closed', '', 'venture-capital', '', '', '2017-02-02 14:59:36', '2017-02-02 16:59:36', '', 0, 'http://127.0.0.1/edsa-mb/?post_type=cpo_service&#038;p=46', 0, 'cpo_service', '', 0),
(47, 1, '2017-02-02 13:22:13', '2017-02-02 15:22:13', 'Unique buying opportunity in a growing economy &amp; recovering real estate market. <strong>IRR between 15% to 25% within 3-4 years</strong>', 'VARIA SPAIN', '', 'publish', 'closed', 'closed', '', 'varia-spain', '', '', '2017-02-02 14:59:05', '2017-02-02 16:59:05', '', 0, 'http://127.0.0.1/edsa-mb/?post_type=cpo_service&#038;p=47', 0, 'cpo_service', '', 0),
(48, 1, '2017-02-02 13:24:30', '2017-02-02 15:24:30', '{\n    "cpotheme_settings[home_tagline]": {\n        "value": "\\u201cMOUNTAINS HAVE A WAY OF DEALING WITH OVERCONFIDENCE\\u201d",\n        "type": "option",\n        "user_id": 1\n    }\n}', '', '', 'trash', 'closed', 'closed', '', 'e4951741-682b-4998-a187-7524e7a7f108', '', '', '2017-02-02 13:24:30', '2017-02-02 15:24:30', '', 0, 'http://127.0.0.1/edsa-mb/?p=48', 0, 'customize_changeset', '', 0),
(49, 1, '2017-02-02 13:25:07', '0000-00-00 00:00:00', '', 'Rascunho automático', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2017-02-02 13:25:07', '0000-00-00 00:00:00', '', 0, 'http://127.0.0.1/edsa-mb/?post_type=cpo_service&p=49', 0, 'cpo_service', '', 0),
(50, 1, '2017-02-02 13:28:15', '2017-02-02 15:28:15', '{\n    "show_on_front": {\n        "value": "posts",\n        "type": "option",\n        "user_id": 1\n    },\n    "cpotheme_settings[home_posts]": {\n        "value": false,\n        "type": "option",\n        "user_id": 1\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '91cbdde9-1ec6-4b84-94cd-909948664c43', '', '', '2017-02-02 13:28:15', '2017-02-02 15:28:15', '', 0, 'http://127.0.0.1/edsa-mb/?p=50', 0, 'customize_changeset', '', 0),
(51, 1, '2017-02-02 14:42:17', '2017-02-02 16:42:17', '{\n    "allegiant::background_preset": {\n        "value": "default",\n        "type": "theme_mod",\n        "user_id": 1\n    },\n    "allegiant::background_position_x": {\n        "value": "center",\n        "type": "theme_mod",\n        "user_id": 1\n    },\n    "allegiant::background_size": {\n        "value": "auto",\n        "type": "theme_mod",\n        "user_id": 1\n    },\n    "cpotheme_settings[home_tagline]": {\n        "value": "",\n        "type": "option",\n        "user_id": 1\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '049fcb87-c195-445d-8a0d-be78a4caebbc', '', '', '2017-02-02 14:42:17', '2017-02-02 16:42:17', '', 0, 'http://127.0.0.1/edsa-mb/?p=51', 0, 'customize_changeset', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `wp_termmeta`
--

CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `wp_terms`
--

CREATE TABLE `wp_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Extraindo dados da tabela `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Sem categoria', 'sem-categoria', 0),
(2, 'Menu', 'menu', 0),
(3, 'Services', 'services', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `wp_term_relationships`
--

CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Extraindo dados da tabela `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0),
(27, 2, 0),
(31, 2, 0),
(33, 2, 0),
(34, 2, 0),
(47, 3, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `wp_term_taxonomy`
--

CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Extraindo dados da tabela `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 1),
(2, 2, 'nav_menu', '', 0, 4),
(3, 3, 'cpo_service_category', '', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `wp_usermeta`
--

CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Extraindo dados da tabela `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'rafaelkellows'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'comment_shortcuts', 'false'),
(7, 1, 'admin_color', 'fresh'),
(8, 1, 'use_ssl', '0'),
(9, 1, 'show_admin_bar_front', 'true'),
(10, 1, 'locale', ''),
(11, 1, 'wp_capabilities', 'a:1:{s:13:"administrator";b:1;}'),
(12, 1, 'wp_user_level', '10'),
(13, 1, 'dismissed_wp_pointers', ''),
(14, 1, 'show_welcome_panel', '1'),
(15, 1, 'session_tokens', 'a:4:{s:64:"ec6600850a17f82becbf5e4c097b2a64e7ab7ff2ed31ffcdd98d6bcea667a5a3";a:4:{s:10:"expiration";i:1487206753;s:2:"ip";s:9:"127.0.0.1";s:2:"ua";s:109:"Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36";s:5:"login";i:1485997153;}s:64:"0d7d6fb81aa12ca63a16927aa61a9d42c7a6c4167ef15063f74e95078caf6dfc";a:4:{s:10:"expiration";i:1486171971;s:2:"ip";s:9:"127.0.0.1";s:2:"ua";s:109:"Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36";s:5:"login";i:1485999171;}s:64:"b57e4bdc5c8e1999b1d4e974c0c94e4e143be0ecc022e4b8603c679f907093b4";a:4:{s:10:"expiration";i:1486217075;s:2:"ip";s:9:"127.0.0.1";s:2:"ua";s:109:"Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36";s:5:"login";i:1486044275;}s:64:"a5d5fa851ee68f962a77bcadbc8de9836d2511c48308221966f6a29dc356ae4b";a:4:{s:10:"expiration";i:1486226418;s:2:"ip";s:9:"127.0.0.1";s:2:"ua";s:109:"Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36";s:5:"login";i:1486053618;}}'),
(16, 1, 'wp_user-settings', 'libraryContent=browse&editor=tinymce'),
(17, 1, 'wp_user-settings-time', '1486048929'),
(18, 1, 'wp_dashboard_quick_press_last_post_id', '3'),
(19, 1, 'managenav-menuscolumnshidden', 'a:5:{i:0;s:11:"link-target";i:1;s:11:"css-classes";i:2;s:3:"xfn";i:3;s:11:"description";i:4;s:15:"title-attribute";}'),
(20, 1, 'metaboxhidden_nav-menus', 'a:9:{i:0;s:27:"add-post-type-cpo_portfolio";i:1;s:25:"add-post-type-cpo_service";i:2;s:22:"add-post-type-cpo_team";i:3;s:12:"add-post_tag";i:4;s:26:"add-cpo_portfolio_category";i:5;s:21:"add-cpo_portfolio_tag";i:6;s:24:"add-cpo_service_category";i:7;s:19:"add-cpo_service_tag";i:8;s:21:"add-cpo_team_category";}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `wp_users`
--

CREATE TABLE `wp_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Extraindo dados da tabela `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'rafaelkellows', '$P$B6BmaH70Yyz1AiYGMKcUso3exQUqCE/', 'rafaelkellows', 'rafaelkellows@hotmail.com', '', '2017-02-02 00:59:10', '', 0, 'rafaelkellows');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_comments`
--
ALTER TABLE `wp_comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- Indexes for table `wp_links`
--
ALTER TABLE `wp_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- Indexes for table `wp_options`
--
ALTER TABLE `wp_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Indexes for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_posts`
--
ALTER TABLE `wp_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- Indexes for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_terms`
--
ALTER TABLE `wp_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191));

--
-- Indexes for table `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Indexes for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Indexes for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_comments`
--
ALTER TABLE `wp_comments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wp_links`
--
ALTER TABLE `wp_links`
  MODIFY `link_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_options`
--
ALTER TABLE `wp_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
--
-- AUTO_INCREMENT for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT for table `wp_posts`
--
ALTER TABLE `wp_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wp_terms`
--
ALTER TABLE `wp_terms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  MODIFY `umeta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
