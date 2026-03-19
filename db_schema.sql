-- Anopcharik Patra Topics Database Schema
-- Database: anopcharik_patra

CREATE DATABASE IF NOT EXISTS `anopcharik_patra` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `anopcharik_patra`;

-- Posts table for storing all letter topics
CREATE TABLE IF NOT EXISTS `posts` (
    `id` INT(11) PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(500) NOT NULL,
    `slug` VARCHAR(255) NOT NULL UNIQUE,
    `content` LONGTEXT NOT NULL,
    `meta_title` VARCHAR(255) NOT NULL,
    `meta_desc` VARCHAR(500) NOT NULL,
    `category` VARCHAR(100) NOT NULL,
    `keywords` VARCHAR(500) DEFAULT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX `idx_slug` (`slug`),
    INDEX `idx_category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Categories table for organizing posts
CREATE TABLE IF NOT EXISTS `categories` (
    `id` INT(11) PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `slug` VARCHAR(100) NOT NULL UNIQUE,
    `description` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert default categories
INSERT INTO `categories` (`name`, `slug`, `description`) VALUES
('पिता/माता को पत्र', 'father-mother', 'Letters to Father and Mother'),
('मित्र को पत्र', 'friends', 'Letters to Friends'),
('भाई/बहन को पत्र', 'siblings', 'Letters to Brothers and Sisters'),
('बधाई/शोक पत्र', 'congratulatory', 'Congratulatory and Condolence Letters');

-- Table for storing AI generated letters
CREATE TABLE IF NOT EXISTS `user_letters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_identifier` varchar(255) DEFAULT NULL,
  `relation` varchar(50) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `generated_content` text NOT NULL, -- JSON
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
