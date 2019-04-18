/* Banco_logico: */

CREATE TABLE estoque (
    id_estoque INT PRIMARY KEY,
    nome_produto VARCHAR (40),
    tipo_produto VARCHAR (20),
    marca_produto VARCHAR (20),
    quantia_produto INT,
    preco DECIMAL(5,2)
);

CREATE TABLE venda (
    id_comanda INT PRIMARY KEY,
    data DATE,
    hora TIME,
    valor DECIMAL(6,2)
);

CREATE TABLE historico (
    quantia_historico DECIMAL(6,2),
    historico_id_produto INT,
    venda_id_comanda INT
);

CREATE TABLE clientes (
    id_cliente INT PRIMARY KEY,
    nome_cliente VARCHAR(30) not null,
    descricao_cliente varchar (200) null,
    clientes_id_comanda INT
);
 
ALTER TABLE historico ADD CONSTRAINT FK_historico_1
    FOREIGN KEY (historico_id_produto)
    REFERENCES estoque (id_estoque);
 
ALTER TABLE historico ADD CONSTRAINT FK_historico_2
    FOREIGN KEY (venda_id_comanda)
    REFERENCES venda (id_comanda);
 
ALTER TABLE clientes ADD CONSTRAINT FK_clientes_2
    FOREIGN KEY (clientes_id_comanda)
    REFERENCES venda (id_comanda)
    ON DELETE RESTRICT;