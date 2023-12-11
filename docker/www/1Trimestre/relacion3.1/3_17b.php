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
    $numInver = strrev($num);

    if ($numInver == $num) {
      echo "Tu numero es capicuo";
    } else {
      echo "Tu numero no es capicuo";
    }
  ?>
</body>
</html>