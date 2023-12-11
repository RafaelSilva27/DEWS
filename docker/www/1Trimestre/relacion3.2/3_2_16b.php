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
    $primo = true;

    for ($i = 2; $i < $num; $i++) {
      if ($num % $i == 0) {
        $primo = false;
        break;
      }
    }

    if ($primo) {
      echo $num . " es primo";
    } else {
      echo $num . " no es primo";
    }
    
  ?>
</body>
</html>