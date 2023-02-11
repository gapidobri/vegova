<style>
  table {
    border-collapse: collapse;
    text-align: center;
  }

  td,
  th {
    border: 1px black solid;
    padding: 4px;
  }
</style>

<pre>
<?php

require_once('gorivo.php');

$d["2231"] = [
  "ime" => "Gašper",
  "natocenoGorivo" => [30],
];

array_push($d["2231"]["natocenoGorivo"], 41);

function izpis_podatkov(array $d, int $n)
{
  foreach ($d as $id => $kupec) {
    if (count($kupec["natocenoGorivo"]) >= $n) {
      echo "Šifra kupca=$id";
      echo ' Ime=' . $kupec["ime"];
      echo ' Natočeno gorivo=' . join(" ", $kupec["natocenoGorivo"]);
      echo '<br>';
    }
  }
  echo '<br>';
}

izpis_podatkov($d, 3);

function razvrsti(array &$d)
{
  uasort($d, function ($a, $b) {
    return array_sum($a["natocenoGorivo"]) - array_sum($b["natocenoGorivo"]);
  });
}

razvrsti($d);

izpis_podatkov($d, 0);

$d["9999"] = [
  "ime" => "Zdenka",
  "natocenoGorivo" => [],
];

function izpis_tabela(array $d)
{
  uasort($d, function ($a, $b) {
    return strcmp($a["ime"], $b["ime"]);
  });

  echo '
  <table>
    <thead>
      <th>Ime</th>
      <th>Najmanjša kol. goriva</th>
      <th>Največja kol. goriva</th>
    </thead>
    <tbody>
  ';

  foreach ($d as $kupec) {
    echo '<tr>';
    echo '<td>' . $kupec["ime"] . '</td>';
    if (count($kupec["natocenoGorivo"])) {
      echo '<td>' . min($kupec["natocenoGorivo"]) . '</td>';
      echo '<td>' . max($kupec["natocenoGorivo"]) . '</td>';
    } else {
      echo '<td>N/A</td>';
      echo '<td>N/A</td>';
    }
    echo '</tr>';
  }

  echo '
    </tbody>
  </table>
  ';
}

izpis_tabela($d);

function prepisi(array $d, array &$kat)
{
  foreach ($d as $id => $kupec) {
    foreach ($kupec["natocenoGorivo"] as $g) {
      $k = (floor($g / 10) - 1) * 10;
      if (!isset($kat[$k])) {
        $kat[$k] = [];
      }
      if (!in_array($id, $kat[$k])) {
        array_push($kat[$k], $id);
      }
    }
  }

  usort($kat, function ($a, $b) {
    return count($b) - count($a);
  });
}

$kat = [];
prepisi($d, $kat);

print_r($kat);
