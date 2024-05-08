SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

create database suiea;
use suiea;

CREATE TABLE `utilizador` (
 id_utilizador int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, 
 nome varchar(100) NOT NULL,
 email varchar(255) NOT NULL,
 senha varchar(255) NOT NULL,
 genero enum("Masculino","Femenino") DEFAULT NULL,
 morada varchar(255) not null,
 avatar varchar(255) DEFAULT NULL,
 telefone int(9) DEFAULT NULL,
 nascimento date DEFAULT NULL,
 n_bi varchar(15) DEFAULT NULL,
 tipo enum("Administrador","Utilizador") NOT NULL DEFAULT "Utilizador",
 estado enum("Activo","N Activo") NOT NULL DEFAULT "Activo",
 atualizado datetime NOT NULL DEFAULT current_timestamp,
 criado datetime NOT NULL DEFAULT current_timestamp
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `instituicao` (
  id_instituicao int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, 
  nome varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  localizacao varchar(255) not null,
  sigla varchar(15),
  senha varchar(255) NOT NULL,
  telefone int(15) DEFAULT NULL,
  area varchar(255) DEFAULT NULL,
  nif varchar(100) DEFAULT NULL,
  imagem varchar(255) DEFAULT NULL,
  resumo varchar(255) not null default "Sem descrição Ainda.",
  nivel varchar(50) NOT NULL DEFAULT "Instituição",
  estado enum("Aprovada","Pendente") NOT NULL DEFAULT "Aprovada",
  tipo varchar(255) NOT NULL,
  vagas int(11) DEFAULT Null,
  atualizado datetime NOT NULL DEFAULT current_timestamp,
  criado datetime NOT NULL DEFAULT current_timestamp
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

create table inst_medio(
	id int, foreign key(id) references instituicao(id_instituicao)
);

create table inst_superior(
	id int, foreign key(id) references instituicao(id_instituicao)
);

create table faculdade(
	id int primary key auto_increment not null,
    id_inst int, foreign key(id_inst) references inst_superior(id),
    nome varchar(255) not null
);

create table curso_medio(
	id int primary key not null auto_increment,
    nome varchar(100) not null,
    descricao varchar(1000) not null default "Ainda sem Descrição!",
    vagas int not null,
    inscricao_val int DEFAULT 0,
    matricula_val int DEFAULT 0,
    id_inst int, foreign key(id_inst) references inst_medio(id),
    imagem varchar(100) not null
);

create table curso_superior(
	id int primary key not null auto_increment,
    nome varchar(100) not null,
    descricao varchar(1000) not null default "Ainda sem Descrição!",
    vagas int not null,
    inscricao_val int DEFAULT 0,
    matricula_val int DEFAULT 0,
    id_inst int, foreign key(id_inst) references faculdade(id),
    imagem varchar(100) not null
);

create table periodo_inscricao(
	id int primary key not null auto_increment,
    id_inst int, foreign key(id_inst) references instituicao(id_instituicao),
    descricao varchar(1000),
    ano int(4) not null,
    data_inicio date not null,
    data_fim date not null,
    estado varchar(100) default "Activo",
    
);

create table inscricao_medio(
	id int primary key not null auto_increment,
    estado enum("Aprovada","Pendente") NOT NULL DEFAULT "Pendente",
    pagamento enum("Aprovado","Pendente") NOT NULL DEFAULT "Pendente",
    cert_estudante varchar(1000),
    observacao varchar(255) default null,
    inscricao_date datetime not null default current_timestamp,
    id_curso int, foreign key(id_curso) references curso_medio(id),
    id_inst int, foreign key(id_inst) references inst_medio(id),
    id_est int, foreign key(id_est) references utilizador(id_utilizador)
);

create table inscricao_superior(
	id int primary key not null auto_increment,
    estado enum("Aprovada","Pendente") NOT NULL DEFAULT "Pendente",
    pagamento enum("Aprovado","Pendente") NOT NULL DEFAULT "Pendente",
    cert_estudante varchar(1000),
    observacao varchar(255) default null,
    inscricao_date datetime not null default current_timestamp,
    id_curso int, foreign key(id_curso) references curso_superior(id),
    id_inst int, foreign key(id_inst) references inst_superior(id),
    id_est int, foreign key(id_est) references utilizador(id_utilizador)
);

create table matricula_medio(
	id int primary key not null auto_increment,
    estado enum("Pendente", "Feita") NOT NULL DEFAULT "Pendente",
    pagamento enum("Aprovado","Pendente") NOT NULL DEFAULT "Pendente",
    id_inscricao int, foreign key(id_inscricao) references inscricao_medio(id),
    certificado varchar(1000),
    atestado_medico varchar(1000),
    cartao_vacina varchar(1000),
	observacao varchar(1000),
    matricula_date datetime not null default current_timestamp,
    id_curso int, foreign key(id_curso) references curso_medio(id),
    id_inst int, foreign key(id_inst) references inst_medio(id),
    id_est int, foreign key(id_est) references utilizador(id_utilizador)
);

create table matricula_superior(
	id int primary key not null auto_increment,
    estado enum("Pendente", "Feita") NOT NULL DEFAULT "Pendente",
    pagamento enum("Aprovado","Pendente") NOT NULL DEFAULT "Pendente",
    id_inscricao int, foreign key(id_inscricao) references inscricao_superior(id),
    certificado varchar(1000),
    atestado_medico varchar(1000),
    cartao_vacina varchar(1000),
	observacao varchar(1000),
    matricula_date datetime not null default current_timestamp,
    id_curso int, foreign key(id_curso) references curso_superior(id),
    id_inst int, foreign key(id_inst) references inst_superior(id),
    id_est int, foreign key(id_est) references utilizador(id_utilizador)
);

create table notificacao_utilizador(
	id int primary key not null auto_increment,
    id_est int, foreign key(id_est) references utilizador(id_utilizador),
    mensagem varchar(1000),
    notificacao_date datetime not null default current_timestamp,
    titulo varchar(100) not null
);

create table notificacao_admin(
	id int primary key not null auto_increment,
    id_est int, foreign key(id_est) references utilizador(id_utilizador),
    mensagem varchar(1000),
    notificacao_date datetime not null default current_timestamp,
    titulo varchar(100) not null
);

create table notificacao_inst(
	id int primary key not null auto_increment,
    id_inst int, foreign key(id_inst) references instituicao(id_instituicao),
    mensagem varchar(1000),
    notificacao_date datetime not null default current_timestamp,
    titulo varchar(100) not null
);

create table mensagem(
	id int primary key not null auto_increment,
    id_inst int, foreign key(id_inst) references instituicao(id_instituicao),
    conteudo varchar(1000) not null,
    estado enum("Publicada","Bloqueada") NOT NULL DEFAULT "Bloqueada",
    mensagem_date datetime not null default current_timestamp
);

create table curso_medio_pesquisado(
	id int, foreign key(id) references curso_medio(id)
);

create table curso_superior_pesquisado(
	id int, foreign key(id) references curso_superior(id)
);

create table inst_medio_pesquisado(
	id int, foreign key(id) references inst_medio(id)
);

create table inst_superior_pesquisado(
	id int, foreign key(id) references inst_superior(id)
);

create table conta_user(
    id int primary key auto_increment not null,
    id_est int, foreign key (id_est) references utilizador(id_utilizador),
    saldo int default "10000",
    cartao_number int(15) not null,
    exp_data varchar(7) not null,
    codigo int(3) not null
);

create table conta_inst(
    id int primary key auto_increment not null,
    id_inst int, foreign key (id_inst) references instituicao(id_instituicao),
    saldo int default "10000",
    cartao_number int(15) not null,
    exp_data varchar(7) not null,
    codigo int(3) not null
);