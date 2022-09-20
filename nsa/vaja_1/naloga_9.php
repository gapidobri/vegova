<style>
  td {
    text-align: end;
    border-bottom: 1px solid;
  }

  table {
    border-collapse: collapse;
  }
</style>

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
