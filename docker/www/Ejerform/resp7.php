<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  Base imponible: <?php echo $_GET['base']?><br>
  Impuestos: <?php echo $impusto =$_GET['base'] * 0.21 ?></br>
  Total de la factura: <?php echo $impusto + $_GET['base'] ?>
</body>
</html>