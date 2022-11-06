-- 2. Ustvarite novo mapo Baze in vanjo prenesite podatkovno bazo GLASBENAZBIRKA.FDB 

CONNECT GLASBENAZBIRKA.FDB;

-- 3. Izpišite seznam table in natančen opis vseh tabel

SHOW TABLE;
SHOW TABLE CD;
SHOW TABLE AVTOR;
SHOW TABLE VSEBINA;
SHOW TABLE POSNETEK;

-- 4. Tabeli CD dodajte atribut Leto tipa int

ALTER TABLE CD
  ADD leto INT;

-- 5. Izpišite opis tabele CD

SHOW TABLE CD;

-- 6. V tabelah Avtor in Lastnik zamenjajte vrstni red atributov ime in priimek

ALTER TABLE Avtor
  ALTER COLUMN priimek POSITION 2;

-- 7. Tabeli Avtor dodajte atribut Opus, ki je podtkovnega tipa niz, največ 100 znakov.

ALTER TABLE Avtor
  ADD opus VARCHAR(100);

-- 8. V tabelo Avtor dodajte naslednje zapise, tako da bo izpis tabele po izvedenih tranaskcijah naslednji

INSERT INTO Avtor (avtorId, priimek, ime, opus)
  VALUES (10, 'Orff', 'Carl', 'opera, kantata, drugo');

INSERT INTO Avtor (avtorId, priimek, ime, opus)
  VALUES (20, 'Gounod', 'Charles', 'opera, simfonija, drugo');

INSERT INTO Avtor (avtorId, priimek, ime, opus)
  VALUES (30, 'Adams', 'Brian', 'balada, drugo');

INSERT INTO Avtor (avtorId, priimek, ime, opus)
  VALUES (40, 'Cohen', 'Leonard', 'balada, drugo');

INSERT INTO Avtor (avtorId, priimek, ime, opus)
  VALUES (50, 'Donizetti', 'Gaetano', 'opera');
  
-- 9. Tabeli Avtor dodajte atribut DatumRojstva tipa date.

ALTER TABLE Avtor
  ADD datumRojstva DATE;

-- 10. Posodobite zapise tabele Avtor tako, da dopišete manjkajoče letnice rojstev (Orff 1895, Gounod 1818, Adams 1959, Cohen 1934, Donizetti 1797).

UPDATE Avtor
  SET datumRojstva = 1895
  WHERE avtorId = 10;

UPDATE Avtor
  SET datumRojstva = 1818
  WHERE avtorId = 20;

UPDATE Avtor
  SET datumRojstva = 1959
  WHERE avtorId = 30;

UPDATE Avtor
  SET datumRojstva = 1934
  WHERE avtorId = 40;

UPDATE Avtor
  SET datumRojstva = 1797
  WHERE avtorId = 50;

ALTER TABLE Avtor
  ALTER COLUMN datumRojstva TYPE INT;

-- 11. Izpišite vsebino tabele Avtor (stavek SELECT)

SELECT * FROM Avtor;

-- 14. Ustvarite tabelo Drzava

CREATE TABLE Drzava (
  did       INT,
  imeDrzave VARCHAR(20),
);

