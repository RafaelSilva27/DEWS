<?php
  require_once 'Estudiante.php';

  class EstudianteGraduado extends Estudiante {
    private $nivel;

    public function __construct($nombre, $edad, $curso, $notas, $nivel) {
      $this->nombre = $nombre;
      $this->edad = $edad;
      $this->curso = $curso;
      $this->notas = $notas;
      $this->nivel = $nivel;
    }

    public function getNombre() {
      return $this->nombre;
    }

    public function setNombre($nombre) {
      $this->nombre = $nombre;
    }

    public function getEdad() {
      return $this->edad;
    }

    public function setEdad($edad) {
      $this->edad = $edad;
    }

    public function getCurso() {
      return $this->curso;
    }

    public function setCurso($curso) {
      $this->curso = $curso;
    }

    public function getNotas() {
      return $this->notas;
    }

    public function setNotas($notas) {
      $this->notas = $notas;
    }

    public function getNivel() {
      return $this->nivel;
    }

    public function setNivel($nivel) {
      $this->nivel = $nivel;
    }
  }
  



    

?>