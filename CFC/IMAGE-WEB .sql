-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014-03-08 06:48:11
-- 服务器版本: 5.5.35-0ubuntu0.13.10.2
-- PHP 版本: 5.5.3-1ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `IMAGE-WEB`
--

-- --------------------------------------------------------

--
-- 表的结构 `ADMIN`
--

CREATE TABLE IF NOT EXISTS `ADMIN` (
  `adID` int(11) NOT NULL AUTO_INCREMENT,
  `adName` varchar(255) NOT NULL,
  `adPassword` varchar(255) NOT NULL,
  PRIMARY KEY (`adID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `ADMIN`
--

INSERT INTO `ADMIN` (`adID`, `adName`, `adPassword`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- 表的结构 `AVS`
--

CREATE TABLE IF NOT EXISTS `AVS` (
  `AVID` int(11) NOT NULL AUTO_INCREMENT,
  `avTag` int(11) DEFAULT NULL,
  `avOutIMG` varchar(255) DEFAULT NULL,
  `avInIMG` varchar(255) NOT NULL,
  `avName` varchar(255) NOT NULL,
  `avSex` varchar(255) NOT NULL,
  `avBirth` varchar(255) NOT NULL,
  `avNationality` varchar(255) DEFAULT NULL,
  `avNation` varchar(255) DEFAULT NULL,
  `avProvince` varchar(255) DEFAULT NULL,
  `avIDcard` varchar(255) NOT NULL,
  `avAdrr` varchar(255) NOT NULL,
  `avPostCode` varchar(255) DEFAULT NULL,
  `avWeiBo` varchar(255) NOT NULL,
  `avQQEmail` varchar(255) NOT NULL,
  `avMobile` varchar(255) NOT NULL,
  `avPhone` varchar(255) NOT NULL,
  `avHight` varchar(255) NOT NULL,
  `avWeight` varchar(255) NOT NULL,
  `avFacePaint` int(11) DEFAULT NULL,
  `avColor` varchar(255) NOT NULL,
  `avEyeColor` varchar(255) NOT NULL,
  `avShoeSize` varchar(255) NOT NULL,
  `avSH` varchar(255) NOT NULL,
  `avButs` varchar(255) NOT NULL,
  `avWaist` varchar(255) NOT NULL,
  `avHips` varchar(255) NOT NULL,
  `avCup` varchar(255) NOT NULL,
  `avStyle` int(11) NOT NULL,
  `avWorkTime` varchar(255) NOT NULL,
  `avISAgree` int(11) NOT NULL,
  `avContent` text NOT NULL,
  `avDate` datetime DEFAULT NULL,
  PRIMARY KEY (`AVID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `MOVIES`
--

CREATE TABLE IF NOT EXISTS `MOVIES` (
  `movieID` int(11) NOT NULL AUTO_INCREMENT,
  `movieName` varchar(255) NOT NULL,
  `movieOutImg` varchar(255) NOT NULL,
  `movieTag` int(11) NOT NULL,
  `movieURL` varchar(255) NOT NULL,
  `movieContent` text NOT NULL,
  `movieDate` datetime NOT NULL,
  PRIMARY KEY (`movieID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `TEAMS`
--

CREATE TABLE IF NOT EXISTS `TEAMS` (
  `teamID` int(11) NOT NULL AUTO_INCREMENT,
  `teamName` varchar(255) NOT NULL,
  `teamIMG` varchar(255) NOT NULL,
  `teamJob` varchar(255) NOT NULL,
  `teamEmail` varchar(255) NOT NULL,
  `teamOther` text NOT NULL,
  PRIMARY KEY (`teamID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `TEAMS`
--

INSERT INTO `TEAMS` (`teamID`, `teamName`, `teamIMG`, `teamJob`, `teamEmail`, `teamOther`) VALUES
(1, '11', '11', '11', '11', '11'),
(2, 'gh', 'ff', 'ff', 'ff', 'ff'),
(3, 'r3', 'de', 'de', 'de', 'de');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
