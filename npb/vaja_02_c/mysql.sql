-- 1. Za SUPB MySql ustvarite PB JavnaUprava
CREATE SCHEMA JavnaUprava
  DEFAULT CHARACTER SET utf8
  COLLATE utf8_slovenian_ci;

-- 2. Zapišite stavek SQL DDL, s katerimi boste naredili tabeli

CREATE TABLE Pokrajina (
  pokrajinaId   INT         AUTO_INCREMENT,
  imePokrajine  VARCHAR(20) NOT NULL,
  PRIMARY KEY (pokrajinaId)
);

CREATE TABLE Kraj (
  krajId      INT         AUTO_INCREMENT,
  pokrajinaId INT,
  imeKraja    VARCHAR(30) NOT NULL,
  PRIMARY KEY (krajId),
  FOREIGN KEY (pokrajinaId) REFERENCES Pokrajina(pokrajinaId)
);

-- 3. Tabeli Pokrajina dodajte atribut Opis:A50. Atribut Opis je opcijski.

ALTER TABLE Pokrajina
  ADD opis VARCHAR(50);

-- 4. Tabeli Kraj dodajte atribut SteviloPrebivalcev:N. Atribut SteviloPrebivalcev je celoštevilskega tipa, njegova vrednost je >=0.

ALTER TABLE Kraj
  ADD steviloPrebivalcev INT
  CHECK (steviloPrebivalcev >= 0);

-- 5. Ustvarite tabelo Obcan

CREATE TABLE Obcan (
  emso          VARCHAR(13),
  ime           VARCHAR(20) NOT NULL,
  priimek       VARCHAR(20) NOT NULL,
  datumRojstva  DATE        NOT NULL,
  krajId INT,
  PRIMARY KEY (emso)
);

-- 6. Spremenite tabelo Obcan

ALTER TABLE Obcan
  ADD FOREIGN KEY (krajId) REFERENCES Kraj(krajId)
  ON UPDATE CASCADE
  ON DELETE SET NULL;

-- 7. V tabeli Obcan zamenjajte vrstni red atributov Ime in Priimek

ALTER TABLE Obcan
  MODIFY ime VARCHAR(20) AFTER priimek;

-- 8. Tabeli Obcan dodajte atribut Spol. Atribut naj bo naštevnega podatkovnega tipa (ENUM)

ALTER TABLE Obcan
  ADD spol ENUM('m', 'ž') NOT NULL;

-- 9. Oglejte si seznam tabel v PB

SHOW TABLES;

-- 10. Izpišite strukturo vsake izmed tabel

DESCRIBE Pokrajina;
DESCRIBE Kraj;
DESCRIBE Obcan;

-- 11. Ustvarite tabelo Obisk

CREATE TABLE Obisk (
  emso        VARCHAR(13),
  krajId      INT,
  datumObiska DATE NOT NULL,
  PRIMARY KEY (emso, krajId, datumObiska),
  FOREIGN KEY (emso) REFERENCES Obcan(emso),
  FOREIGN KEY (krajId) REFERENCES Kraj(krajId)
);

-- 12. Ustvarite tabelo Vtisi

CREATE TABLE Vtisi (
  zapSt       INT AUTO_INCREMENT,
  emso        VARCHAR(13),
  krajId      INT,
  datumObiska DATE NOT NULL,
  besedilo    VARCHAR(100) DEFAULT "vse naj",
  PRIMARY KEY (zapSt, emso, krajId, datumObiska),
  FOREIGN KEY (emso) REFERENCES Obisk(emso),
  FOREIGN KEY (krajId) REFERENCES Obisk(krajId),
  FOREIGN KEY (datumObiska) REFERENCES Obisk(datumObiska)
);

-- Error Code: 1005. Can't create table `JavnaUprava`.`Vtisi` (errno: 150 "Foreign key constraint is incorrectly formed")
