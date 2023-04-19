<?php
require_once 'baza.php';

$conn = connect();

$kraji = $conn->query("SELECT * FROM Kraj")->fetch_all(MYSQLI_ASSOC);
$osebe = $conn->query("SELECT * FROM Oseba INNER JOIN Kraj ON Oseba.KID = Kraj.KID");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vaja 19</title>
</head>

<style>
  table.table {
    border-collapse: collapse;
    margin: 16px;
  }

  form {
    margin: 16px;
  }

  .table td,
  th {
    border: 1px solid black;
    padding: 5px;
  }
</style>

<body>

  <table class="table">
    <thead>
      <th>ID</th>
      <th>Ime</th>
    </thead>
    <tbody>
      <?php foreach ($kraji as $kraj) : ?>
        <tr>
          <td><?= $kraj['KID'] ?></td>
          <td><?= $kraj['imeKraja'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <table class="table">
    <thead>
      <th>ID</th>
      <th>Ime</th>
      <th>Priimek</th>
      <th>Rojstvo</th>
      <th>Kraj ID</th>
      <th>Spol</th>
      <th>Email</th>
      <th>Opis</th>
    </thead>
    <tbody>
      <?php while ($row = $osebe->fetch_assoc()) : ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['ime']; ?></td>
          <td><?php echo $row['priimek']; ?></td>
          <td><?php echo $row['rojstvo']; ?></td>
          <td><?php echo $row['imeKraja']; ?></td>
          <td><?php echo $row['spol']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['opis']; ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>

  <form action="kraj.php" method="post">
    <input type="number" name="id" placeholder="Kraj ID" min="1000" max="9999" required><br>
    <input type="text" name="ime" placeholder="Ime Kraja" pattern="[A-ZČŠŽa-zčšž\s]{3,20}" required><br>
    <button type="submit">Dodaj</button>
  </form>

  <form action="oseba.php" method="post">
    <table>
      <tr>
        <td>ID</td>
        <td><input type="number" name="id" min="1" required></td>
      </tr>
      <tr>
        <td>Ime</td>
        <td><input type="string" name="ime" pattern="[A-ZČŠŽ][A-ZČŠŽa-zčšž\s]{2,19}" required></td>
      </tr>
      <tr>
        <td>Priimek</td>
        <td><input type="string" name="priimek" pattern="[A-ZČŠŽ][A-ZČŠŽa-zčšž\s]{2,19}" required></td>
      </tr>
      <tr>
        <td>Datum rojstva</td>
        <td><input type="date" name="datumRojstva" min="1920-01-01" max="<?= date("Y-m-d") ?>" required></td>
      </tr>
      <tr>
        <td>Kraj</td>
        <td>
          <select name="kraj">
            <?php foreach ($kraji as $kraj) : ?>
              <option value="<?= $kraj['KID'] ?>"><?= $kraj['imeKraja'] ?></option>
            <?php endforeach; ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Spol</td>
        <td>
          <label>
            <input type="radio" name="spol" value="M">
            M
          </label>
          <label>
            <input type="radio" name="spol" value="Ž">
            Ž
          </label>
        </td>
      </tr>
      <tr>
        <td>Email</td>
        <td><input type="email" name="email"></td>
      </tr>
      <tr>
        <td>Opis</td>
        <td><textarea name="opis" maxlength="150" rows="3" cols="40"></textarea></td>
      </tr>
      <tr>
        <td><button type="submit">Dodaj</button></td>
      </tr>
    </table>
  </form>

  <form action="filter.php" method="get">
    <table>
      <tr>
        <td>Kraj</td>
        <td>
          <select name="kraj">
            <?php foreach ($kraji as $kraj) : ?>
              <option value="<?= $kraj['KID'] ?>"><?= $kraj['imeKraja'] ?></option>
            <?php endforeach; ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Spol</td>
        <td>
          <input type="checkbox" name="spol[]" value="M">M
          <input type="checkbox" name="spol[]" value="Ž">Ž
        </td>
      </tr>
      <tr>
        <td>Letnica rojstva</td>
        <td><input type="number" name="letnicaRojstva"></td>
      </tr>
      <tr>
        <td><button type="submit">Prikaži</button></td>
      </tr>
    </table>
  </form>

</body>

</html>