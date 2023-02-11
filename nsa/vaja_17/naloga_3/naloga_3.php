<?php

if (isset($_GET['besedilo'])) {
  $besedilo = $_GET['besedilo'];
} else {
  $besedilo = "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Naloga 3</title>
</head>

<body>
  <form action="naloga_3.php" method="get">
    <label for="besedilo">Vnesi besedo</label>
    <input type="text" name="besedilo" id="besedilo" pattern="^[a-z]*$" required value="<?= $besedilo ?>" />
    <br />

    <input type="submit" value="Izpis" />
  </form>

  <?php

  if ($besedilo !== "") {
    $narascujoce = str_split($besedilo);
    sort($narascujoce);
    $narascujoce = join($narascujoce);

    $padajoce = str_split($besedilo);
    rsort($padajoce);
    $padajoce = join($padajoce);


    echo "
    Besedilo: $besedilo <br>
    Naraščujoče urejeni znaki: $narascujoce <br>
    Padajoče urejeni znaki: $padajoce
    ";
  }

  ?>

</body>

</html>