<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    body {
      margin: 0;
      height: 100vh;
      background-color:
        <?php
        $barva = $_GET["barva"];

        if (isset($_GET["obarvaj"])) {
          echo $barva;
        } else if (isset($_GET["belo"])) {
          echo "#FFFFFF";
        }
        ?>
    }
  </style>
</head>

<body>
  <form action="/" method="GET">
    Izberi barvo ozadja: <input type="color" name="barva" required value="<?php echo $barva ?>" /> <br />
    <input type="submit" name="obarvaj" value="Obarvaj ozadje" />
    <input type="submit" name="belo" value="Belo ozadje" />
  </form>
</body>

</html>