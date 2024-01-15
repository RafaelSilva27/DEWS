<?php
  class Estudiante {
    private $nombre;
    private $edad;
    private $curso;

    private $notas;

    public function __construct($nombre, $edad, $curso, $notas) {
      $this->nombre = $nombre;
      $this->edad = $edad;
      $this->curso = $curso;
      $this->notas = $notas;
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

    public function agregarNota($nota) {
      $this->notas[] = $nota;
  }

  public function obtenerMedia() {
      if (empty($this->notas)) {
          return 0;
      }
      return array_sum($this->notas) / count($this->notas);
  }

  }
?>