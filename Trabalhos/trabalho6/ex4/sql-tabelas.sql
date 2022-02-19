CREATE TABLE pessoa
(
    codigo int PRIMARY KEY auto_increment, 
    nome varchar(255), 
    sexo varchar(45), 
    email varchar(255), 
    telefone varchar(20), 
    cep char(14), /*xxxxx-xxx*/
    logradouro varchar(255), 
    cidade varchar(255), 
    estado varchar(255)
) ENGINE=InnoDB;


CREATE TABLE paciente 
(
    peso float, 
    altura float, 
    tipoSanguineo varchar(5), 
    codigo int PRIMARY KEY,
	constraint codigo foreign key (codigo) references pessoa (codigo)
) ENGINE=InnoDB;
