<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "geometrija";

// Povezava s podatkovno bazo MySQL
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Povezava neuspešna: " . $conn->connect_error);
}

// Izberemo vse vrstice iz tabele Barve
$sql = "SELECT barvaID, barva FROM Barve";
$result = $conn->query($sql);
$barve = array();
if ($result->num_rows > 0) {
  // Dodamo vsako vrstico v seznam barv
  while ($row = $result->fetch_assoc()) {
    $barve[$row["barvaID"]] = $row["barva"];
  }
}

// Preverimo, ali so bili poslani podatki iz obrazca
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $x = $_POST["x"];
  $y = $_POST["y"];
  $barvaID = $_POST["barvaID"];

  // Preverimo, ali so koordinate v dovoljenem obsegu
  if ($x >= 1 && $x <= 200 && $y >= 1 && $y <= 200) {
    // Dodamo novo vrstico v tabelo Tocke2D
    $sql = "INSERT INTO Tocke2D (x, y, barvaID) VALUES ($x, $y, $barvaID)";
    if ($conn->query($sql) === TRUE) {
      echo "Zapis dodan";
    } else {
      echo "Prišlo je do napake, zapis NI dodan: " . $conn->error;
    }
  } else {
    echo "Koordinate morajo biti med 1 in 200.";
  }
}

$conn->close();

?>

<!DOCTYPE html>
<html>

<head>
  <title>Vnos točke 2D</title>
</head>

<body>
  <h1>Vnos točke 2D</h1>
  <form action="" method="post">
    Koordinata x: <input type="number" name="x" min="1" max="200" required><br>
    Koordinata y: <input type="number" name="y" min="1" max="200" required><br>
    Barva: <select name="barvaID">
      <?php foreach ($barve as $barvaID => $barva) { ?>
        <option value="<?= $barvaID ?>"><?= $barva ?></option>
      <?php } ?>
    </select><br>
    <input type="submit" value="Dodaj">
  </form>
</body>

</html>