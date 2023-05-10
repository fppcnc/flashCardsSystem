DROP DATABASE IF EXISTS lernkartesystem;

CREATE DATABASE lernkartesystem;

USE lernkartesystem;

CREATE TABLE lerner
(
    id       INT PRIMARY KEY AUTO_INCREMENT,
    vorname  VARCHAR(45),
    nachname VARCHAR(45)
);

CREATE TABLE frage
(
    id                INT PRIMARY KEY AUTO_INCREMENT,
    fachsbeschreibung VARCHAR(45),
    frage             VARCHAR(255),
    antwortA          VARCHAR(255),
    antwortB          VARCHAR(255),
    antwortC          VARCHAR(255),
    richtigeAntwort   VARCHAR(1)
);

CREATE TABLE lernkarte
(
    id       INT PRIMARY KEY AUTO_INCREMENT,
    fragenId INT,
    FOREIGN KEY (fragenId) REFERENCES frage (id)
);

CREATE TABLE waehle
(
    id          INT PRIMARY KEY AUTO_INCREMENT,
    lernkarteId INT,
    menge       INT,
    FOREIGN KEY (lernkarteId) REFERENCES lernkarte (id)
);

CREATE TABLE test
(
    id       INT PRIMARY KEY AUTO_INCREMENT,
    lernerId INT,
    waehleId INT,
    FOREIGN KEY (lernerId) REFERENCES lerner (id),
    FOREIGN KEY (waehleId) REFERENCES waehle (id)
)

INSERT INTO lerner VALUES (NULL, 'Filippo', 'Concato');
INSERT INTO lerner VALUES (NULL, 'Fernanda', 'Rojas');
INSERT INTO lerner VALUES (NULL, 'Katarina', 'Fröhele');

INSERT INTO frage VALUES (NULL, 'Mathematik', '5 + 5 = ? ', '8', '752', '10', 'C');
INSERT INTO frage VALUES (NULL, 'Mathematik', '5 * 5 = ? ', '-18', '13,25', '25', 'C');
INSERT INTO frage VALUES (NULL, 'Mathematik', '7^4 = ? ', '2401', '12', '7412', 'A');
INSERT INTO frage VALUES (NULL, 'Mathematik', 'Leila wanted to find the area of a circular mat.
She measured the diameter of the mat as 200 cm.
Later, the diameter of the mat was more accurately measured as 196 cm.
What is the relative error in her area calculation to the nearest thousandth? ', '0.039', '0.041', '0.042', 'B');
INSERT INTO frage VALUES (NULL, 'Mathematik', 'Eva, Frank, Abi, Ben, Carlos and Deborah all shop at the same store.

Eva buys 5 apples and 3 bananas and pays $3.05
Frank buys 2 apples and 7 bananas and pays $3.25
We know that both these amounts are correct.

Abi buys 9 apples and 17 bananas and pays $9.55
Ben buys 7 apples and 10 bananas and pays $6.30
Carlos buys 17 apples and 16 bananas and pays $12.80
Deborah buys 12 apples and 13 bananas and pays $9.35

Which one of Abi, Ben, Carlos and Deborah was cheated?', 'Abi', 'Deborah', 'Carlos', 'C');
INSERT INTO frage VALUES (NULL, 'General Culture', 'What’s special about some of the Vatican Bank`s ATMs', 'The Spanish audio option uses the Pope’s voice', 'You can select Latin as your language ', 'A fixed % of your withdrawal is automatically given to charity', 'B');
INSERT INTO frage VALUES (NULL, 'General Culture', 'What is the capital of the Philippines? ', 'Marawi', 'Manilla', 'Jakarta', 'B');
INSERT INTO frage VALUES (NULL, 'General Culture', 'What is the capital of Australia? ', 'Canberra', 'Sydney', 'Melbourne', 'A');
INSERT INTO frage VALUES (NULL, 'General Culture', 'What country has the greatest number of active volcanoes?', 'Indonesia', 'Italy', 'Japan', 'A');
INSERT INTO frage VALUES (NULL, 'General Culture', 'What is the most abundant gas in the Earth’s atmosphere?', 'Carbon Dioxide', 'Helium', 'Nitrogen', 'C');
INSERT INTO frage VALUES (NULL, 'General Culture', 'What is the most abundant gas in the Earth’s atmosphere?', 'Carbon Dioxide', 'Helium', 'Nitrogen', 'C');
INSERT INTO frage VALUES (NULL, 'General Culture', 'What is the most abundant gas in the Earth’s atmosphere?', 'Carbon Dioxide', 'Helium', 'Nitrogen', 'C');
INSERT INTO frage VALUES (NULL, 'General Culture', 'What is the most abundant gas in the Earth’s atmosphere?', 'Carbon Dioxide', 'Helium', 'Nitrogen', 'C');
INSERT INTO frage VALUES (NULL, 'General Culture', 'What is the most abundant gas in the Earth’s atmosphere?', 'Carbon Dioxide', 'Helium', 'Nitrogen', 'C');
INSERT INTO frage VALUES (NULL, 'General Culture', 'What is the most abundant gas in the Earth’s atmosphere?', 'Carbon Dioxide', 'Helium', 'Nitrogen', 'C');
