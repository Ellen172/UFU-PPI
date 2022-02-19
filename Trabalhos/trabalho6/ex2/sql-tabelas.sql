CREATE TABLE endereco
(
   id int PRIMARY KEY auto_increment,
   cep char(20), 
   estado varchar(45), 
   cidade varchar(45), 
   bairro varchar(45), 
   logradouro varchar(45)
) ENGINE=InnoDB;