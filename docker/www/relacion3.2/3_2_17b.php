<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?
    $num = $_POST["num"];
    $suma = 0;

    if ($num > 0) {
      for ($i = $num + 1; $i <= $num + 100; $i++) {
        $suma += $i;
      }
      echo "La suma de los 100 numeros sigientes a " . $num . " es: " . $suma;
    } else {
      echo "Valor incorrecto, introduce un numero positivo";
    }
  ?>  
</body>
</html>