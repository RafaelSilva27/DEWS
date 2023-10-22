<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?
    $numIntro = isset($_POST["num"]) ? $_POST["num"] : 0;

    $total = isset($_POST["total"]) ? $_POST["total"] : 0;
    $cont = isset($_POST["cont"]) ? $_POST["cont"] : 0; 
    $media = isset($_POST["media"]) ? $_POST["media"] : 0; 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $total += $numIntro;
      $cont++;
      $media = $total / $cont;

      if ($total > 10000) {
        echo "
          <p>total acumulado: $total</p>
          <p>contador de numeros introducidos: $cont</p>
          <p>media de los numeros introducidos: $media</p>
        ";
      } else {
        echo "
          <form method = \"post\">
            <label for = \"num\">Numero: <input type = \"number\" name = \"num\" required /></label>
            <input type = \"hidden\" name = \"total\" value = \"$total\" />
            <input type = \"hidden\" name = \"cont\" value = \"$cont\" />
            <input type = \"hidden\" name = \"media\" value = \"$media\" />
            <input type = \"submit\" value = \"Enviar\" />
          </form>
        ";
      }
    } else {
      echo "
          <form method = \"post\">
            <label for = \"num\">Numero: <input type = \"number\" name = \"num\" required /></label>
            <input type = \"hidden\" name = \"total\" value = \"$total\" />
            <input type = \"hidden\" name = \"cont\" value = \"$cont\" />
            <input type = \"hidden\" name = \"media\" value = \"$media\" />
            <input type = \"submit\" value = \"Enviar\" />
          </form>
        ";
    }
 
  ?>
</body>
</html>