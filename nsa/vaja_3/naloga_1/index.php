<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Naloga 1</title>

  <style>
    .text {
      font-size: 10px;
    }
  </style>
</head>

<body>
  <?php

  $val = 1;

  for ($i = 0; $i < 10; $i++) {
    $val = ($val * 2) + 1;
    $size = 10 + $i * 2;
    echo "
    <span style='font-size: $sizepx;'>
      $val
    </span>
    <br />
  ";
  }

  ?>
</body>

</html>