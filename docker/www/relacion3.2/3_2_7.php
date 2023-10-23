<!DOCTYPE html>
  <html lang = "en">
    <head>
      <meta charset = "utf-8" />
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0" />
      <title>ejercicio 7</title>
    </head>
    <body>
      <?
        $intentosRestantes = isset($_POST["intentosRestantes"]) ? $_POST["intentosRestantes"] : 4;

        $clave = isset($_POST["clave"]) ? $_POST["clave"] : rand(1000, 9999); 


        if ($_SERVER["REQUEST_METHOD"] === "POST") { 
          if (isset($_POST["combinacion"])) {
            $combinacion = $_POST["combinacion"];

            if ($combinacion == $clave) {
              echo "La combinación es correcta";
            } else {
              $intentosRestantes -= 1;

              if ($intentosRestantes > 0) {
                echo "
                  <form method = \"post\">
                    <input type = \"hidden\" name = \"intentosRestantes\" value = \"$intentosRestantes\" />
                    <label for = \"combinacion\">Combinación <input name = \"combinacion\" type = \"number\" min = \"1000\" max = \"9999\" required /></label>
                    <br /><br />
                    <input type = \"submit\" value = \"submit\" />
                  </form>
                ";

                echo "<br />La combinación es incorrecta, intentos restantes: $intentosRestantes";
              } else {
                echo "La combinación es incorrecta, no se ha podido abrir la caja fuerte";
              }
            }
          }
        } else {
          echo "
            <form method = \"post\">
              <input type = \"hidden\" name = \"intentosRestantes\" value = \"$intentosRestantes\" />
              <label for = \"combinacion\">Combinación <input name = \"combinacion\" type = \"number\" min = \"1000\" max = \"9999\" required /></label>
              <br /><br />
              <input type = \"submit\" value = \"submit\" />
            </form>
          ";
        }

        echo "
          <form method = \"get\">
            <input type = \"hidden\" name = \"intentosRestantes\" value = \"<?= $intentosRestantes = 4 ?>\" />
            <br />
            <input type = \"submit\" value = \"reset\" />
          </form>
        ";
      ?>
    </body>
  </html>