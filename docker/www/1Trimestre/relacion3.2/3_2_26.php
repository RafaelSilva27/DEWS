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
    <input type="number" name="num"><br>
    <label for="digito">Introduzca un digito:</label>
    <input type="number" name="digito"><br>
    <input type="submit" value="Buscar">
  </form>

  <?
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $num = $_POST["num"];
      $digito = $_POST["digito"];
      $numString = strval($num);
      $pos = [];

      for ($i = 0; $i < strlen($numString); $i++) {
        if ($numString[$i] == $digito) {
          $pos[] = $i + 1;
        }
      }

      if (count($pos) > 0) {
        echo "El digito $digito se encuentra en la(s) posicion(es): ";
        echo implode(", " , $pos);
      } else {
        echo "El digito $digito no se encuntra en $num";
      }
    } 

  ?>
</body>
</html>