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
  `data_cliente` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() COMMENT 'data do cadastro do cliente',
  `status_cliente` TINYINT(4) NOT NULL DEFAULT 1 COMMENT 'Diz se o cliente está ativo ou desativo',
  `tipo_cliente` CHAR(1) NOT NULL DEFAULT 'C' COMMENT 'se o cliente é mensal ou comum',
  PRIMARY KEY (`id_cliente`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = 'Salva os clientes.\\nstatus representa se o cliente está ativo ou desativo.';


-- -----------------------------------------------------
-- Table `mamaezona`.`funcionarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamaezona`.`funcionarios` (
  `id_funcionarios` INT(11) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `login` VARCHAR(20) NOT NULL,
  `senha` VARCHAR(20) NOT NULL,
  `acesso` CHAR(2) NOT NULL,
  `admitido` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `dispensa` TIMESTAMP NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_funcionarios`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = 'Salva os funcionarios, staus diz se o funcionario continua trabalhando ou se foi despensado.';


-- -----------------------------------------------------
-- Table `mamaezona`.`vendas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamaezona`.`vendas` (
  `id_vendas` INT(11) NOT NULL AUTO_INCREMENT,
  `data` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `valor` DECIMAL(6,2) NOT NULL,
  `tipo` VARCHAR(10) NOT NULL COMMENT 'salva se a venda foi a dinheiro, credito ou debito.',
  `desconto` DECIMAL(6,2) NULL DEFAULT NULL,
  `acrescimo` DECIMAL(6,2) NULL DEFAULT NULL,
  PRIMARY KEY (`id_vendas`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mamaezona`.`consumo_interno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamaezona`.`consumo_interno` (
  `data` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `funcionarios_id_funcionarios` INT(11) NOT NULL,
  `vendas_id_vendas` INT(11) NOT NULL,
  CONSTRAINT `fk_consumo_interno_funcionarios1`
    FOREIGN KEY (`funcionarios_id_funcionarios`)
    REFERENCES `mamaezona`.`funcionarios` (`id_funcionarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_consumo_interno_vendas1`
    FOREIGN KEY (`vendas_id_vendas`)
    REFERENCES `mamaezona`.`vendas` (`id_vendas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = 'vendas que vão para a conta do estabelecimento.';


-- -----------------------------------------------------
-- Table `mamaezona`.`contas`cliente
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamaezona`.`contas` (
  `cliente_id_cliente` INT(11) NOT NULL,
  `vendas_id_vendas` INT(11) NOT NULL,
  `data_mensal` timestamp NULL,
  CONSTRAINT `fk_contas_cliente`
    FOREIGN KEY (`cliente_id_cliente`)
    REFERENCES `mamaezona`.`cliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contas_vendas1`
    FOREIGN KEY (`vendas_id_vendas`)
    REFERENCES `mamaezona`.`vendas` (`id_vendas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = 'salva somente clientes que estão devendo.';


-- -----------------------------------------------------
-- Table `mamaezona`.`estoque`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamaezona`.`estoque` (
  `id_estoque` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `marca` VARCHAR(45) NULL DEFAULT NULL,
  `preco` DECIMAL(6,2) NOT NULL,
  `quantia` INT(11) NOT NULL,
  `quantia_min` INT(11) NOT NULL COMMENT 'quantia minima que um produto pode ter no estoque, quando atingido esse numero devesse notificar o usuario.',
  `status_estoque`  TINYINT(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_estoque`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = 'produtos de uso do estabelacimento, não podem ser vendidos.';


-- -----------------------------------------------------
-- Table `mamaezona`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamaezona`.`produto` (
  `id_produto` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_produto` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(15) NOT NULL COMMENT 'se é uma bebida alcolica ou se nessecita de preparo pela cozinha.',
  `marca` VARCHAR(20) NULL DEFAULT NULL,
  `preco` DECIMAL(6,2) NOT NULL,
  `estoque_id_estoque` INT(11) NOT NULL,
  `custo` DECIMAL(6,2) NOT NULL COMMENT 'Quanto aquele produto custa para o dono.',
  `status_produto` TINYINT(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_produto`),
  CONSTRAINT `fk_produto_estoque1`
    FOREIGN KEY (`estoque_id_estoque`)
    REFERENCES `mamaezona`.`estoque` (`id_estoque`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'produtos que podem ser vendidos.';


-- -----------------------------------------------------
-- Table `mamaezona`.`historico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mamaezona`.`historico` (
  `quantia` INT(11) NOT NULL,
  `vendas_id_vendas` INT(11) NOT NULL,
  `produto_id_produto` INT(11) NOT NULL,
  CONSTRAINT `fk_historico_produto1`
    FOREIGN KEY (`produto_id_produto`)
    REFERENCES `mamaezona`.`produto` (`id_produto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_historico_vendas1`
    FOREIGN KEY (`vendas_id_vendas`)
    REFERENCES `mamaezona`.`vendas` (`id_vendas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = 'salva os produtos que foram vendidos agrupando-os por venda.';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
