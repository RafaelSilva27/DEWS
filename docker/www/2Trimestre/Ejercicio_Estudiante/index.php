<?php
  require_once 'Estudiante.php';
  require_once 'EstudianteGraduado.php';


  $estudiante1 = new Estudiante('Pepe', 20, '2º', []);
  $estudiante2 = new Estudiante('Maria', 21, '1º', []);

  $estudiante1->agregarNota(5);
  $estudiante1->agregarNota(4);
  $estudiante1->agregarNota(3);
  $estudiante2->agregarNota(6);
  $estudiante2->agregarNota(7);
  $estudiante2->agregarNota(9);

  echo  "El primer estudiante se llama " . " " . $estudiante1->getNombre() . " " . "tiene " . " " . $estudiante1->getEdad() . " " . "años va al curso " . $estudiante1->getCurso() . " y su nota media es " . " " . $estudiante1->obtenerMedia();
  echo "<br>";
  echo  "El segundo estudiante se llama " . " " . $estudiante2->getNombre() . " " . "tiene " . " " . $estudiante2->getEdad() . " " . "años va al curso " . $estudiante2->getCurso() . " y su nota media es " . " " . $estudiante2->obtenerMedia();
  echo "<br>";

  $estudianteGraduado1 = new EstudianteGraduado('Juan', 26, '4º', [], 'doctorado');
  $estudianteGraduado2 = new EstudianteGraduado('Laura', 27, '4º', [], 'posgrado');


  $estudianteGraduado1->agregarNota(5);
  $estudianteGraduado1->agregarNota(5);
  $estudianteGraduado1->agregarNota(5);
  $estudianteGraduado2->agregarNota(10);
  $estudianteGraduado2->agregarNota(10);
  $estudianteGraduado2->agregarNota(6);


  echo  "El primer estudiante graduado se llama " . " " . $estudianteGraduado1->getNombre() . " " . "tiene " . " " . $estudianteGraduado1->getEdad() . " " . "años va al curso " . $estudianteGraduado1->getCurso() . " tiene un nivel de " .$estudianteGraduado1->getNivel() .  " y su nota media es " . " " . $estudianteGraduado1->obtenerMedia();
  echo "<br>";
  echo  "El segundo estudiante graduado se llama " . " " . $estudianteGraduado2->getNombre() . " " . "tiene " . " " . $estudianteGraduado2->getEdad() . " " . "años va al curso " . $estudianteGraduado2->getCurso() . " tiene un nivel de " .$estudianteGraduado2->getNivel() .  " y su nota media es " . " " . $estudianteGraduado2->obtenerMedia();


?>