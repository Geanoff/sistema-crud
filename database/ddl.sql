create database devmedia;
use devmedia;

create table categoria (
	id int primary key auto_increment,
	nome varchar(50) not null
);

create table produto (
	id int primary key auto_increment,
	nome varchar(50) not null,
	descricao text not null,
	preco float not null,
	categoria_id int,
	foreign key (categoria_id) references categorias(id)
);

create table usuario (
	id int primary key auto_increment,
	nome varchar(100) not null,
	email varchar(50),
	telefone varchar(20),
	data_nascimento date not null, 
	cpf varchar(11) not null unique
);




select * from categoria c;
select * from produto p;
select * from usuarios u;

alter table usuarios 
drop column senha;
