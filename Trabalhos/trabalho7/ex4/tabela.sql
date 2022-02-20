create table medico (
    nome varchar(45), 
    telefone char(15), /* (00)99999-9999 */
    especialidade varchar(45)
);

insert into medico (nome, telefone, especialidade)
values ('Alberto', '(34)99191-8478', 'cardiologista'),
        ('Mariana', '(45)99548-8756', 'cardiologista'), 
        ('Bruno', '(87)98562-4785', 'cardiologista'),
        ('Caio', '(87)87542-9856', 'dermatologista'), 
        ('Amanda', '(98)54652-9865', 'dermatologista'),
        ('Victor', '(34)96523-6523', 'dermatologista'),
        ('Fernando', '(56)98542-4157', 'oftamologista'), 
        ('Gabriela', '(87)94541-5541', 'oftamologista'),
        ('Gustavo', '(98)97563-3301', 'oftamologista');