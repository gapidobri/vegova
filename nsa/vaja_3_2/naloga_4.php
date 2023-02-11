<?php 

  $a = rand(1, 7);

  echo "<span style='font-size: 10px'>$a</span>";
  for ($i = 2; $i < 6; $i++) { 
    $num = $a * $i;
    $fontSize = 10 + 2 * $i;
    echo "<span style='font-size: ${fontSize}px'><$num</span>";
  }
