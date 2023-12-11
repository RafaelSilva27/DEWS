<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $num3 = $_POST["num3"];

    echo "Números originales: $num1, $num2, $num3<br>";

    if ($num1 > $num2) {
      $mayor = $num1;
      $num1 = $num2;
      $num2 = $mayor;
    }

    if ($num2 > $num3) {
      $mayor = $num2;
      $num2 = $num3;
      $num3 = $mayor;
    }

    if ($num1 > $num2) {
      $mayor = $num1;
      $num1 = $num2;
      $num2 = $mayor;
    }

    echo "Números ordenados de menor a mayor: $num1, $num2, $num3";

  ?>
</body>
</html>