/*
 a) Napišite stavek SQL, ki izpiše modele vozil znamke BMW, pri katerih je osnovna cena manjša od 50.000.
 */
SELECT
  Model
FROM
  Vozilo
WHERE
  Znamka = 'BMW'
  AND OsnovnaCena < 500000;

/*
 b)	Napišite stavek SQL, ki za vse prodajalce izpiše ProdajalecID, ImeProdajalca, PriimekProdajalca in koliko vozil
 je prodal leta 2010.
 */
SELECT
  p.ProdajalecID AS "Prodajalec ID",
  p.ImeProdajalca AS "Ime",
  p.PriimekProdajalca AS "Priimek",
  COUNT(pr.DatumProdaje) AS "Prodaja leta 2010"
FROM
  Prodajalec p
  LEFT JOIN Prodaja pr ON p.ProdajalecID = pr.ProdajalecID
WHERE
  EXTRACT(
    YEAR
    FROM
      pr.DatumProdaje
  ) = 2010
GROUP BY
  p.ProdajalecID,
  p.ImeProdajalca,
  p.PriimekProdajalca;

/*
 c)	Za vse prodajalce izpišite priimke, imena in podatke o prodanih vozilih (voziloid, znamka, koncnacena). Končno ceno
 dobite tako, da od osnovne cene vozila odštejete popust( podan je v %) in prištejete prodProvizijo. Pri izpisu cene
 upoštevajte pravilo izpisa cen izdelkov na dve decimalki.
 */
SELECT
  p.ImeProdajalca AS "Ime",
  p.PriimekProdajalca AS "Priimek",
  v.VoziloID AS "Vozilo ID",
  v.Znamka AS "Znamka",
  v.OsnovnaCena * (100 - prod.ProcPopusta) / 100 + prod.ProdProvizija AS "Koncna cena"
FROM
  Prodajalec p
  LEFT JOIN Prodaja prod ON p.ProdajalecID = prod.ProdajalecID
  INNER JOIN Vozilo v ON prod.VoziloID = v.VoziloID;

/*
 d)	Napišite stavek, ki vrne priimke in imena kupcev, ki so kupili vsaj eno vozilo znamke Fiat.
 */
SELECT
  k.ImeKupca AS "Ime",
  k.PriimekKupca AS "Priimek"
FROM
  Kupec k
  INNER JOIN Prodaja p ON k.DavSt = p.DavSt
  INNER JOIN Vozilo v ON p.VoziloID = v.VoziloID
WHERE
  v.Znamka = 'Fiat'
GROUP BY
  k.ImeKupca,
  k.PriimekKupca;

/* 
 e)	Napišite stavek, ki vrne priimke in imena kupcev, ki so kupovali pri prodajalki Marjeti Pretnar.
 */
SELECT
  k.ImeKupca AS "Ime",
  k.PriimekKupca AS "Priimek"
FROM
  Kupec k
  INNER JOIN Prodaja p ON k.DavSt = p.DavSt
  INNER JOIN Prodajalec pr ON p.ProdajalecID = pr.ProdajalecID
WHERE
  pr.ImeProdajalca = 'Marjeta'
  AND pr.PriimekProdajalca = 'Pretnar'
GROUP BY
  k.ImeKupca,
  k.PriimekKupca;

/*
 f)	Napišite stavek SQL, ki izpiše vsa vozila, ki so bila proizvedena in prodana leta 2010. 
 */
SELECT
  v.VoziloID AS "Vozilo ID",
  v.Znamka AS "Znamka",
  v.Model AS "Model",
  k.ImeKupca AS "Ime Kupca",
  k.PriimekKupca AS "Priimek Kupca"
FROM
  Vozilo v
  INNER JOIN Prodaja p ON v.VoziloID = p.VoziloID
  INNER JOIN Kupec k ON p.DavSt = k.DavSt
WHERE
  v.Letnik = 2010
  AND EXTRACT (
    YEAR
    FROM
      p.DatumProdaje
  ) = 2010;

/* 
 g)	Napišite stavek SQL, ki izpiše vse podatke o vozilih, proizvedenih leta 2012 ali 2007, ki so še na zalogi.
 */
SELECT
  *
FROM
  Vozilo v
WHERE
  v.Letnik = 2012
  OR v.Letnik = 2007
  AND v.Status = 'na zalogi';

/*
 h)	Napišite stavek, ki izpiše število prodaj po krajih kupcev.
 */
SELECT
  k.KrajKupca AS "Kraj Kupca",
  COUNT(p.DavSt) AS "Prodaje"
FROM
  Kupec k
  INNER JOIN Prodaja p on k.DavSt = p.DavSt
GROUP BY
  k.KrajKupca;

/*
 i)	Napišite stavek, ki vrne priimke in imena kupcev, ki še nikoli niso kupili vozila znamke Fiat.
 */
SELECT
  k.ImeKupca AS "Ime",
  k.PriimekKupca AS "Priimek",
  v.Znamka AS "Znamka"
FROM
  Kupec k
  OUTER JOIN Prodaja p ON k.DavSt = p.DavSt
  OUTER JOIN Vozilo v ON v.VoziloID = p.VoziloID;