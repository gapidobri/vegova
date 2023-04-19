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
      <label for="x">Število:</label>
      <input type="number" name="x" step="1" required>
      <fieldset>
        <legend>Izberi sodost/lihost</legend>
        <label for="sodo">Sode</label>
        <input type="radio" name="vrsta" id="sodo" value="Sode" required>
        <label for="liho">Lihe</label>
        <input type="radio" name="vrsta" id="liho" value="Lihe" required>
      </fieldset>
      <br>
      <input type="submit" value="Submit">
      <input type="reset" value="Briši števke">
    </form>
  </fieldset>
</body>

</html>

<?php

function vrne($n)
{
  $x = str_split($_GET["x"]);
  $rtn = [];
  foreach ($x as $st) {
    if ($st % 2 == $n)
      continue;
    $rtn[] = $st;
  }

  if (count($rtn) == 0)
    return "0";
  return implode($rtn);
}

if ($_GET["vrsta"] == "Sode")
  echo vrne(0);
else if ($_GET["vrsta"] == "Lihe")
  echo vrne(1);

?>
<form action="index.php">
  <input type="submit" value="Nazaj">
</form>