SELECT
  ime,
  priimek
FROM
  Avtor
WHERE
  avtorId NOT IN (
    SELECT
      avtorId
    FROM
      Posnetek
    WHERE
      genre != 'klasika'
  );

DELETE FROM
  CD
WHERE
  cdId IN (
    SELECT
      cd.cdId
    FROM
      CD cd
      INNER JOIN Vsebina v ON cd.cdId = v.cdId
      INNER JOIN Posnetek p ON p.pId = v.pId
    WHERE
      p.trajanje > '00:05:00'
      AND naslov LIKE '%read%'
  );