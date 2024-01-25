<?php
  class Tarea {
    private $id;
    private $titulo;
    private $descripcion;

    public function __construct($id, $titulo, $descripcion) {
      $this->id = $id;
      $this->titulo = $titulo;
      $this->descripcion = $descripcion;
    }

    public function getId() {
      return $this->id;
    }

    public function setId($id) {
      $this->id = $id;
    }

    public function getTitulo() {
      return $this->titulo;
    }

    public function setTitulo($titulo) {
      $this->titulo = $titulo;
    }

    public function getDescripcion() {
      return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
      $this->descripcion = $descripcion;
    }

  }
?>