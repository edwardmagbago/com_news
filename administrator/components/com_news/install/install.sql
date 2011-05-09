-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2011 at 05:30 PM
-- Server version: 5.1.37
-- PHP Version: 5.2.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sandbox_nookuserver`
--

-- --------------------------------------------------------

--
-- Table structure for table `#__news_items`
--

DROP TABLE IF EXISTS `#__news_items`;
CREATE TABLE `#__news_items` (
  `news_item_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `introtext` text NOT NULL,
  `fulltext` text,
  `image` text,
  `catid` bigint(20) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '0',
  `access` int(11) NOT NULL DEFAULT '0',
  `ordering` bigint(20) unsigned NOT NULL,
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `metadesc` text,
  `metadata` text,
  `metakey` text,
  `hits` bigint(20) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`news_item_id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `#__news_items`
--

INSERT INTO `#__news_items` VALUES(1, 'news one', 'news_one', '', '', 'Aurora.jpg', 1, 0, 0, 1, '0000-00-00 00:00:00', 62, '2011-03-11 06:01:06', 62, '', '', '', 0, 0);
INSERT INTO `#__news_items` VALUES(2, 'news two', 'news_two', 'the news two', '', '', 1, 0, 0, 2, '0000-00-00 00:00:00', 62, '2011-03-11 06:08:32', 62, '', '', '', 0, 0);
INSERT INTO `#__news_items` VALUES(3, 'news three', 'news_three', 'the news three', '', '', 1, 0, 0, 3, '0000-00-00 00:00:00', 62, '2011-03-11 06:08:43', 62, '', '', '', 0, 0);
INSERT INTO `#__news_items` VALUES(10, 'title', 'title', 'dfsffsdf', 'sdfsdfds', '2011.jpg', 2, 0, 1, 6, '2011-03-04 08:45:12', 62, '2011-03-04 08:45:12', 62, 'sdffsdf', 'dsfdsfds', 'sdfdsfds', 0, 0);
INSERT INTO `#__news_items` VALUES(6, 'test 2', 'test-2', 'test 2 intro', 'test 2 full', '', 2, 1, 0, 4, '2011-03-04 05:35:03', 62, '2011-03-04 05:35:03', 62, 'desc', 'robot', 'key', 0, 0);
INSERT INTO `#__news_items` VALUES(11, 'Lorem', 'lorem', 'Lorem hehe', 'lorem hehe', 'Aurora.jpg', 2, 1, 2, 7, '2011-03-11 05:38:49', 62, '2011-03-11 05:38:49', 62, 'dfsdfsdf', 'sdfdfdsf', 'sdfsdfsdf', 0, 0);
INSERT INTO `#__news_items` VALUES(9, 'test 3', 'test-3', 'test 3 intro', 'test 3 full', '', 1, 1, 0, 5, '2011-03-04 05:39:18', 62, '2011-03-04 05:39:18', 62, '', '', '', 0, 0);

--
-- Table structure for table `#__news_categories`
--

DROP TABLE IF EXISTS `#__news_categories`;
CREATE TABLE `#__news_categories` (
  `news_category_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text,
  `params` text,
  `metadesc` text,
  `metakey` text,
  `metadata` text,
  `access` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `published_items` bigint(21) NOT NULL,
  `items` bigint(21) NOT NULL,
  PRIMARY KEY (`news_category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `#__news_categories`
--

INSERT INTO `#__news_categories` VALUES(1, 'Category One', 'category_one', 'Category one description', '', '', '', '', 0, 1, 3, 3);
INSERT INTO `#__news_categories` VALUES(2, 'Category Two', 'category_two', 'Category two description', '', '', '', '', 0, 1, 0, 0);

--
-- Dumping data for table `#__components`
--

INSERT INTO `#__components` VALUES('News', 'option=com_news', 0, 0, 'option=com_news', 'News', 'com_news', 0, 'js/ThemeOffice/component.png', 0, '', 1);
