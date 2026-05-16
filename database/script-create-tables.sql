use sistema_papelaria;

# Usuarios

create table if not exists usuarios (
	id_usuario int not null auto_increment,
    nome varchar(50) not null,
    nm_login varchar(50) not null,
    email varchar(80) not null,
    senha varchar(80) not null,
    telefone varchar(20),
    tipo enum('usuario', 'admin'),
    primary key(id_usuario)

) default charset utf8;

# Produtos;

create table if not exists produtos (
	id_produto int not null auto_increment,
    nm_produto varchar(80) not null unique,
    categoria varchar(80) not null,
    descricao text not null,
    primary key(id_produto)
) default charset utf8;