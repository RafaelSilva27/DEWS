<?php
session_start();

$servername = "db";
$username = "root";
$password = "test";
$dbname = "tareas";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!isset($_SESSION['usuario'])) {
        header("Location: login.php");
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['titulo']) && isset($_POST['descripcion'])) {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];

            $insertStatement = $conn->prepare("INSERT INTO tarea (titulo, descripcion) VALUES (:titulo, :descripcion)");
            $insertStatement->bindParam(':titulo', $titulo);
            $insertStatement->bindParam(':descripcion', $descripcion);
            $insertStatement->execute();

            $idTarea = $conn->lastInsertId();

            $usuario = $_SESSION['usuario'];
            $idUsuarioStatement = $conn->prepare("SELECT id FROM usuarios WHERE usuario = :usuario");
            $idUsuarioStatement->bindParam(':usuario', $usuario);
            $idUsuarioStatement->execute();
            $idUsuario = $idUsuarioStatement->fetchColumn();

            $insertUsuariosTarea = $conn->prepare("INSERT INTO usuarios_tarea (tarea, usuario) VALUES (:idTarea, :idUsuario)");
            $insertUsuariosTarea->bindParam(':idTarea', $idTarea);
            $insertUsuariosTarea->bindParam(':idUsuario', $idUsuario);
            $insertUsuariosTarea->execute();
        }

        if (isset($_POST['eliminar-tarea'])) {
            $tareaEliminar = $_POST['eliminar-tarea'];

            $deleteUsuariosTarea = $conn->prepare("DELETE FROM usuarios_tarea WHERE tarea = :id");
            $deleteUsuariosTarea->bindParam(':id', $tareaEliminar);
            $deleteUsuariosTarea->execute();

            $deleteStatement = $conn->prepare("DELETE FROM tarea WHERE id = :id");
            $deleteStatement->bindParam(':id', $tareaEliminar);
            $deleteStatement->execute();
        }

        if (isset($_POST['modificar-tarea'])) {
            $tareaModificar = $_POST['modificar-tarea'];
            $nuevoTitulo = $_POST['nuevo-titulo'];
            $nuevaDescripcion = $_POST['nueva-descripcion'];

            $updateStatement = $conn->prepare("UPDATE tarea SET titulo = :nuevoTitulo, descripcion = :nuevaDescripcion WHERE id = :id");
            $updateStatement->bindParam(':nuevoTitulo', $nuevoTitulo);
            $updateStatement->bindParam(':nuevaDescripcion', $nuevaDescripcion);
            $updateStatement->bindParam(':id', $tareaModificar);
            $updateStatement->execute();
        }

        if (isset($_POST['ver-detalle'])) {
            $tareaDetalle = $_POST['ver-detalle'];
            header("Location: detalleTarea.php?id=$tareaDetalle");
            exit();
        }
    }

    $tareas = getTareasPendientes($conn);

    echo "<h1>Tabla de tareas</h1>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Título</th><th>Descripción</th></tr>";

    foreach ($tareas as $tarea) {
        echo "<tr>";
        echo "<td>" . $tarea->id . "</td>";
        echo "<td>" . $tarea->titulo . "</td>";

        $descripcionCorta = substr($tarea->descripcion, 0, 5);

        echo "<td>" . $descripcionCorta . (strlen($tarea->descripcion) > 5 ? '...' : '') . "</td>";
        
        echo "<td>
                <form method='post'>
                    <input type='hidden' name='eliminar-tarea' value='" . $tarea->id . "' />
                    <input type='submit' value='Eliminar'/>
                </form>
                <form method='post'>
                    <input type='hidden' name='modificar-tarea' value='" . $tarea->id . "' />
                    <input type='text' name='nuevo-titulo' placeholder='Nuevo Título' required/>
                    <input type='text' name='nueva-descripcion' placeholder='Nueva Descripción' required/>
                    <input type='submit' value='Modificar'/>
                </form>
                <form action='detalleTarea.php' method='get'>
                    <input type='hidden' name='ver-detalle' value='" . $tarea->id . "'/>
                    <input type='submit' value='Ver Detalles'/>
                </form>
            </td>";
        echo "</tr>";
    }

    echo "</table>";

    echo "<br>";
    echo "<h1>Añadir nuevas tareas</h1>";
    echo "<form action='tareas.php' method='post'>";
    echo "<input type='text' name='titulo' placeholder='Título' maxlength='20'/>";
    echo "<input type='text' name='descripcion' placeholder='Descripción' maxlength='200'/>";
    echo "<input type='submit' value='Añadir tarea' />";
    echo "</form>";

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

function getTareasPendientes($conn) {
    $usuario = $_SESSION['usuario'];

    $query = "SELECT t.* FROM tarea t
              INNER JOIN usuarios_tarea ut ON t.id = ut.tarea
              INNER JOIN usuarios u ON u.id = ut.usuario
              WHERE u.usuario = :usuario AND t.descripcion IS NOT NULL
              ORDER BY t.id";
    $statement = $conn->prepare($query);
    $statement->bindParam(':usuario', $usuario);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_OBJ);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas</title>
</head>
<body>
    <a href="login.php">Cerrar Sesion</a>
</body>
</html>
