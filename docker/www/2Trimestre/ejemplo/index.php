<?php

// Incluir la clase Persona
require_once 'Persona.php';

// Crear una instancia de Persona
$persona = new Persona("Rafael", "Silva", 24);

// Llamar a la función saludar
$persona->saludar();

// Imprimir la información de la persona usando __toString()
echo $persona;
?>
