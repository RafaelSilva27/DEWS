<?php

require_once 'Gato.php';
require_once 'Perro.php';
require_once 'Canario.php';
require_once 'Pinguino.php';
require_once 'Lagarto.php';


$gato = new Gato("Pelusa");
$perro = new Perro("Buddy");
$canario = new Canario("Piolín");
$pinguino = new Pinguino("Tux");
$lagarto = new Lagarto("Iguana");

echo "Gato <br>";
echo $gato->hacerSonido() . "<br>";
echo $gato->moverse() . "<br>";
echo $gato->alimentarse() . "<br>";

echo "<br>";

echo "Perro <br>";
echo $perro->hacerSonido() . "<br>";
echo $perro->moverse() . "<br>";
echo $perro->alimentarse() . "<br>";

echo "<br>";

echo "Canario <br>";
echo $canario->hacerSonido() . "<br>";
echo $canario->moverse() . "<br>";
echo $canario->alimentarse() . "<br>";
echo $canario->volar() . "<br>"; 


echo "<br>";

echo "Pinguino <br>";
echo $pinguino->hacerSonido() . "<br>";
echo $pinguino->moverse() . "<br>";
echo $pinguino->alimentarse() . "<br>";
echo $pinguino->volar() . "<br>"; 

echo "<br>";

echo "Lagarto <br>";
echo $lagarto->hacerSonido() . "<br>";
echo $lagarto->moverse() . "<br>";
echo $lagarto->alimentarse() . "<br>";

