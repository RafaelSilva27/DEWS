<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
    include 'funciones/funciones.php';

    for ($i = 1; $i <= 99999; $i++) {
      if (esCapicua($i)) {
        echo $i . " ";
      }
    }
  ?>
</body>
</html>