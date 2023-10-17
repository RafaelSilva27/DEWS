<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $num3 = $_POST["num3"];
    $num4 = $_POST["num4"];
    $array = [$num1 , $num2 , $num3 , $num4];
    $max = $num1;
    $min = $num1;

    for ($i = 0; $i < 4; $i++) {
      if ($array[$i] > $max) {
        $max = $array[$i];
      } elseif ($array[$i] < $min) {
          $min = $array[$i];
      }
      echo $array[$i] . " ";
    }

    echo "<br>Maximo: " . $max . " y minimo: " . $min

  ?>
</body>
</html>