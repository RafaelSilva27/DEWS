<?php

class Persona {
    private $nombre;
    private $apellidos;
    private $edad;

    public function __construct($nombre, $apellidos, $edad) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
    }

    public function saludar() {
        echo "Hola<br>";
    }

    public function __toString() {
        return "Nombre: " . $this->nombre . "<br>" .
               "Apellidos: " . $this->apellidos . "<br>" .
               "Edad: " . $this->edad . " años";
    }
}
?>
