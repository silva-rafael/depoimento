// Arquivo: config/database.sql
CREATE DATABASE loginpage;
USE loginpage;
CREATE TABLE adminlogin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user'
);
INSERT INTO adminlogin (username, password, role) VALUES
('admin', '$2y$10$J8Xz7Y5Z9Qz3W8X9Y7Z9QeJ8Xz7Y5Z9Qz3W8X9Y7Z9QeJ8Xz7Y5Z', 'admin');