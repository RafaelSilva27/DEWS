<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  $num = $_GET['num'];
    if ($num == 1) {
      echo "Tu dia es el lunes";
    } elseif ($num == 2) {
      echo "Tu dia es el martes";
    } elseif ($num == 3) {
      echo "Tu dia es el miercoles";
    } elseif ($num == 4) {
      echo "Tu dia es el jueves";
    } elseif ($num == 5) {
      echo "Tu dia es el viernes";
    } elseif ($num == 6) {
      echo "Tu dia es el sabado";
    } elseif ($num == 7) {
      echo "Tu dia es el domingo";
    }
  ?>
</body>
</html>