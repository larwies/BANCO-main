DROP DATABASE IF EXISTS banco;

CREATE DATABASE IF NOT EXISTS banco;

USE banco;

create table Cidade(
id int auto_increment,
nome VARCHAR(100),
estado VARCHAR(02),
primary key(id)
);

create table Pessoa(
id int auto_increment,
nome VARCHAR(100),
email VARCHAR(100),
senha VARCHAR(050),
endereco VARCHAR(100),
bairro VARCHAR(100),
id_cidade int,
cep VARCHAR(10),
primary key (id),
CONSTRAINT FK_PessoaCidade foreign key (id_cidade) references Cidade(id)
);

create table Animal(
id int auto_increment,
nome varchar(50),
especie VARCHAR(50),
foto VARCHAR(100),
raca VARCHAR(50),
data_nascimento date,
idade int,
castrado BOOL,
id_pessoa int,
primary key(id),
CONSTRAINT FK_AnimalPessoa foreign key(id_pessoa) references Pessoa(id)
);