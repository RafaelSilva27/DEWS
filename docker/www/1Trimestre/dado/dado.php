<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  $dado1 = rand(1,6);  
  $dado2 = rand(1,6);
  
  echo "<img src=\"img/" . $dado1 . ".svg\" />";
  echo "<img src=\"img/" . $dado2 . ".svg\" />";
  echo "<h1>Jugador 1 ha sacado =" . $dado1 + $dado2. "</h1>";

  $dado3 = rand(1,6);  
  $dado4 = rand(1,6);
  
  echo "<img src=\"img/" . $dado3 . ".svg\" />";
  echo "<img src=\"img/" . $dado4 . ".svg\" />";
  echo "<h1>Jugador 2 ha sacado =" . $dado3 + $dado4. "</h1>";
  
  ?>

</body>
</html>