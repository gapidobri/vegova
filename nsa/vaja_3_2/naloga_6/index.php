<?php 

  $a = rand(1, 500);
  $b = rand(1, 500);

  $obseg = number_format(2 * $a + 2 * $b, 0, ',', '.');
  $ploscina = number_format($a * $b, 0, ',', '.');
  $diagonala = number_format(sqrt(pow($a, 2) + pow($b, 2)), 2, ',', '.');

  $fontSize = 36;
  if ($ploscina < 10000) 
    $fontSize = 12;
  else if ($ploscina >= 10001 && $ploscina <= 90000)
    $fontSize = 24;

  echo "<span style='font-size: ${fontSize}pt;'>";

  echo "Stranica a: $a<br>";
  echo "Stranica b: $b<br>";
  echo "Obseg: $obseg<br>";
  echo "Ploščina: $ploscina<br>";
  echo "Diagonala: $diagonala<br>";

  echo '</span>';
?>