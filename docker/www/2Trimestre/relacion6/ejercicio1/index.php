<?php
  require_once 'Persona.php';

  $persona = new Persona("Rafael", "Silva", 24);

  echo "Nombre: " . $persona->getNombre() . "<br>";
  echo "Apellidos: " . $persona->getApellido() . "<br>";
  echo "Edad: " . $persona->getEdad() . " años<br>";

  if ($persona->mayorEdad()) {
    echo "Es mayor de edad<br>";
  } else {
    echo "No es mayor de edad<br>";
  }

  echo "Nombre completo: " . $persona->nombreCompleto();
?>