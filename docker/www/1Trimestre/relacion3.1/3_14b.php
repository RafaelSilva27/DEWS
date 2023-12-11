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

  if ($num < 0) {
    $num *= -1;
  }

  $ultDigito = $num % 10;
  echo "La ultima cifra de tu numero es: " . $ultDigito;
  ?>
</body>
</html>