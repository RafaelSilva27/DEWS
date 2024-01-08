<?php
  require_once 'Mamifero.php';

  class Gato extends Mamifero {

    public function moverse() {
      return "Camina";
    }

    public function hacerSonido() {
      return "Miau";
    }

    public function alimentarse() {
      return "Come sardina";
    }

    public function pelear() {
      
    }
  }
?>