<?
/**
 * En esta página se encuentra el código de que comprueba que el usuario conectado es "test" y su password es "test".
 * Si el usuario es test/test se mostrará la página de contenido.php. En caso contrario se mostrará la de registro.php. 
 * 
 * Al recuperar la password automáticamente se le aplicará un cifrado sha512.
 * 
 * Autor: Nombre Apellidos
 * 
 */
  session_start();

  if (isset($_POST['usuario']) && $_POST['password']){
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    if ($usuario == 'test' && $password == 'test') {
      $_SESSION['usuario'] = $usuario;
      header("Location: contenido.php");
    } else {
      header("Location: registro.php");
    }
  } 

  include("./views/login.view.php");


?>

