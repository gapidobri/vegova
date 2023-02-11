SELECT
  p.ImeProdajalca AS "Ime",
  p.PriimekProdajalca AS "Priimek",
  AVG(pr.ProcPopusta) AS "Popust"
FROM
  Prodajalec p
  INNER JOIN Prodaja pr ON p.ProdajalecID = pr.ProdajalecID