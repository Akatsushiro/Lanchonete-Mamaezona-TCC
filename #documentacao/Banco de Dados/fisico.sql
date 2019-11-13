-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.38-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para mamaezona
CREATE DATABASE IF NOT EXISTS `mamaezona` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mamaezona`;

-- Copiando estrutura para tabela mamaezona.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(45) COLLATE utf8_bin NOT NULL,
  `situacao` char(1) COLLATE utf8_bin NOT NULL DEFAULT 'P' COMMENT 'Diz se o cliente tem dividas ativas.',
  `descricao` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `data_cliente` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'data do cadastro do cliente',
  `status_cliente` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'Diz se o cliente está ativo ou desativo',
  `tipo_cliente` char(1) COLLATE utf8_bin NOT NULL DEFAULT 'C' COMMENT 'se o cliente é mensal ou comum',
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Salva os clientes.\\nstatus representa se o cliente está ativo ou desativo.';

-- Copiando dados para a tabela mamaezona.cliente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`id_cliente`, `nome_cliente`, `situacao`, `descricao`, `data_cliente`, `status_cliente`, `tipo_cliente`) VALUES
	(1, 'Akatsu', 'N', 'Rua da frente', '2019-11-11 14:34:37', 0, 'C');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Copiando estrutura para tabela mamaezona.consumo_interno
CREATE TABLE IF NOT EXISTS `consumo_interno` (
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `funcionarios_id_funcionarios` int(11) NOT NULL,
  `vendas_id_vendas` int(11) NOT NULL,
  KEY `fk_consumo_interno_funcionarios1` (`funcionarios_id_funcionarios`),
  KEY `fk_consumo_interno_vendas1` (`vendas_id_vendas`),
  CONSTRAINT `fk_consumo_interno_funcionarios1` FOREIGN KEY (`funcionarios_id_funcionarios`) REFERENCES `funcionarios` (`id_funcionarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_consumo_interno_vendas1` FOREIGN KEY (`vendas_id_vendas`) REFERENCES `vendas` (`id_vendas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='vendas que vão para a conta do estabelecimento.';

-- Copiando dados para a tabela mamaezona.consumo_interno: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `consumo_interno` DISABLE KEYS */;
/*!40000 ALTER TABLE `consumo_interno` ENABLE KEYS */;

-- Copiando estrutura para tabela mamaezona.contas
CREATE TABLE IF NOT EXISTS `contas` (
  `cliente_id_cliente` int(11) NOT NULL,
  `vendas_id_vendas` int(11) NOT NULL,
  `data_mensal` timestamp NULL DEFAULT NULL,
  KEY `fk_contas_cliente` (`cliente_id_cliente`),
  KEY `fk_contas_vendas1` (`vendas_id_vendas`),
  CONSTRAINT `fk_contas_cliente` FOREIGN KEY (`cliente_id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_contas_vendas1` FOREIGN KEY (`vendas_id_vendas`) REFERENCES `vendas` (`id_vendas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='salva somente clientes que estão devendo.';

-- Copiando dados para a tabela mamaezona.contas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `contas` DISABLE KEYS */;
/*!40000 ALTER TABLE `contas` ENABLE KEYS */;

-- Copiando estrutura para tabela mamaezona.funcionarios
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `id_funcionarios` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8_bin NOT NULL,
  `login` varchar(20) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `perfil` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '../../img/funcionario/default.img',
  `senha` varchar(150) COLLATE utf8_bin NOT NULL,
  `chave` varchar(50) COLLATE utf8_bin NOT NULL,
  `acesso` char(2) COLLATE utf8_bin NOT NULL,
  `admitido` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dispensa` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_funcionarios`),
  UNIQUE KEY `email` (`email`,`login`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Salva os funcionarios, staus diz se o funcionario continua trabalhando ou se foi despensado.';

-- Copiando dados para a tabela mamaezona.funcionarios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `funcionarios` DISABLE KEYS */;
INSERT INTO `funcionarios` (`id_funcionarios`, `nome`, `login`, `email`, `perfil`, `senha`, `chave`, `acesso`, `admitido`, `dispensa`, `status`) VALUES
	(1, 'Patrick', 'Akatsu', 'patrickdantas999@gmail.com', '../../img/funcionario/default.img', '$argon2i$v=19$m=1024,t=2,p=2$djVRNWUuUHljREg1eTF0NQ$gAyWB+oJeOAw456Bm01JBO/UeZQ+m+REehkQEt9ucdA', '5c460b07e3bdfa8665f4f73239c43cc6', 'US', '2019-11-07 13:51:56', NULL, 1),
	(2, 'Matheus', 'Prometeus', 'mateus@felipe.og', '../../img/funcionario/default.img', '$argon2i$v=19$m=1024,t=2,p=2$ZjIzRzdJbWFvYVFjWnlqTA$IsqQ55v1Xcq0jWK7z7xLdK2UKchrqcY6WLyhZrYCiyA', 'ceaa4bf45850945295e2c9f8504df091', 'US', '2019-11-12 09:05:56', NULL, 1);
/*!40000 ALTER TABLE `funcionarios` ENABLE KEYS */;

-- Copiando estrutura para tabela mamaezona.historico
CREATE TABLE IF NOT EXISTS `historico` (
  `quantia` int(11) NOT NULL,
  `vendas_id_vendas` int(11) NOT NULL,
  `produto_id_produto` int(11) NOT NULL,
  KEY `fk_historico_produto` (`produto_id_produto`),
  KEY `fk_historico_vendas` (`vendas_id_vendas`),
  CONSTRAINT `fk_historico_produto` FOREIGN KEY (`produto_id_produto`) REFERENCES `produto` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_historico_vendas` FOREIGN KEY (`vendas_id_vendas`) REFERENCES `vendas` (`id_vendas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='salva os produtos que foram vendidos agrupando-os por venda.';

-- Copiando dados para a tabela mamaezona.historico: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `historico` DISABLE KEYS */;
/*!40000 ALTER TABLE `historico` ENABLE KEYS */;

-- Copiando estrutura para tabela mamaezona.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `imagem` varchar(50) NOT NULL DEFAULT '../../img/produto/default.png',
  `preco` decimal(6,2) NOT NULL,
  `custo` decimal(6,2) NOT NULL,
  `quantia` int(11) NOT NULL,
  `quantia_minima` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL DEFAULT 'cm',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_produto`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mamaezona.produto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` (`id_produto`, `nome`, `marca`, `imagem`, `preco`, `custo`, `quantia`, `quantia_minima`, `tipo`, `status`) VALUES
	(1, 'Hygor', 'Descrição', '../../img/produto/hygor.png', 12.00, 32.00, 23, 43, 'sfgv', 1);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;

-- Copiando estrutura para tabela mamaezona.vendas
CREATE TABLE IF NOT EXISTS `vendas` (
  `id_vendas` int(11) NOT NULL AUTO_INCREMENT,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valor` decimal(6,2) NOT NULL,
  `tipo` varchar(10) NOT NULL COMMENT 'salva se a venda foi a dinheiro, credito ou debito.',
  `desconto` decimal(6,2) DEFAULT NULL,
  `acrescimo` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`id_vendas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mamaezona.vendas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `vendas` DISABLE KEYS */;
/*!40000 ALTER TABLE `vendas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
