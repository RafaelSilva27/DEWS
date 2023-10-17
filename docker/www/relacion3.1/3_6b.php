<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $h = $_POST["h"];
    if ($h < 0) {
      echo "No se puede calcular";
    } else {
      echo $t = sqrt((2* $h)/ 9.81);
    }
  ?>
</body>
</html>