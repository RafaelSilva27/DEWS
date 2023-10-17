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

    for ($i = 0; $i < 100; $i++){
      $array[$i] = rand(0, 20);
      echo $array[$i] .  " ";
    }
  ?>
  <form  method="post">
    <br>Introduce el primer valor <input type="number" name="num1">
    <br>Introduce el segundo valor <input type="number" name="num2">
    <input type="submit" value="Cambiar">
  </form> 
  
  <?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["num1"]) && isset($_POST["num2"])) {
      $num1 = intval($_POST["num1"]);
      $num2 = intval($_POST["num2"]);

      for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] === $num1) {
            $array[$i] = $num2;
        }
    }

    echo "<br>Números modificados: " . implode(' ', $array);


    }
  ?>
</body>
</html>
