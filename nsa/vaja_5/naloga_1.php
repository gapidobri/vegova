<style>
  table {
    border-collapse: collapse;
  }

  td {
    border: 1px black solid;
  }

  .modra {
    color: blue;
  }

  .rdeca {
    color: red;
  }
</style>

<?php

$t = array();

for ($i = 0; $i < 10; $i++) {
  $char = chr(rand(ord("a"), ord("z")));
  array_push($t, $char);
}

echo '<table><tr>';
for ($i = 0; $i < 10; $i++) {
  $class = 'modra';
  switch ($t[$i]) {
    case 'a':
    case 'e':
    case 'i':
    case 'o':
    case 'u':
      $class = 'rdeca';
  }
  echo "<td class=\"$class\">" . $t[$i] . '</td>';
}
echo '</tr></table>';
