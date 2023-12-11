<?php
  session_start();

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

        $statement = $conn->prepare('SELECT COUNT(*) FROM usuarios WHERE usuario = :usuario');
        $statement->execute(['usuario' => $usuario]);

        if ($statement->fetchColumn()) {
          $error = "El usuario ya existe";
        } else {
          $statement = $conn->prepare('INSERT INTO usuarios (usuario, password) VALUES (:usuario, :password)');
          $statement->execute([':usuario' => $usuario, ':password' => $password]);

          $_SESSION['usuario'] = $usuario;
          header("Location: login.php");
          exit();
        }
      } catch (PDOException $e) {
        $error = "Error: " . $e->getMessage();
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
</head>
<body>
  <h1>Registro de usuario</h1>
  <form method="post" action="registro.php">
    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <button type="submit">Registrar usuario</button>
    <p><a href="login.php">Volver</a></p>
  </form>
  
</body>
</html>