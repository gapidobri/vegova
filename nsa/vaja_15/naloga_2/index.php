<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="skripta.php" method="GET">
    Ime: <input type="text" name="ime" required /> <br />
    Priimek: <input type="text" name="priimek" required /> <br />
    Program:
    <input type="radio" name="program" value="gim" checked>gimnazija</input>
    <input type="radio" name="program" value="ss">srednja strokovna šola</input>
    <input type="radio" name="program" value="drugo">drugo</input>
    <br />
    <br />

    Tuji jeziki:
    <select name="jeziki[]" multiple>
      <option value="ang">angleščina</option>
      <option value="nem">nemščina</option>
      <option value="fra">francoščina</option>
      <option value="spa">španščina</option>
      <option value="drugo">drugo</option>
    </select>
    <br />
    <br />

    Šport:
    <select name="sport[]" multiple>
      <option value="atletika">atletika</option>
      <option value="smucanje">smučanje</option>
      <option value="plavanje">plavanje</option>
      <option value="drugo">drugo</option>
    </select>
    <br />
    <br />

    Glasbena zvrst:
    <input type="checkbox" name="zvrst[]" value="klasika">klasika</input>
    <input type="checkbox" name="zvrst[]" value="pop">pop</input>
    <input type="checkbox" name="zvrst[]" value="rok">rok</input>
    <input type="checkbox" name="zvrst[]" value="jazz">jazz</input>
    <input type="checkbox" name="zvrst[]" value="nic">ne maram glasbe</input>

    <br />
    <input type="submit" value="Pošlji" />
    <input type="reset" value="Ponastavi" />
  </form>
</body>

</html>