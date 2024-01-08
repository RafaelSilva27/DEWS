<?php
  require_once 'Triangulo.php';
  require_once 'Cuadrado.php';
  require_once 'Rectangulo.php';

  $triangulo = new Triangulo('triangulo', 5, 4);
  $cuadrado = new Cuadrado('cuadrado', 5);
  $rectangulo = new Rectangulo('rectangulo', 5, 4);

  echo "Area de un triangulo: " .$triangulo->calcularArea() . "<br>";
  echo "Area de un cuadrado: " .$cuadrado->calcularArea(). "<br>";
  echo "Area de un rectangulo: " .$rectangulo->calcularArea();


?>