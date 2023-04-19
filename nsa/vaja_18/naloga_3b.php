<?php
require_once 'baza.php';

$kraj = isset($_GET['kraj']) ? $_GET['kraj'] : [];

$conn = connect();

$kraji = $conn->query("SELECT * FROM kraj");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Naloga 4</title>
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

  <form action="naloga_3b.php">
    <select name="kraj[]" multiple>
      <?php while ($row = $kraji->fetch_assoc()) { ?>
        <option value="<?= $row['KID'] ?>" <?= in_array($row['KID'], $kraj)  ? 'selected' : '' ?>><?= $row['imeKraja'] ?></option>
      <?php } ?>
    </select>
    <button type="submit">Prikaži</button>
  </form>

  <?php if (isset($kraj)) { ?>
    <table>
      <tbody>
        <?php foreach ($kraj as $krajId) {
          $query = "SELECT * FROM kraj WHERE KID = ?";
          $stmt = $conn->prepare($query);
          $stmt->bind_param('i', $krajId);
          $stmt->execute();
          $kraj = $stmt->get_result()->fetch_assoc();

          $query = "SELECT * FROM oseba o INNER JOIN kraj k ON o.KID = k.KID WHERE o.KID = ? ORDER BY o.priimek, o.ime";
          $stmt = $conn->prepare($query);
          $stmt->bind_param('i', $krajId);
          $stmt->execute();
          $osebe = $stmt->get_result();
        ?>
          <tr>
            <td colspan="6" style="text-align: center;"><?= $kraj['imeKraja'] ?></td>
          </tr>
          <?php while ($oseba = $osebe->fetch_assoc()) { ?>
            <tr>
              <td><?= $oseba['id'] ?></td>
              <td><?= $oseba['ime'] ?></td>
              <td><?= $oseba['priimek'] ?></td>
              <td><?= $oseba['spol'] ?></td>
              <td><?= $oseba['email'] ?></td>
              <td><?= $oseba['opis'] ?></td>
            </tr>
        <?php }
        } ?>
      </tbody>
    </table>
  <?php } ?>

</body>

</html>