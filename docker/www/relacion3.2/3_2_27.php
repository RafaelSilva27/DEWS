<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="post" action="">
    <label for="num">Introduzca un numero:</label>
    <input type="number" name="num">
    <input type="submit" value="Enviar">
  </form>

  <?
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $num = $_POST["num"];
      $cont = 0;
      $suma = 0;

      echo "Multiplos de 3 entre 1 y $num: <br>";

      for ($i = 1; $i <= $num; $i++) {
        if ($i % 3 == 0) {
          echo $i . " ";
          $cont++;
          $suma += $i;
        }
      }

      echo "<br> Cantidad de multiplos de 3: $cont";
      echo "<br> Suma de multiplos de 3: $suma";
    }
  ?>
</body>
</html>