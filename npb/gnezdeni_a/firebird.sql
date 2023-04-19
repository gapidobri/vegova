SELECT
  s.*
FROM
  Stranka s
  INNER JOIN Najem n ON n.emso = s.emso
WHERE
  EXTRACT(
    YEAR
    FROM
      n.datum_najema
  ) >= 2011
  AND EXTRACT(
    YEAR
    FROM
      n.datum_najema
  ) <= 2013
  AND n.serStev NOT IN (
    SELECT
      v.serStev
    FROM
      Vozilo v
      INNER JOIN Proizvajalec p ON p.proizvajalecId = v.proizvajalecId
    WHERE
      p.znamka != 'Aston Martin'
  );

-- gbak -b najemvozil.fdb najemvozil.fbk
CREATE VIEW PovprecniNajem AS
SELECT
  AVG((cena_na_dan * stev_dni) * (1 - popust) + penali) AS povprecniNajem
FROM
  Placilo;

SELECT
  s.emso,
  s.ime,
  s.priimek
FROM
  Stranka s
  INNER JOIN Najem n ON n.emso = s.emso
  INNER JOIN Placilo p ON n.serStev = p.serStev
  AND n.emso = p.emso
  AND n.proizvajalecId = p.proizvajalecId
WHERE
  (p.cena_na_dan * p.stev_dni) * (1 - p.popust) + p.penali > (
    SELECT
      *
    FROM
      PovprecniNajem
  );

-- nbackup -B 1 najemvozil.fdb najemvozil_inc_1.fbk
UPDATE
  Placilo
SET
  cena_na_dan = cena_na_dan - cena_na_dan * 0.07
WHERE
  serStev IN (
    SELECT
      serStev
    FROM
      Vozilo
    WHERE
      model LIKE '%911'
  );

-- nbackup -B 1 najemvozil.fdb najemvozil_kum_1.fbk
-- nbackup -R najemvozil_restore.fdb najemvozil.fbk najemvozil_kum_1.fbk