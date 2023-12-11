<?
  if (!isset($_COOKIE['usuario'])) {
    setcookie("usuario", "Rafa", time() + 60);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <?php
    if (isset($_COOKIE['usuario'])) {
      echo "El valor de la cookie 'usuario' es: " . $_COOKIE['usuario'];
    } else {
      echo "La cookie 'usuario' no está establecida.";
    }
  ?>

</body>
</html>