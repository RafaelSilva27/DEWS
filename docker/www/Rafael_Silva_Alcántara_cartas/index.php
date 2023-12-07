<?
  session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Juego de Cartas</title>
    <h1>Juego de cartas</h1>
</head>
<body>

<?

function obtenerCartaAleatoria() {
    $palos = array("c", "d", "p", "t");
    $cartaSeleccionada = array_rand($palos);
    $palo = $palos[$cartaSeleccionada];
    
    $numero = rand(1, 10);

    return $palo . $numero;
}


if (!isset($_SESSION['jugadorA'])) {
    $_SESSION['jugadorA'] = obtenerCartaAleatoria();
}

if (!isset($_SESSION['jugadorB'])) {
    $_SESSION['jugadorB'] = obtenerCartaAleatoria();
}


echo "<p>Jugador A: <br><br> <img src='cartas/{$_SESSION['jugadorA']}.svg'  width='100'></p>";
echo "<p>Jugador B: <br><br> <img src='cartas/{$_SESSION['jugadorB']}.svg'  width='100'></p>";


if ($_SESSION['jugadorA'] > $_SESSION['jugadorB']) {
    echo "<p>El jugador A es el ganador</p>";
} elseif ($_SESSION['jugadorA'] < $_SESSION['jugadorB']) {
    echo "<p>El jugador B es el ganador</p>";
} else {
    echo "<p>Los jugadores han empatado</p>";
}

?>

<form action="repetir_jugada.php" method="post">
    <input type="submit" value="Repetir Jugada">
</form>

</body>
</html>
