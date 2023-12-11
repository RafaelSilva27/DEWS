<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  Base:  <?php echo $_GET['base']?><br>
  Altura: <?php echo $_GET['alt']?><br>  
  Area: <?php echo $resultado = $_GET['base'] * $_GET['alt']?><br>
</body>
</html>