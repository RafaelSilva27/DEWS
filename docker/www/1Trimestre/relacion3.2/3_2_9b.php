<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $num = $_POST["num"];
    $cont = 0;
    do {
      $num = round($num /10);
      $cont++;
    } while ($num != 0);
    echo "Contador: " . $cont;
      
  ?>
</body>
</html>