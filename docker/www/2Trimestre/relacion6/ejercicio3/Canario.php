<?php
  require_once 'Ave.php';

  class Canario extends Ave {

    public function moverse() {
      return "Camina";
    }
   
    public function hacerSonido() {
      return "Pio";
    }

    public function alimentarse() {
      return "Come alpiste";
    }

    public function volar() {
      return "Esta volando";
    }
  }
?>