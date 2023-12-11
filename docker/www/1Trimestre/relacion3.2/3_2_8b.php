<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $num = $_POST["num"];
    echo "<table border='1'";
    for ($i = 1; $i <= 10; $i++){
      echo "<tr><td>$num</td><td>x</td><td>$i</td><td>=</td><td>" . ($num * $i) . "</td></tr>";
    }
    echo "</table>";
  ?>
</body>
</html>