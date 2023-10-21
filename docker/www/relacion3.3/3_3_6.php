<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?
    $diccionario = [
      "coche" => "car",
      "avion" => "plane",
      "camion" => "truck",
      "moto" => "bike",
      "manzana" => "apple",
      "pera" => "pear",
      "ventana" => "window",
      "puerta" => "door",
      "colegio" => "school",
      "gimnasio" => "gym",
      "bomba" => "book",
      "boligrafo" => "pencil",
      "fiesta" => "party",
      "arbol" => "tree",
      "roca" => "rock",
      "oro" => "gold",
      "plata" => "silver",
      "cobre" => "copper",
      "bicho" => "bug",
      "fuego" => "fire"
    ];
    
    echo "<h1>Diccionario</h1>";

    $i = 0;
    echo "<table><tr>";
    foreach ($diccionario as $pal => $sign) {
      if ($i % 2 == 0) {
        echo "</tr><tr>";
      }
      echo "<td>" . $pal . "</td>";
      $i++;
    }
    echo "</tr></table>";

    echo "
      <br>
      <form method = \"POST\">
        <label for = \"pal\">Palabra: <input type = \"text\" name = \"pal\" /></label>
        <input type = \"submit\" value = \"enviar \" />
      </form>
    ";

    if (isset($_POST["pal"])) {
      $pal = $_POST["pal"];

      $esta = false;

      foreach ($diccionario as $key => $val) {
        if ($key == $pal) {
          echo $val;
          $esta = true;
          break;
        }
      }
      
    }
    
  ?>
</body>
</html>