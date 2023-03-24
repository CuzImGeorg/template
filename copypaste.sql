/*
 De Sqls hängen net mit die klassen von entity zommen
    id int AUTO_INCREMENT PRIMARY KEY,




 */

CREATE TABLE benutzer (
    id int AUTO_INCREMENT PRIMARY KEY,
    vorname varchar(63),
    nachname varchar(63),
    email varchar(63),
    nickname varchar(63),
    password varchar(63)


);

CREATE TABLE zustand
(
    id   int AUTO_INCREMENT PRIMARY KEY,
    name varchar(63)
);

CREATE TABLE artikel(
    id int AUTO_INCREMENT PRIMARY KEY,
    name varchar(63),
    datum timestamp, /*hoffentlich geath des in mysql */

    zustandid int,
    FOREIGN KEY (zustandid) REFERENCES zustand(id)

);