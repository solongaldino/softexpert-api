
-- -----------------------------------------------------
-- Schema softexpert-api
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `softexpert-api` ;
USE `softexpert-api` ;

-- -----------------------------------------------------
-- Table `softexpert-api`.`ProductType`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softexpert-api`.`ProductType` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softexpert-api`.`Product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softexpert-api`.`Product` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_type` INT UNSIGNED NOT NULL,
  `name` VARCHAR(200) NOT NULL,
  `value` DECIMAL(8,2) NOT NULL,
  `description` VARCHAR(1000) NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Product_ProductType_idx` (`product_type` ASC) VISIBLE,
  CONSTRAINT `fk_Product_ProductType`
    FOREIGN KEY (`product_type`)
    REFERENCES `softexpert-api`.`ProductType` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softexpert-api`.`Taxe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softexpert-api`.`Taxe` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `percentage` SMALLINT NOT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softexpert-api`.`ProductType_has_Taxe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softexpert-api`.`ProductType_has_Taxe` (
  `ProductType_id` INT UNSIGNED NOT NULL,
  `Taxe_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ProductType_id`, `Taxe_id`),
  INDEX `fk_ProductType_has_Taxe_Taxe1_idx` (`Taxe_id` ASC) VISIBLE,
  INDEX `fk_ProductType_has_Taxe_ProductType1_idx` (`ProductType_id` ASC) VISIBLE,
  CONSTRAINT `fk_ProductType_has_Taxe_ProductType1`
    FOREIGN KEY (`ProductType_id`)
    REFERENCES `softexpert-api`.`ProductType` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ProductType_has_Taxe_Taxe1`
    FOREIGN KEY (`Taxe_id`)
    REFERENCES `softexpert-api`.`Taxe` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
