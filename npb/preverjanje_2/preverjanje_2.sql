-- 1.
SELECT
  s.Ime,
  s.Priimek
FROM
  Stranka s
WHERE
  s.EMSO IN (
    SELECT
      n.EMSO
    FROM
      Najem n
    WHERE
      EXTRACT(
        YEAR
        FROM
          Datum_najema
      ) IN (2012, 2013)
  )
  AND NOT IN (
    SELECT
      n.EMSO
    FROM
      Najem n
      INNER JOIN Vozilo v ON v.SerStev = n.SerStev
      INNER JOIN Proizvajalec p ON p.ProizvajalecID = v.ProizvajalecID
    WHERE
      n.EMSO = s.EMSO
      AND p.Znamka != 'Astron Martin'
  );

-- 2.
SELECT
  *
FROM
  Vozilo v
  INNER JOIN Najem n ON n.SerStev = v.SerStev
  INNER JOIN Placilo p ON p.EMSO = n.EMSO
  AND p.SerStev = n.SerStev
  AND p.ProizvajalecID = n.ProizvajalecID
WHERE
  p.Cena_na_dan > (
    SELECT
      AVG(p.Cena_na_dan)
    FROM
      Placilo p
  );

-- 3.
SELECT
  COUNT(s.EMSO) AS `Stevilo strank`
FROM
  Stranka s
WHERE
  (
    SELECT
      SUM(p.Cena_na_dan)
    FROM
      Najem n
      INNER JOIN Placilo p ON p.EMSO = n.EMSO
      AND p.SerStev = n.SerStev
      AND p.ProizvajalecID = n.ProizvajalecID
    WHERE
      n.EMSO = s.EMSO
  ) > 500;

-- 4.
SELECT
  *
FROM
  Voznisko_dovoljenje d
WHERE
  d.EMSO IN (
    SELECT
      n.EMSO
    FROM
      Najem n
      INNER JOIN Vozilo v ON v.SerStev = n.SerStev
      INNER JOIN Proizvajalec p ON p.ProizvajalecID = v.ProizvajalecID
    WHERE
      p.Poreklo = 'Japonska'
  )
  AND d.EMSO IN (
    SELECT
      n.EMSO
    FROM
      Najem n
      INNER JOIN Vozilo v ON v.SerStev = n.SerStev
      INNER JOIN Proizvajalec p ON p.ProizvajalecID = v.ProizvajalecID
    WHERE
      p.Poreklo = 'Nemčija'
  );

-- 5.
CREATE TABLE NeustrezneStranke AS (
  SELECT
    *
  FROM
    Stranka
  WHERE
    EMSO NOT IN (
      SELECT
        EMSO
      FROM
        Najem
      WHERE
        EXTRACT(
          YEAR
          FROM
            Datum_najema
        ) = EXTRACT (
          YEAR
          FROM
            CURRENT_DATE
        )
    )
);

-- 6.
DELETE FROM
  Vozilo
WHERE
  SerStev NOT IN (
    SELECT
      n.SerStev
    FROM
      Najem n
    HAVING
      COUNT(n.SerStev) > 1
  );

-- 7.
UPDATE
  Placilo
SET
  Cena_na_dan = Cena_na_dan * 1.22
WHERE
  EXTRACT(
    YEAR
    FROM
      Datum_placila
  ) > EXTRACT (
    YEAR
    FROM
      CURRENT_DATE
  ) - 5;

;