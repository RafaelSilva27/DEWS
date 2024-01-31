<?php
session_start();

include_once("TareaController.php");

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
    $listaTareas = new TareaController();

    if ($action === "cerrarSesion") {
        $listaTareas->cerrarSesion();
    } else {
        $listaTareas->$action();
    }
} else {
    $action = "mostrarLogin";
    $listaTareas = new TareaController();
    $listaTareas->$action();
}