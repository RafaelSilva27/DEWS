<?php

include_once("models/tarea.php");
include_once("models/Usuarios.php");
include_once("View.php");          // Plantilla de vista

class TareaController {
    private $db;             // Conexión con la base de datos
    private $tarea, $usuarios;// Modelos

    public function __construct() {
        $this->tarea = new Tarea();
        $this->usuarios = new Usuarios();

    }

    // --------------------------------- MOSTRAR LISTA DE LIBROS ----------------------------------------
    public function mostrarListaTareas() {
        $usuario = $_SESSION["usuario"]; 
        $data["listaTareas"] = $this->tarea->getTareasPorUsuario($usuario);
        View::render("tarea/all", $data);
    }

    // --------------------------------- FORMULARIO ALTA DE LIBROS ----------------------------------------

    public function formularioInsertarTareas() {
        $data["autoresLibro"] = array(); 
        View::render("tarea/form", $data);
    }

    // --------------------------------- INSERTAR LIBROS ----------------------------------------

    public function insertarTarea() {
        try {
            $titulo = $_REQUEST["titulo"];
            $descripcion = $_REQUEST["descripcion"];
            $idUsuario = $_SESSION["id_usuario"]; 
    
            $result = $this->tarea->insertTareaConUsuario($titulo, $descripcion, $idUsuario); 
    
            if ($result) {
                $data["listaTareas"] = $this->tarea->getTareasPorUsuario($idUsuario); 
                View::render("tarea/all", $data);
                exit(); 
            } else {
                echo "Error al insertar la tarea.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    
    

    // --------------------------------- BORRAR LIBROS ----------------------------------------

    public function borrarTarea() {
        if (!isset($_SESSION["id_usuario"])) { 
            echo "Error: No se ha iniciado sesión correctamente.";
            exit();
        }
        
        if (!isset($_REQUEST["id"])) {
            echo "Error: Falta el ID de la tarea a borrar.";
            exit();
        }
        $idTarea = $_REQUEST["id"];
        
        $result = $this->tarea->deleteFromUsuariosTarea($idTarea);
        
        if ($result) {
            $idUsuario = $_SESSION["id_usuario"];
            $data["listaTareas"] = $this->tarea->getTareasPorUsuario($idUsuario);
            View::render("tarea/all", $data);
        } else {
            echo "Error: No se pudo borrar la tarea.";
        }
    }

    // --------------------------------- FORMULARIO MODIFICAR LIBROS ----------------------------------------

    public function formularioModificarTarea() {
        $idTarea = $_REQUEST["id"];
        $data["tarea"] = $this->tarea->get($idTarea)[0];

        View::render("tarea/form",$data);
    }

    // --------------------------------- MODIFICAR LIBROS ----------------------------------------

    public function modificarTarea() {
        $idTarea = $_REQUEST["idTarea"];
        $titulo = $_REQUEST["titulo"];
        $descripcion = $_REQUEST["descripcion"];
        
        $result = $this->tarea->update($idTarea, $titulo, $descripcion);
        
        if ($result) {
            $idUsuario = $_SESSION["id_usuario"];
            $data["listaTareas"] = $this->tarea->getTareasPorUsuario($idUsuario);
            View::render("tarea/all", $data);
        } else {
            echo "Error: No se pudo modificar la tarea.";
        }
        exit();
    }
    


    public function iniciarSesion()
{
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $usuariosModel = new Usuarios();
    $usuarioValido = $usuariosModel->login($usuario, $password);

    if ($usuarioValido) {
        $idUsuario = $usuariosModel->getUserIdFromUsername($usuario);
        $_SESSION['id_usuario'] = $idUsuario;
        $this->mostrarListaTareasUsuario($idUsuario);
    } else {
        echo "Usuario o contraseña incorrectos";
        echo "<br><p><a href='index.php?action=mostrarLogin'>Volver</a></p>";
    }
}

public function mostrarListaTareasUsuario($idUsuario)
{
    $listaTareas = $this->tarea->getTareasPorUsuario($idUsuario); 
    View::render("tarea/all", ['listaTareas' => $listaTareas]);
}
    


public function registrarUsuario() {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $usuariosModel = new Usuarios();

    $registroExitoso = $usuariosModel->register($usuario, $password);

    if ($registroExitoso) {
        header("Location: index.php?action=mostrarLogin");
        exit();
    } else {
        echo "Error en el registro. Por favor, inténtalo de nuevo.";
    }
}

    public function cerrarSesion() {
        session_destroy();

        
        view::render("login");
        exit();
    }

    public function mostrarLogin() {
        view::render("login");
    }

    public function mostrarRegistro() {
        view::render("registro");
    }
} // class
