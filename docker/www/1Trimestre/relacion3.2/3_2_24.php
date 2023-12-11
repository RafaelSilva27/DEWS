<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      font-family: 'Courier New', Courier, monospace;
    }
  </style>
</head>
<body>
  <form method="post" action="">
    <label for="num">Introduzca un numero:</label>
    <input type="number" name="num"><br>
    <input type="submit" value="Enviar">
  </form>

  <?
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $num = $_POST["num"];

      $ancho = strlen($num);

      for ($i = 1; $i <= $num; $i++) {
        $espacios = $num - $i;

        for ($j = 1; $j <= $espacios * $ancho; $j++) { //Impresion de los espacios blancos a la izquierda
          echo "&nbsp;";
        }

        for ($j = 1; $j <= $i; $j++) { //Impresion de los numeros ascendentes
          echo $j;
        }

        for ($j = $i - 1; $j >= 1; $j--) { //Impresion de los numeros descentes 
          echo $j;
        }

        echo "<br>"; //Salto de linea
      }
    }
  ?>
</body>
</html>