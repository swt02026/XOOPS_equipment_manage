#
# Structure table for `equipment_equipment` 6
#

CREATE TABLE `equipment_equipment` (
  `id`     SMALLINT(5) UNSIGNED NOT NULL  AUTO_INCREMENT,
  `owner`  VARCHAR(10)          NOT NULL,
  `name`   VARCHAR(30)          NOT NULL,
  `amount` INT(10) UNSIGNED     NOT NULL,
  `total`  INT(10) UNSIGNED     NOT NULL,
  `image`  VARCHAR(100)         NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT uq UNIQUE (owner, name)
)
COLLATE = 'utf8_general_ci'
  ENGINE = InnoDB;

#
# Structure table for `equipment_rentals` 6
#

CREATE TABLE `equipment_rentals` (
  `id`          SMALLINT(5) UNSIGNED NOT NULL  AUTO_INCREMENT,
  `customerid`  INT(5)               NOT NULL,
  `equipmentid` INT(10) UNSIGNED     NOT NULL,
  `quantity`    INT(8)               NOT NULL,
  `datefrom`    DATETIME             NOT NULL,
  `dateto`      DATETIME             NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB;

#
# Structure table for `equipment_customer` 7
#

CREATE TABLE `equipment_customer` (
  `id`      INT(8)       NOT NULL  AUTO_INCREMENT,
  `first`   VARCHAR(30)  NOT NULL,
  `last`    VARCHAR(50)  NOT NULL,
  `address` VARCHAR(100) NOT NULL,
  `city`    VARCHAR(100) NOT NULL,
  `country` VARCHAR(20)  NOT NULL,
  `created` DATETIME     NOT NULL,
  PRIMARY KEY (`id`),
  KEY `first` (`first`),
  KEY `last` (`last`),
  KEY `address` (`address`)
)
COLLATE = 'utf8_general_ci'
ENGINE = InnoDB;
