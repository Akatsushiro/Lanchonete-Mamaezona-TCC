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

-- Copiando dados para a tabela mamaezona.cliente: ~18 rows (aproximadamente)
DELETE FROM `cliente`;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`id_cliente`, `nome_cliente`, `situacao`, `descricao`, `data_cliente`, `status_cliente`, `tipo_cliente`) VALUES
	(2, 'Patrick', 'Em dia', 'Rua de Trás', '2019-11-15 00:48:56', 'Desativo', 'Comum'),
	(3, 'Ex Matheus', 'Em dia', 'Rua de trás, que mora na rua de cima', '2019-11-15 00:48:56', 'Desativo', 'Mensal'),
	(4, 'Barth', 'Em aberto', 'Mudei para o nakamura', '2019-11-15 00:48:56', 'Desativo', 'Mensal'),
	(5, 'Nanatsu', 'Em débito', 'Nunca nem vi esse', '2019-11-16 15:28:57', 'Desativo', 'Comum'),
	(6, 'Absolver', 'Em dia', 'Rua de Trás', '2019-11-16 15:29:29', 'Ativo', 'Mensal'),
	(7, 'Naruto Ukumaki', 'Em dia', 'Sou um ninja', '2019-11-16 18:32:51', 'Ativo', 'Comum'),
	(8, 'Sakura', 'Em dia', 'Cade o sasuke', '2019-11-16 18:36:28', 'Ativo', 'Comum'),
	(9, 'Kakashi', 'Em dia', 'Ninja dos mil jutsus', '2019-11-16 18:54:59', 'Desativo', 'Comum'),
	(10, 'Garra', 'Em aberto', 'Mizukake', '2019-11-16 18:56:31', 'Desativo', 'Mensal'),
	(11, 'Ben Dez', 'Em débito', 'SOu o bennn', '2019-11-16 18:57:44', 'Ativo', 'Mensal'),
	(12, 'Escanor do sol nascente', 'Em aberto', 'Quem decide sou eu!', '2019-11-16 19:00:08', 'Ativo', 'Comum'),
	(13, 'Manus', 'Em Aberto', 'No fundo do abismo', '2019-11-16 19:26:50', 'Desativo', 'Comum'),
	(14, 'Tony Stark', 'Em débito', 'I am Iron Man', '2019-11-16 19:32:32', 'Desativo', 'Mensal'),
	(15, 'Justiceiro', 'Em dia', 'EU mato todo mundo mesmo', '2019-11-16 19:35:45', 'Desativo', 'Comum'),
	(16, 'Demolidor', 'Em aberto', 'A vida me cegou', '2019-11-16 19:36:26', 'Desativo', 'Mensal'),
	(17, 'John Deep', 'Em aberto', 'Piratas do caribe é nois', '2019-11-16 19:37:06', 'Desativo', 'Mensal'),
	(18, 'Steve Rogers', 'Em aberto', 'meu escudo', '2019-11-16 20:19:33', 'Desativo', 'Comum'),
	(19, 'Shikamaru', 'Em débito', 'Só observo', '2019-11-17 22:28:50', 'Ativo', 'Mensal'),
	(20, 'Kamado Tanjiro', 'Em dia', 'Caçador de Onis', '2019-11-24 01:40:07', 'Ativo', 'Comum'),
	(21, 'Kamado Nezuko', 'Em dia', 'Irmã oni do matador de Onis', '2019-11-24 01:53:42', 'Ativo', 'Comum'),
	(22, 'Haruo', 'Em dia', 'joga bem com o Guile no SFII', '2019-11-24 02:00:04', 'Ativo', 'Comum');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Copiando dados para a tabela mamaezona.consumo_interno: ~0 rows (aproximadamente)
DELETE FROM `consumo_interno`;
/*!40000 ALTER TABLE `consumo_interno` DISABLE KEYS */;
/*!40000 ALTER TABLE `consumo_interno` ENABLE KEYS */;

-- Copiando dados para a tabela mamaezona.contas: ~0 rows (aproximadamente)
DELETE FROM `contas`;
/*!40000 ALTER TABLE `contas` DISABLE KEYS */;
/*!40000 ALTER TABLE `contas` ENABLE KEYS */;

-- Copiando dados para a tabela mamaezona.funcionarios: ~0 rows (aproximadamente)
DELETE FROM `funcionarios`;
/*!40000 ALTER TABLE `funcionarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcionarios` ENABLE KEYS */;

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

-- Copiando dados para a tabela mamaezona.itens_vendidos: ~0 rows (aproximadamente)
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
	(10, 12, 28);
/*!40000 ALTER TABLE `itens_vendidos` ENABLE KEYS */;

-- Copiando dados para a tabela mamaezona.pedido: ~6 rows (aproximadamente)
DELETE FROM `pedido`;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` (`id_pedido`, `data`, `valor`, `tipo`, `desconto`, `acrescimo`) VALUES
	(1, '2019-11-30 02:51:46', 4.50, 'Dinheiro', 0.00, 0.00),
	(2, '2019-11-30 02:55:47', 4.50, 'Dinheiro', 0.00, 0.00),
	(3, '2019-11-30 03:01:13', 4.50, 'Dinheiro', 0.00, 0.00),
	(4, '2019-11-30 03:03:51', 4.50, 'Dinheiro', 0.00, 0.00),
	(5, '2019-11-30 03:08:05', 4.50, 'Dinheiro', 0.00, 0.00),
	(6, '2019-11-30 03:11:51', 4.50, 'Dinheiro', 0.00, 0.00),
	(7, '2019-11-30 03:21:49', 4.50, 'Dinheiro', 0.00, 0.00),
	(8, '2019-11-30 03:25:42', 4.50, 'Dinheiro', 0.00, 0.00),
	(9, '2019-11-30 03:28:19', 228.44, 'Dinheiro', 0.00, 0.00),
	(10, '2019-11-30 03:41:52', 4.50, 'Dinheiro', 0.00, 0.00),
	(11, '2019-11-30 03:46:31', 4.50, 'Dinheiro', 0.00, 0.00),
	(12, '2019-11-30 03:49:13', 113.00, 'Dinheiro', 0.00, 0.00);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;

-- Copiando dados para a tabela mamaezona.produto: ~26 rows (aproximadamente)
DELETE FROM `produto`;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` (`id_produto`, `nome`, `marca`, `imagem`, `preco`, `custo`, `quantia`, `quantia_minima`, `tipo`, `status`) VALUES
	(1, 'Feijoada P', 'Nenhuma', '../../img/produto/default.png', 25.00, 15.00, 1, 0, 'Preparo', 'Ativo'),
	(2, 'Feijoada M', 'Nenhuma', '../../img/produto/default.png', 25.00, 15.00, 1, 0, 'Preparo', 'Ativo'),
	(3, 'Feijoada G', 'Nenhuma', '../../img/produto/default.png', 30.00, 20.00, 1, 0, 'Preparo', 'Ativo'),
	(4, 'Dolly 2l Guarana', 'Dolly', '../../img/produto/ae74d3577951d113fc5a1b79f16af012.jpg', 4.50, 2.30, 20, 5, 'Comum', 'Ativo'),
	(5, 'Dolly Laranja', 'Dolly', '../../img/produto/default.png', 4.50, 2.30, 50, 5, 'Comum', 'Ativo'),
	(6, 'Dolly Cola', 'Dolly', '../../img/produto/default.png', 5.00, 2.70, 50, 7, 'Comum', 'Ativo'),
	(7, 'Feijão', 'Nenhuma', '../../img/produto/default.png', 0.00, 7.70, 28, 5, 'Interno', 'Ativo'),
	(8, 'Arroz 5kg', 'Nenhuma', '../../img/produto/default.png', 0.00, 9.50, 10, 2, 'Interno', 'Ativo'),
	(9, 'Lasanha', 'Vigor', '../../img/produto/default.png', 15.00, 10.00, 1, 0, 'Preparo', 'Ativo'),
	(10, 'coca', 'fini', '../../img/produto/default.png', 5.00, 5.00, 5, 4, 'Comum', 'Desativo'),
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

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
