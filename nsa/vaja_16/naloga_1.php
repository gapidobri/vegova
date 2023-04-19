<pre>
<?php

require_once 'banke.php';

print_r($t[$_POST["bank"]]);

echo '<br />';

if (isset($t[$_POST["bank"]][$_POST["year"]])) {
  echo "DATA ALREADY EXSISTS!";
} else {
  $t[$_POST["bank"]][$_POST["year"]] = array(
    "Saldo" => $_POST["saldo"],
    "Zaposleni" => $_POST["zaposleni"],
    "dokapitalizacija" => $_POST["dokapitalizacija"],
  );

  print_r($t[$_POST["bank"]]);
}
