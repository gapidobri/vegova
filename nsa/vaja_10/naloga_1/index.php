<style>
  #t1 {
    background-color: green;
    font-style: italic;
  }

  #t2 {
    background-color: red;
    font-weight: bold;
  }
</style>

<?php

$tab = [];
for ($i = 0; $i < 10; $i++) {
  do {
    $num = rand(100, 400);
  } while ($num % 2 !== 0);
  array_push($tab, $num);
}

echo '
<table id="t1">
  <caption>Originalni podatki</caption>
  <tr>
';
foreach ($tab as $num) {
  echo "<td>$num</td>";
}
echo '
  </tr>
</table>
';

sort($tab);

echo '
<table id="t2">
  <caption>Padajoče razvrščeni podatki</caption>
  <tr>
';
foreach ($tab as $num) {
  echo "<td>$num</td>";
}
echo '
  </tr>
</table>
';
