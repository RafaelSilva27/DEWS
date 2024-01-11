<?php
  session_start();

  if (isset($_POST['usuario']) && isset($_POST['password'])) {
    $usuario = strtolower($_POST['usuario']);
    $password = hash('sha512', $_POST['password']);

    try {
      $host = "db";
      $dbUsername = "root";
      $dbPassword = "test";
      $dbName = "tareas";
      $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $statement = $conn->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password');
      $statement->execute(array(
        ':usuario' => $usuario,
        ':password' => $password
      ));

      $resultado = $statement->fetch();

      if ($resultado) {
        $_SESSION['usuario'] = $usuario;
        header("Location: tareas.php");
        exit();
      } else {
        echo "Usuario o contraseña incorrectos";
      } 
    } catch (PDOException $e) {
      $error = "Error: " . $e->getMessage();
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <h1>Login</h1>
  <form method="post" action="login.php">
    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario" required>
    <br>
    <label for="password">contraseña:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <button type="submit">Iniciar sesion</button>
    <p><a href="registro.php">Registrar nuevo usuario</a></p>
  </form>
</body>
</html>