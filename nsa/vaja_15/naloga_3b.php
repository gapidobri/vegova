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
      <legend>Vhodni podatki</legend>
      <input type="number" step="0.01" name="temp" />
      <select name="enota1">
        <option value="k">Kelvin</option>
        <option value="f">Farenheit</option>
        <option value="c">Celzij</option>
      </select>
      <select name="enota2">
        <option value="k">Kelvin</option>
        <option value="f">Farenheit</option>
        <option value="c">Celzij</option>
      </select>
      <input type="submit" value="Pretvori" />
    </fieldset>
  </form>

  <br />

  <fieldset>
    <legend>Rezultat</legend>
    <?php
    if (isset($_GET["temp"])) {
      $temp1 = $_GET["temp"];
      $enota1 = $_GET["enota1"];
      $enota2 = $_GET["enota2"];
      $temp2 = $temp1;

      if ($enota1 == "f") {
        if ($enota2 == "c") {
          // fc
          $temp2 = ($temp1 - 32) * 5 / 9;
        } else if ($enota2 == "k") {
          // fk
          $temp2 = ($temp1 - 32) * 5 / 9;
          $temp2 += 273.15;
        }
      } else if ($enota1 == "c") {
        if ($enota2 == "f") {
          $temp2 = $temp1 * 9 / 5 + 32; // cf
        } else if ($enota2 == "k") {
          $temp2 += 273.15; // ck
        }
      } else if ($enota1 == "k") {
        if ($enota2 == "c") {
          $temp2 = $temp1 - 273.15; // kc
        } else if ($enota2 == "f") {
          // kf
          $temp2 = $temp1 - 273.15;
          $temp2 = $temp2 * 9 / 5 + 32;
        }
      }

      echo number_format($temp1, 2);
      izpis_stop($enota1);
      echo  " = " . number_format($temp2, 2);
      izpis_stop($enota2);
    }

    function izpis_stop($x)
    {
      if ($x == "c")
        echo "˚C";
      else if ($x == "f") {
        echo "˚F";
      } else if ($x == "k") {
        echo "K";
      }
    }
    ?>
  </fieldset>
</body>

</html>