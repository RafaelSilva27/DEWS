<?php
  require_once 'Ave.php';

  class Pinguino extends Ave {

    public function moverse() {
      return "Camina";
    }
   
    public function hacerSonido() {
      return "Waa";
    }

    public function alimentarse() {
      return "Come pescado";
    }

    public function volar() {
      return "Esta volando";
    }
  }
  
?>