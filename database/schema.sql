CREATE DATABASE db_estoque;
USE db_estoque;
CREATE TABLE produtos(
  id          INT           NOT NULL AUTO_INCREMENT,
  descricao   VARCHAR(200)  NOT NULL,
  quantidade  DECIMAL(10,2) NOT NULL,
  valor       DECIMAL(10,2),
  validade    DATE,
  PRIMARY KEY (id)
);



CREATE TABLE usuarios(
  id    INT           NOT NULL  AUTO_INCREMENT,
  email VARCHAR(200)  NOT NULL,
  senha VARCHAR(200)  NOT NULL,
  PRIMARY KEY (id)
);
insert into usuarios (email, senha) values('admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');



create table livros(
  id int auto_increment,
  nome varchar(255),
  quantidade int not null default 0,
  isbn varchar(255),
  data DATE,
  usuario_id int not null,
primary key (id),
foreign key (usuario_id) references usuarios(id)
) ENGINE=INNODB DEFAULT CHARACTER SET = utf8;



create table autores(
  id int auto_increment,
  nome varchar(255),
 primary key (id)
) ENGINE=INNODB DEFAULT CHARACTER SET = utf8



create table categorias(
  id int auto_increment,
  nome varchar(255),
  primary key (id)
) ENGINE=INNODB DEFAULT CHARACTER SET = utf8



create table livros_categorias (
  id_livro int,
  id_categoria int,
  primary key (id_livro, id_categoria),
  foreign key (id_livro) references livro(id),
  foreign key (id_categoria) references categoria(id)
) ENGINE=INNODB DEFAULT CHARACTER SET = utf8



create table livros_categorias (
  id_livro int,
  id_categoria int,
  primary key (id_livro, id_categoria),
  foreign key (id_livro) references livros(id),
  foreign key (id_categoria) references categorias(id)
) ENGINE=INNODB DEFAULT CHARACTER SET = utf8



create table livros_autores (
  id_livro int,
  id_autor int,
  primary key (id_livro, id_autor),
  foreign key (id_livro) references livros(id),
  foreign key (id_autor) references autores(id)
) ENGINE=INNODB DEFAULT CHARACTER SET = utf8