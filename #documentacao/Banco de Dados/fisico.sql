-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           5.7.24 - MySQL Community Server (GPL)
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
  `situacao` varchar(9) COLLATE utf8_bin NOT NULL DEFAULT 'P' COMMENT 'Diz se o cliente tem dividas ativas.',
  `descricao` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `data_cliente` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'data do cadastro do cliente',
  `status_cliente` varchar(8) COLLATE utf8_bin NOT NULL DEFAULT 'Ativo' COMMENT 'Diz se o cliente está ativo ou desativo',
  `tipo_cliente` varchar(6) COLLATE utf8_bin NOT NULL DEFAULT 'Comum' COMMENT 'se o cliente é mensal ou comum',
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Salva os clientes.\\\\nstatus representa se o cliente está ativo ou desativo.';

-- Copiando dados para a tabela mamaezona.cliente: ~18 rows (aproximadamente)
DELETE FROM `cliente`;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`id_cliente`, `nome_cliente`, `situacao`, `descricao`, `data_cliente`, `status_cliente`, `tipo_cliente`) VALUES
	(2, 'Patrick', 'Em dia', 'Rua de Trás', '2019-11-15 00:48:56', 'Desativo', 'Comum'),
	(3, 'Ex Matheus', 'Em dia', 'Rua de trás, que mora na rua de cima', '2019-11-15 00:48:56', 'Desativo', 'Mensal'),
	(4, 'Barth', 'Em dia', 'Mudei para o nakamura', '2019-11-15 00:48:56', 'Desativo', 'Mensal'),
	(5, 'Nanatsu', 'Em dia', 'Nunca nem vi esse', '2019-11-16 15:28:57', 'Desativo', 'Comum'),
	(6, 'Absolver', 'Em Aberto', 'Rua de Trás', '2019-11-16 15:29:29', 'Ativo', 'Mensal'),
	(7, 'Naruto Ukumaki', 'Em débito', 'Sou um ninja', '2019-11-16 18:32:51', 'Ativo', 'Comum'),
	(8, 'Sakura', 'Em dia', 'Cade o sasuke', '2019-11-16 18:36:28', 'Ativo', 'Comum'),
	(9, 'Kakashi', 'Em dia', 'Ninja dos mil jutsus', '2019-11-16 18:54:59', 'Desativo', 'Comum'),
	(10, 'Garra', 'Em dia', 'Mizukake', '2019-11-16 18:56:31', 'Desativo', 'Mensal'),
	(11, 'Ben Dez', 'Em dia', 'SOu o bennn', '2019-11-16 18:57:44', 'Ativo', 'Mensal'),
	(12, 'Escanor do sol nascente', 'Em dia', 'Quem decide sou eu!', '2019-11-16 19:00:08', 'Ativo', 'Comum'),
	(13, 'Manus', 'Em dia', 'No fundo do abismo', '2019-11-16 19:26:50', 'Desativo', 'Comum'),
	(14, 'Tony Stark', 'Em dia', 'I am Iron Man', '2019-11-16 19:32:32', 'Desativo', 'Mensal'),
	(15, 'Justiceiro', 'Em dia', 'EU mato todo mundo mesmo', '2019-11-16 19:35:45', 'Desativo', 'Comum'),
	(16, 'Demolidor', 'Em dia', 'A vida me cegou', '2019-11-16 19:36:26', 'Desativo', 'Mensal'),
	(17, 'John Deep', 'Em dia', 'Piratas do caribe é nois', '2019-11-16 19:37:06', 'Desativo', 'Mensal'),
	(18, 'Steve Rogers', 'Em dia', 'meu escudo', '2019-11-16 20:19:33', 'Desativo', 'Comum'),
	(19, 'Shikamaru', 'Em dia', 'Só observo', '2019-11-17 22:28:50', 'Ativo', 'Mensal'),
	(20, 'Kamado Tanjiro', 'Em dia', 'Caçador de Onis', '2019-11-24 01:40:07', 'Ativo', 'Comum'),
	(21, 'Kamado Nezuko', 'Em dia', 'Irmã oni do matador de Onis', '2019-11-24 01:53:42', 'Ativo', 'Comum'),
	(22, 'Haruo', 'Em Aberto', 'joga bem com o Guile no SFII', '2019-11-24 02:00:04', 'Ativo', 'Comum');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela mamaezona.funcionarios: ~0 rows (aproximadamente)
DELETE FROM `funcionarios`;
/*!40000 ALTER TABLE `funcionarios` DISABLE KEYS */;
INSERT INTO `funcionarios` (`id_funcionarios`, `nome`, `login`, `email`, `perfil`, `senha`, `chave`, `acesso`, `admitido`, `dispensa`, `status`) VALUES
	(1, 'Patrick', 'Patrick', 'PatrickDantas999@gmail.com', '../../img/funcionario/default.img', '$argon2i$v=19$m=1024,t=2,p=2$bTYuZ29yZkUzdEpjRTAvYQ$rlJRocmE8TWDlEEpRKcp+xXvs13Uqf0OkyDH89kPayQ', '7adf0d749f2dc51f72d0639b81ed4d06', 'US', '2019-12-01 23:48:50', NULL, 1);
/*!40000 ALTER TABLE `funcionarios` ENABLE KEYS */;

-- Copiando estrutura para tabela mamaezona.pedido
CREATE TABLE IF NOT EXISTS `pedido` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valor` decimal(6,2) NOT NULL,
  `tipo` varchar(10) NOT NULL COMMENT 'salva se a venda foi a dinheiro, credito ou debito.',
  `desconto` decimal(6,2) DEFAULT NULL,
  `acrescimo` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mamaezona.pedido: ~20 rows (aproximadamente)
DELETE FROM `pedido`;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` (`id_pedido`, `data`, `valor`, `tipo`, `desconto`, `acrescimo`) VALUES
	(1, '2019-11-30 02:51:46', 4.50, 'Dinheiro', 0.00, 0.00),
	(2, '2019-11-30 02:55:47', 4.50, 'Dinheiro', 0.00, 0.00),
	(3, '2019-11-30 03:01:13', 4.50, 'Débito', 0.00, 0.00),
	(4, '2019-11-30 03:03:51', 4.50, 'Débito', 0.00, 0.00),
	(5, '2019-11-30 03:08:05', 4.50, 'Dinheiro', 0.00, 0.00),
	(6, '2019-11-30 03:11:51', 4.50, 'Crédito', 0.00, 0.00),
	(7, '2019-11-30 03:21:49', 4.50, 'Dinheiro', 0.00, 0.00),
	(8, '2019-11-30 03:25:42', 4.50, 'Crédito', 0.00, 0.00),
	(9, '2019-11-30 03:28:19', 228.44, 'Crédito', 0.00, 0.00),
	(10, '2019-11-30 03:41:52', 4.50, 'Dinheiro', 0.00, 0.00),
	(11, '2019-11-30 03:46:31', 4.50, 'Dinheiro', 0.00, 0.00),
	(12, '2019-10-30 03:49:13', 113.00, 'Interno', 0.00, 0.00),
	(13, '2019-12-01 16:01:39', 85.50, 'Interno', 0.00, 0.00),
	(14, '2019-12-01 16:02:47', 9.00, 'Interno', 0.00, 0.00),
	(15, '2019-12-01 16:08:41', 5.00, 'Fiado', 0.00, 0.00),
	(16, '2019-12-02 02:05:14', 13.50, 'Dinheiro', 0.00, 0.00),
	(17, '2019-12-02 02:08:19', 22.50, 'Dinheiro', 0.00, 0.00),
	(18, '2019-12-02 02:09:56', 180.00, 'Fiado', 0.00, 0.00),
	(19, '2019-12-02 02:14:40', 180.00, 'Débito', 0.00, 0.00),
	(20, '2019-12-02 02:26:32', 50.00, 'Interno', 0.00, 0.00);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;

-- Copiando estrutura para tabela mamaezona.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `imagem` varchar(255) NOT NULL DEFAULT '../../img/produto/default.png',
  `preco` decimal(6,2) DEFAULT NULL,
  `custo` decimal(6,2) NOT NULL,
  `quantia` int(11) DEFAULT NULL,
  `quantia_minima` int(11) DEFAULT NULL,
  `tipo` varchar(10) NOT NULL DEFAULT 'Comum',
  `status` varchar(8) NOT NULL DEFAULT 'Ativo',
  PRIMARY KEY (`id_produto`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mamaezona.produto: ~26 rows (aproximadamente)
DELETE FROM `produto`;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` (`id_produto`, `nome`, `marca`, `imagem`, `preco`, `custo`, `quantia`, `quantia_minima`, `tipo`, `status`) VALUES
	(1, 'Feijoada P', 'Nenhuma', '../../img/produto/default.png', 25.00, 15.00, 1, 0, 'Preparo', 'Ativo'),
	(2, 'Feijoada M', 'Nenhuma', '../../img/produto/default.png', 25.00, 15.00, 1, 0, 'Preparo', 'Ativo'),
	(3, 'Feijoada G', 'Nenhuma', '../../img/produto/default.png', 30.00, 20.00, 1, 0, 'Preparo', 'Ativo'),
	(4, 'Dolly 2l Guarana', 'Dolly', '../../img/produto/ae74d3577951d113fc5a1b79f16af012.jpg', 4.50, 2.30, 50, 5, 'Comum', 'Ativo'),
	(5, 'Dolly Laranja', 'Dolly', '../../img/produto/default.png', 4.50, 2.30, 0, 5, 'Comum', 'Ativo'),
	(6, 'Dolly Cola', 'Dolly', '../../img/produto/default.png', 5.00, 2.70, 40, 7, 'Comum', 'Ativo'),
	(7, 'Feijão', 'Nenhuma', '../../img/produto/default.png', 0.00, 7.70, 28, 5, 'Interno', 'Ativo'),
	(8, 'Arroz 5kg', 'Nenhuma', '../../img/produto/default.png', 0.00, 9.50, 10, 2, 'Interno', 'Ativo'),
	(9, 'Lasanha', 'Vigor', '../../img/produto/default.png', 15.00, 10.00, 1, 0, 'Preparo', 'Ativo'),
	(10, 'coca', 'fini', '../../img/produto/default.png', 5.00, 5.00, 4, 4, 'Comum', 'Desativo'),
	(11, 'bala', '12', '../../img/produto/9a5aab71aac4028688f5eda14f55f1f0.jpg', 87.00, 76.00, 54, 65, 'Interno', 'Ativo'),
	(14, 'Sushi', 'China InBox', '../../img/produto/default.png', 25.99, 10.50, 1, 10, 'Preparo', 'Desativo'),
	(15, 'Caranguejo Cozinho', 'Baude de Lixo', '../../img/produto/371864e232721bb1b3a1075e880ed265.jpg', 150.00, 50.00, 1, 15, 'Preparo', 'Desativo'),
	(16, 'Estrela do mar', 'Pedra d\\\'gua', '../../img/produto/default.png', 74.99, 49.99, 1, 20, 'Preparo', 'Ativo'),
	(17, 'Cavalo Marinho', 'Pedra d\\\'gua', '../../img/produto/default.png', 20.00, 50.00, 1, 5, 'Preparo', 'Desativo'),
	(18, 'Filé à Milanesa', 'D\\\'Agua doce', '../../img/produto/default.png', 17.00, 12.00, 57, 34, 'Comum', 'Desativo'),
	(19, 'Polvo', 'A\'m Polvo', '../../img/produto/default.png', 50.00, 10.00, 40, 25, 'Comum', 'Desativo'),
	(20, 'Lasanha De Outra COisa', 'Vigor 2', '../../img/produto/default.png', 35.00, 20.00, 1, 0, 'Preparo', 'Desativo'),
	(21, 'Balde de frango', 'Chickens', '../../img/produto/default.png', 30.50, 25.00, 1, 1, 'Preparo', 'Ativo'),
	(22, 'Suco Ades', 'Ades', '../../img/produto/17f8a5b7e22516afce460cb0f0a6add6.jpg', 5.40, 4.50, 70, 5, 'Comum', 'Ativo'),
	(23, 'Frango', 'Marca Z', '../../img/produto/default.png', 15.99, 9.99, 1, 0, 'Preparo', 'Ativo'),
	(24, 'Salada', 'Marca E', '../../img/produto/3f236449bf462dfa3495184c0e0609b8.jpg', 15.00, 7.50, 1, 0, 'Preparo', 'Ativo'),
	(25, 'Farinha', 'Marca Qualquer', '../../img/produto/default.png', 0.00, 5.00, 50, 15, 'Interno', 'Ativo'),
	(26, 'Pimentão', 'Qualquer um', '../../img/produto/f6788dbbeed9a377d51599356bbac996.jpg', 0.00, 3.99, 20, 5, 'Interno', 'Ativo'),
	(27, 'Paçoca Pequena', 'nenhuma', '../../img/produto/f644c64674c986d168ae56918ccbf947.jpg', 0.50, 0.30, 100, 20, 'Comum', 'Ativo'),
	(28, 'Fanta 2l Laranja', 'Coca-Cola', '../../img/produto/cc3ebd9be7cddd8b2217ee0cf9f18517.jpg', 7.00, 4.00, 40, 15, 'Comum', 'Ativo'),
	(29, 'Fanta 2l Uva', 'Coca-Cola', '../../img/produto/default.png', 7.50, 4.00, 80, 20, 'Comum', 'Ativo'),
	(30, 'Farinha 1kg', NULL, '../../img/produto/default.png', NULL, 3.50, 20, 2, 'Interno', 'Ativo'),
	(31, 'Lobits Cebola', 'Lobits', '../../img/produto/default.png', 1.50, 0.70, 70, 15, 'Comum', 'Ativo');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;


-- Copiando estrutura para tabela mamaezona.consumo_interno
CREATE TABLE IF NOT EXISTS `consumo_interno` (
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `funcionarios_id_funcionarios` int(11) NOT NULL,
  `pedido_id_pedido` int(11) NOT NULL,
  KEY `fk_consumo_interno_funcionarios` (`funcionarios_id_funcionarios`),
  KEY `fk_consumo_interno_pedido` (`pedido_id_pedido`),
  CONSTRAINT `fk_consumo_interno_funcionarios` FOREIGN KEY (`funcionarios_id_funcionarios`) REFERENCES `funcionarios` (`id_funcionarios`),
  CONSTRAINT `fk_consumo_interno_pedido` FOREIGN KEY (`pedido_id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='vendas que vão para a conta do estabelecimento.';

-- Copiando dados para a tabela mamaezona.consumo_interno: ~2 rows (aproximadamente)
DELETE FROM `consumo_interno`;
/*!40000 ALTER TABLE `consumo_interno` DISABLE KEYS */;
INSERT INTO `consumo_interno` (`data`, `funcionarios_id_funcionarios`, `pedido_id_pedido`) VALUES
	('2019-12-02 02:14:41', 1, 19),
	('2019-12-02 02:26:33', 1, 20);
/*!40000 ALTER TABLE `consumo_interno` ENABLE KEYS */;

-- Copiando estrutura para tabela mamaezona.contas
CREATE TABLE IF NOT EXISTS `contas` (
  `cliente_id_cliente` int(11) NOT NULL,
  `data_mensal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pedido_id_pedido` int(11) NOT NULL,
  KEY `fk_contas_cliente` (`cliente_id_cliente`),
  KEY `fk_contas_pedido` (`pedido_id_pedido`),
  CONSTRAINT `fk_contas_cliente` FOREIGN KEY (`cliente_id_cliente`) REFERENCES `cliente` (`id_cliente`),
  CONSTRAINT `fk_contas_pedido` FOREIGN KEY (`pedido_id_pedido`) REFERENCES `pedido` (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='salva somente clientes que estão devendo.';

-- Copiando dados para a tabela mamaezona.contas: ~3 rows (aproximadamente)
DELETE FROM `contas`;
/*!40000 ALTER TABLE `contas` DISABLE KEYS */;
INSERT INTO `contas` (`cliente_id_cliente`, `data_mensal`, `pedido_id_pedido`) VALUES
	(7, '2019-12-01 17:26:28', 9),
	(7, '2019-12-01 18:56:51', 12),
	(22, '2019-12-01 18:58:12', 15),
	(6, '2019-12-02 02:08:19', 17);
/*!40000 ALTER TABLE `contas` ENABLE KEYS */;

-- Copiando estrutura para tabela mamaezona.itens_entrada
CREATE TABLE IF NOT EXISTS `itens_entrada` (
  `quantia` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `produto_id_produto` int(11) NOT NULL,
  KEY `fk_itens_entrada` (`produto_id_produto`),
  CONSTRAINT `fk_itens_entrada` FOREIGN KEY (`produto_id_produto`) REFERENCES `produto` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela mamaezona.itens_entrada: ~16 rows (aproximadamente)
DELETE FROM `itens_entrada`;
/*!40000 ALTER TABLE `itens_entrada` DISABLE KEYS */;
INSERT INTO `itens_entrada` (`quantia`, `data`, `produto_id_produto`) VALUES
	(25, '2019-11-18 00:16:20', 1),
	(25, '2019-11-18 00:16:42', 1),
	(25, '2019-11-18 00:17:06', 1),
	(25, '2019-11-18 00:28:47', 1),
	(25, '2019-11-18 00:29:13', 1),
	(25, '2019-11-18 00:29:40', 1),
	(25, '2019-11-18 00:31:23', 1),
	(50, '2019-11-18 00:33:35', 1),
	(50, '2019-11-18 00:39:19', 6),
	(25, '2019-11-18 00:39:57', 5),
	(2, '2019-11-18 01:48:24', 6),
	(25, '2019-11-18 01:50:42', 4),
	(45, '2019-11-19 01:55:26', 22),
	(5, '2019-11-23 22:08:54', 22),
	(5, '2019-11-23 23:17:16', 26),
	(5, '2019-11-24 02:11:02', 10),
	(5, '2019-11-24 02:13:56', 4);
/*!40000 ALTER TABLE `itens_entrada` ENABLE KEYS */;

-- Copiando estrutura para tabela mamaezona.itens_vendidos
CREATE TABLE IF NOT EXISTS `itens_vendidos` (
  `quantia` int(11) NOT NULL,
  `pedido_id_pedido` int(11) NOT NULL,
  `produto_id_produto` int(11) NOT NULL,
  KEY `fk_historico_pedido` (`pedido_id_pedido`),
  KEY `fk_historico_produto` (`produto_id_produto`),
  CONSTRAINT `fk_historico_pedido` FOREIGN KEY (`pedido_id_pedido`) REFERENCES `pedido` (`id_pedido`),
  CONSTRAINT `fk_historico_produto` FOREIGN KEY (`produto_id_produto`) REFERENCES `produto` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='salva os produtos que foram vendidos agrupando-os por venda.';


-- Copiando dados para a tabela mamaezona.itens_vendidos: ~17 rows (aproximadamente)
DELETE FROM `itens_vendidos`;
/*!40000 ALTER TABLE `itens_vendidos` DISABLE KEYS */;
INSERT INTO `itens_vendidos` (`quantia`, `pedido_id_pedido`, `produto_id_produto`) VALUES
	(15, 1, 1),
	(1, 8, 4),
	(2, 9, 2),
	(5, 9, 4),
	(6, 9, 14),
	(1, 11, 4),
	(1, 12, 1),
	(4, 12, 4),
	(10, 12, 28),
	(19, 13, 4),
	(2, 14, 5),
	(1, 15, 10),
	(3, 16, 5),
	(5, 17, 5),
	(40, 18, 5),
	(40, 19, 5),
	(10, 20, 6);
/*!40000 ALTER TABLE `itens_vendidos` ENABLE KEYS */;


-- Copiando estrutura para evento mamaezona.Up_Cliente_Situacao
DELIMITER //
CREATE DEFINER=`root`@`localhost` EVENT `Up_Cliente_Situacao` ON SCHEDULE EVERY 1 HOUR STARTS '2019-12-02 13:53:58' ON COMPLETION PRESERVE ENABLE COMMENT 'Troca a situação do cliente caso devedor' DO BEGIN

#------------------------------------------------
 UPDATE cliente SET situacao = "Em Aberto" 
  WHERE cliente.id_cliente in (
        SELECT contas.cliente_id_cliente
          FROM pedido
 		 INNER JOIN contas ON pedido.id_pedido = contas.pedido_id_pedido 
 		 WHERE CURRENT_TIMESTAMP()
               BETWEEN pedido.`data` 
           		   AND DATE_ADD(pedido.`data`,INTERVAL 1 MONTH)
	 );
	 
# ------------------------------------------------
 UPDATE cliente SET situacao = "Em débito" 
  WHERE cliente.id_cliente in (
		SELECT contas.cliente_id_cliente
 		  FROM pedido
 		 INNER JOIN contas ON pedido.id_pedido = contas.pedido_id_pedido 
 		 WHERE CURRENT_TIMESTAMP() > DATE_ADD(pedido.`data`,INTERVAL 2 Day)
	 );

# ------------------------------------------------
 UPDATE cliente SET situacao = "Em dia" 
  WHERE cliente.id_cliente in (
        SELECT devedores.id_cliente 
		  FROM devedores
		 WHERE devedores.divida = 0
	 );
END//
DELIMITER ;

-- Copiando estrutura para view mamaezona.devedores
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `devedores`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `devedores` AS SELECT * FROM (SELECT cliente.*,
	    CASE
	    	WHEN SUM(pedido.valor) IS NULL THEN 0
	    	ELSE SUM(pedido.valor)
	    END AS divida
  FROM cliente 
 LEFT JOIN contas ON cliente.id_cliente = contas.cliente_id_cliente
 LEFT JOIN pedido ON contas.pedido_id_pedido = pedido.id_pedido
 GROUP BY cliente.id_cliente) AS clientes_dev ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
