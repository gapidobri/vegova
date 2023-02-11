<?php

function napolni(&$arr)
{
  for ($i = 0; $i < 8; $i++) {
    array_push($arr, rand(0, 1));
  }
}

function prvaPretvorba($arr)
{
  $num = 0;
  foreach ($arr as $i => $val) {
    $num += $val * pow(2, sizeof($arr) - 1 - $i);
  }
  return $num;
}

function drugaPretvorba($arr)
{
  $sign = 1;
  if ($arr[0]) {
    $sign = -1;
  }

  $num = 0;
  foreach ($arr as $i => $val) {
    if ($i === 0) continue;
    $num += $val * pow(2, sizeof($arr) - 1 - $i);
  }

  return $sign * $num;
}

$arr = [];

napolni($arr);
print_r($arr);

$dec = prvaPretvorba($arr);
echo $dec . "<br>";

$dec = drugaPretvorba($arr);
echo $dec . "<br>";
