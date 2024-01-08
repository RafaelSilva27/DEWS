<?php
  abstract class Poligono {
    protected $tipo;
    protected $lado1;
    protected $lado2;

    public function __construct($tipo, $lado1, $lado2 = null) {
      $this->tipo = $tipo;
      $this->lado1 = $lado1;
      $this->lado2 = $lado2;
    }

    abstract public function calcularArea(); 
  }
?>