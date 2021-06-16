CREATE DATABASE agenda;

USE agenda;

CREATE TABLE importancia(
cd_importancia int not null auto_increment primary key,
nm_importancia varchar(10) not null
);

INSERT INTO importancia VALUES(
NULL,
"Pouco importante"
);

INSERT INTO importancia VALUES(
NULL,
"importante"
);

INSERT INTO importancia VALUES(
NULL,
"Muito importante"
);


CREATE TABLE usuario(
	cd_usuario int auto_increment primary key,
	nm_usuario varchar(90) not null,
	ds_email varchar(90) not null,
	ds_senha varchar(255) not null
);

CREATE TABLE compromisso(
	cd_compromisso int not null auto_increment primary key,
	nm_compromisso varchar(15) not null,
	ds_compromisso varchar(40) not null,
	dt_compromisso datetime not null,
	id_importancia int not null,
	st_ativo int not null,
	id_usuario int not null
);

ALTER TABLE compromisso
ADD CONSTRAINT id_importancia FOREIGN KEY (id_importancia) REFERENCES importancia (cd_importancia);