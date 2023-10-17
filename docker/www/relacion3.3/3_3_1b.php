<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $numeros = [];
   
    for ($i = 0; $i < 20 ; $i++) {
      $numero = rand(0, 100);
      $numeros[$i]['numero'] = $numero;
      $numeros[$i]['cuadrado'] = $numero * $numero;
      $numeros[$i]['cubo'] = $numero * $numero * $numero;


      echo $numeros[$i]['numero'] . " " . $numeros[$i]['cuadrado'] . " " . $numeros[$i]['cubo'] . "<br>";
    }

  ?>
</body>
</html>