CREATE TABLE `equipment_desc` (
  `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `owner` VARCHAR (10) NOT NULL DEFAULT '',
  `name` VARCHAR (30) NOT NULL DEFAULT '',
  `amount` INT UNSIGNED NOT NULL ,
  `total` INT UNSIGNED NOT NULL ,
  `image_b64` MEDIUMTEXT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT uq UNIQUE (owner, name)
)
  COLLATE='utf8_general_ci'
  ENGINE=InnoDB;

CREATE TABLE `equipment_borrow` (
  `id` SMALLINT UNSIGNED NOT NULL ,
  `borrower` VARCHAR(10) NOT NULL,
  `amount` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`, `borrower`)
)
  COLLATE='utf8_general_ci'
  ENGINE=InnoDB;
