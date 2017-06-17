create DATABASE loja;

create table categorias
(
  id int auto_increment
    primary key,
  nome varchar(255) null
)
;

create table produtos
(
  id int auto_increment
    primary key,
  nome varchar(200) null,
  preco decimal(10,2) null,
  descricao varchar(300) null,
  categoria_id int null,
  usado tinyint(1) default '0' null,
  isbn varchar(20) null,
  waterMark varchar(100) null,
  taxaImpressao decimal(10,2) null,
  constraint produtos_id_uindex
  unique (id)
)
;

create table usuarios
(
  id int auto_increment
    primary key,
  login varchar(100) not null,
  senha varchar(512) not null
)
;

