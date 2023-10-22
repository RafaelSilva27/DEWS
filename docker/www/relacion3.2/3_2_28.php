<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="post" action="">
    <label for="num">Introduzca un numero: </label>
    <input type="number" name="num">
    <input type="submit" value="Enviar">
  </form>

  <?
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $num = $_POST["num"];

      if ($num >= 0) {
        $fact = 1;

        for ($i = 1; $i <= $num; $i++) {
          $fact *= $i;
        }
        echo "El factorial de $num es: $fact";
      } else {
        echo "Datos incorrectos";
      }
    }
  ?>
</body>
</html>