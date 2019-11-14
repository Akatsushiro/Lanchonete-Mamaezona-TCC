-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema mamaezona
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mamaezona
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mamaezona` DEFAULT CHARACTER SET utf8 ;
USE `mamaezona` ;

-- -----------------------------------------------------
-- Table `mamaezona`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamaezona`.`cliente` (
  `id_cliente` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_cliente` VARCHAR(45) NOT NULL,
  `situacao` CHAR(1) NOT NULL DEFAULT 'P' COMMENT 'Diz se o cliente tem dividas ativas.',
  `descricao` VARCHAR(200) NULL DEFAULT NULL,
  `data_cliente` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'data do cadastro do cliente',
  `status_cliente` TINYINT(4) NOT NULL DEFAULT '1' COMMENT 'Diz se o cliente está ativo ou desativo',
  `tipo_cliente` CHAR(1) NOT NULL DEFAULT 'C' COMMENT 'se o cliente é mensal ou comum',
  PRIMARY KEY (`id_cliente`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = 'Salva os clientes.\\\\nstatus representa se o cliente está ativo ou desativo.';


-- -----------------------------------------------------
-- Table `mamaezona`.`funcionarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamaezona`.`funcionarios` (
  `id_funcionarios` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `login` VARCHAR(20) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `perfil` VARCHAR(100) NOT NULL DEFAULT '../../img/funcionario/default.img',
  `senha` VARCHAR(150) NOT NULL,
  `chave` VARCHAR(50) NOT NULL,
  `acesso` CHAR(2) NOT NULL,
  `admitido` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dispensa` TIMESTAMP NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_funcionarios`),
  UNIQUE INDEX `email` (`email`, `login`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `mamaezona`.`pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamaezona`.`pedido` (
  `id_pedido` INT(11) NOT NULL AUTO_INCREMENT,
  `data` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valor` DECIMAL(6,2) NOT NULL,
  `tipo` VARCHAR(10) NOT NULL COMMENT 'salva se a venda foi a dinheiro, credito ou debito.',
  `desconto` DECIMAL(6,2) NULL DEFAULT NULL,
  `acrescimo` DECIMAL(6,2) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pedido`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mamaezona`.`consumo_interno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamaezona`.`consumo_interno` (
  `data` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `funcionarios_id_funcionarios` INT(11) NOT NULL,
  `pedido_id_pedido` INT(11) NOT NULL,
  INDEX `fk_consumo_interno_funcionarios` (`funcionarios_id_funcionarios`),
  INDEX `fk_consumo_interno_pedido` (`pedido_id_pedido`),
  CONSTRAINT `fk_consumo_interno_funcionarios`
    FOREIGN KEY (`funcionarios_id_funcionarios`)
    REFERENCES `funcionarios` (`id_funcionarios`),
  CONSTRAINT `fk_consumo_interno_pedido`
    FOREIGN KEY (`pedido_id_pedido`)
    REFERENCES `pedido` (`id_pedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = 'vendas que vão para a conta do estabelecimento.';


-- -----------------------------------------------------
-- Table `mamaezona`.`contas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamaezona`.`contas` (
  `cliente_id_cliente` INT(11) NOT NULL,
  `data_mensal` TIMESTAMP NULL DEFAULT NULL,
  `pedido_id_pedido` INT(11) NOT NULL,
  INDEX `fk_contas_cliente` (`cliente_id_cliente`),
  INDEX `fk_contas_pedido` (`pedido_id_pedido`),
  CONSTRAINT `fk_contas_cliente`
    FOREIGN KEY (`cliente_id_cliente`)
    REFERENCES `cliente` (`id_cliente`),
  CONSTRAINT `fk_contas_pedido`
    FOREIGN KEY (`pedido_id_pedido`)
    REFERENCES `pedido` (`id_pedido`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = 'salva somente clientes que estão devendo.';


-- -----------------------------------------------------
-- Table `mamaezona`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamaezona`.`produto` (
  `id_produto` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `marca` VARCHAR(50) NOT NULL,
  `imagem` VARCHAR(50) NOT NULL DEFAULT '../../img/produto/default.png',
  `preco` DECIMAL(6,2) NOT NULL,
  `custo` DECIMAL(6,2) NOT NULL,
  `quantia` INT(11) NOT NULL,
  `quantia_minima` INT(11) NOT NULL,
  `tipo` VARCHAR(50) NOT NULL DEFAULT 'cm',
  `status` TINYINT(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_produto`),
  UNIQUE INDEX `nome` (`nome`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mamaezona`.`itens_entrada`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamaezona`.`itens_entrada` (
  `quantia` INT(11) NOT NULL,
  `data` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `produto_id_produto` INT(11) NOT NULL,
  INDEX `fk_itens_entrada` (`produto_id_produto`),
  CONSTRAINT `fk_itens_entrada`
    FOREIGN KEY (`produto_id_produto`)
    REFERENCES `produto` (`id_produto`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mamaezona`.`itens_vendidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamaezona`.`itens_vendidos` (
  `quantia` INT(11) NOT NULL,
  `pedido_id_pedido` INT(11) NOT NULL,
  `produto_id_produto` INT(11) NOT NULL,
  INDEX `fk_historico_pedido` (`pedido_id_pedido`),
  INDEX `fk_historico_produto` (`produto_id_produto`),
  CONSTRAINT `fk_historico_produto`
    FOREIGN KEY (`produto_id_produto`)
    REFERENCES `produto` (`id_produto`),
  CONSTRAINT `fk_historico_pedido`
    FOREIGN KEY (`pedido_id_pedido`)
    REFERENCES `pedido` (`id_pedido`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = 'salva os produtos que foram vendidos agrupando-os por venda.';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
