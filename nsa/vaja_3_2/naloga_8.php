<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Naloga 8</title>

</head>
<style>
  table {
    border-collapse: collapse;
  }

  td {
    text-align: right;
    border: 2px blue solid;
  }
  
  .even {
    font-weight: bold;
    font-size: 16;
    color: green;
  }
  
  .odd {
    font-weight: bold;
    font-style: italic;
    font-size: 12;
    color: blue;
  }
</style>
<body>
  
  <?php
    echo "<table>";
    
    for ($i = 0; $i < 10; $i++) {
      echo "<tr>";

      for ($j = 0; $j < 12; $j++) { 
        $num = rand(10, 800);
        $class = $num % 2 == 0 ? "even" : "odd";
        echo "<td class='$class'>$num</td>";
      }

      echo "</tr>";

    }

    echo "</table>";
  ?>
</body>
</html>

