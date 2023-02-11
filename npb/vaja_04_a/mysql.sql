/* 
 2. Tabeli Avtor dodajte atribut opus.
 Atribut je množica vrednosti 'opera','kantata','simfonija','koncert','balada','drugo',
 privzeta vrednost naj bo 'drugo'.
 */
ALTER TABLE
  Avtor
ADD
  COLUMN opus ENUM(
    'opera',
    'kantata',
    'simfonija',
    'koncert',
    'balada',
    'drugo'
  ) DEFAULT 'drugo';

/*
 3.	Privzeti nabor znakov in način razvrščanja podatkov tabel CD, Avtor in Posnetek prilagodite slovenščini. 
 */
ALTER TABLE
  CD CHARACTER SET utf8 COLLATE utf8_slovenian_ci;

ALTER TABLE
  Avtor CHARACTER SET utf8 COLLATE utf8_slovenian_ci;

ALTER TABLE
  Posnetek CHARACTER SET utf8 COLLATE utf8_slovenian_ci;

/*
 4.	Ustvarite pogled Italija, ki prikaže priimke, imena avtorjev ter naslove in trajanje njihovih posnetkov.
 Pogled naj prikaže podatke le za avtorje iz Italije.
 */
CREATE VIEW Italija AS
SELECT
  a.Ime AS 'Ime Avtorja',
  p.Naslov AS 'Naslov Posnetka',
  p.Trajanje AS 'Trajanje Posnetka'
FROM
  Avtor a
  INNER JOIN Posnetek p ON p.AvtorID = a.AvtorID
WHERE
  a.Drzava = 'ITA';

/*
 5.	Ustvarite pogled TrajanjePoAvtorjih, ki za vsakega avtorja prikaže avtorID, ime, priimek in skupno trajanje njegovih posnetkov.
 */
CREATE VIEW TrajanjePoAvtorjih AS
SELECT
  a.AvtorID AS ID,
  a.Ime,
  a.Priimek,
  SUM(p.Trajanje) AS Trajanje
FROM
  Avtor a
  INNER JOIN Posnetek p ON p.AvtorID = a.AvtorID
GROUP BY
  a.AvtorID,
  a.Ime,
  a.Priimek;

/*
 6.	Ustvarite read only pogled slo, ki prikaže podatke slovenskih avtorjev. Izpišite strukturo pogleda.
 */
CREATE VIEW Slo AS
SELECT
  *
FROM
  Avtor
WHERE
  Drzava = 'SLO';

/* 
 7.	Ustvarite pogled fra, ki prikaže podatke francoski avtorjev. Izpišite strukturo pogleda.
 */
CREATE VIEW Fra AS
SELECT
  *
FROM
  Avtor
WHERE
  Drzava = 'FRA';