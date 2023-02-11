<style>
  table {
    border-collapse: collapse;
  }

  td {
    border: 1px solid black;
  }
</style>

<?php

$spodnjaMeja = $_POST["spodnjaMeja"];
$zgornjaMeja = $_POST["zgornjaMeja"];
$steviloElementov = $_POST["steviloElementov"];
$veckratnik = $_POST["veckratnik"];
$uredi = isset($_POST["uredi"]);
$barvaDeljiteljev = $_POST["barvaDeljiteljev"];
$barvaOstalih = $_POST["barvaOstalih"];

if (!(isset($spodnjaMeja) && isset($zgornjaMeja) && isset($steviloElementov) && isset($veckratnik) &&
  is_numeric($spodnjaMeja) && is_numeric($zgornjaMeja) && is_numeric($steviloElementov) && is_numeric($veckratnik) &&
  $steviloElementov >= 20)) {
  echo 'Napačni podatki';
  die;
}

$ostala = [];
$veckratniki = [];

for ($i = 0; $i < $steviloElementov; $i++) {
  $num = rand($spodnjaMeja, $zgornjaMeja);
  if ($num % $veckratnik) {
    array_push($ostala, $num);
  } else {
    array_push($veckratniki, $num);
  }
}

if ($uredi) {
  sort($ostala);
  sort($veckratniki);
}

echo '<h2>Deljitelji</h2>';
echo '<table><tr>';
foreach ($veckratniki as $num) {
  echo "<td style=\"color: $barvaDeljiteljev\">$num</td>";
}
echo '</tr></table>';
echo count($veckratniki) . ' elementov.';


echo '<h2>Ostala</h2>';
echo '<table><tr>';
foreach ($ostala as $num) {
  echo "<td style=\"color: $barvaOstalih\">$num</td>";
}
echo '</tr></table>';
echo count($ostala) . ' elementov.';
