-- Active: 1734994375824@@127.0.0.1@3306@anforum

CREATE DATABASE anforum;
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    parentid INT,
    post VARCHAR(256)
);
