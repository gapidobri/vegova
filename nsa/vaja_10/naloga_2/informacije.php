<style>
  table {
    border-collapse: collapse;
  }

  td,
  th {
    border: 1px solid black;
    text-align: center;
  }
</style>

<pre>
<?php

include 'data_amerika.php';
include 'funkcije.php';

izpis1($amerika);

$zvezneDrzave = ustvariTabeloDrzav($amerika);

izpis2($zvezneDrzave);

isci($amerika, 'D');
isci($amerika, 'N');
