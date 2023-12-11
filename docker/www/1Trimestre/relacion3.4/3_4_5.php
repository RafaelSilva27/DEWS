<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="post" action="">
    <label for="decimal">Introduzca un numero decimal</label>
    <input type="number" name="decimal">
    <input type="submit" value="Calcular">
  </form>

  <?
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $decimal = $_POST['decimal'];
      $binario = " ";

      while ($decimal > 0) {
        $resto = $decimal % 2;
        $binario = $resto . $binario;
        $decimal = intval($decimal / 2);
      }

      echo "El numero decimal $decimal en binario es: $binario";
    }
  ?>
</body>
</html>