--

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `exads`;
CREATE DATABASE `exads` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `exads`;

DROP TABLE IF EXISTS `exads_test`;
CREATE TABLE `exads_test` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `age` int NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `exads_test` (`id`, `name`, `age`, `job_title`) VALUES
(1,	'Donald Knuth',	82,	'Computer Scientist'),
(2,	'Linus Torvalds',	50,	'Software Engineer'),
(3,	'Robert C. Martin',	67,	'Software Engineer'),
(4,	'Martin Fowler',	56,	'Software Engineer'),
(5,	'Robert Sedgewick',	73,	'Professor');

DROP TABLE IF EXISTS `exads_design_test`;
CREATE TABLE `exads_design_test` (
  `design_id` int NOT NULL AUTO_INCREMENT,
  `design_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `split_percent` int NOT NULL,
  PRIMARY KEY (`design_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `exads_design_test` (`design_id`, `design_name`, `split_percent`) VALUES
(1,	'Design 1',	50),
(2,	'Design 2',	25),
(3,	'Design 3',	25);

-- 2020-05-10 00:52:39
