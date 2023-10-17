<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $dia = $_POST["dia"];
    $mes = $_POST["mes"];

    switch ($mes) {
      case 1:
        if ($dia < 20){
          echo "Capricornio";
        } else {
          echo "Acuario";
        }
        break;
      case 2:
        if ($dia < 19){
          echo "Acuario";
        } else {
          echo "Piscis";
        }
        break;
      case 3:
        if ($dia < 21){
          echo "Piscis";
        } else {
          echo "Aries";  
      }
        break;
      case 4:
        if ($dia < 20){
          echo "Aries";
        } else {
          echo "Tauro";  
        }
        break;
      case 5:
        if ($dia < 21){
          echo "Tauro";
        } else {
          echo "Geminis";  
        }
        break;
      case 6:
        if ($dia < 21){
          echo "Geminis";
          } else {
          echo "Cancer";  
        }
        break;
      case 7:
        if ($dia < 23){
          echo "Cancer";
        } else {
          echo "Leo";  
        }
        break;
      case 8:
        if ($dia < 23){
          echo "Leo";
        } else {
          echo "Virgo";  
        }
        break;
      case 9:
        if ($dia < 23){
          echo "Virgo";
        } else {
          echo "Libra";  
        }
        break;
      case 10:
        if ($dia < 23){
          echo "Libra";
        } else {
          echo "Escorpio";  
        }
        break;
      case 11:
        if ($dia < 22){
          echo "Escorpio";
        } else {
          echo "Sagitario";  
        }
        break;
      case 12:
        if ($dia < 22){
          echo "Sagitario";
        } else {
          echo "Capricornio";  
        }
        break;
    }


  ?>
</body>
</html>