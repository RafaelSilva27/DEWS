<?php

// MODELO DE TAREAS

include_once "model.php";

class Tarea extends Model
{


    public function __construct()
    {
        $this->table = "tarea";
        $this->idColumn = "id";
        parent::__construct();
    }

    public function getMaxId()
    {
        $result = $this->db->dataQuery("SELECT MAX(id) AS ultimoIdTarea FROM tarea");
        return $result[0]->ultimoIdTarea;
    }

    public function insertTareaConUsuario($titulo, $descripcion, $usuario) {
        $sqlInsertTarea = "INSERT INTO tarea (titulo, descripcion) VALUES ('$titulo', '$descripcion')";
        $resultInsertTarea = $this->db->dataManipulation($sqlInsertTarea);
    
        if ($resultInsertTarea) {
            $idTarea = $this->getMaxId();
    
            $idUsuario = $_SESSION['id_usuario'];  
    
            $sqlAsociarUsuario = "INSERT INTO usuarios_tarea (tarea, usuario) VALUES ($idTarea, $idUsuario)";
            $resultAsociarUsuario = $this->db->dataManipulation($sqlAsociarUsuario);
    
            if (!$resultAsociarUsuario) {
                echo "Error al insertar en usuarios_tarea: " . $this->db->getLastError();
            }
    
            return $resultAsociarUsuario;
        }
    
        return false;
    }
    
    
    public function update($idTarea, $titulo, $descripcion)
    {
        $sql = "UPDATE tarea SET
                titulo = '$titulo',
                descripcion = '$descripcion'
                WHERE id = '$idTarea'";
        return $this->db->dataManipulation($sql);
    }


    public function getTareasPorUsuario($usuario)
    {
        $sql = "SELECT tarea.* FROM tarea
                INNER JOIN usuarios_tarea ON tarea.id = usuarios_tarea.tarea
                INNER JOIN usuarios ON usuarios_tarea.usuario = usuarios.id
                WHERE usuarios.usuario = '$usuario'";
        return $this->db->dataQuery($sql);
    }

    public function deleteFromUsuariosTarea($idTarea)
    {
        $sqlDeleteUsuariosTarea = "DELETE FROM usuarios_tarea WHERE tarea = '$idTarea'";
        $resultDeleteUsuariosTarea = $this->db->dataManipulation($sqlDeleteUsuariosTarea);

        $resultDeleteTarea = $this->delete($idTarea);

        return $resultDeleteUsuariosTarea && $resultDeleteTarea;
    }

}
