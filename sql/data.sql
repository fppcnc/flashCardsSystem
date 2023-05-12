DROP DATABASE IF EXISTS flashcardssystem;

CREATE DATABASE flashcardssystem;

USE flashcardssystem;

CREATE TABLE student
(
    id       INT PRIMARY KEY AUTO_INCREMENT,
    firstName  VARCHAR(45),
    lastName VARCHAR(45),
    password VARCHAR(255),
    registrationTime DATE
);


