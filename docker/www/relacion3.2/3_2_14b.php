<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?
    $base = $_POST["base"];
    $exp = $_POST["exp"];

    $pot = pow($base, $exp);

    echo "Base: " . $base . "<br> Exponente: " . $exp . "<br> Resultado de la potencia: " . $pot;

  ?>
</body>
</html>