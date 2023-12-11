<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?
    $num = isset($_POST['num']) ? $_POST['num'] : 0;

    $cont = isset($_POST['cont']) ? $_POST['cont'] : 0;
    $contIm = isset($_POST['contIm']) ? $_POST['contIm'] : 0;
    $sumaIm = isset($_POST['sumaIm']) ? $_POST['sumaIm'] : 0;
    $mediaIm = isset($_POST['mediaIm']) ? $_POST['mediaIm'] : 0;
    $maxPar = isset($_POST['maxPar']) ? $_POST['maxPar'] : 0;
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if ($num > 0) {
        $cont++;

        if ($num % 2 != 0) {
          $contIm++;
          $sumaIm += $num;
          $mediaIm = $sumaIm / $contIm;
        }

        if ($num > $maxPar) {
          $maxPar = $num;
        }

        echo "
          <form method = \"post\">
            <label for = \"num\">Numero: <input type = \"number\" name = \"num\"</label>
            <input type = \"hidden\" name = \"cont\" value = \"$cont\" />
            <input type = \"hidden\" name = \"contIm\" value = \"$contIm\" />
            <input type = \"hidden\" name = \"sumaIm\" value = \"$sumaIm\" />
            <input type = \"hidden\" name = \"mediaIm\" value = \"$mediaIm\" />
            <input type = \"hidden\" name = \"maxPar\" value = \"$maxPar\" />
            <input type = \"submit\" value = \"Enviar\"/>
          </form>
        ";
      } else {
        if ($cont > 0) {
          echo "
            Numeros totales : $cont <br>
            Media de los impares : $mediaIm <br>
            Mayor de los pares: $maxPar 
          ";
        }
      }
    } else {
      echo "
          <form method = \"post\">
            <label for = \"num\">Numero: <input type = \"number\" name = \"num\"</label>
            <input type = \"hidden\" name = \"cont\" value = \"$cont\" />
            <input type = \"hidden\" name = \"contIm\" value = \"$contIm\" />
            <input type = \"hidden\" name = \"sumaIm\" value = \"$sumaIm\" />
            <input type = \"hidden\" name = \"mediaIm\" value = \"$mediaIm\" />
            <input type = \"hidden\" name = \"maxPar\" value = \"$maxPar\" />
            <input type = \"submit\" value = \"Enviar\"/>
          </form>
        ";  
    }
  ?>
</body>
</html>