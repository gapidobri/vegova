<?php

$n = rand(10, 500);

$bin_str = decbin($n);

$split = str_split($bin_str);

$count = 0;
foreach ($split as $key => $part) {
  if ($part == 0) {
    $count++;
  }
}

switch (true) {
  case $count == 0:
    echo 'Število bitov z vrednostjo 0 = 0.';
    break;
  case $count <= 2:
    echo 'Število bitov z vrednostjo 0 <= 2.';
    break;
  case $count <= 4:
    echo 'Število bitov z vrednostjo 0 <= 4.';
    break;
  case $count >= 5:
    echo 'Število ima vsaj 5 bitov z vrednostjo 0.';
    break;
}
