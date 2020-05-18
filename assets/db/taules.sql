
DROP TABLE IF EXISTS Client;
DROP TABLE IF EXISTS Professional;
DROP TABLE IF EXISTS Compte;


CREATE TABLE Client (
    Email varchar(20) PRIMARY KEY NOT NULL,
    IBAN varchar(22),
    FOREIGN KEY (Email) REFERENCES users(Email),
    FOREIGN KEY (IBAN) REFERENCES Compte(IBAN)
);

CREATE TABLE compte(
    iban varchar(22) PRIMARY KEY NOT NULL,
    DATA  date DEFAULT CURRENT_TIMESTAMP,
    sou decimal,
    email_client varchar(20),
    FOREIGN KEY (email_client) REFERENCES users(email)
);


CREATE TABLE Transferencia (
    iban_destinatario varchar(22),
    concepto varchar(20),
    beneficiario varchar(20),
    data date DEFAULT CURRENT_TIMESTAMP,
    import decimal,
    Email_Client varchar(20),
    FOREIGN KEY (Email_Client) REFERENCES users(Email)
);

 insert into Transferencia("iban_destinatario","concepto","beneficiario","data","import","email_client") VALUES('ES4949','Movil','Abudu Touray','12-12-2020','200','ew@gmail.com');


 insert into compte("iban","data","sou","email_client") VALUES('ES123','12-12-2020','0','r@gmil.com');






