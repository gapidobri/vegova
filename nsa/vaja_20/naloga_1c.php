<?php

$razvrsti = isset($_GET['razvrsti']) ? $_GET['razvrsti'] : [];
$podatki = isset($_GET['podatki']) ? $_GET['podatki'] : [];

$conn = mysqli_connect("127.0.0.1", "root", null, "bazaOseb");

$query = "SELECT * FROM oseba INNER JOIN Kraj k ON oseba.KID = k.KID";

if (count($razvrsti) > 0) {
  $query .= " ORDER BY";
}
foreach ($razvrsti as $key => $value) {
  $query .= " $value";
  if ($key < count($razvrsti) - 1) {
    $query .= ",";
  }
}

$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vaja 20 - Naloga 1c</title>
</head>

<body>
  <div style="width: max-content;">
    <form action="" method="get">
      <label for="podatki">Izberi podatke:</label>
      <select name="podatki[]" id="podatki" multiple>
        <option value="ime" <?= in_array("ime", $podatki) ? "selected" : "" ?>>Ime</option>
        <option value="priimek" <?= in_array("priimek", $podatki) ? "selected" : "" ?>>Priimek</option>
        <option value="rojstvo" <?= in_array("rojstvo", $podatki) ? "selected" : "" ?>>Datum rojstva</option>
        <option value="imeKraja" <?= in_array("imeKraja", $podatki) ? "selected" : "" ?>>Kraj</option>
        <option value="spol" <?= in_array("spol", $podatki) ? "selected" : "" ?>>Spol</option>
        <option value="email" <?= in_array("email", $podatki) ? "selected" : "" ?>>E-pošta</option>
        <option value="opis" <?= in_array("opis", $podatki) ? "selected" : "" ?>>Opis</option>
      </select>
      <br>
      <fieldset>
        <legend>Razvrsti po:</legend>
        <label for="city">
          <input type="checkbox" name="razvrsti[]" id="city" value="imeKraja" <?= in_array("imeKraja", $razvrsti) ? "checked" : "" ?>>
          krajih
        </label>
        <br>
        <label for="last-name">
          <input type="checkbox" name="razvrsti[]" id="last-name" value="priimek" <?= in_array("priimek", $razvrsti) ? "checked" : "" ?>>
          priimkih
        </label>
        <br>
        <label for="age">
          <input type="checkbox" name="razvrsti[]" id="age" value="rojstvo" <?= in_array("rojstvo", $razvrsti) ? "checked" : "" ?>>
          starosti
        </label>
      </fieldset>
      <input type="submit" value="Prikaži">
    </form>

  </div>

  <table>
    <tbody>
      <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
          <?php foreach ($podatki as $podatek) { ?>
            <td><?= $row[$podatek] ?></td>
          <?php } ?>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>

</html>