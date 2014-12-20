/*
 * Reset no banco de dados
 */
DROP DATABASE IF EXISTS `db_megaquality`;
CREATE DATABASE `db_megaquality`;
USE `db_megaquality`;


/*
 * Usuarios
 */
CREATE TABLE `users` (
    `id` INT NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    `username` VARCHAR(50) NOT NULL,
    `password` VARCHAR(50) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE=InnoDB;
