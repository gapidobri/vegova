<style>
  table {
    border-collapse: collapse;
  }

  td {
    border: 1px black solid;
  }

  .rdeca {
    color: red;
  }

  .modra {
    color: blue;
  }
</style>

<?php

$tab = array();
$sum = 0;

for ($i = 0; $i < 10; $i++) {
  $val = rand(100, 400);
  $sum += $val;
  array_push($tab, $val);
}

$povpr = $sum / count($tab);

echo '<table><tr>';
foreach ($tab as $i => $v) {
  $class = $v < $povpr ? 'rdeca' : 'modra';
  echo "<td class=\"$class\">" . $v . '</td>';
}
echo '</tr><table>';
