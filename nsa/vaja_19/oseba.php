<?php
require_once 'baza.php';

$id = $_POST['id'];
$ime = $_POST['ime'];
$priimek = $_POST['priimek'];
$datumRojstva = $_POST['datumRojstva'];
$kraj = $_POST['kraj'];
$spol = $_POST['spol'];
$email = $_POST['email'];
$opis = $_POST['opis'];

if (!isset($id, $ime, $priimek, $datumRojstva, $kraj, $spol, $email, $opis)) {
  die("Podatki manjkajo");
}

if ($id < 1) {
  die("ID mora biti pozitivno število");
}

if (!preg_match('/^[A-ZČŠŽ][A-ZČŠŽa-zčšž\s]{2,19}$/', $ime)) {
  die("Ime mora biti dolg med 3 in 20 znakov in lahko vsebuje le črke");
}

if (!preg_match('/^[A-ZČŠŽ][A-ZČŠŽa-zčšž\s]{2,19}$/', $priimek)) {
  die("Priimek mora biti dolg med 3 in 20 znakov in lahko vsebuje le črke");
}

if ($datumRojstva < '1920-01-01' || $datumRojstva > date("Y-m-d")) {
  die("Datum rojstva mora biti med 1920 in danes");
}

if ($kraj < 1000 || $kraj > 9999) {
  die("Kraj mora biti število med 1000 in 9999");
}

if ($spol != 'M' && $spol != 'Ž') {
  die("Spol mora biti M ali Ž");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  die("Email mora biti veljaven");
}

if (isset($opis) && strlen($opis) > 150) {
  die("Opis ne sme biti daljši od 150 znakov");
}

$conn = connect();

$sql = "INSERT INTO oseba (id, ime, priimek, rojstvo, KID, spol, email, opis) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isssisss", $id, $ime, $priimek, $datumRojstva, $kraj, $spol, $email, $opis);
if ($stmt->execute()) {
  header("Location: index.php");
} else {
  echo "Napaka pri dodajanju osebe";
}
