-- 2.
SELECT
  *
FROM
  Sola
ORDER BY
  ImeSole;

SELECT
  *
FROM
  Sola
WHERE
  ImeSole = 'TSC';

SELECT
  COUNT(SolaID) AS `Stevilo sol iz Ljubljane`
FROM
  Sola
WHERE
  Naslov LIKE '%Ljubljana%';

SELECT
  s.*
FROM
  Sola s
  INNER JOIN Izvaja i ON i.SolaID = s.SolaID
  INNER JOIN Program p ON i.ProgramID = p.ProgramID
WHERE
  p.ImePrograma = 'racunalniski tehnik';

SELECT
  s.*
FROM
  Sola s
  INNER JOIN Izvaja i ON i.SolaID = s.SolaID
  INNER JOIN Program p ON i.ProgramID = p.ProgramID
WHERE
  p.ImePrograma = 'komercialist';

-- 3.
ALTER TABLE
  Izvaja
ADD
  Zacetek DATE;

ALTER TABLE
  Izvaja
ADD
  SteviloMest INT;

-- 4. 
SELECT
  *
FROM
  Sola
WHERE
  SolaID NOT IN (
    SELECT
      SolaID
    FROM
      Izvaja i
      INNER JOIN Program p ON i.ProgramID = p.ProgramID
    WHERE
      p.ImePrograma = 'racunalniski tehnik'
  );

--5.
INSERT INTO
  Sola (SolaID, ImeSole, Naslov, Telefon, Email)
VALUES
  (
    4,
    'Gim Poljane',
    'Poljanska 2 Ljubljana',
    '+386332312',
    'uprava@poljane.si'
  ),
  (
    5,
    'Gim. Jesenice',
    'Titova 44 Jesenice',
    '+3864444242',
    'gimanzija@jesenice.si'
  );

-- 6.
SELECT
  ImeSole
FROM
  Sola
WHERE
  SolaID IN (
    SELECT
      SolaID
    FROM
      Izvaja i
      INNER JOIN Program p ON i.ProgramID = p.ProgramID
    WHERE
      p.ImePrograma LIKE '%teh%'
  );

SELECT
  ImeSole
FROM
  Sola s
WHERE
  (
    SELECT
      COUNT(i.ProgramID)
    FROM
      Izvaja i
    WHERE
      i.SolaID = s.SolaID
  ) > 1;

-- 7.
UPDATE
  Izvaja
SET
  SteviloMest = 70,
  Zacetek = '1995-09-01'
WHERE
  SolaID = (
    SELECT
      SolaID
    FROM
      Sola
    WHERE
      ImeSole = 'TSC'
  )
  AND ProgramID = (
    SELECT
      ProgramID
    FROM
      Program
    WHERE
      ImePrograma = 'racunalniski tehnik'
  );

UPDATE
  Izvaja
SET
  SteviloMest = 120,
  Zacetek = '1993-09-01'
WHERE
  SolaID = (
    SELECT
      SolaID
    FROM
      Sola
    WHERE
      ImeSole = 'Vegova'
  )
  AND ProgramID = (
    SELECT
      ProgramID
    FROM
      Program
    WHERE
      ImePrograma = 'racunalniski tehnik'
  );

-- 8.
UPDATE
  Izvaja
SET
  SteviloMest = 100,
  Zacetek = '1998-09-01'
WHERE
  ProgramID IN (
    SELECT
      ProgramID
    FROM
      Program
    WHERE
      ImePrograma LIKE '%gimnazija%'
  );

-- 9.
SELECT
  s.ImeSole,
  SUM(i.SteviloMest) AS `Stevilo mest`
FROM
  Sola s
  INNER JOIN Izvaja i ON s.SolaID = i.SolaID
GROUP BY
  s.ImeSole;

-- 10.
SELECT
  s.ImeSole
FROM
  Sola s
  INNER JOIN Izvaja i ON i.SolaID = s.SolaID
  INNER JOIN Program p ON i.ProgramID = p.ProgramID
WHERE
  p.ImePrograma = 'racunalniski tehnik'
ORDER BY
  i.Zacetek
LIMIT
  1;

-- 11.
UPDATE
  Izvaja
SET
  SteviloMest = SteviloMest + 20
WHERE
  SolaID = (
    SELECT
      SolaID
    FROM
      Sola
    WHERE
      ImeSole = 'TSC'
  );

-- 12.
UPDATE
  Izvaja
SET
  SteviloMest = SteviloMest - 5
WHERE
  SolaID IN (
    SELECT
      SolaID
    FROM
      Sola
    WHERE
      Naslov LIKE '%Ljubljana%'
  )
  AND ProgramID IN (
    SELECT
      ProgramID
    FROM
      Program
    WHERE
      ImePrograma LIKE '%gimnazija%'
  );

-- 13.
SELECT
  CONCAT(ImeSole, ' ', Naslov) AS Podatki
FROM
  Sola;

-- 14.
SELECT
  CONCAT(ImeSole, ' tel: ', SUBSTRING(Telefon, -6)) AS Izpis
FROM
  Sola;

-- 15.
CREATE TABLE Tehnicne LIKE Sola;

INSERT INTO
  Tehnicne (
    SELECT
      *
    FROM
      Sola
    WHERE
      SolaID IN (
        SELECT
          SolaID
        FROM
          Izvaja i
          INNER JOIN Program p ON i.ProgramID = p.ProgramID
        WHERE
          p.ImePrograma LIKE '%teh%'
      )
  );

/*
 -- 16.
 mysqldump primer2sola > primer2sola.sql
 
 -- 17.
 mysqldump primer2sola sola > solaizvoz.sql
 
 -- 18.
 mysqldump primer2sola program -X > program.xml
 
 -- 19.
 mysqldump --tab=. --fields-terminated-by=, primer2sola sola
 */
-- 20.
CREATE DATABASE SrednjeSole;

-- mysql srednjesole < solaizvoz.sql
-- 21.
CREATE DATABASE SolskiProgrami;

-- mysqldump srednjesole | mysql solskiprogrami
-- 22.
USE SrednjeSole;

CREATE TABLE SP (
  Sola CHAR(50) NOT NULL,
  Program CHAR(50) NOT NULL
);

INSERT INTO
  SP (
    SELECT
      s.ImeSole,
      p.ImePrograma
    FROM
      Sola s
      INNER JOIN Izvaja i ON i.SolaID = s.SolaID
      INNER JOIN Program p ON i.ProgramID = p.ProgramID
    ORDER BY
      s.ImeSole,
      p.ImePrograma
  );

-- 23.
-- mysqldump --tab=. --fields-terminated-by=# solskiprogrami sp