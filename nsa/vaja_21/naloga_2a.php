<?php

// povezava na bazo podatkov
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "geometrija1";

$conn = new mysqli($servername, $username, $password, $dbname);

// preveri, ali je povezava uspešna
if ($conn->connect_error) {
  die("Povezava ni uspela: " . $conn->connect_error);
}

// preberi podatke o točki iz obrazca
$x = $_POST["x"];
$y = $_POST["y"];
$barvaHex = $_POST["barvaHex"];

// določi kvadrant, v katerem se nahaja točka
$kvadrant = 1;
if ($x < 0) {
  $kvadrant += 1;
}
if ($y < 0) {
  $kvadrant += 2;
}

// vstavi podatke o točki v tabelo
$sql = "INSERT INTO tocke2D (x, y, barvaHex, kvadrant)
VALUES ('$x', '$y', '$barvaHex', '$kvadrant')";

if ($conn->query($sql) === TRUE) {
  echo "Podatki o točki so bili uspešno vstavljeni.";
} else {
  echo "Napaka pri vstavljanju podatkov: " . $conn->error;
}

$conn->close();
