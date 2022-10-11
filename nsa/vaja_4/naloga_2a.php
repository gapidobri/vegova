<style>
  table {
    border-collapse: collapse;
  }

  td {
    border: 1px black solid;
  }
</style>

<?php

$count = 0;

echo '<table>';
for ($i = 0; $i < 5; $i++) {
  echo '<tr>';
  for ($j = 0; $j < 5; $j++) {
    $count++;
    echo "<td>$count</td>";
  }
  echo '</tr>';
}
echo '</table>';
