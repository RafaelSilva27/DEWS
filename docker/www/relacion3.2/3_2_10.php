<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 10</title>
    </head>
    <body>
      <?
        $contador = isset($_POST["contador"]) ? $_POST["contador"] : 0;
        $media = isset($_POST["media"]) ? $_POST["media"] : 0;
        $sumaPositivos = isset($_POST["sumaPositivos"]) ? $_POST["sumaPositivos"] : 0;

        if ($_SERVER["REQUEST_METHOD"] === "POST") { 
          if (isset($_POST["numero"])) {
            $numero = $_POST["numero"];

            if ($numero >= 0) {
              $contador += 1;
              $sumaPositivos += $numero;
              $media = $sumaPositivos / $contador;

              echo "
                <form method = \"post\">
                  <input type = \"hidden\" name = \"contador\" value = \"$contador\" /> <!-- se envía el formulario con el valor actual de \"$contador\" -->
                  <input type = \"hidden\" name = \"media\" value = \"$media\" /> <!-- se envía el formulario con el valor actual de \"$media\" -->
                  <input type = \"hidden\" name = \"sumaPositivos\" value = \"$sumaPositivos\" /> <!-- se envía el formulario con el valor actual de \"$sumaPositivos\" -->
                  <label for = \"numero\">Número <input name = \"numero\" type = \"number\" required /></label>
                  <br /><br />
                  <input type = \"submit\" value = \"submit\" />
                </form>
              ";
            } else {
              if ($contador > 0) {
                echo "Total de la media de los números positivos introducidos: $media";
              } else {
                echo "No se han introducido números positivos";
              }
            }
          }
        } else {
          echo "
            <form method = \"post\">
              <input type = \"hidden\" name = \"contador\" value = \"$contador\" />
              <input type = \"hidden\" name = \"media\" value = \"$media\" />
              <input type = \"hidden\" name = \"sumaPositivos\" value = \"$sumaPositivos\" />
              <label for = \"numero\">Número <input name = \"numero\" type = \"number\" required /></label>
              <br /><br />
              <input type = \"submit\" value = \"submit\" />
            </form>
          ";
        }

        echo "
          <form method = \"get\">
            <input type = \"hidden\" name = \"contador\" value = \"<?= $contador = 0 ?>\" />
            <input type = \"hidden\" name = \"media\" value = \"<?= $media = 0 ?>\" />
            <input type = \"hidden\" name = \"sumaPositivos\" value = \"<?= $sumaPositivos = 0 ?>\" />
            <br />
            <input type = \"submit\" value = \"reset\" />
          </form>
        ";
      ?>
    </body>
  </html>