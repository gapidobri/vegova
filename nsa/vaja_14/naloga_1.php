<?php

if (!$_GET['prvo']  || !$_GET['drugo']) return;

$nums = [$_GET['prvo'], $_GET['drugo']];

if (!intCheck($nums[0]) || !intCheck($nums[1])) {
  echo "Podatka nista celi stevili";
  return;
}

if ($_GET['operacija'] == 'krat')
  echo $nums[0] . " <b>krat</b> " . $nums[1] . " = " . $nums[0] * $nums[1];
else if ($_GET['operacija'] == 'plus')
  echo $nums[0] . " <b>plus</b> " . $nums[1] . " = " . ($nums[0] + $nums[1]);

function intCheck($string)
{
  foreach (str_split($string) as $chr) {
    if (ord($chr) > ord('9')) {
      return false;
    }
  }
  return true;
}
