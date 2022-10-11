<style>
  table {
    border-collapse: collapse;
    text-align: right;
  }

  td {
    border: 1px black solid;
  }
</style>

<?php

$count = 0;
$x_count = rand(3, 20);
$y_count = rand(3, 20);

echo '<table>';
for ($i = 0; $i < $y_count; $i++) {
  echo '<tr>';
  for ($j = 0; $j < $x_count; $j++) {
    $count++;
    echo "<td>$count</td>";
  }
  echo '</tr>';
}
echo '</table>';
