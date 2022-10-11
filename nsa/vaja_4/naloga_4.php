<?php

$num = rand(10000, 99999);
$str = strval($num);

$parts = str_split($str);

$min = $parts[0];
$max = $parts[0];
foreach ($parts as $key => $part) {
  if ($part > $max) {
    $max = $part;
  }
  if ($part < $min) {
    $min = $part;
  }
}

$max_count = 0;
$min_count = 0;
foreach ($parts as $key => $part) {
  if ($part == $max) {
    $max_count++;
  }
  if ($part == $min) {
    $min_count++;
  }
}

echo $num . '<br>';

echo "Najmanjša števka v številu je $min in se ponovi $min_count krat.<br>";
echo "Največja števka v številu je $max in se ponovi $max_count krat.<br>";
