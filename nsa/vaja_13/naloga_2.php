<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <fieldset>
    <legend>Vnos podatkov</legend>
    <form method="get" action="main.php">
      <label for="x">Število x</label>
      <input type="text" name="x" required>
      <br>
      <label for="y">Število y</label>
      <input type="text" name="y" required>

      <br>
      <input type="submit" name="produkt" value="produkt">
      <input type="submit" name="potenca" value="potenca">
      <input type="reset" value="ponastavi">
    </form>
  </fieldset>
</body>

</html>

<?php

function produkt($x, $y)
{
  $produkt = 0;
  for ($i = 0; $i < $y; $i++)
    $produkt += $x;

  return $produkt;
}

echo "x: " . $_GET["x"] . " 
    <br>y: " . $_GET["y"] .
  "<br>";

if (isset($_GET["produkt"])) {
  echo produkt($_GET["x"], $_GET["y"]);
}


if (isset($_GET["potenca"])) {
  $potenca = 1;
  for ($i = 0; $i < $_GET["y"]; $i++)
    $potenca = produkt($potenca, $_GET["x"]);
  echo $potenca;
}

?>