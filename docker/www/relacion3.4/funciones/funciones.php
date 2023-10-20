<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      function esPrimo($n) { //Funcion para saber si un numero es primo
        $esPrimo = true;
        for ($i = 2; $i < $n; $i++) {
          if ($n % $i == 0) {
            $esPrimo = false;
          }
        }
        if (($n == 0) || ($n == 1)) {
          $esPrimo = false;
        }
        return $esPrimo;
      }

      function esCapicua($n) { //Funcion para saber si un numero es capicuo
        $numOriginal = $n;
        $numInvertido = 0;

        while ($n > 0) {
          $digito = $n % 10;
          $numInvertido = $numInvertido * 10 + $digito;
          $n = (int)($n / 10);
        }
        return $numOriginal == $numInvertido;
      }

      function siguientePrimo($n) { //Funcion para saber el siguiente numero primo 
        $primo = $n + 1;
        while (true) {
          if (esPrimo($primo)) {
            return $primo;
          }
          $primo++;
        }
      }

      function potencia($base , $exp){ //Funcion para calcular la potencia de un numero
        return pow($base, $exp);
      }

      function digitos($n) { //Funcion para contar el numero de digitos de un numero
        return strlen(strval($n));
      }

      function voltea($n) { //Funcion para darle la vuelta a un numero
        return intval(strrev(strval($n)));
      } 

      function digitoN($n , $pos) { //Funcion para devolver el digito que se encuentra en n posicion de un numero
        $numInvertido = strrev(strval($n));
        if ($pos < strlen($numInvertido)) {
          return intval($numInvertido[$pos]);
        }
        return null;
      } 

      function posicionDeDigito($n , $digito) { //Funcion para dar la posicion de la primera ocurrencia de un digito dentro de un numero entero
        $num = strval($n);
        $pos = strpos($num, strval($digito));
        if ($pos !== false) {
          return $pos;
        }
        return -1;
      }

      
    ?>
</body>
</html>