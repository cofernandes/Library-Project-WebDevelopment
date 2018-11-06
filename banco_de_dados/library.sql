-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 05-Dez-2017 às 20:22
-- Versão do servidor: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--
CREATE DATABASE IF NOT EXISTS `library` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `library`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `idauthor` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`idauthor`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `author`
--

INSERT INTO `author` (`idauthor`, `name`) VALUES
(1, 'robert'),
(2, 'lucas pedro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `idbook` int(10) NOT NULL AUTO_INCREMENT,
  `author` int(10) NOT NULL,
  `publishingcompany` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `launchdate` date NOT NULL,
  `language` varchar(20) NOT NULL,
  `isbn` int(13) NOT NULL,
  `edition` int(10) NOT NULL,
  `page` int(5) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `readingtime` int(10) NOT NULL,
  PRIMARY KEY (`idbook`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `book`
--

INSERT INTO `book` (`idbook`, `author`, `publishingcompany`, `title`, `launchdate`, `language`, `isbn`, `edition`, `page`, `genre`, `readingtime`) VALUES
(1, 1, 2, 'leo', '1992-08-09', 'portugues', 2131231, 12, 233, 'war', 3),
(2, 2, 2, 'o rouxinol e o imperador da china', '1995-01-01', 'portugues', 123334, 1, 35, 'literatura', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `idlog` int(10) NOT NULL AUTO_INCREMENT,
  `iduser` int(10) NOT NULL,
  `datalog` date NOT NULL,
  `hourlog` time NOT NULL,
  `logtype` varchar(15) NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`idlog`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `log`
--

INSERT INTO `log` (`idlog`, `iduser`, `datalog`, `hourlog`, `logtype`, `comment`) VALUES
(1, 0, '2017-11-23', '15:16:09', 'LOGIN_SYSTEM', 'Connected to the system');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permission`
--

DROP TABLE IF EXISTS `permission`;
CREATE TABLE IF NOT EXISTS `permission` (
  `idpermission` int(10) NOT NULL AUTO_INCREMENT,
  `permission` varchar(50) NOT NULL,
  PRIMARY KEY (`idpermission`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `publishingcompany`
--

DROP TABLE IF EXISTS `publishingcompany`;
CREATE TABLE IF NOT EXISTS `publishingcompany` (
  `idpublishingcompany` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `neighborhood` varchar(100) DEFAULT NULL,
  `number` int(5) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zipcode` int(10) DEFAULT NULL,
  `cnpj` int(15) DEFAULT NULL,
  PRIMARY KEY (`idpublishingcompany`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `publishingcompany`
--

INSERT INTO `publishingcompany` (`idpublishingcompany`, `name`, `address`, `neighborhood`, `number`, `city`, `zipcode`, `cnpj`) VALUES
(1, 'lucas', 'meu', 'meu', 123, 'meu', 123, 1234),
(2, 'leo motta', 'endereco', 'bairro', 123, 'guarajuba', 1234, 123124);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rentals`
--

DROP TABLE IF EXISTS `rentals`;
CREATE TABLE IF NOT EXISTS `rentals` (
  `idrentals` int(10) NOT NULL AUTO_INCREMENT,
  `iduserreceived` int(10) NOT NULL,
  `iduserrented` int(10) NOT NULL,
  `idbook` int(10) NOT NULL,
  `rentdate` date NOT NULL,
  `whattime` int(3) NOT NULL,
  `returndate` date NOT NULL,
  `status` varchar(20) DEFAULT 'reserved',
  PRIMARY KEY (`idrentals`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `rentals`
--

INSERT INTO `rentals` (`idrentals`, `iduserreceived`, `iduserrented`, `idbook`, `rentdate`, `whattime`, `returndate`, `status`) VALUES
(5, 2, 1, 1, '2017-11-25', 3, '2017-11-28', 'delivered'),
(4, 2, 1, 2, '2017-11-25', 5, '2017-11-30', 'delivered'),
(6, 1, 1, 1, '2017-11-25', 3, '2017-11-28', 'delivered');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `profile` varchar(20) NOT NULL,
  `status` enum('A','B') DEFAULT 'A',
  PRIMARY KEY (`iduser`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`iduser`, `name`, `email`, `password`, `profile`, `status`) VALUES
(1, 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'root', 'A'),
(2, 'leo motta rocha', 'leomottarocha@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'client', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `userpermission`
--

DROP TABLE IF EXISTS `userpermission`;
CREATE TABLE IF NOT EXISTS `userpermission` (
  `iduser` int(10) NOT NULL,
  `idpermission` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
