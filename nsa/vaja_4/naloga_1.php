<style>
  .pred {
    color: red;
  }

  .po {
    color: blue;
  }
</style>

<?php

$char_num = rand(ord('G'), ord('N'));

echo 'Črka = ' . chr($char_num) . '<br>';

echo 'Predhodnjih 5 črk: ';
echo '<span class="pred">';
for ($i = -5; $i <= 0; $i++) {
  echo chr($char_num + $i) . '&nbsp;&nbsp;';
}
echo '</span><br>';

echo 'Naslednjih 5 črk: ';
echo '<span class="po">';
for ($i = 0; $i <= 5; $i++) {
  echo chr($char_num + $i) . '&nbsp;&nbsp;';
}
echo '</span><br>';
