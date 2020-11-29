#zatial mam na servery len tuto databazu potom mozme skusat pridavat ostatne
CREATE TABLE USERS (
    UserID int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Fullname varchar(128) NOT NULL,
    Username varchar(128) NOT NULL,
    Email varchar(128) NOT NULL,
    Password varchar(128) NOT NULL,
    Mobile varchar(128),
    Address varchar(128),
    is_admin boolean NOT NULL,
    is_banned boolean NOT NULL
);

CREATE TABLE GENRE (
    GenreID int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    GenreName varchar(32)
);

CREATE TABLE EVENTS (
    EventID int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Name varchar(128) NOT NULL,
    Describtion varchar(255),
    Address varchar(128) NOT NULL,
    Start_date date NOT NULL,
    Start_time time NOT NULL,
    End_date date NOT NULL,
    End_time time NOT NULL,
    Price varchar(16) NOT NULL,
    Kapacita int NOT NULL,
    UserID int NOT NULL,
    FOREIGN KEY (UserID) REFERENCES USERS(UserID)
);

CREATE TABLE EVENT_GENRES (
    EventID int,
    GenreID int,
    FOREIGN KEY (EventID) REFERENCES EVENTS(EventID),
    FOREIGN KEY (GenreID) REFERENCES GENRE(GenreID)
);

CREATE TABLE EVENT_CASHIERS (
    EventID int,
    UserID int,
    FOREIGN KEY (EventID) REFERENCES EVENTS(EventID),
    FOREIGN KEY (UserID) REFERENCES USERS(UserID)
);

CREATE TABLE INTERPRET (
    InterpretID int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Name varchar(128)
);

CREATE TABLE INTERPRET_USERS (
    InterpretID int,
    UserID int,
    FOREIGN KEY (InterpretID) REFERENCES INTERPRET(InterpretID),
    FOREIGN KEY (UserID) REFERENCES USERS(UserID)
);

CREATE TABLE INTERPRET_GENRES (
    InterpretID int,
    GenreID int,
    FOREIGN KEY (InterpretID) REFERENCES INTERPRET(InterpretID),
    FOREIGN KEY (GenreID) REFERENCES GENRE(GenreID)
);

CREATE TABLE EVENT_INTERPRETS (
    EventID int,
    InterpretID int,
    Stage_name varchar(16),
    Start_time time,
    Start_date date,
    End_time time,
    End_date date,
    FOREIGN KEY (EventID) REFERENCES EVENTS(EventID),
    FOREIGN KEY (EventID) REFERENCES INTERPRET(InterpretID)
);