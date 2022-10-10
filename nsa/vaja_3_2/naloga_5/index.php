<style>
  
  .match {
    color: red;
    font-size: 12pt;
  }

  .velika {
    color: blue;
    font-size: 16pt;
  }

  .male {
    color: green;
    font-size: 10pt;
  }

</style>

<?php

  $velika = rand(65, 90);
  $match = false;

  $male = '';

  for ($i = 0; $i < 3; $i++) { 
    $mala = rand(97, 122);
    if ($mala - 32 == $velika) {
      $match = true;
    }
    $male = $male . chr($mala);
  }

  if ($match) {
    echo '<span class="match">'.chr($velika).$male.'</span>';
  } else {
    echo '<span class="velika">'.chr($velika).'</span>';
    echo '<span class="male">'.$male.'</span>';
  }

?>