SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema db_ebanking
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `db_ebanking` ;
CREATE SCHEMA IF NOT EXISTS `db_ebanking` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `db_ebanking` ;

-- -----------------------------------------------------
-- Table `db_ebanking`.`tbl_customer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_ebanking`.`tbl_customer` ;

CREATE TABLE IF NOT EXISTS `db_ebanking`.`tbl_customer` (
  `PK_customerNumber` INT NOT NULL AUTO_INCREMENT,
  `password` VARCHAR(130) NOT NULL,
  `salt` VARCHAR(128) NOT NULL,
  `lastname` VARCHAR(45) NULL,
  `firstname` VARCHAR(45) NULL,
  `age` INT NULL,
  PRIMARY KEY (`PK_customerNumber`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_ebanking`.`tbl_accountType`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_ebanking`.`tbl_accountType` ;

CREATE TABLE IF NOT EXISTS `db_ebanking`.`tbl_accountType` (
  `PK_accountType` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`PK_accountType`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_ebanking`.`tbl_account`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_ebanking`.`tbl_account` ;

CREATE TABLE IF NOT EXISTS `db_ebanking`.`tbl_account` (
  `PK_accountNumber` INT NOT NULL AUTO_INCREMENT,
  `value` DECIMAL(63,2) NOT NULL,
  `FK_accountType` INT NOT NULL,
  PRIMARY KEY (`PK_accountNumber`),
  INDEX `fk_tbl_account_tbl_accountType1_idx` (`FK_accountType` ASC),
  CONSTRAINT `fk_tbl_account_tbl_accountType1`
    FOREIGN KEY (`FK_accountType`)
    REFERENCES `db_ebanking`.`tbl_accountType` (`PK_accountType`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_ebanking`.`tbl_log`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_ebanking`.`tbl_log` ;

CREATE TABLE IF NOT EXISTS `db_ebanking`.`tbl_log` (
  `PK_lognumber` INT NOT NULL AUTO_INCREMENT,
  `value` VARCHAR(45) NULL,
  PRIMARY KEY (`PK_lognumber`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_ebanking`.`tbl_logIndex`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_ebanking`.`tbl_logIndex` ;

CREATE TABLE IF NOT EXISTS `db_ebanking`.`tbl_logIndex` (
  `PK_name` INT NOT NULL,
  `PK_customerNumber` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`PK_name`, `PK_customerNumber`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_ebanking`.`tbl_permission`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_ebanking`.`tbl_permission` ;

CREATE TABLE IF NOT EXISTS `db_ebanking`.`tbl_permission` (
  `PK_permission` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`PK_permission`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_ebanking`.`tbl_accountPermission`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_ebanking`.`tbl_accountPermission` ;

CREATE TABLE IF NOT EXISTS `db_ebanking`.`tbl_accountPermission` (
  `PK_accountPermission` INT NOT NULL AUTO_INCREMENT,
  `FK_customerNumber` INT NOT NULL,
  `FK_accountNumber` INT NOT NULL,
  `FK_permission` INT NOT NULL,
  PRIMARY KEY (`PK_accountPermission`),
  INDEX `PK_customerNumber_idx` (`FK_customerNumber` ASC),
  INDEX `fk_tbl_accountPermission_tbl_account1_idx` (`FK_accountNumber` ASC),
  INDEX `fk_tbl_accountPermission_tbl_permission1_idx` (`FK_permission` ASC),
  CONSTRAINT `PK_customerNumber`
    FOREIGN KEY (`FK_customerNumber`)
    REFERENCES `db_ebanking`.`tbl_customer` (`PK_customerNumber`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_accountPermission_tbl_account1`
    FOREIGN KEY (`FK_accountNumber`)
    REFERENCES `db_ebanking`.`tbl_account` (`PK_accountNumber`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_accountPermission_tbl_permission1`
    FOREIGN KEY (`FK_permission`)
    REFERENCES `db_ebanking`.`tbl_permission` (`PK_permission`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_ebanking`.`tbl_booking`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_ebanking`.`tbl_booking` ;

CREATE TABLE IF NOT EXISTS `db_ebanking`.`tbl_booking` (
  `PK_booking` INT NOT NULL AUTO_INCREMENT,
  `value` DECIMAL(63,2) NOT NULL,
  `bookingTime` DATETIME NOT NULL,
  `dueTime` DATETIME NOT NULL,
  `receiver` INT NOT NULL,
  `transmitter` INT NOT NULL,
  PRIMARY KEY (`PK_booking`),
  INDEX `fk_tbl_booking_tbl_account1_idx` (`receiver` ASC),
  INDEX `fk_tbl_booking_tbl_account2_idx` (`transmitter` ASC),
  CONSTRAINT `fk_tbl_booking_tbl_account1`
    FOREIGN KEY (`receiver`)
    REFERENCES `db_ebanking`.`tbl_account` (`PK_accountNumber`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_booking_tbl_account2`
    FOREIGN KEY (`transmitter`)
    REFERENCES `db_ebanking`.`tbl_account` (`PK_accountNumber`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_ebanking`.`tbl_loginDate`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_ebanking`.`tbl_loginDate` ;

CREATE TABLE IF NOT EXISTS `db_ebanking`.`tbl_loginDate` (
  `PK_loginDate` INT NOT NULL,
  `loginTime` DATETIME NOT NULL,
  `ipAddress` VARCHAR(45) NULL,
  `FK_customerNumber` INT NOT NULL,
  `isSuccessfull` TINYINT(1) NOT NULL,
  PRIMARY KEY (`PK_loginDate`),
  INDEX `fk_tbl_loginDate_tbl_customer1_idx` (`FK_customerNumber` ASC),
  CONSTRAINT `fk_tbl_loginDate_tbl_customer1`
    FOREIGN KEY (`FK_customerNumber`)
    REFERENCES `db_ebanking`.`tbl_customer` (`PK_customerNumber`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
