<style>
  table {
    border-collapse: collapse;
    text-align: center;
  }

  tr {
    border: 1px black solid;
  }

  .vertical tr {
    width: 100px;
  }

  .horizontal td {
    width: 100px;
  }

  .keys {
    border-right: 1px black solid;
  }
</style>

<?php
include 'podatki.php';
include 'funkcije.php';

echo '<pre>';

echo 'Naloga a:<br>';
print_r(countColors($tab));

echo '<br>Naloga b:<br>';
print_r(colorIndex($tab));

echo '<br>Naloga c:<br>';
print_r(countColors2($tab));

echo '</pre>';

horizontalPrint(countColors($tab));
