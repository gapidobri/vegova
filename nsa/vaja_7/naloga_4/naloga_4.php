<?php

require_once('podatki.php');

array_push($vrtec[13]["igraca"], "vlak");
array_push($vrtec[13]["igraca"], "barvice");

function izpis($vrtec)
{
  foreach ($vrtec as $otrok) {
    echo '<b>' . $otrok["ime"] . ': </b>';
    foreach ($otrok["igraca"] as $igraca) {
      echo $igraca . ' ';
    }
    echo '<br>';
  }
}

function otroki_z_igraco($vrtec, $igraca)
{
  foreach ($vrtec as $otrok) {
    if (in_array($igraca, $otrok["igraca"])) {
      echo $otrok["ime"] . '<br>';
    }
  }
}

otroki_z_igraco($vrtec, "medvedek");

function otroki_brez_igrace($vrtec, $igraca)
{
  foreach ($vrtec as $otrok) {
    if (!in_array($igraca, $otrok["igraca"])) {
      echo $otrok["ime"] . '<br>';
    }
  }
}

otroki_brez_igrace($vrtec, "medvedek");
