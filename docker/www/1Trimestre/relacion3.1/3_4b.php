<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  $hora = $_GET["hora"];
  if ($hora < 41) {
    echo $total = $hora * 12;
  } elseif ($hora >= 41) {
    $dif = $hora - 40;
    echo $total = ($dif * 16) + 480;
  }
  ?>
</body>
</html>