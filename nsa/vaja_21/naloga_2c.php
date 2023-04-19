<!DOCTYPE html>
<html>

<head>
  <title>Iskanje točk</title>
</head>

<body>
  <h1>Iskanje točk</h1>
  <form action="" method="post">
    <label>Izberi barvo:</label>
    <input type="color" name="barva">
    <input type="submit" value="Išči">
  </form>
  <?php
  $servername = "127.0.0.1";
  $username = "root";
  $password = null;
  $dbname = "geometrija1";

  // ustvarimo povezavo
  $conn = new mysqli($servername, $username, $password, $dbname);
  // preverimo povezavo
  if ($conn->connect_error) {
    die("Povezava ni uspela: " . $conn->connect_error);
  }

  if (isset($_POST['barva'])) {
    $barva = $_POST['barva'];
    // pretvorimo barvo iz niza v šestnajstiško obliko
    $barvaHex = str_replace("#", "", $barva);

    $sql = "SELECT * FROM Tocke2D WHERE barvaHex = '$barvaHex'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // izpišemo rezultate
      while ($row = $result->fetch_assoc()) {
        echo "Točka (" . $row["x"] . ", " . $row["y"] . ") v kvadrantu " . $row["kvadrant"] . "<br>";
      }
    } else {
      echo "Ni rezultatov";
    }
  }


  if (isset($_POST['barva'])) {
    $barva = $_POST['barva'];
    // pretvorimo barvo iz niza v šestnajstiško obliko
    $barvaHex = str_replace("#", "", $barva);
  }
  ?>

</body>

</html>