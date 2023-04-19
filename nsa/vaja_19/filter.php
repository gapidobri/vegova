<?php
require_once 'baza.php';

$kraj = isset($_GET['kraj']) ? $_GET['kraj'] : die('Kraj ni bil izbran.');
$spol = isset($_GET['spol']) ? $_GET['spol'] : null;
$letnicaRojstva = isset($_GET['letnicaRojstva']) ? $_GET['letnicaRojstva'] : null;

$conn = connect();

$query = "SELECT * FROM Oseba WHERE KID = ?";
$params = [$kraj];

if ($letnicaRojstva) {
  $query .= " AND YEAR(rojstvo) = ?";
  $params[] = $letnicaRojstva;
}

if ($spol) {
  $placeholders = array_fill(0, count($spol), '?');
  $query .= " AND spol IN (" . implode(',', $placeholders) . ")";
  $params = array_merge($params, $spol);
}

$stmt = $conn->prepare($query);

$stmt->execute($params);
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Filter</title>
</head>

<style>
  table.table {
    border-collapse: collapse;
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
      <th>Priimek</th>
      <th>Rojstvo</th>
      <th>Spol</th>
      <th>Email</th>
      <th>Opis</th>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()) : ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['ime']; ?></td>
          <td><?php echo $row['priimek']; ?></td>
          <td><?php echo $row['rojstvo']; ?></td>
          <td><?php echo $row['spol']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['opis']; ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</body>

</html>