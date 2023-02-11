<?php

$vrstice = $_POST["vrstice"];
$stolpci = $_POST["stolpci"];
$diagonala = $_POST["diagonala"];
$celice = $_POST["celice"];

if ($vrstice < 1 || $vrstice > 10) {
  echo 'Število vrstic ni med 1 in 10';
  die;
}

if ($stolpci < 1 || $stolpci > 10) {
  echo 'Število stolpcev ni med 1 in 10';
  die;
}

echo '<table>';

for ($i = 0; $i < $stolpci; $i++) {
  echo '<tr>';
  for ($j = 0; $j < $vrstice; $j++) {
    if ($i === $j) {
      $style = "background-color: $diagonala";
    } else {
      $style = "background-color: $celice";
    }
    echo '<td width="30px" height="30px" style="' . $style . '"></td>';
  }
  echo '</tr>';
}

echo '</table>';
