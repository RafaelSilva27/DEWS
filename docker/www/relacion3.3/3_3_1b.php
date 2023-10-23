<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $array = array(
      "numero" => array(),
      "cuadrado" => array(),
      "cubota" => array()
    );

    for ($i = 0; $i < 20; $i++) {
      $array["numero"][$i] = rand(0, 100);
      $array["cuadrado"][$i] = $array["numero"][$i] * $array["numero"][$i];
      $array["cubo"]["$i"] = $array["numero"][$i] * $array["numero"][$i] * $array["numero"][$i];

      echo $array["numero"][$i] . " ";
      echo $array["cuadrado"]["$i"] . " ";
      echo $array["cubo"][$i] .  "<br>";
    }
  ?>
</body>
</html>