<form method="POST" action="">
  <label>Vnesite številko kvadranta:</label>
  <input type="text" name="kvadrant" />
  <br /><br />
  <input type="submit" name="submit" value="Izbriši točke" />
</form>

<?php
// Povezava z bazo podatkov
$dbhost = "127.0.0.1";
$dbuser = "root";
$dbpass = "";
$dbname = "geometrija1";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Preverjanje, ali je bil obrazec oddan
if (isset($_POST['submit'])) {
  // Preverjanje, ali je bil vnesen številka kvadranta
  if (!empty($_POST['kvadrant'])) {
    // Sanitizacija vnosa uporabnika
    $kvadrant = mysqli_real_escape_string($conn, $_POST['kvadrant']);
    // Brisanje točk izbrane barve
    $sql = "DELETE FROM Tocke2D WHERE kvadrant = $kvadrant";
    $result = mysqli_query($conn, $sql);
    // Izpis števila izbrisanih točk
    $num_rows = mysqli_affected_rows($conn);
    echo "Število izbrisanih točk = $num_rows";
  } else {
    echo "Prosim, vnesite številko kvadranta.";
  }
}

// Zapiranje povezave z bazo podatkov
mysqli_close($conn);
?>