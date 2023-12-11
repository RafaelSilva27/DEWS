<?php
session_start();

$servername = "db";
$username = "root";
$password = "test";
$dbname = "tareas";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['ver-detalle'])) {
        $tareaId = $_GET['ver-detalle'];

        $usuario = $_SESSION['usuario'];
        $query = "SELECT t.* FROM tarea t
                  INNER JOIN usuarios_tarea ut ON t.id = ut.tarea
                  INNER JOIN usuarios u ON u.id = ut.usuario
                  WHERE u.usuario = :usuario AND t.id = :tareaId";
        $statement = $conn->prepare($query);
        $statement->bindParam(':usuario', $usuario);
        $statement->bindParam(':tareaId', $tareaId);
        $statement->execute();

        $tarea = $statement->fetch(PDO::FETCH_ASSOC);

        if ($tarea) {
            echo "<h1>Detalles de la tarea</h1>";
            echo "<p>ID: " . $tarea['id'] . "</p>";
            echo "<p>Titulo: " . $tarea['titulo'] . "</p>";
            echo "<p>Descripcion: " . $tarea['descripcion'] . "</p>";
        } else {
            echo "<p>No tiene permisos para ver los detalles de esta tarea</p>";
        }
    } else {
        echo "<p>No se proporcionó un ID de tarea</p>";
    }
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle tareas</title>
</head>
<body>
    <a href="tareas.php">Volver a tareas</a>
</body>
</html>
