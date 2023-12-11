<?php
  class Persona {
    private $nombre;
    private $apellido;
    private $edad;

    public function __construct($nombre, $apellido, $edad) {
      $this->nombre = $nombre;
      $this->apellido = $apellido;
      $this->edad = $edad;
    }

    public function saludar() {
      echo "Hola<br>";
    }

    public function __toString() {
      return "Nombre: " . $this->nombre . "<br>" . 
             "Apellidos: " . $this->apellido . "<br>" .
             "Edad: " . $this->edad . " años<br>"; 
    }
  }

  $persona = new Persona("Rafael", "Silva", 24);

  $persona->saludar();

  echo $persona;
?>