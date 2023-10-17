<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  5 primeros numeros de la serie de Fibonacci <br>
  <?php
    $n = $_POST["n"];
    $a = 0;
    $b = 1;

    for ($i = 1; $i <= $n; $i++) {
      echo $a;
      if ($i < $n) {
        echo ", ";
      }
      $c = $a + $b;
      $a = $b;
      $b = $c;
    }

  ?>
</body>
</html>