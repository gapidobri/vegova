<?php

function napolni(&$tab)
{
  foreach ($tab as $mesec => $v) {
    for ($i = 0; $i < 6; $i++) {
      array_push($tab[$mesec], rand(10, 20));
    }
  }
}

function izpisi($tab)
{
  echo '<table>';
  foreach ($tab as $mesec => $st) {
    echo '<tr>';
    echo "<td>$mesec</td>";
    foreach ($st as $s) {
      echo "<td>$s</td>";
    }
    echo '</tr>';
  }
  echo '</table><br>';
}

function spremeni(&$tab)
{
  foreach ($tab as $mesec => $nums) {
    $min = min($nums);
    $tab[$mesec] = array_filter($nums, function ($v) use ($min) {
      return $v !== $min;
    });
  }
}

function prepisi($tab, &$tab2)
{
  $sum = 0;
  foreach ($tab as $nums) {
    $sum += array_sum($nums);
  }

  $avg = $sum / count($tab);

  $tab2 = array_filter($tab, function ($nums) use ($avg) {
    return array_sum($nums) < $avg;
  });
}
