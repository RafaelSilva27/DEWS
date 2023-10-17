<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $num3 = $_POST["num3"];
    $num4 = $_POST["num4"];
    $num5 = $_POST["num5"];
    $num6 = $_POST["num6"];
    $num7 = $_POST["num7"];
    $num8 = $_POST["num8"];
    $num9 = $_POST["num9"];
    $num10 = $_POST["num10"];

    $pos  = 0;
    $neg = 0;

    if ($num1 < 0) {
      $neg++;
    } else {
      $pos++;
    }

  ?>
</body>
</html>