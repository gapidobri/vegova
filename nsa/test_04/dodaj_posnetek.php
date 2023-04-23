<?php
require_once "naloga_2.php";

$avtorId = $_POST["avtorId"] or exit("avtorId manjka");
$naslov = $_POST["naslov"] or exit("naslov manjka");
$datum = $_POST["datum"] or exit("datum manjka");

$stmt = $conn->prepare("INSERT INTO Posnetek (AvtorID, Naslov, Datum) VALUES (?, ?, ?)");

$stmt->bind_param("iss", $avtorId, $naslov, $datum);

$stmt->execute();

if ($stmt->errno) {
  exit("Napaka pri dodajanju posnetka: " . $stmt->error);
}

echo "Posnetek dodan";
