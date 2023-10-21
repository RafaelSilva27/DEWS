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

    $cantidad = strlen(strval($num));
    echo "Tu numero tiene " . $cantidad . " digitos";
  ?>
</body>
</html>