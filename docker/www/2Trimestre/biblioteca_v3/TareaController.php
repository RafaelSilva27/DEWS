<?php
include_once("models/tarea.php");  // Modelos
include_once("models/persona.php");
include_once("View.php");          // Plantilla de vista

class TareaController {
        private $db;             // Conexión con la base de datos
        private $tarea, $persona;// Modelos

        public function __construct() {
            $this->tarea = new Tarea();
            $this->persona = new Persona();
        }

        // --------------------------------- MOSTRAR LISTA DE LIBROS ----------------------------------------
        public function mostrarListaTareas() {
            $data["listaTareas"] = $this->tarea->getAll();
            View::render("tarea/all", $data);
        }

        // --------------------------------- FORMULARIO ALTA DE LIBROS ----------------------------------------

        public function formularioInsertarTareas() {
             //$data["todosLosAutores"] = $this->persona->getAll();
             $data["autoresLibro"] = array();  // Array vacío (el libro aún no tiene autores asignados)
        View::render("tarea/form", $data);
        }

        // --------------------------------- INSERTAR LIBROS ----------------------------------------

        public function insertarTarea() {
            // Primero, recuperamos todos los datos del formulario
            //$idTarea = $_REQUEST["id"];
            $titulo = $_REQUEST["titulo"];
            $descripcion = $_REQUEST["descripcion"];
            // $ano = $_REQUEST["ano"];
            // $numPaginas = $_REQUEST["numPaginas"];
            // $autores = $_REQUEST["autor"];            

            $result = $this->tarea->insert($titulo, $descripcion);
            if ($result == 1) {
                // Si la inserción del libro ha funcionado, continuamos insertando los autores, pero
                // necesitamos conocer el id del libro que acabamos de insertar
                $idTarea = $this->tarea->getMaxId();
                // Ya podemos insertar todos los autores junto con el libro en "escriben"
                //$result = $this->tarea->insertAutores($idTarea);
                
            } 
            $data["listaTareas"] = $this->tarea->getAll();
            View::render("tarea/all", $data);

        }

        // --------------------------------- BORRAR LIBROS ----------------------------------------

          public function borrarTarea() {
            // Recuperamos el id del libro que hay que borrar
            $idTarea = $_REQUEST["id"];
            // Pedimos al modelo que intente borrar el libro
            $result = $this->tarea->delete($idTarea);
 
            $data["listaTareas"] = $this->tarea->getAll();
            View::render("tarea/all", $data);

        }

        // --------------------------------- FORMULARIO MODIFICAR LIBROS ----------------------------------------

        public function formularioModificarTarea() {
            // Recuperamos los datos del libro a modificar
            $idTarea = $_REQUEST["id"];
            $data["tarea"] = $this->tarea->get($idTarea)[0];
            // Renderizamos la vista de inserción de libros, pero enviándole los datos del libro recuperado.
            // Esa vista necesitará la lista de todos los autores y, además, la lista
            // de los autores de este libro en concreto.
            //$data["todosLosAutores"] = $this->persona->getAll();
            //$data["autoresLibro"] = $this->persona->getAutores($_REQUEST["idLibro"]);
            View::render("tarea/form",$data);
        }

        // --------------------------------- MODIFICAR LIBROS ----------------------------------------

        public function modificarTarea() {
            // Primero, recuperamos todos los datos del formulario
            $idTarea = $_REQUEST["idTarea"];
            $titulo = $_REQUEST["titulo"];
            $descripcion = $_REQUEST["descripcion"];
            // $pais = $_REQUEST["pais"];
            // $ano = htmlspecialchars($_REQUEST["ano"]);
            // $numPaginas = $_REQUEST["numPaginas"];
            // $autores = $_REQUEST["autor"];

            // Pedimos al modelo que haga el update
            $result = $this->tarea->update($idTarea, $titulo, $descripcion);
           
            // Eliminamos todos los autores asociados con el libro en "escriben"
            //$result = $this->libro->deleteAutores($idLibro);
           
            // Ya podemos insertar todos los autores junto con el libro en "escriben"
            //$result = $this->libro->insertAutores($idLibro, $autores);
                
            
            $data["listaTareas"] = $this->tarea->getAll();
            View::render("tarea/all", $data);
        }

        // --------------------------------- BUSCAR LIBROS ----------------------------------------

        public function buscarLibros() {
            // Recuperamos el texto de búsqueda de la variable de formulario
            $textoBusqueda = $_REQUEST["textoBusqueda"];
            // Buscamos los libros que coinciden con la búsqueda
            $data["listaLibros"] = $this->libro->search($textoBusqueda);
            // Mostramos el resultado en la misma vista que la lista completa de libros
            View::render("libro/all", $data);
        }

        // --------------------------------- MOSTRAR LISTA DE AUTORES ----------------------------------------
        public function mostrarListaAutores() {
            $data["listaPersonas"] =  $this->persona->getAll();
            View::render("persona/all",$data);
        }   
        public function formularioInsertarPersonas() {
            View::render("persona/form");
        }

        public function insertarPersona() {
            // Primero, recuperamos todos los datos del formulario
            $nombre = $_REQUEST["nombre"];
            $apellidos = $_REQUEST["apellidos"];          

            $result = $this->persona->insert($nombre, $apellidos);
           
            $data["listaPersonas"] = $this->persona->getAll();
            View::render("persona/all", $data);

        }

        public function borrarPersona() {
            // Recuperamos el id de la persona que hay que borrar
            $idPersona = $_REQUEST["idPersona"];
            // Pedimos al modelo que intente borrar el libro
            $result = $this->persona->delete($idPersona);
 
            $data["listaPersonas"] = $this->persona->getAll();
            View::render("persona/all", $data);

        }
    } // class