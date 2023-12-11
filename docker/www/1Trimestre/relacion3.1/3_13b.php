<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?
    $num = $_POST["num"];

    if (($num % 2 == 0) && ($num % 5 == 0)) {
      echo "Numero " . $num ." es divisible entre 5 y entre 2";
    } elseif ($num % 2 == 0) {
      echo "Numero " . $num ." es divisible entre 2";
    } elseif ($num % 5 == 0){
      echo "Numero " . $num ." es divisible entre 5";
    } else {
      echo "Numero " . $num ." no es divisible entre 2 o 5";
    }
  ?>
</body>
</html>