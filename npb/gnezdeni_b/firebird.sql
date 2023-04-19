SELECT
  v.*
FROM
  Vozilo v
  INNER JOIN Najem n ON v.serStev = n.serStev
WHERE
  EXTRACT(
    YEAR
    FROM
      n.datum_najema
  ) BETWEEN 2010
  AND 2012
  AND n.emso IN (
    SELECT
      emso
    FROM
      Stranka
    WHERE
      priimek LIKE 'T%'
  )
  AND n.emso IN (
    SELECT
      emso
    FROM
      Stranka
    WHERE
      priimek LIKE 'A%'
  );

SELECT
  EXTRACT(
    YEAR
    FROM
      n.datum_najema
  ),
  COUNT(n.datum_najema)
FROM
  Najem n
  INNER JOIN Stranka s ON n.emso = s.emso
GROUP BY
  EXTRACT(
    YEAR
    FROM
      n.datum_najema
  )
ORDER BY
  COUNT(n.datum_najema) DESC;

SELECT
  s.*
FROM
  Stranka s
  INNER JOIN Najem n ON s.emso = n.emso
WHERE
  EXTRACT(
    YEAR
    FROM
      n.datum_najema
  ) BETWEEN 2011
  AND 2013
  AND n.serStev NOT IN (
    SELECT
      serStev
    FROM
      Vozilo
    WHERE
      model NOT LIKE '%GTR%'
  );