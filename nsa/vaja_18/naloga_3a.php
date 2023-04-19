<?php
require_once 'baza.php';

$kraj = isset($_GET['kraj']) ? $_GET['kraj'] : null;

$conn = connect();

$kraji = $conn->query("SELECT * FROM kraj");

if ($kraj) {
  $query = "SELECT * FROM kraj WHERE KID = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param('i', $kraj);
  $stmt->execute();
  $izbranKraj = $stmt->get_result()->fetch_assoc();

  $query = "SELECT * FROM oseba o INNER JOIN kraj k ON o.KID = k.KID WHERE o.KID = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param('i', $kraj);
  $stmt->execute();
  $osebe = $stmt->get_result();
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Naloga 3</title>
</head>

<style>
  table {
    margin-top: 16px;
    border-collapse: collapse;
  }

  th,
  td {
    border: 1px solid black;
    padding: 5px;
  }
</style>

<body>

  <form action="naloga_3a.php">
    <select name="kraj">
      <?php while ($row = $kraji->fetch_assoc()) { ?>
        <option value="<?= $row['KID'] ?>" <?= $row['KID'] === $kraj ? 'selected' : '' ?>><?= $row['imeKraja'] ?></option>
      <?php } ?>
    </select>
    <button type="submit">Prikaži</button>
  </form>

  <?php if (isset($kraj)) { ?>
    <table>
      <thead>
        <th colspan="7"><?= $izbranKraj['imeKraja'] ?></th>
      </thead>
      <tbody>
        <?php while ($oseba = $osebe->fetch_assoc()) { ?>
          <tr>
            <td><?= $oseba['id'] ?></td>
            <td><?= $oseba['ime'] ?></td>
            <td><?= $oseba['priimek'] ?></td>
            <td><?= $oseba['spol'] ?></td>
            <td><?= $oseba['opis'] ?></td>
            <td><?= $oseba['KID'] ?></td>
            <td><?= $oseba['imeKraja'] ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  <?php } ?>

</body>

</html>