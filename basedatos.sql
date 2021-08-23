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


-- -----------------------------------------------------
-- Table `proyecto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS proyecto (
  `idproyecto` INT NOT NULL,
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


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;