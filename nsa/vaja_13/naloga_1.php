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
      <label for="ime">Ime</label>
      <input type="text" name="ime" required>
      <label for="priimek">Priimek</label>
      <input type="text" name="priimek" required>

      <br>
      <label for="gimnazija">gimnazija</label>
      <input type="radio" name="program" id="gimnazija" value="gimnazija" required>
      <label for="strokovna šola">strokovna šola</label>
      <input type="radio" name="program" id="strokovna šola" value="strokovna šola" require>

      <br>
      <input type="submit" value="Vnos">
      <input type="reset" value="Ponastavi">
    </form>
  </fieldset>
</body>

</html>

<?php

echo "<style>
            span{
                color: red;
            }
        </style>";

echo "<pre>";
print_r($_GET);
echo "</pre>";

if (right()) {
  echo "Ime in priimek: " . $_GET["ime"] . " " . $_GET["priimek"];
  echo "<br>Program: " . $_GET["program"];
} else {
  echo "<br>Ime: " . ucfirst($_GET["ime"]) . " (<span>" . $_GET["ime"] . "</span>)";
  echo "<br>Priimek: " . ucfirst($_GET["priimek"]) . " (<span>" . $_GET["priimek"] . "</span>)";
  echo "<br>Program: " . $_GET["program"];
}

function right()
{
  if (
    ord(substr($_GET["ime"], 0, 1)) >= ord('A') &&  ord(substr($_GET["ime"], 0, 1)) <= ord('Z') &&
    ord(substr($_GET["priimek"], 0, 1)) >= ord('A') &&  ord(substr($_GET["priimek"], 0, 1)) <= ord('Z')
  ) {
    return true;
  } else {
    return false;
  }
}
?>