<?php

$x = "00111011";
$dec = bindec($x);
$oct = decoct($dec);
$hex = dechex($dec);

?>

<p>
  DEC <?= $dec ?>
</p>
<p>
  OCT <?= $oct ?>
</p>
<p>
  HEX <?= $hex ?>
</p>