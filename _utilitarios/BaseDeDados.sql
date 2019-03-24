/*
** Autor: Leo Altíssimo Neto
** Data: 11/10/2018
** 
** Script sql para definicao do bando de dados para o portal
** online do curso de Ciência da Computação UNEMAT de Alto
** Araguaia. Esquema UML disponivel em http://encurtador.com.br/fmBTY
*/

CREATE DATABASE IF NOT EXISTS `bccaia` CHARACTER SET utf8;


/* Definicao da tabela curso e tabelas complementares */

CREATE TABLE IF NOT EXISTS `bccaia`.`curso` (
  `cursoId` INT (11) NOT NULL AUTO_INCREMENT,
  `cursoNome` VARCHAR(64) NOT NULL,
  `cursoDescricao` TEXT,
  PRIMARY KEY (`cursoId`)
) ENGINE = INNODB CHARSET = utf8 ;

CREATE TABLE IF NOT EXISTS `bccaia`.`emailcurso` (
  `emailCursoId`    INT (11) NOT NULL AUTO_INCREMENT,
  `cursoId`         INT (11) NOT NULL,
  `emailCursoEmail` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`emailCursoId`),
  FOREIGN KEY (`cursoId`) REFERENCES `curso`(`cursoId`)
) ENGINE = INNODB CHARSET = utf8 ;

CREATE TABLE IF NOT EXISTS `bccaia`.`telcurso` (
  `telCursoId`  INT (11) NOT NULL AUTO_INCREMENT,
  `cursoId`     INT (11) NOT NULL,
  `telCursoTel` VARCHAR(24) NOT NULL,
  PRIMARY KEY (`telcursoId`),
  FOREIGN KEY (`cursoId`) REFERENCES `curso`(`cursoId`)
) ENGINE = INNODB CHARSET = utf8 ;

CREATE TABLE IF NOT EXISTS `bccaia`.`enderecocurso` (
  `enderecoCursoId`          INT (11) NOT NULL AUTO_INCREMENT,
  `cursoId`                  INT (11) NOT NULL,
  `enderecoCursoCep`         CHAR(8),
  `enderecoCursoPais`        CHAR(2) NOT NULL,
  `enderecoCursoEstado`      CHAR(2) NOT NULL,
  `enderecoCursoCidade`      VARCHAR(64) NOT NULL,
  `enderecoCursoBairro`      VARCHAR(64),
  `enderecoCursoRua`         VARCHAR(64),
  `enderecoCursoNumero`      VARCHAR(8),
  `enderecoCursoComplemento` VARCHAR(255),
  PRIMARY KEY (`enderecoCursoId`),
  FOREIGN KEY (`cursoId`) REFERENCES `curso`(`cursoId`)
) ENGINE = INNODB CHARSET = utf8 ;


/* Definicao da tabela Professor e tabelas complementares */

CREATE TABLE IF NOT EXISTS `bccaia`.`professor` (
  `professorId`            INT (11) NOT NULL AUTO_INCREMENT,
  `cursoId`                INT (11) NOT NULL,
  `professorNome`          VARCHAR(64) NOT NULL,
  `professorFacebook`      VARCHAR(64),
  `professorLattes`        VARCHAR(64),
  `professorTumb`          VARCHAR(64),
  `professorApresentacao`  TEXT,
  `professorTitulacao`     VARCHAR(64),
  PRIMARY KEY (`professorId`),
  FOREIGN KEY (`cursoId`) REFERENCES `curso`(`cursoId`)
) ENGINE = INNODB CHARSET = utf8 ;

CREATE TABLE IF NOT EXISTS `bccaia`.`formacao` (
  `formacaoId`     INT (11) NOT NULL AUTO_INCREMENT,
  `professorId`    INT (11) NOT NULL,
  `formacao`        VARCHAR(64) NOT NULL,
  PRIMARY KEY (`formacaoId`),
  FOREIGN KEY (`professorId`) REFERENCES `professor`(`professorId`)
) ENGINE = INNODB CHARSET = utf8 ;


CREATE TABLE IF NOT EXISTS `bccaia`.`emailprof` (
  `emailProfId`    INT (11) NOT NULL AUTO_INCREMENT,
  `professorId`    INT (11) NOT NULL,
  `emailProfEmail` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`emailProfId`),
  FOREIGN KEY (`professorId`) REFERENCES `professor`(`professorId`)
) ENGINE = INNODB CHARSET = utf8 ;

CREATE TABLE IF NOT EXISTS `bccaia`.`telprof` (
  `telProfId`  INT (11) NOT NULL AUTO_INCREMENT,
  `professorId`INT (11) NOT NULL,
  `telProfTel` VARCHAR(24) NOT NULL,
  PRIMARY KEY (`telProfId`),
  FOREIGN KEY (`professorId`) REFERENCES `professor`(`professorId`)
) ENGINE = INNODB CHARSET = utf8 ;

CREATE TABLE IF NOT EXISTS `bccaia`.`enderecoprof` (
  `enderecoProfId`          INT (11) NOT NULL AUTO_INCREMENT,
  `professorId`             INT (11) NOT NULL,
  `enderecoProfCep`         CHAR(8),
  `enderecoProfPais`        CHAR(2) NOT NULL,
  `enderecoProfEstado`      CHAR(2) NOT NULL,
  `enderecoProfCidade`      VARCHAR(64) NOT NULL,
  `enderecoProfBairro`      VARCHAR(64),
  `enderecoProfRua`         VARCHAR(64),
  `enderecoProfNumero`      VARCHAR(8),
  `enderecoProfComplemento` VARCHAR(255),
  PRIMARY KEY (`enderecoProfId`),
  FOREIGN KEY (`professorId`) REFERENCES `professor`(`professorId`)
) ENGINE = INNODB CHARSET = utf8 ;



/* Definicao da tabela evento e tabelas complementares */

CREATE TABLE IF NOT EXISTS `bccaia`.`evento` (
  `eventoId`               INT (11) NOT NULL AUTO_INCREMENT,
  `cursoId`                INT (11) NOT NULL,
  `eventoNome`             VARCHAR(64) NOT NULL,
  `eventoApresentacao`     TEXT,
  `eventoInicio`           DATE,
  `eventoTermino`          DATE,
  `eventoRegulamento`      TEXT,
  `eventoProfOrganizador`  INT(11),
  `eventoCapa`             VARCHAR(64),
  PRIMARY KEY (`eventoId`),
  FOREIGN KEY (`cursoId`) REFERENCES `curso`(`cursoId`),
  FOREIGN KEY (`eventoProfOrganizador`) REFERENCES `professor`(`professorId`)
) ENGINE = INNODB CHARSET = utf8 ;

CREATE TABLE IF NOT EXISTS `bccaia`.`acontecimento` (
  `acontecimentoId`            INT (11) NOT NULL AUTO_INCREMENT,
  `eventoId`                   INT (11) NOT NULL,
  `acontecimentoNome`          VARCHAR(64) NOT NULL,
  `acontecimentoApresentacao`  TEXT,
  `acontecimentoInicio`        TIME,
  `acontecimentoTermino`       TIME,
  `acontecimentoTipo`          VARCHAR(24),
  `acontecimentoLocal`         VARCHAR(64),
  `acontecimentoMinistrante`   VARCHAR(64),
  `acontecimentoVagas`         INT(11),
  `acontecimentoObs`           TEXT,
  `acontecimentoData`          DATE,
  PRIMARY KEY (`acontecimentoId`),
  FOREIGN KEY (`eventoId`) REFERENCES `evento`(`eventoId`)
) ENGINE = INNODB CHARSET = utf8 ;

CREATE TABLE IF NOT EXISTS `bccaia`.`trabalho` (
  `trabalhoId`            INT (11) NOT NULL AUTO_INCREMENT,
  `eventoId`              INT (11) NOT NULL,
  `trabalhoTitulo`        VARCHAR(255) NOT NULL,
  `trabalhoAutores`       VARCHAR(255),
  `trabalhoCaminho`        VARCHAR(255),
  PRIMARY KEY (`trabalhoId`),
  FOREIGN KEY (`eventoId`) REFERENCES `evento`(`eventoId`)
) ENGINE = INNODB CHARSET = utf8 ;

CREATE TABLE IF NOT EXISTS `bccaia`.`comissao` (
  `comissaoId`            INT (11) NOT NULL AUTO_INCREMENT,
  `eventoId`              INT (11) NOT NULL,
  `comissaoRotulo`        VARCHAR(255) NOT NULL,
  `comissaoIntegrantes`   TEXT,
  PRIMARY KEY (`comissaoId`),
  FOREIGN KEY (`eventoId`) REFERENCES `evento`(`eventoId`)
) ENGINE = INNODB CHARSET = utf8 ;

CREATE TABLE IF NOT EXISTS `bccaia`.`eventoemail` (
  `eventoemailId`    INT (11) NOT NULL AUTO_INCREMENT,
  `eventoId`         INT (11) NOT NULL,
  `eventoemailEmail` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`eventoemailId`),
  FOREIGN KEY (`eventoId`) REFERENCES `evento`(`eventoId`)
) ENGINE = INNODB CHARSET = utf8 ;

CREATE TABLE IF NOT EXISTS `bccaia`.`eventotel` (
  `eventotelId`  INT (11) NOT NULL AUTO_INCREMENT,
  `eventoId`     INT (11) NOT NULL,
  `eventotelTel` VARCHAR(24) NOT NULL,
  PRIMARY KEY (`eventotelId`),
  FOREIGN KEY (`eventoId`) REFERENCES `evento`(`eventoId`)
) ENGINE = INNODB CHARSET = utf8 ;

CREATE TABLE IF NOT EXISTS `bccaia`.`eventoendereco` (
  `eventoenderecoId`          INT (11) NOT NULL AUTO_INCREMENT,
  `eventoId`                  INT (11) NOT NULL,
  `eventoenderecoCep`         CHAR(8),
  `eventoenderecoPais`        CHAR(2) NOT NULL,
  `eventoenderecoEstado`      CHAR(2) NOT NULL,
  `eventoenderecoCidade`      VARCHAR(64) NOT NULL,
  `eventoenderecoBairro`      VARCHAR(64),
  `eventoenderecoRua`         VARCHAR(64),
  `eventoenderecoNumero`      VARCHAR(8),
  `eventoenderecoComplemento` VARCHAR(255),
  PRIMARY KEY (`eventoenderecoId`),
  FOREIGN KEY (`eventoId`) REFERENCES `evento`(`eventoId`)
) ENGINE = INNODB CHARSET = utf8 ;

/* Definicao da tabela disciplinas e tabelas complementares */

CREATE TABLE IF NOT EXISTS `bccaia`.`semestre` (
  `semestreId` INT (11) NOT NULL AUTO_INCREMENT,
  `cursoId`    INT (11) NOT NULL,
  `semestre`   INT (11) NOT NULL,
  PRIMARY KEY (`semestreId`),
  FOREIGN KEY (`cursoId`) REFERENCES `curso`(`cursoId`)
) ENGINE = INNODB CHARSET = utf8 ;

CREATE TABLE IF NOT EXISTS `bccaia`.`disciplina` (
  `disciplinaId`           INT (11) NOT NULL AUTO_INCREMENT,
  `semestreId`             INT (11) NOT NULL,
  `disciplinaNome`         VARCHAR(64) NOT NULL,
  `disciplinaPrerequisito` INT(11),
  `disciplinaProfarea`     VARCHAR(64),
  `disciplinaProf`         INT (11),
  `disciplinaEmenta`       TEXT,
  `disciplinaObjetivo`     TEXT,
  PRIMARY KEY (`disciplinaId`),
  FOREIGN KEY (`semestreId`) REFERENCES `semestre`(`semestreId`),
  FOREIGN KEY (`disciplinaProf`) REFERENCES `professor`(`professorId`),
  FOREIGN KEY (`disciplinaPrerequisito`) REFERENCES `disciplina`(`disciplinaId`)
) ENGINE = INNODB CHARSET = utf8 ;

CREATE TABLE IF NOT EXISTS `bccaia`.`distribcreditos` (
  `distribcreditosId`           INT (11) NOT NULL AUTO_INCREMENT,
  `disciplinaId`                INT (11) NOT NULL,
  `distribcreditosTipo`         VARCHAR(64),
  `distribcreditosCreditos`     VARCHAR(64),
  `distribcreditosHorasaula`    VARCHAR(64),
  PRIMARY KEY (`distribcreditosId`),
  FOREIGN KEY (`disciplinaId`) REFERENCES `disciplina`(`disciplinaId`)
) ENGINE = INNODB CHARSET = utf8 

CREATE TABLE IF NOT EXISTS `bccaia`.`bibliografia` (
  `bibliografiaId`         INT (11) NOT NULL AUTO_INCREMENT,
  `bibliografiaTitulo`     VARCHAR(128) NOT NULL,
  `bibliografiaAutor`      VARCHAR(128),
  `bibliografiaEdicao`     VARCHAR(24),
  `bibliografiaAno`        VARCHAR(8),
  `bibliografiaVolume`     VARCHAR(24),
  `bibliografiaeditora`    VARCHAR(64),
  PRIMARY KEY (`bibliografiaId`)
) ENGINE = INNODB CHARSET = utf8 ;

CREATE TABLE IF NOT EXISTS `bccaia`.`disciblibio` (
  `disciblibioId`   INT (11) NOT NULL AUTO_INCREMENT,
  `disciplinaId`    INT (11) NOT NULL,
  `bibliografiaId`  INT (11) NOT NULL,
  `disciblibioTipo` VARCHAR(24),
  PRIMARY KEY (`disciblibioId`),
  FOREIGN KEY (`disciplinaId`) REFERENCES `disciplina`(`disciplinaId`),
  FOREIGN KEY (`bibliografiaId`) REFERENCES `bibliografia`(`bibliografiaId`)
) ENGINE = INNODB CHARSET = utf8 ;



/* DEFINICAO DE TABLEAS PARA MÓDULOS BÁSICOS */

/* Módulo Home Slide */
CREATE TABLE IF NOT EXISTS `bccaia`.`homeslide` (
  `homeSlideId`          INT (11)    NOT NULL AUTO_INCREMENT,
  `homeSlideCaminho`     VARCHAR(64) NOT NULL,
  `homeSlideTitulo`      VARCHAR(128),
  `homeSlideTituloCor`   VARCHAR(8),
  PRIMARY KEY (`homeSlideId`)
) ENGINE = INNODB CHARSET = utf8 ;

/* Módulo Home Slide */
CREATE TABLE IF NOT EXISTS `bccaia`.`muralfoto` (
  `muralFotoId`          INT (11)    NOT NULL AUTO_INCREMENT,
  `muralFotoCaminho`     VARCHAR(64) NOT NULL,
  `muralFotoTitulo`      VARCHAR(128),
  PRIMARY KEY (`muralFotoId`)
) ENGINE = INNODB CHARSET = utf8 ;