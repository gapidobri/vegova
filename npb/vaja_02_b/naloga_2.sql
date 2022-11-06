-- 1.	Kreirajte PB GlasbenaZbirka_innoDB. Nabor znakov in razvrščanje naj bo prilagojenom ‘našim’ uporabnikom. 
CREATE SCHEMA `GlasbenaZbirka_innoDB`
  DEFAULT CHARACTER SET utf8
  COLLATE utf8_slovenian_ci;

/*
  2. Kreirajte naslednje tabele in pri tem povsod uporabite engine innoDB:
  -	Avtor(AvtorID:N, Ime:A20, Priimek:A20, Opus) 
  -	Posnetek (PID:N, Naslov:A30, Genre:A20, Trajanje:D, AvtorID:N->Avtor)
  -	CD(CDID:N, NaslovCD:A30, Cena:N,Opombeo:A150, lastnik:N)
  -	Vsebina(CDID:N->CD,PID:N->Posnetek)
  -	Lastnik(LID:N, Ime:A20, Priimek:A20, Tel:A20, eMail:A30)
*/
CREATE TABLE Avtor (
  avtorId INT         AUTO_INCREMENT,
  ime     VARCHAR(20) NOT NULL,
  priimek VARCHAR(20) NOT NULL,
  opus    SET("opera", "kantata", "simfonija", "koncert", "balada", "drugo") NOT NULL,
  PRIMARY KEY (avtorId)
);

CREATE TABLE Posnetek (
  pid       INT         AUTO_INCREMENT,
  naslov    VARCHAR(30) NOT NULL,
  genre     ENUM("klasika", "pop", "jazz") NOT NULL,
  trajanje  TIME,
  avtorId   INT,
  PRIMARY KEY (pid),
  FOREIGN KEY (avtorId) REFERENCES Avtor(avtorId)
);

CREATE TABLE CD (
  cdid      INT           AUTO_INCREMENT,
  naslovCD  VARCHAR(30)   NOT NULL,
  cena      DECIMAL(2)    NOT NULL,
  opombe    VARCHAR(150),
  lastnik   INT           NOT NULL,
  PRIMARY KEY (cdid),
  FOREIGN KEY (lastnik) REFERENCES Lastnik(lid)
);

CREATE TABLE Vsebina (
  cdid  INT,
  pid   INT,
  PRIMARY KEY (cdid, pid),
  FOREIGN KEY (cdid) REFERENCES CD(cdid),
  FOREIGN KEY (pid) REFERENCES Posnetek(pid)
);

CREATE TABLE Lastnik (
  lid     INT         AUTO_INCREMENT,
  ime     VARCHAR(20) NOT NULL,
  priimek VARCHAR(20) NOT NULL,
  tel     VARCHAR(20) NOT NULL,
  eMail   VARCHAR(30) NOT NULL,
  PRIMARY KEY (lid)
);

-- Ustvarjanje tabele CD ni uspešno, ker tabela Lastnik še ni bila ustvarjena

-- 3.	Izpišite seznam table in natančen opis vseh tabel. // show create table
SHOW CREATE TABLE Avtor;
SHOW CREATE TABLE Posnetek;
SHOW CREATE TABLE CD;
SHOW CREATE TABLE Vsebina;
SHOW CREATE TABLE Lastnik;

-- 4.	Atribut lastnik tabele CD spremenite tako, da bo tuji ključ, ki kaže na tabelo Lastnik.
ALTER TABLE CD
  ADD FOREIGN KEY (lastnik) REFERENCES Lastnik(lid);

-- 5.	Tabeli CD dodajte atribut Leto tipa year.
ALTER TABLE CD
  ADD leto YEAR NOT NULL;

-- 6.	Izpišite opis tabele CD.
SHOW CREATE TABLE CD;

-- 7.	Ustvarite tabelo Owner, ki bo imela enako strukturo kot tabela Lastnik.
CREATE TABLE Owner AS
  SELECT * FROM Lastnik;