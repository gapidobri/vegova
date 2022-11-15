<style>
  table {
    border-collapse: collapse;
  }

  td {
    border: 1px black solid;
    width: 30px;
    height: 30px;
    text-align: center;
  }

  .rdeca {
    background-color: red;
  }

  .modra {
    background-color: blue;
  }

  .zelena {
    background-color: green;
  }
</style>

<?php

include 'funkcije.php';

$arr = napolni();
izpisi2($arr);
