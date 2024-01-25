Create database If not EXISTS Bienchezsoi

CREATE Table Chaises (
id SMALLINT PRIMARY KEY auto_increment,
marque VARCHAR(50),
nom VARCHAR (100),
prix SMALLINT
);

CREATE Table Tables (
id SMALLINT PRIMARY KEY auto_increment,
marque VARCHAR(50),
nom VARCHAR (100),
prix SMALLINT

);

CREATE Table Bureau (
id SMALLINT PRIMARY KEY auto_increment,
marque VARCHAR(50),
nom VARCHAR (100),
prix SMALLINT

);



INSERT INTO Chaises
(marque, nom, prix)
VALUES 
('Maison du monde','Emma', 79),
('Petit brin de déco','Zoé', 59),
('Tikamoon','Hubert', 99);

INSERT INTO Tables
(marque, nom, prix)
VALUES 
('La redoute','Inoa', 209),
('Bois dessus bois dessous','Brut', 199),
('Bolia','Izaac', 369);

INSERT INTO Bureau
(marque, nom, prix)
VALUES 
('Petit Brin de déco','Louis', 259),
('Kave Home','Matilda', 179),
('Tikamoon','Ulysse', 149);
