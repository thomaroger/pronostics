SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `pronostics` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `pronostics` ;

-- -----------------------------------------------------
-- Table `pronostics`.`User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pronostics`.`User` ;

CREATE  TABLE IF NOT EXISTS `pronostics`.`User` (
  `User_Id` INT NOT NULL AUTO_INCREMENT ,
  `User_Email` VARCHAR(45) NULL ,
  `User_Password` VARCHAR(45) NULL ,
  `User_Name` VARCHAR(45) NULL ,
  `User_Lastname` VARCHAR(45) NULL ,
  PRIMARY KEY (`User_Id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pronostics`.`GameType`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pronostics`.`GameType` ;

CREATE  TABLE IF NOT EXISTS `pronostics`.`GameType` (
  `GameType_Id` INT NOT NULL AUTO_INCREMENT ,
  `GameType_Name` VARCHAR(45) NULL ,
  PRIMARY KEY (`GameType_Id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pronostics`.`Championship`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pronostics`.`Championship` ;

CREATE  TABLE IF NOT EXISTS `pronostics`.`Championship` (
  `Championship_Id` INT NOT NULL AUTO_INCREMENT COMMENT '	' ,
  `GameType_Id` INT NOT NULL ,
  `Championship_Name` VARCHAR(45) NULL ,
  `Championship_Begin` DATE NULL ,
  PRIMARY KEY (`Championship_Id`, `GameType_Id`) ,
  INDEX `fk_Championship_GameType` (`GameType_Id` ASC) ,
  CONSTRAINT `fk_Championship_GameType`
    FOREIGN KEY (`GameType_Id` )
    REFERENCES `pronostics`.`GameType` (`GameType_Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pronostics`.`Day`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pronostics`.`Day` ;

CREATE  TABLE IF NOT EXISTS `pronostics`.`Day` (
  `Day_Id` INT NOT NULL AUTO_INCREMENT ,
  `Championship_Id` INT NOT NULL ,
  `Day_Name` VARCHAR(45) NULL ,
  `Day_Prognosis_Begin` DATETIME NULL ,
  `Day_Prognosis_End` DATETIME NULL ,
  `Day_Status` TINYINT(1) NULL ,
  PRIMARY KEY (`Day_Id`, `Championship_Id`) ,
  INDEX `fk_Day_Championship1` (`Championship_Id` ASC) ,
  CONSTRAINT `fk_Day_Championship1`
    FOREIGN KEY (`Championship_Id` )
    REFERENCES `pronostics`.`Championship` (`Championship_Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pronostics`.`Game`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pronostics`.`Game` ;

CREATE  TABLE IF NOT EXISTS `pronostics`.`Game` (
  `Game_Id` INT NOT NULL AUTO_INCREMENT ,
  `Day_Id` INT NOT NULL ,
  `Game_Team1` VARCHAR(45) NULL ,
  `Game_Team2` VARCHAR(45) NULL ,
  PRIMARY KEY (`Game_Id`, `Day_Id`) ,
  INDEX `fk_Game_Day1` (`Day_Id` ASC) ,
  CONSTRAINT `fk_Game_Day1`
    FOREIGN KEY (`Day_Id` )
    REFERENCES `pronostics`.`Day` (`Day_Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pronostics`.`Result`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pronostics`.`Result` ;

CREATE  TABLE IF NOT EXISTS `pronostics`.`Result` (
  `Game_Id` INT NOT NULL ,
  `Result_Team1` VARCHAR(45) NULL ,
  `Result_Team2` VARCHAR(45) NULL ,
  `Result_Win` VARCHAR(45) NULL ,
  INDEX `fk_Result_Game1` (`Game_Id` ASC) ,
  PRIMARY KEY (`Game_Id`) ,
  CONSTRAINT `fk_Result_Game1`
    FOREIGN KEY (`Game_Id` )
    REFERENCES `pronostics`.`Game` (`Game_Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pronostics`.`Prognosis`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pronostics`.`Prognosis` ;

CREATE  TABLE IF NOT EXISTS `pronostics`.`Prognosis` (
  `Prognosis_Id` INT NOT NULL AUTO_INCREMENT ,
  `Game_Id` INT NOT NULL ,
  `User_Id` INT NOT NULL ,
  `Prognosis_Team1` VARCHAR(45) NULL ,
  `Prognosis_Team2` VARCHAR(45) NULL ,
  `Prognosis_Win` VARCHAR(45) NULL ,
  PRIMARY KEY (`Prognosis_Id`) ,
  INDEX `fk_Prognosis_Game1` (`Game_Id` ASC) ,
  INDEX `fk_Prognosis_User1` (`User_Id` ASC) ,
  CONSTRAINT `fk_Prognosis_Game1`
    FOREIGN KEY (`Game_Id` )
    REFERENCES `pronostics`.`Game` (`Game_Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Prognosis_User1`
    FOREIGN KEY (`User_Id` )
    REFERENCES `pronostics`.`User` (`User_Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pronostics`.`Statistic`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pronostics`.`Statistic` ;

CREATE  TABLE IF NOT EXISTS `pronostics`.`Statistic` (
  `Statistic_id` INT NOT NULL AUTO_INCREMENT ,
  `User_Id` INT NOT NULL ,
  `Day_Id` INT NOT NULL ,
  `Statistic_Point` VARCHAR(45) NULL ,
  PRIMARY KEY (`Statistic_id`, `User_Id`, `Day_Id`) ,
  INDEX `fk_Statistic_User1` (`User_Id` ASC) ,
  INDEX `fk_Statistic_Day1` (`Day_Id` ASC) ,
  CONSTRAINT `fk_Statistic_User1`
    FOREIGN KEY (`User_Id` )
    REFERENCES `pronostics`.`User` (`User_Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Statistic_Day1`
    FOREIGN KEY (`Day_Id` )
    REFERENCES `pronostics`.`Day` (`Day_Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pronostics`.`Championship_has_User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pronostics`.`Championship_has_User` ;

CREATE  TABLE IF NOT EXISTS `pronostics`.`Championship_has_User` (
  `Championship_Id` INT NOT NULL ,
  `User_Id` INT NOT NULL ,
  PRIMARY KEY (`Championship_Id`, `User_Id`) ,
  INDEX `fk_Championship_has_User_User1` (`User_Id` ASC) ,
  INDEX `fk_Championship_has_User_Championship1` (`Championship_Id` ASC) ,
  CONSTRAINT `fk_Championship_has_User_Championship1`
    FOREIGN KEY (`Championship_Id` )
    REFERENCES `pronostics`.`Championship` (`Championship_Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Championship_has_User_User1`
    FOREIGN KEY (`User_Id` )
    REFERENCES `pronostics`.`User` (`User_Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
