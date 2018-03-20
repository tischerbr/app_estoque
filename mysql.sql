create database biblioteca;
use biblioteca;

create table livros(
	id int auto_increment,
	nome varchar(255),
	quantidade int default 0,
	isbn varchar(255),
	data DATE,
	usuario_id int not null,
	primary key (id),
	foreign key (usuario_id) references usuarios(id)
) ENGINE=INNODB DEFAULT CHARACTER SET = utf8;


create table categorias(
	id int auto_increment,
	nome varchar(255),
	primary key (id),
) ENGINE=INNODB DEFAULT CHARACTER SET = utf8;


create table livro_categorias (
	id int auto_increment,	 
	livro_id int not null,
	categoria_id int not null,
	primary key (id),
	foreign key (livro_id) references livros(id) on delete cascade
	foreign key (categoria_id) references categorias(id) on delete cascade,

) ENGINE=INNODB DEFAULT CHARACTER SET = utf8;


create table livro_autores(
	id int auto_increment,	 
	livro_id int not null,
	autor_id int not null,
	primary key (id),
	foreign key (autor_id) references usuarios(id) on delete cascade,
	foreign key (livro_id) references livros(id) on delete cascade
) ENGINE=INNODB DEFAULT CHARACTER SET = utf8;