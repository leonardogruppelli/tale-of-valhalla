-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema tale_of_valhalla
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tale_of_valhalla
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tale_of_valhalla` DEFAULT CHARACTER SET utf8 ;
USE `tale_of_valhalla` ;

-- -----------------------------------------------------
-- Table `tale_of_valhalla`.`managers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tale_of_valhalla`.`managers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `email` VARCHAR(70) NOT NULL,
  `password` VARCHAR(42) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tale_of_valhalla`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tale_of_valhalla`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `username` VARCHAR(30) NOT NULL,
  `email` VARCHAR(70) NOT NULL,
  `password` VARCHAR(42) NOT NULL,
  `picture` VARCHAR(42) NOT NULL,
  `gold` INT NULL DEFAULT 0,
  `runes` INT NULL DEFAULT 0,
  `date` DATE NOT NULL,
  `deleted` INT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tale_of_valhalla`.`types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tale_of_valhalla`.`types` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tale_of_valhalla`.`classes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tale_of_valhalla`.`classes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tale_of_valhalla`.`items`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tale_of_valhalla`.`items` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(70) NOT NULL,
  `type_id` INT NOT NULL,
  `class_id` INT NOT NULL,
  `image` VARCHAR(42) NOT NULL,
  `buy_price` INT NOT NULL,
  `sell_price` INT NOT NULL,
  `rarity` INT NOT NULL,
  `level` INT NOT NULL,
  `attack` INT NOT NULL,
  `defense` INT NOT NULL,
  `agility` INT NOT NULL,
  `intelligence` INT NOT NULL,
  `unique` INT NULL DEFAULT 0,
  `deleted` INT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC),
  INDEX `fk_items_types1_idx` (`type_id` ASC),
  INDEX `fk_items_classes1_idx` (`class_id` ASC),
  CONSTRAINT `fk_items_types1`
    FOREIGN KEY (`type_id`)
    REFERENCES `tale_of_valhalla`.`types` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_items_classes1`
    FOREIGN KEY (`class_id`)
    REFERENCES `tale_of_valhalla`.`classes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tale_of_valhalla`.`characters`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tale_of_valhalla`.`characters` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `class_id` INT NOT NULL,
  `attack` INT NULL DEFAULT 0,
  `defense` INT NULL DEFAULT 0,
  `agility` INT NULL DEFAULT 0,
  `intelligence` INT NULL DEFAULT 0,
  `level` INT NULL DEFAULT 1,
  `health` INT NULL DEFAULT 100,
  `mana` INT NULL DEFAULT 100,
  `hp_potions` INT NULL DEFAULT 0,
  `large_hp_potions` INT NULL DEFAULT 0,
  `mp_potions` INT NULL DEFAULT 0,
  `large_mp_potions` INT NULL DEFAULT 0,
  `dexterity_potions` INT NULL DEFAULT 0,
  `luck_potions` INT NULL DEFAULT 0,
  `experience` INT NULL DEFAULT 0,
  `max_experience` INT NULL DEFAULT 0,
  `ai_battle_wins` INT NULL DEFAULT 0,
  `battle_wins` INT NULL DEFAULT 0,
  `deleted` INT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `fk_characters_users1_idx` (`user_id` ASC),
  INDEX `fk_characters_classes1_idx` (`class_id` ASC),
  CONSTRAINT `fk_characters_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `tale_of_valhalla`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_characters_classes1`
    FOREIGN KEY (`class_id`)
    REFERENCES `tale_of_valhalla`.`classes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tale_of_valhalla`.`equipment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tale_of_valhalla`.`equipment` (
  `character_id` INT NOT NULL,
  `type_id` INT NOT NULL,
  `item_id` INT NOT NULL,
  INDEX `fk_equipment_types1_idx` (`type_id` ASC),
  INDEX `fk_equipment_items1_idx` (`item_id` ASC),
  INDEX `fk_equipment_characters1_idx` (`character_id` ASC),
  CONSTRAINT `fk_equipment_types1`
    FOREIGN KEY (`type_id`)
    REFERENCES `tale_of_valhalla`.`types` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipment_items1`
    FOREIGN KEY (`item_id`)
    REFERENCES `tale_of_valhalla`.`items` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipment_characters1`
    FOREIGN KEY (`character_id`)
    REFERENCES `tale_of_valhalla`.`characters` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tale_of_valhalla`.`inventory`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tale_of_valhalla`.`inventory` (
  `character_id` INT NOT NULL,
  `item_id` INT NOT NULL,
  `equiped` INT NULL DEFAULT 0,
  INDEX `fk_inventory_items1_idx` (`item_id` ASC),
  INDEX `fk_inventory_characters1_idx` (`character_id` ASC),
  CONSTRAINT `fk_inventory_items1`
    FOREIGN KEY (`item_id`)
    REFERENCES `tale_of_valhalla`.`items` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inventory_characters1`
    FOREIGN KEY (`character_id`)
    REFERENCES `tale_of_valhalla`.`characters` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tale_of_valhalla`.`enemies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tale_of_valhalla`.`enemies` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `attack` INT NOT NULL,
  `defense` INT NOT NULL,
  `agility` INT NOT NULL,
  `intelligence` INT NOT NULL,
  `health` INT NOT NULL,
  `mana` INT NOT NULL,
  `hp_potions` INT NOT NULL DEFAULT 0,
  `large_hp_potions` INT NULL DEFAULT 0,
  `mp_potions` INT NOT NULL DEFAULT 0,
  `large_mp_potions` INT NULL DEFAULT 0,
  `dexterity_potions` INT NULL DEFAULT 0,
  `luck_potions` INT NULL DEFAULT 0,
  `image` VARCHAR(42) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tale_of_valhalla`.`packages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tale_of_valhalla`.`packages` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `runes` INT NOT NULL,
  `price` DECIMAL(9,2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tale_of_valhalla`.`transactions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tale_of_valhalla`.`transactions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `package_id` INT NOT NULL,
  `date` DATE NOT NULL,
  `status` INT NULL DEFAULT 0,
  `deleted` INT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `fk_transactions_users1_idx` (`user_id` ASC),
  INDEX `fk_transactions_packages1_idx` (`package_id` ASC),
  CONSTRAINT `fk_transactions_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `tale_of_valhalla`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_transactions_packages1`
    FOREIGN KEY (`package_id`)
    REFERENCES `tale_of_valhalla`.`packages` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tale_of_valhalla`.`ai_battle_history`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tale_of_valhalla`.`ai_battle_history` (
  `character_id` INT NOT NULL,
  `enemy_id` INT NOT NULL,
  `player_damage` INT NULL DEFAULT 0,
  `player_damage_taken` INT NULL DEFAULT 0,
  `enemy_damage` INT NULL DEFAULT 0,
  `enemy_damage_taken` INT NULL DEFAULT 0,
  `player_hp_potions` INT NULL DEFAULT 0,
  `player_large_hp_potions` INT NULL DEFAULT 0,
  `player_mp_potions` INT NULL DEFAULT 0,
  `player_large_mp_potions` INT NULL DEFAULT 0,
  `player_dexterity_potions` INT NULL DEFAULT 0,
  `player_luck_potions` INT NULL DEFAULT 0,
  `enemy_hp_potions` INT NULL DEFAULT 0,
  `enemy_large_hp_potions` INT NULL DEFAULT 0,
  `enemy_mp_potions` INT NULL DEFAULT 0,
  `enemy_large_mp_potions` INT NULL DEFAULT 0,
  `enemy_dexterity_potions` INT NULL DEFAULT 0,
  `enemy_luck_potions` INT NULL DEFAULT 0,
  `experience_earned` INT NULL DEFAULT 0,
  `gold_earned` INT NULL DEFAULT 0,
  `turns` INT NULL DEFAULT 0,
  `won` INT NULL DEFAULT 0,
  `date` DATETIME NULL,
  INDEX `fk_ai_battle_history_characters1_idx` (`character_id` ASC),
  INDEX `fk_ai_battle_history_enemies1_idx` (`enemy_id` ASC),
  CONSTRAINT `fk_ai_battle_history_characters1`
    FOREIGN KEY (`character_id`)
    REFERENCES `tale_of_valhalla`.`characters` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ai_battle_history_enemies1`
    FOREIGN KEY (`enemy_id`)
    REFERENCES `tale_of_valhalla`.`enemies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tale_of_valhalla`.`battle_history`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tale_of_valhalla`.`battle_history` (
  `player_one` INT NOT NULL,
  `player_two` INT NOT NULL,
  `player_one_damage` INT NULL DEFAULT 0,
  `player_one_damage_taken` INT NULL DEFAULT 0,
  `player_two_damage` INT NULL DEFAULT 0,
  `player_two_damage_taken` INT NULL DEFAULT 0,
  `player_one_hp_potions` INT NULL DEFAULT 0,
  `player_one_large_hp_potions` INT NULL DEFAULT 0,
  `player_one_mp_potions` INT NULL DEFAULT 0,
  `player_one_large_mp_potions` INT NULL DEFAULT 0,
  `player_one_dexterity_potions` INT NULL DEFAULT 0,
  `player_one_luck_potions` INT NULL DEFAULT 0,
  `player_two_hp_potions` INT NULL DEFAULT 0,
  `player_two_large_hp_potions` INT NULL DEFAULT 0,
  `player_two_mp_potions` INT NULL DEFAULT 0,
  `player_two_large_mp_potions` INT NULL DEFAULT 0,
  `player_two_dexterity_potions` INT NULL DEFAULT 0,
  `player_two_luck_potions` INT NULL DEFAULT 0,
  `experience_earned` INT NULL DEFAULT 0,
  `gold_earned` INT NULL DEFAULT 0,
  `turns` INT NULL DEFAULT 0,
  `winner` INT NOT NULL,
  `date` DATETIME NULL,
  INDEX `fk_battle_history_characters1_idx` (`player_one` ASC),
  INDEX `fk_battle_history_characters2_idx` (`player_two` ASC),
  INDEX `fk_battle_history_characters3_idx` (`winner` ASC),
  CONSTRAINT `fk_battle_history_characters1`
    FOREIGN KEY (`player_one`)
    REFERENCES `tale_of_valhalla`.`characters` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_battle_history_characters2`
    FOREIGN KEY (`player_two`)
    REFERENCES `tale_of_valhalla`.`characters` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_battle_history_characters3`
    FOREIGN KEY (`winner`)
    REFERENCES `tale_of_valhalla`.`characters` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `tale_of_valhalla`.`managers`
-- -----------------------------------------------------
START TRANSACTION;
USE `tale_of_valhalla`;
INSERT INTO `tale_of_valhalla`.`managers` (`id`, `name`, `email`, `password`) VALUES (1, 'Leonardo Gruppelli', 'leonardo.gruppelli@gmail.com', md5('gruppelli'));

COMMIT;


-- -----------------------------------------------------
-- Data for table `tale_of_valhalla`.`types`
-- -----------------------------------------------------
START TRANSACTION;
USE `tale_of_valhalla`;
INSERT INTO `tale_of_valhalla`.`types` (`id`, `name`) VALUES (1, 'Elmo');
INSERT INTO `tale_of_valhalla`.`types` (`id`, `name`) VALUES (2, 'Armadura');
INSERT INTO `tale_of_valhalla`.`types` (`id`, `name`) VALUES (3, 'Calças');
INSERT INTO `tale_of_valhalla`.`types` (`id`, `name`) VALUES (4, 'Luvas');
INSERT INTO `tale_of_valhalla`.`types` (`id`, `name`) VALUES (5, 'Botas');
INSERT INTO `tale_of_valhalla`.`types` (`id`, `name`) VALUES (6, 'Arma');

COMMIT;


-- -----------------------------------------------------
-- Data for table `tale_of_valhalla`.`classes`
-- -----------------------------------------------------
START TRANSACTION;
USE `tale_of_valhalla`;
INSERT INTO `tale_of_valhalla`.`classes` (`id`, `name`) VALUES (1, 'Guerreiro');
INSERT INTO `tale_of_valhalla`.`classes` (`id`, `name`) VALUES (2, 'Arqueiro');
INSERT INTO `tale_of_valhalla`.`classes` (`id`, `name`) VALUES (3, 'Mago');
INSERT INTO `tale_of_valhalla`.`classes` (`id`, `name`) VALUES (4, 'Assassino');

COMMIT;

