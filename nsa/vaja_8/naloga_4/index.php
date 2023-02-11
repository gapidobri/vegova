<style>
  table {
    border-collapse: collapse;
  }

  td {
    border: 1px black solid;
    padding: 8px;
  }
</style>

<?php
include 'podatki.php';
include 'funkcije.php';

$tab2 = [];

napolni($tab);
izpisi($tab);

spremeni($tab);
izpisi($tab);

prepisi($tab, $tab2);
izpisi($tab);
izpisi($tab2);
