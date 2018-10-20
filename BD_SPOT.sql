create database db_spot;

use db_spot;

create table tb_usuario(
	codigo	integer IDENTITY(1,1) not null primary key,
	nome	varchar(30),
	cpf		varchar(15),
	email	varchar(100),
	celular	varchar(15),
	senha	varchar(100)
);