<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?
    $array = [];

    if (isset($_POST["array"])) {
      $array = explode(',' , $_POST["array"]);
    } else {
      for ($i = 0; $i < 100; $i++) {
        $array[$i] = rand(0 , 20);
      }
    }

    echo "<table>";
    for ($i = 0; $i < 100; $i++) {
      echo "<td>" . $array[$i] . "</td>";
      if (($i + 1) % 10 == 0) {
        echo "</tr><tr>";
      }
    }
    echo "</tr></table>";

    echo "
      <br><br>
      <form method='post'>
        <input type=\"hidden\" name=\"array\" value= \"" .implode(', ', $array) . "\">
        <label for=\"num1\">Numero 1: <input type = \"number\" name = \"num1\" /></label><br>
        <label for=\"num2\">Numero 2: <input type = \"number\" name = \"num2\" /></label><br>
        <input type=\"submit\" value=\"Enviar\" />
      </form>
    ";

    if (isset($_POST["num1"]) && ($_POST["num2"])) {
      $num1 = $_POST["num1"];
      $num2 = $_POST["num2"];

      
      for ($i = 0; $i < 100; $i++) {
        if ($array[$i] == $num1) {
          $array[$i] = $num2;
        }
      }
    }

    echo "<br><br>Array modificado:<br>";
    echo "<table>";
    for ($i = 0; $i < 100; $i++) {
      echo "<td>" . $array[$i] . "</td>";
      if (($i + 1) % 10 == 0) {
        echo "</tr><tr>";
      }
    }
    echo "</tr></table>";

  ?>
</body> 
</html>
