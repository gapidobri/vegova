<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
</head>

<body>
  <form action="" method="post">
    <input type="text" name="username" maxlength="20" placeholder="username" required>
    <input type="password" name="password" placeholder="password" required>
    <button type="submit">Login</button>
  </form>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $conn = mysqli_connect("localhost", "root", null, "baza");

  $stmt = $conn->prepare("SELECT geslo FROM Uporabnik WHERE uime = ?");
  $stmt->bind_param("s", $_POST["username"]);
  $stmt->execute();

  $user = $stmt->get_result()->fetch_assoc();

  $stmt->close();

  if (!$user || $user["geslo"] !== md5($_POST["password"])) {
    echo "Wrong credentials";
    return;
  }

  session_start();

  $_SESSION["username"] = $_POST["username"];

  header("Location: naloga_1.php");

  $conn->close();
}
?>