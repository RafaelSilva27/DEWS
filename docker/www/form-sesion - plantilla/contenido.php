<?
/**
 * En esta página se encuentra el código necesario para consultar si hay un usuario en la sesión y en ese caso se mostrará el contenido para usuarios conectados. 
 * Si no hay usuario en la sesión se mostrará el login.
 * 
 * Autor: Nombre Apellidos
 * 
 */

  session_start();

  if (isset($_SESSION['usuario'])) {
    header("Location: ./views/contenido.view.php");
  } else {
    header("Location: ./views/login.view.php");
  }

?>