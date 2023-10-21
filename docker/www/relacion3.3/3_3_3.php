<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $array = [];
    
    
    for ($i = 0; $i < 15; $i++) {
      $array[$i] = rand(0 , 100);
      echo $array[$i] .  " ";
    }

    for ($i = 0; $i < 15; $i++) {
      $aux = $array[$i];
      $array[$i] = $array[0];
      $array[0] = $aux;
    }

    echo "<br><br> Segundo array:<br>";

    for ($i = 0; $i < 15; $i++) {
      echo $array[$i] . " ";
    }

    
    
  ?>
</body>
</html>