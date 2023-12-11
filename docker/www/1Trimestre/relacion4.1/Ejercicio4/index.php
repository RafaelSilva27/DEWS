<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Caja fuerte</title>
  </head>
  <body>

  <?php
    if (!isset($_REQUEST["numero"])) {
      if (!isset($_SESSION["aleatorio"])) {
        $_SESSION["intentos"] = 4;
        $_SESSION["aleatorio"] = rand(1,1000);
      }

      echo "<form action='index.php' method='get'>
        Adivina la combinacion de la caja fuerte:
        <input type='text' name='numero'><br>
        <br>				
        <input type='submit'>
        </form>";
    } else {
      $n = $_REQUEST['numero'];
      $aleatorio = $_SESSION['aleatorio'];

      echo "Tu número es: $n<br>";

      if ($n == $aleatorio) {
        echo "La caja fuerte se ha abierto";
        session_destroy();
      } else {
        $_SESSION['intentos']--;

        if ($_SESSION['intentos'] > 0) {
          echo "Intentos restantes: " . $_SESSION['intentos'];
        } else {
          echo "Has agotado los intentos";
          session_destroy();
        }
      }

      echo "<br><a href='index.php'>Sigue jugando...</a>";
    }
  ?>
  
  </body>
</html>