<?php

require_once "check_session.php";

$conn = new mysqli("localhost", "root", null, "osebe");

$avtorji = $conn->query("SELECT AvtorID, Ime, Priimek FROM Avtor ORDER BY Priimek");

if (isset($_GET["avtorId"])) {
  $avtorId = $_GET["avtorId"];

  $avtor = $conn->query("SELECT * FROM Avtor WHERE AvtorID = $avtorId")->fetch_assoc();

  $posnetki = $conn->query("SELECT * FROM Posnetek WHERE AvtorID = $avtorId");

  $posnetkiCount = $conn->query("SELECT COUNT(*) FROM Posnetek WHERE AvtorID = $avtorId")->fetch_array()[0];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Naloga 1</title>
</head>

<body>
  <form action="" method="get">
    <select name="avtorId" id="avtorId">
      <?php while ($avtor = $avtorji->fetch_assoc()) { ?>
        <option value="<?= $avtor["AvtorID"] ?>"><?= $avtor["Priimek"] ?> <?= $avtor["Ime"] ?> <?= $avtor["AvtorID"] ?></option>
      <?php } ?>
    </select>
    <button type="submit">Prikaži</button>
  </form>

  <?php if ($avtor) { ?>
    ID: <?= $avtor["AvtorID"] ?><br>
    Ime: <?= $avtor["Ime"] ?><br>
    Priimek: <?= $avtor["Priimek"] ?><br>
    Država: <?= $avtor["Drzava"] ?><br>
    Spol: <?= $avtor["Spol"] ?><br>
    <?php if ($avtor["datotekaFotografija"]) { ?>
      <img src="<?= $avtor["datotekaFotografija"] ?>" /><br>
    <?php } ?>
  <?php } ?>

  <table>
    <thead>
      <th>ID</th>
      <th>Naslov</th>
      <th>Datum</th>
    </thead>
    <tbody>
      <?php while ($posnetek = $posnetki->fetch_assoc()) { ?>
        <tr>
          <td><?= $posnetek["PID"] ?></td>
          <td><?= $posnetek["Naslov"] ?></td>
          <td><?= $posnetek["Datum"] ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

  <p>Skupaj posnetkov: <?= $posnetkiCount ?></p>

</body>

</html>