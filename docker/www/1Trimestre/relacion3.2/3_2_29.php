<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="post" action="">
    <label for="num1">Ingrese el primer numero: </label>
    <input type="number" name="num1"><br>
    <label for="num2">Ingrese el segundo numero: </label>
    <input type="number" name="num2"><br>
    <input type="submit" value="Enviar">
  </form>

  <?
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $num1 = $_POST["num1"];
      $num2 = $_POST["num2"];

      if ($num1 > 0 && $num2 > 0) {
        echo "Numeros enteros positivos menores a $num1 y no divisibles por $num2: <br>";

        for ($i = 1; $i < $num1; $i++){
          if ($i % $num2 != 0) {
            echo $i . " ";
          }
        }
      } else {
        echo "Datos incorrectos";
      }
    }
  ?>
</body>
</html>