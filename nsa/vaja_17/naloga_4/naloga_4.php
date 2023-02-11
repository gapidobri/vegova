<form action="" method="post">
  Vnesite besedo: <input type="text" name="word"><br>
  <input type="radio" name="choice" value="vowels_only"> Samo samoglasniki<br>
  <input type="radio" name="choice" value="vowels_and_consonants"> Kombinacija samoglasnikov in soglasnikov<br>
  <input type="submit" value="Preveri">
</form>

<?php
if (!(isset($_POST['word']) && isset($_POST['choice']))) {
  return;
}

$word = $_POST['word'];
$choice = $_POST['choice'];
$valid = false;

function checkValidity($word, $choice)
{
  $vowels = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
  $vowel_count = 0;

  for ($i = 0; $i < strlen($word); $i++) {
    if (in_array($word[$i], $vowels)) {
      $vowel_count++;
    }
  }

  if ($choice == "vowels_only") {
    return $vowel_count == strlen($word);
  } else {
    return $vowel_count >= strlen($word) / 2;
  }
}

$valid = checkValidity($word, $choice);

if ($valid) {
  echo "$word je veljavna beseda.";
} else {
  echo "$word ni veljavna beseda.";
}
?>