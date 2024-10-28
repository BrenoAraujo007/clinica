

USE clinica;

create table pacientes (
    id int auto_increment primary key,
    nome varchar(100) not null,
    data_nascimento date not null,
    cpf varchar(14) not null unique,
    telefone varchar(15),
    endereco varchar(255),
    email varchar(100)
);

create table medicos (
    id int auto_increment primary key,
    nome varchar(100) not null,
    especialidade varchar(100)
);

create table consultas (
    id int auto_increment primary key,
    paciente_id int,
    medico_id int,
    data date not null,
    hora TIME not null,
    FOREIGN KEY (paciente_id) REFERENCES pacientes(id),
    FOREIGN KEY (medico_id) REFERENCES medicos(id)
);

select * from pacientes;