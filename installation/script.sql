/*
 * Reset no banco de dados
 */
DROP DATABASE IF EXISTS `db_megaquality`;
CREATE DATABASE `db_megaquality`;
USE `db_megaquality`;

CREATE TABLE `users` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `username` VARCHAR(50) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE=InnoDB;

CREATE TABLE `items` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `description` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE=InnoDB;



