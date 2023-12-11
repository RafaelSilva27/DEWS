<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?
    echo "Numeros primos entre 2 y 100: <br>";

    for ($num = 2; $num <= 100; $num++) {
      $primo = true;

      for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0) {
          $primo = false;
          break;
        }
      }

      if ($primo) {
        echo $num . " ";
      }
    }
  ?>
</body>
</html>