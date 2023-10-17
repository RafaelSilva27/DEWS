<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php 
    $nota1 = $_POST["nota1"];
    $nota2 = $_POST["nota2"];
    $nota3 = $_POST["nota3"];

    echo "La media de tus notas es " . $media = (($nota1 + $nota2 + $nota3)/3) . "<br>";

    if ($media < 5) {
      echo "Calificacion: Insuficiente";
    } elseif ($media >= 5 && $media < 6) {
      echo "Calificacion: Suficiente";
    } elseif ($media >= 6 && $media < 7) {
      echo "Calificacion: Bien";
    } elseif ($media >= 6 && $media < 9) {
      echo "Calificacion: Notable";
    } elseif ($media >= 9 && $meidia <= 10) {
      echo "Calificacion: Sobresaliente";
    } else {
      echo "Calificacion incorrecta";
    }

  ?>
</body>
</html>