<?php 
  $pi = 3.14;

  $r = rand(10, 100);

  echo "Polmer: $r<br>";

  echo "Obseg z 3.14: " . round(2 * $pi * $r, 6) . '<br>';

  echo "Obseg z pi(): " . round(2 * pi() * $r, 6);
?>