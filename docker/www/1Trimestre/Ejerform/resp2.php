<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  Euros introducidos: <?php echo $_GET['euros']?><br>
  Conversion: <?php echo $dollar = $_GET['euros'] * 1.06 ?>
</body>
</html>