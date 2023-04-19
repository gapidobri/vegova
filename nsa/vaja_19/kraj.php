<?php
require_once 'baza.php';

$id = $_POST['id'];
$ime = $_POST['ime'];

if (!isset($id) || !isset($ime)) {
  die('Podatki manjkajo');
}

if (!($id >= 1000 && $id <= 9999)) {
  echo 'ID mora biti med 1000 in 9999';
  exit();
}

if (!preg_match('/^[A-ZČŠŽa-zčšž\s]{3,20}$/', $ime)) {
  echo 'Ime mora biti med 3 in 20 znakov dolgo in lahko vsebuje le črke';
  exit();
}

$conn = connect();

$sql = "INSERT INTO Kraj (KID, imeKraja) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('is', $id, $ime);

if ($stmt->execute()) {
  header('Location: index.php');
} else {
  echo 'Napaka pri dodajanju kraja';
}
