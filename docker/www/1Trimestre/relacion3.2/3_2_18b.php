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

    if ($num1 == $num2) {
      echo "Los numeros son iguales";
    } else {
      $max = 0;
      $min = 0;

      if ($num1 > $num2) {
        $max = $num1;
        $min = $num2;
      } else {
        $max = $num2;
        $min = $num1;
      }

      for ($i = $min + 1; $i <= $max; $i += 7) {
        echo "$i, ";
      }
    }
  ?>
</body>
</html>