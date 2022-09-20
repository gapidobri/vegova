<table>
  <?php
  
    $x = 1;

    for ($i = 1; $i < 10; $i++) {
      echo "<tr>";
      for ($j = 1; $j < 10; $j++) {
        echo '<td>' . $x . '</td>';
        $x += 2;
      }
      echo '</tr>';
    }

  ?>
</table>