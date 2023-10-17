<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $num = $_POST["num"];
    for ($i = 0; $i < 5; $i++){
      $cuadrado = $num * $num;
      $cubo = $num * $num * $num;
      
      echo "numero: " . $num . " cuadrado: " . $cuadrado . " cubo: " . $cubo. "<br>";
      $num++;
      
    }
  ?>
</body>
</html>