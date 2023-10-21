<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?
    $num = $_POST['num'];
    $primer = $num;

    if ($num < 0) {
      while ($primer < -9 || $primer > 9) {
        $primer /= 10;
      }
    } else {
      while ($primer > 9) {
        $primer /= 10;
      }
    }

    $primer = floor($primer);

    echo "La primera cifra de tu numero es: " . $primer;
  ?>
</body>
</html>