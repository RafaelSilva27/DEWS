<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?
    $dias = [
      "Lunes1" => "DWEC",
      "Martes1" => "DWEC",
      "Miercoles1" => "DWES",
      "Jueves1" => "DEWS",
      "Viernes1" => "DIW",
      "Lunes2" => "DWEC",
      "Martes2" => "DWEC",
      "Miercoles2" => "DWES",
      "Jueves2" => "DEWS",
      "Viernes2" => "DIW",
      "Lunes3" => "DWEC",
      "Martes3" => "DWEC",
      "Miercoles3" => "DIW",
      "Jueves3" => "DEWS",
      "Viernes3" => "DIW",
      "Lunes4" => "DWES",
      "Martes4" => "DAW",
      "Miercoles4" => "DIW",
      "Jueves4" => "EMPRESA",
      "Viernes4" => "HLC",
      "Lunes5" => "DWES",
      "Martes5" => "DAW",
      "Miercoles5" => "DIW",
      "Jueves5" => "EMPRESA",
      "Viernes5" => "HLC",
      "Lunes6" => "DWES",
      "Martes6" => "DAW",
      "Miercoles6" => "EMPRESA",
      "Jueves6" => "EMPRESA",
      "Viernes6" => "HLC",
    ];

    echo "<h1>Horario</h1>";

    $i = 0;
    echo "<table border = 2px><tr>";
    foreach ($dias as $horas => $asignatura) {
      if ($i % 5 == 0) {
        echo "</tr><tr>";
      }
      echo "<td>" . $asignatura . "</td>";
      $i++;
    }
    echo "</tr></table";
  ?>
</body>
</html>