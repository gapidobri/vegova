-- 2., 3. Ustvarjanje tabele Predmet
CREATE TABLE Predmet (
  pid           INT           AUTO_INCREMENT,
  kratica       VARCHAR(3)    NOT NULL,
  imePredmeta   VARCHAR(20)   NOT NULl,
  kreditneTocke INT           NOT NULL,
  opis          VARCHAR(200)  NOT NUll,
  PRIMARY KEY (pid)
)
AUTO_INCREMENT = 100
CHARACTER SET = utf8;

-- 4. Uporabljen je način hranjenja InnoDB

-- 5. Dodajanje predmetov v tabelo
INSERT INTO Predmet (kratica, imePredmeta, kreditneTocke, opis)
  VALUES ("MAT", "Matematika", 100, "Opis predmeta matematike");

INSERT INTO Predmet (kratica, imePredmeta, kreditneTocke, opis)
  VALUES ("PPB", "Podatkovne baze", 80, "Opis predmeta podatkovne baze");

INSERT INTO Predmet (kratica, imePredmeta, kreditneTocke, opis)
  VALUES ("FIZ", "Fizika", 30, "Opis predmeta fizika");

INSERT INTO Predmet (kratica, imePredmeta, kreditneTocke, opis)
  VALUES ("SPL", "Spletne aplikacije", 70, "Opis predmeta spletne aplikacije");

INSERT INTO Predmet (kratica, imePredmeta, kreditneTocke, opis)
  VALUES ("MUL", "Multimedijska tehnologija", 60, "Opis predmeta multimedijska tehonologija");

-- 6. Dodajanje atributa stUrNaTeden
ALTER TABLE Predmet
  ADD stUrNaTeden INT NOT NULL;

-- 8. Spremninjanje vrednosti stUrNaTeden

UPDATE Predmet
  SET stUrNaTeden = 4
  WHERE kratica = "MAT";

UPDATE Predmet
  SET stUrNaTeden = 4
  WHERE kratica = "PPB";

UPDATE Predmet
  SET stUrNaTeden = 3
  WHERE kratica = "FIZ";

UPDATE Predmet
  SET stUrNaTeden = 5
  WHERE kratica = "SPL";

UPDATE Predmet
  SET stUrNaTeden = 4
  WHERE kratica = "MUL";


-- 6. Dodajanje CHECK ni uspešno če prej ne popravimo vseh vnosov v tabeli
ALTER TABLE Predmet
  ADD CHECK (stUrNaTeden >= 2 AND stUrNaTeden <= 6);

-- 9. Tabeli dodajte atribut opomba, ki vsebuje največ 100 znakov in je opcijski atribut.
ALTER TABLE Predmet
  ADD opombe VARCHAR(100);

-- 10.	Izpišite vsebino tabele Predmet.
SELECT * FROM Predmet;

-- 11.	Posodobite atribut opombe tako, da bo matematika zahtevna in uporabna, podatkovne baze pa zanimive in uporabne, fizika pa le zanimiva.
UPDATE Predmet
  SET opombe = "zanimivo uporabno"
  WHERE kratica = "MAT";

UPDATE Predmet
  SET opombe = "zanimivo uporabno"
  WHERE kratica = "PPB";

UPDATE Predmet
  SET opombe = "zanimiva"
  WHERE kratica = "FIZ";

-- 12.	Izpišite imena predmetov, ki imajo 2 opombi (uporaba funkcije locate() za iskanje presledka).
SELECT * FROM Predmet
  WHERE LOCATE(" ", opombe) != 0;

-- 13.	Izpišite imena predmetov, ki nimajo opombe uporabno.
SELECT imePredmeta FROM Predmet
  WHERE opombe NOT LIKE "%uporabno%"

-- 14.	Izpišite imena predmetov, ki se izvajajo 4 ure tedensko.
SELECT imePredmeta FROM Predmet
  WHERE stUrNaTeden = 4;