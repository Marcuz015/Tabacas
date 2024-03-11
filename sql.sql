CREATE DATABASE loveteam;
CREATE TABLE Pessoa(
	id int PRIMARY KEY AUTO_INCREMENT,
    email varchar(100) UNIQUE,
    senha Double,
    cpf varchar(11)
)ENGINE=INNODB;

CREATE TABLE Produto(
	id int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(100),
    valor Double, 
    quantidade int,
)ENGINE=INNODB;


CREATE PROCEDURE `pessoa_listar`(IN `filtro` VARCHAR(50)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER SELECT * FROM pessoa WHERE email LIKE concat('%',filtro,'%') || nome like concat('%',filtro,'%')

CREATE PROCEDURE `produto_listar`(IN `filtro` VARCHAR(50)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER SELECT * FROM produto WHERE nome LIKE concat('%',filtro,'%')