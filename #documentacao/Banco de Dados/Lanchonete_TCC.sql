-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2019 at 10:03 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

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
CREATE DATABASE IF NOT EXISTS `mamaezona` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mamaezona`;

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(50) NOT NULL,
  `situacao` char(1) DEFAULT NULL,
  `descricao_cliente` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `consumo_interno`
--

CREATE TABLE `consumo_interno` (
  `id_funcionario` int(11) NOT NULL,
  `id_comanda_ci` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contas_pendentes`
--

CREATE TABLE `contas_pendentes` (
  `id_comanda_cp` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `estoque`
--

CREATE TABLE `estoque` (
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(30) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `marca` varchar(15) NOT NULL,
  `preco` decimal(5,2) NOT NULL,
  `quantia_min` int(11) NOT NULL,
  `quantia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `login` varchar(15) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `nivel_de_acesso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `historico`
--

CREATE TABLE `historico` (
  `quantia` int(11) NOT NULL,
  `id_comanda_f` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `venda`
--

CREATE TABLE `venda` (
  `id_comanda` int(11) NOT NULL,
  `data_atual` date NOT NULL,
  `hora` time NOT NULL,
  `valor` decimal(6,2) NOT NULL,
  `forma_de_pagamento` varchar(10) NOT NULL,
  `desconto` decimal(6,2) DEFAULT NULL,
  `acresimo` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `consumo_interno`
--
ALTER TABLE `consumo_interno`
  ADD KEY `id_funcionario` (`id_funcionario`),
  ADD KEY `id_comanda_ci` (`id_comanda_ci`);

--
-- Indexes for table `contas_pendentes`
--
ALTER TABLE `contas_pendentes`
  ADD KEY `id_comanda_cp` (`id_comanda_cp`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indexes for table `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id_produto`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Indexes for table `historico`
--
ALTER TABLE `historico`
  ADD KEY `id_comanda_f` (`id_comanda_f`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_comanda`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consumo_interno`
--
ALTER TABLE `consumo_interno`
  ADD CONSTRAINT `id_comanda_ci` FOREIGN KEY (`id_comanda_ci`) REFERENCES `venda` (`id_comanda`),
  ADD CONSTRAINT `id_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`);

--
-- Constraints for table `contas_pendentes`
--
ALTER TABLE `contas_pendentes`
  ADD CONSTRAINT `id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `id_comanda_cp` FOREIGN KEY (`id_comanda_cp`) REFERENCES `venda` (`id_comanda`);

--
-- Constraints for table `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `id_comanda_f` FOREIGN KEY (`id_comanda_f`) REFERENCES `venda` (`id_comanda`),
  ADD CONSTRAINT `id_produto` FOREIGN KEY (`id_produto`) REFERENCES `estoque` (`id_produto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
