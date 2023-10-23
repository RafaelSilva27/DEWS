<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="post" action="">
    <label for="num">Introduzca un numero:</label>
    <input type="number" name="num">
    <input type="submit" value="Enviar">
  </form>

  <?
    function esPrimo($n) { 
      $esPrimo = true;
      for ($i = 2; $i < $n; $i++) {
        if ($n % $i == 0) {
          $esPrimo = false;
        }
      }
      if (($n == 0) || ($n == 1)) {
        $esPrimo = false;
      }
      return $esPrimo;
    }
      

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      $num = $_POST["num"];

      if ($num < 1 || $num > 1000) {
        echo "Datos incorrectos";
        echo "
          <form method= \"post\" action=\"\">
            <label for=\"num\">Introduzca un numero:</label>
            <input type=\"number\" name=\"num\">
            <input type=\"submit\" value=\"Enviar\">
          </form>
        ";
      } else {
        echo "$num tiene estos numeros primos: <br>";
        for ($i = 1; $i <= $num; $i++) {
          if(esPrimo($i)) {
            echo "$i ";
          }
        }
      }
    }
  ?>

</body>
</html>