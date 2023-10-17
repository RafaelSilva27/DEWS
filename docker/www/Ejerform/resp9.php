<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  La formula del volumen del cono es: ((1/3) * 3.14 * (r * r) * h)<br>
  Radio: <?php echo $_GET['radio']?><br>
  Altura: <?php echo $_GET['alt']?><br>
  volumen: <?php echo $volumen= ((1/3) * 3.14 * ($_GET['radio'] * $_GET['radio']) * $_GET['alt'])?>
</body>
</html>