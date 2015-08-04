SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `bodyfit`.`personal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bodyfit`.`personal` (
  `id` BIGINT(11) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `sobrenome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  `create_ts` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `bodyfit`.`academia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bodyfit`.`academia` (
  `id` BIGINT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `estado` VARCHAR(2) NOT NULL,
  `endereco` VARCHAR(45) NULL,
  `telefone` VARCHAR(45) NULL,
  `create_ts` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `bodyfit`.`aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bodyfit`.`aluno` (
  `id` BIGINT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `sobrenome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  `nascimento` DATE NOT NULL,
  `sexo` VARCHAR(1) NULL,
  `telefone` VARCHAR(45) NULL,
  `endereco` VARCHAR(45) NULL,
  `academia_id` BIGINT(11) NOT NULL,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_aluno_academia1_idx` (`academia_id` ASC),
  CONSTRAINT `fk_aluno_academia1`
    FOREIGN KEY (`academia_id`)
    REFERENCES `bodyfit`.`academia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `bodyfit`.`gerente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bodyfit`.`gerente` (
  `id` BIGINT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `sobrenome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  `tipo` INT NULL,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `bodyfit`.`gerente_has_academia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bodyfit`.`gerente_has_academia` (
  `gerente_id` BIGINT(11) NOT NULL,
  `academia_id` BIGINT(11) NOT NULL,
  PRIMARY KEY (`gerente_id`, `academia_id`),
  INDEX `fk_gerente_has_academia_academia1_idx` (`academia_id` ASC),
  INDEX `fk_gerente_has_academia_gerente_idx` (`gerente_id` ASC),
  CONSTRAINT `fk_gerente_has_academia_gerente`
    FOREIGN KEY (`gerente_id`)
    REFERENCES `bodyfit`.`gerente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_gerente_has_academia_academia1`
    FOREIGN KEY (`academia_id`)
    REFERENCES `bodyfit`.`academia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `bodyfit`.`personal_has_academia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bodyfit`.`personal_has_academia` (
  `personal_id` BIGINT(11) NOT NULL,
  `academia_id` BIGINT(11) NOT NULL,
  PRIMARY KEY (`personal_id`, `academia_id`),
  INDEX `fk_personal_has_academia_academia1_idx` (`academia_id` ASC),
  INDEX `fk_personal_has_academia_personal1_idx` (`personal_id` ASC),
  CONSTRAINT `fk_personal_has_academia_personal1`
    FOREIGN KEY (`personal_id`)
    REFERENCES `bodyfit`.`personal` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_personal_has_academia_academia1`
    FOREIGN KEY (`academia_id`)
    REFERENCES `bodyfit`.`academia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `bodyfit`.`codigo_acesso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bodyfit`.`codigo_acesso` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `academia_id` BIGINT(11) NOT NULL,
  `codigo` VARCHAR(45) NOT NULL,
  `ativo` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`, `academia_id`),
  INDEX `fk_codigo_acesso_academia1_idx` (`academia_id` ASC),
  CONSTRAINT `fk_codigo_acesso_academia1`
    FOREIGN KEY (`academia_id`)
    REFERENCES `bodyfit`.`academia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bodyfit`.`avaliacao_fis`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bodyfit`.`avaliacao_fis` (
  `id` BIGINT(11) NOT NULL,
  `aluno_id` BIGINT(11) NOT NULL,
  `personal_id` BIGINT(11) NOT NULL,
  `peso` FLOAT NULL,
  `altura` FLOAT NULL,
  `data` DATE NULL,
  PRIMARY KEY (`id`, `aluno_id`, `personal_id`),
  INDEX `fk_avaliacao_fis_aluno1_idx` (`aluno_id` ASC),
  INDEX `fk_avaliacao_fis_personal1_idx` (`personal_id` ASC),
  CONSTRAINT `fk_avaliacao_fis_aluno1`
    FOREIGN KEY (`aluno_id`)
    REFERENCES `bodyfit`.`aluno` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_avaliacao_fis_personal1`
    FOREIGN KEY (`personal_id`)
    REFERENCES `bodyfit`.`personal` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bodyfit`.`exercicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bodyfit`.`exercicio` (
  `id` BIGINT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `image` VARCHAR(244) NULL,
  `descricao` TEXT(400) NULL,
  `categoria` VARCHAR(45) NOT NULL,
  `musculo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bodyfit`.`treino`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bodyfit`.`treino` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `inico` DATE NOT NULL,
  `fim` DATE NULL,
  `ativo` INT NOT NULL DEFAULT 1,
  `aluno_id` BIGINT(11) NOT NULL,
  `personal_id` BIGINT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_treino_aluno1_idx` (`aluno_id` ASC),
  INDEX `fk_treino_personal1_idx` (`personal_id` ASC),
  CONSTRAINT `fk_treino_aluno1`
    FOREIGN KEY (`aluno_id`)
    REFERENCES `bodyfit`.`aluno` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_treino_personal1`
    FOREIGN KEY (`personal_id`)
    REFERENCES `bodyfit`.`personal` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bodyfit`.`execucao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bodyfit`.`execucao` (
  `id` BIGINT(11) NOT NULL AUTO_INCREMENT,
  `treino_id` INT NOT NULL,
  `exercicio_id` BIGINT(11) NOT NULL,
  `treino_personal_id` BIGINT(11) NOT NULL,
  `treino_aluno_id` BIGINT(11) NOT NULL,
  `series` INT NULL,
  `repeticoes` INT NULL,
  `cadencia` VARCHAR(45) NULL,
  `tempo` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_execucao_exercicio1_idx` (`exercicio_id` ASC),
  INDEX `fk_execucao_treino1_idx` (`treino_id` ASC, `treino_personal_id` ASC, `treino_aluno_id` ASC),
  CONSTRAINT `fk_execucao_exercicio1`
    FOREIGN KEY (`exercicio_id`)
    REFERENCES `bodyfit`.`exercicio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_execucao_treino1`
    FOREIGN KEY (`treino_id`)
    REFERENCES `bodyfit`.`treino` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bodyfit`.`dia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bodyfit`.`dia` (
  `id` BIGINT(11) NOT NULL AUTO_INCREMENT,
  `dia` INT NOT NULL,
  `execucao_id` BIGINT(11) NOT NULL,
  `execucao_treino_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_dia_execucao1_idx` (`execucao_id` ASC, `execucao_treino_id` ASC),
  CONSTRAINT `fk_dia_execucao1`
    FOREIGN KEY (`execucao_id`)
    REFERENCES `bodyfit`.`execucao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
