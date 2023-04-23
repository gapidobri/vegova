<?php
require_once "check_session.php";

$conn = new mysqli("127.0.0.1", "root", null, "baza");

$avtorji = $conn->query("SELECT AvtorID, Ime, Priimek FROM Avtor");

?>

<form action="dodaj_posnetek.php" action="post">
  <select name="avtorId" required>
    <option disabled>Izberi avtorja</option>
    <?php while ($avtor = $avtorji->fetch_row()) { ?>
      <option value="<?= $avtor["AvtorID"] ?>"><?= $avtor["Ime"] ?> <?= $avtor["Priimek"] ?></option>
    <?php } ?>
  </select>
  <input type="text" name="naslov" placeholder="Naslov" maxlength="30" required />
  <input type="date" name="datum">
</form>