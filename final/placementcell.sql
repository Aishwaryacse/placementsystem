CREATE DATABASE placementcell;

USE placementcell;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    registernumber VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    usertype ENUM('student', 'admin') NOT NULL
);
