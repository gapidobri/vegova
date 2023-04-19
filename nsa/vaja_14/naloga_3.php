<?php

if ($_GET['operacija'] == 'crno') {
  echo $_GET['prvo'];
  return;
}

if ($_GET['operacija'] == 'bravno') {
  $barve = array('red', 'green', 'blue');
  $j = 0;
  for ($i = 0; $i < strlen($_GET['prvo']); $i++) {
    if ($j == 3) {
      $j = 0;
    }

    if ($_GET['prvo'][$i] == ' ') {
      echo '<span> </span>';
    } else {
      echo '<span style="color:' . $barve[$j] . ';">' . $_GET['prvo'][$i] . '</span>';
      $j++;
    }
  }
}
