<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $numero = [];
    $cuadrado = [];
    $cubo = [];

    for ($i = 0; $i < 20 ; $i++) {
      $numero[$i] = rand(0 , 100);
      $cuadrado[$i] = $numero[$i] * $numero[$i];
      $cubo[$i] = $numero[$i] * $numero[$i] * $numero[$i];

      echo $numero[$i] . " " . $cuadrado[$i] . " " . $cubo[$i] . "<br>";
    }

  ?>
</body>
</html>