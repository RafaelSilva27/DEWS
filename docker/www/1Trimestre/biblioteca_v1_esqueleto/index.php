<!-- BIBLIOTECA VERSIÓN 1
     Características de esta versión:
       - Código monolítico (sin arquitectura MVC)
       - Sin seguridad
       - Sin sesiones ni control de acceso
       - Sin reutilización de código
-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <?php

    // Miramos el valor de la variable "action", si existe. Si no, le asignamos una acción por defecto
    if (isset($_REQUEST["action"])) {
        $action = $_REQUEST["action"];
    } else {
        $action = "mostrarListaLibros";  // Acción por defecto
    }

    if ($action == "mostrarListaLibros") {
        mostrarListaLibros();
    }
    if ($action == "formularioInsertarLibros") {
        formularioInsertarLibros();
    }
    if ($action == "insertarLibro") {
        insertarLibro();
    }
    if ($action == "borrarLibro") {
        borrarLibro();
    }
    if ($action == "formularioModificarLibro") {
        formularioModificarLibro();
    }
    if ($action == "modificarLibro") {
        modificarLibro();
    }
    if ($action == "buscarLibros") {
        buscarLibros();
    }
    if ($action == "formularioInsertarAutores") {
        formularioInsertarAutores();
    }
    if ($action == "insertarAutor") {
        insertarAutor();
    }


    // --------------------------------- MOSTRAR LISTA DE LIBROS ----------------------------------------
function mostrarListaLibros()
    {
        echo "<h1>Biblioteca</h1>";

        $db = new mysqli("db", "root", "test", "biblioteca");
        // Buscamos todos los libros de la biblioteca
        if ($result = $db->query("SELECT * FROM libros
                INNER JOIN escriben ON libros.idLibro = escriben.idLibro
                INNER JOIN personas ON escriben.idPersona = personas.idPersona
                ORDER BY libros.titulo")) {

            // La consulta se ha ejecutado con éxito. Vamos a ver si contiene registros
            if ($result->num_rows != 0) {
                // La consulta ha devuelto registros: vamos a mostrarlos

                // Primero, el formulario de búsqueda
                echo "<form action='index.php'>
                                <input type='hidden' name='action' value='buscarLibros'>
                                <input type='text' name='textoBusqueda'>
                                <input type='submit' value='Buscar'>
                                </form><br>";

                // Ahora, la tabla con los datos de los libros
                echo "<table border ='1'>";
                while ($fila = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila['titulo'] . "</td>";
                    echo "<td>" . $fila['genero'] . "</td>";
                    echo "<td>" . $fila['numPaginas'] . "</td>";
                    echo "<td>" . $fila['año'] . "</td>";
                    echo "<td>" . $fila['nombre'] . "</td>";
                    echo "<td>" . $fila['apellido'] . "</td>";
                    echo "<td><a href='index.php?action=formularioModificarLibro&idLibro=" . $fila['idLibro'] . "'>Modificar</a></td>";
                    echo "<td><a href='index.php?action=borrarLibro&idLibro=" . $fila['idLibro'] . "'>Borrar</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                // La consulta no contiene registros
                echo "No se encontraron datos";
            }
        } else {
            // La consulta ha fallado
            echo "Error al tratar de recuperar los datos de la base de datos. Por favor, inténtelo más tarde";
        }
        echo "<p><a href='index.php?action=formularioInsertarLibros'>Nuevo</a></p>";
    }



    // --------------------------------- FORMULARIO ALTA DE LIBROS ----------------------------------------

    function formularioInsertarLibros()
    {
        echo "<h1>Modificación de libros</h1>";

        // Crear el formulario con los campos del libro
        echo "<form action = 'index.php' method = 'get'>
                    Título:<input type='text' name='titulo'><br>
                    Género:<input type='text' name='genero'><br>
                    País:<input type='text' name='pais'><br>
                    Año:<input type='text' name='año'><br>
                    Número de páginas:<input type='text' name='numPaginas'><br>";

        // Añadimos un select para seleccionar id del autor o autores
        $db = new mysqli("db", "root", "test", "biblioteca");
        $result = $db->query("SELECT * FROM personas");
        echo "Autores: <select name='autor[]' multiple='true'>";
        while ($fila = $result->fetch_assoc()) {
            echo "<option value='" . $fila['idPersona'] . "'>" . $fila['nombre'] . " " . $fila['apellido'] . "</option>";
        }
        echo "</select>";
        echo "<a href='index.php?action=formularioInsertarAutores'>Añadir nuevo</a><br>";

        // Finalizamos el formulario
        echo "  <input type='hidden' name='action' value='insertarLibro'>
					<input type='submit'>
				</form>";
        echo "<p><a href='index.php'>Volver</a></p>";
    }

    // --------------------------------- INSERTAR LIBROS ----------------------------------------

    function insertarLibro()
    {
        echo "<h1>Alta de libros</h1>";

        // Vamos a procesar el formulario de alta de libros
        // Primero, recuperamos todos los datos del formulario (titulo, género...)
        $titulo = $_REQUEST["titulo"];
        $genero = $_REQUEST["genero"];
        $pais = $_REQUEST["pais"];
        $año = $_REQUEST["año"];
        $numPaginas = $_REQUEST["numPaginas"];
        $autores = $_REQUEST["autores"];
       

        // Lanzamos el INSERT contra la BD.
        $db = new mysqli("db", "root", "test", "biblioteca");
        $db ->query("INSERT INTO libros (titulo,genero,pais,año,numPaginas) VALUES ('$titulo','$genero', '$pais', '$año','$numPaginas')");
        if ($db->affected_rows == 1) {
            // Si la inserción del libro ha funcionado, continuamos insertando en la tabla "escriben"
            // Tenemos que averiguar qué idLibro se ha asignado al libro que acabamos de insertar
           $result = $db->query("SELECT MAX(idLibro) AS ultimoLibro FROM libros");
           $idLibro = $result->fetch_assoc()['ultimoIdLibro'];
            // Ya podemos insertar todos los autores junto con el libro en "escriben"
           foreach($autores as $idAutor) {
            $db->query("INSERT INTO escriben(idLibro, idPersona) VALUES('$idLibro', '$idAutor')");
           }
            echo "Libro insertado con éxito";
        } else {
            // Si la inserción del libro ha fallado, mostramos mensaje de error
            echo "Ha ocurrido un error al insertar el libro. Por favor, inténtelo más tarde.";
        }
        echo "<p><a href='index.php'>Volver</a></p>";
    }

    // --------------------------------- BORRAR LIBROS ----------------------------------------

    function borrarLibro()
    {
        echo "<h1>Borrar libros</h1>";

        // Recuperamos el id del libro y lanzamos el DELETE contra la BD
        $idLibro = $_REQUEST['idLibro'];
        $db = new mysqli("db", "root", "test", "biblioteca");
        $db->query("DELETE FROM libros WHERE idLibro = '$idLibro'"); 
        
        // Mostramos mensaje con el resultado de la operación
        if ($db->affected_rows == 0) {
            echo "Ha ocurrido un error al borrar el libro. Por favor, inténtelo de nuevo";
        } else {
            echo "Libro borrado con éxito";
        }
        echo "<p><a href='index.php'>Volver</a></p>";
    }

    // --------------------------------- FORMULARIO MODIFICAR LIBROS ----------------------------------------

    function formularioModificarLibro()
    {
        echo "<h1>Modificación de libros</h1>";

        // Recuperamos el id del libro que vamos a modificar y sacamos el resto de sus datos de la BD
        $idLibro = $_REQUEST['idLibro'];
        $db = new mysqli("db", "root", "test", "biblioteca");
        $result = $db->query("SELECT * FROM libros WHERE libros.idLibro = '$idLibro'");
        $libro = $result->fetch_assoc();

        // Creamos el formulario con los campos del libro
        // y lo rellenamos con los datos que hemos recuperado de la BD
        echo "<form action = 'index.php' method = 'get'>
				    <input type='hidden' name='idLibro' value='$idLibro'>
                    Título:<input type='text' name='titulo' value='" . $libro['titulo'] . "'><br>
                    Género:<input type='text' name='genero' value='" . $libro['genero'] . "'><br>
                    País:<input type='text' name='pais' value='" . $libro['pais'] . "'><br>
                    Año:<input type='text' name='ano' value=" . $libro['año'] . "><br>
                    Número de páginas:<input type='text' name='numPaginas' value='" . $libro['numPaginas'] . "'>
                    <br>";

        // Vamos a añadir un selector para el id del autor o autores.
        // Para que salgan preseleccionados los autores del libro que estamos modificando, vamos a buscar
        // también a esos autores.
        $db = new mysqli("db", "root", "test", "biblioteca");
        $todosLosAutores = $db->query("SELECT * FROM presonas");
        $autoresLibro = $db->query("SELECT idPersona FROM escriben WHERE idLibro = '$idLibro'");
        // Vamos a convertir esa lista de autores del libro en un array de ids de personas
        $listaAutores = array();
        while ($autor = $autoresLibro->fetch_assoc()) {
            $listaAutoresLibro[] = $autor['idPersona'];
        }
        
        // Ya tenemos todos los datos para añadir el selector de autores al formulario
        echo "Autores: <select name='autor[]' multiple size='5'>";
        while ($fila = $todosLosAutores->fetch_assoc()) {
            if (in_array($fila['idPersona'], $listaAutoresLibro))
                echo "<option value='" . $fila['idPersona'] . "' selected>" . $fila['nombre'] . " " . $fila['apellido'] . "</option>";
            else
                echo "<option value='" . $fila['idPersona'] . "'>" . $fila['nombre'] . " " . $fila['apellido'] . "</option>";
        }
        echo "</select>";
        
        // Por último, un enlace para crear un nuevo autor
        echo "<a href='index.php?action=formularioInsertarAutores'>Añadir nuevo</a><br>";

        // Finalizamos el formulario
        echo "  <input type='hidden' name='action' value='modificarLibro'>
                    <input type='submit'>
                  </form>";
        echo "<p><a href='index.php'>Volver</a></p>";
    }

    // --------------------------------- MODIFICAR LIBROS ----------------------------------------

    function modificarLibro()
    {
        echo "<h1>Modificación de libros</h1>";

        // Vamos a procesar el formulario de modificación de libros
        // Primero, recuperamos todos los datos del formulario (idLibro, titulo....)
        $idLibro = $_REQUEST['idLibro'];
        $titulo = $_REQUEST['titulo'];
        $genero = $_REQUEST['genero'];
        $pais = $_REQUEST['pais'];
        $año = $_REQUEST['año'];
        $numPaginas = $_REQUEST['numPaginas'];
        $autores = $_REQUEST['autores'];
        
        // Lanzamos el UPDATE contra la base de datos.
        $db = new mysqli("db", "root", "test", "biblioteca");
        $db->query("UPDATE libros SET
                           titulo = '$titulo',
                           genero = '$genero',
                           pais = '$pais',
                           año = '$año',
                           numPaginas = '$numPaginas'
                           WHERE idLibro = '$idLibro'");
        
        if ($db->affected_rows == 1) {
            // Si la modificación del libro ha funcionado, continuamos actualizando la tabla "escriben".
            // Primero borraremos todos los registros del libro actual y luego los insertaremos de nuevo
            $db->query("DELETE FROM escriben WHERE idLibro = '$idLibro'");
            
            // Ya podemos insertar todos los autores junto con el libro en "escriben"
            foreach ($autores as $idAutor) {
                $db->query("INSERT INTO escriben(idLibro, idPersona) VALUES ('$idLibro', '$idAutor')");
            }
            echo "Libro actualizado con éxito";
        } else {
            // Si la modificación del libro ha fallado, mostramos mensaje de error
            echo "Ha ocurrido un error al modificar el libro. Por favor, inténtelo más tarde.";
        }
        echo "<p><a href='index.php'>Volver</a></p>";
    }

    // --------------------------------- BUSCAR LIBROS ----------------------------------------

    function buscarLibros()
    {
        // Recuperamos el texto de búsqueda de la variable de formulario
        $textoBusqueda = $_REQUEST["textoBusqueda"];
        echo "<h1>Resultados de la búsqueda: \"$textoBusqueda\"</h1>";

        // Buscamos los libros de la biblioteca que coincidan con el texto de búsqueda
        $db = new mysqli("db", "root", "test", "biblioteca");
        if($result = $db->query("SELECT * FROM libros
                    INNER JOIN escriben ON libros.idLibro = escriben.idLibro
                    INNER JOIN personas ON escriben.idPersona = personas.idPersona
                    WHERE libros.titulo LIKE '%$textoBusqueda%'
                    OR libros.genero LIKE '%$textoBusqueda%'
                    OR personas.nombre LIKE '%$textoBusqueda%'
                    OR personas.apellido LIKE '%$textoBusqueda%'
                    ORDER BY libros.titulo")){

        // La consulta se ha ejecutado con éxito. Vamos a ver si contiene registros
            if ($result->num_rows != 0) {
                // La consulta ha devuelto registros: vamos a mostrarlos
                // Primero, el formulario de búsqueda
                echo "<form action='index.php'>
								<input type='hidden' name='action' value='buscarLibros'>
                            	<input type='text' name='textoBusqueda'>
								<input type='submit' value='Buscar'>
                          </form><br>";
                // Después, la tabla con los datos
                echo "<table border ='1'>";
                while ($fila = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila['titulo'] . "</td>";
                    echo "<td>" . $fila['genero'] . "</td>";
                    echo "<td>" . $fila['numPaginas'] . "</td>";
                    echo "<td>" . $fila['nombre'] . "</td>";
                    echo "<td>" . $fila['apellido'] . "</td>";
                    echo "<td><a href='index.php?action=formularioModificarLibro&idLibro=" . $fila['idLibro'] . "'>Modificar</a></td>";
                    echo "<td><a href='index.php?action=borrarLibro&idLibro=" . $fila['idLibro'] . "'>Borrar</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                // La consulta no contiene registros
                echo "No se encontraron datos";
            }
        } else {
            // La consulta ha fallado
            echo "Error al tratar de recuperar los datos de la base de datos. Por favor, inténtelo más tarde";
        }
        echo "<p><a href='index.php?action=formularioInsertarLibros'>Nuevo</a></p>";
        echo "<p><a href='index.php'>Volver</a></p>";
    }
    // --------------------------------- FORMULARIO Insetar Autores ----------------------------------------

    function formularioInsertarAutores()
    {
        echo "<h1>Insertar autores</h1>";

        echo "<form action = 'index.php' method = 'get'>
                    Nombre:<input type='text' name='nombre'><br>
                    Apellido:<input type='text' name='apellido'><br>";

        // Finalizamos el formulario
        echo "  <input type='hidden' name='action' value='insertarAutor'>
					<input type='submit'>
				</form>";
        echo "<p><a href='index.php'>Volver</a></p>";
    }
    // --------------------------------- INSERTAR autores ----------------------------------------


    function insertarAutor()
    {
        echo "<h1>Alta de autores</h1>";

        // Vamos a procesar el formulario de alta de libros
        // Primero, recuperamos todos los datos del formulario (nombre, apellido)
        $nombre = $_REQUEST["nombre"];
        $apellido = $_REQUEST["apellido"];
        
        // Lanzamos el INSERT contra la BD.
        
        $db = new mysqli("db", "root", "test", "biblioteca");
        $db->query("INSERT INTO personas (nombre,apellido) VALUES ('$nombre', '$apellido')");
        if ($db->affected_rows == 1) {
            echo "Autor insertado con éxito";
        } else {
            // Si la inserción del libro ha fallado, mostramos mensaje de error
            echo "Ha ocurrido un error al insertar el autor. Por favor, inténtelo más tarde.";
        }
        echo "<p><a href='index.php'>Volver</a></p>";
    }
    ?>

</body>

</html>