<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  Numero 1:  <?php echo $_GET['num1']?><br>
  Numero 2: <?php echo $_GET['num2']?><br>  
  Suma: <?php echo $resultado = $_GET['num1'] + $_GET['num2']?><br>
  Resta: <?php echo $resultado = $_GET['num1'] - $_GET['num2']?><br>
  Multiplicacion: <?php echo $resultado = $_GET['num1'] * $_GET['num2']?><br>
  Division: <?php echo $resultado = $_GET['num1'] / $_GET['num2']?>
</body>
</html>