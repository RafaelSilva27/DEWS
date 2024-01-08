<?php
  require_once 'Mamifero.php';

  class Perro extends Mamifero {

    public function moverse() {
      return "Camina";
    }

    public function hacerSonido() {
      return "Guau";
    }

    public function alimentarse() {
      return "Come carne";
    }

    public function pelear() {
      
    }
  }
?>