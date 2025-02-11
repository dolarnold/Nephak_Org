CREATE DATABASE IF NOT EXISTS `admin_panel`;
USE `admin_panel`;

-- Table: sections
CREATE TABLE IF NOT EXISTS `sections` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `section_name` VARCHAR(50) NOT NULL UNIQUE,
    `content` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table: admin_users
CREATE TABLE IF NOT EXISTS `admin_users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(50) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL, -- Store hashed passwords
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table: team_members
CREATE TABLE IF NOT EXISTS `team_members` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `position` VARCHAR(100) NOT NULL,
    `bio` TEXT,
    `image` VARCHAR(255), -- Path to the image file
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table: careers
CREATE TABLE IF NOT EXISTS `careers` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `job_title` VARCHAR(100) NOT NULL,
    `description` TEXT NOT NULL,
    `requirements` TEXT,
    `posted_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table: tenders
CREATE TABLE IF NOT EXISTS `tenders` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(100) NOT NULL,
    `description` TEXT NOT NULL,
    `document` VARCHAR(255), -- Path to the tender document
    `posted_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table: volunteers
CREATE TABLE IF NOT EXISTS `volunteers` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `phone` VARCHAR(20),
    `message` TEXT,
    `applied_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table: contact_requests
CREATE TABLE IF NOT EXISTS `contact_requests` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `subject` VARCHAR(255),
    `message` TEXT,
    `submitted_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);