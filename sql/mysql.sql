CREATE TABLE `equipment_desc` (
  `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `owner` VARCHAR (10) NOT NULL DEFAULT '',
  `name` VARCHAR (30) NOT NULL DEFAULT '',
  `amount` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`)
)
  COLLATE='utf8_general_ci'
  ENGINE=InnoDB;


