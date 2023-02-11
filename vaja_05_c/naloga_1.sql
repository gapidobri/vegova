-- 1.
CREATE DATABASE 'TestnaBaza.fdb';

-- 2.
CREATE TABLE Tab1 (
  tab1Id INT NOT NULL,
  dataA INT NOT NULL,
  dataB INT NOT NULL,
  dataC INT NOT NULL,
  PRIMARY KEY (tab1Id)
);

-- 3.
CREATE TABLE Tab2 (
  tab2Id INT NOT NULL,
  dataA INT NOT NULL,
  dataB INT NOT NULL,
  dataC INT NOT NULL,
  PRIMARY KEY (tab2Id)
);

-- 5.
CREATE GENERATOR prvi;

SET
  GENERATOR prvi TO 1;

-- 6.
SET
  term ! !;

CREATE PROCEDURE random_data1 (randRange INT, numOfRecords INT) RETURNS(LINE VARCHAR(60)) AS DECLARE variable i INT;

DECLARE variable a INT;

DECLARE variable b INT;

DECLARE variable c INT;

BEGIN i = 0;

WHILE (i < numOfRecords) DO BEGIN a = CAST((RAND() *(randRange - 1) + 1) AS INTEGER);

b = CAST((RAND() * (randRange - 1) + 1) AS INTEGER);

c = CAST((RAND() * (randRange - 1) + 1) AS INTEGER);

INSERT INTO
  Tab1
VALUES
  (GEN_ID(prvi, 1), :a, :b, :c);

i = i + 1;

END LINE = :numOfrecords || ' records were added to table Tab1';

END ! !
SET
  term;

! !;

SET
  stat ON;

SET
  plan ON;

-- 8.
EXECUTE PROCEDURE random_data1 (2000000, 100000);

-- 9.
CREATE INDEX Tab1Index ON Tab1 COMPUTED BY (dataA);

CREATE GENERATOR drugi;

SET
  GENERATOR drugi to 1;

SET
  term ! !;

CREATE PROCEDURE random_data2 (randRange INT, numOfRecords INT) RETURNS(LINE VARCHAR(60)) AS DECLARE variable i INT;

DECLARE variable a INT;

DECLARE variable b INT;

DECLARE variable c INT;

BEGIN i = 0;

WHILE (i < numOfRecords) DO BEGIN a = CAST((RAND() * (randRange - 1) + 1) AS INTEGER);

b = CAST((RAND() * (randRange - 1) + 1) AS INTEGER);

c = CAST((RAND() * (randRange - 1) + 1) AS INTEGER);

INSERT INTO
  Tab2
VALUES
  (GEN_ID(drugi, 1), :a, :b, :c);

i = i + 1;

END LINE = :numOfrecords || ' records were added to table Tab2';

END ! !
SET
  term;

! !;

EXECUTE PROCEDURE random_data2 (2000000, 100000);

-- 14.
SELECT
  *
FROM
  Tab1
WHERE
  dataA > 50000
  AND dataB > 50000
  AND dataC > 50000
ORDER BY
  (dataA, dataB, dataC);