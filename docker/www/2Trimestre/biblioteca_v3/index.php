<?php
session_start();

include_once("TareaController.php");

if (!isset($_SESSION["id_usuario"]) && ($_REQUEST["action"] ?? "") !== "mostrarLogin" && ($_REQUEST["action"] ?? "") !== "iniciarSesion" && ($_REQUEST["action"] ?? "") !== "mostrarRegistro" && ($_REQUEST["action"] ?? "") !== "registrarUsuario") {
    header("Location: index.php?action=mostrarLogin");
    exit();
}


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
