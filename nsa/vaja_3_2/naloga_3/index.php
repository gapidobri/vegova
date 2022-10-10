<?php

  $letnica = rand(1500, 2100);

  $prestopno = false;
  
  if (!($letnica % 400)) {
    $prestopno = true;
  } else if (!($letnica % 4)) {
    $prestopno = $letnica % 100;
  }

?>

<span style="color: <?= $prestopno ? "blue" : "red" ?>;">
  Leto <u><?= $letnica ?> <?= $prestopno ? "je" : "ni" ?></u> prestopno leto
</span>