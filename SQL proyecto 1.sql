create database proyecto;
use proyecto;


SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Table `usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS usuario (
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `tipo` INT NOT NULL,
  `nombre` VARCHAR(60) NOT NULL,
  `apellidos` VARCHAR(45) NULL,
  `empresa` VARCHAR(45) NULL,
  acercaDe varchar(120) null,
  PRIMARY KEY (`email`))
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `telefono`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS telefono (
  telefono INT NOT NULL,
  usuario_email VARCHAR(100) NOT NULL,
  PRIMARY KEY (telefono),
FOREIGN KEY (usuario_email) REFERENCES usuario(email)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS mensajes (
  idMSJ INT NOT NULL auto_increment,
  usuario_email VARCHAR(100) NOT NULL,
  de VARCHAR(100) NOT NULL,
  emailDe VARCHAR(100) NOT NULL,
  msj VARCHAR(300) NOT NULL,
  PRIMARY KEY (idMSJ),
FOREIGN KEY (usuario_email) REFERENCES usuario(email)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `proyecto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS proyecto (
  `idproyecto` INT NOT NULL auto_increment,
  `nombre` VARCHAR(60) NOT NULL,
  `descripcion` VARCHAR(150) NULL,
  `usuario_email` VARCHAR(100) NOT NULL,
  `imagen` VARCHAR(100) NULL,
  `proyecto` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idproyecto`),
  CONSTRAINT `fk_proyecto_usuario`
    FOREIGN KEY (`usuario_email`)
    REFERENCES `usuario` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS telefonos (
  `telefono` varchar(22) NOT NULL,
  `usuario_email` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`telefono`),
    FOREIGN KEY (`usuario_email`)
    REFERENCES `usuario` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

insert into usuario values ('a@a.com','123',1,'aaaa','Aaaa a','Emp','');
insert into proyecto (nombre,descripcion,usuario_email,imagen,proyecto) values ('Sistema de loteria', 'aaa','o@o.com','','/proyecto/Loteria.zip');
SELECT imagen,nombre, descripcion, proyecto FROM proyecto where usuario_email='o@o.com';
SELECT concat(nombre,concat(' ',apellidos)) as nombre FROM usuario WHERE email='o@o.com';
select * from usuario;
select * from proyecto;
select * from mensajes;


delete from usuario where tipo=0;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
