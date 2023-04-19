UPDATE
  Avtor
SET
  priimek = UPPER(priimek)
WHERE
  avtorId IN (
    SELECT
      a.avtorId
    FROM
      Avtor a
      INNER JOIN Posnetek p ON a.avtorId = p.avtorId
    GROUP BY
      a.avtorId
    HAVING
      COUNT(DISTINCT p.genre) = (
        SELECT
          COUNT(DISTINCT genre)
        FROM
          Posnetek
      )
  );

-- mysqldump ZbirkaCD2 Avtor
SELECT
  *
FROM
  CD cd
WHERE
  'klasika' IN (
    SELECT
      p.genre
    FROM
      Posnetek p
      INNER JOIN Vsebina v ON v.pId = p.pId
    WHERE
      v.cdId = cd.cdId
  )
  AND 'rock' IN (
    SELECT
      p.genre
    FROM
      Posnetek p
      INNER JOIN Vsebina v ON v.pId = p.pId
    WHERE
      v.cdId = cd.cdId
  );