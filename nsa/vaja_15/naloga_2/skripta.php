<?php

echo "Ime in priimek: " . $_GET["ime"] . " " . $_GET["priimek"] . "<br />";
echo "Program: " . $_GET["program"] . "<br />";
echo "Tuji jeziki (" . prestej($_GET["jeziki"]) . "):";
izpisi($_GET["jeziki"]);
echo "<br />Športi (" . prestej($_GET["sport"]) . "):";
izpisi($_GET["sport"]);
echo "<br />Glasba (" . prestej($_GET["zvrst"]) . "):";
izpisi($_GET["zvrst"]);

function prestej($arr)
{
  $i = 0;
  while (isset($arr[$i])) {
    $i++;
  }

  return $i;
}

function izpisi($arr)
{
  foreach ($arr as $k => $x) {
    if ($k == 0)
      echo " " . $x;
    else
      echo ", " . $x;
  }
}
