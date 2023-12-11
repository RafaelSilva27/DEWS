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

    for ($i = 1; $i < $exp; $i++) {
      $pot = 1;
      for ($j = 1; $j <= $i; $j++) {
        $pot *= $base;
      }
      echo $base . " elevado a " . " $i " . " es igual a: " . $pot . "<br>";
    }
  ?>  
</body>
</html>