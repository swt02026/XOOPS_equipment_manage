CREATE TABLE `equipment_owner` (
  `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `owner` VARCHAR (10) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
)
  COLLATE='utf8_general_ci'
  ENGINE=InnoDB;
CREATE TABLE `equipment_desc` (
  `id` SMALLINT UNSIGNED NOT NULL,
  `name` VARCHAR (30) NOT NULL DEFAULT '',
  `image` LONGBLOB NOT NULL ,
  PRIMARY KEY (`id`),
  CONSTRAINT test FOREIGN KEY (`id`) REFERENCES equipment_owner(id) ON DELETE CASCADE ON UPDATE CASCADE
)
  COLLATE='utf8_general_ci'
  ENGINE=InnoDB;


