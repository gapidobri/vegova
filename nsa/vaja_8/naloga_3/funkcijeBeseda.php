<?php

function randomString()
{
  $str = "";
  for ($i = 0; $i < 10; $i++) {
    $str .= chr(rand(ord('a'), ord('z')));
  }
  return $str;
}

function split($str)
{
  $samoglasniki = "";
  $soglasnki = "";

  foreach (str_split($str) as $value) {
    if (in_array($value, ['a', 'e', 'i', 'o', 'u'])) {
      $samoglasniki .= $value;
    } else {
      $soglasnki .= $value;
    }
  }

  $samLen = strlen($samoglasniki);
  $sogLen = strlen($soglasnki);

  echo "Samoglasniki ($samLen): $samoglasniki<br>";
  echo "Soglasniki ($sogLen): $soglasnki<br>";
}

function soglasnik($str)
{
  for ($i = ord('a'); $i < ord('z'); $i++) {
    foreach (str_split($str) as $value) {
      if (!in_array($value, ['a', 'e', 'i', 'o', 'u'])) {
        echo "Prvi soglasnik: $value";
        return;
      }
    }
  }
  echo "Prvi soglasnik: NA";
}
