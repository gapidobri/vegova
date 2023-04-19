<?php

function connect()
{
  $conn = mysqli_connect("127.0.0.1", "root", null, "bazaOseb") or die("Napaka pri povezavi z bazo");
  return $conn;
}
