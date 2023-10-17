<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  Esta semana has trabajado <?php echo $_GET['hora']?> 
  por lo que vas a cobrar <?php echo $cobro = $_GET['hora'] * 12?> euros
</body>
</html>