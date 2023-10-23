<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="post" action="">
    <label for="binario" >Introduzca un numero binario:</label>
    <input type="text" name="binario">
    <input type="submit" value="Calcular">
  </form>

  <?
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $binario = $_POST["binario"];
      $decimal = 0;
      $long = strlen($binario);

      for ($i = 0; $i < $long; $i++) {
        $digito = $binario[$long - $i - 1];
        if ($digito == '1') {
          $decimal += pow(2, $i);
        }
      }

      echo "El numero binario $binario en decimal es: $decimal";
    }
  ?>
</body>
</html>