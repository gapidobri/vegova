<?php

  $znesek = 100_000;
  $obdobje = 12;

  $obresti;

  if ($obdobje == 1) 
    $obresti = 0.023;
  else if ($obdobje <= 3)
    $obresti = 0.03;
  else if ($obdobje <= 6)
    $obresti = 0.036;
  else if ($obdobje <= 12)
    $obresti = 0.04;
  else if ($obdobje <= 24)
    $obresti = 0.0425;
  else if ($obdobje <= 36)
    $obresti = 0.045;

  if ($obdobje >= 12) 
    if ($znesek <= 50_000)
      $obresti += 0.00025;
    else if ($znesek <= 100_000)
      $obresti += 0.00035;
    else if ($znesek <= 200_000)
      $obresti += 0.00040;
    else
      $obresti += 0.00050;

  $koncni_znesek = $znesek + ($znesek * $obresti);

  echo 'Znesek vezave: ' . $znesek . '€<br>';
  echo 'Obdobje vezave: ' . $obdobje . ' mesecev<br>';
  echo 'Končni vezave: ' . $koncni_znesek . '€<br>';

?>