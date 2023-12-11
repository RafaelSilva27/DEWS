<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php 
    $a = $_POST["a"];
    $b = $_POST["b"];
    $c = $_POST["c"];
    
    $raiz = ($b * $b - (4 * $a * $c));

    if ($raiz > 0) {
      $x1 = (-$b + sqrt($raiz)) / (2 * $a);
      $x2 = (-$b - sqrt($raiz)) / (2 * $a);
      echo "La soluciones son x1: " . $x1 . " y x2: " . $x2; 
    } elseif ($raiz == 0) {
      $x = -$b / (2 * $a);
      echo "La solucion doble de x: " . $x;
    } else {
      echo "La ecucacion no tiene soluciones reales";
    }
  ?>
</body>
</html>