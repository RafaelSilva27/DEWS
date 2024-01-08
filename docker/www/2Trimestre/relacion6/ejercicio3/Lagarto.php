<?php
  require_once 'Mamifero.php';

  class Lagarto extends Animal {

    public function moverse() {
      return "Camina";
    }

    public function hacerSonido() {
      return "No hace sonido";
    }

    public function alimentarse() {
      return "Come insectos";
    }

  }
?>