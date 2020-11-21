#tabulky by sa asi mali odstranit pred znovuspustenim skriptu
#DROP TABLE OSOBA;
#DROP TABLE NEREG_OSOBA;
#DROP TABLE FESTIVAL;
#DROP TABLE USPORIADATEL_FESTIVAL;
#DROP TABLE INTERPRET;
#DROP TABLE INTERPRET_FESTIVAL;
#DROP TABLE SLOT;

#zakladna tabulka pre registrovane osoby
CREATE TABLE OSOBA (
    OsobaID int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Meno varchar(128) NOT NULL,
    Username varchar(128) NOT NULL,
    Email varchar(128) NOT NULL,
    Password varchar(128) NOT NULL
);

#o neregistrovanej osobe nevieme nic, mozeme ju identifikovat len ako nejake cislo
CREATE TABLE NEREG_OSOBA (
    Nereg_OsobaID int
);

CREATE TABLE FESTIVAL (
    FestivalID int,
    Nazov varchar(64),
    Popis varchar(255),
    Zaner varchar(64),
    Adresa varchar(64),
    Mesto varchar(64),
    Zaciatok date,
    Zaciatok_cas time,
    Koniec date,
    Koniec_cas time,
    Cena varchar(16),
    Kapacita int,
    CONSTRAINT FestivalPK PRIMARY KEY (FestivalID, Nazov, Mesto)

);

#vztah usporiadatela k festivalu
CREATE TABLE USPORIADATEL_FESTIVAL (
    OsobaID int,
    Meno varchar(255),
    Priezvisko varchar(255),
    Festival int,
    Nazov_Fest varchar(64),
    Mesto_Fest varchar(64)
    CONSTRAINT USP_FEST_PK PRIMARY KEY (OsobaID, Meno, Priezvisko, Festival, Nazov),
    CONSTRAINT USP_FK FOREIGN KEY (OsobaID,Meno, Priezvisko) REFERENCES OSOBA(OsobaID, Meno, Priezvisko),
    CONSTRAINT FEST_FK FOREIGN KEY (Festival, Nazov_Fest, Mesto_Fest) REFERENCES FESTIVAL
);

CREATE TABLE INTERPRET (
    InterpretID int,
    Clenovia varchar(64),
    Pseudonym varchar(32),
    Zaner varchar(64),
    Hodnotenie varchar(16),
    Tagy varchar(64)
    CONSTRAINT InterpetPK PRIMARY KEY (InterpretID, Pseudonym, Zaner)
);

#vztah interpreta k festivalu
CREATE TABLE INTERPRET_FESTIVAL (
    InterpretID int,
    Pseudonym varchar(255),
    Festival int,
    Nazov_Fest varchar(64),
    Mesto_Fest varchar(64)
    CONSTRAINT INT_FEST_PK PRIMARY KEY (InterpetID, Pseudonym,Festival, Nazov, Mesto_Fest),
    CONSTRAINT INT_FK FOREIGN KEY (InterpetID, Pseudonym) REFERENCES INTERPRET(InterpetID, Pseudonym),
    CONSTRAINT FEST_FK FOREIGN KEY (Festival, Nazov_Fest, Mesto_Fest) REFERENCES FESTIVAL
);

#slot je časový úsek, počas ktoreho hrá nejaky interpret na danom evente
#dolezite je len meno autora a casovy udaj
CREATE TABLE SLOT (
    Pseudonym_autora varchar(32),
    Zaciatok_cas time,
    Den varchar(8), #deň, kedy hrá, ale iba názov dňa, nie dátum
);


#INSERT INTO OSOBA VALUES (1, 'Jan', 'Novak', 'jno@gmail.com', '0908568985', 'Nové Zámky');



