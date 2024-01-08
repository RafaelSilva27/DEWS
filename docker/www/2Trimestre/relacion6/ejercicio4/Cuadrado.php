<?php
  require_once 'Poligono.php';

  class Cuadrado extends Poligono {
    public function calcularArea() {
      return ($this->lado1 * $this->lado1);
    }
  }
?>