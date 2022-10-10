<?php

  $starost = rand(0, 20);
  $rezultat = rand(0, 20);

  echo "Starost: $starost<br>";
  echo "Rezultat: $rezultat<br>";

  if ($rezultat > 10) {
    if ($starost < 10)
      echo "<span style='color: green;'>Odlično</span>";
    else if ($starost > 10)
      echo "<span style='color: blue;'>Povprečno</span>";
  } else if ($rezultat < 10) {
    if ($starost < 10)
    echo "<span style='color: blue;'>Podpovprečno</span>";
  else if ($starost > 10)
    echo "<span style='color: red;'>Katastrofalno</span>";
  }

?>