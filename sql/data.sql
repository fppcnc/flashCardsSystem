DROP DATABASE IF EXISTS flashcardssystem;

CREATE DATABASE flashcardssystem;

USE flashcardssystem;

CREATE TABLE student
(
    id       INT PRIMARY KEY AUTO_INCREMENT,
    firstName  VARCHAR(45),
    lastName VARCHAR(45)
);

CREATE TABLE question
(
    id                INT PRIMARY KEY AUTO_INCREMENT,
    subject VARCHAR(45),
    question             VARCHAR(255),
    answerA          VARCHAR(255),
    answerB          VARCHAR(255),
    answerC          VARCHAR(255),
    rightAnswer   VARCHAR(1)
);

CREATE TABLE flashcard
(
    id       INT PRIMARY KEY AUTO_INCREMENT,
    questionId INT,
    FOREIGN KEY (questionId) REFERENCES question (id)
);

CREATE TABLE choice
(
    id          INT PRIMARY KEY AUTO_INCREMENT,
    flashcardId INT,
    amount       INT,
    FOREIGN KEY (flashcardId) REFERENCES flashcard (id)
);

CREATE TABLE test
(
    id       INT PRIMARY KEY AUTO_INCREMENT,
    studentId INT,
    choiceId INT,
    FOREIGN KEY (studentId) REFERENCES student (id),
    FOREIGN KEY (choiceId) REFERENCES choice (id)
)

INSERT INTO student VALUES (NULL, 'Filippo', 'Concato');
INSERT INTO student VALUES (NULL, 'Fernanda', 'Rojas');
INSERT INTO student VALUES (NULL, 'Katarina', 'Fröhele');

INSERT INTO question VALUES (NULL, 'Maths', '5 + 5 = ? ', '8', '752', '10', 'C');
INSERT INTO question VALUES (NULL, 'Maths', '5 * 5 = ? ', '-18', '13,25', '25', 'C');
INSERT INTO question VALUES (NULL, 'Maths', '7^4 = ? ', '2401', '12', '7412', 'A');
INSERT INTO question VALUES (NULL, 'Maths', 'Leila wanted to find the area of a circular mat.
She measured the diameter of the mat as 200 cm.
Later, the diameter of the mat was more accurately measured as 196 cm.
What is the relative error in her area calculation to the nearest thousandth? ', '0.039', '0.041', '0.042', 'B');
INSERT INTO question VALUES (NULL, 'Maths', 'Eva, Frank, Abi, Ben, Carlos and Deborah all shop at the same store.

Eva buys 5 apples and 3 bananas and pays $3.05
Frank buys 2 apples and 7 bananas and pays $3.25
We know that both these amounts are correct.

Abi buys 9 apples and 17 bananas and pays $9.55
Ben buys 7 apples and 10 bananas and pays $6.30
Carlos buys 17 apples and 16 bananas and pays $12.80
Deborah buys 12 apples and 13 bananas and pays $9.35

Which one of Abi, Ben, Carlos and Deborah was cheated?', 'Abi', 'Deborah', 'Carlos', 'C');
INSERT INTO question VALUES (NULL, 'General Culture', 'What’s special about some of the Vatican Bank`s ATMs', 'The Spanish audio option uses the Pope’s voice', 'You can select Latin as your language ', 'A fixed % of your withdrawal is automatically given to charity', 'B');
INSERT INTO question VALUES (NULL, 'General Culture', 'What is the capital of the Philippines? ', 'Marawi', 'Manilla', 'Jakarta', 'B');
INSERT INTO question VALUES (NULL, 'General Culture', 'What is the capital of Australia? ', 'Canberra', 'Sydney', 'Melbourne', 'A');
INSERT INTO question VALUES (NULL, 'General Culture', 'What country has the greatest number of active volcanoes?', 'Indonesia', 'Italy', 'Japan', 'A');
INSERT INTO question VALUES (NULL, 'General Culture', 'What is the most abundant gas in the Earth’s atmosphere?', 'Carbon Dioxide', 'Helium', 'Nitrogen', 'C');


SELECT * FROM question;