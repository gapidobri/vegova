<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="/" method="GET">
    <fieldset>
      <legend>Farenheit/Celzij konverter</legend>
      <input type="number" step="0.01" name="temp" /> <br />
      <input type="submit" name="fc" value="Farenheit v Celzij" /> <br />
      <input type="submit" name="cf" value="Celzij v Farenheit" /> <br />
    </fieldset>
  </form>

  <br />

  <fieldset>
    <?php
    if (isset($_GET["temp"])) {
      $temp1 = $_GET["temp"];
      if (isset($_GET["fc"])) {
        $temp2 = ($temp1 - 32) * 5 / 9;
        echo number_format($temp1, 2) . "˚F = ";
        echo number_format($temp2, 2) . "˚C";
      } else if (isset($_GET["cf"])) {
        $temp2 = $temp1 * 9 / 5 + 32;
        echo number_format($temp1, 2) . "˚C = ";
        echo number_format($temp2, 2) . "˚F";
      }
    }
    ?>
  </fieldset>
</body>