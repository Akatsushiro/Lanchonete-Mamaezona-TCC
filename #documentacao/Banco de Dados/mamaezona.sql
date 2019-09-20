-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 20-Ago-2019 às 00:27
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mamaezona`
--
CREATE DATABASE IF NOT EXISTS `mamaezona` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `mamaezona`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(50) COLLATE utf8_bin NOT NULL,
  `situacao` char(1) COLLATE utf8_bin NOT NULL,
  `descricao_cliente` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `consumo_interno`
--

DROP TABLE IF EXISTS `consumo_interno`;
CREATE TABLE IF NOT EXISTS `consumo_interno` (
  `id_funcionario` int(11) NOT NULL,
  `id_comanda_ci` int(11) NOT NULL,
  KEY `id_funcionario` (`id_funcionario`),
  KEY `id_comanda_ci` (`id_comanda_ci`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_pendentes`
--

DROP TABLE IF EXISTS `contas_pendentes`;
CREATE TABLE IF NOT EXISTS `contas_pendentes` (
  `id_comanda_cp` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  KEY `id_comanda_cp` (`id_comanda_cp`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

DROP TABLE IF EXISTS `estoque`;
CREATE TABLE IF NOT EXISTS `estoque` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(30) COLLATE utf8_bin NOT NULL,
  `tipo` varchar(15) COLLATE utf8_bin NOT NULL,
  `marca` varchar(15) COLLATE utf8_bin NOT NULL,
  `preco` decimal(5,2) NOT NULL,
  `quantia_min` int(11) NOT NULL,
  `quantia` int(11) NOT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id_funcionario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(15) COLLATE utf8_bin NOT NULL,
  `senha` varchar(20) COLLATE utf8_bin NOT NULL,
  `nivel_de_acesso` int(11) NOT NULL,
  PRIMARY KEY (`id_funcionario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

DROP TABLE IF EXISTS `historico`;
CREATE TABLE IF NOT EXISTS `historico` (
  `quantia` int(11) NOT NULL,
  `id_comanda_h` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  KEY `id_comanda_h` (`id_comanda_h`),
  KEY `id_produto` (`id_produto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

DROP TABLE IF EXISTS `venda`;
CREATE TABLE IF NOT EXISTS `venda` (
  `id_comanda` int(11) NOT NULL AUTO_INCREMENT,
  `data_atual` date NOT NULL,
  `hora` time NOT NULL,
  `valor` decimal(6,2) NOT NULL,
  `forma_de_pagamento` varchar(10) COLLATE utf8_bin NOT NULL,
  `desconto` decimal(6,2) DEFAULT NULL,
  `acresimo` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`id_comanda`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
