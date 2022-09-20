<?php 

$x = 25;
$y = "a";

echo "$x $y"."<br/>";

echo '$x $y'.'<br/>';

echo '$x + $y'.'<br/>';

echo "$x + $y"."<br/>";

$y = 30;
echo $x + $y.'<br/>';

$z = "30";
echo $x + $z.'<br/>';

$t = "30g";
echo $x + $t.'<br/>';

// a) v " lahko direktno vstavljaš spremenljivke, v ' pa jih tretira kot besedilo
// b) števila sešteje med sabo, besedilo pa sestavi eno za drugo

?>