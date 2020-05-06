CREATE Database Bank IF NOT EXISTS
DROP TABLE IF EXISTS Client;
DROP TABLE IF EXISTS Administrador;
DROP TABLE IF EXISTS Professional;
DROP TABLE IF EXISTS Compte;


CREATE TABLE Client (
    DNI varchar(9) PRIMARY KEY NOT NULL,
    IBAN varchar(22)
);

CREATE TABLE Compte(
    IBAN varchar(22) PRIMARY KEY NOT NULL,
    DATA Date,
    Concepte varchar(20),
    IMPORT float,
    SOU float,
    DNI_Client varchar(9),
    FOREIGN KEY (DNI_Client) REFERENCES Client(DNI)
);


CREATE TABLE Professional (
    DNI varchar(9) PRIMARY KEY NOT NULL,
    DNI_Client varchar(9),
    FOREIGN KEY (DNI_Client) REFERENCES Client(DNI)
);

ALTER TABLE Client ADD FOREIGN KEY (IBAN) REFERENCES Compte(IBAN); 



