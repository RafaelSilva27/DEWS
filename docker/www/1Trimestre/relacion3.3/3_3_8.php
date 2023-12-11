<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?
    $my_list = array(1, 9, 3, 8, 5, 7);

    foreach ($my_list as $n) {
      $doble = $n * 2;
      echo "El doble de " . $n ." es " . $doble  . "<br>";
    }
  ?>
</body>
</html>