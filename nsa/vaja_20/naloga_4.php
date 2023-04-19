<?php
// vzpostavi povezavo z bazo podatkov
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "geometrija";

$conn = new mysqli($servername, $username, $password, $dbname);

// preveri, ali je povezava uspešna
if ($conn->connect_error) {
  die("Povezava ni uspela: " . $conn->connect_error);
}

// preveri, ali je obrazec oddan
if (isset($_POST['submit'])) {
  // pridobi izbrano barvo iz obrazca
  $barvaId = $_POST['barva'];

  // pripravi poizvedbo za iskanje točk po barvi
  $sql = "SELECT x, y FROM Tocke2D WHERE barvaID IN (SELECT barvaID FROM Barve WHERE barvaId = $barvaId)";

  // izvedi poizvedbo
  $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Iskanje točk po barvi</title>
</head>

<body>
  <h2>Iskanje točk po barvi</h2>
  <form method="post" action="">
    <label for="barva">Izberi barvo:</label>
    <select name="barva" id="barva">
      <!-- get all colors from database -->
      <?php
      // pripravi poizvedbo za pridobitev vseh barv
      $sql = "SELECT barvaId, barva FROM Barve";

      // izvedi poizvedbo
      $result = $conn->query($sql);

      // preveri, ali je bila poizvedba uspešna
      if ($result->num_rows > 0) {
        // izpiši rezultate v tabeli
        while ($row = $result->fetch_assoc()) {
          echo "<option value='" . $row["barvaId"] . "'>" . $row["barva"] . "</option>";
        }
      }
      ?>
    </select>
    <br><br>
    <input type="submit" name="submit" value="Išči">
  </form>

  <?php
  if (isset($_POST['submit'])) {

    // preveri, ali je bila poizvedba uspešna
    if ($result->num_rows > 0) {
      // izpiši rezultate v tabeli
      echo "<br><br><table><tr><th>X</th><th>Y</th></tr>";
      while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["x"] . "</td><td>" . $row["y"] . "</td></tr>";
      }
      echo "</table>";
    } else {
      echo "Ni bilo najdenih točk s to barvo.";
    }
  }
  ?>

</body>

</html>