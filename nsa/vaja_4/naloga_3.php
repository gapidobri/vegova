<style>
  .sodo {
    font-family: Courier;
    font-size: 12px;
  }

  .liho {
    font-family: Verdana;
    font-size: 10px;
  }
</style>

<?php

$soda_count = 0;
$soda_sum = 0;

while (true) {
  $num = rand(1, 100);
  $sodo = $num % 2 == 0;
  if ($sodo) {
    $soda_count++;
    $soda_sum += $num;
  }
  $class = $sodo ? 'sodo' : 'liho';
  echo "<span class='$class'>" . $num . '</span> ';
  if (chr($num) == 'T') {
    break;
  }
}
echo '<br>';

$avg = $soda_sum / $soda_count;

echo 'Povprečje sodih števil: ' . number_format($avg, 2, ',');
