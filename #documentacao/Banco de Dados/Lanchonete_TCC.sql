/* Banco_logico: */

CREATE TABLE estoque (
    id_produto INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome_produto VARCHAR(30) NOT NULL,
    tipo VARCHAR(15) NOT NULL,
    marca VARCHAR(15) NOT NULL,
    preco DECIMAL(5,2) NOT NULL,
	quantia_min INT NOT NULL,
    quantia INT NOT NULL
);

/* ----------------------------------------------------------------------------*/
CREATE TABLE venda (
    id_comanda INT NOT NULL PRIMARY KEY,
    data_atual DATE NOT NULL,
    hora TIME NOT NULL,
    valor DECIMAL (6,2) NOT NULL,
    forma_de_pagamento VARCHAR (10) NOT NULL,
    desconto DECIMAL (6,2) NULL,
    acresimo DECIMAL (6,2) NULL
);

/*------------------------------------------------------------------------------*/
CREATE TABLE cliente (
    id_cliente INT NOT NULL PRIMARY KEY,
    nome_cliente VARCHAR (50) NOT NULL,
    situacao CHAR(1),
    descricao_cliente VARCHAR(150)  NULL
);

/*------------------------------------------------------------------------------*/
CREATE TABLE funcionario (
    id_funcionario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(40) NOT NULL,
    login VARCHAR (15) NOT NULL,
    senha VARCHAR (20) NOT NULL,
    nivel_de_acesso INT NOT NULL
);

/*------------------------------------------------------------------------------*/
CREATE TABLE historico (
    quantia INT NOT NULL,
    id_comanda INT NOT NULL,
    id_produto INT NOT NULL
);

ALTER TABLE `historico` ADD CONSTRAINT `id_comanda` FOREIGN KEY (`id_comanda` ) REFERENCES `venda` (`id_comanda`);

ALTER TABLE `historico` ADD CONSTRAINT `id_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`);

/*------------------------------------------------------------------------------*/
CREATE TABLE consumo_interno (
    id_funcionario INT NOT NULL,
    id_comanda INT NOT NULL
);

ALTER TABLE `consumo_interno` ADD CONSTRAINT `id_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario`(`id_funcionario`);

ALTER TABLE `consumo_interno` ADD CONSTRAINT `id_comanda` FOREIGN KEY (`id_comanda`) REFERENCES `venda` (`id_comanda`);

/*------------------------------------------------------------------------------*/
CREATE TABLE contas_pendentes (
    id_comanda INT NOT NULL,
    id_cliente INT NOT NULL
);

ALTER TABLE `contas_pendentes` ADD CONSTRAINT `id_comanda` FOREIGN KEY (`id_comanda`) REFERENCES `venda` (`id_comanda`);

ALTER TABLE `contas_pendentes` ADD CONSTRAINT `id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);
