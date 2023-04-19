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
    }
  </style>
</head>

<body>
  <form action="/" method="GET" id="forma" onSubmit="event.preventDefault()">
    Izberi barvo ozadja: <input type="color" id="barva" name="barva" required /> <br />
    <input type="submit" name="obarvaj" value="Obarvaj ozadje" onclick="obarvaj1()" />
    <input type="submit" name="belo" value="Belo ozadje" onclick="belo1()" />
  </form>

  <script>
    function obarvaj1() {
      document.body.style.backgroundColor = document.getElementById("barva").value;
    }

    function belo1() {
      document.body.style.backgroundColor = "#FFFFFF";
    }
  </script>
</body>

</html>