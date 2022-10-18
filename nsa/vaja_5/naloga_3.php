<?php

$t = array();

for ($i = 0; $i < 30; $i++) {
  array_push($t, chr(rand(ord('A'), ord('Z'))));
}

foreach ($t as $i => $v) {
  echo "$v ";
}
echo '<br>';

echo 'Mesta črke A: ';
foreach ($t as $i => $v) {
  if ($v === 'A') {
    echo "$i ";
  }
}
echo '<br>';

echo 'Mesta črke B: ';
foreach ($t as $i => $v) {
  if ($v === 'B') {
    echo "$i ";
  }
}
echo '<br>';

echo 'Mesta črke C: ';
foreach ($t as $i => $v) {
  if ($v === 'C') {
    echo "$i ";
  }
}
echo '<br>';
