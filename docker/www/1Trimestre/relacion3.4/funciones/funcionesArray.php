<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?
    function generaArrayInt($n, $min, $max) { //Funcion para generar un array
      $array = [];
      for ($i = 0; $i < $n; $i++) {
        $array[] = rand($min, $max);
      }
      return $array;
    }

    function minimoArrayInt($array) { //Funcion para devolver el minimo de un array
      $min = $array[0];
      for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] < $min) {
          $min = $array[$i];
        }
      }
      return $min;
    }

    function maximoArrayInt($array) { //Funcion para devolver el maximo de un array
      $max = $array[0];
      for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] > $max) {
          $max = $array[$i];
        }
      }
      return $max;
    }

    function mediaArrayInt($array) { //Funcion para devolver la media de un array
      $media = 0;
      for ($i = 0; $i < count($array); $i++) {
        $media += $array[$i];
      }
      return $media / count($array);
    }

    function estarEnArrayInt($array, $n) { //Funcion que te dice si esta o no un numero en el array
      for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] == $n) {
          return true;
        }
      }
      return false;
    }

    function posicionEnArray($array, $n) { //Funcion que busca un numero en el array y te dice su posicion
      for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] == $n) {
          return $i;
        }
      }
      return "No esta en el array";
    } 

    function volteaArrayInt($array) { //Funcion que le da la vuelta al array
      return array_reverse($array);
    }

    function rotaDerechaArrayInt($array, $n) { //Funcion para rotar para la derecha n posiciones de los numeros de un array
      $arrayRot = [];
      $count = count($array);

      if ($n >= $count) {
        $n = $n % $count;
      }

      for ($i = $count - $n; $i < $count; $i++) {
        $arrayRot[] = $array[$i];
      }

      for ($i = 0; $i < $count - $n; $i++) {
        $arrayRot[] = $array[$i];
      }

      return $arrayRot;
    }

    function rotaIzquierdaArrayInt($array, $n) { //Funcion para rotar para la izquierda n posiciones de los numeros de un array
      $arrayRot = [];
      $count = count($array);

      if ($n >= $count) {
        $n = $n % $count;
      }

      for ($i = $n; $i < $count; $i++) {
        $arrayRot[] = $array[$i];
      }

      for ($i = 0; $i < $n; $i++) {
        $arrayRot[] = $array[$i];
      }

      return $arrayRot;
    }
  ?>
</body>
</html>