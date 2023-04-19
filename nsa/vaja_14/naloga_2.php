<?php

if (!intCheck($_GET['prvo'])) {
  echo "Podatek ni celo stevilo";
  return;
}

if ($_GET['prvo'] > 200 || $_GET['prvo'] < 1) {
  echo "Podatka ni v intervalu [1,200]";
  return;
}

$delitelji = [];
if ($_GET['operacija'] == 'Sodi Delitelji') {
  for ($i = 1; $i <= $_GET['prvo']; $i++) {
    if ($_GET['prvo'] % $i == 0 && $i % 2 == 0) {
      $delitelji[] = $i;
    }
  }
} else if ($_GET['operacija'] == 'Lihi Delitelji') {
  for ($i = 1; $i <= $_GET['prvo']; $i++) {
    if ($_GET['prvo'] % $i == 0 && $i % 2 != 0) {
      $delitelji[] = $i;
    }
  }
} else {
  for ($i = 1; $i <= $_GET['prvo']; $i++) {
    if ($_GET['prvo'] % $i == 0) {
      $delitelji[] = $i;
    }
  }
}

print_r($delitelji);
