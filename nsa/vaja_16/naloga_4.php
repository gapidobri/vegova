<?php

require_once 'banke.php';

if (sizeof($_POST) == 0) {
  echo 'IZBERITE VSAJ EN ELEMENT!';
} else {

  foreach ($t as $k => $v) {
    echo "Banka: $k <br/>";
    if (isset($_POST["PovpSaldo"])) {
      $povp = izracunajPovp($v, 'saldo');
      echo "Povprečen saldo banke je: $povp <br/>";
    }

    if (isset($_POST["Dokap"])) {
      $vs = 0;
      foreach ($v as $z) {
        $vs += $z["dokapitalizacija"];
      }

      echo "Vsota dokapitalizacije je $vs <br/>";
    }

    if (isset($_POST["PovZap"])) {
      $pvp = izracunajPovp($v, 'zaposleni');
      echo "Povprecno stevilo zaposlenih na banki je: $pvp <br/>";
    }

    echo '<br /><br />';
  }
}

function izracunajPovp($a, $g)
{
  $i = 0;
  $vs = 0;
  foreach ($a as $v) {
    $i++;
    $vs += $v[$g];
  }

  return ($vs / $i);
}
