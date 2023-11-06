<?

if(isset($_POST['usuario']) && isset($_POST['password'])
&& isset($_POST['password2'])){

    $usuario = strtolower($_POST['usuario']);
    $password = hash('sha512',$_POST['password']);
    $password2 = hash('sha512',$_POST['password2']);


    if ($password == $password2 && $usuario == "test") {
        //más adelante guardaremos en BD el usuario
        header("Location: login.php");
    } else {
        echo "usuario incorrecto";
    }
}

require 'views/registro.view.php';
?>