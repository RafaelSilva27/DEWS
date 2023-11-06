<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="post" action="piramideHuecaB.php">
    Introduce la altura de la piramide <input type="number" name="alt"><br>
    Elige el simbolo de la piramide:
    <select name="simb">
      <option value="*">*</option>
      <option value="#">#</option>
      <option value="+">+</option>
      <option value="^">^</option>
      <option value="~">~</option>
    </select><br>
    <input type="submit" value="Enviar">
  </form>
</body>
</html>