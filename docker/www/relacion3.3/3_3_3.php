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
    $array2 = [];
    
    for ($i = 0; $i < 15; $i++) {
      $array[$i] = rand(0 , 100);
      echo $array[$i] .  " ";
    }

    for ($i = 0; $i < 15; $i++){
      $array2[$i+1] = $array[$i];
    }

    $array2[0] = end($array);

    // Mostrar el segundo array
    echo "<br><br>Array 2:<br>";
    foreach ($array2 as $value) {
      echo $value . " ";
    }
  ?>
</body>
</html>