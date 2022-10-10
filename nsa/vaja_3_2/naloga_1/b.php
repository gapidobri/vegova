<?php 
  $pi = 3.14;

  $r = rand(-10, 100);

  echo "Polmer: $r<br>";


  if ($r < 0) {
    echo "Takega kroga ni!";
    return;
  }
  
  if ($r == 0) {
    echo "To je točka!";
    return;
  }

  echo "Obseg: " . 2 * pi() * $r . "<br>";
  echo "Ploščina: " . pi() * pow($r, 2);
?>