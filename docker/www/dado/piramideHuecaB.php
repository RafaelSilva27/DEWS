<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $alt = $_POST["alt"];
    $simb = $_POST["simb"];

    if ($alt > 0) {
      for ($i = $alt; $i >= 1; $i--) {
        for ($j = 1; $j <= $alt - $i; $j++) {
          echo "&nbsp;&nbsp;";
        }
        for ($j = 1; $j <= 2 * $i - 1; $j++) {
          if ($j == 1 || $j == 2 * $i - 1 || $i == $alt) {
            echo $simb;
          } else {
            echo "&nbsp;&nbsp;";
          }
        }
        echo "<br>";
      }
    } else {
      echo "Datos incorrectos";
    }
  ?>
</body>
</html>
