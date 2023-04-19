<?php require_once 'banke.php'; ?>

<table>
  <?php foreach ($t as $key => $value) { ?>
    <tr>
      <td colspan="3" style="color: blue; font-size: 20px;"><?= $key ?></td>
    </tr>
    <?php
    if (isset($value[$_GET["leto"]])) {
      foreach ($value[$_GET["leto"]] as $vals) ?>
      <td><?= $vals ?></td>
    <?php
    } else {
      for ($i = 0; $i < 3; $i++) ?>
      <td>NAN</td>
  <?php
    }
  } ?>
</table>