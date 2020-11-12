CREATE DATABASE miniframework;

USE miniframework;

CREATE TABLE `miniframework`.`user` ( 
  `id` INT(255) NOT NULL AUTO_INCREMENT , 
  `nombre` VARCHAR(255) NOT NULL , 
  `email` VARCHAR(255) NOT NULL , 
  `password` VARCHAR(255) NOT NULL , 
  `salt` VARCHAR(255) NOT NULL , 
  `created_at` DATE NOT NULL , 
  PRIMARY KEY (`id`)
) ENGINE = InnoDB; 