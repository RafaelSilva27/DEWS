<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $hora = $_POST["hora"];
    $min = $_POST["min"];
  //segundos en un dia = 86400
    if ($hora >= 24 || $min >= 60) {
      echo "Datos incorrectos";
    } elseif ($hora <0 || $min < 0) {
      echo "Datos incorrectos";
    } else {
      
    }

  ?>
</body>
</html>
