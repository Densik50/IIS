#zatial mam na servery len tuto databazu potom mozme skusat pridavat ostatne
CREATE TABLE OSOBA (
    OsobaID int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Meno varchar(128) NOT NULL,
    Username varchar(128) NOT NULL,
    Email varchar(128) NOT NULL,
    Password varchar(128) NOT NULL
);