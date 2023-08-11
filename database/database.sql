CREATE DATABASE IF NOT EXISTS mussacafec;
USE mussacafec;

CREATE TABLE usuarios(
id             int(3) auto_increment not null,
nombre        varchar(25) not null,
usuario varchar(20) not null,
password        varchar(20) not null,
CONSTRAINT pk_usuarios PRIMARY KEY(id) 
)ENGINE=InnoDb;

INSERT INTO usuarios VALUES(NULL, 'Administrador', 'Admin', 'password');

CREATE TABLE ponentes (
    id INT(6) auto_increment not null,
    eje_tematico VARCHAR (50) not null,
    tipo_Institucion VARCHAR(10) not null,
    titulada VARCHAR(25),
    ficha VARCHAR(10),
    institucion VARCHAR(35),
    ponente_1 VARCHAR(50),
    correo_1 VARCHAR(50),
    contacto_1 VARCHAR(15),
    ponente_2 VARCHAR(50),
    correo_2 VARCHAR(50),
    contacto_2 VARCHAR(15),
    ponente_3 VARCHAR(50),
    correo_3 VARCHAR(50),
    contacto_3 VARCHAR(15),
    titulo_proyecto VARCHAR(25) not null,
    tipo_proyecto VARCHAR(10) not null,
    archivo_1 VARCHAR(25) not null,
    archivo_2 VARCHAR(25) not null,
    CONSTRAINT pk_ponentes PRIMARY KEY(id)
)ENGINE = InnoDb;

CREATE TABLE poster(
    id int(6) not null auto_increment,
    institucion VARCHAR(50) not null,
    nombre_participante_1 varchar(50) ,
    correo_participante_1 varchar(30),
    contacto_participante_1 varchar(15),
    nombre_participante_2 varchar(50) ,
    correo_participante_2 varchar(30),
    contacto_participante_2 varchar(15),
    nombre_participante_3 varchar(50) ,
    correo_participante_3 varchar(30),
    contacto_participante_3 varchar(15),
    nombre_participante_4 varchar(50) ,
    correo_participante_4 varchar(30),
    contacto_participante_4 varchar(15),
    nombre_participante_5 varchar(50) ,
    correo_participante_5 varchar(30),
    contacto_participante_5 varchar(15),
    nombre_participante_6 varchar(50) ,
    correo_participante_6 varchar(30),
    contacto_participante_6 varchar(15),
    CONSTRAINT pk_poster PRIMARY KEY(id)
)Engine=InnoDb;

CREATE TABLE feria_empresarial (
    id int(6) not null auto_increment,
    institucion varchar(50) not null,
    participantes VARCHAR (10) not null,
    titulo_proyecto VARCHAR(50) not null,
    CONSTRAINT pk_feria_empresarial PRIMARY KEY(id)
)Engine=InnoDb;

CREATE TABLE robotica (
    id int(6) not null auto_increment,
    categoria VARCHAR(25) not null,
    institucion VARCHAR(50) not null,
    nombre_participante_1 VARCHAR(50) not null,
    correo_participante_1 VARCHAR(35) not null,
    contacto_participante_1 VARCHAR(15) not null,
    CONSTRAINT pk_robotica PRIMARY KEY (id)
)ENGINE=InnoDb;

CREATE TABLE galeria (
    id int(6) auto_increment not null,
    nombre_imagen VARCHAR(20) not null,
    titulo VARCHAR(50) not null,
    descripcion VARCHAR(255) not null,
    CONSTRAINT pk_galeria PRIMARY KEY (id)
)Engine=iNNODb;





